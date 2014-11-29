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
            $weatherReport->setForecastDate($obj->dt);
            $weatherReport->setCreationDate($obj->dt);
            $weatherReport->setCreatedAt($obj->dt);
            $weatherReport->setUpdatedAt($obj->dt);
        }

        if (isset($obj->main->temp_min) === true) {
            $weatherReport->setForecastedLow($obj->main->temp_min);
        }

        if (isset($obj->main->temp_max) === true) {
            $weatherReport->setForecastedHigh($obj->main->temp_max);
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