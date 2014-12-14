<?php

namespace UnitTests;

use Database\WeatherDB;

/**
 * Test suite for WeatherDB class.
 *
 * @category Tests
 * @package  UnitTests
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/tests/WeatherDBTest.php
 */
class WeatherDBTest extends \PHPUnit_Framework_TestCase
{


    /**
     *  Test parseConfig method of WeatherDB class.
     *
     * @return Void
     */
    public function testParseConfig()
    {
        $dbConnection = WeatherDB::getInstance();
        $dbParams     = $dbConnection->parseConfig(__DIR__.'/testData/testConfig.ini');

        $this->assertEquals('host1', $dbParams['postgres']['host']);
        $this->assertEquals('port2', $dbParams['postgres']['port']);
        $this->assertEquals('dbName3', $dbParams['postgres']['dbName']);
        $this->assertEquals('user4', $dbParams['postgres']['user']);
        $this->assertEquals('password5', $dbParams['postgres']['password']);

    }//end testParseConfig()


    /**
     * Test getHost method of WeatherDB class.
     *
     * @return Void
     */
    public function testGetHost()
    {
        $dbConnection = WeatherDB::getInstance();
        $dbParams     = $dbConnection->parseConfig(__DIR__.'/testData/testConfig.ini');
        $this->assertEquals('host1', $dbConnection->getHost($dbParams));

    }//end testGetHost()


    /**
     * Test getPort method of WeatherDB class.
     *
     * @return Void
     */
    public function testGetPort()
    {
        $dbConnection = WeatherDB::getInstance();
        $dbParams     = $dbConnection->parseConfig(__DIR__.'/testData/testConfig.ini');
        $this->assertEquals('port2', $dbConnection->getPort($dbParams));

    }//end testGetPort()


    /**
     * Test getDbName method of WeatherDB class.
     *
     * @return Void
     */
    public function testGetDbName()
    {
        $dbConnection = WeatherDB::getInstance();
        $dbParams     = $dbConnection->parseConfig(__DIR__.'/testData/testConfig.ini');
        $this->assertEquals('dbName3', $dbConnection->getDbName($dbParams));

    }//end testGetDbName()


    /**
     * Test getUser method of WeatherDB class.
     *
     * @return Void
     */
    public function testGetUser()
    {
        $dbConnection = WeatherDB::getInstance();
        $dbParams     = $dbConnection->parseConfig(__DIR__.'/testData/testConfig.ini');
        $this->assertEquals('user4', $dbConnection->getUser($dbParams));

    }//end testGetUser()


    /**
     * Test getPassword method of WeatherDB class.
     *
     * @return Void
     */
    public function testGetPassword()
    {
        $dbConnection = WeatherDB::getInstance();
        $dbParams     = $dbConnection->parseConfig(__DIR__.'/testData/testConfig.ini');
        $this->assertEquals('password5', $dbConnection->getPassword($dbParams));

    }//end testGetPassword()


    /**
     * Test buildConnectionString method of WeatherDB class.
     *
     * @return Void
     */
    public function testBuildConnectionString()
    {
        $dbConnection     = WeatherDB::getInstance();
        $dbParams         = $dbConnection->parseConfig(__DIR__.'/testData/testConfig.ini');
        $connectionString = $dbConnection->buildConnectionString(
            $dbConnection->getHost($dbParams),
            $dbConnection->getPort($dbParams),
            $dbConnection->getDbName($dbParams),
            $dbConnection->getUser($dbParams),
            $dbConnection->getPassword($dbParams)
        );

        $this->assertEquals(
            'host=host1 port=port2 dbname=dbName3 user=user4 password=password5',
            $connectionString
        );

    }//end testBuildConnectionString()


}//end class

?>