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
                        <h4>Companywise Stock Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
                        <h5 style="text-align:left"><label>Company: </label> <?php  if($product){ foreach($product as $prodtls);echo $prodtls->short_name;}?></h5>
                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <!-- <th>Company</th> -->

                                <th>Product</th>

                                <th>Unit</th>

                                <th>Opening</th>

                                <th>Purchase during the period</th>

                                <th>Sale during the period</th>

                                <th>Closing</th>

                                <th>Container</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

//  print_r($opening);
//  exit;
                                if($product){ 

                                    $i = 1;
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
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                     <!-- <td class="report"><?php echo $prodtls->short_name; ?> -->
                                     <td class="report"><?php echo $prodtls->PROD_DESC; ?>
                                     
                                     <td class="report">
                                         <?php
                                      
                                      if($prodtls->unit==1 ||$prodtls->unit==2 ||$prodtls->unit==4 || $prodtls->unit==6){
                                        echo "MTS" ;  
                                      }elseif($prodtls->unit==3||$prodtls->unit==5){
                                        echo "LTR" ;
                                      }
                                     
                                    
                                        ?>
                                     </td>
                                     <td class="report opening" id="opening">
                                        <?php 
                                            foreach($opening as $opndtls){
                                                if($prodtls->prod_id==$opndtls->prod_id){
                                                    if($prodtls->unit==1){

                                                        echo $opndtls->opn_qty; 
                                                        $opqty=$opndtls->opn_qty;
                                                       $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==2){
                                                          echo ($opndtls->opn_qty)/1000; 
                                                          $opqty=($opndtls->opn_qty)/1000; 
                                                          $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==4){
                                                          echo ($opndtls->opn_qty)/10;
                                                          $opqty=($opndtls->opn_qty)/10;
                                                          $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==6){
                                                         echo ($opndtls->opn_qty)/1000000;
                                                         $opqty=($opndtls->opn_qty)/1000000;
                                                         $totsld_op+=$opqty;
                                                       }elseif($prodtls->unit==3){
                                                          echo $opndtls->opn_qty;
                                                          $opqty=$opndtls->opn_qty;
                                                          $opqtylqd=$opndtls->opn_qty;
                                                          $totlqd_op+=$opqtylqd;
                                                       }elseif($prodtls->unit==5){
                                                        echo ($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000; 
                                                          $opqty=($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000; 
                                                          $opqtylqd=($opndtls->opn_qty)*($prodtls->qty_per_bag)/1000;
                                                          $totlqd_op+=$opqtylqd;
                                                       }
                                                    // echo $opndtls->opn_qty;
													//  $cls_baln+=$opndtls->opn_qty;
                                                    $cls_baln+=$opqty;
                                                    $lqd_baln+=$opqtylqd;
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report purchase" id="purchase">
                                        <?php 
                                            foreach($purchase as $purdtls){
                                                if($prodtls->prod_id==$purdtls->prod_id){
                                                    if($prodtls->unit==1){

                                                        echo $purdtls->tot_pur; 
                                                        $purqty=$purdtls->tot_pur;
                                                        
                                                        $totsld_pur+=$purqty;
                                                          }elseif($prodtls->unit==2){
                                                           echo ($purdtls->tot_pur)/1000; 
                                                           $purqty=($purdtls->tot_pur)/1000;
                                                           $totsld_pur+=$purqty;
                                                          }elseif($prodtls->unit==4){
                                                            echo ($purdtls->tot_pur)/10;
                                                            $purqty=($purdtls->tot_pur)/10;
                                                            $totsld_pur+=$purqty;
                                                          }elseif($prodtls->unit==6){
                                                           echo ($purdtls->tot_pur)/1000000;
                                                           $purqty= ($purdtls->tot_pur)/1000000; 
                                                           $totsld_pur+=$purqty;
                                                          }elseif($prodtls->unit==3){
                                                            echo $purdtls->tot_pur;
                                                            $purqty=$purdtls->tot_pur;
                                                            $purqtylqd=$purdtls->tot_pur;
                                                            $totlqd_pur+=$purdtls->tot_pur;
                                                            
                                                        }elseif($prodtls->unit==5){
                                                            echo ($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000; 
                                                            $purqty=   ($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000; 
                                                            $purqtylqd= ($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000; 
                                                            $totlqd_pur+=($purdtls->tot_pur)*($prodtls->qty_per_bag)/1000; 
                                                        }
                                                    // echo $purdtls->tot_pur;
													//  $cls_baln+=$purdtls->tot_pur;
                                                    $totlqd_pur +=$purqtylqd;
                                                    $cls_baln+=$purqty;
                                                    $lqd_baln+=$purqtylqd;
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report sale" id="sale">
                                        <?php 
                                            foreach($sale as $saledtls){
                                                if($prodtls->prod_id==$saledtls->prod_id){
                                                    if($prodtls->unit==1){

                                                        echo $saledtls->qty; 
                                                        $saleqty=$saledtls->qty;
                                                        $totsld_sal+=$saleqty;
                                                          }elseif($prodtls->unit==2){
                                                           echo ($saledtls->qty)/1000; 
                                                           $saleqty=($saledtls->qty)/1000;
                                                           $totsld_sal+=$saleqty;
                                                          }elseif($prodtls->unit==4){
                                                            echo ($purdtls->tot_sale)/10;
                                                            $saleqty=($saledtls->qty)/10;
                                                            $totsld_sal+=$saleqty;
                                                          }elseif($prodtls->unit==6){
                                                           echo ($saledtls->qty)/1000000;
                                                           $saleqty= ($saledtls->qty)/1000000; 
                                                           $totsld_sal+=$saleqty;
                                                          }elseif($prodtls->unit==3){
                                                            echo $saledtls->qty;
                                                            $saleqty=$saledtls->qty;
                                                            $saleqtylqd=$saledtls->qty;
                                                            $totlqd_sal+=$saledtls->qty;
                                                        }elseif($prodtls->unit==5){
                                                            echo ($saledtls->qty)*($prodtls->qty_per_bag)/1000; 
                                                            $saleqty=   ($saledtls->qty)*($prodtls->qty_per_bag)/1000; 
                                                            $saleqtylqd= ($saledtls->qty)*($prodtls->qty_per_bag)/1000; 
                                                            $totlqd_sal+=($saledtls->qty)*($prodtls->qty_per_bag)/1000; 
                                                        }
                                                        $cls_baln-=$saleqty;
                                                        $lqd_baln-=$saleqtylqd;
                                                    // echo $saledtls->tot_sale;
													// $cls_baln-=$saledtls->tot_sale;
                                                }
                                            }
                                        ?>
                                     </td>

                                     <td class="report closing"  id="closing">
                                        <?php 
                                        foreach($opening as $opndtls){
                                            if($prodtls->prod_id==$opndtls->prod_id){
                                               //echo $opndtls->cls_qty ;
												echo $cls_baln;
                                               $contain= $cls_baln;
                                               $containlqd=$cls_baln;
												//echo 'hi';
                                            }
                                           
											
                                        }
                                        $cls_baln=0.00;
                                      
                                        ?>
                                     </td>

                                     <td class="report" type="text"colspan="8"id="container">
                                        <?php 
                                            foreach($opening as $opndtls){
                                                if($prodtls->prod_id==$opndtls->prod_id){
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

                                    echo "<tr><td colspan='13' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>
                        <tfooter>
                            <tr>
                               <td class="report" colspan="3" style="text-align:left" bgcolor="silver" ><b>Summary</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Opening</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Purchase</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Sale</b></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><b>Closing</b></td>
                            </tr>
                            <tr>
                               <td class="report" colspan="3" style="text-align:left" bgcolor="silver"><b>Solid( MTS) </b></td> 
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totsld_op?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totsld_pur?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totsld_sal?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $totsld_op  + $totsld_pur - $totsld_sal ?></td>
                            </tr>
                            <tr>
                            <tr>
                               <td class="report" colspan="3" style="text-align:left" bgcolor="silver"><b>Liquid( LTR ) </b></td> 
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totlqd_op?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $totlqd_pur?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?= $totlqd_sal?></td>
                               <td class="report" colspan="1" style="text-align:center" bgcolor="silver"><?=$totlqd_op + $totlqd_pur - $totlqd_sal ?> </td>
                              
                                  
                                    
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