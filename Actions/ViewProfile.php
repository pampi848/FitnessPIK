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
use Models\Zajecia;

class ViewProfile extends Action
{

    function doExecute()
    {

    if (isset($_SESSION['logged']) && $_SESSION['logged']['level'] == 1 && isset($_GET['id'])){
        $konto = Account::fetchUserProfile((int)addslashes($_GET['id']));
        switch ($konto['level']){
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
        $this->loadContent('profile',$konto);

    }
        elseif (isset($_SESSION['logged'])) {
            $konto = Account::fetchMyProfile($_SESSION['logged']['login']);
            switch ($_SESSION['logged']['level']){
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
            $this->loadContent('profile',$konto);
        }
        else{
            header("location: index.php");
        }
    }
}