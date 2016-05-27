<?php

namespace Actions;

use Util\Config;
use Util\Request;
use Util\Response404;
use Util\Session;

class Controller
{
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

    public function __construct() {
        $this->config = Config::getInstance(); // utwórz Config, jeśli jeszcze nie istnieje
        $this->session = new Session();
        $this->request = new Request();
    }

    public function run() {
        $actionMap = $this->config->getActions();

        $actionName = $this->request->get('action', 'default');

        if (isset($actionMap[$actionName])) {
            $actionClassName = $actionMap[$actionName];

            if (class_exists($actionClassName)) {
                $action = new $actionClassName($this->request, $this->session);

                if ($action instanceof Action) {
                    $response = $action->execute();

                    return $response->send();
                }
            }
        }

        $response = new Response404();
        $response->setContent('Strona nie istnieje');
        $response->send();
    }
}
