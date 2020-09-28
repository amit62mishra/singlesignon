<?php 
$baseUrl='swcs';
  use yii\helpers\Url; 
  use backend\components\DefaultUtility; 

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>ADMIN NIC | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="keywords" content="ADMIN" />
    <meta name="description" content="ADMIN" />
    <link rel="stylesheet" href="<?=$baseUrl?>/css/style.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/css/steps.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="<?=$baseUrl?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/bower_components/Ionicons/css/ionicons.min.css">

    <link rel="styleshe et" href="<?=$baseUrl?>/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/plugins/sweetalert/sweetalert.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?=$baseUrl?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?=$baseUrl?>/plugins/pace/pace.min.css">
    <link rel="stylesheet" href="<?=$baseUrl?>/plugins/iCheck/all.css">
    <script src="<?=$baseUrl?>/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=$baseUrl?>/plugins/sweetalert/sweetalert.min.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- <div id="#loader"><div class="lds-facebook"><div></div><div></div><div></div></div></div> -->
    <div class="wrapper">
      <header class="main-header">
        <a href="#" class="logo">
          <span class="logo-mini">ADMIN</span>
          <span class="logo-lg">ADMIN</span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                 
                   <?php  
                     if(Yii::$app->user->isGuest){ ?>
                      <a href="<?=Url::to(['site/login'])?>" >
                        <i class="fa fa-user"></i>
                        <span class="hidden-xs">
                          Login
                        </span>
                      </a>
                   <?php  } else { ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        <span class="hidden-xs">
                          <?php echo Yii::$app->user->identity->user_name ?>
                        </span>
                      </a>
                   <?php }    ?> 
                <?php if(!Yii::$app->user->isGuest){ ?>
                     <ul class="dropdown-menu">
                      <li class="user-footer">
                        
                          <div class="pull-left">
                            <a href="<?=Url::to(['user/profile'])?>" class="btn btn-default btn-flat">Profile</a>
                          </div>
                          
                          <div class="pull-right">
                            <a href="<?=Url::to(['site/logout'])?>" class="btn btn-default btn-flat">Sign out</a>
                          </div> 
                      
                      </li>
                    </ul>
                      <?php } ?>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header> 
      <?php 
        
           require_once('admin.php'); 
      ?>
      <div class="content-wrapper">
        <?=$content?>
      </div>
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block" style="float: right;">
          <a href=""><b>Version</b>1.0</a>
        </div>
        <strong><a href="http://emerginghimachal.hp.gov.in">ADMIN</a> &copy; 2020.</strong>
        reserved.
      </footer> 
    <script src="<?=$baseUrl?>/bower_components/jquery-ui/jquery-ui.min.js"></script>
     
    
    <script src="<?=$baseUrl?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=$baseUrl?>/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="<?=$baseUrl?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=$baseUrl?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?=$baseUrl?>/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <script src="<?=$baseUrl?>/bower_components/moment/min/moment.min.js"></script>
    <script src="<?=$baseUrl?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?=$baseUrl?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?=$baseUrl?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=$baseUrl?>/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=$baseUrl?>/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?=$baseUrl?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=$baseUrl?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=$baseUrl?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="<?=$baseUrl?>/bower_components/PACE/pace.min.js"></script>
    <script src="<?=$baseUrl?>/plugins/iCheck/icheck.min.js"></script>
    <script src="<?=$baseUrl?>/js/style.js"></script>
    
    <script type="text/javascript">
      $(function () {
        $('.textarea').wysihtml5();
        $('.datepicker').datepicker({
            autoclose: true
        });
        $('.datepicker2').datepicker({
            autoclose: true
        });
      })
    </script>
  </body>
</html>