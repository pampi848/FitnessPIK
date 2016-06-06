<div class="container">
        <div class="profile-content">
            <div class="row upper-profile">
                <div class="col-md-4">
                    <?php
                    // WCZYTYWANIE DANYCH DO STRONY PROFILU
                    $nazwa = $_GET['nazwa'];
                    switch($nazwa){
                        case "kinga":
                            $user = [
                        "folder" => "kinga",
                        "imie" => "Kinga",
                        "nazwisko" => "Walawicz",
                        "typ" => "Instruktor",
                        "mail" => "wiczkawala@gmail.com",
                        "fb" => "www.facebook.com/kinga",
                        "tel" => "605912709",
                        "osobie" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac volutpat erat, sed semper arcu. Quisque tempor velit nec lacinia imperdiet. Ut vitae dolor a nisi posuere bibendum. Nulla sed rhoncus mi. Fusce eget diam leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.",
                        "prowadzi" => "Zumba;Capoeira;Aerobik;"
                    ];
                            break;
                        case "paulina":
                            $user = [
                        "folder" => "paulina",
                        "imie" => "Paulina",
                        "nazwisko" => "Mułyk",
                        "typ" => "Instruktor",
                        "mail" => "wiczkawala@gmail.com",
                        "fb" => "www.facebook.com/kinga",
                        "tel" => "605912709",
                        "osobie" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac volutpat erat, sed semper arcu. Quisque tempor velit nec lacinia imperdiet. Ut vitae dolor a nisi posuere bibendum. Nulla sed rhoncus mi. Fusce eget diam leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.",
                        "prowadzi" => "Hip-hop;Taniec towarzyski;Twerking;"
                    ];
                            break;
                        case "nikola":
                            $user = [
                        "folder" => "nikola",
                        "imie" => "Nikola",
                        "nazwisko" => "Białowąs",
                        "typ" => "Instruktor",
                        "mail" => "wiczkawala@gmail.com",
                        "fb" => "www.facebook.com/kinga",
                        "tel" => "605912709",
                        "osobie" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac volutpat erat, sed semper arcu. Quisque tempor velit nec lacinia imperdiet. Ut vitae dolor a nisi posuere bibendum. Nulla sed rhoncus mi. Fusce eget diam leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.",
                        "prowadzi" => "Twerking;Gotowanie;Nordic walking;"
                    ];
                            break;
                        case "agnieszka":
                            $user = [
                        "folder" => "aga",
                        "imie" => "Agnieszka",
                        "nazwisko" => "Walawicz",
                        "typ" => "Instruktor",
                        "mail" => "wiczkawala@gmail.com",
                        "fb" => "www.facebook.com/kinga",
                        "tel" => "605912709",
                        "osobie" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac volutpat erat, sed semper arcu. Quisque tempor velit nec lacinia imperdiet. Ut vitae dolor a nisi posuere bibendum. Nulla sed rhoncus mi. Fusce eget diam leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.",
                        "prowadzi" => "Trener personalny;Capoeira;"
                    ];
                            break;
                        case "marika":
                            $user = [
                        "folder" => "marika",
                        "imie" => "Marika",
                        "nazwisko" => "Jaroć",
                        "typ" => "Instruktor",
                        "mail" => "wiczkawala@gmail.com",
                        "fb" => "www.facebook.com/kinga",
                        "tel" => "605912709",
                        "osobie" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac volutpat erat, sed semper arcu. Quisque tempor velit nec lacinia imperdiet. Ut vitae dolor a nisi posuere bibendum. Nulla sed rhoncus mi. Fusce eget diam leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.",
                        "prowadzi" => "Trener pływania;Twerking;Zumba;Hip-hop;Taniec towarzyski;Aerobik;"
                    ];
                            break;
                        case "pampej":
                            $user = [
                        "folder" => "pampej",
                        "imie" => "Michał",
                        "nazwisko" => "Klemiato",
                        "typ" => "Klient",
                        "mail" => "wiczkawala@gmail.com",
                        "fb" => "www.facebook.com/kinga",
                        "tel" => "605912709",
                        "osobie" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac volutpat erat, sed semper arcu. Quisque tempor velit nec lacinia imperdiet. Ut vitae dolor a nisi posuere bibendum. Nulla sed rhoncus mi. Fusce eget diam leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.",
                        "prowadzi" => ""
                    ];
                            break;
                        case "babik":
                            $user = [
                        "folder" => "babik",
                        "imie" => "Grzegorz",
                        "nazwisko" => "Babik",
                        "typ" => "Instruktor",
                        "mail" => "wiczkawala@gmail.com",
                        "fb" => "www.facebook.com/kinga",
                        "tel" => "605912709",
                        "osobie" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac volutpat erat, sed semper arcu. Quisque tempor velit nec lacinia imperdiet. Ut vitae dolor a nisi posuere bibendum. Nulla sed rhoncus mi. Fusce eget diam leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.",
                        "prowadzi" => "Farmienie pod turretem;Recoil control;Robienie pompek;Webmastering;"
                    ];
                            break;
                    }
                    
                    $prowadzi = [];
                    $content = "";
                    
                    for($i=0;$i<(strlen($user['prowadzi']));$i++){
                        if($user['prowadzi'][$i]==";"){
                            $prowadzi[]=$content;
                            $content="";
                            continue;
                        }
                        $content = $content.$user['prowadzi'][$i];
                    }
                    //KONIEC WCZYTYWANIA DANYCH
                    echo "<img src=img/profile/\"".$user['folder']."/av.jpg\" alt=\"...\" class=\"img-thumbnail img-responsive center-block\">"; //GENEROWANIE AVATARA
                    
                    ?>
                </div>
                <div class="col-md-8"> <!-- DANE OSOBOWE -->
                    <div class="row"><div class="col-md-12 name"><h1><?=$user['nazwisko']; ?> <small><?=$user['imie']; ?></small></h1></div></div>
                    <div class="row"><div class="col-md-12 title"><h4><?=$user['typ']; ?></h4></div></div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 contact">
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">O sobie</h3>
                                </div>
                                <div class="panel-body">
                                    <?=$user['osobie']; ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            
            if($user['typ']!='Instruktor'){ //WARUNEK CZY UŻYTKOWNIK JEST INSTRUKTOREM LUB ADMINISTRATOREM 
                echo "";
            }
            else{
                print <<<END
            
            <hr/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h3 class="jobs">Prowadzi:</h3>
                    <div class="list-group jobs">
END;
                        
                        $zajecia = count($prowadzi);
                        
                        for($i=0; $i<$zajecia; $i++){ //GENEROWANIE LISTY ZAJĘĆ
                           echo "<button type=\"button\" class=\"list-group-item jobs\">$prowadzi[$i]<span class=\"glyphicon glyphicon-certificate pull-right\" aria-hidden=\"true\"></span></button>"; 
                        }
                        print <<<END
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="row" id="profile-month">
                    <div class="col-md-2" onclick="$('.carousel').carousel('prev'); $('.carousel').carousel('pause');"><h3><span class="glyphicon glyphicon-chevron-left pull-left" aria-hidden="true"></span></h3></div>
                    <div class="col-md-8 profile-month-name">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                          </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            <div class="item">
                                <h3>Maj</h3>
                            </div>
                            <div class="item active">
                                <h3>Czerwiec</h3>
                            </div>
                            <div class="item">
                                <h3>Lipiec</h3>
                            </div>
                          </div>

                          <!-- Controls -->
                          
                        </div>
                    </div>
                    <div class="col-md-2" onclick="$('.carousel').carousel('next'); $('.carousel').carousel('pause');"><h3><span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></h3></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!--<table class="table text-center">
                            <tr>
                                <th class="text-center">Dzień</th>
                                <th class="text-center">Rodzaj</th>
                                <th class="text-center">Ilość osób</th>
                                <th class="text-center">Należność</th>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Zumba</td>
                                <td>12</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Zumba</td>
                                <td>16</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>26</td>
                                <td>Aerobik</td>
                                <td>7</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>Capoeira</td>
                                <td>20</td>
                                <td>600</td>
                            </tr>
                        </table> -->
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                          </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                                <div class="item">
                              <table class="table text-center">
                            <tr>
                                <th class="text-center">Dzień</th>
                                <th class="text-center">Rodzaj</th>
                                <th class="text-center">Ilość osób</th>
                                <th class="text-center">Należność</th>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Zumba</td>
                                <td>12</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Zumba</td>
                                <td>16</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>26</td>
                                <td>Aerobik</td>
                                <td>7</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>Capoeira</td>
                                <td>20</td>
                                <td>600</td>
                            </tr>
                        </table>
                            </div>
                              <div class="item active">
                              <table class="table text-center">
                            <tr>
                                <th class="text-center">Dzień</th>
                                <th class="text-center">Rodzaj</th>
                                <th class="text-center">Ilość osób</th>
                                <th class="text-center">Należność</th>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Rumba</td>
                                <td>12</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Rumba</td>
                                <td>16</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>26</td>
                                <td>Aerobik</td>
                                <td>7</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>Capoeira</td>
                                <td>20</td>
                                <td>600</td>
                            </tr>
                        </table>
                            </div>
                            <div class="item">
                              <table class="table text-center">
                            <tr>
                                <th class="text-center">Dzień</th>
                                <th class="text-center">Rodzaj</th>
                                <th class="text-center">Ilość osób</th>
                                <th class="text-center">Należność</th>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pumba</td>
                                <td>12</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Pumba</td>
                                <td>16</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>26</td>
                                <td>Aerobik</td>
                                <td>7</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>Capoeira</td>
                                <td>20</td>
                                <td>600</td>
                            </tr>
                        </table>
                            </div>
                            ...
                          </div>

                          <!-- Controls -->
                          
                        </div>
                    </div>
                </div>
            </div>
END;
            }?>
        </div>
    </div><!-- /.container -->