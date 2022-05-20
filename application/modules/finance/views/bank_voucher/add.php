<script>
	$(document).ready(function () {
		 var tot_amt = 0;
		$("#newrow").click(function(){
			$("#add").append('<tr><td><select id = "acc_code" class="form-control" name="acc_code[]" class="input_text" style="width: 100%;" required><option value="">Select</option><?php
		   				 foreach($row as $value){
		   				  	echo "<option value=".$value->acc_code.">".$value->acc_head."</option>";
		   				 }
		   			?></select></td><td><input type="text"  id="dc_flg" name="dc_flg[]" class="transparent_tag" style="width: 100%; text-align: center;" value="'+g_flg+'" readonly></td><td><input type="text" class="form-control amount_cls" style="width: 100%; text-align: right;" id="amt" name="amount[]" required></td><td><button type="button" class="btn btn-danger" id="removeRow"><i class="fa fa-undo" aria-hidden="true"></i></button></td></tr>');
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

	    $('#submit').click(function(){

	    	var date = $('#date').val(),

	    		sys_date = $('#sys_date').val();

	    	if(new Date(date) > new Date(sys_date)) {

	    		alert("Invalid Date");

	    		return false;

	    	}
	    	else {

	    		$('#submit').prop('type', 'submit');

	    		return true;

	    	}

	    });

	    
	});

</script>

	<div class="wraper">      
            
		<div class="col-md-6 container form-wraper">

			<form method="POST" action="<?php echo site_url("finance/addBankVoucher")?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Bank Voucher</h4>
				
				</div>

				<input type="hidden" id="sys_date" value="<?php echo $_SESSION['sys_date'];?>">

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>

					<div class="col-sm-7">

						<input type = date  name = "voucher_dt" class="form-control smallinput_text" value="<?php echo $_SESSION['sys_date'];?>" id="date" style="width: 150px;" required /> 

					</div>

					<label for="voucher_mode" class="col-sm-1 col-form-label">Mode:</label>

					<div class="col-sm-1">

						<input type="text" name="voucher_mode" value="BANK" class="transparent_tag" style="width:50px;" readonly />

					</div>

				</div>	

				<div class="form-group row">

					<label for="voucher_type" class="col-sm-2 col-form-label">Voucher Type:</label>

					<div class="col-sm-10">

						<select class="form-control" name = "voucher_type" id = "v_type" onchange="set_dr_cr()" class="input_text" required>
							<option value="">Select</option>
							<option value="R">Bank Received</option>
							<option value="P">Bank Payment</option>
						</select>

					</div>

				</div>

				<div class="form-group row">

					<label for="acc_cd" class="col-sm-2 col-form-label">Bank A/C:</label>

					<div class="col-sm-10">

						<select name="acc_cd" class="form-control" style="width:180px;display: inline;" >
							<option value="0">Select</option>	
							<?php
								foreach($bank as $value){
									echo "<option value='".$value->acc_code."'>".$value->bank_name."</option>";			 
								}				 			 	
							?>
						</select>

						<span style="float: right; display: inline;">
							<input type="text" id="dc" class="transparent_tag" name="dr_cr_flag" value="" readonly>
						</span>

					</div>

				</div>

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">Cheque No.:</label>

					<div class="col-sm-4">

						<input type="text" name="inst_num" class="form-control smallinput_text">	
						
					</div>

					<label for="trans_dt" class="col-sm-2 col-form-label">Cheque Date:</label>

					<div class="col-sm-4">

						<input type="date" class="form-control smallinput_text" name="inst_dt" >

					</div>

				</div>

								
				<div class="form-group row">

					<label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>

					<div class="col-sm-10">

						<textarea class="form-control" name="remarks" required></textarea>

					</div>

				</div>

				<hr class ="hr_divide">

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
						<td><select class="form-control" id ="acc_code" name="acc_code[]" class="input_text" style="width: 100%;" required>
								<option value="">Select</option>
								<?php
									foreach($row as $value){
										echo "<option value=".$value->acc_code.">".$value->acc_head."</option>";
									}
								?>
						</select></td>
						<td><input type="text" class="transparent_tag" id="dc_flg" name="dc_flg[]" style="width: 100%; text-align: center;" readonly></td>
						<td><input type="text" class="form-control amount_cls" id="amt" name="amount[]" style="width: 100%; text-align: right;" required></td>
					</tr>
					</tbody>
					<tr>
						<td colspan="3" style="text-align:right;"><strong>Total:</strong> <input name="tot_amt" type="text" class="transparent_tag" id="tot_amt" 				   style="text-align:left; color:#c1264d; font-size: 25px; width:16%;" readonly>
						</td>
					</tr>
						   
				</table>	

				

				<div class="form-group row">

					<div class="col-sm-10">

						<input type="button" name="submit" id="submit" value="Save" class="btn btn-info" />

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
			alert("Invalid Input");
			return false;
		}

		var dr_cr = document.getelementById('dc_flg').value;
		if(dr_cr.trim()==''){
			alert("Invalid Input");
			return false;
		}

	}		


</script>	