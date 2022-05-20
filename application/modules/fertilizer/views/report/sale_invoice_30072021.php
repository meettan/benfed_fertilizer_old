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

	
  <h2><img src="images/benfed.png" alt=""/>
  </h2>
  <h2>Tax Invoice </h2>
  <div class="tableBottomBorder">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="left" valign="top"><table class="table tableCus">
    <tr>
      <td scope="col" class="tax_1" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td class="tax_border_bot" style="border-top: none; border-left: none; height: 89px;">
            <p>The West Bengal State Co-operative Marketing Federation Ltd.<br>
            Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.<br>
<!-- <h2 style="text-align:center">The West Bengal State Co-operative Marketing Federation Ltd.</h2>
  <h4 style="text-align:center">Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</h4> -->
            </p></td>
            </tr>
          <tr>
            <td class="tax_border_bot" style="border-top: none; border-left: none; border-bottom: none !important;"><p>Buyer</p>
              <p>                <strong><?php echo  $data->soc_name;?></strong></p>
              <p> Address :<?php echo  $data->soc_add;?><br>
              GSTIN: <?php echo  $data->gstin;?><br>
              mfms: <?php echo  $data->mfms;?>             </p></td>
          </tr>
        </tbody>
      </table></td>
      <td scope="col" class="tax_2" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td class="tax_border_bot_left" style="border-top: none; border-left: none !important;">Invoice No.<br>
              <strong><?php echo  $data->trans_do;?></strong></td>
            <td class="tax_border_bot_left" style="border-top: none;">Date<br>
              <strong><?php echo date("d-m-Y", strtotime( $data->do_dt));?></strong></td>
          </tr>
          <tr>
            <td class="tax_border_bot_left" style="border-top: none; border-left: none !important;">Delivery Note</td>
            <td class="tax_border_bot_left" style="border-top: none;">Mode/terms of payment
            </td>
          </tr>
          <tr>
            <td class="tax_border_bot_left" style="border-top: none; border-left: none !important;">Due Date</td>
            <td class="tax_border_bot_left" style="border-top: none;">
            <strong><?php echo date("d-m-Y", strtotime( $data->sale_due_dt));?></strong></td>
          </tr>
          <tr>
            <td class="tax_border_bot_left" style="border-top: none; border-left: none !important;">Despatched document No</td>
            <td class="tax_border_bot_left" style="border-top: none;">Delivery Note Date</td>
          </tr>
          <tr>
            <td class="tax_border_bot_left" style="border-top: none; border-left: none !important;">Despatch Through</td>
            <td class="tax_border_bot_left" style="border-top: none;">Destination</td>
          </tr>
          <!-- <tr>
            <td class="tax_border_bot_left" style="border-top: none; border-left: none !important;">Lorem Ipsum is simply</td>
            <td class="tax_border_bot_left" style="border-top: none;">Lorem Ipsum is simply dummy tex</td>
          </tr> -->
          <!-- <tr>
            <td class="tax_border_bot_left" style="border-top: none; border-left: none !important;">Lorem Ipsum is simply</td>
            <td class="tax_border_bot_left" style="border-top: none;">Lorem Ipsum is simply dummy tex</td>
          </tr> -->
        </tbody>
      </table>
		<p style="padding: 5px;">Terms Of Delivery</p>
		</td>
      </tr>
