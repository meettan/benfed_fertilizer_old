<?php
	class Sale extends MX_Controller{
		protected $sysdate;
		protected $kms_year;
		public function __construct(){
		parent::__construct();	
		$this->load->model('SaleModel');
		// $this->load->helper('paddyrate_helper');
		// $data       = $this->FertilizerModel->f_get_particulars_in('md_parameters', array(16, 17), array(""));

		// $this->kms_year   = substr($data[0]->param_value, 0,4).'-'.substr($data[1]->param_value, 2,2);
		$this->session->userdata('fin_yr');

		    if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

            }
		}
		
//Getting Product name and stock quantity on supplying RO
		public function js_get_stock_qty()
		{

			$ro = $this->input->get('ro');
		
			$result = $this->SaleModel->js_get_stock_qty($ro);		
			//echo $this->db->last_query();
			//die();
 			echo json_encode($result);

		}

		public function js_get_stock_point(){

			$ro = $this->input->get('ro');
			$dist_id = $this->session->userdata['loggedin']['branch_id'];
		
			$result = $this->SaleModel->js_get_stock_point($ro);
			
 			echo json_encode($result);


		}
///Getting the sale category with district,company,supplied ro date and product
		public function get_sale_rate(){


			$ro = $this->input->get('ro');
			$comp_id = $this->input->get('comp_id');

			 $where  =   array(

					'comp_id'     => $this->input->get('comp_id'),

					'ro_no'      =>  $this->input->get('ro')

				);

			$select = array("ro_dt","prod_id");

			$ros        = $this->SaleModel->f_select('td_purchase',$select,$where,1);
		    
            $ro_dt      = $ros->ro_dt;
            $prod_id    = $ros->prod_id;
            $br_cd      = $this->session->userdata['loggedin']['branch_id'];

            $result = $this->SaleModel->js_get_sale_rate($br_cd,$comp_id,$ro_dt,$prod_id);		
			
 			echo json_encode($result);

		} 
		public function get_salerate(){

			
			$ro = $this->input->get('ro');

			// echo $ro;
			// die();
			$comp_id = $this->input->get('comp_id');
			$category = $this->input->get('sale_category');

			 $where  =   array(

					'comp_id'     => $this->input->get('comp_id'),

					'ro_no'      =>  $this->input->get('ro')

				);

			$select = array("ro_dt","prod_id");

			$ros        = $this->SaleModel->f_select('td_purchase',$select,$where,1);
		    // echo $this->db->last_query();
			// die();
            $ro_dt      = $ros->ro_dt;
            $prod_id    = $ros->prod_id;
            $br_cd      = $this->session->userdata['loggedin']['branch_id'];

            $result = $this->SaleModel->get_sale_rate($br_cd,$comp_id,$ro_dt,$prod_id,$category);		
			// echo $this->db->last_query();
			// die();
 			echo json_encode($result);

		} 

		public function get_govsalert(){

			$ro = $this->input->get('ro');
			$comp_id = $this->input->get('comp_id');
			$category = $this->input->get('sale_category');
			$gov_sale_rt = $this->input->get('sale_category');

			 $where  =   array(

					'comp_id'     => $this->input->get('comp_id'),

					'ro_no'      =>  $this->input->get('ro')

				);

			$select = array("ro_dt","prod_id");

			$ros        = $this->SaleModel->f_select('td_purchase',$select,$where,1);
		    
            $ro_dt      = $ros->ro_dt;
            $prod_id    = $ros->prod_id;
            $br_cd      = $this->session->userdata['loggedin']['branch_id'];

            $result = $this->SaleModel->get_govsale_rate($br_cd,$comp_id,$ro_dt,$prod_id,$category,$gov_sale_rt);		
			// echo $this->db->last_query();
			// die();
 			echo json_encode($result);


		}
		
		public function api_call()
		{
			$trans_do = $this->input->get('trans_do');
			$api_query= $this->SaleModel->f_get_api_data($trans_do);
			echo json_encode($api_query);
		}

		public function saleinvoice_rep()
		{
			$trans_do = $this->input->get('trans_do');
// echo $trans_do;
// die();
			$sale_rep['data'] = $this->SaleModel->f_get_receiptReport_dtls($trans_do);

			$sale_rep['sum_data'] = $this->SaleModel->f_get_saleinv_tot($trans_do);
			// echo $this->db->last_query();
			// die();
			$sale_rep['trans_do'] = $trans_do;
		 
			$this->load->view("post_login/fertilizer_main");
		
			$this->load->view('report/sale_invoice',$sale_rep);
		
			$this->load->view('post_login/footer');
			
		}

		
