<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class SaleModel extends CI_Model{					/*Insert Data in Tables*/
		public function f_insert($table_name, $data_array) {

			$this->db->insert($table_name, $data_array);

			return;

		}
			/*Update table data*/
		public function f_edit($table_name, $data_array, $where) {

			$this->db->where($where);
			$this->db->update($table_name, $data_array);

			return;

		}
/*Select Data from a table*/		
		public function f_select($table,$select=NULL,$where=NULL,$type){
			if(isset($select)){
				$this->db->select($select);
			}
			if(isset($where)){
				$this->db->where($where);
			}
			$value = $this->db->get($table);
			if($type==1){
				return $value->row();
			}else{
				return $value->result();
			}
		}
		
		public function f_get_api_datacr($trans_do)
{
	$sql = $this->db->query("SELECT 
	 1.1 'Version',
	 'GST' TaxSch,'B2B'  SupTyp,'N' RegRev,null EcmGstin,'N' IgstOnIntra,
	 'CRN' Typ,concat(a.trans_do,'/1') No ,a.do_dt Dt,
	 '19AABAT0010H2ZY' Gstin,'The West Bengal State Co-operative Marketing Federation Ltd.'LglNm,'BENFED'TrdNm,
	replace(replace(substr(d.addr,1,100),'\r\n',''),'/','-') Addr1,replace(replace(substr(d.addr,1,100),'\r\n',''),'/','-') Addr2,
	 d.district_name Loc,d.pin Pin,'19'Stcd,'9666666666'Ph,' info@benfed.org'Em,

	 c.gstin Gstin1,c.soc_name LglNm1,c.soc_name TrdNm1,19 Pos,replace(replace(substr(c.soc_add,1,100),'\r\n',''),'/','-')  Addr1_1,replace(replace(substr(c.soc_add,1,100),'\r\n',''),'/','-')  Addr2_1,d.district_name Loc1,'45555666',d.pin Pin1,19 Stcd1,c.ph_no Ph1,c.email Em1,

	 'The West Bengal State Co-operative Marketing Federation Ltd.' Nm2,replace(replace(substr(d.addr,1,100),'\r\n',''),'/','-') Addr1_2,'' Addr2_2,'W.B' Loc2,d.pin Pin2,19 Stcd2,
	 
	 c.gstin Gstin2,c.soc_name LglNm2,c.soc_name TrdNm2,replace(replace(substr(c.soc_add,1,100),'\r\n',''),'/','-')  Addr1_3,replace(replace(substr(c.soc_add,1,100),'\r\n',''),'/','-')  Addr2_3,'W.B' Loc3,d.pin Pin3,19     Stcd3,
	 
	 '1' SlNo,b.prod_desc PrdDesc,'N' IsServc,b.hsn_code HsnCd,''Barcde,a.qty Qty,'0'FreeQty,e.unit_name Unit,a.sale_rt UnitPrice,
	a.taxable_amt TotAmt,a.dis Discount, 0 PreTaxVal,a.taxable_amt AssAmt,b.gst_rt GstRt,0 IgstAmt,a.cgst  CgstAmt,a.sgst SgstAmt,
	 0 CesRt,0 CesAmt,0 CesNonAdvlAmt,0 StateCesRt,0 StateCesAmt, 0 StateCesNonAdvlAmt,0 OthChrg,a.taxable_amt+a.cgst+a.sgst TotItemVal,
	 0 OrdLineRef,'IN' OrgCntry,0 PrdSlNo,
	 '' Nm4,
     NULL   ExpDt,
     NULL  WrDt,
	 '' Nm5,
     '0'  Val,
	 a.taxable_amt AssVal,
     a.cgst CgstVal,
     a.sgst SgstVal,
     0 IgstVal,
     0 CesVal,
     0 StCesVal,
     0 Discount,
     0 OthChrg,
     0 RndOffAmt,
     a.taxable_amt + a.cgst+ a.sgst TotInvVal,
     0 TotInvValFc,
	 ''  Nm6,
	 0  AccDet,
	 '' Mode,
	 '' FinInsBr,
	 '0' PayTerm,
	 '' PayInstr,
	 '' CrTrn,
	 '' DirDr,
	 0 CrDay,
	 0 PaidAmt,
	 0 PaymtDue,
	 '' InvRm, 
	 NULL InvStDt,
	 NULL InvEndDt,
	 '' InvNo,
	 NULL InvDt,
	 '' OthRefNo,
	 '' RecAdvRef,
	 NULL RecAdvDt,
	 '' TendRefr,
	 '' ContrRefr,
	 '' ExtRefr,
	 '' ProjRefr,
	 substr(g.ro_no,1,16) PORefr,
	 DATE_FORMAT(g.ro_dt,'%d/%m/%Y')  PORefDt,
	 'https://einv-apisandbox.nic.in'  Url,
	 '' Docs,
	 '' Info,
	 '' ShipBNo,
	  NULL ShipBDt,
	  '' Port,
	  '' RefClm,
	  '' ForCur,
	  '' CntCode,
      ''  TransId,
	  '' TransName,
	  0  Distance,
	  '' TransDocNo,
	  NULL  TransDocDt,
	  '' VehNo,
	  ''  VehType,
	  1  TransMode
	from td_sale a  ,mm_product b,mm_ferti_soc c,md_district d,mm_unit e,mm_company_dtls f,td_purchase g
	where a.prod_id=b.prod_id
	and a.sale_ro=g.ro_no
	and a.soc_id=c.soc_id
	and c.district=d.district_code
	and a.unit=e.id
	and a.comp_id=f.comp_id
	and a.trans_do='$trans_do'");
			// echo $this->db->last_query();exit; 
return $sql->result();
}

public function f_get_api_data($trans_do)
{
	$sql = $this->db->query("SELECT 
	 1.1 'Version',
	 'GST' TaxSch,'B2B'  SupTyp,'N' RegRev,null EcmGstin,'N' IgstOnIntra,
	 'INV' Typ,concat(a.trans_do,'/1') No ,a.do_dt Dt,
	 '19AABAT0010H2ZY' Gstin,'The West Bengal State Co-operative Marketing Federation Ltd.'LglNm,'BENFED'TrdNm,
	 replace(replace(substr(d.addr,1,100),'\r\n',''),'/','-') Addr1,replace(replace(substr(d.addr,1,100),'\r\n',''),'/','-') Addr2,
	 d.district_name Loc,d.pin Pin,'19'Stcd,'9666666666'Ph,' info@benfed.org'Em,

	 c.gstin Gstin1,c.soc_name LglNm1,c.soc_name TrdNm1,19 Pos,replace(replace(substr(c.soc_add,1,100),'\r\n',''),'/','-')  Addr1_1,replace(replace(substr(c.soc_add,1,100),'\r\n',''),'/','-')  Addr2_1,d.district_name Loc1,'45555666',d.pin Pin1,19 Stcd1,c.ph_no Ph1,c.email Em1,

	 'The West Bengal State Co-operative Marketing Federation Ltd.' Nm2,replace(replace(substr(d.addr,1,100),'\r\n',''),'/','-') Addr1_2,'' Addr2_2,'W.B' Loc2,d.pin Pin2,19 Stcd2,
	 
	 c.gstin Gstin2,c.soc_name LglNm2,c.soc_name TrdNm2,replace(replace(substr(c.soc_add,1,100),'\r\n',''),'/','-')  Addr1_3,replace(replace(substr(c.soc_add,1,100),'\r\n',''),'/','-')  Addr2_3,'W.B' Loc3,d.pin Pin3,19     Stcd3,
	 
	 '1' SlNo,b.prod_desc PrdDesc,'N' IsServc,b.hsn_code HsnCd,''Barcde,a.qty Qty,'0'FreeQty,e.unit_name Unit,a.sale_rt UnitPrice,
	a.taxable_amt TotAmt,a.dis Discount, 0 PreTaxVal,a.taxable_amt AssAmt,b.gst_rt GstRt,0 IgstAmt,a.cgst  CgstAmt,a.sgst SgstAmt,
	 0 CesRt,0 CesAmt,0 CesNonAdvlAmt,0 StateCesRt,0 StateCesAmt, 0 StateCesNonAdvlAmt,0 OthChrg,a.taxable_amt+a.cgst+a.sgst TotItemVal,
	 0 OrdLineRef,'IN' OrgCntry,0 PrdSlNo,
	 '' Nm4,
     NULL   ExpDt,
     NULL  WrDt,
	 '' Nm5,
     '0'  Val,
	 a.taxable_amt AssVal,
     a.cgst CgstVal,
     a.sgst SgstVal,
     0 IgstVal,
     0 CesVal,
     0 StCesVal,
     0 Discount,
     0 OthChrg,
     0 RndOffAmt,
     a.taxable_amt + a.cgst+ a.sgst TotInvVal,
     0 TotInvValFc,
	 ''  Nm6,
	 0  AccDet,
	 '' Mode,
	 '' FinInsBr,
	 '0' PayTerm,
	 '' PayInstr,
	 '' CrTrn,
	 '' DirDr,
	 0 CrDay,
	 0 PaidAmt,
	 0 PaymtDue,
	 '' InvRm, 
	 NULL InvStDt,
	 NULL InvEndDt,
	 '' InvNo,
	 NULL InvDt,
	 '' OthRefNo,
	 '' RecAdvRef,
	 NULL RecAdvDt,
	 '' TendRefr,
	 '' ContrRefr,
	 '' ExtRefr,
	 '' ProjRefr,
	 substr(g.ro_no,1,16) PORefr,
	 DATE_FORMAT(g.ro_dt,'%d/%m/%Y')  PORefDt,
	 'https://einv-apisandbox.nic.in'  Url,
	 '' Docs,
	 '' Info,
	 '' ShipBNo,
	  NULL ShipBDt,
	  '' Port,
	  '' RefClm,
	  '' ForCur,
	  '' CntCode,
      ''  TransId,
	  '' TransName,
	  0  Distance,
	  '' TransDocNo,
	  NULL  TransDocDt,
	  '' VehNo,
	  ''  VehType,
	  1  TransMode
	from td_sale a  ,mm_product b,mm_ferti_soc c,md_district d,mm_unit e,mm_company_dtls f,td_purchase g
	where a.prod_id=b.prod_id
	and a.sale_ro=g.ro_no
	and a.soc_id=c.soc_id
	and c.district=d.district_code
	and a.unit=e.id
	and a.comp_id=f.comp_id
	and a.trans_do='$trans_do'");
			// echo $this->db->last_query();exit; 
return $sql->result();
}

		public function f_get_receiptReport_dtls($trans_do)
		{
	
		  $sql = $this->db->query("SELECT a.trans_do ,b.prod_desc ,b.hsn_code,b.gst_rt,c.soc_name,c.soc_add,
		                           c.gstin,c.mfms,a.trans_no,a.do_dt,a.sale_due_dt,a.trans_type,a.soc_id,
								   a.comp_id, a.sale_ro,a.stock_point,a.gov_sale_rt,a.qty,a.sale_rt,
								   a.base_price,a.taxable_amt,a.cgst,a.sgst,a.dis,a.tot_amt,
								   a.round_tot_amt,a.paid_amt,d.ro_no,d.ro_dt
								   from td_sale a  ,mm_product b,mm_ferti_soc c,td_purchase d
								   where a.prod_id=b.prod_id
								   and a.sale_ro=d.ro_no
								   and a.irn is NULL
								   and a.gst_type_flag='N'
								   and a.soc_id=c.soc_id
								   and a.trans_do='$trans_do'");
											
		  return $sql->row();
	
		}

		public function f_get_saleinv_tot($trans_do)
		{
	
		  $sql = $this->db->query("SELECT a.trans_do ,sum(a.qty)as qty,sum(a.base_price) as base_price,
									sum(a.taxable_amt)as taxable_amt,sum(a.cgst)as cgst,sum(a.sgst)as sgst,
									sum(a.cgst+a.sgst)as tot_gst,sum(a.dis)as dis,sum(a.tot_amt)as tot_amt,
									sum(a.paid_amt) as paid_amt,ROUND(sum(a.round_tot_amt))as tot_amt_rnd
									from td_sale a 
									where  a.trans_do='$trans_do'");
											
		  return $sql->row();
	
		}
   
		public function get_trans_no($fin_id,$branch_id){

			$sql="select ifnull(max(trans_no),0) + 1 trans_no
					 from td_sale where fin_yr = '$fin_id' AND br_cd= '$branch_id'";

		  $result = $this->db->query($sql);     
	  
		  return $result->row();

	  }

	  public function get_ro_no($comp_id,$prod_id,$dist_id){
		$result= $this->db->query('select  ro_no ,ro_dt,short_name, sum(qty) qty
		  From  (select a.ro_no ro_no ,date_format(a.ro_dt,"%d-%m-%Y") as ro_dt,b.short_name,sum(a.qty) qty
		  from td_purchase a,mm_company_dtls b
		  where a.comp_id = b.comp_id 
		  and a.comp_id    ='.$comp_id.'
		  and a.prod_id    ='.$prod_id.'
		  and a.br ='.$dist_id.'
		  group by a.ro_no ,a.ro_dt,b.short_name
		  union
		  select a.sale_ro,date_format(b.ro_dt,"%d-%m-%Y"),d.short_name,(-1) * sum(a.qty) qty
		  from td_sale a,td_purchase b,mm_company_dtls d
		  where a.sale_ro=b.ro_no
		  and a.comp_id =d.comp_id 
		  and a.comp_id    ='.$comp_id.'
		  and    a.prod_id  = '.$prod_id.'
		  and    a.br_cd = '.$dist_id.'
		  group by a.sale_ro)c
		  group by ro_no ,ro_dt,short_name
		  having sum(qty)>0;');
		  return $result->result();


	  }
	  

	  
		public function js_get_stock_qty($ro)
		{

		$sql = $this->db->query("SELECT a.stock_qty -  (select  ifnull(sum(qty) ,0) from td_sale where sale_ro ='$ro') stkqty,a.prod_id ,b.gst_rt ,b.prod_id,b.prod_desc,a.unit,c.unit_name FROM td_purchase a ,mm_product b ,mm_unit c WHERE a.prod_id=b.prod_id and a.unit=c.id and  a.ro_no = '$ro'");
			return $sql->row();
		}

		public function js_get_sale_rate($br_cd,$comp_id,$ro_dt,$prod_id)
		{

		/*$sql = $this->db->query("SELECT a.catg_id,b.cate_desc
									from  mm_sale_rate a,
	   					                  mm_category b    							   							
					                     where  a.catg_id = b.sl_no
					                     and a.district='$br_cd'
			                             and a.comp_id='$comp_id'
			                             and a.prod_id ='$prod_id'
			                             and '$ro_dt' BETWEEN a.frm_dt and a.to_dt");  */

			                        $sql = $this->db->query("SELECT a.catg_id,b.cate_desc
									from  mm_sale_rate a,
	   					                  mm_category b    							   							
					                     where  a.catg_id = b.sl_no
					                     and a.district='$br_cd'
			                             and a.comp_id='$comp_id'
			                             and a.prod_id ='$prod_id'
			                             and a.frm_dt =(select  max(frm_dt) from mm_sale_rate where frm_dt<='$ro_dt' 
													and district='$br_cd'
													and comp_id='$comp_id'
													and prod_id ='$prod_id')");

			return $sql->result();
		}

		public function get_sale_rate($br_cd,$comp_id,$ro_dt,$prod_id,$category)
		{

		/*$sql = $this->db->query("SELECT sp_mt
									from  mm_sale_rate		   							
					                     where  catg_id = '$category'
					                     and district='$br_cd'
			                             and comp_id='$comp_id'
			                             and prod_id ='$prod_id'
			                             and '$ro_dt' BETWEEN frm_dt and to_dt");*/
		 $sql = $this->db->query("SELECT sp_mt,mrp_gst,sale_rtgst,sp_bag_gst
									from  mm_sale_rate		   							
					                     where  catg_id = '$category'
					                     and district='$br_cd'
			                             and comp_id='$comp_id'
			                             and prod_id ='$prod_id'
			                             and frm_dt =(select  max(frm_dt) from mm_sale_rate where frm_dt<='$ro_dt'
										 and district='$br_cd'
													and comp_id='$comp_id'
													and prod_id ='$prod_id')");
			// return $sql->row();
			return $sql->result();
		}
		public function get_govsale_rate($br_cd,$comp_id,$ro_dt,$prod_id,$category,$gov_sale_rt)
		{

			if($gov_sale_rt =="N"){
									 $sql = $this->db->query("SELECT sp_mt as rate
														     from  mm_sale_rate
										                     where  catg_id = '$category'
										                     and district='$br_cd'
								                             and comp_id='$comp_id'
								                             and prod_id ='$prod_id'
															 and frm_dt =(select  max(frm_dt) from mm_sale_rate where frm_dt<='$ro_dt'
										                 and district='$br_cd'
													and comp_id='$comp_id'
													and prod_id ='$prod_id')");
			}else{
									$sql = $this->db->query("SELECT sp_govt  
														     from  mm_sale_rate
										                     where  catg_id = '$category'
										                     and district='$br_cd'
								                             and comp_id='$comp_id'
								                             and prod_id ='$prod_id'
															 and frm_dt =(select  max(frm_dt) from mm_sale_rate where frm_dt<='$ro_dt'
										 						and district='$br_cd'
															and comp_id='$comp_id'
															and prod_id ='$prod_id')");
			}

		
			// return $sql->row();
			return $sql->result();
		}

		public function js_get_stock_point($ro_no){


			$query = $this->db->query("select a.soc_id,a.soc_name
									from  mm_ferti_soc a,td_purchase b    							   							
									where  a.soc_id = b.stock_point
									and    a.stock_point_flag = 'Y'
									and    b.ro_no            = '$ro_no' ");

				
			
				return $query->row();
		}

		public function get_advance($soc_id){

		$sql = $this->db->query("select (ifnull(sum(in_adv),0) - ifnull(sum(out_adv),0) )advance_balance
								from (
								        SELECT ifnull(sum(adv_amt),0)in_adv,0 out_adv
								        FROM   `tdf_advance` 
								        where soc_id = '$soc_id'
								        and trans_type = 'I'
								        UNION
								        SELECT 0 in_adv,ifnull(sum(adv_amt),0)out_adv 
								        FROM `tdf_advance` 
								        where soc_id = '$soc_id' 
								        and trans_type = 'O') b");
			return $sql->row();

		}
		
		public function get_recv_amt($soc_id){

			$sql = $this->db->query("select ifnull(sum(tot_amt),0)- ifnull(sum(paid_amt),0) as recv_amt
			                         from td_sale
									  where soc_id = '$soc_id' ");
				return $sql->row();
	
			}
			
			public function get_virtual_point($ro){

				$sql = $this->db->query("select count(*) as ro_cnt
										 from tdf_virtual_stk_pnt
										  where ro_no = '$ro' ");
					return $sql->row();
		
				}
			
		public function f_get_drnote_dtls(){

		$data = $this->db->query("select a.comp_id,a.ro_no,a.ro_dt,a.invoice_no, sum(a.soc_amt) as tot_amt,b.COMP_NAME COMP_NAME
									from  td_dr_note a,
	   					    mm_company_dtls b    							   							
					  where  a.comp_id = b.COMP_ID
									group by comp_id,ro_no,ro_dt,invoice_no,COMP_NAME");

		
		 return $data->result();
		
			
		}
		public function f_get_crnote_dtls(){
			// $user_id    = $this->session->userdata('login')->user_id;
	
		$data = $this->db->query("select comp_id,do_no,do_dt,invoice_no, sum(br_amt) as tot_amt
									from td_cr_note 
									group by comp_id,do_no,do_dt,invoice_no");
	
		return $data->result();
			
		}

			 //  Function For Credit Note Developed By Lokesh  08/04/2020//
		public function credit_amt(){
		   $data=$this->db->query("Select a.comp_id comp_id,a.do_no do_no,a.do_dt do_dt,a.invoice_no invoice_no,a.invoice_dt  invoice_dt,sum(a.br_amt) as tot_amt,b.COMP_NAME COMP_NAME
       							
       						from  td_cr_note a,
	   					    mm_company_dtls b    							   							
					  where  a.comp_id = b.COMP_ID
					
					  group by comp_id,do_no,do_dt,invoice_no,invoice_dt,COMP_NAME");

				return $data->result();
		}

        //  Function For Credit Note Developed By Lokesh  11/04/2020//
		public function f_getdo_dtl($branch_id){
	
		$data = $this->db->query("select do_no
									from td_cr_note 
									where branch_id = '$branch_id'

									group by do_no");
	
		return $data->result();
			
		}
		public function f_get_ro_dtls($ro_no) // For Jquery
        {

            $sql = $this->db->query("SELECT a.invoice_no,a.invoice_dt,a.due_dt,a.qty,a.no_of_bags ,a.comp_id,a.prod_id,b.gst_no,c.hsn_code,b.comp_name,c.gst_rt,a.br
			FROM td_purchase a ,mm_company_dtls b,mm_product c
			WHERE a.ro_no ='$ro_no'
			and a.comp_id=b.comp_id
			and a.prod_id=c.prod_id");
            return $sql->result();

		}

		public function f_get_particulars_in($table_name, $where_in=NULL, $where=NULL) {

			if(isset($where)){
	
				$this->db->where($where);
	
			}
	
			if(isset($where_in)){
	
				$this->db->where_in('sl_no', $where_in);
	
			}
			
			$result	=	$this->db->get($table_name);
	
			return $result->result();
	
		}
	
		
		public function f_get_sales_dtls($banch_id,$fin_id){
			// $user_id    = $this->session->userdata('login')->user_id;
			
	
		$data = $this->db->query("select a.irn, a.ack,a.ack_dt,a.trans_do,a.do_dt,a.trans_type,b.soc_name,sum(a.tot_amt) as tot_amt,c.prod_desc,a.gst_type_flag,(select count(paid_id) from tdf_payment_recv where sale_invoice_no=a.trans_do) as pay_cnt
									from td_sale a,mm_ferti_soc b,mm_product c
									where br_cd='$banch_id' 
									and fin_yr='$fin_id'
									and a.do_dt=CURDATE()
									and a.prod_id=c.prod_id
									and  a.soc_id=b.soc_id
									
									group by a.trans_do,a.do_dt,a.trans_type,b.soc_name,c.prod_desc,a.gst_type_flag
									order by a.do_dt desc");
									
	
		 return $data->result();
		
			
		}
		public function f_get_sales_bydt($banch_id,$fin_id,$frmdt,$todt){
			
		$data = $this->db->query("select a.irn, a.ack,a.ack_dt,a.trans_do,a.do_dt,a.trans_type,b.soc_name,sum(a.tot_amt) as tot_amt,c.prod_desc,a.gst_type_flag,
		                          (select count(paid_id) from tdf_payment_recv where sale_invoice_no=a.trans_do) as pay_cnt
									from td_sale a,mm_ferti_soc b,mm_product c
									where br_cd='$banch_id' 
									and fin_yr='$fin_id'
									and a.do_dt between '$frmdt' and '$todt'
									and a.prod_id=c.prod_id
									and a.soc_id=b.soc_id
									group by a.trans_do,a.do_dt,a.trans_type,b.soc_name,c.prod_desc,a.gst_type_flag
									order by a.do_dt desc");
									
	
		 return $data->result();
		
			
		}
   // Code Written By lokesh Kumar jha on 02/04/2020  //
       public function f_get_particulars($table_name, $select=NULL, $where=NULL, $flag) {
        
        if(isset($select)) {

            $this->db->select($select);

        }

        if(isset($where)) {

            $this->db->where($where);

        }

        $result		=	$this->db->get($table_name);

        if($flag == 1) {

            return $result->row();
            
        }else {

            return $result->result();

        }

       }


/*Select Maximun soceity Code*/
		public function get_soceity_code(){

			$this->db->select_max('soc_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_ferti_soc')->row()->soc_id;  
 
			return ($result+1);
		 }
		/*Select Maximun product Code*/
		public function get_product_code(){

			$this->db->select_max('prod_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_product')->row()->prod_id;  
 
			return ($result+1);
		 }
		 
		 /*Select Maximun comapany Code*/
		 public function get_company_code(){

			$this->db->select_max('comp_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_company_dtls')->row()->comp_id;  
 
			return ($result+1);
		 }
//Generate new schedule code accoring to acc_type(Liability 1,Asset 2,Income 5,Expense 6,Purchase 3,Sale 4)
		public function get_sch_code($acc_type){

		   $this->db->select_max('schedule_code');

		   $this->db->where('acc_type', $acc_type);
		   
		   $result = $this->db->get('md_schedule_heads')->row()->schedule_code;  

           return ($result+1);
		}

		public function get_subsch_code($sch_code,$acc_type){

		   $this->db->select_max('subschedule_code');
		   $this->db->where('acc_type', $acc_type);
		   $this->db->where('schedule_code', $sch_code);
           $result = $this->db->get('md_subschedule_heads')->row()->subschedule_code;  

           return ($result+1);
		}

/*Delete From Table*/
		public function f_delete($table_name, $where) {			

			$this->db->delete($table_name, $where);
			// echo $this->db->last_query();
			//  die();
			 return;
		}

/*Select Maximun Account Code*/
		public function f_max_no($sub_sch){

			$this->db->select_max('acc_code');

			$this->db->where('sub_sch_code', $sub_sch);

			$result = $this->db->get('md_account_heads');

			if($result->num_rows() > 0){

				return $result->row();

			}else{

			       return 0;	   	
			}	    
		}

		public function f_select_parameter($value){		      /*Select parameter value from table */
			$this->db->select('param_value');

			$this->db->where('sl_no',$value);

			$data = $this->db->get('md_parameters');

			if($data->num_rows() > 0){
				return $data->row();
			}else{
				return 0;	
			}
		}

		public function f_get_voucher_id_all($start_dt,$end_dt){   /*Get All Voucher ID*/		

			$this->db->distinct();

			$this->db->select('voucher_id');

			$this->db->where('voucher_date>=',$start_dt);

			$this->db->where('voucher_date<=',$end_dt);

			$this->db->where('approval_status','A');

			$result=$this->db->get('td_vouchers');

             return $result->result();
                }


		public function f_get_voucher_id($sys_date){

			$this->db->select_max('voucher_id');

			$this->db->where('voucher_date',$sys_date);

			$this->db->where('approval_status','A');

			$result=$this->db->get('td_vouchers');

			if($result->num_rows() > 0 ){
				
				return $result->row();
			}	
				else{
					return 0;
				 }
		}

		public function f_get_vouchers($start_dt,$end_dt,$voucher_id){

			 $vouchers=$this->db->query("select voucher_date,voucher_id,
						            voucher_mode,acc_code,
						            amount dr_amt,0 
						            cr_amt,remarks,
						            ins_no,ins_dt
						     from   td_vouchers
						     where  dr_cr_flag = 'Dr'
						     and    approval_status ='A'
						     and    voucher_date Between '$start_dt' And '$end_dt'
						     and    voucher_id = $voucher_id 
						     UNION
						     select voucher_date,voucher_id,
							    voucher_mode,acc_code,
							    0 dr_amt,
							    amount cr_amt,remarks,
							    ins_no,ins_dt
						     from   td_vouchers
						     where dr_cr_flag = 'Cr'
						     and    approval_status = 'A'
						     and    voucher_date Between '$start_dt' And '$end_dt'
						     and    voucher_id = $voucher_id 
						     order by voucher_date,voucher_id"); 
			 return $vouchers->result();
		}

		public function f_get_ac_code($acc_code){
			$this->db->select('acc_head');
			$this->db->where('acc_code',$acc_code);
			$result = $this->db->get('md_account_heads'); 
			return $result->row();
		}


		public function f_gl_report($start_dt,$end_dt,$acc_code){
		  $data=$this->db->query("select voucher_date,voucher_id,voucher_mode,ins_no,
       						     ins_dt,remarks,amount cr_amt,0 dr_amt,acc_code
       				  from   td_vouchers
					  where  dr_cr_flag = 'Cr'
					  and    voucher_date Between '$start_dt' And '$end_dt'
					  and    acc_code = $acc_code
					  UNION
					  select voucher_date,voucher_id,voucher_mode,ins_no,
       					  ins_dt,remarks,0 cr_amt,amount dr_amt,acc_code
       					  from   td_vouchers
					  where dr_cr_flag = 'Dr'
					  and    voucher_date Between '$start_dt' And '$end_dt'
					  and    acc_code = $acc_code
					  order by voucher_date,voucher_id");

				return $data->result();
		}

		public function f_opening_bal($adt_dt,$acc_code){
			$data=$this->db->query("select f_getopening('$adt_dt',$acc_code)opn_bal from Dual");
			return $data->row();
		}	

		public function f_closing_bal($adt_dt,$acc_code){
			$data=$this->db->query("select f_getclosing('$adt_dt',$acc_code)cls_bal from Dual");
			return $data->row();
		}
	
		public function f_trial_balance($adt_dt){
			$data=$this->db->query("select a.balance_dt,a.acc_code acc_code,
	   					       b.sch_code sch_code,
       						       c.schedule_type schedule_type,
	   					       b.acc_head acc_head,
	   					       a.balance_amt cr_amt,
     						       0 dr_amt
						from   tm_account_balance a,
	   					       md_account_heads b,
       						       md_schedule_heads c
						where  a.acc_code = b.acc_code
						and    b.sch_code = c.schedule_code
						and    a.balance_dt = (select max(balance_dt)
                       						       from   tm_account_balance
                       						       where  balance_dt <= '$adt_dt')
						and    a.balance_amt < 0
						UNION
						select a.balance_dt,a.acc_code acc_code,
	   					       b.sch_code sch_code,
       						       c.schedule_type schedule_type,
	   					       b.acc_head acc_head,
	   					       0 cr_amt,a.balance_amt dr_amt
						from   tm_account_balance a,
	   					       md_account_heads b,
       						       md_schedule_heads c
						where  a.acc_code = b.acc_code
						and    b.sch_code = c.schedule_code
						and    a.balance_dt = (select max(balance_dt)
                     						       from   tm_account_balance
                     						       where  balance_dt <= '$adt_dt')
						and    a.balance_amt > 0
						order by sch_code,acc_code");
			return $data->result();	

		}

		public function f_cash_book($from_dt,$to_dt){
			$data = $this->db->query("Select a.acc_code acc_code,
	   						 b.acc_head acc_head,
       							 sum(a.dr_amt)dr_amt,
       							 sum(a.cr_amt)cr_amt
						  from(select acc_code,Sum(amount) dr_amt,0 cr_amt from td_vouchers
						       where  voucher_date = '$from_dt'
						       and    dr_cr_flag = 'Dr'
						       and    voucher_mode = 'C'
					   	       and    acc_code <> 21101
						       group by acc_code     
						       UNION
						       select acc_code,0 dr_amt,Sum(amount) cr_amt from td_vouchers
						       where  voucher_date = '$to_dt'
						       and    dr_cr_flag = 'Cr'
						       and    voucher_mode = 'C'
						       and    acc_code <> 21101
						       group by acc_code)a,
						       md_account_heads b
						 where a.acc_code = b.acc_code
					         group by acc_code
						 ORDER BY acc_code");
			return $data->result();	
		}
    //  Function For Stock Report Developed By Lokesh  01/04/2020//
		public function stockreport($start_dt){
		   $data=$this->db->query("Select a.PROD_ID PROD_ID,a.COMPANY COMPANY,
	   						 a.PROD_DESC PROD_DESC,
       							 sum(b.qty) qty   

       						from   mm_product a,
	   					    td_purchase b    							   							
					  where  a.PROD_ID = b.prod_id
					
					  group by PROD_DESC,qty,PROD_ID,COMPANY");

				return $data->result();
		}

		public function f_get_stock_view($banch_id){
			$data=$this->db->query("select ro_no,ro_dt,invoice_no,invoice_dt,challan_flag from td_purchase
									where br='$banch_id' order by ro_dt,ro_no");
			return $data->result();

		}
   // Function For Stock Report Developed By Lokesh  13/04/2020//
		public function get_crnote_dist_report($banch_id){

                 $data=$this->db->query("select a.do_no,a.do_dt,a.tot_cr_amt,b.COMP_NAME 

       						from   td_cr_note a,
	   					    mm_company_dtls b  

					  where  a.comp_id = b.COMP_ID
                        and  a.branch_id = '$banch_id'
            				group by do_no,do_dt,tot_cr_amt,COMP_NAME");
              
				return $data->result();
		}

		public function get_crnote_comp_report($comp_id){


			  $data=$this->db->query("select a.do_no,a.do_dt,a.tot_cr_amt,a.branch_id,b.COMP_NAME ,c.district_name

       						from   td_cr_note a,
	   					    mm_company_dtls b,md_district c

					  where  a.comp_id = b.COMP_ID
					    and  a.branch_id =c.district_code
                        and  a.comp_id = '$comp_id'
            				group by do_no,do_dt,tot_cr_amt,branch_id,COMP_NAME,district_name");
              
				return $data->result();



		}
   // Code Devoleped For get Remain Amount Money Of Cr Of Company 15/04/2020/
		public function get_crnote_remain_report($comp_id){

			  $data=$this->db->query("select ro_no,branch_id,ifnull(sum(soc_amt),0) as soc_amt

       						from   td_dr_note
	   					   
					  where comp_id = '$comp_id'
					   
            				group by ro_no,branch_id");
              
				return $data->result();

		}

		// Function For Stock Report Developed By Lokesh  16/04/2020//
		public function get_drdist_report($banch_id){

                 $data=$this->db->query("select a.ro_no,a.tot_amt,ifnull(sum(a.soc_amt),0) as soc_amt,b.soc_name 

       						from   td_dr_note a,
	   					    mm_ferti_soc b  

					  where  a.soc_id = b.soc_id
                        and  a.branch_id = '$banch_id'
            				group by ro_no,tot_amt,soc_name");
              
				return $data->result();
		}
function f_salecrjnl($data){
			$curl = curl_init();

			curl_setopt_array($curl, array(
			 // CURLOPT_URL => 'http://localhost/benfed_fertilizer/index.php/fertilizer/api_journal/sale_voucher',
			CURLOPT_URL => 'http://localhost/Benfed_finance/index.php/api_voucher/sale_crvoucher',
			// CURLOPT_URL => 'https://benfed.in/benfed_fin/index.php/api_voucher/sale_crvoucher',
			 CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
				"data": '.json_encode($data).'
			}',
			
			  CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Cookie: ci_session=eieqmu6gupm05pkg5o78jqbq97jqb22g'
			  ),
			));
			
			$response = curl_exec($curl);
			
			curl_close($curl);
			echo $response;
			
		}

		function f_salejnl($data){
			$curl = curl_init();

			curl_setopt_array($curl, array(
			//   CURLOPT_URL => 'http://localhost/benfed_fertilizer/index.php/fertilizer/api_journal/sale_voucher',
			CURLOPT_URL => 'http://localhost/benfed_fin/index.php/api_voucher/sale_voucher',

			// CURLOPT_URL => 'https://benfed.in/benfed_fin/index.php/api_voucher/sale_voucher',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
				"data": '.json_encode($data).'
			}',
			
			  CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Cookie: ci_session=eieqmu6gupm05pkg5o78jqbq97jqb22g'
			  ),
			));
			
			$response = curl_exec($curl);
			
			curl_close($curl);
			echo $response;
			
		}
		// SAVE IRN
		function save_irn($data){
			$input = array(
				'irn' => $data['irn'],
				'ack' => $data['ack'],
				'ack_dt' => $data['ack_dt'],
				'gst_type_flag'=>$data['trn_type']
			);
			$this->db->where(array(
				'trans_do' => $data['trans_do']
			));
			if($this->db->update('td_sale', $input)){
				return 1;
			}else{
				return 0;
			}
		}

		function save_irncr($data, $irn, $ackno,$AckDt){
			
			$row = array();
			$this->db->where(array(
				'trans_do' => $data['trans_do']
			));
			$query = $this->db->get('td_sale');
			
			if($query->num_rows() > 0){
				foreach($query->row() as $k=>$v){
					$row[$k] = $v;
				}

				
				$row['nwirn'] = $irn;
				$row['cnl_flag'] = 'CRN';
				if($this->db->insert('td_sale_cancel', $row)){
					$this->db->where(array(
						'trans_do' => $data['trans_do']
					));
					if($this->db->delete('td_sale')){
						$input = array(
							// 'trans_dt' => date('Y-m-d'),
							'trans_dt' => $AckDt,
							'trans_no' => $row['trans_no'],
							'recpt_no' => 'CRN/'. $ackno,
							'soc_id' => $row['soc_id'],
							'comp_id' => $row['comp_id'],
							'invoice_no' => $row['trans_do'],
							'ro' => $row['sale_ro'],
							'catg' => $row['catg_id'],
							'tot_amt' => $row['round_tot_amt'],
							'trans_flag' =>'R',
							//'note_type' => $row[''],
							'branch_id' => $row['br_cd'],
							'fin_yr' => $row['fin_yr'],
							'note_type'=>'D',
							'remarks'  =>'CRN'
						);
						$this->db->insert('tdf_dr_cr_note', $input);
					}else{
						return false;
					}
				}else{
					return false;
				}

				
			}
		}


	}
?>
