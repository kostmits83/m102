<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ContactMessage */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Contact Us');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-message-form">
	<div class="banner banner--light banner--contact">
    	<p class="banner__header">CONTACT US</p>
		<p class="banner__info">Don't be shy, just send us a message!</p>
    </div>
	<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
	
	<div class="container relative">
		<div class="row">
			<div class="col-sm-12 col-md-5 contact-message">
				<p class="contact-message__text">If you really liked this project then don't hesitate to send us a message. We would be glad to hear from you!</p>
			</div>
			<div class="col-sm-12 col-md-5 col-md-offset-2 contact-form">
				<h1 class="contact-form__header header-2">Contact Form</h1>
				<?php $form = ActiveForm::begin(); ?>
			    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Your Name']) ?>
			    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Your Email']) ?>
			    <?= $form->field($model, 'message')->textarea(['rows' => 6, 'placeholder' => 'Your Message']) ?>
			    <div class="contact-form__button">
			        <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn button--attention button buttons-row__button']) ?>
			    </div>
			    <?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
	
	<div class="contact-info">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-7">
					<ul class="list-unstyled">
		                <li><a class=" js-external" href="https://www.linkedin.com/in/konstantinos-mitsarakis-a9768350/"><span class="contact-info__link link link--state-1">Konstantinos Mitsarakis</span></a></li>
		                <li><a class="js-external" href="https://www.linkedin.com/in/charalabos-vairlis/"><span class="contact-info__link link link--state-1">Charalampos Vairlis</span></a></li>
		                <li><a class="js-external" href="https://www.linkedin.com/"><span class="contact-info__link link link--state-1">Dan Šilhavý</span></a></li>
		                <li><a class="js-external" href="http://msc.it.teithe.gr/"><span class="contact-info__link link link--state-1">MSc in Web Intelligence</span></a></li>
		            </ul>
		        </div>
			</div>
		</div>
	</div>

</div>
