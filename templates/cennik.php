<table class="table table-stripped">
    <tr>
        <th>Nazwa</th>
        <th>Opis</th>
        <th>Instruktor</th>
        <th>Termin</th>
        <th>Sala</th>
        <th>Cena</th>
    </tr>
    <?php foreach ($p as $oferta){ ?>
        <?php if(isset($oferta) && is_object($oferta)){ ?>
            <tr>
                <td>
                    <div class="row" style="margin-left: 5%">
                        <?=$oferta->getNazwa()?>
                    </div>
                    <?php if (isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1){ ?>
                        <button style="margin-bottom: 4%">Usuń Zajęcia</button>
                    <?php } ?>
                </td>
                <td><?=$oferta->getOpis()?></td>
                <td><?=$oferta->getIdInstruktor()?></td>
                    <td>
                        <?php foreach ($oferta->data as $data){ ?>
                            <div class="row">
                                <div class="col-md-12"><?=$data['dzienTygodnia'].' '.str_replace(".",":",$data['godzina'])?></div>
                                <?php if (isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1){ ?>
                                    <button style="margin-bottom: 4%">Usuń Termin</button>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($_SESSION['logged']['level']) && $_SESSION['logged']['level']==1){ ?>
                            <div class="row">
                                <button>Dodaj termin</button>
                            </div>
                        <?php } ?>
                    </td>
                    <td>
                        <?php foreach ($oferta->data as $data){?>
                            <div class="row" style="margin-bottom: 60%;margin-left: 5%;" >
                                <?=$data['sala'];?>
                            </div>
                        <?php }?>
                    </td>
                <td><?=($oferta->getCena()['promocja'] > 0) && ($oferta->getCena()['promocja'] < 1) ? "Cena po promocji!".($oferta->getCena()['cena']*$oferta->getCena()['promocja']) : $oferta->getCena()['cena'];?></td>
            </tr>
        <?php } ?>
    <?php } ?>


</table>

<?php var_dump($p) ?>