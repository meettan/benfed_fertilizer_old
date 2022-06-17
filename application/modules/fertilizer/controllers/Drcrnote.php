<?php
	class Drcrnote extends MX_Controller{
		protected $sysdate;
		protected $fin_year;
		public function __construct(){
		parent::__construct();	
		$this->db2 = $this->load->database('findb', TRUE);
		$this->load->model('DrcrnoteModel');
		$this->load->model('PurchaseModel');
		$this->load->model('ReportModel');
		$this->load->helper('paddyrate_helper');

		    if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

            }
		}



/**************************************************************** */
public function f_branch_crnoteupd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		// echo 'hi';
		// die();
		
		$tot_amt = $this->input->post('comp_adjflag');
		// echo $tot_amt;
		// die();
		// print_r($_POST);
		// die();
						
					  for($i = 0; $i < count($comp_adjflag); $i++){

		$data    = array(

					

					'comp_adjflag'       => $this->input->post('comp_adjflag')

					);

		$where3  =   array(

			'comp_adjflag'     => 'N',
          'ro'                 => $this->input->post('ro')
	   );
		

		$this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);

		// echo $this->db->last_query();
		// die();

	}
		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('drcrnote/branch_crnote');
		
		
	}
	// else {


	// 	$where3 = array(

	// 		  "trans_dt" => $this->input->get('trans_dt'),
				
	// 		"trans_no" => $this->input->get('trans_no')
	// 	);


	// 	$where1 = array(
	// 		"soc_id"=> $this->input->get('soc_id'),
	// );
	// 	$select        = array("soc_id soc_id","soc_name soc_name");

	// 	$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");

	// 	$select3       =array("a.trans_dt",
	// 							"a.trans_no",
	// 							"a.soc_id",
	// 							"a.comp_id",
	// 							"a.invoice_no",
	// 							"a.ro",
	// 							"a.catg",
	// 							"a.tot_amt",
	// 							"a.trans_flag",
	// 							"a.note_type",
	// 							 "a.remarks",
	// 							"b.cat_desc");
								

								
	// 							$where =array("a.catg=b.sl_no"=>NULL 	,
	// 							"invoice_no" => $this->input->get('invoice_no'));

	// 							$where_cr =array(
	// 							"invoice_no" => $this->input->get('invoice_no'));
		 
	// 	$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
		
	// 	$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);

	// 	$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',NULL,NULL,0);
	 
	// 	$product['dr_dtls']     = $this->DrcrnoteModel->f_get_particulars("tdf_dr_cr_note", NULL, $where_cr,0);
			
	// 	$this->load->view('post_login/fertilizer_main');

	// 	$this->load->view("dr_note/edit",$product);

	// 	$this->load->view('post_login/footer');
	// }

}



/*************************************************************** */

public function branch_crnote(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    = $_POST['from_date'];

        $to_dt      = $_POST['to_date'];
       
        $comp_id    = $this->input->post('company');

		$catg       = $this->input->post('category');
        
        $comp_name  = $this->ReportModel->get_comp_name($comp_id);

        // $branch     = $this->session->userdata['loggedin']['branch_id'];

		$branch     = $this->input->post('branch');

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));
        // $all_data   =  array($from_dt,$to_dt,$branch,$soc_id );
        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt               =  date($year.'-04-01');

        $prevdt              =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
            
        $data['branch']      =   $this->DrcrnoteModel->f_select("md_district", NULL, NULL,0);
	
        $data['sales']=$this->ReportModel->f_br_crnote($from_dt,$to_dt,$branch ,$comp_id ,$catg  );
		// echo $this->db->last_query();
		// die();
    
        $select             = array("COMP_ID","COMP_NAME");
        
        $where_dist         = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

        $data['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NUll,0);

		$data['category']   = $this->DrcrnoteModel->f_select("mm_cr_note_category", NULL, NULL,0);
		
		$data['frm_dt'] 	= $from_dt;
		
		$data['to_dt'] 		= $to_dt;
		
		$data['comp_id'] 	= $comp_id;
		
		$data['catg'] 		= $catg;
		
		$data['branch_id'] 	= $branch;

        $this->load->view('post_login/fertilizer_main');
    
        $this->load->view('soc_crnote/input',$data);

        $this->load->view('post_login/footer');

    }else{

        $select                 = array("COMP_ID","COMP_NAME");
        
        $where                  = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

        $company['compdtls']    = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NUll,0);

		$company['branch']      = $this->DrcrnoteModel->f_select("md_district", NULL, NULL,0);

		$company['category']    = $this->DrcrnoteModel->f_select("mm_cr_note_category", NULL, NULL,0);
		
		$company['frm_dt'] 		= date('Y-m-d');
		
		$company['to_dt'] 		= date('Y-m-d');
		
		$company['comp_id'] 	= '';
		
		$company['catg'] 		= '';
		
		$company['branch_id'] 		= '';

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('soc_crnote/input',$company);
        $this->load->view('post_login/footer');
    }

}
		
