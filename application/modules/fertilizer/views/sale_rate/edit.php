
    <div class="wraper">      
    	<div class="col-md-2 container">
           </div> 
		<div class="col-md-8 container form-wraper">

			<form method="POST" action="<?php echo site_url("fertilizer/editsalerate") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Edit Sale Rate </h4>
				
				</div>
				<div class="form-group row">
					
						<label for="comp_id" class="col-sm-2 col-form-label">Company :</label>
						<div class="col-sm-4">
						
						<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
							<select name="comp_id" class="form-control required" id="comp_id" disabled >

						<option value="">Select</option>

						<?php

							foreach($compdtls as $comp){

						?>

							<option value="<?php echo $comp->comp_id;?>" <?php if($comp->comp_id == $schdtls->comp_id){

								echo "selected";
							}?>><?php echo $comp->comp_name;?></option>

						<?php

							}

						?>       

						</select>

						</div>

							<label for="catg_id" class="col-sm-2 col-form-label">Category :</label>
						<div class="col-sm-4">

						 <input type="text" id=catg_id name="catg_id" class="form-control" value="<?=$schdtls->cate_desc?>" readonly />
							 <!-- <select name="catg_id"  class="form-control required" id="catg_id" required> 

							
							<option value="">Select</option>

							<?php

								foreach($catg as $catg){

							?>

								
								<option value="<?php echo $catg->sl_no;?>"  <?php if($schdtls->catg_id==$catg->sl_no) {echo "selected"; }?>><?php echo $catg->cate_desc;?></option>
							<?php

								}

							?>     
                          </select>  -->
						</div>
						
					</div>

					<div class="form-group row">


						<label for="prod_id" class="col-sm-2 col-form-label">Product :</label>
						<div class="col-sm-4">
						<input type="hidden" id=bulk_id name="bulk_id" class="form-control" value="<?=$schdtls->bulk_id?>" readonly/>
						<input type="hidden" id=prod_id name="prod_id" class="form-control" value="<?=$schdtls->prod_id?>" readonly/>
						
						 <input type="text" id=prod_desc name="prod_desc" class="form-control" value="<?=$schdtls->prod_desc?>" readonly/>
							<!-- <select name="prod_id" class="form-control required" id="prod_id" required>

							<option value="">Select</option>

							  

							</select> -->

						</div>
						<label for="unit" class="col-sm-2 col-form-label">Unit :</label>
						<div class="col-sm-4">

						 <!-- <input type="text" id=unit name="unit" class="form-control" value="<?=$schdtls->cate_desc?>" readonly /> -->
							 <select name="unit"  class="form-control required" id="unit" required> 

							
							<option value="">Select</option>

							<?php

								foreach($unit as $unt){

							?>

								
								<option value="<?php echo $unt->id;?>"  <?php if($schdtls->unit==$unt->id) {echo "selected"; }?>><?php echo $unt->unit_name;?></option>
							<?php

								}

							?>     
                          </select> 
						</div>
				
				   </div>
					
					<div class="form-group row">
						<label for="frm_dt" class="col-sm-2 col-form-label">From Date:</label>
						<div class="col-sm-4">

							<input type="date" id=frm_dt name="frm_dt" class="form-control"  value="<?=$schdtls->frm_dt?>"  />

						</div>
							</div>
					<!-- <label for="to_dt" class="col-sm-2 col-form-label">To Date:</label>
					<div class="col-sm-4">


						<input type="date" id=to_dt name="to_dt" class="form-control" value="<?=$schdtls->to_dt?>"   />

					</div> -->
					

					<div class="form-group row">

					<label for="sp_mt" class="col-sm-2 col-form-label">Sale Price Per Unit Without GST:</label>
					<div class="col-sm-4">

						<input type="text" id="sp_mt" name="sp_mt" class="form-control" value="<?=$schdtls->sp_mt?>"  />

					</div>
					<label for="sp_bag" class="col-sm-2 col-form-label">Sale Price Per Container Without GST:</label>
					<div class="col-sm-4">

						<input type="text" id="sp_bag" name="sp_bag" class="form-control" value="<?=$schdtls->sp_bag?>"  />

					</div>
				   </div>

				   <div class="form-group row">
				   <label for="sale_rtgst" class="col-sm-2 col-form-label">Sale Price Per Unit With GST:</label>
						<div class="col-sm-4">

							<input type="text" id=sale_rtgst name="sale_rtgst" class="form-control" value="<?=$schdtls->sale_rtgst?>"  />

						</div>

						<label for="sp_bag_gst" class="col-sm-2 col-form-label">Sales Price Per <br>Container With GST:</label>
					<div class="col-sm-4">
				    <input type="text" id="sp_bag_gst" name="sp_bag_gst" class="form-control" value="<?=$schdtls->sp_bag_gst?>" />
					</div>
				 </div>

				   	<div class="form-group row">
					<label for="sp_govt" class="col-sm-2 col-form-label">Gov Sale rate:</label>
					<div class="col-sm-4">

						<input type="text" id="sp_govt" name="sp_govt" class="form-control" value="<?=$schdtls->sp_govt?>"  />

					</div>
					<label for="mrp_gst" class="col-sm-2 col-form-label">MRP With GST:</label>
						<div class="col-sm-4">

							<input type="text" id=mrp_gst name="mrp_gst" class="form-control" value="<?=$schdtls->mrp_gst?>"  />

						</div>
					</div>
				   <!-- </div> -->
				   <div class="form-group row">
				
						<label for="salerate" class="col-sm-2 col-form-label">District:</label><div class="col-sm-10">
							<label for="salerate" class="col-form-label">North Bengal</label>
						</div>
                    <label for="salerate" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
												<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="327" disabled
					<?php 
					foreach($dist as $dis){
					if (in_array("327",$dis)){
						echo "checked";
					    }
				    }
				    ?> >DAR
					</div>
					<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="328" disabled
					 <?php 
					foreach($dist as $dis){
						if (in_array("328",$dis)){
							echo "checked";
							}
						}
						
						?>>
					JPG
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="329" disabled
					<?php 
					foreach($dist as $dis){
						if (in_array("329",$dis)){
							echo "checked";
							}
						}
						
						?>
					
					
					
					>COOH
					</div>

						<div class="col-sm-2">
							

					     <input type="checkbox" name="district[]" id="checkItem" value="346" disabled
						 <?php 
					foreach($dist as $dis){
						if (in_array("346",$dis)){
							echo "checked";
							}
						}
						
						?>
						 >ALPD
					    </div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="330" disabled
					<?php 
					foreach($dist as $dis){
						if (in_array("330",$dis)){
							echo "checked";
							}
						}
						
						?>
					
					>NDNJ
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="331" disabled
					<?php 
					foreach($dist as $dis){
						if (in_array("331",$dis)){
							echo "checked";
							}
						}
						
						?>
					>SDNJ
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="332" disabled
					<?php 
					foreach($dist as $dis){
						if (in_array("332",$dis)){
							echo "checked";
							}
						}
						
						?>
					
					>MLD
					</div>
											
               </div>
				<label for="salerate" class="col-sm-2 col-form-label"></label><div class="col-sm-10">
							<label for="salerate" class="col-form-label">South Bengal</label>
						</div>
						<label for="salerate" class="col-sm-2 col-form-label"></label><div class="col-sm-10">
							<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="333" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("333",$dis)){
							echo "checked";
							}
						}
						
						?>
					>MUR
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="334" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("334",$dis)){
							echo "checked";
							}
						}
						
						?>
					>BRH
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="335" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("335",$dis)){
							echo "checked";
							}
						}
						
						?>
					>BDN
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="336" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("336",$dis)){
							echo "checked";
							}
						}
						
						?>
					>NDA
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="337" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("337",$dis)){
							echo "checked";
							}
						}
						
						?>
					>N24
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="338" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("338",$dis)){
							echo "checked";
							}
						}
						
						?>
					>HOG
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="339" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("339",$dis)){
							echo "checked";
							}
						}
						
						?>
					>BNK
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="340" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("340",$dis)){
							echo "checked";
							}
						}
						
						?>
					>PUR
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="341" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("341",$dis)){
							echo "checked";
							}
						}
						
						?>
					>HWH
					</div>
														<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="343" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("343",$dis)){
							echo "checked";
							}
						}
						
						?>
					>S24
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="344" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("344",$dis)){
							echo "checked";
							}
						}
						
						?>
					>WMDN
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="345" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("345",$dis)){
							echo "checked";
							}
						}
						
						?>
					>EMDN
					</div>
										
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="347" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("347",$dis)){
							echo "checked";
							}
						}
						
						?>
					>WBDN
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="348" disabled
					
					<?php 
					foreach($dist as $dis){
						if (in_array("348",$dis)){
							echo "checked";
							}
						}
						
						?>
					>JHG
					</div>
					  
						</div>
						<!-- <div class="form-group row"> -->

					<div class="col-sm-10">

						<input type="submit" class="btn btn-info" value="Save" />

					</div>

				</div>
				
					</div>

					<!-- <div class="form-group row">
						<label for="salerate" class="col-sm-2 col-form-label">District:</label>

						<div class="col-sm-4">

						<input type="text" id="sp_govt" name="sp_govt" class="form-control" value="<?=$schdtls->district_name?>" readonly />

					</div> -->
					

						<!-- <div class="col-sm-10">
						<?php

							//foreach($distdtls as $dist){

						?>
						<div class="col-sm-2">
							

					<input type='checkbox' name='district[]' id="checkItem" value='<?php //echo $dist->district_code;?>' /><?php// echo $dist->dist_sort_code;?>

					</div>
					<?php

							//}

						?>  

						<div class="col-sm-2"><input type="checkbox" id="checkAll" > Check All </div> -->
						</div> 

						
					

				
	
			</form>

		</div>	

	</div>

	 <script>

