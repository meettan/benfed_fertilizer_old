
<div class="wraper">      

<div class="row">

    <form method="POST" id="form" role="form" name="add_form" action="<?php echo site_url("leave/leaveApplyEntry");?>" onsubmit="return validate()" >
        
        <div class="col-md-6 container form-wraper" style="margin-left: 0px;" > 

            <div class="form-header">
            
                <h4>Leave Application</h4>
            
            </div>

            <input type="hidden" name= "emp_name" id= "emp_name" class= "form-control required" value= "<?php echo $emp_name; ?>" readonly/>
            
            <div class="form-group row">

                <label for="docket_no" class="col-sm-2 col-form-label">Docket:<font color="red">*</font></label>
                <div class="col-sm-4">

                    <input type="text" name= "docket_no" id= "docket_no" class= "form-control required"  required>

                </div>
                
                
                <label for="leave_type" class="col-sm-2 col-form-label">Leave:<font color="red">*</font></label>
                <div class="col-sm-4">

                    <select name="leave_type" id="leave_type" class= "form-control required" required>
                    
                        <option value="">Select Leave</option>
                        <option value="CL">CL</option>
                        <option value="EL">EL</option>
                        <option value="ML">ML</option>
                        <option value="OD">Off Day</option>

                    </select>
                    <span id= "alert1"><font color="red">*Select Leave Type First</font></span>

                </div>

            </div>

            <div class="form-group row">

                <label for="leave_mode" class="col-sm-2 col-form-label">Mode:<font color="red">*</font></label>
                <div class="col-sm-4">

                    <select name="leave_mode" id="leave_mode" class= "form-control required" required>
                    
                        <option value="F">Full Leave</option>
                        <option value="H">Half Leave</option>
                        
                    </select>
                    
                </div>

            </div>

            <div class="form-group row">

                <label for="from_dt" class="col-sm-2 col-form-label">From:<font color="red">*</font></label>
                <div class="col-sm-4">

                    <input type="date" name= "from_dt" id= "from_dt" class= "form-control required" value= "" required>

                </div>

                <label for="to_dt" id= "to_dt_label" class="col-sm-2 col-form-label">To:<font color="red">*</font></label>
                <div class="col-sm-4">

                    <input type="date" name= "to_dt" id= "to_dt" class= "form-control required" value= "" required>

                </div>

            </div>

            <div class="form-group row">

                <label for="no_of_days" class="col-sm-2 col-form-label">Total Days:</label>
                <div class="col-sm-4">

                    <input type="text" name= "no_of_days" id= "no_of_days" class= "form-control required" value= "" readonly />
                    <span id= "balCheck_alert"><font color= "red">* Exceeds available balance</font></span>
                </div>

            </div>

            <div class="form-group row">

                <label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
                <div class="col-sm-10">

                    <textarea name="remarks" id="remarks" class= "form-control required" cols="30" rows="2"></textarea>

                </div>

            </div>
            

            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" class="btn btn-info" id= "submit" value="Apply" />

                </div>

            </div>

        </div>

        <div class="col-md-5 container form-wraper" style="margin-left: 10px; width: 48%;" > 

            <div class="form-header">
                
                <h4>Balance Table</h4>
            
            </div>
            
            <table class="table table-bordered table-hover">

                <thead>
                    <caption id= "infoCaption"></caption>
                    <tr>

                        <th>Leave</th>
                        <th>Balance</th>

                    </tr>

                </thead>

                <tbody id= "info_table" >
                
                </tbody>

            </table>

        </div>

    </form>

</div>

</div>



<!-- checking whather user select leave type or not -->
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


<!-- For half leave apply -->
<script>

    $(document).ready(function(){

        $('#from_dt').on('change', function(){

            var from_dt = $(this).val();
            var leave_mode = $('#leave_mode').val();

            if(leave_mode == 'H')
            {
                $('#to_dt').val(from_dt);
                $('#no_of_days').val('0.5');
                //var noOfDays = 0.5;

                var leaveType = $('#leave_type').val();

                $.get('<?php echo site_url("leave/js_get_apply_leaveBalance") ?>', {leaveType : leaveType })
                .done(function(data){

                    let checkBalData = JSON.parse(data);
                    for(var key in checkBalData)
                    {

                        let checkVal = checkBalData[key];
                        if(leaveType == 'CL')
                        {
                            if(parseFloat(checkVal.cl_bal) < 0.5)
                            {
                                $('#no_of_days').css('border-color', 'red');
                                $('#balCheck_alert').show();
                                $('#submit').prop('disabled', true);
                                return false;
                            }
                            else
                            {
                                $('#no_of_days').css('border-color', 'green');
                                $('#balCheck_alert').hide();
                                $('#submit').prop('disabled', false);
                                return true;
                            }
                        }
                        else if(leaveType == 'EL')
                        {
                            if(parseFloat(checkVal.el_bal) < 0.5)
                            {
                                $('#no_of_days').css('border-color', 'red');
                                $('#balCheck_alert').show();
                                $('#submit').prop('disabled', true);
                                return false;
                            }
                            else
                            {
                                $('#no_of_days').css('border-color', 'green');
                                $('#balCheck_alert').hide();
                                $('#submit').prop('disabled', false);
                                return true;
                            }
                        }
                        else if(leaveType == 'ML')
                        {
                            if(parseFloat(checkVal.ml_bal) < 0.5)
                            {
                                $('#no_of_days').css('border-color', 'red');
                                $('#balCheck_alert').show();
                                $('#submit').prop('disabled', true);
                                return false;
                            }
                            else
                            {
                                $('#no_of_days').css('border-color', 'green');
                                $('#balCheck_alert').hide();
                                $('#submit').prop('disabled', false);
                                return true;
                            }
                        }
                        else if(leaveType == 'OD')
                        {
                            if(parseFloat(checkVal.od_bal) < 0.5)
                            {
                                $('#no_of_days').css('border-color', 'red');
                                $('#balCheck_alert').show();
                                $('#submit').prop('disabled', true);
                                
                                return false;
                            }
                            else
                            {
                                $('#no_of_days').css('border-color', 'green');
                                $('#balCheck_alert').hide();
                                $('#submit').prop('disabled', false);
                                
                                return true;
                            }
                        }

                    }

                })

            }

        })

    })

