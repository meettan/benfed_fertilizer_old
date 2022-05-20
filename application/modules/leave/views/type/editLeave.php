<div class="wraper">      

    <div class="col-md-6 container form-wraper">

        <form method="POST" id="form" role="form" name="add_form" action="<?php echo site_url("leave/updateLeaveType");?>" >
            

            <div class="form-header">
            
                <h4>Add Leave Type</h4>
            
            </div>

            <?php foreach($data as $key){ ?>

                <div class="form-group row">

                    <label for="type" class="col-sm-2 col-form-label">Leave Type:<font color="red">*</font></label>

                    <div class="col-sm-4">

                        <select name="type" id="type" class= "form-control required" required>
                            <option value="CL" <?php if($key->type == "CL"){ ?> selected = "selected"<?php } ?> >CL</option>
                            <option value="EL" <?php if($key->type == "EL"){ ?> selected = "selected"<?php } ?> >EL</option>
                            <option value="ML" <?php if($key->type == "ML"){ ?> selected = "selected"<?php } ?> >ML</option>
                            
                        </select>

                        <input type="hidden" name= "sl_no" id= "sl_no" value= "<?php echo $key->sl_no; ?>" > 

                    </div>

                </div>

                <div class="form-group row">

                    <label for="start_month" class="col-sm-2 col-form-label">Valid From:<font color="red">*</font></label>

                    <div class="col-sm-4">

                        <select name="start_month" id="start_month" class= "form-control required" required>
                            
                            <option value="1" <?php if($key->start_month == "1"){ ?> selected = "selected"<?php } ?> >January</option>
                            <option value="2" <?php if($key->start_month == "2"){ ?> selected = "selected"<?php } ?>>February</option>
                            <option value="3" <?php if($key->start_month == "3"){ ?> selected = "selected"<?php } ?>>March</option>
                            <option value="4" <?php if($key->start_month == "4"){ ?> selected = "selected"<?php } ?>>April</option>
                            <option value="5" <?php if($key->start_month == "5"){ ?> selected = "selected"<?php } ?>>May</option>
                            <option value="6" <?php if($key->start_month == "6"){ ?> selected = "selected"<?php } ?>>June</option>
                            <option value="7" <?php if($key->start_month == "7"){ ?> selected = "selected"<?php } ?>>July</option>
                            <option value="8" <?php if($key->start_month == "8"){ ?> selected = "selected"<?php } ?>>August</option>
                            <option value="9" <?php if($key->start_month == "9"){ ?> selected = "selected"<?php } ?>>September</option>
                            <option value="10" <?php if($key->start_month == "10"){ ?> selected = "selected"<?php } ?>>October</option>
                            <option value="11" <?php if($key->start_month == "11"){ ?> selected = "selected"<?php } ?>>November</option>
                            <option value="12" <?php if($key->start_month == "12"){ ?> selected = "selected"<?php } ?>>December</option>
                        
                        </select>
                        
                    </div>

                    <label for="end_month" class="col-sm-2 col-form-label">Valid Upto:<font color="red">*</font></label>

                    <div class="col-sm-4">

                        <select name="end_month" id="end_month" class= "form-control required" required>
                            
                            <option value="1" <?php if($key->end_month == "1"){ ?> selected = "selected"<?php } ?>>January</option>
                            <option value="2" <?php if($key->end_month == "2"){ ?> selected = "selected"<?php } ?>>February</option>
                            <option value="3" <?php if($key->end_month == "3"){ ?> selected = "selected"<?php } ?>>March</option>
                            <option value="4" <?php if($key->end_month == "4"){ ?> selected = "selected"<?php } ?>>April</option>
                            <option value="5" <?php if($key->end_month == "5"){ ?> selected = "selected"<?php } ?>>May</option>
                            <option value="6" <?php if($key->end_month == "6"){ ?> selected = "selected"<?php } ?>>June</option>
                            <option value="7" <?php if($key->end_month == "7"){ ?> selected = "selected"<?php } ?>>July</option>
                            <option value="8" <?php if($key->end_month == "8"){ ?> selected = "selected"<?php } ?>>August</option>
                            <option value="9" <?php if($key->end_month == "9"){ ?> selected = "selected"<?php } ?>>September</option>
                            <option value="10" <?php if($key->end_month == "10"){ ?> selected = "selected"<?php } ?>>October</option>
                            <option value="11" <?php if($key->end_month == "11"){ ?> selected = "selected"<?php } ?>>November</option>
                            <option value="12" <?php if($key->end_month == "12"){ ?> selected = "selected"<?php } ?>>December</option>

                        </select>
                        
                    </div>

                </div>

                <div class="form-group row">

                    <label for="amount" class="col-sm-2 col-form-label">Amount:<font color="red">*</font></label>
                    
                    <div class="col-sm-4">

                        <input type="text" name="amount" value= "<?php echo $key->amount ?>" class="form-control required" id="amount" required>
                                
                    </div>
                
                <label for="start_month" class="col-sm-2 col-form-label">Next Credit On:</label>

                    <div class="col-sm-4">

                        <input type="date" name= "credit_on" value= "<?php echo $key->credit_on; ?>" id= "credit_on" class= "form-control required" required>

                    </div>

                </div>

            <?php } ?>

            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" class="btn btn-info" id= "submit" value="Save" />

                </div>

            </div>

        </form>


    </div>

</div>



<!-- To get Next Credit date as per from_dt and current year -->
<script>

    $(document).ready(function(){

        $('#start_month').on('change', function(){

            var start_month = $(this).val();
            let length_month = start_month.length;
            
            var dt = new Date();
            var cur_yr = dt.getFullYear();
            var credit_yr = parseInt(cur_yr)+1;
            
            if(length_month == 1)
            {
                var credit_dt = credit_yr+'-0'+start_month+'-01';
            }
            else if(length_month == 2)
            {
                var credit_dt = credit_yr+'-'+start_month+'-01';
            }

            $('#credit_on').val(credit_dt);

        })

    })

</script>