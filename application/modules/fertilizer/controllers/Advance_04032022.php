<?php
	class Advance extends MX_Controller{

		protected $sysdate;

		protected $fin_year;

		public function __construct(){

			parent::__construct();	

			$this->load->model('AdvanceModel');
			
			$this->session->userdata('fin_yr');

			if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

            }
		}
		

/****************************************************Advance Dashboard************************************ */
//Company Advance dashoard
public function company_advance(){

    $select	=	array("a.trans_dt","a.receipt_no","a.comp_id","a.trans_type","b.comp_name");

	$where  =	array(
        "a.comp_id=b.comp_id"   => NULL,

       

        "fin_yr"              => $this->session->userdata['loggedin']['fin_id'],
    
    );

	$adv['data']    = $this->AdvanceModel->f_select("tdf_company_advance  a,mm_company_dtls b",$select,$where,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("company_advance/dashboard",$adv);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

//Company Advance add
public function company_advAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

            $branch         = $this->session->userdata['loggedin']['branch_id'];

            $finYr          = $this->session->userdata['loggedin']['fin_id'];

            $fin_year       = $this->session->userdata['loggedin']['fin_yr'];

            $select         = array(
                "dist_sort_code"
            );

            $where          = array(
                "district_code"     =>  $branch
            );

            $brn            = $this->AdvanceModel->f_select("md_district",$select,$where,1);  

            $transCd 	    = $this->AdvanceModel->f_get_comp_advance_code($branch,$finYr);

            $receipt        = 'CompAdv/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$transCd->sl_no;

		//  echo ($receipt);
		//  die();
			$data_array = array (

                    "trans_dt" 			=> $this->input->post('trans_dt'),

                    "sl_no" 			=> $transCd->sl_no,
                    
                    "receipt_no"        => $receipt,

                    "fin_yr"            => $finYr,

                    "branch_id"  		=> $branch,

                    "comp_id"            => $this->input->post('company'),

					"trans_type"   		=> $this->input->post('trans_type'),

					"adv_amt"			=> $this->input->post('adv_amt'),

					"remarks" 			=> $this->input->post('remarks'),

					"created_by"    	=> $this->session->userdata['loggedin']['user_name'],    

					"created_dt"    	=>  date('Y-m-d h:i:s')
				);

				$this->AdvanceModel->f_insert('tdf_company_advance', $data_array);
				//  echo $this->db->last_query();
				//  die();
				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('adv/company_advance');

			}else {

                $select          		= array("comp_id","comp_name");
                
                // $where                  = array(
                //     "district"  =>  $this->session->userdata['loggedin']['branch_id']
                // );

				// $society['societyDtls']   = $this->AdvanceModel->f_select('mm_ferti_soc',$select,$where,0);
				$society['compDtls']   = $this->AdvanceModel->f_select('mm_company_dtls',$select,NULL,0);	
				$this->load->view('post_login/fertilizer_main');

				$this->load->view("company_advance/add",$society);

				$this->load->view('post_login/footer');
			}
}
//Company Advance Edit
public function company_editadv(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"trans_dt"              => $this->input->post('trans_dt'),

				"comp_id"   			    => $this->input->post('company'),

				"trans_type"    		=>  $this->input->post('trans_type'),

				"adv_amt"				=> $this->input->post('adv_amt'),

				"remarks" 				=> $this->input->post('remarks'),
				
				"modified_by"  			=>  $this->session->userdata['loggedin']['user_name'],
               
				"modified_dt"  			=>  date('Y-m-d h:i:s')	
			);

		$where = array(
            "receipt_no"     		    =>  $this->input->post('receipt_no')
		);
		 

		$this->AdvanceModel->f_edit('tdf_company_advance', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('adv/company_advance');

	}else{
			$select = array(
						"trans_dt",

						"receipt_no",

						"comp_id",
					
						"trans_type",
					
						"adv_amt",
					
						"remarks"                          
				);

			$where = array(

				"receipt_no" => $this->input->get('rcpt')
				
                );
                
            $select1          		= array("comp_id","comp_name");
            
            // $where1                 = array(
            //     "district"  =>  $this->session->userdata['loggedin']['branch_id']
            // );       

            $data['advDtls']        = $this->AdvanceModel->f_select("tdf_company_advance",$select,$where,1);

            $data['societyDtls']    = $this->AdvanceModel->f_select("mm_company_dtls",$select1,NULL,0);
                                                                         
            $this->load->view('post_login/fertilizer_main');

            $this->load->view("company_advance/edit",$data);

            $this->load->view("post_login/footer");
	}
}
//Company Advance Delete
public function company_advDel(){
			
    $where = array(
        
        "receipt_no"    =>  $this->input->get('receipt_no')
    );

    $this->session->set_flashdata('msg', 'Successfully Deleted!');

    $this->AdvanceModel->f_delete('tdf_company_advance', $where);

    redirect("adv/company_advance");
}	


