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

$route['default_controller'] = 'front_office/Home/index';
$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;


//routing
$route['home'] = 'front_office/Home/index';

//login
$route['login'] = 'front_office/Login/index';
$route['login/register_member'] = 'front_office/Login/action_register_member';
$route['login/login'] = 'front_office/Login/action_login';
$route['logout'] = 'front_office/Login/logout';

//sales part
$route['partner'] = 'front_office/Sales_partner/index';
$route['partner/register'] = 'front_office/Sales_partner/action_register';

//profile
$route['profile'] = 'front_office/Profile/index';
$route['profile/province'] = 'front_office/Profile/province';
$route['profile/city'] = 'front_office/Profile/city';
$route['profile/city/(:any)'] = 'front_office/Profile/city/$1';
$route['profile/add/alamat'] = 'front_office/Profile/action_add_alamat';

$route['profile/alamat'] = 'front_office/Profile/alamat';
$route['profile/alamat/(:any)'] = 'front_office/Profile/alamat/$1';

$route['profile/account'] = 'front_office/Profile/myacoount';

//blog
$route['blog'] = 'front_office/Blog/index';
$route['blog/(:num)'] = 'front_office/Blog/index/$1';
$route['blog/detail/(:any)'] = 'front_office/Blog/blog_detail/$1';
// $route['blog.html/page/(:any)'] = 'front_office/Blog/load_pagination/$1';
$route['about'] = 'front_office/About/index';
$route['contact'] = 'front_office/Contact/index';