<?php

namespace UnitTests;

use Controllers\LocationsController;
use Mappers\LocationMapper;

/**
 * Test suite for LocationsController class.
 *
 * @category Tests
 * @package  UnitTests
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/tests/LocationsControllerTests.php
 */
class LocationsControllerTests extends \PHPUnit_Framework_TestCase
{


    /**
     *  Before class setup.
     *
     * @return Void
     */
    public static function setUpBeforeClass()
    {
        $locations = self::parseFixture();

        foreach ($locations as $location) {
            LocationMapper::persistLocation($location);
        }

    }//end setUpBeforeClass()


    /**
     *  After class tear down.
     *
     * @return Void
     */
    public static function tearDownAfterClass()
    {
        $locations = self::parseFixture();

        foreach ($locations as $location) {
            LocationMapper::deleteLocation($location);
        }

    }//end tearDownAfterClass()


    /**
     * Utility method for parsing json fixture data.
     *
     * @return Location array
     */
    public static function parseFixture()
    {
        $jsonObjects = json_decode(file_get_contents(__DIR__.'/testData/locationsFixture.json'));

        $locations = array();
        foreach ($jsonObjects as $obj) {
            array_push($locations, LocationMapper::mapGenericToLocation($obj));
        }

        return $locations;

    }//end parseFixture()


    /**
     * Test getLocations method of LocationsController class.
     *
     * @return Void
     */
    public function testGetLocations()
    {
        $stubRequest        = new \Request();
        $locationController = new LocationsController($stubRequest);
        $json               = $locationController->getLocations();

        $locations = array();
        foreach (json_decode($json) as $index => $obj) {
            $location = LocationMapper::mapGenericToLocation($obj);
            $locations[$location->getId()] = $location;
        }

        $this->assertTrue(array_key_exists(1, $locations), 'Location 1 not found');
        $this->assertTrue(array_key_exists(2, $locations), 'Location 2 not found');
        $this->assertTrue(array_key_exists(3, $locations), 'Location 3 not found');
        $this->assertTrue(array_key_exists(4, $locations), 'Location 4 not found');
        $this->assertTrue(array_key_exists(5, $locations), 'Location 5 not found');

    }//end testGetLocations()


}//end class

?>