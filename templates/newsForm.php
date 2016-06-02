<div class="container">

      <div class="starter-template">
        <h1>Dodawanie newsa</h1>
        <!--<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p> -->
      </div>
        
        <form id="news" action="addNews.php" method="post">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="title">Tytuł</label>
                        <input type="text" class="form-control" id="title" placeholder="Tytuł" name="title">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="autor" placeholder="Autor" name="autor">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">Treść</label>
                        <textarea rows="5" class="form-control" id="content" name="content" form="news"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kategoria</label>
                        <button type="button" id="1" class="btn btn-default cat">Informacja</button>
                        <button type="button" id="2" class="btn btn-default cat">Ogłoszenie</button>
                        <button type="button" id="3" class="btn btn-default cat">Oferta</button>
                        <input id="cat" class="hidden" type="text" name="category">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group upload">
                    <label for="exampleInputFile">File input</label>
                    <input class="btn btn-default" type="file" id="exampleInputFile" name="img">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-10">
                    <input type="submit" class="btn btn-primary btn-lg" value="Publikuj">
                </div>
            </div>
        </form>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom_script.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>