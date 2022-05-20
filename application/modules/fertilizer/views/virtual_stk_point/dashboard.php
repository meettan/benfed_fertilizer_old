<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Virtual Stock Point</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("virtualpnt/virtual_stk_pointAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div>
            </h3>

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                    	
                        <th>RO</th>
                        <th>RO Date</th>
                        <th>Virtual Stock Point</th>
                        <th>Total Qty</th>
                     
                        <th>Edit</th>
                    </tr>

                </thead>

                <tbody> 

                    <?php
                        $i=0;
                    if($virtualpnt) {
                            foreach($virtualpnt as $pay) {
		    ?>

                            <tr>   
                                
                                <td><?php echo $pay->ro_no; ?></td>
                                <td><?php echo date("d/m/Y",strtotime($pay->ro_dt)); ?></td>
                                
                                <td><?php echo $pay->soc_name; ?></td>
                                <td><?php echo $pay->qty; ?></td>
                               
			 	                <td><a href="drnote_edit?ro_no=<?=$pay->ro_no;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                               
                               <!-- <button type="button" class="delete" ro_no="<?=$pay->ro_no;?>"    
                                       
                                        data-toggle="tooltip" data-placement="bottom" title="Delete">

                                        <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                    </button>  -->
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
                    
                    <!-- <th>Sl_no</th> -->
                        <th>RO</th>
                        <th>RO Date</th>
                        <th>Virtual Stock Point</th>
                        <th>Qty</th>
                        <th>Edit</th>
                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {
            
            var ro_no = $(this).attr('ro_no');
            console.log(ro_no);
            // window.alert("<?php echo $this->session->flashdata('msg'); ?>");
            var result = confirm("Do you really want to delete this record?");
           
            if(result) {

                window.location = "<?php echo site_url('virtualpnt/deletevirtual_stock?ro_no="+ro_no+"');?>";

            }
            
        });

    });

</script>

<!-- <script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    });

    <?php } ?>
</script> -->