</table></td>
    </tr>
    <tr>
      <td align="left" valign="top"><table class="table tableCus">
        <thead>
          <tr>
            <td scope="col" class="col_13_1">Sl No</td>
            <td scope="col" class="col_13_2">Description Of Goods</td>
            <td scope="col" class="col_13_3">HSN/SAC</td>
            <td scope="col" class="col_13_4">Quantity</td>
            <td scope="col" class="col_13_5">Rate</td>
			  
			 <td scope="col" class="col_13_6">Per</td>
			  <td scope="col" class="col_13_7">Amount</td>
			  <td scope="col" class="col_13_8">Taxable Value</td>
			  <td scope="col" class="col_13_9" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			    <tbody>
			      <tr>
			        <td style=" border: none !important;">Central Tax</td>
			        </tr>
			      <tr>
			        <td style="padding: 0; margin: 0;  border-right: none !important;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			          <tbody>
			            <tr>
			              <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">Rate</td>
			              <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;">Amount</td>
			              </tr>
			            </tbody>
			          </table></td>
			        </tr>
			      </tbody>
			    </table></td>
			  <td scope="col" class="col_13_10" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			    <tbody>
			      <tr>
			        <td style=" border: none !important;">State Tax</td>
			        </tr>
			      <tr>
			        <td style="padding: 0; margin: 0;  border-right: none !important;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			          <tbody>
			            <tr>
			              <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">Rate</td>
			              <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;">Amount</td>
			              </tr>
			            </tbody>
			          </table></td>
			        </tr>
			      </tbody>
			    </table></td>  
			  <td scope="col" class="col_13_11">Total Amount</td>
			  </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="row">1</td>
            <td align="left" valign="top"><p><strong><?php echo  $data->prod_desc;?><br>
              <!-- Godown: 316545455 -->
              </strong></p>
              <!-- <p><strong>Batch: EFFFFFLOKO</strong></p> -->
              <p>&nbsp;</p></td>
            <td align="left" valign="top"><?php echo  $data->hsn_code;?></td>
            <td align="left" valign="top"><p><strong><?php echo  $data->qty;?><br>
              </strong>
              <!-- 0.254 Mt. -->
              </p>
              <!-- <p><strong>0.254 Mt.</strong> <strong><br> -->
              </strong></p></td>
            <td align="left" valign="top"><?php echo  $data->sale_rt;?></td>
			  <td align="left" valign="top">Mt.</td>
            <td align="left" valign="top"><?php echo  $data->taxable_amt;?></td>
            <td align="left" valign="top"><?php echo  $data->taxable_amt;?></td>
            <td rowspan="3" align="left" valign="top" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important; height: 279px;"><?php echo  $data->gst_rt/2;?>%</td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;"><?php echo  $data->cgst;?></td>
                </tr>
              </tbody>
            </table></td>
            <td rowspan="3" align="left" valign="top" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important; height: 279px;"><?php echo  $data->gst_rt/2;?>%</td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;"><?php echo  $data->sgst;?></td>
                </tr>
              </tbody>
            </table></td>
			  <td align="left" valign="top"><?php echo  $data->tot_amt;?></td>
			  </tr>
          <tr>
            <td scope="row">&nbsp;</td>
            <td align="left" valign="top"><p style="text-align: right;"><strong><em>Central Tax (GST) (Output)<br>
              State Tax (GST) (Output)<br>
              <!-- Round Of -->
              </em>
              </strong></p></td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top"><?php echo  $data->cgst;?><br>
            <?php echo  $data->sgst;?><br>
              <!-- 452.25 -->
              </td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td scope="row">&nbsp;</td>
            <td align="left" valign="top"><p><strong><u>Bill Details</u></strong></p>
              <p><?php echo  $sum_data->tot_amt_rnd;?> Dr</p></td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td scope="row">&nbsp;</td>
            <td align="left" valign="top" style="text-align: right;"><strong style="text-align: right;">Total</strong></td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top"><?php echo  $sum_data->qty;?>Mt.</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top"><strong><?php echo  $sum_data->tot_amt_rnd;?></strong></td>
            <td align="left" valign="top"><?php echo  $sum_data->taxable_amt;?></td>
            <td align="left" valign="top" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">&nbsp;</td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;"><?php echo  $sum_data->cgst;?></td>
                </tr>
              </tbody>
            </table></td>
            <td align="left" valign="top" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">&nbsp;</td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;"><?php echo  $sum_data->sgst;?></td>
                </tr>
              </tbody>
            </table></td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          
          
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top" style="padding: 5px; background: #d9d9d9;"><p style="padding: 0; margin: 0; float: left">Amount Chargable(in words)INR <?php echo getIndianCurrency($sum_data->tot_amt_rnd);?></p>
		<p style="padding: 0; margin: 0; float: right; text-align: right">E.&amp; O.	E</p>
		</td>
    </tr>
  </tbody>
