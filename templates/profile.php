 <?php if (isset($p)){ ?>
        <div class="profile-content">
            <div class="row upper-profile">
                <div class="col-md-4">
<!--                    GENEROWANIE AVATARA-->
            <img src="<?=file_exists("img/profile/{$p['login']}.jpg")? "img/profile/{$p['login']}.jpg" : "img/profile/default.png"?>" alt="..." class="img-thumbnail img-responsive center-block">
                 <div class="row">
                    <div class="col-md-12">
                        <form action="?action=profile" method="post" class="form-horizontal">
                            <div class="row margin-row">
                                <div class="col-md-12">
                                    <input class="center-block" type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                            </div>
                            <div class="row margin-row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary center-block">
                                </div>
                            </div>
                        </form>
                     </div>
                    </div>   

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
                        <br/>
                        <br/>
                        <center><a href="?action=deactivation&&id=<?=$_SESSION['logged']['id']?>"><button type="button" class="btn btn-warning margin-row">Dezaktywuj konto</button></a></center>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                   <form action="?action=editprofile" method="POST" class="form-horizontal">
                                       <?php 
                                           if(isset($_GET['id'])) {
                                               $_SESSION['data']['id'] = $_GET['id'];
                                           }
                                           elseif(isset($_SESSION['logged']['id'])){
                                               $_SESSION['data']['id'] = $_SESSION['logged']['id'];
                                           }
                                       ?>
                                       <div class="row text-center form-group">
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="name">Imię</label></div>
                                               <div class="col-md-6"><input name="Edit[name]" type="text" class="form-control profile-input pull-right" id="name" value="<?=$p['imie']?>" readonly required></div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="lastname">Nazwisko</label></div>
                                               <div class="col-md-6"><input name="Edit[lastname]" type="text" class="form-control profile-input pull-right" id="lastname" value="<?=$p['nazwisko']?>" readonly required></div>
                                           </div>
                                       </div>
                                       <div class="row text-center form-group">
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="mail">E-mail</label></div>
                                               <div class="col-md-6"><input name="Edit[mail]" type="email" class="form-control profile-input pull-right" id="mail" value="<?=$p['email']?>" readonly required></div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="tel">Telefon</label></div>
                                               <div class="col-md-6"><input name="Edit[phone]" type="number" class="form-control profile-input pull-right" id="tel" value="<?=$p['nrTel']?>" readonly required></div>
                                           </div>
                                       </div>
                                       <div class="row text-center form-group">
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="place">Miejscowość</label></div>
                                               <div class="col-md-6"><input name="Edit[place]" type="text" class="form-control profile-input pull-right" id="place" value="<?=$p['miejscowosc']?>" readonly required></div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="street">Ulica</label></div>
                                               <div class="col-md-6"><input name="Edit[street]" type="text" class="form-control profile-input pull-right" id="street" value="<?=$p['ulica']?>" readonly required></div>
                                           </div>
                                       </div>
                                       <div class="row text-center form-group">
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="place_number">Numer domu</label></div>
                                               <div class="col-md-6"><input name="Edit[home]" type="number" class="form-control profile-input pull-right" id="place_number" value="<?=$p['nrDomu']?>" readonly required></div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="room_number">Numer mieszkania</label></div>
                                               <div class="col-md-6"><input name="Edit[flat]" type="number" class="form-control profile-input pull-right" id="room_number" value="<?=$p['nrMieszkania']?>" readonly required></div>
                                           </div>
                                       </div>
                                       <div class="row text-center form-group">
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="date">Data urodzenia</label></div>
                                               <div class="col-md-6"><input name="Edit[date]" type="date" class="form-control profile-input pull-right" id="date" value="<?=$p['dataUrodzin']?>" readonly required></div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="col-md-6"><label for="post">Kod pocztowy</label></div>
                                               <div class="col-md-6"><input name="Edit[post]" type="text" class="form-control profile-input pull-right" id="post" value="<?=$p['kodPocztowy']?>" readonly required></div>
                                           </div>
                                       </div>
                                <hr/>
                                <div class="row center-block">
                                    <div class="col-md-4 center-block"><input type="submit" id="send" value="Wyślij" class="btn btn-success modify center-block"></button></div>
                                    <div class="col-md-4 center-block"><button type="button" id="edit" class="btn btn-info center-block">Edytuj</button></div>
                                    <div class="col-md-4 center-block"><button type="button" id="cancel" class="btn btn-danger modify pull-right center-block">Anuluj</button></div>
                                </div>
                                   </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php } ?>