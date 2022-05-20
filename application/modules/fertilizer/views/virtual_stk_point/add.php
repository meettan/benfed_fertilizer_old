<div class="wraper">      
            
			<div class="col-md-14 container form-wraper">
	
				<form method="POST" action="<?php echo site_url("virtualpnt/virtual_stk_pointAdd") ?>" onsubmit="return valid_data()" id="form">
	
					<div class="form-header">
					
						<h4>Virtual Stock Point and Ro Details</h4>
					
					</div>

                    <div class="form-group row">
						<label for="sec_soc_id" class="col-sm-2 col-form-label">Secondary Stock Point :</label>
						<div class="col-sm-4">
	
							<select name="sec_soc_id" style="width:250px" class="form-control required" id="dist_id" required>
	
	                            <option value="">Select</option>
	
                                <?php
                                
                                    foreach($socdtls as $soc){
                                
                                ?>
                                
                                    <option value="<?php echo $soc->soc_id;?>"><?php echo $soc->soc_name;?></option>
	
	                            <?php
	
		                            }
	
	                            ?>     
	
	                        </select>
						</div>
                        <label for="tot_qty" class="col-sm-2 col-form-label">Total Qty:</label>
                       
                        <div class="col-sm-3">
                        <input type="text" style="width:170px" id="tot_qty" name="tot_qty" class="form-control" readonly/>
                        </div>
                        <!-- <label for="comp_id" class="col-sm-2 col-form-label">Company:</label>
						<div class="col-sm-3">
	                <select name="comp_id" style="width:250px" class="form-control required" id="comp_id">
                    <option value="">Select</option>
                    <?php
                       foreach($compdtls as $comp){
                            ?>
                <option value="<?php echo $comp->comp_id;?>"><?php echo $comp->comp_name;?></option>
                <?php    }    ?>     
                </select>
	                    </div> -->
                        
                      </div>
                      <div class="form-group row">
                      <label for="ro_no" class="col-sm-2 col-form-label">Ro No:</label>
						<div class="col-sm-4">
	
						<input type="text" style="width:170px" id="ro_no" name="ro_no" class="form-control"/>
	                    </div> 
                      <label for="ro_dt" class="col-sm-2 col-form-label">Ro Date:</label>
						<div class="col-sm-4">
	
						<input type="date" style="width:170px" id="ro_dt" name="ro_dt" class="form-control" readonly/>
	                    </div> 
                     
                        </div>
                        

				<div class="form-header">
					
					<h4>Real Stock Point Details</h4>
				
				</div>

                <hr>

                <div class="row" style ="margin: 5px;">

                    <div class="form-group">

                        <table class= "table table-striped table-bordered table-hover">

                            <thead>
                                <th style= "text-align: center;width:100px">PrimaryStock Point</th>
                                <th style= "text-align: center;width:100px">Qty</th>
                               
                                <th>
                                    <button class="btn btn-success" type="button" id="addrow" style= "border-left: 10px" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i class="fa fa-plus" aria-hidden="true"></i></button></th>
                                </th>

                            </thead>

                            <tbody id= "intro">
                                <tr>
                                
                                    <td>    
                                       
                                       <select name="p_soc_id[]" id="p_soc_id" style="width:150px"class="form-control pur_inv"  required>
                                      <option value="">Select Stock Point</option>
                                      <?php
                                          foreach($socdtls as $key1)
                                          { ?>
                                              <option value="<?php echo $key1->soc_id; ?>"><?php echo $key1->soc_name; ?></option>
                                          <?php
                                          } ?>
                                  </select> 
                                                          </td>
                    
                                    <td>    
                                    <input type="text" name="qty[]" style="width:90px;" class="form-control qty" value= "" id="qty"  >
                                    </td>
                             
                                </tr>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="1">
                                        Total:
                                    </td>
                                    <td colspan="1">
                                        <input name="total" style="width:150px;" id="total" class="form-control total" placeholder="Total" readonly>  
                                    </td>
                                </tr>
                            </tfoot>
                    
                        </table>

                    </div> 

                </div>
              

                <div class="form-group row">
					               <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" id= "submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </form>


        </div>

    </div>

</div>

