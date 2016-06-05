<?php

namespace Actions;

require_once "autoload.php";

use Models\News;
class ActionIndex extends Action
{
    protected function doExecute()
    {
        $text = "text.txt";
        $galleryData = News::fetchNewsToGallery();


        $gallery = $this->response->processTemplate('gallery', $galleryData);
        $this->loadContent('index', $gallery);
    }
}
