<?php

namespace Util;


class Response404 extends  Response
{
    /**
     * @var string
     */
    const HEADER_404 = 'HTTP/1.0 404 Not Found';

    public function __construct() {
        $this->setHeader(self::HEADER_404);
    }
}