</table>


		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tbody>
    <tr>
      <td align="right" valign="bottom" class="tax_1"><div style="padding: 6px"><strong>Total:</strong></div></td>
      <td class="tax_1" style="border-bottom: #ccc solid 1px;"><table class="table tableCus">
        <thead>
          <tr>
            <td scope="col" class="col_13_8">Taxable Value</td>
            <td scope="col" class="col_13_9" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td style=" border: none !important;">Central Tax</td>
                </tr>
                <tr>
                  <td style="padding: 0; margin: 0;  border-right: none !important;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">Rate</td>
                        <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;">Amount</td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
              </tbody>
            </table></td>
            <td scope="col" class="col_13_10" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td style=" border: none !important;">State Tax</td>
                </tr>
                <tr>
                  <td style="padding: 0; margin: 0;  border-right: none !important;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">Rate</td>
                        <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;">Amount</td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
              </tbody>
            </table></td>
            <td scope="col" class="col_13_11">Total Amount(Round)</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td align="left" valign="top"><?php echo  $sum_data->taxable_amt;?></td>
            <td rowspan="2" align="left" valign="top" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;"><?php echo  $data->gst_rt/2;?></td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;"><?php echo  $sum_data->cgst;?></td>
                </tr>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">&nbsp;</td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;">&nbsp;</td>
                </tr>
              </tbody>
            </table></td>
            <td rowspan="2" align="left" valign="top" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;"><?php echo  $data->gst_rt/2;?></td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;"><?php echo  $sum_data->sgst;?></td>
                </tr>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">&nbsp;</td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;">&nbsp;</td>
                </tr>
              </tbody>
            </table></td>
            <td align="left" valign="top"><?php echo  $sum_data->tot_amt_rnd;?></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top"><?php echo  $sum_data->taxable_amt;?></td>
            <td align="left" valign="top" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">&nbsp;</td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;"><?php echo  $sum_data->cgst;?></td>
                  </tr>
                </tbody>
              </table></td>
            <td align="left" valign="top" style="padding: 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="col_50Per" style="border-top: none; border-left: none !important; border-bottom: none !important;">&nbsp;</td>
                  <td class="col_50Per" style="border-top: none; border-bottom: none !important; border-right: none !important;"><?php echo  $sum_data->sgst;?></td>
                  </tr>
                </tbody>
              </table></td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td style="border-bottom: #ccc solid 1px; border-top: #ccc solid 1px; padding: 5px;"><p style="padding: 0; margin: 0; float: left">Tax Amount(in words)INR <?php echo getIndianCurrency($sum_data->tot_gst);?></p></td>
      <td style="border-bottom: #ccc solid 1px; border-top: #ccc solid 1px; padding: 5px;">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top" style="border-bottom: #ccc solid 1px; border-top: #ccc solid 1px; padding: 5px;">Company's GSTIN/UIN: <strong>19AABAT0010H2ZY</strong><br>
        Company's Pan:<strong> AABAT0010H</strong></td>
      <td align="left" valign="top" style="border-bottom: #ccc solid 1px; border-top: #ccc solid 1px; padding: 5px;">Company's Bank Details:<br>
        Bank Name:<br>
        A/C Number: <br>
        Branch &amp; IFS Code: </td>
    </tr>
    <tr>
      <td align="left" valign="top" style="border-bottom: #ccc solid 1px; border-top: #ccc solid 1px; padding: 5px;"><strong>Declaration:</strong><br>
We declare that this invoice shows the actual price of goods described and particulars are true and correct,</td>
      <td align="left" valign="top" style="border-bottom: #ccc solid 1px; border-top: #ccc solid 1px; padding: 5px;"><p style="padding: 0; margin: 0; float: right; text-align: right"><strong>For The West Bengal State Co-operative Marketing Federation Ltd</strong></p></td>
    </tr>
    <tr>
      <td align="left" valign="top" style="border-bottom: #ccc solid 1px; border-top: #ccc solid 1px; padding: 5px;">&nbsp;</td>
      <td align="left" valign="top" style="border-bottom: #ccc solid 1px; border-top: #ccc solid 1px; padding:35px 5px 5px 5px; ">
		  
		  <div style="width: 33%; float: left;">Prepaired By </div>
		<div style="width: 33%; float: left;">Verified By </div>
		  <div style="width: 33%; float: left;">Authorised Signature </div>
		</td>
    </tr>
  </tbody>
</table>

  </div>

  
  <p align="justify" ><br>
</p>
<div class="billDateGroop">
  <!-- <div class="crmBill"><strong><?php echo "**"."&#2352;".$data->adv_amt."/-";?></strong></div>	 -->
<!-- <div class="dateTop">Date: <strong><?php echo  date("d-m-Y", strtotime($data->trans_dt));?></strong></div></div> -->
<br clear="all">
  **Subjet to Realisation &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Authorised Signatory
<br>

</div>


    
  </div>

            
                    <div style="text-align: center;">
    
                        <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
    
                    </div>
   </div>
</div>


