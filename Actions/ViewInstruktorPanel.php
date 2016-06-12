<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 18:21
 */

namespace Actions;

require_once "autoload.php";

use Accounts\Account;
use Models\Zajecia;

class ViewInstruktorPanel extends Action
{

    function doExecute()
    {
        if (isset($_SESSION['logged']['level'])&&($_SESSION['logged']['level']==2)) {
            $zajecia = Zajecia::conductedLessons($_SESSION['logged']['id']);
            
            $this->loadContent('instruktorPanel',$zajecia);
        }
        elseif (isset($_SESSION['logged']['level'])&&($_SESSION['logged']['level']==1)){
            $_SESSION['messages'][0] = ['class' => 'alert-warning', 'content' => 'Nie ma czego wyświetlić, nie jesteś instruktorem!'];
            header("location: index.php");
        }
        else{
            header("location: index.php");
        }
    }
}