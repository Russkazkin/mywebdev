<?php


namespace app\modules\auth\controllers\actions;


use app\modules\auth\controllers\base\BaseAction;
use app\modules\auth\models\SignupForm;
use Yii;


class AuthSignUpAction extends BaseAction
{
    public function run()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->controller->goHome();
                }
            }
        }

        return $this->controller->render('sign-up', ['model' => $model]);
    }
}