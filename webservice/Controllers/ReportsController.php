<?php

namespace Controllers;

use Mappers\WeatherReportDbMapper;

/**
 * Weather Reports Controller.
 *
 * @category WebService
 * @package  Controllers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/webservice/Controllers/ReportsController.php
 */
class ReportsController
{


    /**
     * Constructor.
     *
     * @param Request $request Object holds all information about original http request.
     */
    public function __construct(Request $request)
    {

    }//end __construct()


    /**
     * Weather report collection action.
     *
     * @return Void
     */
    public function getReports()
    {
        $response  = new \Response();
        $locations = WeatherReportDbMapper::getAllLocations();

        $response->setCode(200);
        $response->setData($locations);
        $response->setMessage('success');

        return $response->toJson();

    }//end getReports()


}//end class

?>