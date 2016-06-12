<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 18:21
 */

namespace Actions;

use Models\News;

require_once "autoload.php";

class ViewNewsAdd extends Action
{

    function doExecute()
    {
        $newNews = $this->request->get('newNews');
        //Jeśli wysłano dane
        if (isset($newNews['submit'])&&(isset($_SESSION['logged']['online'])) && ($_SESSION['logged']['online'] == true) && (isset($_SESSION['logged']['level'])) && (($_SESSION['logged']['level'] == 1) || ($_SESSION['logged']['level'] == 2))){
            unset($newNews['submit']);

            $source = isset($_FILES['newNews']['tmp_name']['img']) ? $_FILES['newNews']['tmp_name']['img'] : '';
            $size = isset($_FILES['newNews']['size']['img']) ? $_FILES['newNews']['size']['img'] : 0;
            $type = isset($_FILES['newNews']['type']['img']) ? $_FILES['newNews']['type']['img'] : '';

            $nowaSciezka = '';
            $logged = $this->session->get('logged');

            if($size <= 16777216 && isset($source) && isset($type) && ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/bmp')) {
                $type = substr($type, 6);
                $nowaSciezka = "img/news/img" . time() . ".$type";
                $nowyPlik = fopen($nowaSciezka, "x");
                $pobranyPlik = fread(fopen($_FILES['newNews']['tmp_name']['img'], 'r'),$size);
                fwrite($nowyPlik, $pobranyPlik);
                chmod($nowaSciezka,0755);
            }

            $news = News::create($nowaSciezka, $newNews['category'], $newNews['content'], $newNews['title'], $newNews['autor'], $newNews['description'], $logged['id']);

            if (is_object($news)) {
                $news->insertIntoDatabase();
                $this->session->add('messages', ['class' => 'alert-success', 'content' => 'Pomyślnie dodano newsa.']);
                header('location: index.php?action=allnews');
            } else {
                $this->session->add('messages', ['class' => 'alert-danger', 'content' => $news]);
                $this->loadContent('newsForm');
            }

        } else {
            //Pierwsze wczytanie strony
            if ((isset($_SESSION['logged']['level'])) && (($_SESSION['logged']['level'] == 1) || ($_SESSION['logged']['level'] == 2))) {
                $this->loadContent('newsForm');
            } //Nieautoryzowany dostęp
            else {
                // TODO: 401
                $this->session->add('messages', ['class' => 'alert-danger', 'content' => 'Coś poszło nie tak! 401']);

                $this->loadContent();
            }
        }
    }
}