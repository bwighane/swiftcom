<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	// Router::connect('/new-item-for-sale', array('controller' => 'products', 'action' => 'add'));

	$routeregex = '\b(?:(?!categorylist$|about$|latest$|login$|register$|advancedsearch$|download$|terms$|products$|notifications$|settings$|trash$|categories$|subcategories$|adminindex$|faq$|messages$|conversations$|facebooklogin$)\w)+\b';
	
	Router::connect('/:store/',
	 	array('controller' => 'products', 'action' => 'sto'),
	 	array('store' => $routeregex)
	);
	Router::connect('/:store',
	 	array('controller' => 'products', 'action' => 'sto'),
	 	array('store' => $routeregex)
	);

	// Router::connect('/shop/*', array('controller' => 'products', 'action' => 'sto'));
	Router::connect('/categorylist', array('controller' => 'pages', 'action' => 'categorylist'));
	Router::connect('/adminindex', array('controller' => 'products', 'action' => 'index'));
	Router::connect('/latest', array('controller' => 'products', 'action' => 'home'));
	Router::connect('/about', array('controller' => 'pages', 'action' => 'about'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'add'));
	Router::connect('/advancedsearch', array('controller' => 'products', 'action' => 'advancedsearch'));
	Router::connect('/download', array('controller' => 'pages', 'action' => 'download'));
	Router::connect('/product-page/*', array('controller' => 'products', 'action' => 'productpage'));
	Router::connect('/settings', array('controller' => 'users', 'action' => 'edit'));
	Router::connect('/trash', array('controller' => 'products', 'action' => 'trasheditems'));
	Router::connect('/category/*', array('controller' => 'products', 'action' => 'category'));
	Router::connect('/subcategory/*', array('controller' => 'products', 'action' => 'subcategory'));
	Router::connect('/store/*', array('controller' => 'products', 'action' => 'store'));
	Router::connect('/terms', array('controller' => 'pages', 'action' => 'termsofuse'));
	Router::connect('/faq', array('controller' => 'pages', 'action' => 'faq'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */

	Router::parseExtensions();
	Router::setExtensions(array('json', 'txt', 'xml', 'csv', 'pdf', 'rss'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
