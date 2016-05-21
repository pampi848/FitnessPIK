<?php

namespace Util;

use Util\Config;
use PDO;


class Database
{
    /**
     * @var Database
     */
    protected static $instance = null;

    /**
     * @var array
     */
    protected $config = null;

    /**
     * @return Database
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param Config $config
     */
    protected function __construct() {
        $this->config = Config::getInstance()->getDatabase();
    }

    /**
     * @return \PDO
     */
    public function getConnection() {
        $dsn = "mysql:host={$this->config['host']};dbname={$this->config['database']}";
        $params = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"];

        $pdo = new PDO($dsn, $this->config['user'], $this->config['pass'], $params);

        return $pdo;
    }
}
