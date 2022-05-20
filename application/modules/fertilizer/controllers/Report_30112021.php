<?php
    class Report extends MX_Controller{

        public function __construct(){

            parent::__construct();

            $this->load->model('ReportModel');

            $this->load->helper('paddyrate');

            $this->session->userdata('fin_yr');

            if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

       }
}

        public function rateslab(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

               $company     = $_POST['company'];

               $product     = $_POST['product'];

               $select      = array(

                'a.frm_dt',"a.to_dt","a.catg_id","a.sp_mt","a.sp_bag","a.sp_govt","b.cate_desc","c.comp_name");

               $where       = array(

                "a.catg_id  =  b.sl_no" => NULL,

                "a.comp_id"     =>  $company,

                "a.prod_id"     =>  $_POST['product'],

                "a.district"    =>  $this->session->userdata['loggedin']['branch_id'],

                "a.fin_id"      =>  $this->session->userdata['loggedin']['fin_id'],
                "a.comp_id   = c.comp_id" =>NULL
               );

               $data['rate']       =   $this->ReportModel->f_select("mm_sale_rate a,mm_category b,mm_company_dtls c", $select, $where, 0);

               $wher_comp      = array(

               "comp_id"    => $_POST['company']

               );
               $data['company_nm']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, $wher_comp, 1);
// echo $this->db->last_query();
// die();
               $wheres      = array(

                "prod_id"     =>  $_POST['product']

               );

               $data['product']    =   $this->ReportModel->f_select("mm_product", NULL,$wheres, 1);

               $where1             =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

               $data['branch']     =   $this->ReportModel->f_select("md_district", NULL, $where1, 1);
               $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, $wher_comp, 1);

               $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/rate_slab/rate_slab.php',$data);
            // $this->load->view('report/rate_slab/rate_slab_ip.php',$data);
               $this->load->view('post_login/footer');

            }else{

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

              
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/rate_slab/rate_slab_ip.php',$data);
                $this->load->view('post_login/footer');
            }

        }
         public function rateslabho(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $comp_id  = $_POST['company'];

                $district = $this->input->post('district');

                $frm_date = $this->input->post('fr_date');

                $to_date  = $this->input->post('to_date');

                $fin_id   = $this->session->userdata['loggedin']['fin_id'];

               $data['rate']     = $this->ReportModel->f_get_salerateho($comp_id,$district,$frm_date,$to_date,$fin_id);

               $wher_comp      = array(

                "comp_id"    => $_POST['company']
 
                );
               $data['company']  =  $this->ReportModel->f_select("mm_company_dtls", NULL,  $wher_comp, 1);

               $where1           =  array("district_code"  =>  $this->input->post('district'));

               $data['branch']   =  $this->ReportModel->f_select("md_district", NULL, $where1, 1);
              
               $this->load->view('post_login/fertilizer_main');
               $this->load->view('report/rate_slabho/rate_slab.php',$data);
               $this->load->view('post_login/footer');

            }else{

                $data['branch']     =   $this->ReportModel->f_get_district_asc();

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/rate_slabho/rate_slab_ip.php',$data);
                $this->load->view('post_login/footer');
            }

        }

        public function popProd(){

            $where  = array('company' => $this->input->get('company'));

            $data     = $this->ReportModel->f_select("mm_product", NULL, $where, 0);
   
            echo json_encode($data);
        }

        