</script>


<!-- Calculating total no of days after from_dt and to_dt selection -->
<script>

    $(document).ready(function(){

        $('#balCheck_alert').hide();
        $('#to_dt').on('change', function(){

            var fromDt = $('#from_dt').val();
            var toDt = $(this).val();

            if(toDt < fromDt)
            {
                $('#to_dt').css('border-color', 'red');
                $('#submit').prop('disabled', true);
                return false;
            }
            else if(toDt >= fromDt)
            {
                //$('#to_dt').css('border-color', 'green');
                $('#submit').prop('disabled', false);

                // In Case of Half Leave Apply
                var leave_mode = $('#leave_mode').val();

                // calculating no of days as per date selection -- 
                const date1     =   new Date(fromDt);
                const date2     =   new Date(toDt);
                const diffTime  =   Math.abs(date2.getTime() - date1.getTime());
                const diffDays  =   Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                
                var noOfDays = parseFloat(diffDays+1);
               
                //console.log(noOfDays);
                $('#no_of_days').val(noOfDays);

                var leaveType = $('#leave_type').val();

                $.get('<?php echo site_url("leave/js_get_apply_leaveBalance") ?>', {leaveType : leaveType })
                .done(function(data){

                    let checkBalData = JSON.parse(data);
                    for(var key in checkBalData)
                    {

                        let checkVal = checkBalData[key];
                        if(leaveType == 'CL')
                        {
                            if(parseFloat(checkVal.cl_bal) < parseFloat(noOfDays))
                            {
                                $('#no_of_days').css('border-color', 'red');
                                $('#balCheck_alert').show();
                                $('#submit').prop('disabled', true);
                                return false;
                            }
                            else
                            {
                                $('#no_of_days').css('border-color', 'green');
                                $('#balCheck_alert').hide();
                                $('#submit').prop('disabled', false);
                                return true;
                            }
                        }
                        else if(leaveType == 'EL')
                        {
                            if(parseFloat(checkVal.el_bal) < parseFloat(noOfDays))
                            {
                                $('#no_of_days').css('border-color', 'red');
                                $('#balCheck_alert').show();
                                $('#submit').prop('disabled', true);
                                return false;
                            }
                            else
                            {
                                $('#no_of_days').css('border-color', 'green');
                                $('#balCheck_alert').hide();
                                $('#submit').prop('disabled', false);
                                return true;
                            }
                        }
                        else if(leaveType == 'ML')
                        {
                            if(parseFloat(checkVal.ml_bal) < parseFloat(noOfDays))
                            {
                                $('#no_of_days').css('border-color', 'red');
                                $('#balCheck_alert').show();
                                $('#submit').prop('disabled', true);
                                return false;
                            }
                            else
                            {
                                $('#no_of_days').css('border-color', 'green');
                                $('#balCheck_alert').hide();
                                $('#submit').prop('disabled', false);
                                return true;
                            }
                        }
                        else if(leaveType == 'OD')
                        {
                            if(parseFloat(checkVal.od_bal) < parseFloat(noOfDays))
                            {
                                $('#no_of_days').css('border-color', 'red');
                                $('#balCheck_alert').show();
                                $('#submit').prop('disabled', true);
                                
                                return false;
                            }
                            else
                            {
                                $('#no_of_days').css('border-color', 'green');
                                $('#balCheck_alert').hide();
                                $('#submit').prop('disabled', false);
                                
                                return true;
                            }
                        }

                    }

                })

            }

        })

    })

</script>


<!-- To get infotable details as per Leave Type Selection selection -->
<script>

    $(document).ready(function(){

        $('#leave_type').on("change", function(){

            var leaveType = $(this).val();
            var rowCount = $('#info_table tr').length;
            

            if(leaveType != '')
            {
                if(rowCount == 0)
                {
                    $.get('<?php echo site_url("leave/js_get_apply_leaveBalance") ?>', {leaveType : leaveType })
                    .done(function(data){

                        var tableData = JSON.parse(data);
                        //console.log(tableData);

                        for(var key in tableData)
                        {
                        
                            var value = tableData[key];

                            var name = value.emp_name;
                            var caption = 'Employee Name: <strong>'+name+'</strong>';

                            var bodyEliment = '<tr> <td> CL </td> <td>'+value.cl_bal+'</td> </tr>'
                                                +'<tr> <td> EL </td> <td>'+value.el_bal+'</td> </tr>'
                                                +'<tr> <td> ML </td> <td>'+value.ml_bal+'</td> </tr>'
                                                +'<tr> <td> OD </td> <td>'+value.od_bal+'</td> </tr>' ;

                            
                            $('#infoCaption').html(caption);
                            $('#info_table').append($(bodyEliment));
                                
                        }

                    })
                
                }

            }

        })

    })

</script> 


<!-- For half Leave only form_dt will be shown -->
<script>

    $(document).ready(function(){

        $('#leave_mode').on('change', function(){

            var leave_mode = $(this).val();
            if(leave_mode == 'H')
            {
                $('#to_dt_label').hide();
                $('#to_dt').hide();
            }
            else if(leave_mode == 'F')
            {
                $('#to_dt_label').show();
                $('#to_dt').show();
            }

        })

    })

</script>
