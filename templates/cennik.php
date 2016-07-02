<?php if(is_array($p)){ ?>
<table class="table table-stripped text-center">
    <tr class="text-center">
        <th class="text-center">Nazwa</th>
        <th class="text-center">Opis</th>
        <th class="text-center">Instruktor</th>
        <th class="text-center">Termin</th>
        <th class="text-center">Cena</th>
    </tr>
    <?php foreach ($p as $oferta){ ?>
        <?php if(isset($oferta) && is_object($oferta)){ ?>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-md-12">
                        <h4><?=$oferta->getNazwa()?></h4>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1){ ?>
                    <div class="row">
                        <div class="col-md-12">
                        <a href="?action=lessondelprocess&&id=<?=$oferta->getId()?>"><button class="btn btn-warning">Usuń Zajęcia</button></a>
                        </div>
                    </div>
                    <?php } elseif (isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==0){?>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="?action=dolacz&&id=<?=$oferta->getId()?>"><button class="btn btn-success">Dołącz!</button></a>
                        </div>
                    </div>
                    <?php } ?>
                </td>
                <td><h4><?=$oferta->getOpis()?></h4></td>
                <td><h4><?=$oferta->getIdInstruktor()?></h4></td>
                <td>
                    <?php $count = count($oferta->data)?>
                    <?php foreach ($oferta->data as $data){ ?>
                    <div class="row termin-i-miejsce">
                        <div class="col-md-6">
                            <div class="row">
                                <table id="tabelka">
                                    <tr><td class="tede">Dzień: </td><td class="tede">&nbsp;<?=$oferta->$data["dzienTygodnia"]?></td></tr>
                                    <tr><td class="tede">Godzina: </td><td class="tede">&nbsp;<?=str_replace('.',':',$data['godzina'])?></td></tr>
                                    <tr><td class="tede">Sala: </td><td class="tede">&nbsp;<?=$data['sala'];?></td></tr>
                                </table>
                            </div>
                            <?php if (isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1){ ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="?action=termindelprocess&&id=<?=$data['id']?>"><button class="btn btn-warning btn-table">Usuń termin</button></a>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1 && $count==1){ ?>
                            <div class="row">
                                <div class="col-md-12 btn-group">
                                    <!-- Single button -->
                                    <div class="btn-group">
                                        <form action="?action=terminaddprocess&&id=<?=$oferta->getId()?>" method="post">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dodaj termin <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li style="padding-left: 2%;margin-bottom: 7%"><input class="" style="width:48%!important;" name="termin[hour]" type="number" min="0" max="23" step="1" placeholder="godzina"/>:<input class="" style="width:48%!important;" name="termin[min]" type="number" min="0" max="59" step="1" placeholder="minuta"/></li>
                                                <li style="padding-left: 2%"><input class="form-control" style="width:98.5%!important;"name="termin[sala]" type="text" placeholder="sala"/></li>
                                                <li style="padding-left: 2%"><input class="form-control" style="width:98.5%!important;"name="termin[day]" type="number" min="1" max="7" step="1" placeholder="dzień tygodnia"/></li>
                                                <li role="separator" class="divider"></li>
                                                <li><input class="btn btn-success form-control" type="submit" value="Wyślij"</li>
                                            </ul>
                                        </form>
                                    </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php $count--; ?>
                    </div>
                    <?php } ?>
                    <?php if(isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1 && (!is_array($oferta->data) || empty($oferta->data))){ ?>
                    <div class="row termin-i-miejsce">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 btn-group">
                                    <!-- Single button -->
                                    <div class="btn-group">
                                        <form action="?action=terminaddprocess&&id=<?=$oferta->getId()?>" method="post">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dodaj termin <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li style="padding-left: 2%;margin-bottom: 7%"><input class="" style="width:48%!important;" name="termin[hour]" type="number" min="0" max="23" step="1" placeholder="godzina"/>:<input class="" style="width:48%!important;" name="termin[min]" type="number" min="0" max="59" step="1" placeholder="minuta"/></li>
                                                <li style="padding-left: 2%"><input class="form-control" style="width:98.5%!important;"name="termin[sala]" type="text" placeholder="sala"/></li>
                                                <li style="padding-left: 2%"><input class="form-control" style="width:98.5%!important;"name="termin[day]" type="number" min="1" max="7" step="1" placeholder="dzień tygodnia"/></li>
                                                <li role="separator" class="divider"></li>
                                                <li><input class="btn btn-success form-control" type="submit" value="Wyślij"</li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="js/terminAdd.js"></script>
                    <?php }elseif((!is_array($oferta->data) || empty($oferta->data))){ ?>
                        <div class="row termin-i-miejsce">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-danger btn-table" style="cursor:default;">Brak terminów! </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </td>
                <td>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?=($oferta->getCena()['promocja'] > 0) && ($oferta->getCena()['promocja'] < 1) ? "Cena po promocji!".($oferta->getCena()['cena']*$oferta->getCena()['promocja'])."zł" : $oferta->getCena()['cena']."zł";?></h4>
                        </div>
                    </div>                   
                </td>
            </tr>
        <?php } ?>
    <?php } ?>


</table>
<?php } else {?>
<?='Brak dodanej oferty!';}?>
