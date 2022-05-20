<div class="wraper">      
            
	<div class="col-md-6 container form-wraper">

		<form method="POST" action="<?php echo site_url("fertilizer/crNoteCatgAdd") ?>">

			<div class="form-header">
			
				<h4>Add Category</h4>
			
			</div>

			<div class="form-group row">

				<label for="unit_name" class="col-sm-3 col-form-label">Category Name:</label>

				<div class="col-sm-9">

					<input type="text" id=catg_name name="catg_name" class="form-control" required />

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

