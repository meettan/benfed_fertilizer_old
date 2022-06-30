    <div class="wraper">

    	<div class="col-md-11 container form-wraper">

    		<form method="POST" action="<?php echo site_url("stock/stockAdd") ?>" onsubmit="myFunction()">

    			<div class="form-header">

    				<h4>Add Purchase</h4>

    			</div>

    			<div class="form-group row">

    				<!-- <label for="prod_Id" class="col-sm-3 col-form-label">Prod_Id:</label> -->

    				<div class="col-sm-4">

    					<input type="hidden" id=prod_Id name="prod_Id" class="form-control" />


    				</div>

    			</div>
				<div class="form-group row">
				<label for="adv_status" class="col-sm-1 col-form-label">Purchase</label>
				<div class="col-sm-3"><input class="form-check-input adv_status" type="radio" name="adv_status" id="advstatus" value="Y" checked> With advance
				</div>
				<div class="col-sm-3"><input class="form-check-input adv_status" type="radio" name="adv_status" id="advst" value="N"> Without advance</div>
			    </div>
    			<div class="form-group row">
    				<label for="comp_id" class="col-sm-1 col-form-label">Company:</label>
    				<div class="col-sm-3">
    					<select name="comp_id" class="form-control required" id="comp_id" required>

    						<option value="">Select</option>
    						<?php	foreach($compdtls as $comp){ ?>
    						<option value="<?php echo $comp->comp_id;?>">
							<?php echo $comp->comp_name;?>
						    </option>

    						<?php  }   ?>
    					</select>
    				</div>
    				<label for="gst_no" class="col-sm-1 col-form-label">GSTIN:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=gst_no name="gst_no" class="form-control" readonly />

    				</div>
    				<label for="cin" class="col-sm-1 col-form-label">CIN:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=cin name="cin" class="form-control" readonly />

    				</div>
    			</div>

    			<div class="form-group row">
    				<label for="comp_add" class="col-sm-1 col-form-label">Address:</label>
    				<div class="col-sm-10">

    					<textarea  id=comp_add name="comp_add" class="form-control" rows='2' readonly /></textarea>

    				</div>
    			
    			</div>
    			<div class="form-header">

    				<h4>Product Details</h4>

    			</div>
    			<div class="form-group row">
    				<label for="prod_id" class="col-sm-1 col-form-label">Product:</label>

    				<div class="col-sm-3">
    					<!-- <input type="text" id=prod_id name="prod_id" class="form-control" required /> -->
    					<select name="prod_id" class="form-control sch_cd required" id="prod_id" required>

    						<option value="">Select</option>

    						<?php

								foreach($proddtls as $prod){

							?>

    						<option value="<?php echo $prod->prod_id;?>"><?php echo $prod->prod_desc;?></option>

    						<?php

								}

							?>

    					</select>


    				</div>
    				<div>
    					<?php

							foreach($mntend as $prod);{

							?>
    					<input type="hidden" name="mnthenddt" style="width:80px" class="form-control required mnthenddt"
    						value="<?php echo $prod->mnthdt; ?>" id="mnthenddt" readonly>
    					<?php

							}

							?>
    				</div>
    				<!-- </div>  -->
    				<label for="unit" class="col-sm-1 col-form-label">Unit:</label>
    				<div class="col-sm-1">

    					<input type="hidden" name="unit" class="form-control unit" value="" id="unit">
    					<input type="text" name="unit_name" style="width:80px" class="form-control required unit_name"
    						value="" id="unit_name" readonly>

    				</div>
    				<label for="storage" class="col-sm-1 col-form-label">Container:</label>
    				<div class="col-sm-1">

    					<input type="text" name="storage" style="width:80px" class="form-control required storage"
    						value="" id="storage" readonly>

    				</div>
    				<label for="qtyperbag" class="col-sm-1 col-form-label">Qty Per Container:</label>
    				<div class="col-sm-1">

    					<input type="text" name="qtyperbag" style="width:80px" class="form-control required qtyperbag"
    						value="" id="qtyperbag" readonly>
    				</div>

    			</div>

    			<div class="form-group row">
    				<label for="stkpnt_id" class="col-sm-1 col-form-label">Stock Point:</label>

    				<div class="col-sm-3">
    					<select name="stkpnt_id" class="form-control sch_cd required" id="stkpnt_id" required>

    						<option value="">Select</option>

    						<?php

								foreach($socdtls as $stkpnt){

							?>

    						<option value="<?php echo $stkpnt->soc_id;?>"><?php echo $stkpnt->soc_name;?></option>

    						<?php

								}

							?>

    					</select>

    				</div>
    				<label for="hsn_code" class="col-sm-1 col-form-label">HSN:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=hsn_code name="hsn_code" class="form-control"
    						readonly />

    				</div>
    				<label for="gst_rt" class="col-sm-1 col-form-label">GST Rate:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=gst_rt name="gst_rt" class="form-control" readonly />

    				</div>
    			</div>
    			<div class="form-header">

    				<h4>Stock Details</h4>

    			</div>
    			<div class="form-group row">

    				<label for="ro_no" class="col-sm-1 col-form-label">RO/DO No:</label>
    				<div class="col-sm-3">
    					<input type="text" style="width:200px" id=ro_no name="ro_no" class="form-control" required />
    				</div>

    				<label for="ro_dt" class="col-sm-1 col-form-label">Ro Date:</label>
    				<div class="col-sm-3">
    					<input type="date" min="" style="width:200px" id=ro_dt name="ro_dt" class="form-control mindate" required />
    				</div>
    				<label for="no_of_days" class="col-sm-1 col-form-label">No Of Days:</label>
    				<div class="col-sm-3">
    					<input type="text" style="width:200px" id=no_of_days name="no_of_days" class="form-control"
    						onchange="endDt()" required />
    				</div>
    				<!-- <label for="due_dt" class="col-sm-1 col-form-label">Due Date:</label>
					<div class="col-sm-3">
					<input type="date" style="width:150px" id=due_dt name="due_dt" class="form-control" required />
					</div> -->
    			</div>

    			<div class="form-group row">
    				<label for="due_dt" class="col-sm-1 col-form-label">Due Date:</label>
    				<div class="col-sm-3">
    					<input type="date" min="" style="width:200px" id=due_dt name="due_dt" class="form-control mindate" required />
    				</div>
    				<label for="delivery_mode" class="col-sm-1 col-form-label">Delivery Mode:</label>
    				<div class="col-sm-3">
    					<select class="form-control" id="delivery_mode" name="delivery_mode" style="width:200px"
    						required>
    						<option value="">Select</option>
    						<option value="1">EX GODOWN</option>
    						<option value="2">EX RAIL </option>
    						<option value="3">BUFFER </option>
    						<option value="4">NON BUFFER</option>
    						<option value="5">FOR-FOL</option>

    					</select>
    				</div>

    				<label for="invoice_no" class="col-sm-1 col-form-label">Invoice No:</label>
    				<div class="col-sm-3">
    					<input type="text" style="width:200px" id=invoice_no name="invoice_no" class="form-control"
    						required />
    				</div>


    			</div>


    			<div class="form-group row">
    				<label for="invoice_dt" class="col-sm-1 col-form-label">Invoice Dt:</label>
    				<div class="col-sm-3">

    					<input type="date" min="" style="width:200px" id=invoice_dt name="invoice_dt" class="form-control mindate"
    						required />
    				</div>
    				<!-- <label for="unit" class="col-sm-1 col-form-label">Unit:</label>
		<div class="col-sm-3">

	<select name="unit" class="form-control required" id="unit" style="width:180px"  required>

