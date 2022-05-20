    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("finance/editSchedule");?>" >

                <div class="form-header">
                
                    <h4>Edit Schedule</h4>
                
                </div>

                <div class="form-group row">

                    <label for="schcd" class="col-sm-2 col-form-label">Sl.No.:</label>

                    <div class="col-sm-10">

			 
				<input type="text" name="schcd" class="form-control required"  
				       value = "<?php echo $schdtls->schedule_code; ?>" readonly
				 />
 

		    </div>

		</div>

                <div class="form-group row">

                    <label for="sch_name" class="col-sm-2 col-form-label">Schedule Name:</label>

                    <div class="col-sm-10">

			 
				<input type="text" name="sch_name" class="form-control required"  
				       value = "<?php echo $schdtls->schedule_type; ?>" 
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


