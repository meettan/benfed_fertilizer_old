<div class="wraper">      

    <div class="col-md-6 container form-wraper">

        <form method="POST" id="form" role="form" name="add_form" action="<?php echo site_url("leave/updateLeaveApplication");?>" >
            
            <div class="form-header">
            
                <h4>Leave Application</h4>
            
            </div>

            <?php foreach($data as $key){ ?>

                <input type="hidden" name= "emp_no" id= "emp_no" class= "form-control required" value= "<?php echo $key->emp_no; ?>" readonly/>
                <input type="hidden" name= "emp_name" id= "emp_name" class= "form-control required" value= "<?php echo $key->emp_name; ?>" readonly/>
                <input type="hidden" name= "trans_dt" id= "trans_dt" class= "form-control required" value= "<?php echo $key->trans_dt; ?>" readonly/>
                <input type="hidden" name= "trans_cd" id= "trans_cd" class= "form-control required" value= "<?php echo $key->trans_cd; ?>" readonly/>

                <div class="form-group row">

                    <label for="docket_no" class="col-sm-2 col-form-label">Docket:<font color="red">*</font></label>
                    <div class="col-sm-4">

                        <input type="text" name= "docket_no" value= "<?php echo $key->docket_no; ?>" id= "docket_no" class= "form-control required" readonly>

                    </div>


                    <label for="leave_type" class="col-sm-2 col-form-label">Leave:<font color="red">*</font></label>
                    <div class="col-sm-4">

                        <select name="leave_type" id="leave_type" class= "form-control required" required>
                        
                            <!-- <option value="<?php //echo $key->leave_type; ?>"><?php //echo $key->leave_type; ?></option> -->
                            <?php if($key->leave_type == 'CL'){ ?><option value="CL" selected>CL
                                                                    </option>
                            <?php }else{ ?><option value="CL">CL</option><?php } ?>                     
                            <?php if($key->leave_type == 'EL'){ ?><option value="EL" selected>EL
                                                                    </option>
                            <?php }else{ ?><option value="EL">EL</option><?php } ?>
                            <?php if($key->leave_type == 'ML'){ ?><option value="ML" selected>ML
                                                                    </option>
                            <?php }else{ ?><option value="ML">ML</option><?php } ?> 
                            <?php if($key->leave_type == 'OD'){ ?><option value="OD" selected>Off Day
                                                                    </option>
                            <?php }else{ ?><option value="OD">Off Day</option><?php } ?>                                        

                        </select>
                        
                    </div>

                </div>

                <div class="form-group row">

                    <label for="from_dt" class="col-sm-2 col-form-label">From:<font color="red">*</font></label>
                    <div class="col-sm-4">

                        <input type="date" name= "from_dt" id= "from_dt" value= "<?php echo $key->from_dt; ?>" class= "form-control required" value= "" required>

                    </div>

                    <label for="to_dt" class="col-sm-2 col-form-label">To:<font color="red">*</font></label>
                    <div class="col-sm-4">

                        <input type="date" name= "to_dt" id= "to_dt" value= "<?php echo $key->to_dt; ?>" class= "form-control required" value= "" required>

                    </div>

                </div>

                <div class="form-group row">

                <label for="no_of_days" class="col-sm-2 col-form-label">Total Days:</label>
                <div class="col-sm-4">

                    <input type="text" name= "no_of_days" id= "no_of_days" value= "<?php echo $key->no_of_days; ?>" class= "form-control required" value= "" readonly />

                </div>

            </div>

            <div class="form-group row">

                <label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
                <div class="col-sm-10">

                    <textarea name="remarks" id="remarks" class= "form-control required" cols="30" rows="2"><?php echo $key->remarks; ?></textarea>

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




<!-- checking whather user select leave type of not -->
<script>

    $(document).ready(function(){

        $('#alert1').hide();

        $('#leave_type').on('change', function(){

            let leaveType = $(this).val();
            if(leaveType != '')
            {
                $('#alert1').hide();
                $('#submit').prop('disabled', false);
                return true;
            }
            else if(leaveType == '')
            {
                $('#alert1').show();
                $('#submit').prop('disabled', true);
                return false;
            }

        })

        $('#from_dt').on('change', function(){

            let leaveType = $('#leave_type').val();
            if(leaveType != '')
            {
                $('#alert1').hide();
                $('#submit').prop('disabled', false);
                return true;
            }
            else if(leaveType == '')
            {
                $('#alert1').show();
                $('#submit').prop('disabled', true);
                return false;
            }

        })

    })

</script>


<!-- Calculating total no of days after from_dt and to_dt selection -->
<script>

    $(document).ready(function(){

        // For changing "to_dt" --- 
        $('#to_dt').on('change', function(){

            var fromDt = $('#from_dt').val();
            var toDt = $(this).val();

            if(toDt < fromDt)
            {
                $('#to_dt').css('border-color', 'red');
                $('#from_dt').css('border-color', 'red');
                $('#submit').prop('disabled', true);
                return false;
            }
            else if(toDt >= fromDt)
            {
                $('#to_dt').css('border-color', 'green');
                $('#from_dt').css('border-color', 'green');
                $('#submit').prop('disabled', false);
                

                const date1 = new Date(fromDt);
                const date2 = new Date(toDt);
                const diffTime = Math.abs(date2.getTime() - date1.getTime());
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                
                var noOfDays = parseFloat(diffDays+1);
                //console.log(noOfDays);
                $('#no_of_days').val(noOfDays);

                return true;

            }


        })

        // For changing "from_dt" --
        $('#from_dt').on('change', function(){

            var fromDt = $(this).val();
            var toDt = $('#to_dt').val();

            if(toDt < fromDt)
            {
                $('#to_dt').css('border-color', 'red');
                $('#from_dt').css('border-color', 'red');
                $('#submit').prop('disabled', true);
                return false;
            }
            else if(toDt >= fromDt)
            {
                $('#to_dt').css('border-color', 'green');
                $('#from_dt').css('border-color', 'green');
                $('#submit').prop('disabled', false);
                

                const date1 = new Date(fromDt);
                const date2 = new Date(toDt);
                const diffTime = Math.abs(date2.getTime() - date1.getTime());
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                
                var noOfDays = parseFloat(diffDays+1);
                //console.log(noOfDays);
                $('#no_of_days').val(noOfDays);

                return true;

            }


        })

    })

</script>
