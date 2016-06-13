<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 12.06.16
 * Time: 23:19
 */

namespace Actions;

require_once "autoload.php";

use Models\Zajecia;

class DelLesson extends Action
{
    function doExecute()
    {
        if( isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1 && isset($_GET['id']) ){

            Zajecia::delZajeciaFromDB($_GET['id']);
            Zajecia::delCennikFromDB($_GET['id']);
            Zajecia::delTerminarzFromDB($_GET['id']);

            $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Pomyślnie usunięto lekcję wraz z jej terminami i cennikiem.']);
            header("location: ?action=offer");
            die();
        }
        header('location: ?action=401');
    }
}