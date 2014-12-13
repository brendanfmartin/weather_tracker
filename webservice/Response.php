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

    private $code;

    private $data;

    private $message;


    /**
     * Constructor.
     *
     * @param $code    Indicating status of request
     * @param $message Description of response "Success" or "Error message"
     * @param $data    Requested data
     */
    public function __construct($code = '', $message = '', $data = '')
    {
        $this->code    = $code;
        $this->data    = $data;
        $this->message = $message;

    }//end __construct()


    /**
     * Gets the value of code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;

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
        $this->code = $code;

        return $this;

    }//end setCode()


    /**
     * Gets the value of data.
     *
     * @return String encoded data
     */
    public function getData()
    {
        return $this->data;

    }//end getData()


    /**
     * Sets the value of data.
     *
     * @param String encoded data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;

    }//end setData()


    /**
     * Gets the value of message.
     *
     * @return String Response message
     */
    public function getMessage()
    {
        return $this->message;

    }//end getMessage()


    /**
     * Sets the value of message.
     *
     * @param String Response message
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;

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

    }//end setMessage()


}//end class

?>
