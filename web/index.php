<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

defined('APPLICATION_PATH') or define('APPLICATION_PATH', dirname(dirname(__FILE__)));
defined('VENDOR_PATH') or define('VENDOR_PATH', __DIR__ . '/../vendor');
defined('USNI_PATH') or define('USNI_PATH', VENDOR_PATH . '/ushainformatique/yiichimp');
define('DS', DIRECTORY_SEPARATOR);
    
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

require(USNI_PATH . '/library/config/bootstrap.php');

$config = require(__DIR__ . '/../config/web.php');

(new usni\library\web\Application($config))->run();
