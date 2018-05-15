<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 1:36 PM
 */

namespace Dry\Core\Config;

interface ConfigInterface
{
    public function getProjectDir():string;
    public function isDebugEnabled():string;
    public function showAllErrors();
    public function getDatabaseDsn():string;
    public function getDatabaseUsername():string;
    public function getDatabasePassword():string;
    public function getEnvironment():string;
    public function getDatabaseInfo():array;
    public function getHost():string;
    public function getDatabaseName():string;
    public function getPrefix():string;

}