<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css",
        "sb-admin/bower_components/metisMenu/dist/metisMenu.min.css",
        "sb-admin/dist/css/timeline.css",
        "sb-admin/dist/css/sb-admin-2.css",
        "sb-admin/bower_components/morrisjs/morris.css",
        "sb-admin/bower_components/font-awesome/css/font-awesome.min.css",

        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
