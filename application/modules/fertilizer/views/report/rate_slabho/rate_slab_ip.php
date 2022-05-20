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
    
                 <form method="POST" id="form" action="<?php echo site_url("fert/rep/rateslabho");?>" >

                <div class="form-header">
                
                    <h4> Sale Rate Slab</h4>
                
                </div>

                <div class="form-group row">

                    <label for="company" class="col-sm-2 col-form-label">District:</label>

                    <div class="col-sm-10">

                            <select name="district" id="district" class="form-control" required>

                                    <option value="">Select District</option>
                                <?php

                                    foreach($branch as $row){
                                ?>

                                    <option value="<?php echo $row->id;?>"><?php echo $row->branch_name;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                       

                    </div>

                </div>

                <div class="form-group row">

                    <label for="company" class="col-sm-2 col-form-label">Company:</label>

                    <div class="col-sm-10">

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

                    <label for="product" class="col-sm-2 col-form-label">From Date:</label>

                    <div class="col-sm-10">

                       <input type="date"  value="<?=date('Y-m-d')?>" name ="fr_date" class="form-control" required />

                    </div>

                </div>  

                <div class="form-group row">

                    <label for="product" class="col-sm-2 col-form-label">To Date:</label>

                    <div class="col-sm-10">

                       <input type="date"  value="<?=date('Y-m-d')?>" name ="to_date" class="form-control" required />

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
    });
</script>  