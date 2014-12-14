<?php

namespace UnitTests\Controllers;

use Controllers\ForecastsController;
use Mappers\LocationJsonMapper;
use Mappers\LocationDbMapper;
use Mappers\WeatherReportJsonMapper;
use Mappers\WeatherReportDbMapper;
use Models\WeatherReport;

/**
 * Test suite for ForecastsController class.
 *
 * @category Tests
 * @package  UnitTests\Controllers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/tests/ForecastsControllerTest.php
 */
class ForecastsControllerTest extends \PHPUnit_Framework_TestCase
{

    private static $_forecastId;


    /**
     *  Before class setup.
     *
     * @return Void
     */
    public static function setUpBeforeClass()
    {
        $reports = self::parseFixture();

        foreach ($reports as $report) {
            WeatherReportDbMapper::persistReport($report);
        }

        self::$_forecastId = $reports[0]->getId();

    }//end setUpBeforeClass()


    /**
     *  After class tear down.
     *
     * @return Void
     */
    public static function tearDownAfterClass()
    {
        $reports = self::parseFixture();

        foreach ($reports as $report) {
            $location = $report->getLocation();
            WeatherReportDbMapper::deleteReport($report);
            LocationDbMapper::deleteLocation($location);
        }

    }//end tearDownAfterClass()


    /**
     * Utility method for parsing json fixture data.
     *
     * @return WeatherReport array
     */
    public static function parseFixture()
    {
        $jsonObjects = json_decode(file_get_contents(__DIR__.'/../testData/reportsFixture.json'));

        $reports = array();
        foreach ($jsonObjects as $obj) {
            $report   = WeatherReportJsonMapper::mapJsonObject($obj);
            $location = LocationJsonMapper::mapJsonObject($obj);
            $report->setLocation($location);
            $report->setIsForecast(true);
            array_push($reports, $report);
        }

        return $reports;

    }//end parseFixture()


    /**
     * Test getForecasts method of ForecastsController class.
     *
     * @return Void
     */
    public function testGetForecasts()
    {
        $stubRequest        = new \Request(array());
        $forecastController = new ForecastsController($stubRequest);
        $json               = $forecastController->getForecasts();
        $obj                = json_decode($json);

        $reports = array();
        foreach ($obj->_data as $index => $wetObj) {
            $report = new WeatherReport($wetObj);
            $reports[$report->getDate()] = $report;
        }

        $this->assertTrue(array_key_exists(1417284901, $reports), 'WeatherReport 1 not found');
        $this->assertTrue(array_key_exists(1417284902, $reports), 'WeatherReport 2 not found');
        $this->assertTrue(array_key_exists(1417284903, $reports), 'WeatherReport 3 not found');
        $this->assertTrue(array_key_exists(1417284904, $reports), 'WeatherReport 4 not found');
        $this->assertTrue(array_key_exists(1417284905, $reports), 'WeatherReport 5 not found');

    }//end testGetForecasts()


    /**
     * Test getForecast method of ForecastsController class.
     *
     * @return Void
     */
    public function testGetForecast()
    {
        $stubRequest        = new \Request(array());
        $forecastController = new ForecastsController($stubRequest);
        $json               = $forecastController->getForecast(self::$_forecastId);
        $obj                = json_decode($json);
        $report             = new WeatherReport($obj->_data);

        $this->assertEquals(self::$_forecastId, $report->getId(), 'Found incorrect report id');
        $this->assertEquals(false, $report->getIsForecast(), 'Found incorrect weather report type');
        $this->assertEquals(1417284901, $report->getDate(), 'Found incorrect Unix date');
        $this->assertEquals(1417262608, $report->getSunrise(), 'Found incorrect Unix sunrise date');
        $this->assertEquals(1417297102, $report->getSunset(), 'Found incorrect Unix sunset date');
        $this->assertEquals(32.4, $report->getTemperature(), 'Found incorrect temperature');
        $this->assertEquals(30.2, $report->getMinTemperature(), 'Found incorrect min temperature');
        $this->assertEquals(35.6, $report->getMaxTemperature(), 'Found incorrect max temperature');
        $this->assertEquals(84, $report->getHumidity(), 'Found incorrect humidity');
        $this->assertEquals(1025, $report->getPressure(), 'Found incorrect pressure');
        $this->assertEquals(1018.18, $report->getSeaLevelPressure(), 'Found incorrect seal level pressure');
        $this->assertEquals(1005.93, $report->getGroundLevelPressure(), 'Found incorrect ground level pressure');
        $this->assertEquals(5.62, $report->getWindSpeed(), 'Found incorrect wind speed');
        $this->assertEquals(120, $report->getWindDirection(), 'Found incorrect wind direction');
        $this->assertEquals(10, $report->getWindGusts(), 'Found incorrect wind gusts');
        $this->assertEquals(75, $report->getCloudiness(), 'Found incorrect cloudiness');
        $this->assertEquals(10, $report->getRainPrecipitationVolume(), 'Found incorrect rain precipitation');
        $this->assertEquals(8, $report->getSnowPrecipitationVolume(), 'Found incorrect snow precipitation');

        $location = $report->getLocation();
        $this->assertEquals(1, $location->getId(), 'Found incorrect location id');
        $this->assertEquals('West Chester', $location->getLocationName(), 'Found incorrect location name');
        $this->assertEquals(-75.6, $location->getLongitude(), 'Found incorrect longitude');
        $this->assertEquals(39.96, $location->getLatitude(), 'Found incorrect latitude');

    }//end testGetForecast()


    /**
     * Test getForecast method of ForecastsController class with bad request.
     *
     * @return Void
     */
    public function testGetForecast404()
    {
        $stubRequest        = new \Request(array());
        $forecastController = new ForecastsController($stubRequest);
        $json               = $forecastController->getForecast(-1);
        $obj                = json_decode($json);

        $this->assertEquals(404, $obj->_code, 'Found incorrect return code');
        $this->assertEquals(
            'Failed to find weather forecast record with id: -1.',
            $obj->_message,
            'Found incorrect message'
        );

    }//end testGetForecast404()


}//end class

?>