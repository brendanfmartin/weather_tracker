<?php

namespace Mappers;

use Models\Location;

/**
 * Location JSON Mapper.
 *
 * @category Library
 * @package  Mappers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Mappers/LocationJsonMapper.php
 */
class LocationJsonMapper
{


    /**
     *  Hidden constructor.
     */
    private function __construct()
    {

    }//end __construct()


    /**
     * Utility method for mapping json to PHP object.
     *
     * @param Object $object Generic json converted Php Object
     *
     * @return Location Parsed Location object
     */
    public static function mapJsonObject($object)
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

    }//end mapJsonObject()


}//end class

?>