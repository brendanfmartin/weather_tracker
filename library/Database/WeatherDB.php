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

    protected $dbConnection;


    /**
     *  Constructor.
     */
    public function __construct()
    {

    }//end __construct()


    /**
     * Parses Yaml configuration file for DB connection parameters.
     *
     * @param String $configFile yaml database configuration file
     *
     * @return Array Database connection parameters
     */
    public function parseConfig($configFile)
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
    public function buildConnectionString($host, $port, $dbName, $user, $password)
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
    public function connect($configFile)
    {
        $dbParams = $this->parseConfig($configFile);
        $connectionString = $this->buildConnectionString(
            $this->getHost($dbParams),
            $this->getPort($dbParams),
            $this->getDbName($dbParams),
            $this->getUser($dbParams),
            $this->getPassword($dbParams)
        );

        $this->dbConnection = pg_connect($connectionString);
        return $this;

    }//end connect()


    /**
     * Execute a query against the current database connection.
     *
     * @param String $query  Database query
     * @param Array  $params Parameters for the database query
     *
     * @throws Exception DBConnection must be established
     *
     * @return resource Postrgres query result resource or null
     */
    public function query($query, $params)
    {
        if ($this->dbConnection === null) {
            throw new \Exception('Database connection not established');
        }

        return pg_query_params($this->dbConnection, $query, $params);

    }//end query()


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