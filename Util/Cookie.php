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
    const COOKIE_LIFETIME = 2419200;//(60*60*24*7*4) - tydzień * 4
    

    public function add($cookieName,$cookieValue, $cookieLifetime = self::COOKIE_LIFETIME)
    {
        setcookie($cookieName,$cookieValue, ((int)$cookieLifetime+time()) );
    }

    public function remove($name)
    {
        if (isset($_COOKIE[$name])) setcookie($name, "", time()-3600);
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