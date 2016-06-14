<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 05.06.16
 * Time: 05:39
 */

namespace Actions;

require_once "autoload.php";

use Accounts\Account;
class ViewLessonAdd extends Action
{
    function doExecute(){

        if ((isset($_SESSION['logged']['level'])) && (($_SESSION['logged']['level'] == 1) || ($_SESSION['logged']['level'] == 2))){
            $this->loadContent('lessonadd');
        }
        else{
            header('location: ?action=401');
        }
    }
}