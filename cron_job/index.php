<?php

// data for API
// http://openweathermap.org/

$currentUrl = 'http://api.openweathermap.org/data/2.5/weather?q=West%20Chester,%20PA&units=imperial&lang=en';
$forecastUrl = "http://api.openweathermap.org/data/2.5/forecast?q=West%20Chester,%20PA&units=imperial&lang=en";
$historyUrl = "http://api.openweathermap.org/data/2.5/history/city?id=2885679&type=hour&start=1369728000&cnt=2";

// get current weather as json
$currentWeather = json_decode(file_get_contents($currentUrl), true);
// // get forecast weather as json
// $forecastWeather = json_decode(file_get_contents($forecastUrl));
// // get historical weather as json
// $historyWeather = json_decode(file_get_contents($historyUrl));


// coordinates
echo $currentWeather["coord"]["lon"].'<br>';
echo $currentWeather["coord"]["lat"].'<br>';

// sys
echo $currentWeather["sys"]["type"].'<br>';
echo $currentWeather["sys"]["id"].'<br>';
echo $currentWeather["sys"]["message"].'<br>';
echo $currentWeather["sys"]["country"].'<br>';
echo $currentWeather["sys"]["sunrise"].'<br>';
echo $currentWeather["sys"]["sunset"].'<br>';

// weather
echo $currentWeather["weather"][0]["id"].'<br>';
echo $currentWeather["weather"][0]["main"].'<br>';
echo $currentWeather["weather"][0]["description"].'<br>';
echo $currentWeather["weather"][0]["icon"].'<br>';

// base
echo $currentWeather["base"].'<br>';

// main
echo $currentWeather["main"]["temp"].'<br>';
echo $currentWeather["main"]["pressure"].'<br>';
echo $currentWeather["main"]["temp_min"].'<br>';
echo $currentWeather["main"]["temp_max"].'<br>';
echo $currentWeather["main"]["humidity"].'<br>';

// wind
echo $currentWeather["wind"]["speed"].'<br>';
echo $currentWeather["wind"]["deg"].'<br>';

//other
echo $currentWeather["clouds"]["all"].'<br>';

echo $currentWeather["dt"].'<br>';
echo $currentWeather["id"].'<br>';
echo $currentWeather["name"].'<br>';
echo $currentWeather["cod"].'<br>';