$(document).ready(function(){

    //var i = 0;

    // $('#comp_id').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/f_get_product");?>',

            { 

                comp_id: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.PROD_ID + '">' + value.PROD_DESC + '</option>'

            });

            $('#prod_id').html(string);


          });



     // $('#comp_id').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/f_get_category");?>',

            { 

                comp_id: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.sl_no + '">' + value.cate_desc + '</option>'

            });

            $('#catg_id').html(string);


          });


    // });

});
</script> 
<script>
function DateCheck()
{
  var StartDate= document.getElementById('frm_dt').value;
  var EndDate= document.getElementById('to_dt').value;
  var eDate = new Date(EndDate);
  var sDate = new Date(StartDate);
  if(StartDate!= '' && StartDate!= '' && sDate> eDate)
    {
		
    alert("Please ensure that the To Date is greater than or equal to the From Date.");
	
    $("#to_dt").val('');
	// document.getElementById('to_dt').value
    }
}
$('#checkAll').click(function () {    
     $('input:checkbox').prop('checked', this.checked);    
 });
</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#sp_mt').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/f_get_prod_per_bag");?>',

            { 

                prod_id: $('#prod_id').val()

            }

        ).done(function(data){

          var parseData = JSON.parse(data);

          var bag = parseData[0].qty_per_bag;

           var sp_mt=$('#sp_mt').val(); 

		   var per_bag_price =Math.round(parseFloat(sp_mt/bag));

            $('#sp_bag').val(per_bag_price);


          });


    });

});
</script> 

