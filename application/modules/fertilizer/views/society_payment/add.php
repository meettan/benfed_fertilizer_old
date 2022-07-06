<style>
    #overlay {
        background: rgba(100, 100, 100, 0.2);
        color: #ffff;
        position: fixed;
        height: 100%;
        width: 100%;
        z-index: 5000;
        top: 0;
        left: 0;
        float: left;
        text-align: center;
        padding-top: 25%;
        opacity: .80;
    }



    .spinner {
        margin: 0 auto;
        height: 64px;
        width: 64px;
        animation: rotate 0.8s infinite linear;
        border: 5px solid #228ed3;
        border-right-color: transparent;
        border-radius: 50%;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div class="wraper">

    <div class="col-md-10 container form-wraper">

        <form method="POST" action="<?php echo site_url("socpay/society_payAdd") ?>" onsubmit="return valid_data()"
            id="form">
            <!-- <form method="POST" action="<?php echo site_url("socpay/society_payAdd") ?>"onsubmit="myFunction()" id="form"> -->

            <div class="form-header">

                <h4>Society and Payble Details</h4>

            </div>

            <div class="form-group row">
                <label for="soc_id" class="col-sm-2 col-form-label">Society :</label>
                <div class="col-sm-3">

                    <select name="soc_id"  class="form-control sch_cd required" id="soc_id" required>

                        <option value="">Select</option>

                        <?php
                                
                                    foreach($socdtls as $soc){
                                
                                ?>

                        <option value="<?php echo $soc->soc_id;?>"><?php echo $soc->soc_name;?></option>

                        <?php
	
		                            }
	
	                            ?>

                    </select>
                </div>
                <label for="paid_dt" class="col-sm-2 col-form-label">Date:</label>
                <div class="col-sm-3">

                    <input type="date"  id="paid_dt" name="paid_dt" class="form-control"
                        value="<?php echo date('Y-m-d');  ?>" readonly required />
                </div>
                <!-- </div> -->
            </div>

            <div class="form-group row">
                <label for="trans_do" class="col-sm-2 col-form-label">Invoice No:</label>
                <div class="col-sm-3">
                    <select name="trans_do"  class="form-control sch_cd required" id="trans_do">
                        <option value="">Select</option>
                        <?php
                       foreach($ro_dtls as $ro){
                            ?>
                        <option value="<?php echo $ro->trans_do;?>"><?php echo $ro->trans_do;?></option>
                        <?php    }    ?>
                    </select>
                </div>

                <label for="do_dt" class="col-sm-2 col-form-label">Invoice Date:</label>
                <div class="col-sm-3">

                    <input type="date" id="do_dt" name="do_dt" class="form-control" readonly />
                </div>
            </div>

            <div class="form-group row">
                <label for="sale_ro" class="col-sm-2 col-form-label">RO No:</label>
                <div class="col-sm-3">
                    <select name="sale_ro" class="form-control sch_cd required" id="sale_ro" 
                        required>

                        <option value="">Select</option>

                    </select>
                </div>
                <label for="tot_recvble_amt" class="col-sm-2 col-form-label">Total Invoice RO Amount:</label>
                <div class="col-sm-3">
                    <input type="hidden" id="tot_amt" name="tot_amt" />
                    <input type="text"  id="tot_recvble_amt" name="tot_recvble_amt" value="0"
                        class="form-control" readonly />
                </div>

                <!-- <div class="col-sm-3"> -->
                <input type="text" style="width:150px" id="rndtot_recvble_amt" name="rndtot_recvble_amt" value="0"
                    class="form-control" readonly />
                <!-- </div> -->
            </div>
            <div class="form-group row">
                <div class="col-sm-12"  id='show_detail'>
                </div>
            </div>    
            <div class="form-group row">

                <label for="tot_dr_amt" class="col-sm-2 col-form-label">Total Cr Note Amount:</label>
                <div class="col-sm-3">
                    <input type="text"  id="tot_dr_amt" name="tot_dr_amt" value="0"
                        class="form-control" readonly />
                    <!-- <a href="<?php echo site_url('drcrnote/crnote_editvu') ?>">Get Details</a> -->
                    <a href="javascript:void(0)" onclick="drcrnotefunction()">Get Details</a>
                    <!-- <a href="drcrnote/crnote_editvu?trans_do=<?=$ro->trans_do;?>">Get Details</a> -->
                    <!-- href="<?php echo site_url('frontpage/adminestimates')."/".$estimates[$i]->id_job ?>" -->
                </div>

                <label for="adv_amt" class="col-sm-2 col-form-label">Advance Amount:</label>
                <div class="col-sm-3">
                    <input type="text"  id="adv_amt" name="adv_amt" value="0" class="form-control"
                        readonly />
                </div>
            </div>
            <!-- <div class="form-group row"> <div> <label>Get Getails</label></div></div> -->
            <div class="form-group row">

                <label for="net_amt" class="col-sm-2 col-form-label">RO Net Amount<br>(Total Amount - Paid
                    Amount):</label>
                <div class="col-sm-3">
                    <input type="text" id="net_amt" name="net_amt" value="0" class="form-control"
                        readonly />
                </div>
                <div class="col-sm-2">
                    <input id="cshbank" name="cshbank" type="radio" class="radio-label cshbankk" value="0" />

                    <label for="cshbank" class="radio-label cshbankk">Cash</label>
                </div>
                <div class="col-sm-2">
                    <input id="cshbank" name="cshbank" type="radio" class="radio-label cshbank" value="1" checked />

                    <label for="cshbank" class="radio-label cshbank">Bank</label>
                </div>
                <!-- </div></div>  -->
                <!-- <label for="bnk_id" class="col-sm-2 col-form-label">Bank Name :</label>
						<div class="col-sm-3">
                      
                        <select name="bnk_id" style="width:180px" class="form-control bnk_id" id="bnk_id" required>
                    <option value="">Select</option>
                    <?php
                       foreach($bnk_dtls as $bnk){
                            ?>
                <option value="<?php echo $bnk->sl_no;?>"><?php echo $bnk->bank_name;?></option>
                <?php    }    ?>     
                </select>
                </div> -->

            </div>

            <div class="form-group row">

                <label for="rndnet_amt" class="col-sm-2 col-form-label">Net Amount(Rounded)<br>(Total Amount - Paid
                    Amount):</label>
                <div class="col-sm-3">
                    <input type="text"  id="rndnet_amt" name="rndnet_amt" value="0"
                        class="form-control" readonly />
                </div>
                <label for="bnk_id" class="col-sm-2 col-form-label" id="bnktxt">Bank Name :</label>
                <div class="col-sm-3" id="bnkk">

                    <select name="bnk_id"  class="form-control bnk_id" id="bnk_id" required>
                        <option value="">Select</option>
                        <?php
                       foreach($bnk_dtls as $bnk){
                            ?>
                        <option value="<?php echo $bnk->sl_no.','.$bnk->acc_code;?>"><?php echo $bnk->bank_name;?></option>
                        <?php    }    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row" id="bank_info">
                <label for="ifsc" class="col-sm-2 col-form-label">IFSC :</label>
                <div class="col-sm-3">
                    <input type="text"  id="ifsc" name="ifsc" value="" class="form-control"
                        readonly />
                    <input type="hidden" id="comp_id" name="comp_id" value="" class="form-control"
                        readonly />


                    <input type="hidden"  id="prod_id" name="prod_id" value="" class="form-control"
                        readonly />


                    <input type="hidden"  id="ro_rt" name="ro_rt" value="" class="form-control"
                        readonly />
                </div>
                <label for="ac_no" class="col-sm-2 col-form-label">A/C No:</label>
                <div class="col-sm-3">
                    <input type="text"  id="ac_no" name="ac_no" value="" class="form-control"
                        required />
                </div>
            </div>
            <div class="form-group row">
                <label for="remarks" class="col-sm-2 col-form-label">Remarks :</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="remarks" id="remarks" required></textarea>
                </div>
            </div>
            <div class="form-group row">

            </div>

            <div class="form-header">

                <h4>Pay Type and Paid Details</h4>

            </div>
            <hr>

            <div class="row" style="margin: 5px;">

                <div class="form-group">

                    <table class="table table-striped table-bordered table-hover">

                        <thead>
                            <th style="text-align: center;width:100px">Pay Type</th>
                            <th style="text-align: center;width:100px">Reference Date.</th>
                            <th style="text-align: center;width:100px">Reference NO.</th>
                            <th style="text-align: center;width:100px">Amount</th>
                            <th>
                                <button class="btn btn-success" type="button" id="addrow" style="border-left: 10px"
                                    data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i
                                        class="fa fa-plus" aria-hidden="true"></i></button></th>
                            </th>

                        </thead>

                        <tbody id="intro">
                            <tr>

                                <td id="t_type">

                                    <!-- }                  if($('#cshbank').val()=='1'){ -->

                                    <select name="pay_type[]" id="pay_type" style="width:230px"
                                        class="form-control pay pay_type" required>
                                        <option value="">Select Pay Type</option>

                                        <span id="op"></span>
                                        <option value="2">Advance</option>
                                        <option value="3">Cheque</option>
                                        <option value="4">Draft</option>
                                        <option value="5">Pay Order</option>
                                        <option value="6">CR Note</option>
                                        <option value="7">NEFT/RTGS</option>

                                    </select>

                                </td>
                                <td>
                                    <input type="date" name="ref_dt[]" style="width:200px;" class="form-control ref_dt"
                                        value="" id="ref_dt">
                                </td>
                                <td>
                                    <input type="text" name="ref_no[]" style="width:200px;" class="form-control ref_no"
                                        value="" id="ref_no">
                                </td>
                                <td>
                                    <input type="text" name="paid_amt[]" style="width:130px;"
                                        class="form-control paid_amt" value="" id="paid_amt" required>
                                </td>


                            </tr>

                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    Total:
                                </td>
                                <td colspan="2">
                                    <input name="total" style="width:150px;" id="total" class="form-control total"
                                        placeholder="Total" readonly>
                                </td>
                            </tr>
                        </tfoot>

                    </table>

                </div>

            </div>


            <div class="form-group row">

                <div class="col-sm-10">

                    <input type="submit" id="submit" class="btn btn-info" value="Save" onclick="return myFunction();" />

                </div>

            </div>

        </form>


    </div>

</div>
<div id="overlay" style="display:none;">
    <div class="spinner"></div>
</div>

</div>

<script>
    $(".sch_cd").select2(); // Code For Select Write Option


    $(document).ready(function () {

        // For add row option
        $('#addrow').click(function () {
            var cashbank = $('input[name="cshbank"]:checked').val();

            if (cashbank == 0) {
                var ovalue =
                    '<option value="">Select Pay Type</option><option value="1">Cash</option><option value="2">Advance</option><option value="6">CR Note</option>';
            } else {
                var ovalue =
                    '<option value="">Select Pay Type</option><option value="2">Advance</option><option value="3">Cheque</option><option value="4">Draft</option><option value="5">Pay Order</option><option value="6">CR Note</option><option value="7">NEFT/RTGS</option>';
            }

            var newElement = '<tr>' +
                '<td id="t_type">' +
                '<select name="pay_type[]" id="pay_type" style="width:230px"class="form-control pay soc_id" required>' +
                ovalue +
                '</td>' +
                '<td>' +
                '<input type="date" name="ref_dt[]" style="width:200px;" class="form-control ref_dt" value= "" id="ref_dt" >' +
                '</td>' +
                '<td>' +
                '<input type="text" name="ref_no[]" style="width:200px;" class="form-control ref_no" value= "" id="ref_no" >' +
                '</td>' +
                '<td>' +
                '<input type="text" name="paid_amt[]" style="width:130px;" class="form-control paid_amt" value= "" id="paid_amt" required>' +
                '</td>' +
                '<td>' +
                '<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>' +
                '</td>'
            '</tr>';

            $("#intro").append($(newElement));

        });

        // $("#intro").on("click","#removeRow", function(){
        //     $(this).parents('tr').remove();
        //     var sum =0;        

        //        $("input[class *= 'br_amt']").each(function(){
        //    sum += parseFloat($(this).val());

        //     });

        //     $("#total").val("0");
        //     $("#total").val(sum.toFixed(2));
        // });

        $('#nt').on("change", function () {
            var total = $(this).val();
            $('#total').val(total);
        })


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
    $('.table tbody').on('change', '.soc_amt', function () {

        var sum = 0;
        let row = $(this).closest('tr');

        $("input[class *= 'soc_amt']").each(function () {
            sum += parseFloat($(this).val());

        });

        $("#total").val("0");
        $("#total").val(sum).toFixed(2);

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
            $trans_val = $(this).val();
            //console.log($trans_val);

            $.get(


                    '<?php echo site_url("socpay/f_get_ro_dt");?>', {

                        trans_do: $(this).val(),


                    }

                )
                .done(function (data) {

                    //console.log(data);
                    var parseData = JSON.parse(data);

                    var do_dt = parseData[0].do_dt;
                    $('#do_dt').val(do_dt);

                });


        });

    });
</script>

<script>
    $(document).ready(function () {

        var i = 0;

        $('#soc_id').change(function () {
            $('#overlay').fadeIn().delay(2000).fadeOut();

            $.get(

                '<?php echo site_url("socpay/f_get_payro");?>',

                {

                    soc_id: $(this).val()

                }

            ).done(function (data) {

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.trans_do + '">' + value
                        .trans_do + '</option>'

                });

                $('#trans_do').html(string);


            });


        });

    });
