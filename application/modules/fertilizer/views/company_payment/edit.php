<div class="wraper">      
            
			<div class="col-md-14 container form-wraper">
	
			
                <form method="POST"  action="<?php echo site_url("compay/cmppay_edit");?>" >
                 
					<div class="form-header">
					
						<h4>Company and Payble Details</h4>
					
    					</div>
    	                <?php
                        foreach($prod_dtls as $prodd);
                        ?>
    		
						
                    <div class="form-group row">

                        <label for="comp_id" class="col-sm-2 col-form-label">Company :</label>
                        <div class="col-sm-4">
    
                            <select name="comp_id" class="form-control required" id="comp_id" disabled>
    
                        <option value="">Select</option>
                        
                        <?php
                        
                            foreach($compdtls as $comp){
                        
                        ?>
                        
                            <option value="<?php echo $comp->comp_id;?>"  <?php if($prodd->comp_id==$comp->comp_id) echo "selected" ?>><?php echo $comp->comp_name;?></option>
                        
                        <?php
                        
                            }
                        
                        ?>     
                        
                        </select>
                        </div>

                        <label for="district" class="col-sm-2 col-form-label">District :</label>
                        <div class="col-sm-4">
    
                            <select name="district" class="form-control required" id="district" disabled>
    
                        <option value="">Select</option>
                        
                        <?php
                        
                            foreach($distdtls as $dist){
                        
                        ?>
                        
                            <option value="<?php echo $dist->district_code;?>"  <?php if($prodd->district==$dist->district_code) echo "selected" ?>><?php echo $dist->district_name;?></option>
                        
                        <?php
                        
                            }
                        
                        ?>     
                        
                        </select>
                        </div>
                          
                        

                    </div>


                        <div class="form-group row">
                        <label for="pay_dt" class="col-sm-2 col-form-label">Paid Date:</label>
                        <div class="col-sm-4">
    
                            <input type="datetime" id=pay_dt name="pay_dt" class="form-control"  value="<?=$prodd->pay_dt?>" readonly/>
                        </div>
                          <label for="pay_no"  class="col-sm-2 col-form-label">Pay No:</label>
                            <div class="col-sm-4">
                                <input type="text" style="width:360px" name="pay_no" id="pay_no" class="form-control" value="<?=$prodd->pay_no?>"  onchange="endDt()"  />
                            </div>
                           
                        </div>




						<div class="form-header">
					
					<h4>Pay Type And Paid Details</h4>
				
				</div>
                <hr>

                <div class="row" style ="margin: 5px;">

                    <div class="form-group">

                        <table class= "table table-striped table-bordered table-hover">

                            <thead>
                            
                                <th style= "text-align: center;width: 20%;">RO No</th>
                                <th style= "text-align: center;width: 20%;" >Product</th>
                                 <th style= "text-align: center;width: 20%;">Qty</th>
								<th style= "text-align: center;width: 20%;">Rate</th>
								<th style= "text-align: center;width: 20%;">Taxable Amt</th>
								<th style= "text-align: center;width: 20%;">TDS</th>
								 <th style= "text-align: center">Gross Amount</th>
								 <th style= "text-align: center">NET Amount</th>
								<!--<th style= "text-align: center">SGST</th>
                                <th style= "text-align: center">Dis</th>
								<th style= "text-align: center">Net Amount</th>
                                <th style= "text-align: center">Net Amount (Rounded) </th> -->
                            </thead>

                          <tbody id= "intro">
                     <?php          $sum=0;
                                   $round_tot_amt=0;
                                     $tot_amount=0;
                                     $tot_net_amt=0;
                                      $cgst=0;
                                       $sgst=0;
                    foreach($prod_dtls as $prodd)
                    { ?>
                <tr>
<!-- 
                    <td>
                                <select name="stock_point" id="stock_point" class="form-control stock_point" required>
                                            <option value="">Select</option>
                                <?php
                                        foreach($socdtls as $soc){
                                ?>
                                    <option value="<?php echo $soc->soc_id;?>"  <?php if($prodd->soc_id==$soc->soc_id) echo "selected" ?>><?php echo $soc->soc_name;?></option>
                                <?php
                                
                                    }
                                 ?>     
                                 </select> 
                                    
                    </td> -->
                    <td>
                    <input type="text" name="pur_ro" class="form-control required pur_ro" value="<?=$prodd->pur_ro?>" id="pur_ro"  readonly>
                    </td>

                    <td>    
                                      
                                      <select name="prod_id[]" id="prod_id" style="width:200px"class="form-control required prod_id"  disabled />
                                      <option value="">Select product</option>
                                      <?php
                                      foreach($proddtls as $key1)
                                      { ?>
                                          <option value="<?php echo $key1->prod_id; ?>" <?php if($prodd->prod_id==$key1->prod_id) echo "selected" ?> ><?php echo $key1->prod_desc; ?></option>
                                      <?php
                                      } ?>
                                      </select> 
                                                          
                                              </td>

                    <td>
                    <input type="text" name="qty[]" style="width:200px" class="form-control required qty" value="<?=$prodd->qty?>" id="qty" >
                    
                    </td>
                    
                    <td>
                    <input type="text" name="purchase_rt[]" style="width:200px" class="form-control required purchase_rt" value="<?=$prodd->purchase_rt?>" id="purchase_rt" readonly >
                    </td>
                    <td>
                    <input type="text" name="taxable_amt[]" style="width:200px" class="form-control required taxable_amt" value="<?=$prodd->taxable_amt?>" id="taxable_amt" readonly >
                    </td>
                    <td>
                    <input type="text" name="tds[]" style="width:200px" class="form-control required tds" value="<?=$prodd->tds_amt?>" id="tds" readonly >
                    </td>
                    <td>
                    <input type="text" name="paid_amt[]" style="width:200px" class="form-control required paid_amt" value="<?=$prodd->paid_amt?>" id="paid_amt" >
                    <?php $tot_amount +=$prodd->paid_amt;?>
                    </td>

                    <td>
                    <input type="text" name="net_amt[]" style="width:200px" class="form-control required net_amt" value="<?=$prodd->net_amt?>" id="net_amt" >
                    <?php $tot_net_amt +=$prodd->net_amt;?>
                    </td>
                  
                    </tr>

                <?php } ?>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td >
                                        <strong>Total:</strong>
                                    </td>
                                     <td colspan="9">
                                     <div class="col-md-7"></div>
                                          <div class="col-md-0">Total Paid Amount :   <span id="paid_total"><?=$tot_amount?><br><?php echo $tot_net_amt; ?></span></div>
                                      
                
                                    </td>
                                </tr>
                            </tfoot> 
                    
                        </table>

                    </div> 

                </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" id= "submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </form>


        </div>

    </div>

