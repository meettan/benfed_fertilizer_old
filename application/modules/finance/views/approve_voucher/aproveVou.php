	<div class="wraper">      
            
		<div class="col-md-6 container form-wraper">

			<form method="POST" action="<?php echo site_url("finance/aproveVoucher")?>">

				<div class="form-header">
                
					<h4>Approve Voucher</h4>
				
				</div>

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>

					<div class="col-sm-6">

						<input type = date  name = "voucher_dt" 
						       class="transparent_tag" 
						       value="<?php echo $data->voucher_date;?>" 
						       id="date" style="width:150px;" readonly /> 
					</div>
					
					<label for="voucher_id" class="col-sm-2 col-form-label">Voucher No.:</label>

					<div class="col-sm-2">

                                                <input type="text" name="voucher_id" class="transparent_tag" 
                                                style="width:50px;" value ="<?php echo $data->voucher_id;?>"
                                                readonly />
					</div>

				  </div>

				  <div class="form-group row">	

					<label for="voucher_mode" class="col-sm-2 col-form-label">Mode:</label>

					<div class="col-sm-6">

						<input type="text" name="voucher_mode" class="transparent_tag" 
						style="width:80px;" value ="<?php $mode=$data->voucher_mode;
										  if($mode=='C'){
										  	$mode='CASH';	
										  }elseif($mode=='B'){
										  	$mode='BANK';
										  }elseif($mode=='T'){
										  	$mode='JOURNAL';
										  }
										  echo $mode;
									    ?>"
						readonly />

					</div>

								
					<label for="voucher_type" class="col-sm-2 col-form-label">Voucher Type:</label>

					<div class="col-sm-2">

						<input type ="text" name ="voucher_type"
						class = "transparent_tag" value="<?php $type = $data->voucher_type;
										   if($type=='R'){
										  	$type="Receipt";
										   }else{
										  	$type="Payment";
										   }
									  	   echo $type;	  
										  ?>"
						readonly />  
					</div>

				</div>
						

				<div class="form-group row">

					<label for="acc_cd" class="col-sm-2 col-form-label">A/C Head:</label>

					<div class="col-sm-10">
					 	
						<input type="text" name="acc_cd" class="transparent_tag"
						       style="width:200px; display:inline;" readonly
						       value= "<?php foreach($acc as $val){
						       			if($val->acc_code==$data->acc_code){
										echo $val->acc_head;
									}
								     }
								?>"				    
						/>

						<span style="float: right; display: inline;">
							<input type="text" id="dc" class="transparent_tag" 
							       name="dr_cr_flag"   
							       value="<?php echo $data->dr_cr_flag; ?>" readonly
							/>
						</span>

					</div>

				</div>

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">Cheque No.:</label>

					<div class="col-sm-4">

						<input type="text" name="inst_num" 
						       class="transparent_tag" 
						       value="<?php echo $data->ins_no;?>" readonly	
						/>	
						
					</div>

					<label for="ins_dt" class="col-sm-2 col-form-label">Cheque Date:</label>

					<div class="col-sm-4">

						<input type="date" class="transparent_tag" 
						       name="inst_dt" value="<?php echo $data->ins_dt;?>" readonly
						/>

					</div>

				</div>

								
				<div class="form-group row">

					<label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>

					<div class="col-sm-10">

						<textarea name="remarks" class="form-control" readonly>
						 	<?php echo $data->remarks; ?>
						</textarea>

					</div>

				</div>

				<hr class ="hr_divide">

				<table>
					<thead>
					<tr>
						<th width="50%">A/C Head</th>
						<th></th>
						<th>Amount</th>
					</tr>	
					</thead>	
					<tbody id="add">

					<?php
						foreach($row as $value){
					?>	
					<tr>
						<td><input type="text" class="form-control"  
							   name="acc_code[]" style="width: 100%;" 
							   value="<?php
									foreach($acc as $val){
									  if($val->acc_code==$value->acc_code){	
									     echo $val->acc_head;
									   }
									}
							   ?>" readonly />			
						</td>

						<td><input type="text" class="transparent_tag" 
						           id = "dc_flg" name="dc_flg[]" 
							   style = "width: 100%; text-align: center;" 
							   value = "<?php echo $value->dr_cr_flag; ?>"
							   readonly>
						</td>

						<td><input type="text" class="form-control amount_cls" 
							   id="amt"    name="amount[]" 
							   style="width: 100%; text-align: right;"
							   value="<?php echo $value->amount; ?>"
							   readonly />
						</td>
					</tr>
					<?php 
					     } 
					?>
					</tbody>

					<tr>
						<td colspan="3" style="text-align:right;"><strong>Total:</strong> 
							<input name="tot_amt" type="text" 
							       class="transparent_tag" id="tot_amt" 				   
							       style="text-align:left; color:#c1264d; font-size: 20px; width:16%;" 
							       value = "<?php echo $data->amount; ?>"
							       readonly />
						</td>
					</tr>
						   
				</table>	

				

				<div class="form-group row">

					<div class="col-sm-10">

						<input type="submit" name="submit" id="submit" value="Approve" class="btn btn-info" />

					</div>

				</div>

			</form>

		</div>		

	</div>
