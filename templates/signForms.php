<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>
            <!-- Begin # DIV Form -->
            <div id="div-forms">

                <!-- Begin # Login Form -->
                <form id="login-form" action="?action=login" method="post">
                    <div class="modal-body">
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg">Type your username and password.</span>
                        </div>
                        <input id="login_username" name="newUser[log]" class="form-control" type="text"
                               placeholder="Username (type ERROR for error effect)" required>
                        <input id="login_password" name="newUser[pass]" class="form-control" type="password"
                               placeholder="Password" required>
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
                <!-- End # Login Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg">Type your e-mail.</span>
                        </div>
                        <input id="lost_email" class="form-control" type="text"
                               placeholder="E-Mail (type ERROR for error effect)" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->

                <!-- Begin | Register Form -->
                <form id="register-form" style="display:none;" action="?action=register"
                      method="post">
                    <div class="modal-body">
                        <div id="div-register-msg">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-register-msg">Register an account.</span>
                        </div>
                        <input name="newUser[log]" id="register_username" class="form-control" type="text"
                               placeholder="Username (type ERROR for error effect)" required>
                        <input name="newUser[mail]" id="register_email" class="form-control" type="text"
                               placeholder="E-Mail" required>
                        <input name="newUser[pass]" name="" id="register_password" class="form-control"
                               type="password" placeholder="Password" required>
                        <input name="newUser[name]" id="register_forename" class="form-control" type="text"
                               placeholder="Forename" required>
                        <input name="newUser[lastname]" id="register_surname" class="form-control" type="text"
                               placeholder="Surname" required>
                        <input name="newUser[place]" id="register_place" class="form-control" type="text"
                               placeholder="Place" required>
                        <input name="newUser[birthday]" id="register_birth" class="form-control" type="date"
                               placeholder="Birthdate" required>
                        <input name="newUser[tel]" id="register_phonenumber" class="form-control" type="tel"
                               placeholder="Phone number" required>
                        <input name="newUser[street]" id="register_street" class="form-control" type="text"
                               placeholder="Street" required>
                        <input name="newUser[home]" id="register_housenumber" class="form-control" type="number"
                               placeholder="House number" required>
                        <input name="newUser[flat]" id="register_apartmentnumber" class="form-control" type="number"
                               placeholder="Apartment number" required>
                        <input name="newUser[zipcode]" id="register_zipcode" class="form-control" type="text"
                               placeholder="Zip Code" required><!--zamieniłem z number na text -->
                        <!-- 
            (`login`,`haslo`,`email`,`nrTel`,`imie`,`nazwisko`,`miejscowosc`,`ulica`,`nrDomu`,`nrMieszkania`,`kodPocztowy`,`dataUrodzin`,`dataUtworzenia`,`activated`,`level`) do zrobienia
            -->
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                        </div>
                        <div>
                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?
                            </button>
                        </div>
                    </div>
                </form>
                <!-- End | Register Form -->

            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->