</script>

<script>
    $(document).ready(function () {

        var i = 0;

        $('#trans_do').change(function () {
            $('#overlay').fadeIn().delay(2000).fadeOut();


            $.get(

                '<?php echo site_url("socpay/f_get_ro_dt");?>',

                {

                    trans_do: $(this).val()

                }

            ).done(function (data) {

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.sale_ro + '">' + value.sale_ro +
                        '</option>'

                });

                $('#sale_ro').html(string);


            });


        });

    });
</script>



<script>
    $(document).ready(function () {

        var i = 0;

        $('#sale_ro').change(function () {
            $('#overlay').fadeIn().delay(2000).fadeOut();


            $.get(

                // '<?php echo site_url("socpay/f_get_ro_dtl");?>',
                '<?php echo site_url("socpay/f_get_ro_trans_dtls");?>',

                {

                    trans_do: $('#trans_do').val()
                    // sale_ro: $('#sale_ro').val()

                }

            ).done(function (data) {

                var parseData = JSON.parse(data);

                var tot_recvble_amt = parseData[0].tot_amt;
                var comp_id = parseData[0].comp_id;
                var prod_id = parseData[0].prod_id;
                var ro_rt = parseData[0].rate;
                // var sale_ro = parseData[0].sale_ro;
                $('#comp_id').val(comp_id);
                $('#prod_id').val(prod_id);
                $('#ro_rt').val(ro_rt);
                // $('#sale_ro').val(sale_ro)  

                var tot_dr_amt = parseFloat($('#tot_dr_amt').val());
                var adv_amt = parseFloat($('#adv_amt').val());
                // var tot_recvble_amt = parseFloat($('#tot_recvble_amt').val());
                // var net_amt = tot_recvble_amt - 
            });


        });

    });
