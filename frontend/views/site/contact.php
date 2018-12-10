<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ContactMessage */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Contact Us');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-message-form">
	<div class="banner banner--light">
    	<p class="banner__header">CONTACT US</p>
		<p class="banner__info">Don't be shy, just send us a message!</p>
    </div>
	<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-7">
				<p>If you really liked this project then don't hesitate to send us a message. We would be glad to hear from you!</p>
			</div>
			<div class="col-sm-12 col-md-5">
				<?php $form = ActiveForm::begin(); ?>
			    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
			    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
			    <div class="form-group">
			        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
			    </div>
			    <?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
	
	<div>
		<div class="container">
			<ul>
                <li><a href="https://www.linkedin.com/in/konstantinos-mitsarakis-a9768350/">Konstantinos Mitsarakis</a></li>
                <li><a href="https://www.linkedin.com/in/charalabos-vairlis/">Charalampos Vairlis</a></li>
                <li><a href="https://www.linkedin.com/">Dan Šilhavý</a></li>
                <li><a href="http://msc.it.teithe.gr/">MSc in Web Intelligence</a></li>
            </ul>
		</div>
	</div>

</div>