<?php

require_once "autoload.php";

use Actions\Controller;

$controller = new Controller();

if ((isset($_SESSION['logged']['online'])) && ($_SESSION['logged']['online'] == true) && (isset($_SESSION['logged']['level'])) && ($_SESSION['logged']['level'] == 1)) {
    $actionNameForced = 'addnews';
    $controller->run($actionNameForced);
}
else{
    $_SESSION['messages'][0] = ['class' => 'alert-danger', 'content' => 'Coś poszło nie tak!'];
    header('location:index.php');
}