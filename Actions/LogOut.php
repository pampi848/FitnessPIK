<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 11:01
 */

namespace Actions;

use Accounts\Account;

require_once "autoload.php";

class LogOut extends Action
{
    function doExecute()
    {
        if (isset($_SESSION['logged'])) {
            session_destroy();
            session_start();
            $_SESSION['messages'][0] = ['class' => 'alert-info', 'content' => 'Wylogowano pomyślnie.'];
        }
        $content = "";
        $content = $this->response->processTemplate('index', $content);
        $content = $this->response->processTemplate('layout', [
            'title' => 'Strona fitness',
            'content' => $content
        ]);
        $this->response->setContent($content);
    }
    
}