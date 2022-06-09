<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="<?php echo base_url("/benfed.png"); ?>"> 
		<title>BENFED</title>
		<link href="<?php echo base_url("/assets/css/bootstrap.min.css");?>" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url("/assets/css/sb-admin.css");?>">
		<link rel="stylesheet" href="<?php echo base_url("/assets/css/select2.css");?>">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url("/assets/js/validation.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url("/assets/js/select2.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url("/assets/js/select2.min.js")?>"></script>
		<link href="<?php echo base_url("/assets/css/bootstrap-toggle.css");?>" rel="stylesheet">
		<script type="text/javascript" src="<?php echo base_url("/assets/js/table2excel.js")?>"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url("/assets/js/bootstrap-toggle.js")?>" ></script> 
        

        
    <style>
        .hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
        }
        .transparent_tag {

            background: transparent; 
            border: none;

        }
        .no-border {
            border: 0;
            box-shadow: none;
            width: 75px;
        }

        .tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
.dropdown {
    padding: 0 18px;
}
.dropdown-content {
   
    min-width: 215px;
  
}
.sub-dropdown-content {
   
    min-width: 215px;
 
}
    </style>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet"> 
    <link href="<?php echo base_url("/assets/css/apps.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("/assets/css/apps_newDashboard.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("/assets/css/res.css");?>" rel="stylesheet">
    
    
    </head>  
    <body id="page-top" style="background-color: #eff3f6;">
    
        <header class="header_class">
<ul class="header_top">
    <li><strong>Branch Name: </strong><?php if(isset($this->session->userdata['loggedin']['branch_name'])){ echo $this->session->userdata['loggedin']['branch_name'];}?></li>
    <li><strong>Financial Year: </strong><?php if(isset($this->session->userdata['loggedin']['fin_yr'])){ echo $this->session->userdata['loggedin']['fin_yr'];}?></li>
    <li><strong>User: </strong><?php if(isset($this->session->userdata['loggedin']['user_name'])){ echo $this->session->userdata['loggedin']['user_name'];}?></li>
    <li><strong>Module:</strong> Fertilizer Management</li>
    <li class="date"><strong>Date: </strong> <?php echo date("d-m-Y");?></li>
</ul>
</header>
    
        <nav class="navbar navbar-inverse bg-primary">
                <div class="col-sm-2 logo_sec_main">
                    <div class="logo_sec">
                    <img src="<?php echo base_url("/benfed.png");?>" />
                    </div>
                </div>
         <div class="col-sm-10 navbarSectio">

                    <div class="dropdown">
                    <div class="dropbtn">
                    <a href="<?php echo site_url("Fertilizer_Login/main");?>" style="color: white; text-decoration: none;"><i class="fa fa-home"></i> Home</a>
                    </div> 
                    </div>
                    
                    <?php if($this->session->userdata['loggedin']['user_type']!="U" /*&& $this->session->userdata['loggedin']['ho_flag']=="Y"*/){?>
					<?php if($this->session->userdata['loggedin']['user_type']!="U" && $this->session->userdata['loggedin']['ho_flag']=="Y"){?>  
					<div class="dropdown">
						<div class="dropdown">
							<div class="dropbtn">
								<i class="fa fa-university" aria-hidden="true"></i>
									Upload
								<i class="fa fa-angle-down"></i>
							</div>
							<div class="dropdown-content">
								  
								<div class="sub-dropdown">
								<a class="sub-dropbtn">IFFCO <i class="fa fa-angle-right" style="float: right;"></i></a>
								<div class="sub-dropdown-content">
								<a href="<?php echo site_url("fertilizer/Upload_csv/index");?>">Excel/Bill Upload</a> 
								<a href="<?php echo site_url("fertilizer/Upload_csv/viewupload");?>">View Bill</a>            
								</div>
							   </div>
						  </div>
					</div>
					</div>

                  <?php } ?>
                    <div class="dropdown">
                    
                        <div class="dropbtn">
                            <i class="fa fa-university" aria-hidden="true"></i>
                                Master
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="dropdown-content">
                          
                        <div class="sub-dropdown">
                             <?php if($this->session->userdata['loggedin']['user_type']!="U" && $this->session->userdata['loggedin']['ho_flag']=="Y"){?>
                            <a href="<?php echo site_url("source");?>">Company</a>
                            <a href="<?php echo site_url("measurement");?>">Unit</a>
                            <a href="<?php echo site_url("crCatg");?>">Credit Note Category</a>
                            <a href="<?php echo site_url("material");?>">Product</a>
                            <a href="<?php echo site_url("category");?>">Sale Rate Category</a>
                            <a href="<?php echo site_url("rateslab");?>">Sale Rate</a>
                            <a href="<?php echo site_url("BNK");?>">Bank Master</a>
                            <a href="<?php echo site_url("fomaster");?>">Fo Master</a> 
                            <?php }elseif($this->session->userdata['loggedin']['user_type']!="U" && $this->session->userdata['loggedin']['ho_flag']!="Y"){ ?>
                                <!-- <a href="<?php echo site_url("fomaster");?>">Fo Master</a>     -->
                           <a href="<?php echo site_url("customer");?>">Society/Stock Point</a>
                           <a href="<?php echo site_url("BNK");?>">Bank Master</a>
                            <!--<a href="<?php //echo site_url("finance/view_bank_master");?>">Bank</a>-->
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  
                    <div class="dropdown">
                        <div class="dropbtn">
                            <i class="fa fa-university" aria-hidden="true"></i>
                                Transaction
                              
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <?php if( $this->session->userdata['loggedin']['ho_flag']=="N"){?> 
                        <div class="dropdown-content">
                            <div class="sub-dropdown">
                              <a href="<?php echo site_url("stock/stock_entry");?>">Purchase</a>
                              <a href="<?php echo site_url("trade/sale");?>">Sale</a>
                              <a href="<?php echo site_url("adv/advancefilter");?>">Advance</a>
                              <a href="<?php echo site_url("drcrnote/dr_note");?>">Credit Note</a>
                              <a href="<?php echo site_url("socpay/society_payment");?>">Receive Payment</a>
                              <!-- <a href="<?php echo site_url("virtualpnt/virtual_stk_point");?>">Secondary Stock Point</a> -->
                            </div>
                        </div>
                        <?php } ?>

                        <?php if( $this->session->userdata['loggedin']['ho_flag']=="Y"){?> 
                            <div class="dropdown-content">
                            <a href="<?php echo site_url("adv/company_advance");?>">Advance To Company</a>
                            <div class="sub-dropdown">
                               <a class="sub-dropbtn">Credit Note <i class="fa fa-angle-right" style="float: right;"></i></a> 
                               <div class="sub-dropdown-content">
                               <a href="<?php echo site_url("drcrnote/cr_note");?>">Credit Note from Company </a>
                               <a href="<?php echo site_url("drcrnote/branch_crnote");?>">Branch Credit Note Realization</a>
                                </div>
                            </div>
                            <a href="<?php echo site_url("compay/company_payment");?>">Company Payment</a>
                            <div class="sub-dropdown">
                               <a class="sub-dropbtn">IRN Cancel<i class="fa fa-angle-right" style="float: right;"></i></a> 
                               <div class="sub-dropdown-content">
                               <a href="<?php echo site_url("irncan");?>">Within 24 Hours </a>
                             <a href="<?php echo site_url("irncancr");?>"> After 24 Hours </a>
                             </div>
                            </div>
                            <a href="<?php echo site_url("b2ccel");?>"> B2C Cancel </a>
                            </div>
                    <?php } ?>
                    </div> 
                    
                    <div class="dropdown">
                        <div class="dropbtn">
                            <i class="fa fa-university" aria-hidden="true"></i>
                                Report
                            <i class="fa fa-angle-down"></i>
                        </div> 
                        <div class="dropdown-content">
						    <?php if( $this->session->userdata['loggedin']['ho_flag']!="Y"){?>
                            <div class="sub-dropdown">
                               <a href="<?php echo site_url("fert/rep/rateslab");?>">Sale Rate Slab</a>
                            </div>
                            <div class="sub-dropdown">
                               <a class="sub-dropbtn">Stock <i class="fa fa-angle-right" style="float: right;"></i></a> 
                               <div class="sub-dropdown-content">
                                    <a href="<?php echo site_url("fert/rep/stkStmt");?>">Consolidated Stock</a>
                                    <a href="<?php echo site_url("fert/rep/stkScomp");?>">Companywise Stock</a>
                                    <a href="<?php echo site_url("fert/rep/stkstkpnt");?>">Stockpoint Wise Stock</a>
                                    <a href="<?php echo site_url("fert/rep/stkwsestprep");?>">Stock Point Wise Statement</a>
                                    <a href="<?php echo site_url("fert/rep/stkSprod");?>">Productwise Stock</a>
                                </div>
                            </div>
                            <div class="sub-dropdown">
                               <a class="sub-dropbtn">Register <i class="fa fa-angle-right" style="float: right;"></i></a> 
                               <div class="sub-dropdown-content">
                                    <a href="<?php echo site_url("fert/rep/saledelivery_reg");?>">Society Wise Delivery Register </a>
                                    <a href="<?php echo site_url("fert/rep/salecompdelivery_reg");?>">Company Wise Delivery Register </a>
                                </div>
                            </div>
							<?php } ?>
                            <div class="dropdown-content">
							   <?php if( $this->session->userdata['loggedin']['ho_flag']!="Y"){?>
                                 <div class="sub-dropdown">
								   <a class="sub-dropbtn">Purchase & Sale <i class="fa fa-angle-right" style="float: right;"></i></a> 
								   <div class="sub-dropdown-content">
									<a href="<?php echo site_url("fert/rep/stkSprodro");?>">RO Wise Purchase & Sale</a>
									<a href="<?php echo site_url("fert/rep/purrep");?>">Purchase Ledger</a>
									<a href="<?php echo site_url("fert/rep/salerep");?>">Sale Ledger</a>
									<a href="<?php echo site_url("fert/rep/salerepsoc");?>">Sale Ledger(Stock point Wise)</a>
									<a href="<?php echo site_url("fert/rep/ps_pl");?>">All Sale Purchase </a>
									<!-- <a href="<?php //echo site_url("fert/rep/salerep_psoc");?>">Society Wise Sale </a> -->
									</div>
                                 </div>
								<div class="sub-dropdown">
								 <a href="<?php echo site_url("fert/rep/cust_payblepaid");?>">Due Register</a> 
								 <a href="<?php echo site_url("fert/rep/soc_ledger");?>">Society Ledger</a>
							   
								</div>
                                <?php } ?>
                                
                                <?php if( $this->session->userdata['loggedin']['ho_flag']=="Y"){?>
                                <!--<div class="sub-dropdowncr"> -->
								<div class="sub-dropdown">
								<a class="sub-dropbtn">Credit Note Report <i class="fa fa-angle-right" style="float: right;"></i></a> 
									<div class="sub-dropdown-content">
									    <a href="<?php echo site_url("fert/rep/crnote_reliz_rep");?>"> Realization Report </a>
									    <a href="<?php echo site_url("fert/rep/crnoterep_ho");?>">Company Credit Note</a>
									    <a href="<?php echo site_url("fert/rep/crsummrep_ho");?>">District Wise Summary </a>
									</div>
                                </div>
								<a href="<?php echo site_url("fert/rep/brwse_constk");?>">Consolidated Stock</a>
								<a href="<?php echo site_url("fert/rep/stkScomp_all");?>">Monthly Report </a>
								<a href="<?php echo site_url("fert/rep/rateslabho");?>">Sale Rate Slab</a>
								<!--<div class="sub-dropdownbr"> -->
                                <div class="sub-dropdown">
                                   <a class="sub-dropbtn">Branch Wise Report <i class="fa fa-angle-right" style="float: right;"></i></a> 
								   <div class="sub-dropdown-content">
										<a href="<?php echo site_url("fert/rep/stkStmt_ho");?>">Branch Wise Consolidated Stock</a>
										<a href="<?php echo site_url("fert/rep/stkScomp_ho");?>">Branch Wise & Company wise Stock</a>
										<a href="<?php echo site_url("fert/rep/purrepbr");?>">Branch Wise Purchase</a>
										<a href="<?php echo site_url("fert/rep/salerepbr");?>">Branch Wise Sale</a>
									</div>
                                </div>
								<a href="<?php echo site_url("fert/rep/soc_wse_cr_dmd");?>"> Society wise Credit Note Demand.</a>
                                <?php if( $this->session->userdata['loggedin']['ho_flag']=="Y"){?> 
								<a href="<?php echo site_url("fert/rep/advance_report");?>"> Company Advance</a> 
                                <?php } ?>
								<a href="<?php echo site_url("fert/rep/soc_payblepaid");?>">Received From Society</a>
								
                                <?php if( $this->session->userdata['loggedin']['ho_flag']=="Y"){?> 
                                <div class="sub-dropdown">
                                   <a class="sub-dropbtn">Purchase & Sale Ledger <i class="fa fa-angle-right" style="float: right;"></i></a> 
								   <div class="sub-dropdown-content">
                                        <a href="<?php echo site_url("fert/rep/ps_pl_all_comp_dist");?>">Productwise & District</a>
                                        <a href="<?php echo site_url("fert/rep/ps_pl_all");?>">All Ledger</a>
									</div>
                                </div>
                                <?php } ?>

								<a href="<?php echo site_url("fert/rep/ps_soc");?>">District wise Distribution </a>
								<!-- <a href="<?php echo site_url("fert/rep/yrwisesale");?>">Year Wise Sale</a> -->
								<a href="<?php echo site_url("fert/rep/yrwssale");?>">Year Wise Sale</a>
								<!-- <a href="<?php echo site_url("fert/rep/yrcompwisesale");?>">Year Wise Company Wise Sale</a> -->
								<a href="<?php echo site_url("fert/rep/yrcompwssale");?>">Year Wise Company Wise Sale</a>
                               <div class="sub-dropdown">
                                   <a class="sub-dropbtn">GST Report <i class="fa fa-angle-right" style="float: right;"></i></a> 
								   <div class="sub-dropdown-content">
										<a href="<?php echo site_url("fert/rep/gstrep");?>">GST INOUT Report B2B</a>
									   <a href="<?php echo site_url("fert/rep/gstrepb2c");?>">GST INOUT Report B2C</a>
										<a href="<?php echo site_url("fert/rep/hsnsumryrep");?>">GST HSN Summery</a>
										<a href="<?php echo site_url("fert/rep/crngstreg");?>">GST CR Note Register</a>
										<a href="<?php echo site_url("fert/rep/crngstunreg");?>">GST CR Note UNRegister</a>
									</div>
                                </div>
								<?php } ?>
                            </div>
                        </div>
						
                    </div>

                    <div class="dropdown">
                        <div class="dropbtn">
                                <i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>
                                Setting
                                <i class="fa fa-angle-down"></i>
                            </div>
                            <div class="dropdown-content">
                            <a href="<?php echo site_url("profile") ?>">Change Password</a>
                            <?php  if($this->session->userdata['loggedin']['user_type']!="U"){
                                ?>
                            <a href="<?php echo site_url('admin/user'); ?>">Create User</a>
                            <?php }?>
                            </div>
                    </div>
                    <div class="dropdown">
                    <div class="dropdown">
                        <div class="dropbtn">
                            <a href="<?php echo site_url("Fertilizer_Login/logout") ?>" style="color: white; text-decoration: none;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                        </div>    
                    </div>    
                   </div>
            </div>
        </nav>
    <section>