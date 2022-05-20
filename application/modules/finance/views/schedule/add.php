<script type="text/javascript">
	function valid_data(){
		var x = document.getElementById('sch_type').value;
		if(x.trim()==""){
			alert("Please Supply A Valid Schedule Type");
			return false;
		}else{
			return true;
		}
	}

</script>

    <div class="wraper">      
            
		<div class="col-md-6 container form-wraper">

			<form method="POST" action="<?php echo site_url("finance/ScheduleAdd") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Add Schedule</h4>
				
				</div>

				<div class="form-group row">

					<label for="sch_type" class="col-sm-2 col-form-label">Schedule Name:</label>

					<div class="col-sm-10">

						<input type="text" id=sch_type name="schedule_type" class="form-control" />

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

