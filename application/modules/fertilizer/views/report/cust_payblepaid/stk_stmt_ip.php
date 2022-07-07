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
        <?php //print_r($this->session->userdata('loggedin')); ?>
        <div class="col-md-12 container form-wraper">
    
                 <form method="POST" id="form" action="<?php echo site_url("fert/rep/cust_payblepaid");?>" >

                <div class="form-header">
                
                    <h4>Inputs</h4>
                
                </div>

                <div class="form-group row">

                    <label for="from_dt" class="col-sm-2 col-form-label">From Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="from_date"
                               class="form-control required"
                               min='<?php echo explode('-',$this->session->userdata('loggedin')['fin_yr'])[0].'-04-01' ?>'
                               max='<?php echo ((explode('-',$this->session->userdata('loggedin')['fin_yr'])[0])+1).'-03-31' ?>'
                               value="<?= explode('-',$this->session->userdata('loggedin')['fin_yr'])[0].'-04-01';//$frm_dt;?>"
                               readonly
                        />  

                    </div>

                </div>

                <div class="form-group row">

                    <label for="to_date" class="col-sm-2 col-form-label">To Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="to_date"
                               class="form-control required"
                               min='<?php echo explode('-',$this->session->userdata('loggedin')['fin_yr'])[0].'-04-01' ?>'
                               max='<?php echo ((explode('-',$this->session->userdata('loggedin')['fin_yr'])[0])+1).'-03-31' ?>'
                               value="<?= $to_dt;?>"
                        />  

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
        <?php //echo '<pre>'; print_r($all_data); echo '</pre>';?>
 <!-- <div class="wraper">  -->

            <div class="col-lg-12 contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Societywise Due Register Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $br_name->district_name; ?></h5>

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>
                        <tr>
                            
                            <th>Sl No.</th>

                            <th>Society</th>

                            <th>Opening</th>
                            <th>Advance Deposited</th>
                            <th>Sale Amount</th>
                            <th>Advance Adjustment</th>
                            <th>Credit Note</th>
                            <th>Other Adjustment</th>

                            <th>Due Amount</th>
                            <!-- (Opening + Adjustment Deposited) - (Sale + Adjustment + Credit Note + Others Adjustment) -->

                        </tr>

                            <!-- <tr>
                            
                                <th>Sl No.</th>

                                <th>Society</th>

                                <th>Opening</th>
								<th>Sale Amount</th>

                                <th>Received Amount( Including <br>Advance 
								& Credit Note Adjustment )</th>

                                <th>Advance Deposit</th>

                                <th>Credit Note</th>

                                
                             
                                <th>Due Amount</th>

                            </tr> -->

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $tot_sale = 0.00;
                                    $tot_pur  = 0.00;
									$tot_cr  =0.00;
									$tot_adv =0.00;
                                    $val =0;

                                        foreach($all_data as $prodtls){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                     <td class="report"><?php echo $prodtls->soc_name; ?>
                                     
                                     <td class="report opening" id="opening">
                                       <?php  if($prodtls->op_bln < 0){echo abs($prodtls->op_bln).'.Cr';}else{echo abs($prodtls->op_bln).'.Dr';} ?>
                                     </td>
									  <td class="report purchase" id="purchase">
                                     <?php echo $prodtls->adv;?>
                                     </td>
									  <td class="report sale" id="sale">
                                     <?php echo $prodtls->tot_sale; ?>
                                       
                                     </td>
                                     <td class="report advance" id="advance">
                                     <?php echo $prodtls->adv_adj; ?>
                                     
                                     </td>
                                     <td class="report cramt" id="cramt">
                                     <?php echo $prodtls->cramt_adj; ?>
                                     
                                     </td>

                                  

                                     <td class="report closing" id="closing">0.00
                                     <?php //echo number_format($prodtls->tot_sale - $prodtls->adv_dep,2) ;
                                        // $total += $prodtls->tot_sale - $prodtls->adv_dep ; ?>  
                                     </td>
                                     <td>
                                         <!-- $dueAmount=($prodtls->op_bln + $prodtls->adv) - ($prodtls->tot_sale + Adjustment + $prodtls->cramt_adj + Others Adjustment) ; -->
                                        <?php $dueAmount=($prodtls->op_bln + $prodtls->adv) - ($prodtls->tot_sale + 0 + $prodtls->cramt_adj + 0) ;
                                            if($dueAmount<0){
                                                echo abs($dueAmount).'Cr';
                                            }else{
                                                echo abs($dueAmount).'Dr';
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
                               <td class="report" colspan="3" style="text-align:right">Total</td> 
                               <td class="report"><?=$tot_pur?></td>
                               <td class="report"><?=$tot_sale?></td>
                               <!-- <td class="report"></td>  -->
								<td></td>
								<td></td>
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
            <?php } ?>
            
        </div>

        <script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title></title><style type="text/css">');


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