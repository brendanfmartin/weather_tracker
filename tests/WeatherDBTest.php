<?php

use Database\WeatherDB;

/**
 *  Test suite for WeatherDB class.
 */
class WeatherDBTests extends PHPUnit_Framework_TestCase
{

    /**
     *  Test parseConfig method of WeatherDB class.
     */
    public function testParseConfig()
    {
        $dbConnection = new WeatherDB();
        $dbParams = $dbConnection->parseConfig(__DIR__ . '/testData/testConfig.ini');

        $this->assertEquals('host1', $dbParams['postgres']['host']);
        $this->assertEquals('port2', $dbParams['postgres']['port']);
        $this->assertEquals('dbName3', $dbParams['postgres']['dbName']);
        $this->assertEquals('user4', $dbParams['postgres']['user']);
        $this->assertEquals('password5', $dbParams['postgres']['password']);
    }


    /**
     * Test getHost method of WeatherDB class.
     */
    public function testGetHost()
    {
        $dbConnection = new WeatherDB();
        $dbParams = $dbConnection->parseConfig(__DIR__ . '/testData/testConfig.ini');
        $this->assertEquals('host1', $dbConnection->getHost($dbParams));
    }


    /**
     * Test getPort method of WeatherDB class.
     */
    public function testGetPort()
    {
        $dbConnection = new WeatherDB();
        $dbParams = $dbConnection->parseConfig(__DIR__ . '/testData/testConfig.ini');
        $this->assertEquals('port2', $dbConnection->getPort($dbParams));
    }


    /**
     * Test getDbName method of WeatherDB class.
     */
    public function testGetDbName()
    {
        $dbConnection = new WeatherDB();
        $dbParams = $dbConnection->parseConfig(__DIR__ . '/testData/testConfig.ini');
        $this->assertEquals('dbName3', $dbConnection->getDbName($dbParams));
    }


    /**
     * Test getUser method of WeatherDB class.
     */
    public function testGetUser()
    {
        $dbConnection = new WeatherDB();
        $dbParams = $dbConnection->parseConfig(__DIR__ . '/testData/testConfig.ini');
        $this->assertEquals('user4', $dbConnection->getUser($dbParams));
    }


    /**
     * Test getPassword method of WeatherDB class.
     */
    public function testGetPassword()
    {
        $dbConnection = new WeatherDB();
        $dbParams = $dbConnection->parseConfig(__DIR__ . '/testData/testConfig.ini');
        $this->assertEquals('password5', $dbConnection->getPassword($dbParams));
    }

    /**
     * Test buildConnectionString method of WeatherDB class.
     */
    public function testBuildConnectionString()
    {
        $dbConnection = new WeatherDB();
        $dbParams = $dbConnection->parseConfig(__DIR__ . '/testData/testConfig.ini');
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
    }
}
?>