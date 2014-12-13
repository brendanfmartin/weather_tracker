<?php

/**
 * HTTP Request Wrapper Class.
 *
 * @category WebService
 * @package  N\A
 * @author   Display Name <username@example.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/webservice/Request.php
 */
class Request
{

    private $_request;


    /**
     * Constructor.
     *
     * @param Array $request Original unaltered request
     */
    public function __construct($request)
    {
        $this->_request = $request;

    }//end __construct()


    /**
     * Is HTTP request using get method.
     *
     * @return Boolean
     */
    public function isGet()
    {
        return true;

    }//end isGet()


    /**
     * Get request parameter.
     *
     * @param mixed $id Id for request parameter
     *
     * @return mixed Found paramater or false
     */
    public function getParam($id)
    {
        return false;

    }//end getParam()


}//end class

?>
