<?php

use OpenWeather\ForecastWeatherApi;

/**
 *  Test suite for ForecastWeatherApi class.
 */
class ForecastApiTests extends PHPUnit_Framework_TestCase
{

    /**
     *  Test getThreeHourForecastByName method of ForecastWeatherApi class.
     */
    public function testGetThreeHourForecastByName()
    {
        $results = ForecastWeatherApi::getThreeHourForecastByName('Philadelphia,us');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);
    }

    /**
     *  Test getThreeHourForecastById method of ForecastWeatherApi class.
     */
    public function testGetThreeHourForecastById()
    {
        $results = ForecastWeatherApi::getThreeHourForecastById('4560349');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);
    }

    /**
     *  Test getThreeHourForecastByLatLong method of ForecastWeatherApi class.
     */
    public function testGetThreeHourForecastByLatLong()
    {
        $results = ForecastWeatherApi::getThreeHourForecastByLatLong('-75.16', '39.95', '10');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);
    }

    /**
     *  Test getDailyForecastByName method of ForecastWeatherApi class.
     */
    public function testGetDailyForecastByName()
    {
        $results = ForecastWeatherApi::getDailyForecastByName('Philadelphia,us', 5);

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);
    }

    /**
     *  Test getDailyForecastById method of ForecastWeatherApi class.
     */
    public function testGetDailyForecastById()
    {
        $results = ForecastWeatherApi::getDailyForecastById('4560349', 5);

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);
    }

    /**
     *  Test getDailyForecastByLatLong method of ForecastWeatherApi class.
     */
    public function testDailyHourForecastByLatLong()
    {
        $results = ForecastWeatherApi::getDailyForecastByLatLong('-75.16', '39.95', 5);

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);
    }

    /**
     *  Test getDailyForecastByName method of ForecastWeatherApi class.
     *
     *  @expectedException InvalidArgumentException
     */
    public function testGetDailyForecastByNameMinDays()
    {
        $results = ForecastWeatherApi::getDailyForecastByName('Philadelphia,us', 0);
    }

    /**
     *  Test getDailyForecastById method of ForecastWeatherApi class.
     *
     *  @expectedException InvalidArgumentException
     */
    public function testGetDailyForecastByIdMinDays()
    {
        $results = ForecastWeatherApi::getDailyForecastById('4560349', 0);
    }

    /**
     *  Test getDailyForecastByLatLong method of ForecastWeatherApi class.
     *
     *  @expectedException InvalidArgumentException
     */
    public function testDailyHourForecastByLatLongMinDays()
    {
        $results = ForecastWeatherApi::getDailyForecastByLatLong('-75.16', '39.95', 0);
    }

    /**
     *  Test getDailyForecastByName method of ForecastWeatherApi class.
     *
     *  @expectedException InvalidArgumentException
     */
    public function testGetDailyForecastByNameMaxDays()
    {
        $results = ForecastWeatherApi::getDailyForecastByName('Philadelphia,us', 17);
    }

    /**
     *  Test getDailyForecastById method of ForecastWeatherApi class.
     *
     *  @expectedException InvalidArgumentException
     */
    public function testGetDailyForecastByIdMaxDays()
    {
        $results = ForecastWeatherApi::getDailyForecastById('4560349', 18);
    }

    /**
     *  Test getDailyForecastByLatLong method of ForecastWeatherApi class.
     *
     *  @expectedException InvalidArgumentException
     */
    public function testDailyHourForecastByLatLongMaxDays()
    {
        $results = ForecastWeatherApi::getDailyForecastByLatLong('-75.16', '39.95', 19);
    }
}

?>