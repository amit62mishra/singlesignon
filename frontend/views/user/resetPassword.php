<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset; 
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Change password';
 
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
     .required:before {
    content:" *";
    color: red;
  }
  .form-group {
    margin: 10px !important;
  }
  .padding{
    padding: 5px 0 !important;
  }
  .custom_radio_checkbox {
    margin: 0 20px;
  }
</style>
<style type="text/css">
    .control-label{
        color: black;
    }
</style>

 
<div class="container">
    <h1>Change Password</h1>
     
    <section>

        <div class="application-index box-footer box-danger col-lg-6">
            
       <?php $form = ActiveForm::begin(['id' => 'reset-password-form',
                                         'options' => ['class' => 'form-horizontal'],
                                          'enableClientValidation'=> true,
                                          'enableAjaxValidation'=> false,
                                          'validateOnSubmit' => true,
                                          'validateOnChange' => true,
                                          'validateOnType' => true,

   ]); ?>
            <div class="row">
                <div class="col-lg-12">
                        <?= $form->field($model, 'old_password')->passwordInput(['maxlength' => true, 'autofocus' => true]) ?>
                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
                        <div class="form-group text-center">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary submit']) ?>
                        </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>

    </div><!-- application-index -->
    </section>
    
</div>
 
 <script src="swcs/js/sha1-min.js"></script>
 <script type="text/javascript">
$(document).ready(function (){
     
    $("form").submit(function(){
 
        var old_password = $("#resetpasswordform-old_password").val();
        var password = $("#resetpasswordform-password").val();
        var password_repeat = $("#resetpasswordform-password_repeat").val(); 

        $("#resetpasswordform-old_password").val(hex_sha1(old_password));
        
        $("#resetpasswordform-password").val(hex_sha1(password));
        $("#resetpasswordform-password_repeat").val(hex_sha1(password_repeat));
        $(":submit").attr("disabled",true)
    });
});

</script>

