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

.form-wraper {
    margin-bottom: 20px !important;
}

</style>


    
    <div class="wraper">      

        <div class="col-md-12 container form-wraper">
    
                 <form method="POST" id="form" action="<?php echo site_url("fert/rep/rateslab");?>" >

                <div class="form-header">
                
                    <h4>Productwise Sale Rate Slab</h4>
                
                </div>

                <div class="form-group row">

                    <label for="company" class="col-sm-2 col-form-label">Company:</label>

                    <div class="col-sm-10">

                            <select name="company" id="company" class="form-control required">

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

                    <div class="col-sm-10">

                        <select type="text"
                            class="form-control sch_cd required"
                            name="product"
                            id="product">

                            <option value="">Select Product</option>    

                            <option value="">Select</option>    

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

        <!-- <div class="wraper">  -->
        <!-- <?php if(isset($_POST["submit"])){ ?> -->
            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Sale Rate Slab</h4>
                        <h5 style="text-align:right"><label>District: </label> <?php echo $branch->district_name; ?></h5>
                        <h5 style="text-align:left"><label>Company:</label> <?php echo $company_nm->COMP_NAME; ?></h5>
                        <h5 style="text-align:left"><label>Product:</label> <?php echo $product->PROD_DESC; ?></h5>

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Category</th>

                                <th>From Date</th>

                           <!--      <th>To Date</th> -->

                                <th>Rate/Unit</th>

                                <th>Rate/Bag</th>

                                <th>Govt.Sale Rate</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($rate){ 

                                    $i = 1;

                                    foreach($rate as $ratedtls){

                            ?>

                                <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo $ratedtls->cate_desc; ?></td>
                                     <td><?php echo date('d/m/Y',strtotime($ratedtls->frm_dt)); ?></td>
                                   <!--   <td><?php //echo date('d/m/Y',strtotime($ratedtls->to_dt)); ?></td> -->
                                     <td><?php echo $ratedtls->sp_mt; ?></td>
                                     <td><?php echo $ratedtls->sp_bag; ?></td>
                                     <td><?php echo $ratedtls->sp_govt; ?></td>
                                </tr>
 
                                <?php    } ?>

 
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

                </div>

            </div>
            <!-- <?php } ?> -->
        </div>

    <!-- </div>        -->
  
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
<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 12px;}' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }
</script>