<option value="">Select</option>

<?php

	foreach($unitdtls as $unit){

?>

	<option value="<?php echo $unit->id;?>"><?php echo $unit->unit_name;?></option>

<?php

	}

?>     

</select>

					</div> -->
    				<label for="qty" class="col-sm-1 col-form-label">Qty(MT/KG)<br>/Qty(NO):</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:200px" id=qty name="qty" class="form-control" required />

    				</div>

					<label for="qty" class="col-sm-1 col-form-label">Advance Forward No:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:200px" id="receipt_no" name="receipt_no" class="form-control receipt_no" required/>

    				</div>

    				<!-- <div class="form-group row"> -->

    			</div>

    			<div class="form-group row">
    				<label for="no_of_bags" class="col-sm-1 col-form-label">No Of Container:</label>
    				<div class="col-sm-3">

    					<input type="number" style="width:200px" id=no_of_bags name="no_of_bags" class="form-control"
    						value="0" readonly />
    				</div>

    				<input type="hidden" style="width:180px" id=reck_pt_rt name="reck_pt_rt" class="form-control"
    					value="0" />

    				<input type="hidden" style="width:150px" id=reck_pt_n_rt name="reck_pt_n_rt" class="form-control"
    					value="0" />
    				<!-- </div>  -->
    				<label for="trans_dt" class="col-sm-1 col-form-label">*Purchase Date:</label>
    				<div class="col-sm-3">

    					<input type="date" min="" style="width:200px" id=trans_dt name="trans_dt" class="form-control mindate"
    						value="<?php echo set_value('trans_dt'); ?>" />
    				</div>
    			</div>


    			<!-- <div class="form-group row"> -->
    			<!-- <label for="iffco_buf_rt" class="col-sm-1 col-form-label">IFFCO Buffer Rate:</label> -->
    			<div class="col-sm-3">

    				<input type="hidden" style="width:180px" id=iffco_buf_rt name="iffco_buf_rt" class="form-control"
    					value="0" />

    			</div>
    			<!-- <label for="iffco_n_buff_rt" class="col-sm-1 col-form-label">IFFCO Non Buffer Rate:</label> -->
    			<div class="col-sm-3">

    				<input type="hidden" style="width:150px" id=iffco_n_buff_rt name="iffco_n_buff_rt"
    					class="form-control" value="0" />

    			</div>
    			<!-- </div> -->
    			<div class="form-header">

    				<h4>Price Details</h4>

    			</div>
    			<p style="color:red;">*Please check the GST box for gst effect* </p>
    			<!-- <label for="rate" class="col-sm-1 col-form-label">Purchase Rate/ Unit:</label> -->
    			<div class="form-group row">


    				<label for="rate" class="col-sm-1 col-form-label">Purchase Rate/ Unit:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=rate name="rate" class="form-control" required />

    				</div>

    				<label for="base_price" class="col-sm-1 col-form-label">Base Price:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=base_price name="base_price" class="form-control"
    						readonly />

    				</div>
    				<label for="net_amt" class="col-sm-1 col-form-label">Taxable Amt:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=net_amt name="net_amt" class="form-control" />

    				</div>
    			</div>
    			<div class="form-group row">
    				<label for="retlr_margin" class="col-sm-1 col-form-label">Add Retailer margin:</label>
    				<div class="col-sm-2">

    					<input type="text" style="width:150px" id=retlr_margin name="retlr_margin" class="form-control"
    						value="0" />

    				</div>
    				<div class="col-sm-1">
    					<label for="add_ret_margin_flag" style="color:green;">GST</label>
    					<input type="checkbox" id="add_ret_margin_flag" name="add_ret_margin_flag" value="Y"
    						class="checkbox_check">
    					<!-- <label for="add_ret_margin_flag">GST Flag</label><br> -->
    				</div>

    				<label for="spl_rebt" class="col-sm-1 col-form-label">Less Special Rebate:</label>
    				<div class="col-sm-2">

    					<input type="text" style="width:150px" id=spl_rebt name="spl_rebt" class="form-control"
    						value="0" />

    				</div>

    				<div class="col-sm-2">
    					<label for="less_spl_rbt_flag" style="color:green;">GST</label>
    					<input type="checkbox" id="less_spl_rbt_flag" name="less_spl_rbt_flag" value="Y">
    				</div>

    			</div>
    			<div class="form-group row">
    				<label for="adj_amt" class="col-sm-1 col-form-label">Add Adj Amt:</label>
    				<div class="col-sm-2">

    					<input type="text" style="width:150px" id=adj_amt name="adj_amt" class="form-control"
    						value="0" />
    				</div>

    				<div class="col-sm-1">
    					<label for="add_adj_amt_flag" style="color:green;">GST</label>
    					<input type="checkbox" id="add_adj_amt_flag" name="add_adj_amt_flag" value="Y">
    				</div>
    				<label for="less_amt" class="col-sm-1 col-form-label">Less Adj Amt:</label>
    				<div class="col-sm-2">

    					<input type="text" style="width:150px" id=less_amt name="less_amt" class="form-control"
    						value="0" />

    				</div>
    				<div class="col-sm-1">
    					<label for="less_adj_amt_flag" style="color:green;">GST</label>
    					<input type="checkbox" id="less_adj_amt_flag" name="less_adj_amt_flag" value="Y">
    				</div>
    			</div>

    			<div class="form-group row">
    				<label for="trd_mgr" class="col-sm-1 col-form-label">Less Trade margin:</label>
    				<div class="col-sm-2">

    					<input type="text" style="width:150px" id=trd_mgr name="trd_mgr" class="form-control"
    						value="0" />

    				</div>
    				<div class="col-sm-1">
    					<label for="less_trad_margin_flag" style="color:green;">GST</label>
    					<input type="checkbox" id="less_trad_margin_flag" name="less_trad_margin_flag" value="Y">
    				</div>

    				<label for="les_oth_dis" class="col-sm-1 col-form-label">Less Oth discount:</label>
    				<div class="col-sm-2">

    					<input type="text" style="width:150px" id=les_oth_dis name="les_oth_dis" class="form-control"
    						value="0" />

    				</div>
    				<div class="col-sm-1">
    					<label for="less_oth_dis_flag" style="color:green;">GST</label>
    					<input type="checkbox" id="less_oth_dis_flag" name="less_oth_dis_flag" value="Y">
    				</div>
    				<label for="frt_subsidy" class="col-sm-1 col-form-label">Less Freight Subsidy:</label>
    				<div class="col-sm-2">

    					<input type="frt_subsidy" style="width:150px" id=frt_subsidy name="frt_subsidy"
    						class="form-control" value="0" />

    				</div>
    				<div class="col-sm-1">
    					<label for="less_frght_subsdy_flag" style="color:green;">GST</label>
    					<input type="checkbox" id="less_frght_subsdy_flag" name="less_frght_subsdy_flag" value="Y">
    				</div>
    			</div>
    			<div class="form-group row">
    				<label for="cgst" class="col-sm-1 col-form-label">CGST:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=cgst name="cgst" class="form-control" value="0" />
    				</div>

    				<label for="sgst" class="col-sm-1 col-form-label">SGST:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=sgst name="sgst" class="form-control" value="0" />

    				</div>

    			</div>
    			<div class="form-group row">
    				<label for="rbt_add" class="col-sm-1 col-form-label">Rebate Add:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=rbt_add name="rbt_add" class="form-control"
    						value="0" />
    				</div>

    				<label for="rbt_less" class="col-sm-1 col-form-label">Rebate Less:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=rbt_less name="rbt_less" class="form-control"
    						value="0" />
    				</div>
    				<label for="tot_pur_rt" class="col-sm-1 col-form-label" style="color:Blue;">Net Rate/Unit:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=tot_pur_rt name="tot_pur_rt" class="form-control"
    						value="0" />
    				</div>
    			</div>
    			<div class="form-group row">
    				<label for="rnd_of_add" class="col-sm-1 col-form-label">Round Off Add:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=rnd_of_add name="rnd_of_add" class="form-control"
    						value="0" />
    				</div>

    				<label for="rnd_of_less" class="col-sm-1 col-form-label">Round Off Less:</label>
    				<div class="col-sm-3">

    					<input type="text" style="width:150px" id=rnd_of_less name="rnd_of_less" class="form-control"
    						value="0" />
    				</div>
    				<label for="tot_amt" class="col-sm-1 col-form-label">Total Amt:</label>
    				<div class="col-sm-2">

    					<input type="text" style="width:150px" id=tot_amt name="tot_amt" class="form-control" />

    				</div>
    			</div>

    			<div class="form-group row">

    				<div class="col-sm-10">

    					<input type="submit" id="submit" class="btn btn-info" value="Save" />

    				</div>

    			</div>

    		</form>

    	</div>

    </div>

    <script>
    	$(".sch_cd").select2(); // Code For Select Write Option



    	$(document).ready(function () {

    		var i = 0;

    		$('#comp_id').change(function () {

    			$.get(

    				'<?php echo site_url("stock/f_get_product");?>',

    				{

    					comp_id: $(this).val()

    				}

    			).done(function (data) {

    				var string = '<option value="">Select</option>';

    				$.each(JSON.parse(data), function (index, value) {

    					string += '<option value="' + value.prod_id + '">' + value
    						.prod_desc + '</option>'

    				});

    				$('#prod_id').html(string);


    			});


    		});

    	});
    </script>
    <script>
    	$(document).ready(function () {

    		var i = 2;

    		$('#ro_dt').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_salerate");?>', {

    						comp_id: $('#comp_id').val(),
    						prod_id: $('#prod_id').val(),
    						ro_dt: $(this).val(),
    						// frm_dt  : $(this).val(),
    						// to_dt   : $(this).val()
    						//dist_cd: $(this).val(),
    						// dist_cd : $('#dist_cd').val()

    					}

    				)
    				.done(function (data) {

    					console.log(data);
    					var parseData = JSON.parse(data);
    					var rate = parseData.rate;
    					//var gst_no = parseData[0].gst_no;
    					// var comp_add= parseData[0].comp_add;
    					// 	var cin= parseData[0].cin;
    					// 	$('#gst_no').val(gst_no);
    					// 	$('#comp_add').val(comp_add);
    					// 	$('#cin').val(cin); 
    					$('#govt_sale_rt').val(rate);
    					var govtrate = 0;
    					// alert($govtrate);
    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var i = 2;

    		$('#comp_id').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_company");?>', {

    						comp_id: $(this).val(),
    						//dist_cd: $(this).val(),
    						// dist_cd : $('#dist_cd').val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);

    					var gst_no = parseData[0].gst_no;
    					var comp_add = parseData[0].comp_add;
    					var cin = parseData[0].cin;
    					$('#gst_no').val(gst_no);
    					$('#comp_add').val(comp_add);
    					$('#cin').val(cin);
    					// $('#hsn_code').val(hsn_code);
    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var i = 2;

    		$('#prod_id').change(function () {

    			// $('.unit').index(this)).val('');
    			// $('.unit_name').index(this)).val('');


    			$.get(

    					'<?php echo site_url("stock/f_get_hsn");?>', {

    						prod_id: $(this).val(),
    						//dist_cd: $(this).val(),
    						// dist_cd : $('#dist_cd').val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);

    					var hsn_code = parseData[0].hsn_code;
    					var gst_rt = parseData[0].gst_rt;
    					var unit_id = parseData[0].id;
    					var unit_name = parseData[0].unit_name;
    					var qty_per_bag = parseData[0].qty_per_bag;
    					var storage = parseData[0].storage;
    					$('#hsn_code').val(hsn_code);
    					$('#gst_rt').val(gst_rt);
    					$('#unit').val(unit_id);
    					$('#unit_name').val(unit_name);
    					if (storage == 'T') {
    						$('#storage').val('Bottle');
    					} else if (storage == 'B') {
    						$('#storage').val('BAG');
    					} else {
    						$('#storage').val('Bucket');
    					}


    					$('#qtyperbag').val(qty_per_bag);

    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var i = 2;
    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var net_rt = 0.00;
    		$('#rate').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()

    					base_price = parseFloat(base_price).toFixed(2)
    					taxable_amt = base_price

    					gst = (taxable_amt * gst_rt / 100) / 2
    					gst = parseFloat(gst).toFixed(2)
    					tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    					// tot_amt=Math.round(parseFloat(tot_amt))
    					tot_amt = parseFloat(tot_amt).toFixed(2)
    					net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    					//console.log(parseData);
    					//  console.log(parseData[0].qty);
    					// console.log(parseData[0].allot_qty_qnt);
    					console.log(qty);
    					$('#base_price').val(base_price);
    					$('#net_amt').val(taxable_amt);
    					$('#tot_amt').val(tot_amt);
    					$('#retlr_margin').val(0);
    					$('#spl_rebt').val(0);
    					$('#cgst').val(gst);
    					$('#sgst').val(gst);
    					$('#rbt_add').val(0);
    					$('#rbt_less').val(0);
    					$('#rnd_of_add').val(0);
    					$('#rnd_of_less').val(0);
    					$('#adj_amt').val(0);
    					$('#less_amt').val(0);
    					$('#tot_pur_rt').val(net_rt);
    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var i = 2;
    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;

    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var net_rt = 0.00;
    		$('#retlr_margin').change(function () {
    			let row = $(this).closest('tr');
    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)

    					retlr_margin = $('#retlr_margin').val()
    					spl_rebt = $('#spl_rebt').val()
    					var ckbox = $('#add_ret_margin_flag');

    					// $('input').on('click', function () {
    					$('#add_ret_margin_flag').on('click', function () {
    						if (ckbox.is(':checked')) {
    							// alert('You have Checked it');
    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// alert(gst);
    							$('#net_amt').val(taxable_amt);
    							// $('#cgst').val(gst);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							$('#cgst').val(gst);
    							$('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							$('#adj_amt').val(0);
    							$('#less_amt').val(0);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);
    						} else {
    							// alert('You Un-Checked it');
    							taxable_amt = parseFloat(base_price) + -parseFloat(spl_rebt)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							// $('#cgst').val(gst);
    							// $('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							$('#adj_amt').val(0);
    							$('#less_amt').val(0);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);
    						}
    					});


    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var i = 2;
    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var net_rt = 0.00;
    		$('#spl_rebt').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					spl_rebt = $('#spl_rebt').val()

    					var ckbox2 = $('#less_spl_rbt_flag');

    					//$('#less_spl_rbt_flag').on('click', function () {
    					//alert('hello');
    					// $('input').on('click', function () {

    					if (ckbox2.is(':checked')) {
    						taxable_amt = parseFloat(base_price) + parseFloat(
    							retlr_margin) - parseFloat(spl_rebt)
    						taxable_amt = parseFloat(taxable_amt).toFixed(2)
    						gst = (taxable_amt * gst_rt / 100) / 2
    						gst = parseFloat(gst).toFixed(2)
    						tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    						// tot_amt=Math.round(parseFloat(tot_amt))
    						tot_amt = parseFloat(tot_amt).toFixed(2)
    						// console.log(parseData);
    						// console.log(parseData[0].qty);
    						// console.log(parseData[0].allot_qty_qnt);
    						// console.log(qty);
    						$('#base_price').val(base_price);
    						$('#net_amt').val(taxable_amt);
    						$('#tot_amt').val(tot_amt);
    						$('#retlr_margin').val(retlr_margin);
    						$('#spl_rebt').val(spl_rebt);
    						$('#cgst').val(gst);
    						$('#sgst').val(gst);
    						$('#rbt_add').val(0);
    						$('#rbt_less').val(0);
    						$('#rnd_of_add').val(0);
    						$('#rnd_of_less').val(0);
    						net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    						$('#tot_pur_rt').val(net_rt);
    					} else {
    						taxable_amt = parseFloat(base_price) + parseFloat(retlr_margin)
    						taxable_amt = parseFloat(taxable_amt).toFixed(2)
    						gst = (taxable_amt * gst_rt / 100) / 2
    						gst = parseFloat(gst).toFixed(2)
    						tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    						// tot_amt=Math.round(parseFloat(tot_amt))
    						tot_amt = parseFloat(tot_amt).toFixed(2)
    						// console.log(parseData);
    						// console.log(parseData[0].qty);
    						// console.log(parseData[0].allot_qty_qnt);
    						// console.log(qty);
    						$('#base_price').val(base_price);
    						$('#net_amt').val(taxable_amt);
    						$('#tot_amt').val(tot_amt);
    						$('#retlr_margin').val(retlr_margin);
    						$('#spl_rebt').val(spl_rebt);
    						// $('#cgst').val(gst);
    						// $('#sgst').val(gst);
    						$('#rbt_add').val(0);
    						$('#rbt_less').val(0);
    						$('#rnd_of_add').val(0);
    						$('#rnd_of_less').val(0);
    						net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    						$('#tot_pur_rt').val(net_rt);

    					}
    					//});


    				});

    		});





    		//console.log(data);
    		//var parseData = JSON.parse(data);
    		tot_qty = $('#qty').val()
    		gst_rt = $('#gst_rt').val()
    		base_price = tot_qty * $('#rate').val()
    		base_price = parseFloat(base_price).toFixed(2)
    		retlr_margin = $('#retlr_margin').val()
    		spl_rebt = $('#spl_rebt').val()

    		var ckbox2 = $('#less_spl_rbt_flag');

    		$('#less_spl_rbt_flag').on('click', function () {
    			//alert('hello');
    			// $('input').on('click', function () {

    			if (ckbox2.is(':checked')) {
    				taxable_amt = parseFloat(base_price) + parseFloat(
    					retlr_margin) - parseFloat(spl_rebt)
    				taxable_amt = parseFloat(taxable_amt).toFixed(2)
    				gst = (taxable_amt * gst_rt / 100) / 2
    				gst = parseFloat(gst).toFixed(2)
    				tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    				// tot_amt=Math.round(parseFloat(tot_amt))
    				tot_amt = parseFloat(tot_amt).toFixed(2)
    				// console.log(parseData);
    				// console.log(parseData[0].qty);
    				// console.log(parseData[0].allot_qty_qnt);
    				// console.log(qty);
    				$('#base_price').val(base_price);
    				$('#net_amt').val(taxable_amt);
    				$('#tot_amt').val(tot_amt);
    				$('#retlr_margin').val(retlr_margin);
    				$('#spl_rebt').val(spl_rebt);
    				$('#cgst').val(gst);
    				$('#sgst').val(gst);
    				$('#rbt_add').val(0);
    				$('#rbt_less').val(0);
    				$('#rnd_of_add').val(0);
    				$('#rnd_of_less').val(0);
    				net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    				$('#tot_pur_rt').val(net_rt);
    			} else {
    				taxable_amt = parseFloat(base_price) + parseFloat(retlr_margin)
    				taxable_amt = parseFloat(taxable_amt).toFixed(2)
    				gst = (taxable_amt * gst_rt / 100) / 2
    				gst = parseFloat(gst).toFixed(2)
    				tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    				// tot_amt=Math.round(parseFloat(tot_amt))
    				tot_amt = parseFloat(tot_amt).toFixed(2)
    				// console.log(parseData);
    				// console.log(parseData[0].qty);
    				// console.log(parseData[0].allot_qty_qnt);
    				// console.log(qty);
    				$('#base_price').val(base_price);
    				$('#net_amt').val(taxable_amt);
    				$('#tot_amt').val(tot_amt);
    				$('#retlr_margin').val(retlr_margin);
    				$('#spl_rebt').val(spl_rebt);
    				// $('#cgst').val(gst);
    				// $('#sgst').val(gst);
    				$('#rbt_add').val(0);
    				$('#rbt_less').val(0);
    				$('#rnd_of_add').val(0);
    				$('#rnd_of_less').val(0);
    				net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    				$('#tot_pur_rt').val(net_rt);

    			}
    		});

    	});
    	//});
    </script>


    <script>
    	$(document).ready(function () {

    		var i = 2;
    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var net_rt = 0.00;
    		$('#adj_amt').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					spl_rebt = $('#spl_rebt').val()
    					add_adj_amt = $('#adj_amt').val()
    					less_adj_amt = $('#less_amt').val()

    					var ckbox3 = $('#add_adj_amt_flag');

    					//$('input').on('click', function () {
    					$('#add_adj_amt_flag').on('click', function () {

    						if (ckbox3.is(':checked')) {
    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt) + parseFloat(
    								add_adj_amt) - parseFloat(less_adj_amt)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							$('#cgst').val(gst);
    							$('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							$('#adj_amt').val(add_adj_amt);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);
    						} else {
    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt) - parseFloat(
    								less_adj_amt)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							// $('#cgst').val(gst);
    							// $('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							$('#adj_amt').val(add_adj_amt);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);

    						}
    					});


    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var i = 2;
    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var net_rt = 0.00;
    		$('#less_amt').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					spl_rebt = $('#spl_rebt').val()
    					add_adj_amt = $('#adj_amt').val()
    					less_adj_amt = $('#less_amt').val()
    					var ckbox4 = $('#less_adj_amt_flag');

    					$('#less_adj_amt_flag').on('click', function () {
    						// $('input').on('click', function () {

    						if (ckbox4.is(':checked')) {
    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt) + parseFloat(
    								add_adj_amt) - parseFloat(less_adj_amt)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							$('#cgst').val(gst);
    							$('#sgst').val(gst);
    							$('#add_adj_amt').val(add_adj_amt);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							$('#less_amt').val(less_adj_amt);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);

    						} else {
    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt) + parseFloat(
    								add_adj_amt)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							// $('#cgst').val(gst);
    							// $('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							$('#add_adj_amt').val(add_adj_amt);
    							$('#less_amt').val(less_adj_amt);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);
    						}
    					});


    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var tot_amt = 0.00;
    		var net_rt = 0.00;

    		$('#rbt_add').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {
    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					spl_rebt = $('#spl_rebt').val()
    					add_adj_amt = $('#adj_amt').val()
    					less_adj_amt = $('#less_amt').val()
    					// $('#rbt_less').val(0);
    					$('#rnd_of_add').val(0);
    					$('#rnd_of_less').val(0);

    					taxable_amt = parseFloat(base_price) + parseFloat(retlr_margin) - parseFloat(
    						spl_rebt) + parseFloat(add_adj_amt) - parseFloat(less_adj_amt)
    					taxable_amt = parseFloat(taxable_amt).toFixed(2)
    					gst = (taxable_amt * gst_rt / 100) / 2
    					gst = parseFloat(gst).toFixed(2)
    					// tot_amt=parseFloat(taxable_amt) + parseFloat(gst) *2
    					rbt_add = $('#rbt_add').val()
    					console.log(rbt_add);
    					// rbt_less =$('#rbt_less').val() 
    					// tot_amt=$('#tot_amt').val() 
    					// tot_amt = taxable_amt  + parseFloat(rbt_add) - parseFloat(rbt_less)
    					// tot_amt = taxable_amt + parseFloat(gst) *2
    					tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2 + parseFloat(rbt_add) -
    						parseFloat(rbt_less)
    					// tot_amt=Math.round(parseFloat(tot_amt))
    					tot_amt = parseFloat(tot_amt).toFixed(2)

    					$('#tot_amt').val(tot_amt);
    					net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    					$('#tot_pur_rt').val(net_rt);

    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var tot_amt = 0.00;
    		var net_rt = 0.00;
    		var net_rt = 0.00;
    		$('#rbt_less').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					spl_rebt = $('#spl_rebt').val()
    					add_adj_amt = $('#adj_amt').val()
    					less_adj_amt = $('#less_amt').val()
    					rbt_add = $('#less_amt').val()
    					// $('#rbt_add').val(0);

    					taxable_amt = parseFloat(base_price) + parseFloat(retlr_margin) - parseFloat(
    						spl_rebt) + parseFloat(add_adj_amt) - parseFloat(less_adj_amt)
    					taxable_amt = parseFloat(taxable_amt).toFixed(2)
    					gst = (taxable_amt * gst_rt / 100) / 2
    					gst = parseFloat(gst).toFixed(2)
    					// tot_amt=parseFloat(taxable_amt) + parseFloat(gst) *2
    					rbt_add = $('#rbt_add').val()
    					console.log(rbt_add);
    					rbt_less = $('#rbt_less').val()
    					$('#rnd_of_add').val(0);
    					$('#rnd_of_less').val(0);
    					// tot_amt=$('#tot_amt').val() 
    					// tot_amt = taxable_amt  + parseFloat(rbt_add) - parseFloat(rbt_less)
    					// tot_amt = taxable_amt + parseFloat(gst) *2
    					tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2 + parseFloat(rbt_add) -
    						parseFloat(rbt_less)
    					// tot_amt=Math.round(parseFloat(tot_amt))
    					tot_amt = parseFloat(tot_amt).toFixed(2)
    					$('#tot_amt').val(tot_amt);
    					net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    					$('#tot_pur_rt').val(net_rt);

    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var tot_amt = 0.00;
    		var net_rt = 0.00;

    		$('#rnd_of_add').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					console.log('hi');
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					less_trad_margin = $('#trd_mgr').val()
    					less_oth_dis = $('#les_oth_dis').val()
    					less_frt_subsidy = $('#frt_subsidy').val()
    					spl_rebt = $('#spl_rebt').val()
    					add_adj_amt = $('#adj_amt').val()
    					less_adj_amt = $('#less_amt').val()
    					rbt_add = $('#less_amt').val()
    					rnd_of_add = $('#rnd_of_add').val()
    					rnd_of_add = parseFloat(rnd_of_add).toFixed(2)
    					rnd_of_less = $('#rnd_of_less').val()
    					// $('#rbt_add').val(0);

    					// taxable_amt= parseFloat(base_price) +  parseFloat(retlr_margin) -parseFloat(spl_rebt)+parseFloat(add_adj_amt)-parseFloat(less_adj_amt)
    					taxable_amt = parseFloat(base_price) + parseFloat(retlr_margin) - parseFloat(
    							spl_rebt) + parseFloat(add_adj_amt) - parseFloat(less_adj_amt) -
    						parseFloat(less_trad_margin) - parseFloat(less_oth_dis) - parseFloat(
    							less_frt_subsidy)
    					taxable_amt = parseFloat(taxable_amt).toFixed(2)
    					gst = (taxable_amt * gst_rt / 100) / 2
    					gst = parseFloat(gst).toFixed(2)
    					// tot_amt=parseFloat(taxable_amt) + parseFloat(gst) *2
    					rbt_add = $('#rbt_add').val()
    					console.log(rbt_add);
    					rbt_less = $('#rbt_less').val()
    					// $('#rnd_of_add').val(0);
    					// $('#rnd_of_less').val(0);
    					// tot_amt=$('#tot_amt').val() 
    					// tot_amt = taxable_amt  + parseFloat(rbt_add) - parseFloat(rbt_less)
    					// tot_amt = taxable_amt + parseFloat(gst) *2
    					tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2 + parseFloat(rbt_add) -
    						parseFloat(rbt_less) + parseFloat(rnd_of_add) - parseFloat(rnd_of_less)
    					// tot_amt=Math.round(parseFloat(tot_amt))
    					tot_amt = parseFloat(tot_amt).toFixed(2)
    					$('#tot_amt').val(tot_amt);

    					net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    					$('#tot_pur_rt').val(net_rt);
    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		//var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var tot_amt = 0.00;
    		var net_rt = 0.00;
    		$('#rnd_of_less').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					less_trad_margin = $('#trd_mgr').val()
    					less_oth_dis = $('#les_oth_dis').val()
    					less_frt_subsidy = $('#frt_subsidy').val()
    					spl_rebt = $('#spl_rebt').val()
    					add_adj_amt = $('#adj_amt').val()
    					less_adj_amt = $('#less_amt').val()
    					rbt_add = $('#less_amt').val()
    					rnd_of_add = $('#rnd_of_add').val()
    					rnd_of_less = $('#rnd_of_less').val()
    					// $('#rbt_add').val(0);

    					// taxable_amt= parseFloat(base_price) +  parseFloat(retlr_margin) -parseFloat(spl_rebt)+parseFloat(add_adj_amt)-parseFloat(less_adj_amt)
    					tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2 + parseFloat(rbt_add) -
    						parseFloat(rbt_less) + parseFloat(rnd_of_add) - parseFloat(rnd_of_less)
    					taxable_amt = parseFloat(taxable_amt).toFixed(2)
    					gst = (taxable_amt * gst_rt / 100) / 2
    					gst = parseFloat(gst).toFixed(2)
    					// tot_amt=parseFloat(taxable_amt) + parseFloat(gst) *2
    					rbt_add = $('#rbt_add').val()
    					console.log(rbt_add);
    					rbt_less = $('#rbt_less').val()
    					// $('#rnd_of_add').val(0);
    					// $('#rnd_of_less').val(0);
    					// tot_amt=$('#tot_amt').val() 
    					// tot_amt = taxable_amt  + parseFloat(rbt_add) - parseFloat(rbt_less)
    					// tot_amt = taxable_amt + parseFloat(gst) *2
    					tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2 + parseFloat(rbt_add) -
    						parseFloat(rbt_less) + parseFloat(rnd_of_add) - parseFloat(rnd_of_less)
    					// tot_amt=Math.round(parseFloat(tot_amt))
    					tot_amt = parseFloat(tot_amt).toFixed(2);
    					$('#tot_amt').val(tot_amt);
    					net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    					$('#tot_pur_rt').val(net_rt);

    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {
    		$("#ro_dt").change(function () {

    			var ro_dt = $('#ro_dt').val();
    			var sale_rate = $('#govt_sale_rt').val();

    			var d = new Date();
    			var month = d.getMonth() + 1;
    			var day = d.getDate();

    			var output = d.getFullYear() + '-' +
    				(month < 10 ? '0' : '') + month + '-' +
    				(day < 10 ? '0' : '') + day;

    			// console.log(trans_dt,output);

    			if (new Date(output) < new Date(ro_dt)) {
    				alert("Ro Date Can Not Be Greater Than Current Date");
    				//  alert(sale_rate);
    				$('#submit').attr('type', 'buttom');
    				return false;

    			} else {
    				$('#submit').attr('type', 'submit');

    			}

    		})


    	});
    </script>

    <script>
    	$(document).ready(function () {
    		$("#invoice_dt").change(function () {

    			var ro_dt = $('#invoice_dt').val();
    			var d = new Date();
    			var month = d.getMonth() + 1;
    			var day = d.getDate();

    			var output = d.getFullYear() + '-' +
    				(month < 10 ? '0' : '') + month + '-' +
    				(day < 10 ? '0' : '') + day;

    			// console.log(trans_dt,output);

    			if (new Date(output) < new Date(ro_dt)) {
    				alert("invoice Date Can Not Be Greater Than Current Date");
    				$('#submit').attr('type', 'buttom');
    				return false;
    			} else {
    				$('#submit').attr('type', 'submit');
    			}
    		})
    	});
    </script>

    <script>
    	$(document).ready(function () {
    		// $("#due_dt").change(function () {

    		// 	var ro_dt = $('#due_dt').val();
    		// 	var d = new Date();
    		// 	var month = d.getMonth() + 1;
    		// 	var day = d.getDate();

    		// 	var output = d.getFullYear() + '-' +
    		// 		(month < 10 ? '0' : '') + month + '-' +
    		// 		(day < 10 ? '0' : '') + day;

    		// 	// console.log(trans_dt,output);
    		// 	if (new Date(output) > new Date(ro_dt)) {
    		// 		alert("Due Date Can Not Be Less Than Current Date");
    		// 		$('#submit').attr('type', 'buttom');
    		// 		return false;
    		// 	} else {
    		// 		$('#submit').attr('type', 'submit');
    		// 	}
    		// })
    	});
    </script>

    <script>
    	$(document).ready(function () {
    		$("#tot_amt").change(function () {

    			var tot_amt = $('#tot_amt').val();

    			// var d = new Date();
    			// var month = d.getMonth()+1;
    			// var day = d.getDate();
    			// var output = d.getFullYear() + '-' +
    			// (month<10 ? '0' : '') + month + '-' +
    			// (day<10 ? '0' : '') + day;
    			// console.log(trans_dt,output);

    			if (tot_amt = 0) {
    				alert("Total Amount can't be Zero");
    				$('#submit').attr('type', 'buttom');
    				return false;
    			} else {
    				$('#submit').attr('type', 'submit');
    			}
    		})
    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var i = 2;

    		$('#qty').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_qty_per_bag");?>', {

    						prod_id: $('#prod_id').val()
    						//dist_cd: $(this).val(),
    						// dist_cd : $('#dist_cd').val()

    					}

    				)
    				.done(function (data) {

    					// console.log(data);
    					var parseData = JSON.parse(data);
    					var qty = $('#qty').val();
    					var unit = $('#unit').val();
    					console.log(unit);
    					var unitqty = 0.00;
    					var no_of_bags = 0.00;
    					var qtyperbag = $('#qtyperbag').val();
    					// var qty_per_bag = parseData[0].qty_per_bag;
    					console.log(qtyperbag);
    					if (unit == 1) {
    						no_of_bags = (qty * 1000) / qtyperbag;
    						console.log(qtyperbag);
    					} else if (unit == 2) {
    						no_of_bags = qty / qtyperbag;
    						console.log(qtyperbag);
    					} else {
    						no_of_bags = qty;
    					}



    					$('#no_of_bags').val(no_of_bags);

    				});

    		});

    	});
    </script>

    <script>
    	function myFunction() {
    		var salerate = $('#govt_sale_rt').val();
    		//  alert(salerate);
    		if (salerate == 0) {
    			alert('Sale Rate Cant not zero');
    			$('#submit').attr('type', 'buttom');
    			event.preventDefault();
    		} else {
    			$('#submit').attr('type', 'submit');
    		}
    	}
    </script>


    <!-- <script>