function update_dr_cr_note(){
	$dt = 0;
	$data = $this->input->post('data');
	$table_name = 'tdf_dr_cr_note';
	foreach($data as $v){
		$ext_dt = explode(",",$v);
		$ro = $ext_dt[0];
		$br_id = $ext_dt[1];
		$cat_id = $ext_dt[2];
		$data_array = array(
			'comp_adjflag' => 'Y'
		);
		$where = array(
			'ro' => $ro,
			'branch_id' => $br_id,
			'catg' => $cat_id
		);
		if($this->DrcrnoteModel->f_edit($table_name, $data_array, $where)){
			$dt = 1;
		}else{
			$dt = 0;
		}
		//echo $this->db->last_query();
		//var_dump($ext_dt);
	}
	echo 1;
	//var_dump($data);
	//exit;
}


/******************************************Debit Note For Customer ********************************************/		

public function drnoteReport()
{
	$receipt_no = $this->input->get('invoice_no');
	$finYr          = $this->session->userdata['loggedin']['fin_id'];
	$cr['data']    = $this->DrcrnoteModel->f_get_receiptReport_dtls($receipt_no,$finYr);
	// $cr['data']    = $this->DrcrnoteModel->f_get_receiptReport_dtls($receipt_no,$finYr);
	// echo $this->db->last_query();
	// die();
	$cr['receipt_no'] = $receipt_no;
 
	$this->load->view("post_login/fertilizer_main");

	$this->load->view('report/cr_note_report', $cr);

	$this->load->view('post_login/footer');
	
}


//Dashboard
		public function dr_note(){
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$from_date=$this->input->post('from_date');
			$to_date=$this->input->post('to_date');
			$select	=	array("a.recpt_no","(select  nwirn from td_sale_cancel where trans_do=a.invoice_no) as irn",
				"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","sum(a.tot_amt)tot_amt","a.trans_flag","a.invoice_no","a.fwd_flag",
				"b.soc_name","c.COMP_NAME","(select count(paid_id) from tdf_payment_recv where sale_invoice_no=a.invoice_no and pay_type=6) as pay_cnt"
			
			);

			$where	=	array(

				"a.soc_id = b.soc_id"	=>	NULL,

				"a.comp_id = c.COMP_ID"	=>	NULL,

				"a.trans_flag"			=>	'R',

				"a.note_type"			=>	'D',
				
				"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
				
				"a.trans_dt BETWEEN '".$from_date."' AND '".$to_date."' group by  a.invoice_no ORDER BY a.trans_dt"			=>	NULL
			);
			//a.fin_yr='".$this->session->userdata['loggedin']['fin_id']."'
		    
		   	$data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c ",$select,$where,0);
		    //echo $this->db->last_query();
			//print_r($data['dr_notes']);
			//exit();
			$this->load->view("post_login/fertilizer_main");
	   
		    $this->load->view("dr_note/dashboard",$data);
	   
		    $this->load->view('search/search');
	   
		    $this->load->view('post_login/footer');
		}else{
			
			$select	=	array("a.recpt_no","(select  nwirn from td_sale_cancel where trans_do=a.invoice_no) as irn",
				"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","sum(a.tot_amt)tot_amt","a.trans_flag","a.invoice_no","a.fwd_flag",
				"b.soc_name","c.COMP_NAME","(select count(paid_id) from tdf_payment_recv where sale_invoice_no=a.invoice_no and pay_type=6) as pay_cnt"
			
			);

			$where	=	array(

				"a.soc_id = b.soc_id"	=>	NULL,

				"a.comp_id = c.COMP_ID"	=>	NULL,

				"a.trans_flag"			=>	'R',

				"a.note_type"			=>	'D',

				"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
				"a.trans_dt BETWEEN '".date('Y-m-d')."' AND '".date('Y-m-d')."' group by  a.invoice_no ORDER BY a.trans_dt"			=>	NULL,
				
				
				

			);
		    
		   	$data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c ",$select,$where,0);
		    // echo $this->db->last_query();
			// exit();
			$this->load->view("post_login/fertilizer_main");
	   
		    $this->load->view("dr_note/dashboard",$data);
	   
		    $this->load->view('search/search');
	   
		    $this->load->view('post_login/footer');
		}
	    }

		// public function dr_note_cron_job(){

			
			
		// 	$data    = array(
		// 		      'fwd_flag'       => "Y"
		// 			       );

	    //      $where  =   array(
        //               'trans_dt'     =>  date("Y-m-d")
		// 			);
	
        //     $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);
		// }
 

		public function f_get_sale_inv(){

			   
			$inv    = $this->DrcrnoteModel->get_sel_inv($this->input->get("soc_id"),$this->input->get("comp_id"));
		
			echo json_encode($inv);
		
		}
		public function f_get_sale_invro(){

			$select          = array("sale_ro");
			
		   $where=array(
			   "soc_id" =>$this->input->get("soc_id"),
			   "trans_do" =>$this->input->get("inv_no")) ;
		
			$ro    = $this->DrcrnoteModel->f_select(' td_sale',$select,$where,0);
		
			echo json_encode($ro);
		
		}

		public function f_get_cr_category()
		{
			
			$select = array("sl_no","cat_desc" );
					   
					// $where      =   array(
					// "comp_id"    =>  $this->input->get('comp_id'),
					// "district"   =>  $this->input->get('dist_id'),
					// "paid_amt=0" =>  NULL  );
					   
					$catid   = $this->DrcrnoteModel->f_select('mm_cr_note_category',$select,NULL,0);
					// echo $catid;
					echo json_encode($catid);
		
		}

