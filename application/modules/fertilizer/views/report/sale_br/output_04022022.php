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
                        <h4>Sale Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
                        
                         <!-- <h5 style="text-align:left"><label>Society: </label> <?php 
                              if($sales){ foreach($sales as $sal);
                               echo get_fersociety_name($sal->soc_id);;} ?></h5> -->

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Company</th>

                                <th>Product</th>

                                <th>Unit</th>

                                <th>Society</th>

                                <th>Sale invoice</th>

                                <th>Do dt</th>

                                <th>Qty</th>

                                <th>Sale Rate</th>

                                <th>Taxable Amt</th>

                                <th>CGST</th>

                                <th>SGST</th>

                               <!--  <th>Discount</th> -->

                                <th>Total amt</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($br_sales){ 

                                    $i = 1;
                                    
                                    $taxable = 0.00;
                                    $cgst    = 0.00;
                                    $sgst    = 0.00;
                                    $disc    = 0.00;
                                    $total   = 0.00;

                                    $val =0;

                                        foreach($br_sales as $sal){
                            ?>

                                <tr class="rep">
                                    <td class="report"><?php echo $i++; ?></td>
                                    <td class="report"><?php echo $sal->short_name; ?></td>
                                    <td class="report"><?php echo $sal->PROD_DESC; ?></td>
                                    <td><?php
                                    if($sal->unit==1 ||$sal->unit==2 ||$sal->unit==4 || $sal->unit==6){
                                                echo "MTS" ;  
                                              }elseif($sal->unit==3||$sal->unit==5){
                                                echo "LTR" ;
                                              }
                                        ?>
                                     </td>
                                    <td class="report"><?php echo $sal->soc_name; ?></td>
                                    <td class="report"><?php echo $sal->trans_do; ?></td>
                                    <td class="report"><?php echo date("d/m/yy",strtotime($sal->do_dt)); ?></td>
                                    <td class="report">
                                        <?php 
                                        // echo $sal->qty; 

                                        if($sal->unit==1){

                                            echo $sal->qty; 
                                           }elseif($sal->unit==2){
                                               echo ($sal->qty)/1000; 
                                           }elseif($sal->unit==4){
                                               echo ($sal->qty)/10;
                                           }elseif($sal->unit==6){
                                               echo ($sal->qty)/1000000;
                                           }elseif($sal->unit==3){
                                               echo $sal->qty;
                                           }elseif($sal->unit==5){
                                               echo ($sal->qty)*($sal->qty_per_bag)/1000;   
                                           }
                                        ?>
                                        </td>
                                    <td class="report"><?php echo $sal->sale_rt; ?></td>
                                    <td class="report"><?php echo $sal->taxable_amt;
                                                                  $taxable += $sal->taxable_amt;
                                     ?></td>
                                    <td class="report"><?php echo $sal->cgst;
                                                                  $cgst += $sal->cgst;

                                     ?></td>
                                    <td class="report"><?php echo $sal->sgst;
                                                                  $sgst += $sal->sgst;

                                     ?></td>
                                   <!--  <td class="report"><?php //echo $sal->dis; 
                                                                 // $disc += $sal->dis;

                                    ?></td> -->
                                    <td class="report"><?php echo $sal->tot_amt;
                                                                  $total += $sal->tot_amt;

                                     ?></td>
                                   
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
                               <td class="report" colspan="8" style="text-align:right">Total</td> 
                               <td class="report"><?=$taxable?></td>
                               <td class="report"><?=$cgst?></td>
                               <td class="report"><?=$sgst?></td>
                               <!-- <td class="report"><?=$disc?></td>  -->
                               <td class="report"><?=$total?></td>  

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
    title: 'rach wise sale Report',
    text: 'Export to excel'

   }
]
   });
</script>