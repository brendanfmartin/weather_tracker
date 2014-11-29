<?php

namespace OpenWeather;

/**
 * Current Weather Api class.
 *
 * @category Library
 * @package  OpenWeather
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/OpenWeather/CurrentWeatherApi.php
 */
class CurrentWeatherApi
{
    const CURRENT_WEATHER_API_URL = 'http://api.openweathermap.org/data/2.5/weather';


    /**
     *  Constructor.
     */
    public function __construct()
    {

    }//end __construct()


    /**
     * Preforms network request for current weather by city name.
     *
     * @param String $cityName City name with optional country (ex. London,uk)
     * @param String $units    [internal, metric, imperial] measurment units default's to imperial
     * @param String $language language code deafult's to en
     * @param String $mode     [xml, html, json] format of results deafault's to json
     *
     * @link http://openweathermap.org/current
     * @return String json result of network call
     */
    public static function getCurrentWeatherByName($cityName, $units='imperial', $language='en', $mode='json')
    {
        $requestUrl  = self::CURRENT_WEATHER_API_URL;
        $requestUrl .= "?q={$cityName}&units={$units}&lang={$language}&mode={$mode}";

        return NetworkRequest::request($requestUrl);

    }//end getCurrentWeatherByName()


    /**
     * Preforms network request for current weather by city id.
     *
     * @param String $cityId   City id
     * @param String $units    [internal, metric, imperial] measurment units default's to imperial
     * @param String $language language code deafult's to en
     * @param String $mode     [xml, html, json] format of results deafault's to json
     *
     * @link http://openweathermap.org/current
     * @return String json result of network call
     */
    public static function getCurrentWeatherById($cityId, $units='imperial', $language='en', $mode='json')
    {
        $requestUrl  = self::CURRENT_WEATHER_API_URL;
        $requestUrl .= "?id={$cityId}&units={$units}&lang={$language}&mode={$mode}";

        return NetworkRequest::request($requestUrl);

    }//end getCurrentWeatherById()


    /**
     * Preforms network request for current weather by latitutde and longitude.
     *
     * @param String $latitude  City latitude
     * @param String $longitude City longitude
     * @param String $radius    City longitude
     * @param String $units     [internal, metric, imperial] measurment units default's to imperial
     * @param String $language  language code deafult's to en
     * @param String $mode      [xml, html, json] format of results deafault's to json
     *
     * @link http://openweathermap.org/current
     * @return String json result of network call
     */
    public static function getCurrentWeatherByLatLong(
        $latitude,
        $longitude,
        $radius,
        $units='imperial',
        $language='en',
        $mode='json'
    ) {
        $requestUrl  = self::CURRENT_WEATHER_API_URL;
        $requestUrl .= "?lat={$latitude}&lon={$longitude}&cnt={$radius}&units={$units}&lang={$language}&mode={$mode}";

        return NetworkRequest::request($requestUrl);

    }//end getCurrentWeatherByLatLong()


}//end class

?>