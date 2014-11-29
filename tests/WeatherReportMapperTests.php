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
        $mapper = new WeatherReportMapper();
        $report = $mapper->mapCurrentJsonToPhp(file_get_contents(__DIR__ . '/testData/testData.json'));

        $this->assertEquals(30.2, $report->getForecastedLow(), 'Found incorrect low temperature');
        $this->assertEquals(35.6, $report->getForecastedHigh(), 'Found incorrect high temperature');
    }
}
?>