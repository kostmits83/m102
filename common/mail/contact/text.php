<?php

/* @var $this yii\web\View */
/* @var $model common\models\ContactMessage */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Hello <?= $user->username ?>,

Follow the link below to reset your password:

<?= $resetLink ?>


The following email has been sent by the site Contact Form at <?= date('Y-m-d H:i:s') ?>.

Name: <?= $model->name; ?>

Email: <?= $model->email; ?>

Subject:

<?= $model->message; ?>
