<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 21.05.16
 * Time: 12:23
 */

namespace Util;


class Session
{
    const SESSION_IDENTIFIER = 'FitnessPIK';
    const SESSION_LIFETIME = 1440; //24min

    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->create();
    }

    protected function create()
    {
        if(!isset($_SESSION)) {
            session_name(self::SESSION_IDENTIFIER);
            session_set_cookie_params(self::SESSION_LIFETIME);
            session_start();
        }
    }

    public function add($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function remove($name)
    {
        if (isset($_SESSION[$name])) unset($_SESSION[$name]);
    }

    public function get($name, $default = null)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : $default;
    }

    public function pop($name, $default)
    {
        $value = $this->get($name, $default);
        $this->remove($name);

        return $value;
    }

}