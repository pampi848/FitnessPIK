<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 18:21
 */

namespace Actions;

require_once "autoload.php";

class ViewNewsAdd extends Action
{

    function doExecute()
    {
		// narazie nie używane
        if ((isset($_SESSION['logged']['online'])) && ($_SESSION['logged']['online'] == true) && (isset($_SESSION['logged']['level'])) && ($_SESSION['logged']['level'] == 1)) {

            $this->setContent('newsForm');
		}
		else
		{
			// TODO: 404
		    $_SESSION['messages'][0] = ['class' => 'alert-danger', 'content' => 'Coś poszło nie tak!'];

            $this->setContent();
		}
	}
}