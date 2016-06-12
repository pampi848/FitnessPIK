<?php if (!empty($p)) { ?>
    <hr/>
    <div class="row" style="margin-bottom: 100px;">
        <div class="col-md-4 col-md-offset-4">
            <h3 class="jobs">Prowadzi:</h3>
            <div class="list-group jobs">

                <?php
                $razem = 0; //XDDDDDDDD
                foreach ($p as $zajecie) { //GENEROWANIE LISTY ZAJĘĆ
                    echo "<button type='button' class='list-group-item jobs'>{$zajecie['nazwa_zajec']} - {$zajecie['wynagrodzenieMiesieczne']}zł<span class='glyphicon glyphicon-certificate pull-right' aria-hidden='true'></span></button>";
                    $razem += $zajecie['wynagrodzenieMiesieczne'];
                }
                ?>
                <p>Wynagrodzenie miesięczne: <?= $razem ?> </p>
            </div>
        </div>
    </div>
    <hr/>

    <div class="row">
        <div class="row" id="profile-month">
            <div class="col-md-1" onclick="$('.carousel').carousel('prev'); $('.carousel').carousel('pause');"><h3><span
                        class="glyphicon glyphicon-chevron-left pull-left" aria-hidden="true"></span></h3></div>
            <div class="col-md-10 profile-month-name">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">

                        <?php $i = 0 ?>
                        <?php foreach ($p as $zajecie) { ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>"
                                class="<?= ($i == 0) ? 'active' : '' ?>"></li>
                        <?php } ?>
                        <?php unset($i) ?>

                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php $i = 0 ?>
                        <?php foreach ($p as $zajecie) { ?>
                            <div class="item <?= ($i == 0) ? 'active' : '' ?>" style="font-size: large; min-height: 300px">
                                <h3><?= $zajecie['nazwa_zajec'] ?></h3>

                                <table class="table text-center"">
                                    <tr>
                                        <th class="text-center">Dzień tygodnia</th>
                                        <th class="text-center">Godzina</th>
                                        <th class="text-center">Sala</th>
                                        <th class="text-center">Obecnych</th>
                                        <th class="text-center">Wszystkich</th>
                                    </tr>
                                    <?php foreach ($zajecie['data'] as $data) { ?>
                                        <tr>
                                            <td><?= $data['dzienTygodnia'] ?></td>
                                            <td><?= $data['godzina'] ?></td>
                                            <td><?= $data['sala'] ?></td>
                                            <td><?= $data['obecnych'] ?></td>
                                            <td><?= $data['wszystkich'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <?php $i++ ?>
                        <?php } ?>
                        <?php unset($i) ?>
                    </div>

                    <!-- Controls -->

                </div>
            </div>
            <div class="col-md-1" onclick="$('.carousel').carousel('next'); $('.carousel').carousel('pause');"><h3><span
                        class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></h3></div>
        </div>

<?php } ?>
