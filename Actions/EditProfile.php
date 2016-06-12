<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 12.06.16
 * Time: 23:19
 */

namespace Actions;

require_once "autoload.php";

class EditProfile extends Action
{
    function doExecute()
    {
        if( isset($_SESSION['logged']) && isset($_SESSION['data']['id']) && isset($_POST['Edit']) ){

            $konto = $_POST['Edit'];
            
            $checker = '';
            $checker .= isset($konto['log']) && has_spaces($konto['log']) && (mb_strlen($konto['log'], 'utf-8') > 5) ? '' : 'Zły login! <br/>';

            $checker .= isset($konto['mail']) && has_spaces($konto['mail']) && is_mail($konto['mail']) ? '' : 'Zły mail! <br/>';
            $checker .= isset($konto['phone']) && is_numeric($konto['phone']) && ($konto['phone'] > 0) && (strlen((string)$konto['phone']) == 9) ? '' : 'Zły numer telefonu! <br/>';
            $checker .= isset($konto['name']) && has_spaces($konto['name']) && (mb_strlen($konto['name'], 'utf-8') > 3) ? '' : 'Złe imię! <br/>';
            $checker .= isset($konto['lastname']) && has_spaces($konto['lastname']) && (mb_strlen($konto['lastname'], 'utf-8') > 3) ? '' : 'Złe nazwisko! <br/>';
            $checker .= isset($konto['place']) && (mb_strlen($konto['place'], 'utf-8') > 3) ? '' : 'Zła miejscowość! <br/>'; // ma spacje bo np Dębnica Kaszubska
            $checker .= isset($konto['street']) && has_spaces($konto['street']) && (mb_strlen($konto['street'], 'utf-8') > 3) ? '' : 'Zła ulica! <br/>';
            $checker .= isset($konto['home']) && is_numeric($konto['home']) && ($konto['home'] > 0) ? '' : 'Zły nr. domu! <br/>';
            $checker .= isset($konto['flat']) && is_numeric($konto['flat']) && ($konto['flat'] > 0) ? '' : 'Zły nr. mieszkania! <br/>';
            $checker .= isset($konto['post']) && is_zipcode($konto['post']) ? '' : 'Zły kod pocztowy! <br/>';
            $checker .= isset($konto['date']) && checkdate(substr($konto['date'], 5, -3), substr($konto['date'], 8), substr($konto['date'], 0, -6)) ? '' : 'Zła data urodzin! <br/>'; // $miesiąc, $dzień, $rok

            if (empty($checker)) { //TODO: przerobić to na wzykłego konstrukta XD
                $nowekonto = new User;
                $nowekonto->setLogin(addslashes(mb_strtolower($konto['log'])));
                
                $nowekonto->setEmail(addslashes(mb_strtolower($konto['mail'])));
                $nowekonto->setNrTel(addslashes($konto['phone']));
                $nowekonto->setImie(addslashes($konto['name']));
                $nowekonto->setNazwisko(addslashes($konto['lastname']));
                $nowekonto->setMiejscowosc(addslashes($konto['place']));
                $nowekonto->setUlica(addslashes($konto['street']));
                $nowekonto->setNrDomu(addslashes($konto['home']));
                $nowekonto->setNrMieszkania(addslashes($konto['flat']));
                $nowekonto->setKodPocztowy(addslashes($konto['post']));
                $nowekonto->setDataUrodzin(addslashes($konto['date']));
                
                
            } else {
                $checker .= 'Spróbuj jeszcze raz.';
                $this->session->add('messages', ['class' => 'alert-danger', 'content' => $checker]);
            }
            
            header("location: ?action=profile&&id={$_SESSION['data']['id']}");
            die();
        }
        header('location: ?');
    }
}