/*public function saleAdd(){   //================================================
	
	$br_cd             = $this->session->userdata['loggedin']['branch_id'];
	$dist_sort_code    = $this->session->userdata['loggedin']['dist_sort_code'];
	$fin_year_sort_code= substr($this->session->userdata['loggedin']['fin_yr'],2);
	$fin_id            = $this->session->userdata['loggedin']['fin_id'];
	$trans_no          = $this->SaleModel->get_trans_no($fin_id,$br_cd);
	$month             =date('m');
	// echo $fin_id ;
	// exit;
    $j=0;
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		
		
			$prod_id     = $this->input->post('prod_id');

			$soc_id      = $_POST['soc_id'];
			
			$stock_point = $this->input->post('stock_point');

			$catg_id     = $this->input->post('catg_id');

			$gov_sale_rt = $this->input->post('gov_sale_rt');

			$qty         = $this->input->post('qty');

			$sale_rt     = $this->input->post('sale_rt');
				
			$taxable_amt = $this->input->post('taxable_amt');

			$cgst        = $this->input->post('cgst');

			$sgst        = $this->input->post('sgst');

			$tot_amt     = $this->input->post('tot_amt');

			$round_tot_amt = $this->input->post('round_tot_amt');

			$br_cd       = $this->session->userdata['loggedin']['branch_name'];
			// echo ($prod_id);
			//    die();
			$comp_id        = $this->input->post('comp_id');
			$select_comp    = array("short_name" );
			$where_comp     = array("comp_id" =>$comp_id   );
			$comp_short_name = $this->SaleModel->f_select('mm_company_dtls ',$select_comp,$where_comp,1);
			
			for($i = 0; $i < count($soc_id); $i++){
				$j=$i+1;
				$trans_no->trans_no + $i;
			    $data     = array(// 'trans_do'     =>  'INV/'.$dist_sort_code.'/'.$comp_short_name->short_name.'/'.$month.'/'.$fin_year_sort_code.'/'. $trans_no->trans_no,
									'trans_do'     =>  'INV/'.$dist_sort_code.'/'.$comp_short_name->short_name.'/'.$month.'/'.$fin_year_sort_code.'/'. $trans_no->trans_no.'_'.$j,

									'trans_no'     =>  $trans_no->trans_no ,
									
                                    'do_dt'        => $this->input->post('ro_dt'),

									'sale_due_dt'  => $this->input->post('sale_due_dt'),
									
									'no_of_days'   => $this->input->post('no_of_days'),

                                    'trans_type'   => $this->input->post('trans_type'),

									'soc_id'       => $_POST['soc_id'][$i],

									'comp_id'      => $this->input->post('comp_id'),

									 'unit'        => $this->input->post('unit'),
									 
									'prod_id'      => $this->input->post('prod_id'),
								
									'catg_id'      => $this->input->post('sale_category'),

									'stock_point'  => $this->input->post('stock_point'),
     
									'gov_sale_rt'  => $this->input->post('gov_sale_rt'),  

									'sale_rt'      => $this->input->post('sale_rt'), 
									
									'sale_ro'      => $this->input->post('ro'),
                                                            
                                    'qty'          => $_POST['qty'][$i],

                                    'taxable_amt'  => $_POST['taxable_amt'][$i],

                                    'cgst'         => $_POST['cgst'][$i],

                                    'sgst'         => $_POST['sgst'][$i],

									'tot_amt'      => $_POST['tot_amt'][$i],
									
									'round_tot_amt'  => $_POST['round_tot_amt'][$i],

                                    "created_by"   => $this->session->userdata['loggedin']['user_name'],

					                "created_dt"   => date('Y-m-d h:i:s'),

									 "br_cd"       => $this->session->userdata['loggedin']['branch_id'],

									 "fin_yr"      => $fin_id
                                );
								
				$this->SaleModel->f_insert('td_sale', $data);
	           // $this->SaleModel->f_salejnl( $data);
				//  echo $this->db->last_query();
				// die();

			// }
			

			  //for($i = 0; $i < count($prod_id); $i++){
			//	 for($i = 0; $i < count($soc_id); $i++){  
			   $data1     = array(
                                   'sale_inv_no'  =>  'INV/'.$dist_sort_code.'/'.$comp_short_name->short_name.'/'.$month.'/'.$fin_year_sort_code.'/'. $trans_no->trans_no.'_'.$j,
			   						'trans_dt'     => $this->input->post('sale_due_dt'),

									'ro_inv_no'    => $this->input->post('ro'),
								   
									'branch_id'    => $this->session->userdata['loggedin']['branch_id'],
                 
                                    'fin_yr'       => $fin_id,

									'point_id'     => $this->input->post('stock_point'),

                                    'trans_type'   => "O",

									'unit'         => $this->input->post('unit'),

									'quantity'     => $_POST['qty'][$i],

                                    "created_by"   =>  $this->session->userdata['loggedin']['user_name'],

					                "created_dt"   =>  date('Y-m-d h:i:s')
                                );
								
		
		
				$this->SaleModel->f_insert('tdf_stock_point_trans', $data1);

			}
				
				$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('trade/sale');
		
           
            
			}else {
				$select3               = array("comp_id","comp_name");
				$product['compdtls']   = $this->SaleModel->f_select('mm_company_dtls',$select3,NULL,0);	
				
				// $where  =   array(

				// 	'comp_id'     => $this->input->post('comp_id'));
				$select2         = array("a.ro_no","a.qty","a.unit","b.unit_name");
				$where           = array('a.br'  => $this->session->userdata['loggedin']['branch_id'],
			                               "a.unit=b.id"=>NULL,
										   "a.stock_qty>0"=>NULL);
					
				$product['rodtls']   = $this->SaleModel->f_select('td_purchase a,mm_unit b',$select2,$where,0);
            //    echo $this->db->last_query();
			//    exit();
				$select1             = array("soc_id","soc_name","soc_add","gstin");
				$where1              = array('district'     => $this->session->userdata['loggedin']['branch_id']);
				$product['socdtls']  = $this->SaleModel->f_select('mm_ferti_soc',$select1,$where1,0);

				$select                = array("prod_id","prod_desc","gst_rt");
				$product['proddtls']   = $this->SaleModel->f_select('mm_product',$select,NULL,0);	

	$this->load->view('post_login/fertilizer_main');

	$this->load->view("sale/add",$product);

	$this->load->view('post_login/footer');
 }

}*/
		public function saleAdd(){   //================================================
	
			$br_id             = $this->session->userdata['loggedin']['branch_id'];
			$br_cd             = $this->session->userdata['loggedin']['branch_id'];
			$dist_sort_code    = $this->session->userdata['loggedin']['dist_sort_code'];
			$fin_year_sort_code= substr($this->session->userdata['loggedin']['fin_yr'],2);
			$fin_id            = $this->session->userdata['loggedin']['fin_id'];
			$trans_no          = $this->SaleModel->get_trans_no($fin_id,$br_cd);
			$month             =date('m');
			
			$j=0;
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				
				
					$prod_id     = $this->input->post('prod_id');
		
					$soc_id      = $_POST['soc_id'];
					
					$stock_point = $this->input->post('stock_point');
		
					$catg_id     = $this->input->post('catg_id');
		
					$gov_sale_rt = $this->input->post('gov_sale_rt');
		
					$qty         = $this->input->post('qty');
		
					$sale_rt     = $this->input->post('sale_rt');
						
					$taxable_amt = $this->input->post('taxable_amt');
		
					$cgst        = $this->input->post('cgst');
		
					$sgst        = $this->input->post('sgst');
		
					$tot_amt     = $this->input->post('tot_amt');
		
					$round_tot_amt = $this->input->post('round_tot_amt');
		
					$br_cd       = $this->session->userdata['loggedin']['branch_name'];
					
					$comp_id        = $this->input->post('comp_id');
					$select_comp    = array("short_name" );
					$where_comp     = array("comp_id" =>$comp_id   );
					$comp_short_name = $this->SaleModel->f_select('mm_company_dtls ',$select_comp,$where_comp,1);
				
					$rono= $this->input->post('ro');
				
					for($i = 0; $i < count($soc_id); $i++){
						$j=$i+1;
						$trans_no->trans_no + $i;
						$data     = array(// 'trans_do'     =>  'INV/'.$dist_sort_code.'/'.$comp_short_name->short_name.'/'.$month.'/'.$fin_year_sort_code.'/'. $trans_no->trans_no,
											'trans_do'     =>  'INV/'.$dist_sort_code.'/'.$comp_short_name->short_name.'/'.$month.'/'.$fin_year_sort_code.'/'. $trans_no->trans_no.'_'.$j,
		
											'trans_no'     =>  $trans_no->trans_no ,
											
											'do_dt'        => $this->input->post('ro_dt'),
		
											'sale_due_dt'  => $this->input->post('sale_due_dt'),
											
											'no_of_days'   => $this->input->post('no_of_days'),
		
											'trans_type'   => $this->input->post('trans_type'),
		
											'soc_id'       => $_POST['soc_id'][$i],
		
											'comp_id'      => $this->input->post('comp_id'),
		
											 'unit'        => $this->input->post('unit'),
											 
											'prod_id'      => $this->input->post('prod_id'),
										
											'catg_id'      => $this->input->post('sale_category'),
		
											'stock_point'  => $this->input->post('stock_point'),
			 
											'gov_sale_rt'  => $this->input->post('gov_sale_rt'),  
		
											'sale_rt'      => $this->input->post('sale_rt'), 
											
											'sale_ro'      => $this->input->post('ro'),
																	
											'qty'          => $_POST['qty'][$i],
		
											'taxable_amt'  => $_POST['taxable_amt'][$i],
		
											'cgst'         => $_POST['cgst'][$i],
		
											'sgst'         => $_POST['sgst'][$i],
		
											'tot_amt'      => $_POST['tot_amt'][$i],
											
											'round_tot_amt'  => $_POST['round_tot_amt'][$i],
		
											"created_by"   => $this->session->userdata['loggedin']['user_name'],
		
											"created_dt"   => date('Y-m-d h:i:s'),
		
											 "br_cd"       => $this->session->userdata['loggedin']['branch_id'],
		
											 "fin_yr"      => $fin_id
										);
						
									
						//$this->SaleModel->f_insert('td_sale', $data);
						$data_array_fin=$data;
						$select_prod         = array("prod_desc");
						$where_prod           = array("prod_id"     =>$this->input->post('prod_id'));
						$prod_name = $this->SaleModel->f_select("mm_product",$select_prod,$where_prod,1);
						$data_array_fin['rem'] = $prod_name->prod_desc." Sold vide RoNo ".$rono;
		
						$select_br    = array("dist_sort_code");
						$where_br     = array("district_code"=> $br_id );
						$br_nm=$this->SaleModel->f_select('md_district',$select_br,$where_br,1);
						
						$data_array_fin['fin_fulyr']=$fin_year_sort_code;
						$data_array_fin['br_nm']= $br_nm->dist_sort_code;
						
						$select_bracc   = array("acc_cd");
						$where_bracc     = array("soc_id"=> $_POST['soc_id'][$i] );
						$bracc=$this->SaleModel->f_select('mm_ferti_soc',$select_bracc,$where_bracc,1);
						$data_array_fin['acc_cd']=$bracc->acc_cd;
					
					   $this->SaleModel->f_salejnl( $data_array_fin);
					   $this->SaleModel->f_insert('td_sale', $data);
					   $data1     = array(
										   'sale_inv_no'  =>  'INV/'.$dist_sort_code.'/'.$comp_short_name->short_name.'/'.$month.'/'.$fin_year_sort_code.'/'. $trans_no->trans_no.'_'.$j,
											   'trans_dt'     => $this->input->post('sale_due_dt'),
		
											'ro_inv_no'    => $this->input->post('ro'),
										   
											'branch_id'    => $this->session->userdata['loggedin']['branch_id'],
						 
											'fin_yr'       => $fin_id,
		
											'point_id'     => $this->input->post('stock_point'),
		
											'trans_type'   => "O",
		
											'unit'         => $this->input->post('unit'),
		
											'quantity'     => $_POST['qty'][$i],
		
											"created_by"   =>  $this->session->userdata['loggedin']['user_name'],
		
											"created_dt"   =>  date('Y-m-d h:i:s')
										);
										
				
				
						$this->SaleModel->f_insert('tdf_stock_point_trans', $data1);
		
					}
						
						$this->session->set_flashdata('msg', 'Successfully Added');
		
							redirect('trade/sale');
				
				   
					
					}else {
						$select3               = array("comp_id","comp_name");
						$product['compdtls']   = $this->SaleModel->f_select('mm_company_dtls',$select3,NULL,0);	
						
						
						$select2         = array("a.ro_no","a.qty","a.unit","b.unit_name");
						$where           = array('a.br'  => $this->session->userdata['loggedin']['branch_id'],
												   "a.unit=b.id"=>NULL,
												   "a.stock_qty>0"=>NULL);
							
						$product['rodtls']   = $this->SaleModel->f_select('td_purchase a,mm_unit b',$select2,$where,0);
				   
						$select1             = array("soc_id","soc_name","soc_add","gstin");
						$where1              = array('district'     => $this->session->userdata['loggedin']['branch_id']);
						$product['socdtls']  = $this->SaleModel->f_select('mm_ferti_soc',$select1,$where1,0);
		
						$select                = array("prod_id","prod_desc","gst_rt");
						$product['proddtls']   = $this->SaleModel->f_select('mm_product',$select,NULL,0);	
		
			$this->load->view('post_login/fertilizer_main');
		
			$this->load->view("sale/add",$product);
		
			$this->load->view('post_login/footer');
		 }
		
		}
		

  public function saleedit(){


	if($_SERVER['REQUEST_METHOD'] == "POST") {
				
			 // for($i = 0; $i < count($prod_id); $i++){

			  $data     = array(
                                   'trans_type'   => $this->input->post('trans_type'),

								   'sale_due_dt'  => $this->input->post('sale_due_dt'), 

                                   'qty'          => $_POST['qty'],

								   'taxable_amt'  => $_POST['taxable_amt'],
									
	                               'cgst'         => $_POST['cgst'],

                                   'sgst'         => $_POST['sgst'],

								   'tot_amt'      => $_POST['tot_amt'],
								   
								   'round_tot_amt' => $_POST['round_tot_amt'],
								   
                                   "modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				                   "modified_dt"  =>  date('Y-m-d h:i:s'),

                                );

		   $where  =   array(

                 'trans_do'     => $this->input->post('trans_do'),

                 'sale_ro'      => $this->input->post('ro')

            );



            $this->SaleModel->f_edit('td_sale', $data, $where);

			//}
				
				$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('trade/sale');
		
           
            
			}else {

			$select5                = array("sl_no","cate_desc");
		
			// $ro_dt      = $ros->ro_dt;
			
			// $prod_id    = $prodd->prod_id;
			// $br_cd      = $this->session->userdata['loggedin']['branch_id'];
			// $where5                 =  array('district'     => $this->session->userdata['loggedin']['branch_id']);
			$product['catg']        = $this->SaleModel->f_select('mm_category',$select5,NULL,0);
				
			$select4                = array("id","unit_name");
			$product['unit']        = $this->SaleModel->f_select('mm_unit',$select4,NULL,0);

			 $select3               = array("comp_id","comp_name");
			 $product['compdtls']   = $this->SaleModel->f_select('mm_company_dtls',$select3,NULL,0);
					
			$select2                = array("ro_no","qty");

			$product['rodtls']      = $this->SaleModel->f_select('td_purchase',$select2,NULL,0);

			$where1                 =  array('district'     => $this->session->userdata['loggedin']['branch_id']);
			
			$select1                = array("soc_id","soc_name","soc_add","gstin");
			$product['socdtls']     = $this->SaleModel->f_select('mm_ferti_soc',$select1,$where1,0);

			$select                = array("prod_id","prod_desc","gst_rt");
			$product['proddtls']   = $this->SaleModel->f_select('mm_product',$select,NULL,0);	
            $product['prod_dtls']  = $this->SaleModel->f_get_particulars("td_sale", NULL, array("trans_do" => $this->input->get('trans_do')),0);

	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("sale/edits",$product);

	        $this->load->view('post_login/footer');
    }

}
	
