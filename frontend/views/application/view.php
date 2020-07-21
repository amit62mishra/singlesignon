<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url; 
use frontend\models\UserRoles;
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
	    			 
	    			  <?= $form->field($model, 'type_of_request')->dropDownList([''=>'Select Request Type','transfer_adjustment' => 'Transfer/ Adjustment','development_work' => 'Development Work','financial_assistance' => 'Financial Assistance','complaint_inquiry'=>'Complaint/ Inquiry','other'=>'Others'],['readonly'=>true]) ?>
	    		  
	    	    </div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'received_through')->dropDownList([''=>'Select ','letter' => 'Letter','do_letter' => 'DO Letter','email' => 'Email','others'=>'Others'],['readonly'=>true]) ?>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'concerned_department')->textInput(['maxlength' => true,'readonly'=>true]) ?>
	    		</div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'subject')->textInput(['maxlength' => true,'readonly'=>true]) ?> 
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'applicant_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>
	    		</div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => true,'readonly'=>true])  ?>
	    		</div>
	    		
	    	</div>

	    	<div class="row">
	    		<div class="col-md-6">	
	    			 <?= $form->field($model, 'constituency_detail_from')->dropDownList([''=>'Select ','Constituency from 1' => 'Constituency from 1','Constituency from 2' => 'Constituency from 2','Constituency from 3' => 'Constituency from 3','Constituency from 4'=>'Constituency from 4'],['readonly'=>true]) ?>   
	    		</div>
	    		<div class="col-md-6">	
	    			  <?= $form->field($model, 'constituency_detail_to')->dropDownList([''=>'Select ','Constituency TO 1' => 'Constituency TO 1','Constituency TO 2' => 'Constituency TO 2','Constituency TO 3' => 'Constituency TO 3','Constituency TO 4'=>'Constituency TO 4'],['readonly'=>true]) ?>   
	    		</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-md-6">
	    			<?= $form->field($model, 'letter_date')->textInput(['maxlength' => true,'class'=>'datepicker form-control','readonly'=>true])  ?> 
	    		</div>
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'remark')->textarea(['rows' => '3','readonly'=>true]) ?>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-6">
	    			  <?= $form->field($model, 'issued_by')->dropDownList([''=>'Select ','Self-Request' => 'Self-Request','XYZ' => 'XYZ','VIP' => 'VIP','Others'=>'Others'],['readonly'=>true]) ?>   
	    		</div>
				<div class="col-md-6">
					<?php if($model->document !='' && $model->document != null) { ?>
						<br>
						<br>
						<label>Download Document</label>
					   <a href="<?=$model->document?>" class="btn btn-sm btn-primary" download><i class="fa fa-download" aria-hidden="true" ></i></a>
					<?php } ?>
				</div>	    		
	    	</div>
	    <!-- 
	        <div class="form-group">
	            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	        </div> -->
	    <?php ActiveForm::end(); ?>

	</div><!-- application-index -->
</section>
	<section class="content-header">
    <h1>Process History</h3> <br>
   </section>
	<section>
		<div class="divTable col-md-12">
			<div class="box-footer"> 
             <table class="table table-bordered" style="">
                    
                    <thead>
                        <tr style="">
                            <th>S.NO</th> 
                            <th>Pending With</th> 
                            <th>Date</th>   
                            <th>Comment</th>  
                            <th>Processed</th>  
                        </tr>
                    </thead>
                    <?php foreach ($history as $key => $value): ?>
                        
                    
                    <tbody>
                       <td><?=$key+1?></td> 
                       <td><span style="color:green"><?=$value->roleName->role_name?></span></td> 
                       <td><?=$value->created_on?></td> 
                       <td><?=$value->comment?></td>  
                       <td><?php if($value->comment==null) echo "NO"; else echo "YES";?></td>  
                    </tbody>

                    <?php endforeach ?>
             </table>
             </div>   
        </div> 

	  
	</section>
	</section>
	<section class="content-header">
    <h1>.</h3> <br>
   </section>
<?php 
$checkRole = UserRoles::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one();
if(!empty($checkWithMe) && $checkRole->role_id != 1) { ?>  
<section class="content-header">
  <h1>Department use Only</h3> <br>
</section>
	<section>

		<div class="application-index box-footer box-danger">
			
	    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	    	  
	    	<div class="row">
	    		 
				<div class="col-md-12">
	    			  <?= $form->field($forwardLevel, 'comment')->textarea(['rows' => '3']) ?>
	    		</div>	    		
	    	</div>
	    
	        <div class="form-group " align="center">
	            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	        </div> 
	    <?php ActiveForm::end(); ?>

	</div><!-- application-index -->
	</section>
<?php } ?>	
</div>