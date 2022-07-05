<div class="wraper">

    <div class="col-md-12 container form-wraper">

        <form method="POST" action="<?php echo site_url("compay/company_payAdd") ?>" onsubmit="return valid_data()"
            id="form">

            <div class="form-header">

                <h4>Company and Payble Details</h4>

            </div>

            <div class="form-group row">
                <label for="dist_id" class="col-sm-2 col-form-label">District :</label>
                <div class="col-sm-4">

                    <select name="dist_id" style="width:250px" class="form-control sch_cd required" id="dist_id"
                        required>

                        <option value="">Select</option>

                        <?php
                                
                                    foreach($distdtls as $dist){
                                
                                ?>

                        <option value="<?php echo $dist->district_code;?>"><?php echo $dist->district_name;?></option>

                        <?php
	
		                            }
	
	                            ?>

                    </select>
                </div>
                <label for="pay_dt" class="col-sm-2 col-form-label">Date Of Payment:</label>
                <div class="col-sm-4">

                    <input type="date" style="width:170px" id="pay_dt" name="pay_dt" class="form-control" />
                </div>
                <!-- </div> -->
            </div>
            <div class="form-group row">
                <label for="comp_id" class="col-sm-2 col-form-label">Company:</label>
                <div class="col-sm-4">
                    <select name="comp_id" style="width:250px" class="form-control required" id="comp_id">
                        <option value="">Select</option>
                        <?php
                       foreach($compdtls as $comp){
                            ?>
                        <option value="<?php echo $comp->comp_id;?>"><?php echo $comp->comp_name;?></option>
                        <?php    }    ?>
                    </select>
                    <input type="hidden" name="company_tds_acc" id="company_tds_acc" class="company_tds_acc" value="">

                </div>

                <div class="form-group row">
                    <label for="acc_cd" class="col-sm-2 col-form-label">A/C Head:</label>
                    <div class="col-sm-3">
                        <select name="acc_cd" style="width:250px" class="form-control sch_cd required" id="acc_cd">
                            <option value="">Select</option>
                            <?php
                       foreach($acc_cd as $ac){
                            ?>
                            <option value="<?php echo $ac->sl_no;?>"><?php echo $ac->ac_name;?></option>
                            <?php    }    ?>
                        </select>
                    </div>
                </div>


            </div>
            <!-- <div class="form-group row">
                        
                        </div> -->

            <div class="form-header">

                <h4>Pay Type and Paid Details</h4>

            </div>

            <hr>

            <div class="row" style="margin: 5px;">

                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">

                            <thead>
                                <th style="text-align: center;width:100px">Purchase Invoice</th>
                                <th style="text-align: center;width:100px">Product</th>
                                <th style="text-align: center;width:100px">Purchase Ro</th>
                                <th style="text-align: center;width:100px">Purchase Ro Date</th>
                                <th style="text-align: center;width:100px">Quantity</th>
                                <th style="text-align: center;width:100px">Rate</th>
                                <th style="text-align: center;width:100px">Taxable Amt</th>
                                <th style="text-align: center;width:100px">TDS(0.1%)</th>
                                <!-- <th style="text-align: center;width:100px">Gross Amount</th> -->
                                <th style="text-align: center;width:100px">NET Amount</th>
                                <th style="text-align: center;width:100px">Virtual No.</th>
                                <th>
                                    <button class="btn btn-success" type="button" id="addrow" style="border-left: 10px"
                                        data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i
                                            class="fa fa-plus" aria-hidden="true"></i></button></th>
                                </th>

                            </thead>

                            <tbody id="intro">
                                <tr>

                                    <td>

                                        <select name="pur_inv[]" id="pur_inv" style="width:150px"
                                            class="form-control pur_inv" required>
                                            <option value="">Select RO</option>
                                            <!-- <?php
                                          foreach($rodtls as $key1)
                                          { ?>
                                              <option value="<?php echo $key1->ro_no; ?>"><?php echo $key1->ro_no; ?></option>
                                          <?php
                                          } ?> -->
                                        </select>
                                    </td>


                                    <td>
                                        <input type="hidden" name="prod_id[]" style="width:150px;"
                                            class="form-control prod_id" value="" id="prod_id">
                                        <input type="text" name="prod_desc[]" style="width:140px"
                                            class="form-control required prod_desc" value="" id="prod_desc" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="pur_ro[]" style="width:120px;"
                                            class="form-control pur_ro" value="" id="pur_ro" readonly>
                                    </td>
                                    <td>
                                        <input type="date" name="pur_ro_dt[]" style="width:150px;"
                                            class="form-control pur_ro_dt" value="" id="pur_ro_dt" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="qty[]" style="width:90px;" class="form-control qty"
                                            value="" id="qty" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="rate[]" style="width:100px;"
                                            class="form-control rate rate_change" value="" id="rate" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="taxable_amt[]" style="width:100px;"
                                            class="form-control taxable_amt " value="" id="taxable_amt" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="tds[]" style="width:100px;" class="form-control tds "
                                            value="" id="tds">
                                    </td>

                                    <!-- <td>
                                        <input type="text" name="paid_amt[]" style="width:130px;"
                                            class="form-control paid_amt" value="" id="paid_amt" readonly>
                                    </td> -->
                                    <td>
                                        <input type="text" name="net_amt[]" style="width:130px;"
                                            class="form-control net_amt" value="" id="net_amt" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="virtual_no[]" style="width:100px;"
                                            class="form-control virtual_no" value="" id="virtual_no">
                                    </td>

                                </tr>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        Total:
                                    </td>
                                    <td colspan="">
                                        <input name="taxable_total" style="width:150px;" id="taxable_total"
                                            class="form-control taxable_total" placeholder="Taxable Total" readonly>
                                    </td>
                                    <td colspan="">
                                        <input name="tds_total" style="width:150px;" id="tds_total"
                                            class="form-control tds_total" placeholder="TDS Total" readonly>
                                    </td>
                                    <!-- <td colspan="">
                                        <input name="total" style="width:150px;" id="total" class="form-control total"
                                            placeholder="Total" readonly>
                                    </td> -->
                                    <td colspan="">
                                        <input name="net_total" style="width:150px;" id="net_total"
                                            class="form-control net_total" placeholder="NET Total" readonly>
                                    </td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>

                </div>

            </div>
            <div class="form-header">

                <h4>Bank Details</h4>

            </div>

            <div class="form-group row">
                <label for="bank_id" class="col-sm-1 col-form-label">Bank Name :</label>
                <div class="col-sm-3">

                    <select name="bank_id" style="width:180px" class="form-control required" id="bank_id" required>

                        <option value="">Select</option>

                        <?php
                                
                                    foreach($bnkdtls as $bnk){
                                
                                ?>

                        <option value="<?php echo $bnk->sl_no;?>"><?php echo $bnk->bank_name;?></option>

                        <?php
	
		                            }
	
	                            ?>

                    </select>
                </div>
                <input type="hidden" name="ac_code" class="ac_code" id="ac_code">
                <label for="ifsc" class="col-sm-1 col-form-label">IFSC :</label>
                <div class="col-sm-2">

                    <input type="text" style="width:160px" id="ifsc" name="ifsc" class="form-control" readonly />
                </div>
                <label for="ac_no" class="col-sm-1 col-form-label">A/C No. :</label>
                <div class="col-sm-2">

                    <input type="text" style="width:180px" id="ac_no" name="ac_no" class="form-control" readonly />
                </div>
            </div>
            <div class="form-group row">
                <!-- <label for="virtual_no" class="col-sm-1 col-form-label">Virtual No:</label>
						<div class="col-sm-3">
                        <input type="text" style="width:180px" id="virtual_no" name="virtual_no" class="form-control" />
	                    </div> -->
                <label for="pay_mode" class="col-sm-1 col-form-label">Pay Mode:</label>
                <div class="col-sm-3">
                    <select class="form-control" id="pay_mode" name="pay_mode" style="width:180px" required>

                        <option value="">Select</option>
                        <option value="1">Cheque</option>
                        <option value="2">Draft</option>
                        <option value="3">NEFT/RTGS</option>

                    </select>
                </div>
                <label for="ref_no" class="col-sm-1 col-form-label">Referece No. :</label>
                <div class="col-sm-3">
                    <input type="text" style="width:180px" id="ref_no" name="ref_no" class="form-control" />
                </div>

            </div>
            <div class="form-group row">
                <label for="remarks" class="col-sm-1 col-form-label">Remarks:</label>
                <div class="col-sm-6">

                    <textarea style="width:570px;height:60px" id=remarks name="remarks"
                        class="form-control" /></textarea>
                </div>
                <label for="ref_dt" class="col-sm-1 col-form-label">Referece Date. :</label>
                <div class="col-sm-3">
                    <input type="date" style="width:180px" id="ref_dt" name="ref_dt" class="form-control" />
                </div>
            </div>
            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" id="submit" class="btn btn-info" value="Save" />

                </div>

            </div>

        </form>


    </div>

