<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/a.jpg" alt="First slide [900x500]">
            <div class="carousel-caption">
                <h3>Jennete McCurdy jednak z Brazzers</h3>
                <p>Znana z Nickelodeon aktorka uległa namowom i podjęła współpracę z wytwórnią filmów
                    pornograficznych Brazzers</p>
            </div>
        </div>
        <div class="item">
            <img src="img/b.jpg" alt="Second slide [900x500]">
            <div class="carousel-caption">
                <h3>Testoviron pobity przez narodowców</h3>
                <p>Znany amerykańsko-polski YouTuber pobity przez sympatyków i członków Ruchu Narodowego</p>
            </div>
        </div>
        <div class="item">
            <img src="img/c.jpg" alt="Third slide [900x500]">
            <div class="carousel-caption">
                <h3>Rozgrabione kościoły, bogactwa oddane gejom</h3>
                <p>Tylko w ten weekend spalono 2000 kościołów, a do grona najbogatszych Polaków dołączyło 20
                    homoseksualistów.</p>
            </div>
        </div>
        <div class="item">
            <img src="img/d.jpg" alt="Third slide [900x500]">
            <div class="carousel-caption">
                <h3>Pedofilia wreszcie legalna</h3>
                <p>Sejm Rzeczpospolitej Polskiej przyjął dziś przez aklamację obywatelki wniosek partii Duże Penisy
                    odnośnie dekryminalizacji i depenalizacji pedofilii</p>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div id="text">
    <div class="news_container">
        <div class="row news_row">

            <?php $i=0; ?>
            <?php foreach ($p as $news){?>
                <?php if(is_array($news)){ ?>
                    <div class="col-md-5 <?= ($news['id']%2==0) ? 'col-md-offset-2' : ''?> news">
                        <div class="row">
                            <div class="col-md-4">
                                <img src='<?="img/{$news['kategoria']}.jpg"?>' alt="..." class="img-thumbnail">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <h4><?=$news['naglowek']?></h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-9"><?=$news['opis']?></div>
                                    <div class="col-md-3"><a class="btn btn-default" href='index.php?action=news&&id=<?=$news['id']?>' role="button">Więcej</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++ ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up">UP</i>
  </span>
</div>