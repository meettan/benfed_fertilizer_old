 
<table border ="1">
	<tr>
		<th>A/C Head</th>
		<th>CR</th>
		<th>DR</th>
	</tr>	

	<?php
		foreach($row as $value){ ?>
			<tr>
				<td><?php 
					  $acc_code = $value->acc_code;

					  $result=$this->FinanceModel->f_get_ac_code($acc_code);

					  $acc_name = $result->acc_head;
					  
					  echo $acc_name; ?>
				</td>
				<td><?php echo($value->cr_amt); ?></td>
				<td><?php echo($value->dr_amt); ?></td>
			 </tr>
		<?php
				}
		?>		

 
		<tr>
		   <td colspan =1><?php $v_date = $value->voucher_date;
		   					$v_date = Date("d/m/Y",strtotime($v_date));

		   					echo("Date: ".$v_date); ?>
		   </td> 
		   <td colspan =1><?php echo("Voucher No.: ".$value->voucher_id); ?></td>
		   <td colspan =1><?php if($value->voucher_mode=='C'){
		   							$mode='Cash';	
		   						}elseif($value->voucher_mode=='B'){
		   							$mode='Bank';
		   						 }elseif($value->voucher_mode=='J'){
		   							$mode='Journal';		
		   						  }
		   					echo("Mode: ".$mode); ?>
		   	</td>
		</tr>
		<tr>   
		   <td colspan =2><?php echo("Cheque No.: ".$value->ins_no); ?></td>	
		   <td colspan =1><?php $c_date = $value->ins_dt;
		   					    $c_date = Date("d/m/Y",strtotime($c_date));
		   					    echo("Cheque Date: ".$c_date); ?></td>
		</tr> 	
	    
	    <tr>
			<td colspan =3><?php echo($value->remarks); ?></td> 		
		 </tr>	 
	
</table>	
