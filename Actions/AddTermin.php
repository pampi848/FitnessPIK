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
        if( isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1 && isset($_GET['id']) && is_numeric($_GET['id']) && isset($_POST['termin']) ){

            $termin = $_POST['termin'];
            $termin['id_zajecia'] = $_GET['id'];

            $checker = '';

            $checker .= isset($termin['id_zajecia']) && is_numeric($termin['id_zajecia']) && ($termin['id_zajecia'] > 0) ? '' : 'Złe id zajęcia! <br/>';
            $checker .= isset($termin['hour']) && is_numeric($termin['hour']) && ($termin['hour'] > 0) && ($termin['hour'] < 24) ? '' : 'Nie ma takiej godziny! <br/>';
            $checker .= isset($termin['min']) && is_numeric($termin['min']) && ($termin['min'] > 0) && ($termin['min'] < 60)  ? '' : 'Nie ma takiej minuty! <br/>';
            $checker .= !empty($termin['sala']) ? '' : 'Brak sali! <br/>';
            $checker .= isset($termin['day']) && is_numeric($termin['day']) && ($termin['day'] > 0) && ($termin['day'] < 8) ? '' : 'Nie ma takiego dnia! <br/>';

            if (empty($checker)) {
                $nowalekcja = new Zajecia();

                $nowalekcja->setId(addslashes($termin['id_zajecia']));
                $nowalekcja->setData(['dzienTygodnia' => addslashes($termin['day']), 'godzina' => (addslashes($termin['hour']).'.'.addslashes($termin['min'])), 'sala' => addslashes($termin['sala'])]);
//var_dump($nowalekcja->getData());die();
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