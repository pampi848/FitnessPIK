<?php
require_once "../autoload.php";
use Util\Database;
use Accounts\Account;
if(isset($_POST['login'])&&isset($_POST['pass'])){
    $login = addslashes($_POST['login']);
    $haslo = addslashes($_POST['pass']);

    if($haslo === Account::fetchPasswordByLogin($login)){
        session_start();
//        echo "<meta charset='utf-8'><p> Witaj $login!</p>";
        header('location: ../index.html');
    }
    else{
        echo "<meta charset='utf-8'><p>Zapewne pomyliłeś login lub hasło ;) </p>";
    }
    
}
else{
    echo "proszę podać login i hasło!";
}