<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ordersystem */
/* @var $form ActiveForm */
?>
<div class="container">
	<h1> Order system</h1>
	<div class="application-index">

	    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'type_of_request')->dropDownList([''=>'Select Request Type','transfer_adjustment' => 'Transfer/ Adjustment','development_work' => 'Development Work','financial_assistance' => 'Financial Assistance','complaint_inquiry'=>'Complaint/ Inquiry','other'=>'Others']) ?>
	    		</div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'received_through')->dropDownList([''=>'Select ','letter' => 'Letter','do_letter' => 'DO Letter','email' => 'Email','others'=>'Others']) ?>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'concerned_department') ?>
	    		</div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'subject') ?>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'applicant_name') ?>
	    		</div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'mobile_number') ?>
	    		</div>
	    		
	    	</div>

	    	<div class="row">
	    		<div class="col-md-6">	
	    			 <?= $form->field($model, 'constituency_detail_from')->dropDownList([''=>'Select ','Constituency from 1' => 'Constituency from 1','Constituency from 2' => 'Constituency from 2','Constituency from 3' => 'Constituency from 3','Constituency from 4'=>'Constituency from 4']) ?>   
	    		</div>
	    		<div class="col-md-6">	
	    			  <?= $form->field($model, 'constituency_detail_to')->dropDownList([''=>'Select ','Constituency TO 1' => 'Constituency TO 1','Constituency TO 2' => 'Constituency TO 2','Constituency TO 3' => 'Constituency TO 3','Constituency TO 4'=>'Constituency TO 4']) ?>   
	    		</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-md-6">
	    			<?= $form->field($model, 'letter_date') ?>
	    		</div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'remark')->textarea(['rows' => '3']) ?>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'issued_by')->dropDownList([''=>'Select ','Self-Request' => 'Self-Request','XYZ' => 'XYZ','VIP' => 'VIP','Others'=>'Others']) ?>   
	    		</div>
				<div class="col-md-6">
					  <?= $form->field($model, 'document')->fileInput(["class"=>"form-control","accept"=>"image/x-png,image/gif,image/jpeg"]) ?>
				</div>	    		
	    	</div>
	    
	        <div class="form-group">
	            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	        </div>
	    <?php ActiveForm::end(); ?>

	</div><!-- application-index -->
</div>