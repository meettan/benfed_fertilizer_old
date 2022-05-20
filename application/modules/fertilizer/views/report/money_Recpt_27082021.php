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
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


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

    <div class="wrapper_fixed">
 <div class="col-sm-1 logo_sec_main"><img src="<?php echo base_url("/benfed.png");?>"/></div>
<h3 style="text-align:center">The West Bengal State Co-operative Marketing Federation Ltd.</h3>
<h4 style="text-align:center">Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</h4>
		<br>
  <h4 style="text-align:center"><u>Receipt - BIR Voucher</u></h4>
	<div class="billDateGroop">
	  <div class="crmBill">No: <strong><?php echo  $data->paid_id;?></strong></div>	
  <div class="dateTop">Date: <strong><?php echo  date("d-m-Y", strtotime( $data->paid_dt));?></strong>.</div></div>
  <br clear="all">
  <div class="tableBottomBorder">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>
		<table width="100%" class="table tableCus">
  <thead>
    <tr>
      <th scope="col" class="double_1">Particulars</th>
      <th scope="col" class="double_2">Amount</th>
      </tr>
    <tr>
      <td scope="row" class="double_1Body"><strong>Account:</strong><?php echo  $data->soc_name;?></td>
      <td><?php echo "&#2352;".$data->amt;?></td>
      </tr>
    <tr>
      <td scope="row"><p><strong>Through: </strong><br>
      <?php echo  $data->bank_name;?></p>
        <p><strong>On Account Of: </strong><br>
         Being the payment received against invoice No <?php echo  $data->sale_invoice_no;?> <br>
</p>
        <p style="margin: 0; padding: 0;"><strong>Amount (In Word):</strong> INR <?php echo getIndianCurrency(round($data->amt));?> </p></td>
      <td style="vertical-align: bottom !important;"><strong><?php echo "&#2352;".$data->amt;?></strong></td>
      </tr>
  </thead>
  <tbody>

    
  </tbody>
</table>
		</td>
    </tr>
  </tbody>
</table>
		
		
	</div>

  <p align="justify" ><br>
  </p>
  <div class="billDateGroop">
    <div class="dateTop"><strong>Authorised Signature</strong></div></div>
  <br>
</div>


    
  </div>

            
                    <div style="text-align: center;">
    
                        <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
    
                    </div>
   </div>
</div>