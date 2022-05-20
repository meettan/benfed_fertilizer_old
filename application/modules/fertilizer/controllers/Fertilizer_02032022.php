<?php
	class Fertilizer extends MX_Controller{

		protected $sysdate;

		protected $kms_year;

		public function __construct(){

			parent::__construct();	

			$this->load->model('FertilizerModel');
			// $this->load->library('csvimport');
			$this->session->userdata('fin_yr');

			if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

            }
		}
		
		public function stock_report(){

			if($_SERVER['REQUEST_METHOD']=="POST"){
				
				$to_date	= $_POST['to_date'];
				$br_cd               = $this->session->userdata['loggedin']['branch_id'];
				$row['stocks']=$this->FertilizerModel->stockreport($to_date,$br_cd);

				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/stock',$row);
				$this->load->view('post_login/footer');
						
			}else{
				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/stock');
				$this->load->view('post_login/footer');
			}	
		}

		public function stock_ledg_report(){

			if($_SERVER['REQUEST_METHOD']=="POST"){
				
				$to_date	= $_POST['to_date'];
				$br_cd               = $this->session->userdata['loggedin']['branch_id'];
				$row['stocks']=$this->FertilizerModel->stockledgreport($to_date,$br_cd);

				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/stock_ledg',$row);
				$this->load->view('post_login/footer');
						
			}else{
				$this->load->view('post_login/fertilizer_main');
				$this->load->view('report/stock_ledg');
				$this->load->view('post_login/footer');
			}	
		}
/****************************************************Society Master************************************ */

