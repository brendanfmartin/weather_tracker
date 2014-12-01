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
        $obj = self::parseJson($json);

        $weatherReport = new WeatherReport();

        $weatherReport->setIsForecast(false);

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
     * Map forecast json data to PHP WeatherReport objects.
     *
     * @param String $json Unparsed json data
     *
     * @return Array Parsed Array of WeatherReport objects
     */
    public static function mapForecastJsonToPhp($json)
    {
        $obj = self::parseJson($json);

        $weatherReports = array();
        foreach ($obj->list as $report) {
            $weatherReport = new WeatherReport();

            $weatherReport->setIsForecast(true);

            if (isset($report->dt) === true) {
                $weatherReport->setDate($report->dt);
            }

            if (isset($report->sys->sunrise) === true) {
                $weatherReport->setSunrise($report->sys->sunrise);
            }

            if (isset($report->sys->sunset) === true) {
                $weatherReport->setSunset($report->sys->sunset);
            }

            if (isset($report->main->temp) === true) {
                $weatherReport->setTemperature($report->main->temp);
            }

            if (isset($report->main->temp_min) === true) {
                $weatherReport->setMinTemperature($report->main->temp_min);
            }

            if (isset($report->main->temp_max) === true) {
                $weatherReport->setMaxTemperature($report->main->temp_max);
            }

            if (isset($report->main->humidity) === true) {
                $weatherReport->setHumidity($report->main->humidity);
            }

            if (isset($report->main->pressure) === true) {
                $weatherReport->setPressure($report->main->pressure);
            }

            if (isset($report->main->sea_level) === true) {
                $weatherReport->setSeaLevelPressure($report->main->sea_level);
            }

            if (isset($report->main->grnd_level) === true) {
                $weatherReport->setGroundLevelPressure($report->main->grnd_level);
            }

            if (isset($report->wind->speed) === true) {
                $weatherReport->setWindSpeed($report->wind->speed);
            }

            if (isset($report->wind->deg) === true) {
                $weatherReport->setWindDirection($report->wind->deg);
            }

            if (isset($report->wind->gust) === true) {
                $weatherReport->setWindGusts($report->wind->gust);
            }

            if (isset($report->clouds->all) === true) {
                $weatherReport->setCloudiness($report->clouds->all);
            }

            $field = '3h';
            if (isset($report->rain->$field) === true) {
                $weatherReport->setRainPrecipitationVolume($report->rain->$field);
            }

            if (isset($report->snow->$field) === true) {
                $weatherReport->setSnowPrecipitationVolume($report->snow->$field);
            }

            array_push($weatherReports, $weatherReport);
        }//end foreach

        return $weatherReports;

    }//end mapForecastJsonToPhp()


    /**
     * Persist current PHP WeatherReport object to database.
     *
     * @param WeatherReport $report Object to persist
     *
     * @return Boolean Success indicator
     */
    public static function persistCurrentReport(WeatherReport $report)
    {
        return false;

    }//end persistCurrentReport()


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