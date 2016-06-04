<?php

namespace Actions;


class ActionIndex extends Action
{
    protected function doExecute()
    {
        $this->setContent();
    }
}
