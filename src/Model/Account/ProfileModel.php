<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/17/18
 * Time: 6:01 PM
 */

namespace Dry\Model\Account;


use Dry\Core\Database\Database;
use Dry\Core\User\User;

class ProfileModel
{
    private $db;
    private $user;
    private $table;

    public function __construct()
    {
        $this->db = Database::database();
        $this->user = User::user();
        $this->table = 'profile';
    }

    public function create(string $username,string $email,string $firstname, string $lastname)
    {

    }

    public function getProfile(string $username)
    {

    }

    public function updateProfile(string $username)
    {
        
    }
}