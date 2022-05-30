<div class="wraper">      
            
	<div class="col-md-11 container form-wraper">

		<form method="POST" id="form" action="<?php echo site_url("adv/company_advAdd") ?>" >

			<div class="form-header">
				<h4>Add Company Advance</h4>
			</div>

            <div class="form-group row">
				<label for="company" class="col-sm-2 col-form-label">Company:</label>
				<div class="col-sm-4">

					<select name="company" class="form-control sch_cd required" id="company" required>

						<option value="">Select Company</option>
                        <?php
                            foreach($compDtls as $comp){
                        ?>
                        <option value="<?php echo $comp->comp_id;?>"><?php echo $comp->comp_name;?></option>
                        <?php
                            }
                        ?>     
                    </select>
                </div>

                <label for="trans_dt" class="col-sm-2 col-form-label">Date:</label>
				<div class="col-sm-4">

					<input type="date" id=trans_dt name="trans_dt" class="form-control" value="<?=date('Y-m-d')?>" readonly />

				</div>

            </div>
			<div class="form-group row">
				<label for="dist" class="col-sm-2 col-form-label">District:</label>
				<div class="col-sm-4">

					<select name="dist" class="form-control sch_cd required" id="dist" required>

						<option value="">Select District</option>
                        <?php
                            foreach($distDtls as $dist){
                        ?>
                        <option value="<?php echo $dist->district_code;?>"><?php echo $dist->district_name;?></option>
                        <?php
                            }
                        ?>     
                    </select>
                </div>

				<label for="bank" class="col-sm-2 col-form-label">Bank:</label>
				<div class="col-sm-4">

					<select name="bank" class="form-control sch_cd required" id="bank" required>
						<option value="">Select Bank</option>
                        <?php
                            foreach($bankDtls as $bank){
                        ?>
                        <option value="<?php echo $bank->sl_no;?>"><?php echo $bank->bank_name;?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
		</div>


            <div class="form-group row">
            <label for="Receipt No" class="col-sm-2 col-form-label">Receipt No:</label>
            
                
                  <!-- <input type="text" id=receipt_no name="receipt_no" class="form-control" value=""  /> -->
                  <div class="col-sm-4">

					<select name="receipt_no" class="form-control sch_cd" id="receipt_no" required>
						<option value="">Select Receipt No</option>
                        
                    </select>
                </div>
                <!-- <label class="col-sm-2 col-form-label">Total Advance</label>
                <label class="col-sm-2 col-form-label">Amount Already paid</label>
                <label class="col-sm-2 col-form-label">Amount to be paid</label>
                
                <label  class="col-sm-2 col-form-label" id='tot_adv' ></label>
                <label class="col-sm-2 col-form-label" id='adv_paid' ></label>
                <label class="col-sm-2 col-form-label" id='adv_topaid' style="color:red;"></label> -->
                

            </div>

			<div class="form-group row">
				<label for="trans_type" class="col-sm-2 col-form-label">Transaction Type:</label>
				<div class="col-sm-4">
                <input type="hidden" id="trans_type" name="trans_type" class="form-control" value="I" />
                <input type="text" id="view_type" name="view_type" class="form-control" value="Advance Deposit to company" readonly />  
				<input type="hidden" id="p_tot" name="p_tot" class="form-control" value="" />
                
			</div>

                <label for="bank" class="col-sm-2 col-form-label">Debit Account Head:</label>
				<div class="col-sm-4">

					<select name="cr_head" class="form-control sch_cd" id="cr_head" required>
						<option value="">Select Account head</option>
                        <?php
                            foreach($acc_head as $key){
                        ?>
                        <option value="<?php echo $key->sl_no;?>"><?php echo $key->ac_name;?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
			</div>
          
            <div class="form-group row">
				<label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
				<div class="col-sm-10">
                    <textarea id=remarks name="remarks" class="form-control"  required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                <table class="table table-bordered">
                        <tbody id='list'></tbody>
                    </table>
                </div>	
            </div>
            <div class="form-group row">                
				<div class="col-sm-10">

					<input type="submit" id="submit" class="btn btn-info" value="Save" />

				</div>
            </div>
			</div>

		</form>

	</div>	

</div>
<script>
$( document ).ajaxComplete(function() {
    $("#receipt_no").change(function(){
        var receipt_no = $(this).val();
		 var comp_id = $('#company').val();
		  var dist    = $('#dist').val();
        $("#list").html('');
        $.ajax({
        type:'POST',
        url: '<?=base_url()?>index.php/adv/company_advAddlist',
        //data: {receipt_no:receipt_no,comp_id:comp_id},
		data: {receipt_no:receipt_no,comp_id:comp_id,branch_id:dist},
        success: function(data){
		if(data==0){
            alert('District Not Matched');
			 $('#submit').attr('type', 'buttom');
             return true;

            }else{
            var tot_amt = 0.0;
            var i  = 0; var j = 0;
            var list = '<tr><th>Sl No</th><th style="width:33%">Advance No</th><th style="width:33%">Company Name</th><th style="width:33%">Product</th><th style="width:33%">Amount</th><th>Option</th></tr>';
            $.each(JSON.parse(data), function(index, value) {
                list += '<tr><td>'+ ++i +'</td><td><input type="hidden" class="form-control" value="'+value.detail_receipt_no+'" name="adv_receive_no[]" readonly>'+value.detail_receipt_no+'</td><td>'+value.COMP_NAME+'</td><td>'+value.PROD_DESC+'</td><td>'+value.amount+'</td><td><input type="checkbox" id="ckamt" name="ckamt['+ j++ +'][list]"  value ='+value.detail_receipt_no+' class="ckamt"><input type="hidden" name="amt[]" value="'+value.amount+'"></td></tr>';
                tot_amt += parseFloat(value.adv_amt);
            });  
            list += '<tr style="font-weight: bold;"><td colspan="3">Total</td><td></td><td id="approve_tot">0.00</td></tr>';
        $("#list").html(list);
				$.ajax({
        type:'POST',
        url: '<?=base_url()?>index.php/adv/company_advdetail',
        data: {receipt_no:receipt_no},
        success: function(data){

            var data = JSON.parse(data);
            $('#tot_adv').html(data.totadv);
            $('#adv_topaid').html(parseFloat(data.totadv)-parseFloat(data.totpaid));
            $('#adv_paid').html(data.totpaid);
       
        }});
			}			
        }});
       /* $.ajax({
        type:'POST',
        url: '<?=base_url()?>index.php/adv/company_advdetail',
        data: {receipt_no:receipt_no},
        success: function(data){

            var data = JSON.parse(data);
            $('#tot_adv').html(data.totadv);
            $('#adv_topaid').html(parseFloat(data.totadv)-parseFloat(data.totpaid));
            $('#adv_paid').html(data.totpaid);
        }});*/
    });
   

}) 

    $(document).ajaxComplete(function() {

        $('.ckamt').change(function() {
            var approve_tot = parseFloat($('#approve_tot').html());
            var amt = 0.00; 
            $('.ckamt:checked').each(function() {
                amt += parseFloat($(this).parents('tr').find("td").eq(4).html()); 
            });
            $('#approve_tot').html(amt);
			 $('#p_tot').val(amt);
        });
   });
   $(document).ajaxComplete(function() {
    $('#form').submit(function(event){
        var approve_tot = parseFloat($('#approve_tot').html());  
            
            if(parseFloat(approve_tot) < parseFloat(100.00) ){

                alert("Please select a row");
                event.preventDefault();
            }
            else{
                
                $('#submit').attr('type', 'submit');
            }

    });
   });

   $(document).ready(function(){

    var i = 0;
    $("#dist").on("change", function(){
        var dist = $(this).val();
        
        $.get('<?php echo site_url("adv/get_receiptbydist");?>',
              { dist: $(this).val(),c_id:$('#company').val()}
             ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.receipt_no + '">' + value.receipt_no + '</option>'
            });

            $("#receipt_no").html(string);
            
          });

    });

});
</script>
<script>
    // $('#dist').change(function(){
    //     var bank=$(this).val();
    //     var comp=$('#company').val();

    //     $.ajax({
    //             url: "adv/company_advAdd",
    //             type: "post",
    //             data: {bank:bank,comp:comp},
    //             dataType: "json",
    //             success: function(data) {
    //                 alert(data);
    //             }
    //         });
    // })
</script>