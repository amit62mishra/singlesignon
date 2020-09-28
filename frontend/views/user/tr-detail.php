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
  <h1>Your Charge Assumption Details</h3> 
</section>
 
<section class="content">
   <div class="box-footer box-danger">
   
    <a href="<?=$url = Url::to(['user/transferform']);?>" class="btn btn-sm bg-maroon pull-right">TR-1 Form</a>
   
    <br>


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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($modelRole as $key => $value): ?>
                                        
                                    
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
</div>
 
 
</div>
 
 
  
     
