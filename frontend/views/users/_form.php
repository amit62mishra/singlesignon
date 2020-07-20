<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\District;
use common\models\Roles;


/* @var $this yii\web\View */
/* @var $model common\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
    form div.required label.control-label:after {
      content:" * ";
      color:red;
    }
</style>
<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
          <?= $form->field($model, 'user_full_name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-xs-12 col-sm-6">
           <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    <div class="row">
     <div class="col-xs-12 col-sm-6">
         <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
     </div>
     <div class="col-xs-12 col-sm-6">
       <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'value'=>'']) ?>
     </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
           <?= $form->field($model, 'district_id')->hiddenInput(["value"=>6])->label(false);?>
           <?= $form->field($model, 'mobile_number')->textInput() ?>
      </div>
    </div>
    <div class="row">
     
      <?php
        if(Yii::$app->utility->isAdmin() ||  Yii::$app->utility->isSuperAdmin()){
          ?>
          <div class="col-xs-12 col-sm-6">
            <?= $form->field($model, 'role_id')->dropDownList(
                ArrayHelper::map(Roles::find()->where(['is_active'=>'Y'])->andWhere(["is_deleted"=>'N'])->all(), 'role_id', 'role_name'),['prompt' => '-- Select Role --'])
            ?>
          </div>
          <div class="col-xs-12 col-sm-6">
            <?= $form->field($model, 'is_active')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>
          </div>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
