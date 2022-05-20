    <div class="wraper">      

        <div class="col-md-9 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("fertilizer/viewinvoice");?>" >

                <div class="form-header">
                
                    <h4>View RO/ Invoice Entry</h4>
                
                </div>

               
                <!-- <div class="form-group row"> -->

                <div class="form-group row">

<label for="comp_id" class="col-sm-2 col-form-label">Company:</label>

<div class="col-sm-4">

    <input type="text" style="width:200px"  name="comp_id" class="form-control required"  
        value = "<?php echo $compdtls->comp_name; ?>" readonly />
</div>
<label for="gst_no" class="col-sm-2 col-form-label">GSTIN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=gst_no name="gst_no" class="form-control" 
                    value = "<?php echo $compdtls->gst_no; ?>" readonly />

					</div>
</div>

<div class="form-header">
                
				<h4>Product Details </h4>
			
			</div>

            <div class="form-group row">

<label for="prod_id" class="col-sm-2 col-form-label">Product:</label>
<div class="col-sm-4">
<input type="text" style="width:200px"  name="prod_id" class="form-control required"  
        value = "<?php echo $proddtls->prod_desc; ?>" readonly />
</div>
<label for="hsn_code" class="col-sm-2 col-form-label">HSN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=hsn_code name="hsn_code" class="form-control"
                    value = "<?php echo $proddtls->hsn_code; ?>" readonly />

					</div>
</div>

<div class="form-header">
                
				<h4>Price Details</h4>
			
			</div>
                <div class="form-group row">

                <label for="ro_no" class="col-sm-2 col-form-label">Ro No.:</label>

                <div class="col-sm-4">

                    <input type="text" style="width:200px"  name="ro" class="form-control required"  
                        value = "<?php echo $schdtls->ro; ?>" readonly />
                </div>

                <!-- <label for="ro_dt" class="col-sm-2 col-form-label">Ro Date:</label>
                <div class="col-sm-3">
                <input type="text" style="width:200px"  name="ro_dt" class="form-control required"  
                        value = "<?php echo $schdtls->ro_dt; ?>" readonly />
                </div> -->
                <label for="due_dt" class="col-sm-2 col-form-label">Due Date:</label>
                <div class="col-sm-3">
                <input type="text" style="width:200px"  name="due_dt" class="form-control required"  
                        value = "<?php echo $schdtls->due_dt; ?>" readonly />
                </div>
                </div>

                <!-- <div class="form-group row">

                <label for="due_dt" class="col-sm-2 col-form-label">due_dt:</label>

                <div class="col-sm-10">

                    <input type="text" style="width:200px"  name="due_dt" class="form-control required"  
                        value = "<?php echo $schdtls->due_dt; ?>" readonly />
                </div>

                </div> -->

                <div class="form-group row">

                  <label for="invoice_no" class="col-sm-2 col-form-label">Invoice No:</label>

                  <div class="col-sm-4">

                   <input type="text" style="width:200px"  name="invoice_no" class="form-control required"  
                            value = "<?php echo $schdtls->invoice_no; ?>" readonly />
		          </div>

                  <label for="invoice_dt" class="col-sm-2 col-form-label">Invoice Date:</label>

                    <div class="col-sm-3">

                    <input type="text" style="width:200px"   name="invoice_dt" class="form-control required"  
                    value = "<?php echo $schdtls->invoice_dt; ?>" readonly  />

                   </div>
		</div>

      
        <div class="form-group row">

<label for="qty" class="col-sm-2 col-form-label">Qty:</label>

<div class="col-sm-4">

 <input type="text" style="width:200px"  name="qty" class="form-control required"  
          value = "<?php echo $schdtls->qty; ?>" readonly />
</div>


<div class="form-group row">
        <label for="base_price" class="col-sm-2 col-form-label">Base Price:</label>
					<div class="col-sm-2">

						<input type="text" style="width:150px" id=base_price name="base_price" class="form-control"
                        value = "<?php echo $schdtls->base_price; ?>" readonly  />
                       
					</div>
         </div>
</div>

