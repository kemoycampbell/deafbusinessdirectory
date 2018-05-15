<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/21/17
 * Time: 12:17 PM
 */

return array(

    'debug'=>true,
    'configureFor'=>'dev',

    #Hosting Environment Configuration
    'devHost'=>array(
        'projectDir'=>'deafbusinessdirectory',
        'scheme'=>'http',
        'host'=>'localhost'
    ),

    'prodHost'=>array(
        'projectDir'=>'dry',
        'scheme'=>'http',
        'host'=>'localhost'
    ),

    'testHost'=>array(
        'projectDir'=>'dry',
        'scheme'=>'http',
        'host'=>'localhost'
    ),


    #DATABASE CONFIGURATION
    'devServer'=>array(
        'prefix'=>'mysql',
        'host'=>'localhost',
        'username'=>'root',
        'password'=>'',
        'database'=>'dry'
    )

    ,
    'prodServer'=>array(
        'prefix'=>'mysql',
        'host'=>'localhost',
        'username'=>'root',
        'password'=>'',
        'database'=>'dry'
    ),

    'testServer'=>array(
        'prefix'=>'mysql',
        'host'=>'localhost',
        'username'=>'root',
        'password'=>'',
        'database'=>'dry'
    )
);