//Dashboard
public function soceity(){

	$select	=	array("soc_id","soc_name");

	$where  =	array("district" => $this->session->userdata['loggedin']['branch_id']);

	$bank['data']    = $this->FertilizerModel->f_select('mm_ferti_soc',$select,$where,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("soceity/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}



public function f_get_pan_cnt(){

	$select          = array("count(*)cnt");
	
   $where=array(
	   "pan" =>$this->input->get("pan")
	   ) ;
	   
	$pan    = $this->FertilizerModel->f_select(' mm_ferti_soc',$select,$where,0);
	// echo $this->db->last_query();
	// die();
	echo json_encode($pan);

}

// Add Soceity

public function soceityAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

			$soc_id 	 = $this->FertilizerModel->get_soceity_code();
			
			$stock_point = $this->input->post('stock_point_flag');

			$buffer		 = $this->input->post('buffer_flag');

			$data_array = array (

					"soc_id" 			=> $soc_id,
			
					"soc_name" 			=> $this->input->post('soc_name'),

					"soc_add"   		=> $this->input->post('soc_add'),

					"gstin"				=> $this->input->post('gstin'),

					"mfms" 				=> $this->input->post('mfms'),

					"district"  		=> $this->session->userdata['loggedin']['branch_id'],
					
					"ph_no"    			=> $this->input->post('ph_no'),

					"email" 			=> $this->input->post('email'),

					"pan"               =>  $this->input->post('pan'),
				
					"stock_point_flag"  => $this->input->post('stock_point_flag'),

					"buffer_flag"    	=> $this->input->post('buffer_flag'),
		   
					"status"          	=> $this->input->post('status'),
					
					"created_by"    	=> $this->session->userdata['loggedin']['user_name'],    

					"created_dt"    	=>  date('Y-m-d h:i:s')
				);

				$this->FertilizerModel->f_insert('mm_ferti_soc', $data_array);
	
				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('customer');

			}else {

				$select          		= array("district_code","district_name");

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

				"soc_id"     			=>  $this->input->post('soc_id'),

				"soc_name"   			=>  $this->input->post('soc_name'),

				"soc_add"    			=>  $this->input->post('soc_add'),

				"gstin"					=> $this->input->post('gstin'),

				"mfms" 					=> $this->input->post('mfms'),
				
				"email"         		=>  $this->input->post('email'),

				"pan"                   => $this->input->post('pan'),

				"ph_no"        			=>  $this->input->post('ph_no'),
				 
				"stock_point_flag"      =>  $this->input->post('stock_point_flag'),
 
				"buffer_flag"      		=>  $this->input->post('buffer_flag'),

				"status"   				=>  $this->input->post('status'),

				"modified_by"  			=>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  			=>  date('Y-m-d h:i:s')	
			);

		$where = array(
				"soc_id" => $this->input->post('soc_id')
		);
		 

		$this->FertilizerModel->f_edit('mm_ferti_soc', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('customer');

	}else{
			$select = array(
						"soc_id",

						"soc_name",

						"soc_add",
					
						"gstin",
					
						"mfms",
					
						"district",
					
						"email",

						"pan" ,
					
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

//*********************************************Unit Master*********************************************************/

//Dashboard
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

		$data_array = array (

				"unit_name" 	=> $this->input->post('unit_name'),
			
				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);
			
			$this->FertilizerModel->f_insert('mm_unit', $data_array);
				
			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('measurement');
	}else 
	
		{
					
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("unit/add");

			$this->load->view('post_login/footer');
	}
}
		
//Edit Unit		
public function editunit(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"id"     		=>  $this->input->post('id'),

				"unit_name"    =>  $this->input->post('unit_name'),

				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
		);

		$where = array(
				"id" => $this->input->post('id')
		);
			

		$this->FertilizerModel->f_edit('mm_unit', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('measurement');

	}else

	{
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
		
/***********************Company Master***************************************/

//Dashboard
public function company(){

	$select         = array("comp_id","comp_name","comp_add","gst_no");

	$bank['data']   = $this->FertilizerModel->f_select('mm_company_dtls',$select,NULL,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("company/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

//Add New Company
public function companyAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		    $comp_id 	= $this->FertilizerModel->get_company_code();
			
			$data_array = array (

					"comp_id" 			=> $comp_id,
			
					"comp_name" 		=> $this->input->post('comp_name'),

					"short_name" 		=> $this->input->post('short_name'),
					
					"comp_add"   		=> $this->input->post('comp_add'),

					"comp_email_id" 	=> $this->input->post('comp_email_id'),

					"comp_pn_no"    	=> $this->input->post('comp_pn_no'),
					
					"pan_no"    		=> $this->input->post('pan_no'),

					"gst_no" 			=> $this->input->post('gst_no'),

					"mfms"				=> $this->input->post('mfms'),

					"cin"				=> $this->input->post('cin'),
				
					"created_by"    	=>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"    	=>  date('Y-m-d h:i:s')
				);
			 
				$this->FertilizerModel->f_insert('mm_company_dtls', $data_array);
				 
				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('source');
	}else 
		{
					
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("company/add");

			$this->load->view('post_login/footer');
	}
}

//Edit Company
public function editcompany(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"comp_id"     		=>  $this->input->post('comp_id'),

				"comp_name"   		=>  $this->input->post('comp_name'),

				"short_name"  		=>  $this->input->post('short_name'),

				"comp_add"    		=>  $this->input->post('comp_add'),

				"comp_email_id" 	=>  $this->input->post('comp_email_id'),

				"comp_pn_no"  	 	=>  $this->input->post('comp_pn_no'),
				 
				"gst_no"      		=>  $this->input->post('gst_no'),

				"mfms" 				=>  $this->input->post('mfms'),

				"pan_no"    		=>  $this->input->post('pan_no'),

				"cin" 				=>  $this->input->post('cin'),

				"modified_by"  		=>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  		=>  date('Y-m-d h:i:s')
		);

		$where = array(
				"comp_id" => $this->input->post('comp_id')
		);
		 

		$this->FertilizerModel->f_edit('mm_company_dtls', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('source');

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

/*************************************************Product Master*********************************************** */

//Dashboard
public function product(){
	$select 		= array("a.prod_id","a.prod_desc","a.prod_type","a.gst_rt","a.qty_per_bag","b.short_name");
	$where = array(
		
		"a.COMPANY=b.COMP_ID
				 
				ORDER BY  a.prod_desc " => NULL
		
);
	$bank['data']   = $this->FertilizerModel->f_select('mm_product a,mm_company_dtls b',$select,$where,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("product/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

//Add New Product		
public function productAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

				$prod_id   = $this->FertilizerModel->get_product_code();

				$data_array = array (

						"prod_id"    			=> $prod_id,
				
						"prod_desc"   			=> $this->input->post('prod_desc'),

						"prod_type"   			=> $this->input->post('prod_type'),

						"mat_state"   			=> $this->input->post('mat_state'),

						'company'     			=> $this->input->post('comp_id'),

						"gst_rt"       			=> $this->input->post('gst_rt'),

						"hsn_code"     			=> $this->input->post('hsn_code'),

						"qty_per_bag"  			=> $this->input->post('bag'),

						"unit"  				=> $this->input->post('unit'),

						"storage"  				=> $this->input->post('storage'),

						"created_by"   	 		=>  $this->session->userdata['loggedin']['user_name'],

						"created_dt"    		=>  date('Y-m-d h:i:s')
					);
				 
				$this->FertilizerModel->f_insert('mm_product', $data_array);
				
				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('material');
		}else {

				$select          		= array("comp_id","comp_name");

				$product['compdtls']    = $this->FertilizerModel->f_select('mm_company_dtls',$select,NULL,0);

				$select1          		= array("id","unit_name");

				$product['unitdtls']    = $this->FertilizerModel->f_select('mm_unit',$select1,NULL,0);
				
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
				
				"prod_type"   =>  $this->input->post('prod_type'),

				"mat_state"   =>  $this->input->post('mat_state'),

				"gst_rt"      =>  $this->input->post('gst_rt'),

				"hsn_code"    =>  $this->input->post('hsn_code'),

				"qty_per_bag" =>  $this->input->post('bag'),

				"unit"  	  => $this->input->post('unit'),

				"storage"  	  => $this->input->post('storage'),
			   
				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
		);

		$where = array(
				"prod_id" => $this->input->post('prod_id')
		);
		 

		$this->FertilizerModel->f_edit('mm_product', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('material');

	}else{
			$select = array(

					"a.prod_id",

					"a.company",

					"a.prod_desc",
					
					"a.prod_type" ,

					"a.mat_state" ,
					
					"a.gst_rt",
					
					"a.hsn_code"  ,
					
					"a.qty_per_bag",
					
					"b.comp_name",
					
					"a.storage",

					"a.unit"
				);

			$where = array(
				"a.prod_id" => $this->input->get('prod_id'),

				"a.company=b.comp_id"=>NULL

				);

			$product['schdtls'] = $this->FertilizerModel->f_select("mm_product a,mm_company_dtls b",$select,$where,1);

			// echo $this->db->last_query();
			// exit;

			$select          		= array("comp_id","comp_name");

			$product['compdtls']    = $this->FertilizerModel->f_select('mm_company_dtls',$select,NULL,0);

			$select1          		= array("id","unit_name");

			$product['unitdtls']    = $this->FertilizerModel->f_select('mm_unit',$select1,NULL,0);

		
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("product/edit",$product);

			$this->load->view("post_login/footer");
	}
}

/*
public function sale_rate(){
	$select = array("a.district","d.district_name","a.frm_dt","a.to_dt","a.rate","b.comp_name","a.comp_id","c.prod_desc","a.prod_id");

	$where      =   array(

		"a.comp_id = b.comp_id"  => NULL,
		"a.prod_id= c.prod_id"=>NULL,
	    "a.district=d.district_code"=>NULL	);
		   
		// $ro   = $this->FertilizerModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
	$bank['data']   = $this->FertilizerModel->f_select('mm_sale_rate a,mm_company_dtls b,mm_product c,md_district d',$select,$where,0);
//   echo $this->db->last_query();
// / die();
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
			// $prod_desc = $this->input->post('prod_desc');
			// $prod_type = $this->input->post('prod_type');
			// $gst_rt    = $this->input->post('gst_rt');
			// $hsn_code  = $this->input->post('hsn_code');
			// $unit      = $this->input->post('unit');
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
				// echo $this->db->last_query();
				// die();
				$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('fertilizer/sale_rate');
			}else {
				$select1          = array("comp_id","comp_name");
				$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);
				
				$select2          = array("prod_id","prod_desc");
				$product['proddtls']   = $this->FertilizerModel->f_select('mm_product',$select2,NULL,0);
				// echo $this->db->last_query();
				// die();
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
		  $this->db->last_query();
		  die();
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
		// echo $this->db->last_query();
		// die();
		// $sch['unitdtls'] = $this->FertilizerModel->f_select("mm_unit a,mm_product b",$select1,$where1,1);		
		// echo $this->db->last_query();
		// die();

		$this->load->view('post_login/fertilizer_main');

		$this->load->view("sale_rate/edit",$sch);

		$this->load->view("post_login/footer");
	}
}*/

/*************************************************Category Master*********************************************** */

//Dashboard
public function category(){


	$select = array(

					"a.*",

					"b.COMP_NAME"
				);

			$where = array(

				"a.comp_id=b.COMP_ID"=>NULL

				);

	$cate['data'] = $this->FertilizerModel->f_select("mm_category a,mm_company_dtls b",$select,$where,0);

	//$cate['data']   = $this->FertilizerModel->f_select('mm_category',NULL,NULL,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("category/dashboard",$cate);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

//Add New Product		
public function categoryAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

				$prod_id   = $this->FertilizerModel->get_product_code();

				$data_array = array (
				
						"comp_id"   			=> $this->input->post('comp_id'),

						"cate_desc"   			=> $this->input->post('cate_desc'),

						"created_by"   	 		=>  $this->session->userdata['loggedin']['user_name'],

						"created_dt"    		=>  date('Y-m-d h:i:s')
					);
				 
				$this->FertilizerModel->f_insert('mm_category', $data_array);
				
				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('category');
		}else {

				$select          		= array("comp_id","comp_name");

				$product['compdtls']    = $this->FertilizerModel->f_select('mm_company_dtls',$select,NULL,0);
				
				$this->load->view('post_login/fertilizer_main');

				$this->load->view("category/add",$product);

				$this->load->view('post_login/footer');
		}
}

//Edit Product
public function categoryedit(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"comp_id"   			=> $this->input->post('comp_id'),

				"cate_desc"   			=> $this->input->post('cate_desc'),
			   
				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
		);

		$where = array(
				"sl_no" => $this->input->post('sl_no')
		);
		 

		$this->FertilizerModel->f_edit('mm_category', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('category');

	}else{
			

			$where = array(
				"sl_no" => $this->input->get('sl_no')
				);

			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_category",NULL,$where,1);

			$select          		= array("comp_id","comp_name");

			$sch['compdtls']    = $this->FertilizerModel->f_select('mm_company_dtls',$select,NULL,0);
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("category/edit",$sch);

			$this->load->view("post_login/footer");
	}
}

/*************************************************Sale Rate Master*********************************************** */

//Dashboard
public function sale_rate(){

	$select     = array("a.bulk_id","a.fin_id","a.frm_dt","a.to_dt","a.comp_id","b.comp_name","a.catg_id","c.cate_desc","a.prod_id","d.prod_desc","a.mrp_gst","a.sale_rtgst","a.sp_bag_gst");
	
	$where 		= array(

		"a.comp_id = b.COMP_ID" =>  NULL,

		"a.catg_id = c.sl_no"   =>  NULL,

		"a.prod_id = d.PROD_ID" =>  NULL,

		"a.fin_id"	            => $this->session->userdata['loggedin']['fin_id']
	
	);
	
	$data['ratedtls']   = $this->FertilizerModel->f_select_distinct('mm_sale_rate a,mm_company_dtls b,mm_category c,mm_product d',$select,$where,0);
// echo $this->db->last_query();
// die();
	$this->load->view("post_login/fertilizer_main");

	$this->load->view("sale_rate/dashboard",$data);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');

}


public function f_get_prod_per_bag(){
	$select = array("qty_per_bag");
	$where = array(
		"prod_id" => $this->input->get('prod_id')
		);

	$result = $this->FertilizerModel->f_select('mm_product',$select,$where,0);	
	
	 echo json_encode($result);

} 

public function f_get_product(){

			$where = array(
				"COMPANY" => $this->input->get('comp_id')
				);
		
			$result = $this->FertilizerModel->f_select('mm_product',NULL,$where,0);	
			
 			echo json_encode($result);

} 
public function f_get_category(){

			$where = array(
				"comp_id" => $this->input->get('comp_id')
				);
		
			$result = $this->FertilizerModel->f_select('mm_category',NULL,$where,0);	
			// echo $this->db->last_query();
			// die();
			
 			echo json_encode($result);

} 

public function f_get_unit(){

	$where = array(
		"a.unit = b.id" => NULL,
		"a.prod_id" => $this->input->get('prod_id')
		);

	$select = array(
		"a.unit","b.unit_name","a.storage"
	);   

	$result = $this->FertilizerModel->f_select('mm_product a,mm_unit b',$select,$where,0);	
	// echo $this->db->last_query();
	// 		die();
	 echo json_encode($result);

} 

//Add sale rate
public function salerateAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		   $prod_id    = $this->input->post('prod_id');
		   $comp_id    = $this->input->post('comp_id');
		   $district   = $this->input->post('district');
		   $unit       = $this->input->post('unit');
		   $catg_id    = $this->input->post('catg_id');
		   $sp_mt      = $this->input->post('sp_mt');
		   $sp_bag     = $this->input->post('sp_bag');
		   $sp_govt    = $this->input->post('sp_govt');
		   $mrp_gst    = $this->input->post('mrp_gst');
		   $sale_rtgst = $this->input->post('sale_rtgst');
		   $sp_bag_gst = $this->input->post('sp_bag_gst');
		   $frm_dt     = $this->input->post('frm_dt');
		   $to_dt      = $this->input->post('to_dt');

		   $fin_id	   = $this->session->userdata['loggedin']['fin_id'];

		   $bulk_id    = $this->FertilizerModel->f_max_id($fin_id);
		
           for ($i = 0;$i < count($district); $i++){
			
			$data_array = array (
					"bulk_id" => $bulk_id,
					
					"fin_id"  => $fin_id,

					"prod_id" => $prod_id,
			
					"comp_id" => $comp_id,
                   
					"catg_id" => $catg_id,

					"district" => $district[$i],

					"unit"     => $unit,

					"sp_mt"    =>  $sp_mt,

					"sp_bag"   =>  $sp_bag,

					"sp_govt"  =>  $sp_govt,

					"mrp_gst"  =>  $mrp_gst ,

					"sale_rtgst"=> $sale_rtgst,

					"sp_bag_gst"=>$sp_bag_gst ,

					"frm_dt"   =>  $frm_dt,

					"to_dt"     =>  $to_dt,

					"created_by" =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt" =>  date('Y-m-d h:i:s'));
			 
				$this->FertilizerModel->f_insert('mm_sale_rate', $data_array);
				
                }
				$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('fertilizer/sale_rate');
			}else {
				$select1               = array("comp_id","comp_name");
				$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);
				
				$select2               = array("prod_id","prod_desc");
				$product['proddtls']   = $this->FertilizerModel->f_select('mm_product',$select2,NULL,0);
				
			
				$product['distdtls']   = $this->FertilizerModel->f_select('md_district',NULL,NULL,0);
				$product['unit']   = $this->FertilizerModel->f_select('mm_unit',NULL,NULL,0);

	$this->load->view('post_login/fertilizer_main');

	$this->load->view("sale_rate/add",$product);

	$this->load->view('post_login/footer');
}
}

public function editsalerate(){

	$fin_id	   = $this->session->userdata['loggedin']['fin_id'];

	
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$data_array = array(

			    //"bulk_id"    =>  $this->input->post('bulk_id'),

				//"prod_id"  =>  $this->input->post('prod_id'),			/**Changed By Tan 18.03.21 */

				//"comp_id"  =>  $this->input->post('comp_id'),

				 "unit"        =>  $this->input->post('unit'),
				
				 "sp_mt"      =>  $this->input->post('sp_mt'),

				 "sp_bag"     =>  $this->input->post('sp_bag'),

				 "sp_govt"    =>  $this->input->post('sp_govt'),

				 "mrp_gst"    =>  $this->input->post('mrp_gst'),

				 "sale_rtgst" =>  $this->input->post('sale_rtgst'),

				 "sp_bag_gst" =>  $this->input->post('sp_bag_gst'),

				"fin_id"      =>  $fin_id,

				"frm_dt"      =>  $this->input->post('frm_dt'),

				"to_dt"       =>  $this->input->post('to_dt'),
			   
				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
		);

		$where = array("fin_id" => $fin_id,

		             "bulk_id"   => $this->input->post('bulk_id')		
		);
		 

		$this->FertilizerModel->f_edit('mm_sale_rate', $data_array, $where);

		    //  echo $this->db->last_query();
			//  exit();
		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('fertilizer/sale_rate');

	}else{
			$select = array("a.bulk_id",
			
							"a.prod_id",

							"a.comp_id",

							"a.fin_id",

							"a.catg_id",

							"a.unit" ,
                           
							"a.frm_dt",

							"a.to_dt"  ,

							"a.sp_mt",
							
							"a.sp_bag",
							
							"a.sp_govt",

							"a.mrp_gst",

							"a.sale_rtgst",

							"a.sp_bag_gst",

							"b.prod_desc",

							"c.comp_name" ,

							"e.cate_desc" );

			$where = array("a.bulk_id"            => $this->input->get('bulk_id'),

							"a.fin_id"            => $fin_id,

							"a.prod_id=b.prod_id"  => NULL,

							"a.comp_id=c.comp_id"  => NULL,

							"a.catg_id=e.sl_no"     => NULL,

						    "a.unit=f.id"           =>NULL);
		
			
		$wheres = array("comp_id"=> $this->input->get('comp_id')	);

		$sch['schdtls']   = $this->FertilizerModel->f_select_distinct("mm_sale_rate a,mm_product b,mm_company_dtls c,md_district d,mm_category e, mm_unit f",$select,$where,1);

		// echo $this->db->last_query();
		// die();
		$sch['dist']      = $this->FertilizerModel->f_district($this->input->get('bulk_id'),$fin_id);

		$select_cat          = array("sl_no","cate_desc");

		$sch['cat_names'] = $this->FertilizerModel->f_select("mm_category",$select_cat,$wheres,0);

		// echo $this->db->last_query();
		// die();

		$sch['distdtls']  = $this->FertilizerModel->f_select('md_district',NULL,NULL,0);
		$sch['unit']  = $this->FertilizerModel->f_select('mm_unit',NULL,NULL,0);
		$select1          = array("comp_id","comp_name");
		$sch['compdtls']  = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);

		// $sch['catg']  = $this->FertilizerModel->f_select('mm_category',$select1,NULL,0);
		$this->load->view('post_login/fertilizer_main');

		$this->load->view("sale_rate/edit",$sch);

		$this->load->view("post_login/footer");
	}
}

