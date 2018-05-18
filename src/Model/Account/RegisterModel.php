<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/17/18
 * Time: 5:48 PM
 */

namespace Dry\Model\Account;


use Dry\Core\Database\Database;
use Dry\Core\User\User;

class RegisterModel
{
    private $db;
    private $user;
    private $minUserNameSize = 5;
    private $maxUsernameSize= 25;


    public function __construct()
    {
        $this->user = User::user();
        $this->db = Database::database();
    }

    /**
     * This function takes the username and returns true if the username length
     * has been met otherwise false
     * @param string $username - the username to check
     * @return bool - true if length is met and false otherwise
     */
    public function hasRequiredUsernameLength(string $username)
    {
        $length = strlen($username);

        return $length >= $this->minUserNameSize && $length <=$this->maxUsernameSize;
    }

    /**
     * This method checks whether the username is already taken
     * @param string $username
     * @return bool
     */
    public function isUsernameTaken(string $username)
    {
        $where = 'username=?';
        $bindings = array($username);
        $columns = "username";
        $info = $this->user->getUser($where,$bindings,$columns);

        if($info)
        {
            return true;
        }

        return false;
    }

    /**
     * This method is use to create an activation token for a particular user
     * @param string $username
     * @return bool
     */
    public function createActivationToken(string $username)
    {
        $table = "activation";
        if(empty($username))
        {
            $this->error = "Username cannot be empty";
        }

        try
        {
            $unique = bin2hex(openssl_random_pseudo_bytes(10));
            $token = password_hash($username.$unique,PASSWORD_DEFAULT);
            $columns = 'username,token';$values = '?,?'; $bindings = array($username,$token);

            $this->token = $token;
            return $this->db->insert($table,$columns,$values,$bindings);
        }
        catch(\Exception $e)
        {
            $this->error = "An error prevent us from creating your activation token. Please try again";
        }


    }

    /**
     * Add the user to the account table with a specific role
     * @param string $username
     * @param string $password
     * @param string $role
     * @return bool
     */
    public function createAccount(string $username,string $password, string $role)
    {
        if(empty($username) || empty($password) || empty($role))
        {
            $this->error = "username,password and role are required";
            return false;
        }

        if($this->hasUsername($username))
        {
            $this->error = "The username $username is already taken";
            return false;
        }

        if($this->usernameSizeMet($username)===false)
        {
            $this->error = "Your username must be between the length 5 and 35";
            return false;
        }

        return User::user()->createUser($username,$password,$role);
    }


}