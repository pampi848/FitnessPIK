<?php

namespace Accounts;
require "Account.php";


class User extends Account
{

    public static function userCreate($log, $pass, $mail, $tel, $name, $lastname, $place, $street, $home, $flat, $zipcode, $birthday, $birthmonth, $birthyear)
    {
        $checker = 0;
        $checker += isset($log) && has_spaces($log) && (mb_strlen($log, 'utf-8') > 5) ? 0 : 1;
        $checker += isset($pass) && has_spaces($pass) && (mb_strlen($pass, 'utf-8') > 5) ? 0 : 1;

        $checker += isset($mail) && has_spaces($mail) && is_mail($mail) ? 0 : 1;
        $checker += isset($tel) && is_numeric($tel) && ($tel > 0) && (strlen((string)$tel) == 9) ? 0 : 1;
        $checker += isset($name) && has_spaces($name) && (mb_strlen($name, 'utf-8') > 3) ? 0 : 1;
        $checker += isset($lastname) && has_spaces($lastname) && (mb_strlen($lastname, 'utf-8') > 3) ? 0 : 1;
        $checker += isset($place) && (mb_strlen($place, 'utf-8') > 3) ? 0 : 1; // ma spacje bo np Dębnica Kaszubska
        $checker += isset($street) && has_spaces($street) && (mb_strlen($street, 'utf-8') > 3) ? 0 : 1;
        $checker += isset($home) && is_numeric($home) && ($home > 0) ? 0 : 1;
        $checker += isset($flat) && is_numeric($flat) && ($flat > 0) ? 0 : 1;
        $checker += isset($zipcode) && is_zipcode($zipcode) ? 0 : 1;

        $checker += isset($birthday) && is_numeric($birthday) ? 0 : 1;
        $checker += isset($birthmonth) && is_numeric($birthmonth) ? 0 : 1;
        $checker += isset($birthyear) && is_numeric($birthyear) ? 0 : 1;
        $checker += checkdate($birthmonth, $birthday, $birthyear) ? 0 : 1;

        if ($checker === 0) {
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
            $nowekonto->setDataUrodzin(addslashes($birthyear),addslashes($birthmonth),addslashes($birthday));
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