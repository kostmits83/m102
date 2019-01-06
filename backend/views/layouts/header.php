<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header admin-navbar">
    <?= Html::a('<span class="logo-mini">' . Yii::$app->name . '</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo main-header__logo']) ?>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <span class="admin-navbar__ip">Your IP Address: <?= Yii::$app->request->userIp ?></span>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle user-menu__title" data-toggle="dropdown">
                        <?= Html::img('@commonImages/user.png', ['alt' => 'Admin', 'class' => 'user-image img-responsive pull-left']); ?>
                        <span class="hidden-xs"><?= Yii::$app->session['name']; ?></span>
                    </a>
                    <ul class="dropdown-menu user-menu-dropdown">
                        <!-- User image -->
                        <li class="user-header user-menu-dropdown__header">
                            <?= Html::img('@commonImages/user.png', ['alt' => 'Admin', 'class' => 'user-image img-responsive']); ?>
                            <p class="text-center"><?= Yii::$app->session['name']; ?></p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer user-menu-dropdown__footer">
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out <i class="fa fa-sign-out"></i>',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn logout button button--attention button--logout']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
