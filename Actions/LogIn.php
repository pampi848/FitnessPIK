<?php
namespace Actions;

use Util\Database;
use Accounts\Account;
use Accounts\User;

require_once "autoload.php";

class LogIn extends  Action{
    
    function doExecute()
    {
        if (isset($_POST['newUser']['log']) && isset($_POST['newUser']['pass'])) {
            $login = addslashes($_POST['newUser']['log']);
            $haslo = addslashes($_POST['newUser']['pass']);

            if ($haslo === Account::fetchPasswordByLogin($login)) {
                $konto = Account::fetchAccountByLoginAndPass($login,$haslo);
                if(isset($konto)&&is_object($konto)&&$konto->activated==true) {
                    $_SESSION['logged'] = ['online' => true, 'imie' => $konto->imie, 'level' => $konto->level];
                }
                else {
                    $_SESSION['messages'][0] = ['class' => 'alert-warning', 'content' => 'Konto nie zostało aktywowane! Proszę aktywować konto linkiem w wiadomości e-mail.'];
                }
            } else {
                $_SESSION['messages'][0] = ['class' => 'alert-danger', 'content' => 'Zapewne pomyliłeś login lub hasło.'];
            }

        }
        header('location: http://localhost/FitnessPIK/');
    }
    
}