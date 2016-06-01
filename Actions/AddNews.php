<?php
/**
 * Created by PhpStorm.
 * User: pampi
 * Date: 01.06.16
 * Time: 18:21
 */

namespace Actions;

require_once "autoload.php";
class AddNews extends Action
{

    function doExecute()
    {
        if(isset($_POST['addNews'])){

        }
        $content = "";
        $content = $this->response->processTemplate('addnews', $content);
        $content = $this->response->processTemplate('layout', [
            'title' => 'Strona fitness',
            'content' => $content
        ]);
        $this->response->setContent($content);
    }
}