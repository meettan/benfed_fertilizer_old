<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

    class LeaveM extends CI_Model
    {

        public function f_get_leaveType_table()
        {

            $sql = $this->db->query(" SELECT * FROM md_leave_allocation ");
            return $sql->result();

        }


        public function f_get_leaveType_max_slNo() // FOr md_leave_allocation table's sl_no
        {

            $sql = $this->db->query(" SELECT MAX(sl_no) AS sl_no FROM md_leave_allocation ");
            return $sql->row();

        }

        public function leaveTypeEntry($sl_no, $type, $start_month, $end_month, $amount, $credit_on, $created_by, $created_dt)
        {

            $value = array('sl_no' => $sl_no,
                            'type' => $type,
                            'start_month' => $start_month,
                            'end_month' => $end_month,
                            'amount' => $amount,
                            'credit_on' => $credit_on,
                            'created_by' =>  $created_by,
                            'created_dt' => $created_dt );

            $this->db->insert('md_leave_allocation', $value);

        }


        public function f_get_leaveType_editData($sl_no)
        {

            $sql = $this->db->query(" SELECT * FROM md_leave_allocation WHERE sl_no = $sl_no ");
            return $sql->result();

        }

        public function updateLeaveType($sl_no, $type, $start_month, $end_month, $amount, $credit_on, $modified_by, $modified_dt)
        {

            $value = array('sl_no' => $sl_no,
                            'type' => $type,
                            'start_month' => $start_month,
                            'end_month' => $end_month,
                            'amount' => $amount,
                            'credit_on' => $credit_on,
                            'modified_by' => $modified_by,
                            'modified_dt' => $modified_dt );

            $this->db->where('sl_no', $sl_no);
            $this->db->update('md_leave_allocation', $value);

        }


        public function deleteLeaveType($sl_no)
        {

            $sql = $this->db->query(" DELETE FROM md_leave_allocation WHERE sl_no = $sl_no ");

        }



        /////////////////////////////////////
        // for Leave Allocation table --
        /////////////////////////////////////

        public function f_get_leaveAlloaction_table()
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_dtls WHERE trans_type = 'O'
                                    AND YEAR(trans_dt) = YEAR(CURDATE()) ");
            return $sql->result();

        }

        public function f_get_active_employees()
        {

            $sql = $this->db->query(" SELECT DISTINCT a.emp_no FROM td_leave_dtls a, md_employee b 
                                    WHERE a.emp_no = b.emp_code 
                                    AND a.emp_name = b.emp_name 
                                    AND b.emp_status = 'A'"
                                     );
                                     
            return $sql->result();

        }

        public function f_get_tableData_forAllocation($emp_no, $trans_dt, $trans_cd)
        {

            $sql = $this->db->query(" SELECT emp_no, emp_name, cl_bal, el_bal, ml_bal, od_bal FROM td_leave_dtls 
                                    WHERE emp_no = '$emp_no' AND trans_dt = '$trans_dt' AND trans_cd = $trans_cd ");

            return $sql->result();

        }

        public function f_get_employeeData()
        {

            $sql = $this->db->query(" SELECT emp_code, emp_name FROM md_employee ");
            return $sql->result();

        }

        public function f_get_maxTransDt_forAllocation($emp_cd)
        {

            $sql = $this->db->query(" SELECT MAX(trans_dt) AS trans_dt FROM td_leave_dtls WHERE emp_no = '$emp_cd' ");
            return $sql->row();

        }

        public function f_get_maxTransCd_forAllocation($emp_cd, $trans_dt)
        {

            $sql = $this->db->query(" SELECT MAX(trans_cd) AS trans_cd FROM td_leave_dtls WHERE emp_no = '$emp_cd' AND trans_dt = '$trans_dt' ");
            return $sql->row();

        }

        public function js_get_currentBal_forAllocation($emp_cd, $trans_dt, $trans_cd)
        {

            $sql = $this->db->query(" SELECT cl_bal, el_bal, ml_bal, od_bal FROM td_leave_dtls WHERE
                                    trans_dt = '$trans_dt' AND trans_cd = $trans_cd AND emp_no = '$emp_cd' ");
            return $sql->result();

        }

        public function f_get_allocation_transCd($trans_dt)
        {

            $sql = $this->db->query(" SELECT MAX(trans_cd) AS trans_cd FROM td_leave_dtls WHERE trans_dt = '$trans_dt' ");
            return $sql->row();

        }
        
        public function f_get_allocation_empName($emp_no)
        {

            $sql = $this->db->query(" SELECT emp_name FROM md_employee WHERE emp_code = $emp_no ");
            return $sql->row();

        }

        // for allocation entry --
        public function leaveAllocationEntry($trans_dt, $trans_cd, $trans_type, $emp_no, $emp_name, $docket_no,
                                                $leave_type, $leave_mode, $from_dt, $to_dt, $remarks, $approval_status,
                                                $approved_dt, $approved_by, $rollback_reason, $roll_dt, $roll_by, 
                                                $cl_bal, $el_bal, $ml_bal, $od_bal, $created_by, $created_dt)
        {

            $value = array('trans_dt' => $trans_dt,
                            'trans_cd' => $trans_cd,
                            'trans_type' => $trans_type,
                            'emp_no' => $emp_no,
                            'emp_name' => $emp_name,
                            'docket_no' => $docket_no,
                            'leave_type' => $leave_type,
                            'leave_mode' => $leave_mode,
                            'from_dt' => $from_dt,
                            'to_dt' => $to_dt,
                            'remarks' => $remarks,
                            'approval_status' => $approval_status,
                            'approved_dt' => $approved_dt,
                            'approved_by' => $approved_by,
                            'rollback_reason' => $rollback_reason,
                            'roll_dt' => $roll_dt,
                            'roll_by' => $roll_by,
                            'cl_bal' => $cl_bal,
                            'el_bal' => $el_bal,
                            'ml_bal' => $ml_bal,
                            'od_bal' => $od_bal,
                            'created_by' => $created_by,
                            'created_dt' => $created_dt );

            $this->db->insert('td_leave_dtls', $value);

        }

        public function f_get_allocation_editData($trans_cd, $trans_dt)
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_dtls WHERE trans_dt = '$trans_dt' AND trans_cd = $trans_cd ");
            return $sql->result();

        }

        public function updateLeaveAllocation($trans_dt, $trans_cd, $emp_no, $cl_bal, $el_bal, $ml_bal, $modified_by, $modified_dt)
        {

            $value = array('emp_no' => $emp_no,
                            'cl_bal' => $cl_bal,
                            'el_bal' => $el_bal,
                            'ml_bal' => $ml_bal,
                            'modified_by' => $modified_by,
                            'modified_dt' => $modified_by );

            $this->db->where('trans_dt', $trans_dt);
            $this->db->where('trans_cd', $trans_cd);
            $this->db->update('td_leave_dtls', $value);

        }


        public function deleteLeaveAllocation($trans_dt, $trans_cd)
        {

            $sql = $this->db->query(" DELETE FROM td_leave_dtls WHERE trans_dt = '$trans_dt' AND trans_cd = $trans_cd ");

        }

        //////////////////////////////////
        // For Leave Applicaton --> 
        /////////////////////////////////
        public function f_get_leaveAppliedDtls($emp_cd)
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_dtls WHERE emp_no = $emp_cd AND 
                                    YEAR(trans_dt) = YEAR(CURDATE()) AND trans_type = 'T' ");
            return $sql->result();


        }

        // For JS
        public function js_get_maxTransDt($emp_cd)
        {

            $sql = $this->db->query(" SELECT MAX(trans_dt) as trans_dt FROM td_leave_dtls WHERE emp_no = $emp_cd ");
            return $sql->row();

        }


        // for JS 
        public function js_get_apply_leaveBalance($leave_type, $emp_cd, $trans_dt)
        {

            $sql = $this->db->query(" SELECT emp_name, cl_bal, el_bal, ml_bal, od_bal FROM td_leave_dtls WHERE emp_no = '$emp_cd' AND 
                                    trans_dt = '$trans_dt'
                                    AND trans_cd = (SELECT MAX(trans_cd) FROM td_leave_dtls WHERE emp_no = '$emp_cd' AND trans_dt = '$trans_dt' ) ");
                                    
            
            return $sql->result();

        }

        public function f_get_leaveApply_employeeName($emp_no)
        {

            $sql = $this->db->query(" SELECT emp_name FROM md_employee WHERE emp_code = $emp_no ");
            return $sql->row();

        }

        public function f_get_leaveBal_on_maxTransaction($emp_no)
        {

            $sql = $this->db->query(" SELECT cl_bal, el_bal, ml_bal, od_bal FROM td_leave_dtls WHERE emp_no = $emp_no AND 
                                    trans_dt = (SELECT MAX(trans_dt) FROM td_leave_dtls WHERE emp_no = $emp_no)
                                    AND trans_cd = (SELECT trans_cd FROM td_leave_dtls WHERE emp_no = $emp_no 
                                    AND trans_dt = (SELECT MAX(trans_dt) FROM td_leave_dtls WHERE emp_no = $emp_no) ) ");
                                     
            return $sql->result();

        }

        public function leaveApplyEntry($trans_dt, $trans_cd, $trans_type, $emp_no, $emp_name, $docket_no, $leave_type, 
                                        $from_dt, $to_dt, $no_of_days, $leave_mode, $approval_status, $remarks, $cl_bal, $el_bal, $ml_bal, $od_bal, $created_by, $created_dt )
        {

            $value = array('trans_dt' => $trans_dt,
                            'trans_cd' => $trans_cd,
                            'trans_type' => $trans_type,
                            'emp_no' => $emp_no,
                            'emp_name' => $emp_name,
                            'docket_no' => $docket_no,
                            'leave_type' => $leave_type,
                            'from_dt' => $from_dt,
                            'to_dt' => $to_dt,
                            'no_of_days' => $no_of_days,
                            'leave_mode' => $leave_mode,
                            'approval_status' => $approval_status,
                            'remarks' => $remarks,
                            'cl_bal' => $cl_bal,
                            'el_bal' => $el_bal,
                            'ml_bal' => $ml_bal,
                            'od_bal' => $od_bal,
                            'created_by' => $created_by,
                            'created_dt' => $created_dt );

            $this->db->insert('td_leave_dtls', $value);

        }

        public function f_get_leaveApply_editData($trans_dt, $trans_cd)
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_dtls WHERE trans_dt = '$trans_dt' AND trans_cd = $trans_cd ");
            return $sql->result();

        }


        public function updateLeaveApplication($trans_dt, $trans_cd, $emp_no, $emp_name, $leave_type, $from_dt, $to_dt, 
                                                $no_of_days, $remarks, $modified_by, $modified_dt )
        {

            $value = array('emp_no' => $emp_no,
                            'emp_name' => $emp_name,
                            'leave_type' => $leave_type,
                            'from_dt' => $from_dt,
                            'to_dt' => $to_dt,
                            'no_of_days' => $no_of_days,
                            'remarks' => $remarks,
                            'modified_by' => $modified_by,
                            'modified_dt' => $modified_dt );

            $this->db->where('trans_dt', $trans_dt);
            $this->db->where('trans_cd', $trans_cd);

            $this->db->update('td_leave_dtls', $value);

        }

        public function deleteLeaveApply($trans_dt, $trans_cd)
        {

            $sql = $this->db->query(" DELETE FROM td_leave_dtls WHERE trans_dt = '$trans_dt' AND trans_cd = $trans_cd ");

        }


        ////////////////////////////////////////////////////

        public function f_get_mat_leave_appliedDtls($emp_cd)
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_mat WHERE emp_no = '$emp_cd' ");
            return $sql->result();

        }

        public function js_get_applied_matLeaveDtls($emp_cd)
        {

            $sql = $this->db->query(" SELECT trans_dt, no_of_days FROM td_leave_mat WHERE emp_no = '$emp_cd' ");
            return $sql->result();

        }


        public function f_get_matLeave_transCd($trans_dt)
        {

            $sql = $this->db->query(" SELECT MAX(trans_cd) AS trans_cd FROM td_leave_mat WHERE trans_dt = '$trans_dt' ");
            return $sql->row();

        }


        public function js_check_matLeave_entry($emp_cd)
        {

            $sql = $this->db->query(" SELECT COUNT(*) AS num_row FROM td_leave_mat WHERE emp_no = '$emp_cd' AND approval_status != 'R' ");
            return $sql->row();

        }

        public function matLeaveEntry($trans_dt, $trans_cd, $emp_no, $emp_name, $docket_no, $from_dt, $to_dt, $no_of_days,
        $approval_status, $remarks, $created_by, $created_dt )
        {

            $value = array('trans_dt' => $trans_dt,
                            'trans_cd' => $trans_cd,
                            'emp_no' => $emp_no,
                            'emp_name' => $emp_name,
                            'docket_no' => $docket_no,
                            'from_dt' => $from_dt,
                            'to_dt' => $to_dt,
                            'no_of_days' => $no_of_days,
                            'approval_status' => $approval_status,
                            'remarks' => $remarks,
                            'created_by' => $created_by,
                            'created_dt' => $created_dt );

            $this->db->insert('td_leave_mat', $value);

        }


        public function f_get_matLeave_editDtls($transCd, $transDt)
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_mat WHERE trans_dt = '$transDt' AND trans_cd = '$transCd' ");
            return $sql->result();

        }


        public function f_update_matLeaveEntry($trans_dt, $trans_cd, $docket_no, $from_dt, $to_dt,
                                                $no_of_days, $approval_status, $remarks, $modified_by, $modified_dt )
        {

            $value = array('docket_no' => $docket_no,
                            'from_dt' => $from_dt,
                            'to_dt' => $to_dt,
                            'no_of_days' => $no_of_days,
                            'approval_status' => $approval_status,
                            'remarks' => $remarks,
                            'modified_by' => $modified_by,
                            'modified_dt' => $modified_dt );

            $this->db->where('trans_dt', $trans_dt);
            $this->db->where('trans_cd', $trans_cd);
            $this->db->update('td_leave_mat', $value);

        }

        public function f_delete_matLeave($trans_dt, $trans_cd)
        {

            $sql = $this->db->query(" DELETE FROM td_leave_mat WHERE trans_dt = '$trans_dt' AND trans_cd = '$trans_cd' ");

        }



        ///////////////////////////////////////////////////
        public function f_get_approval_tableData()
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_dtls WHERE YEAR(trans_dt) = YEAR(CURDATE())
                                    AND trans_type = 'T' AND approval_status = 'U' ");
            return $sql->result();

        }

        public function approveLeaveApplication($trans_dt, $trans_cd, $approval_status, $approved_by, $approved_dt)
        {

            $value = array('approval_status' => $approval_status,
                        'approved_by' => $approved_by,
                        'approved_dt' => $approved_dt );

            $this->db->where('trans_dt', $trans_dt);
            $this->db->where('trans_cd', $trans_cd);

            $this->db->update('td_leave_dtls', $value);

        }


        public function rejectLeaveApplication($trans_dt, $trans_cd, $approval_status, $approved_by, $approved_dt)
        {

            $value = array('approval_status' => $approval_status,
                            'approved_by' => $approved_by,
                            'approved_dt' => $approved_dt );

            $this->db->where('trans_dt', $trans_dt);
            $this->db->where('trans_cd', $trans_cd);

            $this->db->update('td_leave_dtls', $value);

        }


        ///////////////////////////////////////////
        // For Mat Leave Approval -- 

        public function f_get_matLeave_approval_tableData()
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_mat WHERE approval_status = 'U' ORDER BY trans_dt ");
            return $sql->result();

        }

        public function f_get_matLeave_approval_view($trans_cd, $trans_dt)
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_mat WHERE trans_dt = '$trans_dt' AND trans_cd = '$trans_cd' ");
            return $sql->result();

        }

        public function approveMatLeaveApplication($trans_dt, $trans_cd, $approval_status, $approved_by, $approved_dt)
        {

            $value = array('approval_status' => $approval_status,
                            'approved_by' => $approved_by,
                            'approved_dt' => $approved_dt );

            $this->db->where('trans_dt', $trans_dt);
            $this->db->where('trans_cd', $trans_cd);
            $this->db->update('td_leave_mat', $value);

        }

        /////////////////////////////////////////////////////////
        // For deduction --


        public function f_get_deduction_tableData()
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_dtls WHERE approval_status = 'A' 
                                    AND YEAR(trans_dt) = YEAR(CURDATE()) ");
            return $sql->result();

        }

        public function f_get_leaveBal_for_adjustment($trans_dt, $trans_cd, $emp_no)
        {

            $sql = $this->db->query(" SELECT cl_bal, el_bal, ml_bal, od_bal FROM td_leave_dtls WHERE 
                                    trans_dt = '$trans_dt' AND trans_cd = $trans_cd AND emp_no = $emp_no ");
            
            return $sql->result();

        }


        public function adjustLeaveApplication($trans_dt, $trans_cd, $approval_status, $cl_bal, $el_bal, $ml_bal)
        {

            $value = array('approval_status' => $approval_status,
                            'cl_bal' => $cl_bal,
                            'el_bal' => $el_bal,
                            'ml_bal' => $ml_bal );

            $this->db->where('trans_dt', $trans_dt);
            $this->db->where('trans_cd', $trans_cd);

            $this->db->update('td_leave_dtls', $value);

        }


        ////////////////////////////////
        // For roll back
        public function js_get_applnDtls_for_rollback($docket)
        {

            $sql = $this->db->query(" SELECT * FROM td_leave_dtls WHERE docket_no = '$docket' AND trans_type = 'T' ");
            return $sql->result();

        }

        public function f_rollback_approvedLeave($rollBackValue, $docket_no, $emp_no)
        {

            $this->db->where('docket_no', $docket_no);
            $this->db->where('emp_no', $emp_no);
            $this->db->update('td_leave_dtls', $rollBackValue);

        }

        public function f_previous_leaveBal_for_rollBack($emp_no, $docket_no)
        {

            $sql = $this->db->query(" SELECT cl_bal, el_bal, ml_bal, od_bal FROM td_leave_dtls WHERE emp_no = $emp_no AND 
                                    trans_dt = (SELECT MAX(trans_dt) FROM td_leave_dtls WHERE emp_no = $emp_no AND docket_no != '$docket_no')
                                        AND trans_cd = (SELECT trans_cd FROM td_leave_dtls WHERE emp_no = $emp_no AND docket_no != '$docket_no'
                                        AND trans_dt = (SELECT MAX(trans_dt) FROM td_leave_dtls WHERE emp_no = $emp_no AND docket_no != '$docket_no') ) AND
                                    docket_no != '$docket_no' ");
                                     
            return $sql->result();

        }

        public function f_rollback_rejectLeave($docket_no, $emp_no, $array)
        {

            $this->db->where('docket_no', $docket_no);
            $this->db->where('emp_no', $emp_no);
            $this->db->update('td_leave_dtls', $array);

        }

        public function f_rollback_finalizedLeave($balanceArray, $docket_no, $emp_no)
        {

            $this->db->where('docket_no', $docket_no);
            $this->db->where('emp_no', $emp_no);
            $this->db->update('td_leave_dtls', $balanceArray);

        }


        /////////////////////////////////////////////
                    //For report section 
        ////////////////////////////////////////////
        public function f_get_report_openingBalance($emp_cd)
        {

            $sql = $this->db->query(" SELECT trans_dt, SUM(cl_bal) AS cl_bal, SUM(el_bal) AS el_bal, SUM(ml_bal) AS ml_bal, SUM(od_bal) AS od_bal FROM td_leave_dtls
                                    WHERE emp_no = $emp_cd AND trans_type = 'O' /*AND YEAR(trans_dt) = YEAR(CURDATE())*/ 
                                    GROUP BY trans_dt, emp_no, trans_type ");

            return $sql->result();

        }

        public function f_get_report_transactionBalance($emp_cd)
        {

            $sql = $this->db->query(" SELECT trans_dt, docket_no, leave_type, no_of_days, from_dt, to_dt, cl_bal, el_bal, ml_bal, od_bal FROM td_leave_dtls
                                    WHERE emp_no = $emp_cd AND trans_type = 'T' /*AND YEAR(trans_dt) = YEAR(CURDATE())*/ AND approval_status = 'F' ");

            return $sql->result();

        }

        public function f_get_latest_transDt($emp_cd)
        {

            $sql = $this->db->query(" SELECT MAX(trans_dt) AS trans_dt FROM td_leave_dtls WHERE emp_no = $emp_cd 
                                    AND YEAR(trans_dt) = YEAR(CURDATE()) ");

            return $sql->row();

        }


        public function f_get_latest_transDtId($maxTransDt, $emp_cd)
        {

            $sql = $this->db->query(" SELECT MAX(trans_cd) AS trans_cd FROM td_leave_dtls WHERE trans_dt = '$maxTransDt' AND emp_no = $emp_cd ");

            return $sql->row();

        }


        public function f_get_report_closingBalance($emp_cd, $maxTransDt, $maxTransId)
        {

            $sql = $this->db->query(" SELECT trans_dt, cl_bal, el_bal, ml_bal, od_bal FROM td_leave_dtls WHERE 
                                    emp_no = $emp_cd AND trans_dt = '$maxTransDt' AND trans_cd = '$maxTransId' ");

            return $sql->result();

        }














    }

?>
