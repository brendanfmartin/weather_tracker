<?php

namespace Models;

/**
 * Forecast Weather Report Model.
 *
 * @category Library
 * @package  Models
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Models/ForecastWeatherReport.php
 */
class ForecastWeatherReport
{

    public $location;

    public $forecastDate;

    public $creationDate;

    public $forecastedHigh;

    public $forecastedLow;

    public $precipitation;

    public $createdAt;

    public $updatedAt;


    /**
     *  Constructor.
     */
    public function __construct()
    {

    }//end __construct()


    /**
     * Gets the value of location.
     *
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;

    }//end getLocation()


    /**
     * Sets the value of location.
     *
     * @param mixed $location the location
     *
     * @return self
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;

        return $this;

    }//end setLocation()


    /**
     * Gets the value of forecastDate.
     *
     * @return mixed
     */
    public function getForecastDate()
    {
        return $this->forecastDate;

    }//end getForecastDate()


    /**
     * Sets the value of forecastDate.
     *
     * @param mixed $forecastDate the forecast date
     *
     * @return self
     */
    public function setForecastDate($forecastDate)
    {
        $this->forecastDate = $forecastDate;

        return $this;

    }//end setForecastDate()


    /**
     * Gets the value of creationDate.
     *
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;

    }//end getCreationDate()


    /**
     * Sets the value of creationDate.
     *
     * @param mixed $creationDate the creation date
     *
     * @return self
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;

    }//end setCreationDate()


    /**
     * Gets the value of forecastedHigh.
     *
     * @return mixed
     */
    public function getForecastedHigh()
    {
        return $this->forecastedHigh;

    }//end getForecastedHigh()


    /**
     * Sets the value of forecastedHigh.
     *
     * @param mixed $forecastedHigh the forecasted high
     *
     * @return self
     */
    public function setForecastedHigh($forecastedHigh)
    {
        $this->forecastedHigh = $forecastedHigh;

        return $this;

    }//end setForecastedHigh()


    /**
     * Gets the value of forecastedLow.
     *
     * @return mixed
     */
    public function getForecastedLow()
    {
        return $this->forecastedLow;

    }//end getForecastedLow()


    /**
     * Sets the value of forecastedLow.
     *
     * @param mixed $forecastedLow the forecasted low
     *
     * @return self
     */
    public function setForecastedLow($forecastedLow)
    {
        $this->forecastedLow = $forecastedLow;

        return $this;

    }//end setForecastedLow()


    /**
     * Gets the value of precipitation.
     *
     * @return mixed
     */
    public function getPrecipitation()
    {
        return $this->precipitation;

    }//end getPrecipitation()


    /**
     * Sets the value of precipitation.
     *
     * @param mixed $precipitation the precipitation
     *
     * @return self
     */
    public function setPrecipitation($precipitation)
    {
        $this->precipitation = $precipitation;

        return $this;

    }//end setPrecipitation()


    /**
     * Gets the value of createdAt.
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;

    }//end getCreatedAt()


    /**
     * Sets the value of createdAt.
     *
     * @param mixed $createdAt the created at
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;

    }//end setCreatedAt()


    /**
     * Gets the value of updatedAt.
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;

    }//end getUpdatedAt()


    /**
     * Sets the value of updatedAt.
     *
     * @param mixed $updatedAt the updated at
     *
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;

    }//end setUpdatedAt()


}//end class

?>