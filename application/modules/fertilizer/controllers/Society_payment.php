<?php
class Society_payment extends MX_Controller{
		protected $sysdate;
		protected $fin_year;
		public function __construct(){
		parent::__construct();	
		$this->load->model('Society_paymentModel');
		$this->load->model('AdvanceModel');
		$this->load->model('DrcrnoteModel');
		$this->session->userdata('fin_yr');

		   if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

            }
		}
		
	public function money_recptReport(){
	$receipt_no = $this->input->get('paid_id');

	$money_recpt['data']    = $this->Society_paymentModel->f_get_receiptReport_dtls($receipt_no);
	$money_recpt['payTypePaidDetails']    = $this->Society_paymentModel->payTypePaidDetails($receipt_no);
	
	$money_recpt['paid_id'] = $receipt_no;
	 
	$this->load->view("post_login/fertilizer_main");

	$this->load->view('report/money_Recpt', $money_recpt);

	$this->load->view('post_login/footer');
}


public function society_payEdit(){


	if($_SERVER['REQUEST_METHOD'] == "POST") {
	
		
		$pay_type = $this->input->post('pay_type');
				
          for($i = 0; $i < count($pay_type); $i++){
            
			  $data     = array(     
                                  'paid_dt'        => $this->input->post('paid_dt'),

                                   'ro_no'         => $this->input->post('sale_ro'),

								   'sl_no'         => $this->input->post('sl_no'),

								   'remarks'       => $this->input->post('remarks'),
								   
                                   'pay_type'      => $_POST['pay_type'][$i],

                                    'ref_dt'       => $_POST['ref_dt'][$i],

                                    'paid_amt'     => $_POST['paid_amt'][$i],

                                    "modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				                    "modified_dt"  =>  date('Y-m-d h:i:s')

                                );

		   $where  =   array(

				 'paid_id'         => $this->input->post('trans_do'),
				 'sl_no'           => $this->input->post('sl_no'),
				 'sale_invoice_no' => $this->input->post('sale_invoice_no'),
				 'pay_type'        => $_POST['pay_status'][$i]
				 
            );

			 // print_r( $where);
			// die();

            $this->Society_paymentModel->f_edit('tdf_payment_recv', $data, $where);
	
		}
				$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('socpay/society_payment');    

			}else {
				
			 $select3        = array("comp_id","comp_name");
			 $product['compdtls']   = $this->Society_paymentModel->f_select('mm_company_dtls',$select3,NULL,0);
					
			$select2         = array("ro_no","qty");

			$product['rodtls']      = $this->Society_paymentModel->f_select('td_purchase',$select2,NULL,0);

			$where1  =array('district'=> $this->session->userdata['loggedin']['branch_id']);
			
			$select1          = array("soc_id","soc_name","soc_add","gstin");
			$product['socdtls']    = $this->Society_paymentModel->f_select('mm_ferti_soc',$select1,$where1,0);

			$select          = array("prod_id","prod_desc","gst_rt");
			$product['proddtls']   = $this->Society_paymentModel->f_select('mm_product',$select,NULL,0);	
           
			$product['paydtls']    = $this->Society_paymentModel->f_get_cust_paydtls($this->input->get('paid_id'));

	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("Society_payment/edit",$product);

	        $this->load->view('post_login/footer');
    }

}

    public function society_payAdd(){

            $br_cd        = $this->session->userdata['loggedin']['branch_id'];
			$fin_id       = $this->session->userdata['loggedin']['fin_id'];
			$fin_year     = $this->session->userdata['loggedin']['fin_yr'];
			$transCd 	  = $this->Society_paymentModel->get_soc_pay_code($br_cd,$fin_id);
		
			$month        = date('m');
			
			$select_dist         = array("dist_sort_code" );
			$where_dist          = array("district_code"     =>  $br_cd );
            $brn                 = $this->AdvanceModel->f_select("md_district",$select_dist,$where_dist,1);  
            $adv_transCd 	     = $this->AdvanceModel->get_advance_code($br_cd,$fin_id);
            $adv_receipt         = 'Adv/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$adv_transCd->sl_no;
			$ro                  = $this->input->post('sale_ro');
			$select_comp         = array("short_name" );
			$where_comp          = array("b.sale_ro" => $ro,"a.comp_id=b.comp_id"=>NULL );

			$select_bnkacc       = array("acc_code");
			$select_socacc       = array("acc_cd");
			$where_socacc        = array("soc_id"     => $this->input->post('soc_id'));
			$soc_acc             = $this->Society_paymentModel->f_select("mm_ferti_soc",$select_socacc,$where_socacc,1);
			$soc_id              = $this->input->post('soc_id');					 
			$select_soc          = array("soc_name");
		    $where_soc           = array("soc_id"     => $soc_id);
	        $soc_name            = $this->AdvanceModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);
		    $cnt                 = $this->Society_paymentModel->check_soc_paytype($ro ,$br_cd);
				
            if($_SERVER['REQUEST_METHOD'] == "POST") {
				$soc_id       = $this->input->post('soc_id');
				$bnk_idd=explode(',',$this->input->post('bnk_id'));
			    $bnk_id=$bnk_idd[0];
			    $bnk_acc_id=$bnk_idd[1];
			    $total  = 0;
				$ro          = $this->input->post('sale_ro');
				$select_comp = array("short_name" );
			    $where_comp  = array("b.sale_ro" => $ro,
									 "a.comp_id=b.comp_id"=>NULL );

			$comp_short_name  = $this->Society_paymentModel->f_get_distinct('mm_company_dtls a,td_sale b',$select_comp,$where_comp,1);
			$cust_pay_recipt  = 'RCPT/'.$brn->dist_sort_code.'/'.$comp_short_name->short_name.'/'.$month.'/'.$fin_year.'/'.$transCd->sl_no;
			$presult = $this->AdvanceModel->f_select("td_purchase",array('rate'),array('ro_no'=>trim($ro)),1);
            $tot_amt = array_sum($_POST['paid_amt']);
			$tot_qty = round(($tot_amt/($presult->rate)),3);
            $pay_type = $this->input->post('pay_type');
            
					$tot_paid_amt    = 0.00;
					$tot_soc         = 0.00;
					$tot_sundry      = 0.00;
					$tot_adv		 = 0.00;
					$tot_csh		 = 0.00;
					$tot_drft		 = 0.00;
					$tot_payord		 = 0.00;
					$tot_nft		 = 0.00;
					$tot_chq         = 0.00;
                    for($i = 0; $i < count($pay_type); $i++){

						$trans_type=$_POST['pay_type'][$i];

						$paid_amt=$_POST['paid_amt'][$i];
						$tot_paid_amt +=$_POST['paid_amt'][$i];
						$pay_soc_id=$_POST['soc_id'];
						$cust_pay_recipt     = 'RCPT/'.$brn->dist_sort_code.'/'.$comp_short_name->short_name.'/'.$month.'/'.$fin_year.'/'.$transCd->sl_no;
						
                        $data     = array(    'sl_no'             => $transCd->sl_no,
                                            
                                            'paid_id'        	=> $cust_pay_recipt,
        
                                            'paid_dt'           => $this->input->post('paid_dt'),
        
                                            'soc_id'            => $this->input->post('soc_id'),
    
                                            'sale_invoice_no'   => $this->input->post('trans_do'),
    
                                            'sale_invoice_dt'    =>  $this->input->post('do_dt'),
        
											'ro_no'              => $this->input->post('sale_ro'),

											'comp_id'             => $this->input->post('comp_id'),

											'prod_id'             => $this->input->post('prod_id'),

											'ro_rt'              => $this->input->post('ro_rt'),

                                            'adj_dr_note_amt'    => $this->input->post('tot_dr_amt'),

                                            'adj_adv_amt'        => $this->input->post('adv_amt'),

                                            'net_recvble_amt'    => $this->input->post('net_amt'),
                                            
											'tot_recvble_amt'    => $this->input->post('tot_recvble_amt'),
											
											'remarks'           => $this->input->post('remarks'),

											'bnk_id'            => $bnk_id,

											'cshbnk_flag'       => $this->input->post('cshbank'),
											
                                            'pay_type'           => $_POST['pay_type'][$i],
        
											'paid_amt'           => $_POST['paid_amt'][$i],

											'paid_qty'           => $tot_qty,
											
											'ref_no'             => $_POST['ref_no'][$i],
											
											'ref_dt'             => $_POST['ref_dt'][$i],
                                            
                                            "created_by"         =>  $this->session->userdata['loggedin']['user_name'],
        
                                            "created_dt"         =>  date('Y-m-d'),
    
                                            'branch_id'          => $br_cd,
    
											'fin_yr'             => $fin_id,
											
										    'approval_status'    =>'U');

						$this->Society_paymentModel->f_insert('tdf_payment_recv', $data);

						if($trans_type==2 ){

						$tot_adv += $_POST['paid_amt'][$i];

						}elseif($trans_type==1){
							$tot_csh += $_POST['paid_amt'][$i];
							
						}elseif($trans_type==3){
							$tot_chq += $_POST['paid_amt'][$i];

						}elseif($trans_type==4){
							$tot_drft += $_POST['paid_amt'][$i];

						}elseif($trans_type==5){
							$tot_payord += $_POST['paid_amt'][$i];

						}elseif($trans_type==6){

							$tot_sundry += $_POST['paid_amt'][$i];
						}elseif($trans_type==7){

							$tot_nft += $_POST['paid_amt'][$i];
						}
						$tot_soc = ( $tot_csh  + $tot_drft +  $tot_nft + $tot_payord + $tot_chq + $tot_adv);
						$tot_bnk = ( $tot_csh  + $tot_drft +  $tot_nft + $tot_payord + $tot_chq);

					if ($trans_type=='2'){
	
						$total = $_POST['paid_amt'][$i];

                        $soc_id= $this->input->post('soc_id');

                        $select_adv         = array( "adv_acc");
			
					    $where_adv          = array("district"     =>  $br_cd,"soc_id"=>$soc_id);
			
					    $adv_acc= $this->Society_paymentModel->f_select("mm_ferti_soc",$select_adv,$where_adv,1);

						$data_adv_pay     = array('trans_dt'      => date('Y-m-d'),
	   
												   'sl_no'         => $adv_transCd->sl_no,
	   
												   'receipt_no'    => $adv_receipt,
	   
												   'fin_yr'        => $fin_id,
	   
												   'branch_id'     => $br_cd,
	   
												   'soc_id'        => $this->input->post('soc_id'),
	   
												   'trans_type'    => 'O',
	   
												   'adv_amt'       => $total,
	   
												   'inv_no'        => $this->input->post('trans_do'),
	   
												   'ro_no'         => $this->input->post('sale_ro'),
	   
												   'remarks'       => 'ADV ADJ',
												   'paid_id'	   =>	$cust_pay_recipt,
	   
												   'created_by'    => $this->session->userdata['loggedin']['user_name'],
	   
												   'created_dt'    => date('Y-m-d'));
	   
						   $this->Society_paymentModel->f_insert('tdf_advance', $data_adv_pay);
                }
	
					// }

					$data1     = array(   
                                            
					'paid_id'        	=> $cust_pay_recipt,

					'paid_dt'           => $this->input->post('paid_dt'),

					'soc_id'            => $this->input->post('soc_id'),

					'sale_invoice_no'   => $this->input->post('trans_do'),

					'sale_invoice_dt'   =>  $this->input->post('do_dt'),

					'ro_no'             => $this->input->post('sale_ro'),

					'comp_id'           => $this->input->post('comp_id'),

					'prod_id'           => $this->input->post('prod_id'),

					'ro_rt'             => $this->input->post('ro_rt'),

					'adj_dr_note_amt'    => $this->input->post('tot_dr_amt'),

					'adj_adv_amt'        => $this->input->post('adv_amt'),

					'net_recvble_amt'    => $this->input->post('net_amt'),
					
					'tot_recvble_amt'    => $this->input->post('tot_recvble_amt'),
					
					'remarks'           => $this->input->post('remarks'),

					'bnk_id'            => $bnk_id,
					
					'paid_amt'           =>$total,
					
					"created_by"         =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"         =>  date('Y-m-d'),

					'branch_id'          => $br_cd,

					'fin_yr'             => $fin_id,
					
					'approval_status'    =>'U');

					$data_cr_fin=$data1;
					
					$data_cr_fin['rem'] ="Amount Received From ".$soc_name->soc_name." vide sale invoice no: " .$this->input->post('trans_do');
					
					if ($trans_type=='2'){
						
						
						$data_cr_fin['adv_acc'] = $adv_acc->adv_acc;
						
						$this->Society_paymentModel->f_recvjnl_dr($data_cr_fin);
						
					}
				
	}		
					
					$data2     = array(   
                                            
						'paid_id'        	=> $cust_pay_recipt,
	
						'paid_dt'           => $this->input->post('paid_dt'),
	
						'soc_id'            => $this->input->post('soc_id'),
	
						'sale_invoice_no'   => $this->input->post('trans_do'),
	
						'sale_invoice_dt'   =>  $this->input->post('do_dt'),
	
						'ro_no'             => $this->input->post('sale_ro'),
	
						'comp_id'           => $this->input->post('comp_id'),
	
						'prod_id'           => $this->input->post('prod_id'),
	
						'ro_rt'             => $this->input->post('ro_rt'),
	
						'adj_dr_note_amt'    => $this->input->post('tot_dr_amt'),
	
						'adj_adv_amt'        => $this->input->post('adv_amt'),
	
						'net_recvble_amt'    => $this->input->post('net_amt'),
						
						'tot_recvble_amt'    => $this->input->post('tot_recvble_amt'),
						
						'remarks'           => $this->input->post('remarks'),
	
						'bnk_id'            => $bnk_id,
						
						'paid_amt'           => $tot_bnk,
						
						"created_by"         =>  $this->session->userdata['loggedin']['user_name'],
	
						"created_dt"         =>  date('Y-m-d'),
	
						'branch_id'          => $br_cd,
	
						'fin_yr'             => $fin_id,
						'cshbank'			 => $this->input->post('cshbank'),

						'abk_acc_code'		 => $bnk_acc_id,
						
						'approval_status'    =>'U');
	
						// if($this->input->post('bnk_id')>0 ){
						$data_array_fin=$data2;
				        
						$data_array_fin['acc_code'] = $soc_acc->acc_code;
						$data_array_fin['rem'] ="Amount Received From ".$soc_name->soc_name." vide sale invoice no: " .$this->input->post('trans_do');
						/***********For Cash or Bank head */
						if($tot_bnk > 0 ||$tot_bnk != '' || $tot_bnk !=null){
						$this->Society_paymentModel->f_recvjnl($data_array_fin);
						}
						// }


						$tot_paid_amt =$tot_paid_amt + $_POST['paid_amt'][$i];
						$data3     = array(   
                                            
							'paid_id'        	=> $cust_pay_recipt,
		
							'paid_dt'           =>  $this->input->post('paid_dt'),
		
							'soc_id'            =>  $this->input->post('soc_id'),
		
							'sale_invoice_no'   =>  $this->input->post('trans_do'),
		
							'sale_invoice_dt'   =>  $this->input->post('do_dt'),
		
							'ro_no'             =>  $this->input->post('sale_ro'),
		
							'comp_id'           =>  $this->input->post('comp_id'),
		
							'prod_id'           =>  $this->input->post('prod_id'),
		
							'ro_rt'             =>  $this->input->post('ro_rt'),
		
							'adj_dr_note_amt'    => $this->input->post('tot_dr_amt'),
		
							'adj_adv_amt'        => $this->input->post('adv_amt'),
		
							'net_recvble_amt'    => $this->input->post('net_amt'),
							
							'tot_recvble_amt'    => $this->input->post('tot_recvble_amt'),
							
							'remarks'           => $this->input->post('remarks'),
		
							'bnk_id'            => $bnk_id,
							
							'paid_amt'          => $tot_soc,
								
							"created_by"        =>  $this->session->userdata['loggedin']['user_name'],
		
							"created_dt"         =>  date('Y-m-d'),
		
							'branch_id'          => $br_cd,
		
							'fin_yr'             => $fin_id,
							
							'approval_status'    =>'U');
							
						$data_array_fin=$data3;
						$data_array_fin['acc_cd'] = $soc_acc->acc_cd; 
						$data_array_fin['rem'] ="Amount Received From ".$soc_name->soc_name." vide sale invoice no: " .$this->input->post('trans_do');
						// $this->Society_paymentModel->f_recvjnl_soc($data3);
					   $this->Society_paymentModel->f_recvjnl_soc($data_array_fin);

                      // if ($trans_type=='6'){
						if ($this->input->post('tot_dr_amt')>0){
						$crtransNo         = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);
						// $crreceipt         = 'Crnote/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$crtransNo->trans_no;
		 		 
						$data_drcr     = array('br_adj_flag'       => 'Y');

						$where_drcr  =   array(

							'invoice_no'   => $this->input->post('trans_do')
						
					);
		
					$this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data_drcr, $where_drcr);
		
					 }
				
                    $this->session->set_flashdata('msg', 'Successfully Added');
        
                //     redirect('socpay/society_payment');
                
             }else {
    
                    $select4             = array("id","branch_name");
                    $product['brdtls']   = $this->Society_paymentModel->f_select('md_branch',$select4,NULL,0);
        
					$select1          = array("soc_id","soc_name","soc_add","gstin");
					$where1           = array('district'   => $br_cd );

                    $product['socdtls']   = $this->Society_paymentModel->f_select('mm_ferti_soc',$select1,$where1,0);
					// $product['ro_dtls']   = $this->Society_paymentModel->f_getdo_dtl($br_cd,$soc_id);
					
				$product['bnk_dtls']   = $this->Society_paymentModel->f_getbnk_dtl($br_cd);
					
				$this->load->view('post_login/fertilizer_main');
			
				$this->load->view("society_payment/add",$product);
        
            	$this->load->view('post_login/footer');
        }
        
    }

    public function society_payment(){
		$br_cd          = $this->session->userdata['loggedin']['branch_id'];
		$fin_id         = $this->session->userdata['loggedin']['fin_id'];
		$this->sysdate  = $_SESSION['sys_date'];
		$to_date=$this->input->post('to_date');
		$from_date=$this->input->post('from_date');

		if($this->input->post()){
			$data['soc_pay']    = $this->Society_paymentModel->f_get_soc_payment_dtls($br_cd,$fin_id,$to_date,$from_date);
			$this->load->view("post_login/fertilizer_main");
			$this->load->view("society_payment/dashboard",$data);
			$this->load->view('search/search');
			$this->load->view('post_login/footer');

		}else{
			$today=date('Y-m-d');
			$fDate=$today;
			$data['soc_pay']    = $this->Society_paymentModel->f_get_soc_payment_dtls($br_cd,$fin_id,$today,$fDate);

			$this->load->view("post_login/fertilizer_main");
			$this->load->view("society_payment/dashboard",$data);
			$this->load->view('search/search');
			$this->load->view('post_login/footer');
		}
		  
    }
	public function check_data(){
		$invNo=$this->input->post('invNo');
		$roNo=$this->input->post('roNo');
		$data=$this->Society_paymentModel->checkForward($roNo, $invNo);
		if($data->count_row > 0){
			echo json_encode(false);
		}else{
			echo json_encode(true);
		}
	}
       
	public function f_cust_pay_forward() {

			$data=explode (",", $this->input->get('ro_no'));
			$ro_no    = $data["0"];
			$comp_id  = $data["1"];
			$prod_id  = $data["2"];
			$rate     = $data["3"];
			$pur_inv  = $data["4"];
			$sale_qty = $data["5"];
			$paid_id = $data["6"];
			$sale_invoice = $data["7"];
			// $paidis=$data['8'];
			
			// print_r($data);
			// exit();
			$br_cd=$this->session->userdata['loggedin']['branch_id'];
		
			$this->Society_paymentModel->f_upd_pay_recv($paid_id);

			//$cnt = $this->Society_paymentModel->check_soc_pay($ro_no,$br_cd)->counts();

			$this->Society_paymentModel->f_forward_pay_recv($ro_no,$comp_id,$prod_id,$rate,$pur_inv,$sale_invoice,$paid_id,$br_cd);
			
				echo "<script>
					alert('Customer Payment data forwarded successfully');
					window.location.href='society_payment';
					</script>";
	   
	}

	public function dr_note(){
			$this->sysdate  = $_SESSION['sys_date'];
		   $data['dr_notes']    = $this->FertilizerModel->f_get_drnote_dtls();
		   $this->load->view("post_login/fertilizer_main");
	   
		   $this->load->view("dr_note/dashboard",$data);
	   
		   $this->load->view('search/search');
	   
		   $this->load->view('post_login/footer');
	}
