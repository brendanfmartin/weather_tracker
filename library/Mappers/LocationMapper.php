<?php

namespace Mappers;

use Models\Location;
use Database\WeatherDB;

/**
 * Location Mapper.
 *
 * @category Library
 * @package  Mappers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Mappers/LocationMapper.php
 */
class LocationMapper
{


    /**
     *  Hidden constructor.
     */
    private function __construct()
    {

    }//end __construct()


    /**
     * Map current json data to PHP Location object.
     *
     * @param Object $object Generic json converted Php Object
     *
     * @return Location Parsed Location object
     */
    public static function mapGenericToLocation($object)
    {
        $location = new Location();
        if (isset($object->id) === true) {
            $location->setId($object->id);
        }

        if (isset($object->name) === true) {
            $location->setLocationName($object->name);
        }

        if (isset($object->coord->lon) === true) {
            $location->setLongitude($object->coord->lon);
        }

        if (isset($object->coord->lat) === true) {
            $location->setLatitude($object->coord->lat);
        }

        return $location;

    }//end mapGenericToLocation()


    /**
     * Private utility method for mapping Db result to PHP object.
     *
     * @param pg_query_params $result Return value for db query
     *
     * @return Location Parsed Location object
     */
    private static function _mapDbToPhp($result)
    {
        $location = new Location();
        $location->setId($result['id']);
        $location->setLocationName($result['name']);
        $location->setLongitude($result['longitude']);
        $location->setLatitude($result['latitude']);

        return $location;

    }//end _mapDbToPhp()


    /**
     * Delete Location object to database.
     *
     * @param Location $location Object to delete
     *
     * @return Boolean Success indicator
     */
    public static function deleteLocation(Location $location)
    {
        $locationId = $location->getId();
        $params     = array('id' => $locationId);

        $db = WeatherDB::getInstance();
        return $db->delete('locations', $params);

    }//end deleteLocation()


    /**
     * Persist Location object to database.
     *
     * @param Location $location Object to persist
     *
     * @return Boolean Success indicator
     */
    public static function persistLocation(Location $location)
    {
        $result = self::_updateLocation($location);

        if ($result === false) {
            $result = self::_insertLocation($location);
        }

        return $result;

    }//end persistLocation()


    /**
     * Populates PHP Location object from database.
     *
     * @param int $id Location id
     *
     * @return Location object or Boolean false indicating failure
     */
    public static function getLocation($id)
    {
        $selectQuery = file_get_contents(__DIR__.'/queries/selectLocation.sql');
        $db          = WeatherDB::getInstance();

        $params = array('id' => $id);

        $queryResults = $db->query($selectQuery, $params);

        if ($queryResults !== false) {
            $result = pg_affected_rows($queryResults) !== 0;

            if ($result === true) {
                $result = self::_mapDbToPhp(pg_fetch_assoc($queryResults, 0));
            }
        } else {
            $result = false;
        }

        return $result;

    }//end getLocation()


    /**
     * Populates all PHP Location objects from database.
     *
     * @return Location object array
     */
    public static function getAllLocations()
    {
        $selectQuery = file_get_contents(__DIR__.'/queries/selectAllLocations.sql');
        $db          = WeatherDB::getInstance();

        $queryResults = $db->query($selectQuery, array());

        $locations = array();
        if ($queryResults !== false) {
            while ($locationRow = pg_fetch_assoc($queryResults)) {
                array_push($locations, self::_mapDbToPhp($locationRow));
            }
        }

        return $locations;

    }//end getAllLocations()


    /**
     * Update Location object to database.
     *
     * @param Location $location Object to update
     *
     * @return Boolean Success indicator
     */
    private static function _updateLocation(Location $location)
    {
        $updateQuery = file_get_contents(__DIR__.'/queries/updateLocation.sql');

        $params = array(
                   $location->getId(),
                   $location->getLocationName(),
                   $location->getLongitude(),
                   $location->getLatitude(),
                  );

        $db     = WeatherDB::getInstance();
        $result = $db->query($updateQuery, $params);

        if ($result !== false) {
            $result = pg_affected_rows($result) !== 0;
        }

        return $result;

    }//end _updateLocation()


    /**
     * Insert Location object to database.
     *
     * @param Location $location Object to insert
     *
     * @return Boolean Success indicator
     */
    private static function _insertLocation(Location $location)
    {
        $insertQuery = file_get_contents(__DIR__.'/queries/insertLocation.sql');

        $params = array(
                   $location->getId(),
                   $location->getLocationName(),
                   $location->getLongitude(),
                   $location->getLatitude(),
                  );

        $db     = WeatherDB::getInstance();
        $result = $db->query($insertQuery, $params);

        if ($result !== false) {
            $result = pg_affected_rows($result) !== 0;
        }

        return $result;

    }//end _insertLocation()


}//end class

?>