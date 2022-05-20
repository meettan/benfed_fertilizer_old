<!-- <style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style> -->

<style>
#loader {
    position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

/* #loader.loading { */
	/* background: <?= base_url() . 'assets/images/ajax-loader.gif' ?> no-repeat center center;
	width: 32px;
	margin: auto; */
    /* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
/* } */

</style>

    <!-- Loader -->
    <div id="loader" class="loading img-center" style="display: none;"></div>
    <!--End Loader-->
<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Sale Entry</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("trade/saleAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <!-- <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div> -->
            </h3>
            <table class="table table-bordered table-hover" id="example">

                <thead>

                    <tr>
                    	<th>Sl No.</th>
                        <th>Primay Society</th>
                        <th>Product</th>
                        <th>Invoice No</th>
                        <th>Invoice Date</th>
                        <th>Invoice/GST Type</th>
                        <th>Amout</th>
                        <th>View</th>
                        <th>IRN</th>
                        <th>ACK NO</th>
                        <th>ACK DT</th>
                        <th>Download</th>
                        <th>B2C Print</th>
                        <th>Delete</th>
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                        $i=0;
                    if($data) {
                            foreach($data as $value) {
                                $disable_btn = $value->irn ? 'hidden' : '';
                                $enable_btn = $value->irn ? '' : 'hidden';
		    ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>
                                <td style="width:200px"><?php echo $value->soc_name; ?></td>
                                <td style="width:200px"><?php echo $value->prod_desc; ?></td>
                                <td><?php echo $value->trans_do; ?></td>
                                <!-- <td><?php echo $value->comp_id; ?></td> -->
                                <td><?php echo date("d/m/Y",strtotime($value->do_dt)); ?></td>
                                
				                <td id="trn_type_td_<?= $i ?>"><?php echo $value->trans_type; ?>/<?php if($value->gst_type_flag=='Y'){ echo 'B2B';}else{echo 'B2C';}?></td>
                                <td><?php echo $value->tot_amt; ?></td>
                                <!-- <td style="visibility:hidden;"><?php echo $value->challan_flag; ?></td> -->
                                <!-- <td id="challan_flag"><?php echo $value->challan_flag; ?></td> -->
			 	                <td><a href="saleedit?trans_do=<?php echo $value->trans_do ;?> " 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                                </td>
                                <!-- <td><<a href="<?php echo site_url('trade/api_call?trans_do='.$value->trans_do.''); ?>"  -->
                                <td id="irn_clk_td_<?= $i ?>">
                                
                                    <?php if($value->irn){echo ' <i class="fa fa-check fa-2x"  aria-hidden="true" style="color: green"></i>'; }else{ ?>
                                    <button type="button" data-toggle="tooltip" data-placement="bottom" title="irn" onclick="irn_clk(<?= $i ?>, '<?= $value->trans_do ?>')">
                                        <i class="fa fa-upload fa-2x"  aria-hidden="true" style="color: blue"></i>
                                   </button>
                                   <?php } ?> 
                               </td>
                               <td id="ack_clk_td_<?= $i ?>">
                                    <?php if($value->ack){echo $value->ack; }else{ ?>
                                   
                                   <?php } ?> 
                               </td>
                               <!-- <td style="display:none" id="ackdt_clk_td_<?= $i ?>"> -->
                               
                               <td   id="gst_type_td_<?= $i ?>">
                                    <?php if($value->ack_dt){echo $value->ack_dt; }else{ ?>
                                   
                                   <?php } ?> 
                               </td>
                                <td>
                                <button type="button" name="download_<?= $i ?>" class="download_" id="download"    
                                       
                                        data-toggle="tooltip" data-placement="bottom" title="download_" <?= $enable_btn; ?>>
                                <!-- <a href="<?php //echo site_url('trade/saleinvoice_rep?trans_do='.$value->trans_do.''); ?>" title="Print"><i class="fa fa-print fa-2x" style="color:green;"></i></a> -->
                                    <a href="<?php echo site_url('api/print_irn?irn='.$value->irn.''); ?>" id="down_clk_td_<?= $i ?>" title="Download"><i class="fa fa-download fa-2x" style="color:green;"></i></a>
                                </td>
                                <td>
                                <button type="button" name="print_<?= $i ?>" class="print" id="print"    
                                       
                                        data-toggle="tooltip" data-placement="bottom" title="print" <?= $disable_btn; ?>>
                                <a href="<?php echo site_url('trade/saleinvoice_rep?trans_do='.$value->trans_do.''); ?>" title="Print"><i class="fa fa-print fa-2x" style="color:green;"></i></a>
                                </td>
                                <td><button type="button" name="delete_<?= $i ?>" class="delete" id="<?php echo $value->trans_do;?>"    
                                       
                                        data-toggle="tooltip" data-placement="bottom" title="Delete" <?= $disable_btn; ?>>

                                        <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                    </button> 
                                </td>
                            </tr>

                    <?php
                            
                            }

                        }

                        else {

                            echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";

                        }
                    ?>
                
                </tbody>

                <tfoot>

                    <tr>
                    
                        <th>Sl No.</th>
                        <th>Primay Society</th>
                        <th>Product</th>
                        <th>Invoice No</th>
                        <th>Invoice Date</th>
                        <th>Invoice/GST Type</th>
                        <th>Amout</th>
                        <th>View</th>
                        <th>IRN</th>
                        <th>ACK NO</th>
                        <th>ACK DT</th>
                        <th>Download</th>
                        <th>B2C Print</th>
                        <th>Delete</th>
                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {
            // alert('abc');
            var id = $(this).attr('id');
            // window.alert("<?php echo $this->session->flashdata('msg'); ?>");
            var result = confirm("Do you really want to delete this record?");
           
            if(result) {

                window.location = "<?php echo site_url('trade/deletesale?trans_do="+id+"');?>";

            }
            
        });

    });

