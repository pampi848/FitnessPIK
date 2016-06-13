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

class DelTermin extends Action
{
    function doExecute()
    {
        if( isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1 && isset($_GET['id']) ){

            Zajecia::delTerminarzFromDBByOwnId($_GET['id']);

            $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Pomyślnie usunięto termin.']);
            header("location: ?action=offer");
            die();
        }
        header('location: ?action=401');
    }
}