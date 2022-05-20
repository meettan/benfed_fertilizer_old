<?php if( $this->session->userdata['loggedin']['ho_flag'] == "Y" && $this->session->userdata['loggedin']['user_type'] == "A"  ) { ?>
<div class="container-fluid">
	<div class="daseboard_home_new">
    
    <div class="col-sm-3 float-left">
    <div class="left_bar_new">
    <h2>Quick Links  <i class="fa fa-link" aria-hidden="true"></i></h2>
    <?php if( $this->session->userdata['loggedin']['ho_flag'] == "N" ) { ?>
    <ul>
    
    <li><a href="<?php echo site_url('stock/stock_entry'); ?>">Purchase</a></li>
    <li><a href="<?php echo site_url('trade/sale'); ?>">Sale</a></li>
    <li><a href="<?php echo site_url('socpay/society_payment'); ?>">Customer Payment</a></li>
    <li> <a href="#">Stock Ledger</a></li>
    <li><a href="#">Day Book</a></li>
    </ul>
    <?php }else{ ?>
     
     <ul>
     <li><a href="<?php echo site_url('category'); ?>">Add Category</a></li>
     <li><a href="<?php echo site_url('fertilizer/sale_rate'); ?>">Sale Rate Entry</a></li>
     <li><a href="<?php echo site_url('material'); ?>">Add Product</a></li>
     <li><a href="<?php echo site_url('compay/company_payment'); ?>">Company Payment</a></li>
     <li><a href="#">Stock ledger</a></li>
    <!-- <li><a href="<?php echo site_url('report/chequestatus'); ?>">Cheque Status</a></li>
     <li><a href="<?php echo site_url('report/returncheque'); ?>">Return Cheque</a></li> -->
     </ul>
 
    <?php } ?>
     </div>
     </div>
    
    <div class="col-sm-9 float-left rightSideSec">
    <div class="row">
    <div class="threeBoxNewmain">
    <div class="col-sm-4 float-left">
    <div class="threeBoxNewSmall threeBoxNewSmall_a">
    <!-- <div class="value"><strong>&#2352;</strong>
                <?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_purchase_day->tot_purchase_ho; 
                            }else{
                            echo $purchase_day->tot_purchase; 
                    }
                ?></div> -->
    <h2>Purchase For The Day</h2>
    <p class="price"><span class="mt"> <?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_purchase_daysld->tot_purchase_ho; 
                            }else{
                            echo $purchase_day->tot_purchase; 
                    }
                ?><strong> mt</strong></span>
                
            <span class="lit"><?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_purchase_daylqd->tot_purchase_ho; 
                            }else{
                            echo $purchase_day->tot_purchase; 
                    }
                ?><strong>L</strong></span></p>
    </div>
    </div>
    <div class="col-sm-4 float-left">
    <div class="threeBoxNewSmall threeBoxNewSmall_b">
    <h2>Sale For The Day</h2>
     <p class="price"><span class="mt"><?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_sale_daysld->tot_sale_ho; 
                            }else{
                            echo $sale_day->tot_sale; 
                    }
                ?><strong>mt</strong></span>
            <span class="lit"><?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_sale_daylqd->tot_sale_ho; 
                            }else{
                            echo $sale_day->tot_sale; 
                    }
                ?> <strong>L</strong></span></p>
    </div>
    </div>
    <div class="col-sm-4 float-left">
    <div class="threeBoxNewSmall threeBoxNewSmall_c">
    <h2>Collection For The Day</h2>
     <p class="price">
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong><?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_recvamt_day->tot_recvamt; 
                            }else{
                            echo '0'; 
                    }
                ?></span></p>
    </div>
    </div>
    
    </div>
    
    <div class="sectionNew">
    <div class="col-sm-12"><h2>District Wise Status</h2></div>
    
    <div class="col-sm-12">
    <div class="districWisSec">
    	<div class="districWisSecLeft">
        <ul>
       
        <li><a href="#" onclick="brdaypurchase(339)">Bankura<i class="fa fa-arrow-right" aria-hidden="true" ></i></a></li>
        <li><a href="#" onclick="brdaypurchase(334)">Birbhum<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(329)">Coochbihar<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(331)">Dakshin Dinajpur<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(338)">Hooghly <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(328)">Jalpaiguri <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <!-- <li><a href="#" onclick="brdaypurchase(348)">Jhargram <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(342)">Kolkata <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li> -->
        <li><a href="#" onclick="brdaypurchase(332)">Malda <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(333)">Murshidabad<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(336)">Nadia <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(343)">North 24 Parganas <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(335)">Purba Burdwan (Bardhaman) <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(344)">Paschim Medinipur (West Medinipur) <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(345)">Purba Medinipur (East Medinipur) <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(343)">South 24 Parganas <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#" onclick="brdaypurchase(330)">Uttar Dinajpur<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
      
       
        </ul>
        </div>
        <div class="districWisSecRight">
        	<div class="col-sm-4 float-left">
            <div class="districWisSecRightBox">
            <h3>Day Purchase </h3>
            <div class="valueSec">
            <span class="mt" id="dp">0.00 <strong>mt</strong></span>
            <span class="lit" id="dpl">0.00 <strong>L</strong></span>
            </div>
            </div>
            </div>
            <div class="col-sm-4 float-left">
            <div class="districWisSecRightBox">
            <h3>Day Sale </h3>
            <div class="valueSec">
            <span class="mt" id="ds">0.00 <strong>mt</strong></span>
            <span class="lit"  id="dsl">0.00 <strong>L</strong></span>
            </div>
            </div>
            </div>
            <div class="col-sm-4 float-left">
            <div class="districWisSecRightBox">
            <h3>Day Collection(Including Advance and Cr Note Adjustment) </h3>
            <!-- <div class="valueSec"> -->
            <!-- <span class="mt" id="recvdy">250 </span> -->
            <!-- <span class="lit">250 <strong>L</strong></span> -->
            <p class="price">
            <span class="lit" id="recvdy" STYLE="font-size:18.0pt ;"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>
            </span></p>
            <!-- </div> -->
            </div>
            </div>
            
            <div class="col-sm-4 float-left">
            <div class="districWisSecRightBox">
            <h3>Monthly Purchase </h3>
            <div class="valueSec">
            <span class="mt" id="dpm">0.00 <strong>mt</strong></span>
            <span class="lit" id="dpmlqd">0.00 <strong>L</strong></span>
            </div>
            </div>
            </div>
            <div class="col-sm-4 float-left">
            <div class="districWisSecRightBox">
            <h3>Monthly Sale </h3>
            <div class="valueSec">
            <span class="mt" id="sm">0.00 <strong>mt</strong></span>
            <span class="lit" id="smlqd">0.00 <strong>L</strong></span>
            </div>
            </div>
            </div>
            <div class="col-sm-4 float-left">
            <div class="districWisSecRightBox">
            <h3>Monthly Collection </h3>
            <!-- <div class="valueSec"> -->
            <!-- <span class="mt" id="recvmnth">250 </span> -->
            <!-- <span class="lit">250 <strong>L</strong></span> -->
            <p class="price">
            <span class="lit" id="recvmnth" STYLE="font-size:18.0pt ;"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>
            </span></p>
            <!-- </div> -->
            </div>
            </div>
            
            <div class="col-sm-4 float-left">
            <div class="districWisSecRightBox">
            <h3>Yearly Purchase </h3>
            <div class="valueSec">
            <span class="mt" id="pyr">0.00 <strong>mt</strong></span>
            <span class="lit" id="pyrlq">0.00 <strong>L</strong></span>
            </div>
            </div>
            </div>
            <div class="col-sm-4 float-left">
            <div class="districWisSecRightBox">
            <h3>Yearly Sale </h3>
            <div class="valueSec">
            <span class="mt" id="syr">0.00 <strong>mt</strong></span>
            <span class="lit" id="syrlq">0.00 <strong>L</strong></span>
            </div>
            </div>
            </div>
            <div class="col-sm-4 float-left">
            <div class="districWisSecRightBox">
            <h3>Yearly Collection </h3>
            <p class="price">
            <span class="lit" id="recvyr" STYLE="font-size:18.0pt ;"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>
            </span></p>
            <!-- <div class="valueSec"> -->
            <!-- <span class="mt" id="recvyr">250 </span> -->
            <!-- <span class="lit">250 <strong>L</strong></span> -->
            <!-- </div> -->
            </div>
            </div>
        </div>
    </div>
    </div>
    
    </div>
    
    <div class="sectionNew">
    <div class="col-sm-12"><h2 class="onClickOpen">Company Wise Status  <span>(Click to Expand)</span>  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h2></div>
    
    <div class="col-sm-12 accordianConten accoNotShow">
    <div class="companyWisSec">
    <div class="table-responsive">
    <table class="table table-striped tableCompany">
  <thead>
    <tr>
      <th scope="col">#SL No.</th>
      <th scope="col">Company Name</th>
      <th scope="col">Payment Done</th>
      <th scope="col">Payment Pending</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
	</div>
    </div>
    </div>
    
    </div>
    
    <div class="barPaiChartMain">
    <div class="col-sm-8 float-left">
    <div class="barChart">
    <h2>Stock Point</h2>
    
    <canvas id="barChart" ></canvas>
    </div>
    </div>
    
    <div class="col-sm-4 float-left">
    <div class="paiChart">
    <h2>Stock Point</h2>
    <canvas id="pieChart"></canvas>
    </div>
    </div>
    </div>
    
    
    
    
    <div class="sectionNew">
    <div class="stockPointSecTitle">
    <div class="col-sm-12">
    <h2>Stock Point</h2>
    <div class="selectBox">
    <select name="select_district" id="select_district">
  <option value="select_district">Select District</option>
  <option value="district_name_1">District Name 1</option>
  <option value="district_name_2">District Name 2</option>
  <option value="district_name_3">District Name 3</option>
