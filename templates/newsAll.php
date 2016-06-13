<?=$p['gallery']?>
<div id="text">
    <div class="news_container">
        <div class="row news_row">

            <?php $i=0; ?>
            <?php foreach ($p['news'] as $news){?>
                <?php if(is_array($news)){ ?>
                    <div class="col-md-5 <?= ($i%2==0) ? '' : 'col-md-offset-2'?> news">
                        <div class="row margin-row">
                            <div class="col-md-4">
                                <img src='<?="img/{$news['kategoria']}.png"?>' alt="..." class="img-thumbnail">
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