public function sale(){
	$br_cd      = $this->session->userdata['loggedin']['branch_id'];
	$fin_id     = $this->session->userdata['loggedin']['fin_id'];
	
	$bank['data']    = $this->SaleModel->f_get_sales_dtls($br_cd,$fin_id);

   $this->load->view("post_login/fertilizer_main");

   $this->load->view("sale/dashboard",$bank);

   $this->load->view('search/search');

   $this->load->view('post_login/footer');
}
public function salesfilter(){
	$br_cd      = $this->session->userdata['loggedin']['branch_id'];
	$fin_id     = $this->session->userdata['loggedin']['fin_id'];
	if($_SERVER['REQUEST_METHOD'] == "POST") {
	$frmdt      = $this->input->post('from_date');
	$todt       = $this->input->post('to_date');
	
	$bank['data']    = $this->SaleModel->f_get_sales_bydt($br_cd,$fin_id,$frmdt,$todt);
	}
// echo $this->db->last_query();
// exit();
   $this->load->view("post_login/fertilizer_main");

   $this->load->view("sale/dashboard",$bank);

   $this->load->view('search/search');

   $this->load->view('post_login/footer');
}
		
public function deletesale() {

	$where = array(
				 "trans_do"    =>  $this->input->get('trans_do')
				
		
	);
$this->SaleModel->f_delete('td_sale', $where);

$this->session->set_flashdata('msg', 'Successfully Deleted!');

redirect("trade/sale");

}

