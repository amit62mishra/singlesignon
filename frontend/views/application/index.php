<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ordersystem */
/* @var $form ActiveForm */
?>
<div class="application-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'type_of_request') ?>
        <?= $form->field($model, 'received_through') ?>
        <?= $form->field($model, 'concerned_department') ?>
        <?= $form->field($model, 'subject') ?>
        <?= $form->field($model, 'applicant_name') ?>
        <?= $form->field($model, 'mobile_number') ?>
        <?= $form->field($model, 'constituency_detail_from') ?>
        <?= $form->field($model, 'constituency_detail_to') ?>
        <?= $form->field($model, 'issued_by') ?>
        <?= $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'is_active') ?>
        <?= $form->field($model, 'is_deleted') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- application-index -->
