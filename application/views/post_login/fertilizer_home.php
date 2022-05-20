<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/slick/slick-theme.css">



<?php if( $this->session->userdata['loggedin']['ho_flag'] == "Y" && $this->session->userdata['loggedin']['user_type'] == "A"  ) { ?>
<div class="container-fluid">
<div class="daseboard_home_newAdmin">

<div class="fullWidthBotomPading">
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
<div class="threeBoxNewSmall">
<!-- <div class="value"><strong>&#2352;</strong>
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_purchase_day->tot_purchase_ho; 
        }else{
        echo $purchase_day->tot_purchase; 
}
?></div> -->
<div class="threeBoxImg darkBlue"><img src="<?=base_url()?>assets/images/boxIcon_a.png" alt=""></div>
    <div class="threeBoxTxt">
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
</div>
<div class="col-sm-4 float-left">
<div class="threeBoxNewSmall">
<div class="threeBoxImg yellowCol"><img src="<?=base_url()?>assets/images/boxIcon_b.png" alt=""></div>
    <div class="threeBoxTxt">
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
</div>
<div class="col-sm-4 float-left">
<div class="threeBoxNewSmall">
<div class="threeBoxImg yellowCol"><img src="<?=base_url()?>assets/images/boxIcon_collec.png" alt=""></div>
    <div class="threeBoxTxt">
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

</div>
</div>
</div>
</div>

<div class="col-sm-12 rightSideSec">
<div class="row">

<div class="sectionNew">
<div class="col-sm-12"><h2>District Wise Status</h2></div>

<div class="col-sm-12">
<div class="districWisSec">
<div class="districWisSecLeft districWisSecLeft_FullWidth">
<ul>

<li><a href="javascript:void(0)" onclick="brdaypurchase(339)">Bankura<i class="fa fa-arrow-right" aria-hidden="true" ></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(334)">Birbhum<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(329)">Coochbihar<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(331)">Dakshin Dinajpur<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(338)">Hooghly <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(328)">Jalpaiguri <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(332)">Malda <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(333)">Murshidabad<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(336)">Nadia <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(343)">North 24 Parganas <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(335)">Purba Burdwan (Bardhaman) <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(344)">Paschim Medinipur (West Medinipur) <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(345)">Purba Medinipur (East Medinipur) <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(343)">South 24 Parganas <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
<li><a href="javascript:void(0)" onclick="brdaypurchase(330)">Uttar Dinajpur<i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>


</ul>
</div>
<div class="districWisSecRight districWisSecRight_FullWidth">
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
<div class="col-sm-12"><h2 class="onClickOpen" onclick="expandDiv()">Company Wise Status  <span>(Click to Expand)</span>  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h2></div>
<div class="col-sm-12 accordianConten accoNotShow">
<div class="companyWisSec">
<div class="table-responsive tableFullWidth">
<table class="table table-striped tableCompany" >
<thead>
<tr>
<th scope="col">#SL No.</th>
<th scope="col">Company Name</th>
<th scope="col">Payment Done(<strong> &#2352; </strong>)</th>
<th scope="col">Payment Pending (<strong> &#2352; </strong>)</th>
</tr>
</thead>
<tbody>
<?php 
$tot_paid = 0.00;
$total_payble = 0.00;

?>
<tr>
<th scope="row">1</th>
<td>CIL</td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_paid_cil->tot_paid; 
    $tot_paid +=$ho_paid_cil->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div>

</td>
<td> <div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_purchase_cil->tot_paybl - $ho_paid_cil->tot_paid; 
    $total_payble +=$ho_purchase_cil->tot_paybl - $ho_paid_cil->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div></td>

</tr>
<tr>
<th scope="row">2</th>
<td>IFFCO</td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_paid_iffco->tot_paid; 
    $tot_paid +=$ho_paid_iffco->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div></td>
<td>
<div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_purchase_iffco->tot_paybl - $ho_paid_iffco->tot_paid; 
    $total_payble +=$ho_purchase_iffco->tot_paybl - $ho_paid_iffco->tot_paid;
        }else{
        echo '0'; 
      }
      ?></div>
</td>

</tr>
<tr>
<th scope="row">3</th>
<td>IPL</td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_paid_ipl->tot_paid; 
    $tot_paid +=$ho_paid_ipl->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div></td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_purchase_ipl->tot_paybl - $ho_paid_ipl->tot_paid; 
    $total_payble +=$ho_purchase_ipl->tot_paybl - $ho_paid_ipl->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div></td>

</tr>
<tr>
<th scope="row">4</th>
<td>JCF</td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_paid_jcf->tot_paid; 
    $tot_paid +=$ho_paid_jcf->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div></td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_purchase_jcf->tot_paybl - $ho_paid_jcf->tot_paid; 
    $total_payble +=$ho_purchase_jcf->tot_paybl - $ho_paid_jcf->tot_paid;
        }else{
        echo '0'; 
      }
      ?></div> 
