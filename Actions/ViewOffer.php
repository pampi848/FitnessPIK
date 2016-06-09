<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 18:21
 */

namespace Actions;

require_once "autoload.php";


class ViewOffer extends Action
{

    function doExecute()
    {
        $p = 'TODO: Pobrać wszystko z zajęc, wg pobranych danych pobrać kolejne dane z terminarza i cennika.';
        $this->loadContent('index', $p);
    }
}