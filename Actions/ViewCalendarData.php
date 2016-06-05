<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 04.06.16
 * Time: 21:31
 */
require_once "autoload.php";

use Accounts\Account;
use Models\Zajecia;

function returnData($logged)
{
    if (isset($logged['login'])) {
        $login = $logged['login'];
        $idAccount = Account::fetchIdByLogin($login);
        $tablicaZajec = Zajecia::fetchZajeciaByIdAccount($idAccount);
        return $tablicaZajec;
    }
}