var d = new Date();
d.setDate(d.getDate() + 50);
document.getElementById("demo").innerHTML = d;
</script> -->

    <script>
    	function endDt() {
    		var frmDt = document.getElementById("ro_dt").value;
    		var days = document.getElementById("no_of_days").value;
    		var day;

    		var year;

    		days = (days - 1);

    		toDt = new Date(frmDt);

    		toDt.setDate(toDt.getDate() + days);

    		var dd = toDt.getDate();
    		var mm = toDt.getMonth() + 1;
    		var y = toDt.getFullYear();

    		if (dd <= 9) {
    			dd = '0' + dd;
    		} else {
    			dd = dd;
    		}

    		if (mm <= 9) {
    			mm = '0' + mm;
    		} else {
    			mm = mm;
    		}

    		var format = y + '-' + mm + '-' + dd;

    		document.getElementById("due_dt").value = format;

    	}
    </script>
    <script>
    	$(document).ready(function () {

    		var i = 2;
    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var less_trad_margin = 0.00;
    		var net_rt = 0.00;
    		$('#trd_mgr').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					spl_rebt = $('#spl_rebt').val()
    					add_adj_amt = $('#adj_amt').val()
    					less_adj_amt = $('#less_amt').val()
    					less_trad_margin = $('#trd_mgr').val()
    					var ckbox5 = $('#less_trad_margin_flag');

    					//$('input').on('click', function () {
    					$('#less_trad_margin_flag').on('click', function () {

    						if (ckbox5.is(':checked')) {
    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt) + parseFloat(
    								add_adj_amt) - parseFloat(less_adj_amt) - parseFloat(
    								less_trad_margin)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							tot_amt = parseFloat(tot_amt)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							$('#cgst').val(gst);
    							$('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);
    						} else {

    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt) + parseFloat(
    								add_adj_amt) - parseFloat(less_adj_amt)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							// $('#cgst').val(gst);
    							// $('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							//$('#rnd_of_add').val(0);
    							//$('#rnd_of_less').val(0);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);
    						}
    					});

    				});

    		});

    	});
    </script>

    <script>
    	$(document).ready(function () {

    		var i = 2;
    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var less_trad_margin = 0.00;
    		var less_oth_dis = 0.00;
    		var net_rt = 0.00;

    		$('#les_oth_dis').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					spl_rebt = $('#spl_rebt').val()
    					add_adj_amt = $('#adj_amt').val()
    					less_adj_amt = $('#less_amt').val()
    					less_trad_margin = $('#trd_mgr').val()
    					less_oth_dis = $('#les_oth_dis').val()
    					var ckbox6 = $('#less_oth_dis_flag');

    					//$('input').on('click', function () {
    					$('#less_oth_dis_flag').on('click', function () {

    						if (ckbox6.is(':checked')) {

    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt) + parseFloat(
    								add_adj_amt) - parseFloat(less_adj_amt) - parseFloat(
    								less_trad_margin) - parseFloat(less_oth_dis)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							$('#cgst').val(gst);
    							$('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);

    						} else {

    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt) + parseFloat(
    								add_adj_amt) - parseFloat(less_adj_amt) - parseFloat(
    								less_trad_margin)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							// $('#cgst').val(gst);
    							// $('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);

    						}
    					});



    				});

    		});

    	});
    </script>
    <script>
    	$(document).ready(function () {

    		var i = 2;
    		var tot_qty = 0.00;
    		var base_price = 0.00;
    		var gst_rt = 0.00;
    		var gst = 0.00;
    		var spl_rebt = 0.00;
    		var retlr_margin = 0.00;
    		var tot_amt = 0.00;
    		var rbt_add = 0.00;
    		var rbt_less = 0.00;
    		var rnd_of_add = 0.00;
    		var rnd_of_less = 0.00;
    		var add_adj_amt = 0.00;
    		var less_adj_amt = 0.00;
    		var less_trad_margin = 0.00;
    		var less_oth_dis = 0.00;
    		var less_frt_subsidy = 0.00;
    		var net_rt = 0.00;
    		$('#frt_subsidy').change(function () {

    			$.get(

    					'<?php echo site_url("stock/f_get_ro");?>', {

    						rate: $(this).val()

    					}

    				)
    				.done(function (data) {

    					//console.log(data);
    					var parseData = JSON.parse(data);
    					tot_qty = $('#qty').val()
    					gst_rt = $('#gst_rt').val()
    					base_price = tot_qty * $('#rate').val()
    					base_price = parseFloat(base_price).toFixed(2)
    					retlr_margin = $('#retlr_margin').val()
    					spl_rebt = $('#spl_rebt').val()
    					add_adj_amt = $('#adj_amt').val()
    					less_adj_amt = $('#less_amt').val()
    					less_trad_margin = $('#trd_mgr').val()
    					less_oth_dis = $('#les_oth_dis').val()
    					less_frt_subsidy = $('#frt_subsidy').val()
    					var ckbox7 = $('#less_frght_subsdy_flag');

    					// $('#').on('click', function () {
    					$('#less_frght_subsdy_flag').on('click', function () {

    						if (ckbox7.is(':checked')) {
    							taxable_amt = parseFloat(base_price) + parseFloat(
    									retlr_margin) - parseFloat(spl_rebt) + parseFloat(
    									add_adj_amt) - parseFloat(less_adj_amt) - parseFloat(
    									less_trad_margin) - parseFloat(less_oth_dis) -
    								parseFloat(less_frt_subsidy)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							$('#cgst').val(gst);
    							$('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);

    						} else {
    							taxable_amt = parseFloat(base_price) + parseFloat(
    								retlr_margin) - parseFloat(spl_rebt) + parseFloat(
    								add_adj_amt) - parseFloat(less_adj_amt) - parseFloat(
    								less_trad_margin) - parseFloat(less_oth_dis)
    							taxable_amt = parseFloat(taxable_amt).toFixed(2)
    							gst = (taxable_amt * gst_rt / 100) / 2
    							gst = parseFloat(gst).toFixed(2)
    							tot_amt = parseFloat(taxable_amt) + parseFloat(gst) * 2
    							// tot_amt=Math.round(parseFloat(tot_amt))
    							tot_amt = parseFloat(tot_amt).toFixed(2)
    							// console.log(parseData);
    							// console.log(parseData[0].qty);
    							// console.log(parseData[0].allot_qty_qnt);
    							// console.log(qty);
    							$('#base_price').val(base_price);
    							$('#net_amt').val(taxable_amt);
    							$('#tot_amt').val(tot_amt);
    							$('#retlr_margin').val(retlr_margin);
    							$('#spl_rebt').val(spl_rebt);
    							// $('#cgst').val(gst);
    							// $('#sgst').val(gst);
    							$('#rbt_add').val(0);
    							$('#rbt_less').val(0);
    							$('#rnd_of_add').val(0);
    							$('#rnd_of_less').val(0);
    							net_rt = parseFloat(tot_amt / tot_qty).toFixed(3);
    							$('#tot_pur_rt').val(net_rt);

    						}
    					});


    				});

    		});

    	});
    </script>
    <script>
    	$(document).ready(function () {

    		var today = new Date();
    		var curr_mnth = ("0" + (today.getMonth() + 1)).slice(-2);
    		var sdate = $('#mnthenddt').val();
    		//alert(sdate);
    		$('#trans_dt').prop('min', sdate);


    	});


		$('.mindate').attr( 'min','<?=$date->end_yr ?>-<?php $month=$date->end_mnth+1; if($month==13){echo sprintf("%02d",1);}else{echo sprintf("%02d",$month);}?>-01');
		$(document).ready(function () {
			$('.adv_status').change(function () {
				var data = $(this).val();
				if(data == 'N'){
					$('#receipt_no').removeAttr('required');
					$('#receipt_no').attr("readonly", true);
				}else{
					$('#receipt_no').attr('required', 'true');
					$('#receipt_no').attr("readonly", false); 
				}
	         })	
		})
		$('#receipt_no').change(function () {
        $.get(
		'<?php echo site_url("stock/f_advfwdstatus");?>', {

			advfwdid: $(this).val()
		   }
	      ).done(function (data) {

			if(data == 0){
				alert('Advance to Company not yet has been done.');
				$('#submit').attr('type', 'button');
			}else{
				$('#submit').attr('type', 'submit');
			}

	     })
        })

    </script>