<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/21/17
 * Time: 1:03 PM
 */

use Symfony\Component\HttpFoundation\Request;
require_once __DIR__ . '/../vendor/autoload.php';

try
{
    $sc = require_once __DIR__.'/../src/container.php';
    $routes = require_once __DIR__ . '/../src/app.php';
    $sc->setParameter('routes',$routes);
    $request = Request::createFromGlobals();

    $config = \Dry\Core\Config\Config::config();

    $rewrite = new \Dry\Core\RequestFormatter\RequestFormatter($request,$sc,$config);
    $request = $rewrite->stripLastSlash()->stripDotPHP()->getFormattedRequest();


    $response = $sc->get('framework')->handle($request);

    $response->send();


}
catch(\Symfony\Component\Routing\Exception\ResourceNotFoundException $e)
{
    if($config->isDebugEnabled())
    {
        echo "You are seeing this message because you have debug enabled";
        echo "<br/>";
        echo "<pre>".print_r($e,true)."</pre>";
    }

    else
    {
        header('Location:404');
        exit;
    }
}
catch(Exception $e)
{
    print_r($e->getMessage());
    exit;
    if($config->isDebugEnabled())
    {
        echo "You are seeing this message because you have debug enabled";
        echo "<br/>";
        echo "<pre>".print_r($e,true)."</pre>";
    }
    else
    {
        header("Location:error");
        exit;
    }
}
catch(Error $e)
{
    print_r($e->getMessage());
    if(isset($config))
    {
        if(method_exists($config,'debugEnabled'))
        {
            if($config->isDebugEnabled())
            {
                echo "You are seeing this message because you have debug enabled";
                echo "<br/>";
                echo "<pre>".print_r($e,true)."</pre>";
                exit;
            }
        }
    }

    $response = new \Symfony\Component\HttpFoundation\Response("OOPS. An unknown error occurred");
    $response->send();

}


