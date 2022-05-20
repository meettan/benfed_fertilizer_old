<?php
    $servername	= '150.242.14.122';
    $username	= 'sssproje_benfed';
    $password	= 'Benfed#2019';
    $dbname		= 'sssproje_benfed';

    $db	= mysqli_connect($servername,$username,$password,$dbname);

    if(!$db){
        die("Failed To Connect To Database".mysqli_connect_error());
    }else{

        //echo "connection successful";

        $sql = "select * from td_reconciliation_yes ";
        

        $result = mysqli_query($db,$sql);
        
        /*echo "<pre>";
        while($data = mysqli_fetch_assoc($result)){
        
        
        var_dump($data);
        
        }*/
        
        $i=1;
        
        while($data = mysqli_fetch_assoc($result)){
            
          

            $chq_no = $data['reference_no'];
            $kms_id = $data['kms_id'];
            $rmks   = substr($data['trans_description'],0,7);
            $transDt = $data['trans_dt'];
            
        

            if($rmks== 'CTS CLG'){
                $chqstatus = 'C';
            }else{
                $chqstatus = 'R';
            } 
            
            //echo "<pre>";
          //  echo $chq_no;
            

            

            $chq = "select chq_status from td_collections 
                    where cheque_no = '$chq_no'
                    and   bank_sl_no = 1
                    and   kms_id = $kms_id";
                    
                    
               
                  

            $result1 = mysqli_query($db,$chq);
      
           /* $sd = mysqli_num_rows($result1);   
            
            $status   = mysqli_fetch_assoc($result1);
            
            
            
             echo "<pre>";            
            echo $i.'-'.$chq.'-'.$sd;   */ 
            


            if (mysqli_num_rows($result1) > 0){

                $status   = mysqli_fetch_assoc($result1);
                
                //echo $i.'-'.$chq_no.'-'.$status['chq_status']."<br>";
                
               
                if($status['chq_status']=='U'){

                    $update = "update td_collections
                               set    chq_status = '$chqstatus',
                                      cheque_date = '$transDt'
                               where  cheque_no  = '$chq_no'
                               and    kms_id     = $kms_id
                               and    bank_sl_no  = 1";
                               
                 
                               
                    $result2   = mysqli_query($db,$update);

                }
            }

                    $i++;
        }



    }
?>