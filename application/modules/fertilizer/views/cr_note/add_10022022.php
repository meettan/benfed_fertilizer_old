<div class="wraper">      
            <div class="col-md-2 container"></div>
			<div class="col-md-8 container form-wraper">
	
			<form method="POST" action="<?php echo site_url("drcrnote/crnoteAdd") ?>" onsubmit="return valid_data()" id="form">
	
					<div class="form-header">
					
						<h4>Add Credit Note</h4>
					
					</div>
									
                    <div class="form-group row">

                      <!--<label for="ro_no" class="col-sm-2 col-form-label">Society:</label>-->
						<!--<div class="col-sm-4">

                           <select name="soc_id" id="soc_id" class="form-control soc_id" required>
                              <option value="">Select Society</option>
                            <?php
                            //foreach($socdtls as $key1)
                            { ?>
                                <option value="<?php //echo $key1->soc_id; ?>"><?php //echo $key1->soc_name; ?></option>
                            <?php
                            } ?>
                            </select> 
	              
	                    </div>-->

                        <label for="ro_no" class="col-sm-2 col-form-label">Company:</label>

                       <div class="col-sm-4">
    
                            <select name="comp_id" id="comp_id" class="form-control comp_id" required>
                              <option value="">Select Company</option>
                            <?php
                                foreach($compdtls as $row)
                            { ?>
                                <option value="<?php echo $row->comp_id; ?>"><?php echo $row->comp_name; ?></option>
                            <?php
                            } ?>
                            </select> 
                       </div>


                    </div>



                    <div class="form-group row">

                        <label for="trans_dt" class="col-sm-2 col-form-label">Credit Note Date:</label>

						<div class="col-sm-4">
						<input type="date" id="trans_dt" name="trans_dt" class="form-control" required />
	                    </div>

                        <label for="dr_amt" class="col-sm-2 col-form-label">Amount:</label>

                        <div class="col-sm-4">
                        <input type="text" id="tot_amt" name="tot_amt" class="form-control" required />
                        </div>


                    </div>


                       <div class="form-group row">

                        <label for="dr_amt" class="col-sm-2 col-form-label">Remarks:</label>

                        <div class="col-sm-10">
                          <textarea id="remarks" name="remarks" class="form-control"></textarea>
                       
                        </div>

                       

                    </div>
						
             
                
                 <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" id= "submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </form>


        </div>

    </div>

</div>