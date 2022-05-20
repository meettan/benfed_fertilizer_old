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
                action="<?php echo site_url("fertilizer/dr_reportdis");?>" >

                <div class="form-header">
                
                    <h4>Debit Report Of District</h4>
                
                </div>

                <div class="form-group row"> 

                    <label for="from_date" class="col-sm-3 col-form-label">Select District:</label>

                    <div class="col-sm-8">

        <select class="form-control" name="branch_id" required>
    
    <option value="">Select a District</option>

    <?php foreach($districts as $dist){?>
       <option value="<?=$dist->district_code?>"><?=$dist->district_name?></option>
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
     
    ?>

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">
                        <h2>The West Bengal State Co-operative Marketing Federation Ltd.</h2>
                        <h4>Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</h4>
                        <h4>Debit Report of <?php echo get_district_name($this->input->post('branch_id'));?></h4>

                    </div>
                    <br>
                    <table style="width: 100%;" id="example">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Society Name</th>
                                <th>Do Number</th>
                                <th>Total Amount</th>
                                <th>Society Paid</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
          
                               if(isset($sales)) {

                                  $i=1;
                                  foreach($sales as $sale) {

                            ?>

                                <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo $sale->soc_name; ?></td>
                                     <td><?php echo $sale->ro_no; ?></td>
                                     <td><?php echo $sale->tot_amt; ?></td>
                                     <td><?php echo $sale->soc_amt; ?></td>
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
