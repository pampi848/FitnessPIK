<?php
//require "../autoload.php";
//require_once('../PHPMailer/class.phpmailer.php');
//require_once "../Actions/ActivationMail.php";
//require '../PHPMailer/PHPMailerAutoload.php';
//use Accounts\User;
//
//$login = 'loltrwe';
//$haslo = 'lewfgtl';
//$email = 'wiczkawala21@gmail.com ';
//$nrTel = 123456789;
//$imie = 'ddddfq';
//$nazwisko ='edddwf';
//$miejscowosc = 'edeee';
//$ulica = 'eeeee';
//$nrDomu = 1;
//$nrMieszkania = 1;
//$kodPocztowy = '66-666';
//$dzienUrodzin = 1;
//$miesiacUrodzin = 1;
//$rokUrodzin = 1111;
//$obiekt = User::userCreate($login, $haslo, $email, $nrTel, $imie, $nazwisko, $miejscowosc, $ulica, $nrDomu,
//                           $nrMieszkania, $kodPocztowy, $dzienUrodzin, $miesiacUrodzin, $rokUrodzin);
//var_dump($obiekt);
//$body = "
//<!DOCTYPE html>
//<html lang='en'>
//Hello World!
//<a href='http://localhost/FitnessPIK'>Fitness PIK </a>
//</html>
//";
//define('GUSER', 'pampi.com@gmail.com'); // GMail username
//define('GPWD', 'poweRvolumE4'); // GMail password
//for ($i=0;$i<100;$i++) {
//    smtpmailer($email, 'pampi.com@hotmail.com', 'Administracja PIK', 'Aktywacja konta', $body);
//}
include '../Validators/ISzipcode.php';
echo is_zipcode('76-248');