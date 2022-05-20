<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_Process extends CI_Model{

		public function f_select_password($user_id){
			$this->db->select('password,user_status');
			$this->db->where('user_id',$user_id);
			$data=$this->db->get('md_users');

			if($data->num_rows() > 0 )
			{
				return $data->row();
			}
			else
			{
				return false;
			}
		}

		public function f_insert_audit_trail($user_id){

			$time = date("Y-m-d h:i:s");
			$pcaddr = $_SERVER['REMOTE_ADDR'];

			$value = array('login_dt'=> $time,
				       'user_id' => $user_id,
			      	       'terminal_name'=>$pcaddr);
			$this->db->insert('td_audit_trail',$value);
		}

		public function f_get_user_inf($user_id){
			$this->db->select('*');
			$this->db->from('md_users');
			$this->db->where('md_users.user_id',$user_id);
			$this->db->join('md_branch', 'md_users.branch_id = md_branch.id', 'LEFT');
			$data=$this->db->get();
			return $data->row();
		}
		public function f_get_branch_inf($branch_id){
			$this->db->select('*');
			$this->db->from('md_branch');
			$this->db->where('md_branch.id',$branch_id);
			$data=$this->db->get();
			return $data->row();
		}
		public function f_get_branch_list(){
			$this->db->select('*');
			$this->db->from('md_branch');
			$this->db->order_by("branch_name", "asc");
			$data=$this->db->get();
			return $data->result();
		}

		public function f_get_dist_inf($dist_cd){

				$this->db->select('*');

				$this->db->where('district_code',$dist_cd);

				$data = $this->db->get('md_district');

				return $data->row();

		}

		public function f_get_kms_inf($sl_no){

			$this->db->select('*');

			$this->db->where('sl_no',$sl_no);

			$data = $this->db->get('md_kms_year');

			return $data->row();

	}


		public function f_get_kms_yr(){

			$this->db->select('*');

			$data = $this->db->get('md_kms_year');

			return $data->result();
		}

		public function f_update_audit_trail($user_id){
			$time = date("Y-m-d h:i:s");
			$sl_no= $this->session->userdata('sl_no')->sl_no;
			$value= array('logout'=>$time);
			$this->db->where('sl_no',$sl_no);
			$this->db->update('td_audit_trail',$value);
		}
		
		public function f_get_parameters($sl_no){
			$this->db->select('param_value');
			$this->db->where('sl_no',$sl_no);
			$data=$this->db->get('md_parameters');

			if($data->num_rows() > 0 ){
				return $data->row();
			}else{
				return false;
			}
		}
		
		public function f_audit_trail_value($user_id){
    		$this->db->select_max('sl_no');
    		$this->db->where('user_id', $user_id);
    		$details = $this->db->get('td_audit_trail');
    		return $details->row();
		}
		
		public function f_get_tot_paddy_procurement($kms_id,$branch_id){
		
			$this->db->select('ifnull(SUM(quantity), 0) tot_quantity,count(cheque_no) cheque_no,ifnull(SUM(amount), 0) amount');
			$this->db->where('kms_id',$kms_id);
			$this->db->where('branch_id',$branch_id);
			$data=$this->db->get('td_collections');
            return $data->row();
		}
		public function f_get_tot_paddy_procurement_ho($kms_id){
		
			$this->db->select('ifnull(SUM(quantity), 0) tot_quantity,count(cheque_no) cheque_no,ifnull(SUM(amount), 0) amount');
			$this->db->where('kms_id',$kms_id);
			$data=$this->db->get('td_collections');
            return $data->row();
		}
		public function f_get_tot_cheque_cleared($kms_id,$branch_id){

            $this->db->select('ifnull(SUM(amount), 0) tot_clr_cheque');
			$this->db->where('kms_id',$kms_id);
			$this->db->where('chq_status',"C");
			$this->db->where('branch_id',$branch_id);
			$data = $this->db->get('td_collections');
            return $data->row();

		}
		public function f_get_tot_cheque_cleared_ho($kms_id){

            $this->db->select('ifnull(SUM(amount), 0) tot_clr_cheque');
			$this->db->where('kms_id',$kms_id);
			$this->db->where('chq_status',"C");
			$data = $this->db->get('td_collections');
            return $data->row();

		}
		public function f_get_tot_cmr_offered($kms_id,$branch_id){
		
			$this->db->select('ifnull(SUM(cmr_offered_now), 0) cmr_offered_now');
			$this->db->where('kms_year',$kms_id);
			$this->db->where('branch_id',$branch_id);
			$data=$this->db->get('td_cmr_offered');
            return $data->row();
		}
		public function f_get_tot_cmr_offered_ho($kms_id){
		
			$this->db->select('ifnull(SUM(cmr_offered_now), 0) cmr_offered_now');
			$this->db->where('kms_year',$kms_id);
			$data=$this->db->get('td_cmr_offered');
            return $data->row();
		}
		public function f_get_tot_cmr_delivery($kms_id,$branch_id){
		
			$this->db->select('ifnull(SUM(tot_delivery), 0) tot_delivery');
			$this->db->where('kms_year',$kms_id);
			$this->db->where('branch_id',$branch_id);
			$data=$this->db->get('td_cmr_delivery');
            return $data->row();
		}
		public function f_get_tot_cmr_delivery_ho($kms_id){
		
			$this->db->select('ifnull(SUM(tot_delivery), 0) tot_delivery');
			$this->db->where('kms_year',$kms_id);
			$data=$this->db->get('td_cmr_delivery');
            return $data->row();
		}
		
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
		
		

	}	
?>