</div>

<!-- For Add row table -->
<script>

    $(document).ready(function(){

        // For add row option
        $('#addrow').click(function(){

            $.get( 

'<?php echo site_url("trade/f_get_sale_ro");?>',

{ 

comp_id: $('#comp_id').val()
// dist_cd : $('#dist_cd').val()

}

).done(function(data){

var string = '<option value="">Select</option>';
//console.log(data);
$.each(JSON.parse(data), function( index, value ) {

    string += '<option value="' + value.ro_no + '">' + value.ro_no + '</option>'

});

            var newElement = '<tr>'
                                +'<td>'
                               +'<select name="ro[]" id="ro" style="width:150px"class="form-control required ro" required>'
                +'<option value="">Select Project</option>'
                
                      +' <option value=" '+ string +'</option>'
                  
           +'</select> '
                                +'</td>'
                                +'<td>'
                                    +'<select name="prod_id[]" id="prod_id" style="width:150px"class="form-control required prod_id" required>'
                +'<option value="">Select Product</option>'
                +'<?php
                   foreach($proddtls as $key1)
                  { ?>'
                       +' <option value="<?php echo $key1->prod_id; ?>"><?php echo $key1->prod_desc; ?></option>'
                  +'<?php
                   } ?>'
           +'</select> '
                                +'</td>'
                                +'<td>'
                                    +'<input type="text" name="stock_qty[]" class="form-control required stock_qty" value= "" id="stock_qty" required>'
                                +'</td>'
                                +'<td>'
                                    +'<input type="text" name="qty[]" class="form-control required qty" value= "" id="qty" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="sale_rt[]" class="form-control required sale_rt" value= "" id="sale_rt" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="taxable_amt[]" class="form-control required taxable_amt" value= "" id="taxable_amt" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="cgst[]" class="form-control required cgst" value= "" id="cgst" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="sgst[]" class="form-control required sgst" value= "" id="sgst" required>'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="tot_amt[]" class="form-control tot_amt required" value= "" id="tot_amt" required>'
                                +'</td>'
                                +'<td>'
                                    +'<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>'
                                +'</td>'
                            '</tr>';

            $("#intro").append($(newElement));

        });
        });
        // For remove row 
        $("#intro").on("click","#removeRow", function(){
            $(this).parents('tr').remove();
            $('.total').change();
        });

        // For getting total amount after giving nt_amount
        $('#nt').on("change", function(){
            var total = $(this).val();
            $('#total').val(total);
        })


        // For getting total calculation after remove row
        $('.total').change(function(){

            var total = $('#nt').val();
            var ntAmount = $('#nt').val();
            $('.cgst_val').each(function(){

                var curr_gst_val = $(this).val();
                total = parseFloat(total)+parseFloat(parseFloat(curr_gst_val)*2);
                //console.log(total);

            })
            $('#total').val(parseFloat(total).toFixed());

            // Checking whather total to sub_amnt exeeds NT Rs or not-- 
            //var total_subAmnt = $('#sub_amnt').val();
            var total_subAmnt = 0;
            $('.sub_amnt').each(function(){

                var tot_sub_amnt = $(this).val();
                total_subAmnt = parseFloat(total_subAmnt)+parseFloat(tot_sub_amnt);
                
                if(parseFloat(ntAmount)<parseFloat(total_subAmnt))
                {
                    $('#nt').css('border-color', 'red');
                    $('#submit').prop('disabled', true);
                    return false;
                }
                else
                {
                    $('#nt').css('border-color', 'green');
                    $('#submit').prop('disabled', false);
                    return true;
                }

                
            })

        });

    })

