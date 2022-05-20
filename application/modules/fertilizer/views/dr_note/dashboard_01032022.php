<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Credit Note</strong><h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("drcrnote/drnoteAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
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
                        <th>Receipt No</th>
                        <th>Invoice</th>
                        <th>Date</th>
                        <th>Company</th>
                        <th>Customer</th>
                         <th>Amount</th>
                        <th>Edit</th>
                        <th>Print</th>
                        <th>Download</th>
                        <th>Delete</th>
                        
                    </tr>

                </thead>

                <tbody> 

                    <?php
                        $i=0;
                        if($dr_notes) {
                                foreach($dr_notes as $dr) {
                                    // $disable_btn = $value->irn ? 'hidden' : '';
                                    // $enable_btn = $value->irn ? '' : 'hidden';
                                    $disable_del_btn =$dr->fwd_flag|| $dr->irn ||$dr->pay_cnt? 'hidden' : '';
                                    $disable_btn = $dr->irn ? 'hidden' : '';
                                    $enable_btn = $dr->irn ? '' : 'hidden';
		            ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $dr->recpt_no;?></td>
                                <td><?php echo $dr->invoice_no;?></td>
                                <td><?php echo date("d/m/Y",strtotime($dr->trans_dt)); ?></td>

                                <!--<td><?php /*if($dr->trans_flag=='R'){
                                                echo "Raised";
                                            }else{
                                                echo "Adjusted";
                                            } */
                                    ?>
                                </td>-->

                                <td><?php echo $dr->COMP_NAME; ?></td>

				                <td><?php echo $dr->soc_name; ?></td>
                                <td><?php echo $dr->tot_amt; ?></td>
			 	                <td>
                                 <button type="button" name="Edit<?= $i ?>" class="Edit_" id="Edit"  
                                data-toggle="tooltip" data-placement="bottom" title="Edit_" <?= $disable_btn; ?>>

                                     <!-- <a href="drnote_edit?trans_dt=<?=$dr->trans_dt;?>&trans_no=<?=$dr->trans_no;?>&soc_id=<?=$dr->soc_id;?>" 
                                        data-toggle="tooltip" data-placement="bottom" id="edit_<?= $i ?>">
                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i> -->

                                        <a href="drnote_edit?invoice_no=<?=$dr->invoice_no;?>" 
                                        data-toggle="tooltip" data-placement="bottom" id="edit_<?= $i ?>">
                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                        <!-- <a href="<?php echo site_url('drnote_edit?trans_dt='.$dr->trans_dt.''); ?>" id="edit_<?= $i ?>" title="Edit"><i class="fa fa-edit fa-2x" style="color:blue;"></i></a> -->
                                    </a> 
                                </td>
                                <td>
                                <button type="button" name="Print<?= $i ?>" class="Print_" id="Print"  
                                data-toggle="tooltip" data-placement="bottom" title="Print_" <?= $disable_btn; ?>>

                                    <a href="<?php echo site_url('drcrnote/drnoteReport?receipt_no='.$dr->recpt_no.''); ?>" title="Print">

                                    <i class="fa fa-print fa-2x" style="color:green;"></i>  
                             
                                    </a>
                                </td>
                                <td>
                                <button type="button" name="download_<?= $i ?>" class="download_" id="download"  
                                data-toggle="tooltip" data-placement="bottom" title="download_" <?= $enable_btn; ?>>
                               
                                    <a href="<?php echo site_url('api/print_irn?irn='.$dr->irn.''); ?>" id="down_clk_td_<?= $i ?>" title="Download"><i class="fa fa-download fa-2x" style="color:green;"></i></a>
                                </td>
                                <!-- </a> -->
                                </td>
                                <!-- <td> -->
                                <!-- <button type="button" name="delete" class="delete_" id="delete"  
                                data-toggle="tooltip" data-placement="bottom" title="delete_" <?= $disable_btn; ?>>

                                <a  
                                        data-toggle="tooltip" data-placement="bottom" id="delete_<?= $i ?>">
                                        <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                      
                                    </a>  -->
                                
                                    <td><button type="button" name="delete_<?= $i ?>" class="delete" id="<?=$dr->trans_dt;?>&trans_no=<?=$dr->trans_no;?>"    
                                       
                                       data-toggle="tooltip" data-placement="bottom" title="Delete" <?= $disable_del_btn; ?>>

                                       <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                   </button> 
                               </td>

                                    
                                    <!-- <button type="button" class="delete" id="<?=$dr->trans_dt;?>&trans_no=<?=$dr->trans_no;?>"    
                                       
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
                        <th>Sl No.</th>
                        <th>Receipt No</th>
                        <th>Date</th>
                        <!--<th>Type</th>-->
                        <th>Company</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Edit</th>
                        <th>Print</th>
                        <th>Download</th>
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
            // window.alert("<?php echo $this->session->flashdata('msg'); ?>");
            var result = confirm("Do you really want to delete this record?");
           
            if(result) {

                window.location = "<?php echo site_url('drcrnote/deletedr_note?trans_dt="+id+"');?>";

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