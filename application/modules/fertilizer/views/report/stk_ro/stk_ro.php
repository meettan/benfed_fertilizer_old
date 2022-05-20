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
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title></title><style type="text/css">');


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
                        <h4> Stock Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
                        <h5 style="text-align:left"><label>Company: </label> <?php  if($all_data){ foreach($all_data as $prodtls);
                            echo $prodtls->Company;
                          }?></h5>
                        <h5 style="text-align:left"><label>Product: </label> <?php  if($all_data){ foreach($all_data as $prodtls);
                            echo $prodtls->Product;
                          }?></h5>
                           <h5 style="text-align:left"><label>Unit: </label>  <?php
                                      
                                      if($stkpoint->unit==1 ){
                                        echo "MTS" ;
                                      }elseif($stkpoint->unit==2){
                                        echo "KGS" ;
                                      }  elseif($stkpoint->unit==4){
                                        echo "QTL" ;
                                      }elseif($stkpoint->unit==6){
                                        echo "GMS" ;
                                      } elseif($stkpoint->unit==5){
                                        echo "MLT" ;
                                      }elseif($stkpoint->unit==3){
                                        echo "LTR" ;
                                      } ?></h5>
                           <h5 style="text-align:left"><label>Stock Point: </label> <?php echo $stkpoint->soc_name; ?></h5>
                           <h5 style="text-align:left"><label>Ro: </label> <?php echo $stkpoint->ro_no; ?></h5>
                           
                           <!-- <h5 style="text-align:left"><label>Ro: </label><?php echo "<a href='javascript:void(0); onclick=rodetails()'".$stkpoint->ro_no.">$stkpoint->ro_no</a>"; ?></h5> -->
                    </div>
                  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>
                               <th>Purchase Date</th>
                                <th>RO No</th>
                                <th>Society</th>
                                <th>Sale Date</th>
                                <th>Sale invoice No</th>
                                <th>Opening(MT/LTR)</th>
                                <th>Purchase during the period(MT/LTR)</th>
                                <th>Sale during the period(MT/LTR)</th>
                                <th>Closing(MT/LTR)</th>
                                <th>Container</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 
                                    $i = 1;
                                    $total = 0.00;
                                    $tot_purchase= 0.00;
                                    $tot_sale= 0.00;
                                    $val =0;
                                    $contain= 0.00;
                                    $purqty=0.00;
                                    $salqty=0.00;
                                    $clsqty=0.00;
                                    $opqty=0.00;
                                    $totlop=0.00;
                                    $totcls = (float) 0.0000;
                                    $bag=0.00;

                                        foreach($all_data as $prodtls){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                     <!-- <td class="report"><?php //echo $prodtls->short_name; ?> -->
                                    <td class="report">
                                    <b>
                                    <?php 
                                    if($prodtls->Pruchase_qty>0){
                                        echo date('d/m/Y',strtotime($prodtls->Purchase_Date));
                                    }
                                   
                                     ?> 
                                     </b>
                                    </td>
                                    <td class="report"><b><?php echo $prodtls->Purchase_RO; ?></b> </td>
                                    <td class="report"><b><?php echo $prodtls->soc_name; ?></b> </td>
                                    <td class="report">
                                    <?php 
                                     if( $prodtls->Sale_qty>0)
                                     {
                                    echo date('d/m/Y',strtotime($prodtls->sale_dt));
                                     }
                                     ?> 
                                     </td>
                                   
                                    <td><a href="<?= site_url('trade/saleedit?trans_do=' . $prodtls->Sale_Ro); ?>" target="_blank" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit"><?php echo $prodtls->Sale_Ro; ?>

                                       
                                    </a> 

                                </td>

                                     <td class="report"><b>
                                     <?php
                                      if($prodtls->Pruchase_qty>0){ 
                                    //  echo $prodtls->Opening_Stock; 
										  
										  
                                     if($stkpoint->unit==1){

                                        echo $prodtls->Opening_Stock; 
                                        $opqty=$prodtls->Opening_Stock;
                                        $totcls+=$opqty;
                                        
                                          }elseif($stkpoint->unit==2){
                                           echo ($prodtls->Opening_Stock)/1000; 
                                           $opqty=($prodtls->Opening_Stock)/1000;
                                           $totcls+=$opqty;
                                          }elseif($stkpoint->unit==4){
                                            echo ($prodtls->Opening_Stock)/10;
                                            $opqty=($prodtls->Opening_Stock)/10;
                                            $totcls+=$opqty;
                                          }elseif($stkpoint->unit==6){
                                          echo ($prodtls->Opening_Stock)/1000000;
                                           $opqty= ($prodtls->Opening_Stock)/1000000; 
                                           $totcls+=$opqty;
                                          }elseif($stkpoint->unit==3){
                                            echo $prodtls->Opening_Stock;
                                            $opqty=$prodtls->Opening_Stock;
                                            $totlop+=$opqty;
                                            $totcls+=$opqty;
                                        }elseif($stkpoint->unit==5){
                                            echo ($prodtls->Opening_Stock)*($stkpoint->QTY_PER_BAG)/1000; 
                                             $opqty=   ($prodtls->Opening_Stock)*($stkpoint->QTY_PER_BAG)/1000; 
                                             $totcls+=$opqty; 
                                        }

                                        //totcls=0.00;
                                      }
                                     ?> 
                                     </td>
                                    
                                     <td class="report">
                                     <b>
                                     <?php 
                                     if($prodtls->Pruchase_qty>0){
                                    //  echo $prodtls->Pruchase_qty; 
                                     if($stkpoint->unit==1){

                                        echo $prodtls->Pruchase_qty; 
                                        $purqty=$prodtls->Pruchase_qty;
                                        $totcls+=$purqty;
                                       
                                          }elseif($stkpoint->unit==2){
                                           echo ($prodtls->Pruchase_qty)/1000; 
                                           $purqty=($prodtls->Pruchase_qty)/1000;
                                           $totcls+=$purqty;
                                          }elseif($stkpoint->unit==4){
                                            echo ($prodtls->Pruchase_qty)/10;
                                            $purqty=($prodtls->Pruchase_qty)/10;
                                            $totcls+=$purqty;
                                          }elseif($stkpoint->unit==6){
                                           echo ($prodtls->Pruchase_qty)/1000000;
                                           $purqty= ($prodtls->Pruchase_qty)/1000000; 
                                           $totcls+=$purqty;
                                          }elseif($stkpoint->unit==3){
                                            echo $prodtls->Pruchase_qty;
                                            $purqty=$prodtls->Pruchase_qty;
                                            $totcls+=$purqty;
                                            
                                        }elseif($stkpoint->unit==5){
                                            echo ($prodtls->Pruchase_qty)*($stkpoint->QTY_PER_BAG)/1000; 
                                             $purqty=   ($prodtls->Pruchase_qty)*($stkpoint->QTY_PER_BAG)/1000; 
                                             $totcls+=$purqty; 
                                        }

                                    //  $tot_purchase +=$prodtls->Sale_qty;
                                    $tot_purchase +=$purqty;
                                     }
                                     ?>
                                     </b> </td>
                                     <td class="report">
                                     <?php 
                                       if($prodtls->Sale_qty>0){ 
                                    //  echo $prodtls->Sale_qty;
                                     if($stkpoint->unit==1){

                                        echo $prodtls->Sale_qty; 
                                        $salqty=$prodtls->Sale_qty;
                                        (float)$totcls -=(float)$salqty;
                                          }elseif($stkpoint->unit==2){
                                           echo ($prodtls->Sale_qty)/1000; 
                                           $salqty=($prodtls->Sale_qty)/1000;
                                           (float)$totcls -=(float)$salqty;
                                          }elseif($stkpoint->unit==4){
                                            echo ($prodtls->Sale_qty)/10;
                                            $salqty=($prodtls->Sale_qty)/10;
                                            (float)$totcls -=(float)$salqty;
                                          }elseif($stkpoint->unit==6){
                                           echo ($prodtls->Sale_qty)/1000000;
                                           $salqty= ($prodtls->Sale_qty)/1000000; 
                                           (float)$totcls -=(float)$salqty;
                                          }elseif($stkpoint->unit==3){
                                            echo $prodtls->Sale_qty;
                                            $salqty=$prodtls->Sale_qty;
                                            (float)$totcls -= (float)$salqty;
                                            
                                        }elseif($stkpoint->unit==5){
                                            echo ($prodtls->Sale_qty)*($stkpoint->QTY_PER_BAG)/1000; 
                                             $salqty=   ($prodtls->Sale_qty)*($stkpoint->QTY_PER_BAG)/1000; 
                                             $totcls -=$salqty; 
                                        }

                                     $tot_sale +=$salqty;
                                       }
                                      ?> 
                                      </td>

                                     <td class="report">
                                     <?php 
                                      if( $prodtls->Sale_qty>0)   {
                                    //  echo "<b>$prodtls->closing_Stock</b>"; 

                                     if($stkpoint->unit==1){

                                         //echo $prodtls->closing_Stock;
                                         if(strlen($totcls)>10){
                                          echo 0.00;
                                         
                                         }else{
                                          echo $totcls;
                                         } 
                                        $clsqty=$totcls;
                                        
                                         }elseif($stkpoint->unit==2){
                                            //echo ($prodtls->closing_Stock)/1000; 
                                            if(strlen($totcls)>10){
                                              echo 0.00;
                                             
                                             }else{
                                              echo $totcls;
                                             } 
                                           $clsqty=($totcls)/1000;
                                        
                                          }elseif($stkpoint->unit==4){
                                            //echo ($prodtls->closing_Stock)/10;
                                            if(strlen($totcls)>10){
                                              echo 0.00;
                                             
                                             }else{
                                              echo $totcls;
                                             } 
                                            $clsqty=($totcls)/10;
                                        
                                          }elseif($stkpoint->unit==6){
                                           //echo ($prodtls->closing_Stock)/1000000;
                                           if(strlen($totcls)>10){
                                            echo 0.00;
                                           
                                           }else{
                                            echo $totcls;
                                           } 
                                           $clsqty= ($totcls)/1000000; 
                                        
                                          }elseif($stkpoint->unit==3){
                                            if(strlen($totcls)>10){
                                              echo 0.00;
                                             
                                             }else{
                                              echo $totcls;
                                             } 
                                            $clsqty=$totcls;
                                            
                                        }elseif($stkpoint->unit==5){
                                            //echo ($prodtls->closing_Stock)*($stkpoint->qty_per_bag)/1000;
                                            if(strlen($totcls)>10){
                                              echo 0.00;
                                             
                                             }else{
                                              echo $totcls;
                                             } 
                                             $clsqty=   ($totcls)*($stkpoint->QTY_PER_BAG)/1000; 
                                           
                                        }
                                        // $totcls=0.00;
                                     $contain=$prodtls->closing_Stock;
                                     $total += $clsqty;
                                    }
                                    else{
                                        
                                    }
                                     ?>
                                      </td>
                                     
                                    <td class="report" type="text"colspan="8"id="container">
                                        <?php 
                                             if( $prodtls->Sale_qty>0)   {

                                              
                                                    if( $stkpoint->unit==1){
                                                      $bag=$stkpoint->QTY_PER_BAG;
                                                       echo ceil(number_format((float)($totcls*1000 )/$bag,3,'.',''));                                                      
                                                       //echo $bag;
                                                    }elseif($stkpoint->unit==2){
                                                      $bag=$stkpoint->QTY_PER_BAG;
                                                          echo ceil(number_format((float)( $totcls)/$bag,3,'.',''));  
                                                         // echo $bag;                                        
                                                    }elseif($stkpoint->unit==4){
                                                      $bag=$stkpoint->QTY_PER_BAG;
                                                        echo ceil(number_format((float)( $totcls*100)/$bag,3,'.',''));
                                                      // echo $bag;
                                                    }elseif($stkpoint->unit==6){
                                                      $bag=$stkpoint->QTY_PER_BAG;
                                                       echo ceil(number_format((float)( $totcls*1000)/$bag,3,'.',''));
                                                      // echo $bag;
                                                    }elseif($stkpoint->unit==3){
                                                      $bag=$stkpoint->QTY_PER_BAG;
                                                     echo ceil(number_format((float)( $totcls*1000)/$bag,3,'.',''));
                                                     //echo $totcls;
                                                    // echo $bag;
                                                    }elseif($stkpoint->unit==5){
                                                         $bag=$stkpoint->QTY_PER_BAG;
														//echo 'ddd';
                                                   echo ceil(number_format((float)( $totcls)/$bag,3,'.',''));
                                                  // echo $totcls;
                                                   //echo $bag;
                                            }

                                            // $contain=0.00;
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
                        <tfooter>
                            <tr>
                               <td class="report" colspan="6" style="text-align:right"><b>Total</b></td> 
                               <td class="report"><b><?=$totlop?></b></td>
                               <td class="report"><b><?=$tot_purchase?></b></td>
                               <td class="report"><b><?=$tot_sale?></b></td> 
                               
                                <!-- <td class="report"><?=$total?></td>   -->
                              <td></td>
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

      