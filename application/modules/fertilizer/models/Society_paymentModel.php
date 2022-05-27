<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Society_paymentModel extends CI_Model{
						/*Insert Data in Tables*/
		public function f_insert($table_name, $data_array) {

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
		

		public function f_get_distinct($table_name, $select=NULL, $where=NULL,$type) {
			$this->db->distinct();
			if(isset($select)) {
				$this->db->select($select);
			}
	
			if(isset($where)) {
				$this->db->where($where);
			}
			$value		=	$this->db->get($table_name);
			if($type==1){
				return $value->row();
			}else{
				return $value->result();
			}
			
		}

		public function f_get_receiptReport_dtls($receipt_no)
		{
	
		  $sql = $this->db->query("SELECT a.paid_id,a.paid_dt,b.soc_name,c.bank_name,a.sale_invoice_no,a.bnk_id,a.remarks,sum(a.paid_amt)as amt 
									FROM tdf_payment_recv a,mm_ferti_soc b,mm_feri_bank c
									WHERE a.soc_id=b.soc_id
									and a.bnk_id=c.sl_no
									and a.paid_id='$receipt_no'
									group by a.paid_id,a.paid_dt,b.soc_name,a.sale_invoice_no,a.bnk_id,c.bank_name,a.remarks");			
		  return $sql->row();
	
		 }
		 public function payTypePaidDetails($id){
			 $this->db->select('pay_type,paid_amt,ref_no,ref_dt');
			$this->db->where('paid_id',$id);
			$q=$this->db->get('tdf_payment_recv');
			return $q->result();
		 }
		public function get_trans_no($fin_id,$branch_id){

			$sql="select ifnull(max(trans_no),0) + 1 trans_no
					 from td_sale where fin_yr = '$fin_id' AND br_cd= '$branch_id'";

		  $result = $this->db->query($sql);     
	  
		  return $result->row();

       }
		public function js_get_stock_qty($ro)
		{

		$sql = $this->db->query("SELECT a.stock_qty -  (select  ifnull(sum(qty) ,0) from td_sale where sale_ro ='$ro') stkqty,a.prod_id ,b.gst_rt ,a.govt_sale_rt FROM td_purchase a ,mm_product b WHERE a.prod_id=b.prod_id and  a.ro_no = '$ro'");
			return $sql->row();
		}
		public function check_soc_pay($ro_no,$br_cd){

			$sql="select count(*) counts from tdf_company_payment where pur_ro = '$ro_no' 
				and district = '$br_cd'";
			$data = $this->db->query($sql);
			return $data->row();
		}


		public function check_soc_paytype($invoice_no,$pay_type){

			$sql="select count(*) counts from tdf_payment_recv where sale_invoice_no = '$invoice_no' 
				and pay_type = '$pay_type'";
			$data = $this->db->query($sql);
			return $data->row();
		}
		public function f_forward_pay_recv($ro_no,$comp_id,$prod_id,$rate,$pur_inv,$sale_inv,$br_cd,$sale_invoice)
		{
			$qty=$this->getQty($sale_invoice);
			// //print_r($sale_inv);
			// print_r($this->session->userdata['loggedin']['user_name']);
			// exit();
			$sql="INSERT INTO  tdf_company_payment(pur_ro,comp_id,prod_id,purchase_rt,pur_inv_no,sale_inv_no,qty,district)
				  							values('$ro_no',$comp_id,$prod_id,$rate,'$pur_inv','$sale_inv','$qty->qty','$br_cd')";
			$this->db->query($sql);
		}

		public function getQty($sale_inv){
			$this->db->select('');
			$this->db->from('td_sale');
			$this->db->where('trans_do',$sale_inv);
			$q=$this->db->get();
			return $q->row();
		}


		public function f_forward_pay_recv_upd($ro_no,$sale_qty,$br_cd)
		{
		  $sql="UPDATE tdf_company_payment SET qty = qty+  $sale_qty 
				WHERE pur_ro = '$ro_no'
				AND district = $br_cd";
			
			$this->db->query($sql);
		}

		public function f_upd_pay_recv($sale_inv)
		{
			
			$user=$this->session->userdata['loggedin']['user_name'];
			$datestr=date('Y-m-d');
		  $sql="UPDATE tdf_payment_recv SET approval_status ='A',approval_by='$user',approval_date='$datestr'
				WHERE paid_id = '$sale_inv'";
			
			$this->db->query($sql);
		}
        
        
        public function f_get_soc_payment_dtls($br_cd,$fin_id){

				// $data = $this->db->query("select a.sl_no,a.paid_id,a.paid_dt,a.soc_id,b.soc_name,a.ro_no,c.comp_id,c.prod_id,c.rate,c.invoice_no as pur_inv,a.approval_status,sum(a.paid_amt)amount,sum(d.QTY)sale_qty
				// 							from  tdf_payment_recv a , mm_ferti_soc b,td_purchase c,td_sale d
				// 							where a.soc_id=b.soc_id
				// 							and a.ro_no=c.ro_no
				// 							and c.ro_no=d.sale_ro
				// 							and a.branch_id=$br_cd
				// 							group by a.sl_no,a.paid_id,a.paid_dt,a.soc_id,b.soc_name,a.ro_no,c.comp_id,c.prod_id,c.rate,c.invoice_no,approval_status");
    
			$data = $this->db->query("select distinct a.paid_id,a.sl_no,a.paid_dt paid_dt,a.soc_id,b.soc_name,a.ro_no,c.comp_id,c.prod_id,d.prod_desc,c.rate,c.ro_no as pur_inv,a.approval_status,sum(a.paid_amt)amount,0 as sale_qty,a.sale_invoice_no
			from  tdf_payment_recv a , mm_ferti_soc b,td_purchase c,mm_product d
			where a.soc_id=b.soc_id
			and a.ro_no=c.ro_no
			and c.prod_id = d.prod_id
			and a.branch_id=$br_cd
			and a.fin_yr=$fin_id
			group by a.sl_no,a.paid_id,a.paid_dt,a.soc_id,b.soc_name,a.ro_no,c.comp_id,c.prod_id,d.prod_desc,c.rate,c.ro_no,approval_status
			union
			select a.paid_id,a.sl_no,a.paid_dt,a.soc_id,b.soc_name,a.ro_no,a.comp_id,a.prod_id,d.prod_desc,a.ro_rt,a.ro_no as pur_inv,a.approval_status,sum(a.paid_amt)amount,0 as sale_qty,a.sale_invoice_no
			from  tdf_payment_recv a , mm_ferti_soc b, mm_product d
			where a.soc_id=b.soc_id	
			and a.paid_dt is not null
			and a.prod_id = d.prod_id
			and a.branch_id=$br_cd
			and a.fin_yr=$fin_id
			group by a.sl_no,a.paid_id,a.paid_dt,a.soc_id,b.soc_name,a.ro_no,a.comp_id,a.prod_id,d.prod_desc,a.ro_rt,a.approval_status
			order by paid_dt");

             return $data->result();
            
                
            }
		public function f_get_drnote_dtls(){

		$data = $this->db->query("select a.comp_id,a.ro_no,a.ro_dt,a.invoice_no, sum(a.soc_amt) as tot_amt,b.COMP_NAME COMP_NAME
									from  td_dr_note a,
	   					    mm_company_dtls b    							   							
					  where  a.comp_id = b.COMP_ID
									group by comp_id,ro_no,ro_dt,invoice_no,COMP_NAME");

		
		 return $data->result();
		
			
		}
		public function f_get_crnote_dtls(){
			// $user_id    = $this->session->userdata('login')->user_id;
	
		$data = $this->db->query("select comp_id,do_no,do_dt,invoice_no, sum(br_amt) as tot_amt
									from td_cr_note 
									group by comp_id,do_no,do_dt,invoice_no");
	
		return $data->result();
			
		}

			 //  Function For Credit Note Developed By Lokesh  08/04/2020//
		public function credit_amt(){
		   $data=$this->db->query("Select a.comp_id comp_id,a.do_no do_no,a.do_dt do_dt,a.invoice_no invoice_no,a.invoice_dt  invoice_dt,sum(a.br_amt) as tot_amt,b.COMP_NAME COMP_NAME
       							
       						from  td_cr_note a,
	   					    mm_company_dtls b    							   							
					  where  a.comp_id = b.COMP_ID
					
					  group by comp_id,do_no,do_dt,invoice_no,invoice_dt,COMP_NAME");

				return $data->result();
		}

        
		public function f_getdo_dtl($br_cd,$soc_id){
	
             $data = $this->db->query("select distinct trans_do
			 							from td_sale 
									 where br_cd = '$br_cd'
									 and soc_id='$soc_id'
									 and round_tot_amt-paid_amt>0
									 union
									 select  sale_invoice_no
									 from  tdf_payment_recv
									 where branch_id='$br_cd'
									 and pay_type='O' and soc_id='$soc_id'
									  ");
									
		return $data->result();
			
		}

		public function f_get_ro_dt($trans_do){
	
			$data = $this->db->query("select a.do_dt,a.sale_ro,a.tot_amt,a.comp_id,a.prod_id,b.rate
										from td_sale a ,td_purchase b
									where a.trans_do='$trans_do'
									and a.sale_ro=b.ro_no
									union
									select  ref_dt,ro_no,tot_recvble_amt,comp_id,prod_id,ro_rt
									from  tdf_payment_recv
									where sale_invoice_no='$trans_do'
									and pay_type='O'");
								   
	   return $data->result();
		   
	   }
	   public function f_get_ro_trans_dtls($trans_do){
	
		$data = $this->db->query("select a.do_dt,a.sale_ro,a.tot_amt,a.comp_id,a.prod_id,b.rate
									from td_sale a ,td_purchase b
								where a.trans_do='$trans_do'
								and a.sale_ro=b.ro_no
								union
								select  ref_dt,ro_no,tot_recvble_amt,comp_id,prod_id,ro_rt
								from  tdf_payment_recv
								where sale_invoice_no='$trans_do'
								and pay_type='O'");
							   
   return $data->result();
	   
   }


	// 	public function f_distinct_ro($br_cd,$soc_id){
	
	// 		$data = $this->db->query("select distinct trans_do
	// 									from td_sale 
	// 								where br_cd = '$br_cd'
	// 								and soc_id='$soc_id'");
								   
	//    return $data->result();
		   
	//    }

	public function f_get_cust_paydtls($bnk_id){
	
		$data = $this->db->query("select  a.sl_no,
		a.paid_id as paid_id,
		a.paid_dt,
		a.soc_id,
		a.sale_invoice_no,
		a.sale_invoice_dt,
		a.ro_no,
		a.pay_type,
		a.ref_no,
		a.ref_dt,
		a.bnk_id,
		a.tot_recvble_amt,
		a.adj_dr_note_amt,
		a.adj_adv_amt,
		a.net_recvble_amt,
		a.paid_amt,b.bank_name,b.ifsc,b.ac_no,a.remarks as remarks
		from tdf_payment_recv a,mm_feri_bank b
		where a.bnk_id=b.sl_no
		and paid_id = '$bnk_id'");
							   
		$result = $data->result();  
 		return $result;
	   
   }
		public function f_getbnk_dtl($br_cd){
	
			$data = $this->db->query("select sl_no, bank_name,ifsc,ac_no
										from mm_feri_bank 
									where dist_cd = '$br_cd'");
								   
	   return $data->result();
		   
	   }

		public function f_get_advamt_dr_dtls($soc_id) // For Jquery
        {

            $sql = $this->db->query("SELECT ifnull(sum(a.adv_amt),0) -(select  ifnull(sum(adv_amt),0) 
																		from tdf_advance 
																		WHERE soc_id ='$soc_id'
																		and trans_type='O')as adv_amt
			FROM tdf_advance a 
			WHERE a.soc_id ='$soc_id'
			and a.trans_type='I'");
            return $sql->result();

		}



		function f_recvjnl($data){
			//  echo '<pre>';var_dump($data);
			$curl = curl_init();

			curl_setopt_array($curl, array(
			//   CURLOPT_URL => 'http://localhost/benfed_fertilizer/index.php/fertilizer/api_journal/sale_voucher',
			  CURLOPT_URL => 'https://benfed.in/benfed_fin/index.php/api_voucher/recv_voucher',
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
			// exit;
			
		}

		function f_recvjnl_soc($data){
			// echo '<pre>';var_dump($data);
			$curl = curl_init();

			curl_setopt_array($curl, array(
			//   CURLOPT_URL => 'http://localhost/benfed_fertilizer/index.php/fertilizer/api_journal/sale_voucher',
			CURLOPT_URL => 'https://benfed.in/benfed_fin/index.php/api_voucher/recv_voucher_soc',
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
			// exit;
			
		}


		function f_recvjnl_dr($data){
			// echo '<pre>';var_dump($data);
			$curl = curl_init();

			curl_setopt_array($curl, array(
			//   CURLOPT_URL => 'http://localhost/benfed_fertilizer/index.php/fertilizer/api_journal/sale_voucher',
			CURLOPT_URL => 'https://benfed.in/benfed_fin/index.php/api_voucher/recv_voucher_dr',
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
			// exit;
			
		}

		public function get_soc_pay_code($branch,$fin){

            $data   =   $this->db->query("select ifnull(max(sl_no),0) +1 sl_no
                                          from   tdf_payment_recv
                                          where  branch_id = '$branch'
                                          and    fin_yr    = '$fin'");

			$result = $data->row();  
 
			return $result;
		 }
		 public function f_get_comp_short_nm($ro){

            $sql   =   $this->db->query("select distinct a.short_name  short_nm
                                          from   mm_company_dtls a,td_sale b
                                          where  a.comp_id = b.comp_id
                                          and    b.sale_ro = '$ro'");

			// $result = $data->row();  
 
			return $sql->row();
		 }

		public function f_get_adv_net_amt_dtls($soc_id,$sale_invoice_no,$ro_no) // For Jquery
        {

            $sql = $this->db->query(" select ifnull(sum(tot_amt),0) - 
			 (SELECT ifnull(sum(a.paid_amt),0)  
									FROM tdf_payment_recv a 
									WHERE a.soc_id ='$soc_id'
									and sale_invoice_no='$sale_invoice_no'
									and ro_no='$ro_no' and  a.pay_type<>'O') +
			(SELECT ifnull(sum(a.tot_recvble_amt),0)  - ifnull(sum(a.paid_amt),0)
			FROM tdf_payment_recv a 
			WHERE a.soc_id ='$soc_id'
			and sale_invoice_no='$sale_invoice_no'
			and ro_no='$ro_no'  and a.pay_type='O')as net_amt,
			ifnull(sum(round_tot_amt),0) - 
			 (SELECT ifnull(sum(a.paid_amt),0)  
									FROM tdf_payment_recv a 
									WHERE a.soc_id ='$soc_id'
									and sale_invoice_no='$sale_invoice_no'
									and ro_no='$ro_no' and  a.pay_type<>'O') +
		 (SELECT ifnull(sum(a.tot_recvble_amt),0)  - ifnull(sum(a.paid_amt),0)
			 FROM tdf_payment_recv a 
			 WHERE a.soc_id ='$soc_id'
			 and sale_invoice_no='$sale_invoice_no'
			 and ro_no='$ro_no'  and a.pay_type='O')as rnd_net_amt,
									ifnull(sum(tot_amt),0)+
									(SELECT ifnull(sum(a.tot_recvble_amt),0)  - ifnull(sum(a.paid_amt),0)
									FROM tdf_payment_recv a 
									WHERE a.soc_id ='$soc_id'
									and sale_invoice_no='$sale_invoice_no'
									and ro_no='$ro_no' and a.pay_type='O' )as tot_ro_amt
									from  td_sale where  trans_do = '$sale_invoice_no'
									and sale_ro='$ro_no'");
			return $sql->result();
			// return $sql->row();

		}

// 		public function f_get_ro_dt_dtls($sale_invoice_no)
// 		{
// 			$sql = $this->db->query("select  distinct a.do_dt,a.sale_ro,a.tot_amt
// 									from  td_sale a,(select ifnull(sum(paid_amt),0)paid_amt from  tdf_payment_recv where sale_invoice_no ='$sale_invoice_no')b
// 									where  a.trans_do ='$sale_invoice_no'
// 									and a.tot_amt - b.paid_amt>0");
//  return $sql->result();
// 		}

		public function f_get_ro_dtls($ro_no) // For Jquery
        {

            $sql = $this->db->query("SELECT a.invoice_no,a.invoice_dt,a.due_dt,a.qty,a.no_of_bags ,a.comp_id,a.prod_id,b.gst_no,c.hsn_code,b.comp_name,c.gst_rt,a.br
			FROM td_purchase a ,mm_company_dtls b,mm_product c
			WHERE a.ro_no ='$ro_no'
			and a.comp_id=b.comp_id
			and a.prod_id=c.prod_id");
            return $sql->result();

		}

		
		public function f_get_amt_dr_dtls($soc_id,$trans_do) // For Jquery
        {

            $sql = $this->db->query("SELECT ifnull(sum(tot_amt),0) -(select  ifnull(sum(tot_amt),0) 
																	FROM tdf_dr_cr_note
																	WHERE soc_id='$soc_id'
																	and note_type='D' 
																	and trans_flag='A' and invoice_no='$trans_do')  - 
																	(select  ifnull(sum(paid_amt),0) 
																	FROM tdf_payment_recv
																	WHERE soc_id='$soc_id'
																	and pay_type='6' 
																	and sale_invoice_no= '$trans_do')  AS tot_amt
									FROM tdf_dr_cr_note
									WHERE soc_id='$soc_id'
									and note_type='D' 
									and trans_flag='R' and invoice_no='$trans_do'");
            return $sql->result();

		}


		public function f_get_particulars_in($table_name, $where_in=NULL, $where=NULL) {

			if(isset($where)){
	
				$this->db->where($where);
	
			}
	
			if(isset($where_in)){
	
				$this->db->where_in('sl_no', $where_in);
	
			}
			
			$result	=	$this->db->get($table_name);
	
			return $result->result();
	
		}
	
		
		public function f_get_sales_dtls($banch_id,$fin_id){
			// $user_id    = $this->session->userdata('login')->user_id;
			
	
		$data = $this->db->query("select trans_do,do_dt,trans_type, sum(tot_amt) as tot_amt
									from td_sale
									where br_cd='$banch_id' 
									and fin_yr='$fin_id'
									group by trans_do,do_dt,trans_type");
	
		 return $data->result();
		
			
		}
   // Code Written By lokesh Kumar jha on 02/04/2020  //
       public function f_get_particulars($table_name, $select=NULL, $where=NULL, $flag) {
        
        if(isset($select)) {

            $this->db->select($select);

        }

        if(isset($where)) {

            $this->db->where($where);

        }

        $result		=	$this->db->get($table_name);

        if($flag == 1) {

            return $result->row();
            
        }else {

            return $result->result();

        }

       }


/*Select Maximun soceity Code*/
		public function get_soceity_code(){

			$this->db->select_max('soc_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_ferti_soc')->row()->soc_id;  
 
			return ($result+1);
		 }
		/*Select Maximun product Code*/
		public function get_product_code(){

			$this->db->select_max('prod_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_product')->row()->prod_id;  
 
			return ($result+1);
		 }
		 
		 /*Select Maximun comapany Code*/
		 public function get_company_code(){

			$this->db->select_max('comp_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_company_dtls')->row()->comp_id;  
 
			return ($result+1);
		 }
//Generate new schedule code accoring to acc_type(Liability 1,Asset 2,Income 5,Expense 6,Purchase 3,Sale 4)
		// public function get_sch_code($acc_type){

		//    $this->db->select_max('schedule_code');

		//    $this->db->where('acc_type', $acc_type);
		   
		//    $result = $this->db->get('md_schedule_heads')->row()->schedule_code;  

        //    return ($result+1);
		// }

		// public function get_subsch_code($sch_code,$acc_type){

		//    $this->db->select_max('subschedule_code');
		//    $this->db->where('acc_type', $acc_type);
		//    $this->db->where('schedule_code', $sch_code);
        //    $result = $this->db->get('md_subschedule_heads')->row()->subschedule_code;  

        //    return ($result+1);
		// }

/*Delete From Table*/
		public function f_delete($table_name, $where) {			

			$this->db->delete($table_name, $where);
			// echo $this->db->last_query();
			//  die();
			 return;
		}

/*Select Maximun Account Code*/
		public function f_max_no($sub_sch){

			$this->db->select_max('acc_code');

			$this->db->where('sub_sch_code', $sub_sch);

			$result = $this->db->get('md_account_heads');

			if($result->num_rows() > 0){

				return $result->row();

			}else{

			       return 0;	   	
			}	    
		}

		public function f_select_parameter($value){		      /*Select parameter value from table */
			$this->db->select('param_value');

			$this->db->where('sl_no',$value);

			$data = $this->db->get('md_parameters');

			if($data->num_rows() > 0){
				return $data->row();
			}else{
				return 0;	
			}
		}

		public function f_get_voucher_id_all($start_dt,$end_dt){   /*Get All Voucher ID*/		

			$this->db->distinct();

			$this->db->select('voucher_id');

			$this->db->where('voucher_date>=',$start_dt);

			$this->db->where('voucher_date<=',$end_dt);

			$this->db->where('approval_status','A');

			$result=$this->db->get('td_vouchers');

             return $result->result();
                }


		public function f_get_voucher_id($sys_date){

			$this->db->select_max('voucher_id');

			$this->db->where('voucher_date',$sys_date);

			$this->db->where('approval_status','A');

			$result=$this->db->get('td_vouchers');

			if($result->num_rows() > 0 ){
				
				return $result->row();
			}	
				else{
					return 0;
				 }
		}

		public function f_get_vouchers($start_dt,$end_dt,$voucher_id){

			 $vouchers=$this->db->query("select voucher_date,voucher_id,
						            voucher_mode,acc_code,
						            amount dr_amt,0 
						            cr_amt,remarks,
						            ins_no,ins_dt
						     from   td_vouchers
						     where  dr_cr_flag = 'Dr'
						     and    approval_status ='A'
						     and    voucher_date Between '$start_dt' And '$end_dt'
						     and    voucher_id = $voucher_id 
						     UNION
						     select voucher_date,voucher_id,
							    voucher_mode,acc_code,
							    0 dr_amt,
							    amount cr_amt,remarks,
							    ins_no,ins_dt
						     from   td_vouchers
						     where dr_cr_flag = 'Cr'
						     and    approval_status = 'A'
						     and    voucher_date Between '$start_dt' And '$end_dt'
						     and    voucher_id = $voucher_id 
						     order by voucher_date,voucher_id"); 
			 return $vouchers->result();
		}

		public function f_get_ac_code($acc_code){
			$this->db->select('acc_head');
			$this->db->where('acc_code',$acc_code);
			$result = $this->db->get('md_account_heads'); 
			return $result->row();
		}


		public function f_gl_report($start_dt,$end_dt,$acc_code){
		  $data=$this->db->query("select voucher_date,voucher_id,voucher_mode,ins_no,
       						     ins_dt,remarks,amount cr_amt,0 dr_amt,acc_code
       				  from   td_vouchers
					  where  dr_cr_flag = 'Cr'
					  and    voucher_date Between '$start_dt' And '$end_dt'
					  and    acc_code = $acc_code
					  UNION
					  select voucher_date,voucher_id,voucher_mode,ins_no,
       					  ins_dt,remarks,0 cr_amt,amount dr_amt,acc_code
       					  from   td_vouchers
					  where dr_cr_flag = 'Dr'
					  and    voucher_date Between '$start_dt' And '$end_dt'
					  and    acc_code = $acc_code
					  order by voucher_date,voucher_id");

				return $data->result();
		}

		public function f_opening_bal($adt_dt,$acc_code){
			$data=$this->db->query("select f_getopening('$adt_dt',$acc_code)opn_bal from Dual");
			return $data->row();
		}	

		public function f_closing_bal($adt_dt,$acc_code){
			$data=$this->db->query("select f_getclosing('$adt_dt',$acc_code)cls_bal from Dual");
			return $data->row();
		}
	
		public function f_trial_balance($adt_dt){
			$data=$this->db->query("select a.balance_dt,a.acc_code acc_code,
	   					       b.sch_code sch_code,
       						       c.schedule_type schedule_type,
	   					       b.acc_head acc_head,
	   					       a.balance_amt cr_amt,
     						       0 dr_amt
						from   tm_account_balance a,
	   					       md_account_heads b,
       						       md_schedule_heads c
						where  a.acc_code = b.acc_code
						and    b.sch_code = c.schedule_code
						and    a.balance_dt = (select max(balance_dt)
                       						       from   tm_account_balance
                       						       where  balance_dt <= '$adt_dt')
						and    a.balance_amt < 0
						UNION
						select a.balance_dt,a.acc_code acc_code,
	   					       b.sch_code sch_code,
       						       c.schedule_type schedule_type,
	   					       b.acc_head acc_head,
	   					       0 cr_amt,a.balance_amt dr_amt
						from   tm_account_balance a,
	   					       md_account_heads b,
       						       md_schedule_heads c
						where  a.acc_code = b.acc_code
						and    b.sch_code = c.schedule_code
						and    a.balance_dt = (select max(balance_dt)
                     						       from   tm_account_balance
                     						       where  balance_dt <= '$adt_dt')
						and    a.balance_amt > 0
						order by sch_code,acc_code");
			return $data->result();	

		}

		public function f_cash_book($from_dt,$to_dt){
			$data = $this->db->query("Select a.acc_code acc_code,
	   						 b.acc_head acc_head,
       							 sum(a.dr_amt)dr_amt,
       							 sum(a.cr_amt)cr_amt
						  from(select acc_code,Sum(amount) dr_amt,0 cr_amt from td_vouchers
						       where  voucher_date = '$from_dt'
						       and    dr_cr_flag = 'Dr'
						       and    voucher_mode = 'C'
					   	       and    acc_code <> 21101
						       group by acc_code     
						       UNION
						       select acc_code,0 dr_amt,Sum(amount) cr_amt from td_vouchers
						       where  voucher_date = '$to_dt'
						       and    dr_cr_flag = 'Cr'
						       and    voucher_mode = 'C'
						       and    acc_code <> 21101
						       group by acc_code)a,
						       md_account_heads b
						 where a.acc_code = b.acc_code
					         group by acc_code
						 ORDER BY acc_code");
			return $data->result();	
		}
    //  Function For Stock Report Developed By Lokesh  01/04/2020//
		public function stockreport($start_dt){
		   $data=$this->db->query("Select a.PROD_ID PROD_ID,a.COMPANY COMPANY,
	   						 a.PROD_DESC PROD_DESC,
       							 sum(b.qty) qty   

       						from   mm_product a,
	   					    td_purchase b    							   							
					  where  a.PROD_ID = b.prod_id
					
					  group by PROD_DESC,qty,PROD_ID,COMPANY");

				return $data->result();
		}

		public function f_get_stock_view($banch_id,$fin_id){
			$data=$this->db->query("select ro_no,ro_dt,invoice_no,invoice_dt,challan_flag from td_purchase
									where br='$banch_id' and fin_yr='$fin_id' order by ro_dt,ro_no");
			return $data->result();

		}
   // Function For Stock Report Developed By Lokesh  13/04/2020//
		public function get_crnote_dist_report($banch_id){

                 $data=$this->db->query("select a.do_no,a.do_dt,a.tot_cr_amt,b.COMP_NAME 

       						from   td_cr_note a,
	   					    mm_company_dtls b  

					  where  a.comp_id = b.COMP_ID
                        and  a.branch_id = '$banch_id'
            				group by do_no,do_dt,tot_cr_amt,COMP_NAME");
              
				return $data->result();
		}

		public function get_crnote_comp_report($comp_id){


			  $data=$this->db->query("select a.do_no,a.do_dt,a.tot_cr_amt,a.branch_id,b.COMP_NAME ,c.district_name

       						from   td_cr_note a,
	   					    mm_company_dtls b,md_district c

					  where  a.comp_id = b.COMP_ID
					    and  a.branch_id =c.district_code
                        and  a.comp_id = '$comp_id'
            				group by do_no,do_dt,tot_cr_amt,branch_id,COMP_NAME,district_name");
              
				return $data->result();



		}
   // Code Devoleped For get Remain Amount Money Of Cr Of Company 15/04/2020/
		public function get_crnote_remain_report($comp_id){

			  $data=$this->db->query("select ro_no,branch_id,ifnull(sum(soc_amt),0) as soc_amt

       						from   td_dr_note
	   					   
					  where comp_id = '$comp_id'
					   
            				group by ro_no,branch_id");
              
				return $data->result();

		}

		// Function For Stock Report Developed By Lokesh  16/04/2020//
		public function get_drdist_report($banch_id){

                 $data=$this->db->query("select a.ro_no,a.tot_amt,ifnull(sum(a.soc_amt),0) as soc_amt,b.soc_name 

       						from   td_dr_note a,
	   					    mm_ferti_soc b  

					  where  a.soc_id = b.soc_id
                        and  a.branch_id = '$banch_id'
            				group by ro_no,tot_amt,soc_name");
              
				return $data->result();
		}


	}
?>
