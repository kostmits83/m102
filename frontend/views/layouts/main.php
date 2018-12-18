<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name); ?></title>
    <?php $this->head() ?>
</head>
<body id="body">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top main-header',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/'], 'options' => ['class' => 'main-header__item'], 'linkOptions' => ['class' => 'main-header__link link link--state-1',],],
        ['label' => 'About', 'url' => ['/site/about'], 'options' => ['class' => 'main-header__item'], 'linkOptions' => ['class' => 'main-header__link link link--state-1',],],
        ['label' => 'Contact', 'url' => ['/site/contact'], 'options' => ['class' => 'main-header__item'], 'linkOptions' => ['class' => 'main-header__link link link--state-1',],],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login'], 'options' => ['class' => 'main-header__item'], 'linkOptions' => ['class' => 'main-header__link link link--state-1',],];
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup'], 'options' => ['class' => 'main-header__item'], 'linkOptions' => ['class' => 'main-header__link link link--state-1',],];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <section class="main-content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="page-footer">
    <div class="container page-footer__top">
        <div class="row">
            <div class="col-md-4 page-footer__group">
                <p class="page-footer__header header-3">MSc in Web Intelligence</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam nobis necessitatibus, neque dolor distinctio totam.</p>
            </div>
            <div class="col-md-4 page-footer__group">
                <p class="page-footer__header header-3">Team Members</p>
                <ul class="page-footer__menu menu">
                    <li class="menu__item">
                        <a class="menu__link js-external" href="https://www.linkedin.com/in/konstantinos-mitsarakis-a9768350/"><span class="link link--state-1">Konstantinos Mitsarakis</span></a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link js-external" href="https://www.linkedin.com/in/charalabos-vairlis/"><span class="link link--state-1">Charalampos Vairlis</span></a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link js-external" href="https://www.linkedin.com/"><span class="link link--state-1">Dan Šilhavý</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 page-footer__group">
                <p class="page-footer__header header-3">More Links</p>
                <ul class="page-footer__menu menu">
                    <li class="menu__item">
                        <a class="menu__link js-external" href="https://www.teithe.gr/"><span class="link link--state-1">ATEI Thessalonikis</span></a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link js-external" href="https://www.it.teithe.gr/"><span class="link link--state-1">Department of Informatics</span></a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link js-external" href="http://msc.it.teithe.gr/"><span class="link link--state-1">MSc in Web Intelligence</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-footer__bottom">
        <p class="page-footer__copyright">&copy; <?= Html::encode(Yii::$app->name) ?>, Mitsarakis, Vairlis, Šilhavý, <?= date('Y') ?></p>
    </div>
    <a class="scroll-to-top" href="#top"><span class="scroll-to-top__icon"><i class="fa fa-chevron-up"></i></span></a>
</footer>

<?php $this->registerJsFile('@commonJs/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
