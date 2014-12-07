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