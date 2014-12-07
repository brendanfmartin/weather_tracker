<?php

namespace UnitTests;

use OpenWeather\ForecastWeatherApi;

/**
 * Test suite for ForecastWeatherApi class.
 *
 * @category Tests
 * @package  UnitTests
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/tests/ForecastApiTests.php
 */
class ForecastApiTests extends \PHPUnit_Framework_TestCase
{


    /**
     * Test getThreeHourForecastByName method of ForecastWeatherApi class.
     *
     * @return Void
     */
    public function testGetThreeHourForecastByName()
    {
        $results = ForecastWeatherApi::getThreeHourForecastByName('Philadelphia,us');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);

    }//end testGetThreeHourForecastByName()


    /**
     * Test getThreeHourForecastById method of ForecastWeatherApi class.
     *
     * @return Void
     */
    public function testGetThreeHourForecastById()
    {
        $results = ForecastWeatherApi::getThreeHourForecastById('4560349');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);

    }//end testGetThreeHourForecastById()


    /**
     * Test getThreeHourForecastByLatLong method of ForecastWeatherApi class.
     *
     * @return Void
     */
    public function testGetThreeHourForecastByLatLong()
    {
        $results = ForecastWeatherApi::getThreeHourForecastByLatLong('-75.16', '39.95', '10');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);

    }//end testGetThreeHourForecastByLatLong()


    /**
     * Test getDailyForecastByName method of ForecastWeatherApi class.
     *
     * @return Void
     */
    public function testGetDailyForecastByName()
    {
        $results = ForecastWeatherApi::getDailyForecastByName('Philadelphia,us', 5);

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);

    }//end testGetDailyForecastByName()


    /**
     * Test getDailyForecastById method of ForecastWeatherApi class.
     *
     * @return Void
     */
    public function testGetDailyForecastById()
    {
        $results = ForecastWeatherApi::getDailyForecastById('4560349', 5);

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);

    }//end testGetDailyForecastById()


    /**
     * Test getDailyForecastByLatLong method of ForecastWeatherApi class.
     *
     * @return Void
     */
    public function testDailyHourForecastByLatLong()
    {
        $results = ForecastWeatherApi::getDailyForecastByLatLong('-75.16', '39.95', 5);

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);

    }//end testDailyHourForecastByLatLong()


    /**
     * Test getDailyForecastByName method of ForecastWeatherApi class.
     *
     * @expectedException InvalidArgumentException
     *
     * @return Void
     */
    public function testGetDailyForecastByNameMinDays()
    {
        $results = ForecastWeatherApi::getDailyForecastByName('Philadelphia,us', 0);

    }//end testGetDailyForecastByNameMinDays()


    /**
     * Test getDailyForecastById method of ForecastWeatherApi class.
     *
     * @expectedException InvalidArgumentException
     *
     * @return Void
     */
    public function testGetDailyForecastByIdMinDays()
    {
        $results = ForecastWeatherApi::getDailyForecastById('4560349', 0);

    }//end testGetDailyForecastByIdMinDays()


    /**
     * Test getDailyForecastByLatLong method of ForecastWeatherApi class.
     *
     * @expectedException InvalidArgumentException
     *
     * @return Void
     */
    public function testDailyHourForecastByLatLongMinDays()
    {
        $results = ForecastWeatherApi::getDailyForecastByLatLong('-75.16', '39.95', 0);

    }//end testDailyHourForecastByLatLongMinDays()


    /**
     * Test getDailyForecastByName method of ForecastWeatherApi class.
     *
     * @expectedException InvalidArgumentException
     *
     * @return Void
     */
    public function testGetDailyForecastByNameMaxDays()
    {
        $results = ForecastWeatherApi::getDailyForecastByName('Philadelphia,us', 17);

    }//end testGetDailyForecastByNameMaxDays()


    /**
     * Test getDailyForecastById method of ForecastWeatherApi class.
     *
     * @expectedException InvalidArgumentException
     *
     * @return Void
     */
    public function testGetDailyForecastByIdMaxDays()
    {
        $results = ForecastWeatherApi::getDailyForecastById('4560349', 18);

    }//end testGetDailyForecastByIdMaxDays()


    /**
     * Test getDailyForecastByLatLong method of ForecastWeatherApi class.
     *
     * @expectedException InvalidArgumentException
     *
     * @return Void
     */
    public function testDailyHourForecastByLatLongMaxDays()
    {
        $results = ForecastWeatherApi::getDailyForecastByLatLong('-75.16', '39.95', 19);

    }//end testDailyHourForecastByLatLongMaxDays()


}//end class

?>