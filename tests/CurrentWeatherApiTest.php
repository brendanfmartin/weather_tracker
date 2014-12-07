<?php

namespace UnitTests;

use OpenWeather\CurrentWeatherApi;

/**
 * Test suite for CurrentWeatherApi class.
 *
 * @category Tests
 * @package  UnitTests
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/tests/CurrentWeatherApiTests.php
 */
class CurrentWeatherApiTests extends \PHPUnit_Framework_TestCase
{


    /**
     * Test getCurrentWeatherByName method of CurrentWeatherApi class.
     *
     * @return Void
     */
    public function testGetCurrentWeatherByName()
    {
        $results = CurrentWeatherApi::getCurrentWeatherByName('Philadelphia,us');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);

    }//end testGetCurrentWeatherByName()


    /**
     * Test getCurrentWeatherById method of CurrentWeatherApi class.
     *
     * @return Void
     */
    public function testGetCurrentWeatherById()
    {
        $results = CurrentWeatherApi::getCurrentWeatherById('4560349');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);

    }//end testGetCurrentWeatherById()


    /**
     * Test getCurrentWeatherByLatLong method of CurrentWeatherApi class.
     *
     * @return Void
     */
    public function testGetCurrentWeatherByLatLong()
    {
        $results = CurrentWeatherApi::getCurrentWeatherByLatLong('-75.16', '39.95', '10');

        $data = json_decode($results);

        $this->assertEquals(200, $data->cod);

    }//end testGetCurrentWeatherByLatLong()


}//end class

?>