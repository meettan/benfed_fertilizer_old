<style>
    table {
        border-collapse: collapse;
    }

    table,
    td,
    th {
        border: 1px solid #dddddd;

        padding: 6px;

        font-size: 14px;
    }

    th {

        text-align: center;

    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>

<script>
    function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln(
            '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title><style type="text/css">'
        );


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
                <h4>Purchase & Sale Statement Between: <?php echo $_SESSION['date']; ?></h4> <br>
                <h5 style="text-align:left"><label>Company: </label><?php echo $compName ?></h5>

            </div>
           

            <table style="width: 100%;" id="example">

                <thead>

                    <tr>

                        <th>Sl No.</th>

                        <!-- <th>Company</th> -->

                        <th>Product</th>

                        <th>UNIT</th>

                        <th>RO</th>

                        <th>RO Date</th>

                        <th>Purcahse Rate With GST</th>

                        <th>Purchase Amount</th>

                        <th>Purchase Qty</th>

                        <th>Sale Rate</th>

                        <th>Sale Rate With GST</th>

                        <th>Sale Amount</th>

                        <th>Sale Qty</th>

                        <th>( Sale Rate - Purchase Rate ) * Sale Qty</th>
                        <th> Value of Unsold Material</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                                if($product){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $total_sale = 0.00;
                                    $total_pur =0.00;
                                    $val =0;
                                    $salqty=0.00;
                                    $purqty=0.00;
                                    $ratediff=0.00;



                                    $par_rate=0;
                                    $par_amt=0;
                                    $par_qty=0;
                                    $sale_rate=0;
                                    $sale_R_With_GST=0;
                                    $sale_amt=0;
                                    $sale_qty=0;
                                    $sale_par_rate_qty=0;
                                    $unsold=0;

                                        foreach($all_data as $prodtls){
                                           
                            ?>

                    <tr class="rep">
                        <td class="report"><?php echo $i++; ?></td>   <!-- SL.No.--->
                        <!-- <td class="report"><?php echo $prodtls->comp_name; ?></td>  Company Name - -->
                        <td class="report"><?php echo $prodtls->prod_desc; ?></td>  <!-- Product Name--->

                        <td class="report"><?php     ///Unit convertion all solid in MT & Liquid in Ltr
                                      
                                      if($prodtls->unit==1 ||$prodtls->unit==2 ||$prodtls->unit==4 || $prodtls->unit==6){
                                        echo "MTS" ;  
                                      }elseif($prodtls->unit==3||$prodtls->unit==5){
                                        echo "LTR" ;
                                      }
                                     
                                    
                                        ?>
                        </td>

                        <td class="report"><?php echo $prodtls->ro_no; ?> <!-- Ro No.--->
                        </td>
                        <td class="report"><?php echo  date("d/m/Y",strtotime($prodtls->ro_dt)); ?>  <!-- Ro Date--->
                        </td>

                        <td class="report"><?php  $par_rate=($par_rate+$prodtls->rate); echo $prodtls->rate; ?> <!-- Purchase Rate--->
                        </td>
                        <td class="report"><?php $par_amt=($par_amt+$prodtls->pur_net_amt);  echo $prodtls->pur_net_amt; //Purchase Amount
                                       $total_pur +=$prodtls->pur_net_amt;?>
                        </td>
                        <td class="report">   <!-- Purchase Quantity --->
                            <?php 
                                        //  echo $prodtls->qty;
                                        if($prodtls->unit==1){
                                           // $par_qty=($par_qty+$prodtls->qty);
                                            echo $prodtls->qty; 
                                           }elseif($prodtls->unit==2){
                                               echo ($prodtls->qty)/1000; 
                                               //$par_qty=($par_qty+$prodtls->qty)/1000;
                                           }elseif($prodtls->unit==4){
                                               echo ($prodtls->qty)/10;
                                               //$par_qty=($par_qty+$prodtls->qty)/10;
                                           }elseif($prodtls->unit==6){
                                               echo ($prodtls->qty)/1000000;
                                               //$par_qty=($par_qty+$prodtls->qty)/1000000;
                                           }elseif($prodtls->unit==3){
                                               echo $prodtls->qty;
                                               //$par_qty=($par_qty+$prodtls->qty);
                                           }elseif($prodtls->unit==5){
                                            //    echo $prodtls->unit.'aaaa '.$prodtls->qty.'jjjj '.$prodtls->qty_per_bag;
                                               echo ($prodtls->qty) * ($prodtls->qty_per_bag)/1000;  
                                               //$par_qty=($par_qty+$prodtls->qty)/1000; 
                                           }
                                          ?>
                        </td>
                        <td class="report"><?php    //Sale Rate
                                            $sale_rate=($sale_rate+$prodtls->sale_rt); echo $prodtls->sale_rt; ?>
                        </td>
                        <td class="report">  <!-- Sale Rate with GST --->
                            <?php 
                                            $sale_R_With_GST= ($sale_R_With_GST+$prodtls->rt_gst); echo $prodtls->rt_gst; ?>
                        </td>
                        <td class="report"><?php  echo $prodtls->sale_amt;      ///Sale Amount
                                     
                                      $total_sale +=$prodtls->sale_amt; 
                                      
                                      $sale_amt= $sale_amt+$prodtls->sale_amt;?>
                        </td>
                        <td class="report">      

                            <?php          ///Sale Quantity
                                    // if( $prodtls->sale_qty<>$prodtls->qty)   {
                                        // echo "<font color='brown'><b>$prodtls->sale_qty</font></b>"; 
                                    //   echo $prodtls->sale_qty; 
                                    if($prodtls->unit==1){

                                        echo $prodtls->sale_qty; 
                                        
                                        //$sale_qty=$sale_qty+$prodtls->sale_qty;
                                       }elseif($prodtls->unit==2){
                                           echo ($prodtls->sale_qty)/1000; 
                                           //$sale_qty=($sale_qty+$prodtls->sale_qty/1000);
                                       }elseif($prodtls->unit==4){
                                           echo ($prodtls->sale_qty)/10;
                                           //$sale_qty=($sale_qty+$prodtls->sale_qty/10);
                                       }elseif($prodtls->unit==6){
                                           echo ($prodtls->sale_qty)/1000000;
                                           //$sale_qty=($sale_qty+$prodtls->sale_qty)/1000000;
                                       }elseif($prodtls->unit==3){
                                           echo $prodtls->sale_qty;
                                           //$sale_qty=($sale_qty+$prodtls->sale_qty);
                                       }elseif($prodtls->unit==5){
                                           echo ($prodtls->sale_qty)*($prodtls->qty_per_bag)/1000; 
                                           //$sale_qty=($sale_qty+$prodtls->sale_qty)/1000;  
                                       }
                                       

                                    /*} else {
                                        // echo $prodtls->sale_qty; 
                                        if($prodtls->unit==1){
                                            echo $prodtls->sale_qty; 
                                            $sale_qty=($sale_qty+$prodtls->sale_qty);
                                           }elseif($prodtls->unit==2){
                                               echo ($prodtls->sale_qty)/1000;
                                               $sale_qty=($sale_qty+$prodtls->sale_qty)/1000; 
                                           }elseif($prodtls->unit==4){
                                               echo ($prodtls->sale_qty)/10;
                                               $sale_qty=($sale_qty+$prodtls->sale_qty)/10;
                                           }elseif($prodtls->unit==6){
                                               echo ($prodtls->sale_qty)/1000000;
                                               $sale_qty=($sale_qty+$prodtls->sale_qty)/1000000;
                                           }elseif($prodtls->unit==3){
                                               echo $prodtls->sale_qty;
                                               $sale_qty=($sale_qty+$prodtls->sale_qty);
                                           }elseif($prodtls->unit==5){
                                               echo ($prodtls->sale_qty)*($prodtls->qty_per_bag)/1000; 
                                               $sale_qty=($sale_qty+$prodtls->sale_qty)/1000;  
                                           }


                                    }*/
                                     ?>
                        </td>

                        <td class="report">      <!--- (Sale rate - Purchase rate)*sale qty --->
                            <?php
                                    //  if($prodtls->profit<0)   {
                                    //     echo "<font color='blue'><b>$prodtls->pro</font></b>"; 
                                    //   } else {
                                    //   echo $prodtls->profit; 
                                    // }

                                 
                                    if($prodtls->unit==1){

                                        // echo $purdtls->qty; 
                                        $salqty1=$prodtls->sale_qty;
                                       }elseif($prodtls->unit==2){
                                        //    echo ($prodtls->qty)/1000; 
                                        $salqty1=($prodtls->sale_qty)/1000; 
                                       }elseif($prodtls->unit==4){
                                        //    echo ($prodtls->qty)/10;
                                        $salqty1=($prodtls->sale_qty)/10;
                                       }elseif($prodtls->unit==6){
                                        //    echo ($prodtls->qty)/1000000;
                                           $purqty1=($prodtls->sale_qty)/1000000;
                                       }elseif($prodtls->unit==3){
                                        //    echo $prodtls->sale_qty;
                                           $salqty1=$prodtls->sale_qty;
                                       }elseif($prodtls->unit==5){
                                        //    echo ($prodtls->sale_qty)*($prodtls->qty_per_bag)/1000; 
                                           $salqty1  =($prodtls->sale_qty)*($prodtls->qty_per_bag)/1000; 
                                       }
                                       $ratediff=round( $prodtls->rt_gst - $prodtls->rate,3)  ;
                                   echo  round($ratediff * $salqty1,3) ;
                                   $sale_par_rate_qty=($sale_par_rate_qty+round($ratediff * $salqty1,3));
                                  
                                      ?>
                        </td>


                        <td class="report"><?php ////Unsold



                  if($prodtls->unit==1){
                   
                   $purqty=$prodtls->qty;
                   $salqty1=$prodtls->sale_qty;
                   }elseif($prodtls->unit==2){
                    //    echo ($prodtls->qty)/1000; 
                       $purqty=($prodtls->qty)/1000; 
                       $salqty1=($prodtls->sale_qty)/1000; 

                   }elseif($prodtls->unit==4){
                    //    echo ($prodtls->qty)/10;
                       $purqty=($prodtls->qty)/10;
                       $salqty1=($prodtls->sale_qty)/10;

                   }elseif($prodtls->unit==6){
                    //    echo ($prodtls->qty)/1000000;
                       $purqty=($prodtls->qty)/1000000;
                       $salqty1=($prodtls->sale_qty)/1000000;

                   }elseif($prodtls->unit==3){
                    //    echo $prodtls->sale_qty;
                        $purqty = $prodtls->qty;
                        $salqty1 =$prodtls->sale_qty;
                        
                   }elseif($prodtls->unit==5){
                    //    echo ($prodtls->sale_qty)*($prodtls->qty_per_bag)/1000; 
                    $salqty1  = ($prodtls->sale_qty)*($prodtls->qty_per_bag)/1000; 
                    $purqty   = ($prodtls->qty) * ($prodtls->qty_per_bag)/1000;  
                    
                   }
                  
                //   echo round(($prodtls->qty - $prodtls->sale_qty)*$prodtls->rate,2);
             //   echo''.$purqty.'<br>'.$salqty1.'<br>'.$prodtls->rate.'<br>';
               echo round(($purqty - $salqty1)*$prodtls->rate,2);
                $unsold=($unsold+round(($purqty - $salqty1)*$prodtls->rate,2));

                // $purqty =0.00;
                // $salqty=0.00;


                                       ?>

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
                    <tr style="font-weight: bold;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td style="font-size:12px !important;"></td>
                        <td style="font-size:12px !important;"><?=round($par_amt,2)?></td>
                        <td style="font-size:12px !important;"></td>
                        <td style="font-size:12px !important;"><?=round($sale_rate,2)?></td>
                        <td style="font-size:12px !important;"><?=round($sale_R_With_GST,2)?></td>
                        <td style="font-size:12px !important;"><?=round($sale_amt,2)?></td>
                        <td style="font-size:12px !important;"></td>
                        <td style="font-size:12px !important;"><?=$sale_par_rate_qty?></td>
                        <td style="font-size:12px !important;"><?=round($unsold,2)?></td>


                    </tr>

                </tbody>
                <tfooter>
                    <tr>
                        <!-- <td class="report" colspan="4" style="text-align:right">Total</td> 
                               <td class="report"></td>
                              
                               <td class="report"><?=$total_pur?></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td class="report"><?=$total_sale?></td>
                             
                               <td></td>
                               <td></td>
                               
                                <td class="report"><?=round($total_sale - $total_pur,2) ?></td>   -->

                    </tr>
                </tfooter>
            </table>
            <!-- <table>
                <thead>

                    <tr>

                        <th></th>

                        <th></th>

                        <th></th>

                        <th></th>

                        <th></th>

                        <th></th>

                        <th>Purcahse Rate</th>

                        <th>Purchase Amount</th>

                        <th>Purchase Qty</th>

                        <th>Sale Rate</th>

                        <th>Sale Rate With GST</th>

                        <th>Sale Amount</th>

                        <th>Sale Qty</th>

                        <th>( Sale Rate - Purchase Rate ) * Sale Qty</th>
                        <th> Value of Unsold Material</th>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?=$par_rate?></td>
                        <td><?=$par_amt?></td>
                        <td><?=$par_qty?></td>
                        <td><?=$sale_rate?></td>
                        <td><?=$sale_R_With_GST?></td>
                        <td><?=$sale_amt?></td>
                        <td><?=$sale_qty?></td>
                        <td><?=$sale_par_rate_qty?></td>
                        <td><?=$unsold?></td>
                       
                        
                    </tr>

                </thead>

                <tbody>
            </table> -->

        </div>

        <div style="text-align: center;">

            <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
            <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

        </div>

    </div>

</div>

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script> -->
<!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script> -->

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<script>
    $('#example').dataTable({
        destroy: true,
        searching: false,
        ordering: false,
        paging: false,

        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: 'BENFED All SALE PURCHASE REPORT',
            text: 'Export to excel'
            //Columns to export
            // exportOptions: {
            //    columns: [0, 1, 2, 3]
            // }
        }]
    });
</script>