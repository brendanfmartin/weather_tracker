<?php

namespace OpenWeather;

/**
 * Forecast Weather Api class.
 *
 * @category Library
 * @package  OpenWeather
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/OpenWeather/ForecastWeatherApi.php
 */
class ForecastWeatherApi
{
    const WEATHER_FORECAST_THREE_HOUR_API_URL = 'http://api.openweathermap.org/data/2.5/forecast';

    const WEATHER_FORECAST_DAILY_API_URL = 'http://api.openweathermap.org/data/2.5/forecast/daily';


    /**
     *  Hidden constructor.
     */
    private function __construct()
    {

    }//end __construct()


    /**
     * Preforms network request for 5 day forecast (3 hour increments) by city name.
     *
     * @param String $cityName City name with optional country (ex. London,uk)
     * @param String $units    [internal, metric, imperial] measurment units default's to imperial
     * @param String $language language code deafult's to en
     * @param String $mode     [xml, json] format of results default's to json
     *
     * @link http://openweathermap.org/forecast
     * @return String json result of network call
     */
    public static function getThreeHourForecastByName($cityName, $units='imperial', $language='en', $mode='json')
    {
        $requestUrl  = self::WEATHER_FORECAST_THREE_HOUR_API_URL;
        $requestUrl .= "?q={$cityName}&units={$units}&lang={$language}&mode={$mode}";

        return NetworkRequest::request($requestUrl);

    }//end getThreeHourForecastByName()


    /**
     * Preforms network request for 5 day forecast (3 hour increments) by city id.
     *
     * @param String $cityId   City id
     * @param String $units    [internal, metric, imperial] measurment units default's to imperial
     * @param String $language language code deafult's to en
     * @param String $mode     [xml, json] format of results default's to json
     *
     * @link http://openweathermap.org/forecast
     * @return String json result of network call
     */
    public static function getThreeHourForecastById($cityId, $units='imperial', $language='en', $mode='json')
    {
        $requestUrl  = self::WEATHER_FORECAST_THREE_HOUR_API_URL;
        $requestUrl .= "?id={$cityId}&units={$units}&lang={$language}&mode={$mode}";

        return NetworkRequest::request($requestUrl);

    }//end getThreeHourForecastById()


    /**
     * Preforms network request for 5 day forecast (3 hour increments) by latitutde and longitude.
     *
     * @param String $latitude  City latitude
     * @param String $longitude City longitude
     * @param String $radius    City longitude
     * @param String $units     [internal, metric, imperial] measurment units default's to imperial
     * @param String $language  language code deafult's to en
     * @param String $mode      [xml, json] format of results default's to json
     *
     * @link http://openweathermap.org/forecast
     * @return String json result of network call
     */
    public static function getThreeHourForecastByLatLong(
        $latitude,
        $longitude,
        $radius,
        $units='imperial',
        $language='en',
        $mode='json'
    ) {
        $requestUrl  = self::WEATHER_FORECAST_THREE_HOUR_API_URL;
        $requestUrl .= "?lat={$latitude}&lon={$longitude}&cnt={$radius}&units={$units}&lang={$language}&mode={$mode}";

        return NetworkRequest::request($requestUrl);

    }//end getThreeHourForecastByLatLong()


    /**
     * Preforms network request for daily forecast by city name.
     *
     * @param String $cityName City name with optional country (ex. London,uk)
     * @param String $days     Number of days requested (1 to 16)
     * @param String $units    [internal, metric, imperial] measurment units default's to imperial
     * @param String $language language code deafult's to en
     * @param String $mode     [xml, json] format of results default's to json
     *
     * @throws \InvalidArgumentException $day argument must be 1-16
     * @link http://openweathermap.org/forecast
     * @return String json result of network call
     */
    public static function getDailyForecastByName($cityName, $days, $units='imperial', $language='en', $mode='json')
    {
        if ($days > 16 || $days < 1) {
            throw new \InvalidArgumentException('Days requested must be between 1-16');
        }

        $requestUrl  = self::WEATHER_FORECAST_DAILY_API_URL;
        $requestUrl .= "?q={$cityName}&cnt={$days}&units={$units}&lang={$language}&mode={$mode}";

        return NetworkRequest::request($requestUrl);

    }//end getDailyForecastByName()


    /**
     * Preforms network request for daily forecast by city id.
     *
     * @param String $cityId   City id
     * @param String $days     Number of days requested (1 to 16)
     * @param String $units    [internal, metric, imperial] measurment units default's to imperial
     * @param String $language language code deafult's to en
     * @param String $mode     [xml, json] format of results default's to json
     *
     * @throws \InvalidArgumentException $day argument must be 1-16
     * @link http://openweathermap.org/forecast
     * @return String json result of network call
     */
    public static function getDailyForecastById($cityId, $days, $units='imperial', $language='en', $mode='json')
    {
        if ($days > 16 || $days < 1) {
            throw new \InvalidArgumentException('Days requested must be between 1-16');
        }

        $requestUrl  = self::WEATHER_FORECAST_DAILY_API_URL;
        $requestUrl .= "?id={$cityId}&cnt={$days}&units={$units}&lang={$language}&mode={$mode}";

        return NetworkRequest::request($requestUrl);

    }//end getDailyForecastById()


    /**
     * Preforms network request for daily forecast by latitutde and longitude.
     *
     * @param String $latitude  City latitude
     * @param String $longitude City longitude
     * @param String $days      Number of days requested (1 to 16)
     * @param String $units     [internal, metric, imperial] measurment units default's to imperial
     * @param String $language  language code deafult's to en
     * @param String $mode      [xml, json] format of results default's to json
     *
     * @throws \InvalidArgumentException $day argument must be 1-16
     * @link http://openweathermap.org/forecast
     * @return String json result of network call
     */
    public static function getDailyForecastByLatLong(
        $latitude,
        $longitude,
        $days,
        $units='imperial',
        $language='en',
        $mode='json'
    ) {
        if ($days > 16 || $days < 1) {
            throw new \InvalidArgumentException('Days requested must be between 1-16');
        }

        $requestUrl  = self::WEATHER_FORECAST_DAILY_API_URL;
        $requestUrl .= "?lat={$latitude}&lon={$longitude}&cnt={$days}&units={$units}&lang={$language}&mode={$mode}";

        return NetworkRequest::request($requestUrl);

    }//end getDailyForecastByLatLong()


}//end class

?>