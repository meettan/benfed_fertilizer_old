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

<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


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


<?php

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

?>        
    <div class="wraper">      

        <div class="col-md-6 container form-wraper">
    
            <form method="POST" 
                id="form"
                action="<?php echo site_url("fertilizer/stock_ledg_report");?>" >

                <div class="form-header">
                
                    <h4>Stock Report</h4>
                
                </div>

                <div class="form-group row">

                    <label for="from_date" class="col-sm-2 col-form-label">From Date:</label>

                    <div class="col-sm-10">

                        <input type="date"
                               name="to_date"
                               id="to_date"
                               class="form-control to_date"
                               value="<?php echo date('Y-m-d');?>" />
                               <!-- <script>
                      var till_dt=$('#to_date').html();
                      console.log(till_dt);
                      </script> -->
                    </div>

                </div>

             


                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Proceed" />

                    </div>

                </div>

            </form>    

        </div>

    </div>        

    <?php

    }
    
    else if($_SERVER['REQUEST_METHOD'] == 'POST') { 
     
    ?>

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>The West Bengal State Co-operative Marketing Federation Ltd.</h2>

                        <h4>Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</h4>

                        <h4>Stock Ledger Report 
                    
                        <script> $('.to_date').val();</script>
                        
                        </h4>

                    </div>
                    
                    <br>
                    
                    <table style="width: 100%;" id="example" >
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Transaction Date</th> 
                                <th>Transaction Type</th> 
                                <th>Product Name</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
          
                               if(isset($stocks)) {

                                  $i=1;
                                  foreach($stocks as $stock) {

                            ?>

                                <tr>
                                
                                     <td><?php if($stock->TRANSACTION!='Closing Stock'){
                                         echo $i++; }?></td>
                                     
                                     <td><?php if($stock->TRANSACTION!='Closing Stock'){
                                          echo $stock->trans_dt; }
                                          ?></td>
                                     <td><?php if($stock->TRANSACTION!='Closing Stock'){
                                          echo $stock->TRANSACTION; }
                                          else{
                                            echo  "<b>$stock->TRANSACTION</b>";
                                          }
                                          ?></td> 
                                     <td><?php if($stock->TRANSACTION!='Closing Stock'){
                                          echo $stock->PROD_DESC; }
                                          ?></td>
                                     <td><?php if($stock->TRANSACTION!='Closing Stock'){ 
                                         echo  $stock->qty; }
                                         else{
                                            echo  "<b>$stock->qty</b>";
                                         }
                                         ?>
                                         </td>
                                </tr>
                               
 
                                <?php 
                                    $amt=0.00;
                                    $amount_cl = 0.00;
                                    }  ?>
                                    <!--  <tr><td colspan="3" style="text-align: center;">Total</td>
                                     	<td><?=$tot_benifited_farmer?></td>
                                     	<td><?=$tot_qty_paddy_purchased?></td>
                                     	<td></td>
                                     	<td><?=$tot_amount?></td>
                                     	<td><?=$amount_cl?></td>
                                     	<td><?=$chequ_reissue?></td>
                                        <td><?=$chequ_reis_amt?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                     </tr> -->

                         <?php        }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                     <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>

                </div>

            </div>
            
        </div>
        
    <?php

    }

    ?> 

     <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Stock of Product.xls"
                });
            });
        });
    </script>
