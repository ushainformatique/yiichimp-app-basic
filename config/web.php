<?php
use yii\helpers\ArrayHelper;

$imageManagerClass  = 'usni\library\web\ImageManager';
$fileManagerClass   = 'usni\library\web\FileManager';
$videoManagerClass  = 'usni\library\web\VideoManager';

$params = require(__DIR__ . '/params.php');

$config = ArrayHelper::merge(require(USNI_PATH . '/library/config/common.php'), [
    'id' => 'YiiChimpBasic',
    'installed' => true,
    'basePath' => dirname(__DIR__),
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'gLJv3t8CxiooEDnXzb0vySVZBNmP93XV',
        ],
        'authorizationManager' => ['class' => 'usni\library\modules\auth\business\AuthManager'],
        'cache' => [
                        'class'     => 'yii\caching\FileCache',
                        'keyPrefix' => 'ycb_'
                   ],
        'assetManager'      => [
                                    'resourcesPath' => realpath(__DIR__ . '/..') . '/resources',
                                    'fileUploadPath' => realpath(__DIR__ . '/..') . '/resources/files',
                                    'imageUploadPath' => realpath(__DIR__ . '/..') . '/resources/images',
                                    'thumbUploadPath' => realpath(__DIR__ . '/..') . '/resources/images/thumbs',
                                    'videoUploadPath' => realpath(__DIR__ . '/..') . '/resources/videos',
                                    'imageManagerClass'  => $imageManagerClass,
                                    'fileManagerClass'   => $fileManagerClass,
                                    'videoManagerClass'  => $videoManagerClass
                                ],
        'languageManager'   => ['class' => 'usni\library\components\LanguageManager'],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'usni\library\mail\SwiftMailer',
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
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'moduleManager'      => ['class' => 'usni\library\components\ModuleManager',
                                  'modulePaths' => ['@app/modules', '@usni/library/modules']],
    ],
    'params' => $params,
]);

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
