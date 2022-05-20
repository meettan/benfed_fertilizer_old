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
                        <h4>Companywise Stock Statement Between: <?php echo $_SESSION['date']; ?></h4>
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
                                    $cls_baln=0.00;
                                    $val =0;
                                    $opqtylqd =0.00;
                                    $totlqd_pur= 0.00; 
                                    $totsld_pur=0.00;
                                    $totsld_sal=0.00;
                                    $totlqd_sal=0.00;
                                    $totsld_op=0.00;
                                    $totlqd_op=0.00;
                                    $totsld_cls=0.00;
                                    $totlqd_cls=0.00;
                                    $contain =0.00;
                                    $containlqd=0.00;

                                        foreach($product as $prodtls){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                 <!--     <td class="report"><?php //echo $prodtls->short_name; ?> -->
                                     <td class="report"><?php echo $prodtls->PROD_DESC; ?>
                                     <td class="report"><?php echo $prodtls->ro_no; ?>
                                     <!-- <td class="report"><?php if($prodtls->unit==3){
                                                  echo "Litre";
                                                }else if ($prodtls->unit==5){
                                                  echo "ML"; 
                                                }else if ($prodtls->unit==1){
                                                    echo "MT";
                                                }else if ($prodtls->unit==2){ 
                                                    echo "Kg";
                                                }else if ($prodtls->unit==4){ 
                                                    echo "Quintal";
                                                }else if ($prodtls->unit==6){
                                                    echo "Gm";
                                                }else if ($prodtls->unit==7){
                                                    echo "Pc";
                                                }
                                        ?>
                                     </td> -->
                                     <td class="report"><?php
                                      
                                      if($prodtls->unit==1 ||$prodtls->unit==2 ||$prodtls->unit==4 || $prodtls->unit==6){
                                        echo "MTS" ;  
                                      }elseif($prodtls->unit==3||$prodtls->unit==5){
                                        echo "LTR" ;
                                      }
                                     
                                    
                                        ?>
                                     </td>
                                     <td class="report opening"   id="opening">
                                        <?php 
                                            foreach($opening as $opndtls){
                                                if($prodtls->ro_no==$opndtls->ro_no){
                                                    if($prodtls->unit==1){

                                                        echo   number_format($opndtls->opn_qty,3); 
                                                        $opqty=$opndtls->opn_qty;
                                                        $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==2){
                                                          echo  number_format(($opndtls->opn_qty)/1000,3); 
                                                          $opqty=($opndtls->opn_qty)/1000; 
                                                          $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==4){
                                                          echo  number_format(($opndtls->opn_qty)/10,3);
                                                          $opqty=($opndtls->opn_qty)/10;
                                                          $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==6){
                                                         echo  number_format(($opndtls->opn_qty)/1000000,3);
                                                         $opqty=($opndtls->opn_qty)/1000000;
                                                         $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==3){
                                                          echo  number_format($opndtls->opn_qty,3);
                                                          $opqty=$opndtls->opn_qty;
                                                          $opqtylqd+=$opqty;
                                                       }elseif($prodtls->unit==5){
                                                        echo  number_format(($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000,3); 
                                                          $opqty=($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000; 
                                                          $opqtylqd+=$opqty;
                                                       }
                                                    // echo $opndtls->opn_qty;
                                                    // $tot_op +=$opndtls->opn_qty;
                                                    $tot_op +=$opqty;
                                                    $cls_baln+=$opqty;
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
                                                        $purqty=$purdtls->tot_pur;
                                                        $totsld_pur+=$purqty;
                                                       }elseif($prodtls->unit==2){
                                                          echo ($purdtls->tot_pur)/1000; 
                                                          $purqty=($purdtls->tot_pur)/1000; 
                                                          $totsld_pur+=$purqty;
                                                       }elseif($prodtls->unit==4){
                                                          echo ($purdtls->tot_pur)/10;
                                                          $purqty=($purdtls->tot_pur)/10;
                                                          $totsld_pur+=$purqty;
                                                       }elseif($prodtls->unit==6){
                                                         echo ($purdtls->tot_pur)/1000000;
                                                         $purqty=($purdtls->tot_pur)/1000000;
                                                         $totsld_pur+=$purqty;
                                                       }elseif($prodtls->unit==3){
                                                          echo $purdtls->tot_pur;
                                                          $purqty=$purdtls->tot_pur;
                                                          $totlqd_pur+=$purdtls->tot_pur;
                                                       }elseif($prodtls->unit==5){
                                                        echo ($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000; 
                                                          $purqty=($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000; 
                                                          $totlqd_pur+=$purqty;
                                                       }
                                                     // echo $purdtls->tot_pur;
                                                    // $total_pur +=$purdtls->tot_pur;  
                                                    $total_pur += $purqty;
                                                    $cls_baln  += $purqty;
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
                                                        $saleqty=$saledtls->tot_sale;
                                                        $totsld_sal+=$saleqty;
                                                       }elseif($prodtls->unit==2){
                                                          echo ($saledtls->tot_sale)/1000; 
                                                          $saleqty=($saledtls->tot_sale)/1000; 
                                                          $totsld_sal+=$saleqty;
                                                       }elseif($prodtls->unit==4){
                                                          echo ($saledtls->tot_sale)/10;
                                                          $saleqty=($saledtls->tot_sale)/10;
                                                          $totsld_sal+=$saleqty;
                                                       }elseif($prodtls->unit==6){
                                                         echo ($saledtls->tot_sale)/1000000;
                                                         $saleqty=($saledtls->tot_sale)/1000000;
                                                         $totsld_sal+=$saleqty;
                                                       }elseif($prodtls->unit==3){
                                                          echo $saledtls->tot_sale;
                                                          $saleqty=$saledtls->tot_sale;
                                                          $totlqd_sal+=$saledtls->qty;
                                                       }elseif($saledtls->unit==5){
                                                        echo ($saledtls->tot_sale)*($prodtls->qty_per_bag)/1000; 
                                                          $saleqty=($saledtls->tot_sale)*($prodtls->qty_per_bag)/1000; 
                                                          $totlqd_sal+= $saleqty; 
                                                       }

                                                    // echo $saledtls->tot_sale;
                                                    // $total_sale +=$saledtls->tot_sale;  
                                                     $total_sale +=$saleqty;
                                                    $cls_baln-=$saleqty;
                                                }
                                            }
                                        ?>
                                     </td>

                                     <td class="report closing" id="closing">
                                     <?php 
                                            foreach($opening as $opndtls){
                                                if($prodtls->ro_no==$opndtls->ro_no){
                                                   echo  number_format($cls_baln,3);

                                                    }
                                                }
                                                $cls_baln=0.00;
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
                               <td class="report" colspan="4" style="text-align:left"   bgcolor="silver" ><b>Summary</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Opening</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Purchase</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Sale</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Closing</b></td>
                            </tr>
                            <tr>
                               <td class="report" colspan="4" style="text-align:left"   bgcolor="silver"><b>Solid( MTS) </b></td> 
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totsld_op?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totsld_pur?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totsld_sal?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $totsld_op  + $totsld_pur - $totsld_sal ?></td>
                            </tr>
                            <tr>
                            <tr>
                               <td class="report" colspan="4" style="text-align:left"   bgcolor="silver"><b>Liquid( LTR ) </b></td> 
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totlqd_op?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $totlqd_pur?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $totlqd_sal?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totlqd_op + $totlqd_pur - $totlqd_sal ?> </td>
                              
                                  
                                    
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