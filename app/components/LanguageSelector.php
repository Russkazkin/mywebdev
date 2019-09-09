<?php


namespace app\components;


use yii\base\Application;
use yii\base\BootstrapInterface;

class LanguageSelector implements BootstrapInterface
{
    public $supportedLanguages = [];

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $preferredLanguage = isset($app->request->cookies['language']) ? (string)$app->request->cookies['language'] : null;
        $preferredLocale = isset($app->request->cookies['locale']) ? (string)$app->request->cookies['locale'] : null;
        $preferredCalendar = isset($app->request->cookies['calendar']) ? (string)$app->request->cookies['calendar'] : null;

        if (empty($preferredLanguage)) {
            $preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
        }
        $app->language = $preferredLanguage;
        $app->formatter->locale = $preferredLocale;
        $app->formatter->calendar = (int)$preferredCalendar;
    }
}