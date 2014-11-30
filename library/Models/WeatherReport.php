<?php

namespace Models;

/**
 * Weather Report Model.
 *
 * @category Library
 * @package  Models
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Models/WeatherReport.php
 */
class WeatherReport
{

    /**
     * Date receiving time, unix time, GMT.
     */
    public $date;

    /**
     * Location class.
     */
    public $location;

    /**
     * Sunrise time, unix, UTC.
     */
    public $sunrise;

    /**
     * Sunset time, unix, UTC.
     */
    public $sunset;

    /**
     * Temperature, Kelvin.
     */
    public $temperature;

    /**
     * This is deviation from current temp that is possible for large cities.
     */
    public $minTemperature;

    /**
     * This is deviation from current temp that is possible for large cities.
     */
    public $maxTemperature;

    /**
     * Percentage.
     */
    public $humidity;

    /**
     * Atmospheric pressure (on the sea level, if there is no sea_level or grnd_level data), hPa.
     */
    public $pressure;

    /**
     * Atmospheric pressure on the sea level, hPa.
     */
    public $seaLevelPressure;

    /**
     * Atmospheric pressure on the ground level, hPa.
     */
    public $groundLevelPressure;

    /**
     * Wind speed, mps.
     */
    public $windSpeed;

    /**
     * Wind direction, degrees (meteorological)
     */
    public $windDirection;

    /**
     * Wind gust, mps.
     */
    public $windGusts;

    /**
     * Percentage.
     */
    public $cloudiness;

    /**
     * Precipitation volume for last 3 hours, mm.
     */
    public $rainPrecipitationVolume;

    /**
     * Snow precipitation volume for last 3 hours, mm.
     */
    public $snowPrecipitationVolume;


    /**
     *  Constructor.
     */
    public function __construct()
    {

    }//end __construct()


    /**
     * Gets the Date receiving time, unix time, GMT.
     *
     * @return String
     */
    public function getDate()
    {
        return $this->date;

    }//end getDate()


    /**
     * Sets the Date receiving time, unix time, GMT.
     *
     * @param String $date the recieve date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;

    }//end setDate()


    /**
     * Gets the Location class.
     *
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;

    }//end getLocation()


    /**
     * Sets the Location.
     *
     * @param Location $location the location
     *
     * @return self
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;

    }//end setLocation()


    /**
     * Gets the Sunrise time, unix, UTC.
     *
     * @return String
     */
    public function getSunrise()
    {
        return $this->sunrise;

    }//end getSunrise()


    /**
     * Sets the Sunrise time, unix, UTC.
     *
     * @param String $sunrise the sunrise
     *
     * @return self
     */
    public function setSunrise($sunrise)
    {
        $this->sunrise = $sunrise;

        return $this;

    }//end setSunrise()


    /**
     * Gets the Sunset time, unix, UTC.
     *
     * @return String
     */
    public function getSunset()
    {
        return $this->sunset;

    }//end getSunset()


    /**
     * Sets the Sunset time, unix, UTC.
     *
     * @param String $sunset the sunset
     *
     * @return self
     */
    public function setSunset($sunset)
    {
        $this->sunset = $sunset;

        return $this;

    }//end setSunset()


    /**
     * Gets the Temperature, Kelvin.
     *
     * @return String
     */
    public function getTemperature()
    {
        return $this->temperature;

    }//end getTemperature()


    /**
     * Sets the Temperature, Kelvin.
     *
     * @param String $temperature the temperature
     *
     * @return self
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;

    }//end setTemperature()


    /**
     * Gets the min temperature in Kelvins.
     *
     * @return String
     */
    public function getMinTemperature()
    {
        return $this->minTemperature;

    }//end getMinTemperature()


    /**
     * Sets the the min temperature in Kelvins.
     *
     * @param String $minTemperature the min temperature
     *
     * @return self
     */
    public function setMinTemperature($minTemperature)
    {
        $this->minTemperature = $minTemperature;

        return $this;

    }//end setMinTemperature()


    /**
     * Gets the max temperature in Kelvins.
     *
     * @return String
     */
    public function getMaxTemperature()
    {
        return $this->maxTemperature;

    }//end getMaxTemperature()


    /**
     * Sets the max temperature in Kelvins.
     *
     * @param String $maxTemperature the max temperature
     *
     * @return self
     */
    public function setMaxTemperature($maxTemperature)
    {
        $this->maxTemperature = $maxTemperature;

        return $this;

    }//end setMaxTemperature()


    /**
     * Gets the humidity percentage.
     *
     * @return String
     */
    public function getHumidity()
    {
        return $this->humidity;

    }//end getHumidity()


    /**
     * Sets the humidity percentage.
     *
     * @param String $humidity the humidity
     *
     * @return self
     */
    public function setHumidity($humidity)
    {
        $this->humidity = $humidity;

        return $this;

    }//end setHumidity()


