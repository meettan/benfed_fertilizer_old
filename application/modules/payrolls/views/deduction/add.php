    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <div class="form-header">
                
                <h4>Add Deduction</h4>
             
            </div>

            <form method="POST" 
                id="form"
                action="<?php echo site_url("payroll/deduction/add");?>" >

                <div class="form-group row">

                    <label for="sal_date" class="col-sm-2 col-form-label">Date:</label>

                    <div class="col-sm-10">

                        <input type="date"
                                name="sal_date"
                                class="form-control required"
                                id="sal_date"
                                value="<?php echo $sys_date;?>"
                                readonly
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="emp_cd" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <select
                                class="form-control required"
                                name="emp_cd"
                                id="emp_cd"
                        >

                        <option value="">Select Employee</option>

                        <?php  

                        if($emp_list) {

                            foreach ($emp_list as $e_list) {

                                foreach ($category  as $catg) {

                                    if($e_list->emp_catg == $catg->category_code) {

                        ?>        
                                <option value='{"empid":"<?php echo $e_list->emp_code ?>","empname":"<?php echo $e_list->emp_name; ?>"}'

                                catg="<?php echo $catg->category_type; ?>"            
                                ><?php echo $e_list->emp_name; ?></option>

                        <?php
                                    }

                                }    

                            }

                        }

                        ?>
                            
                        </select>

                    </div>

                </div>

                <div class="form-group row">

                    <label for="category" class="col-sm-2 col-form-label">Category:</label>

                    <div class="col-sm-10">

                        <input type = "text"
                            class= "form-control"
                            name = "category"
                            id   = "category"
                            readonly required
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="month" class="col-sm-2 col-form-label">Month:</label>

                        <div class="col-sm-4">

                            <select class="form-control required" name="month" id="month" required>

                                <option value="">Select Month</option>

                                <?php foreach($month_list as $m_list) {?>

                                    <option value="<?php echo $m_list->month_name ?>" ><?php echo $m_list->month_name; ?></option>

                                <?php
                                }
                                ?>

                            </select>

                        </div>   

                    <label for="year" class="col-sm-2 col-form-label">Year:</label>

                    	<div class="col-sm-4">

			                <input type="text" class="form-control" name="year" id="year" 
				                    value="<?php echo date('Y');?>" readonly/>
			
			            </div>

                </div>


                <div class="form-group row">

                    <label for="gen_adv" class="col-sm-2 col-form-label">General Advance:</label>

                    <div class="col-sm-4">

                        <input type="text"
                            class= "form-control"
                            name = "gen_adv"
                            id   = "gen_adv"
                            value = 0.00	
                        />

                    </div>

                   <label for="gen_intt" class="col-sm-2 col-form-label">General Interest:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "gen_intt"
                            id   = "gen_intt"
                            value = 0.00 
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="fest_adv" class="col-sm-2 col-form-label">Festival Advance:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "fest_adv"
                            id   = "fest_adv"
                            value = 0.00
                        />

                    </div>
        
                
                    <label for="lic" class="col-sm-2 col-form-label">LIC:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "lic"
                            id   = "lic"
                            value = 0.00
                        />

                    </div>

                </div>


                <div class="form-group row">

                    <label for="itax" class="col-sm-2 col-form-label">I-tax:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "itax"
                            id   = "itax"
                            value = 0.00
                        />

		            </div>

                </div>    
	
		        <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </form>

        </div>

    </div>

<script>

    $("#form").validate({
        rules: {

            sal_yr: "required",

        },
        messages: {
            
            sal_yr: "Please enter valid input"
        }
        
    });


</script>

<script>

    $(document).ready(function(){

        $('#emp_cd').change(function(){

            $('#category').val($(this).find(':selected').attr('catg'));

        });

    });
    
</script>
