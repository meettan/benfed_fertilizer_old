<?php
	class Drcrnote extends MX_Controller{
		protected $sysdate;
		protected $fin_year;
		public function __construct(){
		parent::__construct();	
		$this->load->model('DrcrnoteModel');
		$this->load->helper('paddyrate_helper');

		    if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

            }
		}

/******************************************Debit Note For Customer ********************************************/		

public function drnoteReport()
{
	$receipt_no = $this->input->get('receipt_no');
	$finYr          = $this->session->userdata['loggedin']['fin_id'];
	$cr['data']    = $this->DrcrnoteModel->f_get_receiptReport_dtls($receipt_no,$finYr   );
	// echo $this->db->last_query();
	// die();
	$cr['receipt_no'] = $receipt_no;
 
	$this->load->view("post_login/fertilizer_main");

	$this->load->view('report/cr_note_report', $cr);

	$this->load->view('post_login/footer');
	
}


//Dashboard
		public function dr_note(){
		 
			$select	=	array("a.recpt_no","(select  nwirn from td_sale_cancel where trans_do=a.invoice_no) as irn",
				"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","a.tot_amt","a.trans_flag",
				"b.soc_name","c.COMP_NAME","(select count(paid_id) from tdf_payment_recv where sale_invoice_no=a.invoice_no and pay_type=6) as pay_cnt"
			
			);

			$where	=	array(

				"a.soc_id = b.soc_id"	=>	NULL,

				"a.comp_id = c.COMP_ID"	=>	NULL,

				"a.trans_flag"			=>	'R',

				"a.note_type"			=>	'D',

				"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],

				"a.fin_yr				=	'".$this->session->userdata['loggedin']['fin_id']."'ORDER BY a.trans_dt"  => NULL

			);
		    
		   	$data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c ",$select,$where,0);
		    // echo $this->db->last_query();
			// exit();
			$this->load->view("post_login/fertilizer_main");
	   
		    $this->load->view("dr_note/dashboard",$data);
	   
		    $this->load->view('search/search');
	   
		    $this->load->view('post_login/footer');
	    }

 
		public function f_get_sale_inv(){

			$select          = array("trans_do","sale_ro");
			
		   $where=array(
			   "soc_id" =>$this->input->get("soc_id")
			   ) ;
		
			$inv    = $this->DrcrnoteModel->f_select(' td_sale',$select,$where,0);
		
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

//ADD
	public function drnoteAdd(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {

				$branch         = $this->session->userdata['loggedin']['branch_id'];

				$finYr          = $this->session->userdata['loggedin']['fin_id'];
	
				$fin_year       = $this->session->userdata['loggedin']['fin_yr'];

				$select         = array("dist_sort_code");
				$where          = array("district_code"     =>  $branch);

                 $brn           = $this->DrcrnoteModel->f_select("md_district",$select,$where,1); 

			   $transNo         = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);
			   $receipt         = 'Crnote/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$transNo->trans_no;
// echo ( $receipt );
// die();
	           $data  = array ('recpt_no' => $receipt ,
					'soc_id'      => $this->input->post('soc_id'),

					'trans_dt'    =>  $this->input->post('trans_dt'),

					"trans_no"	  =>  $transNo->trans_no,

					'tot_amt'     => $this->input->post('tot_amt'),

					"comp_id"	  => $this->input->post('comp_id'),	
					
					"invoice_no"  => $this->input->post('inv_no'),	

					"ro"         => $this->input->post('ro_no'),	
					
					"catg"        =>  $this->input->post('cat_id'),

					'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

					"remarks"     => $this->input->post('remarks'),

					"note_type"	  => 'D',

					"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
					
					'created_by'  => $this->session->userdata['loggedin']['user_name'],

					'created_dt'  =>  date('Y-m-d h:i:s')

				);
				

				$select_cracc         = array("acc_cd"
			                               );
			$where_cracc          = array(
				"sl_no"     => $this->input->post('cat_id')
			);

		   $cr_acc = $this->DrcrnoteModel->f_select("mm_cr_note_category",$select_cracc,$where_cracc,1);
// echo $this->db->last_query();
// exit;
                    $data_array_cr=$data;
				    $data_array_cr['acc_cd'] = $cr_acc->acc_cd; 
					// print_r($data_array_cr);
					// exit;
					$this->DrcrnoteModel->f_insert('tdf_dr_cr_note', $data);
					$this->DrcrnoteModel->f_crnjnl( $data_array_cr);	
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
// echo $this->db->last_query();
// die();
					$select = array("trans_do");
					$whereinv=array(
						"soc_id" =>$this->input->get("soc_id")
						) ;
					$product['saleinv']   = $this->DrcrnoteModel->f_select('td_sale',$select,$whereinv,0);
		
					$this->load->view('post_login/fertilizer_main');
				
					$this->load->view("dr_note/add",$product);
				
					$this->load->view('post_login/footer');
	   }
	
	}

//edit
    public function drnote_edit(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data    = array(

						'tot_amt'       => $this->input->post('tot_amt'),

						'remarks'       => $this->input->post('remarks'),

						'soc_id'        => $this->input->post('soc_id'),

						'comp_id'       => $this->input->post('comp_id'),

						'invoice_no'    => $this->input->post('inv_no'),

						 'ro'           => $this->input->post('ro_no'),
						 
						'catg'          => $this->input->post('cat_id'),

						'modified_by'   => $this->session->userdata['loggedin']['user_name'],

						'modified_dt'   =>  date('Y-m-d'),

						);

		   	$where3  =   array(

                 'trans_dt'     => $this->input->post('trans_dt'),

				 'trans_no'   	=> $this->input->post('trans_no'),

            );

            $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);

							
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
									"b.cat_desc");
									$where =array("a.catg=b.sl_no"=>NULL 	,
									"trans_dt" => $this->input->get('trans_dt'),
                    
									"trans_no" => $this->input->get('trans_no'));
			 
			$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
			// echo $this ->db->last_query();
			// die();
			
			$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);


			$product['dr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note a,mm_cr_note_category b ',$select3,$where,1);
// echo $this ->db->last_query();
// 			die();
		
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("dr_note/edit",$product);

	        $this->load->view('post_login/footer');
        }

    }

//delete
	public function deletedr_note() {

		$where  =   array(

					"trans_dt" => $this->input->get('trans_dt'),
					
					"trans_no" => $this->input->get('trans_no')
			);

		$this->DrcrnoteModel->f_delete('tdf_dr_cr_note', $where);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect('drcrnote/dr_note');

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


			$product['cr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note',NULL,$where,1);

		// echo $this->db->last_query();
		// die();
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("cr_note/edit",$product);

	        $this->load->view('post_login/footer');
        }

    }


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
?>
