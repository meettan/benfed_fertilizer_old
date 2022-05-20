<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//For Payroll
$route['payroll'] = 'payrolls';
$route['payroll/approve/(:any)'] = 'payrolls/approves/f_$1';
$route['payroll/approve'] = 'payrolls/approves/f_approve';
$route['payroll/(:any)/(:any)'] = 'payrolls/f_$1_$2';
$route['payroll/(:any)'] = 'payrolls/f_$1';

//For Paddy
$route['paddy'] = 'paddys';
$route['paddy/approve/(:any)'] = 'paddys/approves/f_approve_$1';
$route['paddy/(:any)/(:any)'] = 'paddys/f_$1_$2';
$route['paddy/(:any)'] = 'paddys/f_$1';

//For Fertilizer
$route['source']           = 'fertilizer/fertilizer/company';                       //Company Master
$route['measurement']      = 'fertilizer/fertilizer/unit';                          //Unit Master
$route['material']         = 'fertilizer/fertilizer/product';                       //Product Master
$route['customer']         = 'fertilizer/fertilizer/soceity';                       //Society Master
$route['category']         = 'fertilizer/fertilizer/category';   
$route['key/(:any)']       = 'fertilizer/$1';                                       //Fertilizer        
$route['rateslab']         = 'fertilizer/fertilizer/sale_rate'; 
$route['api/(:any)']     = 'fertilizer/api/$1';                       //Sale Rate Salb
$route['trade/(:any)']     = 'fertilizer/sale/$1';                                  //Sale
$route['stock/(:any)']     = 'fertilizer/purchase/$1';                              //Purchase
$route['adv/(:any)']       = 'fertilizer/advance/$1'; 
$route['crCatg']           = 'fertilizer/fertilizer/cr_note_catg';                  //credit note category
$route['socpay/(:any)']    = 'fertilizer/society_payment/$1';                       //Advance
$route['drcrnote/(:any)']  = 'fertilizer/drcrnote/$1'; 
$route['compay/(:any)']    = 'fertilizer/company_payment/$1';
$route['BNK']              = 'fertilizer/fertilizer/bank';                           //Bank Master
$route['virtualpnt/(:any)']= 'fertilizer/virtual_stk_point/$1';                          
$route['fert/rep/(:any)']   = 'fertilizer/report/$1';                               //Report                
//For Add New

//$route['add_new/(:any)/(:any)'] = 'paddys/add_new/f_$1_$2';
$route['add_new/(:any)'] = 'paddys/add_new/f_$1';

//For Transactions 
$route['transactions/(:any)'] = 'paddys/transactions/f_$1';

//For Payments 
$route['payment/(:any)'] = 'paddys/payment/f_$1';
$route['payment/(:any)/(:any)'] = 'paddys/payment/f_$1_$2';

//For Report
$route['report/(:any)'] = 'paddys/reports/f_$1';


//For Admin
$route['admin'] = 'admins';
$route['admin/(:any)/(:any)'] = 'admins/f_$1_$2';
$route['admin/(:any)'] = 'admins/f_$1';

//For Profile
$route['profile'] = 'profiles';
$route['profile/(:any)/(:any)'] = 'profiles/f_$1_$2';
$route['profile/(:any)'] = 'profiles/f_$1';
