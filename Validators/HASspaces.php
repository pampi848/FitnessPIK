<?php
function has_spaces($code)
{
    $patern = '/\s/ms';
    return preg_match_all($patern, $code) === 0 ? 1 : 0;
}