//     Add DR note code written by Lokesh kumar jha 09/04/2020"
	   public function drnoteAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {
				

				$soc_amt = $this->input->post('soc_amt');
				
				  for($i = 0; $i < count($soc_amt); $i++){
	
				  $data     = array(
										
										'ro_no'        => $this->input->post('ro_no'),
	
										'ro_dt'        => $this->input->post('ro_dt'),
	
										'invoice_no'   => $this->input->post('invoice_no'),

										'invoice_dt'   => $this->input->post('invoice_dt'),

										'trans_dt'    => date('Y-m-d'),
	
										'tot_amt'     => $this->input->post('tot_amt'),

										'comp_id'     => $this->input->post('comp_id'),
	
										'soc_id'      => $_POST['soc_id'][$i],
	
										'soc_amt'     => $_POST['soc_amt'][$i],
										
										"created_by"  => $this->session->userdata['loggedin']['user_name'],
	
										"created_dt"  => date('Y-m-d'),

										'branch_id'   => $this->session->userdata['loggedin']['branch_id']

										 
									);
	
					$this->FertilizerModel->f_insert('td_dr_note', $data);
	
				}
					
					$this->session->set_flashdata('msg', 'Successfully Added');
	
						redirect('fertilizer/dr_note');
			
			   
				
				}else {

				$select4               = array("id","branch_name");
				$product['brdtls']     = $this->FertilizerModel->f_select('md_branch',$select4,NULL,0);

				$select3               = array("comp_id","comp_name");
				$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select3,NULL,0);

				$select1                = array("soc_id","soc_name","soc_add","gstin");
				$product['socdtls']     = $this->FertilizerModel->f_select('mm_ferti_soc',$select1,NULL,0);
	
				$branch_id              = $this->session->userdata['loggedin']['branch_id'];
				$product['ro_dtls']     = $this->Society_paymentModel->f_getdo_dtl($branch_id);	
	
		$this->load->view('post_login/fertilizer_main');
	
		$this->load->view("dr_note/add",$product);
	
		$this->load->view('post_login/footer');
	 }
	
	}

	//     edit DR note code written by Lokesh kumar jha 09/04/2020"
     public function drnote_edit(){


	if($_SERVER['REQUEST_METHOD'] == "POST") {

	
            	$soc_amt = $this->input->post('soc_amt');


					
			  for($i = 0; $i < count($soc_amt); $i++){

			  $data     = array(

			  	                   'comp_id'       => $this->input->post('comp_id'),

                                   'ro_no'         => $this->input->post('ro_no'),
	
								    'ro_dt'        => $this->input->post('ro_dt'),
	
									'invoice_no'   => $this->input->post('invoice_no'),

									'invoice_dt'   => $this->input->post('invoice_dt'),
	
									'tot_amt'      => $this->input->post('tot_amt'),
                                    
									'soc_id'       => $_POST['soc_id'][$i],
	
								    'soc_amt'      => $_POST['soc_amt'][$i]

                                );

		   $where  =   array(

		   	     'soc_id'   => $_POST['soc_id'][$i],

                 'comp_id'     => $this->input->post('comp_id'),

                 'ro_no'      => $this->input->post('ro_no'),

            );

            $this->FertilizerModel->f_edit('td_dr_note', $data, $where);

							}
				
				$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/dr_note');
		
           
            
			}else {


              $where = array(

              	"comp_id" => explode("/",$this->input->get('trans_do'))["0"],
                    
                "ro_no" => explode("/",$this->input->get('trans_do'))["1"]
              );

            $select                = array("soc_id","soc_name","soc_add","gstin");
			$product['socdtls']    = $this->FertilizerModel->f_select('mm_ferti_soc',$select,NULL,0);

			$select1               = array("comp_id","comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);

			$product['cr_detals']  = $this->FertilizerModel->f_select('td_dr_note',NULL,$where,0);
			$branch_id  = $this->session->userdata['loggedin']['branch_id'];
			$product['ro_dtls']    = $this->Society_paymentModel->f_getdo_dtl($branch_id);	

	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("dr_note/edit",$product);

	        $this->load->view('post_login/footer');
     }

}

     //     edit DR note code written by Lokesh kumar jha 11/04/2020"
	        public function do_detail(){
            
	        $select = array("a.do_dt", "a.invoice_no","a.comp_id","a.invoice_dt","a.tot_cr_amt", "b.COMP_NAME", "b.GST_NO");
       		
			$where      =   array(

            "a.comp_id = b.COMP_ID"  => NULL,

            "a.do_no" => $this->input->get("do_no")

                );
			   
			$comp   = $this->FertilizerModel->f_select('td_cr_note a,mm_company_dtls b',$select,$where,1);
			
			echo json_encode($comp);

	        }


	    public function cr_note(){

		
		   $data['credit_notes']   = $this->FertilizerModel->credit_amt();   
		   $this->load->view("post_login/fertilizer_main");
	   
		   $this->load->view("cr_note/dashboard",$data);
	   
		   $this->load->view('search/search');
	   
		   $this->load->view('post_login/footer');
	    }
	   //     Add cr note code written by Lokesh kumar jha 08/04/2020"
		public function crnoteAdd(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {
					
					$comp_id = $this->input->post('comp_id');

					$do_no = $this->input->post('do_no');	

					$do_dt = $this->input->post('do_dt');

					$invoice_no= $this->input->post('invoice_no');

					$invoice_dt = $this->input->post('invoice_dt');
                 
					
					$br_amt = $this->input->post('br_amt');

		            $tot_cr_amt = $this->input->post('tot_cr_amt');
					
					  for($i = 0; $i < count($br_amt); $i++){
		
					  $data     = array(
											'comp_id'     => $this->input->post('comp_id'),
		
											'do_no'        => $this->input->post('do_no'),
		
											'do_dt'        => $this->input->post('do_dt'),
		
											'invoice_no'   => $this->input->post('invoice_no'),

											'invoice_dt'   => $this->input->post('invoice_dt'),
		
											'tot_cr_amt'  => $this->input->post('tot_cr_amt'),
		
											'branch_id'   => $_POST['branch_id'][$i],
		
											'br_amt'      => $_POST['br_amt'][$i],
											
											"created_by"  =>  $this->session->userdata['loggedin']['user_name'],
		
											"created_dt"  =>  date('Y-m-d h:i:s')
											 
										);
		
						$this->FertilizerModel->f_insert('td_cr_note', $data);
		
					}
						
						$this->session->set_flashdata('msg', 'Successfully Added');
		
							redirect('fertilizer/cr_note');
				
				   
					
					}else {

					$select4        = array("id","branch_name");
					$product['brdtls']   = $this->FertilizerModel->f_select('md_branch',$select4,NULL,0);

					$select3         = array("comp_id","comp_name");
					$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select3,NULL,0);

		
					$select1          = array("soc_id","soc_name","soc_add","gstin");
					$product['socdtls']   = $this->FertilizerModel->f_select('mm_ferti_soc',$select1,NULL,0);
		
					$select          = array("prod_id","prod_desc","gst_rt");
					$product['proddtls']   = $this->FertilizerModel->f_select('mm_product',$select,NULL,0);	
		
			$this->load->view('post_login/fertilizer_main');
		
			$this->load->view("cr_note/add",$product);
		
			$this->load->view('post_login/footer');
		}
		
		}

		//     edit cr note code written by Lokesh kumar jha 08/04/2020"
     public function crnote_edit(){


	if($_SERVER['REQUEST_METHOD'] == "POST") {

            	$br_amt = $this->input->post('br_amt');
					
			  for($i = 0; $i < count($br_amt); $i++){

			  $data     = array(
                                  'comp_id'        => $this->input->post('comp_id'),
		
									'do_no'        => $this->input->post('do_no'),
		
									'do_dt'        => $this->input->post('do_dt'),
		
									'invoice_no'   => $this->input->post('invoice_no'),

									'invoice_dt'   => $this->input->post('invoice_dt'),
		
									'tot_cr_amt'   => $this->input->post('tot_cr_amt'),

                                   'branch_id'     => $_POST['branch_id'][$i],
		
									'br_amt'       => $_POST['br_amt'][$i]

                        //             "modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				                    // "modified_dt"    =>  date('Y-m-d h:i:s'),

                                );

		   $where  =   array(

		   	     'branch_id'   => $_POST['branch_id'][$i],

                 'comp_id'     => $this->input->post('comp_id'),

                 'do_no'      => $this->input->post('do_no'),

            );

            $this->FertilizerModel->f_edit('td_cr_note', $data, $where);
			}
				
				$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/cr_note');
		
           
            
			}else {


              $where = array(

              	"comp_id" => explode("/",$this->input->get('trans_do'))["0"],
                    
                "do_no" => explode("/",$this->input->get('trans_do'))["1"]
              );

            $select  = array("id","branch_name");
			$product['brdtls']   = $this->FertilizerModel->f_select('md_branch',$select,NULL,0);

			$select1  = array("comp_id","comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);

			$product['cr_detals']   = $this->FertilizerModel->f_select('td_cr_note',NULL,$where,0);
			

	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("cr_note/edit",$product);

	        $this->load->view('post_login/footer');
     }

}
	//     delete cr note code written by Lokesh kumar jha 08/04/2020"
	public function deletecr_note() {

	 $where  =   array(

                 	"comp_id" => explode("/",$this->input->get('trans_do'))["0"],
                    
                    "do_no" => explode("/",$this->input->get('trans_do'))["1"]

            );

	$this->FertilizerModel->f_delete('td_cr_note', $where);

$this->session->set_flashdata('msg', 'Successfully Deleted!');

redirect('fertilizer/cr_note');

}	
		
		public function js_get_stock_qty()
		{

			$ro = $this->input->get('ro');
			// var_dump($ro);die;
			$result = $this->FertilizerModel->js_get_stock_qty($ro);
			
 			echo json_encode($result);

		} 
			
public function deletecustpay() {

	$where = array(
				 "paid_id"    =>  $this->input->get('paid_id')
				);
$this->Society_paymentModel->delete_recvjnl($where);
$this->Society_paymentModel->f_delete('tdf_payment_recv', $where);
$this->Society_paymentModel->f_delete('tdf_advance', $where);



$this->session->set_flashdata('msg', 'Successfully Deleted!');

redirect("socpay/society_payment");

//socpay/society_payment
}

//***************************/
	
public function f_get_payro(){
	$br_cd      = $this->session->userdata['loggedin']['branch_id'];
	$soc_id = $this->input->get('soc_id');

	$payro    = $this->Society_paymentModel->f_getdo_dtl($br_cd ,$soc_id);

    echo json_encode($payro);

}
	///*********************************************** */
		public function f_get_company(){

			$select          = array("gst_no","comp_add","cin");
			
		   $where=array(
			   "comp_id" =>$this->input->get("comp_id")
			   ) ;
		
			   
			$comp    = $this->PurchaseModel->f_select('mm_company_dtls',$select,$where,0);
			
			echo json_encode($comp);
		
		}

		public function f_get_ro_dt(){
			$trans_do=$this->input->get("trans_do");
			// $select          = array("do_dt","sale_ro","tot_amt");
			// $where=array(
			// 	"trans_do" =>$this->input->get("trans_do"),
			// 	"tot_amt - ifnull(paid_amt,0) >" =>0 ) ;
				
			//  $comp    = $this->Society_paymentModel->f_select('td_sale',$select,$where,0);
			$comp    = $this->Society_paymentModel->f_get_ro_dt($trans_do);
			
			 echo json_encode($comp);
		 
		 }

		 public function f_get_ro_trans_dtls(){
			$trans_do=$this->input->get("trans_do");
			// $select          = array("do_dt","sale_ro","tot_amt");
			// $where=array(
			// 	"trans_do" =>$this->input->get("trans_do"),
			// 	"tot_amt - ifnull(paid_amt,0) >" =>0 ) ;
				
			//  $comp    = $this->Society_paymentModel->f_select('td_sale',$select,$where,0);
			$comp    = $this->Society_paymentModel->f_get_ro_trans_dtls($trans_do);
			
			 echo json_encode($comp);
		 
		 }

		public function f_get_dist_bnk_dtls(){
			
			$select          = array("ifsc","ac_no");
			$where=array(
				"sl_no" =>$this->input->get("bnk_id")) ;
				
			//  $comp    = $this->Society_paymentModel->f_select('mm_dist_bank',$select,$where,0);
			$bnk    = $this->Society_paymentModel->f_select('mm_feri_bank',$select,$where,0);

			 echo json_encode($bnk);
		 
		 }
		public function f_get_amt_dr()
        {

            $soc_id = $this->input->get('soc_id');
            $trans_do = $this->input->get('trans_do');
			$data = $this->Society_paymentModel->f_get_amt_dr_dtls($soc_id,$trans_do);
            echo json_encode($data);

		}

		public function f_get_advamt_dr()
        {

            $soc_id = $this->input->get('soc_id');
           
			$data = $this->Society_paymentModel->f_get_advamt_dr_dtls($soc_id);
			
            echo json_encode($data);

		}

		public function f_get_adv_net_amt()
        {

            $soc_id = $this->input->get('soc_id');
			$sale_invoice_no = $this->input->get('trans_do');
			$ro_no = $this->input->get('sale_ro');
			// $tot_recvble_amt= $this->input->get('tot_recvble_amt');
			
			$data = $this->Society_paymentModel->f_get_adv_net_amt_dtls($soc_id,$sale_invoice_no,$ro_no);
			echo json_encode($data);

		}
		public function f_get_soc(){

			$select          = array("soc_id","soc_add","gstin");
			
		   $where=array(
			   "soc_id" =>$this->input->get("soc_id")
			   ) ;
		
			   
			$soc    = $this->FertilizerModel->f_select('mm_ferti_soc',$select,$where,0);
			echo json_encode($soc);
		
		}

		public function f_get_qty_per_bag(){

			$select          = array("qty_per_bag");
			
		   $where=array(
			   "prod_id" =>$this->input->get("prod_id")
			   ) ;
		
			   
			$prod    = $this->PurchaseModel->f_select(' mm_product',$select,$where,0);
			
			echo json_encode($prod);
		
		}	
//View Stock RO

public function f_get_product(){

	$select          = array("prod_id","prod_desc");
	
   $where=array(
	   "company" =>$this->input->get("comp_id")
	   ) ;

	$product    = $this->PurchaseModel->f_select(' mm_product',$select,$where,0);

    echo json_encode($product);

}

public function f_get_sale_ro(){
	
    $select = array("a.ro_no " );
       		
			$where      =   array(

			"a.comp_id = b.comp_id"  => NULL,
			"a.comp_id"    =>  $this->input->get('comp_id')
                );
			   
			$ro   = $this->FertilizerModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
			
			echo json_encode($ro);

	        }

 public function stock_entry(){
	 $br_cd      = $this->session->userdata['loggedin']['branch_id'];
	 $fin_id     = $this->session->userdata['loggedin']['fin_id'];
	 $bank['data']    = $this->PurchaseModel->f_get_stock_view( $br_cd ,$fin_id);
	
	$this->load->view("post_login/fertilizer_main");

	$this->load->view("stock_entry/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

// Add stock_entry
public function stockAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		// "kms_year"      =>  $this->kms_year,
			$fin_year=  $this->session->userdata['loggedin']['fin_yr'];
			$fin_id=$this->session->userdata['loggedin']['fin_id'];
			    // $br_cd = $this->session->userdata['loggedin']['branch_id'];
			  
			 $comp_id = $this->input->post('comp_id');
			 
			$prod_id = $this->input->post('prod_id');

			$ro_no   = $this->input->post('ro_no');

			$ro_dt     = $this->input->post('ro_dt');
			
			$due_dt    = $this->input->post('due_dt');

			$invoice_no = $this->input->post('invoice_no');

			$invoice_dt = $this->input->post('invoice_dt');

			$qty = $this->input->post('qty');

			$unit = $this->input->post('unit');

			$rate = $this->input->post('rate');

			$base_price = $this->input->post('base_price');

			$cgst = $this->input->post('cgst');

			$sgst = $this->input->post('sgst');

			$retlr_margin= $this->input->post('retlr_margin');

			$spl_rebt= $this->input->post('spl_rebt');

			$add_adj_amt= $this->input->post('adj_amt');

			$less_adj_amt= $this->input->post('less_amt');

			$net_amt= $this->input->post('net_amt');

			$rbt_add= $this->input->post('rbt_add');

			$rbt_less= $this->input->post('rbt_less');

			$rnd_of_add= $this->input->post('rnd_of_add');

			$rnd_of_less= $this->input->post('rnd_of_less');

			$tot_amt= $this->input->post('tot_amt');

			$no_of_bags =  $this->input->post('no_of_bags');

			$reck_pt_rt=  $this->input->post('reck_pt_rt');

			$reck_pt_n_rt=  $this->input->post('reck_pt_n_rt');

			$govt_sale_rt=  $this->input->post('govt_sale_rt');

			$iffco_buf_rt=  $this->input->post('iffco_buf_rt');

			$iffco_n_buff_rt=  $this->input->post('iffco_n_buff_rt');

			$delivery_mode= $this->input->post('delivery_mode');

			$trans_flag='1';
			
			$stock_point = $this->input->post('stkpnt_id');

			$br_cd      = $this->session->userdata['loggedin']['branch_id'];
			// print_r($br_cd );
			// die();
			$data_array = array (

					"comp_id" => $comp_id,
			
					"prod_id" => $prod_id,

					"ro_no"   => $ro_no,

					"ro_dt"   => $ro_dt,

					"due_dt"    => $due_dt,

					"invoice_no" => $invoice_no,
				
					"invoice_dt" =>  $invoice_dt,

					"qty" =>  $qty,

					"unit" => $unit,

					"rate" =>  $rate,

					"base_price" => $base_price,

					"cgst"        => $cgst,

					"sgst"        => $sgst,

					"retlr_margin"   => $retlr_margin,
					
					"spl_rebt"       => $spl_rebt,

					"add_adj_amt" => $add_adj_amt,

					"less_adj_amt" => $less_adj_amt,

					"net_amt"        => $net_amt,

					"rbt_add"        => $rbt_add,

					"rbt_less"       => $rbt_less,

					"rnd_of_add"     => $rnd_of_add,

					"rnd_of_less"   => $rnd_of_less,

					"tot_amt"        => $tot_amt,

					"stock_qty" =>  $qty,
					
					"no_of_bags"  => $no_of_bags,

					"delivery_mode" =>$delivery_mode,

					"reck_pt_rt"=> $reck_pt_rt,

					"reck_pt_n_rt"=>$reck_pt_n_rt,

					"govt_sale_rt"=>0,
					
					"iffco_buf_rt"=>$iffco_buf_rt,

					"iffco_n_buff_rt"=>$iffco_n_buff_rt,

					"trans_dt" => date('Y-m-d h:i:s'),

					 "trans_flag" =>$trans_flag,

				    "challan_flag"    => 'N',

					"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"    =>  date('Y-m-d h:i:s'),

					"br"     => $this->session->userdata['loggedin']['branch_id'],

					"fin_yr"   =>$fin_id,

					"stock_point" => $stock_point
				);
			 
				$data_array1 = array (
					"trans_dt" => date('Y-m-d h:i:s'),

					"ro_inv_no"   => $ro_no    ,   
					          
					"branch_id" => $this->session->userdata['loggedin']['branch_id'],

					"fin_yr"	 =>$fin_id,

					"point_id"	=>$stock_point,

					"trans_type" => "I",

					"unit"=>$unit,

					"quantity" =>  $qty,	

					"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"    =>  date('Y-m-d h:i:s'),
				);
				$this->PurchaseModel->f_insert('tdf_stock_point_trans', $data_array1);

				$this->PurchaseModel->f_insert('td_purchase', $data_array);
				
				$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('stock/stock_entry');
			}else {
				$br_cd      = $this->session->userdata['loggedin']['branch_id'];
				$select2 =  array("soc_id","soc_name");
				$where2 = array(
					"stock_point_flag"    =>  'Y',
					"district" => $br_cd  );

				$product['socdtls']   = $this->PurchaseModel->f_select('mm_ferti_soc',$select2,$where2,0);
			//   echo $this->db->last_query();
			//   die();
				$select1          = array("comp_id","comp_name");

				$product['compdtls']   = $this->PurchaseModel->f_select('mm_company_dtls',$select1,NULL,0);
				
				$select  =array("id","unit_name");
				$product['unitdtls']   = $this->PurchaseModel->f_select('mm_unit',$select,NULL,0);
				
	$this->load->view('post_login/fertilizer_main');

	$this->load->view("stock_entry/add",$product);

	$this->load->view('post_login/footer');
}
}
public function deletero() {

	$where = array(
				 "ro_no"    =>  $this->input->get('ro_no'),
				 "challan_flag" =>  'N'
		
	);
	$where1 = array(
		"ro_inv_no"    =>  $this->input->get('ro_no')
		

);

	$this->PurchaseModel->f_delete('td_purchase', $where);
	$this->PurchaseModel->f_delete('tdf_stock_point_trans', $where1);

	$select1          = array("challan_flag");
	$where = array(
		"ro_no"    =>  $this->input->get('ro_no'));

$challan_flag = $this->PurchaseModel->f_select('td_purchase',$select1,$where,0);

	$this->session->set_flashdata('msg', 'Successfully Deleted!');
	
	redirect("stock/stock_entry");

}

public function f_get_challan_flag(){
	$select          = array("challan_flag");
	
   $where=array(
	   "ro" =>$this->input->get("ro")
	   ) ;

	$pur    = $this->FertilizerModel->f_select(' td_purchase',$select,$where,0);

    echo json_encode($pur);


}

public function viewstock(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {


		$data_array = array(
			"comp_id" => $this->input->post('comp_id'),

			"prod_id" => $this->input->post('prod_id'),

			"ro_no"   => $this->input->post('ro_no'),
		   
			"ro_dt"    => $this->input->post('ro_dt'),
			
			"due_dt"    => $this->input->post('due_dt'),

			"invoice_no" =>$this->input->post('invoice_no'),
		
			"invoice_dt" =>  $this->input->post('invoice_dt'),

			"qty" =>  $this->input->post('qty'),

			"unit" =>  $this->input->post('unit'),

			"rate"=>  $this->input->post('rate'),

			"base_price"=>  $this->input->post('base_price'),
			
			"add_adj_amt" =>  $this->input->post('add_adj_amt'),

			"tot_amt"=>  $this->input->post('tot_amt'),

			"net_amt"=>  $this->input->post('net_amt'),

		   "no_of_bags"  => $this->input->post('no_of_bags'),

		   "delivery_mode" => $this->input->post('delivery_mode'),

		   "reck_pt_rt"=> $this->input->post('reck_pt_rt'),

			"reck_pt_n_rt"=> $this->input->post('reck_pt_n_rt'),

			"govt_sale_rt"=>  $this->input->post('govt_sale_rt'),
					
			"iffco_buf_rt"=>  $this->input->post('iffco_buf_rt'),

			"iffco_n_buff_rt"=>  $this->input->post('iffco_n_buff_rt'),

			"trans_dt" =>  $this->input->post(date('Y-m-d h:i:s')),

			"challan_flag"    =>  $this->input->post('N'),

			"stock_point"     => $this->input->post('stkpnt_id'),

			"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

			"created_dt"    =>  date('Y-m-d h:i:s'));

			$br     = $this->session->userdata['loggedin']['branch_name'];

		    $where = array(
			"ro_no" => $this->input->post('ro_no'),
			 "br" => $this->session->userdata['loggedin']['branch_id']);
			
		$this->PurchaseModel->f_edit('td_purchase', $data_array, $where);
        
		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('stock/stock_entry');

	}else{
			$select = array(
					"comp_id",
					"comp_add",
					"gst_no",
					"cin" ,
					"prod_id",
					"ro_no",
					"ro_dt",
					"due_dt",
					"invoice_no",
					"invoice_dt" ,
					"qty" ,
					"unit",
					"rate",
					"base_price",
					"net_amt",
					"no_of_bags" ,
					"delivery_mode",
					"reck_pt_rt",
					"reck_pt_n_rt",
					"govt_sale_rt",
					"iffco_buf_rt",
					"iffco_n_buff_rt" ,
					"retlr_margin" ,
					"spl_rebt" ,
					"add_adj_amt" ,
					"less_adj_amt" ,
					"cgst",
					"sgst"   ,
					"rbt_add" ,
					"rbt_less" ,"rnd_of_add",
					"rnd_of_less" ,"tot_amt",
					"stock_point"                  
		);

			$where = array(
				"ro_no" => $this->input->get('ro_no')
				);

				$where1 = array(
					"a.comp_id = b.comp_id"    => NULL
					);
		
					$where2 = array(
						"a.prod_id = b.prod_id"    => NULL
						);
			
				$select        = array("a.comp_id","a.comp_name","a.comp_add","a.gst_no","a.cin");
				$product['compdtls']   = $this->PurchaseModel->f_select('mm_company_dtls a,td_purchase b',$select,$where1,1);
				
				$select1          = array("a.prod_id","a.prod_desc","hsn_code","gst_rt","qty_per_bag");
				$product['proddtls']   = $this->PurchaseModel->f_select('mm_product a,td_purchase b',$select1,$where2,1);	

				$select2=  array("qty","ro_no","invoice_no","invoice_dt","challan_flag","due_dt","no_of_bags","ro_dt","delivery_mode","
				rate","reck_pt_rt","reck_pt_n_rt","iffco_buf_rt","iffco_n_buff_rt","base_price","net_amt","retlr_margin","spl_rebt","add_adj_amt","less_adj_amt","cgst","sgst",
				"rbt_add","rbt_less","rnd_of_add","rnd_of_less","tot_amt","stock_point");

				$product['schdtls'] = $this->PurchaseModel->f_select("td_purchase",$select2,$where,1);
				
				$select3= array("id","unit_name");
				$product['unitdtls'] = $this->PurchaseModel->f_select("mm_unit",$select3,Null,1);

				$select4 = array("soc_id","soc_name");
				$where4 = array(
					"stock_point_flag"=>'Y'
					);
				$product['stockpoint'] = $this->PurchaseModel->f_select("mm_ferti_soc",$select4,$where4,0);
																			
		$this->load->view('post_login/fertilizer_main');

		$this->load->view("stock_entry/edit",$product);

		$this->load->view("post_login/footer");
	}
}


//******************************************* */

//View Soceity
public function soceity(){
	$select          = array("soc_id","soc_name");
	$where        = array(
		"branch_id" => $this->session->userdata['loggedin']['branch_id']);

	$bank['data']    = $this->FertilizerModel->f_select('mm_ferti_soc',$select,NULL,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("soceity/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

///*********************************************** */

// Add Soceity
public function soceityAdd(){

	
	if($_SERVER['REQUEST_METHOD'] == "POST") {

		   $soc_id = $this->FertilizerModel->get_soceity_code();

			$soc_name = $this->input->post('soc_name');

			$soc_add = $this->input->post('soc_add');
			
		   $gstin = $this->input->post('gstin');

		   $mfms = $this->input->post('mfms');

			$district = $this->input->post('district');

			$ph_no    = $this->input->post('ph_no');

			$email = $this->input->post('email');

			$stock_point_flag = $this->input->post('stock_point_flag');

			$buffer_flag = $this->input->post('buffer_flag');
    
			$status = $this->input->post('status');

			$data_array = array (

					"soc_id" => $soc_id,
			
					"soc_name" => $soc_name,

					"soc_add"   => $soc_add,

					"gstin"=>$gstin,

					"mfms" => $mfms,

					"district"  => $district,
					
					"ph_no"    => $ph_no,

					"email" =>  $email,
				
					"stock_point_flag" =>  $stock_point_flag,

					"buffer_flag"    => $buffer_flag,
		   
					"status"          => $status,
					
					"created_by"    =>  $this->session->userdata['loggedin']['user_name'],    

					"created_dt"    =>  date('Y-m-d h:i:s'));
			 
				$this->FertilizerModel->f_insert('mm_ferti_soc', $data_array);
				
				$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('fertilizer/soceity');
			}else {

				$select          = array("district_code","district_name");

				$district['distdtls']   = $this->FertilizerModel->f_select('md_district',$select,NULL,0);
					
	$this->load->view('post_login/fertilizer_main');

	$this->load->view("soceity/add",$district);

	$this->load->view('post_login/footer');
}
}

//Edit Soceity
public function editsoceity(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"soc_id"     =>  $this->input->post('soc_id'),

				"soc_name"   =>  $this->input->post('soc_name'),

				"soc_add"    =>  $this->input->post('soc_add'),

				"gstin"=> $this->input->post('gstin'),

				"mfms" => $this->input->post('mfms'),

				"district"  =>  $this->input->post('district'),
				
				"email"       =>  $this->input->post('email'),

				"ph_no"        =>  $this->input->post('ph_no'),
				 
				"stock_point_flag"      =>  $this->input->post('stock_point_flag'),
 
				"buffer_flag"      =>  $this->input->post('buffer_flag'),

				"status"   =>  $this->input->post('status'),

				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')	);

		$where = array(
				"soc_id" => $this->input->post('soc_id')
		);
		 

		$this->FertilizerModel->f_edit('mm_ferti_soc', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('fertilizer/soceity');

	}else{
			$select = array(
					"soc_id",
					"soc_name",
					"soc_add",
					"gstin",
					"mfms",
					"district",
					"email",
					"ph_no",
					"stock_point_flag" ,
					"buffer_flag" ,
					"status"                                  
		);

			$where = array(
				"soc_id" => $this->input->get('soc_id')
				);

		$sch['schdtls'] = $this->FertilizerModel->f_select("mm_ferti_soc",$select,$where,1);
																															
		$this->load->view('post_login/fertilizer_main');

		$this->load->view("soceity/edit",$sch);

		$this->load->view("post_login/footer");
	}
}



public function deletesociety() {

	$where = array(
				 "soc_id"    =>  $this->input->get('soc_id')
		
	);
	
	$this->FertilizerModel->f_delete('mm_ferti_soc', $where);
   
	
	$this->session->set_flashdata('msg', 'Successfully Deleted!');

	redirect("fertilizer/fertilizer/soceity");
	

}

///************************************************/
//View Unit
		public function unit(){
			$select         = array("id","unit_name");
		
			$bank['data']   = $this->FertilizerModel->f_select('mm_unit',$select,NULL,0);

			$this->load->view("post_login/fertilizer_main");
		
			$this->load->view("unit/dashboard",$bank);
		
			$this->load->view('search/search');
		
			$this->load->view('post_login/footer');
		}

//Add Unit
		public function unitAdd(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {
		
				//    $comp_id = $this->FertilizerModel->get_company_code();
		
					$unit_name = $this->input->post('unit_name');
		
					$data_array = array (
		
							// "comp_id" => $comp_id,
					
							"unit_name" => $unit_name,
						
							"created_by"    =>  $this->session->userdata['loggedin']['user_name'],
		
							"created_dt"    =>  date('Y-m-d h:i:s'));
					 
						$this->FertilizerModel->f_insert('mm_unit', $data_array);
						
						$this->session->set_flashdata('msg', 'Successfully Added');
		
							redirect('fertilizer/unit');
					}else {
							
			$this->load->view('post_login/fertilizer_main');
		
			$this->load->view("unit/add");
		
			$this->load->view('post_login/footer');
		}
	}
		
	public function editunit(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {
		
				$data_array = array(
		
						"id"     =>  $this->input->post('id'),
		
						"unit_name"   =>  $this->input->post('unit_name'),

						"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],
		
						"modified_dt"  =>  date('Y-m-d h:i:s')
				);
		
				$where = array(
						"id" => $this->input->post('id')
				);
				 
		
				$this->FertilizerModel->f_edit('mm_unit', $data_array, $where);
		
				$this->session->set_flashdata('msg', 'Successfully Updated');
		
				redirect('fertilizer/unit');
		
			}else{
					$select = array(
							"id",
							"unit_name"                           
				);
		
					$where = array(
						"id" => $this->input->get('id')
						);
		
				$sch['schdtls'] = $this->FertilizerModel->f_select("mm_unit",$select,$where,1);
																																	
				$this->load->view('post_login/fertilizer_main');
		
				$this->load->view("unit/edit",$sch);
		
				$this->load->view("post_login/footer");
			}
		}
		
/*******************************************************************
 *						Company Master							   *
 *******************************************************************/
//View Added Company
public function company(){
	$select         = array("comp_id","comp_name","comp_add","gst_no");

	$bank['data']   = $this->FertilizerModel->f_select('mm_company_dtls',$select,NULL,0);
//   echo $this->db->last_query();
// / die();
	$this->load->view("post_login/fertilizer_main");

	$this->load->view("company/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

//Add New Company
public function companyAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		   $comp_id = $this->FertilizerModel->get_company_code();

			$comp_desc = $this->input->post('comp_name');

			$comp_add = $this->input->post('comp_add');
			
			$gst_no    = $this->input->post('gst_no');
						
			$pan_no    = $this->input->post('pan_no');

			$comp_email_id = $this->input->post('comp_email_id');

			$comp_pn_no = $this->input->post('comp_pn_no');

			$cin = $this->input->post('cin');

			$mfms = $this->input->post('mfms');

			$short_name = $this->input->post('short_name');
			
			$data_array = array (

					"comp_id" => $comp_id,
			
					"comp_name" => $comp_desc,

					"short_name" => $short_name,
					
					"comp_add"   => $comp_add,

					"comp_email_id" =>$comp_email_id,

					"comp_pn_no"    => $comp_pn_no,
					
					"pan_no"    => $pan_no,

					"gst_no" =>  $gst_no,

					"mfms"=>  $mfms,

					"cin"=> $cin,
				
					"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"    =>  date('Y-m-d h:i:s'));
			 
				$this->FertilizerModel->f_insert('mm_company_dtls', $data_array);
				// echo $this->db->last_query();
				// die();
				$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('fertilizer/company');
			}else {
					
	$this->load->view('post_login/fertilizer_main');

	$this->load->view("company/add");

	$this->load->view('post_login/footer');
  }
}

public function editcompany(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"comp_id"     =>  $this->input->post('comp_id'),

				"comp_name"   =>  $this->input->post('comp_name'),

				"short_name" =>$this->input->post('short_name'),

				"comp_add"    =>  $this->input->post('comp_add'),

				"comp_email_id" =>  $this->input->post('comp_email_id'),

				"comp_pn_no"   =>  $this->input->post('comp_pn_no'),
				 
				"gst_no"      =>  $this->input->post('gst_no'),

				"mfms" =>  $this->input->post('mfms'),

				"pan_no"    =>  $this->input->post('pan_no'),

				"cin" =>  $this->input->post('cin'),

				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
		);

		$where = array(
				"comp_id" => $this->input->post('comp_id')
		);
		 

		$this->FertilizerModel->f_edit('mm_company_dtls', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('fertilizer/company');

	}else{
			$select = array(
					"comp_id",
					"comp_name",
					"short_name",
					"comp_add",
					"comp_email_id",
					"comp_pn_no",
					"gst_no"  ,
					"mfms"  ,
					"pan_no",
					"cin"                                
		);

			$where = array(
				"comp_id" => $this->input->get('comp_id')
				);

		$sch['schdtls'] = $this->FertilizerModel->f_select("mm_company_dtls",$select,$where,1);
																															
		$this->load->view('post_login/fertilizer_main');

		$this->load->view("company/edit",$sch);

		$this->load->view("post_login/footer");
	}
}


public function deletecompany() {

	$where = array(
				 "comp_id"    =>  $this->input->get('comp_id')
		
	);
	
	$this->FertilizerModel->f_delete('mm_company_dtls', $where);
   
	
	$this->session->set_flashdata('msg', 'Successfully Deleted!');

	redirect("fertilizer/fertilizer/company");

}

public function f_get_salerate(){


$prod_id  = $this->input->get('prod_id');
$comp_id = $this->input->get('comp_id');
$ro_dt   = $this->input->get('ro_dt');

$sql = $this->db->query("SELECT rate from mm_sale_rate where comp_id='$comp_id' and prod_id='$prod_id' and '$ro_dt' >=frm_dt and '$ro_dt'<=to_dt");
$result = $sql->row();
// echo $this->db->last_query();
// die();
echo json_encode($result);


}

public function sale_rate(){
	$select = array("a.district","d.district_name","a.frm_dt","a.to_dt","a.rate","b.comp_name","a.comp_id","c.prod_desc","a.prod_id");

	$where      =   array(

		"a.comp_id = b.comp_id"  => NULL,
		"a.prod_id= c.prod_id"=>NULL,
	    "a.district=d.district_code"=>NULL	);
		   
		// $ro   = $this->FertilizerModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
	$bank['data']   = $this->FertilizerModel->f_select('mm_sale_rate a,mm_company_dtls b,mm_product c,md_district d',$select,$where,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("sale_rate/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}
public function salerateAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		   $prod_id    = $this->input->post('prod_id');
		   $comp_id = $this->input->post('comp_id');
		   $district = $this->input->post('district');
		   $rate = $this->input->post('rate');
		   $frm_dt = $this->input->post('frm_dt');
		   $to_dt = $this->input->post('to_dt');
			
			$data_array = array (

					"prod_id" => $prod_id,
			
					"comp_id" => $comp_id,

					"district" => $district,
					
					"rate" =>  $rate,

					"frm_dt" =>  $frm_dt,

					"to_dt" =>  $to_dt,

					"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"    =>  date('Y-m-d h:i:s'));
			 
				$this->FertilizerModel->f_insert('mm_sale_rate', $data_array);
				
				$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('fertilizer/sale_rate');
			}else {
				$select1          = array("comp_id","comp_name");
				$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);
				
				$select2          = array("prod_id","prod_desc");
				$product['proddtls']   = $this->FertilizerModel->f_select('mm_product',$select2,NULL,0);
				
				$select3         = array("district_code","district_name");
				$product['distdtls']   = $this->FertilizerModel->f_select('md_district',$select3,NULL,0);
	$this->load->view('post_login/fertilizer_main');

	$this->load->view("sale_rate/add",$product);

	$this->load->view('post_login/footer');
}
}

public function editsalerate(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"prod_id"     =>  $this->input->post('prod_id'),

				"comp_id"   =>  $this->input->post('comp_id'),
				
				"district"   =>$this->input->post('district'),

				"frm_dt"      =>  $this->input->post('frm_dt'),

				"to_dt"    =>  $this->input->post('to_dt'),

				"rate"     =>  $this->input->post('rate'),
			   
				// "modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
		);

		$where = array(
				"district" => $this->input->post('district'),
				"prod_id"     =>  $this->input->post('prod_id'),
				"comp_id"   =>  $this->input->post('comp_id'),
				"frm_dt"      =>  $this->input->post('frm_dt'),
				"to_dt"    =>  $this->input->post('to_dt')

				
		);
		 

		$this->FertilizerModel->f_edit('mm_sale_rate', $data_array, $where);
		
		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('fertilizer/sale_rate');

	}else{
			$select = array(
					"a.prod_id",
					"a.comp_id",
					"a.district" ,
					"a.frm_dt",
					"a.to_dt"  ,
					"a.rate",
					"b.prod_desc",
					"c.comp_name" ,
				"d.district_name" 
				);

			$where = array(
				"a.prod_id" => $this->input->get('prod_id'),
				"a.comp_id" =>  $this->input->get('comp_id'),
				"a.frm_dt" =>  $this->input->get('frm_dt'),
				"a.to_dt" =>  $this->input->get('to_dt'),
				"a.district" =>  $this->input->get('district'),
				"a.prod_id=b.prod_id"=>NULL,
				"a.comp_id=c.comp_id"=>NULL,
				"a.district=d.district_code" =>NULL
				);

				// $select1 = array("a.id","a.unit_name");
				// $where1 = array(
				// 	"a.id = b.unit"    => NULL,
				// 	"b.prod_id" => $this->input->get('prod_id'));
			
		// $sch['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);	
		$sch['schdtls'] = $this->FertilizerModel->f_select("mm_sale_rate a,mm_product b,mm_company_dtls c,md_district d",$select,$where,1);
		
		// $sch['unitdtls'] = $this->FertilizerModel->f_select("mm_unit a,mm_product b",$select1,$where1,1);		
		
		$this->load->view('post_login/fertilizer_main');

		$this->load->view("sale_rate/edit",$sch);

		$this->load->view("post_login/footer");
	}
}
/*******************************************************************
 *						Product Master							   *
 *******************************************************************/

//View Added Product
	public function product(){
		$select = array("prod_id","prod_desc","prod_type","gst_rt","hsn_code");

		$bank['data']   = $this->FertilizerModel->f_select('mm_product',$select,NULL,0);
	
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("product/dashboard",$bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

//Add New Product		
	public function productAdd(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {

				    $prod_id   = $this->FertilizerModel->get_product_code();
					$prod_desc = $this->input->post('prod_desc');
					$prod_type = $this->input->post('prod_type');
					$comp_id   =$this->input->post('comp_id');
					$gst_rt    = $this->input->post('gst_rt');
					$hsn_code  = $this->input->post('hsn_code');
				    $unit      = $this->input->post('bag');
					$data_array = array (

							"prod_id"    => $prod_id,
					
							"prod_desc"   => $prod_desc,

							"prod_type"   => $prod_type,

							'company'     =>$comp_id,

							"gst_rt"       =>  $gst_rt,

							"hsn_code"     =>  $hsn_code,

							"qty_per_bag"  =>  $unit,

							"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

							"created_dt"    =>  date('Y-m-d h:i:s'));
					 
						$this->FertilizerModel->f_insert('mm_product', $data_array);
						
						$this->session->set_flashdata('msg', 'Successfully Added');

							redirect('fertilizer/product');
					}else {
						$select1          = array("comp_id","comp_name");
						$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);
						
						// $select2          = array("id","unit_name");
						// $product['unitdtls']   = $this->FertilizerModel->f_select('mm_unit',$select2,NULL,0);
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("product/add",$product);

			$this->load->view('post_login/footer');
		}
	}

//Edit Product
	public function editproduct(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

					"prod_id"     =>  $this->input->post('prod_id'),

					"prod_desc"   =>  $this->input->post('prod_desc'),
					
					"prod_type"   =>$this->input->post('prod_type'),

					"gst_rt"      =>  $this->input->post('gst_rt'),

					"hsn_code"    =>  $this->input->post('hsn_code'),

				    "qty_per_bag"  =>  $this->input->post('bag'),
				   
					"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

					"modified_dt"  =>  date('Y-m-d h:i:s')
			);

			$where = array(
					"prod_id" => $this->input->post('prod_id')
			);
			 

			$this->FertilizerModel->f_edit('mm_product', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/product');

		}else{
				$select = array(
						"a.prod_id",
						"a.prod_desc",
						"a.prod_type" ,
						"a.gst_rt",
						"a.hsn_code"  ,
						"a.qty_per_bag",
						"b.comp_name"  
					);

				$where = array(
					"a.prod_id" => $this->input->get('prod_id'),
					"a.company=b.comp_id"=>NULL
					);

					// $select1 = array("a.id","a.unit_name");
					// $where1 = array(
					// 	"a.id = b.unit"    => NULL,
					// 	"b.prod_id" => $this->input->get('prod_id'));
				
			//  $sch['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);

			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_product a,mm_company_dtls b",$select,$where,1);

			// $sch['unitdtls'] = $this->FertilizerModel->f_select("mm_unit a,mm_product b",$select1,$where1,1);	

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("product/edit",$sch);

			$this->load->view("post_login/footer");
		}
	}

//Delete Product
    public function deleteprod() {

        $where = array(
                     "prod_id"    =>  $this->input->get('prod_id')
            
        );
		
        $this->FertilizerModel->f_delete('mm_product', $where);
       
        
        $this->session->set_flashdata('msg', 'Successfully Deleted!');

        redirect("fertilizer/fertilizer/product");

    }


/*******************************************************************
 *					Sub	Schedule Master							   *
 *******************************************************************/

//View Added Sub Schedules
	public function subscheduleDash(){

		$select        = array("schedule_code","subschedule_code","schedule_type");

		$bank['data']  = $this->FinanceModel->f_select('md_subschedule_heads',NULL,NULL,0);

		$this->load->view("post_login/finance_main");

		$this->load->view("subschedule/dashboard",$bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

//Add New Sub Schedule
	public function subscheduleAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$subschedule_code = $this->FertilizerModel->get_subsch_code($this->input->post('schedule_cd'),$this->input->post('acc_type')); 

			$data = array (

				"acc_type"      =>  $this->input->post('acc_type'),

				"schedule_code"   =>  $this->input->post('schedule_cd'),

				"subschedule_code" =>  $subschedule_code,

				"subschedule_type" =>  $this->input->post('subschedule_type'),

				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);

				$this->FinanceModel->f_insert('md_subschedule_heads', $data);

				$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('finance/subscheduleDash');
				}else {

			$list['row'] = $this->FinanceModel->f_select("md_schedule_heads", NULL, NULL, 0);    	
							
			$this->load->view('post_login/finance_main');

			$this->load->view("subschedule/add",$list);

			$this->load->view('post_login/footer');
		}
	}

//Edit Sub Schedule
	public function editsubSchedule(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

				"subschedule_type" => $this->input->post('subschedule_type'),

				"modified_by"   => $this->session->userdata['loggedin']['user_name'],

				"modified_dt"   => date('Y-m-d h:i:s')
			);


			$where = array(
					"subschedule_code"       => $this->input->post('subschedule_code')
			);

			$this->FinanceModel->f_edit('md_subschedule_heads', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('finance/subscheduleDash');

		}else{
			$select = array("a.*",
							 "b.*"
			);
						
			$where  = array( "a.schedule_code = b.schedule_code"    => NULL,
							 "b.subschedule_code" => $this->input->get('subschedule_code')
			);

			$sch['schdtls']   = $this->FinanceModel->f_select("md_schedule_heads a,md_subschedule_heads b",NULL,$where,1);
																																
			$this->load->view('post_login/finance_main');

			$this->load->view("subschedule/edit",$sch);

			$this->load->view("post_login/footer");
		}
	}     
				

