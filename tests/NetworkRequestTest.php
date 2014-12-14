<?php

namespace UnitTests;

use OpenWeather\NetworkRequest;

/**
 * Test suite for NetworkRequest class.
 *
 * @category Tests
 * @package  UnitTests
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/tests/NetworkRequestTest.php
 */
class NetworkRequestTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Test request method of NetworkRequest class.
     *
     * @expectedException Exception
     *
     * @return Void
     */
    public function testRequest()
    {
        $results = NetworkRequest::request('garbageUrl');

    }//end testRequest()


}//end class

?>