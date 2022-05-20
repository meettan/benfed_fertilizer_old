    <div class="wraper">      
      <div class="col-md-3"></div>
        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("key/editcrNoteCatg");?>" >

                <div class="form-header">
                
                    <h4>Edit Category</h4>
                
                </div>

                <div class="form-group row">

                    <label for="id" class="col-sm-2 col-form-label">Sl.No.:</label>

                    <div class="col-sm-10">

                        <input type="text" name="sl_no" class="form-control required"  
                        value = "<?php echo $schdtls->sl_no; ?>" readonly
                        />
                    </div>

                </div>



                <div class="form-group row">

                    <label for="unit_name" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <input type="text" name="cat_desc" class="form-control required"  
                            value = "<?php echo $schdtls->cat_desc; ?>" 
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


