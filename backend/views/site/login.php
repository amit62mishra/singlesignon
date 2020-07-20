<?php 


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm; 
use yii\helpers\Url;
use yii\web\View;
 
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
 

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<div class="row">
			<?php
	        	foreach(Yii::$app->session->getAllFlashes() as $key => $message) {
	                    echo '<font color="red"><div class="alert-message error"><p>' . $message . "</font></p></div>\n";
	                }
	        ?>
	</div>
	<?php $form = ActiveForm::begin(); ?> 
	<div class="row"> 
		 <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	</div>

	<div class="row"> 
		 <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?> 
	</div>

	<div class="row rememberMe"> 
		 <?= $form->field($model, 'rememberMe')->checkBox(['maxlength' => true]) ?> 
	</div>		 

	<div class="row buttons">
		<?= Html::submitButton(Yii::t('app', 'Login'),['class'=>'btn btn-primary']) ?>
	</div>

  <?php ActiveForm::end(); ?>
</div><!-- form -->
