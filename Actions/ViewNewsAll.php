<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 05.06.16
 * Time: 05:39
 */

namespace Actions;

require_once "autoload.php";

use Models\News;
class ViewNewsAll extends Action
{
    function doExecute()
    {
        $tablicaNewsow = News::fetchAllNews();
        $galleryData = News::fetchNewsToGallery();

        
        $gallery = $this->response->processTemplate('gallery', $galleryData);
        $this->loadContent('newsAll', ['gallery' => $gallery, 'news' => $tablicaNewsow]);
    }
}