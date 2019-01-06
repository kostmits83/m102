<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use common\helpers\VariousHelper;
?>
<div class="content-wrapper">
    <section class="content">
        <?php //Alert::widget(); ?>
        <?php VariousHelper::htmlGrowlMessages(); ?>
        <?= $content ?>
    </section>
</div>
<footer class="main-footer">
    <div class="copyright-wrapper">
        <p class="text-center">Coypright &copy; <?= date('Y').' '.Yii::$app->name; ?>. All rights reserved.</p>
    </div>
    <a id="scroll" class="btn" href="#top"><i class="fa fa-chevron-up"></i></a>
</footer>