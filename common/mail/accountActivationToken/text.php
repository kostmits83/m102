<?php

/* @var $this yii\web\View */
/* @var $model common\models\ContactMessage */

$accountActivationLink = Yii::$app->urlManager->createAbsoluteUrl(['site/activate-account', 'token' => $user->account_activation_token]);

?>
Hello,
To activate your account please click at the following link: <?= $accountActivationLink ?>.

