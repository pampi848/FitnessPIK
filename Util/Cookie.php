<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 21.05.16
 * Time: 12:23
 */

namespace Util;


class Cookie
{
    const COOKIE_LIFETIME = 604800;//(60*60*24*7) - tydzień

    /**
     * Session constructor.
     */
    public function __construct($cookieName,$cookieValue, $cookieLifetime = self::COOKIE_LIFETIME)
    {
       $this->create($cookieName,$cookieValue, $cookieLifetime);
    }

    protected static function create($cookieName,$cookieValue, $cookieLifetime)
    {
        setcookie($cookieName,$cookieValue, ((int)$cookieLifetime+time()) );
    }

    public function add($name, $value)
    {
        $_COOKIE[$name] = $value;
    }

    public function remove($name)
    {
        if (isset($_COOKIE[$name])) unset($_COOKIE[$name]);
    }

    public function get($name, $default = null)
    {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default;
    }

    public function pop($name, $default)
    {
        $value = $this->get($name, $default);
        $this->remove($name);

        return $value;
    }

}