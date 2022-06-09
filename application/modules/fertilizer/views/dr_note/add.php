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
    <div class="col-md-2 container"></div>
    <div class="col-md-8 container form-wraper">

        <form method="POST" action="<?php echo site_url("drcrnote/drnoteAdd") ?>" onsubmit="return valid_data()"
            id="form">

            <div class="form-header">

                <h4>Add Credit Note</h4>

            </div>

            <div class="form-group row">

                <label for="ro_no" class="col-sm-2 col-form-label">Society:</label>
                <div class="col-sm-4">

                    <select name="soc_id" id="soc_id" class="form-control sch_cd soc_id" required>
                        <option value="">Select Society</option>
                        <?php
                            foreach($socdtls as $key1)
                            { ?>
                        <option value="<?php echo $key1->soc_id; ?>"><?php echo $key1->soc_name; ?></option>
                        <?php
                            } ?>
                    </select>

                </div>

                <label for="comp_id" class="col-sm-2 col-form-label">Company:</label>

                <div class="col-sm-4">

                    <select name="comp_id" id="comp_id" class="form-control comp_id" required>
                        <option value="">Select Company</option>
                        <?php
                                foreach($compdtls as $row)
                            { ?>
                        <option value="<?php echo $row->comp_id; ?>"><?php echo $row->comp_name; ?></option>
                        <?php
                            } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">

                <label for="inv_no" class="col-sm-2 col-form-label">Invoice No.:</label>
                <div class="col-sm-4">

                    <select name="inv_no" id="inv_no" class="form-control inv_no sch_cd select2-hidden-accessible" required>
                        <option value="">Select Invoice</option>
                        <?php
      foreach($saleinv as $inv)
      { ?>
                        <option value="<?php echo $inv->trans_do; ?>"><?php echo $inv->trans_do; ?></option>
                        <?php
      } ?>
                    </select>

                </div>

                <label for="ro_no" class="col-sm-2 col-form-label">RO No:</label>

                <div class="col-sm-4">

                    <select name="ro_no" id="ro_no" class="form-control sch_cd ro_no" required>
                        <option value="">Select Ro</option>
                        <!-- <?php
          foreach($compdtls as $row)
      { ?>
          <option value="<?php echo $row->comp_id; ?>"><?php echo $row->comp_name; ?></option>
      <?php
      } ?> -->
                    </select>
                </div>


            </div>


            <!-- <div class="form-group row">
<label for="cat_id" class="col-sm-2 col-form-label">Type:</label>

                       <div class="col-sm-4">
    
                            <select name="cat_id" id="cat_id" class="form-control cat_id" required>
                              <option value="">Select Type</option>
                            <?php
                                foreach($catdtls as $catg)
                            { ?>
                                <option value="<?php echo $catg->sl_no; ?>"><?php echo $catg->cat_desc; ?></option>
                            <?php
                            } ?>
                            </select> 
                       </div>


                    </div> -->
            <!-- </div> -->
            <div>
                <?php

							foreach($mntend as $prod);{

							?>
                <input type="hidden" name="mnthenddt" style="width:80px" class="form-control required mnthenddt"
                    value="<?php echo $prod->mnthdt; ?>" id="mnthenddt" readonly>
                <?php

							}

							?>
            </div>
            <div class="form-group row">

                <label for="trans_dt" class="col-sm-2 col-form-label">Credit Note Date:</label>

                <div class="col-sm-4">
                    <input type="date" id="trans_dt" min="" name="trans_dt" value="<?php echo set_value('trans_dt'); ?>"
                        class="form-control mindate" required />
                </div>

                <!-- <label for="dr_amt" class="col-sm-2 col-form-label">Amount:</label> -->

                <div class="col-sm-4">
                    <!-- <input type="text" id="tot_amt" name="tot_amt" class="form-control" required /> -->
                    <input type="hidden" id="recpt_no" name="recpt_no" class="form-control" />
                </div>


            </div>


            <div class="form-group row">

                <label for="dr_amt" class="col-sm-2 col-form-label">Remarks:</label>

                <div class="col-sm-10">
                    <textarea id="remarks" name="remarks" class="form-control" required></textarea>

                </div>



            </div>

            <div class="form-header">

                <h4>Cr Note Details</h4>

            </div>
            <div class="row" style="margin: 5px;">

                <div class="form-group">

                    <table class="table table-striped table-bordered table-hover">

                        <thead>
                            <th style="text-align: center;width:100px">Type</th>

                            <th style="text-align: center;width:100px">Amount</th>

                            <th>
                                <button class="btn btn-success" type="button" id="addrow" style="border-left: 10px"
                                    data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i
                                        class="fa fa-plus" aria-hidden="true"></i></button></th>
                            </th>

                        </thead>

                        <tbody id="intro">
                            <tr>

                                <td>
                                    <select name="cat_id[]" style="width:350px" class="form-control cat_id" id="cat_id"
                                        required>

                                        <option value="">Select Type</option>
                                        <?php
                                foreach($catdtls as $catg)
                            { ?>
                                        <option value="<?php echo $catg->sl_no; ?>"><?php echo $catg->cat_desc; ?>
                                        </option>
                                        <?php
                            } ?>
                                    </select>
                                </td>


                                <td>
                                    <input type="text" name="tot_amt[]" id="tot_amt" style="width:130px;" class="form-control amt" value="" id="tot_amt" required>
                                </td>


                            </tr>


                        </tbody>

                        <tfoot>
                            <tr>
                                <td>
                                    Total:
                                </td>
                                <td colspan="2">
                                    <input name="total" style="width:150px;" id="total" class="form-control total"
                                        readonly>
                                </td>
                            </tr>
                        </tfoot>

                    </table>

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
<div id="overlay" style="display:none;">
        <div class="spinner"></div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var i = 0;
        $('#comp_id').change(function () {
            $('#overlay').fadeIn().delay(3000).fadeOut();
            $.get(

                '<?php echo site_url("drcrnote/f_get_sale_inv");?>',

                {

                    soc_id: $('#soc_id').val(),
                    comp_id: $('#comp_id').val()

                }

            ).done(function (data) {

                var string = '<option value="">Select Invoice</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string += '<option value="' + value.trans_do + '">' + value
                        .trans_do + '</option>'

                });

                $('#inv_no').html(string);


            });


        });

    });