<div class="form-group row">
<label for="retlr_margin" class="col-sm-2 col-form-label">Retailar Margin:</label>
					<div class="col-sm-4">

						<input type="text" style="width:150px" id=retlr_margin name="retlr_margin" class="form-control"
                        value = "<?php echo $schdtls->retlr_margin; ?>" readonly  />
                       
					</div>

        <label for="spl_rebt" class="col-sm-2 col-form-label">Special Rebate:</label>
					<div class="col-sm-2">

						<input type="text" style="width:150px" id=spl_rebt name="spl_rebt" class="form-control"
                        value = "<?php echo $schdtls->spl_rebt; ?>" readonly  />
                       
				
         </div>
         </div>

         <div class="form-group row">
        <label for="net_amt" class="col-sm-2 col-form-label">Taxable Price:</label>
					<div class="col-sm-2">

						<input type="text" style="width:150px" id=net_amt name="net_amt" class="form-control"
                        value = "<?php echo $schdtls->base_price; ?>" readonly  />
                       
				
         </div>
         </div>
         
         <div class="form-group row">
        <label for="cgst" class="col-sm-2 col-form-label">CGST:</label>
					<div class="col-sm-4">

						<input type="text" style="width:150px" id=cgst name="cgst" class="form-control"
                        value = "<?php echo $schdtls->cgst; ?>" readonly  />
                       
					</div>
                    <label for="sgst" class="col-sm-2 col-form-label">SGST:</label>
					<div class="col-sm-2">

						<input type="text" style="width:150px" id=sgst name="sgst" class="form-control"
                        value = "<?php echo $schdtls->sgst; ?>" readonly  />
                       
					</div>
         </div>
         <div class="form-group row">
        <label for="rbt_add" class="col-sm-2 col-form-label">Reate Add:</label>
					<div class="col-sm-4">

						<input type="text" style="width:150px" id=rbt_add name="rbt_add" class="form-control"
                        value = "<?php echo $schdtls->rbt_add; ?>" readonly  />
                       
					</div>
                    <label for="rbt_less" class="col-sm-2 col-form-label">Reate Less:</label>
					<div class="col-sm-2">

						<input type="text" style="width:150px" id=rbt_less name="rbt_less" class="form-control"
                        value = "<?php echo $schdtls->rbt_less; ?>" readonly  />
                       
					</div>
         </div>
         <div class="form-group row">
        <label for="rnd_of_add" class="col-sm-2 col-form-label">Round Of Add:</label>
					<div class="col-sm-4">

						<input type="text" style="width:150px" id=rnd_of_add name="rnd_of_add" class="form-control"
                        value = "<?php echo $schdtls->rnd_of_add; ?>" readonly  />
                       
					</div>
                    <label for="rnd_of_less" class="col-sm-2 col-form-label">Round Of Less:</label>
					<div class="col-sm-2">

						<input type="text" style="width:150px" id=rnd_of_less name="rnd_of_less" class="form-control"
                        value = "<?php echo $schdtls->rnd_of_less; ?>" readonly  />
                       
					</div>
         </div>
         <div class="form-group row">
        <label for="tot_amt" class="col-sm-2 col-form-label">Total Amount:</label>
					<div class="col-sm-4">

						<input type="text" style="width:150px" id=tot_amt name="tot_amt" class="form-control"
                        value = "<?php echo $schdtls->tot_amt; ?>" readonly  />
                       
					</div>
<!-- <div class="form-group row">

<label for="qty" class="col-sm-2 col-form-label">QTY:</label>

<div class="col-sm-10">

    <input type="text" name="qty" class="form-control required"  
        value = "<?php echo $schdtls->hsn_code; ?>" 
    />
</div>

</div> -->
			
		<div class="form-group row">

                    <div class="col-sm-10">

                        <!-- <input type="button" class="btn btn-info" value="Back" /> -->
                        <a href="<?php echo site_url("fertilizer/invoice_entry");?>" class="btn btn-primary" style="width: 100px;">Back</a></small>
                    </div>

                </div>
 
            </form>

        </div>

    </div>


