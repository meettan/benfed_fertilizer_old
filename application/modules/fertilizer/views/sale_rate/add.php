
    <div class="wraper">      
    	<div class="col-md-2 container">
           </div> 
		<div class="col-md-8 container form-wraper">

			<form method="POST" action="<?php echo site_url("fertilizer/salerateAdd") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Add Sale Rate</h4>
				
				</div>
				<div class="form-group row">
					

						<label for="comp_id" class="col-sm-2 col-form-label">Company :</label>
						<div class="col-sm-4">

							<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
							<select name="comp_id" class="form-control required" id="comp_id" required>

						<option value="">Select</option>

						<?php

							foreach($compdtls as $comp){

						?>

							<option value="<?php echo $comp->comp_id;?>"><?php echo $comp->comp_name;?></option>

						<?php

							}

						?>     

						</select>

						</div>


							<label for="catg_id" class="col-sm-2 col-form-label">Category :</label>
						<div class="col-sm-4">

							<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
							<select name="catg_id" class="form-control required" id="catg_id" required>

							<option value="">Select</option>

							  

							</select>

						</div>
						
					</div>

					<div class="form-group row">


						<label for="prod_id" class="col-sm-2 col-form-label">Product :</label>
						<div class="col-sm-4">

							<!-- <input type="text" id=comp_id name="comp_id" class="form-control"  /> -->
							<select name="prod_id" class="form-control sch_cd required" id="prod_id" required>

							<option value="">Select</option>

							  

							</select>

						</div>
				
				   </div>

				   <div class="form-group row">
						<label for="unit" class="col-sm-2 col-form-label">Unit:</label>
						<div class="col-sm-4">

							<input type="text" id="unit" name="unit" class="form-control" readonly />
							<!-- <select name="unit" class="form-control required" id="unit" required>

							<option value="">Select</option>
							

								<?php

									foreach($unit as $unt){

								?>

									<option value="<?php echo $unt->id;?>"><?php echo $unt->unit_name;?></option>

								<?php

									}

								?> 

							</select> -->
						</div>
						<label for="storage" class="col-sm-2 col-form-storage">Storage:</label>
						<div class="col-sm-4">

							<input type="text" id="storage" name="storage" class="form-control" readonly />

						</div>
				   </div>
					
					<div class="form-group row">
						<label for="frm_dt" class="col-sm-2 col-form-frm_dt">From Date:</label>
						<div class="col-sm-4">

							<input type="date" id=frm_dt name="frm_dt" class="form-control"  required />

						</div>
						<!-- <div class="form-group row"> -->
						
					
					</div>

					<div class="form-group row">
						<label for="sp_mt" class="col-sm-2 col-form-label">Sale Price Per Unit Without GST:</label>
						<div class="col-sm-4">

							<input type="text" id="sp_mt" name="sp_mt" class="form-control" value=0 />

						</div>
						<label for="sp_bag" class="col-sm-2 col-form-label">Sale Price Per Container Without GST:</label>
						<div class="col-sm-4">

							<input type="text" id="sp_bag" name="sp_bag" class="form-control" value=0 />

						</div>
				   </div>
				   <div class="form-group row">
				   <label for="sale_rtgst" class="col-sm-2 col-form-label">Sale Price Per Unit With GST:</label>
						<div class="col-sm-4">

							<input type="text" id=sale_rtgst name="sale_rtgst" class="form-control" value=0  />

						</div>
						<label for="sp_bag_gst" class="col-sm-2 col-form-label">Sales Price Per <br>Container With GST:</label>
					<div class="col-sm-4">
				    <input type="text" id="sp_bag_gst" name="sp_bag_gst" class="form-control" value=0  />
					</div>
						</div>
				   	<div class="form-group row">

					<label for="sp_govt" class="col-sm-2 col-form-label">Govt. Sale Rate:</label>
					<div class="col-sm-4">
					<input type="text" id="sp_govt" name="sp_govt" class="form-control" value=0 required />
					</div>
					<label for="mrp_gst" class="col-sm-2 col-form-label">MRP With GST:</label>
						<div class="col-sm-4">

							<input type="text" id=mrp_gst name="mrp_gst" class="form-control" value=0  />

						</div>
					
					
				   </div>

					<div class="form-group row">
						<label for="salerate" class="col-sm-2 col-form-label">District:</label><div class="col-sm-10">
							<label for="salerate" class="col-form-label">North Bengal</label>
						</div>
                   <label for="salerate" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
												<!-- <div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="327">DAR
					</div> -->
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="328">JPG
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="329">COOH
					</div>

						<!-- <div class="col-sm-2">
							

					     <input type="checkbox" name="district[]" id="checkItem" value="346">ALPD
					    </div> -->
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="330">NDNJ
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="331">SDNJ
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="332">MLD
					</div>
											
               </div>
				<label for="salerate" class="col-sm-2 col-form-label"></label><div class="col-sm-10">
							<label for="salerate" class="col-form-label">South Bengal</label>
						</div>
						<label for="salerate" class="col-sm-2 col-form-label"></label><div class="col-sm-10">
							<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="333">MUR
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="334">BRH
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="335">BDN
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="336">NDA
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="337">N24
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="338">HOG
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="339">BNK
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="340">PUR
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="341">HWH
					</div>
														<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="343">S24
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="344">WMDN
					</div>
											<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="345">EMDN
					</div>
										
											<!-- <div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="347">WBDN
					</div> -->
					<div class="col-sm-2">
							

					<input type="checkbox" name="district[]" id="checkItem" value="348">JHG
					</div>
					  
						</div>
				
					</div>
                <div class="form-group row">
						<div class="col-sm-2"></div>
						<div class="col-sm-10">
						<div class="col-sm-2"><input type="checkbox" id="checkAll"> Check All </div>
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

    var i = 0;

    $('#comp_id').change(function(){

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


    });

     $('#comp_id').change(function(){

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


    });

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

		   var per_bag_price =Math.round(parseFloat(sp_mt/(1000/bag)));

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

		// var unit = parseData[0].unit_name;
// 		var string = '<option value="">Select</option>';

// $.each(JSON.parse(data), function( index, value ) {

// 	string += '<option value="' + value.id + '">' + value.unit_name + '</option>'

// });

// $('#unit').html(string);

		var storage = '';

		if(parseData[0].storage = 'B'){

			storage = 'Bag';

		}else if(parseData[0].storage = 'T'){

			storage = 'Bucket';

		}else if(parseData[0].storage = 'P'){

			storage = 'Packet';
		}

			// $('#unit').val(unit);
		

			$('#storage').val(storage);
			$('#unit').val(parseData[0].unit_name);


		});


	});

});
</script> 

