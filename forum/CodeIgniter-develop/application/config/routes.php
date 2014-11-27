<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
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
|	http://codeigniter.com/user_guide/general/routing.html
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
/*$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
*/



/**
 *
 * Routing ['news/(:any)'] support only first folder under 'news/'
 *
 * For instance, 
	$route['news/(:any)'] = 'news/view/$1';
	or
	
	$route['news/(:any)'] = 'news/tmp/$1';
	
	But it is up to you, how you locate the view files.
	
	
	When you set route "$route['news/(:any)'] = 'news/view/$1';",
	
	you can load view file from "views/abc/def/ghi/jkl/view1.php"
	
	It looks like routing only routes from URL to controller.
	
	So, ['news/(:any)'] = 'news/view/$1', then,
	
		news/abc will route to News::view('abc')
		
		Routing has nothing to do with loading view file.
		
		It is the method of the route's controller which decides which file to load.

 *
 *
 *
 *
 */
//$route['news/(:any)'] = 'news/view/$1';
//$route['news/(:any)'] = 'news/tmp/$1';

// news/view/create => news/view/view/create\
// news/hi => news/view/hi.php
// news/hello => news/view/hello
// news/view/index
// news/index => news/view/index

// news/success => news/view/sucess
//
// Routing Rule => Re mapping for controller.
//
//
//


$route['news/create'] = 'news/create'; // View Create Page
$route['news/update/(:num)'] = 'news/update/$1';
$route['news/delete/(:num)'] = 'news/delete/$1';
$route['news'] = 'news'; // news => news/index

$route['news/view/(:any)'] = 'news/view/$1'; //(:any) === slug name - then it will redirect you to view that article. 
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';



/* End of file routes.php */
/* Location: ./application/config/routes.php */