//ADD
	public function drnoteAdd(){

		        $branch  = $this->session->userdata['loggedin']['branch_id'];
				$finYr          = $this->session->userdata['loggedin']['fin_id'];
				$fin_year       = $this->session->userdata['loggedin']['fin_yr'];
				$select         = array("dist_sort_code");
				$where          = array("district_code"     =>  $branch);
                $brn           = $this->DrcrnoteModel->f_select("md_district",$select,$where,1); 

			 $transNo         = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);

			 $receipt         = 'Crnote/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$transNo->trans_no;
			 
                
			 if($_SERVER['REQUEST_METHOD'] == "POST") {

				$soc_id    = $this->input->post('soc_id');
				$tot_amt   = $this->input->post('tot_amt');
                $tot_cramt = 0.00;


				
			 for($i = 0; $i < count($tot_amt); $i++){

			     //echo count($tot_amt);
                
				//  die();
			    //  $tot_amt  = $_POST['tot_amt'][$i];
				//  $cat_id   = $_POST['cat_id'][$i];

				// print_r($tot_amt);
				//  print_r($cat_id);

	              $data  = array (
					'recpt_no' => $receipt ,
					  
					'soc_id'      => $this->input->post('soc_id'),

					'trans_dt'    =>  $this->input->post('trans_dt'),

					"trans_no"	  =>  $transNo->trans_no,

					"comp_id"	  => $this->input->post('comp_id'),	
					
					"invoice_no"  => $this->input->post('inv_no'),	

					"ro"           => $this->input->post('ro_no'),	
					
					'catg'         => $_POST['cat_id'][$i],

					'tot_amt'      => $_POST['tot_amt'][$i],

					'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

					"remarks"     => $this->input->post('remarks'),

					"note_type"	  => 'D',

					"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
					
					'created_by'  => $this->session->userdata['loggedin']['user_name'],

					'created_dt'  =>  date('Y-m-d h:i:s')

				);
				// print_r($data);
				
			$tot_cramt += $_POST['tot_amt'][$i];

				$select_cracc         = array("acc_cd"
			                               );
			$where_cracc          = array(
				"sl_no"     => $_POST['cat_id'][$i]
			);

		   $cr_acc = $this->DrcrnoteModel->f_select("mm_cr_note_category",$select_cracc,$where_cracc,1);

                    $data_array_cr=$data;
				    $data_array_cr['acc_cd'] = $cr_acc->acc_cd; 
					
					$select_soc         = array("soc_name","acc_cd");
		            $where_soc           = array("soc_id"     => $soc_id);
	                $soc_name = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);
						$data_array_crt['soc_acc']= $soc_name->acc_cd;
					$data_array_cr['rem'] ="Credit Note raised for ".$soc_name->soc_name." aginst Invoice No. ". $this->input->post('inv_no').",".$this->input->post('remarks');

					$select_br    = array("dist_sort_code");
					$where_br     = array("district_code"=> $branch );
				
	
					$data_array_cr['fin_fulyr']=$fin_year;
					$data_array_cr['br_nm']= $brn->dist_sort_code;
					
					$this->DrcrnoteModel->f_insert('tdf_dr_cr_note', $data);
					
					$this->DrcrnoteModel->f_crnjnl($data_array_cr);
		}
		$data_cr  = array (
			'recpt_no' => $receipt ,
			  
			'soc_id'      => $this->input->post('soc_id'),

			'trans_dt'    =>  $this->input->post('trans_dt'),

			"trans_no"	  =>  $transNo->trans_no,

			"comp_id"	  => $this->input->post('comp_id'),	
			
			"invoice_no"  => $this->input->post('inv_no'),	

			"ro"           => $this->input->post('ro_no'),	
			
			// 'catg'         => $_POST['cat_id'][$i],

			'tot_amt'      => $tot_cramt,

			'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

			"remarks"     => $this->input->post('remarks'),

			"note_type"	  => 'D',

			"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
			
			'created_by'  => $this->session->userdata['loggedin']['user_name'],

			'created_dt'  =>  date('Y-m-d h:i:s'));

		$data_array_crt       =$data_cr;

		$select_soc           = array("acc_cd");
		$where_soc            = array("soc_id"     => $soc_id);
		$soc_acc_cd             = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);

		$data_array_crt['acc_cd'] = $soc_acc_cd->acc_cd;

		unset($select_soc);   
		unset($where_soc);      

		$select_soc           = array("soc_name");
		$where_soc            = array("soc_id"     => $soc_id);
		$soc_name             = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);

		$data_array_crt['rem'] = "Credit Note raised for ".$soc_name->soc_name." aginst Invoice No. ". $this->input->post('inv_no').",".$this->input->post('remarks');

					$select_br    = array("dist_sort_code");
					$where_br     = array("district_code"=> $branch );
				
	
					$data_array_crt['fin_fulyr']=$fin_year;
					$data_array_crt['br_nm']= $brn->dist_sort_code;
					$this->DrcrnoteModel->f_totcrnjnl( $data_array_crt);
					
					$this->session->set_flashdata('msg', 'Successfully Added');
	
				    redirect('drcrnote/dr_note');
				
				   
					
			}else {
		
					$wheres = array(

					"district" => $this->session->userdata['loggedin']['branch_id']
						
					);

					$select1   = array("soc_id","soc_name","soc_add","gstin");

					$product['socdtls']   = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select1,$wheres,0);

					$select = array("COMP_ID comp_id","COMP_NAME comp_name");

					$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NULL,0);

					$select_cat = array("sl_no","cat_desc");

					$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',$select_cat,NULL,0);

					$select = array("trans_do");
					$whereinv=array(
						"soc_id" =>$this->input->get("soc_id")
						) ;
					$product['saleinv']   = $this->DrcrnoteModel->f_select('td_sale',$select,$whereinv,0);
					$product['mntend']= $this->PurchaseModel->f_get_mnthend($branch );

				

					$product['date']   = $this->PurchaseModel->get_monthendDate();


					$this->load->view('post_login/fertilizer_main');
				
					$this->load->view("dr_note/add",$product);
				
					$this->load->view('post_login/footer');
	   }
	
	}
