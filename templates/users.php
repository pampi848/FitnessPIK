<?php foreach ($p as $konto){ ?>
    <div id="id">Id: <?=$konto['id']?> </div>
    <div id="login">Login: <?=$konto['login']?> </div>
    <div id="email">E-mail: <?=$konto['email']?> </div>
    <div id="nrTel">Numer Telefonu: <?=$konto['nrTel']?> </div>
    <div id="imie">Imię: <?=$konto['imie']?> </div>
    <div id="nazwisko">Nazwisko: <?=$konto['nazwisko']?> </div>
    <div id="miejscowosc">Miejscowość: <?=$konto['miejscowosc']?> </div>
    <div id="ulica">Ulica: <?=$konto['ulica']?> </div>
    <div id="nrDomu">Numer domu: <?=$konto['nrDomu']?> </div>
    <div id="nrMieszkania">Numer mieszkania: <?=$konto['nrMieszkania']?> </div>
    <div id="kodPocztowy">Kod pocztowy: <?=$konto['kodPocztowy']?> </div>
    <div id="dataUrodzin">Data urodzin: <?=$konto['dataUrodzin']?> </div>
    <div id="dataUtworzenia">Data utworzenia: <?=$konto['dataUtworzenia']?> </div>
    <div id="activated">Aktywne: <?= ($konto['activated']==1) ? 'tak' : 'nie' ?> </div>
    <div id="level">Typ konta: <?= ($konto['level']==0) ? 'User' : '' ?> <?= ($konto['level']==1) ? 'Admin' : '' ?> <?= ($konto['level']==2) ? 'Instruktor' : '' ?> </div>
    <div id="activationCode">Kod aktywacyjny: <?=$konto['activationCode']?> </div>
    <a href="?action=profile&&id=<?=$konto['id']?>"><button>Edytuj</button></a>
    <a href="?action=resetPass&&id=<?=$konto['id']?>"><button>Resetuj hasło</button></a>
    <a href="?action=sendactivation&&id=<?=$konto['id']?>&&mail=<?=$konto['email']?>"><button>Wyślij nowy kod aktywacyjny</button></a>
    <?php if ($konto['level']==2){?>
        <a href="?action=addlesson&&id=<?=$konto['id']?>"><button>Dodaj zajęcie</button></a>
    <?php }?>
    <?php if ($konto['level']==0){?>
    <a href="?action=uprawnienia&&id=<?=$konto['id']?>&&level=2"><button>Mianuj instruktorem</button></a>
    <a href="?action=uprawnienia&&id=<?=$konto['id']?>&&level=1"><button>Mianuj Adminem</button></a>
    <?php }?>
    <?php if ($konto['level']!=0){?>
    <a href="?action=uprawnienia&&id=<?=$konto['id']?>&&level=0"><button>Zabierz uprawnienia</button></a>
    <?php }?>
    <a href="?action=deactivation&&id=<?=$konto['id']?>"><button><?= ($konto['activated']==1) && ($konto['activationCode'] != 'disable') ? 'Dezaktywuj' : 'Aktywuj' ?></button></a>
    <!-- kiedy kinga szukała bootstrapów do tego na lekcji, to znalazła gdzieś stronę z takimi fajnymi buttonami w stylu: zamiast edytuj - był taki 'długopis' etc -->
    <br/>
    <br/>
<?php } ?>
