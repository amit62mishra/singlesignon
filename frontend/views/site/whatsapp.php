<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Whatsapp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1>Whatsapp SMS</h1>

    <p>Please fill out the following fields to send sms:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'mobile')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'message') ?>


                <div class="form-group">
                    <?= Html::submitButton('Whatsapp', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            <?= \vintage\lets\talk\widgets\LetsTalk::widget(); ?>
        </div>
    </div>
</div>
