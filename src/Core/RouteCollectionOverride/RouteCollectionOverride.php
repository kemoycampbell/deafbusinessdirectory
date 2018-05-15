<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 1:52 PM
 */

namespace Dry\Core\RouteCollectionOverride;


use Dry\Core\Config\ConfigInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class RouteCollectionOverride implements RouteCollectionOverrideInterface
{
    private $routes;
    private $config;

    public function __construct(ConfigInterface $config)
    {
        $this->routes = new RouteCollection();
        $this->config = $config;
    }

    public function getRouteCollections(): RouteCollection
    {
        return $this->routes;
        // TODO: Implement getRouteCollections() method.
    }

    public function add(string $name, Route $route): void
    {
        // TODO: Implement add() method.
        $path = strtolower($this->config->getProjectDir().$route->getPath());
        $route->setPath($path);

        $this->routes->add($name,$route);
    }

    public function addControllerOnly(Route $route): void
    {
        // TODO: Implement addControllerOnly() method.
        $this->add($this->generateUniqueName(),$route);
    }

    public function addAjax(Route $route):void
    {
        $this->addControllerOnly($route);
    }

    private function generateUniqueName()
    {
        $name ="";
        while(true)
        {
            $bytes = openssl_random_pseudo_bytes(6, $cstrong);
            $name   = bin2hex($bytes);

            //name is not already taken so we can use it
            if($this->routes->get($name)===null)
            {
                break;
            }
        }

        return $name;

    }


}