</div>

</div>
<script>
    $(".sch_cd").select2();
</script>
<script>
    $(document).ready(function () {
        $('#addrow').click(function () {

            $.get(

                '<?php echo site_url("compay/f_get_comppay_ro");?>',

                {

                    comp_id: $('#comp_id').val(),
                    dist_id: $('#dist_id').val()

                }

            ).done(function (data) {

                var string = '<option value="">Select Ro</option>';
                //console.log(data);
                $.each(JSON.parse(data), function (index, value) {

                    // string += '<option value="' + value.pur_inv_no + '">' + value.pur_inv_no +' - '+ value.sale_inv_no + '</option>'
                    string += '<option value="' + value.pur_inv_no + ',' + value
                        .sale_inv_no + '">' + value.pur_inv_no + ' - ' + value
                        .sale_inv_no + '</option>'

                });
                // For add row option
                // $('#addrow').click(function(){

                var newElement = '<tr>' +
                    '<td>'
                    // +'<input type="text" name="pur_inv[]" style="width:150px;" class="form-control pur_inv" value= "" id="pur_inv" >'
                    +
                    '<select name="pur_inv[]" id="pur_inv" style="width:150px"class="form-control pur_inv"  required>'
                    // +'<option value="">Select RO</option>'
                    +
                    ' <option value=" ' + string + '</option>' +
                    '</select> ' +
                    '</td>' +
                    '<td>' +
                    ' <input type="hidden" name="prod_id[]" style="width:150px;" class="form-control prod_id" value= "" id="prod_id" >' +
                    '<input type="text" name="prod_desc[]" style="width:140px" class="form-control required prod_desc" value= "" id="prod_desc" readonly>' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="pur_ro[]" style="width:120px;" class="form-control pur_ro" value= "" id="pur_ro" readonly>' +
                    '</td>' +
                    '<td>' +
                    '<input type="date" name="pur_ro_dt[]" style="width:150px;" class="form-control pur_ro_dt" value= "" id="pur_ro_dt"  readonly>' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="qty[]" style="width:90px;" class="form-control qty" value= "" id="qty" readonly >' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="rate[]" style="width:100px;" class="form-control rate" value= "" id="rate" readonly>' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="taxable_amt[]" style="width:100px;" class="form-control taxable_amt" value= "" id="taxable_amt" readonly>' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="tds[]" style="width:100px;" class="form-control tds" value= "" id="tds">' +
                    '</td>' +
                    
                    '<td>' +
                    '<input type="text" name="net_amt[]" style="width:130px;" class="form-control net_amt" value= "" id="net_amt" readonly>' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="virtual_no[]" style="width:100px;" class="form-control virtual_no" value= "" id="virtual_no" >' +
                    '</td>'

                    +
                    '<td>' +
                    '<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>' +
                    '</td>'
                '</tr>';

                $("#intro").append($(newElement));

            });
        });

        // '<td>' +
        //             '<input type="text" name="paid_amt[]" style="width:130px;" class="form-control paid_amt" value= "" id="paid_amt" readonly>' +
        //             '</td>' +


        // $("#intro").on("click","#removeRow", function(){
        //     $(this).parents('tr').remove();
        //     var sum =0;        

        //        $("input[class *= 'br_amt']").each(function(){
        //    sum += parseFloat($(this).val());

        //     });

        //     $("#total").val("0");
        //     $("#total").val(sum.toFixed(2));
        // });

        // $('#nt').on("change", function(){
        //     var total = $(this).val();
        //     $('#total').val(total);
        // })


        $('.total').change(function () {

            var total = $('#nt').val();
            var ntAmount = $('#nt').val();
            $('.cgst_val').each(function () {

                var curr_gst_val = $(this).val();
                total = parseFloat(total) + parseFloat(parseFloat(curr_gst_val) * 2);


            })
            $('#total').val(parseFloat(total).toFixed());

            var total_subAmnt = 0;
            $('.sub_amnt').each(function () {

                var tot_sub_amnt = $(this).val();
                total_subAmnt = parseFloat(total_subAmnt) + parseFloat(tot_sub_amnt);

                if (parseFloat(ntAmount) < parseFloat(total_subAmnt)) {
                    $('#nt').css('border-color', 'red');
                    $('#submit').prop('disabled', true);
                    return false;
                } else {
                    $('#nt').css('border-color', 'green');
                    $('#submit').prop('disabled', false);
                    return true;
                }


            })

        });

    })
