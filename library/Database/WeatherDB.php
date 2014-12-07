<?php

namespace Database;

use Symfony\Component\Yaml\Yaml;

/**
 * Postgres Database Connection.
 *
 * @category Library
 * @package  Database
 * @author   John Landis <jalandis@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/brendanfmartin/weather_tracker/blob/master/library/Database/WeatherDB.php
 */
class WeatherDB
{

    protected static $dbConnection;

    protected static $dbConfigFile = '/../../config/configDev.yml';


    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;

    }//end getInstance()


    /**
     * Hidden constructor.
     */
    protected function __construct()
    {

    }//end __construct()


    /**
     * Hidden clone method.
     *
     * @return void
     */
    private function __clone()
    {

    }//end __clone()


    /**
     * Hidden unserialize method.
     *
     * @return void
     */
    private function __wakeup()
    {

    }//end __wakeup()


    /**
     * Parses Yaml configuration file for DB connection parameters.
     *
     * @param String $configFile yaml database configuration file
     *
     * @return Array Database connection parameters
     */
    public static function parseConfig($configFile)
    {
        return Yaml::parse(file_get_contents($configFile));

    }//end parseConfig()


    /**
     * Builds a postgres connection string.
     *
     * @param String $host     Database hostname
     * @param String $port     Database port
     * @param String $dbName   Database name
     * @param String $user     Database username
     * @param String $password Database password
     *
     * @return Postgres connection string
     */
    public static function buildConnectionString($host, $port, $dbName, $user, $password)
    {
        return "host={$host} port={$port} dbname={$dbName} user={$user} password={$password}";

    }//end buildConnectionString()


    /**
     * Connects to psql db.
     *
     * @param String $configFile yaml database configuration file
     *
     * @return WeatherDB $this
     */
    private static function _connect($configFile)
    {
        $dbParams = self::parseConfig($configFile);
        $connectionString = self::buildConnectionString(
            self::getHost($dbParams),
            self::getPort($dbParams),
            self::getDbName($dbParams),
            self::getUser($dbParams),
            self::getPassword($dbParams)
        );

        return pg_connect($connectionString);

    }//end _connect()


    /**
     * Execute a query against the current database connection.
     *
     * @param String $query  Database query
     * @param Array  $params Parameters for the database query
     *
     * @return resource Postrgres query result resource or null
     */
    public function query($query, $params)
    {
        if (self::$dbConnection === null) {
            self::$dbConnection = self::_connect(__DIR__.self::$dbConfigFile);
        }

        return pg_query_params(self::$dbConnection, $query, $params);

    }//end query()


    /**
     * Execute a delete against the current database connection.
     *
     * @param String $table  Database table
     * @param Array  $params Parameters identifying records
     *
     * @return mixed Number of rows affected or false for failure
     */
    public function delete($table, $params)
    {
        if (self::$dbConnection === null) {
            self::$dbConnection = self::_connect(__DIR__.self::$dbConfigFile);
        }

        return pg_delete(self::$dbConnection, $table, $params);

    }//end delete()


    /**
     * Gets the value of host.
     *
     * @param Array $dbParams Database connection parameters
     *
     * @return String
     */
    public function getHost($dbParams)
    {
        return $dbParams['postgres']['host'];

    }//end getHost()


    /**
     * Gets the value of port.
     *
     * @param Array $dbParams Database connection parameters
     *
     * @return String
     */
    public function getPort($dbParams)
    {
        return strval($dbParams['postgres']['port']);

    }//end getPort()


    /**
     * Gets the value of dbName.
     *
     * @param Array $dbParams Database connection parameters
     *
     * @return String
     */
    public function getDbName($dbParams)
    {
        return $dbParams['postgres']['dbName'];

    }//end getDbName()


    /**
     * Gets the value of user.
     *
     * @param Array $dbParams Database connection parameters
     *
     * @return String
     */
    public function getUser($dbParams)
    {
        return $dbParams['postgres']['user'];

    }//end getUser()


    /**
     * Gets the value of password.
     *
     * @param Array $dbParams Database connection parameters
     *
     * @return String
     */
    public function getPassword($dbParams)
    {
        return $dbParams['postgres']['password'];

    }//end getPassword()


}//end class

?>