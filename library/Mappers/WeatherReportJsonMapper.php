<?php

namespace Mappers;

use Models\WeatherReport;
use Models\Location;

/**
 * Weather Report JSON Mapper.
 *
 * @category Library
 * @package  Mappers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Mappers/WeatherReportJsonMapper.php
 */
class WeatherReportJsonMapper
{


    /**
     *  Hidden constructor.
     */
    private function __construct()
    {

    }//end __construct()


    /**
     * Map current json data to PHP WeatherReport object.
     *
     * @param String $json Unparsed json data
     *
     * @return WeatherReport Parsed WeatherReport object
     */
    public static function mapCurrentJsonToPhp($json)
    {
        $obj = json_decode($json);

        $weatherReport = self::mapJsonObject($obj);
        $weatherReport->setIsForecast(false);

        $location = LocationJsonMapper::mapJsonObject($obj);
        $weatherReport->setLocation($location);

        return $weatherReport;

    }//end mapCurrentJsonToPhp()


    /**
     * Map forecast json data to PHP WeatherReport objects.
     *
     * @param String $json Unparsed json data
     *
     * @return Array Parsed Array of WeatherReport objects
     */
    public static function mapForecastJsonToPhp($json)
    {
        $obj      = json_decode($json);
        $location = LocationJsonMapper::mapJsonObject($obj->city);

        $weatherReports = array();
        foreach ($obj->list as $report) {
            $weatherReport = self::mapJsonObject($report);
            $weatherReport->setIsForecast(true);

            $weatherReport->setLocation($location);

            array_push($weatherReports, $weatherReport);
        }//end foreach

        return $weatherReports;

    }//end mapForecastJsonToPhp()


    /**
     * Utility method for mapping json to PHP object.
     *
     * @param Object $object generic object from json
     *
     * @return WeatherReport Parsed WeatherReport object
     */
    public static function mapJsonObject($object)
    {
        $weatherReport = new WeatherReport();
        if (isset($object->dt) === true) {
            $weatherReport->setDate($object->dt);
        }

        if (isset($object->sys->sunrise) === true) {
            $weatherReport->setSunrise($object->sys->sunrise);
        }

        if (isset($object->sys->sunset) === true) {
            $weatherReport->setSunset($object->sys->sunset);
        }

        if (isset($object->main->temp) === true) {
            $weatherReport->setTemperature($object->main->temp);
        }

        if (isset($object->main->temp_min) === true) {
            $weatherReport->setMinTemperature($object->main->temp_min);
        }

        if (isset($object->main->temp_max) === true) {
            $weatherReport->setMaxTemperature($object->main->temp_max);
        }

        if (isset($object->main->humidity) === true) {
            $weatherReport->setHumidity($object->main->humidity);
        }

        if (isset($object->main->pressure) === true) {
            $weatherReport->setPressure($object->main->pressure);
        }

        if (isset($object->main->sea_level) === true) {
            $weatherReport->setSeaLevelPressure($object->main->sea_level);
        }

        if (isset($object->main->grnd_level) === true) {
            $weatherReport->setGroundLevelPressure($object->main->grnd_level);
        }

        if (isset($object->wind->speed) === true) {
            $weatherReport->setWindSpeed($object->wind->speed);
        }

        if (isset($object->wind->deg) === true) {
            $weatherReport->setWindDirection($object->wind->deg);
        }

        if (isset($object->wind->gust) === true) {
            $weatherReport->setWindGusts($object->wind->gust);
        }

        if (isset($object->clouds->all) === true) {
            $weatherReport->setCloudiness($object->clouds->all);
        }

        $field = '3h';
        if (isset($object->rain->$field) === true) {
            $weatherReport->setRainPrecipitationVolume($object->rain->$field);
        }

        if (isset($object->snow->$field) === true) {
            $weatherReport->setSnowPrecipitationVolume($object->snow->$field);
        }

        return $weatherReport;

    }//end mapJsonObject()


}//end class

?>