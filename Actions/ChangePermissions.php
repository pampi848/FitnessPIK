<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 11.06.16
 * Time: 23:40
 */

namespace Actions;

require_once "autoload.php";

use Accounts\Account;
class ChangePermissions extends Action
{
    public function doExecute()
    {
        if((isset($_SESSION['logged']['level'])) && ($_SESSION['logged']['level'] == 1) && (isset($_GET['id']) && (isset($_GET['level'])) )){
            Account::changePremissions((int)$this->request->get('id'),(int)$this->request->get('level'));

            $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Zmieniono uprawnienia wybranego konta.']);
            header('location: ?action=users');
        }
        else{
            header('location: ?action=404');
        }
    }
}