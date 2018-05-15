<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/5/2018
 * Time: 1:50 AM
 */


namespace Dry\Core\User;

interface UserInterface
{
    public function getRole(string $user):string;
    public function getUsername():string;
    public function getUsers():array;
    public function getUsersByUsernames():array;
    public function getUser(string $where, array $bindings, string $columns):?array;
    public function createUser(string $username,string $password,string $role="user"):bool;
    public function getAnonymousRole():string;
    public function changePassword(string $username, string $password):bool;


}