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

</style>

<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 12px;}' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }   

</script>


<?php

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

?>        
    <div class="wraper">      

        <div class="col-md-6 container form-wraper">
    
            <form method="POST" 
                id="form"
                action="<?php echo site_url("fertilizer/cr_reporremain");?>" >

                <div class="form-header">
                
                    <h4>Credit Note Remain Amount</h4>
                
                </div>

                <div class="form-group row"> 

                    <label for="from_date" class="col-sm-3 col-form-label">Select Company:</label>

                    <div class="col-sm-8">

        <select class="form-control" name="comp_id" required>
    
       <option value="">Select a Company</option>

       <?php foreach($company as $comp){?>
       <option value="<?=$comp->COMP_ID?>"><?=$comp->COMP_NAME?></option>
        <?php }?>
      </select>
                    </div>

                </div>



                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Proceed" />

                    </div>

                </div>
            </form>    

        </div>

    </div>        

    <?php

    }
    
    else if($_SERVER['REQUEST_METHOD'] == 'POST') { 

        foreach($crnotes as $crs);
     
    ?>

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">
                        <h2>The West Bengal State Co-operative Marketing Federation Ltd.</h2>
                        <h4>Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</h4>
                        <h4>Credit Report of <b><?php echo $crs->COMP_NAME;?></b> Company</h4>
                    </div>
                    
                    <br>
                    
                    <table style="width: 100%;" id="example" >
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                               <th>District</th>
                                <th>Do Number</th>
                                <th>Do Date</th>
                                <th>Credit Amount</th>
                                <th>Credit Remain Amt</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
          
                               if(isset($crnotes)) {

                                  $i=1;
                                  foreach($crnotes as $cr) {

                            ?>

                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $cr->district_name; ?></td>
                                    <td><?php echo $cr->do_no; ?></td>
                                    <td><?php echo date("d/m/Y",strtotime($cr->do_dt)); ?></td>
                                     <td><?php echo $cr->tot_cr_amt; ?></td>
                                    <td><?php
                                            
                                               $lessdata =0;
                                            foreach($reamts as $remt){
                                                
                                          if($cr->do_no == $remt->ro_no && $cr->branch_id == $remt->branch_id){
                                                $lessdata += $remt->soc_amt;
                                                }

                                            }


                                    echo $cr->tot_cr_amt-$lessdata; 
                                         $lessdata =0;

                                    ?></td>
                                    
                                </tr>
 
                                <?php 
                                        
                                    }  ?>
                                  
                                
                         <?php        }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                     <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>

                </div>

            </div>
            
        </div>
        
    <?php

    }

    ?> 

     <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Stock of Product.xls"
                });
            });
        });
    </script>
