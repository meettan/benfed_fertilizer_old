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

        "fin_yr"              => $this->session->userdata['loggedin']['fin_id']
    );

	$adv['data']    = $this->AdvanceModel->f_select("tdf_company_advance  a,mm_company_dtls b",$select,$where,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("company_advance/dashboard",$adv);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

//Company Advance add
public function company_advAddlist(){
   $dist= $this->AdvanceModel->f_select('tdf_advance' ,array('branch_id'),array('receipt_no'=>$this->input->post('receipt_no')),1);
   $dis=$dist->branch_id;
   
    if($dis==$this->input->post('branch_id')){
		$select = array('a.receipt_no','a.detail_receipt_no','a.amount','b.COMP_NAME','c.PROD_DESC','a.branch_id');
		$where = array(
					'a.comp_id = b.COMP_ID' =>NULL, 
					'a.prod_id = C.prod_id' =>NULL, 
					'a.receipt_no'    => $this->input->post('receipt_no'),
					'a.comp_pay_flag' => 'N',
					'a.comp_id'=>$this->input->post('comp_id')
					);
		$list  = $this->AdvanceModel->f_select("td_adv_details a,mm_company_dtls b,mm_product c",$select,$where,0);
		echo json_encode($list);
	}else{
         echo 0;
	}
}


public function company_advAddlistedit(){
	$rcno=$this->AdvanceModel->f_select('tdf_company_advance' ,array('adv_dtl_id'),array('receipt_no'=>$this->input->post('receipt_no')),1);
	// print_r($rcno->adv_dtl_id);
	// exit();
	$dist= $this->AdvanceModel->f_select('tdf_advance' ,array('branch_id'),array('receipt_no'=>$rcno->adv_dtl_id),1);
	$dis=$dist->branch_id;
	
	 if($dis==$this->input->post('branch_id')){
		 $select = array('a.receipt_no','a.detail_receipt_no','a.amount','b.COMP_NAME','c.PROD_DESC','a.branch_id');
		 $where = array(
					 'a.comp_id = b.COMP_ID' =>NULL, 
					 'a.prod_id = C.prod_id' =>NULL, 
					 'a.receipt_no'    => $rcno->adv_dtl_id,
					 'a.comp_pay_flag' => 'Y',
					 'a.comp_id'=>$this->input->post('comp_id')
					 );
		 $list  = $this->AdvanceModel->f_select("td_adv_details a,mm_company_dtls b,mm_product c",$select,$where,0);
		//  echo $this->db->last_query();
		//  exit();
		 echo json_encode($list);
	 }else{
		  echo 0;
	 }
 }

public function company_advdetail(){

	$where = array('receipt_no' => $this->input->post('receipt_no'),'comp_pay_flag' => 'Y');
	$paidamt  = $this->AdvanceModel->f_select("td_adv_details",array('ifnull(sum(amount),0) amount'),$where,1);
	$totadv  = $this->AdvanceModel->f_select("tdf_advance",array('adv_amt'),array('receipt_no'=> $this->input->post('receipt_no')),1);

	$data['totadv'] = $totadv->adv_amt;
	$data['totpaid'] = $paidamt->amount;

    echo json_encode($data);

}


public function company_advdetailedite(){
	$rcno=$this->AdvanceModel->f_select('tdf_company_advance' ,array('adv_dtl_id'),array('receipt_no'=>$this->input->post('receipt_no')),1);

	
	$where = array('receipt_no' => $rcno->adv_dtl_id,'comp_pay_flag' => 'Y');
	$paidamt  = $this->AdvanceModel->f_select("td_adv_details",array('ifnull(sum(amount),0) amount'),$where,1);
	$totadv  = $this->AdvanceModel->f_select("tdf_advance",array('adv_amt'),array('receipt_no'=> $rcno->adv_dtl_id),1);

	$data['totadv'] = $totadv->adv_amt;
	$data['totpaid'] = $paidamt->amount;

    echo json_encode($data);

}
public function company_advAdd(){

				$branch 		= $this->session->userdata['loggedin']['branch_id'];

				$finYr          = $this->session->userdata['loggedin']['fin_id'];
	
				$fin_year       = $this->session->userdata['loggedin']['fin_yr'];

				$select         = array("dist_sort_code");
				$where          = array("district_code"     =>  $branch);

                 $brn           = $this->AdvanceModel->f_select("md_district",$select,$where,1); 

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
			$adv_receive_no = $this->input->post('adv_receive_no');
            //for($i = 0; $i < count($adv_receive_no);$i++){
			foreach ( $_POST['ckamt'] as $key )
			{
					
			$data_array = array (

                    "trans_dt" 			=> $this->input->post('trans_dt'),

                    "sl_no" 			=> $transCd->sl_no,
                    
                    "receipt_no"        => $receipt,

					"adv_receive_no"    => $key['list'],

					'adv_dtl_id'       => $this->input->post('receipt_no'),

                    "fin_yr"            => $finYr,

                    "branch_id"  		=> $branch,

                    "comp_id"            => $this->input->post('company'),

				//	"branch_id"               => $this->input->post('dist'),

					"bank"               => $this->input->post('bank'),

					"trans_type"   		=> $this->input->post('trans_type'),

					"adv_amt"			=> $this->input->post('p_tot'),
					'cr_head'           => $this->input->post('cr_head'),

					"remarks" 			=> $this->input->post('remarks'),

					"created_by"    	=> $this->session->userdata['loggedin']['user_name'],    

					"created_dt"    	=>  date('Y-m-d h:i:s')
				);

				$this->AdvanceModel->f_insert('tdf_company_advance', $data_array);

				$data_array_comp=$data_array;
				$select_comp         		= array("COMP_NAME","adv_acc");
		        $where_comp            		= array("COMP_ID"     => $this->input->post('company'));
	            $comp_dtls 					= $this->AdvanceModel->f_select("mm_company_dtls",$select_comp,$where_comp,1);

				$select_bank                = array("acc_code");
		        $where_bank          		= array("sl_no" => $this->input->post('bank'));
	            $bank_dtls 					= $this->AdvanceModel->f_select("mm_feri_bank",$select_bank,$where_bank,1);
				
				$data_array_comp['rem'] 	= "Advance Paid To ".$comp_dtls->COMP_NAME;
				$select_br    				= array("dist_sort_code");
				$where_br     				= array("district_code"=> $branch );

				$data_array_comp['acc_cd']   = $comp_dtls->adv_acc;
				$data_array_comp['bank_acc'] = $bank_dtls->acc_code;				
				$data_array_comp['fin_fulyr']= $fin_year;
				$data_array_comp['br_nm']    = $brn->dist_sort_code;
                 
				$this->AdvanceModel->f_compadvjnl($data_array_comp);

				$this->AdvanceModel->f_edit('td_adv_details', array('comp_pay_flag'=>'Y'),array('detail_receipt_no'=>$key['list'] ) );
				
			}
				$this->session->set_flashdata('msg', 'Successfully Added');

				 redirect('adv/company_advance');

			}else {

                $select          	   = array("comp_id","comp_name");
				$society['compDtls']   = $this->AdvanceModel->f_select('mm_company_dtls',$select,NULL,0);

				$select_dist           = array("district_code","district_name");	
				$society['distDtls']   = $this->AdvanceModel->f_select('md_district',$select_dist,NULL,0);

				$select_bank           = array("sl_no","bank_name");	
				$where_bank            = array("dist_cd"     => '342');
				$society['bankDtls']   = $this->AdvanceModel->f_select('mm_feri_bank',$select_bank,$where_bank,0);
				$society['acc_head']   = $this->AdvanceModel->f_sselect('md_achead',NULL,NULL,0);

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

				"comp_id"   			=> $this->input->post('company'),

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
			// $select = array(
			// 			"trans_dt",

			// 			"receipt_no",

			// 			"comp_id",
					
			// 			"trans_type",
					
			// 			"adv_amt",
					
			// 			"remarks"                          
			// 	);

			// $where = array(

			// 	"receipt_no" => $this->input->get('rcpt')
				
            //     );
                
            // $select1          		= array("comp_id","comp_name");
            
            // // $where1                 = array(
            // //     "district"  =>  $this->session->userdata['loggedin']['branch_id']
            // // );       

            // $data['advDtls']        = $this->AdvanceModel->f_select("tdf_company_advance",$select,$where,1);

            // $data['societyDtls']    = $this->AdvanceModel->f_select("mm_company_dtls",$select1,NULL,0);

			
			$rcpt=$this->input->get('rcpt');
			
			$data['pageData']=$this->AdvanceModel->getBranchId($rcpt);
			$data['rcpt']=$rcpt;                                                        
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

public function advancefilter(){
	$br_cd      = $this->session->userdata['loggedin']['branch_id'];
	$fin_id     = $this->session->userdata['loggedin']['fin_id'];
	if($_SERVER['REQUEST_METHOD'] == "POST") {
	$frmdt      = $this->input->post('from_date');
	$todt       = $this->input->post('to_date');
	
	$select	=	array("a.trans_dt","a.receipt_no","a.soc_id","a.trans_type","b.soc_name","a.adv_amt","a.forward_flag forward_flag");

	$where  =	array(
        "a.soc_id=b.soc_id"   => NULL,

        "district"            => $this->session->userdata['loggedin']['branch_id'],

        "fin_yr"              => $this->session->userdata['loggedin']['fin_id'],
		"a.trans_type='I'"   => NULL,
		"a.trans_dt between '$frmdt ' and '$todt'"=> NULL,



    );

	$adv['data']    = $this->AdvanceModel->f_select("tdf_advance a,mm_ferti_soc b",$select,$where,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("advance/dashboard",$adv);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
	}else{

		$select	=	array("a.trans_dt","a.receipt_no","a.soc_id","a.trans_type","b.soc_name","a.adv_amt","a.forward_flag forward_flag");

	$where  =	array(
        "a.soc_id=b.soc_id"   => NULL,

        "district"            => $this->session->userdata['loggedin']['branch_id'],

        "fin_yr"              => $this->session->userdata['loggedin']['fin_id'],
		"a.trans_type='I'"   => NULL,
		"a.trans_dt between '".date("Y-m-d")."' and '".date("Y-m-d")."'"=> NULL,



    );

		$adv['data']    = $this->AdvanceModel->f_select("tdf_advance a,mm_ferti_soc b",$select,$where,0);
		// print_r($adv['data']);
		//  echo $this->db->last_query();
		//  exit();

		$this->load->view("post_login/fertilizer_main");

		$this->load->view("advance/dashboard",$adv);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}
// echo $this->db->last_query();
// exit();

}

public function f_adv_forward() {

	$data=explode (",", $this->input->get('receipt_no'));
	// $ro_no    = $data["0"];
	// $comp_id  = $data["1"];
	// $prod_id  = $data["2"];
	// $rate     = $data["3"];
	// $pur_inv  = $data["4"];
	// $sale_qty = $data["5"];
	$receipt_no = $data["0"];
	$br_cd=$this->session->userdata['loggedin']['branch_id'];

	$this->AdvanceModel->f_upd_adv($receipt_no);
	
		echo "<script>
			alert('Customer Advance data forwarded successfully');
			window.location.href='advance';
			</script>";

}

//Socity Advace Dashboard
public function advance(){
$date = date("d-m-Y");
     $select	=	array("a.trans_dt","a.receipt_no","a.soc_id","a.trans_type","b.soc_name","a.adv_amt","a.forward_flag forward_flag");

	$where  =	array(
        "a.soc_id=b.soc_id"  => NULL,
        "district"           => $this->session->userdata['loggedin']['branch_id'],
        "fin_yr"             => $this->session->userdata['loggedin']['fin_id'],
		"a.trans_type='I'"   => NULL,
		"a.trans_dt='$date'" => NULL,
		"forward_flag='N'"   => NULL,
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
			"district"     =>  $branch,
			"soc_id"     => $this->input->post('society')
		);

		$adv_acc= $this->AdvanceModel->f_select("mm_ferti_soc",$select_adv,$where_adv,1);

// $data_bnkacc=array("acc_code"=> $bnk_acc);
$bbranch=$this->input->post('bank_id');
if(empty($bbranch)){
$branchid=0;
}else{
	$branchid=$bbranch;
}
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

					"bank"              => $branchid,

					"remarks" 			=> $this->input->post('remarks'),

					"created_by"    	=> $this->session->userdata['loggedin']['user_name'],    

					"created_dt"    	=>  date('Y-m-d h:i:s')
				);
				
				//echo '<pre>';
				
				$this->AdvanceModel->f_insert('tdf_advance', $data_array);
				// echo $this->db->last_query();
				// exit();
				$data_array_fin=$data_array;
				$data_array_fin['acc_code'] = $bnk_acc->acc_code; 
				$data_array_fin['adv_acc'] = $adv_acc->adv_acc; 

				$select_soc         = array("soc_name");
		        $where_soc           = array("soc_id"     => $soc_id);
	            $soc_name = $this->AdvanceModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);
				
				$data_array_fin['rem'] ="Advance Received From ".$soc_name->soc_name.','.$this->input->post('remarks');
				$select_br    = array("dist_sort_code");
				$where_br     = array("district_code"=> $branch );
								
				$data_array_fin['fin_fulyr']=$fin_year;
				$data_array_fin['br_nm']= $brn->dist_sort_code;
				
				$this->AdvanceModel->f_advjnl( $data_array_fin);	
				
				$this->session->set_flashdata('msg', 'Successfully Added');

			  redirect('adv/advancefilter');

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

				// "trans_dt"              => $this->input->post('trans_dt'),

				// "soc_id"   			    => $this->input->post('society'),

				//"cshbnk_flag"        => $this->input->post('cshbank'),

				// "trans_type"    		=>  $this->input->post('trans_type'),

				// "adv_amt"				=> $this->input->post('adv_amt'),

				// "bank"                  => $this->input->post('bank'),

				"remarks" 				=> $this->input->post('remarks'),
				
				"modifed_by"  			=>  $this->session->userdata['loggedin']['user_name'],
               
				"modifed_dt"  			=>  date('Y-m-d h:i:s')	
			);

		$where = array(
            "receipt_no"     		    =>  $this->input->post('receipt_no')
		);
		 

		$this->AdvanceModel->f_edit('tdf_advance', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('adv/advancefilter');

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
			// if($this->AdvanceModel->get_advance($this->input->get('rcpt'))){
				
			// }
			$data['advDtls']        = $this->AdvanceModel->f_get_adv_dtls($this->input->get('rcpt'));

			$data['societyDtls']    = $this->AdvanceModel->f_select("mm_ferti_soc",$select1,$where1,0);
			
			$data['bnk_dtls']    = $this->AdvanceModel->f_select("mm_feri_bank",$select2,$where2,0);  
			$selectcompany         = array("comp_id","comp_name");
			$data['compdtls']   = $this->AdvanceModel->f_select('mm_company_dtls',$selectcompany,NULL,0);
            $this->load->view('post_login/fertilizer_main');

            $this->load->view("advance/edit",$data);

            $this->load->view("post_login/footer");
	}
}

