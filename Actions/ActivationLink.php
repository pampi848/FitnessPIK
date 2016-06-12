<?php
namespace Actions;

use Accounts\User;

require_once "autoload.php";

class ActivationLink extends Action
{
    protected function doExecute()
    {
        if (isset($_GET['code'])) {
            $activation = addslashes($_GET['code']);
            if (User::activation($activation)) {
                $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Aktywowano pomyślnie! Możesz się zalogować.']);
            }
            else {
                $this->session->add('messages', ['class' => 'alert-danger', 'content' => 'Nie udało się aktywować konta! Sprawdź skopiowany link, jeśli błąd dalej występuje wyślij kod aktywacyjny ponownie.']);
            }
        }
        else {
            $this->session->add('messages', ['class' => 'alert-danger', 'content' => 'Nie udało się aktywować konta! Sprawdź skopiowany link, jeśli błąd dalej występuje wyślij kod aktywacyjny ponownie.']);
        }

        $this->loadContent();
    }
}