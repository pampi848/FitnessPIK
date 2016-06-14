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
    public static function getInstance()
    {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct()
    {
        $this->database = [
            'user' => "root",
            'pass' => "",
            'host' => "localhost",
            'database' => "fitnesspik"
        ];

        $this->templates = [
            'dir' => 'templates'
        ];

        $this->actions = [
            'default' => 'Actions\\ActionIndex',
            'activation' => 'Actions\\ActivationLink',
            'register' => 'Actions\\Register',
            'login' => 'Actions\\LogIn',
            'logout' => 'Actions\\LogOut',
			'addnews' => 'Actions\\ViewNewsAdd',
            'allnews' => 'Actions\\ViewNewsAll',
            'news' => 'Actions\\ViewNewsSingle',
            'profile' => 'Actions\\ViewProfile',
            'editprofile' => 'Actions\\EditProfile',
            'users' => 'Actions\\ViewUsersAll',
            'offer' => 'Actions\\ViewOffer',
            'instruktorPanel' => 'Actions\\ViewInstruktorPanel',
            'deactivation' => 'Actions\\Deactivation',
            'sendactivation' => 'Actions\\SendAgainAC',
            'uprawnienia' => 'Actions\\ChangePermissions',
            'addlesson' => 'Actions\\ViewLessonAdd',
            'lessonaddprocess' => 'Actions\\AddLesson',
            'lessondelprocess' => 'Actions\\DelLesson',
            'terminaddprocess' => 'Actions\\AddTermin',
            'termindelprocess' => 'Actions\\DelTermin',
            'contact' => 'Actions\\ViewContact',
            'aboutus' => 'Actions\\ViewAboutUs',
            'userlist' => 'Actions\\ViewUserList'
        ];

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
