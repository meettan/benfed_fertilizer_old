<div class="wraper">      

    <div class="col-md-6 container form-wraper">

        <form method="POST" id="form" role="form" name="add_form" action="<?php echo site_url("leave/rollBackEntry");?>" >
            
            <div class="form-header">
            
                <h4>Roll Back Form</h4>

            </div>
            
            <div class="form-group row">

                <label for="docket_no" class="col-sm-2 col-form-label">Docket:<font color="red">*</font></label>
                <div class="col-sm-4">

                    <input type="text" name= "docket_no" value= "" id= "docket_no" class= "form-control required" >
                    <span id= "alert1"><font color="red">*Invalid Docket</font></span>
                </div>

                <label for="from_dt" class="col-sm-2 col-form-label">Application Status:</label>
                <div class="col-sm-4">

                    <input type="text" name= "status" id= "status" value= "" class= "form-control required" value= "" readonly>

                </div>
                

            </div>

            <div class="form-group row">

                <label for="from_dt" class="col-sm-2 col-form-label">From:</label>
                <div class="col-sm-4">

                    <input type="date" name= "from_dt" id= "from_dt" value= "" class= "form-control required" value= "" required>

                </div>

                <label for="to_dt" class="col-sm-2 col-form-label">To:</label>
                <div class="col-sm-4">

                    <input type="date" name= "to_dt" id= "to_dt" value= "" class= "form-control required" value= "" required>

                </div>

            </div>

            <div class="form-group row">

                <label for="no_of_days" class="col-sm-2 col-form-label">Total Days:</label>
                <div class="col-sm-4">

                    <input type="text" name= "no_of_days" id= "no_of_days" value= "" class= "form-control required" value= "" readonly />
                    <span id= "alert4"><font color="red">*Half leave can't be roll back</font></span>
                </div>

                <label for="leave_type" class="col-sm-2 col-form-label">Leave:</label>
                <div class="col-sm-4">

                    <input type="text" class= "form-control required" name= "leave_type" id= "leave_type" readonly>
                    
                </div>
            
            </div>

            <div class="form-group row">

                <label for="action" class="col-sm-2 col-form-label">Action:<font color="red">*</font></label>
                <div class="col-sm-4">

                    <select name="action" id="action" class= "form-control required" required>
                    
                        <option value="">Select Action</option>
                        <option value="R">Roll Back</option>
                        <option value="C">Reject</option>
                        
                    </select>
                    <span id= "alert2"><font color="red">*Select Action First</font></span>
                    <span id= "alert3"><font color="red">*Finalized leave can't be rejected</font></span>

                </div>

            </div>

            <div class="form-group row">

                <label for="remarks" class="col-sm-2 col-form-label">Applicant Remarks:</label>
                <div class="col-sm-10">

                    <textarea name="remarks" id="remarks" class= "form-control required" cols="30" rows="2" readonly></textarea>

                </div>

            </div>

            <div class="form-group row">

                <label for="remarks" class="col-sm-2 col-form-label">Roll Back Message:<font color="red">*</font></label>
                <div class="col-sm-10">

                    <textarea name="rlb_message" id="rlb_message" class= "form-control required" cols="30" rows="2" required></textarea>

                </div>

            </div>

            <input type="hidden" class= "form-control required" name= "emp_name" id= "emp_name" readonly>
            <input type="hidden" class= "form-control required" name= "emp_no" id= "emp_no" readonly>
            <input type="hidden" class= "form-control required" name= "trans_dt" id= "trans_dt" readonly>
            <input type="hidden" class= "form-control required" name= "trans_cd" id= "trans_cd" readonly>

            <div class="form-group row">

                <div class="col-sm-6">

                    <input type="submit" class="btn btn-info" id= "submit" value="Proceed" />

                </div>

            </div>

        </form>

    </div>

</div>



<!-- Getting application details as per docket no given -->
<script>

    $(document).ready(function(){

        $('#alert1').hide();
        $('#alert2').hide();
        $('#alert3').hide();
        $('#alert4').hide();

        $('#docket_no').on('change', function(){

            var docketNo = $(this).val();
            
            $.get('<?php echo site_url("leave/js_get_applnDtls_for_rollback"); ?>', {docketNo:docketNo})
            .done(function(data){

                var result = JSON.parse(data);
                console.log(result[0]);

                // checking whether docket is true or not 
                if(result[0] == undefined)
                {
                    alert(' Docket no. is invalid');
                }
                else
                {

                    var trans_dt            =       result[0].trans_dt; 
                    var trans_cd            =       result[0].trans_cd; 
                    var from_dt             =       result[0].from_dt; 
                    var to_dt               =       result[0].to_dt; 
                    var approval_status     =       result[0].approval_status; 
                    var leave_type          =       result[0].leave_type; 
                    var cl_bal              =       result[0].cl_bal; 
                    var el_bal              =       result[0].el_bal; 
                    var ml_bal              =       result[0].ml_bal; 
                    var od_bal              =       result[0].od_bal; 
                    var no_of_days          =       result[0].no_of_days; 
                    var remarks             =       result[0].remarks;
                    var emp_name            =       result[0].emp_name;
                    var emp_no              =       result[0].emp_no;

                    // For un approved leave can't be roll back
                    if(approval_status == 'U')
                    {
                        alert('Leave yet to be approved. Applicant should edit it.');
                    }
                    else if(approval_status == 'R')
                    {
                        alert('Leave application has been rejected.');
                    }
                    else 
                    {
                        // Showing all details in fields 
                        let approval_status_val = '';
                        if(approval_status == 'U')
                        {
                            approval_status_val = 'Unapproved';
                        }
                        else if(approval_status == 'A')
                        {
                            approval_status_val = 'Approved';
                        }
                        else if(approval_status == 'R')
                        {
                            approval_status_val = 'Rejected';
                        }
                        else if(approval_status == 'F')
                        {
                            approval_status_val = 'Finalized';
                        }

                        $('#status').val(approval_status_val);
                        $('#from_dt').val(from_dt);
                        $('#to_dt').val(to_dt);
                        $('#no_of_days').val(no_of_days);
                        $('#leave_type').val(leave_type);
                        $('#remarks').val(remarks);
                        $('#emp_name').val(emp_name);
                        $('#emp_no').val(emp_no);
                        $('#trans_dt').val(trans_dt);
                        $('#trans_cd').val(trans_cd);

                        // Half leavedcan't be roll back
                        if(no_of_days == 0.5)
                        {
                            $('#alert4').show();
                            $('#no_of_days').css('border-color', 'red');
                            $('#submit').prop('disabled', true);
                            return false;
                        }
                        else
                        {
                            // Finalized leave can't be rejected in action
                            $('#action').on('change', function(){

                                let action = $(this).val();
                                if(approval_status == 'F' && action == 'C')
                                {
                                    $('#alert3').show();
                                    $('#action').css('border-color', 'red');
                                    $('#submit').prop('disabled', true);
                                    return false;
                                }
                                
                            })

                        }


                    }

                }

            })

            
        })

        
    })

</script>


<!-- checking whather user select action or not -->
<script>

    $(document).ready(function(){

        $('#rlb_message').on('click', function(){

            let action = $('#action').val();
            if(action != '')
            {
                $('#alert2').hide();
                $('#submit').prop('disabled', false);
                return true;
            }
            else if(action == '')
            {
                $('#alert2').show();
                $('#action').css('border-color', 'red');
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
