<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 2:10 PM
 */

namespace Dry\Core\RequestFormatter;

use Symfony\Component\HttpFoundation\Request;

interface RequestFormatterInterface
{
    public function stripDotPHP();

    public function stripLastSlash();

    public function getFormattedRequest():Request;
}