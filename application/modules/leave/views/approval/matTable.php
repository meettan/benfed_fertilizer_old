<!-- <script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery/.min.js" ></script> -->
<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src= "https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
<script src= "https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" ></script>
<link rel = "stylesheet" href= "https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


<div class="wraper">      
        
    <div class="row">
        
        <div class="col-lg-9 col-sm-12">

            <h1><strong>Maternity Leave Approval</strong></h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">    
        <br>
        <table class="table table-striped table-bordered table-hover" id="dataTable" >

            <thead>

                <tr>
                    <th>Docket No</th>
                    <th>Employee Name</th>
                    <th>Days</th>
                    <th>View</th>
                </tr>

            </thead>

            <tbody>

                <?php
                    foreach($data as $key)
                    {
                ?>
                    <tr>

                        <td><?php echo $key->docket_no; ?></td>
                        <td><?php echo $key->emp_name; ?></td>
                        <td><?php echo $key->no_of_days; ?></td>
                        
                        <td><a href="<?php echo site_url('leave/approveMatLeave?transCd='.$key->trans_cd.'&dt='.$key->trans_dt); ?>"><i class="fa fa-eye fa-fw fa-2x"></i></a></td>
                        
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