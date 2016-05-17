<?php
function is_mail($email)
{
    $patern = '/^[a-zA-Z0-9\.\-_]+\@[a-zA-Z0-9\.\-_]+\.[a-z0-9]{2,5}$/D';
    return preg_match_all($patern, $email);
}