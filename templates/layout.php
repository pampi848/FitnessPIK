<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $p['title'] ?></title>

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
    <link href="css/calendar_style.css" rel="stylesheet">
    <link href="css/circle-button-style.css" rel="stylesheet">
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
                <li class="active"><a href="?action=default">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="?action=allnews" onclick="console.log(document.documentElement.clientWidth)">News</a></li>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Admin panel <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Zaplanuj event</a></li>
                                <li><a href="?action=addnews">Dodaj news</a></li>
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
                            <li><a href="?action=logout">Log out</a></li>
                        </ul>
                    </li>
                <?php } ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="calendar-container">
    <table class="table table-bordered table-responsive table-condensed calendar">
        <div class="row">
            <div class="col-md-12 month">
                <h3 class="pull-left">Czerwiec</h3>
                <button type="button" class="close pull-right calendar-close" aria-label="Close"
                        onclick="closeCalendar()"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
        <tr class="header-row">
            <th>Pn</th>
            <th>Wt</th>
            <th>Śr</th>
            <th>Czw</th>
            <th>Pt</th>
            <th>Sob</th>
            <th>Nd</th>
        </tr>
        <tr>
            <td class="other-month calendar_day">30</td>
            <td class="other-month calendar_day">31</td>
            <td class="calendar_day">1 <span class="badge important">2</span></td>
            <td class="calendar_day">2 <span class="badge">0</span></td>
            <td class="calendar_day">3 <span class="badge">0</span></td>
            <td class="calendar_day">4 <span class="badge">0</span></td>
            <td class="calendar_day">5 <span class="badge">0</span></td>
        </tr>
        <tr>
            <td class="calendar_day">6 <span class="badge">0</span></td>
            <td class="calendar_day">7 <span class="badge">0</span></td>
            <td class="calendar_day">8 <span class="badge">0</span></td>
            <td class="calendar_day">9 <span class="badge">0</span></td>
            <td class="calendar_day">10 <span class="badge occasional">1</span></td>
            <td class="calendar_day">11 <span class="badge">0</span></td>
            <td class="calendar_day">12 <span class="badge">0</span></td>
        </tr>
        <tr>
            <td class="calendar_day">13 <span class="badge">0</span></td>
            <td class="calendar_day">14 <span class="badge aerobic">1</span></td>
            <td class="calendar_day">15 <span class="badge">0</span></td>
            <td class="calendar_day">16 <span class="badge">0</span></td>
            <td class="calendar_day">17 <span class="badge">0</span></td>
            <td class="calendar_day">18 <span class="badge">0</span></td>
            <td class="calendar_day">19 <span class="badge">0</span></td>
        </tr>
        <tr>
            <td class="calendar_day">20 <span class="badge">0</span></td>
            <td class="calendar_day">21 <span class="badge">0</span></td>
            <td class="calendar_day">22 <span class="badge">0</span></td>
            <td class="calendar_day">23 <span class="badge">0</span></td>
            <td class="calendar_day">24 <span class="badge">0</span></td>
            <td class="calendar_day">25 <span class="badge dance">2</span></td>
            <td class="calendar_day">26 <span class="badge">0</span></td>
        </tr>
        <tr>
            <td class="calendar_day">27 <span class="badge">0</span></td>
            <td class="calendar_day">28 <span class="badge">0</span></td>
            <td class="calendar_day">29 <span class="badge">0</span></td>
            <td class="calendar_day">30 <span class="badge">0</span></td>
            <td class="other-month calendar_day">1</td>
            <td class="other-month calendar_day">2</td>
            <td class="other-month calendar_day">3</td>
        </tr>
    </table>
</div>
<div id="dymek" class="panel panel-default">
    <div class="panel-body" id="dymek-content">
    </div>
</div>
<div class="container" id="content">
    <!-- BEGIN #SIDEBAR -->
    <div id="sidebar_social">
        <ol id="socials">
            <li class="social">
                <button type="button" class="btn btn-default btn-circle btn-lg l calendar-show"
                        onclick="toggleCalendar()"><i class="glyphicon glyphicon-bell"></i></button>
            </li>
            <li class="social">
                <button type="button" class="btn btn-default btn-circle btn-lg"><i class="glyphicon glyphicon-ok"></i>
                </button>
            </li>
            <li class="social">
                <button type="button" class="btn btn-default btn-circle btn-lg"><i class="glyphicon glyphicon-ok"></i>
                </button>
            </li>
            <li class="social">
                <button type="button" class="btn btn-default btn-circle btn-lg"><i class="glyphicon glyphicon-ok"></i>
                </button>
            </li>
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

    <?= $p['content'] ?>
    <div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up">UP</i>
  </span>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?= $p['calendarData'] ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/custom_script.js"></script>
    <script src="js/login_script.js"></script>
    <script src="js/arrow.js"></script>
    <script src="js/calendar_script.js"></script>
</body>
</html>