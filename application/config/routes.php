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

| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['smsmo'] = 'welcome/smsmo';
$route['home/logout'] = 'home/logout';
$route['home'] = 'home/index';
$route['home/delete/(:any)'] = 'home/delete/$1';
$route['policy'] = 'welcome/policy';
$route['terms'] = 'welcome/terms';
$route['signup'] = 'welcome/signup';
$route['home/logout'] = 'home/logout';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
