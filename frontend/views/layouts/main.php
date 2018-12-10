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
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
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

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p class="header-3">MSc in Web Intelligence</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam nobis necessitatibus, neque dolor distinctio totam.</p>
            </div>
            <div class="col-md-4">
                <p class="header-3">Team</p>
                <ul>
                    <li><a href="https://www.linkedin.com/in/konstantinos-mitsarakis-a9768350/">Konstantinos Mitsarakis</a></li>
                    <li><a href="https://www.linkedin.com/in/charalabos-vairlis/">Charalampos Vairlis</a></li>
                    <li><a href="https://www.linkedin.com/">Dan Šilhavý</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="header-3">More Links</p>
                <ul>
                    <li><a href="https://www.teithe.gr/">ATEI Thessalonikis</a></li>
                    <li><a href="https://www.it.teithe.gr/">Department of Informatics</a></li>
                    <li><a href="http://msc.it.teithe.gr/">MSc in Web Intelligence</a></li>
                </ul>
            </div>
        </div>
        <p class="copyright">&copy; <?= Html::encode(Yii::$app->name) ?>, Software Engineering of Web Applications, <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
