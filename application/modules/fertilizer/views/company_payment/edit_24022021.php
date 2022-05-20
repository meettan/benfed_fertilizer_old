<div class="wraper">      
            
			<div class="col-md-8 container form-wraper">
	
				<form method="POST" action="<?php echo site_url("fertilizer/drnote_edit") ?>" id="form" >
	
					<div class="form-header">
					
						<h4>Edit Dr Note</h4>
					
					</div>
	
					
						<?php

    foreach($cr_detals as $cr_de);
    
       
    
    ?>
                      <div class="form-group row">
                      <label for="do_no" class="col-sm-2 col-form-label">Do No:</label>
						<div class="col-sm-3">
                    <select name="ro_no" class="form-control required" id="do_no">
                    <option value="">Select <?=$cr_de->ro_no?></option>
                    <?php
                       foreach($ro_dtls as $ro){
                            ?>
                <option value="<?php echo $ro->do_no;?>" <?php if($cr_de->ro_no == $ro->do_no){echo "selected"; }?>><?php echo $ro->do_no;?></option>
                <?php    }    ?>     
                </select>
                        </div>
                      <label for="do_dt" class="col-sm-2 col-form-label">Do Date:</label>
						<div class="col-sm-2">
	
						<input type="date" style="width:200px" id=do_dt name="ro_dt" class="form-control" 
                        value="<?=$cr_de->ro_dt?>" />
	                    </div>
                        </div>
  
    

                            <div class="form-group row">
                        <label for="comp_id" class="col-sm-2 col-form-label">Company :</label>
                        <div class="col-sm-3">
       <input type="hidden" id=comp_id name="comp_id"  />
      <input type="text" style="width:180px" id=company name="company" class="form-control" readonly />
                        </div>
                        <label for="gstin" class="col-sm-2 col-form-label">GSTIN:</label>
                        <div class="col-sm-3">
                        <input type="text" style="width:200px" id=gst_no name="gstin" class="form-control" readonly />
                        </div>
                        </div>

                        <div class="form-group row">
                      <label for="invoice_no" class="col-sm-2 col-form-label">Invoice No:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:170px" id=invoice_no name="invoice_no" class="form-control" 
                        value="<?=$cr_de->invoice_no?>" />
	                    </div>
                      <label for="invoice_dt" class="col-sm-2 col-form-label">Invoice Date:</label>
						<div class="col-sm-2">
	
						<input type="date" style="width:200px" id=invoice_dt name="invoice_dt" class="form-control"  
                        value="<?=$cr_de->invoice_dt?>"/>
	                    </div>
                        </div>
                        <div class="form-group row">
                      <label for="tot_cr_amt" class="col-sm-2 col-form-label">Total Cr Amount:</label>
						<div class="col-sm-3">
	 <input type="hidden"  id="tot_amt" name="tot_amt"  />
                     
						<input type="text" style="width:170px" id=tot_amts name="tot_amts" readonly class="form-control"  
                        value="<?=$cr_de->tot_amt?>"/>
	                    </div>
                        </div>

                        <div class="form-group row">
                        </div>
						<div class="form-header">
					
					<h4>Branch And Credit Details</h4>
				
				</div>
                <hr>

                <div class="row" style ="margin: 5px;">

                    <div class="form-group">

                        <table class= "table table-striped table-bordered table-hover">

                            <thead>
                                <th style= "text-align: center;width:100px">Branch</th>
                                
								<th style= "text-align: center;width:100px">Amount</th>
                                <th>
                                   <!--  <button class="btn btn-success" type="button" id="addrow" style= "border-left: 10px" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i class="fa fa-plus" aria-hidden="true"></i></button> -->
                                </th>

                            </thead>

                            <tbody id= "intro">

