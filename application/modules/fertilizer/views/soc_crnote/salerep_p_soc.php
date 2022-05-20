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
 

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-a  lign:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Branch Credit Note Realization Between: <?php echo $_SESSION['date']; ?></h4>
                        <!-- <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5> -->
                        
                         <h4 style="text-align:left"><label>District: </label> <?php 
                              if($sales){ foreach($sales as $sal);
                               echo $sal->district_name;} ?></h4> 

                    </div>
                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                               
                                <th>RO</th>

                               <th>RO Date</th>

                               

                                <th>Received Amount</th>



                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $tot_amt = 0.00;
                           
                                if($sales){ 

                                    $i = 1;
                                    
                                   

                                    $val =0;

                                        foreach($sales as $sal){
                            ?>

                                <tr class="rep">
                                    <td class="report"><?php echo $i++; ?></td>
                                    
                                    <td class="report"><?php echo $sal->ro; ?></td>
                                    <td class="report"><?php echo date("d/m/Y",strtotime($sal->ro_dt)); ?></td>
                                   
                                    <td class="report"><?php echo $sal->tot_amt; 
                                    //  $tot_amt += $sal->tot_amt;
                                     ?>
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
                               <td class="report" colspan="9" style="text-align:Left"><b>Total</b></td>
                               <!-- <td class="report"><b><?=$tot_amt?></b></td> -->
                               
                            </tr>
                        </tfooter>

                    </table>

                </div>   
                
                <div style="text-align: center;">
                <button class="btn btn-primary" type="sumit" >Submit</button>

                    <!-- <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button> -->
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

<!-- <script>
   $('#example').dataTable({
    destroy: true,
   searching: false,ordering: false,paging: false,

dom: 'Bfrtip',
buttons: [
   {
extend: 'excelHtml5',
title: 'BENFED All SALE PURCHASE REPORT',
text: 'Export to excel'
//Columns to export
// exportOptions: {
//    columns: [0, 1, 2, 3]
// }
   }
]
   });
</script> -->

<!-- <script>
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
</script> -->
