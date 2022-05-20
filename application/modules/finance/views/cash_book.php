<?php
      $from_date = $date[0];
      $to_date	 = $date[1];
      echo "<h1>Cash Book Between ".date('d/m/Y',strtotime($from_date))." To ".date('d/m/Y',strtotime($to_date))."</h1>";
?>
<table>
	<tr><td>Opening Balance:</td>
	   <td><?php
		 $opn_bal = $op_bal->opn_bal;
		 if($opn_bal<=0){
			$flag='Cr';
	 		$opn_bal=(-1)*$opn_bal;
		 }else{
			$flag='Dr';
			$opn_bal=$opn_bal;
		 }
		 echo $opn_bal;?>
	    </td>
	    <td><?php echo $flag;?></td>
	</tr>
</table>
<table border =1>
	<tr>
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
              
         ?>                
	<tr>
	    <td><?php echo($value->acc_code);?></td>
	    <td><?php echo($value->acc_head);?></td>
	    <td><?php echo($value->dr_amt);?></td>	
	    <td><?php echo($value->cr_amt);?></td>	
	</tr>
	<?php
	}
	?>
	<tr>
	     <td colspan=2>Total:</td>
	     <td><?php echo $dr_tot; ?></td>	
	     <td><?php echo $cr_tot; ?></td>
	</tr>

</table>
<table>
        <tr><td>Closing Balance:</td>
	    <td><?php
                 $cls_bal = $cl_bal->cls_bal;
                 if($cls_bal<=0){
                        $flag='Cr';
                        $cls_bal=(-1)*$cls_bal;
                 }else{
                        $flag='Dr';
                        $cls_bal=$cls_bal;
                 }
                 echo $cls_bal;?>
            </td>
            <td><?php echo $flag;?></td>
        </tr>
</table>


