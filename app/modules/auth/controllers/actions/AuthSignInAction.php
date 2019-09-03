<?php


namespace app\modules\auth\controllers\actions;


use app\modules\auth\controllers\base\BaseAction;
use app\modules\auth\models\SigninForm;
use Yii;

class AuthSignInAction extends BaseAction
{
    public function run()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->controller->goHome();
        }

        $model = new SigninForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->controller->goBack();
        } else {
            $model->password = '';

            return $this->controller->render('sign-in', [
                'model' => $model,
            ]);
        }

    }
}