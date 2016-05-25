<?php
require "../autoload.php";
use Accounts\User;

$login = 'loltrwe';
$haslo = 'lewfgtl';
$email = 'fg@lol.com';
$nrTel = 123456789;
$imie = 'ddddfq';
$nazwisko ='edddwf';
$miejscowosc = 'edeee';
$ulica = 'eeeee';
$nrDomu = 1;
$nrMieszkania = 1;
$kodPocztowy = '66-666';
$dzienUrodzin = 1;
$miesiacUrodzin = 1;
$rokUrodzin = 1111;
$obiekt = User::userCreate($login, $haslo, $email, $nrTel, $imie, $nazwisko, $miejscowosc, $ulica, $nrDomu,
                           $nrMieszkania, $kodPocztowy, $dzienUrodzin, $miesiacUrodzin, $rokUrodzin);
var_dump($obiekt);

$obiekt->insertAccountIntoSQL();