/********************************************* */
public function stkStmt_ho(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    =   $_POST['from_date'];

        $to_dt      =   $_POST['to_date'];

        // $branch     =   $this->session->userdata['loggedin']['branch_id'];
        $branch  = $_POST['br'];

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));

        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

        $data['product']     =   $this->ReportModel->f_get_product_list($branch,$opndt);

        $data['opening']     =   $this->ReportModel->f_get_balance($branch,$opndt,$prevdt);

        $data['purchase']    =   $this->ReportModel->f_get_purchase($branch,$from_dt,$to_dt);

        $data['sale']        =   $this->ReportModel->f_get_sale($branch,$from_dt,$to_dt);

        $data['closing']     =   $this->ReportModel->f_get_balance($branch,$opndt,$to_dt);

        // $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
        $where1              =   array("district_code"  => $branch);
        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

        // echo $this->db->last_query();
        // die;
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/stk_stmt_ho/stk_stmt',$data);
        $this->load->view('post_login/footer');

    }else{
        $select1      = array("district_code","district_name");
        $data['all_branch']      =   $this->ReportModel->f_select("md_district", $select1, NULL,0);
        // echo $this->db->last_query();
        // die();
        $this->load->view('post_login/fertilizer_main');
        
        $this->load->view('report/stk_stmt_ho/stk_stmt_ip',$data);
        $this->load->view('post_login/footer');
    }

}
/***********************cr note demand report*********************/
public function soc_wse_cr_dmd(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    =   $_POST['from_date'];

        $to_dt      =   $_POST['to_date'];

        // $branch     =   $this->session->userdata['loggedin']['branch_id'];
        $branch  = $_POST['br'];

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));

        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));


        $data['product']     =   $this->ReportModel->f_get_product_list($branch,$opndt);

        // $data['opening']     =   $this->ReportModel->f_get_balance($branch,$opndt,$prevdt);

        // $data['purchase']    =   $this->ReportModel->f_get_purchase($branch,$from_dt,$to_dt);

        // $data['sale']        =   $this->ReportModel->f_get_sale($branch,$from_dt,$to_dt);

        // $data['closing']     =   $this->ReportModel->f_get_balance($branch,$opndt,$to_dt);

       $data['crdmnd']     =   $this->ReportModel->f_get_crdemand($branch,$opndt,$to_dt);

        // $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
        $where1              =   array("district_code"  => $branch);
        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
        $where2             =   array("district"  => $branch);

        // echo $this->db->last_query();
        // die;
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/soc_wse_cr_dmd/stk_stmt',$data);
        $this->load->view('post_login/footer');

    }else{
        $select1      = array("district_code","district_name");
        $data['all_branch']      =   $this->ReportModel->f_select("md_district", $select1, NULL,0);
        // echo $this->db->last_query();
        // die();
        $this->load->view('post_login/fertilizer_main');
        
        $this->load->view('report/soc_wse_cr_dmd/stk_stmt_ip',$data);
        $this->load->view('post_login/footer');
    }

}
/************************************************************** */

/******************************************* */
        public function stkStmt(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');
                //   echo $opndt ;
                //   die();
                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                $data['product']     =   $this->ReportModel->f_get_product_list($branch,$opndt);

                $data['opening']     =   $this->ReportModel->f_get_balance($branch,$opndt,$prevdt);
               // $data['opening']     =   $this->ReportModel->f_get_balance($branch,$from_dt,$to_dt,$opndt);
               
            //   echo $this->db->last_query();
            //  die();
                $data['purchase']    =   $this->ReportModel->f_get_purchase($branch,$from_dt,$to_dt);

                $data['sale']        =   $this->ReportModel->f_get_sale($branch,$from_dt,$to_dt);

                // $data['closing']     =   $this->ReportModel->f_get_balance($branch,$opndt,$to_dt);
                // $data['closing']     =   $this->ReportModel->f_get_balance($branch,$from_dt,$to_dt,$opndt);
                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
                
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stmt/stk_stmt',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stmt/stk_stmt_ip');
                $this->load->view('post_login/footer');
            }

        }
