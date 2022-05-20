<!-- <script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery/.min.js" ></script> -->
<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src= "https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
<script src= "https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" ></script>
<link rel = "stylesheet" href= "https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


<?php

    function get_month($month)
    {
        if($month == 1)
        {$month_name = "January";}
        elseif($month == 2)
        {$month_name = "February";}
        elseif($month == 3)
        {$month_name = "March";}
        elseif($month == 4)
        {$month_name = "April";}
        elseif($month == 5)
        {$month_name = "May";}
        elseif($month == 6)
        {$month_name = "June";}
        elseif($month == 7)
        {$month_name = "July";}
        elseif($month == 8)
        {$month_name = "August";}
        elseif($month == 9)
        {$month_name = "September";}
        elseif($month == 10)
        {$month_name = "October";}
        elseif($month == 11)
        {$month_name = "November";}
        elseif($month == 12)
        {$month_name = "December";}

        return $month_name; 

    }

?>


<div class="wraper">      
        
    <div class="row">
        
        <div class="col-lg-9 col-sm-12">

            <h1><strong>Leaves</strong></h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">    

        <h3>

            <small><a href="<?php echo site_url("leave/addLeaveType");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
            <span class="confirm-div" style="float:right; color:green;"></span>

        </h3>

        <table class="table table-striped table-bordered table-hover" id="dataTable" >

            <thead>

                <tr>
                
                    <th>Sl No.</th>
                    <th>Leave Type</th>
                    <th>Starting Month</th>
                    <th>End Month</th>
                    <th>Amount</th>
                    <th>Valid Upto</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>

            </thead>

            <tbody>

                <?php
                    foreach($data as $key)
                    {

                        $st_mnth = get_month($key->start_month);
                        $end_mnth = get_month($key->end_month);

                ?>
                    <tr>

                        <td><?php echo $key->sl_no; ?></td>
                        <td><?php echo $key->type; ?></td>
                        <td><?php echo $st_mnth; ?></td>
                        <td><?php echo $end_mnth; ?></td>
                        <td><?php echo $key->amount; ?></td>
                        <td><?php echo date("d-m-Y",strtotime($key->credit_on)); ?></td>

                        <td><a href="<?php echo site_url('leave/editLeaveType?slNo='.$key->sl_no); ?>"><i class="fa fa-edit fa-fw fa-2x"></i></a></td>
                        <td><a href="<?php echo site_url('leave/deleteLeaveType?slNo='.$key->sl_no); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash fa-fw fa-2x"></i></a></td>

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