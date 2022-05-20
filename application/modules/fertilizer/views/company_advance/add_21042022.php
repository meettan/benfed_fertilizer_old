<div class="wraper">      
            
	<div class="col-md-10 container form-wraper">

		<form method="POST" id="form" action="<?php echo site_url("adv/company_advAdd") ?>" >

			<div class="form-header">
				<h4>Add Company Advance</h4>
			</div>

            <div class="form-group row">
				<label for="company" class="col-sm-2 col-form-label">Company:</label>
				<div class="col-sm-4">

					<select name="company" class="form-control required" id="company" required>

						<option value="">Select Company</option>
                        <?php
                            foreach($compDtls as $comp){
                        ?>
                        <option value="<?php echo $comp->comp_id;?>"><?php echo $comp->comp_name;?></option>
                        <?php
                            }
                        ?>     
                    </select>
                </div>

                <label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>
				<div class="col-sm-4">

					<input type="date" id=trans_dt name="trans_dt" class="form-control" value="<?=date('Y-m-d')?>" readonly />

				</div>

            </div>
			<div class="form-group row">
				<label for="dist" class="col-sm-2 col-form-label">District:</label>
				<div class="col-sm-4">

					<select name="dist" class="form-control required" id="dist" required>

						<option value="">Select District</option>
                        <?php
                            foreach($distDtls as $dist){
                        ?>
                        <option value="<?php echo $dist->district_code;?>"><?php echo $dist->district_name;?></option>
                        <?php
                            }
                        ?>     
                    </select>
                </div>

				<label for="bank" class="col-sm-2 col-form-label">Bank:</label>
				<div class="col-sm-4">

					<select name="bank" class="form-control required" id="bank" required>
						<option value="">Select Bank</option>
                        <?php
                            foreach($bankDtls as $bank){
                        ?>
                        <option value="<?php echo $bank->sl_no;?>"><?php echo $bank->bank_name;?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
		</div>

            <div class="form-group row">
            <div></div>
            </div>

			<div class="form-group row">
				<label for="trans_type" class="col-sm-2 col-form-label">Transaction Type:</label>
				<div class="col-sm-4">
                <input type="hidden" id="trans_type" name="trans_type" class="form-control" value="I" />
                <input type="text" id="view_type" name="view_type" class="form-control" value="Advance Deposit to company" readonly />  

			</div>

                <label for="bank" class="col-sm-2 col-form-label">Debit Account Head:</label>
				<div class="col-sm-4">

					<select name="cr_head" class="form-control sch_cd" id="cr_head" required>
						<option value="">Select Account head</option>
                        <?php
                            foreach($acc_head as $key){
                        ?>
                        <option value="<?php echo $key->sl_no;?>"><?php echo $key->ac_name;?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
			</div>
          
            <div class="form-group row">
				<label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
				<div class="col-sm-10">
                    <textarea id=remarks name="remarks" class="form-control"  required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                <table class="table table-bordered">
                        <tbody id='list'></tbody>
                    </table>
                </div>	
            </div>
            <div class="form-group row">                
				<div class="col-sm-10">

					<input type="submit" id="submit" class="btn btn-info" value="Save" />

				</div>
            </div>
			</div>

		</form>

	</div>	

</div>
<script>
    $("#dist").change(function(){
        var dist = $(this).val();
        $("#list").html('');
        $.ajax({
        type:'POST',
        url: '<?=base_url()?>index.php/adv/company_advAddlist',
        data: {dist:dist},
        success: function(data){
            var tot_amt = 0.0;
            var i  = 0; var j = 0;
            var list = '<tr><th>Sl No</th><th style="width:33%">Advance No</th><th style="width:33%">Society Name</th><th style="width:33%">Amount</th><th>Option</th></tr>';
            $.each(JSON.parse(data), function(index, value) {
                list += '<tr><td>'+ ++i +'</td><td><input type="hidden" class="form-control" value="'+value.receipt_no+'" name="adv_receive_no[]" readonly>'+value.receipt_no+'</td><td>'+value.soc_name+'</td><td>'+value.adv_amt+'</td><td><input type="checkbox" id="ckamt" name="ckamt['+ j++ +'][list]"  value ='+value.receipt_no+' class="ckamt"></td></tr>';
                tot_amt += parseFloat(value.adv_amt);
            });  
            list += '<tr style="font-weight: bold;"><td colspan="3">Total</td><td>'+tot_amt+'</td><td id="approve_tot">0.00</td></tr>';
        $("#list").html(list);
        }});
    });

    $(document).ajaxComplete(function() {

        $('.ckamt').change(function() {
            var approve_tot = parseFloat($('#approve_tot').html());
            var amt = 0.00; 
            $('.ckamt:checked').each(function() {
                amt += parseFloat($(this).parents('tr').find("td").eq(3).html()); 
            });
            $('#approve_tot').html(amt);
        });
   });
   $(document).ajaxComplete(function() {
    $('#form').submit(function(event){
        var approve_tot = parseFloat($('#approve_tot').html());  
            
            if(parseFloat(approve_tot) < parseFloat(100.00) ){

                alert("Please check a advance");
                event.preventDefault();
            }
            else{
                
                $('#submit').attr('type', 'submit');
            }

    });
   });
</script>