</td>

</tr>
<tr>
<th scope="row">5</th>
<td>KCFL</td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_paid_kcfl->tot_paid; 
    $tot_paid +=$ho_paid_kcfl->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div></td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_purchase_kcfl->tot_paybl - $ho_paid_kcfl->tot_paid; 
    $total_payble +=$ho_purchase_kcfl->tot_paybl - $ho_paid_kcfl->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div> </td>

</tr>
<tr>
<th scope="row">6</th>
<td>KRIBHCO
</td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_paid_kribhco->tot_paid; 
    $tot_paid +=$ho_paid_kribhco->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div></td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_purchase_kribhco->tot_paybl - $ho_paid_kribhco->tot_paid; 
    $total_payble +=$ho_purchase_kribhco->tot_paybl - $ho_paid_kribhco->tot_paid;  
        }else{
        echo '0'; 
      }
      ?></div> </td>

</tr>
<tr>
<th scope="row">7</th>
<td>MIPL</td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_paid_mipl->tot_paid; 
    $tot_paid +=$ho_paid_mipl->tot_paid; 
        }else{
        echo '0'; 
      }
      ?></div></td>
<td><div class="value">
<?php
if($this->session->userdata['loggedin']['ho_flag']=="Y")
{
    echo $ho_purchase_mipl->tot_paybl - $ho_paid_mipl->tot_paid; 
    $total_payble +=$ho_purchase_mipl->tot_paybl - $ho_paid_mipl->tot_paid;  
        }else{
        echo '0'; 
      }
      ?></div>
</td>
</tr>
</tbody>
<tfoot>
        <tr>
            <td class="report" colspan="2" style="text-align:left"><b>Total</b></td> 
            
            
            <td class="report"><b><?=$tot_paid?></b></td>
            
            <td class="report"><b><?=$total_payble?></b></td>
          
            

        </tr>
</tfoot>

</table>
</div>
</div>
</div>

</div>

<div class="barPaiChartMain">

<div class="col-sm-6 float-left">
<div class="barChart">
<h2>Sale quantity(solid) For financial year <?php if($this->session->userdata['loggedin']['fin_yr']) echo $this->session->userdata['loggedin']['fin_yr']; ?></h2>
<?php

$dataPoints  = array();
foreach($distwisesale as $key) {
array_push($dataPoints,array("y" => "$key->qty", "label" => "$key->district_name"));
}
?>   
<canvas id="barChart" ></canvas> 
</div>
</div>

<div class="col-sm-6 float-left">
<div class="barChart">
<h2>Sale quantity(liquid) For financial year <?php if($this->session->userdata['loggedin']['fin_yr']) echo $this->session->userdata['loggedin']['fin_yr']; ?> </h2>
<?php

$dataPoints  = array();
foreach($distwisesale as $key) {
array_push($dataPoints,array("y" => "$key->qty", "label" => "$key->district_name"));
}
?>   
<canvas id="barChartl" ></canvas> 
</div>
</div>
</div>
<div class="sectionNew">
  <div class="stockPointSecTitle">
      <div class="col-sm-12">
        <h2>Stock Point</h2>
        <div class="selectBox">
        <select name="district" class="form-control district" id="district" >
        <option value="">Select District</option>
        <?php
        foreach($distdtls as $dist){
        ?>
        <option value="<?php echo $dist->district_code;?>"><?php echo $dist->district_name;?></option>
        <?php
        }
        ?>     
        </select>
        </div>
      </div>
  </div>
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
<tbody id='soc'>
<?php 
$tot_sld = 0.00;
$tot_lqd = 0.00;

