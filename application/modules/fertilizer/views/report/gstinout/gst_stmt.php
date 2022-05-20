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
                       
                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Invoice No</th>

                                <th>Invoice Date</th>

                                <th>Party</th>

                                <th>GSTIN</th>

                                <th>Invoice Type</th>

                                <!-- <th>Input CGST(Purchase)</th>

                                <th>Input SGST(Purchase)</th> -->

                                <th>Taxable Amount</th>

                                <th>GST Rate</th>

                                <th>Output CGST</th>

                                <th>Output SGST</th>

                                <th>Total Tax</th>

                                <th>Sale Invoice Amount</th>
<!--                                
                                <th>CGST Payble</th>

                                <th>SGST Payble</th> -->
                                

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($purchase){ 

                                    $i                = 1;
                                    $total            = 0.00;
                                    $tot_sgst         = 0.00;
                                    $tot_cgst         = 0.00;
                                    $tot_frt          = 0.00;
                                    $tot_oth          = 0.00;
                                    $tot_trad_margin  = 0.00;
                                    $tot_rnd_of_less  = 0.00;
                                    $tot_rnd_of_add   = 0.00;
                                    $tot_rbt_less     = 0.00;
                                    $tot_rbt_add      = 0.00;
                                    $tot_spl_rebt     = 0.00;
                                    $tot_retlr_margin = 0.00;
                                    $tot_base_price   = 0.00;
                                    $tot_taxable      = 0.00;
                                    $tot_tax          = 0.00;
                                    $val              = 0;

                            foreach($purchase as $purc){
                            ?>

                                <tr class="rep">
                                      <td class="report"><?php echo $i++; ?></td>                         
                                   
                                     <td class="report"><?php echo $purc->trans_do; ?></td>

                                     <td class="report"><?php echo date("d/m/Y",strtotime($purc->do_dt)); ?></td>

                                     <td class="report"><?php echo $purc->soc_name; ?></td>

                                     <td class="report"><?php echo $purc->gstin; ?></td>
                                   
                                     <td class="report">  <?php if($purc->gst_type_flag=='Y'){ echo 'B2B';}else{echo 'B2C';}?></td>

                                     <!-- <td class="report"><?php echo $purc->pur_cgst; 
                                    // $tot_base_price += $purc->pur_cgst; ?>
                                     </td>
                                     
                                     <td class="report"><?php echo $purc->pur_sgst; 
                                     // $tot_retlr_margin += $purc->pur_sgst;?>
                                      </td> -->

                                      <td class="report"><?php echo $purc->taxable_amt; 
                                      $tot_taxable += $purc->taxable_amt;?>
                                      </td>

                                      <td class="report"><?php echo $purc->gst_rt; 
                                    //   $tot_taxable += $purc->taxable_amt;?>
                                      </td>

                                     <td class="report"><?php echo $purc->sale_cgst;
                                       $tot_rbt_add += $purc->sale_cgst; ?>
                                      </td>

                                     <td class="report"><?php echo $purc->sale_sgst; 
                                     $tot_rbt_less += $purc->sale_sgst;?>
                                      </td>
                                      <td class="report"><?php echo  $purc->sale_cgst + $purc->sale_sgst; 
                                     $tot_tax += $purc->sale_sgst +$purc->sale_cgst ;?>
                                      </td>

                                      <td class="report"><?php echo $purc->sale_tot_amt; 
                                      $tot_spl_rebt += $purc->sale_tot_amt;?>
                                      </td>

                                     <!-- <td class="report"><?php echo $purc->diff_cgst; 
                                    
                                     // $tot_rnd_of_add += $purc->diff_cgst;?> 
                                      </td>

                                     <td class="report"><?php echo $purc->diff_sgst; 
                                     
                                    // $tot_rnd_of_less += $purc->diff_sgst;?> 
                                     </td> -->
                                   
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
                               <td class="report" colspan="6" style="text-align:right">Total</td>

                               <!-- <td class="report"><?= $tot_base_price?></td>

                               <td class="report"><?= $tot_retlr_margin?></td> -->

                               <td class="report"><?=$tot_taxable?></td> 
                               <td></td>

                               <td class="report"><?=$tot_rbt_add?></td> 

                               <td class="report"><?=$tot_rbt_less?></td>

                               <td class="report"><?=$tot_tax?></td>

                               <td class="report"><?=$tot_spl_rebt?></td>

                               <!-- <td class="report"><?=$tot_rnd_of_add?></td>

                               <td class="report"><?=$tot_rnd_of_less?></td> -->
                              
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
    title: 'BENFED GST IN OUT REPORT',
    text: 'Export to excel'

   }
]
   });
</script>