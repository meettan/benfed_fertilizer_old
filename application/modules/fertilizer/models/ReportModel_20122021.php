<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ReportModel extends CI_Model{

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

        public function f_get_product_list($branch,$frmDt){
            /*$query  = $this->db->query("select a.PROD_ID,a.PROD_DESC,a.COMPANY,a.unit,b.COMP_ID,
                                     b.COMP_NAME,b.short_name
                              from   mm_product a,mm_company_dtls b
                              where  a.COMPANY = b.COMP_ID
                              order by a.COMPANY,a.PROD_ID");*/

            $query  = $this->db->query("select Distinct a.prod_id,b.PROD_DESC,a.comp_id,a.unit,
                                        c.COMP_NAME,c.short_name
                                from   td_purchase a,mm_product b,mm_company_dtls c
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                               
                                and     a.br       = $branch
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }

        public function f_get_product_list_nw($frmDt){
            /*$query  = $this->db->query("select a.PROD_ID,a.PROD_DESC,a.COMPANY,a.unit,b.COMP_ID,
                                     b.COMP_NAME,b.short_name
                              from   mm_product a,mm_company_dtls b
                              where  a.COMPANY = b.COMP_ID
                              order by a.COMPANY,a.PROD_ID");*/

            $query  = $this->db->query("select Distinct a.prod_id,b.PROD_DESC,a.comp_id,a.unit,
                                        c.COMP_NAME,c.short_name
                                from   td_purchase a,mm_product b,mm_company_dtls c
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                               
                              
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }

        public function f_get_product_list_rep($branch,$frmDt,$prod_id){
           

            $query  = $this->db->query("select Distinct a.prod_id,a.ro_no,b.PROD_DESC,a.comp_id,a.unit,
                                        c.COMP_NAME,c.short_name
                                from   td_purchase a,mm_product b,mm_company_dtls c
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                                and    a.prod_id = '$prod_id'
                                and     a.br       = $branch
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }
        public function f_get_product_list_companywise($branch,$frmDt,$comp_id){
           

            $query  = $this->db->query("select Distinct a.prod_id,a.ro_no,b.PROD_DESC,a.comp_id,a.unit,
                                        c.COMP_NAME,c.short_name
                                from   td_purchase a,mm_product b,mm_company_dtls c
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                                and    a.comp_id = '$comp_id'
                                and    a.trans_dt >= '$frmDt'
                                and     a.br       = $branch
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }

        public function f_get_district_asc(){

            $query  = $this->db->query("SELECT * FROM `md_branch` order by branch_name asc");
            
            return $query->result();

        }

        public function f_get_salerateho($comp_id,$district,$frm_date,$to_date,$fin_id){

            $sql ="SELECT `a`.`frm_dt`, `a`.`to_dt`, `a`.`catg_id`, `a`.`sp_mt`, `a`.`sp_bag`, `a`.`sp_govt`, `b`.`cate_desc`, `c`.`PROD_DESC` FROM `mm_sale_rate` `a`, `mm_category` `b`, `mm_product` `c` WHERE `a`.`catg_id` = `b`.`sl_no` AND `a`.`prod_id` = `c`.`PROD_ID` AND `a`.`comp_id` = '$comp_id' AND `a`.`district` = '$district' AND `a`.`frm_dt` >= '$frm_date' AND `a`.`frm_dt` <= '$to_date' AND `a`.`fin_id` = '$fin_id' order by c.PROD_DESC,b.cate_desc,a.frm_dt" ;
            
            $query  = $this->db->query($sql);

            return $query->result();

        }

        public function  f_get_scendry_stk_point($branch){
            $query =$this->db->query("select  distinct a.stock_point as soc_id,b.soc_name as soc_name
                                        from td_purchase a,mm_ferti_soc b
                                        where a.stock_point=b.soc_id
                                        and  a.br=$branch");
                                        // echo $this->db->last_query();
                                        // die();
            return $query->result(); 
        }

        //  public function f_get_product_comp_prod_ro($branch,$frmDt,$comp_id,$prod_id,$ro){
           

        //     $query  = $this->db->query("select Distinct a.prod_id,d.sale_ro,b.PROD_DESC,a.comp_id,a.unit,d.do_dt,d.trans_do,
        //                                 c.COMP_NAME,c.short_name
        //                         from   td_purchase a,mm_product b,mm_company_dtls c,td_sale d
        //                         where  a.prod_id = b.PROD_ID
        //                         and    a.comp_id = c.COMP_ID
        //                         and    a.ro_no   = d.sale_ro
        //                         and    a.comp_id = '$comp_id'
        //                         and    a.prod_id = '$prod_id'
        //                         and    d.sale_ro   = '$ro'
        //                         and    d.sale_due_dt >= '$frmDt'
        //                         and    a.br       = $branch
        //                         order by a.comp_id");

        //     return $query->result();
        // }


        public function f_get_product_dtls_stkp_wse($branch,$frmDt,$to_dt,$comp_id,$prod_id){

            $query =$this->db->query("select b.PROD_DESC,c.COMP_NAME,d.soc_name
            from td_sale a ,mm_product b ,mm_company_dtls c,mm_ferti_soc d
            where a.prod_id=b.prod_id
            and a.comp_id=c.comp_id
            and a.soc_id=d.soc_id
            and a.prod_id=$prod_id
            and a.br_cd=$branch
            and do_dt between '$frmDt' and   '$to_dt' ");

            
            return $query->result();     

        }
         public function f_get_product_comp_prod_ro($branch,$frmDt,$to_dt,$comp_id,$prod_id,$ro){

           
            // $query  = $this->db->query("select Distinct a.prod_id,d.sale_ro,b.PROD_DESC,a.comp_id,a.unit,
            //                             c.COMP_NAME,c.short_name
            //                     from   td_purchase a,mm_product b,mm_company_dtls c,td_sale d
            //                     where  a.prod_id = b.PROD_ID
            //                     and    a.comp_id = c.COMP_ID
            //                     and    a.ro_no   = d.sale_ro
            //                     and    a.comp_id = '$comp_id'
            //                     and    a.prod_id = '$prod_id'
            //                     and    d.sale_ro   = '$ro'
            //                     and    d.sale_due_dt >= '$frmDt'
            //                     and    a.br       = $branch
            //                     order by a.comp_id");

            $query =$this->db->query("select a.prod_id,a.ro_no, (select GROUP_CONCAT(trans_do) 
                                                                from td_sale a,mm_company_dtls b,mm_product c
                                                                where a.comp_id =b.comp_id
                                                                and   a.prod_id = c.prod_id
                                                                and a.br_cd     = $branch
                                                                and   a.do_dt between '$frmDt' and '$to_dt'
                                                                and   a.sale_ro    ='$ro')sale_trans_ro,
                                        a.comp_id,a.unit,b.COMP_NAME,c.PROD_DESC,b.short_name
                                                                        from td_purchase a,mm_company_dtls b,mm_product c
                                                                        where a.comp_id =b.comp_id
                                                                        and   a.prod_id = c.prod_id
                                                                        and a.br  = $branch
                                                                        and   a.trans_dt between '$frmDt' and '$to_dt'
                                                                        and   a.trans_flag = 1
                                                                        and   a.ro_no      = '$ro'
                                            UNION
                                            select a.prod_id,a.sale_ro,GROUP_CONCAT(trans_do) sale_trans_ro,a.comp_id,a.unit,b.COMP_NAME,c.PROD_DESC,b.short_name
                                            from td_sale a,mm_company_dtls b,mm_product c
                                            where a.comp_id =b.comp_id
                                            and   a.prod_id = c.prod_id
                                            and a.br_cd     = $branch
                                            and   a.do_dt between '$frmDt' and '$to_dt'
                                            and   a.sale_ro    ='$ro'");


            

            return $query->result();      

           
        }

        public function f_get_balance($branch,$frmDt,$toDt){
            if ($frmDt>='2021-04-01') {

                $data = $this->db->query("Select prod_id,tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as opn_qty, tot_pur, tot_sale,sum(tot_sale)tot_sale,0 cls_qty
            from (
                select prod_id,sum(qty)+sum(tot_pur)-sum(tot_sale)qty,0 tot_pur,0 tot_sale
                from(
                select prod_id,sum(ifnull(qty,0))qty,0 tot_pur,0 tot_sale
                                from tdf_opening_stock
                                where branch_id	    = $branch
                                and   balance_dt ='2020-04-01'
                                group by prod_id
                                union
                select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                                  from td_sale
                                  where br_cd	    = $branch
                                  and   do_dt <'$frmDt'
                                  group by prod_id
                UNION
                select prod_id,ifnull(sum(qty),0) tot_pur,0 qty,0 tot_sale
                                  from td_purchase
                                  where br	    =$branch
                                  and   trans_dt <'$frmDt'
                                  and   trans_flag = 1
                                  group by prod_id)a
                                  group by prod_id
                  UNION
                  select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale
                  from td_purchase
                  where br	    = $branch
                  and   trans_dt between '$frmDt' and  '$toDt'
                  and   trans_flag = 1
                  group by prod_id
                  UNION
                  select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                  from td_sale
                  where br_cd	    = $branch
                  and   do_dt between '$frmDt' and '$toDt'
                  group by prod_id)a
              group by prod_id
              order by prod_id");
			}else{
				 
				 $data = $this->db->query("Select prod_id,tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as opn_qty, tot_pur, tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as cls_qty
            from (
                select prod_id,sum(qty)+sum(tot_pur)-sum(tot_sale)qty,0 tot_pur,0 tot_sale
                from(
                select prod_id,sum(ifnull(qty,0))qty,0 tot_pur,0 tot_sale
                                from tdf_opening_stock
                                where branch_id	    = $branch
                                and   balance_dt ='2020-04-01'
                                group by prod_id
                                union
                select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                                  from td_sale
                                  where br_cd	    = $branch
                                  and   do_dt <'$frmDt'
                                  group by prod_id
                UNION
                select prod_id,ifnull(sum(qty),0) tot_pur,0 qty,0 tot_sale
                                  from td_purchase
                                  where br	    =$branch
                                  and   trans_dt <'$frmDt'
                                  and   trans_flag = 1
                                  group by prod_id)a
                                  group by prod_id
                  UNION
                  select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale
                  from td_purchase
                  where br	    = $branch
                  and   trans_dt between '$frmDt' and  '$toDt'
                  and   trans_flag = 1
                  group by prod_id
                  UNION
                  select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                  from td_sale
                  where br_cd	    = $branch
                  and   do_dt between '$frmDt' and '$toDt'
                  group by prod_id)a
              group by prod_id
              order by prod_id");
			}
        
			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
        }
////////////////////////////////////////
public function f_get_crdemand($branch,$frmDt,$toDt){

    $data = $this->db->query("select  sum(dep_amt)dep_amt,sum(adj_amt)adj_amt,sum(dep_amt)- sum(adj_amt)demand,soc_name
                         from(
                        select  0 dep_amt,ifnull(sum(a.paid_amt),0)adj_amt ,a.soc_id,b.soc_name
                                FROM tdf_payment_recv a,mm_ferti_soc b
                                WHERE a.branch_id=b.district
                                and   a.branch_id='$branch'
                                and a.pay_type='6'
                                and   a.paid_dt between '$frmDt' and '$toDt'
                        group by a.soc_id ,b.soc_name
                        
                        union
                        
                        select  ifnull(sum(a.tot_amt),0),0,a.soc_id,b.soc_name  from  tdf_dr_cr_note a,mm_ferti_soc b
                        where a.trans_flag='R'
                        and a.note_type='D'
                        and a.branch_id='$branch'
                        and a.branch_id=b.district
                        group by a.soc_id,b.soc_name )a
                        group by  soc_name");

    if($data->num_rows() > 0 ){
        $row = $data->result();
    }else{
        $row = 0;
    }
    return $row;
}

////////////////////////////////////////////////
        public function f_get_balance_rowise($branch,$from_dt,$to_dt,$opndt){

           

                $data = $this->db->query("Select prod_id,ifnull(Sum(qty ),0)  as opn_qty, tot_pur, tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as cls_qty,ro_no
            from (
                select prod_id,sum(qty)+sum(tot_pur)-sum(tot_sale)qty,0 tot_pur,0 tot_sale,ro_no
                from(
                select prod_id,sum(ifnull(qty,0))qty,0 tot_pur,0 tot_sale,ro_no
                                from tdf_opening_stock
                                where branch_id	    = $branch
                                and   balance_dt ='2020-04-01'
                                group by prod_id,ro_no
                                union
                select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale,sale_ro
                                  from td_sale
                                  where br_cd	    = $branch
                                  and   do_dt <'$from_dt'
                                  group by prod_id,sale_ro
                UNION
                select prod_id,ifnull(sum(qty),0) qty,0 tot_pur,0 tot_sale,ro_no
                                  from td_purchase
                                  where br	    =$branch
                                  and   trans_dt < '$from_dt' 
                                  and   trans_flag = 1
                                  group by prod_id,ro_no)a
                                  group by prod_id,ro_no
                  UNION
                  select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale,ro_no
                  from td_purchase
                  where br	    = $branch
                  and   trans_dt between '$from_dt' and  '$to_dt'
                  and   trans_flag = 1
                  group by prod_id,ro_no
                  UNION
                  select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale,sale_ro
                  from td_sale
                  where br_cd	    = $branch
                  and   do_dt between '$from_dt' and '$to_dt'
                  group by prod_id,sale_ro)a
              group by prod_id,ro_no
              order by prod_id");
              

            if($data->num_rows() > 0 ){
                $row = $data->result();
            }else{
                $row = 0;
            }
            return $row;
        }
        
        public function f_get_purchase($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_pur
                                        from td_purchase
                                        where br	    = $branch
                                        and   trans_dt between '$frmDt' and '$toDt'
                                        and   trans_flag = 1
                                        group by prod_id");

            return $query->result();
        }

        public function f_get_purchase_rowise($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_pur,ro_no
                                        from td_purchase
                                        where br        = $branch
                                        and   trans_dt between '$frmDt' and '$toDt'
                                        and   trans_flag = 1
                                        group by prod_id,ro_no");

            return $query->result();
        }
/******************************************* */

public function f_get_yrwisecompwisesale(){
       $query  = $this->db->query("select  fin_yr,sum(IFFCO_QTY)IFFCO_QTY,sum(IFFCO_VALUE)IFFCO_VALUE,sum(KRIBCO_QTY)KRIBCO_QTY,sum(KRIBCO_VALUE)KRIBCO_VALUE,
                                    sum(IPL_QTY)IPL_QTY,sum(IPL_VALUE)IPL_VALUE,sum(CIL_QTY)CIL_QTY,sum(CIL_VALUE)CIL_VALUE,
                                    sum(KCFL_QTY)KCFL_QTY,sum(KCFL_VALUE)KCFL_VALUE,sum(JCF_QTY)JCF_QTY,sum(JCF_VALUE)JCF_VALUE,sum(MIPL_QTY)MIPL_QTY,sum(MIPL_VALUE)MIPL_VALUE
                                    from(
                                    SELECT b.fin_yr, if(c.comp_id=1,sum(a.qty),0)IFFCO_QTY,if(c.comp_id=1,sum(a.tot_amt) ,0)IFFCO_VALUE,
                                    if(c.comp_id=2,sum(a.qty),0)KRIBCO_QTY,if(c.comp_id=2,sum(a.tot_amt) ,0)KRIBCO_VALUE,
                                    if(c.comp_id=3,sum(a.qty),0)IPL_QTY,if(c.comp_id=3,sum(a.tot_amt) ,0)IPL_VALUE,
                                    if(c.comp_id=4,sum(a.qty),0)CIL_QTY,if(c.comp_id=4,sum(a.tot_amt) ,0)CIL_VALUE,
                                    if(c.comp_id=5,sum(a.qty),0)KCFL_QTY,if(c.comp_id=5,sum(a.tot_amt) ,0)KCFL_VALUE,
                                    if(c.comp_id=6,sum(a.qty),0)JCF_QTY,if(c.comp_id=6,sum(a.tot_amt) ,0)JCF_VALUE,
                                    if(c.comp_id=3,sum(a.qty),0)MIPL_QTY,if(c.comp_id=3,sum(a.tot_amt) ,0)MIPL_VALUE
                                    FROM td_sale  a ,md_fin_year b ,mm_company_dtls c
                                    WHERE a.fin_yr=b.sl_no
                                    AND c.comp_id=a.comp_id
                                    GROUP by a.fin_yr,c.comp_id)a
                                    group by fin_yr");


    return $query->result();

}

public function f_get_yrwisesale(){

    $query  = $this->db->query("SELECT b.fin_yr,c.district_name, sum(a.qty)qty,sum(a.tot_amt) tot_amt
    FROM td_sale  a ,md_fin_year b ,md_district c
    where a.fin_yr=b.sl_no
    and c.district_code=a.br_cd
    group by a.fin_yr,c.district_name
    order by b.fin_yr,c.district_name");


    return $query->result();

}
/**************************************************** */
        // public function f_get_purchase_all_ro($branch,$frmDt,$toDt,$comp_id,$prod_id){
        //     $query  = $this->db->query("select ro_no
        //                                 from td_purchase
        //                                 where br        = $branch
        //                                 and   trans_dt between '$frmDt' and '$toDt'
        //                                 and   comp_id = $comp_id
        //                                 and   prod_id =$prod_id
        //                                 group by prod_id,ro_no");

        //     return $query->result();
        // }


        public function f_get_sale($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_sale
                                        from td_sale
                                        where br_cd	    = $branch
                                        and   do_dt between '$frmDt' and '$toDt'
                                        group by prod_id");

            return $query->result();
        }

        public function f_get_sale_rowise($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_sale,sale_ro
                                        from td_sale
                                        where br_cd     = $branch
                                        and   do_dt between '$frmDt' and '$toDt'
                                        group by prod_id,sale_ro");

            return $query->result();
        }

        public function pc($all_data)
        {
            
            try {
                $this->db->reconnect();
                
                $sql = "CALL `p_purchase_all`(?,?,?)";
             
                $data_w = $this->db->query($sql,$all_data); 
// echo $this->db->last_query();
// die();
//                 // array(‘first’=>’Foo’,’last’=>’Bar’,’mood’=>’Testy’) 
               
                $this->db->close();
    
    
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            // return $result;
            return $data_w->result();
            // return $data->result_object();
        
        }


        public function f_get_hsn_gst($frmDt,$toDt){

        $query  = $this->db->query("select  c.prod_desc,c.hsn_code, d.unit_name,sum(a.qty) as qty,sum(a.round_tot_amt)as  sale_tot_amt,
                                    sum(a.cgst) sale_cgst,sum(a.sgst) sale_sgst,sum(a.taxable_amt) taxable_amt
                                    from td_sale a,mm_product c,mm_unit d
                                    where   a.prod_id=c.prod_id
                                    and a.unit=d.id
                                    and  a.do_dt between '$frmDt' and '$toDt'
                                    group by c.prod_desc,c.hsn_code ,d.unit_name");

            return $query->result();
        }
        public function f_get_gst($frmDt,$toDt){
            $query  = $this->db->query("select  c.soc_name,a.trans_do,a.gst_type_flag,a.do_dt,a.round_tot_amt sale_tot_amt,c.gstin,
                                       a.cgst sale_cgst,a.sgst sale_sgst,b.cgst pur_cgst,b.sgst pur_sgst,a.taxable_amt   taxable_amt,
                                        a.cgst -b.cgst diff_cgst,a.sgst-b.sgst diff_sgst,
                                        (select  gst_rt from mm_product where prod_id=b.prod_id) as gst_rt
                                        from td_sale a,td_purchase b,mm_ferti_soc c
                                        where  a.sale_ro=b.ro_no
                                        and  a.soc_id=c.soc_id
                                        and  a.do_dt between '$frmDt' and '$toDt'
                                       order by a.do_dt ");

            return $query->result();
        }

        public function f_get_purchaserep($branch,$frmDt,$toDt){
            $query  = $this->db->query("select a.ro_no,a.ro_dt,a.invoice_no,a.invoice_dt,a.qty,a.retlr_margin,
                                        a.spl_rebt,a.rbt_add,a.rbt_less,a.rnd_of_add,a.rnd_of_less,
                                        a.unit,a.stock_qty,a.rate,a.base_price,a.no_of_bags,a.cgst,a.sgst,a.tot_amt,
                                        c.short_name,b.PROD_DESC,a.trad_margin,a.oth_dis,a.frt_subsidy,d.soc_name
                                        from td_purchase a,mm_product b,mm_company_dtls c,mm_ferti_soc d
                                        where  a.prod_id = b.PROD_ID
                                        and    a.comp_id = c.COMP_ID
                                        and    a.stock_point=d.soc_id
                                        and    a.br        = '$branch'
                                        and    a.trans_dt between '$frmDt' and '$toDt'
                                        and    a.trans_flag = 1
                                        order by  c.short_name, a.ro_dt ");

            return $query->result();
        }

        public function f_get_sales($branch,$frmDt,$toDt){
            $query  = $this->db->query("select a.trans_do,a.do_dt,a.trans_type,a.sale_ro,a.qty,a.soc_id,
                                               a.sale_rt,a.taxable_amt,a.cgst,a.sgst,a.dis,a.tot_amt,c.short_name,b.PROD_DESC

                                        from td_sale a,mm_product b,mm_company_dtls c
                                        where  a.prod_id = b.PROD_ID
                                        and    a.comp_id = c.COMP_ID
                                       
                                        and    a.br_cd   = '$branch'
                                        and    a.do_dt between '$frmDt' and '$toDt'
                                        order by c.short_name, a.do_dt");

            return $query->result();
        }

        public function f_get_crngstreg($branch,$frmDt,$toDt){
            $query  = $this->db->query("SELECT a.do_dt,b.soc_name,b.gstin,a.trans_do,a.taxable_amt,a.cgst,a.sgst,a.tot_amt,c.gst_rt rate 
                                        FROM   td_sale_cancel a ,mm_ferti_soc b,mm_product c
                                        WHERE  a.cnl_flag='CRN'
                                        and    a.soc_id=b.soc_id
                                        and a.prod_id=c.prod_id
                                        and    a.do_dt between '$frmDt' and '$toDt'
                                        order by  a.do_dt");

            return $query->result();
        }

        public function f_get_crngstunreg($branch,$frmDt,$toDt){
            $query  = $this->db->query("SELECT a.do_dt,b.soc_name,b.gstin,a.trans_do,a.taxable_amt,a.cgst,a.sgst,a.tot_amt,c.gst_rt rate 
                                        FROM   td_sale_cancel a ,mm_ferti_soc b,mm_product c
                                        WHERE  a.cnl_flag='INV'
                                        and    a.soc_id=b.soc_id
                                        and    a.prod_id=c.prod_id
                                        and    a.do_dt between '$frmDt' and '$toDt'
                                        order by  a.do_dt");

            return $query->result();
        }

        
        
        public function p_soc_wise_sale($all_data)
        {
            
            try {
                $this->db->reconnect();
                
                $sql = "CALL `p_soc_wise_sale`(?,?,?,?)";
             
                $data_w = $this->db->query($sql,$all_data); 
// echo $this->db->last_query();
// die();
//              
                $this->db->close();
    
    
            } catch (Exception $e) {
                echo $e->getMessage();
            }
           
            return $data_w->result();
           
        
        }
/***************************************** */

public function p_psoc_wise_sale($all_data)
{
    
    try {
        $this->db->reconnect();
        
        $sql = "CALL `p_psoc_wise_sale`(?,?,?,?)";
     
        $data_w = $this->db->query($sql,$all_data); 
// echo $this->db->last_query();
// die();
//              
        $this->db->close();


    } catch (Exception $e) {
        echo $e->getMessage();
    }
   
    return $data_w->result();
   

}

/************************Delivery register Society Wise*********** */
public function p_delivery_reg($frm_dt,$to_dt,$br_cd,$soc_id){

    $query  = $this->db->query("SELECT a.do_dt,a.trans_do,a.prod_id,b.prod_desc,a.sale_ro,a.qty,a.soc_id,c.soc_name,
    (select distinct  paid_id from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and soc_id=$soc_id) as paid_id,(select distinct  paid_dt from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and soc_id=$soc_id) as paid_dt,
    (select ro_dt from td_purchase where ro_no=a.sale_ro and br=$br_cd) ro_dt,
    (select   ifnull(sum(paid_amt),0) from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and soc_id=$soc_id) as paid_amt
    FROM  td_sale a,mm_product b ,mm_ferti_soc c
    WHERE a.prod_id=b.prod_id
    and a.soc_id=c.soc_id
    and a.br_cd=$br_cd and a.soc_id=$soc_id
    and a.do_dt between '$frm_dt' and '$to_dt'");
return $query->result();


}
/*************Delivery Register Comapny Wise*********************/
public function p_delivery_reg_compwse($frm_dt,$to_dt,$br_cd,$comp_id){

    $query  = $this->db->query("SELECT a.do_dt,a.trans_do,a.prod_id,b.prod_desc,a.sale_ro,a.qty,a.soc_id,c.soc_name,d.short_name,
    (select distinct  paid_id from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and comp_id=$comp_id and soc_id=a.soc_id) as paid_id,
    (select distinct  paid_dt from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and comp_id=$comp_id and soc_id=a.soc_id) as paid_dt,
    (select ro_dt from td_purchase where ro_no=a.sale_ro and br=$br_cd) ro_dt,
    (select   sum(paid_amt) from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and comp_id=$comp_id and soc_id=a.soc_id) as paid_amt
    FROM  td_sale a,mm_product b ,mm_ferti_soc c,mm_company_dtls d
    WHERE a.prod_id=b.prod_id
    and a.soc_id=c.soc_id
    and a.comp_id=d.comp_id
    and a.br_cd=$br_cd and a.comp_id=$comp_id
    and a.do_dt between '$frm_dt' and '$to_dt'");
return $query->result();


}
/********************************** */


public function p_ro_wise_prof_calc($all_data)
{
    
    try {
        $this->db->reconnect();
        
        $sql = "CALL `p_ro_wise_prof_calc`(?,?,?)";
     
        $data_w = $this->db->query($sql,$all_data); 
// echo $this->db->last_query();
// die();
//              
        $this->db->close();


    } catch (Exception $e) {
        echo $e->getMessage();
    }
   
    return $data_w->result();
   

}
/************************************************ */
public function p_ro_wise_prof_calc_all($all_data)
{
    
    try {
        $this->db->reconnect();
        
        $sql = "CALL `p_ro_wise_prof_calc_all`(?,?)";
     
        $data_w = $this->db->query($sql,$all_data); 
// echo $this->db->last_query();
// die();
//              
        $this->db->close();


    } catch (Exception $e) {
        echo $e->getMessage();
    }
   
    return $data_w->result();
   

}



/************************************************ */
        public function p_sale_purchase($all_data)
        {
            
            try {
                $this->db->reconnect();
                
                $sql = "CALL `p_sale_purchase`(?,?,?,?)";
             
                $data_w = $this->db->query($sql,$all_data); 
// echo $this->db->last_query();
// die();        
                $this->db->close();
    
    
            } catch (Exception $e) {
                echo $e->getMessage();
            }
          
            return $data_w->result();
           
        
        }

        public function p_soc_wse_sale_purchase($all_data)
        {
            
            try {
                $this->db->reconnect();
                
                $sql = "CALL `p_soc_wse_sale_purchase`(?,?,?,?,?,?)";
             
                $data_x = $this->db->query($sql,$all_data); 
// echo $this->db->last_query();
// die();
                $this->db->close();
    
    
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            return $data_x->result();
        
        
        }


        public function f_get_soc_pay($frmDt,$toDt,$branch){
            $query  = $this->db->query("
                                    
            select soc_id,soc_name,sum(paid_amt)tot_paid,sum(paybl)tot_payble,sum(adv)adv
            from(
                                                  SELECT c.soc_id soc_id,soc_name,sum(c.paid_amt)paid_amt,0 paybl,
                                                  ( SELECT sum(adv_amt) FROM `tdf_advance` where `trans_type`='I'
                                                    and trans_dt between '$frmDt' and '$toDt'
                                                    and branch_id=$branch and soc_id=c.soc_id)adv
                                                    FROM tdf_payment_recv c,mm_ferti_soc b
                                                    where c.soc_id=b.soc_id
                                                    and c.branch_id=$branch
                                                    and c.paid_dt   between '$frmDt' and '$toDt'
                                                    group by soc_name,c.soc_id
                                                UNION
                                                    SELECT b.soc_id,soc_name,0,sum(c.round_tot_amt),0
                                                        FROM td_sale c,mm_ferti_soc b
                                                        where c.soc_id=b.soc_id
                                                        and c.br_cd=$branch
                                                    and c.do_dt between  '$frmDt' and '$toDt'
                                                    group by soc_name,b.soc_id
                                                Union
                                               SELECT c.soc_id,b.soc_name,0 tot_paid ,sum(c.round_tot_amt) tot_payble,0
                                                FROM mm_ferti_soc b ,td_sale c
                                                where c.br_cd=b.district 
                                                and c.br_cd=$branch
                                                and c.soc_id=b.soc_id 
                                                and c.do_dt between '$frmDt' and '$toDt'
                                                and c.soc_id not in(select  soc_id from  tdf_payment_recv where  paid_dt between '2020-04-01' and '2021-03-31' and branch_id=343)
                                                group by b.soc_name,c.soc_id
                                                union 
                                            select  b.soc_id,b.soc_name,0 tot_paid ,sum(c.tot_recvble_amt) tot_payble,0
                                                from  mm_ferti_soc b, tdf_payment_recv c
                                                where b.district=c.branch_id
                                                and  b.district=$branch
                                                and c.soc_id=b.soc_id 
                                                and c.sale_invoice_dt between '$frmDt' and '$toDt'
                                                and c.pay_type='O'
                                                group by  b.soc_id,b.soc_name)a
                    group by soc_id,soc_name");




            return $query->result();
        }

 public function f_get_allsoc_pay($frmDt,$toDt,$comp_id){

 $query  = $this->db->query("                    
select e.short_name,a.ro_no,c.district_name,a.paid_dt,b.soc_name,sum(a.paid_amt)tot_paid,sum(a.net_recvble_amt)tot_payble
from tdf_payment_recv a,mm_ferti_soc b,md_district c,mm_company_dtls e
where a.soc_id=b.soc_id
and b.district=c.district_code
and a.comp_id=$comp_id
and a.comp_id=e.comp_id
and a.paid_dt between '$frmDt' and '$toDt'
and a.approval_status='A'
and a.net_recvble_amt>0
group by c.district_name,a.paid_dt,b.soc_name,a.ro_no
order by c.district_name,a.paid_dt");

  return $query->result();
        }

        public function f_get_stockpoint($ro){

            $query  = $this->db->query("select   b.soc_name as soc_name
                                        from  td_purchase a ,mm_ferti_soc b
                                        where  a.stock_point=b.soc_id 
                                        and  a.ro_no='$ro'");
        return $query->row();

        }
          
        public function f_get_soc_paid($frmDt,$toDt,$branch){
            $query  = $this->db->query("
                                        SELECT a.soc_id,b.soc_name,sum(a.paid_amt)tot_paid 
                                        FROM `tdf_payment_recv`a ,mm_ferti_soc b 
                                        where a.branch_id=b.district 
                                        and a.branch_id=$branch
                                        and a.soc_id=b.soc_id 
                                        and a.paid_dt between '$frmDt' and '$toDt'
                                        group by b.soc_name,a.soc_id ");

            return $query->result();
        }


        
        public function f_get_allsoc_paid($frmDt,$toDt){
            $query  = $this->db->query("
                                        SELECT a.soc_id,b.soc_name,sum(a.paid_amt)tot_paid 
                                        FROM `tdf_payment_recv`a ,mm_ferti_soc b 
                                        where a.branch_id=b.district 
                                       
                                        and a.soc_id=b.soc_id 
                                        and a.paid_dt between '$frmDt' and '$toDt'
                                        group by b.soc_name,a.soc_id ");

            return $query->result();
        }

        public function f_get_sales_society($branch,$frmDt,$toDt,$soc_id){
            $query  = $this->db->query("select a.trans_do,a.do_dt,a.trans_type,a.sale_ro,a.qty,a.soc_id,d.soc_name,
                                               a.sale_rt,a.taxable_amt taxable_amt,a.cgst,a.sgst,a.dis,a.tot_amt,c.short_name,b.PROD_DESC

                                        from td_sale a,mm_product b,mm_company_dtls c,mm_ferti_soc d
                                        where  a.prod_id = b.PROD_ID
                                        and    a.comp_id = c.COMP_ID
                                        and    a.stock_point  = '$soc_id'
                                        and    a.br_cd   = '$branch'
                                        and    a.stock_point  = d.soc_id
                                        and    a.do_dt between '$frmDt' and '$toDt'
                                        ");

            return $query->result();
        }

		public function get_fersociety_name($soc_id){

			$sql="select soc_name
			     from mm_ferti_soc where soc_id = '$soc_id' order by  soc_name";

		  $result = $this->db->query($sql);     
	  
		  return $result->row();

  }
  public function get_comp_name($comp_id){

    $sql="select comp_name
         from mm_company_dtls where comp_id = '$comp_id' order by  comp_name";

  $result = $this->db->query($sql);     

  return $result->row();

}
        public function f_get_sales_branch($frmDt,$toDt,$br){
            $query  = $this->db->query("select a.trans_do,a.do_dt,a.trans_type,a.sale_ro,a.qty,a.soc_id,
                                        a.sale_rt,a.taxable_amt,a.cgst,a.sgst,a.dis,a.tot_amt,c.short_name,b.PROD_DESC
                                        from td_sale a,mm_product b,mm_company_dtls c
                                        where  a.prod_id = b.PROD_ID
                                        and    a.comp_id = c.COMP_ID
                                        and    a.br_cd   = '$br'
                                        and    a.do_dt between '$frmDt' and '$toDt'
                                        order by a.do_dt");

            return $query->result();
        }

        public function f_get_stock_stockwise($branch,$toDt){

            $data = $this->db->query("select a.prod_id,a.stock_point,sum(a.qty) as qty,a.soc_name,b.COMP_NAME
                                       from(select a.prod_id as prod_id,a.comp_id as comp_id,a.stock_point as stock_point,ifnull(sum(a.qty),0) as qty, b.soc_name as soc_name 
                                           from td_purchase a,mm_ferti_soc b where a.stock_point = b.soc_id and a.trans_dt <='$toDt' and a.br = '$branch' 
                                           group by a.stock_point,b.soc_name,a.prod_id,a.comp_id 
                                           UNION 
                                           select a.prod_id as prod_id,a.comp_id as comp_id,a.stock_point as stock_point,ifnull(sum(a.qty),0)*-1 as qty , b.soc_name as soc_name 
                                           from td_sale a,mm_ferti_soc b 
                                           where a.stock_point = b.soc_id 
                                           and a.br_cd = '$branch' and a.do_dt<='$toDt' 
                                           group by a.stock_point,b.soc_name,a.prod_id,a.comp_id)a,mm_company_dtls b
                                           where a.comp_id = b.COMP_ID
                                           group by a.prod_id,a.stock_point,a.soc_name,b.COMP_NAME
                                           order by a.soc_name");

            if($data->num_rows() > 0 ){
                $row = $data->result();
            }else{
                $row = 0;
            }
            return $row;
        }

    }
?>