<?php

	$from_dt  = $data3[0];
	$to_dt    = $data3[1];
	$acc_code = $data3[2];
	
	

	//foreach($data as $value){	
		//$acc_code = $value->acc_code;
		$result=$this->FinanceModel->f_get_ac_code($acc_code);
		$acc_name = $result->acc_head;
		
	//}	
?>

	<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <?php echo '<h1>Ledger Report Between '.Date('d/m/Y',strtotime($from_dt)).' To '.Date('d/m/Y',strtotime($to_dt)).'</h1>'; ?>

				<?php echo 'Account : ' .$acc_code.'-'.$acc_name; ?>
            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">

			<br>
			<table>
				<tr><td><strong>Opening Balance:</strong></td>
				<td><?php 
					$opn_bal = $data1->opn_bal;
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
			<br>
			<table class="table table-bordered table-hover">
				<tr>
					<th>Date</th>
					<th>Voucher No.</th>
					<th>Mode</th>
					<th>Cheque No.</th>
						<th>Cheque Date</th>
					<th>Particulars</th>
					<th>Debit</th>
					<th>Credit</th>
				</tr>
				<?php
					$dr_tot = 0;
					$cr_tot = 0;

					foreach($data as $value){ 
					$dr_tot  = $dr_tot + $value->dr_amt;
					$cr_tot  = $cr_tot + $value->cr_amt;
					?>
				<tr>	
					<td><?php 
							$v_date = $value->voucher_date;
							$v_date = Date('d/m/Y',strtotime($v_date));
						echo $v_date;
						?>
					</td>
					<td><?php echo($value->voucher_id);?></td>
					<td><?php 
						$mode = $value->voucher_mode;
						if($mode=='C'){
							$mode='CASH';	
						}elseif($mode=='B'){
							$mode='BANK';	
						}elseif($mode=='J'){
							$mode='JOURNAL';	
						}			  
						echo $mode;
						?>		  
					</td>
					<td><?php echo($value->ins_no);?></td>
					<td><?php echo($value->ins_dt);?></td>
					<td><?php echo($value->remarks);?></td>
						<td><?php echo($value->dr_amt);?></td>
					<td><?php echo($value->cr_amt);?></td>
				</tr>
				<?php
					}
				?>
					<tr>
						<td colspan=6>Total:</td>
						<td><?php echo $dr_tot; ?></td>	
						<td><?php echo $cr_tot; ?></td>
					</tr>
			</table>

			<table>
				<tr><td>Closing Balance:</td>
					<td><?php
							$cls_bal = $data2->cls_bal;
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
			
			<br>
			
		</div>
	
	</div>