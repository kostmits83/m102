<?php
use yii\helpers\Html;
use common\models\User;
?>
<aside class="main-sidebar">
    <section class="sidebar sidebar--admin">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="admin-sidebar__avatar">
                <?= HTML::img('/themes/project/images/logo-initials.png', ['class' => 'user-image', 'alt' => 'User Image']); ?>
            </div>
            <div class="admin-sidebar__info">
                <p><?= Yii::$app->session['name']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
            'items' => [
                ['label' => 'Admin Panel', 'options' => ['class' => 'header']],
                [
                    'label' => 'Contact Messages', 'icon' => 'fas fa-angle-left', 'url' => ['/contact-message/'], 'active' => Yii::$app->controller->id == 'contact-message',
                    'template'=> '<a class="" href="{url}">{icon}{label}<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        ['label' => 'View All', 'icon' => 'fas fa-bars', 'url' => ['/contact-message/index'], 'options' => ['class' => ''],],
                        ['label' => 'Create', 'icon' => 'fas fa-plus', 'url' => ['/contact-message/create'], 'options' => ['class' => ''],],
                    ]
                ],
                [
                    'label' => 'Stocks', 'icon' => 'fas fa-angle-left', 'url' => ['/stock/'], 'active' => Yii::$app->controller->id == 'stock',
                    'template'=> '<a class="" href="{url}">{icon}{label}<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        ['label' => 'View All', 'icon' => 'fas fa-bars', 'url' => ['/stock/index'], 'options' => ['class' => ''],],
                        ['label' => 'Create', 'icon' => 'fas fa-plus', 'url' => ['/stock/create'], 'options' => ['class' => ''],],
                    ]
                ],
            ],
        ]); ?>

    </section>
</aside>
