<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 17.05.16
 * Time: 18:07
 */

namespace Util;

use PDO;

class Database
{
    var $host = "localhost";
    var $dbname = "FitnessPIK";
    var $dblogin = "root";
    var $dbpass = "root";

    public function getConnection()
    {
        try {
            $dsn = "mysql:host={$this->getHost()};dbname={$this->getDbname()}";
            $params = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"];

            $pdo = new PDO($dsn, $this->getDblogin(), $this->getDbpass(), $params);

            return $pdo;
        } catch (PDOException $e) {
            //TODO:
            //print "Błąd połączenia z bazą!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    // Getters&&Setters \\
    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param string $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @return string
     */
    public function getDblogin()
    {
        return $this->dblogin;
    }

    /**
     * @param string $dblogin
     */
    public function setDblogin($dblogin)
    {
        $this->dblogin = $dblogin;
    }

    /**
     * @return string
     */
    public function getDbpass()
    {
        return $this->dbpass;
    }

    /**
     * @param string $dbpass
     */
    public function setDbpass($dbpass)
    {
        $this->dbpass = $dbpass;
    }

}