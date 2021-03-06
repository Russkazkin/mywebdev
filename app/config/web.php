<?php

use app\modules\auth\components\RbacComponent;
use app\modules\blog\components\ArticleComponent;
use app\modules\blog\components\CategoryComponent;
use app\modules\blog\models\Comment;
use app\modules\lang\components\LangDateComponent;
use yii\i18n\PhpMessageSource;
use yii\rbac\DbManager;

$params = require __DIR__ . '/params.php';
$db = file_exists(__DIR__ . '/db_local.php') ? (require __DIR__ . '/db_local.php') : (require __DIR__ . '/db.php');

$config = [
    'id' => 'mywebdev',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'lang',
    ],
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'auth' => [
            'class' => 'app\modules\auth\Module',
            'components' => [
                'rbac' => RbacComponent::class
            ]
        ],
        'lang' => [
            'class' => 'app\modules\lang\Module',
            'components' => [
                'dateManager' => LangDateComponent::class,
            ]
        ],
        'blog' => [
            'class' => 'app\modules\blog\Module',
            'components' => [
                'article' => ArticleComponent::class,
                'category' => CategoryComponent::class,
            ]
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'comment' => [
            'class' => 'yii2mod\comments\Module',
            'commentModelClass' => Comment::class,
        ],
    ],
    'components' => [
        'assetManager' => [
            'linkAssets' => true,
        ],
        'authManager' => [
            'class' => DbManager::class,
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '98gIM9RdYciaPuV9urbTbKxCUOtCZRfH',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\auth\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/sign-in'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'auth*' => [
                    'class' => PhpMessageSource::class,
                    'basePath' => '@app/modules/auth/messages',
                    'fileMap' => [
                        'auth' => 'auth.php'
                    ]
                ],
                'blog*' => [
                    'class' => PhpMessageSource::class,
                    'basePath' => '@app/modules/blog/messages',
                    'fileMap' => [
                        'blog' => 'blog.php'
                    ]
                ],
                'yii2mod.comments' => [
                    'class' => PhpMessageSource::class,
                    'basePath' => '@app/modules/blog/messages',
                    'fileMap' => [
                        'blog' => 'blog.php',
                        'yii2mod.comments' => 'blog.php',
                    ]
                ]
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => '/blog/blog/index',
                //'site/<action>' => '/blog/blog/<action>',
                'auth/<action>' => 'auth/auth/<action>',
                'user/<action>' => 'auth/user/<action>',
                '/blog/<action>' => '/blog/blog/<action>',
                '/blog/<controller>/<action>' => '/blog/blog/index',
                '/admin/blog/<controller>/<action>' => '/blog/<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
