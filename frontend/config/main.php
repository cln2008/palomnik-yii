<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout' => 'palomnik', // установка шаблона для приложения
    'defaultRoute' => 'palomnik/index', // маршрут по-умолчанию
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'baseUrl' => '',
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // 'hram/<action:\w+>' => 'hram/page/<action>',

                // '<action:\d+>' => 'hram/<action>',
                // '<act:>' => 'hram/<act>',
                // '<action:\w+>/<alias:\w+>' => 'hram/<action>',
                 // '<action:>/<alias:\w+>' => 'hram/<action>',
                // 'hram/page/<alias:\w+>' => 'hram/page', // любое символьное значение

                // '<controller:\w+>/page/<page:\d+>' => '<controller>/index',

                // '<controller:\w+>' => '<controller>/index',
                // http://hram.local/hram/news/page/2?%2Fhram%2Fnews=
                // 'hram/news/<id:\d+>' => 'hram/news', // любое символьное значение
                // 'hram/news/page/<page:\d+>'    => 'hram/news',

                'news/page/<page:\d+>' => 'news/show',
                'news/<id:\d+>'        => 'news/view',
                'news'                 => 'news/show',
                'schedule'             => 'hram/schedule',
                'gallery/<id:\d+>'      => 'gallery/view',
                'gallery'              => 'gallery/index',
                'hram/<alias:\w+>'     => 'hram/info', // любое символьное значение
                '/georg'               => 'hram/georg', // любое символьное значение

            ],
        ],

    ],
    'params' => $params,
];
