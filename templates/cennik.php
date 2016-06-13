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
                                <h4><?=$data['dzienTygodnia'].' '.str_replace(".",":",$data['godzina'])?></h4>
                            </div>
                            <?php if (isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1){ ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="?action=termindelprocess&&id=<?=$oferta->getId()?>"><button class="btn btn-warning btn-table">Usuń termin</button></a>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1 && $count==1){ ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-table">Dodaj termin</button>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <h4><?=$data['sala'];?></h4>
                        </div>
                        <?php $count--; ?>
                    </div>
                    <?php } ?>
                    <?php if(!is_array($oferta->data) || empty($oferta->data)){ ?>
                    <div class="row termin-i-miejsce">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-table">Dodaj termin</button>
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