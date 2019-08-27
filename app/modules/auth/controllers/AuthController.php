<?php


namespace app\modules\auth\controllers;


use app\modules\auth\controllers\actions\AuthSignUpAction;
use app\modules\auth\controllers\base\BaseController;

class AuthController extends BaseController
{
    public function actions()
    {
        return [
            'sign-up' => ['class' => AuthSignUpAction::class]
        ];
    }
}