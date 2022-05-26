<div class="wraper">      
            <div class="col-md-2 container"></div>
			<div class="col-md-8 container form-wraper">
	
			<form method="POST" action="<?php echo site_url("drcrnote/drnote_edit") ?>" onsubmit="return valid_data()" id="form">
	
					<div class="form-header">
					
						<h4>Edit Credit Note</h4>
                        <span id="msg" style="color:#bd2130"></span>
					</div>
                   	
                    <div class="form-group row">

                             <?php
                                foreach($dr_dtls as $dr_dtl);
                                ?>
                        <label for="soc_id" class="col-sm-2 col-form-label">Society:</label>
						<div class="col-sm-4">

                           <select name="soc_id" id="soc_id" class="form-control  soc_id" disabled="disabled">
                                <option value="">Select Society</option>
                                <?php
                                    foreach($socdtls as $key2)
                                    { ?>
                             
                                    
                                    <option value="<?php echo $key2->soc_id; ?>"<?php if($dr_dtl->soc_id == $key2->soc_id){ echo 'selected';}?>><?php echo $key2->soc_name; ?></option>
                                <?php 
                                    }  ?>
                               
                            </select> 
	              
	                    </div>

                        <label for="ro_no" class="col-sm-2 col-form-label">Company:</label>

                       <div class="col-sm-4">
    
                            <select name="comp_id" id="comp_id" class="form-control comp_id"  disabled="disabled" >
                              <option value="" >Select Company</option>
                            <?php
                                foreach($compdtls as $row)
                            { ?>
                            
                                <option value="<?php echo $row->comp_id; ?>"<?php if($dr_dtl->comp_id == $row->comp_id){ echo 'selected';}?>><?php echo $row->comp_name; ?></option>
                            <?php
                            } ?>
                            </select> 
                       </div>


                    </div>

                    <div class="form-group row">

<label for="inv_no" class="col-sm-2 col-form-label">Invoice No:</label>

<div class="col-sm-4">
<input type="text" id="inv_no" name="inv_no" class="form-control" value="<?php echo $dr_dtl->invoice_no; ?>" readonly />
</div>

<label for="ro_no" class="col-sm-2 col-form-label">Ro No:</label>

<div class="col-sm-4">
<input type="text" id="ro_no" name="ro_no" class="form-control" value="<?php echo $dr_dtl->ro; ?>" readonly />
<input type="hidden" id="fwd_flag" name="fwd_flag" class="form-control" value="<?php echo $dr_dtl->fwd_flag; ?>" readonly />
</div>


<?php

foreach($cr_cnt as $sl){

?>
<input type="hidden" style="width:200px"  name="cr_cnt" id="cr_cnt" class="form-control required"  
value = "<?php echo $sl->cr_cnt; ?>"  
/>
<?php

}

?>   
</div>
<!-- <div class="form-group row">
<label for="cat_id" class="col-sm-2 col-form-label">Type:</label>

<div class="col-sm-4">
<input type="text" id="cat_id" name="cat_id" class="form-control" value="<?php echo $dr_dtls->cat_desc; ?>" readonly />
</div>


</div> -->
<!-- </div> -->

                    <div class="form-group row">

                        <label for="trans_dt" class="col-sm-2 col-form-label">Debit Note Date:</label>

						<div class="col-sm-4">
						<input type="date" id="trans_dt" name="trans_dt" class="form-control" value="<?php echo $dr_dtl->trans_dt; ?>" readonly />
	                    </div>


                    </div>


                       <div class="form-group row">

                        <label for="dr_amt" class="col-sm-2 col-form-label">Remarks:</label>

                        <div class="col-sm-10">
                          <textarea id="remarks" name="remarks" class="form-control" readonly><?php echo $dr_dtl->remarks; ?></textarea >
                       
                        </div>

                        <input type="hidden" id="trans_no" name="trans_no" class="form-control" value="<?php echo $dr_dtl->trans_no; ?>" />

                    </div>

                    <div class="form-header">
					
					<h4>Cr Note Details</h4>
				
				</div>
               
                <div class="row" style ="margin: 5px;">

