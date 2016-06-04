<script>
    <?php $i=0; ?>
    <?php foreach ($p as $zajecie){?>
        <?php if(is_object($zajecie)){ ?>
            var zajecie<?=$i?> = {
                id: <?=$zajecie->id?>,
                nazwa: <?=$zajecie->nazwa?>,
                opis: <?=$zajecie->opis?>,
                idInstruktor: <?=$zajecie->idInstruktor?>,
                data: [<?=$zajecie->data['dzien']?>, <?=$zajecie->data['godzina']?>, <?=$zajecie->data['sala']?>],
                cena: <?=$zajecie->cena?>,
                promocja: <?=$zajecie->promocja?>,
                obecnosc: <?=$zajecie->obecnosc?>
    
        <?php } ?>
        <?php $i++ ?>
    <?php } ?>
</script>
