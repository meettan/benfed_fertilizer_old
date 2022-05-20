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
                        <h4>Stockpointwise Closing Stock As On : <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
                        

                    </div>
                  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Stock Point</th>

                                <th>Company</th>

                                <th>Product</th>

                                <th>Unit</th>

                                <th>Qty</th>

                                <th>Container</th>

                               </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($stocks){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $val =0;
                                    $totsld_qty=0.00;
                                    $totlqd_qty=0.00;
                                    $contain=0.00;

                                        foreach($stocks as $stock){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                           
                                    <td class="report"><?php echo $stock->soc_name; ?> </td>
                                    <td class="report"><?php echo $stock->COMP_NAME; ?> </td>
                                    <td class="report">
                                        <?php 
                                            foreach($product as $prod){
                                                if($stock->prod_id==$prod->prod_id){
                                                    echo $prod->PROD_DESC;
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td class="report">
                                        <?php
                                      
                                      if($stock->unit==1 ||$stock->unit==2 ||$stock->unit==4 || $stock->unit==6){
                                        echo "MTS" ;  
                                      }elseif($stock->unit==3||$stock->unit==5){
                                        echo "LTR" ;
                                      }
                                     
                                    
                                        ?>
                                     </td>
                                    <td class="report">
                                        <?php 
                                        if($stock->unit==1){

                                            echo $stock->qty; 
                                            $totsld_qty+=$stock->qty;
                                            $contain=$stock->qty;
                                           }elseif($stock->unit==2){
                                               echo ($stock->qty)/1000; 
                                               $totsld_qty+=($stock->qty)/1000;
                                               $contain=($stock->qty)/1000;
                                           }elseif($stock->unit==4){
                                               echo ($stock->qty)/10;
                                               $totsld_qty+=($stock->qty)/10;
                                               $contain=($stock->qty)/10;
                                           }elseif($stock->unit==6){
                                               echo ($stock->qty)/1000000;
                                               $totsld_qty+=($stock->qty)/1000000;
                                               $contain=($stock->qty)/1000000;
                                           }elseif($stock->unit==3){
                                               echo $stock->qty;
                                               $totlqd_qty+=$stock->qty;
                                               $contain=$stock->qty;
                                           }elseif($stock->unit==5){
                                               echo ($stock->qty)*($prod->qty_per_bag)/1000;  
                                               $totlqd_qty+=($stock->qty)*($prod->qty_per_bag)/1000;  
                                               $contain=($stock->qty)*($prod->qty_per_bag)/1000; 
                                           }
                                        // echo $stock->qty; 
                                        ?> 
                                        </td>

                                        
                                        <td class="report" type="text"colspan="8"id="container">
                                        <?php 
                                            // foreach($opening as $opndtls){
                                            //     if($prodtls->prod_id==$opndtls->prod_id){
                                                    if($stock->unit==1){

                                                        echo ceil(number_format((float)($contain*1000 )/$prod->qty_per_bag,3,'.',''));                                                      
                                                       
                                                    }elseif($stock->unit==2){
                                                           echo ceil(number_format((float)($contain*1000)/$prod->qty_per_bag,3,'.',''));                                          
                                                    }elseif($stock->unit==4){
                                                        echo ceil(number_format((float)($contain)*100/$prod->qty_per_bag,3,'.',''));
                                                       
                                                    }elseif($stock->unit==6){
                                                       echo ceil(number_format((float)($contain)*1000/$prod->qty_per_bag,3,'.',''));
                                                    }elseif($stock->unit==3){
                                                     echo ceil(number_format((float)($contain)/$prod->qty_per_bag,3,'.',''));
                                                  
                                                    }elseif($stock->unit==5){
                                                   echo ceil(number_format((float)($contain*1000)/$prod->qty_per_bag,3,'.',''));
                                                //     }
                                                // }
                                            }
                                            $contain=0.00;
                                            $containlqd=0.00;
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
                        <tfooter>
                            <tr>
                               <td class="report" colspan="5" style="text-align:left" bgcolor="silver" ><b>Summary</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Total</b></td>
                            </tr>

                            <tr>
                               <td class="report" colspan="5" style="text-align:left" bgcolor="silver"><b>Solid( MTS) </b></td> 
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totsld_qty?></td>
                            </tr>

                            <tr>
                               <td class="report" colspan="5" style="text-align:left" bgcolor="silver"><b>Liquid( LTR ) </b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $totlqd_qty?></td>
                            </tr>
                        </tfooter>
                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

                </div>

            </div>
            
        </div>