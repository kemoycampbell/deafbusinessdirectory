<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/5/2018
 * Time: 1:35 AM
 */

namespace Dry\Core\Session;


class Session implements SessionInterface
{
    private $session;

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __construct()
    {
        $this->session = $this->createSession();
        if($this->session->isStarted()===false)
        {
            $this->session->start();
        }
    }


    public static function session()
    {
        static $sessionInstance = null;
        if($sessionInstance===null)
        {
            $sessionInstance = new Session();
        }


        return $sessionInstance;
        // TODO: Implement session() method.
    }

    public function currentSession()
    {
        return $this->session;
        // TODO: Implement currentSession() method.
    }


    private function createSession()
    {
        return new \Symfony\Component\HttpFoundation\Session\Session();
    }



}