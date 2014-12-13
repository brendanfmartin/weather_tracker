<?php

/**
 * HTTP Response Wrapper Class.
 *
 * @category WebService
 * @package  N\A
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/webservice/Response.php
 */
class Response
{

    private $_code;

    private $_data;

    private $_message;


    /**
     * Constructor.
     *
     * @param mixed  $code    Indicating status of request
     * @param string $message Description of response "Success" or "Error message"
     * @param mixed  $data    Requested data
     */
    public function __construct($code='', $message='', $data='')
    {
        $this->_code    = $code;
        $this->_data    = $data;
        $this->_message = $message;

    }//end __construct()


    /**
     * Gets the value of code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->_code;

    }//end getCode()


    /**
     * Sets the value of code.
     *
     * @param mixed $code the code
     *
     * @return self
     */
    public function setCode($code)
    {
        $this->_code = $code;

        return $this;

    }//end setCode()


    /**
     * Gets the value of data.
     *
     * @return String encoded data
     */
    public function getData()
    {
        return $this->_data;

    }//end getData()


    /**
     * Sets the value of data.
     *
     * @param mixed $data Data requested.
     *
     * @return self
     */
    public function setData($data)
    {
        $this->_data = $data;

        return $this;

    }//end setData()


    /**
     * Gets the value of message.
     *
     * @return String Response message
     */
    public function getMessage()
    {
        return $this->_message;

    }//end getMessage()


    /**
     * Sets the value of message.
     *
     * @param string $message Response message
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->_message = $message;

        return $this;

    }//end setMessage()


    /**
     * Converts the response object to json string.
     *
     * @return String json encoded Response
     */
    public function toJson()
    {
        return json_encode(get_object_vars($this));

    }//end toJson()


}//end class

?>
