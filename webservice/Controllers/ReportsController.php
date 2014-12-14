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
    public function __construct(\Request $request)
    {

    }//end __construct()


    /**
     * Weather report collection action.
     *
     * @return Void
     */
    public function getReports()
    {
        $response = new \Response();
        $reports  = WeatherReportDbMapper::getAllReports(false);

        $response->setCode(200);
        $response->setData($reports);
        $response->setMessage('success');

        return $response->toJson();

    }//end getReports()


    /**
     * Report get action.
     *
     * @param mixed $id Id for Weather Report record
     *
     * @return String json encoded response
     */
    public function getReport($id)
    {
        $response = new \Response();
        $report   = WeatherReportDbMapper::getReportById($id);

        if ($report !== false) {
            $response->setCode(200);
            $response->setData($report);
            $response->setMessage('success');
        } else {
            $response->setCode(404);
            $response->setData(null);
            $response->setMessage("failed to find weather report record with id: {$id}.");
        }

        return $response->toJson();

    }//end getReport()


}//end class

?>