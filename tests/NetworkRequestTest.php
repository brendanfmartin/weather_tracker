<?php

use OpenWeather\NetworkRequest;

/**
 *  Test suite for NetworkRequest class.
 */
class NetworkRequestTests extends PHPUnit_Framework_TestCase
{

    /**
     *  Test request method of NetworkRequest class.
     *
     *  @expectedException Exception
     */
    public function testRequest()
    {
        $results = NetworkRequest::request('garbageUrl');
    }
}

?>