//Socity Advace Dashboard
public function advance(){

    $select	=	array("a.trans_dt","a.receipt_no","a.soc_id","a.trans_type","b.soc_name","a.adv_amt");

	$where  =	array(
        "a.soc_id=b.soc_id"   => NULL,

        "district"            => $this->session->userdata['loggedin']['branch_id'],

        "fin_yr"              => $this->session->userdata['loggedin']['fin_id'],
    
    );

	$adv['data']    = $this->AdvanceModel->f_select("tdf_advance a,mm_ferti_soc b",$select,$where,0);
// echo $this->db->last_query();
// die();
	$this->load->view("post_login/fertilizer_main");

	$this->load->view("advance/dashboard",$adv);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

public function advance_radio(){
	$id=$this->input->get('id');
	$select	=	array("a.trans_dt","a.receipt_no","a.soc_id","a.trans_type","b.soc_name","a.adv_amt");
	$trans_type = $id == '1' ? 'I' : ($id == '2' ? 'O' : '');
	if($id > 0){
		$where  =	array(
			"a.soc_id=b.soc_id"   => NULL,
	
			"district"            => $this->session->userdata['loggedin']['branch_id'],
	
			"fin_yr"              => $this->session->userdata['loggedin']['fin_id'],

			"trans_type" => $trans_type
		);
	}else{
		$where  =	array(
			"a.soc_id=b.soc_id"   => NULL,
	
			"district"            => $this->session->userdata['loggedin']['branch_id'],
	
			"fin_yr"              => $this->session->userdata['loggedin']['fin_id'],
		);
	}
	

	$data    = $this->AdvanceModel->f_select("tdf_advance a,mm_ferti_soc b",$select,$where,0);
	echo  json_encode($data);
 //echo $this->db->last_query();
	// $this->load->view("post_login/fertilizer_main");

	// $this->load->view("advance/dashboard",$data);

	// $this->load->view('search/search');

	// $this->load->view('post_login/footer');

}
public function socadvReport()
{
	$receipt_no = $this->input->get('receipt_no');
	$adv['data']    = $this->AdvanceModel->f_get_receiptReport_dtls($receipt_no);
	
	$adv['receipt_no'] = $receipt_no;
	
	$this->load->view("post_login/fertilizer_main");

	$this->load->view('report/adv_receipt', $adv);

	$this->load->view('post_login/footer');
	
}
// Add Advance
public function advAdd(){
	$branch         = $this->session->userdata['loggedin']['branch_id'];
	
	$finYr          = $this->session->userdata['loggedin']['fin_id'];

	$fin_year       = $this->session->userdata['loggedin']['fin_yr'];

	
	

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$soc_id=$this->input->post('society');
        // echo $soc_id;
		// exit;    

            $select         = array(
                "dist_sort_code"
            );

            $where          = array(
                "district_code"     =>  $branch
            );

            $brn            = $this->AdvanceModel->f_select("md_district",$select,$where,1);  

            $transCd 	    = $this->AdvanceModel->get_advance_code($branch,$finYr);

            $receipt        = 'Adv/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$transCd->sl_no;

            if($this->input->post('cshbank')==1){
		$select_bnkacc         = array("acc_code"
		);
		$where_bnkacc          = array(
			"sl_no"     => $this->input->post('bank_id')
		);
	$bnk_acc = $this->AdvanceModel->f_select("mm_feri_bank",$select_bnkacc,$where_bnkacc,1);
	// echo $this->db->last_query();
	// exit;
	}


	     $select_adv         = array( "adv_acc"
		);

		$where_adv          = array(
			"district"     =>  $branch
		);

		$adv_acc= $this->AdvanceModel->f_select("mm_ferti_soc",$select_adv,$where_adv,1);

// $data_bnkacc=array("acc_code"=> $bnk_acc);
			$data_array = array (
                  

                    "trans_dt" 			=> $this->input->post('trans_dt'),

                    "sl_no" 			=> $transCd->sl_no,
                    
                    "receipt_no"        => $receipt,

                    "fin_yr"            => $finYr,

                    "branch_id"  		=> $branch,

                    "soc_id"            => $this->input->post('society'),

				   "cshbnk_flag"        => $this->input->post('cshbank'),

					"trans_type"   		=> $this->input->post('trans_type'),

					"adv_amt"			=> $this->input->post('adv_amt'),

					"bank"              => $this->input->post('bank_id'),

					"remarks" 			=> $this->input->post('remarks'),

					"created_by"    	=> $this->session->userdata['loggedin']['user_name'],    

					"created_dt"    	=>  date('Y-m-d h:i:s')
				);
				
				echo '<pre>';
				
				$this->AdvanceModel->f_insert('tdf_advance', $data_array);
				$data_array_fin=$data_array;
				$data_array_fin['acc_code'] = $bnk_acc->acc_code; 
				$data_array_fin['adv_acc'] = $adv_acc->adv_acc; 

				$select_soc         = array("soc_name");
		        $where_soc           = array("soc_id"     => $soc_id);
	            $soc_name = $this->AdvanceModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);
				// echo $this->db->last_query();
				// exit;
				$data_array_fin['rem'] ="Advance Received From ".$soc_name->soc_name;
				$select_br    = array("dist_sort_code");
				$where_br     = array("district_code"=> $branch );
				// $br_nm=$this->AdvanceModel->f_select('md_district',$select_br,$where_br,1);

				
				$data_array_fin['fin_fulyr']=$fin_year;
				$data_array_fin['br_nm']= $brn->dist_sort_code;
				// array_push($data_array_fin, $bnk_acc );
				// echo $data_array_fin[0]->acc_code;
				// print_r($data_array_fin);
				// exit;

				$this->AdvanceModel->f_advjnl( $data_array_fin);	
				
				$this->session->set_flashdata('msg', 'Successfully Added');

			  redirect('adv/advance');

			}else {

                $select          		= array("soc_id","soc_name");
                
                $where                  = array(
                    "district"  =>  $this->session->userdata['loggedin']['branch_id']
);

				$society['societyDtls'] = $this->AdvanceModel->f_select('mm_ferti_soc',$select,$where,0);

				$society['bnk_dtls']    = $this->AdvanceModel->f_getbnk_dtl($branch);	

				$this->load->view('post_login/fertilizer_main');

				$this->load->view("advance/add",$society);

				$this->load->view('post_login/footer');
			}
}

