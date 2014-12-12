<?php

namespace Controllers;

use Mappers\LocationMapper;

/**
 * Location Controller.
 *
 * @category WebService
 * @package  Controllers
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/webservice/Controllers/LocationsController.php
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
     * Location collection action.
     *
     * @return Void
     */
    public function getLocations()
    {
        return json_encode(LocationMapper::getAllLocations());

    }//end getLocations()


}//end class

?>