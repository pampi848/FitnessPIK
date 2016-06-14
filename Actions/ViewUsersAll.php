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
class ViewUsersAll extends Action
{
    function doExecute()
    {
        if((isset($_SESSION['logged']['online'])) && ($_SESSION['logged']['online'] == true) && (isset($_SESSION['logged']['level'])) && ($_SESSION['logged']['level'] == 1)) {
            $allUsers = Account::fetchAllAccounts();
            
            $this->loadContent('users', $allUsers);
        }
        else{
            header('location: ?action=401');
        }
    }
}