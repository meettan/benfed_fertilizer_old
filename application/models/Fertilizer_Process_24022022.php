<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Fertilizer_Process extends CI_Model{

 
		public function f_get_fin_inf($sl_no){

			$this->db->select('*');

			$this->db->where('sl_no',$sl_no);

			$data = $this->db->get('md_fin_year');

			return $data->row();

	}


		public function f_get_fin_yr(){

			$this->db->select('*');

			$data = $this->db->get('md_fin_year');

			return $data->result();
		}

		public function f_get_tot_purchase($branch_id,$from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(tot_amt), 0) tot_purchase');
			$this->db->where('br',$branch_id);
			$this->db->where('trans_dt>=',$from_dt);
			$this->db->where('trans_dt<=',$to_dt);
			$data=$this->db->get('td_purchase');
            return $data->row();
		}

		public function f_get_tot_purchase_ho($from_dt,$to_dt){				//ho purchase
		
			$this->db->select('ifnull(SUM(tot_amt), 0) tot_purchase_ho');
			$this->db->where('trans_dt>=',$from_dt);
			$this->db->where('trans_dt<=',$to_dt);
			$data=$this->db->get('td_purchase');
            return $data->row();
		}

		public function f_get_tot_sale($branch_id,$from_dt,$to_dt){				//branchwise sale 

			$this->db->select('ifnull(SUM(tot_amt), 0) tot_sale');
			$this->db->where('br_cd',$branch_id);
			$this->db->where('do_dt>=',$from_dt);
			$this->db->where('do_dt<=',$to_dt);
			$data=$this->db->get('td_sale');
            return $data->row();
		}

		public function f_get_tot_sale_ho($from_dt,$to_dt){				//ho sale
		
			$this->db->select('ifnull(SUM(tot_amt), 0) tot_sale_ho');
			$this->db->where('do_dt>=',$from_dt);
			$this->db->where('do_dt<=',$to_dt);
			$data=$this->db->get('td_sale');
            return $data->row();
		}

	}	
?>