</script>

<script>
    $(document).ready(function () {

        var i = 2;

        $('#do_no').change(function () {

            $.get(

                    '<?php echo site_url("fertilizer/do_detail");?>', {

                        do_no: $(this).val(),

                    }

                )
                .done(function (data) {

                    var datas = JSON.parse(data);

                    $('#ro_dt').val(datas.do_dt);
                    $('#invoice_no').val(datas.invoice_no);
                    $('#invoice_dt').val(datas.invoice_dt);
                    $('#company').val(datas.COMP_NAME);
                    $('#comp_id').val(datas.comp_id);
                    $('#gst_no').val(datas.GST_NO);
                    $('#tot_amt').val(datas.tot_cr_amt);
                    $('#tot_amts').val(datas.tot_cr_amt);
                });

        });

    });

    $('.table tbody').on('change', '.qty', function () {


        let row = $(this).closest('tr');
        var qty = row.find('td:eq(3) .qty').val();
        var stock = row.find('td:eq(2) .stock_qty').val();

        if (parseFloat(qty) > parseFloat(stock)) {
            //  var zero_qty          = null;

            row.find('td:eq(3)  input').val("0");

            alert('Sale Quantity Should Not Be Greater Than Stock Quantity!');

        }


    })
    $('.table tbody').on('change', '.paid_amt', function () {

        var sum = 0;
        let row = $(this).closest('tr');

        $("input[class *= 'soc_amt']").each(function () {
            sum += parseFloat($(this).val());

        });

        $("#total").val("0");
        $("#total").val(sum).toFixed(2);

    })


    $('.table tbody').on('change', '.taxable_amt', function () {

        var sum = 0;
        let row = $(this).closest('tr');

        $("input[class *= 'soc_amt']").each(function () {
            sum += parseFloat($(this).val());

        });

        $("#taxable_total").val("0");
        $("#taxable_total").val(sum).toFixed(2);

    })


    $('.table tbody').on('change', '.tds', function () {

        let row = $(this).closest('tr');
        var qty = parseFloat(row.find('td:eq(4) .qty').val());
        var rate = parseFloat(row.find('td:eq(5) .rate').val());
        var tds = parseFloat($(this).val());

        var tot_amt = parseFloat((qty * rate) - tds).toFixed('2');

        row.find('td:eq(8) .net_amt').val(tot_amt);



        var sum = 0;
        $("input[class *= 'net_amt']").each(function () {
            sum += parseFloat($(this).val());

        });

        $("#net_total").val("0");
        $("#net_total").val(parseFloat(sum).toFixed('2'));




        var totTds = 0;
            $('.tds').each(function () {

                totTds += +$(this).val();
            })
            $("#tds_total").val(totTds);

    })



    $('.table tbody').on('change', '.net_amt', function () {

        var sum = 0;
        let row = $(this).closest('tr');

        $("input[class *= 'soc_amt']").each(function () {
            sum += parseFloat($(this).val());

        });

        $("#net_total").val("0");
        $("#net_total").val(sum).toFixed(2);

    })


    $('#form').submit(function (event) {

        var tot_cr_amt = parseFloat($('#tot_amt').val());
        var sum = 0;

        let row = $(this).closest('tr');

        $("input[class *= 'soc_amt']").each(function () {
            sum += parseFloat($(this).val());

        });
        var total = parseFloat($('#total').val());

        if (tot_cr_amt < sum) {

            alert("Total Debit Exceed Limit");

            event.preventDefault();
        } else {
            //  alert("Transaction Date Can Not Be Less Than order Date");

            $('#submit').attr('type', 'submit');
        }
    });