</script>


<script>
    $(document).ready(function () {

        var i = 0;

        $('#inv_no').change(function () {
            $('#overlay').fadeIn().delay(1000).fadeOut();

            $.get(

                '<?php echo site_url("drcrnote/f_get_sale_invro");?>',

                {

                    soc_id: $('#soc_id').val(),
                    inv_no: $(this).val()

                }

            ).done(function (data) {

                // var string = '<option value="">Select Invoice</option>';

                // $.each(JSON.parse(data), function( index, value ) {

                //     string += '<option value="' + value.trans_do + '">' + value.trans_do + '</option>'

                // });

                // $('#inv_no').html(string);

                var string1 = '<option value="">Select Ro</option>';

                $.each(JSON.parse(data), function (index, value) {

                    string1 += '<option value="' + value.sale_ro + '">' + value
                        .sale_ro + '</option>'

                });

                $('#ro_no').html(string1);
            });


        });

    });
</script>

<script>
    $('.table tbody').on('keyup', '.amt', function () {

        var sum = 0;
        // let row = $(this).closest('tr');

        $("input[class *= 'amt']").each(function () {
            sum += parseFloat($(this).val());

        });
        $("#total").val(sum).toFixed(2);

    })

    $('.table tbody').on('change', '.cat_id', function () {
        var selval = $(this).val();
        var c = 0;
        $('.cat_id').each(function () {
            var select_val = $(this).val();
            if (selval == select_val) {
                c = c + 1;
            }
        });
        var tstval = $(this).find('option:selected').text(); //$('#cat_id option:selected').text();
        if (c > 1) {
            $("#submit").prop('disabled', true);
            alert(tstval + " Already selected");
        } else {
            $("#submit").prop('disabled', false);
        }


        // if($.inArray(selval, v) >= 0){ 
        //          alert('your alert'); 
        //          location.reload(); 
        //     }

    })

    // $('.cat_id').change(function () {
    //     alert($(this).val());
    // });


    $(document).ready(function () {
        $('#addrow').click(function () {
            $('.cat_id').each(function () {
                var select_val = $(this).val();
                // if(select_val==){
                //     alert)();
                // }
            });
            //alert(arr);
            $.get(

                '<?php echo site_url("drcrnote/f_get_cr_category");?>',

                // { 

                // comp_id: $('#comp_id').val(),
                // dist_id: $('#dist_id').val()

                // }

            ).done(function (data) {

                var string = '<option value="">Select Type</option>';
                //console.log(data);
                $.each(JSON.parse(data), function (index, value) {
                    var totalval =

                        string += '<option value="' + value.cat_id + '">' + value
                        .cat_id +
                        '</option>'

                });
                // For add row option
                // $('#addrow').click(function(){

                var newElement = '<tr>' +
                    '<td><select class="form-control cat_id"name="cat_id[]" id="cat_id" style="width:350px"   required><option value="">Select</option><?php foreach($catdtls  as $catg){?><option value="<?php echo $catg->sl_no;?>"><?php echo $catg->cat_desc;?></option> <?php }?></select></td>' +
                    ' <option value=" ' + string + '</option>' +
                    '</select> ' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="tot_amt[]" style="width:130px;" class="form-control amt" value= "" id="paid_amt" required>' +
                    '</td>' +
                    '<td>' +
                    '<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>' +
                    '</td>'
                '</tr>';

                $("#intro").append($(newElement));

            });
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
    $("#intro").on("click", "#removeRow", function () {
        var total = 0.00;
        $(this).parent().parent().remove();
        $('.amt').each(function () {
            total += parseFloat($(this).val()) ? parseFloat($(this).val()) : 0.00;
        })
        $("#total").val(total.toFixed(2));
    });

    $("#intro").on("change", ".amt", function () {
        var total = 0;
        $('.amt').each(function () {
            total += parseFloat($(this).val()) ? parseFloat($(this).val()) : 0.00;
        })
        $("#total").html(total.toFixed(2));



        if ($(this).val() <= 0) {
            alert('Amount should not be less than or equal to Zero !');
            $("#submit").prop('disabled', true);
            return false;
        } else {
            $("#submit").prop('disabled', false);
        }
    });


</script>
<script>
    $(document).ready(function () {

        // var today = new Date();
        // var curr_mnth = ("0" + (today.getMonth() + 1)).slice(-2);
        // var sdate = $('#mnthenddt').val();
        // //alert(sdate);
        // $('#trans_dt').prop('min', sdate);


    });
    $(".sch_cd").select2();
</script>
<script>
    $('.mindate').attr( 'min','<?=$date->end_yr ?>-<?php $month=$date->end_mnth+1; if($month==13){echo sprintf("%02d",1);}else{echo sprintf("%02d",$month);}?>-01');
</script>