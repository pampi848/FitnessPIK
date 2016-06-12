<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 18:21
 */

namespace Actions;

use Models\Zajecia;

require_once "autoload.php";

class ViewOffer extends Action
{

    function doExecute()
    {
        $zajecia = Zajecia::fetchAllZajecia();
        $this->loadContent('cennik', $zajecia);
    }
}