/************************************************************ */
public function ps_pl(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    =   $_POST['from_date'];

        $to_dt      =   $_POST['to_date'];

        $branch     =   $this->session->userdata['loggedin']['branch_id'];

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));
        $all_data            =   array($from_dt,$to_dt,$branch );
        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

        $data['product']     =   $this->ReportModel->f_get_product_list($branch,$opndt);

        // $data['opening']  =   $this->ReportModel->f_get_balance($branch,$opndt,$prevdt);

        // $data['purchase'] =   $this->ReportModel->f_get_purchase($branch,$from_dt,$to_dt);

        // $data['sale']     =   $this->ReportModel->f_get_sale($branch,$from_dt,$to_dt);

        // $data['closing']  =   $this->ReportModel->f_get_balance($branch,$opndt,$to_dt);

        $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
       
        $data['all_data']    =   $this->ReportModel->p_ro_wise_prof_calc($all_data);
    //  echo $this->db->last_query();
    //  die();
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/sp_pl/stk_stmt',$data);
        $this->load->view('post_login/footer');

    }else{

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/sp_pl/stk_stmt_ip');
        $this->load->view('post_login/footer');
    }

}
/************************************************************ */
public function ps_pl_all(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    =   $_POST['from_date'];

        $to_dt      =   $_POST['to_date'];

        // $branch     =   $this->session->userdata['loggedin']['branch_id'];

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));
        $all_data            =   array($from_dt,$to_dt );
        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

        $data['product']     =   $this->ReportModel->f_get_product_list_nw($opndt);

        // $data['opening']  =   $this->ReportModel->f_get_balance($branch,$opndt,$prevdt);

        // $data['purchase'] =   $this->ReportModel->f_get_purchase($branch,$from_dt,$to_dt);

        // $data['sale']     =   $this->ReportModel->f_get_sale($branch,$from_dt,$to_dt);

        // $data['closing']  =   $this->ReportModel->f_get_balance($branch,$opndt,$to_dt);

        // $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

        // $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
       
        $data['all_data']    =   $this->ReportModel->p_ro_wise_prof_calc_all($all_data);
    //  echo $this->db->last_query();
    //  die();
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/sp_pl_all/stk_stmt',$data);
        $this->load->view('post_login/footer');

    }else{

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/sp_pl_all/stk_stmt_ip');
        $this->load->view('post_login/footer');
    }

}

/************************************************************ */
        // Company Wise Stock Statement 12/10/2020 //

        public function stkScomp(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $comp_id    =   $this->input->post('company');

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                $data['product']     =   $this->ReportModel->f_get_product_list_companywise($branch,$opndt,$comp_id);

                // $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$prevdt);
                $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$from_dt,$to_dt,$opndt);

                $data['purchase']    =   $this->ReportModel->f_get_purchase_rowise($branch,$from_dt,$to_dt);

                $data['sale']        =   $this->ReportModel->f_get_sale_rowise($branch,$from_dt,$to_dt);

                // $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$to_dt);
                $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$from_dt,$to_dt,$opndt);
                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_comp/stk_comp',$data);
                $this->load->view('post_login/footer');

            }else{

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_comp/stk_comp_ip',$data);
                $this->load->view('post_login/footer');
            }

        }
        /********product wise stock statement*********************/

        public function stkSprod(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $comp_id    =   $this->input->post('company');
                $prod_id    =   $this->input->post('product');
                
                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                // $data['product']     =   $this->ReportModel->f_get_product_list_companywise($branch,$opndt,$comp_id);
                $data['product']     =   $this->ReportModel->f_get_product_list_rep($branch,$opndt,$prod_id);
                // echo $this->db->last_query();
                // die();
                // $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$prevdt);
                $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$from_dt,$to_dt,$opndt);

                $data['purchase']    =   $this->ReportModel->f_get_purchase_rowise($branch,$from_dt,$to_dt);

                $data['sale']        =   $this->ReportModel->f_get_sale_rowise($branch,$from_dt,$to_dt);

                // echo $this->db->last_query();
                // exit;
                // $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$to_dt);
                $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$from_dt,$to_dt,$opndt);
                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_prod/stk_prod',$data);
                $this->load->view('post_login/footer');

            }else{

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_prod/stk_prod_ip',$data);
                $this->load->view('post_login/footer');
            }

        }
