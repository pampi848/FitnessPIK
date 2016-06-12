<?php

namespace Actions;

use Util\Config;
use Util\Cookie;
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

    /**
     * @var Cookie
     */
    protected $cookie = null;

    public function __construct()
    {
        $this->config = Config::getInstance(); // utwórz Config, jeśli jeszcze nie istnieje
        $this->session = new Session();
        $this->request = new Request();
        $this->cookie = new Cookie();
    }

    public function run(){
        $actionMap = $this->config->getActions();
        
        $actionName = $this->request->get('action', 'default');
        
        if (isset($actionMap[$actionName])) {
            $actionClassName = $actionMap[$actionName];

            if (class_exists($actionClassName)) {
                $action = new $actionClassName($this->request, $this->session, $this->cookie);

                if ($action instanceof Action) {
                    $response = $action->execute();

                    return $response->send();
                }
            }
        }

        $response = new Response404();
        $content = $response->processTemplate('error404');
        $content = $response->processTemplate('layout', ['content' => $content]);
        $response->setContent($content);
        $response->send();
    }
}
