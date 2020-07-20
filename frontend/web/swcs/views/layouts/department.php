<?php
	$iconArray=array("icon-diamond","icon-wallet","icon-settings","icon-puzzle","icon-bulb","icon-briefcase","icon-fire","icon-bar-chart","icon-layers","icon-feed","icon-docs","icon-folder","icon-social-dribbble","icon-note","icon-graph","icon-notebook","icon-grid");
	$appsModel= new ApplicationVerificationLevelExt;
	$Pendingapp=$appsModel->getApplication($_SESSION['uid']);
	$isNoodal=DefaultUtility::isNoodalOfficer();
?>
<aside class="main-sidebar">
 	<section class="sidebar" style="height: auto;">
	    <ul class="sidebar-menu tree" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li><a href="<?=@Yii::app()->createAbsoluteUrl('/official');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<li><a href="<?=@Yii::app()->createAbsoluteUrl('/Grievance/grievanceUpdate/');?>"><i class="fa fa-building"></i> <span>Grievance</a></span></li>
			<li class="treeview">
				<a href="#"><i class="fa fa-files-o"></i><span>Issue Monitoring</span><span class="pull-right-container"><span class="label label-primary pull-right">3</span></span></a>
				<ul class="treeview-menu">
					<li><a href="<?=@Yii::app()->createAbsoluteUrl('admin/issueMonitoring/create');?>"><i class="fa fa-circle-o"></i> Create New Ticket</a></li>
				    <li><a href="<?=@Yii::app()->createAbsoluteUrl('admin/issueMonitoring/trackIssue');?>"><i class="fa fa-circle-o"></i> Search For Existing Ticket</a></li>
				    <li><a href="<?=@Yii::app()->createAbsoluteUrl('admin/issueMonitoring/admin');?>"><i class="fa fa-circle-o"></i> View all Tickets</a></li>
				</ul>
			</li>
			<li class="header">Applications</li>
			<li class="treeview">
			 	<?php
			     	if(!$isNoodal){
			  	   		$pCount = 1;
			  	   		echo '<a href="#">
				    			<i class="fa fa-certificate"></i>
				    			<span>Pending Applications</span>
				    			<span class="pull-right-container">
				    				<span class="label label-warning pull-right">'.count($Pendingapp).'</span>
				    			</span>
				    		</a>';
			  	   		  if(!empty($Pendingapp)){
			  			        echo '<ul class="treeview-menu">';
			  		        	foreach ($Pendingapp as $app) {
			          				$pCount++;
			          				$app_name=ApplicationExt::getAppNameViaId($app['application_id']);
			          				echo '<li>
			  					      		<a href="'.Yii::app()->createUrl('admin/ApplicationView/applicationfulldetail/app_sub_id/')."/".$app['app_sub_id'].'">
			  					      			<small><i class="fa fa-circle-o"></i> '.$app['app_sub_id'].'-'.substr($app_name['application_name'], 0,26).'...</small>
			  					      		</a>
			  					      	  </li>';
			  		        	}
			  		        	echo "</ul>";
			  			  }
			  		}
					?>
			</li>
			<?php 
				if(DefaultUtility::isNoodalOfficer()){
			    	echo '<li class="treeview">
				    		<a href="#">
				    			<i class="fa fa-certificate"></i>
				    			<span>In-Principle Agenda</span>
				    			<span class="pull-right-container">
				    				<span class="label label-warning pull-right">2</span>
				    			</span>
				    		</a>
			    			<ul class="treeview-menu">
		    					<li>
	        			    		<a href="'.Yii::app()->createAbsoluteUrl('official/agenda').'" title="Generate MoM">
	        			    			<small><i class="fa fa-circle-o"></i> Create SRC Agenda</small>
	        			    	    </a>
	        			    	</li>
		    					<li>
	        			    		<a href="'.Yii::app()->createAbsoluteUrl('official/agenda/SSWCMAgenda').'" title="Generate MoM">
	        			    			<small><i class="fa fa-circle-o"></i> Create SSWC & MA Agenda</small>
	        			    	    </a>
	        			    	</li>
	        			   	</ul>
				    	  </li>';
				   	echo '<li class="treeview">
				    		<a href="#"><i class="fa fa-certificate"></i><span>In-Principle MoM</span><span class="pull-right-container"><span class="label label-success pull-right">2</span></span></a>
			    			<ul class="treeview-menu">
		    					<li>
	        			    		<a href="'.Yii::app()->createAbsoluteUrl('official/inPrincipleMoM').'" title="Generate MoM">
	        			    			<small><i class="fa fa-circle-o"></i> Create SRC MoM</small>
	        			    	    </a>
	        			    	</li>
		    					<li>
	        			    		<a href="'.Yii::app()->createAbsoluteUrl('official/inPrincipleMoM/sswcmom').'" title="Generate MoM">
	        			    			<small><i class="fa fa-circle-o"></i> Create SSWC & MA MoM</small>
	        			    	    </a>
	        			    	</li>
	        			   	</ul>
				    	  </li>';
				}
			    if($isNoodal || DefaultUtility::isDICNodal()){
				    echo '<li class="treeview">
				    		<a href="#"><i class="fa fa-certificate"></i><span>Plot Allotment Agenda</span><span class="pull-right-container"><span class="label label-primary pull-right">2</span></span></a>
			    			<ul class="treeview-menu">
		    					<li>
	        			    		<a href="'.Yii::app()->createAbsoluteUrl('/plotallotment/Agenda').'" title="Create Agenda">
	        			    			<small><span class="title">Create Agenda </span></small>
	        			    	    </a>
	        			    	</li>
	        			    	<li>
	        			    		<a href="'.Yii::app()->createAbsoluteUrl('/plotallotment/Agenda/createMom').'" title="Create Mom">
	        			    			<small><span class="title">Create Mom </span></small>
	        			    	    </a>
	        			    	</li>
	        			   	</ul>
				    	  </li>';
			    }
				if(DefaultUtility::isDICNodal()){
					echo '<li class="treeview">
							<a href="#"><i class="fa fa-certificate"></i><span>CAF</span><span class="pull-right-container"><span class="label label-primary pull-right">2</span></span></a>
			    			<ul class="treeview-menu">
		    					<li>
	        			    		<a href="'.Yii::app()->createAbsoluteUrl('mis/report/GetApplications/appId/'.base64_encode(1).'/status/'.base64_encode("P")).'" title="Pending Applications With You">
	        			    			<small><span class="title">Pending Applications With You</span></small>
	        			    	    </a>
	        			    	</li>
	        			    	<li>
	        			    		<a href="'.Yii::app()->createAbsoluteUrl('mis/report/GetApplications/appId/'.base64_encode(1).'/status/'.base64_encode("A")).'" title="Approved Applications">
	        			    			<small><span class="title">Approved Applications</span></small>
	        			    	    </a>
	        			    	</li>
	        			   	</ul>
	        			   </li>';
				}
				if(DefaultUtility::isDC118Officer()){
					echo '<li class="treeview">
				    		<a href="#">
				    			<i class="fa fa-certificate"></i><span>Approved EC 118</span><span class="pull-right-container"><span class="label label-warning pull-right">1</span></span>
				    		</a>
			    			<ul class="treeview-menu">
		    					<li>
	        			    		<a href="'.Yii::app()->createAbsoluteUrl('official/inPrincipleReport').'" title="View EC 118">
	        			    			<small><i class="fa fa-circle-o"></i> View EC 118</small>
	        			    	    </a>
	        			    	</li>
	        			   	</ul>
				    	  </li>';
				}
			?>
		</ul>
  	</section>
</aside>