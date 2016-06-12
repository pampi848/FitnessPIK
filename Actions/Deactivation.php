<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 11.06.16
 * Time: 17:25
 */

namespace Actions;

require_once "autoload.php";

use Accounts\Account;

class Deactivation extends Action
{
    public function doExecute()
    {
        if (isset($_SESSION['logged']) && ( ($_SESSION['logged']['level']==1) || ($_SESSION['logged']['id']==$this->request->get('id')) && ($this->request->get('action')=='deactivation') ) ) {
            $aktywne = Account::isActivatedInDatabase($this->request->get('id'));
            if ( ($aktywne['activated']==1) && ($aktywne['activationCode']!='disable') ) {
                if ($_SESSION['logged']['level']==1) {
                    Account::ban($this->request->get('id'),true);
                    $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Konto dezaktywowane.']);
                    if((int)$this->request->get('id')==(int)$_SESSION['logged']['id']){
                        header('location: ?action=logout');
                        die();
                    }
                    header('location: ?action=users');
                }
                else{
                    Account::ban($this->request->get('id'));
                    $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Konto dezaktywowane.']);
                    header('location: ?action=logout');
                }
            }
            elseif( ($aktywne['activated']==0) && ($aktywne['activationCode']!='disable') ){
                $code = $this->randCode();
                Account::unban($this->request->get('id'),$code);
                $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Konto aktywowane!']);
                if ($_SESSION['logged']['level'] == 1) {
                    header('location: ?action=users');
                } else {
                    header('location: ?');
                }
            }

            else{ // 0&&disable || 1&&disable to tylko if admin
               if($_SESSION['logged']['level']==1){
                   $code = $this->randCode();
                   Account::unban($this->request->get('id'),$code);
                   $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Konto aktywowane!']);
                   header('location: ?action=users');
               }
            }
        }
    }
}