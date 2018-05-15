<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/5/2018
 * Time: 11:06 AM
 */

namespace Dry\Core\ControlAccess;


use Dry\Core\Config\Config;
use Dry\Core\Session\Session;
use Dry\Core\User\User;
use Dry\Core\User\UserInterface;
use Dry\Core\User\UserNotFoundException;
use Psr\Log\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;

class ControlAccess implements ControlAccessInterface
{
    private $user;
    private $session;
    private static $loginPath = null;

    public static function controlAccess()
    {
        static $controlAccessInstance = null;
        if($controlAccessInstance===null)
        {
            $controlAccessInstance = new ControlAccess(User::user());
        }

        return $controlAccessInstance;
    }

    public static function createLoginPath(string $path)
    {
        if(self::$loginPath===null)
        {
            self::$loginPath = $path;
        }
    }
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
        $this->session = Session::session()->currentSession();
    }

    public function isGranted(string $role, string $user=""): bool
    {
        //if empty then we are checking the role of the current logged user
        //otherwise we want the role for a specific user
        try
        {
            return $this->user->getRole($user)===$role;
        }
        catch(UserNotFoundException $e)
        {
            return false;
        }
    }

    public function requireLogin()
    {
        if(self::$loginPath===null)
        {
            throw new InvalidArgumentException("Login path is not define. You may define it using ControlAccess::createLoginPath(string path)");
        }
        if($this->user->getRole("")===$this->user->getAnonymousRole())
        {
            $path = self::$loginPath;
            self::redirectTo(self::$loginPath);
        }
    }

    public static function redirectTo($path)
    {
        if(substr_count($path,"/" ) > 1)
        {
            $path = ltrim($path,"/");
            $path = "/".$path;
        }
        if(substr_count($path,"/")<=0)
        {
            $path = "/".$path;
        }
        $location = Config::config()->getBaseUrl().$path;
        header("Location:$location");
        exit;
    }

    public function skipAuthenication()
    {
        //skip authenicate if the user is already login
        if($this->user->getRole("")!==$this->user->getAnonymousRole())
        {
            self::redirectTo('index');
        }
    }

    public function authenticate(string $username, string $password, int $rememberMe, Request $request): bool
    {
        $this->skipAuthenication();
        //get the user's info
        $where = "username=?";$bindings = array($username);
        $info = $this->user->getUser($where,$bindings,$columns="*");

        if($info)
        {

            $enteredPassword = $username.$password;
            $hash = $info['password'];
            $role = $info['role'];

            if(password_verify($enteredPassword,$hash))
            {
                $verified = $info['verified'];

                if($verified===1 || $verified==="1" || $verified===true)
                {
                    $this->createControlAccessSession($username,$request,$role);
                    return true;
                }

                //otherwise throw exception

                throw new AccountVerificationPendingException("Account pending verification");

            }
        }

        return false;
        // TODO: Implement authenticate() method.
    }

    private function createControlAccessSession(string $username, Request $request, string $role)
    {
        $this->session->set('username',$username);
        $this->session->set('ip',$request->getClientIp());
        $this->session->set('agent',$request->headers->get('User-Agent'));
        $this->session->set('role',$role);
        $this->session->set('token',$this->newToken());


    }

    public function newToken()
    {
        return bin2hex(openssl_random_pseudo_bytes(10));
    }

    public function getToken()
    {
        return $this->session->get('token',$this->newToken());
    }



}