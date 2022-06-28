<div class="wraper">      
        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <h1><strong>Advance Forward</strong></h1>
            </div>
        </div>
        <div class="col-lg-12 container contant-wraper">    
            <h3>
		        <small><a href="<?php echo site_url("adv/advancefwd_add");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <!-- <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div> -->
            </h3>
            <div class="form-group row">
              <form method="POST" action="" >
                        <div class="col-sm-3">
	                    <input type="date" style="width:300px" id=from_date name="from_date" class="form-control" value='<?=$frmdt?>' />
                        </div>
                        <div class="col-sm-3">
                        <input type="date" style="width:250px" id=to_date name="to_date" class="form-control"  value='<?=$todt?>'/>
	                    </div>
                        <div class="col-sm-3">
                        <input type="submit" id= "submit" class="filt" value="Filter" />
                        </div>
            </form>
            </div>
            <table class="table table-bordered table-hover" id="example">

                <thead>
                    <tr>
                        <th>Sl.No.</th>
                        <th>Year</th>
            			<th>Receipt No.</th>
                        <th>Fwd receive no</th>
                        <th>Forward</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php 
                        $i=0;
                        if($data) {
                                foreach($data as $value) {     ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($value->trans_dt)); ?></td>
                                <td><?php echo $value->detail_receipt_no; ?></td>
                                <td><?php echo $value->fwd_receipt_no; ?></td>
                                <td>  <?php if($value->fwd_flag == 'N') { ?>
                                 <a href="<?php echo site_url('adv/f_advfwd_forward?fwd_receipt_no='.$value->fwd_receipt_no.''); ?>"> 
                                <button class="btn btn-primary forwardbutton" receipt_no="<?php $value->fwd_receipt_no; ?>">Forward</button>
                                  </a> 
                                <?php } ?> </td>
			 	                <td><a href="fwdview?fwd_receipt_no=<?php echo $value->fwd_receipt_no;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="View">
                                        <i class="fa fa-eye fa-2x" style="color: #007bff"></i>
                                    </a>
                                    <button type="button" name="delete_5" class="delete" id="<?=$value->receipt_no;?>,<?=$value->detail_receipt_no;?>,<?=$value->fwd_receipt_no;?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                        <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                    </button> 
                                </td>
                            </tr>

                    <?php
                            }  }
                        else {
                            echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";
                        }
                    ?>
                
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl.No.</th>
                        <th>Date</th>
                        <th>Receipt No.</th>
                        <th>Society Name</th>
                        <th>Forward</th>
                        <th>Option</th>
                        <!-- <th>Delete</th> -->
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

<script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    <?php } ?>

    });
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

    $(document).ready( function (){

        $('.delete').click(function () {
            
            var id = $(this).attr('id');
            console.log(id);
            var result = confirm("Do you really want to delete this record?");
            if(result) {
                window.location = "<?php echo site_url('adv/advfwddetailDel?data="+id+"');?>";
            }
            
        });

    });
</script>

<script>
var clicked = false;
$(".filt").on("click", function() {
    var frmdt = $('#from_date').val();
    var todt = $('#to_date').val();
    // $(".obutn").click(function() {
    //  $(this).closest("form").attr("action", "/benfed_fertilizer/index.php/trade/salesfilter");   
    $(this).closest("form").attr("action", "advancefwd");   
// });
    if(frmdt=='' && todt==''){
      //  alert('raj'); 
        // $(this).closest("form").attr("action", "/benfed_fertilizer/index.php/trade/sale"); 
        $(this).closest("form").attr("action", "advance"); 
    }
  
  
});

// $('.forwardbutton').click(function(){
//     var receipt_no=$(this).attr('receipt_no');
//    // alert(receipt_no);
//     $.ajax({
//         url: "<?=site_url('adv/checked_adv_forwar') ?>", 
//         type: "POST",
//         dataType: "json",
//         data:{ receipt_no: receipt_no},
//         success: function (result) {
//            //alert(result);
//            if(result){
//             window.location = "<?php //echo site_url('adv/f_adv_forward?receipt_no='); ?>"+receipt_no;
//            }else{
//                alert('! Data entry has not yet been done');
//            }
//             },          
//         });
// });

</script>
