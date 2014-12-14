<?php

namespace Controllers;

use Mappers\WeatherReportDbMapper;

/**
 * Forecast Controller.
 *
 * @category WebService
 * @package  Controllers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @codingStandardsIgnoreStart
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/webservice/Controllers/ForecastsController.php
 * @codingStandardsIgnoreEnd
 */
class ForecastsController
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
     * Weather forecast collection action.
     *
     * @return Void
     */
    public function getForecasts()
    {
        $response  = new \Response();
        $forecasts = WeatherReportDbMapper::getAllReports(true);

        $response->setCode(200);
        $response->setData($forecasts);
        $response->setMessage('success');

        return $response->toJson();

    }//end getForecasts()


    /**
     * Report get action.
     *
     * @param mixed $id Id for Weather Report record
     *
     * @return String json encoded response
     */
    public function getForecast($id)
    {
        $response = new \Response();
        $forecast = WeatherReportDbMapper::getReportById($id);

        if ($forecast !== false) {
            $response->setCode(200);
            $response->setData($forecast);
            $response->setMessage('success');
        } else {
            $response->setCode(404);
            $response->setData(null);
            $response->setMessage("failed to find weather forecast record with id: {$id}.");
        }

        return $response->toJson();

    }//end getForecast()


}//end class

?>