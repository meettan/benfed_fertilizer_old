<?php $fyarra=$this->session->userdata('loggedin')['fin_yr']; 
$fy=explode('-',$fyarra);
$thisyear=$fy[0];

?>
<style>
	.radio-label {
		display: inline-block;
		vertical-align: top;
		margin-right: 3%;
	}

	.radio-input {
		display: inline-block;
		vertical-align: top;
	}
</style>
<div class="wraper">

	<div class="col-md-12 container form-wraper">
		<form method="POST" id="product" action="<?php //echo site_url("adv/advancefwd_add") ?>">

			<div class="form-header">
				<h4>Advance Forward</h4>
			</div>
			<?php foreach($fwds as $row); ?>
			<div class="form-group row">
                <label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>
				<div class="col-sm-2">
					<input type="date" id='trans_dt' name="trans_dt" value='<?php echo $row->trans_dt;?>'
					class="form-control" readonly />
				</div>
				<label for="society" class="col-sm-1 col-form-label">Company:</label>
				
				<div class="col-sm-3">
                        <select name="comp_id"  class="form-control comp_id" id="comp_id" disabled>
                            <option value="">Select</option>
                            <?php  foreach($compdtls as $key){  ?>
                            <option value="<?php echo $key->comp_id;?>" <?php if($row->comp_id == $key->comp_id) echo 'selected';?>><?php echo $key->comp_name;?></option>
                            <?php  }  ?>
                        </select>
				</div>
                <label for="society" class="col-sm-1 col-form-label">Product:</label>
                <div class="col-sm-3">
                        <select name="prod_id"  class="form-control prod_id" id="prod_id" disabled>
						   <option value="">Select</option>
                            <?php  foreach($prodtls as $key){  ?>
                            <option value="<?php echo $key->PROD_ID;?>" <?php if($row->prod_id == $key->PROD_ID) echo 'selected';?>><?php echo $key->PROD_DESC;?></option>
                            <?php  }  ?>
                        </select>
				</div>
			</div>

            <div class="form-header">
                <h4>Advance Details</h4>
            </div>

            <div class="form-group row">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th style="text-align: center">Receipt no</th>
                        <th style="text-align: center">FO</th>
                        <th style="text-align: center">RO Number</th>
						<th style="text-align: center">Qty</th>
                        <th style="text-align: center">Rate</th>
                        <th style="text-align: center">Amount</th>
						<th style="text-align: center">Delete</th>
                    </thead>

                <tbody id="intro">
				<?php   $tot_amt =0.00;
				       foreach($fwds as $value){ ?>

					<tr>
					<td ><input type="text" name="rec[]" class="form-control" id="" style="width:165px" readonly="" value='<?php echo $value->detail_receipt_no; ?>'></td>
					<td><input type="text" name="fo_no[]" class="form-control" value='<?php echo $value->fo_no; ?>' style="width:125px" readonly=""></td>
					<td><input type="text" name="ro_no[]" class="form-control" value='<?php echo $value->ro_no; ?>' style="" readonly=""></td>
					<td><input type="text" name="qty[]" class="form-control" value='<?php echo $value->qty; ?>' readonly=""></td>
					<td><input type="text" name="rate[]" class="form-control"value='<?php echo $value->rate; ?>' readonly=""></td>
					<td><input type="text" name="amount[]" class="form-control" value='<?php echo $value->amount;
																						$tot_amt +=$value->amount; ?>' readonly=""></td>
				    <td> <?php if($value->fwd_flag == 'N'){ ?>
						<button type="button" name="delete_5" class="delete" id="<?=$value->receipt_no;?>,<?=$value->detail_receipt_no;?>,<?=$value->fwd_receipt_no;?>" 
						            data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                        </button>
						<?php } ?>
					</td>			
				</tr>

				<?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="5" style="text-align:right">
                                <strong>Total:</strong>
                            </td>
                           
                            <td colspan="" style="text-align:left">
                                <strong id="tot_amt"><?=$tot_amt?></strong>
                            </td>
                        </tr>
                    </tfoot>

                </table>

            </div>
		<br>
		  
	</div>
    </form>
</div>
<script>
	$(".sch_cd").select2();
</script>
<script>
$(document).ready(function () {

	$('.delete').click(function () {
		
		var id = $(this).attr('id');
		console.log(id);
		var result = confirm("Do you really want to delete this record?");
		if(result) {
			window.location = "<?php echo site_url('adv/advfwddetailDel?data="+id+"');?>";
		}
		
	});

    var i = 0;
    $("#comp_id").change(function () {
        $("#prod_id").html('');
        var comp_id = $(this).val();
        $.get('<?php echo site_url("stock/f_get_product");?>', {
            comp_id: $(this).val()
        }).done(function (data) {
            var string = '<option value="">Select</option>';
            $.each(JSON.parse(data), function (index, value) {
                string += '<option value="' + value.prod_id + '">' + value
                    .prod_desc + '</option>'
            });
            $("#prod_id").append(string);
			$('.select2').select2();
        });

    });

});

$(document).ready(function(){
	
	$("#addrow").click(function()
	{
		var comp = $('#comp_id').val();
        var prd = $('#prod_id').val();

		if(comp > 0 && prd > 0 ){

			$.get('<?php echo site_url("adv/js_get_received_no") ?>', {comp_id: $('#comp_id').val(),prod_id:$('#prod_id').val()})
			.done(function(data){

				var string = '<option value="">Select</option>';
				$.each(JSON.parse(data), function( index, value ){

					string += '<option value="' + value.detail_receipt_no + '">' + value.detail_receipt_no +'</option>';
				})

				var newElement1= '<tr>'
								+'<td id= "detail_receipt_no" >'
									+'<select name="detail_receipt_no[]" id="detail_receipt_no" class= "form-control detail_receipt_no select2" required>'
										+string
									+'</select>'
								+'</td>'
								+'<td>'
									+'<input type="hidden" name="receipt_no[]" value="" class="receipt_no"><input type="text" name="fo_no[]" class="form-control fo_no" id="fo_no" style="width:125px" readonly>'
								+'</td>'
								+'<td>'
									+'<input type="text" name="ro_no[]" class="form-control ro_no" id="ro_no" style="" readonly>'
								+'</td>'
								+'<td>'
									+'<input type="text" name="qty[]" class="form-control required qty" id="qty" readonly>'
								+'</td>'
								+'<td>'
									+'<input type="text" name="rate[]" class="form-control rate" id="rate" readonly>'
								+'</td>'
								+'<td>'
									+'<input type="text" name="amount[]" class="form-control amount" id="amount" readonly>'
								+'</td>'
								+'<td>'
									+'<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>'
								+'</td>'
							+'</tr>';

				$("#intro").append($(newElement1));
				$('.select2').select2();
				   $(document).ready(function() {
						var tot = 0.00;
						$('.amount').each(function(){
							tot += parseFloat($(this).val())?parseFloat($(this).val()):0.00;
						});
						$('#tot_amt').html(parseFloat(tot));
					})
				})

		}else{
			alert('Please select Company and Product');
			return false;
		}
															
	});

	// Start code to Remove Bill row  
	$("#intro").on("click","#removeRow", function(){
		var tot = 0.00;
		$(this).parents('tr').remove();
		$('.amount').each(function(){
				tot += parseFloat($(this).val())?parseFloat($(this).val()):0.00;
			});
			$('#tot_amt').html(parseFloat(tot));
	});
});

$("#intro").on("change", ".detail_receipt_no", function(){
	var st  = parseFloat($('#st').html());
	var tot = 0.00;
	var row = $(this).closest('tr');
	var detail_receipt_no = $(this).val();
	//var receipt_no = $('#').val();
		$.get('<?php echo site_url("adv/js_get_reciept_detail") ?>',{detail_receipt_no:detail_receipt_no})
		.done(function(data){
			var value = JSON.parse(data);
			row.find("td:eq(1) input[type='hidden']").val(value.receipt_no);
			row.find("td:eq(1) input[type='text']").val(value.fo_no);
			row.find("td:eq(2) input[type='text']").val(value.ro_no);
			row.find("td:eq(3) input[type='text']").val(value.qty);
			row.find("td:eq(4) input[type='text']").val(value.rate);
			row.find("td:eq(5) input[type='text']").val(value.amount);
			$('.amount').each(function(){
				tot += parseFloat($(this).val())?parseFloat($(this).val()):0.00;
			});
			$('#tot_amt').html(parseFloat(tot));
		})

})

</script>