</script>

<script>
    $(document).ready(function () {

        var i = 0;

        $('#soc_id').change(function () {

            $.get(

                '<?php echo site_url("socpay/f_get_advamt_dr");?>',

                {

                    soc_id: $(this).val()

                }

            ).done(function (data) {

                var parseData = JSON.parse(data);

                var adv_amt = parseData[0].adv_amt;

                $('#adv_amt').val(adv_amt);

            });


        });

    });
</script>
<script>
    var tot_cr = '';
    $(document).ready(function () {

        var i = 0;

        $('#sale_ro').change(function () {

            $.get(

                '<?php echo site_url("socpay/f_get_amt_dr");?>',

                {

                    soc_id: $('#soc_id').val(),
                    trans_do: $('#trans_do').val(),


                }

            ).done(function (data) {

                var parseData = JSON.parse(data);

                var tot_dr_amt = parseData[0].tot_amt;

                $('#tot_dr_amt').val(tot_dr_amt);
                //   console.log(tot_dr_amt);

                tot_cr = tot_dr_amt;
            });


        });

    });
</script>

<script>
    $(document).ready(function () {

        var i = 0;

        $('#sale_ro').change(function () {

            $.get(

                '<?php echo site_url("socpay/f_get_adv_net_amt");?>',

                {

                    soc_id: $('#soc_id').val(),
                    trans_do: $('#trans_do').val(),
                    sale_ro: $('#sale_ro').val(),
                    // tot_recvble_amt: $('#tot_recvble_amt').val()

                }

            ).done(function (data) {
                var tot_cr_amt = 0.00;
                var net_amt = 0.00;
                var rnd_net_amt = 0.00;
                var rnd_ro_tot = 0.00;
                var parseData = JSON.parse(data);

                tot_cr_amt = tot_cr;
                //    alert(tot_cr);
                net_amt = parseData[0].net_amt - tot_cr_amt;
                rnd_net_amt = parseData[0].rnd_net_amt - tot_cr_amt;
                // console.log(net_amt);
                var tot_ro_amt = parseData[0].tot_ro_amt;
                rnd_ro_tot = Math.round(tot_ro_amt)
                $('#tot_recvble_amt').val(tot_ro_amt);
                $('#rndtot_recvble_amt').val(rnd_ro_tot);
                //  var tot_recvble_amt = parseFloat($('#tot_recvble_amt').val());
                var adv_amt = parseFloat($('#adv_amt').val());
                //  $('#net_amt').val(net_amt - adv_amt);
                $('#net_amt').val(net_amt);
                $('#rndnet_amt').val(rnd_net_amt);
            });

        });

    });
