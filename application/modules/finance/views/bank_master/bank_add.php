    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("finance/add_bank_master");?>" >

                <div class="form-header">
                
                    <h4>New Bank Details</h4>
                
                </div>

                <div class="form-group row">

                    <label for="acc_code" class="col-sm-2 col-form-label">Bank Name:</label>

                    <div class="col-sm-10">

			<Select name="acc_code" class="form-control required" id="acc_code">

				<option value="">Select Account Head</option>

					<?php foreach($achead as $a_list) {?>

						<option value="<?php echo $a_list->acc_code; ?>" ><?php echo $a_list->acc_head; ?></option>

					<?php
					}
					?>
			</select>

		    </div>

		</div>

		<div class="form-group row">

                    <label for="branch_name" class="col-sm-2 col-form-label">Branch:</label>

                    <div class="col-sm-10">

                        <input type="text" class= "form-control required" name = "branch_name" id   = "branch_name"/>

                    </div>

                </div>


                <div class="form-group row">

                    <label for="ac_type" class="control-lebel col-sm-2 col-form-label">A/C Type:</label>

                        <div class="col-sm-10">

			    <select class="form-control required" name="ac_type" id="ac_type">

                                <option value="">Select A/C Type</option>
				<option value="S">Savings</option>
				<option value="C">Current</option>
				<option value="L">Cash Credit</option>
				<option value="O">Over Draft</option>
                            </select>   

                        </div>
		</div>
		
		<div class="form-group row">

                    <label for="ac_no" class="col-sm-2 col-form-label">A/C No.:</label>

                    <div class="col-sm-10">

                        <input type="text" class= "form-control required" name = "ac_no" id = "ac_no"/>

                    </div>

		</div>
	
		<div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>
 
            </form>

        </div>

    </div>

<script>
	
	$( "#acc_code" ).select2();
	
</script>	
