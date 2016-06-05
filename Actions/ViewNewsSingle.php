<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 05.06.16
 * Time: 20:10
 */

namespace Actions;

use Models\News;

class ViewNewsSingle extends Action
{
    function doExecute()
    {
        $id = $this->request->get('id');

        if (isset($id) && is_numeric($id)) {
            $news = News::fetchNewsById($id);

            $this->loadContent('newsSingle', $news);
        }
        else{
            header('location: ?action=allnews');
        }
    }
}