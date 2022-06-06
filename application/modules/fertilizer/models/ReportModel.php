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

            $query  = $this->db->query("select Distinct a.prod_id,b.PROD_DESC,a.comp_id,b.unit,
                                        c.COMP_NAME,c.short_name,b.qty_per_bag
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

            $query  = $this->db->query("select Distinct a.prod_id,b.PROD_DESC,a.comp_id,b.unit,
                                        c.COMP_NAME,c.short_name,b.qty_per_bag
                                from   td_purchase a,mm_product b,mm_company_dtls c
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                               
                              
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }

        public function f_get_product_list_rep($branch,$frmDt,$prod_id){
           

            $query  = $this->db->query("select Distinct a.prod_id,a.ro_no,b.PROD_DESC,a.comp_id,b.unit,b.prod_desc,d.unit_name,
                                        c.COMP_NAME,c.short_name,b.qty_per_bag
                                from   td_purchase a,mm_product b,mm_company_dtls c,mm_unit d
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                                and    b.unit=d.id
                                and    a.prod_id = '$prod_id'
                                and     a.br       = $branch
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }
        public function f_get_product_list_companywise($branch,$frmDt,$comp_id){
           

            // $query  = $this->db->query("select Distinct a.prod_id,a.ro_no,b.PROD_DESC,a.comp_id,b.unit,b.qty_per_bag,
            //                             c.COMP_NAME,c.short_name
            //                     from   td_purchase a,mm_product b,mm_company_dtls c
            //                     where  a.prod_id = b.PROD_ID
            //                     and    a.comp_id = c.COMP_ID
            //                     and    a.comp_id = '$comp_id'
            //                     and    a.trans_dt >= '$frmDt'
            //                     and     a.br       = $branch
            //                     order by a.comp_id,a.prod_id");
            
            $query  = $this->db->query("select Distinct a.prod_id,b.PROD_DESC,a.comp_id,b.unit,
                                        c.COMP_NAME,c.short_name,b.qty_per_bag
                                    from   td_purchase a,mm_product b,mm_company_dtls c
                                    where  a.prod_id = b.PROD_ID
                                    and    a.comp_id = c.COMP_ID
                                 
                                    and     a.br       = $branch
                                    and a.comp_id=$comp_id
                                    order by a.comp_id,a.prod_id");

            return $query->result();
        }


        public function f_get_allproduct_companywise($branch,$frmDt,$comp_id){
           

            $query  = $this->db->query("select Distinct b.prod_id,b.PROD_DESC,c.comp_id,b.unit,b.qty_per_bag,
                                        c.COMP_NAME,c.short_name
                                from   mm_product b,mm_company_dtls c
                                where  b.company=c.comp_id
                                and    c.comp_id = '$comp_id'
                             
                                order by c.comp_id,b.prod_id");

            return $query->result();
        }


        public function f_get_district_asc(){

            $query  = $this->db->query("SELECT * FROM `md_branch` order by branch_name asc");
            
            return $query->result();

        }

        public function f_get_salerateho($comp_id,$district,$frm_date,$to_date,$fin_id){

            $sql ="SELECT `a`.`frm_dt`, `a`.`to_dt`, `a`.`catg_id`, `a`.`sp_mt`, `a`.`sp_bag`, `a`.`sp_govt`, `b`.`cate_desc`, `c`.`PROD_DESC` 
            FROM `mm_sale_rate` `a`, `mm_category` `b`, `mm_product` `c` 
            WHERE `a`.`catg_id` = `b`.`sl_no` 
            AND `a`.`prod_id` = `c`.`PROD_ID` 
            AND `a`.`comp_id` = '$comp_id' 
            AND `a`.`district` = '$district' 
            AND `a`.`frm_dt` >= '$frm_date' 
            AND `a`.`frm_dt` <= '$to_date' 
            AND `a`.`fin_id` = '$fin_id' 
            order by c.PROD_DESC,b.cate_desc,a.frm_dt" ;
            
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


        public function f_get_product_dtls_stkp_wse($branch,$frmDt,$to_dt,$comp_id,$prod_id,$soc_id ){

            $query =$this->db->query("select b.PROD_DESC,c.COMP_NAME,d.soc_name,b.unit,b.qty_per_bag
            from td_sale a ,mm_product b ,mm_company_dtls c,mm_ferti_soc d
            where a.prod_id=b.prod_id
            and a.comp_id=c.comp_id
            and a.soc_id=d.soc_id
            and a.prod_id=$prod_id
            and a.br_cd=$branch
            and d.soc_id=$soc_id 
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
                                        a.comp_id,a.unit,b.COMP_NAME,c.PROD_DESC,b.short_name,c.qty_per_bag
                                                                        from td_purchase a,mm_company_dtls b,mm_product c
                                                                        where a.comp_id =b.comp_id
                                                                        and   a.prod_id = c.prod_id
                                                                        and a.br  = $branch
                                                                        and   a.trans_dt between '$frmDt' and '$to_dt'
                                                                        and   a.trans_flag = 1
                                                                        and   a.ro_no      = '$ro'
                                            UNION
                                            select a.prod_id,a.sale_ro,GROUP_CONCAT(trans_do) sale_trans_ro,a.comp_id,a.unit,b.COMP_NAME,c.PROD_DESC,b.short_name,c.qty_per_bag
                                            from td_sale a,mm_company_dtls b,mm_product c
                                            where a.comp_id =b.comp_id
                                            and   a.prod_id = c.prod_id
                                            and a.br_cd     = $branch
                                            and   a.do_dt between '$frmDt' and '$to_dt'
                                            and   a.sale_ro    ='$ro'");

             return $query->result();      

           
        }

        /******************************************************************* */

        public function f_get_balance_all($frmDt,$toDt){
            if ($frmDt>='2021-04-01') {

                $data = $this->db->query("Select district_name,tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as opn_qty, 
                ifnull(Sum(lqd_qty ),0) + ifnull(sum(lqd_tot_pur),0)  - ifnull(sum(lqd_tot_sale),0) as lqd_opn_qty,tot_pur, lqd_tot_pur,tot_sale,sum(tot_sale)tot_sale,lqd_tot_sale,0 cls_qty
            from (
                select  district_name,sum(qty)+sum(tot_pur)-sum(tot_sale)qty,sum(lqd_qty)+sum(lqd_tot_pur)-sum(lqd_tot_sale)lqd_qty ,0 tot_pur,0 lqd_tot_pur,0 tot_sale,0 lqd_tot_sale
                from(
                select b.district_name as district_name,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
                if(c.unit=6,a.qty/10000, 0))))),3)qty,round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_qty,0 tot_pur,0 lqd_tot_pur,0 tot_sale, 0 lqd_tot_sale
                                from tdf_opening_stock a,md_district b,mm_product c
                                where    balance_dt ='2020-04-01'
                                and a.branch_id=b.district_code 
                                and  a.prod_id=c.prod_id
                                group by b.district_name
                                union
                select b.district_name ,0 qty,0 ldq_qty,0 tot_pur,0 lqd_tot_pur,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
                if(c.unit=6,a.qty/10000, 0))))),3) tot_sale,round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_tot_sale
                                  from td_sale a,md_district b,mm_product c
                                  where   do_dt <'$frmDt'
                                  and a.br_cd=b.district_code 
                                  and a.prod_id=c.prod_id
                                  group by   b.district_name
                UNION
                select b.district_name ,0 qty,0 lqd_qty,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
                if(c.unit=6,a.qty/10000, 0))))),3) tot_pur, round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_tot_pur,
                0 tot_sale,0 lqd_tot_sale
                                  from td_purchase a ,md_district b,mm_product c
                                  where  trans_dt <'$frmDt'
                                  and   trans_flag = 1
                                  and a.prod_id=c.prod_id
                                  and a.br=b.district_code 
                                  group by b.district_name)a
                                  group by district_name
                  UNION
                  select b.district_name as district_name, 0 qty,0 lqd_qty,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
                  if(c.unit=6,a.qty/10000, 0))))),3), round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_tot_pur,0 tot_sale, 0 lqd_tot_sale
                  from td_purchase a,md_district b,mm_product c
                  where   trans_dt between '$frmDt' and  '$toDt'
                  and a.br=b.district_code 
                  and   trans_flag = 1
                  and a.prod_id=c.prod_id
                  group by b.district_name
                  UNION
                  select  b.district_name ,0 qty,0 lqd_qty,0 tot_pur,0 lqd_tot_pur,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
                  if(c.unit=6,a.qty/10000, 0))))),3) tot_sale,round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_tot_sale
                  from td_sale a,md_district b,mm_product c
                  where    do_dt between '$frmDt' and '$toDt'
                  and a.br_cd=b.district_code 
                  and a.prod_id=c.prod_id
                  group by  b.district_name)a
              group by district_name
              order by district_name");
            //   echo $this->db->last_query();
            //   exit;
			}else{
				 
				 $data = $this->db->query("Select prod_id,tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as opn_qty, tot_pur, tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as cls_qty
            from (
                select prod_id,sum(qty)+sum(tot_pur)-sum(tot_sale)qty,0 tot_pur,0 tot_sale
                from(
                select prod_id,sum(ifnull(qty,0))qty,0 tot_pur,0 tot_sale
                                from tdf_opening_stock
                                where    balance_dt ='2020-04-01'
                                group by prod_id
                                union
                select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                                  from td_sale
                                  where  do_dt <'$frmDt'
                                  group by prod_id
                UNION
                select prod_id,ifnull(sum(qty),0) tot_pur,0 qty,0 tot_sale
                                  from td_purchase
                                  where trans_dt <'$frmDt'
                                  and   trans_flag = 1
                                  group by prod_id)a
                                  group by prod_id
                  UNION
                  select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale
                  from td_purchase
                  where trans_dt between '$frmDt' and  '$toDt'
                  and   trans_flag = 1
                  group by prod_id
                  UNION
                  select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
                  from td_sale
                  where  do_dt between '$frmDt' and '$toDt'
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

        /******************************************************************** */

        public function f_get_balance($branch,$frmDt,$toDt){
            if ($frmDt>='2021-04-01') {

                $data = $this->db->query("Select prod_id,tot_sale,ifnull(sum(tot_sale),0)tot_sale,ifnull(Sum(qty ),0) + ifnull(sum(tot_pur),0) - ifnull(sum(tot_sale),0) as opn_qty, tot_pur, tot_sale,sum(tot_sale)tot_sale,0 cls_qty
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
								and a.soc_id=b.soc_id
                                and   a.paid_dt between '$frmDt' and '$toDt'
                        group by a.soc_id ,b.soc_name
                        
                        union
                        
                        select  ifnull(sum(a.tot_amt),0),0,a.soc_id,b.soc_name  from  tdf_dr_cr_note a,mm_ferti_soc b
                        where a.trans_flag='R'
                        and a.note_type='D'
                        and a.branch_id='$branch'
                        and a.branch_id=b.district
						and a.soc_id=b.soc_id
                        group by a.soc_id,b.soc_name )a
                        group by  soc_name");

    if($data->num_rows() > 0 ){
        $row = $data->result();
    }else{
        $row = 0;
    }
    return $row;
}
/********************************************************* */
public function f_get_balance_rowiseall($branch,$from_dt,$to_dt,$opndt){

    $data = $this->db->query("Select prod_id,tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as opn_qty, 
    ifnull(Sum(lqd_qty ),0) + ifnull(sum(lqd_tot_pur),0)  - ifnull(sum(lqd_tot_sale),0) as lqd_opn_qty,tot_pur, lqd_tot_pur,tot_sale,sum(tot_sale)tot_sale,lqd_tot_sale,0 cls_qty
from (
    select  a.prod_id,sum(qty)+sum(tot_pur)-sum(tot_sale)qty,sum(lqd_qty)+sum(lqd_tot_pur)-sum(lqd_tot_sale)lqd_qty ,0 tot_pur,0 lqd_tot_pur,0 tot_sale,0 lqd_tot_sale
    from(
    select a.prod_id,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
    if(c.unit=6,a.qty/10000, 0))))),3)qty,round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_qty,0 tot_pur,0 lqd_tot_pur,0 tot_sale, 0 lqd_tot_sale
                    from tdf_opening_stock a,md_district b,mm_product c
                    where a.balance_dt ='2020-04-01'
                    and   a.branch_id	  = $branch
                    and a.prod_id=c.prod_id
                    and   a.branch_id=b.district_code 
                    group by a.prod_id
                    union
    select a.prod_id ,0 qty,0 lqd_qty,0 tot_pur,0 lqd_tot_pur,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
    if(c.unit=6,a.qty/10000, 0))))),3) tot_sale,round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_tot_sale
                      from td_sale a,md_district b,mm_product c
                      where  a.do_dt <'$from_dt'
                      and  a.br_cd	= $branch
                      and a.prod_id=c.prod_id
                      and a.br_cd=b.district_code 
                      group by   a.prod_id
    UNION
    select a.prod_id ,0 qty,0 lqd_qty,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
    if(c.unit=6,a.qty/10000, 0))))),3) tot_pur, round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_tot_pur,
    0 tot_sale,0 lqd_tot_sale
                      from td_purchase a ,md_district b,mm_product c
                      where  trans_dt <'$from_dt'
                      and  a.br	    = $branch
                      and   trans_flag = 1
                      and a.prod_id=c.prod_id
                      and a.br=b.district_code 
                      group by a.prod_id)a
                      group by prod_id
      UNION
      select a.prod_id, 0 qty,0 lqd_qty,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
      if(c.unit=6,a.qty/10000, 0))))),3), round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_tot_pur,0 tot_sale, 0 lqd_tot_sale
      from td_purchase a,md_district b,mm_product c
      where   trans_dt between '$from_dt' and  '$to_dt'
      and  a.br	    = $branch
      and a.br=b.district_code 
      and a.prod_id=c.prod_id
      and   trans_flag = 1
      group by a.prod_id
      UNION
      select  a.prod_id ,0 qty,0 lqd_qty,0 tot_pur,0 lqd_tot_pur,round(sum(if(c.unit=2,a.qty/1000,if(c.unit=1,a.qty,if(c.unit=4,a.qty/10,
      if(c.unit=6,a.qty/10000, 0))))),3) tot_sale,round(sum(if(c.unit=5,a.qty/1000,if(c.unit=3,a.qty,0))),3)lqd_tot_sale
      from td_sale a,md_district b,mm_product c
      where    do_dt between '$from_dt' and '$to_dt'
      and br_cd	    = $branch
      and a.prod_id=c.prod_id
      and a.br_cd=b.district_code 
      group by  a.prod_id)a
  group by prod_id
  order by prod_id");    

