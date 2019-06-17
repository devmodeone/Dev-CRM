<?php

/* @var $this \yii\web\View */
/* @var $content string */

use \yii\helpers\Html;
use \yii\helpers\Url;
use \yii\helpers\ArrayHelper;
use app\assets\AppAsset;
use app\widgets\Notify;

AppAsset::register($this);

if (Yii::$app->user->isGuest) {
    Yii::$app->response->redirect(['login']);
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title ?? Yii::$app->params['title']) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

    <?= Notify::widget() ?>

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain '>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php if (!Yii::$app->user->isGuest): ?>

                <nav class="navbar header-navbar pcoded-header">
                    <div class="navbar-wrapper">

                        <div class="navbar-logo">
                            <a class="mobile-menu" id="mobile-collapse" href="#!">
                                <i class="feather icon-menu"></i>
                            </a>
                            <a href="/" title="E24 CRM" class="d-flex justify-content-center align-items-center">
                                <img class="img-fluid" src="/favicon-32x32.png" alt="Theme-Logo">&nbsp; &nbsp;<h5>E24 CRM</h5>
                            </a>
                            <a class="mobile-options">
                                <i class="feather icon-more-horizontal"></i>
                            </a>
                        </div>
                        <div class="navbar-container container-fluid">
                            <ul class="nav-left">
<?php /*
                                <li class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                        </div>
                                    </div>
                                </li>
*/ ?>
                                <li>
                                    <a href="#!" onclick="javascript:toggleFullScreen()">
                                        <i class="feather icon-maximize full-screen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-right">
<?php /*
                                <li class="header-notification">
                                    <div class="dropdown-primary dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="feather icon-bell"></i>
                                            <span class="badge bg-c-pink">5</span>
                                        </div>
                                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                            <li>
                                                <h6>Notifications</h6>
                                                <label class="label label-danger">New</label>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <img class="d-flex align-self-center img-radius" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="notification-user">John Doe</h5>
                                                        <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                        <span class="notification-time">30 minutes ago</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <img class="d-flex align-self-center img-radius" src="..\files\assets\images\avatar-3.jpg" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="notification-user">Joseph William</h5>
                                                        <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                        <span class="notification-time">30 minutes ago</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <img class="d-flex align-self-center img-radius" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="notification-user">Sara Soudein</h5>
                                                        <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                        <span class="notification-time">30 minutes ago</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="header-notification">
                                    <div class="dropdown-primary dropdown">
                                        <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                            <i class="feather icon-message-square"></i>
                                            <span class="badge bg-c-green">3</span>
                                        </div>
                                    </div>
                                </li>
*/ ?>
                                <li class="user-profile header-notification">
                                    <div class="dropdown-primary dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                            <img src="/favicon-32x32.png" class="img-radius" alt="User-Profile-Image">
                                            <span><?= Yii::$app->user->identity->getFullName() ?></span>
                                            <i class="feather icon-chevron-down"></i>
                                        </div>
                                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                            <li>
                                                <a href="<?= Url::to(['employee/view', 'id' => Yii::$app->user->id]) ?>" title="Профиль">
                                                    <i class="feather icon-user"></i> Профиль
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= Url::toRoute('/logout') ?>" title="Выход"><i class="feather icon-log-out"></i> Выход</a>
                                            </li>
                                        </ul>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            <?php endif ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Навигация</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class=" ">
                                    <a href="<?= Url::to(['/'])?>" title="Рабочий стол">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Рабочий стол</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="index-1.htm">
                                                <span class="pcoded-mtext">Default</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="dashboard-crm.htm">
                                                <span class="pcoded-mtext">CRM</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="dashboard-analytics.htm">
                                                <span class="pcoded-mtext">Analytics</span>
                                                <span class="pcoded-badge label label-info ">NEW</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu active--- pcoded-trigger---">
                                    <a href="javascript:void(0)"
                                        title="Моя компания"
                                        class="tooltip-effect-2"
                                        data-toggle="tooltip"
                                        data-placement="right"
                                    >
                                        <span class="pcoded-micon"><i class="feather icon-activity"></i></span>
                                        <span class="pcoded-mtext">Моя компания</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="active---">
                                            <a href="<?= Url::to(['employee/index']) ?>"
                                                title="Сотрудники"
                                                data-toggle="tooltip"
                                                data-placement="right"
                                            >
                                                <span class="pcoded-mtext">Сотрудники</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="">
                                    <a href="<?= Url::to(['partner/index']) ?>"
                                        title="Контрагенты"
                                        data-toggle="tooltip"
                                        data-placement="right"
                                    >
                                        <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                        <span class="pcoded-mtext">Контрагенты</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="<?= Url::to(['sale/index']) ?>"
                                        title="Продажи"
                                        data-toggle="tooltip"
                                        data-placement="right"
                                    >
                                        <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                                        <span class="pcoded-mtext">Продажи</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="<?= Url::to(['task/index']) ?>"
                                        title="Продажи"
                                        data-toggle="tooltip"
                                        data-placement="right"
                                    >
                                        <span class="pcoded-micon"><i class="feather icon-check-circle"></i></span>
                                        <span class="pcoded-mtext">Задачи</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= Url::to(['report/index']) ?>"
                                        title="Отчеты"
                                        data-toggle="tooltip"
                                        data-placement="right"
                                    >
                                        <span class="pcoded-micon"><i class="feather icon-file-plus"></i></span>
                                        <span class="pcoded-mtext">Отчеты</span>
                                    </a>
                                </li>
