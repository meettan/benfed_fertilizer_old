<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles extends MX_Controller {

    public function __construct(){

        parent::__construct();

        $this->load->model('Profile');
        
        //For User's Authentication
        if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('Welcome/index');

        }
        
    }

    public function index(){

        if ($_SESSION['module'] == 'F'){
            
            $this->load->view('post_login/fertilizer_main');

        }else{

            $this->load->view('post_login/main');

        }

        $this->load->view('dashboard');

        $this->load->view('post_login/footer');

    }

    public function f_changepass(){
        
        
        
       $oldPass = $this->input->post('old_pass');
     
        $newPass = $this->input->post('new_pass');
        
        $matchPass = $this->Profile->matchPass($oldPass);
        
		$temp = password_verify($oldPass,$matchPass->password);
        
		if ($temp) {

			$password = password_hash($newPass, PASSWORD_DEFAULT);
            $msgPass = $this->Profile->editPassProcess($password);
            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Password changed!',
                
                'status'    => 'success'
                
            );

        }
        else{

            $message    =   array( 
                    
                'message'   => 'Old password was wrong',
                
                'status'    => 'danger'
                
            );

        }

        $this->session->set_flashdata('msg', $message);

        redirect('profile');
    }

}

?>