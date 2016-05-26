<?php

namespace Util;


class Response
{
    /**
     * @var string
     */
    const HEADER_CONTENT_LENGTH = 'Content-Length';

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var string
     */
    protected $content = '';

    /**
     * @var array
     */
    protected $parameters = array();

    /**
     * @var Config
     */
    protected $config = null;

    /**
     * @var Session
     */
    protected $session = null;

    /**
     * @var Request
     */
    protected $request = null;

    /**
     * @param Config $config
     */
    public function __construct(Session $session, Request $request) {
        $this->config = Config::getInstance();
        $this->session = $session;
        $this->request = $request;
    }

    public function send() {
        if (!isset($this->headers[self::HEADER_CONTENT_LENGTH])) {
            $this->setHeader(self::HEADER_CONTENT_LENGTH, strlen($this->content));
        }

        foreach ($this->headers as $header => $value) {
            if (!empty($value)) {
                $header .= ": {$value}";
            }

            header($header);
        }

        echo $this->content;
    }

    /**
     * @param string $template
     * @param array $params
     *
     * @return string
     */
    public function processTemplate($template, $params = array()) {
        $p = &$params;
        $r = $this->request;
        $s = $this->session;

        ob_start();

        $dir = $this->config->getTemplates()['dir'];

        $fileName = $dir . DIRECTORY_SEPARATOR . $template . ".php";
        if (file_exists($fileName)) {
            include $fileName;
        } else {
            // TODO: handle not existing template file
        }

        $output = ob_get_clean();

        return $output;
    }

    /**
     * @param $url
     */
    public function redirect($url) {
        $this->setHeader('Location', $url);
    }

    /**
     * @param string $header
     * @param string $value
     */
    public function setHeader($header, $value = '') {
        $this->headers[$header] = $value;
    }

    /**
     * @param string $header
     */
    public function removeHeader($header) {
        unset($this->headers[$header]);
    }

    /**
     * @param string $parameter
     * @param string $value
     */
    public function setParameter($parameter, $value = '') {
        $this->parameters[$parameter] = $value;
    }

    /**
     * @param string $parameter
     */
    public function removeParameter($parameter) {
        unset($this->parameters[$parameter]);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
