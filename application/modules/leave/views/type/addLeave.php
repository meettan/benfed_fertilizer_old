<div class="wraper">      

    <div class="col-md-6 container form-wraper">

        <form method="POST" id="form" role="form" name="add_form" action="<?php echo site_url("leave/leaveTypeEntry");?>" >
            

            <div class="form-header">
            
                <h4>Add Leave Type</h4>
            
            </div>

            <div class="form-group row">

                <label for="type" class="col-sm-2 col-form-label">Leave Type:<font color="red">*</font></label>

                <div class="col-sm-4">

                    <select name="type" id="type" class= "form-control required" required>
                        <option value="">Select Leave</option>
                        <option value="CL">CL</option>
                        <option value="EL">EL</option>
                        <option value="ML">ML</option>
                        <option value="OD">Off Day</option>
                    </select>
                            
                </div>

            </div>

            <div class="form-group row">

                <label for="start_month" class="col-sm-2 col-form-label">Valid From:<font color="red">*</font></label>

                <div class="col-sm-4">

                    <select name="start_month" id="start_month" class= "form-control required" required>
                        <option value="0">Select Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                     
                </div>

                <label for="end_month" class="col-sm-2 col-form-label">Valid Upto:<font color="red">*</font></label>

                <div class="col-sm-4">

                    <select name="end_month" id="end_month" class= "form-control required" required>
                        <option value="0">Select Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                     
                </div>

            </div>

            <div class="form-group row">

                <label for="amount" class="col-sm-2 col-form-label">Amount:<font color="red">*</font></label>
                
                <div class="col-sm-4">

                    <input type="text" name="amount" class="form-control required" id="amount" required>
                            
                </div>
               
               <label for="start_month" class="col-sm-2 col-form-label">Next Credit On:</label>

                <div class="col-sm-4">

                    <input type="date" name= "credit_on" id= "credit_on" class= "form-control required" required>

                </div>

            </div>

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