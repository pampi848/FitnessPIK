<?php
require_once "../autoload.php";
require_once('../PHPMailer/class.phpmailer.php');
require_once '../PHPMailer/PHPMailerAutoload.php';
require_once "../Actions/activationMail.php"; // funkcja do wysyłania maili

use Accounts\User;

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

$obiekt = User::userCreate($login, $haslo, $email, $nrTel, $imie, $nazwisko, $miejscowosc, $ulica, $nrDomu,
    $nrMieszkania, $kodPocztowy, $dataUrodzin);