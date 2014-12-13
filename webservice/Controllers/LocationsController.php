<?php

namespace Controllers;

use Mappers\LocationDbMapper;

/**
 * Location Controller.
 *
 * @category WebService
 * @package  Controllers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @codingStandardsIgnoreStart
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/webservice/Controllers/LocationsController.php
 * @codingStandardsIgnoreEnd
 */
class LocationsController
{


    /**
     * Constructor.
     *
     * @param \Request $request Object holds all information about original http request.
     */
    public function __construct(\Request $request)
    {

    }//end __construct()


    /**
     * Location get collection action.
     *
     * @return String json encoded response
     */
    public function getLocations()
    {
        $response  = new \Response();
        $locations = LocationDbMapper::getAllLocations();

        $response->setCode(200);
        $response->setData($locations);
        $response->setMessage('success');

        return $response->toJson();

    }//end getLocations()


    /**
     * Location get action.
     *
     * @param mixed $id Id for Location record
     *
     * @return String json encoded response
     */
    public function getLocation($id)
    {
        $response = new \Response();
        $location = LocationDbMapper::getLocation($id);

        if ($location !== false) {
            $response->setCode(200);
            $response->setData($location);
            $response->setMessage('success');
        } else {
            $response->setCode(404);
            $response->setData(null);
            $response->setMessage("failed to find location record with id: {$id}.");
        }

        return $response->toJson();

    }//end getLocation()


}//end class

?>