
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Strona fitness</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
    <link href="css/custom_style.css" rel="stylesheet">
    <link href="css/login_css.css" rel="stylesheet">
    <link href="css/arrow.css" rel="stylesheet">
  </head>

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
            <li><a href="#">Uprawnienia</a></li>
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
                    <form id="register-form" style="display:none;" action="register.php" method="post">
            		    <div class="modal-body">
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Register an account.</span>
                            </div>
		    				<input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
                            <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                            <input id="register_password" class="form-control" type="password" placeholder="Password" required>
                            <input id="register_forename" class="form-control" type="text" placeholder="Forename" required>
                            <input id="register_surname" class="form-control" type="text" placeholder="Surname" required>
                            <input id="register_place" class="form-control" type="text" placeholder="Place" required>
                            <input id="register_birth" class="form-control" type="date" placeholder="Birthdate" required>
                            <input id="register_phonenumber" class="form-control" type="tel" placeholder="Phone number" required>
                            <input id="register_street" class="form-control" type="text" placeholder="Street" required>
                            <input id="register_housenumber" class="form-control" type="number" placeholder="House number" required>
                            <input id="register_apartmentnumber" class="form-control" type="number" placeholder="Apartment number" required>
                            <input id="register_zipcode" class="form-control" type="number" placeholder="Zip Code" required>
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
            <?php
            
            //(`login`,`haslo`,`email`,`nrTel`,`imie`,`nazwisko`,`miejscowosc`,`ulica`,`nrDomu`,`nrMieszkania`,`kodPocztowy`,`dataUrodzin`,`dataUtworzenia`,`activated`,`level`)
            
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $email = $_POST['email'];
            $nrTel = $_POST['nrTel'];
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $miejscowosc = $_POST['miejscowosc'];
            $ulica = $_POST['ulica'];
            $nrDomu = $_POST['nrDomu'];
            $nrMieszkania = $_POST['nrMieszkania'];
            $kodPocztowy = $_POST['kodPocztowy'];
            $dataUrodzin = $_POST['dataUrodzin'];
            
            echo "Hello ".$imie." ".$nazwisko ;
            
            ?>
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
</html>