public function deletesalerate(){


	$fin_id	   = $this->session->userdata['loggedin']['fin_id'];
	 $where    = array(  "bulk_id"  =>  $this->input->get('bulk_id'),
                     "fin_id"    => $fin_id	 );
	
        $this->FertilizerModel->f_delete('mm_sale_rate', $where);        
        $this->session->set_flashdata('msg', 'Successfully Deleted!');

       redirect('fertilizer/sale_rate');

	}

//*********************************************Credit Note Category Master*********************************************************/

//Dashboard
	public function cr_note_catg(){
		$select         = array("sl_no","cat_desc");

		$bank['data']   = $this->FertilizerModel->f_select('mm_cr_note_category',$select,NULL,0);

		$this->load->view("post_login/fertilizer_main");

		$this->load->view("credit_note_catg/dashboard",$bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

	//Add Unit
	public function crNoteCatgAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array (

					"cat_desc" 		=> $this->input->post('catg_name'),
				
					"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"    =>  date('Y-m-d h:i:s')
				);
				
				$this->FertilizerModel->f_insert('mm_cr_note_category', $data_array);
					
				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('crCatg');
		}else 
		
			{
						
				$this->load->view('post_login/fertilizer_main');

				$this->load->view("credit_note_catg/add");

				$this->load->view('post_login/footer');
		}
	}
			
	//Edit Unit		
	public function editcrNoteCatg(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

					"sl_no"        =>  $this->input->post('sl_no'),

					"cat_desc"     =>  $this->input->post('cat_desc'),

					"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

					"modified_dt"  =>  date('Y-m-d h:i:s')
			);

			$where = array(
					"sl_no" => $this->input->post('sl_no')
			);
				

			$this->FertilizerModel->f_edit('mm_cr_note_category', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('crCatg');

		}else

		{
				$select = array(
						"sl_no",

						"cat_desc"                           
				);

				$where = array(

					"sl_no" => $this->input->get('id')

					);

				$sch['schdtls'] = $this->FertilizerModel->f_select("mm_cr_note_category",$select,$where,1);
																																
				$this->load->view('post_login/fertilizer_main');

				$this->load->view("credit_note_catg/edit",$sch);

				$this->load->view("post_login/footer");
		}
	}

	/****************************************************Society Master************************************ */

	//Dashboard
	public function bank(){

		$select	=	array("sl_no","bank_name","ac_no","ifsc");

		$where  =	array("dist_cd" => $this->session->userdata['loggedin']['branch_id']);

		$bank['data']    = $this->FertilizerModel->f_select('mm_feri_bank',$select,$where,0);

		$this->load->view("post_login/fertilizer_main");

		$this->load->view("bank/dashboard",$bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}



// Add bank

	public function bankAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

				$data_array = array (
				
						"bank_name" 		=> $this->input->post('bank_name'),

						"branch_name"   	=> $this->input->post('branch_name'),

						"ac_no"				=> $this->input->post('bank_ac'),

						"ifsc" 				=> $this->input->post('ifs'),

						"dist_cd"  			=> $this->session->userdata['loggedin']['branch_id'],
						
						"created_by"    	=> $this->session->userdata['loggedin']['user_name'],    

						"created_dt"    	=>  date('Y-m-d h:i:s')
					);

					$this->FertilizerModel->f_insert('mm_feri_bank', $data_array);
		
					$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('BNK');

				}else {
						
					$this->load->view('post_login/fertilizer_main');

					$this->load->view("bank/add");

					$this->load->view('post_login/footer');
				}
	}

	function load_data()
	{
		// console.log('raja');
		$result = $this->csv_import_model->select();
		$output = '
		 <h4 align="center">Imported Details Of CSV File</h4>
        <div class="table-responsive">
		<font face="Courier New" ><table class="table table-bordered table-striped">
        		<tr>
        			
        			<th>dist</th>
        			<th>soc</th>
        			<th>ro_no</th>
					<th>inv_no</th>
					<th>inv_dt</th>
					<th>prod</th>
					<th>qty</th>
					<th>amt</th>
					
					

        		</tr>
		';
		$count = 0;
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$count = $count + 1;
				$output .= '
				<tr>
					
					<td>'.$row->dist.'</td>
        			<td>'.$row->soc.'</td>
        			<td>'.$row->ro_no.'</td>
					<td>'.$row->inv_no.'</td>
					<td>'.$row->inv_dt.'</td>
					<td>'.$row->prod.'</td>
					<td>'.$row->qty.'</td>
					<td>'.$row->amt.'</td>

				</tr>
				';
			}
		}
		else
		{
			$output .= '
			<tr>
	    		<td colspan="18" align="left">Data not Available</td>
	    	</tr>
			';
		}
		$output .= '</table></font></div>';
		echo $output;
	}

	// function import()
	// {
	// 	$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	// 	foreach($file_data as $row)
	// 	{
	// 		$data[] = array(
	// 			'dist'	       =>	$row["dist"],
    //     		'soc'		    =>	$row["soc"],
    //     		'ro_no'			=>	$row["ro_no"],
	// 			'inv_no'	    =>	$row["inv_no"],
	// 			'inv_dt'	    =>	$row["inv_dt"],
	// 			'prod'			 =>	$row["prod"],
	// 			'qty'			=>	$row["qty"],
	// 			'amt'			=>	$row["amt"]



	// 		);
	// 	}
	// 	$this->csv_import_model->insert($data);
	// }
	
		

	//Edit Bank
	public function editbank(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

					"bank_name"   			=>  $this->input->post('bank_name'),

					"branch_name"    		=>  $this->input->post('branch_name'),

					"ac_no"					=> $this->input->post('bank_ac'),

					"ifsc" 					=> $this->input->post('ifs'),

					"modified_by"  			=>  $this->session->userdata['loggedin']['user_name'],

					"modified_dt"  			=>  date('Y-m-d h:i:s')	
				);

			$where = array(
					"sl_no" => $this->input->post('bank_id')
			);
			

			$this->FertilizerModel->f_edit('mm_feri_bank', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('BNK');

		}else{
				$select = array(
							"sl_no",

							"bank_name",

							"branch_name",
						
							"ac_no",
						
							"ifsc"                             
					);

				$where = array(

					"sl_no" => $this->input->get('id')
					
					);

			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_feri_bank",$select,$where,1);
																																
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("bank/edit",$sch);

			$this->load->view("post_login/footer");
		}
	}

}
?>