public function add_advdetail(){

        $branch         = $this->session->userdata['loggedin']['branch_id'];
	    $finYr          = $this->session->userdata['loggedin']['fin_id'];
	    $fin_year       = $this->session->userdata['loggedin']['fin_yr'];

	    $select         = array("dist_sort_code");
        $where          = array("district_code"     =>  $branch);
	    $brn            = $this->AdvanceModel->f_select("md_district",$select,$where,1);

	    if($_SERVER['REQUEST_METHOD'] == "POST") {
            
			$comp_id  = $this->input->post('comp_id');
			$prod_id  = $this->input->post('prod_id');
			$fo_no    = $this->input->post('fo_no');
			$ro_no    = $this->input->post('ro_no');
			$amount   = $this->input->post('amount');
            $tot_amt =array_sum($amount);
            for($i=0;$i < count($amount);$i++){
                $maxid = $this->AdvanceModel->f_select('td_adv_details',array("ifnull(max(id),0)+1 as id"),array("fin_yr"=>$finYr),1);
            	$comp  = $this->AdvanceModel->f_select("mm_company_dtls",array("short_name"),array("COMP_ID"=>$comp_id[$i]),1);

            	$data = array( 
            	    'id'         => $maxid->id,
            		'trans_dt'   => date('Y-m-d'),
            		'receipt_no' => $this->input->post('receipt_no'),
            		'detail_receipt_no' =>'Adv/'.$comp->short_name.'/'.$brn->dist_sort_code.'/'.$maxid->id,
            		'comp_id'=> $comp_id[$i],
            		'prod_id'=> $prod_id[$i],
            		'fo_no'=> $fo_no[$i],
            		'ro_no'=> $ro_no[$i],
            		'amount'=> $amount[$i],
            		'branch_id' => $branch,
            		'fin_yr'    => $finYr,
            		'created_by' => $this->session->userdata['loggedin']['user_name'],
            		'created_dt' => date('Y-m-d h:i:s')
            	);

            	$this->db->insert('td_adv_details',$data);
            }

            if($this->input->post('detail_receipt_no')){

	            $detail_receipt_no  = $this->input->post('detail_receipt_no');
				$efo_no  = $this->input->post('efo_no');
				$ero_no  = $this->input->post('ero_no');
				$eamount = $this->input->post('eamount');

				for($i=0;$i < count($eamount);$i++){

					$data = array(
            		'fo_no'=> $efo_no[$i],
            		'ro_no'=> $ero_no[$i],
            		'amount'=> $eamount[$i],
            		'modified_by' => $this->session->userdata['loggedin']['user_name'],
            		'modified_dt' => date('Y-m-d h:i:s')
            	   );
					$where = array('detail_receipt_no' => $detail_receipt_no[$i],'fin_yr' => $finYr);
					$this->AdvanceModel->f_edit('td_adv_details',$data,$where);
				}

            }

			$this->session->set_flashdata('msg', 'Successfully Added');
		    redirect('adv/add_advdetail?rcpt='.$this->input->post('receipt_no'));

		}else {

            $select    = array("receipt_no");
            $where     = array('branch_id'  => $branch,'fin_yr' => $finYr);
			$data['receipts'] = $this->AdvanceModel->f_select('tdf_advance',$select,$where,0);
			$selectcompany         = array("comp_id","comp_name");
			$data['compdtls']   = $this->AdvanceModel->f_select('mm_company_dtls',$selectcompany,NULL,0);
			$receipt_no     = $this->input->get('rcpt'); 
			$branch         = $this->session->userdata['loggedin']['branch_id'];
			$finYr          = $this->session->userdata['loggedin']['fin_id'];
		    $selectavd   = array('a.*','b.soc_name');
		    $whereadv    = array('a.soc_id = b.soc_id' => NULL,
		    				  'a.receipt_no'    =>  $receipt_no,
		    				  'a.branch_id'     =>  $branch,
		    				  'a.fin_yr'        =>  $finYr
		                      );

	    $data['advdtl'] = $this->AdvanceModel->f_select('tdf_advance a,mm_ferti_soc b',$selectavd,$whereadv,1);
	    $selectall   = array('a.detail_receipt_no','a.comp_id','a.prod_id','a.fo_no','a.ro_no','a.amount','b.PROD_DESC');
        $whereall    = array('a.prod_id =b.PROD_ID' => NULL,'a.receipt_no'    =>  $receipt_no,
    				         'a.fin_yr'        =>  $finYr);

	    $data['allocate'] = $this->AdvanceModel->f_select('td_adv_details a,mm_product b',$selectall,$whereall,0);

		$this->load->view('post_login/fertilizer_main');
		$this->load->view("advance/addadv_detail",$data);
		$this->load->view('post_login/footer');
		}

}

