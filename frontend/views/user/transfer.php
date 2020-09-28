<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm; 
use yii\helpers\Url;
use yii\web\View;   
use frontend\models\Departments;  
use frontend\models\Districts;     
use frontend\models\Roles;    
  
$Departments =  ArrayHelper::map(Departments::find('dept_id', 'department_name')->orderBy('department_name')->all(), 'dept_id', 'department_name'); 
$Districts =  ArrayHelper::map(Districts::find('district_id', 'district_name')->orderBy('district_name')->all(), 'district_id', 'district_name');

$Roles =  ArrayHelper::map(Roles::find('role_id', 'role_name')->orderBy('role_name')->all(), 'role_id', 'role_name');

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

<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
 /* display: inline-block;*/
}

.dropdown-content {
  /*display: none;*/
  position: absolute;
  background-color: #f6f6f6;
  min-width: 524px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1; 
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

#suggesstion-box{
    margin-left: 10px;
    padding-top: -10px;
    margin-top: -10px;
}
.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<div class="container">
	<h1>Charge Assumption - TR1 Form </h1>
	<!-- <div class="box-footer box-danger"><a href="<?=$url = Url::to(['user/transfer']);?>" class="btn btn-sm bg-maroon pull-right">Details</a></div> -->
	<section class="content">

		<div class="application-index box-footer box-danger">
			
	    <?php $form = ActiveForm::begin( [
            'enableClientValidation'=> true,
            'validateOnBlur'=>true,
            'validateOnType'=>true,
            'validationDelay'=> 1500, 
        ]); ?> 
        <div class="row">
           <div class="col-md-6">
             <?= $form->field($modelRole, 'charge')->dropDownList(['Primary'=>'Primary','Additional'=>'Additional'], 
                                ['prompt' => 'Select', 'class' => 'form-control'])->label('Type of Charge') ?>
            </div>
            <div class="col-md-6 hide" id="email">
             <?= $form->field($user, 'email_id')->textInput(['maxlength' => true,'class'=>' form-control','value'=>''])->label('Email') ?>
            </div>
           
        </div>
         
	    	  <div class="row old_div">
          <div class="col-md-6">
               <?= $form->field($modelRole, 'old_role')->dropDownList($Roles, 
                                ['prompt' => 'Select', 'class' => 'form-control','value'=>''])->label('Present Designation') ?>
          </div>
          <div class="col-md-6">
                <?= $form->field($modelRole, 'old_dept')->dropDownList($Departments, 
                                ['prompt' => 'Select', 'class' => 'form-control' ,'value'=>''])->label('Present Department Name') ?>
          </div> 
        </div>

        <div class="row">
           <div class="col-md-6">
                <?= $form->field($modelRole, 'notification_no')->textInput(['maxlength' => true,'class'=>' form-control','value'=>''])->label('Notification Number') ?>
            </div>
             <div class="col-md-6">
                <?= $form->field($modelRole, 'notification_date')->textInput(['maxlength' => true,'class'=>'datepicker form-control','value'=>''])->label('Notification Date') ?>
            </div>
         </div>

        <div class="row">
          <div class="col-md-6">
               <?= $form->field($modelRole, 'role_id')->dropDownList($Roles, 
                                ['prompt' => 'Select', 'class' => 'form-control','value'=>''])->label('New Designation') ?>
          </div>
          <div class="col-md-6">
                <?= $form->field($modelRole, 'department_id')->dropDownList($Departments, 
                                ['prompt' => 'Select', 'class' => 'form-control','value'=>''])->label('New Department Name') ?>
          </div> 
        </div>

	    	<div class="row"> 
          <div class="col-md-6">
             <?= $form->field($modelRole, 'date_of_joining')->textInput(['maxlength' => true,'class'=>'datepicker form-control','value'=>''])->label('Date of Joining') ?> 
          </div>
          <div class="col-md-6">
                <?= $form->field($modelRole, 'time_of_joining')->textInput(['maxlength' => true,'class'=>'timepicker form-control','value'=>'10:00'])->label('Time of Joining') ?>
            </div>
	    	</div>	
 

	        <div class="form-group">
	            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary center','align'=>'center']) ?>
	        </div>
	    <?php ActiveForm::end(); ?>

	</div><!-- application-index -->
	</section>
	
