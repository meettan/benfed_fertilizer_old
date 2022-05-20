<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 6px;

    font-size: 12px;
}

th {


}

tr:hover {background-color: #f5f5f5;}

</style>

<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 12px;}' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td {text-align: left;}' +
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

    <div class="wrapper_fixed">


<div class="billDateGroop">
  <div class="crmBill">No: <strong><?php echo  $data->receipt_no;?></strong></div>	
  <div class="dateTop">Date: <strong><?php echo  date("d-m-Y", strtotime($data->trans_dt));?></strong>.</div>
</div>
<br clear="all">

  <h2 style="text-align:center">The West Bengal State Co-operative Marketing Federation Ltd.</h2>
  <h4 style="text-align:center">Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</h4>

<p>&nbsp;</p>
<h4 style="text-align:center" ><u>Receipt - BAN Voucher </u></h4>
<div class="tableBottomBorder">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td align="left">
          <table width="100%" class="table tableCus">
            <thead>
              <tr>
                <th align="left" class="equal_1" scope="col">Receipt with thanks from:</th>
                <th scope="col" class="equal_2"><?php echo  $data->soc_name;?></th>   
				  
              </tr>
				<tr>
                <th align="left" scope="row"><strong>Amount :</strong></th>
                <th><strong><?php echo "**"."&#2352;".$data->adv_amt."/-";?></strong></th>
                    <!-- Cheque/DD - 3-Aug-2020 1,02,5000</td> -->
                    <!-- <td rowspan="3" style="width: 67%;padding: 4px;" ><?php //echo getIndianCurrency(round($net_amt-$tot_dis));?></td> -->
              </tr>
              <tr>
                <th align="left" scope="row"><strong>The sum of :</strong></th>
                <th><?php echo "INR ".getIndianCurrency(round($data->adv_amt));?></th>
                    <!-- Cheque/DD - 3-Aug-2020 1,02,5000</td> -->
                    <!-- <td rowspan="3" style="width: 67%;padding: 4px;" ><?php //echo getIndianCurrency(round($net_amt-$tot_dis));?></td> -->
              </tr>
              <tr>
                <th align="left" scope="row"><strong>By:</strong></th>
                <th style="vertical-align: bottom !important;">The West Bengal State Co-operative Marketing Federation Ltd</th>
              </tr>
              <tr>  
                <th align="left" scope="row"><strong>Remarks:</strong> </th>
                <th style="vertical-align: bottom !important;"><?php echo  $data->remarks;?></th>
              </tr>
            </thead>
            
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<p align="justify" ><br>
</p>
<div class="billDateGroop">
  <div class="crmBill"><strong><?php echo "**"."&#2352;".$data->adv_amt."/-";?></strong></div>	
<div class="dateTop">Date: <strong><?php echo  date("d-m-Y", strtotime($data->trans_dt));?></strong></div></div>
<br clear="all">
  <p style="padding:0; margin:0; float:left; font-size:12px;">**Subjet to Realisation</p>  <p style="padding:0; margin:0; font-size:12px; float:right;">Authorised Signatory</p>
<br>

</div>


    
  </div>

            
                    <div style="text-align: center;">
    
                        <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
    
                    </div>
   </div>
</div>