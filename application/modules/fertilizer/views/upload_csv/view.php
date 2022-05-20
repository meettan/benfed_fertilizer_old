
<div class="innerPage">
	<div class="wrapper">
		<div class="col-sm-12"><?= strlen($this->session->flashdata('msg')) > 0 ? $this->session->flashdata('msg') : ''; ?>
           
            <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>File Upload</strong></h1>

            </div>

       
                    <div class="col-lg-12 container contant-wraper"> 
                    <!-- <div class="col-lg-9 col-sm-12"> -->
                        <h3>
                       <small> <a class="btn btn-primary" style="width: 130px;" href="<?= site_url() ?>/fertilizer/upload_csv/entry">Upload CSV File</a></small>
                        <span class="confirm-div" style="float:right; color:green;"></span>
                       </h3>
                        <table id="example" class="table table-striped table-bordered table tableCustom">
                            <thead>
                                <tr>
                                   
                                   <th>Invoice Date</th>
                                    <th>District</th>
                                    <th>Society</th>
                                    <th>Ro No</th>
									<th>Invoice No.</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>PDF File</th>
                                    <th style="visibility: hidden;"></th>
                                    <th style="visibility: hidden;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i = 0;
                            foreach($dmd_data as $dt){ ?>

                                <tr>
                                <td style="display:none;"><?=date('m',strtotime($dt->inv_dt)) ?></td>
                                <td style="display:none;"><?=date('Y',strtotime($dt->inv_dt)) ?></td>
                                    <td><?=date('d/m/Y',strtotime($dt->inv_dt)) ?></td>
                                    <td><?= $dt->dist ?></td>
                                    <td><?= $dt->soc ?></td>
                                    <td><?= $dt->ro_no ?></td>
                                    <td><?= $dt->inv_no ?></td>
                                    <td><?= $dt->prod ?></td>
                                    <td><?= $dt->qty ?></td>
                                    <td><?= $dt->amt ?></td>
                                    <td>
                                        <?php if($dt->file_name){
                         echo '<a href="' . base_url() . 'assets/pdf/' . $dt->file_name . '" target="_blank"> ' . $dt->file_name . '</a>';
                                        } else{
                                            ?>
                                            <form action="<?= site_url() ?>/fertilizer/upload_csv/upload_pdf" method="post" enctype='multipart/form-data'>
                                            <input type="hidden" name="ro_no" value="<?= $dt->ro_no ?>">
                                            <input type="file" name="file" id="file_<?= $i ?>">
                                            <button type="submit">Save</button>
                                        </form>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php $i++; } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
<!-- </div> -->

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers",
        // "scrollY": 250,
        // "scrollX": true
    } );
} );
</script>