<?php
      $total =0 ;
    foreach($cr_detals as $cr_d){
    
      
    ?>
    
                                <tr>
                                
                                    <td>    
                                       
                 <select name="soc_id[]" id="soc_id" style="width:230px" class="form-control soc_id" required>
                <option value="">Select Branch</option>
                <?php
                    foreach($socdtls as $key1)
                    { ?>
                        <option value="<?php echo $key1->soc_id; ?>" <?php if($cr_d->soc_id==$key1->soc_id) echo "selected" ?>><?php echo $key1->soc_name; ?></option>
                    <?php
                    } ?>
            </select> 
                                    </td>

									<td>
                                      <input type="text" name="soc_amt[]" style="width:130px;" class="form-control soc_amt" value="<?php echo $cr_d->soc_amt;
                                      $total +=$cr_d->soc_amt;
                                      ?>" id="soc_amt" required>
                                    </td>
                                   
                                </tr>
<?php } ?>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="1">
                                        Total:
                                    </td>
                                    <td colspan="2">
                                        <input name="total" style="width:150px;" id="total" class="form-control total" placeholder="Total" value="<?=$total?>">  
                                    </td>
                                </tr>
                            </tfoot>
                    
                        </table>

                    </div> 

                </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" id= "submit" class="btn btn-info" value="Save" />

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- For Add row table -->
<script>

    

     $(document).ready(function(){

        $.get( 

            '<?php echo site_url("fertilizer/do_detail");?>',
            { 

                do_no: <?=$cr_de->ro_no?>,
               
            }

        )
        .done(function(data){

           var datas = JSON.parse(data);
            
           
            $('#ro_dt').val(datas.do_dt);
            $('#invoice_no').val(datas.invoice_no);
            $('#invoice_dt').val(datas.invoice_dt);
            $('#company').val(datas.COMP_NAME);
            $('#comp_id').val(datas.comp_id);
            $('#gst_no').val(datas.GST_NO);
            $('#tot_amt').val(datas.tot_cr_amt);
            $('#tot_amts').val(datas.tot_cr_amt);
        });


    });
 $('#do_no').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/do_detail");?>',
            { 

                do_no: $(this).val(),
               
            }

        )
        .done(function(data){

             var datas = JSON.parse(data);
           
            $('#ro_dt').val(datas.do_dt);
            $('#invoice_no').val(datas.invoice_no);
            $('#invoice_dt').val(datas.invoice_dt);
            $('#company').val(datas.COMP_NAME);
            $('#comp_id').val(datas.comp_id);
            $('#gst_no').val(datas.GST_NO);
            $('#tot_amt').val(datas.tot_cr_amt);
            $('#tot_amts').val(datas.tot_cr_amt);
        });

    });

    $(document).ready(function(){

        // For add row option
        $('#addrow').click(function(){

            var newElement = '<tr>'
                                +'<td>'
                               +'<select name="soc_id[]" id="soc_id" style="width:230px"class="form-control branch_id" required>'
                +'<option value="">Select Project</option>'
                +'  <?php
                    foreach($socdtls as $key1)
                    { ?>'
                       +' <option value="<?php echo $key1->soc_id; ?>"><?php echo $key1->soc_name; ?></option>'
                  +'<?php
                   } ?>'
           +'</select> '
                                +'</td>'
                               
                              
								+'<td>'
                                    +'<input type="text" name="soc_amt[]" style="width:130px;" class="form-control soc_amt" value= "" id="soc_amt" required>'
                                +'</td>'
                                +'<td>'
                                    +'<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>'
                                +'</td>'
                            '</tr>';

            $("#intro").append($(newElement));

        });

        // For remove row 
        $("#intro").on("click","#removeRow", function(){
            $(this).parents('tr').remove();
            var sum =0;
       
        
                     
           
         
               $("input[class *= 'br_amt']").each(function(){
           sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum).toFixed(2);
        });

        // For getting total amount after giving nt_amount
        $('#nt').on("change", function(){
            var total = $(this).val();
            $('#total').val(total);
        })


        // For getting total calculation after remove row
        $('.total').change(function(){

            var total = $('#nt').val();
            var ntAmount = $('#nt').val();
            $('.cgst_val').each(function(){

                var curr_gst_val = $(this).val();
                total = parseFloat(total)+parseFloat(parseFloat(curr_gst_val)*2);
                //console.log(total);

            })
            $('#total').val(parseFloat(total).toFixed());

            var total_subAmnt = 0;
            $('.sub_amnt').each(function(){

                var tot_sub_amnt = $(this).val();
                total_subAmnt = parseFloat(total_subAmnt)+parseFloat(tot_sub_amnt);
                
                if(parseFloat(ntAmount)<parseFloat(total_subAmnt))
                {
                    $('#nt').css('border-color', 'red');
                    $('#submit').prop('disabled', true);
                    return false;
                }
                else
                {
                    $('#nt').css('border-color', 'green');
                    $('#submit').prop('disabled', false);
                    return true;
                }

                
            })

        });

    })

</script>

<script>




     $('#form').submit(function(event){

          
                 var tot_cr_amt = parseFloat($('#tot_amt').val());


                 var sum =0;
            let row   = $(this).closest('tr');
                    
            $("input[class *= 'soc_amt']").each(function(){
            sum += parseFloat($(this).val());
                      
            });


                 var total      = parseFloat($('#total').val());

                    if(tot_cr_amt < sum) {

                         alert("Total Debit Exceed Limit");
                                      
                         event.preventDefault();
                    }
                     else 
                        {
                    //  alert("Transaction Date Can Not Be Less Than order Date");

                       $('#submit').attr('type', 'submit');
                      }
        });

 $('.table tbody').on('change', '.soc_amt', function(){
   
           var sum =0;
            let row   = $(this).closest('tr');
           
            $("input[class *= 'soc_amt']").each(function(){
            sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum).toFixed(2);
                      
            })

</script>
