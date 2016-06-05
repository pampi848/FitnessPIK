<?php if (isset($p) && is_array($p) && isset($p[0])){?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

        <ol class="carousel-indicators">
            <?php $i=0 ?>
            <?php foreach ($p as $news){ ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?=$i?>" class="<?= ($i==0) ? 'active' : '' ?>"></li>
                <?php $i++ ?>
            <?php } ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php $i=0 ?>
            <?php foreach ($p as $news){ ?>
                <div class="item <?= ($i==0) ? 'active' : '' ?>">
                    <img src="<?=$news['img']?>" alt="<?=($i+1).'.'?> slide">
                    <div class="carousel-caption">
                        <a href='index.php?action=news&&id=<?=$news['id']?>'>
                            <h3><?= $news['naglowek'] ?></h3>
                        </a>
                        <p><?= $news['opis'] ?></p>
                    </div>
                </div>
                <?php $i++ ?>
            <?php } ?>
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
<?php } ?>