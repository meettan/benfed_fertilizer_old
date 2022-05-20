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
                        <h4>GST IN OUT Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <!-- <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5> -->

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>
                                <th>Invoice No</th>

                                <th>Invoice Date</th>

                                <th>Party</th>

                                <th>Invoice Type</th>

                                <th>Input CGST</th>

                                <th>Input SGST</th>

                                <th>Total Sale</th>

                                <th>Output CGST</th>

                                <th>Output SGST</th>
                               
                                <th>CGST Payble</th>
                                <th>SGST Payble</th>
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

                                        foreach($purchase as $purc){
                            ?>

                                <tr class="rep">
                                      <td class="report"><?php echo $i++; ?></td>
                                    <!-- <td class="report"><?php echo $purc->short_name; ?></td>
                                     <td class="report"><?php echo $purc->PROD_DESC; ?></td>
                                     <td class="report"><?php echo $purc->ro_no; ?></td>
                                     <td class="report"><?php echo date("d/m/Y",strtotime($purc->ro_dt)); ?></td>

                                     <td class="report"><?php echo $purc->soc_name; ?></td> -->
                                     <!-- <td class="report"><?php //echo date("d/m/y",strtotime($purc->invoice_dt)); ?></td> -->
                                     <!-- <td class="report"><?php echo $purc->qty; ?></td> -->
                                     
                                 
                                   
                                     <!-- <td class="report"><?php echo $purc->rate; ?></td> -->
                                     <td class="report"><?php echo $purc->trans_do; ?></td>

                                     <td class="report"><?php echo date("d/m/Y",strtotime($purc->do_dt)); ?></td>

                                     <td class="report"><?php echo $purc->soc_name; ?></td>
                                   
                                     <td class="report">  <?php if($purc->gst_type_flag=='Y'){ echo 'B2B';}else{echo 'B2C';}?></td>

                                     <td class="report"><?php echo $purc->pur_cgst; 
                                     $tot_base_price += $purc->pur_cgst; ?>
                                     </td>
                                     
                                     <td class="report"><?php echo $purc->pur_sgst; 
                                      $tot_retlr_margin += $purc->pur_sgst;?>
                                      </td>

                                     <td class="report"><?php echo $purc->sale_tot_amt; 
                                      $tot_spl_rebt += $purc->sale_tot_amt;?>
                                      </td>

                                     <td class="report"><?php echo $purc->sale_cgst;
                                       $tot_rbt_add += $purc->sale_cgst; ?>
                                      </td>

                                     <td class="report"><?php echo $purc->sale_sgst; 
                                     $tot_rbt_less += $purc->sale_sgst;?>
                                      </td>

                                     <td class="report"><?php echo $purc->diff_cgst; 
                                    
                                      $tot_rnd_of_add += $purc->diff_cgst;?> 
                                      </td>

                                     <td class="report"><?php echo $purc->diff_sgst; 
                                     
                                     $tot_rnd_of_less += $purc->diff_sgst;?> 
                                     </td>

                                     <!-- <td class="report"><?php echo $purc->trad_margin; 
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
                                     
 -->

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
                               <td class="report" colspan="5" style="text-align:right">Total</td>
                               <td class="report"><?= $tot_base_price?></td>
                               <td class="report"><?= $tot_retlr_margin?></td>
                              
                               <td class="report"><?=$tot_spl_rebt?></td> 
                               <td class="report"><?=$tot_rbt_add?></td> 
                               
                               <td class="report"><?=$tot_rbt_less?></td>
                               
                               <td class="report"><?=$tot_rnd_of_add?></td>
                               <td class="report"><?=$tot_rnd_of_less?></td>
                               <!-- <td class="report"><?=$taxable_amt?></td>
                               <td class="report"><?=$cgst?></td>
                               <td class="report"><?=$sgst?></td>  -->
                               <!-- <td class="report"></td>
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
  -->
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