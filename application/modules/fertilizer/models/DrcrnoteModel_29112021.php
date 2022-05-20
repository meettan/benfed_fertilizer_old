<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class DrcrnoteModel extends CI_Model{					/*Insert Data in Tables*/
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
		

		public function f_get_receiptReport_dtls($receipt_no,$finYr )
		{
	
		  $sql = $this->db->query(" select a.trans_dt,a.recpt_no,a.trans_no,a.soc_id,b.soc_name,b.gstin,a.comp_id,a.invoice_no,a.ro,a.catg,a.tot_amt,a.trans_flag,a.note_type,a.remarks,c.cat_desc
                                    from tdf_dr_cr_note a ,mm_ferti_soc b,mm_cr_note_category c
									 where a.soc_id=b.soc_id
									 and   a.catg = c.sl_no
									 and recpt_no ='$receipt_no' and fin_yr='$finYr'");			
		  return $sql->row();
	
		}
		
		public function get_trans_no($fin_id){

			$sql="select ifnull(max(trans_no),0) + 1 trans_no
					 from tdf_dr_cr_note where fin_yr = '$fin_id'";

		  $result = $this->db->query($sql);     
	  
		  return $result->row();

		}

		public function f_delete($table_name, $where) {			

			$this->db->delete($table_name, $where);
	 
			 return;
		}
		



	}
?>
