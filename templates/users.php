<?php foreach ($p as $konto){ ?>
    <div class="row margin-row-small">
        <div class="col-md-4" id="id"><strong>Id:</strong> <?=$konto['id']?> </div>
        <div class="col-md-4" id="login"><strong>Login:</strong> <?=$konto['login']?> </div>
        <div class="col-md-4" id="email"><strong>E-mail:</strong> <?=$konto['email']?> </div>
    </div>
    <div class="row margin-row-small">
        <div class="col-md-4" id="nrTel"><strong>Numer Telefonu:</strong> <?=$konto['nrTel']?> </div>
        <div class="col-md-4" id="imie"><strong>Imię:</strong> <?=$konto['imie']?> </div>
        <div class="col-md-4" id="nazwisko"><strong>Nazwisko:</strong> <?=$konto['nazwisko']?> </div>
    </div>
    <div class="row margin-row-small">
        <div class="col-md-4" id="miejscowosc"><strong>Miejscowość:</strong> <?=$konto['miejscowosc']?> </div>
        <div class="col-md-4" id="ulica"><strong>Ulica:</strong> <?=$konto['ulica']?> </div>
        <div class="col-md-4" id="nrDomu"><strong>Numer domu:</strong> <?=$konto['nrDomu']?> </div>
    </div>
    <div class="row margin-row-small">
        <div class="col-md-4" id="nrMieszkania"><strong>Numer mieszkania:</strong> <?=$konto['nrMieszkania']?> </div>
        <div class="col-md-4" id="kodPocztowy"><strong>Kod pocztowy:</strong> <?=$konto['kodPocztowy']?> </div>
        <div class="col-md-4" id="dataUrodzin"><strong>Data urodzin:</strong> <?=$konto['dataUrodzin']?> </div>
    </div>
    <div class="row margin-row-small">
        <div class="col-md-4" id="dataUtworzenia"><strong>Data utworzenia:</strong> <?=$konto['dataUtworzenia']?> </div>
        <div class="col-md-4" id="activated"><strong>Aktywne:</strong> <?= ($konto['activated']==1) ? 'tak' : 'nie' ?> </div>
        <div class="col-md-4" id="level"><strong>Typ konta:</strong> <?= ($konto['level']==0) ? 'User' : '' ?> <?= ($konto['level']==1) ? 'Admin' : '' ?> <?= ($konto['level']==2) ? 'Instruktor' : '' ?> </div>
    </div>
    <div class="row margin-row-small">
        <div id="activationCode" class="col-md-12 text-center"><strong>Kod aktywacyjny:</strong> <?=$konto['activationCode']?> </div>
    </div>
    <div class="row margin-row-small">
    <div class="col-md-12 text-center">
    <a href="?action=profile&&id=<?=$konto['id']?>"><button class="btn btn-primary">Edytuj</button></a>
    <a href="?action=resetPass&&id=<?=$konto['id']?>"><button class="btn btn-warning">Resetuj hasło</button></a>
    <a href="?action=sendactivation&&id=<?=$konto['id']?>&&mail=<?=$konto['email']?>"><button class="btn btn-success">Wyślij nowy kod aktywacyjny</button></a>
    
    <?php if ($konto['level']==2){?>
        <a href="?action=addlesson&&id=<?=$konto['id']?>"><button class="btn btn-primary">Dodaj zajęcie</button></a>
    </div>
    </div>
    <div class="row margin-row-small">
    <div class="col-md-12 text-center">
    <?php }?>
    <?php if ($konto['level']==0){?>
    <a href="?action=uprawnienia&&id=<?=$konto['id']?>&&level=2"><button class="btn btn-primary">Mianuj instruktorem</button></a>
    <a href="?action=uprawnienia&&id=<?=$konto['id']?>&&level=1"><button class="btn btn-primary">Mianuj Adminem</button></a>
    <?php }?>
    <?php if ($konto['level']!=0){?>
    <a href="?action=uprawnienia&&id=<?=$konto['id']?>&&level=0"><button class="btn btn-warning">Zabierz uprawnienia</button></a>
    <?php }?>
    <?php if ($konto['level']==2){?>
    <a href="?action=instruktorPanel&&id=<?=$konto['id']?>"><button class="btn btn-primary">Panel instruktora</button></a>
    <?php }?>
    <a href="?action=deactivation&&id=<?=$konto['id']?>"><button class="btn btn-danger"><?= ($konto['activated']==1) && ($konto['activationCode'] != 'disable') ? 'Dezaktywuj' : 'Aktywuj' ?></button></a>
        
    </div>
    </div>
    <!-- kiedy kinga szukała bootstrapów do tego na lekcji, to znalazła gdzieś stronę z takimi fajnymi buttonami w stylu: zamiast edytuj - był taki 'długopis' etc -->
    <hr/>
    <br/>
<?php } ?>
