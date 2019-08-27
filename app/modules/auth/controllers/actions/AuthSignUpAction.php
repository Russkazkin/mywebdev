<?php


namespace app\modules\auth\controllers\actions;


use app\modules\auth\controllers\base\BaseAction;
use app\modules\auth\models\User;

class AuthSignUpAction extends BaseAction
{
    public function run()
    {
        $model = new User();
        return $this->controller->render('sign-up', ['model' => $model]);
    }
}