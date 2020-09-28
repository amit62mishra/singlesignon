<?php 
  //echo "<pre>"; print_r($data); die;
use yii\helpers\Url; 
use backend\models\EodbServiceQuestionOptions;  
use frontend\models\UserRoles;
use common\models\UserRoleMapping;


$data= UserRoleMapping::find()->where(['primary_user_id'=>Yii::$app->user->identity->user_id])->all();
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
  <h1>Click on Department for SINGLE SIGN ON</h3> 
</section>
 
<section class="content"> 
    <br>
     <div class="divTable col-md-12">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Fire Department</span>
             <!--  <span class="info-box-number">2,000</span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CM Helpline</span>
              <!-- <span class="info-box-number">2,000</span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Directorate of Industry</span>
              <!-- <span class="info-box-number">2,000</span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">IPH Department</span>
              <!-- <span class="info-box-number">2,000</span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


      </div>                     
    </div>  
 
 
</div>
 

 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Select Role</h4>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer"><!-- 
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>
<?php if($select_role) {  ?>
<script type="text/javascript">
$(document).ready(function (){
     
    $('#myModal').modal('show');  
});

</script>
<?php } ?>
 
  
     