/******************************************************* */
public function stkScomp_ho(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    =   $_POST['from_date'];

        $to_dt      =   $_POST['to_date'];

        $comp_id    =   $this->input->post('company');

        // $branch     =   $this->session->userdata['loggedin']['branch_id'];
        $branch  = $_POST['br'];


        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));

        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

        $data['product']     =   $this->ReportModel->f_get_product_list_companywise($branch,$opndt,$comp_id);

        // $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$prevdt);
        $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$from_dt,$to_dt,$opndt);

        $data['purchase']    =   $this->ReportModel->f_get_purchase_rowise($branch,$from_dt,$to_dt);

        $data['sale']        =   $this->ReportModel->f_get_sale_rowise($branch,$from_dt,$to_dt);

        // $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$to_dt);
        $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$from_dt,$to_dt,$opndt);
        // $where1           =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
        $where1              =   array("district_code"  => $branch);
        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/stk_comp/stk_comp',$data);
        $this->load->view('post_login/footer');

    }else{
        $select1      = array("district_code","district_name");
        $data['all_branch']      =   $this->ReportModel->f_select("md_district", $select1, NULL,0);
        $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/stk_comp_ho/stk_comp_ip',$data);
        $this->load->view('post_login/footer');
    }

}


/******************************************************** */
         // Ro Wise Product Ledger 12/10/2020 //

        public function stkSprodro(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $comp_id    =   $this->input->post('company');

                $prod_id    =   $this->input->post('product');

                $ro         =   $this->input->post('ro');

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));
                $all_data            =   array($from_dt,$to_dt,$branch,$ro );
                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                $data['product']     =   $this->ReportModel->f_get_product_comp_prod_ro($branch,$from_dt,$to_dt,$comp_id,$prod_id,$ro);

                // $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$prevdt);

                // $data['purchase']    =   $this->ReportModel->f_get_purchase_rowise($branch,$from_dt,$to_dt);

                // $data['sale']        =   $this->ReportModel->f_get_sale_rowise($branch,$from_dt,$to_dt);
                $data['all_data']=$this->ReportModel->p_sale_purchase($all_data);

                $data['stkpoint']     =   $this->ReportModel->f_get_stockpoint($ro);

            //    echo  $this->db->last_query();
            //     die();


                // $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$to_dt);
                $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$from_dt,$to_dt,$opndt);

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
                
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_ro/stk_ro',$data);
                $this->load->view('post_login/footer');

            }else{

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_ro/stk_ro_ip',$data);
                $this->load->view('post_login/footer');
            }

        }

/********************************************************************************************* */

public function stkwsestprep(){
    $branch     =   $this->session->userdata['loggedin']['branch_id'];

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    =   $_POST['from_date'];

        $to_dt      =   $_POST['to_date'];

        $comp_id    =   $this->input->post('company');

        $prod_id    =   $this->input->post('product');

        // $ro         =   $this->input->post('ro');
        $soc_id     =   $this->input->post('soc_id');

        // $branch     =   $this->session->userdata['loggedin']['branch_id'];

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));
        $all_data            =   array($from_dt,$to_dt,$comp_id  ,$branch,$soc_id, $prod_id );
        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

        $data['product']     =   $this->ReportModel->f_get_product_dtls_stkp_wse($branch,$from_dt,$to_dt,$comp_id,$prod_id);
            //  echo $this->db->last_query();
            //     die();
        // $data['product']     =   $this->ReportModel->f_get_product_comp_prod_ro($branch,$from_dt,$to_dt,$comp_id,$prod_id,$ro);

        // $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$prevdt);

        // $data['purchase']    =   $this->ReportModel->f_get_purchase_rowise($branch,$from_dt,$to_dt);

        // $data['sale']        =   $this->ReportModel->f_get_sale_rowise($branch,$from_dt,$to_dt);
      
        // echo $this->db->last_query();
        // die();
        // $data['all_data']=$this->ReportModel->p_soc_wse_sale_purchase($all_data);
        // echo $this->db->last_query();
        //         die();
        // $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$to_dt);

        $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
        $data['all_data']=$this->ReportModel->p_soc_wse_sale_purchase($all_data);
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/stk_wse_p_s/stk_ro',$data);
        $this->load->view('post_login/footer');

    }else{
        $data['stockpoint']    =   $this->ReportModel->f_get_scendry_stk_point($branch); 
        
        $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/stk_wse_p_s/stk_ro_ip',$data);
        $this->load->view('post_login/footer');
    }

}

