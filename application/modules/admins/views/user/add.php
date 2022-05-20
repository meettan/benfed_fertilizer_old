    <div class="wraper">      

        <form method="POST" 
            id="form"
            action="<?php echo site_url("admin/user/add");?>" >

            <div class="col-md-6 container form-wraper" style="margin-left: 0px;">

                <div class="form-header">
                
                    <h4>User Entry</h4>
                
                </div>

                <div class="form-group row">

                    <label for="user_id" class="col-sm-2 col-form-label">User ID:</label>

                    <div class="col-sm-10">

                        <input type="text"
                                class="form-control required"
                                name="user_id"
                                id="user_id"
                            />

                    </div>

                </div>
                
                <div class="form-group row">

                    <label for="pass" class="col-sm-2 col-form-label">Password:</label>

                    <div class="col-sm-10">

                        <input  type="text"
                                class="form-control"
                                name="pass"
                                id="pass"
                                value="123"
                            >

                    </div>

                </div>
                <div class="form-group row">

<label for="name" class="col-sm-2 col-form-label">User Type:</label>

<div class="col-sm-10">

<?php if($this->session->userdata['loggedin']['user_type']=="A")
    {   ?>
     <select class="form-control" name="user_type" required>
         <option value="U">General User</option>
         <option value="M">Manager</option>
         <option value="A">Administator</option>
        <option value="B">Bank</option>
        </select>


   <?php  }else{  ?>
                          
    <select class="form-control" name="user_type" required>
         <option value="U" selected>General User</option>
      
        </select>
   
    <!-- <input type="text" name="name" class="form-control"> -->
            <?php   } ?>
    
</div>

</div> 

                <div class="form-group row">

                    <label for="name" class="col-sm-2 col-form-label">User Name:</label>

                    <div class="col-sm-10">
                    <input type="text"
                                class="form-control required"
                                name="user_name"
                                id="emp_cd"
                            />

                        <!-- <input type="text" name="name" class="form-control"> -->
                        
                        
                    </div>

                </div> 

                
                <!-- <div class="form-group row"> -->

                    <!-- <label for="user_type" class="col-sm-2 col-form-label">User Type:</label> -->

                    <!-- <div class="col-sm-10"> -->
                   
                       

                    <!-- </div> -->

                <!-- </div> -->
                

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </div>
                
           <!-- <div class="col-md-5 container form-wraper" style="margin-left: 10px; width: 48%;">            

                <div class="form-header">
                    
                    <h4>Allot Departments</h4>
                
                </div>

                <table class="table table-bordered table-hover">

                    <tbody> 

                        <tr>
                            <td><input type="checkbox" name="depts[]" value="f" /> Accounts & Finance</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="depts[]" value="pr" /> Payroll</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="depts[]" value="pd" /> Paddy</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="depts[]" value="d" /> Disaster Management</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="depts[]" value="s" /> Social welfare</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="depts[]" value="st" /> Stationary</td>
                        </tr>

                    </tbody>

                </table>

            </div> -->
        </form>

    </div>

<script>

    $("#form").validate();

</script>