//     $data = $this->db->query("Select prod_id,ifnull(Sum(qty ),0)  as opn_qty, tot_pur, tot_sale,sum(tot_sale)tot_sale,ifnull(Sum(qty ),0) + sum(tot_pur)  - sum(tot_sale) as cls_qty,ro_no
//     from (
//     select prod_id,sum(qty)+sum(tot_pur)-sum(tot_sale)qty,0 tot_pur,0 tot_sale,ro_no
//     from(
//     select prod_id,sum(ifnull(qty,0))qty,0 tot_pur,0 tot_sale,ro_no
//                     from tdf_opening_stock
//                     where branch_id	    = $branch
//                     and   balance_dt ='2020-04-01'
//                     group by prod_id,ro_no
//                     union
//     select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale,sale_ro
//                       from td_sale
//                       where br_cd	    = $branch
//                       and   do_dt <'$from_dt'
//                       group by prod_id,sale_ro
//     UNION
//     select prod_id,ifnull(sum(qty),0) qty,0 tot_pur,0 tot_sale,ro_no
//                       from td_purchase
//                       where br	    =$branch
//                       and   trans_dt < '$from_dt' 
//                       and   trans_flag = 1
//                       group by prod_id,ro_no)a
//                       group by prod_id,ro_no
//       UNION
//       select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale,ro_no
//       from td_purchase
//       where br	    = $branch
//       and   trans_dt between '$from_dt' and  '$to_dt'
//       and   trans_flag = 1
//       group by prod_id,ro_no
//       UNION
//       select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale,sale_ro
//       from td_sale
//       where br_cd	    = $branch
//       and   do_dt between '$from_dt' and '$to_dt'
//       group by prod_id,sale_ro)a
//   group by prod_id,ro_no
//   order by prod_id");
  

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
            $query  = $this->db->query("select b.prod_id, ifnull(sum(a.qty),0)tot_pur
                                        from td_purchase a,mm_product b
                                        where a.br	    = $branch
                                        and a.prod_id=b.prod_id
                                        and   a.trans_dt between '$frmDt' and '$toDt'
                                        and   a.trans_flag = 1
                                        group by b.prod_id");

            return $query->result();
        }


        

        public function f_get_purchase_all($frmDt,$toDt){
            // $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_pur
            //                             from td_purchase
            //                             where br	    = $branch
            //                             and   trans_dt between '$frmDt' and '$toDt'
            //                             and   trans_flag = 1
            //                             group by prod_id");
            $query  = $this->db->query(" select c.district_name, sum(qty)purqty,round(sum(if(b.unit=2,a.qty/1000,if(b.unit=1,a.qty,if(b.unit=4,a.qty/10,
                                        if(b.unit=6,a.qty/10000, 0))))),3)sld_tot_pur,
                                        round(sum(if(b.unit=5,a.qty/1000,if(b.unit=3,a.qty,0))),3)lqd_tot_pur
                                        from td_purchase a,mm_product b,md_district c
                                        where a.prod_id=b.prod_id
                                        and  a.trans_dt between '$frmDt' and '$toDt'
                                        and a.br=c.district_code
                                        and a.unit=b.unit
                                        group by c.district_name");


            return $query->result();
        }

        public function f_get_purchase_rowise($branch,$frmDt,$toDt){
            $query  = $this->db->query("select b.prod_id, ifnull(sum(a.qty),0)tot_pur,a.ro_no,b.unit
                                        from td_purchase a,mm_product b
                                        where a.br        = $branch
                                        and a.prod_id=b.prod_id
                                        
                                        and   a.trans_dt between '$frmDt' and '$toDt'
                                        and   a.trans_flag = 1
                                        group by b.prod_id,a.ro_no,b.unit");

            return $query->result();
        }
/**************************************************** */
public function f_get_purchase_rowiseall($branch,$frmDt,$toDt){
    $query  = $this->db->query("select a.prod_id,sum(a.qty)qty,b.unit,b.qty_per_bag,
    round(sum(if(b.unit=2,a.qty/1000,if(b.unit=1,a.qty,if(b.unit=4,a.qty/10,
                if(b.unit=6,a.qty/10000, 0))))),3) tot_pur, round(sum(if(b.unit=5,a.qty/1000,if(b.unit=3,a.qty,0))),3)lqd_tot_pur
                                from td_purchase a ,mm_product b
                                where br        = $branch
                                and a.prod_id=b.prod_id
                                and   a.trans_dt between '$frmDt' and '$toDt'
                                and   a.trans_flag = 1
                                group by a.prod_id,b.unit");

    return $query->result();
}
/******************************************* */

public function f_get_yrwisecompwisesale($frmyr,$to_yr){
      $query  = $this->db->query("select  fin_yr,
        sum(IFFCO_QTY)IFFCO_QTY,sum(IFFCO_LQQTY)IFFCO_LQQTY,sum(IFFCO_VALUE)IFFCO_VALUE,
        sum(KRIBCO_QTY)KRIBCO_QTY,sum(KRIBCO_LQQTY)KRIBCO_LQQTY,sum(KRIBCO_VALUE)KRIBCO_VALUE,
        sum(IPL_QTY)IPL_QTY, sum(IPL_LQQTY)IPL_LQQTY,sum(IPL_VALUE)IPL_VALUE,
        sum(CIL_QTY)CIL_QTY,sum(CIL_LQQTY)CIL_LQQTY,sum(CIL_VALUE)CIL_VALUE,
        sum(KCFL_QTY)KCFL_QTY, sum(KCFL_LQQTY)KCFL_LQQTY,sum(KCFL_VALUE)KCFL_VALUE,
        sum(JCF_QTY)JCF_QTY,sum(JCF_LQQTY)JCF_LQQTY,sum(JCF_VALUE)JCF_VALUE,
        sum(MIPL_QTY)MIPL_QTY,sum(MIPL_LQQTY)MIPL_LQQTY,sum(MIPL_VALUE)MIPL_VALUE
                                    from(
                                    SELECT b.fin_yr, if(c.comp_id=1,round(sum(CASE
                                    WHEN a.unit = 1 THEN a.qty
                                    WHEN a.unit = 2 THEN a.qty/1000
                                    WHEN a.unit = 4 THEN a.qty/10
                                    WHEN a.unit = 6 THEN a.qty/10000
                                    ELSE 0
                                    END ),3),0)IFFCO_QTY,
                                    if(c.comp_id=1,round(sum(CASE
                                    WHEN a.unit = 3 THEN a.qty
                                    WHEN a.unit = 5 THEN a.qty/1000
                                    ELSE 0
                                    END ),3),0)IFFCO_LQQTY,
                                if(c.comp_id=1,sum(a.tot_amt) ,0)IFFCO_VALUE,
                                    if(c.comp_id=2,round(sum(CASE
                                    WHEN a.unit = 1 THEN a.qty
                                    WHEN a.unit = 2 THEN a.qty/1000
                                    WHEN a.unit = 4 THEN a.qty/10
                                    WHEN a.unit = 6 THEN a.qty/10000
                                    ELSE 0
                                END ),3),0)KRIBCO_QTY,
                                
                                    if(c.comp_id=2,round(sum(CASE
                                    WHEN a.unit = 3 THEN a.qty
                                    WHEN a.unit = 5 THEN a.qty/1000
                                    ELSE 0
                                    END ),3),0)KRIBCO_LQQTY,if(c.comp_id=2,sum(a.tot_amt) ,0)KRIBCO_VALUE,
                                    if(c.comp_id=3,round(sum(CASE
                                    WHEN a.unit = 1 THEN a.qty
                                    WHEN a.unit = 2 THEN a.qty/1000
                                    WHEN a.unit = 4 THEN a.qty/10
                                    WHEN a.unit = 6 THEN a.qty/10000
                                    ELSE 0
                                END ),3),0)IPL_QTY, 
                                    if(c.comp_id=3,round(sum(CASE
                                    WHEN a.unit = 3 THEN a.qty
                                    WHEN a.unit = 5 THEN a.qty/1000
                                    ELSE 0
                                    END ),3),0)IPL_LQQTY,if(c.comp_id=3,sum(a.tot_amt) ,0)IPL_VALUE,
                                    if(c.comp_id=6,round(sum(CASE
                                    WHEN a.unit = 1 THEN a.qty
                                    WHEN a.unit = 2 THEN a.qty/1000
                                    WHEN a.unit = 4 THEN a.qty/10
                                    WHEN a.unit = 6 THEN a.qty/10000
                                    ELSE 0
                                END ),3),0)JCF_QTY,
                                    if(c.comp_id=6,round(sum(CASE
                                    WHEN a.unit = 3 THEN a.qty
                                    WHEN a.unit = 5 THEN a.qty/1000
                                    ELSE 0
                                    END ),3),0)JCF_LQQTY, if(c.comp_id=6,sum(a.tot_amt) ,0)JCF_VALUE,
                                    if(c.comp_id=7,round(sum(CASE
                                    WHEN a.unit = 1 THEN a.qty
                                    WHEN a.unit = 2 THEN a.qty/1000
                                    WHEN a.unit = 4 THEN a.qty/10
                                    WHEN a.unit = 6 THEN a.qty/10000
                                    ELSE 0
                                END ),3),0)MIPL_QTY,
                                if(c.comp_id=7,round(sum(CASE
                                WHEN a.unit = 3 THEN a.qty
                                WHEN a.unit = 5 THEN a.qty/1000
                                ELSE 0
                                END ),3),0)MIPL_LQQTY,if(c.comp_id=7,sum(a.tot_amt) ,0)MIPL_VALUE,
                                    if(c.comp_id=5,round(sum(CASE
                                    WHEN a.unit = 1 THEN a.qty
                                    WHEN a.unit = 2 THEN a.qty/1000
                                    WHEN a.unit = 4 THEN a.qty/10
                                    WHEN a.unit = 6 THEN a.qty/10000
                                    ELSE 0
                                END ),3),0)KCFL_QTY,
                                if(c.comp_id=5,round(sum(CASE
                                WHEN a.unit = 3 THEN a.qty
                                WHEN a.unit = 5 THEN a.qty/1000
                                ELSE 0
                                END ),3),0)KCFL_LQQTY,if(c.comp_id=5,sum(a.tot_amt) ,0)KCFL_VALUE,
                                    if(c.comp_id=4,round(sum(CASE
                                    WHEN a.unit = 1 THEN a.qty
                                    WHEN a.unit = 2 THEN a.qty/1000
                                    WHEN a.unit = 4 THEN a.qty/10
                                    WHEN a.unit = 6 THEN a.qty/10000
                                    ELSE 0
                                END ),3),0)CIL_QTY,
                                if(c.comp_id=4,round(sum(CASE
                                WHEN a.unit = 3 THEN a.qty
                                WHEN a.unit = 5 THEN a.qty/1000
                                ELSE 0
                                END ),3),0)CIL_LQQTY,if(c.comp_id=4,sum(a.tot_amt) ,0)CIL_VALUE
                                    FROM td_sale  a ,md_fin_year b ,mm_company_dtls c
                                    WHERE a.fin_yr=b.sl_no

                        
                                    and b.sl_no between $frmyr and $to_yr
                                    AND c.comp_id=a.comp_id
                                    GROUP by a.fin_yr,c.comp_id)a
                                    group by fin_yr");


    return $query->result();

}

public function f_get_yrwisesale($frmyr,$to_yr){

    $query  = $this->db->query("SELECT b.fin_yr,c.district_name, 
    round(sum(CASE
            WHEN a.unit = 1 THEN a.qty
            WHEN a.unit = 2 THEN a.qty/1000
            WHEN a.unit = 4 THEN a.qty/10
            WHEN a.unit = 6 THEN a.qty/10000
            ELSE 0
        END ),3)sldqty,
round(sum(CASE
    WHEN a.unit = 3 THEN a.qty
    WHEN a.unit = 5 THEN a.qty/1000
    ELSE 0
END ),3)lqdqty,
    sum(a.tot_amt) tot_amt
    FROM td_sale  a ,md_fin_year b ,md_district c
    where a.fin_yr=b.sl_no
    and c.district_code=a.br_cd
    and b.sl_no between $frmyr and $to_yr
    group by a.fin_yr,c.district_name
    order by c.district_name, b.fin_yr");


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
            $query  = $this->db->query("select b.prod_id, ifnull(sum(a.qty),0)qty,b.unit
                                        from td_sale a,mm_product b
                                        where a.br_cd	    = $branch
                                        and a.prod_id=b.prod_id
                                        and   a.do_dt between '$frmDt' and '$toDt'
                                        group by b.prod_id,b.unit");

            return $query->result();
        }

        public function f_get_sale_all($frmDt,$toDt){
            // $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_sale
            //                             from td_sale
            //                             where br_cd	    = $branch
            //                             and   do_dt between '$frmDt' and '$toDt'
            //                             group by prod_id");


            
            $query  = $this->db->query("select c.district_name, sum(a.qty)qty,round(sum(if(b.unit=2,a.qty/1000,if(b.unit=1,a.qty,if(b.unit=4,a.qty/10,
                                        if(b.unit=6,a.qty/10000, 0))))),3)sld_tot_sale,
                                        round(sum(if(b.unit=5,a.qty/1000,if(b.unit=3,a.qty,0))),3)lqd_tot_sale
                                        from td_sale a,mm_product b,md_district c
                                        where a.prod_id=b.prod_id
                                        and a.unit=b.unit
                                        and  a.do_dt between '$frmDt' and '$toDt'
                                        and a.br_cd=c.district_code
                                        group by c.district_name
                                        ");

            return $query->result();
        }

        
        public function f_get_sale_rowise($branch,$frmDt,$toDt){
            $query  = $this->db->query("select b.prod_id, ifnull(sum(a.qty),0)tot_sale,a.sale_ro,b.unit
                                        from td_sale a,mm_product b
                                        where a.br_cd     = $branch
                                        and a.prod_id=b.prod_id
                                        and   a.do_dt between '$frmDt' and '$toDt'
                                        group by b.prod_id,a.sale_ro,b.unit");

            return $query->result();
        }
        public function f_get_sale_rowiseall($branch,$frmDt,$toDt){
            $query  = $this->db->query("select a.prod_id,ifnull(sum(a.qty),0)qty,b.unit,b.qty_per_bag,
            round(sum(if(b.unit=2,a.qty/1000,if(b.unit=1,a.qty,if(b.unit=4,a.qty/10,
                if(b.unit=6,a.qty/10000, 0))))),3) tot_sale,round(sum(if(b.unit=5,a.qty/1000,if(b.unit=3,a.qty,0))),3)lqd_tot_sale
                                        from td_sale a,mm_product b
                                        where a.br_cd     = $branch
                                        and a.prod_id=b.prod_id
                                        and   a.do_dt between '$frmDt' and '$toDt'
                                        group by a.prod_id,b.unit");

            return $query->result();
        }

        

        public function pc($all_data)
        {
            
            try {
                $this->db->reconnect();
                
                $sql = "CALL `p_purchase_all`(?,?,?,?)";
             
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
public function pcn($all_data)
        {
            
            try {
                $this->db->reconnect();
                
                $sql = "CALL `p_purchase_all_n`(?,?,?)";
             
                $data_w = $this->db->query($sql,$all_data); 

               
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
            $query  = $this->db->query("select  c.soc_name,a.trans_do,a.gst_type_flag,a.ack_dt as do_dt,a.round_tot_amt sale_tot_amt,c.gstin,
                                       a.cgst sale_cgst,a.sgst sale_sgst,b.cgst pur_cgst,b.sgst pur_sgst,a.taxable_amt   taxable_amt,
                                        a.cgst -b.cgst diff_cgst,a.sgst-b.sgst diff_sgst,
                                        (select  gst_rt from mm_product where prod_id=b.prod_id) as gst_rt
                                        from td_sale a,td_purchase b,mm_ferti_soc c
                                        where  a.sale_ro=b.ro_no
                                        and  a.soc_id=c.soc_id
                                        and  CAST(a.ack_dt AS DATE) between '$frmDt' and '$toDt'
                                       order by a.ack_dt ");

            return $query->result();
        }
		
  public function f_get_gst_b_to_c($frmDt,$toDt){
            $query  = $this->db->query("select  c.soc_name,a.trans_do,a.gst_type_flag,a.do_dt,a.round_tot_amt sale_tot_amt,c.gstin,
                                       a.cgst sale_cgst,a.sgst sale_sgst,b.cgst pur_cgst,b.sgst pur_sgst,a.taxable_amt   taxable_amt,
                                        a.cgst -b.cgst diff_cgst,a.sgst-b.sgst diff_sgst,
                                        (select  gst_rt from mm_product where prod_id=b.prod_id) as gst_rt
                                        from td_sale a,td_purchase b,mm_ferti_soc c
                                        where  a.sale_ro=b.ro_no
                                        and  a.soc_id=c.soc_id
                                        and a.gst_type_flag='N'
                                        and  a.do_dt between '$frmDt' and '$toDt'
                                       order by a.do_dt ");

            return $query->result();
        }
        public function f_get_purchaserep($branch,$frmDt,$toDt){
            $query  = $this->db->query("select a.ro_no,a.ro_dt,a.invoice_no,a.invoice_dt,a.qty,a.retlr_margin,
                                        a.spl_rebt,a.rbt_add,a.rbt_less,a.rnd_of_add,a.rnd_of_less,b.qty_per_bag,
                                        b.unit,a.stock_qty,a.rate,a.base_price,a.no_of_bags,a.cgst,a.sgst,a.tot_amt,
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
            $query  = $this->db->query("select a.trans_do,a.do_dt,a.trans_type,a.sale_ro,a.qty,a.soc_id,b.unit,b.qty_per_bag,
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

    $query  = $this->db->query("SELECT a.do_dt,a.trans_do,a.prod_id,b.prod_desc,a.sale_ro,a.qty,a.soc_id,c.soc_name,b.unit,b.qty_per_bag,
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
		/*********************************** */

public function f_br_crnote($frm_dt,$to_dt,$br_cd,$comp_id,$catg){


    $query  = $this->db->query(" Select a.trans_dt,e.ro_dt,a.ro,a.tot_amt,f.comp_name,g.cat_desc,h.district_name,b.soc_name,a.comp_adjflag
FROM tdf_dr_cr_note a ,td_purchase e,mm_company_dtls f,mm_cr_note_category g,md_district h,mm_ferti_soc b
 WHERE  a.ro=e.ro_no
 and a.soc_id=b.soc_id
and a.catg=$catg
and a.branch_id=$br_cd
and a.branch_id=h.district_code
and a.comp_id=f.comp_id
and a.catg=g.sl_no
and a.note_type='D'
 and a.fwd_flag='Y' 
and a.trans_flag='R'
and a.comp_adjflag='N'
and a.comp_id=$comp_id
and e.ro_dt between '$frm_dt' and '$to_dt'");
   
return $query->result();


}



/*********************************** */
		/*************************************************************************** */
public function f_adj_crnote_rep($frm_dt,$to_dt,$br_cd,$comp_id,$catg){


    $query  = $this->db->query(" Select a.trans_dt,e.ro_dt,a.ro,a.tot_amt,f.comp_name,g.cat_desc,h.district_name,b.soc_name,a.comp_adjflag
FROM tdf_dr_cr_note a ,td_purchase e,mm_company_dtls f,mm_cr_note_category g,md_district h,mm_ferti_soc b
 WHERE  a.ro=e.ro_no
 and a.soc_id=b.soc_id
and a.catg=$catg
and a.branch_id=$br_cd
and a.branch_id=h.district_code
and a.comp_id=f.comp_id
and a.catg=g.sl_no
and a.note_type='D'
 and a.fwd_flag='Y' 
and a.trans_flag='R'
and a.comp_adjflag='Y'
and a.comp_id=$comp_id
and e.ro_dt between '$frm_dt' and '$to_dt'");
   
return $query->result();


}
/****************************/
public function f_cr_rep_ho($comp_id,$frm_dt,$to_dt){


$query  = $this->db->query(" Select a.trans_dt,a.ro,a.tot_amt,f.comp_name,g.cat_desc,h.district_name,a.comp_adjflag,a.catg
FROM tdf_dr_cr_note a ,mm_company_dtls f,mm_cr_note_category g,md_district h
 WHERE   a.branch_id=h.district_code
and a.comp_id=f.comp_id
and a.catg=g.sl_no
and a.note_type='C'
 and a.fwd_flag='N' 
and a.trans_flag='R'
and a.comp_adjflag='N'
and a.comp_id=$comp_id
and a.trans_dt between '$frm_dt' and '$to_dt'");
   
return $query->result();


}


/*********************************** */
public function f_crsumm_rep_ho($frm_dt,$to_dt){

$query  = $this->db->query(" Select sum(a.tot_amt)tot_amt,f.comp_name,h.district_name
FROM tdf_dr_cr_note a ,mm_company_dtls f,mm_cr_note_category g,md_district h
WHERE   a.branch_id=h.district_code
and a.comp_id=f.comp_id
and a.catg=g.sl_no
and a.note_type='D'
and a.fwd_flag='Y' 
and a.trans_flag='R'
and a.comp_adjflag='N'
and a.trans_dt between '$frm_dt' and '$to_dt'
group by f.comp_name,h.district_name
order by h.district_name,f.comp_name,a.trans_dt");
   
return $query->result();

}
		
/*************Delivery Register Comapny Wise*********************/
public function p_delivery_reg_compwse($frm_dt,$to_dt,$br_cd,$comp_id){

  /* $query  = $this->db->query("SELECT a.do_dt,a.trans_do,a.prod_id,b.prod_desc,a.sale_ro,a.qty,a.soc_id,c.soc_name,d.short_name,b.unit,b.qty_per_bag,
    (select distinct  paid_id from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and comp_id=$comp_id and soc_id=a.soc_id ) as paid_id,
    (select distinct  paid_dt from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and comp_id=$comp_id and soc_id=a.soc_id ) as paid_dt,
    (select distinct ro_dt from td_purchase where ro_no=a.sale_ro and br=$br_cd and comp_id=$comp_id) ro_dt,
    (select   sum(paid_amt) from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and comp_id=$comp_id and soc_id=a.soc_id) as paid_amt
    FROM  td_sale a,mm_product b ,mm_ferti_soc c,mm_company_dtls d
    WHERE a.prod_id=b.prod_id
    and a.soc_id=c.soc_id
    and a.comp_id=d.comp_id
    and a.br_cd=$br_cd and a.comp_id=$comp_id
    and a.do_dt between '$frm_dt' and '$to_dt'");*/
 $query  = $this->db->query("SELECT a.do_dt,a.trans_do,a.prod_id,b.prod_desc,a.sale_ro,a.qty,a.soc_id,c.soc_name,d.short_name,b.unit,b.qty_per_bag,
   (select distinct  paid_dt from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and comp_id=$comp_id and soc_id=a.soc_id) as paid_dt,
   (select distinct ro_dt from td_purchase where ro_no=a.sale_ro and br=$br_cd and comp_id=$comp_id) ro_dt,
    (select   sum(paid_amt) from tdf_payment_recv where sale_invoice_no=a.trans_do and branch_id=$br_cd and comp_id=$comp_id and soc_id=a.soc_id) as paid_amt
    FROM  td_sale a,mm_product b ,mm_ferti_soc c,mm_company_dtls d
    WHERE a.prod_id=b.prod_id
    and a.soc_id=c.soc_id
    and a.comp_id=d.comp_id
    and a.br_cd=$br_cd and a.comp_id=$comp_id
    and a.do_dt between '$frm_dt' and '$to_dt'");
return $query->result();


}

/*********************************** */

public function p_ro_wise_soc_stk($all_data)
{
    
    try {
        $this->db->reconnect();
        
        $sql = "CALL `p_ro_wise_soc_stk`(?,?,?)";
     
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

/********************************** */


public function p_ro_wise_prof_calc($fdate,$tdate,$comp,$branchId)
{
    
//     try {
//         $this->db->reconnect();
        
//         $sql = "CALL `p_ro_wise_prof_calc`(?,?,?)";
     
//         $data_w = $this->db->query($sql,$all_data); 
// // echo $this->db->last_query();
// // die();
// //              
//         $this->db->close();


//     } catch (Exception $e) {
//         echo $e->getMessage();
//     }

$q= $this->db->query('SELECT c.short_name comp_name,
d.prod_desc,
a.ro_no,
a.ro_dt,
round(a.tot_amt /a.qty,3) as rate,
a.tot_amt as pur_net_amt,
a.qty qty,
sum(b.qty)as sale_qty,
d.unit,
d.qty_per_bag qty_per_bag,
b.sale_rt,
sum(b.round_tot_amt)sale_amt,
sum(b.round_tot_amt) - a.tot_amt as profit,
round((round(sum(b.round_tot_amt)/sum(b.qty),2)- round(a.tot_amt /a.qty,3))*sum(b.qty),2) pro,
round(sum(b.round_tot_amt)/sum(b.qty),2)rt_gst,
(a.qty- sum(b.qty))*round(a.tot_amt /a.qty,3) as unsold
FROM td_purchase a ,td_sale b,mm_company_dtls c,mm_product d
WHERE a.ro_no=b.sale_ro
and a.comp_id=b.comp_id
and a.prod_id=b.prod_id
and a.comp_id=c.comp_id
and a.prod_id=d.prod_id
and a.ro_dt between "'.$fdate.'" and "'.$tdate.'"
and a.comp_id = '.$comp.'
and a.br='.$branchId.'
group by c.comp_name,d.prod_desc,a.ro_no,a.ro_dt,round(a.tot_amt /a.qty,3),a.tot_amt,a.qty,d.unit,d.qty_per_bag,b.sale_rt
UNION
SELECT c.short_name comp_name,
d.prod_desc,
a.ro_no,
a.ro_dt,
round(a.tot_amt /a.qty,3)  as rate,
a.tot_amt as pur_net_amt,
a.qty qty,
0 sale_qty,
d.unit,
d.qty_per_bag qty_per_bag,
0 sale_rt,
0 sale_amt,
0 as profit,
0 pro,
0 rt_gst,
a.tot_amt as unsold
FROM td_purchase a, mm_company_dtls c,mm_product d
WHERE a.comp_id=c.COMP_ID
and a.prod_id=d.PROD_ID
and a.ro_dt between "'.$fdate.'" and "'.$tdate.'"
and a.comp_id = '.$comp.'
and a.br='.$branchId.'
and a.ro_no not in (select sale_ro from td_sale 
             where do_dt between "'.$fdate.'" and "'.$tdate.'"
             and   comp_id = '.$comp.')');

return $q->result();

   
   //;
   

}
/************************************************ */
public function p_ro_wise_prof_calc_all($fdate,$tdate,$comp) {
    
//     try {
//         $this->db->reconnect();
        
//         $sql = "CALL `p_ro_wise_prof_calc_all`(?,?)";
     
//         $data_w = $this->db->query($sql,$all_data); 
// // echo $this->db->last_query();
// // die();
// //              
//         $this->db->close();


//     } catch (Exception $e) {
//         echo $e->getMessage();
//     }


   $q= $this->db->query('SELECT c.short_name comp_name,
    d.prod_desc,
    a.ro_no,
    a.ro_dt,
    round(a.tot_amt /a.qty,3) as rate,
    a.tot_amt as pur_net_amt,
    a.qty qty,
    sum(b.qty)as sale_qty,
    d.unit,
    d.qty_per_bag qty_per_bag,
    b.sale_rt,
    sum(b.round_tot_amt)sale_amt,
    sum(b.round_tot_amt) - a.tot_amt as profit,
    round((round(sum(b.round_tot_amt)/sum(b.qty),2)- round(a.tot_amt /a.qty,3))*sum(b.qty),2) pro,
    round(sum(b.round_tot_amt)/sum(b.qty),2)rt_gst,
    (a.qty- sum(b.qty))*round(a.tot_amt /a.qty,3) as unsold
FROM td_purchase a ,td_sale b,mm_company_dtls c,mm_product d
WHERE a.ro_no=b.sale_ro
and a.comp_id=b.comp_id
and a.prod_id=b.prod_id
and a.comp_id=c.comp_id
and a.prod_id=d.prod_id
and a.ro_dt between "'.$fdate.'" and "'.$tdate.'"
and a.comp_id = '.$comp.'
group by c.comp_name,d.prod_desc,a.ro_no,a.ro_dt,round(a.tot_amt /a.qty,3),a.tot_amt,a.qty,d.unit,d.qty_per_bag,b.sale_rt
UNION
SELECT c.short_name comp_name,
    d.prod_desc,
    a.ro_no,
    a.ro_dt,
    round(a.tot_amt /a.qty,3)  as rate,
    a.tot_amt as pur_net_amt,
    a.qty qty,
    0 sale_qty,
    d.unit,
    d.qty_per_bag qty_per_bag,
    0 sale_rt,
    0 sale_amt,
    0 as profit,
    0 pro,
    0 rt_gst,
    a.tot_amt as unsold
FROM td_purchase a, mm_company_dtls c,mm_product d
WHERE a.comp_id=c.COMP_ID
and a.prod_id=d.PROD_ID
and a.ro_dt between "'.$fdate.'" and "'.$tdate.'"
and a.comp_id = '.$comp.'
and a.ro_no not in (select sale_ro from td_sale 
                 where do_dt between "'.$fdate.'" and "'.$tdate.'"
                 and   comp_id = '.$comp.')');
   
    return $q->result();
   

}



/************************************************ */
        public function p_sale_purchase($all_data){
            
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

        public function p_ro_wise_soc_ro($from_dt,$to_dt,$branch)
        {
            $sql = "select a.ro_no,a.ro_dt,b.comp_name,c.prod_desc ,c.unit,sum(c.qty_per_bag)qty_per_bag,sum(a.net_amt)tot_net ,sum(a.qty)tot_qty
            from td_purchase a,mm_company_dtls b,mm_product c,mm_unit d
            where a.comp_id=b.comp_id
            and a.prod_id=c.prod_id
            and c.unit=d.id
            and a.trans_dt >= '$from_dt' AND a.trans_dt <= '$to_dt' AND a.br ='$branch'
            group by a.ro_no,a.ro_dt,b.comp_name,c.prod_desc order by a.ro_no,c.unit";
            $query = $this->db->query($sql);
            return $query->result();
          
        }
        
        public function s_ro_wise_soc_ro($from_dt,$to_dt,$branch){
            
            $sql = "select a.sale_ro,b.soc_name,sum(a.qty)tot_qty,ifnull(sum(a.round_tot_amt),0)tot_amt 
            from td_sale a,mm_ferti_soc b
            where a.soc_id=b.soc_id
            and a.do_dt >= '$from_dt' AND a.do_dt <= '$to_dt' AND a.br_cd ='$branch'  group by a.sale_ro,b.soc_name ";
            $query = $this->db->query($sql);
            return $query->result();
            
        }
        public function f_get_soc_pay($frmDt,$toDt,$branch){
            $query  = $this->db->query("
                                    
            select soc_id,soc_name,sum(paid_amt)tot_paid,sum(paybl)tot_payble,sum(adv)adv,sum(cramt)cramt
            from(
                                                  SELECT c.soc_id soc_id,soc_name,sum(c.paid_amt)paid_amt,0 paybl,
                                                  ( SELECT sum(adv_amt) FROM `tdf_advance` where `trans_type`='I'
                                                   
                                                    and branch_id=$branch and soc_id=c.soc_id
													 and trans_dt between '$frmDt' and '$toDt'
  														)adv,
                                                    (select  sum(tot_amt)
                                                        from  tdf_dr_cr_note
                                                        where trans_flag='R'
                                                        and note_type='D'
                                                 		 and trans_dt between '$frmDt' and '$toDt'
  														and soc_id=c.soc_id
                                                    	and branch_id=$branch)cramt

                                                    FROM tdf_payment_recv c,mm_ferti_soc b
                                                    where c.soc_id=b.soc_id
                                                    and c.branch_id=$branch
                                                    and c.paid_dt   between '$frmDt' and '$toDt'
                                                    group by soc_name,c.soc_id
                                                UNION
                                                    SELECT b.soc_id,soc_name,0,sum(c.round_tot_amt),0,0
                                                        FROM td_sale c,mm_ferti_soc b
                                                        where c.soc_id=b.soc_id
                                                        and c.br_cd=$branch
                                                    and c.do_dt between  '$frmDt' and '$toDt'
                                                    group by soc_name,b.soc_id
                                                Union
                                               SELECT c.soc_id,b.soc_name,0 tot_paid ,sum(c.round_tot_amt) tot_payble,0,0
                                                FROM mm_ferti_soc b ,td_sale c
                                                where c.br_cd=b.district 
                                                and c.br_cd=$branch
                                                and c.soc_id=b.soc_id 
                                                and c.do_dt between '$frmDt' and '$toDt'
                                                and c.soc_id not in(select  soc_id from  tdf_payment_recv where  paid_dt between '2020-04-01' and '2021-03-31' and branch_id=343)
                                                group by b.soc_name,c.soc_id
                                                union 
                                            select  b.soc_id,b.soc_name,0 tot_paid ,sum(c.tot_recvble_amt) tot_payble,0,0
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
		
		public function f_get_soc_ledger($frmDt,$toDt,$branch,$soc_id){
            $query  = $this->db->query("
            select soc_id,soc_name,sum(paid_amt)tot_paid,sum(paybl)tot_payble,ro_no,ro_dt
            from( SELECT c.soc_id soc_id,soc_name,sum(c.paid_amt)paid_amt,0 paybl,c.ro_no as ro_no,d.ro_dt as ro_dt

                                                    FROM tdf_payment_recv c,mm_ferti_soc b,td_purchase d
                                                    where c.soc_id=b.soc_id
													and c.soc_id = '$soc_id'
                                                    and c.branch_id=$branch
													and c.ro_no = d.ro_no
                                                    and c.paid_dt   between '$frmDt' and '$toDt'
                                                    group by soc_name,c.soc_id,c.ro_no,d.ro_dt
                                                UNION
                                                    SELECT b.soc_id,soc_name,0,sum(c.round_tot_amt),c.sale_ro ,d.ro_dt
                                                        FROM td_sale c,mm_ferti_soc b,td_purchase d
                                                        where c.soc_id=b.soc_id
                                                        and c.br_cd=$branch 
														and b.soc_id = '$soc_id'
														and c.sale_ro = d.ro_no
                                                    and c.do_dt between  '$frmDt' and '$toDt'
                                                    group by soc_name,b.soc_id,c.sale_ro,d.ro_dt
                                                Union
                                               SELECT c.soc_id,b.soc_name,0 tot_paid ,sum(c.round_tot_amt) tot_payble,c.sale_ro,d.ro_dt
                                                FROM mm_ferti_soc b ,td_sale c,td_purchase d
                                                where c.br_cd=b.district 
                                                and c.br_cd=$branch
                                                and c.soc_id=b.soc_id 
												and b.soc_id = '$soc_id'
												and c.sale_ro = d.ro_no
                                                and c.do_dt between '$frmDt' and '$toDt'
                                                and c.soc_id not in(select  soc_id from  tdf_payment_recv where  paid_dt between '2020-04-01' and '2021-03-31' and branch_id=343)
                                                group by b.soc_name,c.soc_id,c.sale_ro,d.ro_dt
                                                union 
                                            select  b.soc_id,b.soc_name,0 tot_paid ,sum(c.tot_recvble_amt) tot_payble,c.ro_no,d.ro_dt
                                                from  mm_ferti_soc b, tdf_payment_recv c,td_purchase d
                                                where b.district=c.branch_id
                                                and  b.district=$branch
                                                and c.soc_id=b.soc_id 
												and c.ro_no = d.ro_no
												and b.soc_id = '$soc_id'
                                                and c.sale_invoice_dt between '$frmDt' and '$toDt'
                                                and c.pay_type='O'
                                                group by  b.soc_id,b.soc_name,c.ro_no,d.ro_dt)a
                    group by soc_id,soc_name,ro_no,ro_dt");

            return $query->result();
        }

	 public function f_get_allsoc_pay($frmDt,$toDt,$comp_id){

	 $query  = $this->db->query("select e.short_name,a.ro_no,c.district_name,a.paid_dt,b.soc_name,
								sum(a.paid_amt)tot_paid,sum(a.net_recvble_amt)tot_payble
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

            $query  = $this->db->query("select   b.soc_name as soc_name,a.ro_no,d.unit_name,c.unit,c.QTY_PER_BAG
                                        from  td_purchase a ,mm_ferti_soc b,mm_product c,mm_unit d
                                        where  a.stock_point=b.soc_id 
                                        and a.prod_id=c.prod_id
                                        and c.unit=d.id
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
            $query  = $this->db->query("select a.trans_do,a.do_dt,a.trans_type,a.sale_ro,a.qty,a.soc_id,d.soc_name,b.unit,b.qty_per_bag,
                                        a.sale_rt,a.taxable_amt,a.cgst,a.sgst,a.dis,a.tot_amt,c.short_name,b.PROD_DESC
                                        from td_sale a,mm_product b,mm_company_dtls c,mm_ferti_soc d
                                        where  a.prod_id = b.PROD_ID
                                        and    a.comp_id = c.COMP_ID
                                        and a.soc_id=d.soc_id
                                        and    a.br_cd   = '$br'
                                        and    a.do_dt between '$frmDt' and '$toDt'
                                        order by a.do_dt");

            return $query->result();
        }

        public function f_get_stock_stockwise($branch,$toDt){

            $data = $this->db->query("select a.prod_id,a.stock_point,sum(a.qty) as qty,a.soc_name,b.COMP_NAME,c.unit
                                       from(select a.prod_id as prod_id,a.comp_id as comp_id,a.stock_point as stock_point,ifnull(sum(a.qty),0) as qty, b.soc_name as soc_name 
                                           from td_purchase a,mm_ferti_soc b where a.stock_point = b.soc_id and a.trans_dt <='$toDt' and a.br = '$branch' 
                                           group by a.stock_point,b.soc_name,a.prod_id,a.comp_id 
                                           UNION 
                                           select a.prod_id as prod_id,a.comp_id as comp_id,a.stock_point as stock_point,ifnull(sum(a.qty),0)*-1 as qty , b.soc_name as soc_name 
                                           from td_sale a,mm_ferti_soc b 
                                           where a.stock_point = b.soc_id 
                                           and a.br_cd = '$branch' and a.do_dt<='$toDt' 
                                           group by a.stock_point,b.soc_name,a.prod_id,a.comp_id)a,mm_company_dtls b,mm_product c
                                           where a.comp_id = b.COMP_ID
                                           and a.prod_id=c.prod_id
                                           and a.qty>0
                                           group by a.prod_id,a.stock_point,a.soc_name,b.COMP_NAME
                                           order by a.soc_name");

            if($data->num_rows() > 0 ){
                $row = $data->result();
            }else{
                $row = 0;
            }
            return $row;
        }



        public function getallAdvData($comp_id,$frm_date,$to_date){

            $q=$this->db->query("select a.trans_dt,c.branch_id,b.branch_name,c.prod_id,d.PROD_DESC,c.ro_no,c.fo_no,a.adv_amt
            from tdf_company_advance a, md_branch b,td_adv_details c,mm_product d
            where c.branch_id = b.id
            and   a.adv_dtl_id = c.receipt_no
            and   a.adv_receive_no = c.detail_receipt_no
            and   c.prod_id = d.PROD_ID
            and   a.trans_dt between '$frm_date' and '$to_date'
            and   a.comp_id = '$comp_id'
            and   c.comp_pay_flag = 'Y';"
                
            );
            
            return $q->result();
        }

    }
?>