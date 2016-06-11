    <hr/>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3 class="jobs">Prowadzi:</h3>
            <div class="list-group jobs">

                <?php var_dump($p);
                foreach($p as $zajecie){ //GENEROWANIE LISTY ZAJĘĆ
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
                                    <th class="text-center">Ilość obecnych</th>
                                    <th class="text-center">Ilość osób</th>
                                    <th class="text-center">Należność</th>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Zumba</td>
                                    <td>12</td>
                                    <td>400</td>
                                    <td>400</td>
                                </tr>
                            </table>
                        </div>
                        <div class="item active">
                            <table class="table text-center">
                                <tr>
                                    <th class="text-center">Dzień</th>
                                    <th class="text-center">Rodzaj</th>
                                    <th class="text-center">Ilość obecnych</th>
                                    <th class="text-center">Ilość osób</th>
                                    <th class="text-center">Należność</th>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rumba</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>400</td>
                                </tr>
                            </table>
                        </div>
                        <div class="item">
                            <table class="table text-center">
                                <tr>
                                    <th class="text-center">Dzień</th>
                                    <th class="text-center">Rodzaj</th>
                                    <th class="text-center">Ilość obecnych</th>
                                    <th class="text-center">Ilość osób</th>
                                    <th class="text-center">Należność</th>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Pumba</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>400</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Controls -->

                </div>
            </div>
        </div>
    </div>