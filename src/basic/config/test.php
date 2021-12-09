<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/test_db.php';

$users = require __DIR__ . '/users.php';

$params['users'] = $users;

/**
 * Application configuration shared by all test types
 */
return [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'en-US',
    'components' => [
        'db' => $db,
        'mailer' => [
            'useFileTransport' => true,
        ],
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
                            'enablePrettyUrl' => true,
                            'enableStrictParsing' => true,
                            'showScriptName' => true,
                            'rules' => [
                                ['class' => 'yii\rest\UrlRule', 'controller' => 'users'],
                                ['class' => 'yii\rest\UrlRule', 'controller' => 'album'],
                                ['class' => 'yii\rest\UrlRule', 'controller' => 'photo'],
                                ['class' => 'yii\web\UrlRule', 'pattern' => '/', 'route' => 'site/index'],
                                ['class' => 'yii\web\UrlRule', 'pattern' => '/site/<action:>', 'route' => 'site/<action>'],
                                ['class' => 'yii\web\UrlRule', 'pattern' => '/create/<action:>', 'route' => 'create/<action>'],
                            ],
                        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            // but if you absolutely need it set cookie domain to localhost
            /*
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
            */
        ],
    ],
    'params' => $params,
];