//edit
    public function drnote_edit(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$tot_amt = $this->input->post('tot_amt');
							
						  for($i = 0; $i < count($tot_amt); $i++){
   
			$data    = array(

						

						// 'remarks'       => $this->input->post('remarks'),

						// 'soc_id'        => $this->input->post('soc_id'),

						// 'comp_id'       => $this->input->post('comp_id'),

						// 'invoice_no'    => $this->input->post('inv_no'),

						//  'ro'           => $this->input->post('ro_no'),
						 
						// 'catg'          => $this->input->post('cat_id'),
						'catg'          =>$_POST['cat_id'][$i],

						'tot_amt'       =>$_POST['tot_amt'][$i],

						'modified_by'   => $this->session->userdata['loggedin']['user_name'],

						'modified_dt'   =>  date('Y-m-d'),

						);

			$where3  =   array(

				'invoice_no'     => $this->input->post('inv_no'),
				'trans_type'     =>'R'

		   );
			
            $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where3);
			// echo $this->db->last_query();
			// die();

		}
			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('drcrnote/dr_note');
			
            
		}else {


            $where3 = array(

              	"trans_dt" => $this->input->get('trans_dt'),
                    
                "trans_no" => $this->input->get('trans_no')
            );


			$where1 = array(
				"soc_id"=> $this->input->get('soc_id'),
		);
			$select        = array("soc_id soc_id","soc_name soc_name");

			$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");

			$select3       =array("a.trans_dt",
									"a.trans_no",
									"a.soc_id",
									"a.comp_id",
									"a.invoice_no",
									"a.ro",
									"a.catg",
									"a.tot_amt",
									"a.trans_flag",
									"a.note_type",
									 "a.remarks",
									"b.cat_desc",
								    "a.fwd_flag");
									

									  // $where =array("a.catg=b.sl_no"=>NULL 	,
									 // "trans_dt" => $this->input->get('trans_dt'),
                          			// "trans_no" => $this->input->get('trans_no'));

									
									$where =array("a.catg=b.sl_no"=>NULL 	,
									"invoice_no" => $this->input->get('invoice_no'));

									$where_cr =array(
									"invoice_no" => $this->input->get('invoice_no'),
									'trans_flag'=>'R');
			 
			$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
			
			$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);

			$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',NULL,NULL,0);
		  // $product['dr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note a,mm_cr_note_category b ',$select3,$where,0);
			$product['dr_dtls']     = $this->DrcrnoteModel->f_get_particulars("tdf_dr_cr_note", NULL, $where_cr,0);
				
			$select_cr = array(
				"count(ro)as cr_cnt"
			);	
			$where_cr = array(
				"invoice_no"	=> $this->input->get('invoice_no') ,
				"trans_flag"    =>'A'
		);
			$product['cr_cnt']= $this->DrcrnoteModel->f_select("tdf_dr_cr_note",$select_cr,$where_cr,0);
