<?php

namespace Actions;

require_once 'ViewCalendarData.php';

use Util\Config;
use Util\Request;
use Util\Response;
use Util\Session;
use Accounts\User;

const ALFABET = 'qwertyuiopasdfghjklzxcvbnm'; //26
abstract class Action
{
    protected $content = "";
    /**
     * @var Request
     */
    protected $request = null;

    /**
     * @var Session
     */
    protected $session = null;

    /**
     * @var Request
     */
    protected $cookie = null;

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
    // * @param Cookie $cookie
     * @param Config $config
     */
    public function __construct(Request $request, Session $session)
    {
        $this->request = $request;
        $this->session = $session;
        $this->cookie = $session;
        $this->config = Config::getInstance();

        $this->response = new Response($this->session, $this->request);

    }

    public function execute()
    {
        $this->doExecute();

        return $this->response;
    }
    
    protected function loadContent($container = 'index', $content = ""){
        $calendar = "";
        $logged = $this->session->get('logged');
        if (isset($logged)){
            $calendar = $this->response->processTemplate('calendarData', returnData($logged));
        }
       
        $content = $this->response->processTemplate($container, $content);
        $content = $this->response->processTemplate('layout', [
            'title' => 'Fortitudo',
            'content' => $content,
            'calendarData' => $calendar,
            'currentAction' => $this->request->get('action','default')
        ]);

        $this->response->setContent($content);
    }


    protected static function randCode()
    {
        $code = '';
        for ($i = 0; $i < 10; $i++) {
            $alfabet = str_split(ALFABET, 1);
            $code .= $alfabet[rand(0, 25)];
        }
        $code = md5($code);
        if (User::findSameCode($code) == $code) {
            $code = randCode();
        }
        return $code;
    }
}