</script>

<script>
    $(document).ready(function () {

        var i = 2;

        $('#trans_do').change(function () {

            $.get(

                    '<?php echo site_url("socpay/f_get_ro_dt");?>', {

                        trans_do: $(this).val(),


                    }

                )
                .done(function (data) {

                    //console.log(data);
                    var parseData = JSON.parse(data);

                    var do_dt = parseData[0].do_dt;
                    // var sale_ro = parseData[0].sale_ro;
                    $('#do_dt').val(do_dt);
                    // $('#sale_ro').val(sale_ro);


                });


        });

    });
</script>

<script>
    $(document).ready(function () {

        // $('#intro').on( "change", ".pur_inv", function(){
        // //$('#pur_inv').change(function(){
        // $("#total").val('0');

        // var total = 0;
        // $('.paid_amt').each(function(){
        //     total += $(this).val();
        // })
        // $("#total").val(total);

        // });

        $("#intro").on("click", "#removeRow", function () {
            console.log('ok');

            $(this).parent().parent().remove();
            // var total = 0;
            // $('.paid_amt').each(function () {

            //     total += +$(this).val();
            // })
            // $("#total").val(total);
            
            var taxableAmt = 0;
            $('.taxable_amt').each(function () {
                taxableAmt =taxableAmt +$(this).val();
            })
            $("#taxable_total").val(taxableAmt);


            var tDS = 0;
            $('.tds').each(function () {

                tDS += +$(this).val();
            })
            $("#tds_total").val(tDS);

            var net_total = 0;
            $('.net_amt').each(function () {

                net_total += +$(this).val();
            })
            $("#net_total").val(net_total);
        })
    });
