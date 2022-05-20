<div class="wraper">      
            
	<div class="col-md-6 container form-wraper">

		<form method="POST" id="product" action="<?php echo site_url("key/soceityAdd") ?>" >

			<div class="form-header">
			
				<h4>Add Stock Point/Society</h4>
			
			</div>
			
			<div class="form-group row">

				<div class="col-sm-9">

					<input type="hidden" id=soc_Id name="soc_Id" class="form-control"  />

				</div>

			</div>

			<div class="form-group row">

				<label for="soc_name" class="col-sm-2 col-form-label">Name:</label>

				<div class="col-sm-9">

					<input type="text" id=soc_name name="soc_name" class="form-control" required />

				</div>

			</div>

			<div class="form-group row">

				<label for="soc_add" class="col-sm-2 col-form-label">Address:</label>

				<div class="col-sm-9">

					<textarea id=soc_add name="soc_add" class="form-control"  ></textarea>

				</div>

			</div>

			<div class="form-group row">
				<label for="gstin" class="col-sm-2 col-form-label">GSTIN:</label>
				<div class="col-sm-4">

					<input type="text" id=gstin name="gstin" class="form-control"  ></textarea>

				</div>

				<label for="mfms" class="col-sm-1 col-form-label">mFMS:</label>
				<div class="col-sm-4">

					<input type="text" id=mfms name="mfms" class="form-control"  ></textarea>

				</div>
			</div>
				
			<!--<div class="form-group row">
				<label for="district" class="col-sm-2 col-form-label">District :</label>
				<div class="col-sm-9">

					<select name="district" class="form-control required" id="district">

						<option value="">Select Branch</option>

							<?php

								//foreach($distdtls as $dis){

							?>

								<option value="<?php //echo $dis->district_code;?>"><?php //echo $dis->district_name;?></option>

							<?php

								//}

							?>     

					</select>

				</div>

			</div>--->

			<div class="form-group row">
				<label for="ph_no" class="col-sm-2 col-form-label">Ph No:</label>
				<div class="col-sm-4">

					<input type="text" id=ph_no name="ph_no" class="form-control"  />

				</div>
				
				<label for="pan" class="col-sm-1 col-form-label">PAN:</label>
				<div class="col-sm-4">

					<input type="text" id="pan" name="pan" class="form-control" required>

				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">email:</label>
				<div class="col-sm-9">

					<input type="email" id=email name="email" class="form-control"  />

				</div>

			</div>
			
			<div class="form-group row">

				<label for="buffer_flag" id="buffer_flag_label" class="col-sm-2 col-form-label">Buffer Type:</label>

				<div class="col-sm-9">

					<select class="form-control required" id="buffer_flag" name="buffer_flag" required>

						<option value="">Select</option>

						<option value="N">Non-Buffer</option>

						<option value="B">Benfed Buffer</option>

						<option value="I">Iffco Buffer</option>
						
					</select>

				</div>

			</div>

			<div class="form-group row">

				
				<label for="stock_point_flag" class="col-sm-2 col-form-label">Stock Point:</label>
				<div class="col-sm-4">

					<select class="form-control required" id="stock_point_flag" name="stock_point_flag" required>
					
						<option value="">Select</option>

						<option value="Y">Yes</option>

						<option value="N">No</option>
					
					</select>

				</div>

				<label for="status" id="status_label" class="col-sm-1 col-form-label">Type:</label>

				<div class="col-sm-4">

					<select class="form-control" id="status" name="status" required>
						
						<option value="">Select</option>

						<option value="N">None</option>

						<option value="O">Own</option>

						<option value="R">Rented</option>
						
					</select>

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
	$(document).ready(function(){

		$("#stock_point_flag").on('change',function(){

			if ($("#stock_point_flag").val() =='N'){

				$("#status").hide();

				$("#status").val("N");

				$("#status_label").hide();
				
			}else{

				$("#status").show();

				$("#status_label").show();
			}

		});

		$("#product").on('submit',function(){

			if ($("#stock_point_flag").val() =='Y'){

				if($("#status").val() == 'N'){

					alert("Invalid stock point type!");

					return false;
				}else{
				
					return true;
				}
			}

		});
	});
</script>



<script>

$(document).ready(function(){

	var i = 2;

	$('#pan').change(function(){

		$.get( 

			'<?php echo site_url("key/f_get_pan_cnt");?>',
			{ 

				pan: $(this).val(),
				//dist_cd: $(this).val(),
				// dist_cd : $('#dist_cd').val()
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			
			var cnt = parseData[0].cnt;
			
	//  alert(salerate);
	if(cnt>=1){
		alert('PAN already Exists');
		$('#submit').attr('type', 'buttom');
		event.preventDefault();
	}else{
	$('#submit').attr('type', 'submit');
	}
		});

	});

});
</script>
</script>