<?php /*
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Page layouts</span>
                                        <span class="pcoded-badge label label-warning">NEW</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" pcoded-hasmenu">
                                            <a href="javascript:void(0)">
                                                <span class="pcoded-mtext">Vertical</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class=" ">
                                                    <a href="menu-static.htm">
                                                        <span class="pcoded-mtext">Static Layout</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="menu-header-fixed.htm">
                                                        <span class="pcoded-mtext">Header Fixed</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="menu-compact.htm">
                                                        <span class="pcoded-mtext">Compact</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="menu-sidebar.htm">
                                                        <span class="pcoded-mtext">Sidebar Fixed</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class=" pcoded-hasmenu">
                                            <a href="javascript:void(0)">
                                                <span class="pcoded-mtext">Horizontal</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class=" ">
                                                    <a href="menu-horizontal-static.htm" target="_blank">
                                                        <span class="pcoded-mtext">Static Layout</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="menu-horizontal-fixed.htm" target="_blank">
                                                        <span class="pcoded-mtext">Fixed layout</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="menu-horizontal-icon.htm" target="_blank">
                                                        <span class="pcoded-mtext">Static With Icon</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="menu-horizontal-icon-fixed.htm" target="_blank">
                                                        <span class="pcoded-mtext">Fixed With Icon</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-bottom.htm">
                                                <span class="pcoded-mtext">Bottom Menu</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="box-layout.htm" target="_blank">
                                                <span class="pcoded-mtext">Box Layout</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-rtl.htm" target="_blank">
                                                <span class="pcoded-mtext">RTL</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="navbar-light.htm">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Navigation</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Widget</span>
                                        <span class="pcoded-badge label label-danger">100+</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="widget-statistic.htm">
                                                <span class="pcoded-mtext">Statistic</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="widget-data.htm">
                                                <span class="pcoded-mtext">Data</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="widget-chart.htm">
                                                <span class="pcoded-mtext">Chart Widget</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
*/ ?>
                            </ul>
                        </div>
                    </nav>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4><?= $this->title ?></h4>

                                                        <?php if (ArrayHelper::keyExists('subtitle', $this->params)): ?>

                                                            <span><?= $this->params['subtitle'] ?></span>

                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">

                                                <?php if (ArrayHelper::keyExists('breadcrumbs', $this->params)): ?>

                                                    <div class="page-header-breadcrumb">
                                                        <ul class="breadcrumb-title">

                                                            <li class="breadcrumb-item">
                                                                <a href="/" title="На главную"><i class="feather icon-home"></i></a>
                                                            </li>

                                                            <?php foreach($this->params['breadcrumbs'] as $item): ?>

                                                                <?php
                                                                    if (!is_array($item)) {
                                                                        $item = ['label' => $item];
                                                                    }

                                                                    $item['label'] = Html::encode($item['label']);
                                                                ?>

                                                                <li class="breadcrumb-item">

                                                                    <?php if (ArrayHelper::keyExists('url', $item)): ?>

                                                                        <a href="<?= Url::to($item['url']) ?>" title="<?= $item['label'] ?>"><?= $item['label'] ?></a>

                                                                    <?php else: ?>

                                                                        <?= $item['label'] ?>

                                                                    <?php endif ?>

                                                                </li>

                                                            <?php endforeach ?>

                                                        </ul>
                                                    </div>

                                                <?php endif ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">

                                        <?= $content; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
