<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 6px;

    font-size: 14px;
}

th {

    text-align: center;

}

tr:hover {background-color: #f5f5f5;}

</style>


    
    <div class="wraper">      

        <div class="col-md-6 container form-wraper">
    
                 <form method="POST" id="form" action="<?php echo site_url("fert/rep/stkwsestprep");?>" >

                <div class="form-header">
                
                    <h4>Input Parameters</h4>
                
                </div>

                <div class="form-group row">

                    <label for="from_dt" class="col-sm-2 col-form-label">From Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="from_date"
                               class="form-control required"
                               value="<?php echo date('Y-m-d');?>"
                        />  

                    </div>

                </div>

                <div class="form-group row">

                    <label for="to_date" class="col-sm-2 col-form-label">To Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="to_date"
                               class="form-control required"
                               value="<?php echo date('Y-m-d');?>"
                        />  

                    </div>

                </div> 

                <div class="form-group row">

                    <label for="company" class="col-sm-2 col-form-label">Company:</label>

                    <div class="col-sm-6">

                            <select name="company" id="company" class="form-control" required>

                                    <option value="">Select Company</option>
                                <?php
                                    foreach($company as $row){
                                ?>

                                    <option value="<?php echo $row->COMP_ID;?>"><?php echo $row->COMP_NAME;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                       

                </div>

                </div>

                <div class="form-group row">

                    <label for="product" class="col-sm-2 col-form-label">Product Name:</label>

                    <div class="col-sm-6">

                        <select type="text"
                            class="form-control sch_cd required"
                            name="product"
                            id="product">

                            <option value="">Select Product</option>    

                            <option value="">Select</option>    

                        </select>    

                    </div>

                </div> 

                <!-- <div class="form-group row">

                    <label for="ro" class="col-sm-2 col-form-label">Ro:</label>

                    <div class="col-sm-6">

                        <select type="text"
                            class="form-control sch_cd required"
                            name="ro"
                            id="ro">

                            <option value="">Select Ro</option>    

                            <option value="">Select</option>    

                        </select>    

                    </div>

                </div>    -->
                <div class="form-group row">
                <label for="branch" class="col-sm-2 col-form-label">Stock Point:</label>
                <div class="col-sm-6">

                    <select name="soc_id" class="form-control sch_cd required" id="soc_id" >

                        <option value="">Select Stock Point</option>

                        <?php

                            foreach($stockpoint as $soc){

                                
                        ?>

                        <option value="<?php echo $soc->soc_id;?>"><?php echo $soc->soc_name;?></option>

                        <?php

                            }

                        ?>     

                    </select>

                </div>

            </div>


                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Submit" />

                    </div>

                </div>

            </form>    

        </div>

    </div>
    <script>

    $(document).ready(function(){

        $('#company').change(function(){

            $.get(

                '<?php echo site_url("fert/rep/popProd");?>',

                {
                    company : $(this).val()
                }
            ).done(function(data){

                var string = '<option value="">Select Product</option>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<option value="' + value.PROD_ID + '">' + value.PROD_DESC + '</option>'
                });

                $('#product').html(string);
            });
        });


        $('#product').change(function(){

            $.get(

                // '<?php echo site_url("trade/f_get_prodsale_ro");?>',
                '<?php echo site_url("fert/rep/f_get_prodsale_ro");?>',
                
                {
                    company : $('#company').val(),
                    prod_id : $(this).val()
                }
            ).done(function(data){

                var string = '<option value="">Select Ro</option>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<option value="' + value.ro_no + '">' + value.ro_no + '</option>'
                });

                $('#ro').html(string);
            });
        });   

    });
</script>  