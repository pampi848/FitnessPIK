<?php

namespace Util;


class Request
{
    /**
     * @var string
     */
    const METHOD_GET = 'get';

    /**
     * @var string
     */
    const METHOD_POST = 'post';

    /**
     * @param $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function get($name, $default = null) {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
    }

    /**
     * @param string $method
     * @return bool
     */
    public function isMethod($method) {
        return (strtolower($_SERVER['REQUEST_METHOD']) == strtolower($method));
    }
}
