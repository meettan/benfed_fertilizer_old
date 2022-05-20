<div class="wraper">      
            
	<div class="col-md-6 container form-wraper">

		<form method="POST" id="product" action="<?php echo site_url("adv/advAdd") ?>" >

			<div class="form-header">
			
				<h4>Add Advance</h4>
			
			</div>

            <div class="form-group row">
				<label for="society" class="col-sm-2 col-form-label">Society:</label>
				<div class="col-sm-4">

					<select name="society" class="form-control sch_cd required" id="society" required>

						<option value="">Select Society</option>

                        <?php

                            foreach($societyDtls as $soc){

                        ?>

                        <option value="<?php echo $soc->soc_id;?>"><?php echo $soc->soc_name;?></option>

                        <?php

                            }

                        ?>     

                    </select>

                </div>

                <label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>

				<div class="col-sm-4">

					<input type="date" id=trans_dt name="trans_dt" class="form-control" required />

				</div>

            </div>

            <div class="form-group row">
            <div></div>
            </div>

			<div class="form-group row">
				<label for="trans_type" class="col-sm-2 col-form-label">Transaction Type:</label>
				<div class="col-sm-4">

                    <select name="trans_type" class="form-control required" id="trans_type" >

                        <option value="I">Deposit</option>

                        <!-- <option value="O">Adjustment</option> -->

                    </select>

				</div>

				<label for="adv_amt" class="col-sm-2 col-form-label">Amount:</label>
				<div class="col-sm-4">

					<input type="text" id=adv_amt name="adv_amt" class="form-control required" required/>

				</div>
			</div>
			<div class="form-group row">
			<label for="bank_id" class="col-sm-2 col-form-label">Bank:</label>
			<!-- <input type="text" style="width:200px" id="bank_id" name="bank_id"value=""  class="form-control bank_id"  /> -->
						<div class="col-sm-4">
                     
                        <select name="bank_id" style="width:180px" class="form-control bank_id" id="bank_id" required>
                    <option value="">Select</option>
                    <?php
                       foreach($bnk_dtls as $bnk){
                            ?>
                <option value="<?php echo $bnk->sl_no;?>"><?php echo $bnk->bank_name;?></option>
                <?php    }    ?>     
                </select>
                        </div>
						<label for="ifsc" class="col-sm-2 col-form-label">IFSC :</label>
						<div class="col-sm-4">
                        <input type="text" style="width:180px" id="ifsc" name="ifsc"value=""  class="form-control" readonly />
                        <!-- <input type="hidden" style="width:180px" id="comp_id" name="comp_id"value=""  class="form-control" readonly /> -->
                       
						</div>
			</div>
			<div class="form-group row">
			<label for="ac_no" class="col-sm-2 col-form-label">A/C No:</label>
						<div class="col-sm-3">
                        <input type="text" style="width:200px" id="ac_no" name="ac_no"value=""  class="form-control"  readonly/>
                        </div>
						</div>
            <div class="form-group row">
				<label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
				<div class="col-sm-10">

                    <textarea id=remarks name="remarks" class="form-control"></textarea>
                </div>
            </div>

				<div class="col-sm-10">

					<input type="submit" id="submit" class="btn btn-info" value="Save" />

				</div>

			</div>

		</form>

	</div>	

</div>

<script>
	
	 $(".sch_cd").select2();

</script>
<script>

$(document).ready(function(){

	var i = 2;

	$('#bank_id').change(function(){

		$.get( 

			'<?php echo site_url("adv/f_get_dist_bnk_dtls");?>',
			{ 

				bnk_id: $(this).val(),
				
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			var ac_no = parseData[0].ac_no;
			var ifsc = parseData[0].ifsc;
            $('#ac_no').val(ac_no);
			$('#ifsc').val(ifsc);
           
		});
        

	});

});
</script>