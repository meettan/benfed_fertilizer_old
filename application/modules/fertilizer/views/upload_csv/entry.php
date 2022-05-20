<?php 
$attributes = array('enctype' => 'multipart/form-data', 'id' => 'UploadCsv');
$months = array();
$years = array();
?>  

<div class="innerPage">
	<div class="wrapper">
		<div class="col-sm-12 float-left portfolioRight"><?= strlen($this->session->flashdata('msg')) > 0 ? $this->session->flashdata('msg') : ''; ?>
            <!-- <div class="card-header">Oders</div> -->
            
                <div class="row">
                    <?= form_open('fertilizer/upload_csv/save', $attributes); ?>
                    <div class="col-lg-12 container contant-wraper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <h3>
                                        <label class="fieldTxtForm">Upload CSV</label>
                                        </h3>
                                        <input type="file" width="10" class="form-control fileBrowse" name="userfile" id="userfile" accept=".csv" onchange="triggerValidation(this)">
                                    </div>

                                    <br><br>

                                    
                                </div>
                                <div class="mt-2 ml-3 mb-2">
                                        <span style="color:red">**Download the excel from Sathi Portal.Change the format of Sale Amount filed to number and save the file in .csv format.</span>
                                    </div>
                                    
                            <div class="col-lg-12 container contant-wraper" style="display: none;" id="progress_bar">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6 mt-4">
                                    <button type="submit" class="btn btn-success float-right uploadBtn" id="submit">Upload</button>
                            </div>
                            <br>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
        </div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

<script>
    var regex = new RegExp("(.*?)\.(csv)$");

    function triggerValidation(el) {
        if (!(regex.test(el.value.toLowerCase()))) {
            el.value = '';
            alert('Only CSV File Format Allowed');
            $('#submit').attr('disabled', 'disabled');
        }else{
            $('#submit').removeAttr('disabled');
        }
    }
</script>

<script>
    $(document).ready(function(){
        // $('#UploadCsv').submit(function(event){
        //     alert('Hi');
        //     $('#progress_bar').show();
        //     $(this).ajaxSubmit({
        //         // target: '#progress_bar',
        //         beforeSubmit: function(){
        //             $('.progress-bar').width('0%');
        //         },
        //         uploadProgress: function(event, position, total, percentageComplete){
        //             $('.progress-bar').animate({
        //                 width: percentageComplete + '%'
        //             },
        //             {
        //                 duration: 3000
        //             });
        //         },
        //         success: function(data){
        //             console.log(data);
        //             window.location.href= "<?= site_url(); ?>/upload_csv"; // Put url to redirect
        //             // alert('uploaded successfully');
        //         }
        //     })
        // })

        $('#UploadCsv').ajaxForm({
            beforeSend: function(){
                $('#progress_bar').show();
                $('.progress-bar').width('0%');
            },
            uploadProgress: function(event, position, total, percentageComplete){
                $('.progress-bar').animate({
                    width: percentageComplete + '%'
                },
                {
                    duration: 3000
                });
            },
            complete: function(){
                window.location.href= "<?= site_url(); ?>/fertilizer/upload_csv";
            }
        });
    })
    
</script>