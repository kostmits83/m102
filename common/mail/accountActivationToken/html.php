<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AccountActivation */

?>
<div class="account-activation">
	<p>Hello,</p>
    <p>To activate your account please click at the following link: <?= Yii::$app->urlManager->createAbsoluteUrl(['site/activate-account', 'token' => $user->account_activation_token]); ?>.</p>
</div>
