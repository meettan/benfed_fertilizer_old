<?php

    class Leave extends MX_Controller
    {
        public function __construct()
        {
			parent::__construct();
            $this->load->model('LeaveM');
            
            if(!isset($this->session->userdata('loggedin')->user_id)){
            
                redirect('User_Login/login');
    
            }
        }

        // For leave master table -- 
        public function leaveType()
        {

            $this->load->view('post_login/main');

            $tableData['data'] = $this->LeaveM->f_get_leaveType_table();
            $this->load->view('type/leaveTable', $tableData);

            $this->load->view('post_login/footer');

        }


        // For leave type entry --
        public function addLeaveType()
        {

            $this->load->view('post_login/main');

            $this->load->view('type/addLeave');            

            $this->load->view('post_login/footer');

        }

        // For Leave type entry --
        public function leaveTypeEntry()
        {

            $slNo = $this->LeaveM->f_get_leaveType_max_slNo();
            $sl_no = $slNo->sl_no+1;
            
            if($this->session->userdata('loggedin'))
            {
                $created_by   =  $this->session->userdata('loggedin')->user_name; 
            }

            $created_dt       =     date('y-m-d H:i:s');
            
            if($_SERVER['REQUEST_METHOD']=="POST")
            {

                $type           =       $_POST['type'];
                $start_month    =       $_POST['start_month'];
                $end_month      =       $_POST['end_month'];
                $amount         =       $_POST['amount'];
                $credit_on      =       $_POST['credit_on'];
                
                $this->LeaveM->leaveTypeEntry($sl_no, $type, $start_month, $end_month, $amount, $credit_on, $created_by, $created_dt);

                echo "<script> alert('Successfully Submitted');
                document.location= 'leaveType' </script>";

            }
            else
            {

                echo "<script> alert('Sorry! Select Again.');
                document.location= 'addLeaveType' </script>";

            }

        }


        // for edit screen of leave type--
        public function editLeaveType()
        {

            $sl_no = $this->input->get('slNo');

            $this->load->view('post_login/main');

            $edit_data['data'] = $this->LeaveM->f_get_leaveType_editData($sl_no);
            $this->load->view('type/editLeave', $edit_data);            

            $this->load->view('post_login/footer');

        }

        // for updating Leave Type --
        public function updateLeaveType()
        {

            if($this->session->userdata('loggedin'))
            {
                $modified_by   =  $this->session->userdata('loggedin')->user_name; 
            }

            $modified_dt       =     date('y-m-d H:i:s');
            
            if($_SERVER['REQUEST_METHOD']=="POST")
            {

                $sl_no          =       $_POST['sl_no'];
                $type           =       $_POST['type'];
                $start_month    =       $_POST['start_month'];
                $end_month      =       $_POST['end_month'];
                $amount         =       $_POST['amount'];
                $credit_on      =       $_POST['credit_on'];
                
                $this->LeaveM->updateLeaveType($sl_no, $type, $start_month, $end_month, $amount, $credit_on, $modified_by, $modified_dt);

                echo "<script> alert('Successfully Updated');
                document.location= 'leaveType' </script>";

            }
            else
            {

                echo "<script> alert('Sorry! Try Again.');
                document.location= 'leaveType' </script>";

            }

        }

        // For deleting Leave type --
        public function deleteLeaveType()
        {

            $sl_no = $this->input->get('slNo');
            $this->LeaveM->deleteLeaveType($sl_no);

            $this->leaveType();

        }


        /////////////////////////////////////
        // for Leave Allocation table --
        /////////////////////////////////////
        
        public function leaveAllocation()
        {

            $this->load->view('post_login/main');

            $tableData['data'] = $this->LeaveM->f_get_leaveAlloaction_table();
            $this->load->view('allocation/table', $tableData);            

            $this->load->view('post_login/footer');

        }

        // For new leave allocation entry --
        public function newAllocation()
        {

            $this->load->view('post_login/main');

            $empData['data'] = $this->LeaveM->f_get_employeeData();
            $this->load->view('allocation/add', $empData);

            $this->load->view('post_login/footer');

        }

        // Allocation Entry -->
        public function leaveAllocationEntry()
        {

            $trans_dt = date('y-m-d');
            $transCd = $this->LeaveM->f_get_allocation_transCd($trans_dt);
            $trans_cd = $transCd->trans_cd+1;
            
            if($this->session->userdata('loggedin'))
            {
                $created_by   =  $this->session->userdata('loggedin')->user_name; 
            }

            $created_dt       =     date('y-m-d H:i:s');

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {

                $emp_no        =        $_POST['emp_no'];
                $cl_bal        =        $_POST['cl_bal'];
                $el_bal        =        $_POST['el_bal'];
                $ml_bal        =        $_POST['ml_bal'];
                $od_bal        =        $_POST['od_bal'];

                $employeeName = $this->LeaveM->f_get_allocation_empName($emp_no);
                $emp_name = $employeeName->emp_name;

                $trans_type = 'O';
                $docket_no = 'opening';
                $leave_type = '';
                $leave_mode = 'F';
                $from_dt = '';
                $to_dt = '';
                $remarks = '';
                $approval_status = '';
                $approved_dt = '';
                $approved_by = '';
                $rollback_reason = '';
                $roll_dt = '';
                $roll_by = '';
                

                $this->LeaveM->leaveAllocationEntry($trans_dt, $trans_cd, $trans_type, $emp_no, $emp_name, $docket_no,
                                                    $leave_type, $leave_mode, $from_dt, $to_dt, $remarks, $approval_status,
                                                    $approved_dt, $approved_by, $rollback_reason, $roll_dt, $roll_by, 
                                                    $cl_bal, $el_bal, $ml_bal, $od_bal, $created_by, $created_dt );

                echo "<script> alert('Successfully Added');
                    document.location= 'leaveAllocation' </script>";

            }
            else
            {
                echo "<script> alert('Sorry! Try again');
                    document.location= 'newAllocation' </script>";

            }

        }


        // Editing leave allocation --
        public function editLeaveAllocation()
        {

            $trans_cd = $this->input->get('transCd');
            $trans_dt = $this->input->get('dt');

            $editData['data'] = $this->LeaveM->f_get_allocation_editData($trans_cd, $trans_dt);

            $this->load->view('post_login/main');

            $this->load->view('allocation/edit', $editData);

            $this->load->view('post_login/footer');

        }

        // Updating the record --
        public function updateLeaveAllocation()
        {

            if($this->session->userdata('loggedin'))
            {
                $modified_by   =  $this->session->userdata('loggedin')->user_name; 
            }

            $modified_dt       =     date('y-m-d H:i:s');

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {

                $emp_no        =        $_POST['emp_no'];
                $cl_bal        =        $_POST['cl_bal'];
                $el_bal        =        $_POST['el_bal'];
                $ml_bal        =        $_POST['ml_bal'];

                $trans_dt      =        $_POST['trans_dt'];
                $trans_cd      =        $_POST['trans_cd'];

                $this->LeaveM->updateLeaveAllocation($trans_dt, $trans_cd, $emp_no, $cl_bal, $el_bal, $ml_bal, $modified_by, $modified_dt);

                echo "<script> alert('Successfully Updated');
                    document.location= 'leaveAllocation' </script>";

            }
            else
            {
                echo "<script> alert('Sorry! Try again.');
                    document.location= 'leaveAllocation' </script>";
            }

        }

        public function deleteLeaveAllocation()
        {

            $trans_dt = $this->input->get('dt');
            $trans_cd = $this->input->get('transCd');

            $this->LeaveM->deleteLeaveAllocation($trans_dt, $trans_cd);
            $this->leaveAllocation();

        }


        ///////////////////////////
        // For Leave Apply --
        //////////////////////////
        public function applyLeave()
        {

            $this->load->view('post_login/main');

            $emp_cd = $this->session->userdata('loggedin')->emp_cd;
            $tableData['data'] = $this->LeaveM->f_get_leaveAppliedDtls($emp_cd);
            
            $this->load->view('apply/table', $tableData);

            $this->load->view('post_login/footer');

        }

        // For leave apply Form --> 
        public function newLeaveApply()
        {

            $emp_cd = $this->session->userdata('loggedin')->emp_cd;
            $entryData['emp_cd'] = $emp_cd;
            $empName = $this->LeaveM->f_get_leaveApply_employeeName($emp_cd); // getting employee name(leave applicant)
            $entryData['emp_name'] = $empName->emp_name;
            
            $this->load->view('post_login/main');

            $this->load->view('apply/add', $entryData);

            $this->load->view('post_login/footer');

        }

        // For JS / leave application -> getting leave balance of a selected type --> 
        public function js_get_apply_leaveBalance()
        {

            $leave_type = $this->input->get('leaveType');
            $emp_cd = $this->session->userdata('loggedin')->emp_cd;
            $maxTransDt = $this->LeaveM->js_get_maxTransDt($emp_cd);
            $trans_dt = $maxTransDt->trans_dt;

            $result = $this->LeaveM->js_get_apply_leaveBalance($leave_type, $emp_cd, $trans_dt);
            echo json_encode($result);

        }


        // For leave application entry --> 
        public function leaveApplyEntry()
        {

            if($this->session->userdata('loggedin'))
            {
                $created_by   =  $this->session->userdata('loggedin')->user_name; 
            }

            $created_dt       =     date('y-m-d H:i:s');

            $trans_dt = date('y-m-d');
            $transCd = $this->LeaveM->f_get_allocation_transCd($trans_dt); // getting trans_cd as per trans_dt 
            $trans_cd = $transCd->trans_cd+1; 

            $emp_no = $this->session->userdata('loggedin')->emp_cd;
            $empName = $this->LeaveM->f_get_leaveApply_employeeName($emp_no);
            
            $leaveBalance_maxDt['balanceData'] = $this->LeaveM->f_get_leaveBal_on_maxTransaction($emp_no);
            $balanceData = $leaveBalance_maxDt['balanceData'][0];

            $clBal = $balanceData->cl_bal; 
            $elBal = $balanceData->el_bal; 
            $mlBal = $balanceData->ml_bal; 
            $odBal = $balanceData->od_bal; 
            
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                
                $trans_type         =       'T';
                $emp_name           =       $_POST['emp_name'];
                $docket_no          =       $_POST['docket_no'];
                $leave_type         =       $_POST['leave_type'];
                $from_dt            =       $_POST['from_dt'];
                $to_dt              =       $_POST['to_dt'];
                $no_of_days         =       $_POST['no_of_days'];
                $leave_mode         =       $_POST['leave_mode'];
                $approval_status    =       'U';
                $remarks            =       $_POST['remarks'];
                $cl_bal             =       $clBal;
                $el_bal             =       $elBal;
                $ml_bal             =       $mlBal;
                $od_bal             =       $odBal;


                $this->LeaveM->leaveApplyEntry($trans_dt, $trans_cd, $trans_type, $emp_no, $emp_name, $docket_no, $leave_type, 
                                                $from_dt, $to_dt, $no_of_days, $leave_mode, $approval_status, $remarks, $cl_bal, $el_bal, $ml_bal, $od_bal, $created_by, $created_dt );

                echo "<script> alert('Successfully Added');
                    document.location= 'applyLeave' </script>";

            }
            else
            {
                echo "<script> alert('Sorry! Try Again');
                    document.location= 'newLeaveApply' </script>";
            }

        }


        //For Leave Application Edit --> 
        public function editLeaveApply()
        {

            $trans_dt = $this->input->get('dt');
            $trans_cd = $this->input->get('transCd');

            $editData['data'] = $this->LeaveM->f_get_leaveApply_editData($trans_dt, $trans_cd);

            $this->load->view('post_login/main');

            $this->load->view('apply/edit', $editData);

            $this->load->view('post_login/footer');


        }

        // For updating leave application --- 
        public function updateLeaveApplication()
        {

            if($this->session->userdata('loggedin'))
            {
                $modified_by   =  $this->session->userdata('loggedin')->user_name; 
            }

            $modified_dt       =     date('y-m-d H:i:s');

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {

                $trans_dt           =           $_POST['trans_dt'];
                $trans_cd           =           $_POST['trans_cd'];
                $emp_no             =           $_POST['emp_no'];
                $emp_name           =           $_POST['emp_name'];
                $leave_type         =           $_POST['leave_type'];
                $from_dt            =           $_POST['from_dt'];
                $to_dt              =           $_POST['to_dt'];
                $no_of_days         =           $_POST['no_of_days'];
                $remarks            =           $_POST['remarks'];


                $this->LeaveM->updateLeaveApplication($trans_dt, $trans_cd, $emp_no, $emp_name, $leave_type, $from_dt, $to_dt, 
                                                    $no_of_days, $remarks, $modified_by, $modified_dt );

                echo "<script> alert('Successfully Updated');
                    document.location= 'applyLeave' </script>";

            }
            else
            {

                echo "<script> alert('Sorry! Try again');
                    document.location= 'applyLeave' </script>";
            }


        }

        // For deleting leave application --
        public function deleteLeaveApply()
        {

            $trans_dt = $this->input->get('dt');
            $trans_cd = $this->input->get('transCd');

            $this->LeaveM->deleteLeaveApply($trans_dt, $trans_cd);
            redirect('leave/applyLeave');

        }


        ///////////////////////////////////////
        // For Maternity Leave apply -- 
        /////////////////////////////////////
        public function applyMatLeave()
        {

            $this->load->view('post_login/main');

            $emp_cd = $this->session->userdata('loggedin')->emp_cd;
            $tableData['data'] = $this->LeaveM->f_get_mat_leave_appliedDtls($emp_cd);
            
            $this->load->view('matApply/table', $tableData);

            $this->load->view('post_login/footer');

        }

        public function newMatLeaveApply()
        {

            $this->load->view('post_login/main');

            $emp_cd = $this->session->userdata('loggedin')->emp_cd;

            $entryData['emp_cd'] = $emp_cd;
            $empName = $this->LeaveM->f_get_leaveApply_employeeName($emp_cd); // getting employee name(leave applicant)
            $entryData['emp_name'] = $empName->emp_name;

            $this->load->view('matApply/add', $entryData);

            $this->load->view('post_login/footer');

        }

        public function js_get_applied_matLeaveDtls()
        {

            $emp_cd = $this->session->userdata('loggedin')->emp_cd;
            $infoTableDtls = $this->LeaveM->js_get_applied_matLeaveDtls($emp_cd);
            echo json_encode($infoTableDtls);

        }

        public function js_check_matLeave_entry()
        {

            $emp_cd = $this->session->userdata('loggedin')->emp_cd;
            $result = $this->LeaveM->js_check_matLeave_entry($emp_cd);
            echo json_encode($result);

        }

        public function matLeaveEntry()
        {

            if($this->session->userdata('loggedin'))
            {
                $created_by   =  $this->session->userdata('loggedin')->user_name; 
            }

            $created_dt       =     date('y-m-d H:i:s');

            $trans_dt = date('y-m-d');
            $transCd = $this->LeaveM->f_get_matLeave_transCd($trans_dt); // getting trans_cd as per trans_dt 
            $trans_cd = $transCd->trans_cd+1; 

            $emp_no = $this->session->userdata('loggedin')->emp_cd;
            $empName = $this->LeaveM->f_get_leaveApply_employeeName($emp_no);
            
            
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
               
                $emp_name           =       $_POST['emp_name'];
                $docket_no          =       $_POST['docket_no'];
                $from_dt            =       $_POST['from_dt'];
                $to_dt              =       $_POST['to_dt'];
                $no_of_days         =       $_POST['no_of_days'];
                $approval_status    =       'U';
                $remarks            =       $_POST['remarks'];
                
                $this->LeaveM->matLeaveEntry($trans_dt, $trans_cd, $emp_no, $emp_name, $docket_no, $from_dt, $to_dt, $no_of_days,
                                                $approval_status, $remarks, $created_by, $created_dt );

                echo "<script> alert('Successfully Added');
                    document.location= 'applyMatLeave' </script>";

            }
            else
            {
                echo "<script> alert('Sorry! Try Again');
                    document.location= 'newMatLeaveApply' </script>";
            }


        }


        public function editMatLeave()
        {

            $transCd = $this->input->get('transCd');
            $transDt = $this->input->get('dt');

            $editData['data'] = $this->LeaveM->f_get_matLeave_editDtls($transCd, $transDt);

            $this->load->view('post_login/main');

            $this->load->view('matApply/edit', $editData);

            $this->load->view('post_login/footer');

        }

        public function updateMatLeave()
        {

            if($this->session->userdata('loggedin'))
            {
                $modified_by   =  $this->session->userdata('loggedin')->user_name; 
            }

            $modified_dt       =     date('y-m-d H:i:s');

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {

                $trans_dt           =       $_POST['trans_dt'];
                $trans_cd           =       $_POST['trans_cd'];
                // $emp_no             =       $_POST['emp_no'];
                //$emp_name           =       $_POST['emp_name'];
                $docket_no          =       $_POST['docket_no'];
                $from_dt            =       $_POST['from_dt'];
                $to_dt              =       $_POST['to_dt'];
                $no_of_days         =       $_POST['no_of_days'];
                $approval_status    =       'U';
                $remarks            =       $_POST['remarks'];

                $this->LeaveM->f_update_matLeaveEntry($trans_dt, $trans_cd, $docket_no, $from_dt, $to_dt,
                                                    $no_of_days, $approval_status, $remarks, $modified_by, $modified_dt );

                echo "<script> alert('Successfully Updated');
                document.location= 'applyMatLeave' </script>";

            }
            else
            {
                echo "<script> alert('Sorry! Try Again.');
                document.location= 'applyMatLeave' </script>";

            }

        }

        public function deleteMatLeave()
        {

            $trans_dt = $this->input->get('dt');
            $trans_cd = $this->input->get('transCd');

            $this->LeaveM->f_delete_matLeave($trans_dt, $trans_cd);

            redirect('leave/applyMatLeave');

        }


        ///////////////////////////////////////////
        // For Leave Approval -->
        //////////////////////////////////////////
        public function firstApproval()
        {

            $this->load->view('post_login/main');

            $tableData['data'] = $this->LeaveM->f_get_approval_tableData();
            $this->load->view('approval/table', $tableData);

            $this->load->view('post_login/footer');

        }

        // For Leave Application approval -- 
        public function approveLeave()
        {

            $trans_dt = $this->input->get('dt');
            $trans_cd = $this->input->get('transCd');

            $approvalResult['data'] = $this->LeaveM->f_get_leaveApply_editData($trans_dt, $trans_cd); // getting all dtls

            $this->load->view('post_login/main');

            $this->load->view('approval/form', $approvalResult);

            $this->load->view('post_login/footer');

        }

        // For Approval --> 
        public function approveLeaveApplication()
        {

            $trans_dt           =       $_POST['trans_dt'];
            $trans_cd           =       $_POST['trans_cd'];
            $approval_status    =       'A';

            $approved_by = $this->session->userdata('loggedin')->user_name;
            $approved_dt = date('Y-m-d');

            $this->LeaveM->approveLeaveApplication($trans_dt, $trans_cd, $approval_status, $approved_by, $approved_dt);

            //redirect('leave/firstApproval');
            echo "<script> alert('Successfully Updated');
                    document.location= 'firstApproval' </script>";

        }

        // For Rejection of leave-- 
        public function rejectLeaveApplication()
        {

            $trans_dt           =       $_POST['trans_dt'];
            $trans_cd           =       $_POST['trans_cd'];
            $approval_status    =       'R';

            $approved_by = $this->session->userdata('loggedin')->user_name;
            $approved_dt = date('Y-m-d');

            $this->LeaveM->rejectLeaveApplication($trans_dt, $trans_cd, $approval_status, $approved_by, $approved_dt);

            redirect('leave/firstApproval'); 

        }


        //////////////////////////////////////////
        // For MATERNITY LEAVE APPROVAl -- 
        /////////////////////////////////////////
        public function matLeaveApproval()
        {

            $this->load->view('post_login/main');

            $tableData['data'] = $this->LeaveM->f_get_matLeave_approval_tableData();
            $this->load->view('approval/matTable', $tableData);

            $this->load->view('post_login/footer');

        }

        public function approveMatLeave()
        {

            $trans_cd = $this->input->get('transCd');
            $trans_dt = $this->input->get('dt');

            $viewData['data'] = $this->LeaveM->f_get_matLeave_approval_view($trans_cd, $trans_dt);

            $this->load->view('post_login/main');
            $this->load->view('approval/matView', $viewData);
            $this->load->view('post_login/footer');

        }

        public function approveMatLeaveApplication()
        {

            $trans_dt           =       $_POST['trans_dt'];
            $trans_cd           =       $_POST['trans_cd'];
            $approval_status    =       'A';

            $approved_by = $this->session->userdata('loggedin')->user_name;
            $approved_dt = date('Y-m-d');

            $this->LeaveM->approveMatLeaveApplication($trans_dt, $trans_cd, $approval_status, $approved_by, $approved_dt);

            //redirect('leave/firstApproval');
            echo "<script> alert('Successfully Approved');
                    document.location= 'matLeaveApproval' </script>";

        }

        public function rejectMatLeaveApplication()
        {

            $trans_dt           =       $_POST['trans_dt'];
            $trans_cd           =       $_POST['trans_cd'];
            $approval_status    =       'R';

            $approved_by = $this->session->userdata('loggedin')->user_name;
            $approved_dt = date('Y-m-d');

            $this->LeaveM->approveMatLeaveApplication($trans_dt, $trans_cd, $approval_status, $approved_by, $approved_dt);

            redirect('leave/matLeaveApproval');
            
        }

        /////////////////////////////////////////////
        // For Deduction --- 
        ////////////////////////////////////////////
        public function deduction()
        {

            $this->load->view('post_login/main');

            $tableData['data'] = $this->LeaveM->f_get_deduction_tableData();
            $this->load->view('deduction/table', $tableData);

            $this->load->view('post_login/footer');

        }


        public function adjustLeave()
        {

            $trans_dt = $this->input->get('dt');
            $trans_cd = $this->input->get('transCd');

            $this->load->view('post_login/main');

            $tableData['data'] = $this->LeaveM->f_get_leaveApply_editData($trans_dt, $trans_cd);
            $this->load->view('deduction/show', $tableData);

            $this->load->view('post_login/footer');

        }

        // For leave adjustment--
        public function adjustLeaveApplication()
        {

            $trans_dt           =       $_POST['trans_dt'];
            $trans_cd           =       $_POST['trans_cd'];
            $emp_no             =       $_POST['emp_no'];
            $approval_status    =       'F';

            $leave_type         =       $_POST['leave_type'];
            $no_of_days         =       $_POST['no_of_days'];

            $leaveBalance = $this->LeaveM->f_get_leaveBal_for_adjustment($trans_dt, $trans_cd, $emp_no);
            
            $leaveBalanceArray = $leaveBalance[0];
            
            $clBal = $leaveBalanceArray->cl_bal; 
            $elBal = $leaveBalanceArray->el_bal; 
            $mlBal = $leaveBalanceArray->ml_bal;
            $odBal = $leaveBalanceArray->od_bal;

            if($leave_type == 'CL')
            {
                $cl_bal = ($clBal-$no_of_days);
                $el_bal = $elBal;
                $ml_bal = $mlBal;
                $od_bal = $odBal;
            }
            elseif($leave_type == 'EL')
            {
                $cl_bal = $clBal;
                $el_bal = ($elBal-$no_of_days);
                $ml_bal = $mlBal;
                $od_bal = $odBal;
            }
            elseif($leave_type == 'ML')
            {
                $cl_bal = $clBal;
                $el_bal = $elBal;
                $ml_bal = ($mlBal-($no_of_days)*2);
                $od_bal = $odBal;
            }
            elseif($leave_type == 'OD')
            {
                $cl_bal = $clBal;
                $el_bal = $elBal;
                $ml_bal = $mlBal;
                $od_bal = ($odBal-$no_of_days);
            }

            // $approved_by = $this->session->userdata('loggedin')->user_name;
            // $approved_dt = date('Y-m-d');

            $this->LeaveM->adjustLeaveApplication($trans_dt, $trans_cd, $approval_status, $cl_bal, $el_bal, $ml_bal);

            //redirect('leave/deduction'); 
            echo "<script> alert('Successfully Adjusted');
                    document.location= 'deduction' </script>";

        }


        ///////////////////////////////////////////////
                        // For Roll Back -- 
        public function rollBack()
        {

            $this->load->view('post_login/main');

            $this->load->view('deduction/rollBack');

            $this->load->view('post_login/footer');

        }


        public function js_get_applnDtls_for_rollback() // For JS
        {

            $docket = $this->input->get('docketNo');

            $result = $this->LeaveM->js_get_applnDtls_for_rollback($docket);
            echo json_encode($result);

        }

        public function rollBackEntry()
        {

            // if($this->session->userdata('loggedin'))
            // {
            //     $created_by   =  $this->session->userdata('loggedin')->user_name; 
            // }

            // $created_dt       =     date('y-m-d H:i:s');

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {

                $docket_no          =        $_POST['docket_no'];
                $status             =        $_POST['status'];
                $from_dt            =        $_POST['from_dt'];
                $to_dt              =        $_POST['to_dt'];
                $no_of_days         =        $_POST['no_of_days'];
                $leave_type         =        $_POST['leave_type'];
                $action             =        $_POST['action'];
                $rlb_message        =        $_POST['rlb_message'];
                $emp_name           =        $_POST['emp_name'];
                $emp_no             =        $_POST['emp_no'];
                $trans_dt           =        $_POST['trans_dt'];
                $trans_cd           =        $_POST['trans_cd'];

                if($status == 'Approved')
                {

                    if($action == 'R')
                    {
                        $rollBackValue = array('from_dt' => $from_dt,
                                                'to_dt' => $to_dt,
                                                'no_of_days' => $no_of_days,
                                                'rollback_reason' => $rlb_message );

                        $this->LeaveM->f_rollback_approvedLeave($rollBackValue, $docket_no, $emp_no);

                        echo "<script> alert('Roll back done...');
                            document.location= 'rollBack' </script>";

                    }
                    elseif($action == 'C')
                    {

                        $approval_status = 'R';
                        $array = array('approval_status' => $approval_status,
                                        'rollback_reason' => $rlb_message );

                        $this->LeaveM->f_rollback_rejectLeave($docket_no, $emp_no, $array);

                        echo "<script> alert('Leave has been rejected...');
                            document.location= 'rollBack' </script>";

                    }

                }
                elseif($status == 'Finalized')
                {

                    $leaveBalance['balanceData'] = $this->LeaveM->f_previous_leaveBal_for_rollBack($emp_no, $docket_no);

                    $balanceData = $leaveBalance['balanceData'][0];

                    $clBal = $balanceData->cl_bal; 
                    $elBal = $balanceData->el_bal; 
                    $mlBal = $balanceData->ml_bal; 
                    $odBal = $balanceData->od_bal; 

                    if($leave_type == 'CL')
                    {
                        $cl_bal = ($clBal-$no_of_days);
                        $el_bal = $elBal;
                        $ml_bal = $mlBal;
                        $od_bal = $odBal;
                    }
                    elseif($leave_type == 'EL')
                    {
                        $cl_bal = $clBal;
                        $el_bal = ($elBal-$no_of_days);
                        $ml_bal = $mlBal;
                        $od_bal = $odBal;
                    }
                    elseif($leave_type == 'ML')
                    {
                        $cl_bal = $clBal;
                        $el_bal = $elBal;
                        $ml_bal = ($mlBal-($no_of_days)*2);
                        $od_bal = $odBal;
                    }
                    elseif($leave_type == 'OD')
                    {
                        $cl_bal = $clBal;
                        $el_bal = $elBal;
                        $ml_bal = $mlBal;
                        $od_bal = ($odBal-$no_of_days);
                    }

                    $balanceArray = array('from_dt' => $from_dt,
                                        'to_dt' => $to_dt,
                                        'no_of_days' => $no_of_days,
                                        'cl_bal' => $cl_bal,
                                        'el_bal' =>$el_bal,
                                        'ml_bal' => $ml_bal,
                                        'od_bal' => $od_bal,
                                        'rollback_reason' => $rlb_message );


                    $this->LeaveM->f_rollback_finalizedLeave($balanceArray, $docket_no, $emp_no);

                    echo "<script> alert('Roll back done...');
                            document.location= 'rollBack' </script>";

                }

            }

        }

        /////////////////////////////////////////////////////
        // For REPORT/ personalLedger --> 
        ////////////////////////////////////////////////////
        public function personalLedger()
        {

            $emp_cd = $this->session->userdata('loggedin')->emp_cd;
            $this->showPersonalLedger($emp_cd);

        }

        public function showPersonalLedger($emp_cd)
        {

            $result['opening'] = $this->LeaveM->f_get_report_openingBalance($emp_cd);
            $result['transaction'] = $this->LeaveM->f_get_report_transactionBalance($emp_cd);

            // $latestTransactionDt = $this->LeaveM->f_get_latest_transDt($emp_cd);
            // $maxTransDt = $latestTransactionDt->trans_dt;
            // $latestTransactionId = $this->LeaveM->f_get_latest_transDtId($maxTransDt, $emp_cd);
            // $maxTransId = $latestTransactionId->trans_cd; 
            // $result['closing'] = $this->LeaveM->f_get_report_closingBalance($emp_cd, $maxTransDt, $maxTransId);
            
            $empName = $this->LeaveM->f_get_leaveApply_employeeName($emp_cd);
            $result['empName'] = $empName->emp_name;
            $result['empNo'] = $emp_cd;

            $this->load->view('post_login/main');

            $this->load->view('report/personalLedger', $result);

            $this->load->view('post_login/footer');

        }


        public function employeeLedger()
        {

            $this->load->view('post_login/main');

            $empData['data'] = $this->LeaveM->f_get_employeeData();
            $this->load->view('report/selectEmployee', $empData);

            $this->load->view('post_login/footer');

        }


        public function showEmployeeLedger()
        {

            $emp_cd           =       $_POST['emp_no'];

            $this->showPersonalLedger($emp_cd); // calling same function for this report

        }














    }

?>