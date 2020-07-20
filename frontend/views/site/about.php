<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-sm-12">
     <div class="table-responsive table-scrollable" >
         <table class="table table-bordered table-hover" id="loadRecords" style="width: 100%">
             <tbody>
                <?php
                    $details=json_decode($model->content,true);
                    if(!empty($details) && is_array($details)){
                        $sno=1;
                        // echo "<pre>";print_r($details);die;
                      echo '
                        <thead>
                            <tr><th>Sr. No.</th>';
                         foreach ($details['Officers'][0] as $key => $heading) {
                             echo '<th>'.str_replace("_", " ", $key) .'</th>';
                         }

                       echo '   </tr>
                        </thead>
                      ';
                       foreach ($details as $key => $detail) {
                         if($key!="Officers"){
                            echo "<tr><td colspan='5'><b>".$key."</b></td></tr>";
                         }

                         foreach ($detail as $key => $contact) {
                             echo "<tr>
                                <td>".$sno++."</td>";
                            foreach ($contact as $key => $contactValue) {
                                echo "<td>".$contactValue."</td>";
                            }
                               
                           echo " </tr>";
                         }
                       } 
                    }
                    
                ?>
                                                                                                     
             </tbody>
         </table>
     </div>
     <span class="pullquote-left">
        <span style="margin-bottom: 10px;color: #d9232d;display:block;font-size: 14px;font-weight: 500;"><i class="fa fa-2x fa-globe" style="color: #d9232d;margin-right: 5px;"></i> <a style="vertical-align: super;" href="http://fakenews.hp.gov.in">http://fakenews.hp.gov.in</a></span>
        <span style="margin-bottom: 10px;color: #d9232d;display:block;font-size: 14px;font-weight: 500;"><i class="fa fa-2x fa-envelope" style="color: #d9232d;margin-right: 5px;"></i> <a style="vertical-align: super;" href="mailto:fakenews-unit@hp.gov.in">fakenews-unit@hp.gov.in</a></span> 
        <span style="margin-bottom: 10px;color: #d9232d;display:block;font-size: 14px;font-weight: 500;"><i class="fa fa-2x fa-whatsapp" style="color: #d9232d;margin-right: 5px;"></i> <a style="vertical-align: super;" href="callto:+919816323469">+919816323469 </a></span>
     </span>
    </div>
</div>
