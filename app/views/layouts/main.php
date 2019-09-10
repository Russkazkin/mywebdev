<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\modules\lang\widgets\selector\LanguageSelectorWidget;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;
use xtetis\bootstrap4glyphicons\assets\GlyphiconAsset;

AppAsset::register($this);
GlyphiconAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md'],
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
        ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app', 'Sign In'), 'url' => ['/auth/sign-in']];
        $menuItems[] = ['label' => Yii::t('app', 'Sign Up'), 'url' => ['/auth/sign-up']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/auth/logout'], 'post')
            . Html::submitButton(
                Yii::t('app', 'Logout (') . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav mr-auto'],
        'items' => $menuItems
    ]);
    echo LanguageSelectorWidget::widget();
    /*echo Html::beginForm(['lang/select'], 'post', [
        'enctype' => 'multipart/form-data',
        'id' => 'lang-form',
        'class' => 'lang-switch-form'
    ]);
    echo Html::radioList('language',
        Yii::$app->language,
        ['en-US' => 'ENG', 'ru-RU' => 'РУС'],
        ['class' => 'lang-switch']);*/
    //echo Html::dropDownList('language', Yii::$app->language, ['en-US' => 'English', 'ru-RU' => 'Русский']);
    //echo Html::submitButton('Change');
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        </div>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
