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

.form-wraper {
    margin-bottom: 20px !important;
}

</style>


    
    <div class="wraper">      

        <div class="col-md-9 container form-wraper">
    
                 <form method="POST" id="form" action="<?php echo site_url("fert/rep/soc_ledger");?>" >

                <div class="form-header">
                
                    <h4>Inputs</h4>
                
                </div>

                <div class="form-group row">

                    <label for="from_dt" class="col-sm-2 col-form-label">From Date:</label>

                    <div class="col-sm-3">
                        <?php $fyear=$this->session->userdata['loggedin']['fin_yr']; $year=explode('-',$fyear) ?>
                        <input type="date" name="from_date" class="form-control required" value="<?php echo $year[0],'-04-01' //echo $frm_dt;?>" min='<?=$year[0]?>-04-01' max="<?= $year[0]+1?>-03-31" readonly/>  

                    </div>
					
					<label for="to_date" class="col-sm-1 col-form-label">To Date:</label>

                    <div class="col-sm-3">

                        <input type="date" name="to_date" class="form-control required" value="<?= $to_dt;?>"  min='<?=$year[0]?>-04-01' max="<?= $year[0]+1?>-03-31"/>  

                    </div>

                </div>
				
				<div class="form-group row">

                    <label for="to_date" class="col-sm-2 col-form-label">Society:</label>

                    <div class="col-sm-7">
                        <select name="soc_id" class="form-control select2">
						<option value="">Select</option>
						<?php foreach($soc as $key) { ?>
						<option value="<?=$key->soc_id?>"><?=$key->soc_name?></option>
						<?php } ?>
						</select>
                    </div>

                </div> 

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />

                    </div>

                </div>

            </form>    

        </div>

    <!-- </div> -->
   
    <?php if(isset($_POST["submit"])){ ?>
 <!-- <div class="wraper">  -->

            <div class="col-lg-12 contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Society Ledger Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $br_name->district_name; ?></h5>
						<h5 style="text-align:left"><label>Society: </label> <?php if($all_data) { foreach($all_data as $prodtls);echo $prodtls->soc_name; }?></h5>
						<h5 style="text-align:left"><label>Gst No: </label> <?php if($all_data) { foreach($soc as $soc); echo $soc->gstin;}?></h5>

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">
                        <thead>

                            <tr>
                                <th>Sl No.</th>
                                <th>Remarks</th>
                                <th>Product</th>
                                <th>Invoice No/Receipt No.</th>
                                <th>RO</th>
                                <th>RO / Deposit Date</th>
                                <th>Qty</th>
                                 <th>Taxable Amount</th>
                                 <th>CGST</th>
                                 <th>SGST</th>
								<th>Total Amount</th>
                                <th>Advance/
								 Credit Note</th>
                                 <th>Adjustable Amount</th>
                                 <!-- <th>Closing</th> -->
                                 <th>Dr</th>
                                 <th>Cr</th>
                                
                                
                                 
                                <!-- <th>Due Amount</th> -->
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 
                                    // print_r($all_data[0]);

                                    $i = 1;
                                    $total = 0.00;
									
                                    $tot_sale = 0.00;
                                    $tot_pur  = 0.00;
                                    $taxable=0.00;
                                    $val =0;

                                    $qty=0.000;
                                    $tot_cgst=0.00;
                                    $tot_sgst=0.00;
                                    $totalamount=0.00;
                                    $advCrnote=0.00;
                                    $adjustable=0.00;
                                    $saleAmt=0.00;
                                    $totalamt=0.00;

                                        foreach($all_data as $prodtls){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                     <td><?php echo $prodtls->remarks; ?></td>
                                     <td><?php echo $prodtls->prod; ?></td>
                                     <td><?= $prodtls->inv_no; ?></td>
                                     <td class="report"><?php echo $prodtls->ro_no; ?>
                                     </td>
                                     <td class="report opening" id="opening">
                                        <?php echo date('d/m/Y',strtotime($prodtls->ro_dt)); ?>
									 </td>
                                     <td class="report purchase" id="purchase">
                                     <?php echo $prodtls->qty; $qty+=$prodtls->qty; ?>
                                     </td>
									  <td class="report purchase" id="purchase">
                                     <?php echo $prodtls->tot_payble;
                                      $taxable += $prodtls->tot_payble  ?>
                                     </td>
									  <td class="report sale" id="sale">
                                     <?php echo $prodtls->cgst; 
                                    $tot_cgst += $prodtls->cgst;?>
                                     </td>
                                     <td class="report sale" id="sale">
                                     <?php echo $prodtls->sgst; 
                                     $tot_sgst += $prodtls->sgst ;?>
                                     </td>
                                     <td class="report sale" id="sale">
                                     <?php echo  $prodtls->tot_payble +$prodtls->cgst + $prodtls->sgst; 
                                    // $tot_cgst += $prodtls-> ; 
                                     $totalamount += $prodtls->tot_payble +$prodtls->cgst + $prodtls->sgst;
                                    $saleAmt += $prodtls->tot_payble +$prodtls->cgst + $prodtls->sgst;?>
                                     </td>
                                     <td> <?php echo $prodtls->tot_paid ; $advCrnote+=$prodtls->tot_paid;?></td>
									 <td class="report sale" id="sale">
                                     <?php echo ($prodtls->tot_recv);
										$adjustable +=($prodtls->tot_recv);
									  ?>
                                     </td>
                                     <?php 
                                     if($prodtls->remarks=='Cr note' || $prodtls->remarks=='Advance' || $prodtls->remarks=='NEFT Adj' || $prodtls->remarks=='Pay Order Adj' || $prodtls->remarks=='Draft Adj'|| $prodtls->remarks=='Cheque Adj'){
                                        //echo $saleAmt-$prodtls->tot_paid;
                                        $totalamt -= (($prodtls->tot_recv) +($prodtls->tot_paid));
                                        if($totalamt>0){
                                            
                                            echo"<td>".abs($totalamt)."</td>";
                                            echo"<td></td>";
                                        }
                                        if($totalamt<0){
                                            echo"<td></td>";
                                            echo"<td>".abs($totalamt)."</td>";
                                           
                                        }
                                        // echo $totalamt;
                                     }elseif($prodtls->remarks=='Sale'){
                                      
                                        $totalamt += $prodtls->tot_payble +$prodtls->cgst + $prodtls->sgst;
                                        //echo $totalamt;
                                        if($totalamt>0){
                                           
                                            echo"<td>".abs($totalamt)."</td>";
                                            echo"<td></td>";
                                        }
                                        if($totalamt<0){
                                            echo"<td></td>";
                                            echo"<td>".abs($totalamt)."</td>";
                                           
                                        }
                                     }
                                     ?>
                                     

                                     
                                  
                                                                      
                                </tr>
 
                                <?php  
                                                        
                                    }
                                ?>

 
                                <?php 
                                       }
                                else{

                                    echo "<tr> 
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                     <td  style='text-align:center;'>No Data Found</td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     
                                     </tr>";

                                }   

                            ?>
							<tr style="font-weight: bold;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                               <td class="report" style="text-align:right">Total</td> 
                              
                               <td class="report"><?=$taxable?></td>
                                <td class="report"><?=$tot_cgst?></td>  
                                <td class="report"><?=$tot_sgst?></td>  
                                <td class="report"><?=$totalamount?></td>  
                                <td class="report"><?=$advCrnote?></td>  
                                <td class="report"><?=$adjustable?></td> 
                                <td></td> 
                                <td></td>
                            </tr>
							
                        </tbody>
                    </table>
                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button> -->

                </div>

            </div>
            <?php } ?>
            
        </div>

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
        searching: false,
        ordering: false,
        paging: false,

        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: 'BENFED All SALE PURCHASE REPORT',
            text: 'Export to excel'
            //Columns to export
            // exportOptions: {
            //    columns: [0, 1, 2, 3]
            // }
        }]
    });
</script>