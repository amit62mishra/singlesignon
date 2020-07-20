<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
      <ul class="nav side-menu">
        <li><a href="<?=Yii::app()->createAbsoluteUrl('/admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ul>
  </div>
  <div class="menu_section">
      <h3>Reports</h3>
      <ul class="nav side-menu">
         <li><a href="<?=$this->createUrl('/admin/adminTasks/viewAllApplicationsComments')?>"><i class="fa fa-edit"></i> Applications Comments</a></li>
         <li><a href="<?=$this->createUrl('/admin/adminTasks/viewAllUsers')?>"><i class="fa fa-sitemap"></i> Investors Report</a></li>
         <li><a href="<?=$this->createUrl('/mis/boApplicationSubmission/CategoryWiseInvestment')?>"><i class="fa fa-windows"></i> Categories Wise</a></li>
         <li><a href="<?=$this->createUrl('/mis/boApplicationSubmission/IndustryWiseReport')?>"><i class="fa fa-bug"></i> Industries Wise</a></li>
      </ul>
   </div>
   <div class="menu_section">
      <h3>CAF</h3>
      <ul class="nav side-menu">
         <li><a href="<?=$this->createUrl('/mis/boApplicationSubmission/overallreport')?>"><i class="fa fa-briefcase"></i> Overall CAF</a></li>
         <li><a href="<?=$this->createUrl('/mis/pendency-report')?>"><i class="fa fa-bar-chart"></i> Pending CAF</a></li>
         <li><a href="<?=$this->createUrl('/admin/adminTasks/getDistrictApplications')?>"><i class="fa fa-bar-chart-o"></i> District CAF</a></li>
      </ul>
   </div>
</div>