    /**
     * Gets the Atmospheric pressure (on the sea level, if there is no sea_level or grnd_level data), hPa.
     *
     * @return String
     */
    public function getPressure()
    {
        return $this->pressure;

    }//end getPressure()


    /**
     * Sets the Atmospheric pressure (on the sea level, if there is no sea_level or grnd_level data), hPa.
     *
     * @param String $pressure the pressure
     *
     * @return self
     */
    public function setPressure($pressure)
    {
        $this->pressure = $pressure;

        return $this;

    }//end setPressure()


    /**
     * Gets the Atmospheric pressure on the sea level, hPa.
     *
     * @return String
     */
    public function getSeaLevelPressure()
    {
        return $this->seaLevelPressure;

    }//end getSeaLevelPressure()


    /**
     * Sets the Atmospheric pressure on the sea level, hPa.
     *
     * @param String $seaLevelPressure the sea level pressure
     *
     * @return self
     */
    public function setSeaLevelPressure($seaLevelPressure)
    {
        $this->seaLevelPressure = $seaLevelPressure;

        return $this;

    }//end setSeaLevelPressure()


    /**
     * Gets the Atmospheric pressure on the ground level, hPa.
     *
     * @return String
     */
    public function getGroundLevelPressure()
    {
        return $this->groundLevelPressure;

    }//end getGroundLevelPressure()


    /**
     * Sets the Atmospheric pressure on the ground level, hPa.
     *
     * @param String $groundLevelPressure the ground level pressure
     *
     * @return self
     */
    public function setGroundLevelPressure($groundLevelPressure)
    {
        $this->groundLevelPressure = $groundLevelPressure;

        return $this;

    }//end setGroundLevelPressure()


    /**
     * Gets the Wind speed, mps.
     *
     * @return String
     */
    public function getWindSpeed()
    {
        return $this->windSpeed;

    }//end getWindSpeed()


    /**
     * Sets the Wind speed, mps.
     *
     * @param String $windSpeed the wind speed
     *
     * @return self
     */
    public function setWindSpeed($windSpeed)
    {
        $this->windSpeed = $windSpeed;

        return $this;

    }//end setWindSpeed()


    /**
     * Gets the Wind direction, degrees (meteorological).
     *
     * @return String
     */
    public function getWindDirection()
    {
        return $this->windDirection;

    }//end getWindDirection()


    /**
     * Sets the Wind direction, degrees (meteorological).
     *
     * @param String $windDirection the wind direction
     *
     * @return self
     */
    public function setWindDirection($windDirection)
    {
        $this->windDirection = $windDirection;

        return $this;

    }//end setWindDirection()


    /**
     * Gets the Wind gust, mps.
     *
     * @return String
     */
    public function getWindGusts()
    {
        return $this->windGusts;

    }//end getWindGusts()


    /**
     * Sets the Wind gust, mps.
     *
     * @param String $windGusts the wind gusts
     *
     * @return self
     */
    public function setWindGusts($windGusts)
    {
        $this->windGusts = $windGusts;

        return $this;

    }//end setWindGusts()


    /**
     * Gets the cloudiness percentage.
     *
     * @return String
     */
    public function getCloudiness()
    {
        return $this->cloudiness;

    }//end getCloudiness()


    /**
     * Sets the cloudiness percentage.
     *
     * @param String $cloudiness the cloudiness
     *
     * @return self
     */
    public function setCloudiness($cloudiness)
    {
        $this->cloudiness = $cloudiness;

        return $this;

    }//end setCloudiness()


    /**
     * Gets the Precipitation volume for last 3 hours, mm.
     *
     * @return String
     */
    public function getRainPrecipitationVolume()
    {
        return $this->rainPrecipitationVolume;

    }//end getRainPrecipitationVolume()


    /**
     * Sets the Precipitation volume for last 3 hours, mm.
     *
     * @param String $rainPrecipitationVolume the rain precipitation volume
     *
     * @return self
     */
    public function setRainPrecipitationVolume($rainPrecipitationVolume)
    {
        $this->rainPrecipitationVolume = $rainPrecipitationVolume;

        return $this;

    }//end setRainPrecipitationVolume()


    /**
     * Gets the Snow precipitation volume for last 3 hours, mm.
     *
     * @return String
     */
    public function getSnowPrecipitationVolume()
    {
        return $this->snowPrecipitationVolume;

    }//end getSnowPrecipitationVolume()


    /**
     * Sets the Snow precipitation volume for last 3 hours, mm.
     *
     * @param String $snowPrecipitationVolume the snow precipitation volume
     *
     * @return self
     */
    public function setSnowPrecipitationVolume($snowPrecipitationVolume)
    {
        $this->snowPrecipitationVolume = $snowPrecipitationVolume;

        return $this;

    }//end setSnowPrecipitationVolume()



}//end class

?>