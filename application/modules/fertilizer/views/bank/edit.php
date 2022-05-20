    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="product" action="<?php echo site_url("key/editbank");?>" >

                <div class="form-header">
                
                    <h4>Edit Bank</h4>
                
                </div>

                <div class="form-group row">

                    <label for="bank_id" class="col-sm-2 col-form-label">Bank ID:</label>

                    <div class="col-sm-10">

                        <input type="text" name="bank_id" class="form-control required"  
                        value = "<?php echo $schdtls->sl_no; ?>" readonly
                        />
                    </div>

                </div>

               
                <div class="form-group row">

                    <label for="bank_name" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <input type="text" name="bank_name" class="form-control required"  
                            value = "<?php echo $schdtls->bank_name; ?>" 
                        />
		            </div>

		        </div>

        
                <div class="form-group row">

                    <label for="soc_add" class="col-sm-2 col-form-label">Branch:</label>

                    <div class="col-sm-10">

                    <input type="text" id=branch_name name="branch_name" class="form-control" 
                        value = "<?php echo $schdtls->branch_name; ?>" required />
                    </div>

                </div>
   
                <div class="form-group row">

				    <label for="bank_ac" class="col-sm-2 col-form-label">A/C No.:</label>

				    <div class="col-sm-4">

					    <input type="text" id=bank_ac name="bank_ac" class="form-control"  
                            value = "<?php echo $schdtls->ac_no; ?>" required />

				    </div>

				    <label for="ifs" class="col-sm-1 col-form-label">IFS Code:</label>

				    <div class="col-sm-4">

					    <input type="text" id=ifs name="ifs" class="form-control" 
                            value = "<?php echo $schdtls->ifsc; ?>" required />

				    </div>

			    </div>
				
			<div class="form-group row">

				<div class="col-sm-10">

					<input type="submit" id="submit" class="btn btn-info" value="Save" />

				</div>

			</div>

		</form>

	</div>	

</div>