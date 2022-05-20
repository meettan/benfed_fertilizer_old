<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 6px;

    font-size: 14px;
}

th {

    text-align: center;

}

tr:hover {background-color: #f5f5f5;}

.form-wraper {
    margin-bottom: 20px !important;
}

</style>


    
    <div class="wraper">      

        <div class="col-md-12 container form-wraper">
    
                 <form method="POST" id="form" action="<?php echo site_url("drcrnote/branch_crnote");?>" >

                <div class="form-header">
                
                    <h4>Inputs</h4>
                
                </div>

                <div class="form-group row">

                    <label for="from_dt" class="col-sm-2 col-form-label">From Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="from_date"
                               class="form-control required"
                               value="<?= $frm_dt; ?>"
                        />  

                    </div>

                </div>

                <div class="form-group row">

                    <label for="to_date" class="col-sm-2 col-form-label">To Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="to_date"
                               class="form-control required"
                               value="<?= $to_dt; ?>"
                        />  

                    </div>

                </div> 

                <div class="form-group row">

                    <label for="company" class="col-sm-2 col-form-label">Company:</label>

                    <div class="col-sm-6">

                            <select name="company" id="company" class="form-control" required>

                                    <option value="">Select Company</option>
                                <?php
                                    foreach($compdtls as $row){
										$selected = '';
										if($row->COMP_ID == $comp_id){
											$selected = 'selected';
										}
                                ?>

                                    <option value="<?php echo $row->COMP_ID;?>" <?= $selected; ?>><?php echo $row->COMP_NAME;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                       

                </div>

                </div> 

<div class="form-group row">

<label for="category" class="col-sm-2 col-form-label">Cr Note Type:</label>

<div class="col-sm-6">

        <select name="category" id="category" class="form-control" required>

                <option value="">Select Cr Note TYPE</option>
            <?php
                foreach($category as $crrow){
					$selected = '';
					if($crrow->sl_no == $catg){
						$selected = 'selected';
					}
            ?>

                <option value="<?php echo $crrow->sl_no;?>" <?= $selected; ?>><?php echo $crrow->cat_desc;?></option>
            <?php
                }
            ?>
        </select>
   

</div>

</div> 


    <div class="form-group row">

<label for="branch" class="col-sm-2 col-form-label">Branch:</label>

<div class="col-sm-6">

        <select name="branch" id="branch" class="form-control" required>

                <option value="">Select Branch</option>
            <?php
                foreach($branch as $row){
					$selected = '';
					if($row->district_code == $branch_id){
						$selected = 'selected';
					}
            ?>

                <option value="<?php echo $row->district_code;?>" <?= $selected; ?>><?php echo $row->district_name;?></option>
            <?php
                }
            ?>
        </select>
   

</div>

</div> 



                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" id="submit" name="submit" class="btn btn-info" value="Submit" />

                    </div>

                </div>

            </form>    

        </div>

        <!-- <div class="wraper">  -->
        <?php if(isset($_POST["submit"])){ ?>
            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-a  lign:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>RO Date Between: <?php echo $_SESSION['date']; ?></h4>
                        <!-- <h5 style="text-align:left"><label>Company: </label> <?php echo $comp_name->comp_name; ?></h5> -->
                        
                         <h5 style="text-align:left"><label>Company: </label> <?php 
                              if($sales){ foreach($sales as $sal);
                               echo $sal->comp_name;} ?></h5> 
                               <h5 style="text-align:left"><label>District: </label> <?php 
                              if($sales){ foreach($sales as $sal);
                               echo $sal->district_name;} ?></h5> 
                                 <h5 style="text-align:left"><label>Cr Note Category: </label> <?php 
                              if($sales){ foreach($sales as $sal);
                               echo $sal->cat_desc;} ?></h5>

                    </div>
                    <br>  
					<div class="row">
						<div class="col-8">&nbsp;</div>	
                        		
						<div class="col-2 pull-right">
							<button class="btn btn-primary"><b>Selected Total: </b><span id="selected_amt">0</span></button>
						</div>
						<div class="col-2 pull-right">
							<button class="btn btn-primary"><b>Actual Total: </b><span id="actual_amt"></span></button>
						</div>
                        <div class="col-2 pull-right">
                        <button name="check_all" type="button" class="check_all">Select All</button>
                        </div>
					</div>
					<br>
                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            <th>Sl No</th>

                            <th>Society Name</th>

                            <th>RO</th>

                             <th>RO Date</th>

                            <th>Cr Note Amount</th>

                            <th>Adjustment</th>
                            
                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $tot_amt = 0.00;
                            // $cgst    = 0.00;
                            // $sgst    = 0.00;
                            // $disc    = 0.00;
                            // $total   = 0.00;
                                if($sales){ 

                                    $i = 1;
                                    
                                   

                                    $val =0;
//var_dump($sales);exit;
                                        foreach($sales as $sal){
                            ?>

                                <tr class="rep">
                                    <td class="report"><?php echo $i++; ?></td>
                                    <td class="report"><?php echo $sal->soc_name; ?></td>
                                    <td class="report"><?php echo $sal->ro; ?></td>
                                    <td class="report"><?php echo date("d/m/Y",strtotime($sal->ro_dt)); ?></td>
                                   
                                    <td class="report" id="tot_amt_<?= $i; ?>"><?php echo $sal->tot_amt; 


                                    $tot_amt += $sal->tot_amt;
                                    ?>
                                    </td>              
                                   
                                   <td>
                  <input type="checkbox" class ="comp_adjflag" name="comp_adjflag[]" id="chk_<?= $i; ?>" value="<?= $sal->ro . ',' . $branch_id . ',' . $catg . ',' . $sal->tot_amt ; ?>" <?php if($sal->comp_adjflag == $sal->comp_adjflag) ?> onclick="select_amt('<?= $i; ?>')">
                </td>                                   
                                </tr>
 
                                <?php  
                                                        
                                    }
                              
                                       }
                                else{

                                    echo "<tr><td colspan='15' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>
                        <tfooter>
                            <tr>
                               <td class="report" colspan="4" style="text-align:Left"><b>Total</b></td>
                               <td class="tot"><b><?=$tot_amt?></b></td>
                              
 
                            </tr>
                        </tfooter>

                    </table>

                </div>   
                
                <!-- <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button> -->
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->
                <div class="form-group row" style="text-align: center;">

                <div class="col-sm-10">

                 <input type="button" id= "save" class="btn btn-info" value="Save" onclick="save()" />

                </div>
                </div>

            <!-- </div> -->
            <?php } ?>
        </div>

<!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script> -->

		
		<script>
			$(document).ready(function() {
				$('#actual_amt').text($('.tot').text());
			})
			function select_amt(id){
				if($('#chk_'+id).is(":checked")){
					$('#selected_amt').text(parseInt($('#selected_amt').text())+parseInt($('#tot_amt_'+id).text()));
				}else{
					var amt = parseInt($('#selected_amt').text())-parseInt($('#tot_amt_'+id).text())
					$('#selected_amt').text(amt > 0 ? amt : 0);
				}
			}
			function save(){
				var dt_arr = new Array();
				$('input[name="comp_adjflag[]"]:checked').each(function(){
					dt_arr.push($(this).val());
				});
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('/drcrnote/update_dr_cr_note'); ?>",
					data: {data: dt_arr},
					dataType: 'html',
					success: function (result) {
						console.log(result);
						if(result > 0){
							$('#submit').click();
						}else{
							alert('Something Went Wrong')
						}
					}
				});
			}
		</script>

        <script>
            var clicked = false;
$(".check_all").on("click", function() {
  $(".comp_adjflag").prop("checked", !clicked);
  clicked = !clicked;
  this.innerHTML = clicked ? 'Deselect' : 'Select';
});

        </script>
