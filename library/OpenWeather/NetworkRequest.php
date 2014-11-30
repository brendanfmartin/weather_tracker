<?php

namespace OpenWeather;

/**
 * Network request utility class.
 *
 * @category Library
 * @package  OpenWeather
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/OpenWeather/NetworkRequest.php
 */
class NetworkRequest
{


    /**
     *  Hidden constructor.
     */
    private function __construct()
    {

    }//end __construct()


    /**
     * Wrapper for a Curl network request.
     *
     * @param String $url Address for network request
     *
     * @return String json result of network call
     */
    public static function request($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        $requestResults = curl_exec($curl);
        curl_close($curl);

        return $requestResults;

    }//end request()


}//end class

?>