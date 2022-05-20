    <div class="wraper">      
      <div class="col-md-3"></div>
        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("key/editunit");?>" >

                <div class="form-header">
                
                    <h4>Edit Unit</h4>
                
                </div>

                <div class="form-group row">

                    <label for="id" class="col-sm-2 col-form-label">ID:</label>

                    <div class="col-sm-10">

                        <input type="text" name="id" class="form-control required"  
                        value = "<?php echo $schdtls->id; ?>" readonly
                        />
                    </div>

                </div>

                <!-- <div class="form-group row">

                    <label for="Prod_type" class="col-sm-2 col-form-label">Product Type:</label>

                    <div class="col-sm-10">

                        <input type="text" name="Prod_type" class="form-control required"  
                        value = "<?php if($schdtls->prod_type==1){
                                            echo "Organic - Fertilizer";
                                          }elseif($schdtls->prod_type==2){
                                            echo "Bio- Fertilizer";  
                                          }elseif($schdtls->prod_type==3){
                                            echo "Others";
                                        //   }elseif($schdtls->acc_type==4){
                                        //     echo "Purchase";  
                                        //   }elseif($schdtls->acc_type==5){
                                        //     echo "Income";   
                                        //   }else{
                                        //     echo "Expense";  
                                          }
                                 ?>" readonly
                        />
                    </div>

                </div> -->

                <div class="form-group row">

                    <label for="unit_name" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <input type="text" name="unit_name" class="form-control required"  
                            value = "<?php echo $schdtls->unit_name; ?>" 
                        />
		            </div>

		</div>

  <!-- <div class="form-group row">

<label for="comp_add" class="col-sm-2 col-form-label">Address:</label>

<div class="col-sm-10">

    <textarea name="comp_add" class="form-control required">
        <?php echo $schdtls->comp_add; ?> 
   </textarea >
</div>

</div> -->

<!-- <div class="form-group row">

<label for="comp_email_id" class="col-sm-2 col-form-label">email:</label>

<div class="col-sm-10">

    <input type="text" name="comp_email_id" class="form-control required"  
        value = "<?php echo $schdtls->comp_email_id; ?>" 
    />
</div>

</div> -->
<!-- <div class="form-group row">

<label for="comp_pn_no" class="col-sm-2 col-form-label">Phone No:</label>

<div class="col-sm-10">

    <input type="text" name="comp_pn_no" class="form-control required"  
        value = "<?php echo $schdtls->comp_pn_no; ?>" 
    />
</div>

</div> -->

 <!-- <div class="form-group row">

<label for="gst_no" class="col-sm-2 col-form-label">GSTIN NO:</label>

<div class="col-sm-10">

    <input type="text" name="gst_no" class="form-control required"  
        value = "<?php echo $schdtls->gst_no; ?>" 
    />
</div>

</div> -->
<!-- <div class="form-group row">

<label for="hsn_code" class="col-sm-2 col-form-label">HSN:</label>

<div class="col-sm-10">

    <input type="text" name="hsn_code" class="form-control required"  
        value = "<?php echo $schdtls->hsn_code; ?>" 
    />
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


