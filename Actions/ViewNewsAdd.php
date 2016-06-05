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
        if (isset($newNews['submit'])) {
            unset($newNews['submit']);

            $source = isset($_FILES['newNews']['tmp_name']['img']) ? $_FILES['newNews']['tmp_name']['img'] : '';
            $size = isset($_FILES['newNews']['size']['img']) ? $_FILES['newNews']['size']['img'] : '';
            $type = isset($_FILES['newNews']['type']['img']) ? $_FILES['newNews']['type']['img'] : '';

            $plik = !empty($source) ? fopen($_FILES['newNews']['tmp_name']['img'], 'r') : '';
            $imgBlob = !empty($size) ? addslashes(fread($plik, $_FILES['newNews']['size']['img'])) : '';
            !empty($source) ? fclose($plik) : '';

            $logged = $this->session->get('logged');

            $news = News::create($type, $size, $imgBlob, $newNews['category'], $newNews['content'], $newNews['title'], $newNews['autor'], $newNews['description'], $logged['id']);
            if (is_object($news)) {
                $news->insertIntoDatabase();
                $_SESSION['messages'][0] = ['class' => 'alert-success', 'content' => 'Pomyślnie dodano newsa.'];
                header('location: index.php?action=allnews');
            } else {
                $_SESSION['messages'][0] = ['class' => 'alert-danger', 'content' => $news];
                $this->setContent('newsForm');
            }
            
        } else {
            //Pierwsze wczytanie strony
            if ((isset($_SESSION['logged']['online'])) && ($_SESSION['logged']['online'] == true) && (isset($_SESSION['logged']['level'])) && ($_SESSION['logged']['level'] == 1)) {
                $this->setContent('newsForm');
            } //Nieautoryzowany dostęp
            else {
                // TODO: 401
                $_SESSION['messages'][0] = ['class' => 'alert-danger', 'content' => 'Coś poszło nie tak! 401'];

                $this->setContent();
            }
        }
    }
}