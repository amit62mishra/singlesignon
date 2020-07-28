<div class="divTable data">
	 <table class="table table-bordered" style="">
                                    
    <thead>
        <tr style="">
            <th >S.No	</th>
	        <th>Aplicant Name	</th>
	        <th>Mobile</th>
	        <th>Type Of Request</th>
	        <th>Submitted At</th>
	        <th>Submitted By</th>
        </tr>
    </thead>
    <?php 
    //echo "<pre>"; print_r($model); die;

    foreach ($model as $key => $value): ?>
        
    
    <tbody>
       <td><?=$key+1?></td> 
       <td><?= $value->applicant_name?></td>   
       <td><?= $value->mobile_number?></td>   
       <td><?= $value->request->name?></td>   
       <td><?= $value->created_at?></td>   
       <td><?= $value->user->user_full_name?></td>   
    </tbody>

    <?php endforeach ?>
</table>
 
</div>