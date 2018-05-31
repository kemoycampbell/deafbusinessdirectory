<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 2:38 PM
 */


use Symfony\Component\Routing\Route;


//$config is declared inside the public
$routes = new \Dry\Core\RouteCollectionOverride\RouteCollectionOverride(\Dry\Core\Config\Config::config());

#############################################
# ADD YOUR APP ROUTES HERE
############################################
$routes->add('index',new Route('/index',array(
    '_controller'=>'Dry\Controller\Home\HomeController::indexAction')));

$routes->add('register',new Route('/register',array(
    '_controller'=>'Dry\Controller\Register\RegisterController::indexAction')));



$routes->add('404',new Route('/404',array(
    '_controller'=>'Dry\Controller\Error\TronError::error404')));

$routes->add('error',new Route('/error',array(
    '_controller'=>'Dry\Controller\Error\TronError::allExceptions')));



###########################################
#       MODIFICATION BELOW THIS LINE IS
#       DISCOURAGED
##########################################
//return $routes;
//return the routes as an instance of symfony RouteCollections
return $routes->getRouteCollections();