?>
<tr>
<th scope="row"></th>
<td>0 <strong>mt</strong></td>
<td>0 <strong>L</strong></td>
</tr>
<tr>
<th scope="row"></th>
<td>0 <strong>mt</strong></td>
<td>0 <strong>L</strong></td>
</tr>
</tbody>
<tfooter>
        <tr>
            <td class="report" colspan="1" style="text-align:left"><b>Total</b></td> 
            <td id="f_totsld" class="report"><b></b></td>
            <td  id="f_totlqd"class="report"><b></b></td> 
        </tr>
</tfooter>
</table>
</div>
</div>
</div>
</div>
<div class="barPaiChartMain">
<div class="col-sm-12 float-left">
<div class="barChart">
<h2 style="text-align:center"><b>Payment collection For financial year <?php if($this->session->userdata['loggedin']['fin_yr']) echo $this->session->userdata['loggedin']['fin_yr']; ?></b></h2>
<canvas id="barChartBottom"></canvas>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php }elseif($this->session->userdata['loggedin']['branch_id']  == 342 && $this->session->userdata['loggedin']['user_type'] != "A" ) {  ?>

<div class="container-fluid">
	<div class="daseboard_home_new">
    <div class="col-sm-3 float-left">
    <div class="left_bar_new">
      <h2>Quick Links  <i class="fa fa-link" aria-hidden="true"></i></h2>
      <ul>
        <li><a href="https://benfed.in/fertilizer/index.php/stock/stock_entry">Purchase</a></li>
        <li><a href="https://benfed.in/fertilizer/index.php/trade/sale">Sale</a></li>
        <li><a href="https://benfed.in/fertilizer/index.php/socpay/society_payment">Customer Payment</a></li>
        <li> <a href="#">Stock Ledger</a></li>
        <li><a href="#">Day Book</a></li>
      </ul>
    </div>
    </div>
    
    <div class="col-sm-9 float-left rightSideSec">
    <div class="row">
    <div class="threeBoxNewmain">
    <div class="col-sm-6 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg redCol"><img src="<?=base_url()?>assets/images/boxIcon_d.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Opening</h2>
    <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt2">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
            </div>
    </div>
    </div>
    <div class="col-sm-6 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg darkBlue"><img src="<?=base_url()?>assets/images/boxIcon_a.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Purchase For The Day</h2>
     <p class="price"><span class="mt"><?php echo round($totsolidpur->qty,2);?><strong> MT</strong></span> <span class="mt2"><?php echo round($totliquidpur->qty,0);?><strong> LTR</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong><?=$ho_purchase_day->tot_purchase_ho?></span></p>
    </div>
    </div>
    
    </div>
    
    
    </div>
    
    <div class="threeBoxNewmain">
    
    <div class="col-sm-6 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg yellowCol"><img src="<?=base_url()?>assets/images/boxIcon_b.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Sale For The Day</h2>
     <p class="price"><span class="mt"><?php echo round($totsolidsale->qty,2);?><strong> MT</strong></span> <span class="mt2"><?php echo round($totliquidsale->qty,2);?><strong> LTR</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong><?=$ho_recvamt_day->tot_recvamt?></span></p>
    </div>
    </div>
    </div>
    
    <div class="col-sm-6 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg lightBlue"><img src="<?=base_url()?>assets/images/boxIcon_e.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Closing</h2>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt2">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    </div>
    </div>
    
    <div class="sectionNew">
    <div class="col-sm-12"><h2>District wise Stock</h2></div>
    
    <div class="col-sm-12">
    <div class="districWisSec">
    	<div class="districWisSecLeft">
        <ul>
        <li><a href="#">Jalpaiguri <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#">Jhargram <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#">Kalimpong <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#">Kolkata <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#">Malda <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#">Murshidabad</a></li>
        <li><a href="#">Nadia <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#">North 24 Parganas <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#">Paschim Medinipur (West Medinipur) <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#">Paschim (West) Burdwan (Bardhaman) <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        <li><a href="#">Purba Burdwan (Bardhaman) <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
        </ul>
        </div>
        <div class="districWisSecRightTable" style="width: 70%;">
        	
		<div class="table-responsive">
			<!--<table class="table table-striped tableCompany">
			  <thead>
				<tr>
				  <th scope="col" style="width:20%">#SL No.</th>
				  <th scope="col" style="width:30%">Within 24 Hours</th>
				  <th scope="col" style="width:30%">After 24 Hours</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td scope="row">1</td>
				  <td>Demo</td>
				  <td>Demo</td>
				</tr>
			  </tbody>
		  
			  <tfoot>
				<tr>
				  <th scope="col">Total</th>
				  <th scope="col"></th>
				  <th scope="col"></th>
				  <th scope="col"></th>
				</tr>
			  </tfoot>
		    </table>-->
            
            <table class="table table-striped tableCompany">
  <thead>
    <tr>
      <th scope="col">#SL No. </th>
      <th scope="col">Company name</th>
      <th scope="col">Solid stock</th>
      <th scope="col">liquid stock</th>
    </tr>
  </thead>
  <tbody>
    <tr>
	  <td> <strong>1</strong></td>
      <td scope="row">Company name 1</td>
      <td>650 <strong>mt</strong></td>
      <td>6500 <strong>L</strong></td>
    </tr>
    <tr>
	  <td> <strong>2</strong></td>
      <td scope="row">Company name 2</td>
      <td>650 <strong>mt</strong></td>
      <td>6500 <strong>L</strong></td>
    </tr>
    <tr>
	  <td> <strong>3</strong></td>
      <td scope="row">Company name 3</th>
      <td>650 <strong>mt</strong></td>
      <td>6500 <strong>L</strong></td>
    </tr>
  </tbody>
</table>
		</div>
        </div>
    </div>
    </div>
    </div>
    <div class="sectionNew">
    <div class="stockPointSecTitle">
    <div class="col-sm-12">
    <h2>Number Of IRN Cancel For The Day</h2>
    <div class="selectBox">
		<select name="district" class="form-control district" id="district" >
		<option value="">Select District</option>
		<?php
		foreach($distdtls as $dist){
		?>
		<option value="<?php echo $dist->district_code;?>"><?php echo $dist->district_name;?></option>
		<?php
		}
		?>     
		</select>
    </div>
    </div></div>
    
    <div class="col-sm-12">
    <div class="stockPointSec">
    <div class="table-responsive">
    <table class="table table-striped tablestockPoint">
			  <thead>
				<tr>
				  <th scope="col">#SL No.</th>
				  <th scope="col">Within 24 Hours</th>
				  <th scope="col">After 24 Hours</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td scope="row">1</td>
				  <td>Demo</td>
				  <td>Demo</td>
				</tr>
			  </tbody>
		  
			  <tfoot>
				<tr>
				  <th scope="col">Total</th>
				  <th scope="col"></th>
				  <th scope="col"></th>
				  <th scope="col"></th>
				</tr>
			  </tfoot>
		    </table>
    
	</div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
<?php } elseif( $this->session->userdata['loggedin']['ho_flag']  == 'N' && ($this->session->userdata['loggedin']['user_type'] == 'M' || $this->session->userdata['loggedin']['user_type'] == 'A')) {  ?>
  <div class="container-fluid" style="padding-top:25px;">
	<div class="daseboard_home_new">
    <div class="col-sm-3 float-left">
    <div class="left_bar_new">
    <h2>Quick Links  <i class="fa fa-link" aria-hidden="true"></i></h2>
    <ul>
    <li><a href="https://benfed.in/fertilizer/index.php/stock/stock_entry">Purchase</a></li>
    <li><a href="https://benfed.in/fertilizer/index.php/trade/sale">Sale</a></li>
    <li><a href="https://benfed.in/fertilizer/index.php/socpay/society_payment">Customer Payment</a></li>
    <li> <a href="#">Stock Ledger</a></li>
    <li><a href="#">Day Book</a></li>
    </ul>
       </div>
    </div>
    <div class="col-sm-9 float-left rightSideSec">
    <div class="row">
    <div class="threeBoxNewmain">
    <div class="col-sm-4 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg redCol"><img src="<?=base_url()?>assets/images/boxIcon_d.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Opening</h2>
	<?php     $i = 1;
                                    $total = 0.00;
                                    $val =0;
									$cls_baln=0.00;
                                    $sld_baln=0.00; 
                                    $lqd_baln=0.00; 
                                    $lqd_baln1=0.00;
                                    $opqtylqd=0.00;
                                    $purqtylqd=0.00;
                                    $saleqtylqd=0.00;
                                    $totlqd_pur= 0.00; 
                                    $totsld_pur=0.00;
                                    $totsld_sal=0.00;
                                    $totlqd_sal=0.00;
                                    $totsld_op=0.00;
                                    $totlqd_op=0.00;
                                    $totsld_cls=0.00;
                                    $totlqd_cls=0.00;
                                    $contain =0.00;
                                    $containlqd=0.00;
									 foreach($product as $prodtls){
	                                    foreach($opening as $opndtls){
                                                if($prodtls->prod_id==$opndtls->prod_id){
                                                       if($prodtls->unit==1){
                                                        $opqty=$opndtls->opn_qty;
                                                       $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==2){
                                                          $opqty=($opndtls->opn_qty)/1000; 
                                                          $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==4){
                                                          $opqty=($opndtls->opn_qty)/10;
                                                          $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==6){
                                                         $opqty=($opndtls->opn_qty)/1000000;
                                                         $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==3){
                                                          $opqty=$opndtls->opn_qty;
                                                          $opqtylqd=$opndtls->opn_qty;
                                                          $totlqd_op+=$opqtylqd;
                                                       }elseif($prodtls->unit==5){
                                                          $opqty=($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000; 
                                                          $opqtylqd=($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000;
                                                          $totlqd_op+=$opqtylqd;
                                                       }
                                                    $cls_baln+=$opqty;
                                                    $lqd_baln+=$opqtylqd;
                                                }
                                        }
									 }	
			?>								
    <p class="price"><span class="mt"><?=$totsld_op?><strong> MT</strong></span>
            <span class="lit"><strong> </strong><?=$totlqd_op?><strong> LTR</strong></span>
			</p>
    </div>
    </div>
    </div>
    <div class="col-sm-4 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg darkBlue"><img src="<?=base_url()?>assets/images/boxIcon_a.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Purchase For The Day</h2>
     <p class="price"><span class="mt"><?=round($totsolidpur->qty, 3);?><strong> mt</strong></span> <!--<span class="mt">250<strong> mt</strong></span> -->
            <span class="lit"><strong> </strong><?=round($totliquidpur->qty,3);?><strong> LTR</strong></span></p>
    </div>
    </div>
    </div>
    <div class="col-sm-4 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg yellowCol"><img src="<?=base_url()?>assets/images/boxIcon_b.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Sale For The Day</h2>
     <p class="price"><span class="mt"><?=round($brsalesolidtoday->qty, 3);?><strong> MT</strong></span>
            <span class="lit"><strong> </strong><?=round($brsaleliquidtoday->qty, 3);?><strong> LTR</strong></span></p>
    </div>
    </div>
    </div>
    </div>
    <div class="threeBoxNewmain">
    <div class="col-sm-4 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg lightBlue"><img src="<?=base_url()?>assets/images/boxIcon_e.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Closing</h2>
     <p class="price"><span class="mt"><?=$totsld_op+($totsolidpur->qty)-($brsalesolidtoday->qty)?><strong> MT</strong></span>
            <span class="lit"><strong> </strong><?=$totlqd_op+($totliquidpur->qty)-($brsaleliquidtoday->qty)?><strong> LTR</strong></span></p>
    </div>
    </div>
    </div>
	
	<div class="col-sm-4 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg yellowCol"><img src="<?=base_url()?>assets/images/boxIcon_collec.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Today's Collection</h2>
     <p class="price">
            <span class="lit"><strong> </strong><i class="fa fa-inr" aria-hidden="true"></i><?=$todaycollection->amt?></span></p>
    </div>
    </div>
    </div>
    <div class="col-sm-4 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg redCol"><img src="<?=base_url()?>assets/images/boxIcon_inv.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>No.of Invoices </h2>
     <p class="price"><span class="mt"><?=$b2b->cnt?><strong> B2B</strong></span>
            <span class="lit"><strong> </strong><?=$b2c->cnt?><strong> B2C</strong></span></p>
    </div>
    </div>
    </div>
    
    </div>
    
    <div class="sectionNew">
    <div class="stockPointSecTitle">
    <div class="col-sm-12">
    <h2>Society Wise Status</h2>
    <div class="selectBox">
    <select name="select_district" id="select_district">
  <option value="select_district">Select Society</option>
  <option value="district_name_1">District Name 1</option>
  <option value="district_name_2">District Name 2</option>
  <option value="district_name_3">District Name 3</option>
</select>
    </div>
    </div></div>
     <div class="col-sm-6 float-left">
    <div class="bloxkSec">
    <img src="<?=base_url()?>assets/images/icon_aa.png" alt="" class="bloxkSecImg">
    <h3>Quantity Sold</h3>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    
     <div class="col-sm-6 float-left">
    <div class="bloxkSec">
    <img src="<?=base_url()?>assets/images/icon_bb.png" alt="" class="bloxkSecImg">
    <h3>Payment Done for the years</h3>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    
    <div class="col-sm-6 float-left">
    <div class="bloxkSec bloxkSecMarginBotNone">
    <img src="<?=base_url()?>assets/images/icon_cc.png" alt="" class="bloxkSecImg">
    <h3>Total Number Of Register</h3>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    
     <div class="col-sm-6 float-left">
    <div class="bloxkSec bloxkSecMarginBotNone">
    <img src="<?=base_url()?>assets/images/icon_dd.png" alt="" class="bloxkSecImg">
    <h3>Total Number Of Stock Point </h3>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    
    </div>
    
    <?php /*?><div class="sectionNew">
    
     <div class="col-sm-6 float-left">
    <div class="bloxkSec">
    <img src="<?=base_url()?>assets/images/icon_cc.png" alt="" class="bloxkSecImg">
    <h3>Total Number Of Register</h3>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    
     <div class="col-sm-6 float-left">
    <div class="bloxkSec">
    <img src="<?=base_url()?>assets/images/icon_dd.png" alt="" class="bloxkSecImg">
    <h3>Total Number Of Stock Point </h3>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    </div><?php */?>
    
    <div class="sectionNew">
    <div class="col-sm-12"><h2 class="onClickOpen">Overdue List  <span>(Click to Expand)</span>  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h2></div>
    
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
    <div class="col-sm-12 float-left">
    <div class="barChart">
    <h2>Last 5 Years Sale</h2>
    <canvas id="barChartBottombranch"></canvas>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </div>
</div>

<?php }elseif($this->session->userdata['loggedin']['ho_flag']  == 'N' && $this->session->userdata['loggedin']['user_type'] == 'U' ){ ?>
  <div class="container-fluid" style="padding-top:25px; padding-bottom:25px;">
	<div class="daseboard_home_new">
    
    <div class="col-sm-3 float-left">
    <div class="left_bar_new">
    <h2>Quick Links  <i class="fa fa-link" aria-hidden="true"></i></h2>
    <ul>
    <li><a href="https://benfed.in/fertilizer/index.php/stock/stock_entry">Purchase</a></li>
    <li><a href="https://benfed.in/fertilizer/index.php/trade/sale">Sale</a></li>
    <li><a href="https://benfed.in/fertilizer/index.php/socpay/society_payment">Customer Payment</a></li>
    <li> <a href="#">Stock Ledger</a></li>
    <li><a href="#">Day Book</a></li>
    </ul>
       </div>
    </div>
    
    <div class="col-sm-9 float-left rightSideSec">
    <div class="row">
    <div class="threeBoxNewmain">
    <div class="col-sm-6 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg redCol"><img src="<?=base_url()?>assets/images/boxIcon_d.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Opening</h2>
    <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    </div>
    <div class="col-sm-6 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg darkBlue"><img src="<?=base_url()?>assets/images/boxIcon_a.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Purchase For The Day</h2>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    </div>
    
    </div>
    
    <div class="threeBoxNewmain">
    
    <div class="col-sm-6 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg yellowCol"><img src="<?=base_url()?>assets/images/boxIcon_b.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Sale For The Day</h2>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    </div>
    
    <div class="col-sm-6 float-left">
    <div class="threeBoxNewSmall">
    <div class="threeBoxImg lightBlue"><img src="<?=base_url()?>assets/images/boxIcon_e.png" alt=""></div>
    <div class="threeBoxTxt">
    <h2>Closing</h2>
     <p class="price"><span class="mt">250<strong> mt</strong></span> <span class="mt">250<strong> mt</strong></span>
            <span class="lit"><strong><i class="fa fa-inr" aria-hidden="true"></i> </strong>250</span></p>
    </div>
    </div>
    </div>
    </div>
    
    <div class="col-sm-12">
    <section class="sliderBotSlickSlider">
		<section class="sliderBot">
				<section class="bannerTxt"><img src="<?=base_url()?>assets/images/banner1.jpg" alt=""></section>
		</section>
		<section class="sliderBot">
				<section class="bannerTxt"><img src="<?=base_url()?>assets/images/banner2.jpg" alt=""></section>
		</section>
        <section class="sliderBot">
				<section class="bannerTxt"><img src="<?=base_url()?>assets/images/banner3.jpg" alt=""></section>
		</section>
    </section>
    </div>
    
    </div>
    </div>
    
    </div>
</div>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script> -->

<script>

var openBtn = document.querySelector('.onClickOpen');
	var accordianConten = document.querySelector('.accordianConten');
	// var accoNotShow = document.querySelector('.accoNotShow');
	// var accoShow = document.querySelector('.accoShow');

	openBtn.onclick = function(){

	if (accordianConten.style.transform === "scaleY(0)") {
		accordianConten.style.transform = "scaleY(1)";
		document.querySelector('.onClickOpen').style.margin = "0 0 18px 0";
		accordianConten.style.height = "auto";
	} else {
		accordianConten.style.transform = "scaleY(0)";
		
		setTimeout(close, 600);
		function close(){
		accordianConten.style.height = "0px";
		document.querySelector('.onClickOpen').style.margin = "0";
		}
	}

	}



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

<script>

$(document).ready(function(){

var i = 0;

$('#district').change(function(){

$.get( 

'<?php echo site_url("Fertilizer_Login/f_get_stkpnt");?>',

{ 

district: $(this).val()

}

).done(function(data){

var string = '';
var tot_sld = 0.00;
var tot_lqd = 0.00;
$.each(JSON.parse(data), function( index, value ) {

string += '<tr><td scope="row" name="soc">'+value.soc_name+'</td><td name="soc">'+value.qty_sld+'<strong>mt</strong></td><td name="soc">'+value.qty_lqd+' <strong>L</strong></td></tr>';
tot_sld +=parseFloat(value.qty_sld);
tot_lqd +=parseFloat(value.qty_lqd);
});
tot_sld=parseFloat(tot_sld).toFixed(3)
tot_lqd=parseFloat(tot_lqd).toFixed(3)
$('#soc').html(string);
$('#f_totsld').html(tot_sld);
$('#f_totlqd').html(tot_lqd);

});


});

});
</script>
<script>
<?php 
$label = '' ;
$qty   = '' ;
foreach($distwisesale as $key) {
$label .=  '"'.$key->district_name.'",';
$qty   .=   ($key->qty).',';

}

?>
window.onload = function () {

var data = {
labels: [<?php echo rtrim($label,",");?>],
datasets:[{
label: '# of Votes',
data: [<?php echo rtrim($qty,",");?>],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)',
'rgba(245, 86, 82, 0.2)',
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)',
'rgba(245, 86, 82, 1)',
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
}

    var barChartId = document.getElementById("barChart");
    if(barChartId){
		var ctxB = document.getElementById("barChart").getContext('2d');
		var myBarChart = new Chart(ctxB, {
		type: 'bar',
		data: data,
		options: {
		"hover": {
		"animationDuration": 0
		},
		"animation": {
		"duration": 1,
		"onComplete": function() {
		var chartInstance = this.chart,
		ctx = chartInstance.ctx;
		ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
		ctx.textAlign = 'center';
		ctx.textBaseline = 'bottom';

		this.data.datasets.forEach(function(dataset, i) {
		var meta = chartInstance.controller.getDatasetMeta(i);
		meta.data.forEach(function(bar, index) {
		var data = dataset.data[index];
		ctx.fillText(data, bar._model.x, bar._model.y - 5);
		});
		});
		}
		},
		legend: {"display": false},
		tooltips: {"enabled": false},
		scales:{
		yAxes: [{
		scaleLabel: {
		display: true,
		labelString: 'Unit in MT'
		}
		// ,
		// ticks: {
		// min: 0, // minimum value
		// max: 1600, // maximum value
		// stepSize: 200
		// }
		}]
		}   
		}


		});
    }
	
	<?php 
$label = '' ;
$qty   = '' ;
foreach($distwisesaleltr as $key) {
$label .=  '"'.$key->district_name.'",';
$qty   .=   ($key->qty).',';

}

?>
	var data = {
labels: [<?php echo rtrim($label,",");?>],
datasets:[{
label: '# of Votes',
data: [<?php echo rtrim($qty,",");?>],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)',
'rgba(245, 86, 82, 0.2)',
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)',
'rgba(245, 86, 82, 1)',
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
}
	
	var barChartId = document.getElementById("barChartl");
    if(barChartId){
		var ctxB = document.getElementById("barChartl").getContext('2d');
		var myBarChart = new Chart(ctxB, {
		type: 'bar',
		data: data,
		options: {
		"hover": {
		"animationDuration": 0
		},
		"animation": {
		"duration": 1,
		"onComplete": function() {
		var chartInstance = this.chart,
		ctx = chartInstance.ctx;
		ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
		ctx.textAlign = 'center';
		ctx.textBaseline = 'bottom';

		this.data.datasets.forEach(function(dataset, i) {
		var meta = chartInstance.controller.getDatasetMeta(i);
		meta.data.forEach(function(bar, index) {
		var data = dataset.data[index];
		ctx.fillText(data, bar._model.x, bar._model.y - 5);
		});
		});
		}
		},
		legend: {"display": false},
		tooltips: {"enabled": false},
		scales:{
		yAxes: [{
		scaleLabel: {
		display: true,
		labelString: 'Unit in LTR'
		}
		// ,
		// ticks: {
		// min: 0, // minimum value
		// max: 1600, // maximum value
		// stepSize: 200
		// }
		}]
		}   
		}

		});
    }

}
<?php 
$label = '' ;
$qty   = '' ;
foreach($distamt as $key) {
$label .=  '"'.$key->district_name.'",';
$qty   .=   ($key->paid_amt).',';

}

?>
var data = {
labels: [<?php echo rtrim($label,",");?>],
datasets:[{
label: '# of Votes',
data: [<?php echo rtrim($qty,",");?>],
backgroundColor: [
'rgba(255, 99, 132, 0.8)',
'rgba(54, 162, 235, 0.8)',
'rgba(255, 206, 86, 0.8)',
'rgba(75, 192, 192, 0.8)',
'rgba(153, 102, 255, 0.8)',
'rgba(255, 159, 64, 0.8)',
'rgba(245, 86, 82, 0.8)',
'rgba(255, 99, 132, 0.8)',
'rgba(54, 162, 235, 0.8)',
'rgba(255, 206, 86, 0.8)',
'rgba(75, 192, 192, 0.8)',
'rgba(153, 102, 255, 0.8)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)',
'rgba(245, 86, 82, 1)',
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
}

var barChartBottomId = document.getElementById("barChartBottom");
if(barChartBottomId){
var ctxC = document.getElementById("barChartBottom").getContext('2d');

var myBarChartBot = new Chart(ctxC, {
type: 'bar',
data: data,
options: {
"hover": {
"animationDuration": 0
},
"animation": {
"duration": 1,
"onComplete": function() {
var chartInstance = this.chart,
ctx = chartInstance.ctx;
ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
ctx.textAlign = 'center';
ctx.textBaseline = 'bottom';

this.data.datasets.forEach(function(dataset, i) {
var meta = chartInstance.controller.getDatasetMeta(i);
meta.data.forEach(function(bar, index) {
var data = dataset.data[index];
ctx.fillText(data, bar._model.x, bar._model.y - 5);
});
});
}
},
legend: {"display": false},
tooltips: {"enabled": false},
scales:{
yAxes: [{
scaleLabel: {
display: true,
labelString: 'Amount in crores'
}
}]
}   
}

});
}
$('#toggleDiv').hide(); 
function expandDiv(){
if($('#toggleDiv').is(':visible')){
$('#toggleDiv').slideUp("slow");
}
else{
$('#toggleDiv').slideDown("slow");
}
}
</script>
<script src="<?php //echo base_url("/assets/js/custom.js")?>" ></script> 
<?php /*?><script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/slick/slick.js" type="text/javascript" charset="utf-8"></script><?php */?>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/slick/slick.js" type="text/javascript" charset="utf-8"></script>

<script>
$(".sliderBotSlickSlider").slick({
        dots: false,
        vertical: false,
        centerMode: false,
		 autoplay: true,
        slidesToShow:1,
		speed: 500,
		 arrows : true,
        slidesToScroll: 1
});
</script>