<?php

namespace Actions;


class ActionIndex extends Action
{
    protected function doExecute()
    {
        $content = "";
        $content = $this->response->processTemplate('index', $content);
        $content = $this->response->processTemplate('layout', [
            'title' => 'Strona fitness',
            'content' => $content
        ]);
        $this->response->setContent($content);
    }
}
