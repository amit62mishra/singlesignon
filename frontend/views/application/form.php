<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url; 

/* @var $this yii\web\View */
/* @var $model app\models\ordersystem */
/* @var $form ActiveForm */
?>
<style type="text/css">
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
	<h1>Application Form for Order </h1>
	<div class="box-footer box-danger"><a href="<?=$url = Url::to(['application/index']);?>" class="btn btn-sm bg-maroon pull-right">Application List </a></div>
	<section>

		<div class="application-index box-footer box-danger">
			
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
	    			  <?= $form->field($model, 'concerned_department')->textInput(['maxlength' => true]) ?>
	    		</div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?> 
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'applicant_name')->textInput(['maxlength' => true]) ?>
	    		</div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => true])  ?>
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
	    			<?= $form->field($model, 'letter_date')->textInput(['maxlength' => true,'class'=>'datepicker form-control'])  ?> 
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
	</section>
	
</div>