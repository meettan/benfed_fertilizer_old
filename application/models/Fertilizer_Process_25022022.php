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

		public function f_get_tot_recvamt_ho($from_dt,$to_dt){	
			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_recvamt');
			$this->db->where('paid_dt>=',$from_dt);
			$this->db->where('paid_dt<=',$to_dt);

			
			$data=$this->db->get('tdf_payment_recv a ');
            return $data->row();
		}

		public function f_get_tot_recvamt($branch_id,$from_dt,$to_dt){	
			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_recvamt');
			$this->db->where('a.paid_dt>=',$from_dt);
			$this->db->where('a.paid_dt<=',$to_dt);
			$this->db->where('a.branch_id',$branch_id);
			
			$data=$this->db->get('tdf_payment_recv a ');
            return $data->row();
		}
		
		public function f_get_tot_purchase($branch_id,$from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_purchase');
			$this->db->where('a.br',$branch_id);
			$this->db->where('a.trans_dt>=',$from_dt);
			$this->db->where('a.trans_dt<=',$to_dt);
			$this->db->where('a.prod_id=b.prod_id');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a,mm_product b');
            return $data->row();
		}

		public function f_get_tot_purchasesld($branch_id,$from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.qty), 0) tot_purchase');
			$this->db->where('a.br',$branch_id);
			$this->db->where('a.trans_dt>=',$from_dt);
			$this->db->where('a.trans_dt<=',$to_dt);
			$this->db->where('a.prod_id=b.prod_id');
			$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a,mm_product b');
            return $data->row();
		}

public function f_get_tot_purchaselqd($branch_id,$from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.qty), 0) tot_purchase');
			$this->db->where('a.br',$branch_id);
			$this->db->where('a.trans_dt>=',$from_dt);
			$this->db->where('a.trans_dt<=',$to_dt);
			$this->db->where('a.prod_id=b.prod_id');
			$this->db->where('b.unit in(3,5)');
			$data=$this->db->get('td_purchase a,mm_product b');
            return $data->row();
		}

		public function f_get_tot_purchase_ho($from_dt,$to_dt){				//ho purchase
		
			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_purchase_ho');
			$this->db->where('a.trans_dt>=',$from_dt);
			$this->db->where('a.trans_dt<=',$to_dt);
			$this->db->where('a.prod_id=b.prod_id');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a ,mm_product b');
            return $data->row();
		}
		

		public function f_get_tot_purchase_holqd($from_dt,$to_dt){				//ho purchase
		
			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_purchase_ho');
			$this->db->where('a.trans_dt>=',$from_dt);
			$this->db->where('a.trans_dt<=',$to_dt);
			$this->db->where('a.prod_id=b.prod_id');
			$this->db->where('b.unit in(3,5)');
			$data=$this->db->get('td_purchase a ,mm_product b');
            return $data->row();
		}
		public function f_get_tot_purchase_hosld($from_dt,$to_dt){				//ho purchase
		
			$this->db->select('ifnull(SUM(a.qty), 0) tot_purchase_ho');
			$this->db->where('a.trans_dt>=',$from_dt);
			$this->db->where('a.trans_dt<=',$to_dt);
			$this->db->where('a.prod_id=b.prod_id');
			$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a ,mm_product b');
            return $data->row();
		}
		public function f_get_tot_sale($branch_id,$from_dt,$to_dt){				//branchwise sale 

			$this->db->select('ifnull(SUM(tot_amt), 0) tot_sale');
			$this->db->where('br_cd',$branch_id);
			$this->db->where('do_dt>=',$from_dt);
			$this->db->where('do_dt<=',$to_dt);
			//$this->db->where('b.unit in(1,2,4,6)');
			$this->db->where('a.prod_id=b.prod_id');
			$data=$this->db->get('td_sale a ,mm_product b');
			
            return $data->row();
		}
		public function f_get_tot_salesld($branch_id,$from_dt,$to_dt){				//branchwise sale 

			$this->db->select('ifnull(SUM(a.qty), 0) tot_sale');
			$this->db->where('a.br_cd',$branch_id);
			$this->db->where('a.do_dt>=',$from_dt);
			$this->db->where('a.do_dt<=',$to_dt);
			$this->db->where('b.unit in(1,2,4,6)');
			$this->db->where('a.prod_id=b.prod_id');
			$data=$this->db->get('td_sale a ,mm_product b');
			
            return $data->row();
		}
		
	public function f_get_tot_salelqd($branch_id,$from_dt,$to_dt){				//branchwise sale 

		$this->db->select('ifnull(SUM(a.qty), 0) tot_sale');
		$this->db->where('a.br_cd',$branch_id);
		$this->db->where('a.do_dt>=',$from_dt);
		$this->db->where('a.do_dt<=',$to_dt);
		$this->db->where('b.unit in(3,5)');
		$this->db->where('a.prod_id=b.prod_id');
		$data=$this->db->get('td_sale a ,mm_product b');
		
		return $data->row();
	}
		public function f_get_tot_sale_ho($from_dt,$to_dt){				//ho sale
		
			$this->db->select('ifnull(SUM(tot_amt), 0) tot_sale_ho');
			$this->db->where('do_dt>=',$from_dt);
			$this->db->where('do_dt<=',$to_dt);
			//$this->db->where('b.unit in(3,5)');
			$this->db->where('a.prod_id=b.prod_id');
			$data=$this->db->get('td_sale a ,mm_product b');
            return $data->row();
		}
		public function f_get_tot_sale_holqd($from_dt,$to_dt){				//ho sale
		
			$this->db->select('ifnull(SUM(a.qty), 0) tot_sale_ho');
			$this->db->where('a.do_dt>=',$from_dt);
			$this->db->where('a.do_dt<=',$to_dt);
			$this->db->where('b.unit in(3,5)');
			$this->db->where('a.prod_id=b.prod_id');
			$data=$this->db->get('td_sale a ,mm_product b');
            return $data->row();
		}
		public function f_get_tot_sale_hosld($from_dt,$to_dt){				//ho sale
		
			$this->db->select('ifnull(SUM(a.qty), 0) tot_sale_ho');
			$this->db->where('a.do_dt>=',$from_dt);
			$this->db->where('a.do_dt<=',$to_dt);
			$this->db->where('b.unit in(1,2,4,6)');
			$this->db->where('a.prod_id=b.prod_id');
			$data=$this->db->get('td_sale a ,mm_product b');
            return $data->row();
		}
	}	
?>
