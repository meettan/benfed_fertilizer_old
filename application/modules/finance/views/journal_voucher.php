
<script>
	$(document).ready(function () {
		 var tot_amt = 0;
		$("#newrow").click(function(){
			$("#add").append('<tr><td><select id = "acc_code" name="acc_code[]" class="form-control" style="width: 100%;"><option value="0">Select</option><?php
		   				 foreach($row as $value){
		   				  	echo "<option value=".$value->acc_code.">".$value->acc_head."</option>";
		   				 }
		   			?></select></td><td><input type="text"  id="dc_flg" name="dc_flg[]" class="transparent_tag" style="width: 100%; text-align: center;" value="'+g_flg+'" readonly></td><td><input type="text" class="form-control amount_cls" style="width: 100%; text-align: right;" id="amt" name="amount[]" value=".00"></td><td><button type="button" class="btn btn-danger" id="removeRow"><i class="fa fa-undo" aria-hidden="true"></i></button></td></tr>');
			//$('.preferenceSelect').change();
		});

		$("#add").on('click','#removeRow',function(){
	        $(this).parent().parent().remove();
	        //$('.preferenceSelect').change();
	        $('.amount_cls').change();
	    });		

	    $('#add').on( "change", ".amount_cls", function() {
		
	     $("#tot_amt").val('');
	      var tot_amt = 0;
	      $('.amount_cls').each(function(){
	          tot_amt += +$(this).val();
	      });
	      $("#tot_amt").val(tot_amt);
	      
	    });
	});

</script>

	<div class="wraper">      
	
		<div class="col-md-6 container form-wraper">

			<form method="POST" action="<?php echo site_url("finance/f_new_cash_voucher")?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Journal Voucher Add</h4>
				
				</div>

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>

					<div class="col-sm-7">

						<input type = date  name = "voucher_dt" class="form-control smallinput_text" value="<?php echo $_SESSION['sys_date'];?>" style="width: 150px" /> 

					</div>

					<label for="trans_dt" class="col-sm-1 col-form-label">Mode:</label>

					<div class="col-sm-1">

						<input type="text" name="voucher_mode" value="Journal" class="transparent_tag" style="width:50px;" readonly />

					</div>

				</div>	

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">Voucher Type:</label>

					<div class="col-sm-10">

						<select name = "voucher_type" id = "v_type" style="width: 65%;" onchange="set_dr_cr()" class="form-control">
							<option value="0">Select</option>
							<option value="R">Received Voucher</option>
							<option value="P">Payment Voucher</option>
						</select>

					</div>

				</div>

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">A/C Head:</label>

					<div class="col-sm-10">

						<select name="acc_hd" class="form-control" style="width: 65%;">
							<option value="0">Select</option>
							<?php
								foreach($row as $value){
								echo "<option value='".$value->acc_code."'>".$value->acc_head."</option>";	
								}		 			 	
							?>
						</select>

						<span style="float: right; display: inline;">
							<input type="text" id="dc" class="transparent_tag" name="dr_cr_flag" value="" readonly>
						</span>

					</div>

				</div>

				<input type="hidden" name="acc_cd" value= "<?php echo $_SESSION['cash_code'];?>"/>
				
				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">Remarks:</label>

					<div class="col-sm-10">

						<textarea class="form-control" name="remarks" required></textarea>

					</div>

				</div>

				<hr class="hr">

				<table>
					<thead>
						<tr>
							<th width="50%">A/C Head</th>
							<th></th>
							<th>Amount</th>
							<th><button class="btn btn-success" type="button" id="newrow"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></button></th>
						</tr>	
					</thead>	
					<tbody id="add">
					<tr>
							<td><select  id ="acc_code" name="acc_code[]" class="form-control" style="width: 100%;">
								<option value="0">Select</option>
								<?php
									foreach($row as $value){
									echo "<option value=".$value->acc_code.">".$value->acc_head."</option>";
									}
								?>
								</select>
							</td>
							<td><input type="text" class="transparent_tag" id="dc_flg" name="dc_flg[]" style="width: 100%; text-align: center;" readonly></td>

							<td><input type="text" class="form-control amount_cls" id="amt" name="amount[]" style="width: 100%; text-align: right;" value=.00></td>
					</tr>
					</tbody>
					<tr>
							<td colspan="3" style="text-align:right;"><strong>Total:</strong> <input name="tot_amt" type="text" class="transparent_tag" id="tot_amt" style="text-align:left; color:#c1264d; font-size: 25px; width:16%;" readonly></td>
					</tr>

				</table>

				<div class="form-group row">

					<div class="col-sm-10">

						<input type="submit" name="submit" value="Save" class="btn btn-info" />

					</div>

				</div>

			</form>

		</div>		

	</div>

<script>
	var g_flg;

	function set_dr_cr(){
		var flag;

		if (document.getElementById('v_type').value=='R'){
			flag = 'Dr';	
			g_flg = 'Cr';
		}else if(document.getElementById('v_type').value=='P'){
			flag = 'Cr';
			g_flg = 'Dr';
		 }else{
		 	flag = '';
		 	g_flg = '';	
		  }

		document.getElementById('dc').value = flag;
		document.getElementById('dc_flg').value = g_flg;
	}	


	function valid_data(){
		var voucher_type = document.getElementById('v_type').value;
		if(voucher_type=='0'){
			alert("Please Supply Voucher Type");
			return false;
		}

		var dc_flag = document.getElementById('dc').value;
		if(dc_flag.trim()==''){
			alert("Please Supply Voucher Type");
			return false;
		}

		var acc_cd = document.getElementById('acc_code').value;
		if(acc_cd=='0'){
			alert("Please Supply Valid A/C Head");
			return false;
		}

		var amount = document.getElementById('amt').value;
		if(amount=='0.00'){
			alert("Invalid Amount");
			return false;
		}

	}		
</script>	
