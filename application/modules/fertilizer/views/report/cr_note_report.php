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
 
<!-- <br clear="all"> -->
  <h2 style="text-align:center">The West Bengal State Co-operative Marketing Federation Ltd.</h2>
  <h4 style="text-align:center">Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</h4>

<p>&nbsp;</p>
<h4 style="text-align:center"><u>Credit Note</u></h4>
<?php
  foreach($data as $key1);
  { ?>
	<div class="billDateGroop"><div class="dateTop">Date: <strong><?php echo  date("d-m-Y", strtotime($key1->trans_dt));?></strong>.</div></div>
  <br clear="all">
  <p>No:<strong><?php echo  $key1->recpt_no;?></strong></p>
  <p>Ref:<strong><?php echo  $key1->invoice_no;?></strong></p>


  <p>Customer's Name:<strong><?php echo  $key1->soc_name;?></strong><br>
    GST Number:<strong><?php echo  $key1->gstin;?></strong><br>
    <?php
  }
  ?>
  State Name: <strong>West Bengal, Code 19</strong><br>
  Place Of Suply: 
  <strong>West Bengal</strong></p>
	
	<div class="tableBottomBorder">
	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody>
    <tr>
     <td align="left">  
		  <table width="100%" class="table tableCus">
       <thead>
        <tr>
          <th align="left" scope="row" class="double_1">Particulars</th>
          <th align="left" scope="row" class="double_2">Amount</th>
          </tr>
  <?php
   $tot_amount=0.00;
  foreach($data as $key2)
  { ?>    
    <tr>
      <th align="left" scope="row" class="double_1Body"><?php echo  $key2->cat_desc;?></th>
      <th><?php echo  "&#2352;".$key2->tot_amt;
      $tot_amount+=$key2->tot_amt;
      ?></th>
      </tr>
      <?php
      }
      ?>
      
    <tr>
    <td align="left" ><strong style="font-size: 15px;">Total Amount:</strong></td>
    <td  align="left"  > <strong style="font-size: 15px;"><?php echo  "&#2352;".number_format(round($tot_amount), 2, '.', '');?></strong></td>

    </tr>
    
    <tr>
      <th align="left" scope="row"><strong>Amount (In Words):</strong> <?php echo "INR ".getIndianCurrency(round($tot_amount));?></th>
      <td></td>
    </tr>
    <?php
  foreach($data as $key3);
  { ?>
    <tr>
      <th align="left" colspan="2"><strong>Remarks:</strong> <?php echo $key3->remarks;?></th>
    </tr>
    <?php
    }
    ?>
  </thead>
  <tbody>

    
  </tbody>
</table>
		</td>
    </tr>
  </tbody>
</table>
		
		
	</div>

  <p align="justify" >Benfed Pan: <strong>AABAT0010H</strong><br>
  </p>
  <h5>For The West Bengal State Co-operative Marketing Federation Ltd.</h5>
  <h3 >&nbsp;</h3>
  <div class="billDateGroop">
  <div class="dateTop"><strong>Authorised Signature</strong></div></div>
  <br clear="all">
   
</div>
    
  </div>

            
                    <div style="text-align: center;">
    
                        <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
    
                    </div>
   </div>
</div>