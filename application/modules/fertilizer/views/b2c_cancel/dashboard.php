<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>B2C Invoice Cancel</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		       <!-- <small><a href="<?php echo site_url("irncncl/advAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span> -->
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
            <table class="table table-bordered table-hover" id="example">

                <thead>

                    <tr>
                        <th>Sl.No.</th>

                        <th>District</th>

                        <th>Invoice No</th>
                        
            			<th>Invoice Date.</th>

                        <th>Ro No.</th>

                        <th>View</th>

                        <!-- <th>Download</th> -->
                       
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

                                <td><?php echo $value->district_name; ?></td>

                                <td><?php echo $value->trans_do; ?></td>

                                <td><?php echo $value->do_dt; ?></td>

                                <td ><?php echo $value->sale_ro; ?></td>

                                <!-- <td>
                                </td> -->


			 	                <td><a href="viewb2c?trans_do=<?php echo $value->trans_do;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                                </td>
                               <!-- <td>
                               <i class="fa fa-download fa-2x" style="color: #007bff"></i>
                               </td> -->
                             <!-- <td> -->
                                 <!-- <a href="<?php echo site_url('adv/socadvReport?receipt_no='.$value->receipt_no.''); ?>" title="Print">

                            
                              <i class="fa fa-print fa-2x" style="color:green;"></i>  
                             
                              </a>-->
                            <!-- </td>  -->

                            <!-- <td><button type="button" class="delete" id="<?php echo $value->receipt_no;?>"    
                                       
                                       data-toggle="tooltip" data-placement="bottom" title="Delete">

                                       <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                   </button> 
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

                    <th>District</th>

                    <th>Invoice No</th>

                    <th>Invoice Date.</th>

                    <th>Ro No.</th>

                    <th>View</th>

                        <!-- <th>Download</th> -->

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

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>

<script>
var clicked = false;
$(".filt").on("click", function() {
    var frmdt = $('#from_date').val();
    var todt = $('#to_date').val();
    // $(".obutn").click(function() {
    //  $(this).closest("form").attr("action", "/benfed_fertilizer/index.php/trade/salesfilter");   
    // $(this).closest("form").attr("action", "/benfed_fertilizer/index.php/b2ccelfilt");
    $(this).closest("form").attr("action", "/fertilizer/index.php/b2ccelfilt");   
    
// });
    if(frmdt=='' && todt==''){
      //  alert('raj'); 
        // $(this).closest("form").attr("action", "/benfed_fertilizer/index.php/trade/sale"); 
        // $(this).closest("form").attr("action", "/benfed_fertilizer/index.php/b2ccel"); 
        $(this).closest("form").attr("action", "/fertilizer/index.php/b2ccel");  
    }
  
  
});

        </script>
