<?php


namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\PostCreateAction;

class PostController extends BaseController
{
    public function actions()
    {
        return [
            'create' => ['class' => PostCreateAction::class]
        ];
    }
}