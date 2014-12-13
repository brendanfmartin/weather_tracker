<?php

namespace Mappers;

use Models\WeatherReport;
use Models\Location;
use Database\WeatherDB;

/**
 * Weather Report Mapper for database.
 *
 * @category Library
 * @package  Mappers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Mappers/WeatherReportDbMapper.php
 */
class WeatherReportDbMapper
{


    /**
     *  Hidden constructor.
     */
    private function __construct()
    {

    }//end __construct()


    /**
     * Delete current PHP WeatherReport object from database.
     *
     * @param WeatherReport $weatherReport Object to delete
     *
     * @return Boolean Success indicator
     */
    public static function deleteCurrentReport(WeatherReport $weatherReport)
    {
        $db = WeatherDB::getInstance();

        if (empty($weatherReport->getId()) === false) {
            $params = array('id' => $weatherReport->getId());
        } else {
            $params = array(
                       'location_id' => $weatherReport->getLocation()->getId(),
                       'report_date' => $weatherReport->getDate(),
                      );
        }

        return $db->delete('weather_reports', $params);

    }//end deleteCurrentReport()


    /**
     * Persist current PHP WeatherReport object to database.
     *
     * @param WeatherReport $weatherReport Object to persist
     *
     * @return Boolean Success indicator
     */
    public static function persistCurrentReport(WeatherReport $weatherReport)
    {
        $result = LocationDbMapper::persistLocation($weatherReport->getLocation());

        if ($result === true) {
            if (empty($weatherReport->getId()) === true) {
                $result = self::_insertWeatherReport($weatherReport);
            } else {
                $result = self::_updateWeatherReport($weatherReport);
            }
        }

        return $result;

    }//end persistCurrentReport()


    /**
     * Populates PHP WeatherReport object from database.
     *
     * @param Location $location   Location of desired report
     * @param Date     $date       Date of desired repo
     * @param Boolean  $isForecast Indicated forecast or actual data
     *
     * @return WeatherReport object or Boolean false indicating failure
     */
    public static function getCurrentReport(Location $location, $date, $isForecast)
    {
        $selectQuery = file_get_contents(__DIR__.'/queries/selectWeatherReport.sql');
        $db          = WeatherDB::getInstance();

        if (is_bool($isForecast) !== false) {
            if ($isForecast === true) {
                $isForecast = 'true';
            } else {
                $isForecast = 'false';
            }
        }

        $params = array(
                   'id'          => null,
                   'location_id' => $location->getId(),
                   'report_date' => $date,
                   'is_forecast' => $isForecast,
                  );

        $queryResults = $db->query($selectQuery, $params);

        if ($queryResults !== false) {
            $result = pg_affected_rows($queryResults) !== 0;

            if ($result === true) {
                $rowData = pg_fetch_assoc($queryResults, 0);
                $result  = self::_mapDbToPhp($rowData);

                $location = LocationDbMapper::getLocation($rowData['location_id']);

                if ($location !== false) {
                    $result->setLocation($location);
                }
            }
        } else {
            $result = false;
        }

        return $result;

    }//end getCurrentReport()


    /**
     * Update WeatherReport object to database.
     *
     * @param WeatherReport $weatherReport Object to update
     *
     * @return Boolean Success indicator
     */
    private static function _updateWeatherReport(WeatherReport $weatherReport)
    {
        $updateQuery = file_get_contents(__DIR__.'/queries/updateWeatherReport.sql');

        $isForecast = 'false';
        if ($weatherReport->getIsForecast() === true) {
            $isForecast = 'true';
        }

        $params = array(
                   $weatherReport->getId(),
                   $weatherReport->getLocation()->getId(),
                   $isForecast,
                   $weatherReport->getDate(),
                   $weatherReport->getSunrise(),
                   $weatherReport->getSunset(),
                   $weatherReport->getTemperature(),
                   $weatherReport->getMinTemperature(),
                   $weatherReport->getMaxTemperature(),
                   $weatherReport->getHumidity(),
                   $weatherReport->getPressure(),
                   $weatherReport->getSeaLevelPressure(),
                   $weatherReport->getGroundLevelPressure(),
                   $weatherReport->getWindSpeed(),
                   $weatherReport->getWindDirection(),
                   $weatherReport->getWindGusts(),
                   $weatherReport->getCloudiness(),
                   $weatherReport->getRainPrecipitationVolume(),
                   $weatherReport->getSnowPrecipitationVolume(),
                  );

        $db     = WeatherDB::getInstance();
        $result = $db->query($updateQuery, $params);

        if ($result !== false) {
            $result = pg_affected_rows($result) !== 0;
        }

        return $result;

    }//end _updateWeatherReport()


