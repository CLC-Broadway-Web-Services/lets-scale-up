<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// FRONTEND ROUTES ONLY
$routes->group('/', function ($routes) {
	$routes->get('', 'Frontend\Pages::index', ['as' => 'home_page']);
	$routes->get('initiatives', 'Frontend\Pages::initiatives', ['as' => 'initiatives_page']);
	$routes->get('about-us', 'Frontend\Pages::aboutus', ['as' => 'about_us_page']);
	$routes->match(['get', 'post'], 'contact-us', 'Frontend\Pages::contact_us', ['as' => 'contact_us_page']);
	$routes->get('terms-of-use', 'Frontend\Pages::terms_of_use', ['as' => 'terms_page']);
	$routes->get('privacy-policy', 'Frontend\Pages::privacy_policy', ['as' => 'privacy_page']);

	$routes->get('clients', 'Frontend\Clients::index', ['as' => 'clients_page']);
	$routes->get('client/(:segment)', 'Frontend\Clients::single/$1', ['as' => 'single_client_page']);

	$routes->get('blogs', 'Frontend\Blogs::index', ['as' => 'blogs_page']);
	$routes->get('blog/(:segment)', 'Frontend\Blogs::single/$1', ['as' => 'single_post_page']);
	
	$routes->addRedirect('blog', 'blogs_page');
	$routes->addRedirect('client', 'clients_page');
	// $routes->group('service', function ($routes) {
	// 	$routes->get('(:segment)', 'Frontend\Services::singleService/$1');
	// 	$routes->get('(:segment)/packages', 'Frontend\Services::singleServicePackages/$1');
	// 	$routes->match(['get', 'post'], '(:segment)/packages/(:num)', 'Frontend\Services::serviceSelectedPackage/$1/$2');
	// });
});



// $routes->group('/', function ($routes) {
// 	$routes->get('', 'Home::index');
// 	$routes->group('service', function ($routes) {
// 		$routes->get('(:segment)', 'Frontend\Services::singleService/$1');
// 		$routes->get('(:segment)/packages', 'Frontend\Services::singleServicePackages/$1');
// 		$routes->match(['get', 'post'], '(:segment)/packages/(:num)', 'Frontend\Services::serviceSelectedPackage/$1/$2');
// 	});
// });

// ADMIN ROUTES ONLY
$routes->group('administrator', function ($routes) {
	$routes->match(['get', 'post'], 'login', 'Admin\Auth::index');
	$routes->match(['get', 'post'], 'logout', 'Admin\Auth::logOut');
	$routes->match(['get', 'post'], 'forgetpassword', 'Admin\Auth::forgetPassword');
	$routes->get('', 'Admin\Dashboard::index', ['filter' => 'adminauth']);

	// ADMIN SERVICE ROUTES
	$routes->group('services', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Services::index');
		$routes->match(['get', 'post'], 'queries', 'Admin\Services::queries');
		$routes->match(['get', 'post'], 'testimonials', 'Admin\Services::testimonials');
	});
	$routes->group('service', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditService');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditService/$1');
		$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::serviceStatusChange/$1');
		$routes->match(['get', 'post'], 'homestatus/(:num)', 'Admin\Services::serviceHomeStatusChange/$1');
		$routes->group('forms', function ($routes) {
			$routes->get('', 'Admin\Serviceforms::index');
			$routes->match(['get', 'post'], 'add', 'Admin\Serviceforms::addEditForm');
			$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Serviceforms::addEditForm/$1');
			$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Serviceforms::formStatusChange/$1');
		});
		$routes->group('documents', function ($routes) {
			$routes->get('', 'Admin\Services::serviceDocuments');
			$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditServiceDocument');
			$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditServiceDocument/$1');
			$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::serviceDocumentStatusChange/$1');
		});
		$routes->group('faqs', function ($routes) {
			$routes->get('', 'Admin\Services::serviceFaqs');
			$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditServiceFaq');
			$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditServiceFaq/$1');
			$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::serviceFaqStatusChange/$1');
		});
		$routes->group('packages', function ($routes) {
			$routes->get('', 'Admin\Services::servicePackages');
			$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditServicePackage');
			$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditServicePackage/$1');
			$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::servicePackageStatusChange/$1');
		});
	});

	// ADMIN BLOG ROUTES
	$routes->group('blogs', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Blogs::index');
	});
	$routes->group('blog', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], 'categories', 'Admin\Blogs::categories');
		$routes->match(['get', 'post'], 'categories/(:num)', 'Admin\Blogs::categories/$1');
		$routes->match(['get', 'post'], 'categories/delete/(:num)', 'Admin\Blogs::categoriesDelete/$1');
		$routes->match(['get', 'post'], 'comments', 'Admin\Blogs::comments');

		$routes->match(['get', 'post'], 'add', 'Admin\Blogs::addEditBlogPost');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Blogs::addEditBlogPost/$1');
		$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Blogs::postStatusChange/$1');
		$routes->match(['get', 'post'], 'homestatus/(:num)', 'Admin\Blogs::postHomeStatusChange/$1');
	});

	// ADMIN PROJECT ROUTES
	$routes->group('projects', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Projects::index');
	});
	$routes->group('project', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], 'categories', 'Admin\Projects::categories');
		$routes->match(['get', 'post'], 'categories/(:num)', 'Admin\Projects::categories/$1');
		$routes->match(['get', 'post'], 'categories/delete/(:num)', 'Admin\Projects::categoriesDelete/$1');

		$routes->match(['get', 'post'], 'add', 'Admin\Projects::addEditProject');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Projects::addEditProject/$1/$2');
		$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Projects::statusChange/$1');
		$routes->match(['get', 'post'], 'homestatus/(:num)', 'Admin\Projects::homeStatusChange/$1');
	});

	// ADMIN CLIENTS ROUTES
	$routes->group('clients', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Clients::index');

		$routes->match(['get', 'post'], 'add', 'Admin\Clients::addEditClients');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Clients::addEditClients/$1');
	});

	// ADMIN TEAM ROUTES
	$routes->group('team', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Team::index');

		$routes->match(['get', 'post'], 'add', 'Admin\Team::addEditMember');
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Team::addEditMember/$1/$2');
	});

	// ADMIN OTHERS ROUTES
	$routes->group('other', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], 'subscribers', 'Admin\Others::subscribers');
		$routes->match(['get', 'post'], 'contact-submission', 'Admin\Others::contactSubmission');
		
		$routes->match(['get', 'post'], 'testimonials', 'Admin\Others::testimonials');
		$routes->match(['get', 'post'], 'testimonials/(:num)', 'Admin\Others::testimonials/$1');
		$routes->match(['get', 'post'], 'testimonials/delete/(:num)', 'Admin\Others::testimonialsDelete/$1');
	});
});

// $routes->group('administrator', function ($routes) {
// 	$routes->match(['get', 'post'], 'login', 'Admin\Auth::index');
// 	$routes->match(['get', 'post'], 'logout', 'Admin\Auth::logOut');
// 	$routes->match(['get', 'post'], 'forgetpassword', 'Admin\Auth::forgetPassword');
// 	$routes->get('', 'Admin\Dashboard::index', ['filter' => 'adminauth']);
// });


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
