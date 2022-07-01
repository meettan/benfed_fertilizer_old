<div class="wraper">

    <div class="row">

        <div class="col-lg-9 col-sm-12">

            <h1><strong>Customer Payment Forward</strong></h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">

        <h3>
            <small><a href="<?php echo site_url("socpay/socpayfwdAdd");?>" class="btn btn-primary"
                    style="width: 100px;">Add</a></small>
            <span class="confirm-div" style="float:right; color:green;"></span>
            <!-- <div  class="input-group" style="margin-left:75%;">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div> -->
        </h3>

        <div class="form-group row">
            <form method="POST" action="">

                <div class="col-sm-3">
                    <input type="date" style="width:300px" id="from_date" value="" name="from_date"
                        class="form-control">
                </div>

                <div class="col-sm-3">
                    <input type="date" style="width:250px" id="to_date" name="to_date" class="form-control">
                </div>

                <div class="col-sm-3">
                    <input type="submit" id="submit" class="filt" value="Filter">
                </div>


            </form>
        </div>

        <table class="table table-bordered table-hover" id='example'>

            <thead>

                <tr>
                    <th>Sl No.</th>
                    <th>Receipt No.</th>
                    <th>Receipt Date</th>
                    <th>Product</th>
                    <th>Society</th>
                    <th>Amount</th>
                    <th>Forward</th>
                    <th>Print</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

            </thead>

            <tbody>

                <?php
                        $i=0;
                    if($soc_pay) {
                            foreach($soc_pay as $pay) {
		    ?>

                <tr>

                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $pay->paid_id; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($pay->paid_dt)); ?></td>
                    <td><?php echo $pay->prod_desc;?></td>
                    <td><?php echo $pay->soc_name; ?></td>
                    <td><?php echo $pay->amount; ?></td>

                    <td>
                        <?php if($pay->approval_status == 'U') { ?>
                        <!-- <a href="<?php echo site_url("socpay/f_cust_pay_forward");?>?ro_no=<?=$pay->ro_no;?>,<?=$pay->comp_id;?>,<?=$pay->prod_id;?>,<?=$pay->rate;?>,<?=$pay->pur_inv;?>,<?=$pay->sale_qty;?>,<?=$pay->paid_id;?>,<?=$pay->sale_invoice_no;?>"> -->

                        <button class="btn btn-primary fButton"
                            rono="<?=$pay->ro_no;?>,<?=$pay->comp_id;?>,<?=$pay->prod_id;?>,<?=$pay->rate;?>,<?=$pay->pur_inv;?>,<?=$pay->sale_qty;?>,<?=$pay->paid_id;?>,<?=$pay->sale_invoice_no;?>"
                            id="fButton">Forward</button>

                        <!-- </a> -->
                        <?php } ?>
                    </td>

                    <td>
                        <a href="<?php echo site_url('socpay/money_recptReport?paid_id='.$pay->paid_id.''); ?>"
                            title="Print">

                            <i class="fa fa-print fa-2x" style="color:green;"></i>

                        </a>
                    </td>

                    <td><a href="society_payEdit?paid_id=<?=$pay->paid_id;?>" data-toggle="tooltip"
                            data-placement="bottom" title="Edit">

                            <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                        </a>
                    </td>

                    <td>

                        <?php if($pay->approval_status == 'U') { ?>
                        <button type="button" class="delete" id="<?=$pay->paid_id;?>" data-toggle="tooltip"
                            data-placement="bottom" title="Delete">

                            <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                        </button>
                        <?php } ?>
                    </td>


                    <!-- </td> -->

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
                    <th>Receipt No.</th>
                    <th>Receipt Date</th>
                    <th>Product</th>
                    <th>Society</th>
                    <th>Amount</th>
                    <th>Forward</th>
                    <th>Print</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

            </tfoot>

        </table>

    </div>

</div>

<script>
    $(".fButton").click(function () {
        var rddata = $(this).attr('rono');
        var arr = rddata.split(",");
        $.ajax({
            url: "<?=site_url('socpay/check_data')?>",
            type: "POST",
            dataType: "json",
            data: {invNo:arr[7],roNo:arr[0]},
            success: function (result) {
                if(result){
                    // alert('redirect');
                    $(location).prop('href', '<?php echo site_url("socpay/f_cust_pay_forward?ro_no=");?>'+rddata);
                }else{
                    alert('Already forwarded');
                }
            }
        });

    });
</script>

<script>
    $(document).ready(function () {

        $('.delete').click(function () {

            var id = $(this).attr('id');
            // window.alert("<?php echo $this->session->flashdata('msg'); ?>");
            var result = confirm("Do you really want to delete this record?");

            if (result) {

                window.location = "<?php echo site_url('socpay/deletecustpay?paid_id=" + id + "');?>";

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


<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "pagingType": "full_numbers"
        });
    });
</script>