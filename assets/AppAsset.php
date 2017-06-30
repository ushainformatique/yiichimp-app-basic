<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Mayank Singhai <mayank.singhai@ushainformatique.com>
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/application.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'usni\fontawesome\FontAwesomeAsset',
    ];
}
