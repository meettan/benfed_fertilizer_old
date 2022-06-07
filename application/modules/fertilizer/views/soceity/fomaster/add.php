<div class="wraper">      
            
	<div class="col-md-6 container form-wraper">

		<form method="POST" id="product" action="<?php echo site_url("fomaster-add") ?>" >

			<div class="form-header">
			
				<h4>Add Fo Master</h4>
			
			</div>
			
		

			<div class="form-group row">

				<label for="soc_name" class="col-sm-2 col-form-label">Fo No:</label>

				<div class="col-sm-9">

					<input type="text" id=soc_name name="fono" class="form-control" required />

				</div>

			</div>
			<div class="form-group row">

				<label for="soc_name" class="col-sm-2 col-form-label">Fo Name:</label>

				<div class="col-sm-9">

					<input type="text" id=soc_name name="foname" class="form-control" required />

				</div>

			</div>
			<div class="form-group row">

				<label for="soc_name" class="col-sm-2 col-form-label">Virtual No:</label>

				<div class="col-sm-9">

					<input type="text" id=soc_name name="virtualno" class="form-control" required />

				</div>

			</div>
			<?php if($this->session->userdata('loggedin')['branch_id']==342){?>
			<div class="form-group row">

				<label for="buffer_flag" id="buffer_flag_label" class="col-sm-2 col-form-label">Branch:</label>

				<div class="col-sm-9">

					<select class="form-control required" id="branchId" name="branchId" required>

						<option value="">Select</option>
<?php if(!empty($distDtls)){ foreach ($distDtls as $key) { ?>
						<option value="<?=$key->district_code?>"><?=$key->district_name?></option>
<?php } ?>
						
					</select>

				</div>

			</div>
			<?php }} ?>


			<div class="form-group row">

				<div class="col-sm-10">

					<input type="submit" id="submit" class="btn btn-info" value="Save" />

				</div>

			</div>

		</form>

	</div>	

</div>
