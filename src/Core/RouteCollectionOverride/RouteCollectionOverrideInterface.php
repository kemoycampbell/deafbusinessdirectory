<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 1:45 PM
 */

namespace Dry\Core\RouteCollectionOverride;


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

interface RouteCollectionOverrideInterface
{
    public function getRouteCollections():RouteCollection;
    public function add(string $name, Route $route):void;
    public function addControllerOnly(Route $route):void;
    public function addAjax(Route $route):void;
}