</select>
    </div>
    </div></div>
    
    <div class="col-sm-12">
    <div class="stockPointSec">
    <div class="table-responsive">
    <table class="table table-striped tablestockPoint">
  <thead>
    <tr>
      <th scope="col">Stock Point  </th>
      <th scope="col">Solid Qty</th>
      <th scope="col">Liquid Qty</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Company name 1</th>
      <td>650 <strong>mt</strong></td>
      <td>6500 <strong>L</strong></td>
    </tr>
    <tr>
      <th scope="row">Company name 2</th>
      <td>650 <strong>mt</strong></td>
      <td>6500 <strong>L</strong></td>
    </tr>
    <tr>
      <th scope="row">Company name 3</th>
      <td>650 <strong>mt</strong></td>
      <td>6500 <strong>L</strong></td>
    </tr>
  </tbody>
</table>
	</div>
    </div>
    </div>
    
    </div>
    
    
    <div class="barPaiChartMain">
    <div class="col-sm-12 float-left">
    <div class="barChart">
    <h2>Stock Point</h2>
    <canvas id="barChartBottom"></canvas>
    </div>
    </div>
    </div>
    
    </div>
    </div>
    
    </div>
</div>

<?php } ?>

<?php if( $this->session->userdata['loggedin']['ho_flag'] == "N" ) { ?>

<div class="daseboard_home">
    <div class="col-sm-3 float-left">
    <div class="left_bar">
    <h2>Quick Links  <i class="fa fa-link" aria-hidden="true"></i></h2>
<?php if( $this->session->userdata['loggedin']['ho_flag'] == "N" ) { ?>
    <ul>
    <li><a href="<?php echo site_url('stock/stock_entry'); ?>">Purchase</a></li>
    <li><a href="<?php echo site_url('trade/sale'); ?>">Sale</a></li>
    <li><a href="<?php echo site_url('socpay/society_payment'); ?>">Customer Payment</a></li>
    <li> <a href="#">Stock Ledger</a></li>
    <li><a href="#">Day Book</a></li>
  <!--  <li><a href="<?php echo site_url('paddys/transactions/f_delivery');?>">CMR Delivery</a></li>
    <li> <a href="<?php echo site_url('paddys/transactions/f_wqsc');?>">WQSC</a></li> -->
    </ul>
   <?php }else{ ?>
     
    <ul>
    <li><a href="<?php echo site_url('category'); ?>">Add Category</a></li>
    <li><a href="<?php echo site_url('fertilizer/sale_rate'); ?>">Sale Rate Entry</a></li>
    <li><a href="<?php echo site_url('material'); ?>">Add Product</a></li>
    <li><a href="<?php echo site_url('compay/company_payment'); ?>">Company Payment</a></li>
    <li><a href="#">Stock ledger</a></li>
   <!-- <li><a href="<?php echo site_url('report/chequestatus'); ?>">Cheque Status</a></li>
    <li><a href="<?php echo site_url('report/returncheque'); ?>">Return Cheque</a></li> -->
    </ul>

   <?php } ?>
    </div>
    </div>

    <div class="col-sm-9 float-left" style="z-index:-1;">
    <div class="daseboardNav"><a href="#">Dashboard</a>  /  Overview </div>

    <div class="row daseSmBoxMain">
		
    <div class="col-sm-4">
        <div class="daseSmBox">
            <div class="subBox">
                <div class="icon"><img src="<?php echo base_url('assets/images/box_f_a.png'); ?>"></div>
                <div class="value"><strong>&#2352;</strong>
                <?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_purchase_day->tot_purchase_ho; 
                            }else{
                            echo $purchase_day->tot_purchase; 
                    }
                ?></div>
            </div>
        <h3>Purchase For The Day</h3>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="daseSmBox">
            <div class="subBox">
                <div class="icon2"><img src="<?php echo base_url('assets/images/box_b.png'); ?>"></div>
                <div class="value"><strong>&#2352;</strong>
                <?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_purchase_month->tot_purchase_ho; 
                            }else{
                            echo $purchase_month->tot_purchase; 
                    }
                ?></div>
            </div>
        <h3>Purchase For The Month</h3>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="daseSmBox">
            <div class="subBox">
                <div class="icon3"><img src="<?php echo base_url('assets/images/box_c.png'); ?>"></div>
               <div class="value"><strong>&#2352;</strong>
                <?php
                    if($this->session->userdata['loggedin']['ho_flag']=="Y")
                        {
                            echo $ho_purchase_yr->tot_purchase_ho; 
                                }else{
                                echo $purchase_yr->tot_purchase; 
                        }
                    ?></div>
            </div>
        <h3>Purchase For The Year</h3>
        </div>
    </div>
			

    <div class="col-sm-4">
        <div class="daseSmBox">
            <div class="subBox">
                <div class="icon4"><img src="<?php echo base_url('assets/images/box_d.png'); ?>"></div>
               <div class="value"><strong>&#2352;</strong>
                <?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_sale_day->tot_sale_ho; 
                            }else{
                            echo $sale_day->tot_sale; 
                    }
                ?></div>
            </div>
        <h3>Sale For The Day</h3>
        </div>
    </div>
			
    <div class="col-sm-4">
        <div class="daseSmBox">
            <div class="subBox">
                <div class="icon5"><img src="<?php echo base_url('assets/images/box_f_e.png'); ?>"></div>
                <div class="value"><strong>&#2352;</strong>
                <?php
                  if($this->session->userdata['loggedin']['ho_flag']=="Y")
                    {
                        echo $ho_sale_month->tot_sale_ho; 
                            }else{
                            echo $sale_month->tot_sale; 
                    }
                ?></div>
            </div>
        <h3>Sale For The Month</h3>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="daseSmBox">
            <div class="subBox">
                <div class="icon6"><img src="<?php echo base_url('assets/images/box_f.png'); ?>"></div>
                <div class="value"><strong>&#2352;</strong>
                <?php
                    if($this->session->userdata['loggedin']['ho_flag']=="Y")
                        {
                            echo $ho_sale_yr->tot_sale_ho; 
                                }else{
                                echo $sale_yr->tot_sale; 
                        }
                    ?></div>
            </div>
        <h3>Sale For The Year</h3>
        </div>
    </div>


    </div>

    </div>

