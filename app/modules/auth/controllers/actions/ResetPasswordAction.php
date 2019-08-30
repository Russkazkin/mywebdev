<?php


namespace app\modules\auth\controllers\actions;


use app\modules\auth\controllers\base\BaseAction;
use app\modules\auth\models\ResetPasswordForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;

class ResetPasswordAction extends BaseAction
{

    /**
     * @param $token
     * @return string|\yii\web\Response
     * @throws BadRequestHttpException
     * @throws \yii\base\Exception
     */
    public function run($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->controller->goHome();
        }

        return $this->controller->render('resetPassword', [
            'model' => $model,
        ]);

    }
}