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
  <h1>Applications</h3> 
</section>
 
<section class="content">
   <div class="box-footer box-danger">
            
    <div class="box-header with-border"> 
        <div class="ibox-content p-0">
               
                        <div class="divTable col-md-12">
                          <form id="agenda_form"  method="POST">
                            <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>"
           value="<?=Yii::$app->request->csrfToken?>"/>
                             <table class="table table-bordered" style="">
                                    
                                    <thead>
                                        <tr style="">
                                          <th><input onchange="checkAll(this)" type="checkbox"> <small>&nbsp; SELECT ALL</small></th>
                                            <th>S.NO</th> 
                                            <th>Type Of Request</th> 
                                            <th>Received Through</th>   
                                            <th>Applicant Name</th>
                                            <th>Mobile No</th>  
                                        </tr>
                                    </thead>
                                    
                                        
                                    
                                    <tbody>

                                      <?php foreach ($data as $key => $value) {
                                      echo "<tr>
                                      <td><input type='checkbox' name='submission_id[]' value='".$value->id."' class='checked' id='check_".$key."'></td>
                                      <td>".@($key+1)."</td>
                                      <td>".@$value->request->name."</td>
                                      <td>".$value->received->name."</td>
                                      <td>".@$value->applicant_name."</td> 
                                      <td>".$value->mobile_number."</td>
                                      </tr>";  
                                      
                                        
                                    

                                      } ?>
                                </tbody> 
                                <tfoot>
                <tr>
                  <th colspan="5"><a href="#" id="create_ag" onclick="ValidateCheckbox(event);" class="btn btn-success"><i class="fa fa-floppy-o"></i> Create Agenda</a></th>
                </tr>
              </tfoot>     
                                </table>
                                </form>
                        </div> 
                          

           
          </div>
    </div>  
</div>

</section> 
</div>
 <script type="text/javascript">
  function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      if (ele.checked){
      for(var i = 0; i < checkboxes.length; i++)
        if(checkboxes[i].type == 'checkbox')
          checkboxes[i].checked = true;
      }
      else{
      for (var i = 0; i < checkboxes.length; i++) 
        if(checkboxes[i].type == 'checkbox')
          checkboxes[i].checked = false;
      }
  }

  function ValidateCheckbox(event){
    event.preventDefault();
    var getArrVal = $('[name="submission_id[]"]:checked').map(function(){
      return this.value;
    }).toArray();

    if(getArrVal.length){
      $('#cont').html("");
      $("#create_ag").remove();
      $("#agenda_form").submit();
      return false;
    }
    else {
      $(this).prop("checked",true);
      $('#cont').html("<p class='alert alert-danger'>At-least one checkbox must be checked!</p>");
      return false;
    };
  };
</script>`

 
  
     
