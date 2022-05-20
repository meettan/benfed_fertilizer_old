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
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title><style type="text/css">');


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

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Stock Point Wise Product Wise Stock Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
                        <h5 style="text-align:left"><label>Company: </label> <?php  if($all_data){ foreach($all_data as $prodtls);
                            echo $prodtls->Company;
                          }?></h5>
                          
                        <h5 style="text-align:left"><label>Product: </label> <?php  if($all_data){ foreach($all_data as $prodtls);
                            echo $prodtls->Product;
                          }?></h5>
                       <h5 style="text-align:left"><label>Stock Point: </label> <?php  if($all_data){ foreach($all_data as $prodtls);
                            echo $prodtls->secon_stk_pnt;
                          }?></h5>
                    </div>
                  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>
                              <!--   <th>Company</th> -->
                                <th>Purchase Date</th>
                                <th>Purchse RO No</th>
                                <th>Sale Date</th>
                                <th>Sale invoice No</th>
                                <!-- <th>Unit</th> -->
                                <th>Opening</th>
                                <th>Purchase during the period</th>
                                <th>Sale during the period</th>
                                <th>Closing</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $val =0;

                                        foreach($all_data as $prodtls){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                     <!-- <td class="report"><?php //echo $prodtls->short_name; ?> -->
                                   
                                    <td class="report">
                                    <b>
                                    <?php 
                                    if( $prodtls->Pruchase_qty>0)
                                    {
                                        echo $prodtls->Purchase_Date; 
                                    }
                                    ?> 
                                    </b>
                                    </td>
                                
                                    <td class="report"><b>
                                    <?php 
                                     if( $prodtls->Pruchase_qty>0)
                                     {
                                        echo $prodtls->Purchase_RO;
                                     }
                                    
                                     ?> 
                                     </b>
                                     </td>
                                    <td class="report"><?php echo $prodtls->sale_dt; ?> </td>
                                    <td class="report"><?php echo $prodtls->Sale_Ro; ?> </td>
                                    
                                     <!-- <td class="report"><?php if($prodtls->unit==3){
                                                  echo "Litre";
                                                }else if ($prodtls->unit==5){
                                                  echo "ML"; 
                                                }else if ($prodtls->unit==1){
                                                    echo "MT";
                                                }else if ($prodtls->unit==2){ 
                                                    echo "Kg";
                                                }else if ($prodtls->unit==4){ 
                                                    echo "Quintal";
                                                }else if ($prodtls->unit==6){
                                                    echo "Gm";
                                                }else if ($prodtls->unit==7){
                                                    echo "Pc";
                                                }
                                        ?>
                                     </td> -->
                                     
                                     <td class="report">
                                     <b>
                                     <?php 
                                    
                                     if( $prodtls->Pruchase_qty>0)
                                     {
                                     echo $prodtls->Opening_Stock;
                                     }
                                      ?> 
                                      </b>
                                      </td>
                                     <td class="report">
                                     <b>
                                     <?php 
                                      if( $prodtls->Pruchase_qty>0)
                                      {
                                     echo $prodtls->Pruchase_qty;
                                      }
                                      ?>
                                      </b>
                                     </td>
                                     <td class="report">
                                     <?php 
                                      if( $prodtls->Sale_qty>0)
                                      {
                                     echo $prodtls->Sale_qty;
                                      }
                                      ?> 

                                      </td>
                                     <td class="report">
                                     <?php
                             if( $prodtls->Pruchase_qty>0)   {
                                echo "<b>$prodtls->closing_Stock</b>"; 
                             }  elseif($prodtls->closing_Stock==0 ){
                                   
                                    echo "<font color='blue'><b>$prodtls->closing_Stock</font></b>"; 
                          
                                } else {
                                   
                                    echo $prodtls->closing_Stock; 
                          
                                }
                                     
                               
                                      
                                    
                                     
                                     ?>
                                     </td>
                                     
                                   
                                </tr>
 
                                <?php  
                                                        
                                    }
                                ?>

 
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

                </div>

            </div>
            
        </div>