<div class="wraper">      
            
	<div class="col-md-6 container form-wraper">

		<form method="POST" id="product" action="<?php echo site_url("adv/editadv") ?>" >

			<div class="form-header">
			
				<h4>Edit Advance</h4>
			
			</div>

            <div class="form-group row">
                <label for="receipt_no" class="col-sm-2 col-form-label">Receipt No.:</label>

                <div class="col-sm-10">

                    <input type="text" id=receipt_no name="receipt_no" class="form-control"   
                        value="<?php echo $advDtls->receipt_no; ?>" readonly />

                </div>

            </div>

            <div class="form-group row">
				<label for="society" class="col-sm-2 col-form-label">Society:</label>
				<div class="col-sm-4">

					<select name="society" class="form-control sch_cd required" id="society" required>

						<option value="">Select Society</option>

                        <?php

                            foreach($societyDtls as $val){

                        ?>

                        <option value="<?php echo $val->soc_id;?>"<?php echo($advDtls->soc_id==$val->soc_id)?'selected':'';?>><?php echo $val->soc_name;?></option>

                        <?php

                            }

                        ?>     

                    </select>

                </div>

                <label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>

				<div class="col-sm-4">

					<input type="date" id=trans_dt name="trans_dt" class="form-control" 
                           value="<?php echo $advDtls->trans_dt; ?>" required />

				</div>

            </div>

            <div class="form-group row">
            <div></div>
            </div>

			<div class="form-group row">
				<label for="trans_type" class="col-sm-2 col-form-label">Transaction Type:</label>
				<div class="col-sm-4">

                    <select name="trans_type" class="form-control required" id="trans_type">

                        <option value="I"<?php echo($advDtls->trans_type=='I')?'selected':'';?>>Deposit</option>

                        <option value="O"<?php echo($advDtls->trans_type=='O')? 'selected' : '';?>>Adjustment</option>

                    </select>

				</div>

				<label for="adv_amt" class="col-sm-2 col-form-label">Amount:</label>
				<div class="col-sm-4">

					<input type="text" id=adv_amt name="adv_amt" class="form-control required" 
                           value="<?php echo $advDtls->adv_amt; ?>" required/>

				</div>
			</div>

            <div class="form-group row">
				<label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
				<div class="col-sm-10">

                    <textarea id=remarks name="remarks" class="form-control"><?php echo $advDtls->remarks; ?></textarea>
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