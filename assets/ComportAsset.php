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
    public $baseUrl = '@web/';
    public $css = [
        'comport/assets/css/animate-3.7.0.css',
        'comport/assets/css/font-awesome-4.7.0.min.css',
        'comport/assets/fonts/flat-icon/flaticon.css',
        'comport/assets/css/bootstrap-4.1.3.min.css',
        'comport/assets/css/owl-carousel.min.css',
        'comport/assets/css/nice-select.css',
        'comport/assets/css/style.css',
        'css/site.css'
    ];
    public $js = [
        'comport/assets/js/vendor/jquery-2.2.4.min.js',
        'comport/assets/js/vendor/bootstrap-4.1.3.min.js',
        'comport/assets/js/vendor/wow.min.js',
        'comport/assets/js/vendor/owl-carousel.min.js',
        'comport/assets/js/vendor/jquery.nice-select.min.js',
        'comport/assets/js/vendor/ion.rangeSlider.js',
        'comport/assets/js/main.js',
        'js/live-search.js'
    ];
    public $depends = [

    ];
}
