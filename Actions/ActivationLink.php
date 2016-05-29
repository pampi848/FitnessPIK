<?php
namespace Actions;

use Accounts\User;

require_once "autoload.php";

class ActivationLink extends Action
{
    protected function doExecute()
    {
        $_SESSION['messages'] = [];
        if (isset($_GET['code'])) {
            $activation = addslashes($_GET['code']);

            if (User::activation($activation)) {
                $_SESSION['messages'][0] = ['class' => 'alert-success', 'content' => 'Aktywowano pomyślnie! Możesz się zalogować.'];
            }
            else {
                $_SESSION['messages'][0] = ['class' => 'alert-danger', 'content' => 'Nie udało się aktywować konta! Sprawdź skopiowany link, jeśli błąd dalej występuje wyślij kod aktywacyjny ponownie.'];
            }
        }
        else {
            $_SESSION['messages'][0] = ['class' => 'alert-danger', 'content' => 'Nie udało się aktywować konta! Sprawdź skopiowany link, jeśli błąd dalej występuje wyślij kod aktywacyjny ponownie.'];
        }
        header('location: http://localhost/FitnessPIK/');
    }
}