</div>
<br> 
<div class="container">
  <section class="content">
     <div class="application-index box-footer box-danger">
         <table class="table table-bordered" style="">
                
                <thead>
                    <tr style="">
                        <th>S.NO</th> 
                        <th>Designation</th> 
                        <th>Department</th>   
                        <th>Joining date</th>
                        <th>Charge</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($allRoles as $key => $value): ?>
                    
                
                <tbody>
                   <td><?=$key+1?></td> 
                   <td><?=$value->role->role_name?></td> 
                   <td><?=$value->department->department_name?></td>  
                   <td><?=$value->date_of_joining?></td> 
                   <td><?=$value->charge?></td> 
                   <td><a href="<?= Url::toRoute(['user/charge-delete','id'=>$value->map_id])?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this charge?');" ><i class="fa fa-times" aria-hidden="true" ></i></a></td> 
                </tbody>

                <?php endforeach ?>
            </table>
      </div> 
  </section>
</div>

<script type="text/javascript">
	function selectapplication(val,username) { 
 			$("#suggesstion-box").css("display","none"); 
        	$('#ordersystem-applicant_name').val(username);
        jQuery.get('<?= Url::toRoute('/application/get-applicant') ?>', { 
                id: val } )
                .done(function( data ) {
                        jQuery( "#search_applicant" ).html( data );
                        jQuery('#myModal').modal('show'); 
                    }
                );  

    }	

</script>

<script type="text/javascript">
	
	jQuery(document).ready(function(){ 

    jQuery("#userrolemapping-charge").change(function(){ 
        Req_id = jQuery(this).val()
        if(Req_id == 'Additional') { 
          jQuery('#email').removeClass('hide'); 
          jQuery('.old_div').hide();

        } else {
          jQuery('.old_div').show();
          jQuery('#email').addClass('hide'); 
        }
    });    

    jQuery("#ordersystem-applicant_name").keyup(function(){ 
       	 
        
        jQuery.get('<?= Url::toRoute('/application/get-applicant-search') ?>', { 
                name: jQuery(this).val() } )
                .done(function( data ) {
                	//alert(data);
                        $("#suggesstion-box").show();
						$("#myDropdown").html(data);
						$("#search-box").css("background","#FFF"); 
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

    $(document).on("click", "#upload", function() {
		  var file_data = $("#applicationdocument-document").prop("files")[0]; 
		  var name = $("#applicationdocument-name").val(); 
		  var token = $("#form-token").val(); 
		  $("#img-loader").removeClass("hide");
		  $("#msg").html(''); 
		  $("#applicationdocument-document").addClass("hide");
		  // Getting the properties of file from file field
		  var form_data = new FormData(); // Creating object of FormData class
		  form_data.append("file", file_data) // Appending parameter named file with properties of file_field to form_data 
		  form_data.append("name",name) // Adding extra parameters to form_data
		  
		  request = $.ajax({
		    url: "index.php?r=application/ajaxupload", // Upload Script
		    dataType: 'script',
		    cache: false,
		    contentType: false,
		    processData: false,
		    data: form_data, // Setting the data attribute of ajax with file_data
		    type: 'post',
		    headers: {  'X-CSRF-Token': token },
		     
		  });
		  request.done(function(data) {
		  	 	data= JSON.parse(data);
		  	 	if(data.status==200){
		  	 	 $('#myTable tr:last').after(data.msg);
		  		 $('#document-list').removeClass('hide');
		  		 $("#applicationdocument-document").val('');
		  		 $("#applicationdocument-name").val('');
		  		 $("#img-loader").addClass("hide");
		  		 $("#applicationdocument-document").removeClass("hide");
		  	 	} else{
		  	 	 $("#img-loader").addClass("hide");
		  		 $("#applicationdocument-document").removeClass("hide");	
		  		 $("#msg").html(data.msg); 
		  		 $("#applicationdocument-document").val('')
		  		 $("#applicationdocument-name").val('')

		  		 }
            });
		  	 	
 
		});
 
});

</script>
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
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
<style> 

#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
 <script src="swcs/js/my.js"></script> 
 <script src="swcs/js/yii.activeForm.js"></script> 

 