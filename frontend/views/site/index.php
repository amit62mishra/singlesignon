<?php 
  //echo "<pre>"; print_r($data); die;
  use yii\helpers\Url; 
use backend\models\EodbServiceQuestionOptions; 

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
  <h1> Applications List<small>&nbsp;</small></h1>
  <ol class="breadcrumb">
    
  </ol>
  
</section>
 
<section class="content">
   <div class="box-footer box-danger">
    
      <a href="<?=$url = Url::to(['application/form']);?>" class="btn btn-sm bg-maroon pull-right">Application Form </a>
    <br>
    <br>
    <div class="box-header with-border"> 
<div class="ibox-content p-0">
       
                <div class="divTable col-md-12">
                     <table class="table table-bordered" style="">
                            
                            <thead>
                                <tr style="">
                                    <th >Serial No</th> 
                                    <th >Reform Date</th>   
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                </div> 
                  

   
  </div>
    </div>  
</div>

</section>
 
 
 