<script>

    $(document).ready(function(){

        $("#addrow").click(function()
        {

            var newElement = '<tr><td><select name="p_soc_id[]" id="p_soc_id" style="width:150px"class="form-control pur_inv" required><option value="">Select Stock Point</option><?php foreach($socdtls as $key1){?><option value="<?php echo $key1->soc_id; ?>"><?php echo $key1->soc_name;?></option><?php } ?></select></td><td> <input type="text" name="qty[]" style="width:90px;" class="form-control qty" value= ""  id="qty" /></td><td><button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button></td></tr>';

            $("#intro").append($(newElement));
                                                                
        });

        // to change the value of total field as per fees field selected by adding rows
        $("#intro").on("click","#removeRow", function(){
            $(this).parent().parent().remove();
            $('.amount_cls').change();
        });
    
    });

</script>

<script>

$(document).ready(function(){

    var i = 2;

     $('#do_no').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/do_detail");?>',
            { 

                do_no: $(this).val(),
               
            }

        )
        .done(function(data){

            var datas = JSON.parse(data);
            
            $('#ro_dt').val(datas.do_dt);
            $('#invoice_no').val(datas.invoice_no);
            $('#invoice_dt').val(datas.invoice_dt);
            $('#company').val(datas.COMP_NAME);
            $('#comp_id').val(datas.comp_id);
            $('#gst_no').val(datas.GST_NO);
            $('#tot_amt').val(datas.tot_cr_amt);
            $('#tot_amts').val(datas.tot_cr_amt);
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
 $('.table tbody').on('change', '.paid_amt', function(){
   
           var sum =0;
            let row   = $(this).closest('tr');
                    
            $("input[class *= 'soc_amt']").each(function(){
            sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum).toFixed(2);
                      
            })


   $('#form').submit(function(event){

                 var tot_cr_amt = parseFloat($('#tot_amt').val());
                 var sum =0;

            let row   = $(this).closest('tr');
                    
            $("input[class *= 'soc_amt']").each(function(){
            sum += parseFloat($(this).val());
                      
            });
                 var total      = parseFloat($('#total').val());

                    if(tot_cr_amt < sum) {

                         alert("Total Debit Exceed Limit");
                                      
                         event.preventDefault();
                    }
                     else 
                        {
                    //  alert("Transaction Date Can Not Be Less Than order Date");

                       $('#submit').attr('type', 'submit');
                      }
        });
</script>

<script>

$(document).ready(function(){

	var i = 2;

	$('#trans_do').change(function(){

		$.get( 

			'<?php echo site_url("socpay/f_get_ro_dt");?>',
			{ 

				trans_do: $(this).val(),
				
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			
			var do_dt = parseData[0].do_dt;
            // var sale_ro = parseData[0].sale_ro;
			$('#do_dt').val(do_dt);
            // $('#sale_ro').val(sale_ro);
            
			
		});
        

	});

});
</script>

<script>
$(document).ready(function(){
    
// $('#intro').on( "change", ".pur_inv", function(){
// //$('#pur_inv').change(function(){
// $("#total").val('0');

// var total = 0;
// $('.paid_amt').each(function(){
//     total += $(this).val();
// })
// $("#total").val(total);

// });

$("#intro").on("click","#removeRow", function(){
    console.log('ok');

            $(this).parent().parent().remove();
            var total=0;
         $('.paid_amt').each(function(){
            
           total += +$(this).val();
            })
            $("#total").val(total);
    })
});
</script>

<script>

$(document).ready(function(){

    $('#intro').on("change", ".paid_amt", function(){

        var net_amt    =   $('#net_amt').val();
        var total               =   $('#total').val();

        // console.log(tot_dist_qty_qnt);
        // console.log(total);

        if(parseFloat(total) > parseFloat(net_amt))
        {
            $('#total').css('border-color', 'red');
            alert('Paid Amount Should Not Greater Than Net Amount!');
            $('#submit').prop('disabled', true);
            
            return false;
        }
        else
        {
            $('#submit').prop('disabled', false);
            $('#total').css('border-color', 'gray');
            return true;
        }

    })

})

</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#comp_id').change(function(){

        $.get( 

            '<?php echo site_url("compay/f_get_sale_invoice");?>',

            { 

                // comp_id: $(this).val(),
                dist_id :$('#dist_id').val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.sale_invoice_no + '">' + value.sale_invoice_no + '</option>'

            });

            $('#inv_no').html(string);


          });


    });

});
 </script>

 <script>

$(document).ready(function(){

    var i = 0;

    $('#dist_id').change(function(){

        $.get( 

            '<?php echo site_url("compay/f_get_comppay_company");?>',

            { 

                dist_id: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.comp_id + '">' + value.comp_name + '</option>'

            });

            $('#comp_id').html(string);


          });


    });

});
</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#comp_id').change(function(){
       
        $.get( 

            '<?php echo site_url("compay/f_get_comppay_ro");?>',

            { 

                comp_id: $(this).val(),
                dist_id: $('#dist_id').val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.pur_inv_no + '">' + value.pur_inv_no + '</option>'

            });

            $('#pur_inv').html(string);
            $('#prod_desc').val('');
            $('#pur_ro').val('');
            $('#pur_ro_dt').val('');
            $('#qty').val('0');
            $('#rate').val('0');
            $('#paid_amt').val('0');
            $('#total').val('0');



          });


    });

});
</script>

