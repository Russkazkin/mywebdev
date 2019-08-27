<?php


namespace app\controllers\actions;


use app\base\BaseAction;

class PostCreateAction extends BaseAction
{
    public function run()
    {
        return $this->controller->render('sign-up');
    }
}