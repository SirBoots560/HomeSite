<?php
    declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use Exception; 
use mysqli_result;

class DBConfig 
{
    /** 
     * @static
     * @var mysqli
     */
    private static $connection;

    /** 
     * @static
     * @param string $statement
     * @return string
     */
    public static function connect()
    {
        //Needs to be replaced with ENV variables
        $host = "mysql";
        $port = 3306;
        $username = "root";
        $password = "mrVEp2zTD6";
        $dbName = "homesite";

        try {

            // Create connection
            self::$connection = mysqli_connect($host, $username, $password, $dbName, $port);     
 
        } catch (Exception $e) {
            die(" Failed connecting to DB") ;
        }
    }

    /** 
     * @static
     * @param string $statement
     * @return string
     */
    public static function sanitize(string $statement): string
    {   
        //Real escape string
        $statement = self::$connection->real_escape_string($statement);

        //Remove slashes
        $statement = stripslashes($statement);

        return $statement;
    }

    /** 
     * @static
     * @param string $statement
     * @return mysqli_result | bool 
     */
    public static function query(string $statement)
    {
        return self::$connection->query($statement);
    }
}