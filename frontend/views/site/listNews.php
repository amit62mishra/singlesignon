<link rel="stylesheet" type="text/css" href="<?=Yii::$app->view->theme->baseUrl?>/datatable/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="row ">
  <div class="col-sm-12">
    <h3><?=($type=='A' ? "Identified " : " Not ")?>Fake News</h3>
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
        loadApplications(url,"#loadRecords",{"_csrf":"<?= Yii::$app->request->csrfToken;?>","type":"<?=$type?>"});
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
          'bPaginate':true,
          destroy: true,
          dom: 'Bfrtip',
          buttons: [
               'csv', 'excel', 'pdf', 'print'
          ],
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

