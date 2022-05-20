<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Sale Rate List</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("fertilizer/salerateAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <!-- <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div> -->
            </h3>

            <table class="table table-bordered table-hover" id="example">

                <thead>

                    <tr>
                    
                    
                        <th>Sl.No.</th>

                        <th>From Date</th>

                        <!--<th>To Date</th>-->

                        <th>Company</th>

                        <th>Category</th>

                        <th>Product</th>

            			<th>Edit</th>

                        <th>Delete</th>
                        <th  style="display:none;">Sl.No.</th>
                    <th  style="display:none;">Sl.No.</th>
                    <th  style="display:none;">Sl.No.</th>
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                        $i=0;
                        if($ratedtls) {
                                foreach($ratedtls as $value) {
		            ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>

                                <td><?php echo date('d-m-Y',strtotime($value->frm_dt)); ?></td>

                                <!--<td><?php //echo $value->to_dt; ?></td>-->

                                <td><?php echo $value->comp_name; ?></td>

                                <td><?php echo $value->cate_desc; ?></td>

                                <td><?php echo $value->prod_desc; ?></td>

			 	                <td><a href="fertilizer/editsalerate?bulk_id=<?php echo $value->bulk_id;?>/fin_id=<?php echo $value->fin_id;?>/comp_id=<?php echo $value->comp_id;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                                </td>

                                <td>
                                <button type="button" class="delete" bulk_id="<?=$value->bulk_id;?>&fin_id=<?=$value->fin_id;?>"    
                                       
                                       data-toggle="tooltip" data-placement="bottom" title="Delete">

                                       <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                   </button> 
                                </td>
                                <td style="display:none;"><?php echo $value->bulk_id; ?></td>
                                <td style="display:none;"><?php echo $value->fin_id; ?></td>
                                <td style="display:none;"><?php echo $value->comp_id; ?></td>
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

                        <th>From Date</th>

                        <!--<th>To Date</th>-->

                        <th>Company</th>

                        <th>Category</th>

                        <th>Product</th>

                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<!-- <script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    });

    <?php } ?>
</script> -->

<script>

    $(document).ready( function (){

        $('.delete').click(function () {
            
            var bulk_id = $(this).attr('bulk_id');
            // window.alert("<?php echo $this->session->flashdata('msg'); ?>");
            var result = confirm("Do you really want to delete this record?");
           
            if(result) {

                window.location = "<?php echo site_url('fertilizer/deletesalerate?bulk_id="+bulk_id+"');?>";

            }
            
        });

    });

</script>

<!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script> -->
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<script>
   $('#example').dataTable({
    destroy: true,
   searching: true,paging: true

   });
</script> -->
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