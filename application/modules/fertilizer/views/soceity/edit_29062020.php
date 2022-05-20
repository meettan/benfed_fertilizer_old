    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("fertilizer/editsoceity");?>" >

                <div class="form-header">
                
                    <h4>Edit Stock Point/Society</h4>
                
                </div>

                <div class="form-group row">

                    <label for="soc_id" class="col-sm-2 col-form-label">Id:</label>

                    <div class="col-sm-10">

                        <input type="text"  style="width:80px;" name="soc_id" class="form-control required"  
                        value = "<?php echo $schdtls->soc_id; ?>" readonly
                        />
                    </div>

                </div>

               
                <div class="form-group row">

                    <label for="soc_name" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <input type="text" name="soc_name" class="form-control required"  
                            value = "<?php echo $schdtls->soc_name; ?>" 
                        />
		            </div>

		</div>

        
        <div class="form-group row">

<label for="soc_add" class="col-sm-2 col-form-label">Address:</label>

<div class="col-sm-10">

    <textarea name="soc_add" class="form-control required"  
        
    /><?php echo $schdtls->soc_add; ?></textarea>
</div>

</div>
   
<div class="form-group row">

<label for="gstin" class="col-sm-2 col-form-label">GSTIN:</label>

<div class="col-sm-4">

    <input type="text" name="gstin" class="form-control required"  
        value = "<?php echo $schdtls->gstin; ?>" 
    />
</div>
<label for="mfms" class="col-sm-2 col-form-label">mFMS:</label>

<div class="col-sm-4">

    <input type="text" name="mfms" class="form-control required"  
        value = "<?php echo $schdtls->mfms; ?>" 
    />
</div>
</div>
<div class="form-group row">

<label for="ph_no" class="col-sm-2 col-form-label">Ph No.:</label>

<div class="col-sm-10">

    <input type="text" name="ph_no" class="form-control required"  
        value = "<?php echo $schdtls->ph_no; ?>" 
    />
</div>

</div>
<div class="form-group row">

<label for="email" class="col-sm-2 col-form-label">email:</label>

<div class="col-sm-10">

    <input type="text" name="email" class="form-control required"  
        value = "<?php echo $schdtls->email; ?>" 
    />
</div>

</div>
<div class="form-group row">

<label for="stock_point_flag" class="col-sm-2 col-form-label">Stock Point:</label>

<div class="col-sm-3">


    <select class="col-sm-3"
                        name="stock_point_flag"
                        id="stock_point_flag" style="width:80px;height:40px"
                    >
                    
                    <option value="">Select</option>
                    <option value="1" <?php echo ($schdtls->stock_point_flag == '1')? 'selected' : '';?>>YES</option>
                    <option value="2" <?php echo ($schdtls->stock_point_flag == '2')? 'selected' : '';?>>No</option>

                </select>  
</div>
<label for="buffer_flag" class="col-sm-1 col-form-label">Buffer Flag:</label>

<div class="col-sm-2">

      <select class="col-sm-3"
                        name="buffer_flag"
                        id="buffer_flag" style="width:80px;height:40px"
                    >
                    
                    <option value="">Select</option>
                    <option value="1" <?php echo ($schdtls->buffer_flag == '1')? 'selected' : '';?>>YES</option>
                    <option value="2" <?php echo ($schdtls->buffer_flag == '2')? 'selected' : '';?>>No</option>

                </select>  
</div>
<label for="status" class="col-sm-1 col-form-label">status:</label>

<div class="col-sm-3">

	<select class="form-control" id="status" name="status" required>
		
		<option value="">Select</option>
        <option value="1" <?php echo ($schdtls->status == '1')? 'selected' : '';?>>Own</option>
                    <option value="2" <?php echo ($schdtls->status == '2')? 'selected' : '';?>>Rented</option>
		
	</select>

</div>

</div>


<!-- <div class="form-group row">

<label for="buffer_flag" class="col-sm-2 col-form-label">Buffer Flag:</label>

<div class="col-sm-10">

      <select class="col-sm-10"
                        name="buffer_flag"
                        id="buffer_flag" style="width:300px;height:40px"
                    >
                    
                    <option value="">Select</option>
                    <option value="1" <?php echo ($schdtls->buffer_flag == '1')? 'selected' : '';?>>YES</option>
                    <option value="2" <?php echo ($schdtls->buffer_flag == '2')? 'selected' : '';?>>No</option>

                </select>  
</div>

</div> -->

		<div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>
 
            </form>

        </div>

    </div>


