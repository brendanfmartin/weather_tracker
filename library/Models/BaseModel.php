<?php

namespace Models;

/**
 * Base model containing methods and attributes that should exist for all Weather Tracker models.
 *
 * @category Library
 * @package  Models
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Models/BaseModel.php
 */
class BaseModel
{


    /**
     * Constructor.
     *
     * @param mixed $parameters Array or object with parameters defining model.
     */
    public function __construct($parameters=null)
    {
        if ($parameters !== null && is_object($parameters) === true) {
            foreach ($parameters as $param => $value) {
                $setterFunction = 'set'.ucfirst($param);

                if (method_exists($this, $setterFunction) === true) {
                    $this->$setterFunction($value);
                }
            }
        }

    }//end __construct()


}//end class

?>