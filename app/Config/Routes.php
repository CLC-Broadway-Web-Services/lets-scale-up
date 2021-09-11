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
	$routes->get('initiative/(:segment)', 'Frontend\Pages::initiative', ['as' => 'single_initiative']);
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
	$routes->group('c', function ($routes) {
		$routes->match(['get', 'post'], '(:segment)', 'Frontend\Services::categoryPage/$1', ['as' => 'category']);
	});
	$routes->group('service', function ($routes) {
		$routes->match(['get', 'post'], '(:segment)', 'Frontend\Services::singleService/$1', ['as' => 'service_detail']);
		$routes->match(['get', 'post'], '(:segment)/packages', 'Frontend\Services::singleServicePackages/$1');
		$routes->match(['get', 'post'], '(:segment)/packages/(:num)', 'Frontend\Services::serviceSelectedPackage/$1/$2', ['as' => 'service_selected_package']);
	});
	$routes->group('checkout', ['filter' => 'auth'], function ($routes) {
		$routes->match(['get', 'post'], '(:num)', 'Frontend\PaymentController::checkout/$1', ['as' => 'checkout_order']);
	});
	$routes->group('account', ['filter' => 'auth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Frontend\AccountController::overview', ['as' => 'account_overview']);
		$routes->match(['get', 'post'], 'orders', 'Frontend\AccountController::orders', ['as' => 'account_orders']);
		$routes->match(['get', 'post'], 'documents', 'Frontend\AccountController::documents', ['as' => 'account_documents']);
		$routes->match(['get', 'post'], 'document-query', 'Frontend\AccountController::documents', ['as' => 'account_doc_query']);
		$routes->match(['get', 'post'], 'legal-forms', 'Frontend\AccountController::legalForms', ['as' => 'account_legal_forms']);
		$routes->match(['get', 'post'], 'profile', 'Frontend\AccountController::personalInfo', ['as' => 'account_profile']);
		$routes->match(['get', 'post'], 'change-password', 'Frontend\AccountController::passwordChange', ['as' => 'account_change_password']);
		$routes->match(['get', 'post'], 'transactions', 'Frontend\AccountController::paymentHistory', ['as' => 'account_payment_history']);
		$routes->match(['get', 'post'], 'feedback', 'Frontend\AccountController::feedback', ['as' => 'account_feedback']);
		$routes->match(['get', 'post'], 'subscriptions', 'Frontend\AccountController::subscriptions', ['as' => 'account_subscriptions']);
	});
});



$routes->group('auth', function ($routes) {
	$routes->match(['get', 'post'], 'login', 'Frontend\User::login', ['as' => 'user_login']);
	$routes->match(['get', 'post'], 'register', 'Frontend\User::register', ['as' => 'user_register']);
	$routes->match(['get', 'post'], 'logout', 'Frontend\User::logout', ['as' => 'user_logout']);
});

