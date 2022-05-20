<div class="wraper">      
        
    <div class="row">
        
        <div class="col-lg-9 col-sm-12">

            <h1><strong>Employees Deduction</strong></h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">    

        <h3>
            <a href="<?php echo site_url("payroll/deduction/add");?>" class="btn btn-primary" style="width: 100px;">Add</a>
                <span class="confirm-div" style="float:right; color:green;"></span>
        </h3>

        <table class="table table-bordered table-hover">

            <thead>

                <tr>
                
                    <th>Sl No.</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>General<br>Advance</th>
                    <th>General<br>Interest</th>
                    <th>Festival<br>Advance</th>
                    <th>LIC</th>
                    <th>I-tax</th>
            <!--	<th>Others</th>  -->
                    <th>Option</th>

                </tr>

            </thead>

            <tbody> 

                <?php 
                
                if($deduction_dtls) {

                    
                        foreach($deduction_dtls as $d_dtls) {

                ?>

                        <tr>

                            <td><?php echo $d_dtls->emp_cd; ?></td>
                            <td><?php echo $d_dtls->emp_name; ?></td>
                            <td><?php echo $d_dtls->emp_catg; ?></td>
                            <td><?php echo date("d-m-Y", strtotime($d_dtls->sal_date)); ?></td>
                            <td><?php echo $d_dtls->gen_adv; ?></td>

                            <td><?php echo $d_dtls->gen_intt; ?></td>
                            <td><?php echo $d_dtls->festival_adv; ?></td>
                            <td><?php echo $d_dtls->lic; ?></td>
            <td><?php echo $d_dtls->itax; ?></td>
            <!--<td><//?php echo $d_dtls->other_deduction;?></td>-->
                            <td>
                            
                                <a href="deduction/edit?emp_cd=<?php echo $d_dtls->emp_cd; ?>&month=<?php echo $d_dtls->sal_date; ?>" 
                                    data-toggle="tooltip"
                                    data-placement="bottom" 
                                    title="Edit"
                                >

                                    <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    
                                </a>

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <button 
                                    type="button"
                                    class="delete"
                                    id="<?php echo $d_dtls->emp_cd; ?>"
                                    date="<?php echo $d_dtls->sal_date; ?>"
                                    data-toggle="tooltip"
                                    data-placement="bottom" 
                                    title="Delete"
                                    
                                >

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
                    <th>Name</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>General<br>Advance</th>
                    <th>General<br>Interest</th>
                    <th>Festival<br>Advance</th>
                    <th>LIC</th>
        <th>I-tax</th>
        <th>Others</th>
                    <!--<th>Option</th>-->

                </tr>
            
            </tfoot>

        </table>
        
    </div>

</div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {

            var id = $(this).attr('id'),
                date = $(this).attr('date');

            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<?php echo site_url('payroll/deduction/delete?empcd="+id+"&saldate="+date+"');?>";

            }
            
        });

    });

</script>

<script>
   
   $(document).ready(function() {

   $('.confirm-div').hide();

   <?php if($this->session->flashdata('msg')){ ?>

   $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();

   });

   <?php } ?>
   
</script>
