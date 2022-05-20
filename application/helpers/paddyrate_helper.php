<?php
   
 function get_paddy_price($kms_yr){

     $ci =& get_instance();
     $ci->load->database();
     $sql="SELECT * FROM md_paddy_rate WHERE kms_yr='".$kms_yr."' ORDER BY effective_dt DESC LIMIT 1";
     $price  =   $ci->db->query($sql)->row();

    return  $price->per_qui_rate;
   // return  $kms_yr;
}

 function getIndianCurrency(float $number){
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "And " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise ' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise.'Only';
    }

    function get_already_procured($kms_yr,$reg_no){

        $ci =& get_instance();
        $ci->load->database();
        $sql="SELECT ifnull(SUM(quantity), 0) procured_paddy
        FROM td_collections WHERE kms_id='".$kms_yr."' AND reg_no ='".$reg_no."' ";
       
          
         $paddy  =   $ci->db->query($sql)->row();
   
        return  $paddy->procured_paddy;
      // return  $kms_yr;
   }
   
   function get_farmer_name($kms_yr,$reg_no){

    $ci =& get_instance();
    $ci->load->database();
    $sql="SELECT farm_name
           FROM td_farmer_reg WHERE kms_id='".$kms_yr."' AND reg_no ='".$reg_no."' ";
   
     $paddy  =   $ci->db->query($sql)->row();
     
       if($paddy){
         $farmer = $paddy->farm_name;
      }else{
       
        $farmer = "Not Found";
      }
      return $farmer;

    }
  

  function get_bank_id($bank_sl_no){

    $ci =& get_instance();
    $ci->load->database();
    $sql="SELECT bank_id FROM md_paddy_bank WHERE sl_no='".$bank_sl_no."'";
    $result  =   $ci->db->query($sql)->row();

    return  $result->bank_id;
  
  }

  function get_district_name($id){

    $ci =& get_instance();
    $ci->load->database();
    $sql="SELECT district_name FROM md_district WHERE district_code ='".$id."' ";
      
    $paddy  =   $ci->db->query($sql)->row();

    return  $paddy->district_name;
 
  }

  function get_mill_name($id){

    if($id == ""){

       return  "Not Available";

    }else{

    $ci =& get_instance();
    $ci->load->database();
    $sql="SELECT mill_name FROM md_mill WHERE mill_code ='".$id."' ";
      
    $paddy  =   $ci->db->query($sql)->row();

    return  $paddy->mill_name;
    }
 
  }
  function get_society_name($id){

    if($id == ""){

       return  "Not Available";

    }else{

    $ci =& get_instance();
    $ci->load->database();
    $sql="SELECT soc_name FROM md_society WHERE society_code ='".$id."' ";
      
    $paddy  =   $ci->db->query($sql)->row();

    return  $paddy->soc_name;
    }
 
  }
  function get_fersociety_name($id){

    if($id == ""){

       return  "Not Available";

    }else{

    $ci =& get_instance();
    $ci->load->database();
    $sql="SELECT soc_name FROM mm_ferti_soc WHERE soc_id ='".$id."' ";
      
    $paddy  =   $ci->db->query($sql)->row();

    return  $paddy->soc_name;
    }
 
  }
  
  function get_totcmr_delivery($kms_yr,$branch_id,$do_number){

        $ci =& get_instance();
        $ci->load->database();
        $sql="SELECT ifnull(SUM(tot_delivery), 0) tot_delivery
        FROM td_cmr_delivery WHERE kms_year='".$kms_yr."' AND branch_id ='".$branch_id."' AND do_number ='".$do_number."' ";
       
          
         $paddy  =   $ci->db->query($sql)->row();
   
        return  $paddy->tot_delivery;
   }
   function get_maxpady_limit($work_order_date){

        $ci =& get_instance();
        $ci->load->database();
        $sql="select max_qty from td_paddy_qty_dates where paddy_dt = (Select max(paddy_dt) from   td_paddy_qty_dates where paddy_dt <= '".$work_order_date."')";
       
         $paddy  =   $ci->db->query($sql)->row();
        return  $paddy->max_qty;
   }


?>