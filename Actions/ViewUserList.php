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
class ViewUserList extends Action
{
    function doExecute()
    {
        if((isset($_SESSION['logged']['level'])) && (($_SESSION['logged']['level'] == 2) || ($_SESSION['logged']['level'] == 1)) && (isset($_GET['id']))) {

            $konta = Account::fetchUczestniczacy($_GET['id']);

            $this->loadContent('userlist', $konta);
        }
        else{
            header('location: ?action=401');
        }
    }
}