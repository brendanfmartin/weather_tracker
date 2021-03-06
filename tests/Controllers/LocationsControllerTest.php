<?php

namespace UnitTests\Controllers;

use Controllers\LocationsController;
use Mappers\LocationJsonMapper;
use Mappers\LocationDbMapper;
use Models\Location;

/**
 * Test suite for LocationsController class.
 *
 * @category Tests
 * @package  UnitTests\Controllers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/tests/LocationsControllerTest.php
 */
class LocationsControllerTest extends \PHPUnit_Framework_TestCase
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
            LocationDbMapper::persistLocation($location);
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
            LocationDbMapper::deleteLocation($location);
        }

    }//end tearDownAfterClass()


    /**
     * Utility method for parsing json fixture data.
     *
     * @return Location array
     */
    public static function parseFixture()
    {
        $jsonObjects = json_decode(file_get_contents(__DIR__.'/../testData/locationsFixture.json'));

        $locations = array();
        foreach ($jsonObjects as $obj) {
            array_push($locations, LocationJsonMapper::mapJsonObject($obj));
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
        $stubRequest        = new \Request(array());
        $locationController = new LocationsController($stubRequest);
        $json               = $locationController->getLocations();
        $obj                = json_decode($json);

        $locations = array();
        foreach ($obj->_data as $index => $locObj) {
            $location = new Location($locObj);
            $locations[$location->getId()] = $location;
        }

        $this->assertTrue(array_key_exists(1, $locations), 'Location 1 not found');
        $this->assertTrue(array_key_exists(2, $locations), 'Location 2 not found');
        $this->assertTrue(array_key_exists(3, $locations), 'Location 3 not found');
        $this->assertTrue(array_key_exists(4, $locations), 'Location 4 not found');
        $this->assertTrue(array_key_exists(5, $locations), 'Location 5 not found');

    }//end testGetLocations()


    /**
     * Test getLocation method of LocationsController class.
     *
     * @return Void
     */
    public function testGetLocation()
    {
        $stubRequest        = new \Request(array());
        $locationController = new LocationsController($stubRequest);
        $json               = $locationController->getLocation(1);
        $obj                = json_decode($json);
        $location           = new Location($obj->_data);

        $this->assertEquals(1, $location->getId(), 'Found incorrect location id');
        $this->assertEquals('City 1', $location->getLocationName(), 'Found incorrect location name');
        $this->assertEquals(-1.1, $location->getLongitude(), 'Found incorrect longitude');
        $this->assertEquals(1.1, $location->getLatitude(), 'Found incorrect latitude');

    }//end testGetLocation()


    /**
     * Test getLocation method of LocationsController class with bad request.
     *
     * @return Void
     */
    public function testGetLocation404()
    {
        $stubRequest        = new \Request(array());
        $locationController = new LocationsController($stubRequest);
        $json               = $locationController->getLocation(-1);
        $obj                = json_decode($json);

        $this->assertEquals(404, $obj->_code, 'Found incorrect return code');
        $this->assertEquals(
            'Failed to find location record with id: -1.',
            $obj->_message,
            'Found incorrect message'
        );

    }//end testGetLocation404()


}//end class

?>