//***************************/
		public function f_get_ro()
        {

            $ro_no = $this->input->get('ro_no');
           
			$data = $this->FertilizerModel->f_get_ro_dtls($ro_no);
			// echo $this->db->last_query();
			// die();
            echo json_encode($data);

		}
		
		public function deleteinvoice() {

			$where = array(
						 "ro"    =>  $this->input->get('ro_no')
						
				
			);
		$this->FertilizerModel->f_delete('td_invoice_entry', $where);
	
		$this->session->set_flashdata('msg', 'Successfully Deleted!');
		
		redirect("fertilizer/fertilizer/invoice_entry");
	
	}


		public function f_get_company(){

			$select          = array("gst_no","comp_add","cin");
			
		   $where=array(
			   "comp_id" =>$this->input->get("comp_id")
			   ) ;
		
			   
			$comp    = $this->FertilizerModel->f_select('mm_company_dtls',$select,$where,0);
			// echo $this->db->last_query();
			// die();
			echo json_encode($comp);
		
		}


		public function f_get_soc(){

			$select          = array("soc_id","soc_add","gstin");
			
		   $where=array(
			   "soc_id" =>$this->input->get("soc_id")
			   ) ;
		
			   
			$soc    = $this->SaleModel->f_select('mm_ferti_soc',$select,$where,0);
			// echo $this->db->last_query();
			// die();
			echo json_encode($soc);
		
		}



		public function f_get_recv_amt(){

			//	$select          = array("soc_id","soc_add","gstin");
				
			   $soc_id = $this->input->get("soc_id");
			
				   
				$soc    = $this->SaleModel->get_recv_amt($soc_id);
				// echo $this->db->last_query();
				// die();
				echo json_encode($soc);
			
			}
			public function f_get_virtual_point(){

				//	$select          = array("soc_id","soc_add","gstin");
					
				   $ro = $this->input->get("ro");
				
					   
					$ro_no    = $this->SaleModel->get_virtual_point($ro);
					// echo $this->db->last_query();
					// die();
					echo json_encode($ro_no);
				
				}
	
			
		public function f_get_adv(){

		//	$select          = array("soc_id","soc_add","gstin");
			
		   $soc_id = $this->input->get("soc_id");
		
			   
			$soc    = $this->SaleModel->get_advance($soc_id);
			// echo $this->db->last_query();
			// die();
			echo json_encode($soc);
		
		}


		public function f_get_hsn(){

			$select          = array("hsn_code","gst_rt");
			
		   $where=array(
			   "prod_id" =>$this->input->get("prod_id")
			   ) ;
		
			   
			$prod    = $this->FertilizerModel->f_select(' mm_product',$select,$where,0);
			// echo $this->db->last_query();
			// die();
			echo json_encode($prod);
		
		}

		public function f_get_qty_per_bag(){

			$select          = array("qty_per_bag");
			
		   $where=array(
			   "prod_id" =>$this->input->get("prod_id")
			   ) ;
		
			   
			$prod    = $this->FertilizerModel->f_select(' mm_product',$select,$where,0);
			// echo $this->db->last_query();
			// die();
			echo json_encode($prod);
		
		}	
		
