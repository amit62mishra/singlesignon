<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm; 
use yii\helpers\Url;
use yii\web\View;  
use frontend\models\TypeOfRequest;;
use frontend\models\ReceivedThrough;;
use frontend\models\IssuedBy;;
use frontend\models\Departments;  
use frontend\models\Districts;   
use frontend\models\Purpose;   
use frontend\models\ApplicationDocument;   

$documentsObj = new ApplicationDocument();

if (!empty($model->id)) {
	$documents = $documentsObj->getDocuments(['application_id'=>$model->id]);
	if (empty($documents)) {
		$dcouments = [new ApplicationDocument()];
	}
} else {
	$documents = [new ApplicationDocument()];
}
 
$TypeOfRequest =  ArrayHelper::map(TypeOfRequest::find('id', 'name')->orderBy('name')->all(), 'id', 'name');
$ReceivedThrough =  ArrayHelper::map(ReceivedThrough::find('id', 'name')->orderBy('name')->all(), 'id', 'name');
$IssuedBy =  ArrayHelper::map(IssuedBy::find('id', 'name')->orderBy('name')->all(), 'id', 'name'); 
$Departments =  ArrayHelper::map(Departments::find('dept_id', 'department_name')->orderBy('department_name')->all(), 'dept_id', 'department_name'); 
$Districts =  ArrayHelper::map(Districts::find('district_id', 'district_name')->orderBy('district_name')->all(), 'district_id', 'district_name');
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
	<h1>Application Form for Order </h1>
	<div class="box-footer box-danger"><a href="<?=$url = Url::to(['application/index']);?>" class="btn btn-sm bg-maroon pull-right">Application List </a></div>
	<section>

		<div class="application-index box-footer box-danger">
			
	    <?php $form = ActiveForm::begin( [
            'enableClientValidation'=> true,
            'validateOnBlur'=>false,
            'validateOnType'=>true,
            'validationDelay'=> 1500, 
        ]); ?>
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
	    			  <?= $form->field($model, 'purpose')->dropDownList([''=>'Select Type Of Request First']) ?>    
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
	    			  <?= $form->field($model, 'remark')->textarea(['rows' => '4']) ?>
	    		</div>
				 	    		
	    	</div>
	    	<br>

	    	<div class="row">
	    		<div class="col-md-12">
	    			<table class="table table-bordered table-striped table-condensed dform" data-value="<?= count($documents) - 1; ?>" data-remove="0">
			                <thead>
			                    <tr class="bg_gray"> 
			                        <th>&nbsp; </th> 
			                        <th>Name: <span class="text-danger">*</span></th>
			                        <th>Upload Document :<span class="text-danger">*</span></th> 
			                        
			                    </tr>
			                </thead>
			                <tbody>
			                <?php
	    			$countdocument = count($documents);
	    			 foreach ($documents as $s => $document): ?>

			                    <tr id="formTemplate">  
			                        <td class="links">
			                            <?php 
				                            if(($countdocument - 1) == $s)
				                            {
				                            ?>
				                            <a href="javascript:void(0);" class="addButton"><i class="fa fa-plus"></i>  &nbsp;&nbsp;</a>
				                            <?php
				                            }
				                            ?>
			                            <a href="javascript:void(0);"> <i class="fa fa-times"></i> </a> 
			                        </td> 
			                        <td>
			                            <?= $form->field($document, '['. $s .']name[]')->textInput(['value' => $document->name, 'data-validate' => 'string'])->label(false); ?>
			                        </td>  
			                        <td>
			                            <?= $form->field($document, '['. $s .']document[]')->fileInput(['value' => $document->document, 'data-validate' => 'string', 'maxlength' => true,"accept"=>"image/x-png,image/gif,image/jpeg"])->label(false); ?>
			                        </td>
			                         
			                         
			                    </tr>
			                    <?php endforeach; ?>	
			                </tbody>
	    				</table>
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

	jQuery("#ordersystem-applicant_name").change(function(){ 
       	 
        
        jQuery.get('<?= Url::toRoute('/application/get-applicant') ?>', { 
                name: jQuery(this).val() } )
                .done(function( data ) {
                        jQuery( "#search_applicant" ).html( data );
                        jQuery('#myModal').modal('show'); 
                    }
                );  

    });	
     
    jQuery("#ordersystem-type_of_request").change(function(){ 
       	Req_id = jQuery(this).val()
       	if(Req_id != 3) {
       		 
       		jQuery('.field-ordersystem-constituency_detail_to').hide();

       	} else {
       		jQuery('.field-ordersystem-constituency_detail_to').show();
       	}
        
        jQuery.get('<?= Url::toRoute('/application/get-purpose') ?>', { 
                id: Req_id } )
                .done(function( data ) {
                        jQuery( "#ordersystem-purpose" ).html( data ); 
                    }
                );  

    });

    jQuery("#ordersystem-purpose").change(function(){ 
       jQuery.get('<?= Url::toRoute('/application/constituency-from') ?>', { 
                id: jQuery( "#ordersystem-type_of_request" ).val() } )
                .done(function( data ) {
                        jQuery( "#ordersystem-constituency_detail_from" ).html( data ); 
                    }
                ); 
                
    });

    jQuery("#ordersystem-constituency_detail_from").change(function(){ 
        
         jQuery.get('<?= Url::toRoute('/application/constituency-to') ?>', { 
                id: jQuery( "#ordersystem-type_of_request" ).val() } )
                .done(function( data2 ) {
                        jQuery( "#ordersystem-constituency_detail_to" ).html( data2 ); 
                    }
                );        
    });
});

</script>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Matching Applications</h4>
      </div>
      <div class="modal-body" id ='search_applicant'>
                

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 <script src="swcs/js/my.js"></script> 
 <script src="swcs/js/yii.activeForm.js"></script> 

 