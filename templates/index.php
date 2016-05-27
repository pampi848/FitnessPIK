<body>
<div class="container-fluid">
    <div class="jumbotron" style="margin-bottom: 0px;"> <?php $admin = true; echo "TO JEST "; ?>MOJA STRONA</div>
</div>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="news.php" onclick="console.log(document.documentElement.clientWidth)">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <?php if($admin == true){
                    print <<<END
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin panel <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="uprawnienia.php">Uprawnienia</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
END;
                }
                ?>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="btn btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Sign in</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container" id="content">
    <!-- BEGIN #SIDEBAR -->
    <div id="sidebar_social">
        <ol id="socials">
            <li class="social"><span class="social_text">FB</span></li>
            <li class="social"><span class="social_text">YT</span></li>
            <li class="social"><span class="social_text">TW</span></li>
            <li class="social"><span class="social_text">GP</span></li>
        </ol>
    </div>
    <div style="clear:both"></div>
    <!-- END # SIDEBAR -->
    <div class="alert alert-success" role="alert" id="porn" onclick="alert()">Alert! Ostrzeżenie o wkraczaniu na witrynę o tematyce pornograficznej. <span id="clicker">X</span></div>
    <!-- BEGIN # MODAL LOGIN -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                    <form id="login-form" action="login.php" method="post">
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your username and password.</span>
                            </div>
                            <input id="login_username" name="login" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
                            <input id="login_password" class="form-control" type="password" placeholder="Password" required>
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
                            <input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
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
                    <form id="register-form" style="display:none;" action="Actions/Register.php" method="post">
                        <div class="modal-body">
                            <div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Register an account.</span>
                            </div>
                            <input name="login" id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
                            <input name="email" id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                            <input name="haslo" name="" id="register_password" class="form-control" type="password" placeholder="Password" required>
                            <input name="imie" id="register_forename" class="form-control" type="text" placeholder="Forename" required>
                            <input name="nazwisko" id="register_surname" class="form-control" type="text" placeholder="Surname" required>
                            <input name="miejscowosc" id="register_place" class="form-control" type="text" placeholder="Place" required>
                            <input name="dataUrodzin" id="register_birth" class="form-control" type="date" placeholder="Birthdate" required>
                            <input name="nrTel" id="register_phonenumber" class="form-control" type="tel" placeholder="Phone number" required>
                            <input name="ulica" id="register_street" class="form-control" type="text" placeholder="Street" required>
                            <input name="nrDomu" id="register_housenumber" class="form-control" type="number" placeholder="House number" required>
                            <input name="nrMieszkania" id="register_apartmentnumber" class="form-control" type="number" placeholder="Apartment number" required>
                            <input name="kodPocztowy" id="register_zipcode" class="form-control" type="number" placeholder="Zip Code" required>
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
                                <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
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

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="img/a.jpg" alt="First slide [900x500]">
                <div class="carousel-caption">
                    <h3>Jennete McCurdy jednak z Brazzers</h3>
                    <p>Znana z Nickelodeon aktorka uległa namowom i podjęła współpracę z wytwórnią filmów pornograficznych Brazzers</p>
                </div>
            </div>
            <div class="item">
                <img src="img/b.jpg" alt="Second slide [900x500]">
                <div class="carousel-caption">
                    <h3>Testoviron pobity przez narodowców</h3>
                    <p>Znany amerykańsko-polski YouTuber pobity przez sympatyków i członków Ruchu Narodowego</p>
                </div>
            </div>
            <div class="item">
                <img src="img/c.jpg" alt="Third slide [900x500]">
                <div class="carousel-caption">
                    <h3>Rozgrabione kościoły, bogactwa oddane gejom</h3>
                    <p>Tylko w ten weekend spalono 2000 kościołów, a do grona najbogatszych Polaków dołączyło 20 homoseksualistów.</p>
                </div>
            </div>
            <div class="item">
                <img src="img/d.jpg" alt="Third slide [900x500]">
                <div class="carousel-caption">
                    <h3>Pedofilia wreszcie legalna</h3>
                    <p>Sejm Rzeczpospolitej Polskiej przyjął dziś przez aklamację obywatelki wniosek partii Duże Penisy odnośnie dekryminalizacji i depenalizacji pedofilii</p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed metus enim, porta rhoncus leo in, bibendum efficitur quam. Curabitur commodo, leo blandit consectetur pretium, justo dolor fringilla ante, eget tempor arcu tortor non sem. Sed elit turpis, egestas nec convallis a, viverra a purus. Ut ut finibus urna. Morbi nec fermentum felis, sed pellentesque nulla. Nunc at nibh eget erat iaculis sodales. Nam in neque ante. Pellentesque interdum augue id nisl aliquam malesuada. Vivamus malesuada euismod lobortis. Nulla cursus enim in blandit porta. Aliquam commodo sollicitudin nunc, eu iaculis orci rutrum et.


        Fusce a lectus at nibh ullamcorper gravida non ac ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur gravida vulputate posuere. Vestibulum eu tempor lectus. Cras congue volutpat nunc a congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi faucibus lobortis augue quis convallis. Proin non facilisis eros. Nulla eu consequat orci, placerat dictum ex. Integer fringilla odio ante, rhoncus fringilla arcu lacinia ut. Duis aliquam arcu vitae ipsum accumsan pellentesque. Nulla et nisl ut lectus congue pulvinar. Quisque lectus tortor, tristique ac pulvinar sed, fringilla eget lorem. Maecenas diam lorem, lobortis dapibus erat dapibus, feugiat interdum tellus. Nulla eget leo dapibus, porttitor neque sit amet, pharetra eros. Proin a nunc dictum, pellentesque lorem eu, vestibulum ligula.


        Morbi posuere leo risus, non facilisis nibh laoreet eget. In tristique accumsan odio, in pretium lacus dignissim sit amet. Fusce et consectetur tortor. Maecenas id nisi at elit viverra rutrum. Aenean quis enim dictum, ornare ipsum ut, interdum enim. Proin sodales volutpat orci, at mollis erat vulputate vitae. Praesent nibh ante, iaculis eget nunc vel, pharetra euismod dolor. Praesent porta, tortor quis porta elementum, neque felis egestas risus, nec porta tortor lacus in erat. Morbi purus odio, consectetur et iaculis sit amet, elementum id arcu. Nullam nec justo eu augue aliquet varius nec at nulla. Nullam non ullamcorper tortor, eu tempus nunc. Nam nec pulvinar lectus. Duis placerat dui a elit tincidunt, ac lobortis libero consequat. Suspendisse potenti. Duis varius porttitor nulla in sagittis.


        Maecenas id venenatis mauris, a accumsan elit. Morbi quam elit, ullamcorper non ligula sed, tempor iaculis augue. Vestibulum nec pretium metus. Curabitur vulputate elit ut tortor imperdiet feugiat. Pellentesque ac nulla interdum, pellentesque nisl in, laoreet tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sed pharetra urna. Morbi congue semper nibh quis ultrices. Nam feugiat quis neque sed ultricies. Nulla ut tempus dui. Integer gravida arcu quis eros finibus ultricies. Nunc facilisis placerat diam, ut tincidunt mauris mollis ac.


        Duis at accumsan turpis. Proin sollicitudin, leo eget ornare sodales, leo lorem porttitor nibh, et iaculis sem ex quis dolor. Nulla sapien odio, dictum quis mi a, interdum placerat lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin et odio vitae orci tempor aliquet et eu nisl. Donec sed enim aliquet, eleifend enim at, finibus nisl. Curabitur nunc lectus, ullamcorper at convallis ac, gravida ut nibh.
    </div>

    <div id="text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed metus enim, porta rhoncus leo in, bibendum efficitur quam. Curabitur commodo, leo blandit consectetur pretium, justo dolor fringilla ante, eget tempor arcu tortor non sem. Sed elit turpis, egestas nec convallis a, viverra a purus. Ut ut finibus urna. Morbi nec fermentum felis, sed pellentesque nulla. Nunc at nibh eget erat iaculis sodales. Nam in neque ante. Pellentesque interdum augue id nisl aliquam malesuada. Vivamus malesuada euismod lobortis. Nulla cursus enim in blandit porta. Aliquam commodo sollicitudin nunc, eu iaculis orci rutrum et.


        Fusce a lectus at nibh ullamcorper gravida non ac ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur gravida vulputate posuere. Vestibulum eu tempor lectus. Cras congue volutpat nunc a congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi faucibus lobortis augue quis convallis. Proin non facilisis eros. Nulla eu consequat orci, placerat dictum ex. Integer fringilla odio ante, rhoncus fringilla arcu lacinia ut. Duis aliquam arcu vitae ipsum accumsan pellentesque. Nulla et nisl ut lectus congue pulvinar. Quisque lectus tortor, tristique ac pulvinar sed, fringilla eget lorem. Maecenas diam lorem, lobortis dapibus erat dapibus, feugiat interdum tellus. Nulla eget leo dapibus, porttitor neque sit amet, pharetra eros. Proin a nunc dictum, pellentesque lorem eu, vestibulum ligula.


        Morbi posuere leo risus, non facilisis nibh laoreet eget. In tristique accumsan odio, in pretium lacus dignissim sit amet. Fusce et consectetur tortor. Maecenas id nisi at elit viverra rutrum. Aenean quis enim dictum, ornare ipsum ut, interdum enim. Proin sodales volutpat orci, at mollis erat vulputate vitae. Praesent nibh ante, iaculis eget nunc vel, pharetra euismod dolor. Praesent porta, tortor quis porta elementum, neque felis egestas risus, nec porta tortor lacus in erat. Morbi purus odio, consectetur et iaculis sit amet, elementum id arcu. Nullam nec justo eu augue aliquet varius nec at nulla. Nullam non ullamcorper tortor, eu tempus nunc. Nam nec pulvinar lectus. Duis placerat dui a elit tincidunt, ac lobortis libero consequat. Suspendisse potenti. Duis varius porttitor nulla in sagittis.


        Maecenas id venenatis mauris, a accumsan elit. Morbi quam elit, ullamcorper non ligula sed, tempor iaculis augue. Vestibulum nec pretium metus. Curabitur vulputate elit ut tortor imperdiet feugiat. Pellentesque ac nulla interdum, pellentesque nisl in, laoreet tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sed pharetra urna. Morbi congue semper nibh quis ultrices. Nam feugiat quis neque sed ultricies. Nulla ut tempus dui. Integer gravida arcu quis eros finibus ultricies. Nunc facilisis placerat diam, ut tincidunt mauris mollis ac.


        Duis at accumsan turpis. Proin sollicitudin, leo eget ornare sodales, leo lorem porttitor nibh, et iaculis sem ex quis dolor. Nulla sapien odio, dictum quis mi a, interdum placerat lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin et odio vitae orci tempor aliquet et eu nisl. Donec sed enim aliquet, eleifend enim at, finibus nisl. Curabitur nunc lectus, ullamcorper at convallis ac, gravida ut nibh.
    </div>

    <div id="text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed metus enim, porta rhoncus leo in, bibendum efficitur quam. Curabitur commodo, leo blandit consectetur pretium, justo dolor fringilla ante, eget tempor arcu tortor non sem. Sed elit turpis, egestas nec convallis a, viverra a purus. Ut ut finibus urna. Morbi nec fermentum felis, sed pellentesque nulla. Nunc at nibh eget erat iaculis sodales. Nam in neque ante. Pellentesque interdum augue id nisl aliquam malesuada. Vivamus malesuada euismod lobortis. Nulla cursus enim in blandit porta. Aliquam commodo sollicitudin nunc, eu iaculis orci rutrum et.


        Fusce a lectus at nibh ullamcorper gravida non ac ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur gravida vulputate posuere. Vestibulum eu tempor lectus. Cras congue volutpat nunc a congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi faucibus lobortis augue quis convallis. Proin non facilisis eros. Nulla eu consequat orci, placerat dictum ex. Integer fringilla odio ante, rhoncus fringilla arcu lacinia ut. Duis aliquam arcu vitae ipsum accumsan pellentesque. Nulla et nisl ut lectus congue pulvinar. Quisque lectus tortor, tristique ac pulvinar sed, fringilla eget lorem. Maecenas diam lorem, lobortis dapibus erat dapibus, feugiat interdum tellus. Nulla eget leo dapibus, porttitor neque sit amet, pharetra eros. Proin a nunc dictum, pellentesque lorem eu, vestibulum ligula.


        Morbi posuere leo risus, non facilisis nibh laoreet eget. In tristique accumsan odio, in pretium lacus dignissim sit amet. Fusce et consectetur tortor. Maecenas id nisi at elit viverra rutrum. Aenean quis enim dictum, ornare ipsum ut, interdum enim. Proin sodales volutpat orci, at mollis erat vulputate vitae. Praesent nibh ante, iaculis eget nunc vel, pharetra euismod dolor. Praesent porta, tortor quis porta elementum, neque felis egestas risus, nec porta tortor lacus in erat. Morbi purus odio, consectetur et iaculis sit amet, elementum id arcu. Nullam nec justo eu augue aliquet varius nec at nulla. Nullam non ullamcorper tortor, eu tempus nunc. Nam nec pulvinar lectus. Duis placerat dui a elit tincidunt, ac lobortis libero consequat. Suspendisse potenti. Duis varius porttitor nulla in sagittis.


        Maecenas id venenatis mauris, a accumsan elit. Morbi quam elit, ullamcorper non ligula sed, tempor iaculis augue. Vestibulum nec pretium metus. Curabitur vulputate elit ut tortor imperdiet feugiat. Pellentesque ac nulla interdum, pellentesque nisl in, laoreet tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sed pharetra urna. Morbi congue semper nibh quis ultrices. Nam feugiat quis neque sed ultricies. Nulla ut tempus dui. Integer gravida arcu quis eros finibus ultricies. Nunc facilisis placerat diam, ut tincidunt mauris mollis ac.


        Duis at accumsan turpis. Proin sollicitudin, leo eget ornare sodales, leo lorem porttitor nibh, et iaculis sem ex quis dolor. Nulla sapien odio, dictum quis mi a, interdum placerat lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin et odio vitae orci tempor aliquet et eu nisl. Donec sed enim aliquet, eleifend enim at, finibus nisl. Curabitur nunc lectus, ullamcorper at convallis ac, gravida ut nibh.
    </div>
    <div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up">UP</i>
  </span>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/custom_script.js"></script>
<script src="js/login_script.js"></script>
<script src="js/arrow.js"></script>
</body>