//Edit Soceity
public function editadv(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"trans_dt"              => $this->input->post('trans_dt'),

				"soc_id"   			    => $this->input->post('society'),

				"cshbnk_flag"        => $this->input->post('cshbank'),

				"trans_type"    		=>  $this->input->post('trans_type'),

				"adv_amt"				=> $this->input->post('adv_amt'),

				"bank"                  => $this->input->post('bank'),

				"remarks" 				=> $this->input->post('remarks'),
				
				"modifed_by"  			=>  $this->session->userdata['loggedin']['user_name'],
               
				"modifed_dt"  			=>  date('Y-m-d h:i:s')	
			);

		$where = array(
            "receipt_no"     		    =>  $this->input->post('receipt_no')
		);
		 

		$this->AdvanceModel->f_edit('tdf_advance', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('adv/advance');

	}else{
			$select = array(
						"trans_dt",

						"receipt_no",

						"soc_id",
					
						"trans_type",

					    "cshbnk_flag",
						
						"adv_amt",

						"bank",
						
						"remarks"                          
				);

			$where = array(

				"receipt_no" => $this->input->get('rcpt')
				
                );
			$select2          		= array("sl_no","bank_name");
			$where2                 = array(
                "dist_cd"  =>  $this->session->userdata['loggedin']['branch_id']
            );    
            $select1          		= array("soc_id","soc_name");
            
            $where1                 = array(
                "district"  =>  $this->session->userdata['loggedin']['branch_id']
            );       

			// $data['advDtls']        = $this->AdvanceModel->f_select("tdf_advance",$select,$where,1);
			$data['advDtls']        = $this->AdvanceModel->f_get_adv_dtls($this->input->get('rcpt'));

			$data['societyDtls']    = $this->AdvanceModel->f_select("mm_ferti_soc",$select1,$where1,0);
			
			$data['bnk_dtls']    = $this->AdvanceModel->f_select("mm_feri_bank",$select2,$where2,0);  
				//   echo $this->db->last_query();
				  
				//   die();
            $this->load->view('post_login/fertilizer_main');

            $this->load->view("advance/edit",$data);

            $this->load->view("post_login/footer");
	}
}
public function f_get_dist_bnk_dtls(){
			
	$select          = array("ifsc","ac_no","acc_code");
	$where=array(
		"sl_no" =>$this->input->get("bnk_id")) ;
		
	//  $comp    = $this->Society_paymentModel->f_select('mm_dist_bank',$select,$where,0);
	$bnk    = $this->AdvanceModel->f_select('mm_feri_bank',$select,$where,0);
//  echo $this->db->last_query();
// 			die();
	 echo json_encode($bnk);
 
 }
//Delete
public function advDel(){
			
    $where = array(
        
        "receipt_no"    =>  $this->input->get('receipt_no')
    );

    $this->session->set_flashdata('msg', 'Successfully Deleted!');

    $this->AdvanceModel->f_delete('tdf_advance', $where);

    redirect("adv/advance");
}	

}
?>