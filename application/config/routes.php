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
$route['admin'] = "admin/login";
$route['login'] = "admin/login";
//~ $route['appointment'] = "appointment/update_book_appointment";
//~ $route['admin'] = "admin/login";

//~ require_once( BASEPATH .'database/DB'. EXT );
//~ $db =& DB();
//~ $query = $db->get( 'task_category' );
//~ $result = $query->result();
//~ var_dump($result);
//~ exit;
//~ $val = $this->task_model->getedittask_list();
//~ var_dump($val );

//$route['services/(:num)'] = 'booking/get_categories/$1';
//~ $route['services/(:any)/:num'] = 'booking/get_categories/$1';


$route['services/([a-z]+)/(\d+)'] = "booking/get_categories/$1";

//$route['services/(:any)/(:num)'] = "booking/get_categories/$1";
//~ $route['services/air-conditional/(:num)'] = "booking/get_categories/$1";
//~ $route['services/electrical/(:num)'] = "booking/get_categories/$1";
//~ $route['services/plumbing/(:any)'] = "booking/get_categories/$1";
//~ $route['services/housecleaning/(:num)'] = "booking/get_categories/$1";
//~ $route['services/mover/(:num)'] = "booking/get_categories/$1";
//~ $route['services/housepainting/(:num)'] = "booking/get_categories/$1";
$route['my-request/new-request'] = "booking";
$route['my-request/active-request'] = "booking/active_request";
$route['my-request/past-request'] = "booking/past_request";
$route['assignments/schedule'] = "schedule";
$route['assignments/past-assignments'] = "schedule/pastassignment";
$route['profile'] = "home/profile_new";
$route['apartments'] = "property";
$route['logout'] = "home/logout";
$route['my-request/edit-request/(:num)'] = "booking/edit_booking/$1";
$route['get-chat-history-vendor'] = 'ChatController/get_chat_history_by_vendor';
$route['send-message'] = 'ChatController/send_text_message';
$route['chat-attachment/upload'] = 'ChatController/send_text_message';



//~ $route['booking/electrical(:any)'] = "booking/get_categories/2";
//~ $route['booking/plumbing(:any)'] = "booking/get_categories/3";
//~ $route['booking/housecleaning(:any)'] = "booking/get_categories/4";
//~ $route['booking/mover(:any)'] = "booking/get_categories/5";
//~ $route['booking/housepainting(:any)'] = "booking/get_categories/6";


$route['email_confirmation/(:any)'] = "Login_controller/confirmEmail/$1";


$route['default_controller'] = 'home';
$route['invoice'] = "purchase_order";
$route['invoice/(.+)'] = "purchase_order/$1";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