</script>

<script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    });

    <?php } ?>
   
</script>

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>

<script>
    function irn_clk(i, trans_do){
        // alert(i);
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('api/get_api_res'); ?>",
            data: {trans_do: trans_do},
            dataType: 'html',
            beforeSend: function () {
                // Show image container
                $("#loader").show();
                $('.wraper').hide();
            },
            success: function (result) {
                // console.log(result);
                var res = JSON.parse(result);
                var trn_type='';
                console.log(res['Success']);
                if(res['Success'] == 'Y'){
                    save_data(trans_do, res['Irn'],res['AckNo'],res['AckDt'],trn_type='Y');
                    // if(save_data(trans_do, res['Irn']) > 0){
                        $('#ack_dt_td_' + i).empty();
                        $('#ack_clk_td_' + i).empty();
                        $('#irn_clk_td_' + i).empty();
                        $('#trn_type_td_' + i).empty();
                        // $('#irn_clk_td_' + i).text(res['Irn']);
                        $('#irn_clk_td_' + i).html('<i class="fa fa-check fa-2x"  aria-hidden="true" style="color: blue"></i>');
                        $('#ack_clk_td_' + i).text(res['AckNo']);
                        $('#ack_dt_td_' + i).text(res['AckDt']);
                        $('#down_clk_td_' + i).attr('href', '<?= site_url() ?>api/print_irn?irn='+res['Irn']);
                        $('#ack_dt_td_' + i).text('Cash/B2B');
                        // AckNo
                        //AckDt
                        $('[name="delete_'+i+'"]').attr('disabled', 'disabled');
                    // }else{
                    //     alert('Data Not Inserted');
                    //     $('[name="delete_'+i+'"]').removeAttr('disabled');
                    // }
                }else{
                    // alert('Something Went Wrong');
                    alert('IRN not generated! Something Went Wrong/This will may be a B2c invoice');
                    $('[name="delete_'+i+'"]').removeAttr('disabled');
                }
            },
            complete: function (data) {
                // Hide image container
                $("#loader").hide();
                $('.wraper').show();
            }
	    });
    }

    function save_data(trans_do, irn,ack,ack_dt,trn_type){
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('api/save_irn'); ?>",
            data: {trans_do: trans_do, irn: irn,ack:ack,ack_dt:ack_dt,trn_type:trn_type},
            dataType: 'html',
            success: function (result) {
                // console.log(result);
                if(result == 1){
                    return 1;
                    // alert('IRN GENERATED SUCCESSFULLY');
                }else{
                    return 0;
                }
                // var res = JSON.parse(result);
                // console.log(res['Success']);
                // if(res['Success'] == 'Y'){
                //     $('#irn_clk_td_' + i).empty();
                //     $('#irn_clk_td_' + i).text(res['Irn']);
                //     $('[name="delete_'+i+'"]').attr('disabled', 'disabled');
                //     save_data(trans_do, res['Irn']);
                // }else{
                //     alert('Something Went Wrong');
                //     $('[name="delete_'+i+'"]').removeAttr('disabled');
                // }
            }
	    });
    }
</script>