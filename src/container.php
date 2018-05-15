<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 2:39 PM
 */


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\EventListener\ResponseListener;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Dry\Core\Config\Config;
use Dry\Core\Framework\Dry;



$sc = new ContainerBuilder();

$sc = new ContainerBuilder();

$sc->register('context', RequestContext::class);
$sc->register('matcher', UrlMatcher::class)
    ->setArguments(array('%routes%', new Reference('context')))
;
$sc->register('request_stack', RequestStack::class);
$sc->register('controller_resolver', ControllerResolver::class);
$sc->register('argument_resolver', ArgumentResolver::class);

$sc->register('listener.router', RouterListener::class)
    ->setArguments(array(new Reference('matcher'), new Reference('request_stack')))
;
$sc->register('listener.response', ResponseListener::class)
    ->setArguments(array('UTF-8'))
;
/*$sc->register('listener.exception', HttpKernel\EventListener\ExceptionListener::class)
    ->setArguments(array('Calendar\Controller\ErrorController::exceptionAction'))
;*/
$sc->register('dispatcher', EventDispatcher::class)
    ->addMethodCall('addSubscriber', array(new Reference('listener.router')))
    ->addMethodCall('addSubscriber', array(new Reference('listener.response')))
    //->addMethodCall('addSubscriber', array(new Reference('listener.exception')))
;

//add your dependency injection here

$sc->register('database',\Dry\Core\Database\Database::class)
    ->setArguments(array(new Reference('config')));



//modification below is discourage
$sc->register('framework', Dry::class)
    ->setArguments(array(
        new Reference('dispatcher'),
        new Reference('controller_resolver'),
        new Reference('request_stack'),
        new Reference('argument_resolver'),
    ))
;

return $sc;

