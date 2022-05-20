<?php

	class Fertilizer_Login extends MX_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->model('Login_Process');

			$this->load->model('Fertilizer_Process');
		}
		
		public function index(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

				$user_id 	= $_POST['user_id'];
				$user_pw 	= $_POST['user_pwd'];
				$branch_id 	= $_POST['branch_id'];
				$fin_yr		= $_POST['fin_yr'];	

				$result  		= $this->Login_Process->f_select_password($user_id);
				// echo $this->db->last_query();
				// exit();
				if($result){

				if($result->user_status=='A'){

				    $match	   = password_verify($user_pw,$result->password);

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

						$dist_data 	 = $this->Login_Process->f_get_dist_inf($branch_data->districts_catered);
						$loggedin['dist_id']  			= $dist_data->district_code;
						$loggedin['dist_name']   		= $dist_data->district_name;
						$loggedin['dist_sort_code']   	= $dist_data->dist_sort_code;
						$loggedin['districts_catered']  = $user_data->districts_catered;
						

						$fin_data 	 = $this->Fertilizer_Process->f_get_fin_inf($fin_yr);
						$loggedin['fin_id']  			= $fin_data->sl_no;
						$loggedin['fin_yr']   			= $fin_data->fin_yr;

						}
						else{
							$this->session->set_flashdata('login_error', 'Select Branch');
							redirect('Fertilizer_Login/login');
						    }
					}else{

						$loggedin['user_id']            = $user_data->user_id;
                    	$loggedin['password']           = $user_data->password;
                    	$loggedin['user_type']      	= $user_data->user_type;
                    	$loggedin['user_name']      	= $user_data->user_name;
						$loggedin['user_status']   		= $user_data->user_status;
						$loggedin['branch_id']   	    = $user_data->branch_id;
						$loggedin['branch_name']   	    = $user_data->branch_name;
						$loggedin['ho_flag']            = $user_data->ho_flag;

						$dist_data 	 = $this->Login_Process->f_get_dist_inf($user_data->districts_catered);
						$loggedin['dist_id']  			= $dist_data->district_code;
						$loggedin['dist_name']   		= $dist_data->district_name;
						$loggedin['dist_sort_code']   	= $dist_data->dist_sort_code;
						$loggedin['districts_catered']  = $user_data->districts_catered;

						$fin_data 	 = $this->Fertilizer_Process->f_get_fin_inf($fin_yr);
						$loggedin['fin_id']  			= $fin_data->sl_no;
						$loggedin['fin_yr']   			= $fin_data->fin_yr;

					    }

					$this->session->set_userdata('loggedin',$loggedin);
			
					$this->Login_Process->f_insert_audit_trail($user_id);

					$this->session->set_userdata('sl_no',$this->Login_Process->f_audit_trail_value($user_id));
					
					redirect('Fertilizer_Login/main');

						}else{
						$this->session->set_flashdata('login_error', 'Invalid Password');
						redirect('Fertilizer_Login/login');
						}
					}
					else{
					$this->session->set_flashdata('login_error', 'User is inactive please contact Admin');
					redirect('Fertilizer_Login/login');
				   }
			    }
			   else{
				$this->session->set_flashdata('login_error', 'Invalid User ID');
				redirect('Fertilizer_Login/login');
			     }
			}else{
				redirect('Fertilizer_Login/login');
			}
			
		}


		public function login(){

			if($this->session->userdata('loggedin')){

				redirect('Fertilizer_Login/main');

			}else{

				$data["branch_data"] = $this->Login_Process->f_get_branch_list();

				$data["fin_yr"]		 = $this->Fertilizer_Process->f_get_fin_yr();

				$this->load->view('login/fertilizer_login',$data);
			}
		}

		public function main(){
			if($this->session->userdata('loggedin')){

				$_SESSION['sys_date']= date('Y-m-d');

				$_SESSION['module']  = 'F';
				
				$this->session->set_userdata('cashcode', $this->Login_Process->f_get_parameters(13));
				$_SESSION['cash_code']=$this->session->userdata('cashcode')->param_value;

				$fin_id=$this->session->userdata['loggedin']['fin_id'];  
				$fin_yr=$this->session->userdata['loggedin']['fin_yr'];
				$branch_id = $this->session->userdata['loggedin']['branch_id'];

				$first_month_day = date("Y-m-01", strtotime($_SESSION['sys_date']));

				$last_month_day  = date("Y-m-t", strtotime($_SESSION['sys_date']));

				
				$from_fin_yr = substr($fin_yr,0,4);
				$to_fin_yr   = ($from_fin_yr + 1);
				$from_yr_day = date('Y-m-d',strtotime($from_fin_yr.'-04-01'));
				$to_yr_day 	 = date('Y-m-d',strtotime($to_fin_yr.'-03-31'));
				$dash_data["ho_recvamt_day"]		= $this->Fertilizer_Process->f_get_tot_recvamt_ho($_SESSION['sys_date'],$_SESSION['sys_date']);
				$dash_data["br_recvamt_day"]		= $this->Fertilizer_Process->f_get_tot_recvamt($branch_id,$_SESSION['sys_date'],$_SESSION['sys_date']);
				$dash_data["br_recvamt_month"]		= $this->Fertilizer_Process->f_get_tot_recvamt($branch_id,$first_month_day,$last_month_day);
				$dash_data["br_recvamt_yr"]		    = $this->Fertilizer_Process->f_get_tot_recvamt($branch_id,$from_yr_day,$to_yr_day);

				$dash_data["purchase_day"]			= $this->Fertilizer_Process->f_get_tot_purchase($branch_id,$_SESSION['sys_date'],$_SESSION['sys_date']);
				$dash_data["ho_purchase_day"]		= $this->Fertilizer_Process->f_get_tot_purchase_ho($_SESSION['sys_date'],$_SESSION['sys_date']);
				$dash_data["ho_purchase_daysld"]    = $this->Fertilizer_Process->f_get_tot_purchase_hosld($_SESSION['sys_date'],$_SESSION['sys_date']);
				$dash_data["ho_purchase_daylqd"]    = $this->Fertilizer_Process->f_get_tot_purchase_holqd($_SESSION['sys_date'],$_SESSION['sys_date']);
                // echo $this->db->last_query();
				// die();
				$dash_data["purchase_month"]		= $this->Fertilizer_Process->f_get_tot_purchase($branch_id,$first_month_day,$last_month_day);
				
				$dash_data["ho_purchase_month"]		= $this->Fertilizer_Process->f_get_tot_purchase_ho($first_month_day,$last_month_day);

				$dash_data["purchase_yr"]			= $this->Fertilizer_Process->f_get_tot_purchase($branch_id,$from_yr_day,$to_yr_day);
				$dash_data["ho_purchase_yr"]		= $this->Fertilizer_Process->f_get_tot_purchase_ho($from_yr_day,$to_yr_day);
                 
				$dash_data["sale_day"]				= $this->Fertilizer_Process->f_get_tot_sale($branch_id,$_SESSION['sys_date'],$_SESSION['sys_date']);
				$dash_data["ho_sale_day"]			= $this->Fertilizer_Process->f_get_tot_sale_ho($_SESSION['sys_date'],$_SESSION['sys_date']);
				$dash_data["ho_sale_daysld"]        = $this->Fertilizer_Process->f_get_tot_sale_hosld($_SESSION['sys_date'],$_SESSION['sys_date']);
				$dash_data["ho_sale_daylqd"]		= $this->Fertilizer_Process->f_get_tot_sale_holqd($_SESSION['sys_date'],$_SESSION['sys_date']);
				$dash_data["sale_month"]			= $this->Fertilizer_Process->f_get_tot_sale($branch_id,$first_month_day,$last_month_day);
				$dash_data["ho_sale_month"]			= $this->Fertilizer_Process->f_get_tot_sale_ho($first_month_day,$last_month_day);

				$dash_data["sale_yr"]				= $this->Fertilizer_Process->f_get_tot_sale($branch_id,$from_yr_day,$to_yr_day);
				$dash_data["ho_sale_yr"]			= $this->Fertilizer_Process->f_get_tot_sale_ho($from_yr_day,$to_yr_day);


				$this->load->view('post_login/fertilizer_main');
				$this->load->view('post_login/fertilizer_home',$dash_data);
				$this->load->view('post_login/footer');

			}
			else{

				redirect('Fertilizer_Login/login');

			}
			
		}	
		public function f_br_purchase(){				//branchwise purchase 
		   $br_id=$_POST['br_id'];
		   $fin_yr=$this->session->userdata['loggedin']['fin_yr'];
			$from_dt=$_SESSION['sys_date'];
			$to_dt=$_SESSION['sys_date'];
			$first_month_day = date("Y-m-01", strtotime($_SESSION['sys_date']));
            $last_month_day  = date("Y-m-t", strtotime($_SESSION['sys_date']));
			$from_fin_yr = substr($fin_yr,0,4);
			$to_fin_yr   = ($from_fin_yr + 1);
			$from_yr_day = date('Y-m-d',strtotime($from_fin_yr.'-04-01'));
			$to_yr_day 	 = date('Y-m-d',strtotime($to_fin_yr.'-03-31'));

			$data		=$this->Fertilizer_Process->f_get_tot_purchasesld($br_id,$from_dt,$to_dt);
			$data1		=$this->Fertilizer_Process->f_get_tot_purchaselqd($br_id,$from_dt,$to_dt);
			$salsld		=$this->Fertilizer_Process->f_get_tot_salesld($br_id,$from_dt,$to_dt);
			$sallqd		=$this->Fertilizer_Process->f_get_tot_salelqd($br_id,$from_dt,$to_dt);
			$purm		=$this->Fertilizer_Process->f_get_tot_purchasesld($br_id,$first_month_day,$last_month_day);
			$purmlqd	=$this->Fertilizer_Process->f_get_tot_purchaselqd($br_id,$first_month_day,$last_month_day);
			$salm		=$this->Fertilizer_Process->f_get_tot_salesld($br_id,$first_month_day,$last_month_day);
			$salmlqd	=$this->Fertilizer_Process->f_get_tot_salelqd($br_id,$first_month_day,$last_month_day);
			$puryr		=$this->Fertilizer_Process->f_get_tot_purchasesld($br_id,$from_yr_day,$to_yr_day);
			$puryrlq	=$this->Fertilizer_Process->f_get_tot_purchaselqd($br_id,$from_yr_day,$to_yr_day);
			$salyr		=$this->Fertilizer_Process->f_get_tot_salesld($br_id,$from_yr_day,$to_yr_day);
			$salyrlq	=$this->Fertilizer_Process->f_get_tot_salelqd($br_id,$from_yr_day,$to_yr_day);
           $tot_recvday =$this->Fertilizer_Process->f_get_tot_recvamt($br_id,$from_dt,$to_dt);
		   $tot_recvmnth=$this->Fertilizer_Process->f_get_tot_recvamt($br_id,$first_month_day,$last_month_day);
		   $tot_recvyr  =$this->Fertilizer_Process->f_get_tot_recvamt($br_id,$from_yr_day,$to_yr_day);

			$pur=array('tot_pur'=>$data->tot_purchase,
		             'tot_purlqd'=>$data1->tot_purchase,
					 'tot_sale'=>$salsld->tot_sale,
		             'tot_salelqd'=>$sallqd->tot_sale,
					 'tot_mth_pur'=>$purm->tot_purchase,
					 'tot_mth_purlqd'=>$purm->tot_purchase,
					 'tot_mth_sal'=>$salm->tot_sale,
					 'tot_mth_salq'=>$salm->tot_sale,
					 'tot_puryr'=>$puryr->tot_purchase,
		             'tot_puryrlq'=>$puryrlq->tot_purchase,
					 'tot_salyr'=>$salyr->tot_sale,
		             'tot_salyrlq'=>$salyrlq->tot_sale,
					 'tot_recvday'=>$tot_recvday->tot_recvamt,
					 'tot_recvmnth'=> $tot_recvmnth->tot_recvamt,
					 'tot_recvyr'=>$tot_recvyr->tot_recvamt);
			echo json_encode($pur);		 
			
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
				
				redirect('Fertilizer_Login/login');

			}else{

				redirect('Fertilizer_Login/login');

			}
		}
	}
?>
