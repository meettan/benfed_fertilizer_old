<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FertilizerModel extends CI_Model{	
		
		public function __construct()
    {
        parent::__construct();
       
		$this->db2 = $this->load->database('findb', TRUE);
		
    }
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
		public function stockreport($start_dt,$br){
		
			$data=$this->db->query("Select a.PROD_ID PROD_ID,a.COMPANY COMPANY,
									a.PROD_DESC PROD_DESC,
										sum(b.qty)
						- (select ifnull(sum(d.qty),0) from td_sale d where  d.br_cd='$br'  and d.prod_id=a.prod_id )qty
									from   mm_product a,
									td_purchase b    							   							
									where  a.PROD_ID = b.prod_id
									and b.br='$br'
									and qty>0
									group by PROD_DESC,PROD_ID,COMPANY
															");
 
				 return $data->result();
		 }

		 public function stockledgreport($start_dt,$br){
		
			$data=$this->db->query("Select DATE_FORMAT(b.trans_dt, '%d/%m/%Y')trans_dt,'Opening Stock'as TRANSACTION ,a.PROD_ID PROD_ID,a.COMPANY COMPANY,a.PROD_DESC           
			PROD_DESC,sum(b.qty)qty
			From   mm_product a,td_purchase b   
			where  a.PROD_ID = b.prod_id
			and b.br='$br'
			and qty>0
			and trans_flag='2'
			and DATE_FORMAT(b.trans_dt,'%d/%m/%Y')<='$start_dt'
			group by trans_dt,PROD_DESC,PROD_ID,COMPANY
			UNION
           Select DATE_FORMAT(b.trans_dt, '%d/%m/%Y')trans_dt,'Purchase'as TRANSACTION,a.PROD_ID PROD_ID,a.COMPANY COMPANY,a.PROD_DESC           
			PROD_DESC,sum(b.qty)qty
			From   mm_product a,td_purchase b    							   										
			where  a.PROD_ID = b.prod_id
			and b.br='$br'
			and qty>0
			and trans_flag='1'
			and b.trans_dt<='$start_dt'
			group by trans_dt,PROD_DESC,PROD_ID,COMPANY
			UNION
			select DATE_FORMAT(b.do_dt, '%d/%m/%Y')do_dt,'Sale',a.prod_id,a.company,a.prod_desc,sum(b.qty)qty
			 from mm_product a,td_sale b
			 where  a.PROD_ID = b.prod_id
			 and b.do_dt<='$start_dt'
			 and b.br_cd='$br'
			 group by do_dt,a.prod_id,a.company,a.prod_desc
			 union
			 Select DATE_FORMAT(CURDATE(),'%d/%m/%Y'),'Closing Stock'
								,a.prod_id,'',a.prod_desc,
										sum(b.qty)
						- (select ifnull(sum(d.qty),0) from td_sale d where  d.br_cd='$br'  and d.prod_id=a.prod_id and d.do_dt<='$start_dt' )qty
									from   mm_product a,
									td_purchase b    							   							
									where  a.PROD_ID = b.prod_id
									and b.br='$br'
									and b.trans_dt<='$start_dt'
									and qty>0
									group by a.prod_id,a.prod_desc
			order by prod_id,trans_dt");
 
				 return $data->result();
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


		public function f_select_distinct($table,$select=NULL,$where=NULL,$type){	/**Select distinct data */

			$this->db->distinct();

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
																			/*Select Maximun soceity Code*/					
		public function get_soceity_code(){
           
			$db2 = $this->load->database('findb', TRUE);
			
			 $data= $db2->query("select max(sl_no)+1 as sl_no from md_achead ");
		 
			 $result = $data->row();
			 return $result->sl_no;
		 }
		 public function f_get_acc(){
			$db2 = $this->load->database('findb', TRUE);
			
			 $data= $db2->query("select  max(sl_no)+1 as acc_cd,max(sl_no)+2 as adv_cd
			 from   md_achead ");
			// echo $db2->last_query();
			//  die();
			 $result = $data->row();
			
			 return $result;
	 }

																			/*Select Maximun product Code*/			
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

public function  f_get_sale_rt_catg($comp_id){
$sql ="select * from  mm_category where comp_id='$comp_id'";
$result = $this->db->query($sql);     
	  
return $result->row();
}

public function f_district($bulk_id,$fin_id){
    $sql   ="select district from mm_sale_rate where bulk_id='$bulk_id' and fin_id='$fin_id'";
	//$sql   ="select  STRING_AGG(district,',') from mm_sale_rate where bulk_id='$bulk_id'";
	$result=$this->db->query($sql);

	return $result->result_array();

}

		public function f_max_id($fin_id){

			$this->db->select_max('bulk_id');

			$this->db->where('fin_id',$fin_id);

			$result = $this->db->get('mm_sale_rate')->row()->bulk_id;

			return ($result+1);

		}
 
	}
?>