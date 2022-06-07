<div class="wraper">

    <div class="col-md-12 container form-wraper">

        <form method="POST" id="adv" action="<?php echo site_url("adv/add_advdetail") ?>">

            <div class="form-header">

                <h4>Edit Advance</h4>

            </div>

            <div class="form-group row">
                <label for="receipt_no" class="col-sm-2 col-form-label">Receipt No.:</label>

                <div class="col-sm-4">

                    <input type="text" id="receipt_no" name="receipt_no" class="form-control"
                        value="<?=$advdtl->receipt_no?>" readonly />
                    <input type="hidden" id="totamt" name="amt" class="form-control" value="<?=$advdtl->adv_amt?>" />

                </div>

            </div>
            <div class="form-group row">
                <div class="col-sm-12" id="detail">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Society Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td><?=$advdtl->soc_name?></td>
                            <td><?=$advdtl->trans_dt?></td>
                            <td><?=$advdtl->adv_amt?></td>
                            <td><?=$advdtl->remarks?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php    $tot_allocate_amt = 0.00; if($allocate) { ?>
            <div class="form-group row">
                <div class="col-sm-12" id="detail">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th style="text-align: center">receipt no</th>
                            <th style="text-align: center">Company</th>
                            <th style="text-align: center">Product</th>
                            <th style="text-align: center">FO</th>
                            <th style="text-align: center">RO Number</th>
                            <th style="text-align: center">Qty</th>
                            <th style="text-align: center">Rate</th>
                            <th style="text-align: center">Purchase Amount</th>
                            <th style="text-align: center">Detail</th>
                        </thead>
                        <?php $total_amount=0; foreach($allocate as $alloc) { $total_amount=($alloc->amount+$total_amount);  //print_r($key);?>
                        <tr>
                            <td>
                                <input type="text" name="ero_no[]" class="form-control ro_no" value="<?php echo $alloc->detail_receipt_no; ?>" id="" style="font-size: 12px;width:150px;" readonly>
                            </td>
                            <td>
                                <select name="ecomp_id[]"  style="width:150px;font-size: 12px;" class="form-control comp_id" id=""
                                    disabled>
                                    <option value="">Select</option>

                                    <?php  foreach($compdtls as $key){  ?>
                                    <option value="<?php echo $key->comp_id;?>"
                                        <?php if($key->comp_id==$alloc->comp_id) echo 'selected'; ?>>
                                        <?php echo $key->comp_name;?></option>
                                    <?php  }  ?>

                                </select>

                            </td>
                            <td><input type="hidden" name="detail_receipt_no[]" class="form-control"
                                    value="<?php echo $alloc->detail_receipt_no; ?>" readonly>
                                <input type="text" name="productname" class="form-control"
                                    value="<?php echo $alloc->PROD_DESC; ?>" readonly>
                            </td>

                            <td>
                                <!-- <input type="text" name="efo_no[]" class="form-control fo_no" -->
                                    <!-- value="<?php //echo $alloc->fo_no; ?>" id=""> -->

                                    <select name="efo_no[]" style="width:100px" class="form-control fo_no" id=""
                                    required disabled>
                                    <option value="">Select</option>

                                    <?php  foreach($folis as $folist){  ?>
                                    <option style="font-size:12px ;" value="<?php echo $folist->fi_id;?>" <?php if($alloc->fo_no==$folist->fi_id){echo 'selected';} ?>><?php echo $folist->fo_name.', '.$folist->fo_number;?></option>
                                    <?php  }  ?>

                                </select>
                            </td>
                            <td>
                                <input type="text" name="ero_no[]" class="form-control ro_no"
                                    value="<?php echo $alloc->ro_no; ?>" id="" readonly>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control ro_no"
                                    value="<?php echo $alloc->qty; ?>" id="" readonly>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control ro_no"
                                    value="<?php echo $alloc->rate; ?>" id="" readonly>
                            </td>
                            <td>
                                <input type="text" name="eamount[]" class="form-control amount"
                                    value="<?php  echo $alloc->amount; ?>" id="" readonly>
                            </td>
                            <td><button type="button" class="delete" id="<?php echo $alloc->detail_receipt_no;?>"
                                    data-toggle="tooltip" data-placement="bottom" title="Delete">

                                    <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>
                                </button> </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <?php } ?>
            <div class="form-group row"><input type="hidden" id="allocate" name="allocate" class="form-control"
                    value="" />

            </div>

            <div class="form-header">
                <h4>Advance Details</h4>
            </div>

            <div class="form-group row">

                <table class="table table-striped table-bordered table-hover">

                    <thead>

                        <th style="text-align: center">Company</th>
                        <th style="text-align: center">Product</th>
                        <th style="text-align: center">FO</th>
                        <th style="text-align: center">RO Number</th>
                        <th style="text-align: center">Qty</th>
                        <th style="text-align: center">Rate</th>
                        <th style="text-align: center">Amount</th>
                        <th>
                            <button class="btn btn-success" type="button" id="addrow" style="border-left: 10px"
                                data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button></th>
                        </th>

                    </thead>

                    <tbody id="intro">
                        <tr>
                            <td>
                                <select name="comp_id[]" style="width:250px" class="form-control comp_id" id=""
                                    required>
                                    <option value="">Select</option>

                                    <?php  foreach($compdtls as $key){  ?>
                                    <option value="<?php echo $key->comp_id;?>"><?php echo $key->comp_name;?></option>
                                    <?php  }  ?>

                                </select>

                            </td>
                            <td>
                                <select name="prod_id[]" style="width:200px" class="form-control sch_cd prod_id"
                                    id="prod_id" required>
                                </select>
                            </td>

                            <td>
                                <!-- <input type="text" name="fo_no[]" class="form-control fo_no" value="" id=""> -->
                                <select name="fo_no[]"  class="form-control fo_no" id=""
                                    required>
                                    <option value="">Select</option>

                                    <?php  foreach($folis as $folist){  ?>
                                    <option value="<?php echo $folist->fi_id;?>"><?php echo $folist->fo_name.', '.$folist->fo_number;?></option>
                                    <?php  }  ?>

                                </select>
                            </td>
                            <td>
                                <input type="text" name="ro_no[]" class="form-control ro_no" value="" id="">
                            </td>
                            <td>
                                <input type="text" name="qty[]" class="form-control qty" value="" id="qty">
                            </td>
                            <td>
                                <input type="text" name="rate[]" class="form-control rate" value="" id="rate">
                            </td>
                            <td>
                                <input type="text" name="amount[]" readonly class="form-control amount" value="" id="">
                            </td>
                            <td>
                                <button class="btn btn-danger" type="button" data-toggle="tooltip"
                                    data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i
                                        class="fa fa-remove" aria-hidden="true"></i></button>
                            </td>
                        </tr>

                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align:right">
                                <strong>Total:</strong>
                            </td>

                            <td>
                                <div class="col-md-2"><span id="tot_amt"></span></div>
                                <input type="hidden" name="" id="total_input_amount">

                            </td>

                        </tr>
                    </tfoot>

                </table>

            </div>
            <div class="form-group row">
                <div class="col-sm-10">

                    <input type="submit" id="submit" class="btn btn-info" value="Save" />
                </div>

            </div>
        </form>

    </div>
</div>


<script>
    $(".sch_cd").select2();


    $("#submit").click(function () {

        var adv_amt = parseFloat($('#totamt').val());
        var tot_amt = parseFloat($('#total_input_amount').val());

        if (tot_amt > adv_amt) {
            alert('Total amount must be less than advance amount');
            //return false;
            event.preventDefault();
        }
    });
</script>

<script>
    $(document).ready(function () {

        var i = 2;

        $('#bank').change(function () {

            $.get(

                    '<?php echo site_url("adv/f_get_dist_bnk_dtls");?>', {

                        bnk_id: $(this).val(),


                    }

                )
                .done(function (data) {

                    //console.log(data);
                    var parseData = JSON.parse(data);
                    var ac_no = parseData[0].ac_no;
                    var ifsc = parseData[0].ifsc;
                    $('#ac_no').val(ac_no);
                    // $('#ifsc').val(ifsc);

                });


        });

        $('#receipt_no').change(function () {

            $.get(

                    '<?php echo site_url("adv/f_get_receipt_no_dtls");?>', {
                        receipt_no: $(this).val(),
                    }
                )
                .done(function (data) {
                    var parseData = JSON.parse(data);

                    var string =
                        '<table class="table table-striped table-bordered"><tr><th>Society Name</th><th>Date</th><th>Amount</th><th>Remarks</th></tr><tr><td>' +
                        parseData.soc_name + '</td><td>' + parseData.trans_dt + '</td><td>' +
                        parseData.adv_amt + '</td><td>' + parseData.remarks + '</td></tr></table>';
                    $('#detail').html(string);
                    $('#totamt').val(parseData.adv_amt);

                });

        });
        $('#receipt_no').change(function () {

            $.get(

                    '<?php echo site_url("adv/f_get_allocted_amt");?>', {
                        receipt_no: $(this).val(),
                    }
                )
                .done(function (data) {
                    var parseData = JSON.parse(data);
                    var string = 'Allocate Amount:' + parseData.amt;
                    $('#allocamt').html(string);
                    $('#allocate').val(parseData.amt);

                });

        });

    });
</script>
<script>
    $('input:radio[name="cshbank"]').change(function () {
        console.log('hi');
        if ($(this).val() == '1') {
            $('#bank').attr('disabled', false);
            $('#bank').attr('required', 'required');
        } else if ($(this).val() == '0') {
            $('#bank').attr('disabled', true);
            $("#ac_no").val("");
            //  $("#bank").val('Select bank', 'Select bank'); 
            $("#bank")[0].selectedIndex = 0;
            $("#bank").trigger("change");
            $("#remarks").val("");

        }
    });

    $(document).ready(function () {

        var i = 0;
        $("#intro").on("change", ".comp_id", function () {

            var row = $(this).closest('tr');
            var comp_id = $(this).val();
            row.find("td:eq(1) .prod_id").html('');
            $.get('<?php echo site_url("stock/f_get_product");?>', {
                comp_id: $(this).val()
            }).done(function (data) {

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.prod_id + '">' + value
                        .prod_desc + '</option>'
                });

                row.find("td:eq(1) .prod_id").append(string);

            });

        });

    });

    $(document).ready(function () {

        $("#addrow").click(function () {

            var string = '';
            var string2 = '';

            '<?php  foreach($compdtls as $key){  ?>';

            string +=
                '<option value="<?php echo $key->comp_id;?>"><?php echo $key->comp_name;?></option>';

            '<?php  }  ?>';

           ' <?php  foreach($folis as $folist){  ?>';
                string2 +=
                       '<option value="<?php echo $folist->fi_id;?>"><?php echo $folist->fo_name.', '. $folist->fo_number;?></option>';
            '<?php  }  ?>';


            var newElement1 = '<tr>' +
                '<td>' +
                '<select name="comp_id[]" style="width:250px" class= "form-control comp_id" required><option value="">Select</option>' +
                string +
                '</select>' +
                '</td>' +
                '<td>' +
                '<select name="prod_id[]" style="width:200px" class= "form-control prod_id" required>' +
                '</select>' +
                '</td>' +
                '<td>' +
                
                '<select name="fo_no[]" class="form-control fo_no" id="" required><option value="">Select</option>'+
                string2+
                '</select>'+
                '</td>' +
                '<td>' +
                '<input type="text" name="ro_no[]" class="form-control ro_no" id="" required>' +
                '</td>' +
                '<td>' +
                '<input type="text" name="qty[]" class="form-control qty" value="" id="qty" >' +
                '</td>' +
                '<td>' +
                '<input type="text" name="rate[]" class="form-control rate" value="" id="rate">' +
                '</td>' +
                '<td>' +
                '<input type="text" name="amount[]" readonly class="form-control amount"  required>' +
                '</td>' +
                '<td>' +
                '<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>' +
                '</td>' +
                '</tr>';

            $("#intro").append($(newElement1));
        })

        $("#intro").on("click", "#removeRow", function () {
            $(this).parents('tr').remove();

        });

    });
    $("#adv").on('submit', function (e) {

        var totalamt = parseFloat($('#totamt').val());
        var allocte_amt = 0.00;
        var tot_amt = parseFloat($('#tot_amt').html());
        $('.amount').each(function () {
            allocte_amt += parseFloat($(this).val()) ? parseFloat($(this).val()) : 0.00;
        });
        if (totalamt < 100) {
            alert('Please select a valid advance');
            e.preventDefault();
        }
        // else 
        if (allocte_amt > totalamt) {
            alert('Please Correct Amount');
            e.preventDefault();
        }
    });
    $(document).ready(function () {

        $("#intro").on("change", ".amount", function () {

            var tot_amt = 0.00;
            $('.amount').each(function () {
                tot_amt += parseFloat($(this).val()) ? parseFloat($(this).val()) :
                    0.00; // Or this.innerHTML, 
            });
            $('#tot_amt').html(tot_amt);
            $('#total_input_amount').val(tot_amt);

        })
    })
    $(document).ready(function () {

        $('.delete').click(function () {

            var id = $(this).attr('id');
            console.log(id);
            var rcpt = $('#receipt_no').val();

            var result = confirm("Do you really want to delete this record?");

            if (result) {

                window.location = "<?php echo site_url('adv/advdetailDel?rcpt=" + rcpt +
                    "&receipt_no=" + id + "');?>";

            }

        });

    });
</script>

<script>
    // var total_mount=<?php  //$total_amount ?>;


    // $('.amount').change(function(){

    //     var totalSum = 0;
    //     $('.amount').each(function () {
    //         totalSum += parseFloat(this.value);
    //     });
    //     alert(totalSum);
    //     if(total_amt!=totalSum){

    //     }
    // });
</script>
<script>
    // $('.qty').change(function(){
    //     $(this).val();
    // });


    $('.table tbody').on('change', '.qty', function () {
        var qty = $(this).val();
       
        let row = $(this).closest('tr');

        var rate = parseFloat(row.find('td:eq(5) .rate').val());
        var totalAmt = (qty * rate);
        row.find('td:eq(6) .amount').val(parseFloat(totalAmt).toFixed(2));
    });

    $('.table tbody').on('change', '.rate', function () {
        var rate = $(this).val();
       
        let row = $(this).closest('tr');

        var qty = parseFloat(row.find('td:eq(4) .qty').val());
        var totalAmt = (qty * rate);
        row.find('td:eq(6) .amount').val(parseFloat(totalAmt).toFixed(2));
    });
</script>