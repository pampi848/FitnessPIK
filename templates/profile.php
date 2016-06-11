<div class="container">
        <div class="profile-content">
            <div class="row upper-profile">
                <div class="col-md-4">
<!--                    GENEROWANIE AVATARA-->
            <img src="<?=file_exists("img/profile/{$p['login']}.jpg")? "img/profile/{$p['login']}.jpg" : "img/profile/default.png"?>" alt="..." class="img-thumbnail img-responsive center-block">
                    

                </div>
                <div class="col-md-8"> <!-- DANE OSOBOWE -->
                    <div class="row"><div class="col-md-12 name"><h1><?=$p['imie']; ?> <small><?=$p['nazwisko']; ?></small></h1></div></div>
                    <div class="row"><div class="col-md-12 title"><h4><?=$p['level']; ?></h4></div></div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 contact">
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">O sobie</h3>
                                </div>
                                <div class="panel-body">
                                    <?php var_dump($p)?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->