// echo $this->db->last_query();
// die();
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("dr_note/edit",$product);

	        $this->load->view('post_login/footer');
        }

    }

//delete
	public function deletedr_note() {
		//print_r($this->input->get());
		
		$recpt_no=$this->input->get('recpt_no');
		$sale_invoice_no=$this->input->get('sale_invoice_no');
		$recivedPayCount=$this->DrcrnoteModel->checked_recived_payment($sale_invoice_no);
		//$recivedPaycrnodeCount=$this->DrcrnoteModel->checked_recived_payment_cradit_not($sale_invoice_no);
		//if($recivedPaycrnodeCount==0){
		if($recivedPayCount==0){
			$where  =   array(
						"trans_dt" => $this->input->get('trans_dt'),
						"trans_no" => $this->input->get('trans_no')
				);
			$this->DrcrnoteModel->f_delete('tdf_dr_cr_note', $where);
			$this->DrcrnoteModel->delete_td_vouchers($recpt_no);
			$this->session->set_flashdata('msg', 'Successfully Deleted!');
			redirect('drcrnote/dr_note');
		}else{
			$this->session->set_flashdata('msg', 'Advance alrady adjusted ! Delete not possible');
			redirect('drcrnote/dr_note');
		}
	// }else{
	// 	$this->session->set_flashdata('msg', 'Advance alrady adjusted ! Delete not possible');
	// 	redirect('drcrnote/dr_note');
	// }
		//exit();
		

	}	

/*************************************Credit Note For Company*************************************************/