// ADMIN ROUTES ONLY
$routes->group('administrator', function ($routes) {
	$routes->match(['get', 'post'], 'login', 'Admin\Auth::index', ['as' => 'admin_login']);
	$routes->match(['get', 'post'], 'logout', 'Admin\Auth::logOut', ['as' => 'admin_logout']);
	$routes->match(['get', 'post'], 'forgetpassword', 'Admin\Auth::forgetPassword', ['as' => 'admin_forget_password']);
	$routes->get('', 'Admin\Dashboard::index', ['as' => 'admin_index'], ['filter' => 'adminauth']);

	// ADMIN SERVICE ROUTES
	$routes->group('services', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Services::index', ['as' => 'admin_service_index']);
		$routes->match(['get', 'post'], 'queries', 'Admin\Services::queries', ['as' => 'admin_service_queries']);
		$routes->match(['get', 'post'], 'testimonials', 'Admin\Services::testimonials', ['as' => 'admin_service_testimonials']);
	});
	$routes->group('service', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditService', ['as' => 'admin_service_add']);
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditService/$1', ['as' => 'admin_service_edit']);
		$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::serviceStatusChange/$1', ['as' => 'admin_service_status_change']);
		$routes->match(['get', 'post'], 'homestatus/(:num)', 'Admin\Services::serviceHomeStatusChange/$1', ['as' => 'admin_service_home_status']);


		$routes->group('benefits', function ($routes) {
			$routes->get('', 'Admin\Services::serviceBenefits', ['as' => 'admin_service_benefit_index']);
			$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditServiceBenefit', ['as' => 'admin_service_benefit_add']);
			$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditServiceBenefit/$1', ['as' => 'admin_service_benefit_edit']);
			$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::serviceBenefitStatusChange/$1', ['as' => 'admin_service_benefit_status']);
		});

		$routes->group('categories', function ($routes) {
			$routes->match(['get', 'post'], '', 'Admin\Services::categories', ['as' => 'admin_service_category_index']);
			$routes->match(['get', 'post'], '(:num)', 'Admin\Services::categories/$1', ['as' => 'admin_service_category_edit']);
			$routes->match(['get', 'post'], 'delete/(:num)', 'Admin\Services::categoriesDelete/$1', ['as' => 'admin_service_category_delete']);

			$routes->group('faqs', function ($routes) {
				$routes->get('', 'Admin\Services::serviceCatFaqs', ['as' => 'admin_service_cat_faq_index']);
				$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditServiceCatFaq', ['as' => 'admin_service_cat_faq_add']);
				$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditServiceCatFaq/$1', ['as' => 'admin_service_cat_faq_edit']);
				$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::serviceCatFaqStatusChange/$1', ['as' => 'admin_service_cat_faq_status']);
			});
		});

		$routes->group('forms', function ($routes) {
			$routes->get('', 'Admin\Serviceforms::index', ['as' => 'admin_service_form_index']);
			$routes->match(['get', 'post'], 'add', 'Admin\Serviceforms::addEditForm', ['as' => 'admin_service_form_add']);
			$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Serviceforms::addEditForm/$1', ['as' => 'admin_service_form_edit']);
			$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Serviceforms::formStatusChange/$1', ['as' => 'admin_service_form_status']);
		});
		$routes->group('documents', function ($routes) {
			$routes->get('', 'Admin\Services::serviceDocuments', ['as' => 'admin_service_document_index']);
			$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditServiceDocument', ['as' => 'admin_service_document_add']);
			$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditServiceDocument/$1', ['as' => 'admin_service_document_edit']);
			$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::serviceDocumentStatusChange/$1', ['as' => 'admin_service_document_status']);
		});
		$routes->group('faqs', function ($routes) {
			$routes->get('', 'Admin\Services::serviceFaqs', ['as' => 'admin_service_faq_index']);
			$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditServiceFaq', ['as' => 'admin_service_faq_add']);
			$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditServiceFaq/$1', ['as' => 'admin_service_faq_edit']);
			$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::serviceFaqStatusChange/$1', ['as' => 'admin_service_faq_status']);
		});
		$routes->group('packages', function ($routes) {
			$routes->get('', 'Admin\Services::servicePackages', ['as' => 'admin_service_package_index']);
			$routes->match(['get', 'post'], 'add', 'Admin\Services::addEditServicePackage', ['as' => 'admin_service_package_add']);
			$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Services::addEditServicePackage/$1', ['as' => 'admin_service_package_edit']);
			$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Services::servicePackageStatusChange/$1', ['as' => 'admin_service_package_status']);
		});
	});

	// ADMIN BLOG ROUTES
	$routes->group('blogs', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Blogs::index', ['as' => 'admin_blogs_index']);
	});
	$routes->group('blog', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], 'categories', 'Admin\Blogs::categories', ['as' => 'admin_blog_category_index']);
		$routes->match(['get', 'post'], 'categories/(:num)', 'Admin\Blogs::categories/$1', ['as' => 'admin_blog_category_edit']);
		$routes->match(['get', 'post'], 'categories/delete/(:num)', 'Admin\Blogs::categoriesDelete/$1', ['as' => 'admin_blog_category_delete']);
		$routes->match(['get', 'post'], 'comments', 'Admin\Blogs::comments', ['as' => 'admin_blog_comments']);

		$routes->match(['get', 'post'], 'add', 'Admin\Blogs::addEditBlogPost', ['as' => 'admin_blog_add']);
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Blogs::addEditBlogPost/$1', ['as' => 'admin_blog_edit']);
		$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Blogs::postStatusChange/$1', ['as' => 'admin_blog_status']);
		$routes->match(['get', 'post'], 'homestatus/(:num)', 'Admin\Blogs::postHomeStatusChange/$1', ['as' => 'admin_blog_home_status']);
	});

	// ADMIN PROJECT ROUTES
	$routes->group('projects', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Projects::index', ['as' => 'admin_project_index']);
	});
	$routes->group('project', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], 'categories', 'Admin\Projects::categories', ['as' => 'admin_project_categories_index']);
		$routes->match(['get', 'post'], 'categories/(:num)', 'Admin\Projects::categories/$1', ['as' => 'admin_project_category_edit']);
		$routes->match(['get', 'post'], 'categories/delete/(:num)', 'Admin\Projects::categoriesDelete/$1', ['as' => 'admin_project_category_delete']);

		$routes->match(['get', 'post'], 'add', 'Admin\Projects::addEditProject', ['as' => 'admin_project_add']);
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Projects::addEditProject/$1/$2', ['as' => 'admin_project_edit']);
		$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Projects::statusChange/$1', ['as' => 'admin_project_status']);
		$routes->match(['get', 'post'], 'homestatus/(:num)', 'Admin\Projects::homeStatusChange/$1', ['as' => 'admin_project_home_status']);
	});

	// ADMIN INITIATIVES ROUTES
	$routes->group('initiatives', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Initiatives::index', ['as' => 'admin_initiatives_index']);

		$routes->match(['get', 'post'], 'categories', 'Admin\Initiatives::categories', ['as' => 'admin_initiative_categories_index']);
		$routes->match(['get', 'post'], 'categories/(:num)', 'Admin\Initiatives::categories/$1', ['as' => 'admin_initiative_category_edit']);
		$routes->match(['get', 'post'], 'categories/delete/(:num)', 'Admin\Initiatives::categoriesDelete/$1', ['as' => 'admin_initiative_category_delete']);

		$routes->match(['get', 'post'], 'add', 'Admin\Initiatives::addEditInitiative', ['as' => 'admin_initiative_add']);
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Initiatives::addEditInitiative/$1/$2', ['as' => 'admin_initiative_edit']);
		$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Initiatives::statusChange/$1', ['as' => 'admin_initiative_status']);
		$routes->match(['get', 'post'], 'homestatus/(:num)', 'Admin\Initiatives::homeStatusChange/$1', ['as' => 'admin_initiative_home_status']);
	});

	// ADMIN CLIENTS ROUTES
	$routes->group('clients', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Client::index', ['as' => 'admin_clients_index']);

		$routes->match(['get', 'post'], 'add', 'Admin\Client::addEditClient', ['as' => 'admin_clients_add']);
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Client::addEditClient/$1', ['as' => 'admin_clients_edit']);
		$routes->match(['get', 'post'], 'status/(:num)', 'Admin\Client::statusChange/$1', ['as' => 'admin_clients_status']);
		$routes->match(['get', 'post'], 'homestatus/(:num)', 'Admin\Client::homeStatusChange/$1', ['as' => 'admin_clients_home_status']);

		$routes->match(['get', 'post'], 'categories', 'Admin\Client::categories', ['as' => 'admin_clients_categories_index']);
		$routes->match(['get', 'post'], 'categories/(:num)', 'Admin\Client::categories/$1', ['as' => 'admin_clients_category_edit']);
		$routes->match(['get', 'post'], 'categories/delete/(:num)', 'Admin\Client::categoriesDelete/$1', ['as' => 'admin_clients_category_delete']);
	});

	// ADMIN TEAM ROUTES
	$routes->group('team', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], '', 'Admin\Team::index', ['as' => 'admin_team_index']);

		$routes->match(['get', 'post'], 'add', 'Admin\Team::addEditMember', ['as' => 'admin_team_add']);
		$routes->match(['get', 'post'], 'edit/(:num)', 'Admin\Team::addEditMember/$1/$2', ['as' => 'admin_team_edit']);
	});

	// ADMIN OTHERS ROUTES
	$routes->group('other', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], 'subscribers', 'Admin\Others::subscribers', ['as' => 'admin_subscribers']);
		$routes->match(['get', 'post'], 'contact-submission', 'Admin\Others::contactSubmission', ['as' => 'admin_contact_submissions']);

		$routes->match(['get', 'post'], 'testimonials', 'Admin\Others::testimonials', ['as' => 'admin_testimonials']);
		$routes->match(['get', 'post'], 'testimonials/(:num)', 'Admin\Others::testimonials/$1', ['as' => 'admin_testimonials_edit']);
		$routes->match(['get', 'post'], 'testimonials/delete/(:num)', 'Admin\Others::testimonialsDelete/$1', ['as' => 'admin_testimonials_delete']);

		$routes->match(['get', 'post'], 'settings', 'Admin\Settings::index', ['as' => 'site_settings']);
	});

	// ADMIN PROFILE
	$routes->group('profile', ['filter' => 'adminauth'], function ($routes) {
		$routes->match(['get', 'post'], 'update', 'Admin\Profile::update', ['as' => 'admin_profile_update']);
		$routes->match(['get', 'post'], 'password-change', 'Admin\Profile::passwordUpdate', ['as' => 'admin_password_update']);
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
