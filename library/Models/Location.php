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
class Location extends BaseModel
{

    public $id;

    public $locationName;

    public $longitude;

    public $latitude;


    /**
     * Constructor.
     *
     * @param mixed $parameters Array or object with parameters defining model.
     */
    public function __construct($parameters=null)
    {
        parent::__construct($parameters);

    }//end __construct()


    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;

    }//end getId()


    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;

    }//end setId()


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
     * @param $tring $locationName the location Name
     *
     * @return self
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;

        return $this;

    }//end setLocationName()


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