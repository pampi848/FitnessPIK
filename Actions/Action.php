<?php

namespace Actions;

use Util\Config;
use Util\Request;
use Util\Response;
use Util\Session;


abstract class Action
{
    /**
     * @var Request
     */
    protected $request = null;

    /**
     * @var Session
     */
    protected $session = null;

    /**
     * @var Config
     */
    protected $config = null;

    /**
     * @var Response
     */
    protected $response = null;

    abstract protected function doExecute();

    /**
     * @param Request $request
     * @param Session $session
     * @param Config $config
     */
    public function __construct(Request $request, Session $session)
    {
        $this->request = $request;
        $this->session = $session;
        $this->config = Config::getInstance();

        $this->response = new Response($this->session, $this->request);
    }

    public function execute()
    {
        $this->doExecute();

        return $this->response;
    }
}
