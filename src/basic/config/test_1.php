<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$users = require __DIR__ . '/users.php';

$params['users'] = $users;

$config = [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'response' => [
            //'format' => \yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
            // ...
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            'parsers' => ['application/json' => 'yii\web\JsonParser',],
            
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [            
            'useFileTransport' => true,
        ],
         'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
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
        'db' => $db,
        
        'urlManager' => [
                            'enablePrettyUrl' => true,
                            'enableStrictParsing' => true,
                            'showScriptName' => false,
                            'rules' => [
                                ['class' => 'yii\rest\UrlRule', 'controller' => 'users'],
                                ['class' => 'yii\rest\UrlRule', 'controller' => 'album'],
                                ['class' => 'yii\rest\UrlRule', 'controller' => 'photo'],
                                ['class' => 'yii\web\UrlRule', 'pattern' => '/', 'route' => 'site/index'],
                                ['class' => 'yii\web\UrlRule', 'pattern' => '/site/<action:>', 'route' => 'site/<action>'],
                                ['class' => 'yii\web\UrlRule', 'pattern' => '/create/<action:>', 'route' => 'create/<action>'],
                            ],
                        ],
        
    ],
    'params' => $params,    
];

return $config;
