<div class="wraper">      
            <div class="col-md-2 container"></div>
			<div class="col-md-8 container form-wraper">
	
			<form method="POST" action="<?php echo site_url("drcrnote/drnoteAdd") ?>" onsubmit="return valid_data()" id="form">
	
					<div class="form-header">
					
						<h4>Add Credit Note</h4>
					
					</div>
									
                    <div class="form-group row">

                      <label for="ro_no" class="col-sm-2 col-form-label">Society:</label>
						<div class="col-sm-4">

                           <select name="soc_id" id="soc_id" class="form-control sch_cd soc_id" required>
                              <option value="">Select Society</option>
                            <?php
                            foreach($socdtls as $key1)
                            { ?>
                                <option value="<?php echo $key1->soc_id; ?>"><?php echo $key1->soc_name; ?></option>
                            <?php
                            } ?>
                            </select> 
	              
	                    </div>

                        <label for="comp_id" class="col-sm-2 col-form-label">Company:</label>

                       <div class="col-sm-4">
    
                            <select name="comp_id" id="comp_id" class="form-control comp_id" required>
                              <option value="">Select Company</option>
                            <?php
                                foreach($compdtls as $row)
                            { ?>
                                <option value="<?php echo $row->comp_id; ?>"><?php echo $row->comp_name; ?></option>
                            <?php
                            } ?>
                            </select> 
                       </div>


                    </div>
                    <div class="form-group row">

<label for="inv_no" class="col-sm-2 col-form-label">Invoice No.:</label>
  <div class="col-sm-4">

     <select name="inv_no" id="inv_no" class="form-control inv_no" required>
        <option value="">Select Invoice</option>
      <?php
      foreach($saleinv as $inv)
      { ?>
          <option value="<?php echo $inv->trans_do; ?>"><?php echo $inv->trans_do; ?></option>
      <?php
      } ?>
      </select> 

  </div>
 
  <label for="ro_no" class="col-sm-2 col-form-label">RO :</label>

 <div class="col-sm-4">

      <select name="ro_no" id="ro_no" class="form-control sch_cd ro_no" required>
        <option value="">Select Ro</option>
      <!-- <?php
          foreach($compdtls as $row)
      { ?>
          <option value="<?php echo $row->comp_id; ?>"><?php echo $row->comp_name; ?></option>
      <?php
      } ?> -->
      </select> 
 </div> 


</div>


<div class="form-group row">
<label for="cat_id" class="col-sm-2 col-form-label">Type:</label>

                       <div class="col-sm-4">
    
                            <select name="cat_id" id="cat_id" class="form-control cat_id" required>
                              <option value="">Select Type</option>
                            <?php
                                foreach($catdtls as $catg)
                            { ?>
                                <option value="<?php echo $catg->sl_no; ?>"><?php echo $catg->cat_desc; ?></option>
                            <?php
                            } ?>
                            </select> 
                       </div>


                    </div>
<!-- </div> -->

                    <div class="form-group row">

                        <label for="trans_dt" class="col-sm-2 col-form-label">Credit Note Date:</label>

						<div class="col-sm-4">
						<input type="date" id="trans_dt" name="trans_dt" class="form-control" required />
	                    </div>

                        <label for="dr_amt" class="col-sm-2 col-form-label">Amount:</label>

                        <div class="col-sm-4">
                        <input type="text" id="tot_amt" name="tot_amt" class="form-control" required />
                        <input type="hidden" id="recpt_no" name="recpt_no" class="form-control"  />
                        </div>


                    </div>


                       <div class="form-group row">

                        <label for="dr_amt" class="col-sm-2 col-form-label">Remarks:</label>

                        <div class="col-sm-10">
                          <textarea id="remarks" name="remarks" class="form-control"></textarea>
                       
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

<script>



$(document).ready(function(){

var i = 0;

$('#soc_id').change(function(){

    $.get( 

        '<?php echo site_url("drcrnote/f_get_sale_inv");?>',

        { 

            soc_id: $(this).val()

        }

    ).done(function(data){

        var string = '<option value="">Select Invoice</option>';

        $.each(JSON.parse(data), function( index, value ) {

            string += '<option value="' + value.trans_do + '">' + value.trans_do + '</option>'

        });

        $('#inv_no').html(string);

//         var string1 = '<option value="">Select Invoice</option>';

// $.each(JSON.parse(data), function( index, value ) {

//     string1 += '<option value="' + value.sale_ro + '">' + value.sale_ro + '</option>'

// });

// $('#ro_no').html(string1);
      });


});

});
</script>


<script>
$(document).ready(function(){

var i = 0;

$('#inv_no').change(function(){

    $.get( 

        '<?php echo site_url("drcrnote/f_get_sale_invro");?>',

        { 

            soc_id: $('#soc_id').val(),
            inv_no: $(this).val()

        }

    ).done(function(data){

        // var string = '<option value="">Select Invoice</option>';

        // $.each(JSON.parse(data), function( index, value ) {

        //     string += '<option value="' + value.trans_do + '">' + value.trans_do + '</option>'

        // });

        // $('#inv_no').html(string);

        var string1 = '<option value="">Select Ro</option>';

$.each(JSON.parse(data), function( index, value ) {

    string1 += '<option value="' + value.sale_ro + '">' + value.sale_ro + '</option>'

});

$('#ro_no').html(string1);
      });


});

});
</script>