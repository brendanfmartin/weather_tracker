<?php

namespace Models;

/**
 * Location Model.
 *
 * @category Library
 * @package  Models
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Models/Location.php
 */
class Location
{

    public $locationName;

    public $locationDescription;

    public $longitude;

    public $latitude;


    /**
     *  Constructor.
     */
    public function __construct()
    {

    }//end __construct()


    /**
     * Gets the value of locationName.
     *
     * @return mixed
     */
    public function getLocationName()
    {
        return $this->locationName;

    }//end getLocationName()


    /**
     * Sets the value of locationName.
     *
     * @param mixed $locationName the location name
     *
     * @return self
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;

        return $this;

    }//end setLocationName()


    /**
     * Gets the value of locationDescription.
     *
     * @return mixed
     */
    public function getLocationDescription()
    {
        return $this->locationDescription;

    }//end getLocationDescription()


    /**
     * Sets the value of locationDescription.
     *
     * @param mixed $locationDescription the location description
     *
     * @return self
     */
    public function setLocationDescription($locationDescription)
    {
        $this->locationDescription = $locationDescription;

        return $this;

    }//end setLocationDescription()


    /**
     * Gets the value of longitude.
     *
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;

    }//end getLongitude()


    /**
     * Sets the value of longitude.
     *
     * @param mixed $longitude the longitude
     *
     * @return self
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;

    }//end setLongitude()


    /**
     * Gets the value of latitude.
     *
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;

    }//end getLatitude()


    /**
     * Sets the value of latitude.
     *
     * @param mixed $latitude the latitude
     *
     * @return self
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;

    }//end setLatitude()


}//end class

?>