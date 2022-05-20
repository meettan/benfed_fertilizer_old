<?php
	class Finance extends MX_Controller{
		public function __construct(){
		parent::__construct();	
		$this->load->model('FinanceModel');
		}

//Schedule Master
		public function scheduleDash(){
			$select         = array("schedule_code","schedule_type");

                        $bank['data']   = $this->FinanceModel->f_select('md_schedule_heads',$select,NULL,0);

			$this->load->view("post_login/main");

			$this->load->view("schedule/dashboard",$bank);

                        $this->load->view('post_login/footer');
		}

		public function scheduleAdd(){
                        if($_SERVER['REQUEST_METHOD'] == "POST") {

                                $sch = $this->input->post('schedule_type');

                                $data_array = array (
                                        "schedule_type"     =>  $sch,

                                        "created_by"        =>  $this->session->userdata('loggedin')->user_name,

                                        "created_dt"        =>  date('Y-m-d h:i:s')
				);

                                $this->FinanceModel->f_insert('md_schedule_heads', $data_array);

                                $this->session->set_flashdata('msg', 'Successfully Added');

                                redirect('finance/scheduleDash');
                        }else {
                                
				$this->load->view('post_login/main');

				$this->load->view("schedule/add");

                                $this->load->view('post_login/footer');
			}
		}

		public function editSchedule(){

                        if($_SERVER['REQUEST_METHOD'] == "POST") {

                                $data_array = array(

                                        "schedule_code"     =>  $this->input->post('schcd'),

                                        "schedule_type"     =>  $this->input->post('sch_name'),

                                        "modified_by"        =>  $this->session->userdata('loggedin')->user_name,

                                        "modified_dt"        =>  date('Y-m-d h:i:s')
                                );

                                $where = array(
                                        "schedule_code" => $this->input->post('schcd')
                                );

                                $this->FinanceModel->f_edit('md_schedule_heads', $data_array, $where);

                                $this->session->set_flashdata('msg', 'Successfully Updated');

                                redirect('finance/scheduleDash');

                        }else{
                                $select = array(
                                        "schedule_code",
                                        "schedule_type"                                     
                                );

				$where = array(
                                        "schedule_code" => $this->input->get('schedule_code')
                                );

                                $sch['schdtls'] = $this->FinanceModel->f_select("md_schedule_heads",$select,$where,1);
                                                                                                                                                  
                                $this->load->view('post_login/main');

                                $this->load->view("schedule/edit",$sch);

                                $this->load->view("post_login/footer");
                        }
                }

//Account Head Master
		public function accountDash(){
                        $select         = array("acc_code","acc_head","acc_flag");

                        $bank['data']   = $this->FinanceModel->f_select('md_account_heads',$select,NULL,0);

                        $this->load->view("post_login/main");

                        $this->load->view("account/dashboard",$bank);

                        $this->load->view('post_login/footer');
		}

		public function accountAdd(){
                        if($_SERVER['REQUEST_METHOD'] == "POST") {

				$sch	= $this->input->post('schedule_cd');
 
				$actype	= $this->input->post('acc_type');

				$acflag	= $this->input->post('acc_flag');

				$max_no = $this->FinanceModel->f_max_no('md_account_heads','acc_code');		

				$max_no->acc_code +=1;

				$max_no = $max_no->acc_code;

                        	if($max_no==1){
                                	$max_no = 10001;
                        	}

                                $data_array = array (
					"sch_code"     	    =>  $sch,

					"acc_code"	    =>  $max_no,

					"acc_head"	    =>  $actype,

					"acc_flag"	    =>  $acflag,

					"auto_flag"	    =>  'M',					

                                        "created_by"        =>  $this->session->userdata('loggedin')->user_name,

                                        "created_dt"        =>  date('Y-m-d h:i:s')
                                );

                                $this->FinanceModel->f_insert('md_account_heads', $data_array);

                                $this->session->set_flashdata('msg', 'Successfully Added');

                                redirect('finance/accountDash');
                        }else {
                                $list['row']       =   $this->FinanceModel->f_select("md_schedule_heads", NULL, NULL, 0);

                                $this->load->view('post_login/main');

                                $this->load->view("account/add",$list);

                                $this->load->view('post_login/footer');
                        }
                }


		 public function editAccount(){

                        if($_SERVER['REQUEST_METHOD'] == "POST") {

                                $data_array = array(

                                        "sch_code"     	    =>  $this->input->post('sch_name'),

                                        "acc_head"          =>  $this->input->post('acc_name'),

                                        "acc_flag"          =>  $this->input->post('ac_type'),

                                        "modified_by"        =>  $this->session->userdata('loggedin')->user_name,

                                        "modified_dt"        =>  date('Y-m-d h:i:s')
                                );

                                $where = array(
                                        "acc_code" => $this->input->post('acc_code')
                                );

                                $this->FinanceModel->f_edit('md_account_heads', $data_array, $where);

                                $this->session->set_flashdata('msg', 'Successfully Updated');

                                redirect('finance/accountDash');

                        }else{
                                $select = array(
                                        "sch_code",
                                        "acc_code",
                                        "acc_head",
                                        "acc_flag",
                                        "auto_flag"
				);

	  			$where = array(
                                        "acc_code" => $this->input->get('acc_code')
                                );

				$acc['accdtls'] = $this->FinanceModel->f_select("md_account_heads",$select,$where,1);

				$acc['schdtls'] = $this->FinanceModel->f_select("md_schedule_heads",NULL,NULL,0);
                                                                               
                                $this->load->view('post_login/main');

                                $this->load->view("account/edit",$acc);

                                $this->load->view("post_login/footer");
                        }
                 }

//Bank Master
		public function view_bank_master(){
			$select 	= array("sl_no","acc_code","bank_name","ac_type","ac_no");

			$bank['data']	= $this->FinanceModel->f_select('md_bank',$select,NULL,0);

			$this->load->view("post_login/main");
			
			$this->load->view("bank_master/bank_dash",$bank);

			$this->load->view('post_login/footer');	
		}

		public function add_bank_master(){
			if($_SERVER['REQUEST_METHOD'] == "POST") {

				$achead = $this->input->post('acc_code');

				$select = array("acc_head");
				
				$where  = array("acc_code" => $achead);

				$bank = $this->FinanceModel->f_select("md_account_heads", $select, $where,1);

				$data_array = array (
					"acc_code"          =>  $achead,

					"bank_name"	    =>  $bank->acc_head,

					"branch_name"       =>  $this->input->post('branch_name'),

					"ac_type"           =>  $this->input->post('ac_type'),

					"ac_no"             =>  $this->input->post('ac_no'),

					"created_by"        =>  $this->session->userdata('loggedin')->user_name,

    					"created_dt"        =>  date('Y-m-d h:i:s')
				);  
				$this->FinanceModel->f_insert('md_bank', $data_array);

    				$this->session->set_flashdata('msg', 'Successfully Added');

    				redirect('finance/view_bank_master');
			}else {
				//Account Heads List
				$list['achead']       =   $this->FinanceModel->f_select("md_account_heads", NULL, NULL, 0);

				$this->load->view('post_login/main');

				$this->load->view("bank_master/bank_add",$list);

    				$this->load->view('post_login/footer');
			}
		}

		public function editBankMaster(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {

				$data_array = array(
					
                                        "branch_name"       =>  $this->input->post('branch_name'),

                                        "ac_type"           =>  $this->input->post('ac_type'),

                                        "ac_no"             =>  $this->input->post('ac_no'),

                                        "modified_by"       =>  $this->session->userdata('loggedin')->user_name,

                                        "modified_dt"       =>  date('Y-m-d h:i:s')
				);

				$where = array(
                                        "acc_code" => $this->input->post('acc_code')
				);
				
				$this->FinanceModel->f_edit('md_bank', $data_array, $where);

				$this->session->set_flashdata('msg', 'Successfully Updated');

				redirect('finance/view_bank_master');
				
			}else{	
				$select	= array(
					"sl_no",
					"acc_code",
					"bank_name",
					"branch_name",
					"ac_type",
					"ac_no"
				  );


				$where = array(
					"acc_code" => $this->input->get('acc_code')
				);

				$bank['bankdtls'] = $this->FinanceModel->f_select("md_bank",$select,$where,1);
										//echo "<pre>";
										//var_dump($bank);die;
				$this->load->view('post_login/main');

				$this->load->view("bank_master/editbank",$bank);
			
				$this->load->view("post_login/footer");
			}
		}

//Cash Voucher
		public function cashDashboard(){

			$cashcd = $this->FinanceModel->f_select_parameter(13);

			$cashcd = $cashcd->param_value;

			$select	    = array(
					"voucher_date",
					"voucher_id",
					"voucher_type",
					"voucher_mode",
					"amount"
					);
			
			$where      = array(
				"acc_code" 	  => $cashcd,

				"approval_status" => 'U'
			);
			
			$voucher['row']	= $this->FinanceModel->f_select("td_vouchers",$select,$where,0);		
			
			$this->load->view('post_login/main');

			$this->load->view('cash_voucher/dashboard',$voucher);

			$this->load->view('post_login/footer');
		}

		public function addCashVoucher(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {

				$v_id    = $this->FinanceModel->f_get_voucher_id($_SESSION['sys_date']);

                                $v_id->voucher_id +=1;

				$v_id    = $v_id->voucher_id;

				$v_code  = $this->input->post('acc_code');

				$v_dc    =  $this->input->post('dc_flg');

				$v_amt   =  $this->input->post('amount');


				for($i = 0; $i < count($v_code); $i++){

					$data_array = array(

						"voucher_date"  	=>  $this->input->post('voucher_dt'),

						"voucher_id"    	=>  $v_id,

						"trans_no"		=>  0,
					
						"voucher_type"  	=>  $this->input->post('voucher_type'),
				
						"voucher_mode"		=>  'C',

						"voucher_through"	=>  'M',

						"acc_code"		=>  $v_code[$i],

						"dr_cr_flag"		=>  $v_dc[$i],

						"remarks"		=>  $this->input->post('remarks'),
					
						"amount"		=>  $v_amt[$i],

						"approval_status"	=>  'U',

						"user_flag"		=>  'S',

						"ins_no"		=>  NULL,

						"ins_dt"		=>  NULL,

						"created_by"		=>  $this->session->userdata('loggedin')->user_name,

						"created_dt"		=>  date('Y-m-d h:i:s')
					);
						
					$this->FinanceModel->f_insert('td_vouchers',$data_array);
				}

				$row_array = array(

                                                "voucher_date"          =>  $this->input->post('voucher_dt'),

                                                "voucher_id"            =>  $v_id,

                                                "trans_no"              =>  0,

                                                "voucher_type"          =>  $this->input->post('voucher_type'),

                                                "voucher_mode"          =>  'C',

                                                "voucher_through"       =>  'M',

                                                "acc_code"              =>  $this->input->post('acc_cd'),

                                                "dr_cr_flag"            =>  $this->input->post('dr_cr_flag'),

                                                "remarks"               =>  $this->input->post('remarks'),

                                                "amount"                =>  $this->input->post('tot_amt'),

						"approval_status"       =>  'U',

						"user_flag"		=>  'M',

                                                "ins_no"                =>  NULL,

                                                "ins_dt"                =>  NULL,

                                                "created_by"            =>  $this->session->userdata('loggedin')->user_name,

						"created_dt"            =>  date('Y-m-d h:i:s')
					);

				$this->FinanceModel->f_insert('td_vouchers',$row_array);	


    				$this->session->set_flashdata('msg', 'Successfully Added');

    				redirect('finance/cashDashboard');
			}else {
				$data['row']   =   $this->FinanceModel->f_select("md_account_heads", NULL, NULL, 0);

				$this->load->view('post_login/main');

				$this->load->view("cash_voucher/add",$data);

    				$this->load->view('post_login/footer');
			}
		}

		public function delCashVoucher(){
			
			$where = array(
				
				"voucher_date"    =>  $this->input->get('voucher_date'),

            			"voucher_id"      =>  $this->input->get('voucher_id')
			);

        		$this->session->set_flashdata('msg', 'Successfully Deleted!');

        		$this->FinanceModel->f_delete('td_vouchers', $where);

        		redirect("finance/cashDashboard");
		}	

//Bank Voucher
		
		public function bankDashboard(){

			$select	    = array( 
					"voucher_date",
					"voucher_id",
					"voucher_type",
					"voucher_mode",
					"amount"
					);
			
			$where      = array(
				"user_flag" 	  => 'M',

				"voucher_mode"	  => 'B',	

				"approval_status" => 'U'
			);
			
			$voucher['row']	= $this->FinanceModel->f_select("td_vouchers",$select,$where,0);		
			
			$this->load->view('post_login/main');

			$this->load->view('bank_voucher/dashboard',$voucher);

			$this->load->view('post_login/footer');
		}

		public function addBankVoucher(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {

				$v_id    = $this->FinanceModel->f_get_voucher_id($_SESSION['sys_date']);

                                $v_id->voucher_id +=1;

				$v_id    = $v_id->voucher_id;

				$v_code  = $this->input->post('acc_code');

				$v_dc    =  $this->input->post('dc_flg');

				$v_amt   =  $this->input->post('amount');
			
				for($i = 0; $i < count($v_code); $i++){

					$data_array = array(

						"voucher_date"  	=>  $this->input->post('voucher_dt'),

						"voucher_id"    	=>  $v_id,

						"trans_no"		=>  0,
					
						"voucher_type"  	=>  $this->input->post('voucher_type'),
				
						"voucher_mode"		=>  'B',

						"voucher_through"	=>  'M',

						"acc_code"		=>  $v_code[$i],

						"dr_cr_flag"		=>  $v_dc[$i],

						"remarks"		=>  $this->input->post('remarks'),
					
						"amount"		=>  $v_amt[$i],

						"approval_status"	=>  'U',

						"user_flag"             =>  'S',

						"ins_no"		=>  NULL,

						"ins_dt"		=>  NULL,

						"created_by"		=>  $this->session->userdata('loggedin')->user_name,

						"created_dt"		=>  date('Y-m-d h:i:s')
					);
						
					$this->FinanceModel->f_insert('td_vouchers',$data_array);
				}

				$row_array = array(

                                                "voucher_date"          =>  $this->input->post('voucher_dt'),

                                                "voucher_id"            =>  $v_id,

                                                "trans_no"              =>  0,

                                                "voucher_type"          =>  $this->input->post('voucher_type'),

                                                "voucher_mode"          =>  'B',

                                                "voucher_through"       =>  'M',

                                                "acc_code"              =>  $this->input->post('acc_cd'),

                                                "dr_cr_flag"            =>  $this->input->post('dr_cr_flag'),

                                                "remarks"               =>  $this->input->post('remarks'),

                                                "amount"                =>  $this->input->post('tot_amt'),

						"approval_status"       =>  'U',

						"user_flag"             =>  'M',

                                                "ins_no"                =>  NULL,

                                                "ins_dt"                =>  NULL,

                                                "created_by"            =>  $this->session->userdata('loggedin')->user_name,

						"created_dt"            =>  date('Y-m-d h:i:s')
					);

				$this->FinanceModel->f_insert('td_vouchers',$row_array);	


    				$this->session->set_flashdata('msg', 'Successfully Added');

    				redirect('finance/bankDashboard');
			}else {
				$data['row']   =   $this->FinanceModel->f_select("md_account_heads", NULL, NULL, 0);

				$data['bank']  =   $this->FinanceModel->f_select("md_bank",NULL,NULL,0);	

				$this->load->view('post_login/main');

				$this->load->view("bank_voucher/add",$data);

    				$this->load->view('post_login/footer');
			}
		}

		public function delBankVoucher(){
			
			$where = array(
				
				"voucher_date"    =>  $this->input->get('voucher_date'),

            			"voucher_id"      =>  $this->input->get('voucher_id')
			);

        		$this->session->set_flashdata('msg', 'Successfully Deleted!');

        		$this->FinanceModel->f_delete('td_vouchers', $where);

        		redirect("finance/bankDashboard");
		}	

//Journal Voucher

		public function trfDashboard(){

			$select	    = array( 
					"voucher_date",
					"voucher_id",
					"voucher_type",
					"voucher_mode",
					"amount"
					);
			
			$where      = array(
				"user_flag" 	  => 'M',

				"voucher_mode"	  => 'T',	

				"approval_status" => 'U'
			);
			
			$voucher['row']	= $this->FinanceModel->f_select("td_vouchers",$select,$where,0);		
			
			$this->load->view('post_login/main');

			$this->load->view('journal_voucher/dashboard',$voucher);

			$this->load->view('post_login/footer');
		}

		public function addTrfVoucher(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {

				$v_id    = $this->FinanceModel->f_get_voucher_id($_SESSION['sys_date']);

                                $v_id->voucher_id +=1;

				$v_id    = $v_id->voucher_id;

				$v_code  = $this->input->post('acc_code');

				$v_dc    =  $this->input->post('dc_flg');

				$v_amt   =  $this->input->post('amount');
			
				for($i = 0; $i < count($v_code); $i++){

					$data_array = array(

						"voucher_date"  	=>  $this->input->post('voucher_dt'),

						"voucher_id"    	=>  $v_id,

						"trans_no"		=>  0,
					
						"voucher_type"  	=>  $this->input->post('voucher_type'),
				
						"voucher_mode"		=>  'T',

						"voucher_through"	=>  'M',

						"acc_code"		=>  $v_code[$i],

						"dr_cr_flag"		=>  $v_dc[$i],

						"remarks"		=>  $this->input->post('remarks'),
					
						"amount"		=>  $v_amt[$i],

						"approval_status"	=>  'U',

						"user_flag"             =>  'S',

						"ins_no"		=>  NULL,

						"ins_dt"		=>  NULL,

						"created_by"		=>  $this->session->userdata('loggedin')->user_name,

						"created_dt"		=>  date('Y-m-d h:i:s')
					);
						
					$this->FinanceModel->f_insert('td_vouchers',$data_array);
				}

				$row_array = array(

                                                "voucher_date"          =>  $this->input->post('voucher_dt'),

                                                "voucher_id"            =>  $v_id,

                                                "trans_no"              =>  0,

                                                "voucher_type"          =>  $this->input->post('voucher_type'),

                                                "voucher_mode"          =>  'T',

                                                "voucher_through"       =>  'M',

                                                "acc_code"              =>  $this->input->post('acc_cd'),

                                                "dr_cr_flag"            =>  $this->input->post('dr_cr_flag'),

                                                "remarks"               =>  $this->input->post('remarks'),

                                                "amount"                =>  $this->input->post('tot_amt'),

						"approval_status"       =>  'U',

						"user_flag"             =>  'M',

                                                "ins_no"                =>  NULL,

                                                "ins_dt"                =>  NULL,

                                                "created_by"            =>  $this->session->userdata('loggedin')->user_name,

						"created_dt"            =>  date('Y-m-d h:i:s')
					);

				$this->FinanceModel->f_insert('td_vouchers',$row_array);	


    				$this->session->set_flashdata('msg', 'Successfully Added');

    				redirect('finance/trfDashboard');
			}else {
				$data['row']   =   $this->FinanceModel->f_select("md_account_heads", NULL, NULL, 0);

				//$data['bank']  =   $this->FinanceModel->f_select("md_bank",NULL,NULL,0);	

				$this->load->view('post_login/main');

				$this->load->view("journal_voucher/add",$data);

    				$this->load->view('post_login/footer');
			}
		}

		public function delTrfVoucher(){
			
			$where = array(
				
				"voucher_date"    =>  $this->input->get('voucher_date'),

            			"voucher_id"      =>  $this->input->get('voucher_id')
			);

        		$this->session->set_flashdata('msg', 'Successfully Deleted!');

        		$this->FinanceModel->f_delete('td_vouchers', $where);

        		redirect("finance/trfDashboard");
		}

//Approve Vouchers

		public function aprvVouDashboard(){

                        $select     = array(
                                        "voucher_date",
                                        "voucher_id",
                                        "voucher_type",
                                        "voucher_mode",
                                        "amount"
                                        );

                        $where      = array(
                                "user_flag"       => 'M',

                                "approval_status" => 'U'
                        );

                        $voucher['row'] = $this->FinanceModel->f_select("td_vouchers",$select,$where,0);

                        $this->load->view('post_login/main');

                        $this->load->view('approve_voucher/dashboard',$voucher);

                        $this->load->view('post_login/footer');
                }
		
		public function aproveVoucher(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

				$data_array = array(
					"approval_status" => 'A',

					"approved_by"     =>  $this->session->userdata('loggedin')->user_name,

                                        "approved_dt"     =>  date('Y-m-d h:i:s')
				);

				$where = array(
					"voucher_date"	=> $this->input->post("voucher_dt"),

					"voucher_id"	=> $this->input->post("voucher_id")
				);

					$this->FinanceModel->f_edit('td_vouchers',$data_array,$where);
					
					$this->session->set_flashdata('msg', 'Approve Successful');

					redirect("finance/aprvVouDashboard");
			}else{
				$select = array(
					"voucher_date",
					"voucher_id",
					"voucher_type",
					"voucher_mode",
					"acc_code",
					"dr_cr_flag",
					"amount",
					"ins_no",
					"ins_dt",
					"remarks",
					"approval_status"
				);

				$where = array(
					"voucher_date"	=>  $this->input->get("date"),
					
					"voucher_id"	=>  $this->input->get("id"),

					"user_flag"	=>  'M'
				);

				$whereRow = array(
					"voucher_date"	=>  $this->input->get("date"),

					"voucher_id"	=>  $this->input->get("id"),

					"user_flag"	=>  'S'
				);	
						

				$voucher['data'] =  $this->FinanceModel->f_select("td_vouchers",$select,$where,1);

				$voucher['row']  =  $this->FinanceModel->f_select("td_vouchers",$select,$whereRow,0); 		

				//echo "<pre>"; var_dump($voucher['row']);die;

			   	$voucher['acc']  =  $this->FinanceModel->f_select("md_account_heads",NULL,NULL,0);	

				$this->load->view('post_login/main');

				$this->load->view('approve_voucher/aproveVou',$voucher);
					
				$this->load->view('post_login/footer');	
			}
		}

		public function main($page){
			if($page=="schedule"){
			  	if($this->session->userdata('value')){
			  	    echo '<script>alert("Save Successful");</script>';
				    $this->load->view('post_login/main');
					  $this->session->unset_userdata('value');
					  $this->load->view('post_login/footer');
			  	} else{
			  		$this->load->view('post_login/main'); 
					$this->load->view('schedule_master');
					$this->load->view('post_login/footer');
			  	  }
			}elseif($page=="newacc"){
				if($this->session->userdata('value')){
				    echo '<script>alert("Save Successful");</script>';
                                    $this->load->view('post_login/main');
									$this->session->unset_userdata('value');
									$this->load->view('post_login/footer');
			 	}else{
				      $this->load->view('post_login/main');
				      $data['row'] = $this->FinanceModel->f_get_schedule();
					  $this->load->view('acc_head',$data);
					  $this->load->view('post_login/footer');
				      
				}     
			 }elseif ($page=="cash") {
			 	if($this->session->userdata('value')){
			 	    echo '<script>alert("Save Successful, Voucher No: '.$this->session->userdata('value').'");</script>';
			 	    				$this->load->view('post_login/main');
			 	    				$data['row'] = $this->FinanceModel->f_get_acc();
			 		 				$this->load->view('cash_voucher',$data);
									$this->session->unset_userdata('value');
									$this->load->view('post_login/footer');		
			 	}else{		
			 		 $this->load->view('post_login/main');
			 		 $data['row'] = $this->FinanceModel->f_get_acc();
					 $this->load->view('cash_voucher',$data);
					 $this->load->view('post_login/footer');
			 		} 
			 }elseif ($page=="bank") {
			       if($this->session->userdata('value')){
				       echo '<script>alert("Save Successful, Voucher No: '.$this->session->userdata('value').'");</script>';
				       				$this->load->view('post_login/main');
				       				$data['row'] = $this->FinanceModel->f_get_acc();
				       				$data['bank']= $this->FinanceModel->f_get_bank(); 
				       				$this->load->view('bank_voucher',$data);
									$this->session->unset_userdata('value');
									$this->load->view('post_login/footer');   

			       }else{		 

			 	      	 $this->load->view('post_login/main');
					 $data['row'] = $this->FinanceModel->f_get_acc();
					 $data['bank']= $this->FinanceModel->f_get_bank(); 
					 $this->load->view('bank_voucher',$data);	
					 $this->load->view('post_login/footer');
			       }	 
			 }elseif ($page=="journal") {
                               if($this->session->userdata('value')){
                                       echo '<script>alert("Save Successful, Voucher No: '.$this->session->userdata('value').'");</script>';
                                                                $this->load->view('post_login/main');
				       				$data['row'] = $this->FinanceModel->f_get_acc();
                                                                $this->load->view('journal_voucher',$data);
                                                                $this->session->unset_userdata('value');

                               }else{

                                         $this->load->view('post_login/main');
					 $data['row'] = $this->FinanceModel->f_get_acc();
										 $this->load->view('journal_voucher',$data);
										 $this->load->view('post_login/footer');
                               }
                         }
	
		}


		public function f_voucher_report(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

				$from_dt 	= $_POST['start_dt'];

				$to_dt   	= $_POST['end_dt']; 

				$this->load->view('post_login/main');

				$voucher_no = $this->FinanceModel->f_get_voucher_id_all($from_dt,$to_dt);
				

				for($i=0;$i<count($voucher_no);$i++){
					
				    $data['row']=$this->FinanceModel->f_get_vouchers($from_dt,$to_dt,$voucher_no[$i]->voucher_id);

				    $this->load->view('daily_rep/voucher_dtls',$data);
				}
			
				$this->load->view('post_login/footer');

			}else{
				$this->load->view('post_login/main');

				$this->load->view('rep_params/date_params');

				$this->load->view('post_login/footer');
			 }	  	

		}

		public function f_ledger_report(){
			if($_SERVER['REQUEST_METHOD']=="POST"){
				$from_dt   = $_POST['start_dt'];
				$to_dt	   = $_POST['end_dt'];
				$acc_cd	   = $_POST['acc_code'];

				$this->load->view('post_login/main');

				$row['data'] =$this->FinanceModel->f_gl_report($from_dt,$to_dt,$acc_cd);
				$row['data1']=$this->FinanceModel->f_opening_bal($from_dt,$acc_cd);
				$row['data2']=$this->FinanceModel->f_closing_bal($to_dt,$acc_cd);
				$row['data3']=array($from_dt,$to_dt,$acc_cd);
				$this->load->view('ledger_report',$row);
				$this->load->view('post_login/footer');
				//echo "<pre>";
				/*var_dump($from_dt);
				echo"<br>";
				var_dump($to_dt);
				echo"<br>";
				var_dump($acc_cd);*/
				//echo "<br>";	
				//var_dump($row['data']);			
						
			}else{
				$this->load->view('post_login/main');
				$data['row'] = $this->FinanceModel->f_get_acc();
				$this->load->view('date_acc',$data);
				$this->load->view('post_login/footer');
			}	
		}

		public function f_trial(){
			if($_SERVER['REQUEST_METHOD']=="POST"){
				$report_date = $_POST['ip_date'];
				$this->load->view('post_login/main');
				$row['data'] = $this->FinanceModel->f_trial_balance($report_date);
				$row['date'] = array($report_date);
				$this->load->view('trail',$row);
				$this->load->view('post_login/footer');
			}else{
				$this->load->view('post_login/main');
				$this->load->view('ip_date');	
				$this->load->view('post_login/footer');
			}
		}

		public function f_cash_bk(){
			if($_SERVER['REQUEST_METHOD']=="POST"){
				$from_date = $_POST['start_dt'];
				$to_date   = $_POST['end_dt'];
				$this->load->view('post_login/main');
				$row['data']=$this->FinanceModel->f_cash_book($from_date,$to_date);
				$row['op_bal']=$this->FinanceModel->f_opening_bal($from_date,$_SESSION['cash_code']);
				$row['cl_bal']=$this->FinanceModel->f_closing_bal($to_date,$_SESSION['cash_code']);
				$row['date']=array($from_date,$to_date);
				$this->load->view('cash_book',$row);
				$this->load->view('post_login/footer');
			}else{
				$this->load->view('post_login/main');
				$this->load->view('cash_book_date');
				$this->load->view('post_login/footer');
			}
		}	
	
	}
?>
