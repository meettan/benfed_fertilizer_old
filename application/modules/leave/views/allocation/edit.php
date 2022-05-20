<div class="wraper">      

    <div class="col-md-6 container form-wraper">

        <form method="POST" id="form" role="form" name="add_form" action="<?php echo site_url("leave/updateLeaveAllocation");?>" >
            

            <div class="form-header">
            
                <h4>Edit Leave Allocation</h4>
            
            </div>
            
            <?php foreach($data as $key){ ?>

                <div class="form-group row">

                    <label for="type" class="col-sm-2 col-form-label">Allocate To:<font color="red">*</font></label>

                    <div class="col-sm-8">

                        <select name="emp_no" id="emp_no" class= "form-control required" readonly>
                            <option value="<?php echo $key->emp_no; ?>"><?php echo $key->emp_name; ?></option>
                            
                        </select>
                                
                    </div>

                    <input type="hidden" name= "trans_dt" id= "trans_dt" value = "<?php echo $key->trans_dt; ?>" readonly >
                    <input type="hidden" name= "trans_cd" id= "trans_cd" value = "<?php echo $key->trans_cd; ?>" readonly >

                </div>
                <br>
                <div class="row" style ="margin: 5px;">

                    <div class="form-group">

                        <table class="table table-striped table-bordered table-hover">
                                
                            <thead>
                                
                                <tr>
                                    <th style= "text-align: center;">CL</th>
                                    <th style= "text-align: center;">EL</th>
                                    <th style= "text-align: center;">ML</th>
                                    <th style= "text-align: center;">Off Day</th>
                                </tr>

                            </thead>
                                
                            <tbody id= "intro">

                                <tr>

                                    <td>
                                        <input type="text" name= "cl_bal" id= "cl_bal" value= "<?php echo $key->cl_bal; ?>" class= "form-control" />
                                    </td>
                                    
                                    <td>                                 
                                        <input type="text" name="el_bal" value= "<?php echo $key->el_bal; ?>" class="form-control" id="el_bal" />                                       
                                    </td>

                                    <td>
                                        <input type="text" name="ml_bal" value= "<?php echo $key->ml_bal; ?>" class="form-control" id="ml_bal" />
                                    </td>

                                    <td>
                                        <input type="text" name="od_bal" value= "<?php echo $key->od_bal; ?>" class="form-control" id="od_bal" />
                                    </td>

                                </tr>

                            </tbody>   

                        </table>

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

