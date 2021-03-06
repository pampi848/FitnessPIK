<?php

namespace Accounts;
require_once "autoload.php";

use PDO;
use Util\Database;

class User extends Account
{

    public static function userCreate($konto = ['log' => '', 'pass' => '', 'mail' => '', 'tel' => 1, 'name' => '', 'lastname' => '', 'place' => '', 'street' => '', 'home' => 0, 'flat' => 0, 'zipcode' => '', 'birthday' => '', 'activationCode' => ''])
    {
        $checker = '';
        $checker .= isset($konto['log']) && has_spaces($konto['log']) && (mb_strlen($konto['log'], 'utf-8') > 5) ? '' : 'Zły login! <br/>';
        $checker .= isset($konto['pass']) && has_spaces($konto['pass']) && (mb_strlen($konto['pass'], 'utf-8') > 5) ? '' : 'Złe hasło! <br/>';

        $checker .= isset($konto['mail']) && has_spaces($konto['mail']) && is_mail($konto['mail']) ? '' : 'Zły mail! <br/>';
        $checker .= isset($konto['tel']) && is_numeric($konto['tel']) && ($konto['tel'] > 0) && (strlen((string)$konto['tel']) == 9) ? '' : 'Zły numer telefonu! <br/>';
        $checker .= isset($konto['name']) && has_spaces($konto['name']) && (mb_strlen($konto['name'], 'utf-8') > 3) ? '' : 'Złe imię! <br/>';
        $checker .= isset($konto['lastname']) && has_spaces($konto['lastname']) && (mb_strlen($konto['lastname'], 'utf-8') > 3) ? '' : 'Złe nazwisko! <br/>';
        $checker .= isset($konto['place']) && (mb_strlen($konto['place'], 'utf-8') > 3) ? '' : 'Zła miejscowość! <br/>'; // ma spacje bo np Dębnica Kaszubska
        $checker .= isset($konto['street']) && has_spaces($konto['street']) && (mb_strlen($konto['street'], 'utf-8') > 3) ? '' : 'Zła ulica! <br/>';
        $checker .= isset($konto['home']) && is_numeric($konto['home']) && ($konto['home'] > 0) ? '' : 'Zły nr. domu! <br/>';
        $checker .= isset($konto['flat']) && is_numeric($konto['flat']) && ($konto['flat'] > 0) ? '' : 'Zły nr. mieszkania! <br/>';
        $checker .= isset($konto['zipcode']) && is_zipcode($konto['zipcode']) ? '' : 'Zły kod pocztowy! <br/>';
        $checker .= isset($konto['birthday']) && checkdate(substr($konto['birthday'], 5, -3), substr($konto['birthday'], 8), substr($konto['birthday'], 0, -6)) ? '' : 'Zła data urodzin! <br/>'; // $miesiąc, $dzień, $rok

        if (empty($checker)) { //TODO: przerobić to na wzykłego konstrukta XD
            $nowekonto = new User;
            $nowekonto->setLogin(addslashes(mb_strtolower($konto['log'])));
            $nowekonto->setHaslo(addslashes($konto['pass']));
            $nowekonto->setEmail(addslashes(mb_strtolower($konto['mail'])));
            $nowekonto->setNrTel(addslashes($konto['tel']));
            $nowekonto->setImie(addslashes($konto['name']));
            $nowekonto->setNazwisko(addslashes($konto['lastname']));
            $nowekonto->setMiejscowosc(addslashes($konto['place']));
            $nowekonto->setUlica(addslashes($konto['street']));
            $nowekonto->setNrDomu(addslashes($konto['home']));
            $nowekonto->setNrMieszkania(addslashes($konto['flat']));
            $nowekonto->setKodPocztowy(addslashes($konto['zipcode']));
            $nowekonto->setDataUrodzin(addslashes($konto['birthday']));
            $nowekonto->setDataUtworzenia(date("Y-m-d H:i:s"));
            $nowekonto->setActivationCode(addslashes($konto['activationCode']));
            return $nowekonto;
        } else {
            $checker .= 'Spróbuj jeszcze raz.';
            return $checker;
        }
    }
    
    
    public static function findSameCode($activationCode)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `activationCode` FROM `account` WHERE `activationCode` = :code");
            $stmt->bindValue(':code', $activationCode, PDO::PARAM_STR);

            $stmt->execute();
            $code = $stmt->fetch();
            $code = $code[0];

        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $code;
    }

    public static function findSameMail($mail)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `email` FROM `account` WHERE `email` = :email");
            $stmt->bindValue(':email', $mail, PDO::PARAM_STR);

            $stmt->execute();
            $mail = $stmt->fetch();
            $mail = $mail[0];

        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $mail;
    }

    public static function findSameLogin($login)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT `login` FROM `account` WHERE `login` = :login");
            $stmt->bindValue(':login', $login, PDO::PARAM_STR);

            $stmt->execute();
            $login = $stmt->fetch();
            $login = $login[0];

        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $login;
    }

    public static function activation($activationCode)
    {
        try {
            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("UPDATE `account` SET `activated` = 1 WHERE `activationCode` = :code");
            $stmt->bindValue(':code', $activationCode, PDO::PARAM_STR);

            $stmt->execute();

        } catch (PDOException $exception) {
            // TODO: log database errors
            throw $exception;
        }

        return $stmt->rowCount() ? true : false;
    }
}