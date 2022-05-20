
<div class="wraper">      

    <div class="row">

        <form method="POST" id="form" role="form" name="add_form" action="<?php echo site_url("leave/updateMatLeave");?>"  >
            
            <?php foreach($data as $key){ ?>

            <div class="col-md-6 container form-wraper" > 

                <div class="form-header">
                
                    <h4>Leave Application</h4>
                
                </div>

                <input type="hidden" name= "trans_dt" id= "trans_dt" class= "form-control required" value= "<?php echo $key->trans_dt; ?>" readonly/>
                <input type="hidden" name= "trans_cd" id= "trans_cd" class= "form-control required" value= "<?php echo $key->trans_cd; ?>" readonly/>
                <!-- <input type="hidden" name= "emp_no" id= "emp_no" class= "form-control required" value= "<?php echo $key->emp_no; ?>" readonly/> -->
                
                <div class="form-group row">

                    <label for="docket_no" class="col-sm-2 col-form-label">Docket:<font color="red">*</font></label>
                    <div class="col-sm-4">

                        <input type="text" name= "docket_no" id= "docket_no" value= "<?php echo $key->docket_no; ?>" class= "form-control required"  required>

                    </div>
                    
                    
                    <label for="leave_type" class="col-sm-2 col-form-label">Leave:<font color="red">*</font></label>
                    <div class="col-sm-4">

                        <input type="text" name= "leave_type" id= "leave_type" value= "Maternity" class= "form-control required"  readonly>

                    </div>

                </div>

                <div class="form-group row">

                    <label for="from_dt" class="col-sm-2 col-form-label">From:<font color="red">*</font></label>
                    <div class="col-sm-4">

                        <input type="date" name= "from_dt" id= "from_dt" value= "<?php echo $key->from_dt; ?>" class= "form-control required" value= "" required>

                    </div>

                    <label for="to_dt" id= "to_dt_label" class="col-sm-2 col-form-label">To:<font color="red">*</font></label>
                    <div class="col-sm-4">

                        <input type="date" name= "to_dt" id= "to_dt" value= "<?php echo $key->to_dt; ?>" class= "form-control required" value= "" required>

                    </div>

                </div>

                <div class="form-group row">

                    <label for="no_of_days" class="col-sm-2 col-form-label">Total Days:</label>
                    <div class="col-sm-4">

                        <input type="text" name= "no_of_days" id= "no_of_days" value= "<?php echo $key->no_of_days; ?>" class= "form-control required" value= "" readonly />
                        <span id= "balCheck_alert"><font color= "red">* Exceeds available balance</font></span>
                    </div>

                </div>

                <div class="form-group row">

                    <label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
                    <div class="col-sm-10">

                        <textarea name="remarks" id="remarks" class= "form-control required" cols="30" rows="2"><?php echo $key->remarks; ?></textarea>

                    </div>

                </div>
                

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" id= "submit" value="Apply" />

                    </div>

                </div>

            </div>

            <?php } ?>

        </form>

    </div>

</div>




<!-- To get infotable details as per Leave Type Selection selection -->
<script>

    $(document).ready(function(){

        $('#balCheck_alert').hide();

        // $('#docket_no').on("change", function(){

        //     //var leaveType = $(this).val();
        //     var rowCount = $('#info_table tr').length;
            
        //     if(rowCount == 0)
        //     {
        //         $.get('<?php //echo site_url("leave/js_get_applied_matLeaveDtls") ?>')
        //         .done(function(data){

        //             var tableData = JSON.parse(data);
        //             console.log(tableData);

        //             for(var key in tableData)
        //             {
                    
        //                 var value = tableData[key];

        //                 //var name = value.emp_name;
        //                 //var caption = 'Employee Name: <strong>'+name+'</strong>';

        //                 var bodyEliment = '<tr>'
        //                                     +'<td>'+value.trans_dt+'</td> '
        //                                     +'<td>'+value.no_of_days+'</td> </tr>'
        //                                 +'</tr>' ;

                        
        //                 $('#infoCaption').html(caption);
        //                 $('#info_table').append($(bodyEliment));
                            
        //             }

        //         })
            
        //     }


        // })

        $('#from_dt').on('change', function(){

            let from_dt = $(this).val();
            let docket_no = $('#docket_no').val();
            if(docket_no == '')
            {
                $('#docket_no').css('border-color', 'red');
                $('#docket_no').focus();
                return false;
            }

        })

        $('#to_dt').on('change', function(){

            let to_dt = $(this).val();
            let from_dt = $('#from_dt').val();

            if(from_dt == '')
            {
                $('#from_dt').css('border-color', 'red');
                $('#from_dt').focus();
                return false;
            }
            else
            {

                if(to_dt >= from_dt)
                {
                    const date1     =   new Date(from_dt);
                    const date2     =   new Date(to_dt);
                    const diffTime  =   Math.abs(date2.getTime() - date1.getTime());
                    const diffDays  =   Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                    
                    let noOfDays = parseFloat(diffDays+1);

                    $('#no_of_days').val(noOfDays);

                    if(parseFloat(noOfDays) > 134)
                    {
                        $('#no_of_days').css('border-color', 'red');
                        $('#balCheck_alert').show();
                        return false;
                    }
                }
                else
                {
                    $('#from_dt').css('border-color', 'red');
                    $('#to_dt').css('border-color', 'red');
                    return false;
                }

            }


        })


    })

</script> 

