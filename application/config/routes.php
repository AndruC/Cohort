<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2012, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

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
| There are two reserved routes:
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

/*
	Routing Examples

	$route['journals'] = "blogs";
	A URL containing the word "journals" in the first segment will be
	remapped to the "blogs" class.

	$route['blog/joe'] = "blogs/users/34";
	A URL containing the segments blog/joe will be remapped to the "blogs"
	class and the "users" method. The ID will be set to "34".

	$route['product/(:any)'] = "catalog/product_lookup";
	A URL with "product" as the first segment, and anything in the second
	will be remapped to the "catalog" class and the "product_lookup" method.

	$route['product/(:num)'] = "catalog/product_lookup_by_id/$1";
	A URL with "product" as the first segment, and a number in the second
	will be remapped to the "catalog" class and the "product_lookup_by_id"
	method passing in the match as a variable to the function.
*/

// (:num) will match a segment containing only numbers.
// (:any) will match a segment containing any character. 

$route['default_controller'] = 'welcome';
// by default, take any input after the base, and send to our static page controller

$route['pages/(:any)'] = 'pages/view/$1'; 
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */