<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Category Master</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("key/categoryAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>

                <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div>

            </h3>

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                    	<th>Sl. No.</th>
                         
                        <th>Company Name</th>
                        <th>Category Description</th>


            			<th>option</th>
                     
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                        $i=0;
                            if($data) {
                                    foreach($data as $value) {
                    ?>

                            <tr>   
                                <td ><?php echo ++$i; ?></td>
                             
				                <td><?php echo $value->COMP_NAME; ?></td>

                                <td><?php echo $value->cate_desc; ?></td>

			 	                <td><a href="key/categoryedit?sl_no=<?php echo $value->sl_no;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
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
                    <th>Sl. No.</th>
                         
                        <th>Company Name</th>
                        <th>Category Description</th>


                        <th>Option</th>
                     
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


