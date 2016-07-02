<?php if(isset($p) && is_array($p) && isset($p['instruktorzy']) && is_array($p['instruktorzy']) && isset($p['id']) ){?>
<form action="?action=lessonaddprocess" method="post">
    <input type="text" placeholder="nazwa" name="lesson[name]"/>
    <textarea name="lesson[opis]" placeholder="Opis"></textarea>
    <select name="lesson[idInstruktor]">
        <?php foreach ($p['instruktorzy'] as $instruktor){?>
        <option <?=($instruktor['id']==$p['id']) ? 'selected' : ''?> value="<?=$instruktor['id']?>"><?=$instruktor['imie'].' '.$instruktor['nazwisko']?></option>
        <?php } ?>
    </select>
    <input type="number" placeholder="cena" name="lesson[cena]"/>
    <input type="number" placeholder="promocja" value="1" step="0.1" name="lesson[promocja]"/>
    <input type="number" placeholder="wynagrodzenie" name="lesson[wynagrodzenie]"/>
    <input type="submit"/>
</form>
<?php } else { ?>
<?= 'Brak instruktorów!' ?>
<?php } ?>
