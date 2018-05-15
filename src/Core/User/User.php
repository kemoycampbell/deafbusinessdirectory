<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/5/2018
 * Time: 2:11 AM
 */

namespace Dry\Core\User;


use Dry\Core\Database\Database;
use Dry\Core\Database\DatabaseInterface;
use Dry\Core\Session\Session;

class User implements UserInterface
{
    private $table;
    private $db;
    private $session;
    private $notLoggedRole = "anonymous";
    private $notLoggedUsername = "anonymous";

    public static function user()
    {
        static $userInstance = null;
        if($userInstance===null)
        {
            $userInstance = new User(Database::database());
        }

        return $userInstance;
    }

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
        $this->table = "accounts";
        $this->session = Session::session()->currentSession();
    }

    public function getRole(string $user=""): string
    {
        if(!empty($user))
        {
            $columns = "role";$where = "username=?";
            $bindings = array($user);
           $role = $this->db->select($this->table,$where,$bindings,$columns);

           if($role!==false)
           {
               return $role->fetch();
           }

           throw new UserNotFoundException("Not able to located the requested user $user");
        }

        return $this->session->get('role',$this->notLoggedRole);
        // TODO: Implement getRole() method.
    }

    public function getUsername(): string
    {
        return $this->session->get('username',$this->notLoggedUsername);
        // TODO: Implement getUsername() method.
    }

    public function getUsers(): array
    {
        $where = "";$bindings = array();$columns = "*";
        $res = $this->db->select($this->table,$where,$bindings,$columns);

        if($res!==false)
        {
            return $res->fetchAll();
        }

        return null;
        // TODO: Implement getUsers() method.
    }

    public function getUsersByUsernames(): array
    {
        $where = "";$bindings = array();$columns = "username";
        $res = $this->db->select($this->table,$where,$bindings,$columns);

        if($res!==false)
        {
            return $res->fetchAll();
        }

        return null;
        // TODO: Implement getUsersByUsernames() method.
    }

    public function getUser(string $where, array $bindings, string $columns):?array
    {

        $res = $this->db->select($this->table,$where,$bindings,$columns);

        if($res!==false)
        {
            return $res->fetch();
        }

        return null;
        // TODO: Implement getUser() method.
    }

    public function createUser(string $username, string $password, string $role = "user"): bool
    {
        $columns = "username,password,role"; $values = "?,?,?";

        $password = $username.$password;
        $password = password_hash($password,PASSWORD_DEFAULT);

        $bindings = array($username,$password,$role);

        return $this->db->insert($this->table,$columns,$values,$bindings);
        // TODO: Implement createUser() method.
    }

    public function getAnonymousRole():string
    {
        return $this->notLoggedRole;
    }

    public function changePassword(string $username, string $password): bool
    {

        $password = $username.$password;
        $password = password_hash($password,PASSWORD_DEFAULT);
        $set = "password = ?";$where = "username=?"; $bindings = array($password,$username);
        return $this->db->update($this->table,$set,$where,$bindings);
        // TODO: Implement changePassword() method.
    }


}