//Dashboard
	public function cr_note(){
			
		$select	=	array(
			"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","a.tot_amt","a.trans_flag",
			"c.COMP_NAME"
		);

		$where	=	array(

			"a.comp_id = c.COMP_ID"	=>	NULL,

			"a.trans_flag"			=>	'R',

			"a.note_type"			=>	'C',

			"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],

			"a.fin_yr"				=>	$this->session->userdata['loggedin']['fin_id']

		);
		
		$data['cr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_company_dtls c",$select,$where,0);
	
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("cr_note/dashboard",$data);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

//ADD
	public function crnoteAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$transNo = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);
					
			$data  = array (
					'soc_id'      => 0,

					'trans_dt'    =>  $this->input->post('trans_dt'),

					"trans_no"	  =>  $transNo->trans_no,

					"catg"	  =>  $this->input->post('catg'),

					'tot_amt'     => $this->input->post('tot_amt'),

					"comp_id"	  => $this->input->post('comp_id'),		

					'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

					"remarks"     => $this->input->post('remarks'),

					"note_type"	  => 'C',

					"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
					
					'created_by'  => $this->session->userdata['loggedin']['user_name'],

					'created_dt'  =>  date('Y-m-d h:i:s')

				);
							
					$this->DrcrnoteModel->f_insert('tdf_dr_cr_note', $data);
							
					$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('drcrnote/cr_note');
					
		}else {

				$wheres = array(

				"district" => $this->session->userdata['loggedin']['branch_id']
					
				);

				$select1   				= array("soc_id","soc_name","soc_add","gstin");

				$product['socdtls']   	= $this->DrcrnoteModel->f_select('mm_ferti_soc',$select1,$wheres,0);

				$select 				= array("COMP_ID comp_id","COMP_NAME comp_name");

				$product['compdtls']    = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NULL,0);
				$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',NULL,NULL,0);
				$this->load->view('post_login/fertilizer_main');
			
				$this->load->view("cr_note/add",$product);
			
				$this->load->view('post_login/footer');
		}

	}

//edit
    public function crnote_edit(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data    = array(

						'tot_amt'       => $this->input->post('tot_amt'),

						'remarks'       => $this->input->post('remarks'),

						'comp_id'       => $this->input->post('comp_id'),

						'catg'          => $this->input->post('catg'),

						'modified_by'   => $this->session->userdata['loggedin']['user_name'],

						'modified_dt'   =>  date('Y-m-d h:i:s'),

						);

		   	$where  =   array(

                 'trans_dt'     => $this->input->post('trans_dt'),

                 'trans_no'   	=> $this->input->post('trans_no'),

            );

            $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);

			// echo $this->db->last_query();
			// die();			
			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('drcrnote/cr_note');
			
            
		}else {


            $where = array(

              	"trans_dt" => $this->input->get('trans_dt'),
                    
                "trans_no" => $this->input->get('trans_no')
            );

			$select        = array("soc_id","soc_name","soc_add","gstin");

			$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");
			 
			$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
			
			$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);

			$product['catg']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',NULL,NULL,0);
			$product['cr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note',NULL,$where,1);

		// echo $this->db->last_query();
		// die();
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("cr_note/edit",$product);

	        $this->load->view('post_login/footer');
        }

    }
/********************************************************* */
public function crnote_editvu(){

	// $inv=$this->input->get('invoice_no');
	// echo $inv;
	// die();
	// if($_SERVER['REQUEST_METHOD'] == "POST") {

	// 	$data    = array(

	// 				'tot_amt'       => $this->input->post('tot_amt'),

	// 				'remarks'       => $this->input->post('remarks'),

	// 				'comp_id'       => $this->input->post('comp_id'),

	// 				'modified_by'   => $this->session->userdata['loggedin']['user_name'],

	// 				'modified_dt'   =>  date('Y-m-d h:i:s'),

	// 				);

	// 	   $where  =   array(

	// 		 'invoice_no'     => $this->input->get('invoice_no')
	// 	);

	// 	$this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);

	// 	// echo $this->db->last_query();
	// 	// die();			
	// 	$this->session->set_flashdata('msg', 'Successfully Updated');

	// 	redirect('drcrnote/cr_note');
		
		
	// }else {

	// 	
	$invoice=$this->input->get('trans_do');
	// echo($invoice);
	// die();
		
		$where = array(

			  "invoice_no" => $invoice
		);

		$select        = array("soc_id","soc_name","soc_add","gstin");

		$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");
		 
		$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
		
		$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);


		$product['cr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note',NULL,$where,1);

	// echo $this->db->last_query();
	// die();
		$this->load->view('post_login/fertilizer_main');

		$this->load->view("cr_note/edit",$product);

		$this->load->view('post_login/footer');
	// }

}


/************************************************************ */

//delete
	public function deletecr_note() {

		$where  =   array(

					"trans_dt" => $this->input->get('trans_dt'),
					
					"trans_no" => $this->input->get('trans_no')
			);

		$this->DrcrnoteModel->f_delete('tdf_dr_cr_note', $where);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect('drcrnote/cr_note');

	}

}
