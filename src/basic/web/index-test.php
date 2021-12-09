<?php
// NOTE: Make sure this file is not accessible when deployed to production

//if (!in_array(@$_SERVER['REMOTE_ADDR'], ['172.0.1.1', '::1'])) 
if(!preg_match('/172\.\d{1,3}\.\d{1,3}\.\d{1,3}/', @$_SERVER['REMOTE_ADDR']))
{
    die('You are not allowed to access this file.');
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/test.php';

(new yii\web\Application($config))->run();