</script>

<script>
    $(document).ready(function () {

        $('#intro').on("change", ".paid_amt", function () {

            var net_amt = $('#net_amt').val();
            var total = $('#total').val();

            // console.log(tot_dist_qty_qnt);
            // console.log(total);

            if (parseFloat(total) > parseFloat(net_amt)) {
                $('#total').css('border-color', 'red');
                alert('Paid Amount Should Not Greater Than Net Amount!');
                $('#submit').prop('disabled', true);

                return false;
            } else {
                $('#submit').prop('disabled', false);
                $('#total').css('border-color', 'gray');
                return true;
            }

        })




    })
</script>

<script>
    $(document).ready(function () {

        var i = 0;

        $('#comp_id').change(function () {

            $.get(

                '<?php echo site_url("compay/f_get_sale_invoice");?>',

                {

                    // comp_id: $(this).val(),
                    dist_id: $('#dist_id').val()

                }

            ).done(function (data) {

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.sale_invoice_no + '">' + value
                        .sale_invoice_no + '</option>'

                });

                $('#inv_no').html(string);


            });


        });

    });
</script>

<script>
    $(document).ready(function () {

        var i = 0;

        $('#dist_id').change(function () {

            $.get(

                '<?php echo site_url("compay/f_get_comppay_company");?>',

                {

                    dist_id: $(this).val()

                }

            ).done(function (data) {

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.comp_id + '">' + value
                        .comp_name + '</option>'

                });

                $('#comp_id').html(string);


            });


        });

    });
</script>
<script>
    $('#comp_id').change(function () {


        $.get('<?php echo site_url("compay/f_get_comppay_company_tds_acc");?>', {
            compid: $(this).val()
        }).done(function (data) {


            var tds_accdata = JSON.parse(data);
            //console.log(tds_accdata[0].tds_acc);
            var tds_acc = tds_accdata[0].tds_acc;
            $("#company_tds_acc").val(tds_acc);


        });


    });
</script>

<script>
    $(document).ready(function () {

        var i = 0;

        $('#comp_id').change(function () {

            $.get(

                '<?php echo site_url("compay/f_get_comppay_ro");?>',

                {

                    comp_id: $(this).val(),
                    dist_id: $('#dist_id').val()

                }

            ).done(function (data) {

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.pur_inv_no + ',' + value
                        .sale_inv_no + '">' + value.pur_inv_no + ' - ' + value
                        .sale_inv_no + '</option>'

                });

                $('#pur_inv').html(string);
                $('#prod_desc').val('');
                $('#pur_ro').val('');
                $('#pur_ro_dt').val('');
                $('#qty').val('0');
                $('#rate').val('0');
                $('#taxable_amt').val('0');
                $('#tds').val('0');
                $('#paid_amt').val('0');
                $('#total').val('0');
                $('#net_total').val('0');
                $('#tds_total').val('0');
                $('#taxable_total').val('0');



            });


        });

    });
</script>

