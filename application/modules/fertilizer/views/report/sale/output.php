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
                        <h4>Sale Ledger Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Company</th>

                                <th>Product</th>

                                <th>Society</th>

                                <th>Sale invoice</th>

                                <th>Ro dt</th>

                               <!--  <th>Trans type</th> -->

                                <th>Unit</th>

                                <th>Qty</th>

                                <!-- <th>Sale Rate</th> -->

                                <th>Taxable Amt</th>

                                <th>CGST</th>

                                <th>SGST</th>

                                <th>Discount</th>

                                <th>Total amt</th>

                                <th>Cotainer</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($sales){ 

                                    $i = 1;
                                    $total      = 0.00;
                                    $tot_cgst   = 0.00;
                                    $tot_sgst   = 0.00;
                                    $tot_taxamt = 0.00;
                                    $tot_dis    = 0.00;
                                    $tot_qty    = 0.00;
                                    $val        = 0;
                                    $sal_qty     =0.00;
                                    $totsld_sal  = 0.00;
                                    $totlqd_sal  = 0.00;

                                        foreach($sales as $sal){
                            ?>

                                <tr class="rep">
                                    <td class="report"><?php echo $i++; ?></td>
                                    <td class="report"><?php echo $sal->short_name; ?></td>
                                    <td class="report"><?php echo $sal->PROD_DESC; ?></td>
                                    <td class="report"><?php echo get_fersociety_name($sal->soc_id);?></td>
                                    <td class="report"><?php echo $sal->trans_do; ?></td>
                                    <td  class="report"><?php echo date("d/m/Y",strtotime($sal->do_dt)); ?></td>
                                    <!-- <td class="report"><?php //echo $sal->trans_type; ?></td> -->
                                     <td class="report"><?php 
                                     if($sal->unit==1 ||$sal->unit==2 ||$sal->unit==4 || $sal->unit==6){
                                                echo "MTS" ;  
                                              }elseif($sal->unit==3||$sal->unit==5){
                                                echo "LTR" ;
                                              }
                                              ?>
                                              </td>
                                    
                                    <td class="report">
                                        <?php 
                                        // echo $sal->qty;
                                        if($sal->unit==1){

                                            echo $sal->qty; 
                                           $sal_qty=$sal->qty*1000/$sal->qty_per_bag;
                                           $totsld_sal+=$sal->qty;
                                           }elseif($sal->unit==2){
                                              echo ($sal->qty)/1000; 
                                              $sal_qty=($sal->qty)/$sal->qty_per_bag; 
                                              $totsld_sal+=($sal->qty)/1000;
                                           }elseif($sal->unit==4){
                                              echo ($sal->qty)/10;
                                              $sal_qty=($sal->qty)/10;
                                              $totsld_sal+=$sal_qty;
                                           }elseif($sal->unit==6){
                                             echo ($sal->qty)/1000000;
                                             $sal_qty=($sal->qty)*1000/$sal->qty_per_bag;
                                             $totsld_sal+=($sal->qty)/1000000;
                                           }elseif($sal->unit==3){
                                              echo $sal->qty;
                                              $sal_qty=$sal->qty*1000/($sal->qty_per_bag);
                                              $totlqd_sal+=$sal->qty;
                                           }elseif($sal->unit==5){
                                            echo ($sal->qty)/1000; 
                                            $sal_qty=($sal->qty)/($sal->qty_per_bag); 
                                            $totlqd_sal+=($sal->qty)/1000;
                                           }

                                    //   $tot_qty += $sal->qty;
                                    $tot_qty +=$sal_qty;
                                    ?>
                                      </td>
                                    <!-- <td class="report"><?php echo $sal->sale_rt; ?></td> -->
                                    <td class="report"><?php echo $sal->taxable_amt; 
                                    $tot_taxamt += $sal->taxable_amt;?></td>
                                    <td class="report"><?php echo $sal->cgst; 
                                    $tot_cgst += $sal->cgst;?></td>
                                    
                                    <td class="report"><?php echo $sal->sgst; 
                                     $tot_sgst += $sal->sgst;?></td>
                                    
                                    <td class="report"><?php echo $sal->dis;
                                     $tot_dis += $sal->dis; ?></td>
                                    <td class="report"><?php echo $sal->tot_amt; 
                                      $total += $sal->tot_amt; ?>
                                      </td>
                                      <td class="report" type="text"colspan="8"id="container">
                                        <?php 
                                            // foreach($opening as $opndtls){
                                            //     if($prodtls->prod_id==$opndtls->prod_id){
                                                    if($sal->unit==1){

                                                        echo ceil(number_format((float)($sal->qty*1000 )/$sal->qty_per_bag,3,'.',''));                                                      
                                                       
                                                    }elseif($sal->unit==2){
                                                           echo ceil(number_format((float)( $sal->qty)/$sal->qty_per_bag,3,'.',''));                                          
                                                    }elseif($sal->unit==4){
                                                        echo ceil(number_format((float)( $sal->qty)*100/$sal->qty_per_bag,3,'.',''));
                                                       
                                                    }elseif($sal->unit==6){
                                                       echo ceil(number_format((float)( $sal->qty)*1000/$sal->qty_per_bag,3,'.',''));
                                                    }elseif($sal->unit==3){
                                                     echo ceil(number_format((float)( $sal->qty)/$sal->qty_per_bag,3,'.',''));
                                                  
                                                    }elseif($sal->unit==5){
                                                   echo ceil(number_format((float)( $sal->qty*1000)/$sal->qty_per_bag,3,'.',''));
                                                //     }
                                                // }
                                            }
                                            // $contain=0.00;
                                            // $containlqd=0.00;
                                        ?>
                                     </td>
                                   
                                </tr>
 
                                <?php  
                                                        
                                    }
                              
                                       }
                                else{

                                    echo "<tr><td colspan='15' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>
                        <tfooter>
                            <tr>
                               <td class="report" colspan="7" style="text-align:right">Total</td> 
                               <!-- <td class="report"><?=$tot_qty?></td> -->
                               <td class="report"></td>
                               <td class="report"><?=$tot_taxamt?></td>
                               <td class="report"><?=$tot_cgst?></td>
                               <td class="report"><?=$tot_sgst?></td> 
                               <td class="report"><?=$tot_dis?></td>
                               
                                <td class="report"><?=$total?></td>  
                                
 
                            </tr>
                            <tr>
                               <td class="report" colspan="12" style="text-align:left" bgcolor="silver" ><b>Summary</b></td>

                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Sale</b></td>
                               
                            </tr>
                            <tr>
                               <td class="report" colspan="12" style="text-align:left" bgcolor="silver"><b>Solid( MTS) </b></td> 
                               
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totsld_sal?></td>
                               
                            </tr>
                            <tr>
                            <tr>
                               <td class="report" colspan="12" style="text-align:left" bgcolor="silver"><b>Liquid( LTR ) </b></td> 
                             
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $totlqd_sal?></td>
                            
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
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script> -->
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script> -->

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<script>
   $('#example').dataTable({
    destroy: true,
   searching: false,ordering: false,paging: false,

dom: 'Bfrtip',
buttons: [
   {
extend: 'excelHtml5',
title: 'BENFED SALE REPORT',
text: 'Export to excel'
//Columns to export
// exportOptions: {
//    columns: [0, 1, 2, 3]
// }
   }
]
   });
</script>