	<div class="wraper">      
            
		<div class="col-md-6 container form-wraper">

			<form method="POST" action="<?php echo site_url("finance/f_trial");?>">
				
				<div class="form-header">
							
					<h4>Trial Balance</h4>
				
				</div>

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>

					<div class="col-sm-10">

						<input type="date" class="form-control" name=ip_date value="<?php echo $_SESSION['sys_date'] ?>" />

					</div>

				</div>

				<div class="form-group row">

					<div class="col-sm-10">

						<input type="submit" name="submit" value="Save" class="btn btn-info" />

					</div>

				</div>

			</form>

		</div>

	</div>


