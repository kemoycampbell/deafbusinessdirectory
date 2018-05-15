<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 2:18 PM
 */

namespace Dry\Core\RequestFormatter;


use Dry\Core\Config\ConfigInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;

class RequestFormatter implements RequestFormatterInterface
{
    private $request;
    private $sc;
    private $path;
    private $config;

    public function __construct(Request $request, ContainerBuilder $sc, ConfigInterface $config)
    {
        $this->request = $request;
        $this->sc = $sc;
        $this->config = $config;
    }

    public function stripDotPHP()
    {
        $this->path = strtolower($this->request->getPathInfo());
        $projectDir = $this->config->getProjectDir();
        $this->path = str_replace(".php","",$this->path);


        //if path is empty then assign the default
        if($this->path==="/" || $this->path==="" || $this->path==="/".$projectDir."/" || $this->path==="/$projectDir")
        {
            $this->path = "/".$projectDir."/index";


        }

        //remove the multiple //
        if(substr_count($this->request,"/") > 1)
        {
             $this->path = ltrim($this->path,"/");
             $this->path = "/".$this->path;
        }

        return $this;
    }

    public function stripLastSlash()
    {
        if(substr_count($this->request,"/") > 1)
        {
            $this->path = rtrim($this->path,"/");
        }

        return $this;
    }

    public function getFormattedRequest(): Request
    {
        $matcher = $this->sc->get('matcher');
        $this->request->attributes->add($matcher->match($this->path));
        return $this->request;
    }


}