//View Stock RO

public function f_get_product(){

	$select          = array("prod_id","prod_desc");
	
   $where=array(
	   "company" =>$this->input->get("comp_id")
	   ) ;

	$product    = $this->SaleModel->f_select(' mm_product',$select,$where,0);
// echo $this->db->last_query();
// 			die();
    echo json_encode($product);

}

public function f_get_sale_ro(){
	// echo 'hi';
	// die();
	$dist_id = $this->session->userdata['loggedin']['branch_id'];
    $select = array("a.ro_no ","b.short_name" );
       		
			$where      =   array(

			"a.comp_id = b.comp_id"  => NULL,
			"a.comp_id"    =>  $this->input->get('comp_id'),
			 "a.br" =>$dist_id  );
			   
			$ro   = $this->SaleModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
			// echo $this->db->last_query();
			// die();
			
			echo json_encode($ro);

}
// public function f_get_prodsale_ro_nw(){
// 	$dist_id = $this->session->userdata['loggedin']['branch_id'];

//         $select = array('a.ro_no ,date_format(a.ro_dt,"%d-%m-%Y") as ro_dt,b.short_name 
// 		from td_purchase a,mm_company_dtls b
// 		where a.comp_id = b.comp_id 
// 		and a.comp_id    ='.$this->input->get("comp_id").'
		
