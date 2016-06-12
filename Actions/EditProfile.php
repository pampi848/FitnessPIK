<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 12.06.16
 * Time: 23:19
 */

namespace Actions;

require_once "autoload.php";

class EditProfile extends Action
{
    function doExecute()
    {
        if( isset($_SESSION['logged']) && isset($_SESSION['data']['id']) && isset($_POST['Edit']) ){
            
        }
    }
}