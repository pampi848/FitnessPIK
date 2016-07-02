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
        if (is_array($zajecia)) {
            $dniTygodnia = ['Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela'];
            foreach ($zajecia as $oferta) {
                $oferta->setIdInstruktor(Account::fetchNamesById($oferta->getIdInstruktor()));
                foreach ($oferta->getData() as $data) {

                    if (empty($data)) $data = [];
                    $dzienSlownie = (int)($data['dzienTygodnia']);
                    $dzienSlownie = --$dzienSlownie;
                    $oferta->$data["dzienTygodnia"] = $dniTygodnia[$dzienSlownie];
                }
            }
        }
        $this->loadContent('cennik', $zajecia);
    }
}