/*******************************************************************
 *					Account Master							   	   *
 *******************************************************************/

//View Account Head
	public function accountDash(){
		$select         = array("acc_type","sch_code","sub_sch_code","acc_code","acc_head");

		$bank['data']   = $this->FinanceModel->f_select('md_account_heads',$select,NULL,0);

		$this->load->view("post_login/finance_main");

		$this->load->view("account/dashboard",$bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

	public function accountAdd(){
		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$sch	 = $this->input->post('schedule_cd');

			$subSch  = $this->input->post('subschedule_cd');

			$actype	 = $this->input->post('acc_type');

			$ac_name = $this->input->post('ac_name');

			if($actype==1||$actype==2){

				$acflag = 'B';

			}elseif($actype==3||$actype==4){

				$acflag = 'S';

			}elseif($actype==5||$actype==6){

				$acflag = 'P';

			} 

			$max_no = $this->FinanceModel->f_max_no($subSch);		

			$max_no->acc_code +=1;

			$max_no = $max_no->acc_code;

			if($max_no==1)
			{
				$max_no = str_pad($max_no,4,0,STR_PAD_LEFT);

				$max_no = $subSch.$max_no;
			}else{
				$max_no = $max_no;
			}

			$data_array = array (
				"acc_type"				=>	$actype,

				"sch_code"     	    	=>  $sch,

				"sub_sch_code"			=>	$subSch,

				"acc_code"	    		=>  $max_no,

				"acc_head"	    		=>  $ac_name,

				"acc_flag"	    		=>  $acflag,

				"created_by"            =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"        =>  date('Y-m-d h:i:s')
			);

			$this->FinanceModel->f_insert('md_account_heads', $data_array);

			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('finance/accountDash');

		}else {
				$list['row']       =   $this->FinanceModel->f_select("md_schedule_heads", NULL, NULL, 0);

				$list['row1']       =   $this->FinanceModel->f_select("md_subschedule_heads", NULL, NULL, 0);

				$this->load->view('post_login/finance_main');

				$this->load->view("account/add",$list);

				$this->load->view('post_login/footer');
		}
	}

	public function editAccount(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

				$data_array = array(

						"sch_code"     	    =>  $this->input->post('sch_name'),

						"acc_head"          =>  $this->input->post('acc_name'),

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
						"acc_head");

				$where = array(
										"acc_code" => $this->input->get('acc_code')
								);

				$acc['accdtls'] = $this->FinanceModel->f_select("md_account_heads",$select,$where,1);

				$acc['schdtls'] = $this->FinanceModel->f_select("md_schedule_heads",NULL,NULL,0);

				$acc['subschdtls'] = $this->FinanceModel->f_select("md_subschedule_heads",NULL,NULL,0);
																
				$this->load->view('post_login/finance_main');

				$this->load->view("account/edit",$acc);

				$this->load->view("post_login/footer");
		}
	}
			

