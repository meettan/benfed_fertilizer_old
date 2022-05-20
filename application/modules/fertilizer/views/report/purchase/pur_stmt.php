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

                                <th>Stock Point</th>

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

                                <th>Container</th>

                                <!-- <th>No of Bag</th> -->

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($purchase){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $tot_sgst = 0.00;
                                    $tot_cgst = 0.00;
                                    $tot_frt  = 0.00;
                                    $tot_oth  = 0.00;
                                    $tot_trad_margin = 0.00;
                                    $tot_rnd_of_less = 0.00;
                                    $tot_rnd_of_add  = 0.00;
                                    $tot_rbt_less    = 0.00;
                                    $tot_rbt_add    =0.00;
                                    $tot_spl_rebt   =0.00;
                                    $tot_retlr_margin =0.00;
                                    $tot_base_price  =0.00;
                                    $val =0;
                                    $totlqd_pur=0.00;
                                    $totsld_pur=0.00;
                                    $contain=0.00;

                                        foreach($purchase as $purc){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                     <td class="report"><?php echo $purc->short_name; ?></td>
                                     <td class="report"><?php echo $purc->PROD_DESC; ?></td>
                                     <td class="report"><?php echo $purc->ro_no; ?></td>
                                     <td class="report"><?php echo date("d/m/Y",strtotime($purc->ro_dt)); ?></td>

                                     <td class="report"><?php echo $purc->soc_name; ?></td>
                                     <!-- <td class="report"><?php //echo date("d/m/y",strtotime($purc->invoice_dt)); ?></td> -->
                                     <td class="report">
                                         <?php 
                                        // echo $purc->qty; 
                                        if($purc->unit==1){

                                            echo $purc->qty; 
                                            $totsld_pur+=$purc->qty;
                                            $contain= $purc->qty*1000/$purc->qty_per_bag; 
                                           }elseif($purc->unit==2){
                                              echo ($purc->qty)/1000; 
                                              $totsld_pur+=($purc->qty)/1000; 
                                              $contain= ($purc->qty)/($purc->qty_per_bag); 
                                           }elseif($purc->unit==4){
                                              echo ($purc->qty)/10;
                                              $totsld_pur+=($purc->qty)/10;
                                              $contain= ($purc->qty)*($purc->qty_per_bag)/10;
                                           }elseif($purc->unit==6){
                                             echo ($purc->qty)/1000000;
                                             $totsld_pur+=($purc->qty)/1000000;
                                             $contain= $purc->qty*1000/$purc->qty_per_bag; 
                                           }elseif($purc->unit==3){
                                              echo $purc->qty;
                                              $totlqd_pur+=$purc->qty;
                                              $contain= $purc->qty*1000/$purc->qty_per_bag;
                                           }elseif($purc->unit==5){
                                            echo ($purc->qty)/1000; 
                                            $totlqd_pur+=($purc->qty)/1000; 
                                            $contain= ($purc->qty)/($purc->qty_per_bag); 
                                           }
                                         ?>
                                         </td>
                                     <td class="report">
                                         <?php 
                                           
                                            if($purc->unit==1 ||$purc->unit==2 ||$purc->unit==4 || $purc->unit==6){
                                                echo "MTS" ;  
                                              }elseif($purc->unit==3||$purc->unit==5){
                                                echo "LTR" ;
                                              }
                                        ?>
                                     </td>
                                 
                                   
                                     <td class="report"><?php echo $purc->rate; ?></td>

                                     <td class="report"><?php echo $purc->base_price; 
                                     $tot_base_price += $purc->base_price; ?></td>
                                     
                                     <td class="report"><?php echo $purc->retlr_margin; 
                                      $tot_retlr_margin += $purc->retlr_margin;?></td>

                                     <td class="report"><?php echo $purc->spl_rebt; 
                                      $tot_spl_rebt += $purc->spl_rebt;?></td>

                                     <td class="report"><?php echo $purc->rbt_add;
                                      $tot_rbt_add += $purc->rbt_add; ?></td>

                                     <td class="report"><?php echo $purc->rbt_less; 
                                      $tot_rbt_less += $purc->rbt_less;?></td>

                                     <td class="report"><?php echo $purc->rnd_of_add; 
                                      $tot_rnd_of_add += $purc->rnd_of_add;?></td>

                                     <td class="report"><?php echo $purc->rnd_of_less; 
                                     $tot_rnd_of_less += $purc->rnd_of_less;?></td>

                                     <td class="report"><?php echo $purc->trad_margin; 
                                      $tot_trad_margin += $purc->trad_margin;?></td>

                                     <td class="report"><?php echo $purc->oth_dis; 
                                      $tot_oth += $purc->oth_dis;?></td>

                                     <td class="report"><?php echo $purc->frt_subsidy; 
                                      $tot_frt += $purc->frt_subsidy;?></td>

                                     <td class="report"><?php echo $purc->cgst; 
                                     $tot_cgst += $purc->cgst; ?></td>

                                     <td class="report"><?php echo $purc->sgst;
                                      $tot_sgst += $purc->sgst; ?></td>

                                     <td class="report"><?php echo $purc->tot_amt;
                                      $total += $purc->tot_amt; ?>

                                     </td>
                                     
                                     <td class="report" type="text"colspan="8"id="container">
                                        <?php 
                                            
                                                    if($purc->unit==1){

                                                       // echo ceil(number_format((float)($contain*1000 )/$purc->qty_per_bag,3,'.',''));                                                      
                                                       echo ceil(number_format((float)($contain ),3,'.',''));
                                                    }elseif($purc->unit==2){
                                                        //    echo ceil(number_format((float)($contain*1000)/$purc->qty_per_bag,3,'.',''));  
                                                        echo ceil(number_format((float)($contain ),3,'.',''));                                        
                                                    }elseif($purc->unit==4){
                                                        // echo ceil(number_format((float)($contain)*100/$purc->qty_per_bag,3,'.',''));
                                                        echo ceil(number_format((float)($contain ),3,'.',''));
                                                    }elseif($purc->unit==6){
                                                    //    echo ceil(number_format((float)($contain)*1000/$purc->qty_per_bag,3,'.',''));
                                                    echo ceil(number_format((float)($contain ),3,'.',''));
                                                    }elseif($purc->unit==3){
                                                    //  echo ceil(number_format((float)($contain)/$purc->qty_per_bag,3,'.',''));
                                                    echo ceil(number_format((float)($contain ),3,'.',''));
                                                    }elseif($purc->unit==5){
                                                //    echo ceil(number_format((float)($contain*1000)/$purc->qty_per_bag,3,'.',''));
                                                echo ceil(number_format((float)($contain ),3,'.',''));
                                            }
                                            $contain=0.00;
                                            $containlqd=0.00;
                                        ?>
                                     </td>


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
                        <tfooter>
                            <tr>
                               <td class="report" colspan="7" style="text-align:right">Total</td> 
                               <!-- <td class="report"><?=$taxable_amt?></td>
                               <td class="report"><?=$cgst?></td>
                               <td class="report"><?=$sgst?></td>  -->
                               <td class="report"></td>
                               <td class="report"></td>
                               <td class="report"><?= $tot_base_price?></td>
                               <td class="report"><?= $tot_retlr_margin?></td>
                              
                               <td class="report"><?=$tot_spl_rebt?></td>
                               
                               <td class="report"><?=$tot_rbt_add?></td> 
                               
                               <td class="report"><?=$tot_rbt_less?></td>
                               
                               <td class="report"><?=$tot_rnd_of_add?></td>
                               <td class="report"><?=$tot_rnd_of_less?></td>
                               
                               
                               <td class="report"><?=$tot_trad_margin?></td>
                               
                               <td class="report"><?=$tot_oth?></td>
                               
                               <td class="report"><?=$tot_frt?></td>
                               <td class="report"><?=$tot_cgst?></td>
                               <td class="report"><?=$tot_sgst?></td>
                               
                                <td class="report"><?=$total?></td>  
 
                            </tr>
                            <tr>
                               <td class="report" colspan="4" style="text-align:left" bgcolor="silver" ><b>Summary</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Purchase</b></td>
                              </tr> 

                            <tr>
                               <td class="report" colspan="4" style="text-align:left" bgcolor="silver"><b>Solid( MTS) </b></td> 
                              <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totsld_pur?></td>
                            </tr>
                            
                            <tr>
                               <td class="report" colspan="4" style="text-align:left" bgcolor="silver"><b>Liquid( LTR ) </b></td> 
                              <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $totlqd_pur?></td>
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