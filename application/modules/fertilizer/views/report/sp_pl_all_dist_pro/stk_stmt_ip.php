<style>
    table {
        border-collapse: collapse;
    }

    table,
    td,
    th {
        border: 1px solid #dddddd;

        padding: 6px;

        font-size: 14px;
    }

    th {

        text-align: center;

    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>



<div class="wraper">

    <div class="col-md-6 container form-wraper">

        <form method="POST" id="form" action="<?php echo site_url("fert/rep/ps_pl_all_comp_dist");?>">

            <div class="form-header">

                <h4>Input Parameters</h4>

            </div>

            <div class="form-group row">

                <label for="from_dt" class="col-sm-2 col-form-label">From Date:</label>

                <div class="col-sm-6">

                    <input type="date" name="from_date" class="form-control required"
                        value="<?php echo date('Y-m-d');?>" />

                </div>

            </div>

            <div class="form-group row">

                <label for="to_date" class="col-sm-2 col-form-label">To Date:</label>

                <div class="col-sm-6">

                    <input type="date" name="to_date" class="form-control required"
                        value="<?php echo date('Y-m-d');?>" />

                </div>

            </div>
            <div class="form-group row">
                <label for="company" class="col-sm-2 col-form-label">Company:</label>
                <div class="col-sm-6">
                    <select name="comp_id" id="company" class="form-control" required>
                        <option value="">Select Company</option>
                        <?php foreach($company as $row){ ?>
                        <option value="<?php echo $row->COMP_ID;?>,<?php echo $row->COMP_NAME;?>">
                            <?php echo $row->COMP_NAME;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Product:</label>
                <div class="col-sm-6">
                    <select name="product" id="product" class="form-control product" required>
                        <option value="">Select Product</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="dist" class="col-sm-2 col-form-label">District:</label>
                <div class="col-sm-6">
                    <select name="dist" id="dist" class="form-control dist" required>
                        <option value="">Select District</option>
                        <?php foreach($dist as $row){ ?>
                        <option value="<?php echo $row->district_code;?>,<?php echo $row->district_name;?>">
                            <?php echo $row->district_name;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" class="btn btn-info" value="Submit" />

                </div>

            </div>

        </form>

    </div>

</div>
<script>
    $('#company').change(function(){
        var comp_id=$(this).val();
        $.ajax({
            url: "<?=site_url('fert/rep/getcompany')?>", 
            type: "POST",
            dataType: "json",
            data:{ comp_id: comp_id },
            success: function (result) {
            $('#product').html(result);
                }
            });
    });
</script>