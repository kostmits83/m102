<?php
use yii\helpers\Html;
?>
<div class="language-picker">
	<?= Html::beginForm([''], 'post', ['id' => 'formLang', 'class' => 'lang-picker']) ?>
	    <ul class="language-picker__items list-inline">

	        <li class="language-picker__item"><label class="language-picker__label"><?= Html::img('@commonImages/english-flag.png', ['alt' => 'En', 'class' => 'img-responsive']); ?> <input type="radio" name="lang" value="en" class="language-picker__input" /></label></li>
	        <li class="language-picker__item"><label class="language-picker__label"><?= Html::img('@commonImages/greek-flag.png', ['alt' => 'En', 'class' => 'img-responsive']); ?> <input type="radio" name="lang" value="el" class="language-picker__input" /></label></li>
	    </ul>
	<?= Html::endForm() ?>
</div>