</script>

<!-- <script>

$(document).ready(function()
{


        $.get('<?php echo site_url("trade/js_get_stock_qty");?>',{ ro: '<?=$prodd->sale_ro?>' })

        .done(function(data)
        {
             var unitData = JSON.parse(data);
            $('#gst_rt').val(unitData.gst_rt);
        });


    $('#intro').on('change', '.qty', function(){

          var tottaxable  = 0;
          var cgst        = 0;
          var qty         = 0;
          var rate        = 0;
          var gst_rt      = 0;
          var tot_qty     = 0;
          var stkqty      = 0;
          var stkqty      = $('#stock_qty').val();
               $('#intro tr').each(function() {
          var qty = $(this).find('td:eq(1) .qty').val();
          var rate= $('#sale_rt').val();
          var gst_rt= $('#gst_rt').val(); 
        
                 tottaxable += parseFloat(qty*rate);
                 cgst += parseFloat((qty*rate) * gst_rt/100/2);
                 tot_qty += parseFloat(qty); 
                 $(this).find('td:eq(2) .taxable_amt').val(tottaxable.toFixed('2'));  
                 $(this).find('td:eq(3) .tot_amt').val((tottaxable + cgst*2).toFixed('2'));  
            });
             
            $("#tot_taxable_amt").html("");
            $("#tot_taxable_amt").html(tottaxable.toFixed('2'));
            $("#tot_cgst").html("");   
            $("#tot_sgst").html("");    
            $("#tot_cgst").html(cgst.toFixed('2')); 
            $("#tot_sgst").html(cgst.toFixed('2')); 
            $("#tot_payble_amt").html((tottaxable + cgst*2).toFixed('2'));    
            $("#tot_qty").html("");  
            $("#tot_qty").html(tot_qty.toFixed('2'));
            sumqty =tot_qty; 
         
            if ( sumqty>stkqty ) {
            alert('Quantity cannot be greater than stock quantity');
            $('.qty').eq($('.ro').index(this)).val("0");
            $('.taxable_amt').eq($('.ro').index(this)).val("0");
            $('.cgst').eq($('.ro').index(this)).val("0");
            $('.sgst').eq($('.ro').index(this)).val("0");
            $('.tot_amt').eq($('.ro').index(this)).val("0");
         
            return false;
           }
       })
                   
    })      

</script> -->


<!-- <script>

$(document).ready(function(){

	var i = 2;

	$('#soc_id').change(function(){

		$.get( 

			'<?php echo site_url("trade/f_get_soc");?>',
			{ 

				soc_id: $(this).val(),

			}

		)
		.done(function(data){

			var parseData = JSON.parse(data);
			var gstin = parseData[0].gstin;
			var soc_add= parseData[0].soc_add;
			var cin= parseData[0].cin;
			$('#gstin').val(gstin);
			$('#soc_add').val(soc_add);
			
		});

	});

});

$(document).ready(function(){

		$.get( 

			'<?php echo site_url("trade/f_get_soc");?>',
			{ 

				soc_id: <?=$prodd->soc_id?>,

			}

		)
		.done(function(data){

			var parseData = JSON.parse(data);
			var gstin = parseData[0].gstin;
			var soc_add= parseData[0].soc_add;
			var cin= parseData[0].cin;
			$('#gstin').val(gstin);
			$('#soc_add').val(soc_add);
		});



	});

      $(document).ready(function(){
      //  $('#ro').change(function(){

             // $('.stock_point').eq($('.ro').index(this)).val(""); 
              $('.stock_name').eq($('.ro').index(this)).val(""); 
           
            $.get('<?php echo site_url("trade/js_get_stock_point");?>',{ ro: '<?=$prodd->sale_ro?>' })
                                                                            
            .done(function(data){

                   var unitData = JSON.parse(data);

               // $('.stock_point').eq($('.ro').index(this)).val(unitData.soc_id); 
                $('#stock_name').val(unitData.soc_name); 

            });

        });

