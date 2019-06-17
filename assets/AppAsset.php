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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Open+Sans:400,600',
        'theme/files/bower_components/bootstrap/css/bootstrap.min.css',
        'theme/files/assets/icon/themify-icons/themify-icons.css',
        'theme/files/assets/icon/icofont/css/icofont.css',
        'theme/files/assets/icon/feather/css/feather.css',
        'theme/files/assets/css/jquery.mCustomScrollbar.css',
        'theme/files/bower_components/datedropper/css/datedropper.min.css',
        'theme/files/bower_components/pnotify/css/pnotify.css',
        'theme/files/bower_components/pnotify/css/pnotify.brighttheme.css',
        'theme/files/bower_components/pnotify/css/pnotify.buttons.css',
        'theme/files/bower_components/pnotify/css/pnotify.history.css',
        'theme/files/bower_components/pnotify/css/pnotify.mobile.css',
        'theme/files/assets/pages/pnotify/notify.css',
        'theme/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css',
        'theme/files/bower_components/multiselect/css/multi-select.css',

        'theme/files/assets/css/style.css',
        'js/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
    ];
    public $js = [
        'theme/files/bower_components/jquery-ui/js/jquery-ui.min.js',
        'theme/files/bower_components/popper.js/js/popper.min.js',
        'theme/files/bower_components/bootstrap/js/bootstrap.min.js',
        'theme/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
        'theme/files/bower_components/modernizr/js/modernizr.js',
        'theme/files/bower_components/modernizr/js/css-scrollbars.js',
        'theme/files/assets/js/jquery.mCustomScrollbar.concat.min.js',
        'theme/files/assets/js/SmoothScroll.js',
        'theme/files/assets/js/pcoded.min.js',
        'theme/files/assets/js/vartical-layout.min.js',
        'theme/files/bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js',
        'theme/files/bower_components/datedropper/js/datedropper.min.js',
        'theme/files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
        'theme/files/bower_components/pnotify/js/pnotify.js',
        'theme/files/bower_components/pnotify/js/pnotify.desktop.js',
        'theme/files/bower_components/pnotify/js/pnotify.buttons.js',
        'theme/files/bower_components/pnotify/js/pnotify.confirm.js',
        'theme/files/bower_components/pnotify/js/pnotify.callbacks.js',
        'theme/files/bower_components/pnotify/js/pnotify.animate.js',
        'theme/files/bower_components/pnotify/js/pnotify.history.js',
        'theme/files/bower_components/pnotify/js/pnotify.mobile.js',
        'theme/files/bower_components/pnotify/js/pnotify.nonblock.js',
        'theme/files/assets/pages/pnotify/notify.js',
        'theme/files/bower_components/i18next/js/i18next.min.js',
        'theme/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js',
        'theme/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js',
        'theme/files/bower_components/jquery-i18next/js/jquery-i18next.min.js',
        'theme/files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js',
        'theme/files/bower_components/multiselect/js/jquery.multi-select.js',

        'theme/files/assets/js/script.min.js',

        'js/bootstrap-datepicker/locales/bootstrap-datepicker.ru.min.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
}