<script>
    $(document).ready(function () {
        $('#intro').on("change", ".pur_inv", function () {
            $('.pur_ro').eq($('.pur_inv').index(this)).val("");
            let row = $(this).closest('tr');





        var selval = $(this).val();

        var c = 0;
        $('.pur_inv').each(function () {
            var select_val = $(this).val();
            if (selval == select_val) {
                c = c + 1;
            }
        });
        var tstval = $(this).find('option:selected').text();
        if (c > 1) {
            $("#addrow").hide();
            $("#submit").prop('disabled', true);
            alert(tstval + " Already Selected");
        } else {
            $("#addrow").show();
            $("#submit").prop('disabled', false);
        }




            


            $.get('<?php echo site_url("compay/f_get_comppay_ro_dtls");?>', {
                    pur_inv: $(this).val()
                })

                .done(function (data) {

                    var unitData = JSON.parse(data);
                    var qty = unitData.qty;
                    var rate = unitData.rate;
                    $('.prod_id').eq($('.pur_inv').index(this)).val(unitData.prod_id);
                    $('.prod_desc').eq($('.pur_inv').index(this)).val(unitData.PROD_DESC);
                    $('.pur_ro').eq($('.pur_inv').index(this)).val(unitData.pur_ro);
                    $('.pur_ro_dt').eq($('.pur_inv').index(this)).val(unitData.ro_dt);
                    $('.qty').eq($('.pur_inv').index(this)).val(qty);
                    $('.rate').eq($('.pur_inv').index(this)).val(unitData.rate);
                    let net_amt = (unitData.tot_amt - unitData.tds);
                    $('.net_amt').eq($('.pur_inv').index(this)).val(net_amt);
                    row.find('td:eq(6) .taxable_amt').val(((qty)*(rate)).toFixed(2));
                    row.find('td:eq(7) .tds').val(((qty*rate)*.001).toFixed(2)); 
                   row.find('td:eq(8) .paid_amt').val(((qty)*(rate)).toFixed(2));
                   row.find('td:eq(8) .net_amt').val(((qty*rate)-((qty*rate)*.001)).toFixed(2));
                    var total = 0;
                    $('.paid_amt').each(function () {

                        total += +$(this).val();
                    })
                    $("#total").val( parseFloat(total).toFixed(2));



                    var taxable_total = 0;
                    $('.taxable_amt').each(function () {

                        taxable_total += +$(this).val();
                    })
                    $("#taxable_total").val(parseFloat(taxable_total).toFixed(2));





                    var net_total = 0;
                    $('.net_amt').each(function () {

                        net_total += +$(this).val();
                    })
                    $("#net_total").val( parseFloat(net_total).toFixed(2));




                    var tds_total = 0;
                    $('.tds').each(function () {

                        tds_total += +$(this).val();
                    })
                    $("#tds_total").val(parseFloat(tds_total).toFixed(2));

                });

        });
    });
</script>

<script>
    $(document).ready(function () {

        var i = 0;

        $('#bank_id').change(function () {

            $.get(

                '<?php echo site_url("compay/f_get_bank_dtls");?>',

                {

                    bank_id: $(this).val(),


                }

            ).done(function (data) {

                var parseData = JSON.parse(data);

                var ac_no = parseData[0].ac_no;
                var ifsc = parseData[0].ifsc;

                var ac_code = parseData[0].acc_code;
                $('#ac_no').val(ac_no);
                $('#ifsc').val(ifsc);
                $('#ac_code').val(ac_code);

            });


        });

    });
</script>


<script>
    $(document).ready(function () {
        $('#intro').on("change", ".qty", function () {

            var sum = 0;
            var tot_amt = 0;

            var qty = parseFloat($('.qty').eq($('.pur_inv').index(this)).val());
            var rate = $('#rate').val();
            var tot_amt = parseFloat(qty * rate).toFixed('2');

            $('.paid_amt').eq($('.pur_inv').index(this)).val(tot_amt);

            $("input[class *= 'paid_amt']").each(function () {
                sum += parseFloat($(this).val());

            });

            $("#total").val("0");
            $("#total").val(sum).toFixed(2);

        })

    })
</script>


<script>
    $(".rate_change").change(function () {
        var sum = 0;
        var tot_amt = 0;

        var qty = parseFloat($('.qty').eq($('.pur_inv').index(this)).val());
        var rate = $('.rate').val();
        var tot_amt = parseFloat(qty * rate).toFixed('2');

        $('.paid_amt').eq($('.pur_inv').index(this)).val(tot_amt);

        $("input[class *= 'paid_amt']").each(function () {
            sum += parseFloat($(this).val());

        });

        $(".total").val("0");
        $(".total").val(sum).toFixed(2);
    });
</script>




<script></script>