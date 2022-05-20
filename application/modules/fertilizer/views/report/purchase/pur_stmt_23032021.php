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




    

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Purchase Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Company</th>

                                <th>Product</th>

                                <th>Ro No</th>

                                <th>Ro Dt</th>

                               <!--  <th>Invoice no</th> -->

                                <!-- <th>Invoice Dt</th> -->

                                <th>Qty</th>

                                <th>Unit</th>

                                <!-- <th>Stock Qty</th> -->

                                <th>Rate</th>

                                <th>Base Price</th>

                                <th>Add RTL Margin</th>
                                <th>Less Spl Rebt</th>
                                <th>Add Rebt</th>
                                <th>Less Rebt</th>
                                <th>Add Rnd off</th>
                                <th>Less Rnd off</th>
                                <th>Less Trade Margin</th>
                                <th>Less Other Discount</th>
                                <th>Less Freight Subsidy</th>
                                <th>CGST</th>

                                <th>SGST</th>

                                <th>Total amt</th>

                                <!-- <th>No of Bag</th> -->

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($purchase){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $val =0;

                                        foreach($purchase as $purc){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                     <td class="report"><?php echo $purc->short_name; ?></td>
                                     <td class="report"><?php echo $purc->PROD_DESC; ?></td>
                                     <td class="report"><?php echo $purc->ro_no; ?></td>
                                     <td class="report"><?php echo date("d/m/yy",strtotime($purc->ro_dt)); ?></td>
                                     <!-- <td class="report"><?php //echo $purc->invoice_no; ?></td> -->
                                     <!-- <td class="report"><?php //echo date("d/m/y",strtotime($purc->invoice_dt)); ?></td> -->
                                     <td class="report"><?php echo $purc->qty; ?></td>
                                     <td class="report"><?php if($purc->unit==3){
                                                  echo "Litre";
                                                }else if ($purc->unit==5){
                                                  echo "ML"; 
                                                }else if ($purc->unit==1){
                                                    echo "MT";
                                                }else if ($purc->unit==2){ 
                                                    echo "Kg";
                                                }else if ($purc->unit==4){ 
                                                    echo "Quintal";
                                                }else if ($purc->unit==6){
                                                    echo "Gm";
                                                }else if ($purc->unit==7){
                                                    echo "Pc";
                                                }
                                        ?>
                                     </td>
                                 
                                   
                                     <td class="report"><?php echo $purc->rate; ?></td>
                                     <td class="report"><?php echo $purc->base_price; ?></td>
                                     <td class="report"><?php echo $purc->retlr_margin; ?></td>
                                     <td class="report"><?php echo $purc->spl_rebt; ?></td>
                                     <td class="report"><?php echo $purc->rbt_add; ?></td>
                                     <td class="report"><?php echo $purc->rbt_less; ?></td>
                                     <td class="report"><?php echo $purc->rnd_of_add; ?></td>
                                     <td class="report"><?php echo $purc->rnd_of_less; ?></td>
                                     <td class="report"><?php echo $purc->trad_margin; ?></td>
                                     <td class="report"><?php echo $purc->oth_dis; ?></td>
                                     <td class="report"><?php echo $purc->frt_subsidy; ?></td>
                                     <td class="report"><?php echo $purc->cgst; ?></td>
                                     <td class="report"><?php echo $purc->sgst; ?></td>
                                     <td class="report"><?php echo $purc->tot_amt; ?></td>
                                     


                                     <!-- <td class="report"><?php //echo $purc->no_of_bags; ?></td> -->
                                   
                                </tr>
 
                                <?php  
                                                        
                                    }
                                ?>

 
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='16' style='text-align:center;'>No Data Found</td></tr>";

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
            
        </div>