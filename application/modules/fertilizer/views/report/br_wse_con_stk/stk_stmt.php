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
                        <h4>Consolidated Stock Between: <?php echo $_SESSION['date']; ?></h4>
                        <!-- <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5> -->

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan =4><b>Solid(MTS)</b></th>
                                <th colspan =5><b>Liquid(LTR)</b></th>
                            </tr>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>District</th>
                               
                                <th>Opening</th>

                                <th>Purchase</th>

                                <th>Sale</th>

                                <th>Closing</th>

                                <th>Opening</th>
                               
                                <th>Purchase</th>
                                
                                <th>Sale</th>

                                <th>Closing</th>
                                

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($branch){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $sldtotal_sale = 0.00;
                                    $lqdtotal_sale = 0.00;
                                    $sldtotal_pur =0.00;
                                    $lqdtotal_pur =0.00;
                                    $sldtot_op =0.00;
                                    $lqdtot_op = 0.00;
                                    $sldcls_baln =0.00;
                                    $lqdcls_baln =0.00;
                                    $lqdtotal=0.00;
                                    $sldtotal=0.00;
                                    $val =0;

                                        foreach($branch as $br){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                      <td class="report"><?php echo $br->district_name; ?>
                                     <td class="report opening" id="opening">
                                        <?php 
                                            foreach($opening as $opndtls){
                                                if($br->district_name==$opndtls->district_name){
                                                    echo round($opndtls->opn_qty,3);
                                                   $sldtot_op +=$opndtls->opn_qty;
                                                    $sldcls_baln+=$opndtls->opn_qty;
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report purchase" id="purchase">
                                        <?php 
                                            foreach($purchase as $purdtls){
                                                if($br->district_name==$purdtls->district_name){
                                                    echo $purdtls->sld_tot_pur;
                                                   $sldtotal_pur +=$purdtls->sld_tot_pur; 
                                                   $sldcls_baln+=$purdtls->sld_tot_pur; 
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report sale" id="sale">
                                        <?php 
                                            foreach($sale as $saledtls){
                                                if($br->district_name==$saledtls->district_name){
                                                    echo $saledtls->sld_tot_sale;
                                                      $sldtotal_sale +=$saledtls->sld_tot_sale; 
                                                    $sldcls_baln-=$saledtls->sld_tot_sale;
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report closing" id="closing">
                                  <?php 
                                        foreach($opening as $opndtls){
                                            if($br->district_name==$opndtls->district_name){
                                               //echo $opndtls->cls_qty ;
												echo $sldcls_baln;
                                                $sldtotal +=$sldcls_baln;
                                            }
											
                                        }
                                        $sldcls_baln=0.00;
                                        ?>
                                  </td>
                                     <td class="report lqdopening" id="lqdopening">
                                        <?php 
                                            foreach($opening as $opndtls){
                                                if($br->district_name==$opndtls->district_name){
                                                    echo round($opndtls->lqd_opn_qty,3);
                                                    $lqdtot_op +=$opndtls->lqd_opn_qty;
                                                    $lqdcls_baln+=$opndtls->lqd_opn_qty;
                                                }
                                            }
                                        ?>
                                     </td>
                                    

                                     <td class="report purchase" id="purchase">
                                        <?php 
                                            foreach($purchase as $purdtls){
                                                if($br->district_name==$purdtls->district_name){
                                                    echo $purdtls->lqd_tot_pur;
                                                    $lqdtotal_pur +=$purdtls->lqd_tot_pur; 
                                                    $lqdcls_baln+=$purdtls->lqd_tot_pur; 
                                                }
                                            }
                                        ?>
                                     </td>
                                    
                                     <td class="report sale" id="sale">
                                        <?php 
                                            foreach($sale as $saledtls){
                                                if($br->district_name==$saledtls->district_name){
                                                    echo $saledtls->lqd_tot_sale;
                                                     $lqdtotal_sale +=$saledtls->lqd_tot_sale; 
                                                     $lqdcls_baln -=$saledtls->lqd_tot_sale;  
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report lclosing" id="lclosing">
                                  <?php 
                                        foreach($opening as $opndtls){
                                            if($br->district_name==$opndtls->district_name){
                                               //echo $opndtls->cls_qty ;
												echo round($lqdcls_baln,3);
                                                $lqdtotal +=$lqdcls_baln;
												//echo 'hi';
                                            }
											
                                        }
                                        $lqdcls_baln=0.00;
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
                               <td class="report" colspan="2" style="text-align:left"><b>Total</b></td> 
                               <!-- <td class="report"></td> -->
                               
                               <td class="report"><b><?=$sldtot_op?></b></td>
                               <td class="report"><b><?=$sldtotal_pur?></b></td>
                               <td class="report"><b><?=$sldtotal_sale?></b></td>
                               <td class="report"><b><?=$sldtotal?></b></td>
                               <td class="report"><b><?=$lqdtot_op?></b></td>
                               <td class="report"><b><?=$lqdtotal_pur?></b></td>
                               <td class="report"><b><?=$lqdtotal_sale?></b></td>
                               <td class="report"><b><?=$lqdtotal?></b></td>
                               <!-- <td class="report"></td>  -->
                               
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
    title: ' consolidated Stock',
    text: 'Export to excel'

   }
]
   });
</script>