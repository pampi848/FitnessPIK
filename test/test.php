<?php
require "../autoload.php";
use Accounts\User;

//$login = 'michal';
//$haslo = 'mojehaslo';
//$email = 'mail@lol.com';
//$nrTel = 123456789;
//$imie = 'michal';
//$nazwisko = 'klemiato';
//$miejscowosc = 'debnica';
//$ulica = 'fabryczna';
//$nrDomu = 10;
//$nrMieszkania = 3;
//$kodPocztowy = '76-248';
//$dzienUrodzin = 18;
//$miesiacUrodzin = 01;
//$rokUrodzin = 1997;
//$obiekt = User::userCreate($login, $haslo, $email, $nrTel, $imie, $nazwisko, $miejscowosc, $ulica, $nrDomu,
//                           $nrMieszkania, $kodPocztowy, $dzienUrodzin, $miesiacUrodzin, $rokUrodzin);
//var_dump($obiekt);

var_dump(User::fetchAccountByLoginAndPass('root','root'));