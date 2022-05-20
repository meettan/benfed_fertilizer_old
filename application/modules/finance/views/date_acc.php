  
  <div class="wraper">      
            
    <div class="col-md-6 container form-wraper">
	
			<form method="POST" action="<?php echo site_url("finance/f_ledger_report") ?>">

				<div class="form-header">
									
					<h4>Cashbook Report</h4>
				
				</div>

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">Start Date:</label>

					<div class="col-sm-10">

						<input type="date" class="form-control" name="start_dt" value="<?php echo $_SESSION['sys_date'] ?>" />

					</div>

				</div>

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">End Date:</label>

					<div class="col-sm-10">

						<input type="date" class="form-control" name="end_dt" value="<?php echo $_SESSION['sys_date'] ?>" />

					</div>

				</div>

				<div class="form-group row">

					<label for="trans_dt" class="col-sm-2 col-form-label">A/C Head:</label>

					<div class="col-sm-10">

						<select name="acc_code" class="form-control">

							<option value="0">Select</option>

							<?php

								foreach($row as $value){
								echo "<option value=".$value->acc_code.">".$value->acc_head."</option>";
								} 		
							?>

						</select>

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