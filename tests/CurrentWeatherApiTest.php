<?php

use OpenWeather\CurrentWeatherApi;

/**
 *  Test suite for CurrentWeatherApi class.
 */
class CurrentWeatherApiTests extends PHPUnit_Framework_TestCase
{

    /**
     *  Test getCurrentWeatherByName method of CurrentWeatherApi class.
     */
    public function testGetCurrentWeatherByName()
    {
        $results = CurrentWeatherApi::getCurrentWeatherByName('Philadelphia,us');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);
    }

    /**
     *  Test getCurrentWeatherById method of CurrentWeatherApi class.
     */
    public function testGetCurrentWeatherById()
    {
        $results = CurrentWeatherApi::getCurrentWeatherById('4560349');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);
    }

    /**
     *  Test getCurrentWeatherByLatLong method of CurrentWeatherApi class.
     */
    public function testGetCurrentWeatherByLatLong()
    {
        $results = CurrentWeatherApi::getCurrentWeatherByLatLong('-75.16', '39.95', '10');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);
    }
}

?>