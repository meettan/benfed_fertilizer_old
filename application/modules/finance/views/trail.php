<?php
	$report_date  = $date[0];
	echo '<h1>Trial Balance As On: '.Date('d/m/Y',strtotime($report_date)).'</h1>';
?>
<table border =1>
	<tr>
	    <th>Schedule Type</th>
	    <th>A/C Code</th>
	    <th>A/C Name</th>
	    <th>Dr.Amount</th>
	    <th>Cr.Amount</th>					
	</tr>
	<?php
		$dr_tot = 0;
		$cr_tot = 0;
		foreach($data as $value){ 
		$dr_tot = $dr_tot + $value->dr_amt;
		$cr_tot = $cr_tot+abs($value->cr_amt);
		//$cr_tot = abs($cr_tot);
	     ?>			
	<tr>
	
	    <td><?php echo($value->schedule_type);?></td>
	    <td><?php echo($value->acc_code);?></td>	
	    <td><?php echo($value->acc_head);?></td>
	    <td><?php echo($value->dr_amt);?></td>
	    <td><?php 
			$cr_amt = $value->cr_amt;
		        $cr_amt = abs($cr_amt);			
			echo $cr_amt;
		?>	
	    </td>
	</tr>
	<?php
	  }
	?>
	<tr>
	    <td colspan=3>Total:</td>
	    <td><?php echo $cr_tot; ?></td>	
	    <td><?php echo $dr_tot; ?></td>
        </tr>
</table>
