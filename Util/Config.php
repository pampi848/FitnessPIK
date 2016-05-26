<?php

namespace Util;


class Config
{
    /**
     * @var Config
     */
    protected static $instance = null;

    /**
     * @var array
     */
    protected $database = array();

    /**
     * @var array
     */
    protected $actions = array();

    /**
     * @var array
     */
    protected $templates = array();

    /**
     * @return Config
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected function __construct()
    {
        include_once 'config.php'; // chodzi o ../config.php
    }

    /**
     * @return array
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        return $this->templates;
    }
}
