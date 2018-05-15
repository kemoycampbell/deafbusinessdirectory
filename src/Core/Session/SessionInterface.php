<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/5/2018
 * Time: 1:31 AM
 */

namespace Dry\Core\Session;

interface SessionInterface
{
    public static function session();

    public function currentSession();
}