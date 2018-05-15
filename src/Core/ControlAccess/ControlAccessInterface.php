<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/5/2018
 * Time: 10:55 AM
 */

namespace Dry\Core\ControlAccess;

use Symfony\Component\HttpFoundation\Request;

interface ControlAccessInterface
{
    public function isGranted(string $role,string $user):bool;
    public function authenticate(string $username,string $password,int $rememberMe,Request $request):bool;
}