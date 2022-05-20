<!-- <script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery/.min.js" ></script> -->
<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src= "https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
<script src= "https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" ></script>
<link rel = "stylesheet" href= "https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


<div class="wraper">      
        
    <div class="row">
        
        <div class="col-lg-9 col-sm-12">

            <h1><strong>Leave Allocation</strong></h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">    

        <h3>

            <small><a href="<?php echo site_url("leave/newAllocation");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
            <span class="confirm-div" style="float:right; color:green;"></span>

        </h3>

        <table class="table table-striped table-bordered table-hover" id="dataTable" >

            <thead>

                <tr>
                
                    <th>Emp No.</th>
                    <th>Emp Name</th>
                    <th>CL Balance</th>
                    <th>EL Balance</th>
                    <th>ML Balance</th>
                    <th>OD Balance</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>

            </thead>

            <tbody>

                <?php
                    foreach($data as $key)
                    {
                ?>
                    <tr>

                        <td><?php echo $key->emp_no; ?></td>
                        <td><?php echo $key->emp_name; ?></td>
                        <td><?php echo $key->cl_bal; ?></td>
                        <td><?php echo $key->el_bal; ?></td>
                        <td><?php echo $key->ml_bal; ?></td>
                        <td><?php echo $key->od_bal; ?></td>

                        <td><a href="<?php echo site_url('leave/editLeaveAllocation?transCd='.$key->trans_cd.'&dt='.$key->trans_dt); ?>"><i class="fa fa-edit fa-fw fa-2x"></i></a></td>
                        <td><a href="<?php echo site_url('leave/deleteLeaveAllocation?transCd='.$key->trans_cd.'&dt='.$key->trans_dt); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash fa-fw fa-2x"></i></a></td>

                    </tr>

                <?php
                    }
                ?>

            </tbody>

        </table>

    </div>

</div>

<!-- DataTables JavaScript -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>