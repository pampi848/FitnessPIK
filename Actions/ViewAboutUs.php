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
class ViewAboutUs extends Action
{
    function doExecute()
    {
        $this->loadContent('aboutus');
    }
}