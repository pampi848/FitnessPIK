<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 12.06.16
 * Time: 23:19
 */

namespace Actions;

require_once "autoload.php";

use Accounts\Account;
use Models\Zajecia;

class AddLesson extends Action
{
    function doExecute()
    {
        if( isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1 && isset($_POST['lesson']) ){

            $lesson = $_POST['lesson'];
            $checker = '';

            $checker .= isset($lesson['name']) && has_spaces($lesson['name']) && (mb_strlen($lesson['name'], 'utf-8') > 3) ? '' : 'Zła nazwa! <br/>';
            $checker .= isset($lesson['opis']) && (mb_strlen($lesson['opis'], 'utf-8') > 3) ? '' : 'Zły Opis! <br/>';
            $checker .= isset($lesson['idInstruktor']) && is_numeric($lesson['idInstruktor']) && ((int)Account::checkLevel($lesson['idInstruktor'])==2) && ($lesson['idInstruktor'] > 0) ? '' : 'Złe id instruktora! <br/>';
            $checker .= isset($lesson['cena']) && is_numeric($lesson['cena']) && ($lesson['cena'] > 0) ? '' : 'Zła cena! <br/>';
            $checker .= isset($lesson['promocja']) && is_numeric($lesson['promocja']) && ($lesson['promocja'] > 0) && ($lesson['promocja'] <= 1)? '' : 'Zła promocja! <br/>';
            $checker .= isset($lesson['wynagrodzenie']) && is_numeric($lesson['wynagrodzenie']) && ($lesson['wynagrodzenie'] > 0) && ($lesson['wynagrodzenie'] > 1)? '' : 'Złe wynagrodzenie! <br/>';

            if (empty($checker)) {
                $nowalekcja = new Zajecia();
                
                $nowalekcja->setNazwa(addslashes($lesson['name']));
                $nowalekcja->setOpis(addslashes($lesson['opis']));
                $nowalekcja->setIdInstruktor(addslashes($lesson['idInstruktor']));
                $nowalekcja->setCena(['cena' => addslashes($lesson['cena']), 'promocja' => addslashes($lesson['promocja'])]);
                $nowalekcja->setWynagrodzenieInstruktora(addslashes($lesson['wynagrodzenie']));

                $id = $nowalekcja->pushNewZajeciaToDB();
                $nowalekcja->pushNewCennikToDB($id);
                $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Dodano nowe zajecie']);
            } else {
                $checker .= 'Spróbuj jeszcze raz.';
                $this->session->add('messages', ['class' => 'alert-danger', 'content' => $checker]);
            }
            
            header("location: ?action=addlesson&&id={$lesson['idInstruktor']}");
            die();
        }
        header('location: ?');
    }
}