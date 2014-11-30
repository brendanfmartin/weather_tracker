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
        $report = WeatherReportMapper::mapCurrentJsonToPhp(file_get_contents(__DIR__ . '/testData/testData.json'));

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

    }
}

?>