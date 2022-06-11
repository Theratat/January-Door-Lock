<?php
/**
 * Created by PhpStorm.
 * User: salman
 * Date: 2/22/19
 * Time: 1:29 PM
 */

return [

    'host' => env('mqtt_host','soldier.cloudmqtt.com'),
    'password' => env('mqtt_password','s6MlJbTZ4ac2'),
    'username' => env('mqtt_username','yqesqkez'),
    'certfile' => env('mqtt_cert_file',''),
    'port' => env('mqtt_port','10757'),
    'debug' => env('mqtt_debug',false) //Optional Parameter to enable debugging set it to True
];
