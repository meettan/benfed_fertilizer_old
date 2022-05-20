<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
    public function f_insert($table_name, $data_array)
    {

        $this->db->insert($table_name, $data_array);

        return;
    }

    public function f_edit($table_name, $data_array, $where)
    {

        $this->db->where($where);

        $this->db->update($table_name, $data_array);

        return;
    }

    public function f_select($table, $select = NULL, $where = NULL, $type)
    {

        if (isset($select)) {
            $this->db->select($select);
        }

        if (isset($where)) {
            $this->db->where($where);
        }

        $value = $this->db->get($table);

        if ($type == 1) {
            return $value->row();
        } else {
            return $value->result();
        }
    }

    function f_get_advjnl($frm_date,$to_date,$fin_id){
        $sql ="SELECT a.voucher_id, a.voucher_date,a.sl_no,a.remarks,a.amount,b.ac_name,a.dr_cr_flag,
                 a.voucher_type
         FROM td_vouchers a,md_achead b
          WHERE a.acc_code=b.sl_no 
          and a.voucher_date >= '$frm_date' AND a.voucher_date <= '$to_date'
          and a.voucher_type='A'
          
          order by a.voucher_date,a.sl_no " ;
            
        $query  = $this->db->query($sql);

        return $query->result();
    }
    function f_get_crjnl($frm_date,$to_date,$fin_yr){
        $sql ="SELECT a.voucher_id, a.voucher_date,a.sl_no,a.remarks,a.amount,b.ac_name,a.dr_cr_flag,
                 a.voucher_type
         FROM td_vouchers a,md_achead b
          WHERE a.acc_code=b.sl_no 
          and a.voucher_date >= '$frm_date' AND a.voucher_date <= '$to_date'
          and a.voucher_type='CRN'
        
          order by a.voucher_date,a.sl_no " ;
            
        $query  = $this->db->query($sql);

        return $query->result();
    }

    function f_get_sljnl($frm_date,$to_date,$fin_yr){
        $sql ="SELECT a.voucher_id, a.voucher_date,a.sl_no,a.remarks,a.amount,b.ac_name,a.dr_cr_flag,
                 a.voucher_type
         FROM td_vouchers a,md_achead b
          WHERE a.acc_code=b.sl_no 
          and a.voucher_date >= '$frm_date' AND a.voucher_date <= '$to_date'
          and a.voucher_type='SL'
        
          order by a.voucher_id,a.sl_no,a.dr_cr_flag,a.voucher_date " ;
            
        $query  = $this->db->query($sql);

        return $query->result();
    }

    function f_get_purjnl($frm_date,$to_date,$fin_yr){
        $sql ="SELECT a.voucher_id, a.voucher_date,a.sl_no,a.remarks,a.amount,b.ac_name,a.dr_cr_flag,
                 a.voucher_type
         FROM td_vouchers a,md_achead b
          WHERE a.acc_code=b.sl_no 
          and a.voucher_date >= '$frm_date' AND a.voucher_date <= '$to_date'
          and a.voucher_type='PUR'
        
          order by a.voucher_id,a.sl_no,a.dr_cr_flag,a.voucher_date " ;
            
        $query  = $this->db->query($sql);

        return $query->result();
    }

    }
