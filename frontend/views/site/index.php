<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use yii\helpers\ArrayHelper;
  use common\models\District;
?>
<style type="text/css">
  @media only screen and (min-width: 1024px) {
    #site-page-heading {
      margin-top: 50px;
    }
    a{
      font-weight: bold;
    }
    .home-column{
      margin-top: -50px;
    }
  }
  .blinking{
    animation:blinkingText 0.9s infinite;
  }
  .home-row{
    margin-top:-30px;
  }

  .row{
    margin-bottom: 0px; 
  }
  @keyframes blinkingText{
    0%{   color: #000;  }
   /* 49%{  color: transparent; }
    50%{  color: transparent; }*/
    50%{  color: #d9232d; }
    99%{  color:transparent;  }
    100%{ color: transparent;  }
  }
</style>
<link rel="stylesheet" type="text/css" href="<?=Yii::$app->view->theme->baseUrl?>/datatable/datatables.net-bs/css/dataTables.bootstrap.min.css">

<?php
  if(Yii::$app->user->isGuest){
    ?>
<div class="row">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-3">
          <img class="img img-responsive" src="<?=Yii::$app->view->theme->baseUrl?>/images/cmhimachal.png" style="width: 200px;">
          <h5>Shri Jai Ram Thakur <br>Hon'ble Chief Minister<br> Himachal Pradesh</h5>
      </div>
      <div class="col-12 col-sm-6 col-lg-9">
          <div class="wrap-content">
            <p>This portal provides list of fake news identified by Fake News Monitoring Unit of Government of Himachal Pradesh. In case, you find some probable fake news in Newspapers/TV/Digital or Social Media Platforms, please report through this portal. The Fake News Monitoring Unit will verify the news and if found fake, list it on this portal.</p>
            <p> This is an initiative of the State Government to protect citizens from misinformation/rumours during this sensitive time. This portal has facility to report fake/suspicious news, an official identification  and listing of the same.</p>
            <p style="margin-top: 30px;">Please <a class="blinking" href="<?=Yii::$app->urlManager->createAbsoluteUrl("notifications/create")?>">report the fake/suspicious news</a> pro-actively. Your identity will be kept confidential.</p>
            <p style="margin-top: 30px;">
              <a href="http://covidorders.hp.gov.in" target="_BLANK">Click here</a> to check official Government Orders, Advisories and Media Bulletins of Government of Himachal Pradesh.
            </p>
            
              <span class="pullquote-left">
                <h4 style="margin-top: 30px;">Yon can also report at</h4>
                 <span style="margin-bottom: 10px;color: #d9232d;display:block;font-size: 14px;font-weight: 500;"><i class="fa fa-2x fa-whatsapp" style="color: #d9232d;margin-right: 5px;"></i> <a style="vertical-align: super;" href="callto:+919816323469">+919816323469 </a></span>
                 <span style="margin-bottom: 10px;color: #d9232d;display:block;font-size: 14px;font-weight: 500;"><i class="fa fa-2x fa-envelope" style="color: #d9232d;margin-right: 5px;"></i> <a style="vertical-align: super;" href="mailto:fakenews-unit@hp.gov.in">fakenews-unit@hp.gov.in</a></span> 
              </span>
          </div>
      </div>
    </div>
  </div>
</div>
<?php
  }
?>
<div class="row home-row">
  <div class="col-sm-12 home-column" >
    <h3>Partial Identified Fake News <a href="<?=Yii::$app->urlManager->createAbsoluteUrl("site/listnews?type=".base64_encode('A'))?>" style="font-size: 16px;">(View All Fake News)</a></h3>
     <div class="table-responsive table-scrollable" >
         <table class="table table-bordered table-hover" id="loadRecords" style="width: 100%">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>News Title</th>
                     <th>Description</th>
                     <th>Published On</th>
                     <th>Identified On</th>
                     <th>News Link</th>
                     <th>Attachment</th>
                     <th>Remarks</th>
                 </tr>
             </thead>
             <tbody>
                                                                                                     
             </tbody>
         </table>
     </div>
    </div>
</div>
<script type="text/javascript" src="<?=Yii::$app->view->theme->baseUrl?>/datatable/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=Yii::$app->view->theme->baseUrl?>/datatable/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=Yii::$app->view->theme->baseUrl?>/datatable/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?=Yii::$app->view->theme->baseUrl?>/datatable/datatables.net-bs/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=Yii::$app->view->theme->baseUrl?>/datatable/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?=Yii::$app->view->theme->baseUrl?>/datatable/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?=Yii::$app->view->theme->baseUrl?>/datatable/datatables.net-buttons/js/buttons.print.min.js"></script>
<script type="text/javascript">
    var oTable;
    var url='<?=Yii::$app->urlManager->createAbsoluteUrl('/api/v1/getnotifications')?>';
    $(document).ready(function(){
        loadApplications(url,"#loadRecords",{"_csrf":"<?= Yii::$app->request->csrfToken;?>","type":"A","limit":5});
    })
    function search(district){
       // var district= $("#district_id").val();
       loadApplications(url,"#loadRecords",{"_csrf":"<?= Yii::$app->request->csrfToken;?>","type":"A"});
    }
    function loadApplications(url, tableId, params = {"_csrf":"<?= Yii::$app->request->csrfToken;?>"},requestType="POST") {
      $(".loadingDiv").show();
      if (oTable) oTable.destroy();
      oTable = $(tableId).DataTable({
          "ajax": {
              "url": url,
              "type": requestType,
              "dataSrc":"",
              "data": function(d) {

                  return $.extend({}, d, params);
              }
          },
          'searching'   : false,
          'bPaginate':false,
          destroy: true,
          // dom: 'Bfrtip',
          // buttons: [
          //      'csv', 'excel', 'pdf', 'print'
          // ],
          "columns": [
              {
                  "data": "",
                  "sortable": false,
                  render: function(data, type, row, meta) {
                      var no = meta.row + meta.settings._iDisplayStart + 1;
                      var html = '';
                      html += '<center><b>' + no + '</b></center>';
                      return html;
                  }
              },
              {
                  "data": "notification_name",
                  "sortable": false,
                  render: function(data, type, row, meta) {
                      html = '<div id="notification_name" >' + data + '</div>';
                      return '<div id="ucfirst_notification_name">' + html + '</div>';
                  }
              },
              {
                  "data": "notification_description",
                  "sortable": false,
                  render: function(data, type, row, meta) {
                      html = '<div id="notification_description" >' + data + '</div>';
                      return '<div id="ucfirst_notification_description">' + html + '</div>';
                  }
              },
              {
                  "data": "notification_media",
                  "sortable": false,
                  render: function(data, type, row, meta) {
                      html = '<div id="notification_media" >' + data + ' Media</div>';
                      return '<div id="ucfirst_notification_media">' + html + '</div>';
                  }
              },
              {
                  "data": "notification_published_date",
                  "sortable": false,
                  render: function(data, type, row, meta) {
                      html = '<div id="notification_published_date" >' + data + '</div>';
                      return '<div id="ucfirst_notification_published_date">' + html + '</div>';
                  }
              },
              {
                  "data": "website_url",
                  "sortable": false,
                  render: function(data, type, row, meta) {
                     if(data===null){
                       return "NA";
                     }
                     html = '<div id="website_url" >' + data + '</div>';
                     return '<div id="ucfirst_website_url"><a href="'+data+'">View</a></div>';
                  }
              },

              {
                  "data": "notification_file",
                  "sortable": false,
                  render: function(data, type, row, meta) {
                      if(data.length > 0){
                        html = '<div id="notification_file" ><a target="_BLANK" href="' + data + '" class=""><i style="color: #ff0000;" class="fa fa-file-pdf-o fa-2x"</a></a></div>';
                          return '<div id="ucfirst_notification_file">' + html + '</div>';
                      }
                      return "NA";
                  }
              },
              {
                  "data": "remarks",
                  "sortable": false,
                  render: function(data, type, row, meta) {
                     html = '<div id="remarks" >' + data + '</div>';
                     return '<div id="ucfirst_remarks">' + html + '</div>';
                  }
              },
          ],
          'bSortable': false,
          'aTargets': ['nosort'],
          "initComplete": function(settings, json) {
              $(".loadingDiv").hide();
          }
      });
    }
</script>

