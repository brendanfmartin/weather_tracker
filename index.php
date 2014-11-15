<?php

// data for API
// http://openweathermap.org/

$config = parse_ini_file('config.ini');
var_dump($config);

$currentUrl = 'http://api.openweathermap.org/data/2.5/weather?q=West%20Chester,%20PA&units=imperial&lang=en';
$forecastUrl = "http://api.openweathermap.org/data/2.5/forecast?q=West%20Chester,%20PA&units=imperial&lang=en";
$historyUrl = "http://api.openweathermap.org/data/2.5/history/city?id=2885679&type=hour&start=1369728000&cnt=2";