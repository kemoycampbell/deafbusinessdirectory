<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 1:31 PM
 */

namespace Dry\Core\Config;


class Config implements ConfigInterface
{
    private $config;
    private $debug;
    private $environment;
    private $databaseInfo;
    private $serverType;
    private $hostingType;
    private $development = 'dev';

    public static function config()
    {
        static $configInstance = null;
        if($configInstance===null)
        {
            $configInstance = new Config();
        }

        return $configInstance;
    }

    public function __construct()
    {
        $this->config = require_once __DIR__ . '/../../../config/config.php';
        $this->readDebugInfo();
        $this->loadEnvironementType();

        if($this->debug)
        {
            $this->showAllErrors();
        }

    }


    private function readDebugInfo()
    {
        //only read from config if not previously read
        if(!isset($this->debug))
        {
            //can we find config in the config.php file
            if(!isset($this->config['debug']))
            {

                throw new \InvalidArgumentException("debug is missing from the config");
            }

            //debug must be a bool
            $this->debug = $this->config['debug'];

            if(!is_bool($this->debug))
            {
                throw new \InvalidArgumentException("debug must be a boolean");
            }
        }

        return $this->debug;
    }

    public function getProjectDir(): string
    {
        if(!isset($this->config[$this->hostingType]['projectDir']))
        {
            throw new \InvalidArgumentException("not able to locate projectDir in config.php");
        }
        return strtolower($this->config[$this->hostingType]['projectDir']); //make everything lowercase to fix case sensitive issue on some os
        // TODO: Implement getProjectDir() method.
    }

    public function isDebugEnabled(): string
    {
        return $this->debug;
    }

    public function showAllErrors()
    {
        if($this->debug===true)
        {
            ini_set('display_errors', 1);
            error_reporting(-1);
        }
    }

    public function getDatabaseName(): string
    {
        // TODO: Implement getDatabaseName() method.
        $this->getCorrespondingDatabaseServerInfo();
        return $this->config[$this->serverType]['database'];
    }


    public function getDatabaseDsn(): string
    {
        // TODO: Implement getDatabaseDsn() method.
        //$dsn = 'mysql:host=localhost;dbname=testdb';

        $prefix = $this->getPrefix();
        $host = $this->getHost();
        $dbname = $this->getDatabaseName();


        $dsn = "$prefix:host=$host;dbname=$dbname";

        return $dsn;
    }

    public function getPrefix(): string
    {
        $this->getCorrespondingDatabaseServerInfo();
        // TODO: Implement getPrefix() method.

        return $this->databaseInfo['prefix'];
    }


    public function getHost():string
    {
        $this->getCorrespondingDatabaseServerInfo();
        return $this->databaseInfo['host'];
    }

    public function getDatabaseUsername(): string
    {
        $this->getCorrespondingDatabaseServerInfo();
        return $this->databaseInfo['username'];
    }

    public function getDatabasePassword(): string
    {
        $this->getCorrespondingDatabaseServerInfo();
        return $this->databaseInfo['password'];
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }


    public function loadEnvironementType()
    {
        if(isset($this->environment))
        {
            if(!isset($this->config['configureFor']) || !is_string($this->config['configureFor']) || empty($this->config['configureFor']))
            {
                throw new \InvalidArgumentException("ConfigureFor parameter is missing in config/config.php");
            }
        }

        //only allowed dev, prod, or test
        $allowed = array('dev','prod','test');
        $this->environment = strtolower($this->config['configureFor']);

        if(!in_array($this->environment,$allowed))
        {
            throw new \InvalidArgumentException("configureFor must be one of the following $allowed");
        }

        $this->hostingType = $this->environment."Host";
        $this->serverType = $this->environment."Server";
    }

    private function checkDatabaseParameterRequirements()
    {
        if(!isset($this->config[$this->serverType]))
        {
            throw new \InvalidArgumentException("$this->serverType is missing from the config.php");
        }

        if(!is_array($this->config[$this->serverType]))
        {
            throw new \InvalidArgumentException("$this->serverType must be an array");
        }

        $requiredParameters = array('prefix','host','username','password','database');

        //as a security measure, we allowed developers to have empty password on dev but not on
        //prod or test environment

        foreach($requiredParameters as $param)
        {
            if(!isset($this->config[$this->serverType][$param]))
            {
                throw new \InvalidArgumentException("The parameter $param is missing from $this->config[$this->serverType]");
            }

            if($param==='password')
            {
                if($this->environment!==$this->development && empty($this->config[$this->serverType][$param]))
                {
                    throw new \InvalidArgumentException("database parameter in $this->config[$this->serverType]
                    cannot be empty in a non dev environment");
                }
            }
            else
            {
                if(empty($this->config[$this->serverType][$param]))
                {
                    throw new \InvalidArgumentException("$param parameter in $this->config[$this->serverType] cannot 
                    be empty");
                }
            }
        }
    }

    public function getDatabaseInfo(): array
    {
        $this->getCorrespondingDatabaseServerInfo();

        return $this->databaseInfo;
        // TODO: Implement getDatabaseInfo() method.
    }

    private function getCorrespondingDatabaseServerInfo()
    {
        if(!isset($this->databaseInfo))
        {
            $this->checkDatabaseParameterRequirements();
        }

        $this->databaseInfo = $this->config[$this->serverType];
    }


    public function getBaseUrl()
    {

        $base = $this->config[$this->hostingType]['scheme']."://".$this->config[$this->hostingType]['host'];

        if($this->getProjectDir()!=="" && !empty($this->getProjectDir()))
        {
            $base=$base."/".$this->getProjectDir();
        }

        return $base;
    }

    public function startWith($haystack,$needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }



}