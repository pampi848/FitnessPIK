<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 18:21
 */

namespace Actions;

require_once "autoload.php";

class ViewProfile extends Action
{

    function doExecute()
    {
        $this->loadContent('profile', 'marika');
    }
}