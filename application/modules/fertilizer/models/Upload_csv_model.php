<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_csv_model extends CI_Model{

    function get_dmd_data(){
        $this->db->select('a.*');
         $this->db->where("a.file_name=''");
         $query = $this->db->get('td_iffco_upload a');
        //    echo $this->db->last_query();
        //    exit;
        return $query->result();
    }

    public function f_edit($table_name, $data_array, $where) {

        $this->db->where($where);
        $this->db->update($table_name, $data_array);

        return;

    }

    public function f_get_uploadinv($inv_no){
        $query  = $this->db->query("select  a.dist,a.soc,a.ro_no,a.inv_no,a.inv_dt,a.prod,a.qty,a.amt,a.file_name
                                    from td_iffco_upload a
                                    where    a.inv_no='$inv_no'");

        return $query->result();
    }

    function save($csv_data, $data){
        // echo '<pre>';
        // var_dump($data);exit;
        $input = array(
            'soc' => $csv_data[1],
            'dist' => $csv_data[0],
            'ro_no' => $csv_data[2],
            'inv_no' => $csv_data[3],
            'inv_dt' => date('Y-m-d', strtotime($csv_data[4])),
            'prod' => $csv_data[5],
            'qty' => $csv_data[6],
            'amt' => $csv_data[7],
            "created_by"    	=> $this->session->userdata['loggedin']['user_name'],    

            "created_dt"    	=>  date('Y-m-d h:i:s')
        );
        
        // if($this->check_data($input)){
            // $sql = '("emp_code", "member_id", "member_name", "dob", "month", "year", "tf_clr_bal", "gl_outstanding", "cl_outstanding", "gl_id", "cl_id", "tf_prn", "gl_tot", "gl_run", "gl_principal", "gl_interest", "cl_tot", "cl_run", "cl_principal", "cl_interest", "total_demand", "password")';
            $this->db->insert('td_iffco_upload', $input);
        // }
    }

    // function check_data($data){
        // $this->db->where(array(
        //     'member_id' => $data['member_id'],
        //     'month' => $data['month'],
        //     'year' => $data['year']
        // ));
    //     $query = $this->db->get('td_iffco_upload');
    //     if($query->num_rows() > 0){
    //         return false;
    //     }else{
    //         return true;
    //     }
    // }
}
?>