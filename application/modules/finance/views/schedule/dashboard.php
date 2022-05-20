<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Schedule Master</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		    <a href="<?php echo site_url("finance/scheduleAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a>
                    <span class="confirm-div" style="float:right; color:green;"></span>
            </h3>

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                    	<th>Sl No.</th>
			<th>Schedule Name</th>
			<th>Option</th>
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                    
                    if($data) {
                            foreach($data as $value) {
		    ?>

                            <tr>
                                <td><?php echo $value->schedule_code; ?></td>
				<td><?php echo $value->schedule_type; ?></td>
			 	 <td><a href="editSchedule/edit?schedule_code=<?php echo $value->schedule_code;?>" 
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
                    
                        <th>Sl No.</th>
                        <th>Schedule Name</th>
			<th>Option</th>
                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<!--<script>

    $(document).ready( function (){

        $('.delete').click(function () {

            var id = $(this).attr('id'),
                date = $(this).attr('date');

            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<//?php echo site_url('payroll/deduction/delete?empcd="+id+"&saldate="+date+"');?>";

            }
            
        });

    });

</script>-->

<script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    });

    <?php } ?>
</script>


