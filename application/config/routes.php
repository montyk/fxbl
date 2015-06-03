<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = 'pages/pageview/page-not-found';

/*Language - Page */
$route['pages/(:any)'] = "pages/pageview/$1";
$route['en/(:any)'] = "pages/pageview/$1/1";
$route['fn/(:any)'] = "pages/pageview/$1/2";
$route['ru/(:any)'] = "pages/pageview/$1/3";
/* URL Language Redirections */
$route['en']='home/set_user_language/1';
$route['fn']='home/set_user_language/2';
$route['ru']='home/set_user_language/3';
$route['ge']='home/set_user_language/4';


$route['buy_details'] = "pages/pageview/buy";
$route['sell_details'] = "pages/pageview/sell";
// $route['exchange_details'] = "pages/pageview/exchange-details";
$route['exchange_details'] = "pages/pageview/exchanger";



/* End of file routes.php */
/* Location: ./application/config/routes.php */