<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url; ;
use frontend\models\TypeOfRequest;;
use frontend\models\ReceivedThrough;;
use frontend\models\IssuedBy;;
use frontend\models\Departments;  
use frontend\models\Districts;  
use yii\helpers\ArrayHelper;   
use yii\web\View;  
 
$TypeOfRequest =  ArrayHelper::map(TypeOfRequest::find('id', 'name')->orderBy('name')->all(), 'id', 'name');
$ReceivedThrough =  ArrayHelper::map(ReceivedThrough::find('id', 'name')->orderBy('name')->all(), 'id', 'name');
$IssuedBy =  ArrayHelper::map(IssuedBy::find('id', 'name')->orderBy('name')->all(), 'id', 'name'); 
$Departments =  ArrayHelper::map(Departments::find('dept_id', 'department_name')->orderBy('department_name')->all(), 'dept_id', 'department_name'); 
$Districts =  ArrayHelper::map(Districts::find('district_id', 'district_name')->orderBy('district_name')->all(), 'district_id', 'district_name');
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
	    			  <?= $form->field($model, 'type_of_request')->dropDownList($TypeOfRequest, 
                                ['prompt' => 'Select', 'class' => 'form-control']) ?>
	    		  
	    	    </div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'received_through')->dropDownList($ReceivedThrough, 
                                ['prompt' => 'Select', 'class' => 'form-control']) ?>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'concerned_department')->dropDownList($Departments, 
                                ['prompt' => 'Select', 'class' => 'form-control']) ?>
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
			    			<?= $form->field($model, 'letter_date')->textInput(['maxlength' => true,'class'=>'datepicker form-control'])  ?> 
			    	</div>
			    	<div class="col-md-6">
			    			<?= $form->field($model, 'district_id')->dropDownList($Districts, 
                                ['prompt' => 'Select', 'class' => 'form-control']) ?>
			    	</div>
	    	</div>	

	    	<div class="row">
	    		<div class="col-md-6">	
	    			 <?= $form->field($model, 'constituency_detail_from')->dropDownList([''=>'Select District First']) ?>   
	    		</div>
	    		<div class="col-md-6">	
	    			  <?= $form->field($model, 'constituency_detail_to')->dropDownList([''=>'Select District First']) ?>   
	    		</div>
	    	</div>

	    	

	    	
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'issued_by')->dropDownList($IssuedBy, 
                                ['prompt' => 'Select', 'class' => 'form-control']) ?>   
	    		</div>
				<div class="col-md-6">
					  <?= $form->field($model, 'document')->fileInput(["class"=>"form-control","accept"=>"image/x-png,image/gif,image/jpeg"]) ?>
				</div>	    		
	    	</div>
	    	
	    	<div class="row">
	    		
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'remark')->textarea(['rows' => '4']) ?>
	    		</div>
	    	</div>

	        <div class="form-group">
	            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary','align'=>'center']) ?>
	        </div>
	    <?php ActiveForm::end(); ?>

	</div><!-- application-index -->
	</section>
	
</div>

<script type="text/javascript">
	
	jQuery(document).ready(function(){ 
     
    jQuery("#ordersystem-district_id").change(function(){ 
       
        jQuery.get('<?= Url::toRoute('/application/constituency-from') ?>', { 
                id: jQuery(this).val() } )
                .done(function( data ) {
                        jQuery( "#ordersystem-constituency_detail_from" ).html( data ); 
                    }
                );
     
    });

    jQuery("#ordersystem-constituency_detail_from").change(function(){ 
        
         jQuery.get('<?= Url::toRoute('/application/constituency-to') ?>', { 
                id: jQuery( "#ordersystem-district_id" ).val() } )
                .done(function( data2 ) {
                        jQuery( "#ordersystem-constituency_detail_to" ).html( data2 ); 
                    }
                );        
    });
});

</script>
 