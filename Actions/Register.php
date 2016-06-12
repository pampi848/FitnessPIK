<?php
namespace Actions;

use Accounts\User;

require_once "autoload.php";
require_once('PHPMailer/class.phpmailer.php');
require_once 'PHPMailer/PHPMailerAutoload.php';
require_once "Actions/ActivationMail.php"; // funkcja do wysyłania maili

class Register extends Action
{
    protected function doExecute()
    {

        $_SESSION['messages'] = [];
        if (isset($_POST['newUser']) && is_array($_POST['newUser']) && (User::findSameMail($_POST['newUser']['mail']) == $_POST['newUser']['mail'])) {
            $_SESSION['messages'][0] = ['class' => 'alert-warning', 'content' => 'Podany adres e-mail jest już zajęty!', 'style' => 'z-index: 50;'];
        }

        if (isset($_POST['newUser']) && is_array($_POST['newUser']) && (User::findSameLogin($_POST['newUser']['log']) == $_POST['newUser']['log'])) {
            $i = isset($_SESSION['messages'][0]) && !empty($_SESSION['messages'][0]) ? 1 : 0;
            $_SESSION['messages'][$i] = ['class' => 'alert-warning', 'content' => 'Podany login jest już zajęty!', 'style' => 'z-index: 100;'];
        }
        if (isset($_POST['newUser']) && is_array($_POST['newUser']) && (User::findSameLogin($_POST['newUser']['log']) != $_POST['newUser']['log']) && (User::findSameMail($_POST['newUser']['mail']) != $_POST['newUser']['mail'])) {
            $code = $this->randCode(); //losowy kod
            $_POST['newUser']['activationCode'] = $code; // i przypisanie go do usera
            $_POST['newUser']['pass'] = base64_encode($_POST['newUser']['pass']);
            $user = User::userCreate($_POST['newUser']); // tworzenie obiektu user

            if (is_object($user)) { // jeśli nie to jest to komunikat o błędach
                //odbiorca\\
                // $_POST[newUser]['log' => '', 'pass'=> '', 'mail'=> '', 'tel'=> 1, 'name' => '', 'lastname'=> '', 'place'=> '', 'street'=> '', 'home' => 0, 'flat' =>0, 'zipcode'=> '', 'birthday'=> '' 'activationCode'=> ''];

                //naDawca\\
                // wszystkie stałe użyte w smtpmailer(GUSER, GPWD, FROM, FROMNAME)

                $user->insertAccountIntoSQL();

                $subject = 'Aktywacyja konta';
                $body = "Link aktywanycjny: http://localhost/FitnessPIK/?action=activation&&code=$code";
                smtpmailer($_POST['newUser']['mail'], FROM, FROMNAME, $subject, $body);

                $_SESSION['messages'][0] = ['class' => 'alert-success', 'content' => 'Zarejestrowano pomyślnie! Aby aktywować konto kliknij w link w wiadomości na twoim mailu.'];
            } else {
                $_SESSION['messages'][0] = ['class' => 'alert-warning', 'content' => $user];
            }
        }

        $this->loadContent();
    }
}