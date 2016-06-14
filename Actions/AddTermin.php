<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 12.06.16
 * Time: 23:19
 */

namespace Actions;

require_once "autoload.php";

use Models\Zajecia;

class AddTermin extends Action
{
    function doExecute()
    {
        if( isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1 && isset($_GET['id']) ){

            $termin = $_POST['termin'];
            $checker = '';

            $checker .= isset($termin['id_zajecia']) && is_numeric($termin['id_zajecia']) && ($termin['id_zajecia'] > 0) ? '' : 'Złe id zajęcia! <br/>';
            $checker .= isset($termin['godzina']) && is_numeric($termin['godzina']) && ($termin['godzina'] > 0) ? '' : 'Złe id zajęcia! <br/>';
            $checker .= isset($termin['sala']) && is_numeric($termin['sala']) && ($termin['sala'] > 0) ? '' : 'Zła sala! <br/>';
            $checker .= isset($termin['dzienTygodnia']) && is_numeric($termin['dzienTygodnia']) && ($termin['dzienTygodnia'] > 0) && ($termin['dzienTygodnia'] <7) ? '' : 'Złe id zajęcia! <br/>';

            if (empty($checker)) {
                $nowalekcja = new Zajecia();

                $nowalekcja->setId(addslashes($termin['id_zajecia']));
                $nowalekcja->setData(['dzienTygodnia' => addslashes($termin['dzienTygodnia']), 'godzina' => addslashes($termin['godzina']), 'sala' => addslashes($termin['sala'])]);

                $nowalekcja->pushNewTerminToDB();
                $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Dodano nowe zajecie']);
            } else {
                $checker .= 'Spróbuj jeszcze raz.';
                $this->session->add('messages', ['class' => 'alert-danger', 'content' => $checker]);
            }

            header("location: ?action=offer");
            die();
        }
        header('location: ?action=401');
    }
}