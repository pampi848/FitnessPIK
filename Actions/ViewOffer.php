<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 18:21
 */

namespace Actions;

use Accounts\Account;
use Models\Zajecia;

require_once "autoload.php";

class ViewOffer extends Action
{

    function doExecute()
    {
        $zajecia = Zajecia::fetchAllZajecia();

        $dniTygodnia = ['Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela'];
        $i = 1;
        foreach ($zajecia as $oferta){
            $oferta->setIdInstruktor(Account::fetchNamesById($oferta->getIdInstruktor()));
            $j=0;
            foreach ($oferta->getData() as $data) {
                if(empty($data)) $data=[];
                $zajecia[$i]->data[$j]['dzienTygodnia'] = $dniTygodnia[((int)$zajecia[$i]->getData()[$j]['dzienTygodnia'])] ;
                $j++;
            }
            unset($j);
            $i++;
        }
        unset($i);
        $this->loadContent('cennik', $zajecia);
    }
}