public function advDel(){
			
    $where = array(
        
        "receipt_no"    =>  $this->input->get('receipt_no')
    );

    $this->session->set_flashdata('msg', 'Successfully Deleted!');

    $this->AdvanceModel->f_delete('tdf_advance', $where);

    redirect("adv/advance");
}	

public function f_get_receipt_no_dtls(){

	$receipt_no     = $this->input->get('receipt_no');
	$branch         = $this->session->userdata['loggedin']['branch_id'];
	$finYr          = $this->session->userdata['loggedin']['fin_id'];
    $select   = array('a.*','b.soc_name');
    $where    = array('a.soc_id = b.soc_id' => NULL,
    				  'a.receipt_no'    =>  $receipt_no,
    				  'a.branch_id'     =>  $branch,
    				  'a.fin_yr'        =>  $finYr
                      );

	$data      = $this->AdvanceModel->f_select('tdf_advance a,mm_ferti_soc b',$select,$where,1);
	echo json_encode($data);

}
public function f_get_allocted_amt(){
  
    $receipt_no     = $this->input->get('receipt_no');
	$finYr          = $this->session->userdata['loggedin']['fin_id'];
    $select   = array('IFNULL(sum(amount),0) as amt');
    $where    = array('receipt_no'    =>  $receipt_no,
    				  'fin_yr'        =>  $finYr);

	$data      = $this->AdvanceModel->f_select('td_adv_details',$select,$where,1);
	echo json_encode($data);


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
	public function advdetailDel(){
		$rcpt= $this->input->get('rcpt');
		//exit();
				
	    $where = array(
	        
	        "detail_receipt_no"  =>  $this->input->get('receipt_no'),
	        'fin_yr'             =>  $this->session->userdata['loggedin']['fin_id']
	    );

	    $this->session->set_flashdata('msg', 'Successfully Deleted!');

	    $this->AdvanceModel->f_delete('td_adv_details', $where);

	    redirect("adv/add_advdetail?rcpt=".$rcpt);
	}

	public function get_receiptbydist(){
		$finYr          = $this->session->userdata['loggedin']['fin_id'];
		

		$dist_id= $this->input->get('dist');
		$c_id= $this->input->get('c_id');

	    $data   = $this->AdvanceModel->get_recep_no($c_id,$dist_id);

	    echo json_encode($data);
	}

	

}
?>