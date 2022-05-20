    <div class="wraper">      
 <div class="col-md-3 container"></div>
        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("key/editproduct");?>" >

                <div class="form-header">
                
                    <h4>Edit Product</h4>
                
                </div>

                <div class="form-group row">

                    <label for="prod_id" class="col-sm-2 col-form-label">Product ID:</label>

                    <div class="col-sm-10">

                        <input type="text" name="prod_id" class="form-control required"  
                        value = "<?php echo $schdtls->prod_id; ?>" readonly
                        />
                    </div>

                </div>

                <div class="form-group row">

                    <label for="comp_id" class="col-sm-2 col-form-label">Company Name:</label>

                    <div class="col-sm-10">

                            <select name="comp_id" class="form-control required" id="comp_id">

                        <option value="">Select Company</option>

                            <?php

                                foreach($compdtls as $comp){

                            ?>

                                <option value="<?php echo $comp->comp_id;?>" <?php if($comp->comp_id == $schdtls->company) {echo "Selected";}?>><?php echo $comp->comp_name;?></option>

                            <?php

                            }

                            ?>     

                    </select>

                       <!--  <input type="text" name="comp_id" class="form-control required"  
                            value = "<?php echo $schdtls->comp_name; ?>" 
                            readonly /> -->
                    </div>
                </div>

                <div class="form-group row">

                    <label for="Prod_type" class="col-sm-2 col-form-label">Type:</label>

                    <div class="col-sm-4">

                        <select class="form-control required" id="prod_type" name="prod_type"  required>
                            
                            <option value="">Select Product Type</option>

                            <option value="1" <?php echo ($schdtls->prod_type == 1)? 'selected' : '';?>>Chemical-Fertilizer</option>
                            
                            <option value="2" <?php echo ($schdtls->prod_type == 2)? 'selected' : '';?>>Organic-Fertilizer</option>

                            <option value="3" <?php echo ($schdtls->prod_type == 3)? 'selected' : '';?>>Bio-Fertilizer</option>
                        
                        </select>
                    </div>

                    <label for="mat_state" class="col-sm-2 col-form-label">Material State:</label>

                    <div class="col-sm-4">

                        <select class="form-control required" id="mat_state" name="mat_state"  required>
                            
                            <option value="">Select Material State</option>

                            <option value="1" <?php echo ($schdtls->mat_state == 1)? 'selected' : '';?>>Solid</option>
                            
                            <option value="2" <?php echo ($schdtls->mat_state == 2)? 'selected' : '';?>>Liquid</option>

                            
                        
                        </select>
                    </div>
			    </div>

                <div class="form-group row">

                    <label for="prod_desc" class="col-sm-2 col-form-label">Product Name:</label>

                    <div class="col-sm-10">

                        <input type="text" name="prod_desc" class="form-control required"  
                            value = "<?php echo $schdtls->prod_desc; ?>" 
                        />
		            </div>

		        </div>

                <div class="form-group row">

                    <label for="gst_rt" class="col-sm-2 col-form-label">GST Rate:</label>

                    <div class="col-sm-10">

                        <input type="text" name="gst_rt" class="form-control required"  
                            value = "<?php echo $schdtls->gst_rt; ?>" 
                        />
                    </div>

                </div>

                <div class="form-group row">

                    <label for="hsn_code" class="col-sm-2 col-form-label">HSN:</label>

                    <div class="col-sm-10">

                        <input type="text" name="hsn_code" class="form-control required"  
                            value = "<?php echo $schdtls->hsn_code; ?>" 
                        />
                    </div>

                </div>

                <div class="form-group row">

				<label for="unit" class="col-sm-2 col-form-label">Unit:</label>

				<div class="col-sm-4">

					<select name="unit" class="form-control required" id="unit">

						<option value="">Select Unit</option>

							<?php

								foreach($unitdtls as $unt){

							?>

                                <option value="<?php echo $unt->id;?>" <?php if($unt->id == $schdtls->unit) {echo "Selected";}?>><?php echo $unt->unit_name;?></option>

							<?php

							}

							?>     

					</select>

				</div>

				<label for="storage" class="col-sm-2 col-form-label">Container:</label>

				<div class="col-sm-4">

					<select class="form-control required" id="storage" name="storage"  required>
						
						<option value="">Select Container</option>

                        <option value="B" <?php echo ($schdtls->storage == 'B')? 'selected' : '';?>>Bag</option>

                        <option value="T" <?php echo ($schdtls->storage == 'T')? 'selected' : '';?>>Bottle</option>

                        <option value="P" <?php echo ($schdtls->storage == 'P')? 'selected' : '';?>>Bucket</option>

					</select>
				</div>

			</div>
			

                <div class="form-group row">

                    <label for="bag" class="col-sm-2 col-form-label">Quantity per Container(KG/ML):</label>

                    <div class="col-sm-10">

                        <input type="text" id=bag name="bag" class="form-control" value="<?php echo $schdtls->qty_per_bag; ?>" required />
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