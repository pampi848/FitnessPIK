<?php
namespace Actions;

use Accounts\Account;
use Util\Session;

require_once "autoload.php";

class LogIn extends Action
{
    function doExecute()
    {
        if (isset($_POST['newUser']['log']) && isset($_POST['newUser']['pass'])) {
            $login = addslashes($_POST['newUser']['log']);
            $haslo = addslashes($_POST['newUser']['pass']);

            if ($haslo === Account::fetchPasswordByLogin($login)) {
                $konto = Account::fetchAccountByLoginAndPass($login, $haslo);
                if (isset($konto) && is_object($konto) && $konto->activated == true) {
                    $this->session->add('logged',['online' => true, 'imie' => $konto->imie, 'level' => $konto->level, 'login' => $login, 'id' => $konto->id]);//  $_SESSION['logged'] = ['online' => true, 'imie' => $konto->imie, 'level' => $konto->level];
                    $_SESSION['messages'][0] = ['class' => 'alert-success', 'content' => 'Zalogowano pomyślnie.'];

                } else {
                    $aktywne = Account::isActivatedInDatabase(Account::fetchIdByLogin($login));
                    if ($aktywne['activationCode'] == 'disable') {
                        $_SESSION['messages'][0] = ['class' => 'alert-danger', 'content' => 'Konto zostało zbanowane!'];
                    }
                    elseif ( ($aktywne['activated'] == 0)&&($aktywne['activationCode'] != 'disable') ) {
                        $_SESSION['messages'][0] = ['class' => 'alert-warning', 'content' => 'Konto nie jest aktywne! Proszę aktywować konto linkiem w wiadomości e-mail.'];
                    }
                }
            } else {
                $_SESSION['messages'][0] = ['class' => 'alert-danger', 'content' => 'Zapewne pomyliłeś login lub hasło.'];
            }

        }
        header('location: ?');
    }

}