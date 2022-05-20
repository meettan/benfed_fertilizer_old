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
                        <h4>Society Wise Distribution Between: <?php echo $_SESSION['date']; ?></h4>
                         <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5> 

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>
                                <th>Ro No</th>
								<th>RO Date</th>
                                <th>Company</th>
                                <th>Product</th>
                                <th>Unit</th>
                                <th>Purchase Qty</th>
                                <th>Purchase Amount</th>
								<th>Society</th>
								<th>Sale Qty</th>
								<th>Sale Qty</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 

                                    $i = 1;
                                    $tot_pur_qty = 0.00;
									$total_pur =0.00;
									$tot_sale_qty = 0.00;
                                    $total_sale = 0.00;
                                    

                                        //foreach($all_data as $prodtls){
										foreach($rogr as $prodtls){   ?>
										
								<tr class="rep">
                                    <td class="report"><?php echo $i++; ?></td>
									<td class="report"><b><?php echo $prodtls->ro_no; ?></b></td>
									<td class="report"><b><?php echo date("d/m/Y",strtotime($prodtls->ro_dt)); ?><?php //echo $prodtls->ro_dt; ?></b></td>
                                    <td class="report"><b><?php echo $prodtls->comp_name; ?></b></td>
									<td class="report"><b><?php echo $prodtls->prod_desc; ?></b></td>
									<td class="report"><b><?php
                                      if($prodtls->unit==1 ||$prodtls->unit==2 ||$prodtls->unit==4 || $prodtls->unit==6){
                                        echo "MTS" ;  
                                      }elseif($prodtls->unit==3||$prodtls->unit==5){
                                        echo "LTR" ;
                                      }
                                     
                                       ?></td>
                                    <td class="report"><b><?php 
                                    if($prodtls->unit==1){

                                        echo $prodtls->tot_qty;
										$tot_pur_qty += $prodtls->tot_qty;
                                    }elseif($prodtls->unit==2){
                                        echo ($prodtls->tot_qty)/1000; 
										 $tot_pur_qty += ($prodtls->tot_qty)/1000; 
                                    }elseif($prodtls->unit==4){
                                        echo ($prodtls->tot_qty)/10;
										$tot_pur_qty += ($prodtls->tot_qty)/10;
                                    }elseif($prodtls->unit==6){
                                        echo ($prodtls->tot_qty)/1000000;
										$tot_pur_qty += ($prodtls->tot_qty)/1000000;
										
                                    }elseif($prodtls->unit==3){
                                        echo $prodtls->tot_qty;
										$tot_pur_qty += $prodtls->tot_qty;
                                    }elseif($prodtls->unit==5){
                                        echo ($prodtls->tot_qty)*($prodtls->qty_per_bag)/1000;
										$tot_pur_qty += ($prodtls->tot_qty)*($prodtls->qty_per_bag)/1000;
                                    }

                                     ?></b></td>
                                    <td class="report"><b><?php echo $prodtls->tot_net;
																$total_pur +=$prodtls->tot_net; 
									?></b></td>
									<td ></td>
									<td ></td>
									<td ></td>
                                </tr>
											
									<?php	$group_sale_qty = 0.00;
									        $group_sale_amt = 0.00;	
									        foreach($salero as $key){
											if($prodtls->ro_no == $key->sale_ro){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
									 <td colspan="7"></td>
                                     <td class="report"><?php echo $key->soc_name; ?></td>
                                     <td class="report">
									 <?php 
                                    if($prodtls->unit==1){
										
                                        echo $key->tot_qty;
										$tot_sale_qty += $key->tot_qty;
										$group_sale_qty += $key->tot_qty;
                                    }elseif($prodtls->unit==2){
										
                                        echo ($key->tot_qty)/1000;
                                        $tot_sale_qty += ($key->tot_qty)/1000;
                                        $group_sale_qty += ($key->tot_qty)/1000;										
                                    }elseif($prodtls->unit==4){
										
                                        echo ($key->tot_qty)/10;
										$tot_sale_qty += ($key->tot_qty)/10;
										$group_sale_qty += ($key->tot_qty)/10;
                                    }elseif($prodtls->unit==6){
										
                                        echo ($key->tot_qty)/1000000;
										$tot_sale_qty += ($key->tot_qty)/1000000;
										$group_sale_qty += ($key->tot_qty)/1000000;
                                    }elseif($prodtls->unit==3){
										
                                        echo $key->tot_qty;
										$tot_sale_qty += $key->tot_qty;
										$group_sale_qty += $key->tot_qty;
                                    }elseif($prodtls->unit==5){
										
                                        echo ($key->tot_qty)*($prodtls->qty_per_bag)/1000;   
										$tot_sale_qty += ($key->tot_qty)*($prodtls->qty_per_bag)/1000;
										$group_sale_qty += ($key->tot_qty)*($prodtls->qty_per_bag)/1000;
                                    }

                                     ?>
									</td>
                                    <td class="report"><?php echo $key->tot_amt;
																  $total_sale +=$key->tot_amt;
																  $group_sale_amt +=$key->tot_amt;
									?></td>
                                    
                                </tr>
 
								<?php        }
										$gr_qty =$group_sale_qty;
										$gr_tot_amt =$group_sale_amt;
										}$group_sale_qty=0.00;$group_sale_amt=0.00;  ?>
                                <tr>
								    <td colspan='8'></td><td><b>Sub total</b></td><td><b><?=$gr_qty?></b></td><td><b><?=$gr_tot_amt?></b></td>
								</tr>										

										
                              <?php   $group_sale_qty = 0.00;
									        $group_sale_amt = 0.00;   }   ?>

 
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>
                        <tfooter>
                            <tr>
                               <td colspan="6" style="text-align:right"><b>Total</b></td> 
                               <td><b><?=$tot_pur_qty?></b></td>
                               <td><b><?=$total_pur?></b></td> 
                               <td></td>
                               <td><b><?=$tot_sale_qty?></b></td>
                               <td><b><?=$total_sale?></b></td>
                            </tr>
                        </tfooter>
                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                    <button class="btn btn-primary" type="button" onclick="export_excel();" id="btnExport" >Excel</button>

                </div>

            </div>
            
        </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/table2excel.js"></script>
 <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script> 
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script> -->

<script>
function export_excel() {
//$("#btnExport").click(function(){

  $("#example").table2excel({

    // exclude CSS class
    exclude:".noExl",
    name:"Worksheet Name",
    filename:"Society Wise Distribution Between: <?php echo $_SESSION['date']; ?>",//do not include extension
    fileext:".xls" // file extension
  });

};


   $('#example').dataTable({
    destroy: true,
   searching: false,ordering: false,paging: false,

dom: 'Bfrtip',
buttons: [
   {
extend: 'excelHtml5',
title: 'BENFED All SALE PURCHASE REPORT',
text: 'Export to excel'
//Columns to export
// exportOptions: {
//    columns: [0, 1, 2, 3]
// }
   }
]
   });
</script>