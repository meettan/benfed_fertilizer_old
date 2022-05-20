    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("finance/editBankMaster");?>" >

                <div class="form-header">
                
                    <h4>Edit Bank Details</h4>
                
                </div>

                <div class="form-group row">

                    <label for="acc_code" class="col-sm-2 col-form-label">A/C Code:</label>

                    <div class="col-sm-10">

			 
				<input type="text" name="acc_code" class="form-control required" id="acc_code" 
				       value = "<?php echo $bankdtls->acc_code; ?>" readonly
				 />
 

		    </div>

		</div>

                <div class="form-group row">

                    <label for="bank_name" class="col-sm-2 col-form-label">Bank Name:</label>

                    <div class="col-sm-10">

			 
				<input type="text" name="bank_name" class="form-control required" id="bank_name" 
				       value = "<?php echo $bankdtls->bank_name; ?>" readonly
				 />
 

		    </div>

		</div>

		<div class="form-group row">

                    <label for="branch_name" class="col-sm-2 col-form-label">Branch:</label>

                    <div class="col-sm-10">

			<input type="text" class= "form-control required" 
			       name = "branch_name" id   = "branch_name"
			       value = "<?php echo $bankdtls->branch_name; ?>"	
			/>

                    </div>

                </div>


                <div class="form-group row">

                    <label for="ac_type" class="control-lebel col-sm-2 col-form-label">A/C Type:</label>

                        <div class="col-sm-10">

			    <select class="form-control required" name="ac_type" id="ac_type">

                <option value="">Select A/C Type</option>
                
				<option value="S"<?php echo($bankdtls->ac_type=="S")?'Selected':'';?>>Savings</option>
				<option value="C"<?php echo($bankdtls->ac_type=="C")?'Selected':'';?>>Current</option>
				<option value="L"<?php echo($bankdtls->ac_type=="L")?'Selected':'';?>>Cash Credit</option>
				<option value="O"<?php echo($bankdtls->ac_type=="O")?'Selected':'';?>>Over Draft</option>
                            </select>   

                        </div>
		</div>
		
		<div class="form-group row">

                    <label for="ac_no" class="col-sm-2 col-form-label">A/C No.:</label>

                    <div class="col-sm-10">

			<input type="text" class= "form-control required" 
			       name = "ac_no" id = "ac_no"
			       value="<?php echo $bankdtls->ac_no; ?>" 	
			/>

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

