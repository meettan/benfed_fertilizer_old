<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Advance</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("adv/advAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <!-- <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div> -->
                
            </h3>
            <div class="form-group row">
              <form method="POST" action="" >

                        <div class="col-sm-3">
	                    <input type="date" style="width:300px" id=from_date name="from_date" class="form-control"  />
                        </div>

                        <div class="col-sm-3">
                        <input type="date" style="width:250px" id=to_date name="to_date" class="form-control"  />
	                    </div>

                        <div class="col-sm-3">
                        <input type="submit" id= "submit" class="filt" value="Filter" />
                        </div>

               
            </form>
            </div>
            <table class="table table-bordered table-hover" id="example">

                <thead>
                <!-- <th colspan = "9" class="text-center">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radio" id="radio1" value="0" onclick="check_data(0)" checked>
                                                    <label class="form-check-label" for="radio1">All</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radio" id="radio2" value="1" onclick="check_data(1)">
                                                    <label class="form-check-label" for="radio2">Deposit</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radio" id="radio3" value="2" onclick="check_data(2)">
                                                    <label class="form-check-label" for="radio3">Adjustment</label>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </th> -->
                    <tr>
                        
                        <th>Sl.No.</th>

                        <th>Year</th>
                        
            			<th>Receipt No.</th>

                        <th>Society Name</th>

                        <th>Amount(Rs)</th>

                        <!-- <th>Forward</th> -->

                        <th>Edit</th>

                        <th>Print</th>
                      
                        <!-- <th>Delete</th> -->
                       
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                        $i=0;
                        if($data) {
                                foreach($data as $value) {
		            ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>

                                <td><?php echo date('d/m/Y',strtotime($value->trans_dt)); ?></td>

                                <td><?php echo $value->receipt_no; ?></td>

                                <td><?php echo $value->soc_name; ?></td>

                                <td><?php echo $value->adv_amt; ?></td>

                                <!-- <td><?php echo $value->forward_flag; ?></td> -->

                                <!-- <td>  
                                <?php //if($value->forward_flag == 'N') { ?>
                                 <a href="<?php //echo site_url('adv/f_adv_forward?receipt_no='.$value->receipt_no.''); ?>"> 
                                <button class="btn btn-primary forwardbutton" receipt_no="<?php //$value->receipt_no; ?>">Forward</button>
                                  </a> 
                                <?php //} ?> 
                                </td> -->

			 	                <td><a href="editadv?rcpt=<?php echo $value->receipt_no;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                                </td>

                                <td>
                              <a href="<?php echo site_url('adv/socadvReport?receipt_no='.$value->receipt_no.''); ?>" title="Print">

                            
                              <i class="fa fa-print fa-2x" style="color:green;"></i>  
                              <!-- <span class="mdi mdi-printer"></span> -->
                              </a>
                            </td>
                           
                            <!-- <td>
                            <?php if($value->forward_flag == 'N') { ?>
                                <button type="button" class="delete" id="<?php echo $value->receipt_no;?>"    
                                       
                                       data-toggle="tooltip" data-placement="bottom" title="Delete">

                                       <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                   </button> 
                                   <?php } ?> 
                               </td> -->

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
                    
                        <th>Sl.No.</th>

                        <th>Date</th>

                        <th>Receipt No.</th>

                        <th>Society Name</th>

                        <th>Amount(Rs)</th>

                        <!-- <th>Forward</th> -->

                        <th>Edit</th>

                        <th>Print</th>

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
    });

    <?php } ?>
</script>

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<!-- <script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
    check_data($('input[name="radio"]:checked').val());
} );
</script> -->

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>

<!-- <script>
    function check_data(id){
        $('#example tbody').empty();
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('adv/advance_radio'); ?>",
            data: {id: id},
            dataType: 'html',
            success: function (result) {
                var result = $.parseJSON(result);
                // console.log({len: result.length, result});
                if (result.length > 0) {
                    var x = 1;
                    $.each(result, function (i, item) {
                        var trans_type = item.trans_type == "I" ? "Deposit" : (item.trans_type == "O" ? "Adjusment" : "");
                        $('#example tbody').append('<tr>'
                            +'<td>'+ x +'</td>'
                            +'<td>'+ item.trans_dt +'</td>'
                            +'<td id="recpt_' + x + '">'+ item.receipt_no +'</td>'
                            +'<td>'+ item.soc_name +'</td>'
                            +'<td>'+ item.adv_amt +'</td>'
                            +'<td>'+ trans_type +'</td>'
                            +'<td><a href="editadv?rcpt=' + item.receipt_no + '" data-toggle="tooltip" data-placement="bottom" title="Edit">'
                            +'<i class="fa fa-edit fa-2x" style="color: #007bff"></i></a></td>'
                            +'<td><a href="<?= site_url(); ?>/adv/socadvReport?receipt_no=' + item.receipt_no + '" title="Print">'                          
                            +'<i class="fa fa-print fa-2x" style="color:green;"></i></a></td>'
                            +'<td><button type="button" class="delete" id="delete_' + x + '" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="del_item('+ x +')">'
                            +'<i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i></button></td>'
                            +'</tr>');
                        x++;    
                    });
                } else {
                    $('#example tbody').append('<tr><td class="text-danger text-center" colspan="7">No Data Found !!!</td></tr>');
                }
            }
	    });
    }
</script> -->


<script>

    function del_item(id){
        var recpt_id = $('#recpt_' + id).text();
        var result = confirm("Do you really want to delete this record?");
        
        if(result) {

            window.location = "<?php echo site_url('adv/advDel?receipt_no="+recpt_id+"');?>";

        }
    }

    $(document).ready( function (){

        $('.delete').click(function () {
            
            var id = $(this).attr('id');
            console.log(id);
            
            var result = confirm("Do you really want to delete this record?");
        
            if(result) {

                window.location = "<?php echo site_url('adv/advDel?receipt_no="+id+"');?>";

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
    $(this).closest("form").attr("action", "advancefilter");   
// });
    if(frmdt=='' && todt==''){
      //  alert('raj'); 
        // $(this).closest("form").attr("action", "/benfed_fertilizer/index.php/trade/sale"); 
        $(this).closest("form").attr("action", "advance"); 
    }
  
  
});

$('.forwardbutton').click(function(){
    var receipt_no=$(this).attr('receipt_no');
   // alert(receipt_no);
    $.ajax({
        url: "<?=site_url('adv/checked_adv_forwar') ?>", 
        type: "POST",
        dataType: "json",
        data:{ receipt_no: receipt_no},
        success: function (result) {
           //alert(result);
           if(result){
            
            window.location = "<?php echo site_url('adv/f_adv_forward?receipt_no='); ?>"+receipt_no;
           }else{
               alert('! Detal entry has not yet been done');
           }
            },
           
        });
});

</script>
