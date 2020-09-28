<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url; 
use frontend\models\UserRoles;
use frontend\models\TypeOfRequest;;
use frontend\models\ReceivedThrough;;
use frontend\models\IssuedBy;;
use frontend\models\Departments;  
use frontend\models\Districts;  
use frontend\models\ConstituencyDetails;  
use yii\helpers\ArrayHelper;   
use yii\web\View;  

$TypeOfRequest =  ArrayHelper::map(TypeOfRequest::find('id', 'name')->orderBy('name')->all(), 'id', 'name');
$ReceivedThrough =  ArrayHelper::map(ReceivedThrough::find('id', 'name')->orderBy('name')->all(), 'id', 'name');
$IssuedBy =  ArrayHelper::map(IssuedBy::find('id', 'name')->orderBy('name')->all(), 'id', 'name'); 
$Departments =  ArrayHelper::map(Departments::find('dept_id', 'department_name')->orderBy('department_name')->all(), 'dept_id', 'department_name'); 
$Districts =  ArrayHelper::map(Districts::find('district_id', 'district_name')->orderBy('district_name')->all(), 'district_id', 'district_name');
$ConstituencyDetails =  ArrayHelper::map(ConstituencyDetails::find('id', 'name')->orderBy('name')->all(), 'id', 'name');
?>
<html>

 <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">

 <style type="text/css">

 	body{

 		font-size: 12px;

 		font-family: times new roman;

 		width:850px;

 		padding: 10px;

 		border : 1px solid black;

 	}

 	.header{

 		text-align: center;

 		font-weight: bolder;

 		font-family: inherit;

 	}

 	.gridtable{

 		width: 100%;

 		font-family: inherit;

 	}

 	.gridtable th,.gridtable td{

		font-size: 12px; 		

		border: 1px solid rgb(212,212,212);

		text-align: center;

		font-family: inherit;

 	}

 	.gridtable th{

		font-weight: bolder;

		font-family: inherit;

 	}

 	.ack{

		border-bottom: 1px solid rgb(212,212,212);

		font-family: inherit;

		font-size: 12px;

		text-align:center;

		font-weight: bolder;

	}

	.break { page-break-before: always; }

 </style>

  <body>

	<div class="header">

		AGENDA ITEMS FOR THE ...... MEETING OF THE STATE LEVEL SINGLE WINDOW CLEARANCE AND MONITORING AUTHORITY SCHEDULED TO BE HELD UNDER THE CHAIRMAINSHIP OF HONOURABLE CHIEF MINISTER ON.......................JUST AFTER THE CABINET MEETING HP SECRETARIAT

	</div>
 
	<?php 
 

	foreach ($dataArray as $key => $data) {
 

	?>
 
		<div class="ack"> 
			CMREF Orders 
		</div><br>

		<table cellpadding="2" cellspacing="0" border="0" class="gridtable">

			<tr>

			  <th colspan="3">Application Id: <?=@$data->id?></th>

			</tr>

			<tr>

				<td colspan="3"><b>Applicant Name : <?=@$data->applicant_name?> </td>

			</tr>

			<tr>

				<td colspan="3"><b>Mobile Number : <?=@$data->mobile_number?> </td>

			</tr>

			<tr>

				<td colspan="3">Online Application was Received on <?=@$data->letter_date?></td>

			</tr>
			<tr>

				<td colspan="3"><b>Type Of Request :</b> <?=@$data->request->name?></td>

			</tr>
			<tr>

				<td colspan="3"><b>Received  Through :</b> <?=@$data->received->name?></td>

			</tr>

			<tr>

				<td colspan="3"><b>Department :</b> <?=@$data->department->department_name?></td>

			</tr>

			<tr>

				<td colspan="3"><b>Purpose :</b> <?=@$data->purpose->name?></td>

			</tr>



			<tr>

				<td colspan="3"><b>Constituency From :</b> <?=@$data->constituencyfrom->name?></td>

			</tr>
			<tr>

				<td colspan="3"><b>Constituency To :</b> <?=@$data->constituencyto->name?></td>

			</tr>
    		
			<tr>

				<td colspan="3"><b>Issued By :</b> <?=@$data->issued_by?></td>

			</tr>

			<tr>

				<td colspan="3"><b>Issued By :</b> <?=@$data->remark?></td>

			</tr>

		</table>

						
  

		 <table cellpadding="2" cellspacing="0"  border="0" class="gridtable" style="width:100%">

		 	<tr><th colspan="4"> Points of Consideration</th></tr>

		 	<tr><td colspan="4"> &nbsp;</td></tr>

		 	<tr><td colspan="4"> &nbsp;</td></tr>

		 </table>



		<br><br>

	<?php } ?>

  </body>

</html>