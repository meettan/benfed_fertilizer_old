<?php
	class Cronjob extends MX_Controller{
		protected $sysdate;
		protected $fin_year;
		public function __construct(){
		parent::__construct();	
		$this->load->model('DrcrnoteModel');
		// $this->load->helper('paddyrate_helper');

		    // if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            // redirect('User_Login/login');

            // }
		}

		public function dr_note_cron_job(){

		     $data    = array(
				      'fwd_flag'       => "Y"
					       );

	         $where  =   array(
                      'trans_dt'     =>  date("Y-m-d"),
					  'trans_flag'   => 'R'
					);
	
            $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);
            // $this->db->last_query();
            // die();
		}
 


}
?>
