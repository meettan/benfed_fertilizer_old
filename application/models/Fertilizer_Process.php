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
		
		public function f_get_tot_recvamt_ho($from_dt,$to_dt){	
			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_recvamt');
			$this->db->where('paid_dt>=',$from_dt);
			$this->db->where('paid_dt<=',$to_dt);

			
			$data=$this->db->get('tdf_payment_recv a ');
            return $data->row();
		}

		public function f_get_tot_recvamt($branch_id,$from_dt,$to_dt){	
			$this->db->select('ifnull(SUM(a.paid_amt), 0)  tot_recvamt');
			$this->db->where('a.paid_dt>=',$from_dt);
			$this->db->where('a.paid_dt<=',$to_dt);
			$this->db->where('a.branch_id',$branch_id);
			
			$data=$this->db->get('tdf_payment_recv a ');
            return $data->row();
		}

		public function f_get_stkpnt($branch_id){

	
         	// $this->db->select('a.soc_id,a.soc_name');
			
			// $this->db->where('a.district',$branch_id);
			
			// $data=$this->db->get('mm_ferti_soc a ');


			$data = $this->db->query("select   a.stock_point,
			TRUNCATE(sum(CASE c.unit 
				WHEN '5' THEN a.qty/1000
				WHEN '3' THEN a.qty
				ELSE 0
				END ),3)as qty_lqd,
				TRUNCATE(sum(CASE c.unit 
				WHEN '1' THEN a.qty
				WHEN '2' THEN a.qty/1000
				WHEN '4' THEN a.qty/10
				WHEN '6' THEN a.qty/10000
				ELSE 0
				END ),3)as qty_sld,
a.soc_name
			from(select a.prod_id as prod_id,a.comp_id as comp_id,a.stock_point as stock_point,ifnull(sum(a.qty),0) as qty, b.soc_name as soc_name 
				from td_purchase a,mm_ferti_soc b where a.stock_point = b.soc_id and a.trans_dt <=CURDATE() and a.br = '$branch_id' 
				group by a.stock_point,b.soc_name,a.prod_id,a.comp_id 
				UNION 
				select a.prod_id as prod_id,a.comp_id as comp_id,a.stock_point as stock_point,ifnull(sum(a.qty),0)*-1 as qty , b.soc_name as soc_name 
				from td_sale a,mm_ferti_soc b 
				where a.stock_point = b.soc_id 
				and a.br_cd = '$branch_id' and a.do_dt<=CURDATE() 
				group by a.stock_point,b.soc_name,a.prod_id,a.comp_id)a,mm_company_dtls b,mm_product c
				where a.comp_id = b.COMP_ID
				and a.prod_id=c.prod_id
				and a.qty>0
				group by a.stock_point,a.soc_name
				order by a.soc_name");
			
            return $data->result();
			

		
		// 	echo json_encode($product);
		
		}

		public function f_get_tot_puriffco($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_paybl');
			$this->db->where('a.ro_dt>=',$from_dt);
			$this->db->where('a.ro_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=1');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_paidiffco($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_paid');
			$this->db->where('a.pay_dt>=',$from_dt);
			$this->db->where('a.pay_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=1');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('tdf_company_payment a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_purcil($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_paybl');
			$this->db->where('a.ro_dt>=',$from_dt);
			$this->db->where('a.ro_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=4');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_paidcil($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_paid');
			$this->db->where('a.pay_dt>=',$from_dt);
			$this->db->where('a.pay_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=4');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('tdf_company_payment a,mm_company_dtls b');
            return $data->row();
		}
		public function f_get_tot_puripl($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_paybl');
			$this->db->where('a.ro_dt>=',$from_dt);
			$this->db->where('a.ro_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=3');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_paidipl($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_paid');
			$this->db->where('a.pay_dt>=',$from_dt);
			$this->db->where('a.pay_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=3');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('tdf_company_payment a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_purjcf($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_paybl');
			$this->db->where('a.ro_dt>=',$from_dt);
			$this->db->where('a.ro_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=6');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_paidjcf($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_paid');
			$this->db->where('a.pay_dt>=',$from_dt);
			$this->db->where('a.pay_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=6');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('tdf_company_payment a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_purkcfl($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_paybl');
			$this->db->where('a.ro_dt>=',$from_dt);
			$this->db->where('a.ro_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=5');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_paidkcfl($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_paid');
			$this->db->where('a.pay_dt>=',$from_dt);
			$this->db->where('a.pay_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=5');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('tdf_company_payment a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_purkribhco($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_paybl');
			$this->db->where('a.ro_dt>=',$from_dt);
			$this->db->where('a.ro_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=2');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a,mm_company_dtls b');
            return $data->row();
		}
		public function f_get_tot_paidkribhco($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_paid');
			$this->db->where('a.pay_dt>=',$from_dt);
			$this->db->where('a.pay_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=2');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('tdf_company_payment a,mm_company_dtls b');
            return $data->row();
		}

		public function f_get_tot_purmipl($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.tot_amt), 0) tot_paybl');
			$this->db->where('a.ro_dt>=',$from_dt);
			$this->db->where('a.ro_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=7');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('td_purchase a,mm_company_dtls b');
            return $data->row();
		}
		public function f_get_tot_paidmipl($from_dt,$to_dt){				//branchwise purchase 

			$this->db->select('ifnull(SUM(a.paid_amt), 0) tot_paid');
			$this->db->where('a.pay_dt>=',$from_dt);
			$this->db->where('a.pay_dt<=',$to_dt);
			$this->db->where('a.comp_id=b.COMP_ID');
			$this->db->where('a.comp_id=7');
			//$this->db->where('b.unit in(1,2,4,6)');
			$data=$this->db->get('tdf_company_payment a,mm_company_dtls b');
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

			$this->db->select('TRUNCATE(ifnull(SUM(if(b.unit=3,a.qty,a.qty/1000)), 0),3) as  tot_purchase');
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
		
			$this->db->select('TRUNCATE(ifnull(SUM(if(b.unit=3,a.qty,a.qty/1000)), 0),3) tot_purchase_ho');
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

		$this->db->select('TRUNCATE(ifnull(SUM(if(b.unit=3,a.qty,a.qty/1000)), 0),3) tot_sale');
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
	//   07/03/2022       Coding date   //
		public function f_get_solid_sale($from_yr_day,$to_yr_day){
			
		$sql = 	"select sum(qty) qty,a.br_cd,b.district_name from (
					select sum(qty) qty,br_cd  from td_sale where unit = 1 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' 
					group by br_cd
					union 
					select sum(qty)/1000 qty,br_cd from td_sale where unit = 2 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' 
					group by br_cd
					union 
					select sum(qty)/10 qty,br_cd from td_sale where unit = 4 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' 
					group by br_cd
					UNION
					select sum(qty)/1000000 qty,br_cd from td_sale where unit = 6 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day'
					group by br_cd
					) 
				a,md_district b
				where a.br_cd = b.district_code
				group by a.br_cd,b.district_name
				";
			
		$data = $this->db->query($sql);	
		return $data->result();
		}
		
		public function f_get_liquid_sale($from_yr_day,$to_yr_day){
			
		$sql = 	"select sum(qty) qty,a.br_cd,b.district_name from (
					select sum(qty) qty,br_cd  from td_sale where unit = 3 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' 
					group by br_cd
					union 
					select sum(qty)/1000 qty,br_cd from td_sale where unit = 5 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' 
					group by br_cd
					) 
				a,md_district b
				where a.br_cd = b.district_code
				group by a.br_cd,b.district_name
				";
			
		$data = $this->db->query($sql);	
		return $data->result();
		}
		
		public function f_get_solid_sale_tot($from_yr_day,$to_yr_day){
			
		$sql = 	"select IFNULL(sum(qty),0) qty from (
					select sum(qty) qty  from td_sale where unit = 1 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day'
					union 
					select sum(qty)/1000 qty from td_sale where unit = 2 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day'
					union 
					select sum(qty)/10 qty from td_sale where unit = 4 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' 
					UNION
					select sum(qty)/1000000 qty from td_sale where unit = 6 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day'
					) a ";
			
		$data = $this->db->query($sql);	
		return $data->row();
		}
		
		public function f_get_liquid_sale_tot($from_yr_day,$to_yr_day){
			
		$sql = 	"select sum(qty) qty from (
				 select sum(qty) qty from td_sale where unit = 3 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day'
				 union 
				 select sum(qty)/1000 qty from td_sale where unit = 5 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day'
				) a ";
		$data = $this->db->query($sql);	
		return $data->row();
		}
		
		/************************************************************************************************************************/
		//    Query used for to fetch tje purchase of a day in barnch dashboard  usertype= Manager and admin 
		//    Controller=Fertilizer_login function main     ///    08/03/2022
		
		//    For solid 
		public function f_get_solid_pur_tot($from_yr_day,$to_yr_day,$br_cd){
			
		$sql = 	"select IFNULL(sum(qty),0) qty from (
					select sum(qty) qty  from td_purchase where unit = 1 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
					union 
					select sum(qty)/1000 qty from td_purchase where unit = 2 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
					union 
					select sum(qty)/10 qty from td_purchase where unit = 4 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
					UNION
					select sum(qty)/1000000 qty from td_purchase where unit = 6 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
					) a ";
			
		$data = $this->db->query($sql);	
		return $data->row();
		}
		
		//    For Liquid 
		public function f_get_liquid_pur_tot($from_yr_day,$to_yr_day,$br_cd){
			
		$sql = 	"select sum(qty) qty from (
				 select sum(qty) qty from td_purchase where unit = 3 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
				 union 
				 select sum(qty)/1000 qty from td_purchase where unit = 5 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
				) a ";
		$data = $this->db->query($sql);	
		return $data->row();
		}
		
		/*****************************************************************************************************************************/
		
		/************************************************************************************************************************/
		//    Query used for to fetch  sale of a day in barnch dashboard  usertype= Manager and admin 
		//    Controller=Fertilizer_login function main     ///    08/03/2022
		//    For solid 
		
		public function f_solidsalebranchwise_tot($from_yr_day,$to_yr_day,$br_cd){
			
		$sql = 	"select IFNULL(sum(qty),0) qty from (
					select sum(qty) qty  from td_sale where unit = 1 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br_cd ='$br_cd'
					union 
					select sum(qty)/1000 qty from td_sale where unit = 2 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br_cd ='$br_cd'
					union 
					select sum(qty)/10 qty from td_sale where unit = 4 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br_cd ='$br_cd' 
					UNION
					select sum(qty)/1000000 qty from td_sale where unit = 6 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br_cd ='$br_cd'
					) a ";
			
		$data = $this->db->query($sql);	
		return $data->row();
		}
		//    For liquid
		public function f_liquidsalebranchwise_tot($from_yr_day,$to_yr_day,$br_cd){
			
		$sql = 	"select sum(qty) qty from (
				 select sum(qty) qty from td_sale where unit = 3 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br_cd ='$br_cd'
				 union 
				 select sum(qty)/1000 qty from td_sale where unit = 5 and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br_cd ='$br_cd'
				) a ";
		$data = $this->db->query($sql);	
		return $data->row();
		}
		
		/*********************************************************************************************/
		
		
		/************************************************************************************************************************/
		//    Query used for to fetch Opening stock of a day in barnch dashboard  usertype= Manager and admin 
		//    Controller=Fertilizer_login function main     ///    08/03/2022
		
		//    For solid 
		public function f_get_solid_pur_tots($from_yr_day,$to_yr_day,$br_cd){
			
		$sql = 	"select IFNULL(sum(qty),0) qty from (
					select sum(qty) qty  from td_purchase where unit = 1 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
					union 
					select sum(qty)/1000 qty from td_purchase where unit = 2 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
					union 
					select sum(qty)/10 qty from td_purchase where unit = 4 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
					UNION
					select sum(qty)/1000000 qty from td_purchase where unit = 6 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
					) a ";
			
		$data = $this->db->query($sql);	
		return $data->row();
		}
		
		//    For Liquid 
		public function f_get_liquid_pur_tots($from_yr_day,$to_yr_day,$br_cd){
			
		$sql = 	"select sum(qty) qty from (
				 select sum(qty) qty from td_purchase where unit = 3 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
				 union 
				 select sum(qty)/1000 qty from td_purchase where unit = 5 and trans_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br='$br_cd'
				) a ";
		$data = $this->db->query($sql);	
		return $data->row();
		}
		
		/*****************************************************************************************************************************/
		
		///   Opening Stock for Solid 
		
		public function f_get_product_list($branch,$frmDt){

            $query  = $this->db->query("select Distinct a.prod_id,b.PROD_DESC,a.comp_id,b.unit,
                                        c.COMP_NAME,c.short_name,b.qty_per_bag
                                from   td_purchase a,mm_product b,mm_company_dtls c
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                               
                                and     a.br       = $branch
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }
		public function f_get_balance($branch,$frmDt,$toDt){
            if ($frmDt>='2021-04-01') {

                $data = $this->db->query("Select prod_id,tot_sale,ifnull(sum(tot_sale),0)tot_sale,ifnull(Sum(qty ),0) + ifnull(sum(tot_pur),0) - ifnull(sum(tot_sale),0) as opn_qty, tot_pur, tot_sale,sum(tot_sale)tot_sale,0 cls_qty
            from (
                select prod_id,sum(qty)+sum(tot_pur)-sum(tot_sale)qty,0 tot_pur,0 tot_sale
                from(
                select prod_id,sum(ifnull(qty,0))qty,0 tot_pur,0 tot_sale
                                from tdf_opening_stock
                                where branch_id	    = $branch
                                and   balance_dt ='2020-04-01'
                                group by prod_id
                                union
                select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                                  from td_sale
                                  where br_cd	    = $branch
                                  and   do_dt <'$frmDt'
                                  group by prod_id
                UNION
                select prod_id,ifnull(sum(qty),0) tot_pur,0 qty,0 tot_sale
                                  from td_purchase
                                  where br	    =$branch
                                  and   trans_dt <'$frmDt'
                                  and   trans_flag = 1
                                  group by prod_id)a
                                  group by prod_id
                  UNION
                  select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale
                  from td_purchase
                  where br	    = $branch
                  and   trans_dt between '$frmDt' and  '$toDt'
                  and   trans_flag = 1
                  group by prod_id
                  UNION
                  select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                  from td_sale
                  where br_cd	    = $branch
                  and   do_dt between '$frmDt' and '$toDt'
                  group by prod_id)a
              group by prod_id
              order by prod_id");
			}else{
				 
				 $data = $this->db->query("Select prod_id,tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as opn_qty, tot_pur, tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as cls_qty
            from (
                select prod_id,sum(qty)+sum(tot_pur)-sum(tot_sale)qty,0 tot_pur,0 tot_sale
                from(
                select prod_id,sum(ifnull(qty,0))qty,0 tot_pur,0 tot_sale
                                from tdf_opening_stock
                                where branch_id	    = $branch
                                and   balance_dt ='2020-04-01'
                                group by prod_id
                                union
                select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                                  from td_sale
                                  where br_cd	    = $branch
                                  and   do_dt <'$frmDt'
                                  group by prod_id
                UNION
                select prod_id,ifnull(sum(qty),0) tot_pur,0 qty,0 tot_sale
                                  from td_purchase
                                  where br	    =$branch
                                  and   trans_dt <'$frmDt'
                                  and   trans_flag = 1
                                  group by prod_id)a
                                  group by prod_id
                  UNION
                  select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale
                  from td_purchase
                  where br	    = $branch
                  and   trans_dt between '$frmDt' and  '$toDt'
                  and   trans_flag = 1
                  group by prod_id
                  UNION
                  select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                  from td_sale
                  where br_cd	    = $branch
                  and   do_dt between '$frmDt' and '$toDt'
                  group by prod_id)a
              group by prod_id
              order by prod_id");
			}
        
			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
        }
		
		public function get_todaycollection($from_yr_day,$to_yr_day,$br_cd){
			
			
		$sql = "select sum(amt) amt from (select ifnull(sum(paid_amt),0) amt from tdf_payment_recv where paid_dt BETWEEN '$from_yr_day' and '$to_yr_day' 
				and branch_id='$br_cd'
				UNION
				select ifnull(sum(adv_amt),0)  amt from tdf_advance  where trans_dt	BETWEEN '$from_yr_day' and '$to_yr_day' and branch_id='$br_cd') a";
			
		$data = $this->db->query($sql);	
		return $data->row();	
		}
		
		//    Code for B2C    and B2B  in barnch dashboard  usertype= Manager and admin 
		//    Controller=Fertilizer_login function main     ///    08/03/2022  
		public function get_b2cfortoday($from_yr_day,$to_yr_day,$br_cd){
			
			$sql = "select ifnull(count(*),0) cnt from td_sale where irn = NULL and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br_cd ='$br_cd'";
			$data = $this->db->query($sql);	
		    return $data->row();
		}
		public function get_b2bfortoday($from_yr_day,$to_yr_day,$br_cd){
			
			$sql = "select ifnull(count(*),0) cnt from td_sale where irn != NULL and do_dt BETWEEN '$from_yr_day' and '$to_yr_day' and br_cd ='$br_cd'";
			$data = $this->db->query($sql);	
		    return $data->row();
		}
	
		
		
		///    
		
	}	
?>
