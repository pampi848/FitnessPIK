<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 11.06.16
 * Time: 19:55
 */

namespace Actions;

use Accounts\Account;

require_once "autoload.php";
require_once('PHPMailer/class.phpmailer.php');
require_once 'PHPMailer/PHPMailerAutoload.php';
require_once "Actions/ActivationMail.php"; // funkcja do wysyłania maili
class SendAgainAC extends Action
{
    public function doExecute()
    {
        if (isset($_SESSION['logged']) && ($_SESSION['logged']['level']==1) && isset($_GET['id']) && isset($_GET['mail'])){
            $email = $_GET['mail'];
            $activated = Account::isActivatedInDatabase($_GET['id']);

                $subject = 'Aktywacyja konta';
                $body = "Link aktywanycjny: http://localhost/FitnessPIK/?action=activation&&code={$activated['activationCode']}";
                smtpmailer($email, FROM, FROMNAME, $subject, $body);

                $_SESSION['messages'][0] = ['class' => 'alert-success', 'content' => 'Wysłano link aktywacyjny!'];
                header('location: ?action=users');
                die();
        }
        elseif (isset($_POST['newUser']['log']) && isset($_POST['newUser']['pass']) && isset($_POST['newUser']['mail'])) {
            $login = addslashes($_POST['newUser']['log']);
            $haslo = addslashes(base64_encode($_POST['newUser']['pass']));
            $email = $_POST['newUser']['mail'];
            if ($haslo === Account::fetchPasswordByLogin($login)) {
                $id = Account::fetchIdByLogin($login);
                $activated = Account::isActivatedInDatabase($id);

                $subject = 'Aktywacyja konta';
                $body = "Link aktywanycjny: http://localhost/FitnessPIK/?action=activation&&code={$activated['activationCode']}";
                smtpmailer($email, FROM, FROMNAME, $subject, $body);

                $_SESSION['messages'][0] = ['class' => 'alert-success', 'content' => 'Wysłano link aktywacyjny! Aby aktywować konto kliknij w link w wiadomości na twoim mailu.'];
            }
        }
        else{
            $_SESSION['messages'][0] = ['class' => 'alert-warning', 'content' => 'Aby wysłać link aktywacyjny potrzeba loginu, hasła oraz emaila!'];
        }
        header('location: ?');
        }

}