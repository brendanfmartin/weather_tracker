<?php

namespace Mappers;

use Models\Location;

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
     * @param String $json Unparsed json data
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

    }//end mapCurrentJsonToPhp()
}

?>