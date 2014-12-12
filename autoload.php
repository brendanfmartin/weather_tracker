<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

/*
    WeatherTracker project autoloader.
*/

spl_autoload_register(
    function ($class) {

        $cleanClass = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $class);
        $libClass   = __DIR__.DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.$cleanClass.'.php';
        if (file_exists($libClass) === true) {
            include $libClass;
        }

        $webserviceClass = __DIR__.DIRECTORY_SEPARATOR.'webservice'.DIRECTORY_SEPARATOR.$cleanClass.'.php';
        if (file_exists($webserviceClass) === true) {
            include $webserviceClass;
        }
    }
);

?>