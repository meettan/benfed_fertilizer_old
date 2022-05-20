    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("finance/editAccount");?>" >

                <div class="form-header">
                
                    <h4>Edit Account Head</h4>
                
                </div>

                <div class="form-group row">

                    <label for="acc_code" class="col-sm-2 col-form-label">A/C Code:</label>

                    <div class="col-sm-10">

				<input type="text" name="acc_code" class="form-control required"  
				       value = "<?php echo $accdtls->acc_code; ?>" readonly
				 /> 
		    </div>

		</div>

                <div class="form-group row">

                    <label for="sch_name" class="col-sm-2 col-form-label">Schedule Type:</label>

		    <div class="col-sm-10">

			<select class="form-control required" name="sch_name">

				<option value="">Select</option>

				<?php foreach($schdtls as $value){ ?>

					<option value="<?php echo($value->schedule_code);?>"
						       <?php echo($accdtls->sch_code==$value->schedule_code)?'Selected':'';?>>
						       <?php echo ($value->schedule_type); ?>

				</option>

                <?php 
                    }
                ?>    
                                	
	 		</select>

		    </div>

		</div>

		<div class="form-group row">

                    <label for="acc_name" class="col-sm-2 col-form-label">A/C Head Name:</label>

                    <div class="col-sm-10">

			<input type="text" class= "form-control required" 
			       name = "acc_name" 
			       value = "<?php echo $accdtls->acc_head; ?>"	
			/>

                    </div>

                </div>


                <div class="form-group row">

                    <label for="ac_type" class="control-lebel col-sm-2 col-form-label">A/C Head Type:</label>

                        <div class="col-sm-10">

			    <select class="form-control required" name="ac_type">

                		<option value="">Select</option>
				<option value="B"<?php echo($accdtls->acc_flag=="B")?'Selected':'';?>>Balance Sheet</option>
				<option value="P"<?php echo($accdtls->acc_flag=="P")?'Selected':'';?>>Profit & Loss/Trading</option>

                            </select>   
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
