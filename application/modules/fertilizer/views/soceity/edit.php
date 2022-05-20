    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" id="product" action="<?php echo site_url("key/editsoceity");?>" >

                <div class="form-header">
                
                    <h4>Edit Stock Point/Society</h4>
                
                </div>

                <div class="form-group row">

                    <label for="soc_id" class="col-sm-2 col-form-label">Society ID:</label>

                    <div class="col-sm-10">

                        <input type="text" name="soc_id" class="form-control required"  
                        value = "<?php echo $schdtls->soc_id; ?>" readonly
                        />
                    </div>

                </div>

               
                <div class="form-group row">

                    <label for="soc_name" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <input type="text" name="soc_name" class="form-control required"  
                            value = "<?php echo $schdtls->soc_name; ?>" 
                        />
		            </div>

		        </div>

        
                <div class="form-group row">

                    <label for="soc_add" class="col-sm-2 col-form-label">Address:</label>

                    <div class="col-sm-10">

                        <textarea name="soc_add" class="form-control required"><?php echo $schdtls->soc_add; ?></textarea>
                    </div>

                </div>
   
                <div class="form-group row">

                    <label for="gstin" class="col-sm-2 col-form-label">GSTIN:</label>

                        <div class="col-sm-4">

                            <input type="text" name="gstin" class="form-control required"  
                                value = "<?php echo $schdtls->gstin; ?>" 
                            />
                        </div>

                    <label for="mfms" class="col-sm-2 col-form-label">mFMS:</label>

                        <div class="col-sm-4">

                            <input type="text" name="mfms" class="form-control required"  
                                value = "<?php echo $schdtls->mfms; ?>" 
                            />
                        </div>
                </div>

                 
                <div class="form-group row">

                    <label for="ph_no" class="col-sm-2 col-form-label">Ph No.:</label>

                        <div class="col-sm-4">

                            <input type="text" name="ph_no" class="form-control required"  
                                value = "<?php echo $schdtls->ph_no; ?>" 
                            />
                        </div>
                        <label for="pan" class="col-sm-2 col-form-label">PAN:</label>

                        <div class="col-sm-4">
                        <input type="text" name="pan" class="form-control required"  
                                value = "<?php echo $schdtls->pan; ?>" 
                            />
                            </div>

                </div>

                <div class="form-group row">

                    <label for="email" class="col-sm-2 col-form-label">email:</label>

                    <div class="col-sm-10">

                        <input type="text" name="email" class="form-control required"  
                            value = "<?php echo $schdtls->email; ?>" 
                        />
                    </div>

                </div>

                <div class="form-group row">
                    <label for="buffer_flag" id="buffer_flag_label" class="col-sm-2 col-form-label">Buffer Type:</label>

                    <div class="col-sm-10">

                        <select class="form-control required" id="buffer_flag" name="buffer_flag" required>

                            <option value="N" <?php echo ($schdtls->buffer_flag == 'N')? 'selected' : '';?>>Non - Buffer</option>

                            <option value="B" <?php echo ($schdtls->buffer_flag == 'B')? 'selected' : '';?>>Benfed Buffer</option>

                            <option value="I" <?php echo ($schdtls->buffer_flag == 'I')? 'selected' : '';?>>Iffco Buffer</option>
                            
                        </select>

                    </div>

			    </div>

                <div class="form-group row">

                    <label for="stock_point_flag" class="col-sm-2 col-form-label">Stock Point:</label>
                    <div class="col-sm-4">

                        <select class="form-control required" id="stock_point_flag" name="stock_point_flag" required>
                        
                            <option value="Y" <?php echo ($schdtls->stock_point_flag == 'Y')? 'selected' : '';?>>YES</option>

                            <option value="N" <?php echo ($schdtls->stock_point_flag == 'N')? 'selected' : '';?>>No</option>
                        
                        </select>

                    </div>

                    <label for="status" id="status_label" class="col-sm-2 col-form-label">Type:</label>

                    <div class="col-sm-4">

                        <select class="form-control" id="status" name="status" required>
                            
                            <option value="">Select</option>

                            <option value="N" <?php echo ($schdtls->status == 'N')? 'selected' : '';?>>None</option>

                            <option value="O" <?php echo ($schdtls->status == 'O')? 'selected' : '';?>>Own</option>

                            <option value="R" <?php echo ($schdtls->status == 'R')? 'selected' : '';?>>Rented</option>
                            
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