/********************************************************************************************* */
        public function f_get_prodsale_ro(){
            $dist_id = $this->session->userdata['loggedin']['branch_id'];
                $select = array("a.ro_no ","b.short_name" );
                       
                $where      =   array(
        
                "a.comp_id = b.comp_id"  => NULL,
                "a.comp_id"              =>  $this->input->get('company'),
                "a.prod_id"              =>  $this->input->get('prod_id'),
                "a.br"                  => $dist_id
                );
                   
             $ro   = $this->ReportModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
                
                 // echo $this->db->last_query();
                //  die();
                echo json_encode($ro);
        
        }
        

        public function gstrep(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                // $data['stkpoint']     =   $this->ReportModel->f_get_stockpoint($ro);
                
                $data['purchase']    =   $this->ReportModel->f_get_gst($from_dt,$to_dt);

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/gstinout/gst_stmt',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/gstinout/gst_stmt_ip');
                $this->load->view('post_login/footer');
            }

        }

/****************hsns summery for gst return ******************** */

public function hsnsumryrep(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    =   $_POST['from_date'];

        $to_dt      =   $_POST['to_date'];

        $branch     =   $this->session->userdata['loggedin']['branch_id'];

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));

        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

        // $data['stkpoint']     =   $this->ReportModel->f_get_stockpoint($ro);
        
        $data['purchase']    =   $this->ReportModel->f_get_hsn_gst($from_dt,$to_dt);

        $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/hsnsumry/gst_stmt',$data);
        $this->load->view('post_login/footer');

    }else{

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/hsnsumry/gst_stmt_ip');
        $this->load->view('post_login/footer');
    }

}

/********************************************* */
       
       
       
        public function purrep(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                // $data['stkpoint']     =   $this->ReportModel->f_get_stockpoint($ro);
                
                $data['purchase']    =   $this->ReportModel->f_get_purchaserep($branch,$from_dt,$to_dt);

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/purchase/pur_stmt',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/purchase/pur_stmt_ip');
                $this->load->view('post_login/footer');
            }

        }

        public function purrepbr(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                // $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $branch     =  $_POST['br'];
                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $all_data            =   array($from_dt,$to_dt,$branch);
                //$all_data            =   array('2020-04-01','2021-01-06','337');
                
                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
                
                // $data['purchase']    =   $this->ReportModel->f_get_purchaserep($branch,$from_dt,$to_dt);
                
                // $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
                $where1              =   array("district_code"  => $branch);
                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
                $select1      = array("district_code","district_name");
                $data['all_branch']      =   $this->ReportModel->f_select("md_district", $select1, NULL,0);
                $data['purchase']=$this->ReportModel->pc($all_data);
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/purchase_br/pur_stmt',$data);
                $this->load->view('post_login/footer');

            }else{
                $select1      = array("district_code","district_name");
                $data['all_branch']      =   $this->ReportModel->f_select("md_district", $select1, NULL,0);
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/purchase_br/pur_stmt_ip',$data);
                $this->load->view('post_login/footer');
            }

        }

        public function salerep(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
                
                $data['sales']       =   $this->ReportModel->f_get_sales($branch,$from_dt,$to_dt);

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale/output',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale/input');
                $this->load->view('post_login/footer');
            }

        }


        public function salerepbr(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $soc_id     =   $this->input->post('soc_id');

                $br         =   $this->input->post('br');

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']   =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
                
                $data['sales']      =   $this->ReportModel->f_get_sales_society($branch,$from_dt,$to_dt,$soc_id);
                $data['br_sales']   =   $this->ReportModel->f_get_sales_branch($from_dt,$to_dt,$br);
                // echo $this->db->last_query();
                // die();
                $where1             =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
                $where2             =   array("district_code"  => $br);
                $select1            =   array("district_code","district_name");
                $data['branch']     =   $this->ReportModel->f_select("md_district", NULL, $where2,1);
                $data['all_branch'] =   $this->ReportModel->f_select("md_district", $select1, NULL,0);
                // echo $this->db->last_query();
                // die();
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale_br/output',$data);
                $this->load->view('post_login/footer');

            }else{

                $select      = array("soc_id","soc_name");
                $select1     = array("district_code","district_name");
                $where       = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

                $society['societyDtls']   = $this->ReportModel->f_select('mm_ferti_soc',$select,$where,0);
                $data['all_branch']       = $this->ReportModel->f_select("md_district", $select1, NULL,0);
                $this->load->view('post_login/fertilizer_main');
                // $this->load->view('report/sale_society/input',$society);
                $this->load->view('report/sale_br/input',$data);
                $this->load->view('post_login/footer');
            }

        }
        public function salerepsoc(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];
                // $branch  =  $_POST['br'];
                $soc_id     =   $this->input->post('soc_id');
                $soc_name = $this->ReportModel->get_fersociety_name($soc_id );
            //    echo $soc_id;
            //    die();
                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));
                $all_data   =  array($from_dt,$to_dt,$branch,$soc_id );
                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
                
              // $data['sales']    =   $this->ReportModel->f_get_sales_society($branch,$from_dt,$to_dt,$soc_id);  
             //   echo $this->db->last_query();
            //   die();
               
                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
                $data['sales']=$this->ReportModel->p_soc_wise_sale($all_data);
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale_society/salesocrep',$data);
                $this->load->view('post_login/footer');

            }else{

                $select      = array("soc_id","soc_name");
                
                $where       = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

                $society['societyDtls']   = $this->ReportModel->f_select('mm_ferti_soc',$select,$where,0);
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale_society/input',$society);
                $this->load->view('post_login/footer');
            }

        }
