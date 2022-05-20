
<div class="wraper">      
		<div class="col-md-3 container"></div>
	<div class="col-md-6 container form-wraper">

		<form method="POST" action="<?php echo site_url("key/productAdd") ?>" >

			<div class="form-header">
			
				<h4>Add Product</h4>
			
			</div>

			<div class="form-group row">
				<label for="comp_id" class="col-sm-2 col-form-label">Company :</label>
				<div class="col-sm-10">

					<select name="comp_id" class="form-control required" id="comp_id">

						<option value="">Select Company</option>

							<?php

								foreach($compdtls as $comp){

							?>

								<option value="<?php echo $comp->comp_id;?>"><?php echo $comp->comp_name;?></option>

							<?php

							}

							?>     

					</select>

				</div>
				
			</div>

			<div class="form-group row">

				<label for="Prod_type" class="col-sm-2 col-form-label">Type:</label>

				<div class="col-sm-4">

					<select class="form-control required" id="prod_type" name="prod_type"  required>
						
						<option value="">Select Product Type</option>

						<option value="1">Chemical-Fertilizer</option>
						
						<option value="2">Organic-Fertilizer</option>

						<option value="3">Bio-Fertilizer</option>
					
					</select>
				</div>
				

				<label for="mat_state" class="col-sm-2 col-form-label">Material State:</label>

				<div class="col-sm-4">

					<select class="form-control required" id="mat_state" name="mat_state"  required>
						
						<option value="">Select Material State</option>

						<option value="1">Solid</option>
						
						<option value="2">Liquid</option>

						
					
					</select>
				</div>
			</div>

			
			<div class="form-group row">
				
				<label for="prod_desc" class="col-sm-2 col-form-label">Name:</label>

				<div class="col-sm-10">

					<input type="text" id=prod_desc name="prod_desc" class="form-control" required />

				</div>

			</div>

			<div class="form-group row">

				<label for="gst_rt" class="col-sm-2 col-form-label">GST Rate:</label>
				
				<div class="col-sm-10">

					<input type="text" id=gst_rt name="gst_rt" class="form-control" required />

				</div>

			</div>

			<div class="form-group row">

				<label for="hsn_code" class="col-sm-2 col-form-label">HSN:</label>

				<div class="col-sm-10">

					<input type="text" id=hsn_code name="hsn_code" class="form-control" required />

				</div>

			</div>

			<div class="form-group row">

				<label for="unit" class="col-sm-2 col-form-label">Unit:</label>

				<div class="col-sm-4">

					<select name="unit" class="form-control required" id="unit">

						<option value="">Select Unit</option>

							<?php

								foreach($unitdtls as $unit){

							?>

								<option value="<?php echo $unit->id;?>"><?php echo $unit->unit_name;?></option>

							<?php

							}

							?>     

					</select>

				</div>

				<label for="storage" class="col-sm-2 col-form-label">Container:</label>

				<div class="col-sm-4">

					<select class="form-control required" id="storage" name="storage"  required>
						
						<option value="">Select Container</option>

						<option value="B">Bag</option>
						
						<option value="T">Bottle</option>
						<option value="P">Bucket</option>
						
					
					</select>
				</div>

			</div>

			<div class="form-group row">
				<label for="bag" class="col-sm-2 col-form-label">Quantity per Container(KG/ML):</label>

				<div class="col-sm-10">

					<input type="text" id=bag name="bag" class="form-control" required />
				 
				</div>

			</div>

			<div class="form-group row">

				<div class="col-sm-10">

					<input type="submit" class="btn btn-info" value="Save" />

				</div>

			</div>

		</form>

	</div>	

</div>

<script>
	$("#hsn_code").change(function(){
		var hsn=$(this).val();
		$.ajax({
        type:"post",
        url: "<?php echo base_url().'key/checkHsn'; ?>",
		dataType : 'json',
        data:{ hsn:hsn},
        success:function(response){
            if (response == true){
               alert('HSN already exists');
            }  
        }
    });
});
</script>