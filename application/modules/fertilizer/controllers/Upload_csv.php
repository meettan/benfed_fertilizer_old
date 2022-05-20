<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_csv extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_csv_model');
	}

    function index(){
        $demand_data['dmd_data'] = $this->upload_csv_model->get_dmd_data();
        // echo $this->db->last_query();
        // exit();
        // $data = array(
        //     'dmd_data' => array($demand_data),
		// 	'title' => 'Upload CSV'
        // );
        $this->load->view('post_login/fertilizer_main');
		$this->load->view('upload_csv/view', $demand_data);
        $this->load->view('post_login/footer');
    }

    function entry(){
        $data = array('title' => 'Upload CSV');
        $this->load->view('post_login/fertilizer_main',$data);
		$this->load->view('upload_csv/entry', $data);
        $this->load->view('post_login/footer');
    }

    function save(){
        $file = $_FILES['userfile']['tmp_name'];
        $handel = fopen($file, 'r');
        $c = 0;
        $header = '';
        $data = $this->input->post();
        while(($filepos = fgetcsv($handel, 1000, ',')) != false){
             //echo '<pre>';
             //var_dump($filepos);
            // if($c == 0){
            //     $header = $filepos;
            // }
            if($c > 0){
                $this->upload_csv_model->save($filepos, $data);
            }
            $c++;
        }
        // exit;
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Insert Successfully</div>');
        return true;
        
        
    }

    public function upload_pdf(){
        $config['upload_path']          = './assets/pdf/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
               
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $input = array(
                    'file_name' => $data['upload_data']['file_name']
                );
                $where = array('ro_no' => $this->input->post('ro_no'));
                $this->upload_csv_model->f_edit('td_iffco_upload', $input, $where);
                // echo $this->db->last_query();exit;
                redirect('fertilizer/upload_csv');
                
        }
}
/*********************************************** */



public function viewupload(){

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $inv_no    =   $_POST['inv_no'];
            
            $data['dmd_data']    =   $this->upload_csv_model->f_get_uploadinv($inv_no);

       // echo $this->db->last_query();
        // exit();

            $this->load->view('post_login/fertilizer_main');
            $this->load->view('upload_csv/view_stmt',$data);
            $this->load->view('post_login/footer');

        }else{

            $this->load->view('post_login/fertilizer_main');
            $this->load->view('upload_csv/view_stmt_ip');
            $this->load->view('post_login/footer');
        }

    }
/************************************************ */
}
?>