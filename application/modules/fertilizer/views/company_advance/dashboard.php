<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Company Advance</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("adv/company_advAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div>
            </h3>

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                        <th>Sl.No.</th>

                        <th>Date</th>

            			<th>Receipt No.</th>

                        <th>Company Name</th>

                        <th>Transaction Type</th>

                        <th>Transaction Type</th>

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
                
                                <td><?php echo date('d/m/Y',strtotime($value->trans_dt)); ?></td>

                                <td><?php echo $value->receipt_no; ?></td>

                                <td><?php echo $value->comp_name; ?></td>

                                <td><?php if($value->trans_type == 'I'){

                                                echo "Deposit";
                                            }else{
                                                 
                                                echo "Adjustment";
                                            } 
                                    ?>
                                </td>

			 	                <td><a href="company_editadv?rcpt=<?php echo $value->receipt_no;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                                </td>

                                <td><button type="button" class="delete" id="<?php echo $value->receipt_no;?>"    
                                       
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
                    
                        <th>Sl.No.</th>

                        <th>Date</th>

                        <th>Receipt No.</th>

                        <th>Company Name</th>

                        <th>Transaction Type</th>

                        <th>Transaction Type</th>

                        <th>Delete</th>

                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {
            
            var id = $(this).attr('id');
            
            var result = confirm("Do you really want to delete this record?");
        
            if(result) {

                window.location = "<?php echo site_url('adv/company_advDel?receipt_no="+id+"');?>";

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