/******************************************************* */
public function salerep_psoc(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    =   $_POST['from_date'];

        $to_dt      =   $_POST['to_date'];
        // $branch  =  $_POST['br'];
        $soc_id     =   $this->input->post('soc_id');
        $soc_name = $this->ReportModel->get_fersociety_name($soc_id );
    //    echo $soc_id;
    //    die();
        $branch     =   $this->session->userdata['loggedin']['branch_id'];

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));
        $all_data   =  array($from_dt,$to_dt,$branch,$soc_id );
        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
        
      // $data['sales']    =   $this->ReportModel->f_get_sales_society($branch,$from_dt,$to_dt,$soc_id);  
     //   echo $this->db->last_query();
    //   die();
       
        $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
        $data['sales']=$this->ReportModel->p_psoc_wise_sale($all_data);
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/sale_psociety/salerep_p_soc',$data);
        $this->load->view('post_login/footer');

    }else{

        $select      = array("soc_id","soc_name");
        
        $where       = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

        $society['societyDtls']   = $this->ReportModel->f_select('mm_ferti_soc',$select,$where,0);
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/sale_psociety/input',$society);
        $this->load->view('post_login/footer');
    }

}
/***************************Society Wise Delivery Register************************************ */
// public function saledelivery_reg(){

//     if($_SERVER['REQUEST_METHOD'] == "POST") {

//         $from_dt    =   $_POST['from_date'];

//         $to_dt      =   $_POST['to_date'];
//         // $branch  =  $_POST['br'];
//         $soc_id     =   $this->input->post('soc_id');
//         $soc_name = $this->ReportModel->get_fersociety_name($soc_id );
//     //    echo $soc_id;
//     //    die();
//         $branch     =   $this->session->userdata['loggedin']['branch_id'];

//         $mth        =  date('n',strtotime($from_dt));

//         $yr         =  date('Y',strtotime($from_dt));
//         $all_data   =  array($from_dt,$to_dt,$branch,$soc_id );
//         if($mth > 3){

//             $year = $yr;

//         }else{

//             $year = $yr - 1;
//         }

//         $opndt      =  date($year.'-04-01');

//         $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

//         $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
        
//       // $data['sales']    =   $this->ReportModel->f_get_sales_society($branch,$from_dt,$to_dt,$soc_id);  
//      //   echo $this->db->last_query();
//     //   die();
       
//         $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
//         $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
//         $data['sales']=$this->ReportModel->p_delivery_reg($from_dt,$to_dt,$branch ,$soc_id   );
//         $this->load->view('post_login/fertilizer_main');
//         $this->load->view('report/sale_duesociety/salerep_p_soc',$data);
//         $this->load->view('post_login/footer');

