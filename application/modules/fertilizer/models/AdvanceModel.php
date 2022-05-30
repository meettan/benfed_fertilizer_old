<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdvanceModel extends CI_Model{										/*Insert Data in Tables*/
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


	   public function advtocompList(){
		   $fny=$this->session->userdata['loggedin']['fin_id'];
		$q=$this->db->query('SELECT a.trans_dt,a.receipt_no,a.comp_id,b.COMP_NAME,sum(a.adv_amt) amt
		FROM tdf_company_advance a,mm_company_dtls b 
		WHERE a.comp_id = b.COMP_ID
		AND a.fin_yr ='.$fny.'
		group by a.trans_dt,a.receipt_no,a.comp_id,b.COMP_NAME');
		return $q->result();
	}



		public function f_get_receiptReport_dtls($receipt_no)
		{
	
		  $sql = $this->db->query(" select  a.trans_dt,a.sl_no,a.receipt_no,a.soc_id,b.soc_name,a.trans_type, a.adv_amt,a.inv_no,a.ro_no,a.remarks
                                     from tdf_advance a ,mm_ferti_soc b
									 where a.soc_id=b.soc_id
									 and receipt_no='$receipt_no'");			
		  return $sql->row();
	
		}
		
	public function f_get_adv_dtls($recv_no){
			$data   =   $this->db->query("select  a.trans_dt ,a.sl_no,a.fin_yr,a.branch_id,a.soc_id,a.receipt_no,
			a.trans_type,a.adv_amt,a.bank,a.remarks,a.inv_no,a.ro_no,a.created_by,a.created_dt,b.bank_name,b.ac_no,
			a.cshbnk_flag
			from   tdf_advance a,mm_feri_bank b
			where  a.bank=b.sl_no
			and receipt_no = '$recv_no'
			union
			select  a.trans_dt ,a.sl_no,a.fin_yr,a.branch_id,a.soc_id,a.receipt_no,
			a.trans_type,a.adv_amt,a.bank,a.remarks,a.inv_no,a.ro_no,a.created_by,a.created_dt,'','',
			a.cshbnk_flag
			from   tdf_advance a
			where  a.bank=0
			and receipt_no = '$recv_no'");

$result = $data->row();  

return $result;
		}
/**************************Api Call For Advance To Company*************** */
		function f_compadvjnl($data){
			// echo 'hi';
			// die();
			$curl = curl_init();
		
			curl_setopt_array($curl, array(
			
			 CURLOPT_URL => 'http://localhost/benfed_fin/index.php/api_voucher/compadv_voucher',
			//CURLOPT_URL => 'https://benfed.in/benfed_fin/index.php/api_voucher/compadv_voucher',
							
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

		/************************************************ */

		function f_advjnl($data){
			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			// exit();
			$curl = curl_init();
		
			curl_setopt_array($curl, array(
			//   CURLOPT_URL => 'http://localhost/benfed_fertilizer/index.php/fertilizer/api_journal/sale_voucher',
			//CURLOPT_URL => 'https://benfed.in/benfed_fin/index.php/api_voucher/adv_voucher',
			CURLOPT_URL => 'http://localhost/benfed_fin/index.php/api_voucher/adv_voucher',
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
		public function f_upd_adv($sale_inv)
		{
		  $sql="UPDATE tdf_advance SET forward_flag ='Y'
				WHERE receipt_no = '$sale_inv'";
			
			$this->db->query($sql);
		}
        
		
		/************************************************** */
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
		public function f_sselect($table,$select=NULL,$where=NULL,$type){
			$db2 = $this->load->database('findb', TRUE);
			if(isset($select)){
				$db2->select($select);
			}
			if(isset($where)){
				$db2->where($where);
			}

			$value = $db2->get($table);

			if($type==1){
				return $value->row();
			}else{
				return $value->result();
			}
		}

		public function get_recep_no($c_id,$dist_id){
			$q=$this->db->query("SELECT distinct a.receipt_no,a.comp_id,b.branch_id 
			FROM td_adv_details a,tdf_advance b
			where a.receipt_no = b.receipt_no
			and a.comp_id = $c_id
			and b.branch_id = $dist_id
			and a.comp_pay_flag = 'N'
			and b.forward_flag = 'Y';");
			return $q->result();
		}

		public function getBranchId($rcpt){
			$q=$this->db->query("select a.dr_head, a.bank, a.trans_dt,c.branch_id,b.branch_name,c.prod_id,d.PROD_DESC,c.ro_no,c.fo_no,a.adv_amt,e.COMP_ID,e.COMP_NAME,f.remarks
            from tdf_company_advance a, md_branch b,td_adv_details c,mm_product d, mm_company_dtls e,tdf_advance f
            where c.branch_id = b.id
            and   a.adv_dtl_id = c.receipt_no
            and   a.adv_receive_no = c.detail_receipt_no
			and	  a.adv_dtl_id=f.receipt_no
			
            and   c.prod_id = d.PROD_ID
            and   c.comp_pay_flag = 'Y'
			and	  a.receipt_no='$rcpt'
			and   c.comp_id = e.COMP_ID
			;"
			
			
                
            );
            
            return $q->row();

								
		}
 
	}
?>