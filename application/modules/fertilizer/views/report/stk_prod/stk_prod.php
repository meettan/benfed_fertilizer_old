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
                        <h4>Stock Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="width:100%; display: inline-block;">
                        
                        <span style="float:left; text-alignment:left;"><label>District: </label> <?php echo $branch->district_name; ?></span>
                        <span style="float:right; text-alignment:left;"><label>Product: </label> <?php  if($product){ foreach($product as $prodtls);echo $prodtls->prod_desc;}?></span>
                    
                    </h5>
                    <h5 style="width:100%; display: inline-block;">
                    <span style="float:left; text-alignment:left;"><label>Company: </label> <?php  if($product){ foreach($product as $prodtls);echo $prodtls->short_name;}?></span>
                    <span style="float:right; text-alignment:right;">
                        <label>Unit: </label> <?php  if($product){ foreach($product as $prodtls);echo $prodtls->unit_name;}?></span>
                    
                    </h5>
                        
                    </div>
                  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Ro</th>

                                <th>Opening</th>

                                <th>Purchase during the period</th>

                                <th>Sale during the period</th>

                                <th>Closing</th>

                                <th>Container</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $total_sale = 0.00;
                                    $total_pur =0.00;
                                    $tot_op =0.00;
                                    $val =0;
                                    $purqty =0.00;
                                    $opqty = 0.00;
                                    $saleqty = 0.00;
                                    $contain =0.00;
                                    $temp_tot =0.00;

                                    foreach($product as $prodtls){

                                            foreach($opening as $opndtls){
                                                if($prodtls->ro_no==$opndtls->ro_no){
                                                   if($prodtls->unit==1){
                                                       $opqty=$opndtls->opn_qty;
                                                      }elseif($prodtls->unit==2){
                                                         $opqty=($opndtls->opn_qty)/1000; 
                                                      }elseif($prodtls->unit==4){
                                                         $opqty=($opndtls->opn_qty)/10;
                                                      }elseif($prodtls->unit==6){
                                                        $opqty=($opndtls->opn_qty)/1000000;
                                                      }elseif($prodtls->unit==3){
                                                         $opqty=$opndtls->opn_qty;
                                                      }elseif($prodtls->unit==5){
                                                         $opqty=($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000; 
                                                      }

                                                   $temp_tot +=$opqty;
                                            }
                                        }
                                        foreach($purchase as $purdtls){
                                            if($prodtls->ro_no==$purdtls->ro_no){
                                                if($prodtls->unit==1){
                                                    $purqty=$purdtls->tot_pur;
                                                   }elseif($prodtls->unit==2){
                                                      $purqty=($purdtls->tot_pur)/1000; 
                                                   }elseif($prodtls->unit==4){
                                                      $purqty=($purdtls->tot_pur)/10;
                                                   }elseif($prodtls->unit==6){
                                                     $purqty=($purdtls->tot_pur)/1000000;
                                                   }elseif($prodtls->unit==3){
                                                      $purqty=$purdtls->tot_pur;
                                                   }elseif($prodtls->unit==5){ 
                                                      $purqty=($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000; 
                                                   }
                                                $temp_tot +=$purqty;
                                            }
                                            
                                        }

                                        foreach($sale as $saledtls){
                                            if($prodtls->ro_no==$saledtls->sale_ro){
                                                if($prodtls->unit==1){ 
                                                    $saleqty=$saledtls->tot_sale;
                                                   }elseif($prodtls->unit==2){ 
                                                      $saleqty=($saledtls->tot_sale)/1000; 
                                                   }elseif($prodtls->unit==4){
                                                     
                                                      $saleqty=($saledtls->tot_sale)/10;
                                                   }elseif($prodtls->unit==6){
                                                    
                                                     $saleqty=($saledtls->tot_sale)/1000000;
                                                   }elseif($prodtls->unit==3){
                                                    
                                                      $saleqty=$purdtls->tot_sale;
                                                   }elseif($saledtls->unit==5){
                                                   
                                                      $saleqty=($saledtls->tot_sale)*($prodtls->qty_per_bag)/1000; 
                                                   }
                                                $temp_tot +=$saleqty;
                                            }
                                        }

                                        if($temp_tot > 0){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                     <td class="report"><?php echo $prodtls->ro_no; ?>
                                     <td class="report opening" id="opening">
                                        <?php 
                                            foreach($opening as $opndtls){
                                                 if($prodtls->ro_no==$opndtls->ro_no){
                                                    if($prodtls->unit==1){

                                                        echo $opndtls->opn_qty; 
                                                        $opqty=$opndtls->opn_qty;
                                                       }elseif($prodtls->unit==2){
                                                          echo ($opndtls->opn_qty)/1000; 
                                                          $opqty=($opndtls->opn_qty)/1000; 
                                                       }elseif($prodtls->unit==4){
                                                          echo ($opndtls->opn_qty)/10;
                                                          $opqty=($opndtls->opn_qty)/10;
                                                       }elseif($prodtls->unit==6){
                                                         echo ($opndtls->opn_qty)/1000000;
                                                         $opqty=($opndtls->opn_qty)/1000000;
                                                       }elseif($prodtls->unit==3){
                                                          echo $opndtls->opn_qty;
                                                          $opqty=$opndtls->opn_qty;
                                                       }elseif($prodtls->unit==5){
                                                        echo ($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000; 
                                                          $opqty=($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000; 
                                                       }

                                                    $tot_op +=$opqty;
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report purchase" id="purchase">
                                        <?php 
                                            foreach($purchase as $purdtls){
                                                if($prodtls->ro_no==$purdtls->ro_no){
                                                    if($prodtls->unit==1){

                                                        echo $purdtls->tot_pur; 
                                                        $purqty=$purdtls->tot_pur;
                                                       }elseif($prodtls->unit==2){
                                                          echo ($purdtls->tot_pur)/1000; 
                                                          $purqty=($purdtls->tot_pur)/1000; 
                                                       }elseif($prodtls->unit==4){
                                                          echo ($purdtls->tot_pur)/10;
                                                          $purqty=($purdtls->tot_pur)/10;
                                                       }elseif($prodtls->unit==6){
                                                         echo ($purdtls->tot_pur)/1000000;
                                                         $purqty=($purdtls->tot_pur)/1000000;
                                                       }elseif($prodtls->unit==3){
                                                          echo $purdtls->tot_pur;
                                                          $purqty=$purdtls->tot_pur;
                                                       }elseif($prodtls->unit==5){
                                                        echo ($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000; 
                                                          $purqty=($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000; 
                                                       }
                                                    // echo $purdtls->tot_pur;
                                                    //$total_pur +=$purdtls->tot_pur;  
                                                    $total_pur +=$purqty;
                                                }
                                                
                                            }
                                        ?>
                                     </td>
                                     <td class="report sale" id="sale">
                                        <?php 
                                            foreach($sale as $saledtls){
                                                if($prodtls->ro_no==$saledtls->sale_ro){
                                                    if($prodtls->unit==1){

                                                        echo $saledtls->tot_sale; 
                                                        $saleqty=$saledtls->tot_sale;
                                                       }elseif($prodtls->unit==2){
                                                          echo ($saledtls->tot_sale)/1000; 
                                                          $saleqty=($saledtls->tot_sale)/1000; 
                                                       }elseif($prodtls->unit==4){
                                                          echo ($saledtls->tot_sale)/10;
                                                          $saleqty=($saledtls->tot_sale)/10;
                                                       }elseif($prodtls->unit==6){
                                                         echo ($saledtls->tot_sale)/1000000;
                                                         $saleqty=($saledtls->tot_sale)/1000000;
                                                       }elseif($prodtls->unit==3){
                                                          echo $saledtls->tot_sale;
                                                          $saleqty=$purdtls->tot_sale;
                                                       }elseif($saledtls->unit==5){
                                                        echo ($saledtls->tot_sale)*($prodtls->qty_per_bag)/1000; 
                                                          $saleqty=($saledtls->tot_sale)*($prodtls->qty_per_bag)/1000; 
                                                       }

                                                    // echo $saledtls->tot_sale;
                                                    // $total_sale +=$saledtls->tot_sale;  
                                                    $total_sale +=$saleqty;
                                                }
                                            }
                                        ?>
                                     </td>

                                     <td class="report closing" id="closing">
                                        <?php 
                                            
                                           foreach($opening as $opndtls){
                                            if($prodtls->ro_no==$opndtls->ro_no){
                                                if($prodtls->unit==1){

                                                    echo $opndtls->cls_qty; 
                                                    $clqty=$opndtls->cls_qty;
                                                    $contain= $clqty;
                                                   }elseif($prodtls->unit==2){
                                                      echo ($opndtls->cls_qty)/1000; 
                                                      $clqty=($opndtls->cls_qty)/1000; 
                                                      $contain= $clqty;
                                                   }elseif($prodtls->unit==4){
                                                      echo ($opndtls->cls_qty)/10;
                                                      $clqty=($opndtls->cls_qty)/10;
                                                      $contain= $clqty;
                                                   }elseif($prodtls->unit==6){
                                                     echo ($opndtls->cls_qty)/1000000;
                                                     $clqty=($opndtls->opn_qty)/1000000;
                                                     $contain= $clqty;
                                                   }elseif($prodtls->unit==3){
                                                      echo $opndtls->cls_qty;
                                                      $clqty=$opndtls->cls_qty;
                                                      $contain= $clqty;
                                                   }elseif($prodtls->unit==5){
                                                    echo ($opndtls->cls_qty)*($prodtls->qty_per_bag)/1000; 
                                                      $clqty=($opndtls->cls_qty)*($prodtls->qty_per_bag)/1000; 
                                                      $contain= $clqty;
                                                   }



                                                // echo $opndtls->cls_qty;
                                                // $total +=$opndtls->opn_qty;
                                                $total +=$clqty;
                                            }
                                        }
                                        ?>
                                     </td>
                                     <td class="report" type="text"colspan="8"id="container">
                                        <?php 
                                            foreach($opening as $opndtls){
                                                 if($prodtls->ro_no==$opndtls->ro_no){
                                                    if($prodtls->unit==1){

                                                        echo ceil(number_format((float)($contain*1000 )/$prodtls->qty_per_bag,3,'.',''));                                                      
                                                       
                                                    }elseif($prodtls->unit==2){
                                                           echo ceil(number_format((float)($contain*1000)/$prodtls->qty_per_bag,3,'.',''));                                          
                                                    }elseif($prodtls->unit==4){
                                                        echo ceil(number_format((float)($contain)*100/$prodtls->qty_per_bag,3,'.',''));
                                                       
                                                    }elseif($prodtls->unit==6){
                                                       echo ceil(number_format((float)($contain)*1000/$prodtls->qty_per_bag,3,'.',''));
                                                    }elseif($prodtls->unit==3){
                                                     echo ceil(number_format((float)($contain)/$prodtls->qty_per_bag,3,'.',''));
                                                  
                                                    }elseif($prodtls->unit==5){
                                                   echo ceil(number_format((float)($contain*1000)/$prodtls->qty_per_bag,3,'.',''));
                                                    }
                                                }
                                            }
                                             $contain=0.00;
                                           
                                        ?>
                                     </td>
                                </tr>
 
                                <?php  
                                        }
                                        $temp_tot = 0;                    
                                    }
                                ?>

 
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='12' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>
                        <tfooter>
                            <tr>
                           <td class="report" colspan="1" style="text-align:right"><b>Total</b></td>
                               <td class="report"></td>
                               <td class="report"><b><?=$tot_op?></b></td>
                               <td class="report"><b><?=$total_pur?></b></td>
                               <td class="report"><b><?=$total_sale?></b></td>                            
                                <td class="report"><b><?=$total?></b></td>  
                           
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