//     }else{

//         $select      = array("soc_id","soc_name");
        
//         $where       = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

//         $society['societyDtls']   = $this->ReportModel->f_select('mm_ferti_soc',$select,$where,0);
//         $this->load->view('post_login/fertilizer_main');
//         $this->load->view('report/sale_duesociety/input',$society);
//         $this->load->view('post_login/footer');
//     }

// }
public function saledelivery_reg(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        // $from_dt    =   $_POST['from_date'];

        // $to_dt      =   $_POST['to_date'];

        $from_dt = isset($_POST['from_date']) ? $_POST['from_date'] : date('Y-m-d');
        $to_dt   = isset($_POST['to_date']) ? $_POST['to_date'] : date('Y-m-d');
        
        $soc_id     =   $this->input->post('soc_id');
        $soc_name   = $this->ReportModel->get_fersociety_name($soc_id );
            //echo $soc_id;
            //die();
        $branch     =   $this->session->userdata['loggedin']['branch_id'];
        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));
        $all_data   =  array($from_dt,$to_dt,$branch,$soc_id );
        
        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
    
       
        $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
        $data['sales']=$this->ReportModel->p_delivery_reg($from_dt,$to_dt,$branch ,$soc_id   );
        $select_soc      = array("soc_id","soc_name");
        
        $where_soc      = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

        $data['societyDtls']   = $this->ReportModel->f_select('mm_ferti_soc',$select_soc,$where_soc,0);
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/sale_duesociety/input',$data);
        $this->load->view('post_login/footer');

    }
    else{

        $select      = array("soc_id","soc_name");
        
        $where       = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

        $society['societyDtls']   = $this->ReportModel->f_select('mm_ferti_soc',$select,$where,0);
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/sale_duesociety/input',$society);
        $this->load->view('post_login/footer');
    }

}

/**********************Company Wise Delivery Register************************* */
public function salecompdelivery_reg(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    =   $_POST['from_date'];

        $to_dt      =   $_POST['to_date'];
        
        // $branch  =  $_POST['br'];
        $soc_id     =   $this->input->post('soc_id');
        $comp_id = $this->input->post('company');
        $soc_name = $this->ReportModel->get_fersociety_name($soc_id );
        $comp_name =$this->ReportModel->get_comp_name($comp_id);
    //    echo $soc_id;
    //    die();
        $branch     =   $this->session->userdata['loggedin']['branch_id'];

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));
        $all_data   =  array($from_dt,$to_dt,$branch,$soc_id );
        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt      =  date($year.'-04-01');

        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
        
      // $data['sales']    =   $this->ReportModel->f_get_sales_society($branch,$from_dt,$to_dt,$soc_id);  
     //   echo $this->db->last_query();
    //   die();
       
        $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
        $data['sales']=$this->ReportModel->p_delivery_reg_compwse($from_dt,$to_dt,$branch ,$comp_id   );
    //         echo $this->db->last_query();
    //   die();
        $select      = array("COMP_ID","COMP_NAME");
        
        $where_dist         = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);
        $data['compdtls']   = $this->ReportModel->f_select('mm_company_dtls',$select,NUll,0);
        $this->load->view('post_login/fertilizer_main');
       // $this->load->view('report/sale_duesocietycm/salerep_p_soc',$data);
        $this->load->view('report/sale_duesocietycm/input',$data);
        $this->load->view('post_login/footer');

    }else{

        $select      = array("COMP_ID","COMP_NAME");
        
        $where       = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);
        $company['compdtls']   = $this->ReportModel->f_select('mm_company_dtls',$select,NUll,0);
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/sale_duesocietycm/input',$company);
        $this->load->view('post_login/footer');
    }

}
/***********************customer payble and paid************************************* */

