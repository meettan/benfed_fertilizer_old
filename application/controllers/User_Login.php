<?php

	class User_Login extends MX_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Login_Process');
		}
		
		public function index(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

				$user_id 	= $_POST['user_id'];
				$user_pw 	= $_POST['user_pwd'];
				$branch_id 	= $_POST['branch_id'];
				$kms_yr		= $_POST['kms_yr'];	

				$result  		= $this->Login_Process->f_select_password($user_id);
				if($result){

				if($result->user_status=='A'){

				$match	 		= password_verify($user_pw,$result->password);

				if($match){
					$user_data = $this->Login_Process->f_get_user_inf($user_id);

					

					$user_type = $user_data->user_type;

					if($user_type == 'A' ){

						if($branch_id != ''){

						$loggedin['user_id']            = $user_data->user_id;
						$loggedin['password']           = $user_data->password;
						$loggedin['user_type']      	= $user_data->user_type;
						$loggedin['user_name']      	= $user_data->user_name;
						$loggedin['user_status']   		= $user_data->user_status;
						
						$branch_data = $this->Login_Process->f_get_branch_inf($branch_id);
						$loggedin['branch_id']   		= $branch_data->id;
						$loggedin['branch_name']   		= $branch_data->branch_name;
						$loggedin['ho_flag']            = $branch_data->ho_flag;
						$loggedin['br_manager']         = $branch_data->br_manager;
						$loggedin['contact_no']         = $branch_data->contact_no;

						$dist_data 	 = $this->Login_Process->f_get_dist_inf($branch_data->districts_catered);
						$loggedin['dist_id']  			= $dist_data->district_code;
						$loggedin['dist_name']   		= $dist_data->district_name;
						$loggedin['dist_sort_code']   	= $dist_data->dist_sort_code;
						$loggedin['districts_catered']  = $user_data->districts_catered;
						

						$kms_data 	 = $this->Login_Process->f_get_kms_inf($kms_yr);
						$loggedin['kms_id']  			= $kms_data->sl_no;
						$loggedin['kms_yr']   			= $kms_data->kms_yr;

						}
						else{
							$this->session->set_flashdata('login_error', 'Select Branch');
							redirect('User_Login/login');
						    }
					}else{
					    
					    $dist_data 	 = $this->Login_Process->f_get_dist_inf($user_data->districts_catered);
						$loggedin['dist_id']  			= $dist_data->district_code;
						$loggedin['dist_name']   		= $dist_data->district_name;
						$loggedin['dist_sort_code']   	= $dist_data->dist_sort_code;
						$loggedin['districts_catered']  = $user_data->districts_catered;
						
						$branch_data = $this->Login_Process->f_get_branch_inf($dist_data->district_code);
                       
						$loggedin['user_id']            = $user_data->user_id;
                    	$loggedin['password']           = $user_data->password;
                    	$loggedin['user_type']      	= $user_data->user_type;
                    	$loggedin['user_name']      	= $user_data->user_name;
						$loggedin['user_status']   		= $user_data->user_status;
						$loggedin['branch_id']   	    = $user_data->branch_id;
						$loggedin['branch_name']   	    = $user_data->branch_name;
						$loggedin['ho_flag']            = $user_data->ho_flag;
						$loggedin['br_manager']         = $branch_data->br_manager;
						$loggedin['contact_no']         = $branch_data->contact_no;
						
						$kms_data 	 = $this->Login_Process->f_get_kms_inf($kms_yr);
						$loggedin['kms_id']  			= $kms_data->sl_no;
						$loggedin['kms_yr']   			= $kms_data->kms_yr;

					    }

					$this->session->set_userdata('loggedin',$loggedin);
			
					$this->Login_Process->f_insert_audit_trail($user_id);

					$this->session->set_userdata('sl_no',$this->Login_Process->f_audit_trail_value($user_id));
					
					redirect('User_Login/main');

						}else{
						$this->session->set_flashdata('login_error', 'Invalid Password');
						redirect('User_Login/login');
						}
					}
					else{
					$this->session->set_flashdata('login_error', 'User is inactive please contact Admin');
					redirect('User_Login/login');
				   }
			    }
			   else{
				$this->session->set_flashdata('login_error', 'Invalid User ID');
				redirect('User_Login/login');
			     }

			}else{
				redirect('User_Login/login');
			}
			
		}


		public function login(){

			if($this->session->userdata('loggedin')){

				redirect('User_Login/main');

			}else{

				$data["branch_data"] = $this->Login_Process->f_get_branch_list();

				$data["kms_yr"]		 = $this->Login_Process->f_get_kms_yr();

				$this->load->view('login/login',$data);
			}
		}
		public function bank(){

			if($this->session->userdata('loggedin')){

				redirect('User_Login/bank');

			}else{

				$data["branch_data"] = $this->Login_Process->f_get_branch_list();

				$data["kms_yr"]		 = $this->Login_Process->f_get_kms_yr();

				$this->load->view('login/bank',$data);
			}
		}
		public function bank_login(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

				$user_id 	= $_POST['user_id'];
				$user_pw 	= $_POST['user_pwd'];
				$branch_id 	= $_POST['branch_id'];
				$kms_yr		= $_POST['kms_yr'];	

				$result  		= $this->Login_Process->f_select_password($user_id);
				if($result){

				if($result->user_status=='A'){

				$match	 		= password_verify($user_pw,$result->password);

				if($match){
					$user_data = $this->Login_Process->f_get_user_inf($user_id);

					

					$user_type = $user_data->user_type;

					if($user_type == 'B' ){

						$bankloggedin['user_id']            = $user_data->user_id;
                    	$bankloggedin['password']           = $user_data->password;
                    	$bankloggedin['user_type']      	= $user_data->user_type;
                    	$bankloggedin['user_name']      	= $user_data->user_name;
						$bankloggedin['user_status']   		= $user_data->user_status;
						$bankloggedin['branch_id']   	    = $user_data->branch_id;
						$bankloggedin['branch_name']   	    = $user_data->branch_name;
						$bankloggedin['ho_flag']            = $user_data->ho_flag;

						$dist_data 	 = $this->Login_Process->f_get_dist_inf($user_data->districts_catered);
						$bankloggedin['dist_id']  			= $dist_data->district_code;
						$bankloggedin['dist_name']   		= $dist_data->district_name;
						$bankloggedin['dist_sort_code']   	= $dist_data->dist_sort_code;
						$bankloggedin['districts_catered']  = $user_data->districts_catered;

						$kms_data 	 = $this->Login_Process->f_get_kms_inf($kms_yr);
						$bankloggedin['kms_id']  			= $kms_data->sl_no;
						$bankloggedin['kms_yr']   			= $kms_data->kms_yr;

					}else{
						redirect('User_Login/bank');
					}

					$this->session->set_userdata('bankloggedin',$bankloggedin);
			
					$this->Login_Process->f_insert_audit_trail($user_id);

					$this->session->set_userdata('sl_no',$this->Login_Process->f_audit_trail_value($user_id));
					
					redirect('User_Login/bank_main');

						}else{
						$this->session->set_flashdata('login_error', 'Invalid Password');
						redirect('User_Login/bank');
						}
					}
					else{
					$this->session->set_flashdata('login_error', 'User is inactive please contact Admin');
					redirect('User_Login/bank');
				   }
			    }
			   else{
				$this->session->set_flashdata('login_error', 'Invalid User ID');
				redirect('User_Login/bank');
			     }

			}else{
				redirect('User_Login/bank');
			}
			
		}

		public function main(){
			if($this->session->userdata('loggedin')){

				$_SESSION['sys_date']= date('Y-m-d');

				$this->session->set_userdata('cashcode', $this->Login_Process->f_get_parameters(13));
				$_SESSION['cash_code']=$this->session->userdata('cashcode')->param_value;

				$kms_id=$this->session->userdata['loggedin']['kms_id'];
				$branch_id = $this->session->userdata['loggedin']['branch_id'];
				
				$dash_data["tot_paddy_procurement"]= $this->Login_Process->f_get_tot_paddy_procurement($kms_id,$branch_id);
				$dash_data["tot_paddy_procurement_ho"]= $this->Login_Process->f_get_tot_paddy_procurement_ho($kms_id);
				$dash_data["tot_cheque_cleared"]= $this->Login_Process->f_get_tot_cheque_cleared($kms_id,$branch_id);
				$dash_data["tot_cheque_cleared_ho"]= $this->Login_Process->f_get_tot_cheque_cleared_ho($kms_id);
				$dash_data["tot_cmr_offered"]= $this->Login_Process->f_get_tot_cmr_offered($kms_id,$branch_id);
				$dash_data["tot_cmr_offered_ho"]= $this->Login_Process->f_get_tot_cmr_offered_ho($kms_id,$branch_id);
				$dash_data["tot_cmr_delivery"]= $this->Login_Process->f_get_tot_cmr_delivery($kms_id,$branch_id);
				$dash_data["tot_cmr_delivery_ho"]= $this->Login_Process->f_get_tot_cmr_delivery_ho($kms_id);
				

				$this->load->view('post_login/main');
				$this->load->view('post_login/home',$dash_data);
				$this->load->view('post_login/footer');

			}
			else{

				redirect('User_Login/login');

			}
			
		}
		public function bank_main(){
			if($this->session->userdata('bankloggedin')){

				$kms_id=$this->session->userdata['bankloggedin']['kms_id'];
				$branch_id = $this->session->userdata['bankloggedin']['branch_id'];
				
				
			 
              redirect('paddys/bank/f_neft_upload');

			}
			else{

				redirect('User_Login/bank');

			}
			
		}	
        public function check_user(){
			$user_id=$this->input->post("user_id");
			$user_data = $this->Login_Process->f_get_user_inf($user_id);
			echo $user_data->user_type;
		}

		public function logout(){

			if($this->session->userdata('loggedin')){

				$user_id    =   $this->session->userdata['loggedin']['user_id'];
				
				$this->Login_Process->f_update_audit_trail($user_id);

				$this->session->unset_userdata('loggedin');
				
				redirect('Welcome/index');

			}else{

				redirect('Welcome/index');

			}
		}

	    public function bank_logout(){

			if($this->session->userdata('bankloggedin')){

				$user_id    =   $this->session->userdata['bankloggedin']['user_id'];
				
				$this->Login_Process->f_update_audit_trail($user_id);

				$this->session->unset_userdata('bankloggedin');
				
				redirect('User_Login/bank');

			}else{

				redirect('User_Login/bank');

			}
		}
	}
?>
