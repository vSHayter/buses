<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ComportAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/comport/';
    public $css = [
        "assets/css/animate-3.7.0.css",
        "assets/css/font-awesome-4.7.0.min.css",
        "assets/fonts/flat-icon/flaticon.css",
        "assets/css/bootstrap-4.1.3.min.css",
        "assets/css/owl-carousel.min.css",
        "assets/css/nice-select.css",
        "assets/css/style.css",
    ];
    public $js = [
        "assets/js/vendor/jquery-2.2.4.min.js",
        "assets/js/vendor/bootstrap-4.1.3.min.js",
        "assets/js/vendor/wow.min.js",
        "assets/js/vendor/owl-carousel.min.js",
        "assets/js/vendor/jquery.nice-select.min.js",
        "assets/js/vendor/ion.rangeSlider.js",
        "assets/js/main.js",
    ];
    public $depends = [

    ];
}