</script> -->




<!-- <script>

    $(document).ready(function()
    {
        $('#intro').on( "change", ".ro", function()
        {
         
            $.get('<?php echo site_url("trade/js_get_stock_qty");?>',{ ro: $(this).val() })
                                                                            
            .done(function(data)
            {
                 //console.log(data);
                var unitData = JSON.parse(data);
                 console.log(unitData);
                $('.stock_qty').eq($('.ro').index(this)).val(unitData.qty); 
                $('.prod_id').eq($('.ro').index(this)).val(unitData.prod_id); 
                $('.gst_rt').eq($('.ro').index(this)).val(unitData.gst_rt); 
                $('.qty').eq($('.ro').index(this)).val(0);  
                $('.sale_rt').eq($('.ro').index(this)).val(0);  
                $('.taxable_amt').eq($('.ro').index(this)).val(0);
                $('.cgst').eq($('.ro').index(this)).val(0);  
                $('.sgst').eq($('.ro').index(this)).val(0);
                $('.tot_amt').eq($('.ro').index(this)).val(0);
            
            });

        });

    });


</script> -->
<!-- <script>

$(document).ready(function()
{
    $('#intro').on( "change", ".sale_rt", function()
    {
       
           var sum    = 0;
       var gst_rt=$('.gst_rt').eq($('.ro').index(this)).val();
       var qty = $('.qty').eq($('.ro').index(this)).val();
       var sale_rt = $('.sale_rt').eq($('.ro').index(this)).val();
       if (sale_rt==0){
        alert('Sale rate Can not be zero');
        var txtBox=document.getElementById("sale_rt" );
txtBox.focus();
    return false;
       }
       var taxable_amt= parseFloat(qty * sale_rt).toFixed('2');
       var cgst =parseFloat(taxable_amt * gst_rt/100/2).toFixed('2')
       var tot_amt = parseFloat(taxable_amt + cgst*2).toFixed('2')
     var total =0.00;
     total = parseFloat(total) + parseFloat(tot_amt); 
       
       
    //    total += parseFloat(tot_amt); 
        $.get('<?php echo site_url("trade/js_get_stock_qty");?>',{ ro: $(this).val() })

                                                                  
        .done(function(data)
        {
             console.log(data);
            var unitData = JSON.parse(data);
             console.log(unitData);
           
            
            $('.taxable_amt').eq($('.ro').index(this)).val(taxable_amt);
            $('.cgst').eq($('.ro').index(this)).val(cgst);
            $('.sgst').eq($('.ro').index(this)).val(cgst);
            $('.tot_amt').eq($('.ro').index(this)).val(tot_amt);
            
                       
           // $('#total').val(parseFloat(total).toFixed());  

             $("input[class *= 'tot_amt']").each(function(){
           sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum).toFixed();

        });
       
    });
    
   
});

 $('.table tbody').on('change', '.qty', function(){

   
          
            let row          = $(this).closest('tr');
            var qty          = row.find('td:eq(3) .qty').val();
        
            
            var stock        = row.find('td:eq(2) .stock_qty').val();

         
                if (parseFloat(qty)>parseFloat(stock)  ){
              //  var zero_qty          = null;
               
                row.find('td:eq(3)  input').val("0");
             
                alert('Sale Quantity Should Not Be Greater Than Stock Quantity!');

              }
           
                      
            })

 $('.table tbody').on('change', '.dis', function(){

   
           var sum =0;
            let row   = $(this).closest('tr');
             var dis        = parseFloat(row.find('td:eq(8) .dis').val());
            var tot_amt   = row.find('td:eq(9) .tot_amt').val();
        
                           row.find('td:eq(9) .tot_amt').val(tot_amt-dis);
           
         
               $("input[class *= 'tot_amt']").each(function(){
           sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum).toFixed(2);
           
                      
            })

</script> -->

<!-- <script>
		function endDt(){
			var frmDt = document.getElementById("ro_dt").value;
			var days  = document.getElementById("no_of_days").value;
			var day;

			var year;

			days = (days - 1);
			
			toDt   = new Date(frmDt);

			toDt.setDate(toDt.getDate() + days);

			var dd = toDt.getDate();
    		var mm = toDt.getMonth() + 1;
    		var y  = toDt.getFullYear();

    		if(dd <= 9){
    			dd = '0' + dd;
    		}else{
    			dd = dd;
    		}

    		if(mm <= 9){
    			mm = '0' + mm;
    		}else{
    			mm = mm;
    		}

			var format = y + '-' + mm + '-' + dd;

			document.getElementById("sale_due_dt").value = format;
			
		}

		
</script> -->