<div class="form-group">

    <table class= "table table-striped table-bordered table-hover">

        <thead>
            <th style= "text-align: center;width:100px">Type</th>
            
            <th style= "text-align: center;width:100px">Amount</th>
            
            <!-- <th>
                <button class="btn btn-success" type="button" id="addrow" style= "border-left: 10px" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i class="fa fa-plus" aria-hidden="true"></i></button></th>
            </th> -->

        </thead>

        <tbody id= "intro">
        <?php
                        foreach($dr_dtls as $dr_dt){

                        
                        ?>
            <tr>
            
                <td>    
                <select name="cat_id[]" style="width:350px" class="form-control " id="cat_id" required>
            
                <option value="">Select Type</option>
        <?php
            foreach($catdtls as $catg)
        { ?>
            <!-- <option value="<?php echo $catg->sl_no; ?>"><?php echo $catg->cat_desc; ?></option> -->
            <option value="<?php echo $catg->sl_no; ?>" <?php if($dr_dt->catg==$catg->sl_no) echo "selected" ?> ><?php echo $catg->cat_desc; ?></option>
        <?php
        } ?>
        </select> 
             </td>
  

                <td>
                  <input type="text" name="tot_amt[]" id="tot_amt" style="width:130px;" class="form-control tot_amt" value="<?php echo $dr_dt->tot_amt; ?>"  id="tot_amt" >
                  <?php
                                        $sum = 0;
                                        foreach($dr_dtls as $dr_dt) {
                    $sum+= $dr_dt->tot_amt;
                                        }
                                     
                    ?> 
                </td>
                
                
            </tr>
   <?php }?>
        </tbody>

        <tfoot>
        <tr>
        <tfoot>
                                <tr> 
                                <td  style="text-align:left">
                                   <strong >Total:</strong> 
                                   
                                    </td>
                                    <td style="text-align:right">
                                   <b> <div class="col-md-3" Total:<span id="Total"> <?php   echo $sum;?></span></div></b>
                                   </td>
                                 </tr>
                            </tfoot>
        </tr>
        </tfoot>

    </table>

</div> 

</div>      
             
                
                 <div class="form-group row">

                    <div class="col-sm-10">

                        <!-- <input type="submit" id= "submit" class="btn btn-info" value="Save" /> -->

                    </div>

                </div>

            </form>


        </div>

    </div>

</div>

<script>
$(document).ready(function(){
	var cr_cnt = $('#cr_cnt').val();
    var fwd_flag = $('#fwd_flag').val();
	if (cr_cnt>0 ){
	//  alert(chal_flag);
	// $('#submit').hide();
		
	$('#msg').html("This Invoice cannot be edited.Since some items has been adjusted.").css("font-size","20px","color","#0d7d8ef5");
	$('#submit').attr('type', 'buttom');
return false;

	}else if(cr_cnt>0 && fwd_flag=='Y'){
        $('#msg').html("This Invoice cannot be edited.Since some items has been adjusted,and forwarded to H.O").css("font-size","20px","color","#0d7d8ef5");
	$('#submit').attr('type', 'buttom');
return false;
}else if( fwd_flag=='Y'){
    $('#msg').html("This Invoice cannot be edited.Since Cr Note forwarded to H.O").css("font-size","20px","color","#0d7d8ef5");
	$('#submit').attr('type', 'buttom');
return false;
    }else{
		//$('#msg').hide();	
		$('#submit').show();
	}


});
</script>
<script>
$("#intro").on("click","#removeRow", function(){
        var total = 0.00;
        $(this).parent().parent().remove();
        $('.amt').each(function(){
           total += parseFloat($(this).val()) ? parseFloat($(this).val()) : 0.00;         
        })
        $("#total").val(total.toFixed(2));
});

$("#intro").on("change",".amt", function(){
        var total=0;
         $('.amt').each(function(){
           total += parseFloat($(this).val()) ? parseFloat($(this).val()) : 0.00;         
        })
         $("#total").val(total.toFixed(2));
});
</script>