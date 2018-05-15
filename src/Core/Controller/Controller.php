<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 5:13 PM
 */

namespace Dry\Core\Controller;
use Dry\Core\Config\Config;
use Dry\Core\ControlAccess\ControlAccess;
use Dry\Core\User\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Dry\Core\Session\Session;

class Controller
{
    private $notification;
    private $twig;


    public function __construct()
    {
        $this->notification = new FlashBag();
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../../../src/View/');
        $this->twig = new Twig_Environment($loader);

        $this->registerAssets();
        $this->registerHtmlDecode();
        $this->registerIsGranted();
        $this->registerSession();
        $this->registerToken();
        $this->registerPath();
        $this->registerImg();

    }

    public function render_template(Request $request, array $context = array() )
    {

        extract($request->attributes->all(), EXTR_SKIP);
        ob_start();

        echo $this->twig->render($_route.".php", $context);

        return new Response(ob_get_clean());
    }

    private function registerAssets()
    {
        $this->twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) {
            // implement whatever logic you need to determine the asset path

        $file = sprintf('assets/%s', ltrim($asset, '/'));

        $absolute = $this->getPath().$file;


        return $absolute;

        }));
    }

    private function registerImg()
    {
        $this->twig->addFunction(new \Twig_SimpleFunction('img',function($path){

            $file = sprintf('uploads/%s', ltrim($path, '/'));
            $absolute = $this->getPath().$file;

            return $absolute;

        }));
    }

    private function registerIsGranted()
    {
        $this->twig->addFunction(new \Twig_SimpleFunction('isGranted',function($role,$user=""){

            return ControlAccess::controlAccess()->isGranted($role,$user);
        }));
    }
    private function registerPath()
    {
        $this->twig->addFunction(new \Twig_SimpleFunction('path',function($path){


            return $this->getPath().ltrim($path,"/");
        }));
    }

    public function getPath()
    {
        return Config::config()->getBaseUrl()."/";
    }



    private function registerToken()
    {
        $this->twig->addFunction(new \Twig_SimpleFunction('getToken',function(){

            return ControlAccess::controlAccess()->getToken();
        }));
    }

    private function registerHtmlDecode()
    {
        $this->twig->addFunction(new \Twig_SimpleFunction('html_decode',function($code){

            echo html_entity_decode($code);

        }));
    }

    private function registerSession()
    {
        $this->twig->addGlobal('session',Session::session()->currentSession()->all());
    }

    public function extendTwig()
    {
        return $this->twig;
    }

    public function notification(string $type,string $message )
    {
        $this->notification->add($type,$message);
    }



}