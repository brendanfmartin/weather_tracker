<?php

namespace UnitTests;

use Mappers\WeatherReportJsonMapper;
use Mappers\WeatherReportDbMapper;

/**
 * Test suite for WeatherReportDbMapper class.
 *
 * @category Tests
 * @package  UnitTests
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/tests/WeatherReportDbMapperTests.php
 */
class WeatherReportDbMapperTests extends \PHPUnit_Framework_TestCase
{


    /**
     *  Before scenario setup.
     *
     * @return Void
     */
    public function setUp()
    {
        $report = WeatherReportJsonMapper::mapCurrentJsonToPhp(file_get_contents(__DIR__.'/testData/testCurrentData.json'));
        WeatherReportDbMapper::deleteCurrentReport($report);

    }//end setUp()


    /**
     *  After class tear down.
     *
     * @return Void
     */
    public static function tearDownAfterClass()
    {
        $report = WeatherReportJsonMapper::mapCurrentJsonToPhp(file_get_contents(__DIR__.'/testData/testCurrentData.json'));
        WeatherReportDbMapper::deleteCurrentReport($report);

    }//end tearDownAfterClass()


    /**
     *  Test getCurrentReport method of WeatherReportDbMapper class.
     *
     * @return Void
     */
    public function testGetCurrentReport()
    {
        $report = WeatherReportJsonMapper::mapCurrentJsonToPhp(file_get_contents(__DIR__.'/testData/testCurrentData.json'));
        WeatherReportDbMapper::persistCurrentReport($report);

        $report = WeatherReportDbMapper::getCurrentReport(
            $report->getLocation(),
            $report->getDate(),
            $report->getIsForecast()
        );

        $this->assertEquals(false, $report->getIsForecast(), 'Found incorrect weather report type');
        $this->assertEquals(1417284900, $report->getDate(), 'Found incorrect Unix date');
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
        $this->assertEquals(4562144, $location->getId(), 'Found incorrect location id');
        $this->assertEquals('West Chester', $location->getLocationName(), 'Found incorrect location name');
        $this->assertEquals(-75.6, $location->getLongitude(), 'Found incorrect longitude');
        $this->assertEquals(39.96, $location->getLatitude(), 'Found incorrect latitude');

    }//end testGetCurrentReport()


    /**
     *  Test deleteCurrentReport method of WeatherReportDbMapper class.
     *
     * @return Void
     */
    public function testDeleteCurrentReport()
    {
        $report = WeatherReportJsonMapper::mapCurrentJsonToPhp(file_get_contents(__DIR__.'/testData/testCurrentData.json'));

        WeatherReportDbMapper::persistCurrentReport($report);
        $this->assertTrue(WeatherReportDbMapper::deleteCurrentReport($report), 'Failed deleting a weather report');

    }//end testDeleteCurrentReport()


    /**
     *  Test persistCurrentReport method of WeatherReportDbMapper class.
     *
     * @return Void
     */
    public function testPersistCurrentReport()
    {
        $report = WeatherReportJsonMapper::mapCurrentJsonToPhp(file_get_contents(__DIR__.'/testData/testCurrentData.json'));

        WeatherReportDbMapper::deleteCurrentReport($report);

        // Save new.
        $this->assertTrue(WeatherReportDbMapper::persistCurrentReport($report), 'Persisting new weather report failed');

        // Minor change.
        $report->setMinTemperature(1);

        // Save existing.
        $this->assertTrue(
            WeatherReportDbMapper::persistCurrentReport($report),
            'Persisting existing weather report failed'
        );

    }//end testPersistCurrentReport()


}//end class

?>