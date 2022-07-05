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
                        <h4>Advance Payment Statement Between:<?php echo  date("d/m/Y", strtotime($fDate)).' To '.date("d/m/Y", strtotime($tDate)) ?></h4>
    
                        <h5 style="text-align:left"><label>Company: </label> <?php echo $companyName; ?></h5> 
                     <!--<h5 style="text-align:left"><label>Product:</label> <?php //echo $product->PROD_DESC; ?></h5>-->

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>
                                <th>Date</th>
                                <th>Branch Name.</th>
                                <th>Product Name</th>
                                <th>Ro No</th>
                                <th>Fo No</th>
                                <th>Amount</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($tableData){ 

                                    $i = 1;
                                    $total=0;

                                    foreach($tableData as $ptableData){
                                       // $total=($ptableData->adv_amt+$total);
                                       $total +=$ptableData->adv_amt;
                            ?>

                                <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo date("d/m/Y", strtotime($ptableData->trans_dt)); ?></td>
                                     <td><?php echo $ptableData->branch_name; ?></td>
                                     
                                     <td><?php echo $ptableData->PROD_DESC; ?></td>
                                     <td><?php echo $ptableData->ro_no; ?></td>
                                     <td><?php echo $ptableData->fo_no; ?></td>
                                     <td><?php echo $ptableData->adv_amt ; ?></td>
                                </tr>
                               
 
                                <?php    } ?>

                                <tr>
                                    <td colspan="6"><b>Total</b></td>
                                    <td><b><?php echo $total ?></b></td>
                                </tr>
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

                </div>

            </div>
            
        </div>
        
    <script type="text/javascript">
        /*$(function () {
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Cheque status for <?php echo get_district_name($this->input->post("branch_id")) ?> branch for paddy procurement between Block Societywise Paddy Procurement Between <?php echo date("d-m-Y", strtotime($this->input->post('from_date'))).' To '.date("d-m-Y", strtotime($this->input->post('to_date')));?>.xls"
                });
            });
        });*/
    </script>