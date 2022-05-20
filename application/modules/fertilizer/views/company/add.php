
<div class="wraper">      
		
	<div class="col-md-6 container form-wraper">

		<form method="POST" action="<?php echo site_url("key/companyAdd") ?>" >

			<div class="form-header">
			
				<h4>Add Company</h4>
			
			</div>

			<div class="form-group row">

				<div class="col-sm-9">

					<input type="hidden" id=comp_Id name="comp_Id" class="form-control"  />

				</div>

			</div>

			<div class="form-group row">
				<label for="comp_name" class="col-sm-3 col-form-label">Name:</label>

				<div class="col-sm-9">

					<input type="text" id=comp_name name="comp_name" class="form-control" required />

				</div>
			</div>

			<div class="form-group row">
				<label for="short_name" class="col-sm-3 col-form-label">Abbreviated Name:</label>

				<div class="col-sm-9">

					<input type="text" id=short_name name="short_name" class="form-control"  />

				</div>
			</div>

			<div class="form-group row">
				<label for="comp_add" class="col-sm-3 col-form-label">Address:</label>

				<div class="col-sm-9">

					<textarea  id=comp_add name="comp_add" class="form-control"></textarea>

				</div>
			</div>

			<div class="form-group row">
				<label for="comp_email_id" class="col-sm-3 col-form-label">email:</label>
				<div class="col-sm-9">

					<input type="email" id=comp_email_id name="comp_email_id" class="form-control"  />

				</div>
			</div>

			<div class="form-group row">
				<label for="comp_pn_no" class="col-sm-3 col-form-label">Phone No:</label>
				<div class="col-sm-9">

					<input type="text" id=comp_pn_no name="comp_pn_no" class="form-control"  />

				</div>
			</div>

			<div class="form-group row">
				<label for="gst_no" class="col-sm-3 col-form-label">GSTIN:</label>
				<div class="col-sm-4">

					<input type="text" id=gst_no name="gst_no" class="form-control" required  />

				</div>
				 
				<label for="pan_no" class="col-sm-1 col-form-label">PAN No:</label>
				<div class="col-sm-3">

					<input type="text" style="width:170px;" id=pan_no name="pan_no" class="form-control" required />

				</div>
			</div>
			
			<div class="form-group row">
				<label for="cin" class="col-sm-3 col-form-label">CIN No:</label>
				<div class="col-sm-4">

					<input type="text" id=cin name="cin" class="form-control"  />

				</div>
				<label for="mfms" class="col-sm-1 col-form-label">mFMS Id:</label>
				<div class="col-sm-3">

					<input type="text" style="width:170px;" id=mfms name="mfms" class="form-control"  />

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