<script>

$(document).ready(function()
{
    $('#intro').on( "change", ".pur_inv", function()                     
    {
            $('.pur_ro').eq($('.pur_inv').index(this)).val(""); 
           
         
            
        $.get('<?php echo site_url("compay/f_get_comppay_ro_dtls");?>',{ pur_inv: $(this).val() })
                                                                        
        .done(function(data)
        {
            
        var unitData = JSON.parse(data);
        var qty = $('.qty').eq($('.pur_inv').index(this)).val(unitData.qty);
        var rate =  $('.rate').eq($('.pur_inv').index(this)).val(unitData.purchase_rt);
         $('.prod_id').eq($('.pur_inv').index(this)).val(unitData.prod_id); 
         $('.prod_desc').eq($('.pur_inv').index(this)).val(unitData.prod_desc);  
         $('.pur_ro').eq($('.pur_inv').index(this)).val(unitData.pur_ro); 
         $('.pur_ro_dt').eq($('.pur_inv').index(this)).val(unitData.ro_dt);   
         $('.qty').eq($('.pur_inv').index(this)).val(unitData.qty);
         $('.rate').eq($('.pur_inv').index(this)).val(unitData.purchase_rt);      
       
         $('.paid_amt').eq($('.pur_inv').index(this)).val(parseFloat(unitData.tot_amt).toFixed('2'));  
            var total=0;
         $('.paid_amt').each(function(){
            
           total += +$(this).val();
            })
         $("#total").val(total);
        
        });

    });
});
</script>

<!-- <script>

$(document).ready(function(){

    var i = 0;

    $('#bank_id').change(function(){

        $.get( 

            '<?php echo site_url("compay/f_get_bank_dtls");?>',

            { 

                bank_id: $(this).val(),
               

            }

        ).done(function(data){

            var parseData = JSON.parse(data);
            
            var ac_no = parseData[0].ac_no;
			var ifsc = parseData[0].ifsc;
			$('#ac_no').val(ac_no);
			$('#ifsc').val(ifsc);

          });


    });

});
</script> -->
<!-- <script>
$(document).ready(function(){
$("#pay_dt").change(function(){

var ro_dt = $('#pay_dt').val();



var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
(month<10 ? '0' : '') + month + '-' +
(day<10 ? '0' : '') + day;

// console.log(trans_dt,output);

if(new Date(output) <new Date(ro_dt))
{
alert("Paid Date Can Not Be Greater Than Current Date");
$('#submit').attr('type', 'buttom');
return false;
}else{
   $('#submit').attr('type', 'submit');
}
})
});
</script> -->
<!-- <script type="text/javascript">
    function DeleteValues() {
        var dropDown = document.getElementById("pur_inv");
        for (var i = 0; i <= dropDown.options.length; i++) {
            if (dropDown.options[i].selected) {
                dropDown.removeChild(dropDown.options[i]);
                break;
            }
        }
    }
</script> -->


<script>

$(document).ready(function(){

	var i = 2;

	$('#ro_no').change(function(){
// console.log('hi');
//die();
		$.get( 

			'<?php echo site_url("virtualpnt/f_get_pur_ro_dtls");?>',
			{ 

				ro_no: $(this).val(),
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			
			// var recv_amt = parseData[0].recv_amt;
			var ro_dt = parseData.ro_dt;
            var qty   = parseData.qty;
            $('#ro_dt').val(ro_dt);
            $('#tot_qty').val(qty);
			// $('#recv_amt').val(recv_amt);
			
			
		});

	});

});

</script>
<script>
$("#intro").on("click","#removeRow", function(){
    console.log('ok');

            $(this).parent().parent().remove();
            var total=0;
         $('.qty').each(function(){
            console.log('hi');
           total += +$(this).val();
            })
            $("#total").val(total);
    })
});
</script>

<script>

$(document).ready(function(){

    $('#intro').on("change", ".qty", function(){

        var total=0;
         $('.qty').each(function(){
            
           total += +$(this).val();
            })
            $("#total").val(total);
    })

        // console.log(tot_dist_qty_qnt);
        // console.log(total);

        

});

</script>