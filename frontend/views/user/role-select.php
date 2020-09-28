<?php 
  //echo "<pre>"; print_r($data); die;
use yii\helpers\Url; 
use backend\models\EodbServiceQuestionOptions;  
use frontend\models\UserRoles;

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

<section class="content-header">
  <h1>Please Select Role or Designation</h3> 
</section>
 
<section class="content">
   <div class="box-footer box-danger">
   

    <br>
     <div class="divTable col-md-12">
                             <table class="table table-bordered" style="">
                                    
                                    <thead>
                                        <tr style="">
                                            <th>S.NO</th> 
                                            <th>Designation</th> 
                                            <th>Department</th>   
                                            <th>Joining date</th>
                                            <th>Charge</th> 
                                            <th>Select Role</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($data as $key => $value): ?>
                                        
                                    
                                    <tbody>
                                       <td><?=$key+1?></td> 
                                       <td><?=$value->role->role_name?></td> 
                                       <td><?=$value->department->department_name?></td>  
                                       <td><?=$value->date_of_joining?></td> 
                                       <td><?=$value->charge?></td> 
                                       <td><a href="<?= Url::toRoute(['user/roleselected','id'=>$value->role_id])?>" class="btn btn-sm btn-success" ><i class="fa fa-check" aria-hidden="true" ></i></a></td> 
                                    </tbody>

                                    <?php endforeach ?>
                                </table>
                        </div> 
</div>
 
 
</div>
 
 
  
     
