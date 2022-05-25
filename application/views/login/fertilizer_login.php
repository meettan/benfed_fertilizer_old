<!DOCTYPE html>
<html lang="en">
<head>
	<title>Benfed-Fertilizer</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="<?php //echo base_url("/assets/login/images/icons/favicon.ico")?>"/> -->
	<link rel="icon" href="<?php echo base_url("/benfed.png"); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/vendor/bootstrap/css/bootstrap.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/vendor/animate/animate.css")?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/vendor/css-hamburgers/hamburgers.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/vendor/animsition/css/animsition.min.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/vendor/select2/select2.min.css")?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/vendor/daterangepicker/daterangepicker.css")?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/css/util.css")?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/css/main.css")?>">
<!--===============================================================================================-->

<style>
	img {
	float: left;
	}
	p.title 
	{
		font: 15px arial, sans-serif;
	}
</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login/css/apps_login.css")?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login_page/css/apps.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login_page/css/apps_inner.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/login_page/css/res.css"); ?>">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<!--    font-family: 'Roboto', sans-serif;-->

</head>
<body>
	<header class="headerTop_DashLogin">
		<div class="wrapper_Dash" onclick="location.href = 'https://benfed.in/';">
			<div class="col-sm-3 float-left logo_Dash"><img src="<?php echo base_url("/assets/front_page/images/logo.png"); ?>" alt="" /></div>
			<div class="col-sm-9 float-left rightTxt_Dash">
				<h2>The W.B.S Co-Operative Marketing Federation Ltd (Benfed)<br>
					<span>Fertilizer Management</span>
				</h2>
			</div>
		</div>
	</header>
    
    <?php /*?><div class="navigationSecLogin">
		<div class="wrapper_Dash">
			<div class="col-sm-12">
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<!--	<li><a href="#">Old KMS</a></li>
					<li><a href="<?php //echo base_url(); ?>index.php/User_Login/notice">Notice</a></li> -->
					<li><a href="#">Contacts</a></li>
				</ul>
			</div>
		</div>
	</div><?php */?>
    
	<div class="daseboardContentArea_DashLogin daseboardPading_DashLogin">
		<div class="wrapper_Dash">
			<div class="wrap-login100">
				<form class="login100-form validate-form flex-sb flex-w" id="login" method="POST" action="<?php echo site_url("Fertilizer_Login/index") ?>">
					<!--<div class="login100_logo">
					<h2><img src="<?php //echo base_url('benfed.png'); ?>" alt="logo"></h2>
					<h3>The West Bengal  State Co-Operative Marketing Federation Ltd (Benfed)</h3>	
					</div>-->
                    
                    
                    <div class="login100_logo">
						<h2>Login</h2>
					</div>
					 <span class="loginMsg" style="color:red">
					 <?php echo $this->session->flashdata('login_error');?>
					</span> 
					
					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Please supply a valid User Id">
						<input class="input100" type="text" name="user_id" id="user_id"/>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Please supply password">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="user_pwd" />
						<span class="focus-input100"></span>
					</div>
					<div class="select_main">
					<div class="select_1">

							<select class="form-control" name="fin_yr" id="fin_yr">

								<option value ="">Please Select Financial Year</option>

								<?php

									foreach($fin_yr as $row){ ?>

										<option value="<?php echo $row->sl_no ?>"><?php echo $row->fin_yr; ?></option>
									<?php
										}
									?>

							</select>

					</div>

					<div class="select_2" > 

						<select class="form-control" name="branch_id" id="test" style="display:none" >
							<option value="" >Please Select Branch Name</option>
							<?php foreach($branch_data as $branch){ ?>
								<option value="<?php echo $branch->id; ?>" ><?php echo $branch->branch_name; ?></option>
							<?php } ?>
						</select>
					</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
    <footer class="footerSec_Dash">
            <div class="wrapper_Dash">
            
                <?php /*?><div class="col-sm-6 float-left mapSec"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.7375062895694!2d88.39095591548983!3d22.5140296852129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02714d6e5d2557%3A0x384d7dbe8ab31a73!2s3rd%20Floor%2C%201582%2C%20Rajdanga%20Main%20Rd%2C%20Kasba%20New%20Market%2C%20Rajdanga%2C%20Kasba%2C%20Kolkata%2C%20West%20Bengal%20700107!5e0!3m2!1sen!2sin!4v1614851691132!5m2!1sen!2sin" width="100%" height="175" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
                <div class="col-sm-6 float-left addressSec">
                    <h2>Location</h2>
                    <p>Southend Conclave, 3rd Floor, 1582 Rajdanga Main Road, <br>
                        Kolkata - 700 107</p>
                    <ul>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> 91 33 2441 4366/67</li>
                        <li><i class="fa fa-fax" aria-hidden="true"></i> +91 33 2441-4372</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@benfed.org">info@benfed.org</a></li>
                    </ul>
    
                </div><?php */?>
                
                <div class="col-sm-6 float-left addressSec">
    <p><strong>Location:</strong> Southend Conclave, 3rd Floor, 1582 Rajdanga Main Road,
                        Kolkata - 700 107</p>
    </div>
	<div class="col-sm-6 float-left addressSec">
				<ul>
		<li><i class="fa fa-phone" aria-hidden="true"></i> +91 33 2441 4366/67</li>
		<li><i class="fa fa-fax" aria-hidden="true"></i> +91 33 2441-4372</li>
		<li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@benfed.org">info@benfed.org</a></li>
		</ul>
		
	</div>
                
            </div>
        </footer>
        
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url("/assets/login/vendor/jquery/jquery-3.2.1.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("/assets/login/vendor/animsition/js/animsition.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("/assets/login/vendor/bootstrap/js/popper.js")?>"></script>
	<script src="<?php echo base_url("/assets/login/vendor/bootstrap/js/bootstrap.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("/assets/login/vendor/select2/select2.min.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("/assets/login/")?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url("/assets/login/vendor/daterangepicker/daterangepicker.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("/assets/login/vendor/countdowntime/countdowntime.js")?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url("/assets/login/js/main.js")?>"></script>

	<script>
	$('#user_id').keyup(function(e) { // <--- THIS IS THE CHANGE
 
 var user_id = $('#user_id').val();
 
  $.ajax({
  type: "POST",
  url: "<?php echo site_url("Fertilizer_Login/check_user") ?>",
  data: {user_id:user_id}, 
  dataType: "html",
  success: function(data){
	if(data=="A"){
	$('#test').show(data);
	$('#test').prop('required',true);
	}else{
		$('#test').hide(data);	
	}
  },
 // error: function() { alert("Error posting feed."); }
});

});
  </script>

	<script>
		$(document).ready(function(){
			$("#login").on('submit',function(){

				var kmyr = $("#fin_yr").val();

				if(kmyr == ""){
					alert("Please select financial year");
					return false;
				}
			});
		});

	</script>
</body>
</html>

