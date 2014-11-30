<?php

namespace Mappers;

use Models\WeatherReport;

/**
 * Weather Report Mapper.
 *
 * @category Library
 * @package  Mappers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Mappers/WeatherReport.php
 */
class WeatherReportMapper
{


    /**
     *  Constructor.
     */
    public function __construct()
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
        $obj = self::parseJson($json);

        $weatherReport = new WeatherReport();
        if (isset($obj->dt) === true) {
            $weatherReport->setDate($obj->dt);
        }

        if (isset($obj->sys->sunrise) === true) {
            $weatherReport->setSunrise($obj->sys->sunrise);
        }

        if (isset($obj->sys->sunset) === true) {
            $weatherReport->setSunset($obj->sys->sunset);
        }

        if (isset($obj->main->temp) === true) {
            $weatherReport->setTemperature($obj->main->temp);
        }

        if (isset($obj->main->temp_min) === true) {
            $weatherReport->setMinTemperature($obj->main->temp_min);
        }

        if (isset($obj->main->temp_max) === true) {
            $weatherReport->setMaxTemperature($obj->main->temp_max);
        }

        if (isset($obj->main->humidity) === true) {
            $weatherReport->setHumidity($obj->main->humidity);
        }

        if (isset($obj->main->pressure) === true) {
            $weatherReport->setPressure($obj->main->pressure);
        }

        if (isset($obj->main->sea_level) === true) {
            $weatherReport->setSeaLevelPressure($obj->main->sea_level);
        }

        if (isset($obj->main->grnd_level) === true) {
            $weatherReport->setGroundLevelPressure($obj->main->grnd_level);
        }

        if (isset($obj->wind->speed) === true) {
            $weatherReport->setWindSpeed($obj->wind->speed);
        }

        if (isset($obj->wind->deg) === true) {
            $weatherReport->setWindDirection($obj->wind->deg);
        }

        if (isset($obj->wind->gust) === true) {
            $weatherReport->setWindGusts($obj->wind->gust);
        }

        if (isset($obj->clouds->all) === true) {
            $weatherReport->setCloudiness($obj->clouds->all);
        }

        $field = '3h';
        if (isset($obj->rain->$field) === true) {
            $weatherReport->setRainPrecipitationVolume($obj->rain->$field);
        }

        if (isset($obj->snow->$field) === true) {
            $weatherReport->setSnowPrecipitationVolume($obj->snow->$field);
        }

        return $weatherReport;

    }//end mapCurrentJsonToPhp()


    /**
     * Parse json data.
     *
     * @param String $json Unparsed json data
     *
     * @return Object Parsed json data
     */
    public static function parseJson($json)
    {
        return json_decode($json);

    }//end parseJson()


}//end class

?>