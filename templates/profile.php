<div class="container">
        <div class="profile-content">
            <div class="row upper-profile">
                <div class="col-md-4">
<!--                    GENEROWANIE AVATARA-->
            <img src="img/profile/<?=$p['konto']['login']?>.jpg" alt="..." class="img-thumbnail img-responsive center-block">
                    

                </div>
                <div class="col-md-8"> <!-- DANE OSOBOWE -->
                    <div class="row"><div class="col-md-12 name"><h1><?=$p['konto']['imie']; ?> <small><?=$p['konto']['nazwisko']; ?></small></h1></div></div>
                    <div class="row"><div class="col-md-12 title"><h4><?=$p['konto']['level']; ?></h4></div></div>
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
                                    <?php var_dump($p)?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($_SESSION['logged']['level'] == 2){//WARUNEK CZY UŻYTKOWNIK JEST INSTRUKTOREM LUB ADMINISTRATOREM ?>
            <hr/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h3 class="jobs">Prowadzi:</h3>
                    <div class="list-group jobs">

                        <?php
                        foreach($p['zajecia'] as $zajecie){ //GENEROWANIE LISTY ZAJĘĆ
                           echo "<button type='button' class='list-group-item jobs'>{$zajecie['nazwa_zajec']}<span class='glyphicon glyphicon-certificate pull-right' aria-hidden='true'></span></button>";
                        }
                        ?>
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
<?php } ?>
        </div>
    </div><!-- /.container -->