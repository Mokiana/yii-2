<?php

$params = require __DIR__ . '/params.php';
$db = file_exists(__DIR__ . '/db_local.php')
    ? (require __DIR__ . '/db_local.php')
    : (require __DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'as logit' => ['class' => \app\behaviors\LoggerBehavior::class],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@my' => '/home/my',
        '@new' => '@my/new/create'
    ],
    'components' => [
        'authManager' => [
            'class' => '\yii\rbac\DbManager',
        ],
        'rbac' => ['class' => \app\components\RbacComponent::class],
        'activity' => ['class' => \app\components\ActivityComponent::class, 'activity_class' => 'app\models\Activity'],
        'day' => ['class' => \app\components\DayComponent::class, 'day_class' => 'app\models\Day'],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '8JpyQMkx15bLEaXx9i5OEo77AqikvFlB',
            'parsers' => [
                'application/json' => 'yii/web/JsonParser'
            ]
        ],
        'cache' => [
//            'class' => 'yii\caching\MemCache',
//            'useMemcached' => true
            'class' => 'yii\caching\FileCache'
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
//            'enableSession' => false
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
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap'=>[
                        'app'=>'app.php',
                        'app/error'=>'error'
                    ]
                ]
            ]
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'new' => 'activity/create',
                'create' => 'activity/create',
                'events/<action>' => 'activity/<action>',
                'events/<action>/<id:\w+>' => 'activity/<action>', //регуляное значение, может даже от 1 до 3 и т п
                ['class' => \yii\rest\UrlRule::class, 'controller' => 'rest',
                    'pluralize' => false]
//                '<controller>/add'=>'cont/add'
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
