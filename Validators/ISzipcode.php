<?php

function is_zipcode($code)
{
    $patern = '/^([0-9]{2})-([0-9]{3})$/D';
    return preg_match_all($patern, $code) == 1 ? true : false;
}