//Delete Sub Schedule
public function deleteAccCd() {

	$where = array(
		
		"acc_code"    =>  $this->input->get('accCd')
		
	);

	$this->FinanceModel->f_delete('md_account_heads', $where);


	$this->session->set_flashdata('msg', 'Successfully Deleted!');

	redirect("finance/finance/accountDash");

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
			
			$this->load->view('post_login/finance_main');

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

				$this->load->view('post_login/finance_main');

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
			
			$this->load->view('post_login/finance_main');

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

				$this->load->view('post_login/finance_main');

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
			
			$this->load->view('post_login/finance_main');

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

				$this->load->view('post_login/finance_main');

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

                        $this->load->view('post_login/finance_main');

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

				$this->load->view('post_login/finance_main');

				$this->load->view('approve_voucher/aproveVou',$voucher);
					
				$this->load->view('post_login/footer');	
			}
		}

		public function main($page){
			if($page=="product"){
			  	if($this->session->userdata('value')){
			  	    echo '<script>alert("Save Successful");</script>';
				    $this->load->view('post_login/main');
					  $this->session->unset_userdata('value');
					  $this->load->view('post_login/footer');
			  	} else{
			  		$this->load->view('post_login/main'); 
					$this->load->view('product_master');
					$this->load->view('post_login/footer');
			  	  }
			}elseif($page=="newacc"){
				if($this->session->userdata('value')){
				    echo '<script>alert("Save Successful");</script>';
                                    $this->load->view('post_login/main');
									$this->session->unset_userdata('value');
									$this->load->view('post_login/footer');
			 	}else{
				      $this->load->view('post_login/finance_main');
				      $data['row'] = $this->FinanceModel->f_get_schedule();
					  $this->load->view('acc_head',$data);
					  $this->load->view('post_login/footer');
				      
				}     
			 }elseif ($page=="cash") {
			 	if($this->session->userdata('value')){
			 	    echo '<script>alert("Save Successful, Voucher No: '.$this->session->userdata('value').'");</script>';
			 	    				$this->load->view('post_login/finance_main');
			 	    				$data['row'] = $this->FinanceModel->f_get_acc();
			 		 				$this->load->view('cash_voucher',$data);
									$this->session->unset_userdata('value');
									$this->load->view('post_login/footer');		
			 	}else{		
			 		 $this->load->view('post_login/finance_main');
			 		 $data['row'] = $this->FinanceModel->f_get_acc();
					 $this->load->view('cash_voucher',$data);
					 $this->load->view('post_login/footer');
			 		} 
			 }elseif ($page=="bank") {
			       if($this->session->userdata('value')){
				       echo '<script>alert("Save Successful, Voucher No: '.$this->session->userdata('value').'");</script>';
				       				$this->load->view('post_login/finance_main');
				       				$data['row'] = $this->FinanceModel->f_get_acc();
				       				$data['bank']= $this->FinanceModel->f_get_bank(); 
				       				$this->load->view('bank_voucher',$data);
									$this->session->unset_userdata('value');
									$this->load->view('post_login/footer');   

			       }else{		 

			 	      	 $this->load->view('post_login/finance_main');
					 $data['row'] = $this->FinanceModel->f_get_acc();
					 $data['bank']= $this->FinanceModel->f_get_bank(); 
					 $this->load->view('bank_voucher',$data);	
					 $this->load->view('post_login/footer');
			       }	 
			 }elseif ($page=="journal") {
                               if($this->session->userdata('value')){
                                       echo '<script>alert("Save Successful, Voucher No: '.$this->session->userdata('value').'");</script>';
                                             $this->load->view('post_login/finance_main');
				       				$data['row'] = $this->FinanceModel->f_get_acc();
                                                                $this->load->view('journal_voucher',$data);
                                                                $this->session->unset_userdata('value');

                               }else{

                                         $this->load->view('post_login/finance_main');
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

				$this->load->view('post_login/finance_main');

				$voucher_no = $this->FinanceModel->f_get_voucher_id_all($from_dt,$to_dt);
				

				for($i=0;$i<count($voucher_no);$i++){
					
				    $data['row']=$this->FinanceModel->f_get_vouchers($from_dt,$to_dt,$voucher_no[$i]->voucher_id);

				    $this->load->view('daily_rep/voucher_dtls',$data);
				}
			
				$this->load->view('post_login/footer');

			}else{
				$this->load->view('post_login/finance_main');

				$this->load->view('rep_params/date_params');

				$this->load->view('post_login/footer');
			 }	  	

		}

		public function f_ledger_report(){
			if($_SERVER['REQUEST_METHOD']=="POST"){
				$from_dt   = $_POST['start_dt'];
				$to_dt	   = $_POST['end_dt'];
				$acc_cd	   = $_POST['acc_code'];

				$this->load->view('post_login/finance_main');

				$row['data'] =$this->FinanceModel->f_gl_report($from_dt,$to_dt,$acc_cd);
				$row['data1']=$this->FinanceModel->f_opening_bal($from_dt,$acc_cd);
				$row['data2']=$this->FinanceModel->f_closing_bal($to_dt,$acc_cd);
				$row['data3']=array($from_dt,$to_dt,$acc_cd);
				$this->load->view('ledger_report',$row);
				$this->load->view('post_login/footer');
					
						
			}else{
				$this->load->view('post_login/finance_main');
				$data['row'] = $this->FinanceModel->f_get_acc();
				$this->load->view('date_acc',$data);
				$this->load->view('post_login/footer');
			}	
		}

	// code for stock Developed by lokesh 01/04/2020 ////	
		public function stock_report(){

			if($_SERVER['REQUEST_METHOD']=="POST"){
				
				$to_date	= $_POST['to_date'];
				$row['stocks']=$this->FertilizerModel->stockreport($to_date);

				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/stock',$row);
				$this->load->view('post_login/footer');
						
			}else{
				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/stock');
				$this->load->view('post_login/footer');
			}	
		}
	// code for stock Developed by lokesh 01/04/2020 ////	
		public function stock_reportcompanywise(){

			if($_SERVER['REQUEST_METHOD']=="POST"){
				
				$to_date	= $_POST['to_date'];
				$row['companies']=$this->FertilizerModel->f_select('mm_company_dtls',NULL,NULL,0);
				$row['stocks']=$this->FertilizerModel->stockreport($to_date);

				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/stock_comwise',$row);
				$this->load->view('post_login/footer');
						
			}else{
				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/stock_comwise');
				$this->load->view('post_login/footer');
			}	
		}
// code for Society Report Developed by lokesh 01/04/2020 ////	
      public function society_report(){

			if($_SERVER['REQUEST_METHOD']=="POST"){
				$where = array(
               "dist" => $this->input->post('branch_id')
				);
				
				$row['societies']=$this->FertilizerModel->f_select('md_society',NULL,$where,0);

				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/society',$row);
				$this->load->view('post_login/footer');
						
			}else{
				$row['districts']=$this->FertilizerModel->f_select('md_district',NULL,NULL,0);
				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/society',$row);
				$this->load->view('post_login/footer');
			}	
		}

	// code for Sale Report Developed by lokesh 02/04/2020 ////	
      public function sale_report(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

				 //Retriving CMR delivery Details
                $select     =   array(

               "a.do_dt", "a.qty", "a.tot_amt",

                "c.COMP_NAME", "b.PROD_DESC"

               );

             $where      =   array(

            "a.prod_id = b.PROD_ID"  => NULL,

            "b.COMPANY = c.COMP_ID"  => NULL,

                );
			$row['sales']=$this->FertilizerModel->f_select('td_sale a,mm_product b,mm_company_dtls c',$select,$where,0);

				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/sale_re',$row);
				$this->load->view('post_login/footer');
						
			}else{
			
				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/sale_re');
				$this->load->view('post_login/footer');
			}	
		}

        // code for Sale Districtwise Report Developed by lokesh 02/04/2020 ////	

		  public function sale_reportdis(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

				$where = array(
               
				);

				 //Retriving CMR delivery Details
                $select     =   array(

               "a.do_dt", "a.qty", "a.tot_amt",

                "c.COMP_NAME", "b.PROD_DESC"

               );

             $where      =   array(

            "a.prod_id = b.PROD_ID"  => NULL,

            "b.COMPANY = c.COMP_ID"  => NULL,

            "a.br_cd" => $this->input->post('branch_id')

                );
			$row['sales']=$this->FertilizerModel->f_select('td_sale a,mm_product b,mm_company_dtls c',$select,$where,0);

				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/sale_redis',$row);
				$this->load->view('post_login/footer');
						
			}else{
			$row['districts']=$this->FertilizerModel->f_select('md_district',NULL,NULL,0);
				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/sale_redis',$row);
				$this->load->view('post_login/footer');
			}	
		}	

	// code for Credit Note Districtwise Report Developed by lokesh 13/04/2020 ////	

		public function cr_reportdis(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

			$row['sales']=$this->FertilizerModel->get_crnote_dist_report($this->input->post('branch_id'));

				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/cr_redis',$row);
				$this->load->view('post_login/footer');
						
			}
			else{
			$row['districts']=$this->FertilizerModel->f_select('md_district',NULL,NULL,0);
				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/cr_redis',$row);
				$this->load->view('post_login/footer');
			}	
		}	
		public function cr_reportcomp(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

			$row['crnotes']=$this->FertilizerModel->get_crnote_comp_report($this->input->post('comp_id'));

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_recomp',$row);
			$this->load->view('post_login/footer');

			}
			else{
			$row['company']=$this->FertilizerModel->f_select('mm_company_dtls',NULL,NULL,0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_recomp',$row);
			$this->load->view('post_login/footer');
			}	
		}

		public function cr_reporremain(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

			$row['crnotes']=$this->FertilizerModel->get_crnote_comp_report($this->input->post('comp_id'));

			$row['reamts']=$this->FertilizerModel->get_crnote_remain_report($this->input->post('comp_id'));

			

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_reremain_amt',$row);
			$this->load->view('post_login/footer');

			}
			else{
			$row['company']=$this->FertilizerModel->f_select('mm_company_dtls',NULL,NULL,0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_reremain_amt',$row);
			$this->load->view('post_login/footer');
			}	


		}	
		public function f_trial(){
			if($_SERVER['REQUEST_METHOD']=="POST"){
				$report_date = $_POST['ip_date'];
				$this->load->view('post_login/finance_main');
				$row['data'] = $this->FinanceModel->f_trial_balance($report_date);
				$row['date'] = array($report_date);
				$this->load->view('trail',$row);
				$this->load->view('post_login/footer');
			}else{
				$this->load->view('post_login/finance_main');
				$this->load->view('ip_date');	
				$this->load->view('post_login/footer');
			}
		}

		public function f_cash_bk(){
			if($_SERVER['REQUEST_METHOD']=="POST"){
				$from_date = $_POST['start_dt'];
				$to_date   = $_POST['end_dt'];
				$this->load->view('post_login/finance_main');
				$row['data']=$this->FinanceModel->f_cash_book($from_date,$to_date);
				$row['op_bal']=$this->FinanceModel->f_opening_bal($from_date,$_SESSION['cash_code']);
				$row['cl_bal']=$this->FinanceModel->f_closing_bal($to_date,$_SESSION['cash_code']);
				$row['date']=array($from_date,$to_date);
				$this->load->view('cash_book',$row);
				$this->load->view('post_login/footer');
			}else{
				$this->load->view('post_login/finance_main');
				$this->load->view('cash_book_date');
				$this->load->view('post_login/footer');
			}
		}

		// Code for Debit Note Districtwise Report Developed by lokesh 16/04/2020 ////	

		public function dr_reportdis(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

			$row['sales']=$this->FertilizerModel->get_drdist_report($this->input->post('branch_id'));

				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/dr_redis',$row);
				$this->load->view('post_login/footer');
						
			}
			else{
			$row['districts']=$this->FertilizerModel->f_select('md_district',NULL,NULL,0);
				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/dr_redis',$row);
				$this->load->view('post_login/footer');
			}	
		}
		
		public function f_advdetails(){
			$ro     = $this->input->get('ro');
			$soc_id = $this->input->get('soc_id');
			$result = $this->Society_paymentModel->f_select('td_purchase',array('adv_status','advance_receipt_no'),array('ro_no'=>$ro),1);
			if($result->adv_status == 'Y'){
				$select = array('b.fo_no','b.qty','b.rate','b.amount','d.PROD_DESC as product');
				$where = array('a.detail_receipt_no = b.detail_receipt_no' => NULL,
							    'a.receipt_no = b.receipt_no' => NULL,
								'b.receipt_no = c.receipt_no'  => NULL,
								'c.soc_id = a.soc_id'  => NULL,
								'b.prod_id = d.PROD_ID'  => NULL,
								'a.fwd_receipt_no'     => $result->advance_receipt_no,
								'a.soc_id'             => $soc_id
			                  );
				$result = $this->Society_paymentModel->f_select('tdf_adv_fwd a,td_adv_details b,tdf_advance c,mm_product d',$select,$where,0);
				
                echo json_encode($result);
			}else{
				echo 0 ;
			}
		}

	public function soc_payment_fwd(){
		$br_cd          = $this->session->userdata['loggedin']['branch_id'];
		$fin_id         = $this->session->userdata['loggedin']['fin_id'];
		$this->sysdate  = $_SESSION['sys_date'];
		$to_date=$this->input->post('to_date');
		$from_date=$this->input->post('from_date');

		if($this->input->post()){
			$frmdt=$from_date;
			$todt=$to_date;
			$select = array('trans_dt','ro_no','fwd_no','sum(fwd_qty) fwd_qty','fwd_status','fin_yr');
			$where = array(
			               "branch_id"  => $this->session->userdata['loggedin']['branch_id'],
			               "trans_dt between '".$frmdt."' and '".$todt."' group by trans_dt,fwd_no,ro_no,fwd_status,fin_yr"=> NULL
						 );
			$data['cpfwds'] = $this->Society_paymentModel->f_select('tdf_payment_forward',$select,$where,0);
			$this->load->view("post_login/fertilizer_main");
			$this->load->view("society_payment/socpayfwd_dashboard",$data);
			$this->load->view('search/search');
			$this->load->view('post_login/footer');

		}else{
			$frmdt=date('Y-m-d');
			$todt=$frmdt;
			$select = array('trans_dt','fwd_no','ro_no','sum(fwd_qty) fwd_qty','fwd_status','fin_yr');
			$where = array(
			               "branch_id"  => $this->session->userdata['loggedin']['branch_id'],
			               "trans_dt between '".$frmdt."' and '".$todt."' group by trans_dt,fwd_no,ro_no,fwd_status,fin_yr"=> NULL
						 );
			$data['cpfwds'] = $this->Society_paymentModel->f_select('tdf_payment_forward',$select,$where,0);
			$this->load->view("post_login/fertilizer_main");
			$this->load->view("society_payment/socpayfwd_dashboard",$data);
			$this->load->view('search/search');
			$this->load->view('post_login/footer');
		}
			
	}
	

	public function f_rodetail(){
        $ro_no  = trim($this->input->get('ro_no'));
		$br     = $this->session->userdata['loggedin']['branch_id'];
		$select = array('a.adv_status','a.advance_receipt_no','b.COMP_NAME','c.PROD_DESC');
		$where  = array('a.comp_id = b.COMP_ID' => NULL,'a.prod_id = c.PROD_ID'=>NULL,'a.ro_no'=>$ro_no,'a.br'=>$br);
		$result = $this->Society_paymentModel->f_select('td_purchase a,mm_company_dtls b,mm_product c',$select,$where,1);
		echo json_encode($result);
	}
	public function f_advoffwd(){
		$ro_no  = trim($this->input->get('ro_no'));
			$select = array('a.adv_status','a.advance_receipt_no','b.COMP_NAME','c.PROD_DESC');
		    $where  = array('a.comp_id = b.COMP_ID' => NULL,'a.prod_id = c.PROD_DESC','a.ro_no'=>$ro_no);
		    $result = $this->Society_paymentModel->f_select('td_purchase a,mm_company_dtls b,mm_product c',$select,$where,1);
            if($result->adv_status == 'Y'){

				$select =array('c.adv_amt','a.fwd_receipt_no');
				$where = array('a.receipt_no = b.receipt_no' => NULL,
							'a.detail_receipt_no = b.detail_receipt_no' => NULL,
							'b.receipt_no = c.receipt_no' => NULL,
							'a.soc_id = c.soc_id' => NULL,
							'a.fwd_receipt_no' => ($result->advance_receipt_no)); 
				$result = $this->AdvanceModel->f_select('tdf_adv_fwd a,td_adv_details b,tdf_advance c',$select,$where,1); 
				echo json_encode($result);
			}else{
				echo '0';
			}	
	}
	public function get_paymentreceived_id(){
		$rono = $this->input->get('ro_no');
		$br     = $this->session->userdata['loggedin']['branch_id'];
		$sql = "SELECT distinct paid_id FROM tdf_payment_recv WHERE approval_status = 'U' AND ro_no = '".$rono."' AND  branch_id ='".$br."'";
		$data  = $this->db->query($sql)->result();
		echo json_encode($data);
	}
	public function paididdetail(){

		$paid_id  = trim($this->input->post('paid_id'));
		$select = array('a.sale_invoice_no','b.qty','c.soc_name','a.paid_qty');
		$where  = array('a.sale_invoice_no = b.trans_do' => NULL,'a.soc_id = c.soc_id'=>NULL,'a.paid_id'=>$paid_id);
		$result = $this->Society_paymentModel->f_select('tdf_payment_recv a,td_sale b,mm_ferti_soc c',$select,$where,1);
		echo json_encode($result);
	}
	public function advqty(){

	    $paid_id  = trim($this->input->post('paid_id'));
		$advfwd   = trim($this->input->post('advfwdid'));
		$result = $this->Society_paymentModel->f_select('tdf_payment_recv',array('soc_id'),array('paid_id'=>$paid_id),1);
		$select =array('b.qty');
		$where = array('a.receipt_no = b.receipt_no' => NULL,
		               'a.detail_receipt_no = b.detail_receipt_no' => NULL,
					   'b.receipt_no = c.receipt_no' => NULL,
					   'a.soc_id'    =>$result->soc_id,
					   'a.fwd_receipt_no' => $advfwd); 
		$data = $this->AdvanceModel->f_select('tdf_adv_fwd a,td_adv_details b,tdf_advance c',$select,$where,1); 
		if($data->qty > 0){
			echo json_encode($data);
		}else{
			echo json_encode('0');
		}
	}

	public function socpayfwdAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$cntrow    = count($this->input->post('paid_id'));
			$amt        = $this->input->post('amount');
			$fin_id         = $this->session->userdata['loggedin']['fin_id'];
			$select  = array('ifnull(max(fwd_no),0) fwd_no');
			$where   = array('fin_yr'=>$fin_id);
			$result = $this->Society_paymentModel->f_select('tdf_payment_forward',$select,$where,1);
			$fo_no  = ($result->fwd_no)+1;
			for($i=0; $i<$cntrow; $i++) {
					$data = array(
						'fwd_no'    => $fo_no,
						'trans_dt'  => $this->input->post('trans_dt'),
						'ro_no'     => trim($this->input->post('ro_no')),
						'fwd_date'  => date("Y-m-d"),
						'paid_id'   => $this->input->post('paid_id')[$i],
						'fwd_qty'   => $this->input->post('qty')[$i],
						'branch_id' => $this->session->userdata['loggedin']['branch_id'],
						'fin_yr'    => $fin_id,
						'created_by'=> $this->session->userdata['loggedin']['user_name'],
						'created_dt'=> date("Y-m-d h:i:s")
					);
				if($this->input->post('qty')[$i] > 0){
					$this->AdvanceModel->f_insert('tdf_payment_forward', $data);
					$this->AdvanceModel->f_edit('tdf_payment_recv',array('approval_status'=>'A'),array('paid_id'=>$this->input->post('paid_id')[$i]));
				}	
			}
			redirect('socpay/soc_payment_fwd');
		}else{
				$this->load->view("post_login/fertilizer_main");
				$this->load->view("society_payment/socpayfwdadd");
				$this->load->view('post_login/footer');
		}

	}
    public function socpayfwd_del(){

        $where  = array('paid_id'=> $this->input->get('id')); 
		$this->Society_paymentModel->f_edit('tdf_payment_recv',array('approval_status'=>'U'),$where);
		$this->Society_paymentModel->f_delete('tdf_payment_forward', $where) ;	
		redirect('socpay/soc_payment_fwd');	
	}
	public function soc_payfwd_edit(){

		$fwd_no = $this->input->get('fwd_no');
		$fin_yr = $this->input->get('fin_yr');
		$data['spfwd'] = $this->AdvanceModel->f_select('tdf_payment_forward',NULL,array('fwd_no'=>$fwd_no,'fin_yr'=>$fin_yr),1);
		$data['result'] = $this->Society_paymentModel->f_getfwdpaydetls($fwd_no);
		$this->load->view("post_login/fertilizer_main");
		$this->load->view("society_payment/socpayfwdedit",$data);
		$this->load->view('post_login/footer');
	}

	public function soc_payfwd_fwd(){
		$cntrow    = count($this->input->post('paid_id'));
		
		$purchase_data = $this->Society_paymentModel->f_select('td_purchase',array('comp_id','prod_id','rate','invoice_no'),array('ro_no'=>$this->input->post('ro_no')),1);
		for($i=0; $i<$cntrow; $i++) {
		$data       = array('pur_ro'     =>$this->input->post('ro_no'),
							'comp_id'    => $purchase_data->comp_id,
							'prod_id'    => $purchase_data->prod_id,
							'purchase_rt'=> $purchase_data->rate,
							'pur_inv_no' => $purchase_data->invoice_no,
							'sale_inv_no'=>$this->input->post('sale_invoice')[$i],
							'paid_id'    =>$this->input->post('paid_id')[$i],
							'paid_amt'   =>'0.00',
							'qty'        =>$this->input->post('qty')[$i],
							'district'   =>$this->session->userdata['loggedin']['branch_id'],
							'fin_yr'     => $this->session->userdata['loggedin']['fin_id']
						);
		$this->Society_paymentModel->f_insert('tdf_company_payment',$data);					
		$data_array = array('fwd_status' => 'A',
	                        'fwd_by' => $this->session->userdata['loggedin']['user_name'],
							'fwd_date' => date("Y-m-d h:i:s")
						    );
		$where = array('ro_no' => $this->input->post('ro_no'),
		               'paid_id'    =>$this->input->post('paid_id')[$i]);					
		$this->Society_paymentModel->f_edit('tdf_payment_forward',$data_array,$where);
		}
		redirect('socpay/soc_payment_fwd');
	}

	
	
}
?>