// 		and a.prod_id    ='.$this->input->get("prod_id").'
// 		and a.br ='.$dist_id.'
// 		  ORDER BY a.ro_dt' );
    
// 		$where      =   array(

// 		"a.comp_id = b.comp_id"  => NULL,
// 		"a.comp_id"              =>  $this->input->get('comp_id'),
// 		"a.prod_id"              =>  $this->input->get('prod_id'),
// 		"a.br" =>$dist_id
// 		// "a.qty>(select sum(qty) from td_sale where sale_ro=a.ro_no)"=>NULL
//         );
		   
// 		// $ro   = $this->SaleModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
// 		$ro   = $this->SaleModel->f_select(NULL,$select,NULL,0);

// 		//echo $this->db->last_query();

// 		//echo $this->db->last_query();
// 		//die();
// 		echo json_encode($ro);

// }




public function f_get_prodsale_ro_nw(){
	$comp_id=$this->input->get("comp_id");
	$prod_id=$this->input->get("prod_id");
	$dist_id = $this->session->userdata['loggedin']['branch_id'];

        // $select = array('a.ro_no ,date_format(a.ro_dt,"%d-%m-%Y") as ro_dt,b.short_name 
		// from td_purchase a,mm_company_dtls b
		// where a.comp_id = b.comp_id 
		// and a.comp_id    ='.$this->input->get("comp_id").'
		
		// and a.prod_id    ='.$this->input->get("prod_id").'
		// and a.br ='.$dist_id.'
		//   ORDER BY a.ro_dt' );
    
		// $where      =   array(

		// "a.comp_id = b.comp_id"  => NULL,
		// "a.comp_id"              =>  $this->input->get('comp_id'),
		// "a.prod_id"              =>  $this->input->get('prod_id'),
		// "a.br" =>$dist_id
		// // "a.qty>(select sum(qty) from td_sale where sale_ro=a.ro_no)"=>NULL
        // );
		   
		// $ro   = $this->SaleModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
		$ro   = $this->SaleModel->get_ro_no($comp_id,$prod_id,$dist_id);

		//echo $this->db->last_query();

		// echo $this->db->last_query();
		// die();
		echo json_encode($ro);

}
// public function f_get_prodsale_ro_nw(){
// 	$dist_id = $this->session->userdata['loggedin']['branch_id'];
//         $select = array("a.ro_no ","date_format(a.ro_dt,'%d-%m-%Y') as ro_dt","b.short_name" );
       		
