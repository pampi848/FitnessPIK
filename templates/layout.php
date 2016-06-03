<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $p['title'] ?></title>

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
    <div class="jumbotron" style="margin-bottom: 0px;">
        TO JEST MOJA STRONA //zrób coś z tym bo brzydko
    </div>
</div>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                <?php if ((isset($_SESSION['logged'])) && ($_SESSION['logged']['online'] == true)) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                    <?php if ((isset($_SESSION['logged']['level'])) && ($_SESSION['logged']['level'] == 1)) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin panel <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Zaplanuj event</a></li>
                                <li><a href="http://localhost/FitnessPIK/?action=addnews">Dodaj news</a></li>
                                <li><a href="#">Dodaj ofertę</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="uprawnienia.php">Uprawnienia</a></li> <!-- czoto? -->
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Zarządzaj użytkownikami</a></li>
                            </ul>
                        </li>
                        <?php } ?>

                <?php } ?>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">

                <?php if ((!isset($_SESSION['logged'])) || ($_SESSION['logged']['online'] == false)) { ?>
                    <!-- gość -->
                    <li><a href="#" class="btn btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Sign
                            in</a></li>
                    <!--tutaj dodaj taki element jak ten poniżej tzn #toto tylko, żeby nie działał, a był utrzymaniem takiej samej odległości -->
                <?php //} ?>

                <?php } elseif ((isset($_SESSION['logged'])) && ($_SESSION['logged']['online'] == true)) { ?>
                    <!-- user online -->
                    <li><a href="#" class="btn btn-lg" role="button" data-toggle="modal"
                           data-target="#login-modal"><?= "Witaj {$_SESSION['logged']['imie']}" ?></a>
                    </li>  <!--@Iwo, Jakoś to "obuduj w js, bo to już nie będzie przycisk logowania-->

                    <li class="dropdown" id="toto">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="http://localhost/FitnessPIK/?action=logout">Log out</a></li>
                        </ul>
                    </li>
                <?php } ?>

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
    <?php if (isset($_SESSION['messages']) && is_array($_SESSION['messages'])) { ?>
        <!-- BEGIN #MESSAGES -->
        <?php foreach ($_SESSION['messages'] as $message) { ?>
            <div class="alert <?= isset($message['class']) ? $message['class'] : '' ?>"
                 <?= isset($message['style']) ? "style='{$message['style']}'" : '' ?>role="alert" id="porn"
                 onclick="alert()"><?= $message['content'] ?><span id="clicker">X</span></div>
        <?php } ?>
        <?php unset($_SESSION['messages']); ?>
        <!-- END #MESSAGES -->
    <?php } ?>


    <?php //bo nie ma potrzeby wczytywania formularzy jeśli user już się zalogował ?>
    <?php if ((!isset($_SESSION['logged'])) || ($_SESSION['logged']['online'] == false)) { ?>
        <?php include_once 'templates/signForms.php'; ?>
    <?php } ?>
   
	<?php echo $p['content'] ?>

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