<script>

$(document).ready(function(){

    var i = 0;

    $('#sp_mt').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/f_get_prod_per_bag");?>',

            { 

                prod_id: $('#prod_id').val()

            }

        ).done(function(data){

          var parseData = JSON.parse(data);

          var bag = parseData[0].qty_per_bag;

           var sp_mt=$('#sp_mt').val(); 

		   var per_bag_price =Math.round(parseFloat(sp_mt/bag));

            $('#sp_bag').val(per_bag_price);


          });


    });

	///////////////
	$('#prod_id').change(function(){

		$.get( 

			'<?php echo site_url("fertilizer/f_get_unit");?>',

			{ 

				prod_id: $('#prod_id').val()

			}

		).done(function(data){

		var parseData = JSON.parse(data);

		var unit = parseData[0].unit_name;

		var storage = '';

		if(parseData[0].storage = 'B'){

			storage = 'Bag';

		}else if(parseData[0].storage = 'T'){

			storage = 'Bucket';

		}else if(parseData[0].storage = 'P'){

			storage = 'Packet';
		}

			$('#unit').val(unit);

			$('#storage').val(storage);


		});


	});

});
</script> 

<!-- <script>
 $.get('<?php echo site_url("fertilizer/f_get_category");?>',

            { 

                comp_id: $('#comp_id').val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.sl_no + '">' + value.cate_desc + '</option>'

            });

            $('#catg_id').html(string);


          });


    });
</script> -->
