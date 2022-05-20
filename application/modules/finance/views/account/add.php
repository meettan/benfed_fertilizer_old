<script>
	function valid_data(){
		var x = document.getElementById('sch_cd').value;
		
	        if(x.trim()=='0'){
			alert("Please Supply A Valid Schedule");
		        return false;
		}

		var y = document.getElementById('ac_type').value;
		
		if(y.trim()==''){
			alert('Please Supply Name of A/c Head');
			return false;
		}
		
		var z = document.getElementById('ac_flg').value;

                if(z.trim()=='0'){
                        alert('Please Supply A/c Flag');
                        return false;
                }else{
                        return true;
		}       
	}
</script>

    <div class="wraper">      

	<div class="col-md-6 container form-wraper">

		
		<form method="POST" action="<?php echo site_url("finance/accountAdd");?> "onsubmit="return valid_data()" >

			<div class="form-header">
                
				<h4>Add Account Head</h4>
			
			</div>

			<div class="form-group row">

				<label for="schedule_cd" class="col-sm-2 col-form-label">Schedule Type</label>

				<div class="col-sm-10">

					<select class="form-control" id="sch_cd" name="schedule_cd" >
						
						<option value='0'>Select</option>

						<?php
							foreach($row as $value){
								echo "<option value=".$value->schedule_code.">".$value->schedule_type."</option>"; 
							}	
						?>
					</select>

				</div>

			</div>

			<div class="form-group row">

				<label for="ac_type" class="col-sm-2 col-form-label">A/c Head Name</label>

				<div class="col-sm-10">

					<input type="text" class="form-control" id="ac_type" name="acc_type"/>

				</div>

			</div>

			<div class="form-group row">

				<label for="ac_flg" class="col-sm-2 col-form-label">A/c Head Type</label>

				<div class="col-sm-10">

					<select class="form-control" id="ac_flg" name="acc_flag">
						<option value="0">Select</option>
						<option value='B'>Balance Sheet</option>
						<option value='P'>Profit/Loss</option>
					</select>

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

		$( "#sch_cd" ).select2();

	</script>