public function cust_payblepaid(){
    $from_dt = isset($_POST['from_date']) ? $_POST['from_date'] : date('Y-m-d');
    $to_dt = isset($_POST['to_date']) ? $_POST['to_date'] : date('Y-m-d');

    $product = array();
    $branch = array();
    $all_data = array();
    $paid = array();
    $br_name = array();


    if(isset($_POST['submit'])){
        $branch     =   $this->session->userdata['loggedin']['branch_id'];
    
        $mth        =  date('n',strtotime($from_dt));
    
        $yr         =  date('Y',strtotime($from_dt));
        // $all_data   =   array($from_dt,$to_dt,$branch );
        if($mth > 3){
    
            $year = $yr;
    
        }else{
    
            $year = $yr - 1;
        }
    
        $opndt      =  date($year.'-04-01');
    
        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));
    
        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
    
        $product    =   $this->ReportModel->f_get_product_list($branch,$opndt);
    
    
    
        $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
    
        $br_name      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);
       
        $all_data=$this->ReportModel->f_get_soc_pay($from_dt,$to_dt , $branch);
        //  echo $this->db->last_query();
        $paid=$this->ReportModel->f_get_soc_paid($from_dt,$to_dt , $branch);
        // $adv=$this->ReportModel->f_get_advrecv($from_dt,$to_dt , $branch);
        // echo '<pre>';var_dump($all_data);exit;
    }
        
        $data = array(
            'frm_dt' => $from_dt,
            'to_dt' => $to_dt,
            'product' => $product,
            'branch' => $branch,
            'all_data' => $all_data,
            'paid' => $paid,
            'br_name' => $br_name
        );
    
        $this->load->view('post_login/fertilizer_main');
    
        $this->load->view('report/cust_payblepaid/stk_stmt_ip',$data);
    
        $this->load->view('post_login/footer');
    }

public function soc_payblepaid(){
    if($_SERVER['REQUEST_METHOD'] == "POST") {
    
        $from_dt    =   $_POST['from_date'];
    
        $to_dt      =   $_POST['to_date'];
    
         $comp      = $_POST['company'];
        //  echo $comp;
        //  exit;
        $branch     =   $this->session->userdata['loggedin']['branch_id'];
    
        $mth        =  date('n',strtotime($from_dt));
    
        $yr         =  date('Y',strtotime($from_dt));
        $all_data   =   array($from_dt,$to_dt,$comp );
        if($mth > 3){
    
            $year = $yr;
    
        }else{
    
            $year = $yr - 1;
        }
    
        $opndt      =  date($year.'-04-01');
    
        $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));
    
        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
    
         $data['product']  =   $this->ReportModel->f_get_product_list_nw($opndt);
    
    
        $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
    
        $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, NULL,1);
        // $data['company']      =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL,1);
        $data['all_data']    =   $this->ReportModel->f_get_allsoc_pay($from_dt,$to_dt,$comp );
             //  echo $this->db->last_query();
            //  die();
    
        $data['paid']=$this->ReportModel->f_get_allsoc_paid($from_dt,$to_dt);

       //  echo $this->db->last_query();
      //  die();
     // echo ('hi');
    // exit;

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/soc_payblepaid/stk_stmt',$data);
        $this->load->view('post_login/footer');
    
    }else{
        $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);
        $this->load->view('post_login/fertilizer_main');
        $this->load->view('report/soc_payblepaid/stk_stmt_ip',$data);
        $this->load->view('post_login/footer');
    }
    
    }
    

/********************************************************* */

        public function stkstkpnt(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                // $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $comp_id    =   $this->input->post('company');

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                // $mth        =  date('n',strtotime($from_dt));

                // $yr         =  date('Y',strtotime($from_dt));

                $mth        =  date('n',strtotime($to_dt));

                $yr         =  date('Y',strtotime($to_dt));
                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                // $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                // $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
                $_SESSION['date']    =   date('d/m/Y',strtotime($to_dt));
                $data['product']     =   $this->ReportModel->f_get_product_list($branch,$opndt);

                $data['stocks']      =   $this->ReportModel->f_get_stock_stockwise($branch,$to_dt);


                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stkpnt/stk_stkpnt',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stkpnt/stk_stkpnt_ip');
                $this->load->view('post_login/footer');
            }

        }
        
    }
?>