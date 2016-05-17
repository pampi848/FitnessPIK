<?php

function SQLinjection($toverify){
if(isset($toverify)&&is_string($toverify)){

    $toverify = addslashes($toverify);

    return $toverify;
}
    else{
        return false;
    }
}