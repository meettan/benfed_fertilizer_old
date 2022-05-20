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
                        <h4>Stock Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
                        <h5 style="text-align:left"><label>Company: </label> <?php  if($product){ foreach($product as $prodtls);echo $prodtls->short_name;}?></h5>

                    </div>
                  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                              <!--   <th>Company</th> -->

                                <th>Product</th>

                                <th>Ro</th>

                                <th>Unit</th>

                                <th>Opening</th>

                                <th>Purchase during the period</th>

                                <th>Sale during the period</th>

                                <th>Closing</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $total_sale = 0.00;
                                    $total_pur =0.00;
                                    $tot_op =0.00;
                                    $val =0;

                                        foreach($product as $prodtls){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                 <!--     <td class="report"><?php //echo $prodtls->short_name; ?> -->
                                     <td class="report"><?php echo $prodtls->PROD_DESC; ?>
                                     <td class="report"><?php echo $prodtls->ro_no; ?>
                                     <td class="report"><?php 
                                            // if($prodtls->unit==3){
                                            //       echo "Litre";
                                            //     }else if ($prodtls->unit==5){
                                            //       echo "ML"; 
                                            //     }else if ($prodtls->unit==1){
                                            //         echo "MT";
                                            //     }else if ($prodtls->unit==2){ 
                                            //         echo "Kg";
                                            //     }else if ($prodtls->unit==4){ 
                                            //         echo "Quintal";
                                            //     }else if ($prodtls->unit==6){
                                            //         echo "Gm";
                                            //     }else if ($prodtls->unit==7){
                                            //         echo "Pc";
                                            //     }
                                            if($prodtls->unit==1 ||$prodtls->unit==2 ||$prodtls->unit==4 || $prodtls->unit==6){
                                                echo "MTS" ;  
                                              }elseif($prodtls->unit==3||$prodtls->unit==5){
                                                echo "LTR" ;
                                              }
                                        ?>
                                     </td>
                                     <td class="report opening" id="opening">
                                        <?php 
                                            foreach($opening as $opndtls){
                                                if($prodtls->ro_no==$opndtls->ro_no){
                                                    echo $opndtls->opn_qty;
                                                    $tot_op +=$opndtls->opn_qty;
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report purchase" id="purchase">
                                        <?php 
                                            foreach($purchase as $purdtls){
                                                if($prodtls->ro_no==$purdtls->ro_no){
                                                    if($prodtls->unit==1){

                                                        echo $purdtls->tot_pur; 
                                                       }elseif($prodtls->unit==2){
                                                           echo ($purdtls->tot_pur)/1000; 
                                                       }elseif($prodtls->unit==4){
                                                           echo ($purdtls->tot_pur)/10;
                                                       }elseif($prodtls->unit==6){
                                                           echo ($purdtls->tot_pur)/1000000;
                                                       }elseif($prodtls->unit==3){
                                                           echo $purdtls->tot_pur;
                                                       }elseif($prodtls->unit==5){
                                                           echo ($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000;   
                                                       }
                                                    // echo $purdtls->tot_pur;
                                                    // $total_pur +=$purdtls->tot_pur;  
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report sale" id="sale">
                                        <?php 
                                            foreach($sale as $saledtls){
                                                if($prodtls->ro_no==$saledtls->sale_ro){
                                                    if($prodtls->unit==1){

                                                        echo $saledtls->tot_sale; 
                                                       }elseif($prodtls->unit==2){
                                                           echo ($saledtls->tot_sale)/1000; 
                                                       }elseif($prodtls->unit==4){
                                                           echo ($saledtls->tot_sale)/10;
                                                       }elseif($prodtls->unit==6){
                                                           echo ($saledtls->tot_sale)/1000000;
                                                       }elseif($prodtls->unit==3){
                                                           echo $saledtls->tot_sale;
                                                       }elseif($prodtls->unit==5){
                                                           echo ($saledtls->tot_sale)*($prodtls->qty_per_bag)/1000;   
                                                       }
                                                    // echo $saledtls->tot_sale;
                                                    // $total_sale +=$saledtls->tot_sale;  
                                                }
                                            }
                                        ?>
                                     </td>

                                     <td class="report closing" id="closing">
                                        <?php 
                                            // foreach($closing as $clsdtls){
                                            //     if($prodtls->ro_no==$clsdtls->ro_no){
                                            //         echo $clsdtls->opn_qty; 
                                            //         //echo $opndtls->cls_qty;
                                            //         $total +=$clsdtls->opn_qty;  
                                            //        // $total +=$opndtls->cls_qty;              
                                            //     }
                                           // }
                                           foreach($opening as $opndtls){
                                            if($prodtls->ro_no==$opndtls->ro_no){
                                                echo $opndtls->cls_qty;
                                                $total +=$opndtls->opn_qty;
                                            }
                                        }
                                        ?>
                                     </td>
                                   
                                </tr>
 
                                <?php  
                                                        
                                    }
                                ?>

 
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>
                        <tfooter>
                            <tr>
                               <!-- <td class="report" colspan="3" style="text-align:right">Total</td> 
                               <td class="report"></td>
                               <td class="report"><?=$tot_op?></td>
                               <td class="report"><?=$total_pur?></td>
                               <td class="report"><?=$total_sale?></td> -->
                               
                               
                                <!-- <td class="report"><?=$total?></td>   -->
 
                            </tr>
                        </tfooter>
                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

                </div>

            </div>
            
        </div>

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<script>
   $('#example').dataTable({
    destroy: true,
   searching: false,ordering: false,paging: false,

    dom: 'Bfrtip',
    buttons: [
    {
    extend: 'excelHtml5',
    title: ' comp wise Statement',
    text: 'Export to excel'

   }
]
   });
</script>