<script>

    function printDiv() {
        var divToPrint=document.getElementById('divToPrint');

        var WindowObject=window.open('','Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table, th, td { border: 1px solid black; border-collapse: collapse; }' +
            '                                           th, td { padding: 5px; }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed; ' +
            '                                       ' +
            '                                   } } </style>');
        // WindowObject.document.writeln('<style type="text/css">@media print{p { color: blue; }}');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function(){ WindowObject.close();},10);

    }

</script>



<div id="divToPrint">

    <div class="wraper"> 

        <div class="col-lg-12 container contant-wraper">

            <div class="panel-heading">

                <div class="item_body">

                    <div style="text-align:center;">

                        <h3>WEST BENGAL STATE MULTIPURPOSE CONSUMERS' CO-OPERATIVE FEDERATION LTD.</h3>

                        <h3>P-1, Hide Lane, Akbar Mansion, 3rd Floor, Kolkata-700073</h3>

                        <h4>Personal Leave Ledger For: <?php echo $empName.' / '.$empNo ; ?> </h4>
                        
                    </div>

                </div>

            </div>

            <br>
            
            <div>

                <table class="table table-striped" style="width: 100%;">
                    <caption>Opening Balance<hr></caption>
                    
                    <thead style = "text-align: center">
                        <tr>
                             
                            <td>Date</td>
                            <td>CL Balance</td>  
                            <td>EL Balance</td>
                            <td>ML Balance</td>
                            <td>OD Balance</td>
                            
                        </tr>
                    </thead>

                    <tbody style = "text-align: center">

                    <?php 
                        foreach($opening as $key1)
                        {
                        ?>
                            <tr>
                        
                                <td><?php echo date("d-m-Y",strtotime($key1->trans_dt)); ?></td>
                                <td><?php echo($key1->cl_bal); ?></td>
                                <td><?php echo ($key1->el_bal); ?></td>
                                <td><?php echo($key1->ml_bal); ?></td>
                                <td><?php echo($key1->od_bal); ?></td>
                                
                            </tr>

                    <?php
                        }
                        ?>
                    
                    </tbody>

                </table>

            </div>

            <br>
            <div>

                <table class="table table-striped" style="width: 100%;">
                    <caption>Leave Taken<hr></caption>
                    
                    <thead style = "text-align: center">
                        <tr>
                             
                            <td>Date</td>
                            <td>Docket No</td>
                            <td>Leave</td>
                            <td>Days</td>
                            <td>CL Balance</td>  
                            <td>EL Balance</td>
                            <td>ML Balance</td>
                            <td>OD Balance</td>
                            
                        </tr>
                    </thead>

                    <tbody style = "text-align: center">

                    <?php 
                        foreach($transaction as $key2)
                        {
                        ?>
                            <tr>
                        
                                <td><?php echo date("d-m-Y",strtotime($key2->trans_dt)); ?></td>
                                <td><?php echo($key2->docket_no); ?></td>
                                <td><?php echo($key2->leave_type); ?></td>
                                <td><?php echo($key2->no_of_days); ?></td>
                                <td><?php echo($key2->cl_bal); ?></td>
                                <td><?php echo($key2->el_bal); ?></td>
                                <td><?php echo($key2->ml_bal); ?></td>
                                <td><?php echo($key2->od_bal); ?></td>
                                
                            </tr>

                    <?php
                        }
                        ?>
                    
                    </tbody>

                </table>

            </div>

            <!-- <br>
            <div>

                <table class="table table-striped" style="width: 100%;">
                    <caption>Closing Balance<hr></caption>
                    
                    <thead style = "text-align: center">
                        <tr>
                             
                            <td>Date</td>
                            <td>CL Balance</td>  
                            <td>EL Balance</td>
                            <td>ML Balance</td>
                            <td>OD Balance</td>
                            
                        </tr>
                    </thead>

                    <tbody style = "text-align: center">

                    <?php 
                        // foreach($closing as $key3)
                        // {
                        ?>
                            <tr>
                        
                                <td><?php //echo date("d-m-Y",strtotime($key3->trans_dt)); ?></td>
                                <td><?php //echo($key3->cl_bal); ?></td>
                                <td><?php //echo ($key3->el_bal); ?></td>
                                <td><?php //echo($key3->ml_bal); ?></td>
                                <td><?php //echo($key3->od_bal); ?></td>
                                
                            </tr>

                    <?php
                        //}
                        ?>
                    
                    </tbody>

                </table>

            </div> -->

        </div>
    
    </div>

</div>


<div class="modal-footer">

    <button class="btn btn-primary" type="button" onclick="location.href='<?php echo base_url('index.php/User_Login/main');?>'">Back</button>

    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>

</div>
