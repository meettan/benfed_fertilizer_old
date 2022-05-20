<!-- <script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery/.min.js" ></script> -->
<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src= "https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
<script src= "https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" ></script>
<link rel = "stylesheet" href= "https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

<style>

    .badge-warning{
        color: #212529;
        background-color: #ffc107;
    }

    .badge-success{
        color: #fff;
        background-color: #28a745;
    }

    .badge-danger{
        color: #fff;
        background-color: #FF4500;
    }

    .badge{
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        border-radius: 10px;
    }

</style>


<div class="wraper">      
        
    <div class="row">
        
        <div class="col-lg-9 col-sm-12">

            <h1><strong>Maternity Leave Apply</strong></h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">    

        <h3>

            <small><a href="<?php echo site_url("leave/newMatLeaveApply");?>" class="btn btn-primary" style="width: 100px;">Apply</a></small>
            <span class="confirm-div" style="float:right; color:green;"></span>

        </h3>

        <table class="table table-striped table-bordered table-hover" id="dataTable" >

            <thead>

                <tr>
                    <th>Applied On</th>
                    <th>Docket No</th>
                    <th>Days</th>
                    <th>Status</th>
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

                        <td><?php echo date("d-m-Y",strtotime($key->trans_dt)); ?></td>
                        <td><?php echo $key->docket_no; ?></td>
                        <td><?php echo $key->no_of_days; ?></td>
                        <?php if($key->approval_status == 'A'){ ?>
                            <td><span class= "badge badge-success">Approved</span></td>
                        <?php }elseif($key->approval_status == 'U'){ ?>
                            <td><span class= "badge badge-warning">Pending</span></td>
                        <?php }elseif($key->approval_status == 'R'){ ?>
                            <td><span class= "badge badge-danger">Rejected</span></td>
                        <?php }elseif($key->approval_status == 'F'){ ?>
                            <td><span class= "badge badge-done">Closed</span></td>
                        <?php }if($key->approval_status != 'U'){ ?>
                            <td></td>
                            <td></td>
                        <?php }
                        elseif($key->approval_status == 'U'){ ?>

                            <td><a href="<?php echo site_url('leave/editMatLeave?transCd='.$key->trans_cd.'&dt='.$key->trans_dt); ?>"><i class="fa fa-edit fa-fw fa-2x"></i></a></td>
                            <td><a href="<?php echo site_url('leave/deleteMatLeave?transCd='.$key->trans_cd.'&dt='.$key->trans_dt); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash fa-fw fa-2x"></i></a></td>
                        
                        <?php } ?>

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