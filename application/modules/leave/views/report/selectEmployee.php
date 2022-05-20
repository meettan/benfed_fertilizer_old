<div class="wraper">      

    <div class="col-md-6 container form-wraper">

        <form method="POST" id="form" role="form" name="add_form" action="<?php echo site_url("leave/showEmployeeLedger");?>" >
            

            <div class="form-header">
            
                <h4>Employee Leave Ledger</h4>
            
            </div>
            
            <div class="form-group row">

                <label for="emp_no" class="col-sm-2 col-form-label">Search For:<font color="red">*</font></label>

                <div class="col-sm-8">

                    <select name="emp_no" id="emp_no" class= "form-control required" required>
                        <option value="">Select Employee</option>
                        <?php foreach($data as $key){ ?>
                            <option value="<?php echo $key->emp_code; ?>"><?php echo $key->emp_name; ?></option>
                        <?php } ?>
                        
                    </select>
                            
                </div>

            </div>

            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" class="btn btn-info" id= "submit" value="Show" />

                </div>

            </div>

        </form>


    </div>

</div>

