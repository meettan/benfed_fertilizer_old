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
                        <th>Invoice No</th>
                        <th>Invoice Date</th>
                        <th>Invoice Type</th>
                        <th>Amout</th>
                        <th>View</th>
                        <th>Print</th>
                        <th>Delete</th>
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
                                <td style="width:200px"><?php echo $value->soc_name; ?></td>
                                <td><?php echo $value->trans_do; ?></td>
                                <!-- <td><?php echo $value->comp_id; ?></td> -->
                                <td><?php echo date("d/m/Y",strtotime($value->do_dt)); ?></td>
                                
				                <td><?php echo $value->trans_type; ?></td>
                                <td><?php echo $value->tot_amt; ?></td>
                                <!-- <td style="visibility:hidden;"><?php echo $value->challan_flag; ?></td> -->
                                <!-- <td id="challan_flag"><?php echo $value->challan_flag; ?></td> -->
			 	                <td><a href="saleedit?trans_do=<?php echo $value->trans_do ;?> " 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                                </td>
                                <td>
                                <a href="<?php echo site_url('trade/saleinvoice_rep?trans_do='.$value->trans_do.''); ?>" title="Print">

                                    <i class="fa fa-print fa-2x" style="color:green;"></i>  

                                    </a>
                                </td>
                                <td><button type="button" class="delete" id="<?php echo $value->trans_do;?>"    
                                       
                                        data-toggle="tooltip" data-placement="bottom" title="Delete">

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
                        <th>Invoice No</th>
                        <th>Invoice Date</th>
                        <th>Invoice Type</th>
                        <th>Amout</th>
                        <th>View</th>
                        <th>Print</th>
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