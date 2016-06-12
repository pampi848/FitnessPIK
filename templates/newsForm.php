<div class="row padding-row">
    <div class="col-md-12">
        <h1>Dodawanie newsa</h1>
    <form id="news" action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="title">Tytuł</label>
                    <input type="text" class="form-control" id="title" placeholder="Tytuł" name="newNews[title]">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control" id="autor" placeholder="Autor" name="newNews[autor]">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="content">Treść</label>
                    <textarea rows="5" class="form-control" id="content" name="newNews[content]" form="news"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="content">Opis</label>
                    <textarea rows="5" class="form-control" id="description" name="newNews[description]" form="news"></textarea>
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
                    <input id="cat" class="hidden" type="text" name="newNews[category]">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group upload">
                <label for="exampleInputFile">File input</label>
                <input class="btn btn-default" type="file" id="exampleInputFile" name="newNews[img]">
                <p class="help-block">Dozwolone typy plików to: jpeg, png oraz bmp. Maksymalny rozmiar pliku to 16MB.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-10">
                <input type="submit" name="newNews[submit]" class="btn btn-primary btn-lg" value="Publikuj">
            </div>
        </div>
    </div>
        </div>
