    <div class="wraper">      
         <div class="col-md-3 container"></div>
        <div class="col-md-6 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("key/categoryedit");?>" >
                     <input type="hidden" name="sl_no" class="form-control"  
                            value = "<?php echo $schdtls->sl_no; ?>" 
                        />
                <div class="form-header">
                
                    <h4>Edit Category</h4>
                
                </div>

                <div class="form-group row">
                <label for="comp_id" class="col-sm-3 col-form-label">Company :</label>
                <div class="col-sm-9">

                    <select name="comp_id" class="form-control required" id="comp_id">

                        <option value="">Select Company</option>

                            <?php

                                foreach($compdtls as $comp){

                            ?>

                                <option value="<?php echo $comp->comp_id;?>" <?php if($comp->comp_id==$schdtls->comp_id){echo "selected";}?>><?php echo $comp->comp_name;?></option>

                            <?php

                            }

                            ?>     

                    </select>

                </div>
                
            </div>

              
            

                <div class="form-group row">

                    <label for="prod_desc" class="col-sm-3 col-form-label">Category Description:</label>

                    <div class="col-sm-9">
                        <textarea name="cate_desc" class="form-control" required=""><?php echo $schdtls->cate_desc; ?></textarea>
                       <!--  <input type="text" name="prod_desc" class="form-control required"  
                            value = "<?php //echo $schdtls->cate_desc; ?>" 
                        /> -->
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