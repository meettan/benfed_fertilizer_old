<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class IrncancelModel extends CI_Model{										/*Insert Data in Tables*/
		public function f_insert($table_name, $data_array) {

			// $sql = "INSERT INTO `tdf_advance` (`trans_dt`, `sl_no`, `receipt_no`, `fin_yr`, `branch_id`, `soc_id`, `trans_type`, `adv_amt`, `bank_id`, `remarks`, `created_by`, `created_dt`) VALUES ('2021-03-02', '26', 'Adv/BNK/2020-21/26', '1', '339', '109', 'I', '2350', '2', 'test', 'synergic', '2021-03-02 11:07:02')";
			// $this->db->query($sql);
			// echo $this->db->last_query();
			// exit();

			$this->db->insert($table_name, $data_array);

			return;

		}
																				/*Update table data*/
		public function f_edit($table_name, $data_array, $where) {

			$this->db->where($where);

			$this->db->update($table_name, $data_array);

			return;

		}
																				/*Select Data from a table*/				
		public function f_select($table,$select=NULL,$where=NULL,$type){

			if(isset($select)){
				$this->db->select($select);
			}

			if(isset($where)){
				$this->db->where($where);
			}

			$value = $this->db->get($table);

			if($type==1){
				return $value->row();
			}else{
				return $value->result();
			}
		}
		public function f_getbnk_dtl($br_cd){
	
			$data = $this->db->query("select sl_no, bank_name,ifsc,ac_no
										from mm_feri_bank 
									where dist_cd = '$br_cd'");
								   
	   return $data->result();
		   
	   }	

	   /**********************API CALL for sale cancel voucher within or after 24 hrs********************* */
function f_cancelsalejnl($data){
	// echo 'hi';
	// die();
	$curl = curl_init();

	curl_setopt_array($curl, array(
	
	CURLOPT_URL => 'http://localhost/Benfed_finance/index.php/api_voucher/cancelsale_voucher',

	// CURLOPT_URL => 'https://benfed.in/benfed_fin/index.php/api_voucher/cancelsale_voucher',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"data": '.json_encode($data).'
	}',
	
	  CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json',
		'Cookie: ci_session=eieqmu6gupm05pkg5o78jqbq97jqb22g'
	  ),
	));
	
	$response = curl_exec($curl);
	
	curl_close($curl);
	echo $response;
	
}


		public function f_get_receiptReport_dtls($receipt_no)
		{
	
		  $sql = $this->db->query(" select  a.trans_dt,a.sl_no,a.receipt_no,a.soc_id,b.soc_name,a.trans_type, a.adv_amt,a.inv_no,a.ro_no,a.remarks
                                     from tdf_advance a ,mm_ferti_soc b
									 where a.soc_id=b.soc_id
									 and receipt_no='$receipt_no'");			
		  return $sql->row();
	
		}
	/**************************For B2C Cancel ************************* */
	public function f_get_b2c_dtls($transdo){
		$data   =   $this->db->query("select a.trans_do,a.do_dt,a.sale_ro,a.qty,a.sale_rt,a.irn_cnl_reason,
						  b.prod_desc,c.comp_name,a.round_tot_amt,d.district_name,a.taxable_amt,a.cgst,a.sgst
		from   td_sale a ,mm_product b,mm_company_dtls c,md_district d
		where a.prod_id=b.prod_id
		and a.br_cd=d.district_code
		and a.comp_id=c.comp_id
		and a.trans_do = '$transdo'");

$result = $data->row();  

return $result;
	}
	/****************************************************************** */
		
		public function f_get_adv_dtls($irn){
			$data   =   $this->db->query("select a.ack,a.ack_dt,a.irn,a.irn_cnl_reason,a.irn_cnl_rem,a.qty,a.sale_rt,
                              b.prod_desc,c.comp_name,a.round_tot_amt,d.district_name,a.taxable_amt,a.cgst,a.sgst
			from   td_sale a ,mm_product b,mm_company_dtls c,md_district d
			where a.prod_id=b.prod_id
			and a.br_cd=d.district_code
			and a.comp_id=c.comp_id
			and a.irn = '$irn'");

$result = $data->row();  

return $result;
		}
		/*Select Maximun advance code districtwise and financial yearwise*/					
		public function get_advance_code($branch,$fin){

            $data   =   $this->db->query("select ifnull(max(sl_no),0) +1 sl_no
                                          from   tdf_advance
                                          where  branch_id = '$branch'
                                          and    fin_yr    = '$fin'");

			$result = $data->row();  
 
			return $result;
		 }
		 public function f_get_comp_advance_code($branch,$fin){

            $data   =   $this->db->query("select ifnull(max(sl_no),0) +1 sl_no
                                          from   tdf_company_advance 
                                          where  branch_id = '$branch'
                                          and    fin_yr    = '$fin'");

			$result = $data->row();  
 
			return $result;
		 }																	/*Select Maximun product Code*/			
		public function get_product_code(){

			$this->db->select_max('prod_id');
			
			$result = $this->db->get('mm_product')->row()->prod_id;  
 
			return ($result+1);
		 }
		 																	/*Select Maximun comapany Code*/				 
		 public function get_company_code(){

			$this->db->select_max('comp_id');
 
			$result = $this->db->get('mm_company_dtls')->row()->comp_id;  
 
			return ($result+1);
		 }
 
																			/*Delete From Table*/
		public function f_delete($table_name, $where) {			

			$this->db->delete($table_name, $where);
		 
			 return;
		}



		/************************************************** */

		// function f_salejnl_crn($data){
		// 	$curl = curl_init();

		// 	curl_setopt_array($curl, array(
		// 	//   CURLOPT_URL => 'http://localhost/benfed_fertilizer/index.php/fertilizer/api_journal/sale_voucher',
		// 	CURLOPT_URL => 'http://localhost/benfed_fin/index.php/api_voucher/salecr_voucher',
		// 	  CURLOPT_RETURNTRANSFER => true,
		// 	  CURLOPT_ENCODING => '',
		// 	  CURLOPT_MAXREDIRS => 10,
		// 	  CURLOPT_TIMEOUT => 0,
		// 	  CURLOPT_FOLLOWLOCATION => true,
		// 	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	  CURLOPT_CUSTOMREQUEST => 'POST',
		// 	  CURLOPT_POSTFIELDS =>'{
		// 		"data": '.json_encode($data).'
		// 	}',
			
		// 	  CURLOPT_HTTPHEADER => array(
		// 		'Content-Type: application/json',
		// 		'Cookie: ci_session=eieqmu6gupm05pkg5o78jqbq97jqb22g'
		// 	  ),
		// 	));
			
		// 	$response = curl_exec($curl);
			
		// 	curl_close($curl);
		// 	echo $response;
			
		// }
		// // SAVE IRN
		// function save_irn($data){
		// 	$input = array(
		// 		'irn' => $data['irn'],
		// 		'ack' => $data['ack'],
		// 		'ack_dt' => $data['ack_dt'],
		// 		'gst_type_flag'=>$data['trn_type']
		// 	);
		// 	$this->db->where(array(
		// 		'trans_do' => $data['trans_do']
		// 	));
		// 	if($this->db->update('td_sale', $input)){
		// 		return 1;
		// 	}else{
		// 		return 0;
		// 	}
		// }
        function del_b2c($trans_do){
			$this->db->where(array('trans_do' => $trans_do));
			$quey = $this->db->get('td_sale')->row();
			if($this->db->insert('td_sale_cancel', $quey)){
				$this->db->where(array('trans_do' => $trans_do));
				$this->db->delete('td_sale');
			}
		}

		/***************************************** */
		function get_irn_details($irn){
			$this->db->where(array('irn' => $irn));
			$quey = $this->db->get('td_sale')->row();
			if($this->db->insert('td_sale_cancel', $quey)){
				$this->db->where(array('irn' => $irn));
				$this->db->delete('td_sale');
			}
		}
 
	}
?>