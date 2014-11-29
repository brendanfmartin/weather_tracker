<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

/**
 * WeatherTracker project autoloader.
 */
spl_autoload_register(function ($class) {

    $cleanClass = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $class);
    $libClass = __DIR__ . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . $cleanClass . '.php';
    if (file_exists($libClass)) {
        include $libClass;
    }
});

?>