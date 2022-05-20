    <div class="wraper">      
        
        <div class="col-md-6 container form-wraper">

            <form method="POST" 
                action="<?php echo site_url("payroll/deduction/edit");?>" >

                <div class="form-header">
                
                    <h4>Edit Deduction</h4>
                
                </div>

                <div class="form-group row">

                    <label for="sal_yr" class="col-sm-2 col-form-label">Date:</label>

                    <div class="col-sm-10">

                        <input type="date"
                                name="sal_date"
                                class="form-control required"
                                id="sal_date"
                                value="<?php echo $deduction_dtls->sal_date;?>"
                                readonly
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="emp_cd" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <input type="hidden"
                                name="emp_cd"
                                id="emp_cd"
                                value="<?php echo $deduction_dtls->emp_cd;?>"
                                readonly
                        >

                        <input type="text"
                                name="empname"
                                class="form-control required"
                                id="empname"
                                value="<?php echo $deduction_dtls->emp_name;?>"
                                readonly
                        >

                    </div>

                </div> 

                <div class="form-group row">

                    <label for="category" class="col-sm-2 col-form-label">Category:</label>

                    <div class="col-sm-10">

                        <input type = "text"
                            class= "form-control"
                            name = "category"
                            id   = "category"
                            value="<?php echo $deduction_dtls->emp_catg;?>"
                            readonly
                        />

                    </div>

                </div>
 

                <div class="form-group row">

                    <label for="sal_month" class="col-sm-2 col-form-label">Month:</label>

                        <div class="col-sm-4">

                            <select
                                        class="form-control required"
                                        name="sal_month"
                                        id="sal_month"
                                        required
                            >

                                <option value="">Select Month</option>

                                <?php 
                                
                                foreach($month_list as $m_list) {?>

                                    <option value="<?php echo $m_list->month_name; ?>" 
                                            <?php echo ($m_list->month_name == $deduction_dtls->sal_month) ? "selected":""; ?>
                                    
                                    ><?php echo $m_list->month_name; ?></option>

                                <?php
                                }
                                ?>

                            </select>   

                        </div>
                

                    <label for="sal_yr" class="col-sm-2 col-form-label">Year:</label>

                    <div class="col-sm-4">

                        <input type="text"
                            class="form-control required"
                            name="sal_yr"
                            id="sal_yr"
                            value="<?php echo $deduction_dtls->sal_yr;?>"
                            readonly required	
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="gen_adv" class="col-sm-2 col-form-label">General Advance:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "gen_adv"
                            id   = "gen_adv"
                            value="<?php echo $deduction_dtls->gen_adv;?>"
                        />

                    </div>


                    <label for="adv" class="col-sm-2 col-form-label">General Interest:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "gen_intt"
                            id   = "gen_intt"
                            value="<?php echo $deduction_dtls->gen_intt;?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="fest_adv" class="col-sm-2 col-form-label">Festival Advance:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "fest_adv"
                            id   = "fest_adv"
                            value="<?php echo $deduction_dtls->festival_adv;?>"
                        />

                    </div>

                
                    <label for="lic" class="col-sm-2 col-form-label">LIC:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "lic"
                            id   = "lic"
                            value="<?php echo $deduction_dtls->lic;?>"
                        />

                    </div>

                </div>


                <div class="form-group row">

                    <label for="itax" class="col-sm-2 col-form-label">I-tax:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "itax"
                            id   = "itax"
                            value="<?php echo $deduction_dtls->itax;?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <button type="submit" class="btn btn-info">Save</button>

                    </div>

                </div>

            </form>
        
        </div>

    </div>
