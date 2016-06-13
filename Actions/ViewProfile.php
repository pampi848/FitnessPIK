<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 18:21
 */

namespace Actions;

require_once "autoload.php";

use Accounts\Account;

class ViewProfile extends Action
{

    function doExecute()
    {
        if (isset($_SESSION['logged'])) {

            if ($_SESSION['logged']['level'] == 1 && isset($_GET['id'])) {
                $konto = Account::fetchUserProfile((int)addslashes($_GET['id']));
            }
            else {
                $konto = Account::fetchUserProfile((int)addslashes($_SESSION['logged']['id']));
            }
            if(empty($konto)){
                $this->session->add('messages', ['class' => 'alert-danger', 'content' => 'Nie ma takiego konta!']);
                header("location: ?");
                die();
            }

            switch ($konto['level']) {
                case 0:
                    $konto['level'] = 'User';
                    break;
                case 1:
                    $konto['level'] = 'Administrator';
                    break;
                case 2:
                    $konto['level'] = 'Instruktor';
                    break;
            }
            $this->loadContent('profile', $konto);
        }
        else {
            header("location: index.php");
        }
    }
}