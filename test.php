<?php
require "autoload.php";
use Accounts\User;

$login = 'michal';
$haslo = 'mojehaslo';
$email = 'mail@lol.com';
$nrTel = 123456789;
$imie = 'michal';
$nazwisko = 'klemiato';
$miejscowosc = 'debnica';
$ulica = 'fabryczna';
$nrDomu = 10;
$nrMieszkania = 3;
$kodPocztowy = '76-248';
$dzienUrodzin = 18;
$miesiacUrodzin = 01;
$rokUrodzin = 1997;
$obiekt = User::userCreate($login, $haslo, $email, $nrTel, $imie, $nazwisko, $miejscowosc, $ulica, $nrDomu,
                           $nrMieszkania, $kodPocztowy, $dzienUrodzin, $miesiacUrodzin, $rokUrodzin);
var_dump($obiekt);
?>
<form id="login-form" action='Actions/LogIn.php' method="post">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your username and password.</span>
                            </div>
				    		<input name='login' id="login_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
				    		<input name='pass' id="login_password" class="form-control" type="password" placeholder="Password" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
</label>
                            </div>
        		    	</div>
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
				    	    <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
				        </div>
                    </form>