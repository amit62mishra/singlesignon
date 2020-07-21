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
  <h1>Applications pending with you</h3> 
</section>
 
<section class="content">
   <div class="box-footer box-danger">
    <?php 
    $checkRole = UserRoles::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one();
if($checkRole->role_id == 1) { ?> 
      <a href="<?=$url = Url::to(['application/form']);?>" class="btn btn-sm bg-maroon pull-right">Application Form </a>
<?php } ?>      
    <br>
    <br>
    <div class="box-header with-border"> 
        <div class="ibox-content p-0">
               
                        <div class="divTable col-md-12">
                             <table class="table table-bordered" style="">
                                    
                                    <thead>
                                        <tr style="">
                                            <th>S.NO</th> 
                                            <th>Type Of Request</th> 
                                            <th>Received Through</th>   
                                            <th>Subject</th>
                                            <th>Applicant Name</th>
                                            <th>Mobile No</th> 
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($pendingWithYou as $key => $value): ?>
                                        
                                    
                                    <tbody>
                                       <td><?=$key+1?></td> 
                                       <td><?=$value->type_of_request?></td> 
                                       <td><?=$value->received_through?></td> 
                                       <td><?=$value->subject?></td> 
                                       <td><?=$value->applicant_name?></td> 
                                       <td><?=$value->mobile_number?></td> 
                                       <td><a href="<?= Url::toRoute(['application/view','id'=>$value->id])?>" class="btn btn-sm btn-primary" ><i class="fa fa-eye" aria-hidden="true" ></i></a></td> 
                                    </tbody>

                                    <?php endforeach ?>
                                </table>
                        </div> 
                          

           
          </div>
    </div>  
</div>

</section>
<section class="content-header">
  <h1>Applications Processed</h3> 
</section>
<section class="content">
   <div class="box-footer box-danger">
      
    <div class="box-header with-border"> 
        <div class="ibox-content p-0">
               
                        <div class="divTable col-md-12">
                             <table class="table table-bordered" style="">
                                    
                                    <thead>
                                        <tr style="">
                                            <th>S.NO</th> 
                                            <th>Type Of Request</th> 
                                            <th>Received Through</th>   
                                            <th>Subject</th>
                                            <th>Applicant Name</th>
                                            <th>Mobile No</th> 
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($all as $key => $value): ?>
                                        
                                    
                                    <tbody>
                                       <td><?=$key+1?></td> 
                                       <td><?=$value->type_of_request?></td> 
                                       <td><?=$value->received_through?></td> 
                                       <td><?=$value->subject?></td> 
                                       <td><?=$value->applicant_name?></td> 
                                       <td><?=$value->mobile_number?></td> 
                                       <td><a href="<?= Url::toRoute(['application/view','id'=>$value->id])?>" class="btn btn-sm btn-primary" ><i class="fa fa-eye" aria-hidden="true" ></i></a></td> 
                                    </tbody>

                                    <?php endforeach ?>
                                </table>
                        </div> 
                          

           
          </div>
    </div>  
</div>

</section>
 
  
     
