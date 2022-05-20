	<div class="wraper">      
            
		<div class="col-md-6 container form-wraper">
	
			<form method="POST" action="<?php echo site_url("finance/f_voucher_report") ?>">

					<div class="form-header">
							
						<h4>Please Supply A Period</h4>
					
					</div>

					<div class="form-group row">

						<label for="start_dt" class="col-sm-2 col-form-label">Start Date:</label>

						<div class="col-sm-5">

							<input type="date" class="form-control" 
							       name="start_dt" value="<?php echo $_SESSION['sys_date'] ?>" 
							/>

						</div>

					</div>

					<div class="form-group row">

						<label for="end_dt" class="col-sm-2 col-form-label">End Date:</label>

						<div class="col-sm-5">

							<input type="date" class="form-control" 
							       name="end_dt" value="<?php echo $_SESSION['sys_date'] ?>"
							 />

						</div>

					</div>	

					<div class="form-group row">

						<div class="col-sm-5">

							<input type="submit" name="submit" value="Ok" class="btn btn-info" />

						</div>

					</div>	

			</form>	

		</div>

	</div>	
