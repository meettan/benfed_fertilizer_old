<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class FinanceModel extends CI_Model{					/*Insert Data in Tables*/
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

		public function f_delete($table_name, $where) {			/*Delete From Table*/

			$this->db->delete($table_name, $where);

			return;

		}

										 /*Select Maximun Account Code*/
		public function f_max_no($table,$column){

			$this->db->select_max($column);

			$result = $this->db->get($table);

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

	}
?>
