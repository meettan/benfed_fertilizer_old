<style>
    #overlay {
        background: rgba(100, 100, 100, 0.2);
        color: #ffff;
        position: fixed;
        height: 100%;
        width: 100%;
        z-index: 5000;
        top: 0;
        left: 0;
        float: left;
        text-align: center;
        padding-top: 25%;
        opacity: .80;
    }
    .spinner {
        margin: 0 auto;
        height: 64px;
        width: 64px;
        animation: rotate 0.8s infinite linear;
        border: 5px solid #228ed3;
        border-right-color: transparent;
        border-radius: 50%;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div class="wraper">

    <div class="col-md-12 container form-wraper">

        <form method="POST" action="<?php echo site_url("socpay/socpayfwdAdd") ?>" onsubmit="return valid_data()"
            id="form">
            <div class="form-header">
                <h4>Society Payment Forward</h4>

            </div>

            <div class="form-group row">
                
                <label for="paid_dt" class="col-sm-2 col-form-label">Ro No:</label>
                <div class="col-sm-3">
                    <input type="text"  id="ro_no" name="ro_no" class="form-control"
                        value=""  required />
                </div>
                <label for="paid_dt" class="col-sm-2 col-form-label">Date:</label>
                <div class="col-sm-3">
                    <input type="date"  id="trans_dt" name="trans_dt" class="form-control"
                        value="<?php echo date('Y-m-d');  ?>" readonly required />
                </div>
            </div>
            <div class="form-group row">
                
                <label for="comp" class="col-sm-2 col-form-label">Company:</label>
                <div class="col-sm-3">
                    <input type="text"  id="comp" name="comp" class="form-control"
                        value=""  readonly />
                </div>
                <label for="prod" class="col-sm-2 col-form-label">Product:</label>
                <div class="col-sm-3">
                    <input type="text"  id="prod" name="prod" class="form-control"
                        value="" readonly  />
                </div>
            </div>
            <div class="form-group row">
                
                <label for="adv" class="col-sm-2 col-form-label">Advance:</label>
                <div class="col-sm-3">
                    <input type="text"  id="adv" name="adv" class="form-control"
                        value=""  readonly />
                </div>
                <label for="advfwdno" class="col-sm-2 col-form-label">Advance Fwd No:</label>
                <div class="col-sm-3">
                    <input type="text"  id="advfwdno" name="advfwdno" class="form-control"
                        value="" readonly  />
                </div>
            </div>

            <div class="form-header">

                <h4>Pay Type and Paid Details</h4>

            </div>
            <hr>

            <div class="row" style="margin: 5px;">

                <div class="form-group">

                    <table class="table table-striped table-bordered table-hover">

                        <thead>
                            <th style="text-align: center;width:300px">Receive No</th>
                            <th style="text-align: center;width:300px">Society.</th>
                            <th style="text-align: center;width:300px">Sale Invoice No</th>
                            <th style="text-align: center;width:100px">Adv Qty</th>
                            <th style="text-align: center;width:100px">Sale Qty</th>
                            <th style="text-align: center;width:100px">Balance Qty</th>
                            <th>
                                <button class="btn btn-success" type="button" id="addrow" style="border-left: 10px"
                                    data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i
                                        class="fa fa-plus" aria-hidden="true"></i></button></th>
                            </th>
                        </thead>

                        <tbody id="intro">

                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    Total:
                                </td>
                                <td>
                                    <input type='text' name="total" id="total" class="form-control total"
                                        placeholder="0.00" readonly value='0.00'>
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>


            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" id="submit" class="btn btn-info" value="Save" onclick="return myFunction();" />

                </div>
            </div>
        </form>

    </div>

</div>
<div id="overlay" style="display:none;">
    <div class="spinner"></div>
</div>

</div>

<script>
    $(".sch_cd").select2(); // Code For Select Write Option


    $(document).ready(function(){
	
	$("#addrow").click(function()
	{
		var ro_no = $('#ro_no').val();
        //var tot_qty = $('#total').val();
		if(ro_no != ''  ){

			$.get('<?php echo site_url("socpay/get_paymentreceived_id") ?>', {ro_no: $('#ro_no').val()})
			.done(function(data){

				var string = '<option value="">Select</option>';
				$.each(JSON.parse(data), function( index, value ){

					string += '<option value="' + value.paid_id + '">' + value.paid_id +'</option>';
				})

				var newElement1= '<tr>'
								+'<td id= "paid_id" >'
									+'<select name="paid_id[]" id="paid_id" class="form-control paid_id select2" required>'
										+string
									+'</select>'
								+'</td>'
								+'<td>'
									+'<input type="hidden" name="scoiety_id[]" value="" class="scoiety_id"><input type="text" name="scoiety_name[]" class="form-control scoiety_name" id="scoiety_name" readonly>'
								+'</td>'
								+'<td>'
									+'<input type="text" name="sale_invoice[]" class="form-control sale_invoice" id="sale_invoice" readonly>'
								+'</td>'
								+'<td>'
									+'<input type="text" name="adv_qty[]" class="form-control adv_qty" id="adv_qty" style="" readonly>'
								+'</td>'
								+'<td>'
									+'<input type="text" name="sale_qty[]" class="form-control sale_qty" id="sale_qty" readonly>'
								+'</td>'
								+'<td>'
									+'<input type="text" name="qty[]" class="form-control qty" id="qty" ><input type="hidden" name="maxval[]" value="" class="maxval">'
								+'</td>'
								+'<td>'
									+'<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>'
								+'</td>'
							+'</tr>';

				$("#intro").append($(newElement1));
				$('.select2').select2();
                
				})

		}else{
			alert('Please Give RO No');
			return false;
		}
															
	});

	// Start code to Remove Bill row  
	$("#intro").on("click","#removeRow", function(){
		$(this).parents('tr').remove();
        var tot = 0.00;
		$('.qty').each(function(){
				tot += parseFloat($(this).val())?parseFloat($(this).val()):0.00;
			});
		//$('#total').val(parseFloat(tot));
	});
});
</script>

<script>
    $("#intro").on("change", ".paid_id", function(){
        var row = $(this).closest('tr');
        var paid_id = $(this).val();
        var st  = parseFloat($('#st').html());
        var tot = 0.00;
        var saleqty = 0.00;
        var maxval  = 0.00;
        var tot_qty = parseFloat($('#total').val())?parseFloat($('#total').val()):0.00;
        var inps = document.getElementsByName('paid_id[]');
        var p = [];
        var error_cnt = 0 ;
        for (var i = 0; i <inps.length; i++) {
            var inp=inps[i];
            if(jQuery.inArray(paid_id, p) !== -1){
                alert('Data already exist!');
                row.remove();
                error_cnt ++;
            }else{
                
                p.push(inp.value);
                error_cnt == 0;
            }  
        }
        if(error_cnt == 0) {

            $.post('<?php echo site_url("socpay/paididdetail") ?>',{paid_id:paid_id})
                .done(function(data){
                    var value = JSON.parse(data);
                    row.find("td:eq(1) input[type='text']").val(value.soc_name);
                    row.find("td:eq(2) input[type='text']").val(value.sale_invoice_no);
                    row.find("td:eq(4) input[type='text']").val(value.qty);
                    row.find("td:eq(5) input[type='hidden']").val(value.paid_qty);
                    saleqty = value.qty
                    maxval  = value.paid_qty;
                })
            $.post('<?php echo site_url("socpay/advqty") ?>',{paid_id:paid_id,advfwdid:$('#advfwdno').val() })
            .done(function(data){
                var value = JSON.parse(data);
                if(parseFloat(value.qty) > parseFloat('0') ){
                    row.find("td:eq(3) input[type='text']").val(value.qty);
                    if( parseFloat(saleqty-(value.qty)) > parseFloat(maxval)){
                        row.find("td:eq(5) input[type='text']").val(maxval);
                    }
                    else{
                        row.find("td:eq(5) input[type='text']").val(saleqty-(value.qty));

                    }
                    $('#total').val(parseFloat(tot_qty+(parseFloat(saleqty)-parseFloat(value.qty))));
                }else{
                    row.find("td:eq(3) input[type='text']").val('0');
                    if(parseFloat(saleqty-(value.qty)) > parseFloat(maxval)){
                        row.find("td:eq(5) input[type='text']").val(maxval);
                    }else{
                        row.find("td:eq(5) input[type='text']").val(saleqty-parseFloat('0'));
                    }
                  
                    $('#total').val(parseFloat(tot_qty+(parseFloat(saleqty)-parseFloat('0'))));
                }
            })
        }
        var tot = 0.00;
        $('.qty').each(function(){
            tot += parseFloat($(this).val())?parseFloat($(this).val()):0.00;
        });
        $('#total').val(parseFloat(tot));

    })


    $('#form').submit(function (event) {

        var tot_cr_amt = parseFloat($('#tot_amt').val());
        var sum = 0;
        let row = $(this).closest('tr');

        $("input[class *= 'soc_amt']").each(function () {
            sum += parseFloat($(this).val());

        });
    });
</script>

<script>
    $(document).ready(function () {

        $('#ro_no').change(function () {

            $.get('<?php echo site_url("socpay/f_rodetail");?>',{
                    ro_no: $(this).val()
                }).done(function (data) {
                var parseData = JSON.parse(data);
                $('#comp').val(parseData.COMP_NAME);
                $('#prod').val(parseData.PROD_DESC);
                if(parseData.adv_status == 'Y'){
                    $('#adv').val("YES");
                    $('#advfwdno').val(parseData.advance_receipt_no);
                }else{
                    $('#adv').val("NO");
                    $('#advfwdno').val('Not Found');
                }
               
                //$('#advfwdno').val(parseData.advance_receipt_no);
            });

        });

    });
</script>

<script>


    $('#intro').on("change", ".paid_amt", function () {
        //$('.pur_ro').eq($('.pur_inv').index(this)).val("");
        let row = $(this).closest('tr');
        var amt = parseFloat($(this).val()).toFixed(2);

        var abc = row.find('td:eq(0) .pay').val();

        if (abc == 6) {
            var crAmount = parseFloat($('#tot_dr_amt').val()).toFixed(2);
            
           
            if (parseFloat(amt) > parseFloat(crAmount)) {
                alert('Amount must be less than credit note amount');
                $("#addrow").hide();
                $("#submit").prop('disabled', false);
            }else{
                $("#submit").prop('disabled', true);
                $("#addrow").show();
            }
        }


    });
    $(document).ready(function () {

        $('#sale_ro').change(function () {
            $.get('<?php echo site_url("socpay/f_advdetails");?>', {
                        ro: $(this).val(),soc_id:$('#soc_id').val()
                    }
                )
                .done(function (data) {


                    var string = '<h4>Advance To Company</h4><table class="table table-striped table-bordered" style="border: 2px solid;"><tr><th>Product </th><th>FO No</th><th>Qty</th><th>Rate</th><th>Amount</th></tr>';
                    if(data == 0){
                        string += '<tr><td colspan="5" style="text-align: center;font-size: 18px;font-weight: 600;color: #2a6496;">No record Found</td></tr>'; 
                    }else{

                        $.each(JSON.parse(data), function( index, value ) {
			
                            string += '<tr><td>'+value.product+'</td><td>'+value.fo_no+'</td><td>'+value.qty+'</td><td>'+value.rate+'</td><td>'+value.amount+'</td></tr>';
                    
                        });

                    }
		
		           string +='</table>'

                   $('#show_detail').html(string);
                });
        });

    });


    $('#form').submit(function(event){
           
           $('#intro tr').each(function() {

                 var valid = 1;    
                var max_limit = $(this).find("td:eq(5) input[type='hidden']").val();
                var qty = $(this).find('td:eq(5) .qty').val();
                   if(parseFloat(qty)> parseFloat(max_limit)){
                       $(this).find('td:eq(5) .qty').focus();
                       $(this).find('td:eq(5) .qty').css("border", "red solid 1px");
                       $('#submit').attr('type', 'buttom');
             
                       event.preventDefault();
                  }
                   else 
                      {
                     $('#submit').attr('type', 'submit');
                    // event.preventDefault();
                     }
           }); 
                 
        });
</script>