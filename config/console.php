<?php
use yii\helpers\ArrayHelper;

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = ArrayHelper::merge(
                    require(USNI_PATH . '/library/config/common.php'), [
    'id' => 'yiichimpbasic-console',
    'installed' => true,
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'keyPrefix' => 'ycb_'
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'languageManager'   => ['class' => 'usni\library\components\LanguageManager'],
        'user'          => ['class' => 'usni\library\console\ConsoleUser'],
        'moduleManager'      => ['class' => 'usni\library\components\ModuleManager',
                                  'modulePaths' => ['@app/modules', '@usni/library/modules']],
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
]);

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