</script>

<script>
    $(document).ready(function () {

        $('#intro').on("change", ".paid_amt", function () {

            if ($(this).val() <= 0) {
                alert('Amount should not be less than or equal to Zero !');
                $('#submit').attr('type', 'buttom');
                return false;
            } else {
                $('#submit').attr('type', 'submit');

            }

            $("#total").val('');
            var total = 0;
            $('.paid_amt').each(function () {
                total += +$(this).val();
            })
            $("#total").val(total);

        });
        $("#intro").on("click", "#removeRow", function () {
            console.log('ok');

            $(this).parent().parent().remove();
            $('.paid_amt').change();
        })
    });
</script>




<script>
    $(document).ready(function () {

        $('#intro').on("change", ".paid_amt", function () {

            var rnd_net_amt = $('#rndtot_recvble_amt').val();
            var total = $('#total').val();

            if (parseFloat(total) > parseFloat(rnd_net_amt)) {
                $('#total').css('border-color', 'red');
                // alert('Paid Amount Should Not Greater Than Net Amount!');
                alert('Amount must be less than or equal to net amount');
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
        $("#paid_dt").change(function () {

            var ro_dt = $('#paid_dt').val();

            var d = new Date();

            var month = d.getMonth() + 1;
            var day = d.getDate();

            var output = d.getFullYear() + '-' +
                (month < 10 ? '0' : '') + month + '-' +
                (day < 10 ? '0' : '') + day;

            // console.log(trans_dt,output);

            if (new Date(output) < new Date(ro_dt)) {
                alert("Receipt Date Can Not Be Greater Than Current Date");
                $('#submit').attr('type', 'buttom');
                return false;
            } else {
                $('#submit').attr('type', 'submit');
            }
        })
    });
</script>
<script>
    $(document).ready(function () {
        $("#paid_dt").change(function () {

            var ro_dt = $('#paid_dt').val();
            var d = new Date();
            var month = d.getMonth() + 1;
            var day = d.getDate();
            var output = d.getFullYear() + '-' +
                (month < 10 ? '0' : '') + month + '-' +
                (day < 10 ? '0' : '') + day;

            if (new Date(output) < new Date(ro_dt)) {
                alert("Receipt Date Can Not Be Greater Than Current Date");
                $('#submit').attr('type', 'buttom');
                return false;
            } else {
                $('#submit').attr('type', 'submit');
            }
        })
    });
</script>

<script>
    $(document).ready(function () {
        $("#sale_ro").change(function () {

            var ro_dt = $('#paid_dt').val();
            var invoice_dt = $('#do_dt').val();

            if (new Date(invoice_dt) > new Date(ro_dt)) {
                alert("Receipt Date Can Not Be less Than invoice Date");
                $('#submit').attr('type', 'buttom');
                return false;
            } else {
                $('#submit').attr('type', 'submit');
            }
        })
    });
</script>

<script>
    $(document).ready(function () {

        var i = 2;

        $('#bnk_id').change(function () {

            $.get(
                    '<?php echo site_url("socpay/f_get_dist_bnk_dtls");?>', {
                        bnk_id: $(this).val(),
                    }

                )
                .done(function (data) {
                    var parseData = JSON.parse(data);
                    var ac_no = parseData[0].ac_no;
                    var ifsc = parseData[0].ifsc;
                    $('#ac_no').val(ac_no);
                    $('#ifsc').val(ifsc);

                });
        });

    });
</script>

<script>
    $('input:radio[name="cshbank"]').change(function () {

        if ($(this).val() == '1') {
            $("#bnkk").show();
            $("#bnktxt").show();
            $("#bank_info").show();

            $("#bnk_id").prop('required', true);
            $("#ac_no").prop('required', true);

            $('#bnk_id').attr('disabled', false);
            $('#ac_no').attr('disabled', false);
            $('#bnk_id').attr('required', 'required');
            $(".pay_type option[value='1']").remove();
            $(".pay_type option").eq(1).before($("<option></option>").val("3").text("Cheque"));
            $(".pay_type option").eq(1).before($("<option></option>").val("4").text("Draft"));
            $(".pay_type option").eq(2).before($("<option></option>").val("5").text("Pay Order"));
            $(".pay_type option").eq(2).before($("<option></option>").val("7").text("NEFT/RTGS"));
        } else if ($(this).val() == '0') {
            $("#bnkk").hide();
            $("#bnktxt").hide();
            $("#bank_info").hide();

            $("#bnk_id").prop('required', false);
            $("#ac_no").prop('required', false);

            $('#bnk_id').attr('disabled', true);
            $('#ac_no').attr('disabled', true);
            $('#ac_no').val('');
            $("select#bnk_id")[0].selectedIndex = 0;
            $(".pay_type option").eq(1).before($("<option></option>").val("1").text("Cash"));
            $(".pay_type option[value='3']").remove();
            $(".pay_type option[value='4']").remove();
            $(".pay_type option[value='5']").remove();
            $(".pay_type option[value='7']").remove();
        }
    });

    $('#form').submit(function (event) {

        $('#intro tr').each(function () {
            var pay_type = $(this).find('td:eq(0) .pay').val();
            var paid_amt = $(this).find('td:eq(3) .paid_amt').val();
            if (pay_type == 1) {
                if (parseFloat(paid_amt) > parseFloat(199999)) {
                    alert("Cash amount can not be greater than 199999");
                    $(this).find('td:eq(3) .paid_amt').focus();
                    //$('#submit').attr('type', 'buttom');
                    event.preventDefault();
                }
            } else {

                ///$('#submit').attr('type', 'submit');

            }
        });


    });
</script>



<script>
    function myFunction() {
        // alert('Hi');
        var textboxcount = document.getElementsByName("pay_type[]").length;
        var tot_dr_amt = document.getElementById("tot_dr_amt").value;
        // alert(tot_dr_amt);
        var chk_val = 0;
        for (var i = 0; i < textboxcount; i++) {
            if (document.getElementsByName("pay_type[]").item(i).value != 6 && tot_dr_amt > 0) {
                chk_val = 1;
            } else {
                chk_val = 0;
                break;
            }
            //textvalue= textvalue + document.getElementsByName("pay_type[]").item(i).value; 
        }
        if (chk_val > 0) {
            alert('Please Adjust The CR Note.');
            return false;
        } else {
            return true;
        }
    }
</script>

<script>
    function drcrnotefunction() {
        var tot_dr_amt = $('#tot_dr_amt').val();
        var $transdo = $('#trans_do').val();
        console.log($transdo);
        //alert(tot_dr_amt);
        if (tot_dr_amt > 0) {
            // window.location = "<?php echo site_url('drcrnote/drnote_edit?invoice_no="+$transdo+"');?>";
            window.open("<?php echo site_url('drcrnote/drnote_edit?invoice_no=" + $transdo + "');?>", '_blank');

        }

    }
</script>
<script>
    $('.table tbody').on('change', '.pay', function () {
        var selval = $(this).val();

        var c = 0;
        $('.pay').each(function () {
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


    })


    $('#intro').on("change", ".paid_amt", function () {
        //$('.pur_ro').eq($('.pur_inv').index(this)).val("");
        let row = $(this).closest('tr');
        var amt = parseFloat($(this).val()).toFixed(2);

        var abc = row.find('td:eq(0) .pay').val();

        if (abc == 6) {
            var crAmount = parseFloat($('#tot_dr_amt').val()).toFixed(2);
            
           
            if (parseFloat(amt) > parseFloat(crAmount)) {
                alert('Amount must be less than credit note amount');
                $("#addrow").hide();
                $("#submit").prop('disabled', false);
            }else{
                $("#submit").prop('disabled', true);
                $("#addrow").show();
            }
        }

        if (abc == 2) {
           
            var adv_amt = parseFloat($('#adv_amt').val()).toFixed(2);
                
            if (parseFloat(amt) > parseFloat(adv_amt)){
                alert('Amount must be less than advance amount');
                $("#addrow").hide();
                $("#submit").prop('disabled', false);
            }else{
                $("#submit").prop('disabled', true);
                $("#addrow").show();
            }
        }

    });
    $(document).ready(function () {

        $('#sale_ro').change(function () {
            $.get('<?php echo site_url("socpay/f_advdetails");?>', {
                        ro: $(this).val(),soc_id:$('#soc_id').val()
                    }
                )
                .done(function (data) {


                    var string = '<h4>Advance To Company</h4><table class="table table-striped table-bordered" style="border: 2px solid;"><tr><th>Product </th><th>FO No</th><th>Qty</th><th>Rate</th><th>Amount</th></tr>';
                    if(data == 0){
                        string += '<tr><td colspan="5" style="text-align: center;font-size: 18px;font-weight: 600;color: #2a6496;">No record Found</td></tr>'; 
                    }else{

                        $.each(JSON.parse(data), function( index, value ) {
			
                            string += '<tr><td>'+value.product+'</td><td>'+value.fo_no+'</td><td>'+value.qty+'</td><td>'+value.rate+'</td><td>'+value.amount+'</td></tr>';
                    
                        });

                    }
		
		           string +='</table>'

                   $('#show_detail').html(string);
                });
        });

    });
</script>