    /**
     * Insert weatherReport object to database.
     *
     * @param weatherReport $weatherReport Object to insert
     *
     * @return Boolean Success indicator
     */
    private static function _insertWeatherReport(WeatherReport $weatherReport)
    {
        $insertQuery = file_get_contents(__DIR__.'/queries/insertWeatherReport.sql');

        $isForecast = 'false';
        if ($weatherReport->getIsForecast() === true) {
            $isForecast = 'true';
        }

        $params = array(
                   $weatherReport->getLocation()->getId(),
                   $isForecast,
                   $weatherReport->getDate(),
                   $weatherReport->getSunrise(),
                   $weatherReport->getSunset(),
                   $weatherReport->getTemperature(),
                   $weatherReport->getMinTemperature(),
                   $weatherReport->getMaxTemperature(),
                   $weatherReport->getHumidity(),
                   $weatherReport->getPressure(),
                   $weatherReport->getSeaLevelPressure(),
                   $weatherReport->getGroundLevelPressure(),
                   $weatherReport->getWindSpeed(),
                   $weatherReport->getWindDirection(),
                   $weatherReport->getWindGusts(),
                   $weatherReport->getCloudiness(),
                   $weatherReport->getRainPrecipitationVolume(),
                   $weatherReport->getSnowPrecipitationVolume(),
                  );

        $db           = WeatherDB::getInstance();
        $queryResults = $db->query($insertQuery, $params);

        if ($queryResults !== false) {
            $result = pg_affected_rows($queryResults) !== 0;

            if ($result === true) {
                $insertedReport = self::getCurrentReport(
                    $weatherReport->getLocation(),
                    $weatherReport->getDate(),
                    $isForecast
                );
                $weatherReport->setId($insertedReport->getId());
            }
        } else {
            $result = false;
        }

        return $result;

    }//end _insertWeatherReport()


    /**
     * Private utility method for mapping Db result to PHP object.
     *
     * @param pg_query_params $result Return value for db query
     *
     * @return WeatherReport Parsed WeatherReport object
     */
    private static function _mapDbToPhp($result)
    {
        $weatherReport = new WeatherReport();
        $weatherReport->setId($result['id']);

        $isForecast = false;
        if ($result['is_forecast'] === 'true') {
            $isForecast = true;
        }

        $weatherReport->setIsForecast($isForecast);
        $weatherReport->setDate($result['report_date']);
        $weatherReport->setSunrise($result['sunrise']);
        $weatherReport->setSunset($result['sunset']);
        $weatherReport->setTemperature($result['temperature']);
        $weatherReport->setMinTemperature($result['mintemperature']);
        $weatherReport->setMaxTemperature($result['maxtemperature']);
        $weatherReport->setHumidity($result['humidity']);
        $weatherReport->setPressure($result['pressure']);
        $weatherReport->setSeaLevelPressure($result['sealevel_pressure']);
        $weatherReport->setGroundLevelPressure($result['groundlevel_pressure']);
        $weatherReport->setWindSpeed($result['wind_speed']);
        $weatherReport->setWindDirection($result['wind_direction']);
        $weatherReport->setWindGusts($result['wind_gusts']);
        $weatherReport->setCloudiness($result['cloudiness']);
        $weatherReport->setRainPrecipitationVolume($result['rain_precipitation_volume']);
        $weatherReport->setSnowPrecipitationVolume($result['snow_precipitation_volume']);

        return $weatherReport;

    }//end _mapDbToPhp()


}//end class

?>