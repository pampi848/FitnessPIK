<?php

namespace Accounts;
require "Account.php";


class User extends Account
{

    public static function userCreate($log, $pass, $mail, $tel, $name, $lastname, $place, $street, $home, $flat, $zipcode, $birthday)
    {
        $checker = '';
        $checker .= isset($log) && has_spaces($log) && (mb_strlen($log, 'utf-8') > 5) ? '' : 'Zły login! <br/>';
        $checker .= isset($pass) && has_spaces($pass) && (mb_strlen($pass, 'utf-8') > 5) ? '' : 'Złe hasło! <br/>';

        $checker .= isset($mail) && has_spaces($mail) && is_mail($mail) ? '' : 'Zły mail! <br/>';
        $checker .= isset($tel) && is_numeric($tel) && ($tel > 0) && (strlen((string)$tel) == 9) ? '' : 'Złe numer telefonu! <br/>';
        $checker .= isset($name) && has_spaces($name) && (mb_strlen($name, 'utf-8') > 3) ? '' : 'Złe imię! <br/>';
        $checker .= isset($lastname) && has_spaces($lastname) && (mb_strlen($lastname, 'utf-8') > 3) ? '' : 'Złe nazwisko! <br/>';
        $checker .= isset($place) && (mb_strlen($place, 'utf-8') > 3) ? '' : 'Zła miejscowość! <br/>'; // ma spacje bo np Dębnica Kaszubska
        $checker .= isset($street) && has_spaces($street) && (mb_strlen($street, 'utf-8') > 3) ? '' : 'Zła ulica! <br/>';
        $checker .= isset($home) && is_numeric($home) && ($home > 0) ? '' : 'Zły nr. domu! <br/>';
        $checker .= isset($flat) && is_numeric($flat) && ($flat > 0) ? '' : 'Zły nr. mieszkania! <br/>';
        $checker .= isset($zipcode) && is_zipcode($zipcode) ? '' : 'Zły kod pocztowy! <br/>';
        $checker .= isset($birthday) && checkdate(substr($birthday,5,-3), substr($birthday,8), substr($birthday,0,-6)) ? '' : 'Zła data urodzin! <br/>'; // $miesiąc, $dzień, $rok

        if (empty($checker)) {
            $nowekonto = new User;
            $nowekonto->setLogin(addslashes(mb_strtolower($log)));
            $nowekonto->setHaslo(addslashes($pass));
            $nowekonto->setEmail(addslashes(mb_strtolower($mail)));
            $nowekonto->setNrTel(addslashes($tel));
            $nowekonto->setImie(addslashes($name));
            $nowekonto->setNazwisko(addslashes($lastname));
            $nowekonto->setMiejscowosc(addslashes($place));
            $nowekonto->setUlica(addslashes($place));
            $nowekonto->setNrDomu(addslashes($home));
            $nowekonto->setNrMieszkania(addslashes($flat));
            $nowekonto->setKodPocztowy(addslashes($zipcode));
            $nowekonto->setDataUrodzin(addslashes($birthday));
            $nowekonto->setDataUtworzenia(date("Y-m-d H:i:s"));
            return $nowekonto;
        } else {
            //można zrobić coś wincyj albo po chamsku - die...
            return $checker;
        }
    }

    public function userAlreadyExist()
    {

    }

}