</div>
<?php } ?>
<!-- <script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }
</script> -->

<script>
  function brdaypurchase(br_id){
    //   alert(br_id);
    $.ajax({
	  type: "POST",
	  url: "<?php echo site_url("Fertilizer_Login/f_br_purchase") ?>",
	  data: {br_id:br_id},
      
	  success: function(data){
// alert(JSON.parse(data).tot_pur);
console.log(data);
        var data = JSON.parse(data);

		$('#dp').html(data.tot_pur);
         $('#dpl').html(data.tot_purlqd);
         $('#ds').html(data.tot_sale);
         $('#dsl').html(data.tot_salelqd);
         $('#dpm').html(data.tot_mth_pur);
         $('#dpmlqd').html(data.tot_mth_purlqd);
         $('#sm').html(data.tot_mth_sal);
         $('#smlqd').html(data.tot_mth_salq);
         $('#pyr').html(data.tot_puryr);
         $('#pyrlq').html(data.tot_puryrlq);
         $('#syrlq').html(data.tot_salyrlq);
         $('#syr').html(data.tot_salyr);
         $('#recvdy').html(data.tot_recvday);
         $('#recvmnth').html(data.tot_recvmnth);
         $('#recvyr').html(data.tot_recvyr);
       
        
	  }
     
	 // error: function() { alert("Error posting feed."); }
    
    });
  }
</script>