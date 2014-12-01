<?php

use Mappers\WeatherReportMapper;

/**
 *  Test suite for WeatherReportMapper class.
 */
class WeatherReportMapperTests extends PHPUnit_Framework_TestCase
{

    /**
     *  Test mapCurrentJsonToPhp method of WeatherReportMapper class.
     */
    public function testMapCurrentJsonToPhp()
    {
        $report = WeatherReportMapper::mapCurrentJsonToPhp(file_get_contents(__DIR__ . '/testData/testCurrentData.json'));

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
    }

    /**
     *  Test mapForecastJsonToPhp method of WeatherReportMapper class.
     */
    public function testMapForecastJsonToPhp()
    {
        $reports = WeatherReportMapper::mapForecastJsonToPhp(file_get_contents(__DIR__ . '/testData/test5DayForecastData.json'));

        $firstReport = $reports[0];
        $this->assertEquals(true, $firstReport->getIsForecast(), 'Found incorrect weather report type');
        $this->assertEquals(1417381200, $firstReport->getDate(), 'Found incorrect Unix date');
        $this->assertEquals(282.23, $firstReport->getTemperature(), 'Found incorrect temperature');
        $this->assertEquals(282.23, $firstReport->getMinTemperature(), 'Found incorrect min temperature');
        $this->assertEquals(284.006, $firstReport->getMaxTemperature(), 'Found incorrect max temperature');
        $this->assertEquals(64, $firstReport->getHumidity(), 'Found incorrect humidity');
        $this->assertEquals(1017.32, $firstReport->getPressure(), 'Found incorrect pressure');
        $this->assertEquals(1032.66, $firstReport->getSeaLevelPressure(), 'Found incorrect seal level pressure');
        $this->assertEquals(1017.32, $firstReport->getGroundLevelPressure(), 'Found incorrect ground level pressure');
        $this->assertEquals(2.31, $firstReport->getWindSpeed(), 'Found incorrect wind speed');
        $this->assertEquals(197.501, $firstReport->getWindDirection(), 'Found incorrect wind direction');
        $this->assertEquals(12, $firstReport->getCloudiness(), 'Found incorrect cloudiness');

        $location = $firstReport->getLocation();
        $this->assertEquals(4560349, $location->getId(), 'Found incorrect location id');
        $this->assertEquals('Philadelphia', $location->getLocationName(), 'Found incorrect location name');
        $this->assertEquals(-75.163788, $location->getLongitude(), 'Found incorrect longitude');
        $this->assertEquals(39.952339, $location->getLatitude(), 'Found incorrect latitude');

        $lastReport = end($reports);
        $this->assertEquals(true, $lastReport->getIsForecast(), 'Found incorrect weather report type');
        $this->assertEquals(1417737600, $lastReport->getDate(), 'Found incorrect Unix date');
        $this->assertEquals(273.582, $lastReport->getTemperature(), 'Found incorrect temperature');
        $this->assertEquals(273.582, $lastReport->getMinTemperature(), 'Found incorrect min temperature');
        $this->assertEquals(273.582, $lastReport->getMaxTemperature(), 'Found incorrect max temperature');
        $this->assertEquals(78, $lastReport->getHumidity(), 'Found incorrect humidity');
        $this->assertEquals(1026.91, $lastReport->getPressure(), 'Found incorrect pressure');
        $this->assertEquals(1042.89, $lastReport->getSeaLevelPressure(), 'Found incorrect seal level pressure');
        $this->assertEquals(1026.91, $lastReport->getGroundLevelPressure(), 'Found incorrect ground level pressure');
        $this->assertEquals(1.16, $lastReport->getWindSpeed(), 'Found incorrect wind speed');
        $this->assertEquals(284.001, $lastReport->getWindDirection(), 'Found incorrect wind direction');
        $this->assertEquals(8, $lastReport->getCloudiness(), 'Found incorrect cloudiness');
        $this->assertEquals(0, $lastReport->getRainPrecipitationVolume(), 'Found incorrect rain precipitation');
    }
}

?>