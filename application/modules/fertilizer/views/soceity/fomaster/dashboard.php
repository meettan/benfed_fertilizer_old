<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Fo Master</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("fomaster-add");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div>
            </h3>

            <table class="table table-bordered table-hover" id='example'>

                <thead>

                    <tr>
                        <th>Sl.No.</th>
                        <th>Fo No</th>
                        <th>Fo Name</th>
                       <?php if($this->session->userdata('loggedin')['branch_id']!=342){?>
                        <th>Virtual No</th>
<?php }else{ ?>
    <th>Branch</th>
    <?php } ?>
            			<th>Edit</th>
                       
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
                                <td><?php echo $value->fo_number; ?></td>
                              
				                <td><?php echo $value->fo_name; ?></td>

                                <?php if($this->session->userdata('loggedin')['branch_id']!=342){?>
                                <td><?php echo $value->fo_virtual_no; ?></td>
                                <?php }else{ ?>
                                    <td><?php echo $value->district_name; ?></td>
                                <?php } ?>

			 	                <td><a href="fomaster-edit/<?php echo $value->fi_id;?>" 
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
                        <th>Sl.No.</th>
                        <th>Fo No</th>
                        <th>Fo Name</th>
                       <?php if($this->session->userdata('loggedin')['branch_id']!=342){?>
                        <th>Virtual No</th>
<?php }else{ ?>
    <th>Branch</th>
    <?php } ?>
            			<th>Edit</th>
                       
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

<link href  = "https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href  = "https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src = "https://code.jquery.com/jquery-3.5.1.js"></script>
<script src = "https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>