<?php
require_once "../autoload.php";
require_once('../PHPMailer/class.phpmailer.php');
require_once '../PHPMailer/PHPMailerAutoload.php';
require_once "../Actions/activationMail.php"; // funkcja do wysyłania maili

use Accounts\User;

//odbiorca\\
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$email = $_POST['email'];
$nrTel = $_POST['nrTel'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$miejscowosc = $_POST['miejscowosc'];
$ulica = $_POST['ulica'];
$nrDomu = $_POST['nrDomu'];
$nrMieszkania = $_POST['nrMieszkania'];
$kodPocztowy = $_POST['kodPocztowy'];
$dataUrodzin = $_POST['dataUrodzin'];

//naDawca\\
const GUSER = 'pampi.com@gmail.com'; // GMail username
const GPWD = 'poweRvolumE4'; // GMail password
const FROM ='pampi.com@gmail.com';
const FROMNAME = 'Administracja Fitness Club';
$subject = 'Kod aktywacyjny';
$body = '123';

//Logic\\
$user = User::userCreate($login, $haslo, $email, $nrTel, $imie, $nazwisko, $miejscowosc, $ulica, $nrDomu,
    $nrMieszkania, $kodPocztowy, $dataUrodzin);
if(is_object($user)) { // jeśli nie to jest to komunikat o błędach
    smtpmailer($email, FROM, FROMNAME, $subject, $body);
    $user->insertAccountIntoSQL();
    echo "Zarejestrowano pomyślnie, sprawdź pocztę, aby aktywować konto! <a href='../'>Wróć do strony głównej</a>";
}
else{
    echo $user;
}