// 		$where      =   array(

// 		"a.comp_id = b.comp_id"  => NULL,
// 		"a.comp_id"              =>  $this->input->get('comp_id'),
// 		"a.prod_id"              =>  $this->input->get('prod_id'),
// 		"a.br" =>$dist_id
//         );
		   
// 		$ro   = $this->SaleModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
		
// 		 //echo $this->db->last_query();
// 		 //die();
// 		echo json_encode($ro);

// }

public function f_get_prodsale_ro(){
	$dist_id = $this->session->userdata['loggedin']['branch_id'];
        $select = array("a.ro_no ","b.short_name" );
       		
		$where      =   array(

		"a.comp_id = b.comp_id"  => NULL,
		"a.comp_id"              =>  $this->input->get('company')
        );
		   
		$ro   = $this->SaleModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
		
		// echo $this->db->last_query();
		// die();
		echo json_encode($ro);

}



public function deletero() {

	$where = array(
				 "ro_no"    =>  $this->input->get('ro_no'),
				 "challan_flag" =>  'N'
		
	);
	
	$this->FertilizerModel->f_delete('td_purchase', $where);

	$select1          = array("challan_flag");
	$where = array(
		"ro_no"    =>  $this->input->get('ro_no'));

$challan_flag = $this->FertilizerModel->f_select('td_purchase',$select1,$where,0);

	$this->session->set_flashdata('msg', 'Successfully Deleted!');
	
	redirect("fertilizer/fertilizer/stock_entry");

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


	
	}
?>
