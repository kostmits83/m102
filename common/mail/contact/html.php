<?php

/* @var $this yii\web\View */
/* @var $model common\models\ContactMessage */

?>
<div class="contact-message">
    <p>The following email has been sent by the site Contact Form at <?= date('Y-m-d H:i:s') ?>.</p>
    <p>Name: <?= $model->name; ?></p>
    <p>Email: <?= $model->email; ?></p>
    <div>
    	<p>Subject:</p>
    	<?= $model->message; ?>
    </div>
</div>
