<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Entities\MetaTags;
use App\Models\Admin\BlogsModel;
use App\Models\Admin\ContactsModel;
use App\Models\Admin\ServicesModel;
use App\Models\Admin\TeamModel;
use App\Models\Admin\TestimonialsModel;
use App\Models\Client\ClientModel;
use App\Models\Globals\FrontservicesModel;
use App\Models\Globals\PartnerwithusModel;

class Pages extends BaseController
{
	public function __construct()
	{
	}
	public function index()
	{
		$servicesDB = new FrontservicesModel();
		$services = $servicesDB->getAllHomepageServices();
		$clientsDb = new ClientModel();
		$clients = $clientsDb->getAllClientsHomepage();
		$blogsDb = new BlogsModel();
		$blogs = $blogsDb->getAllBlogsHomepage();
		// return print_r($services);
		// $this->data['services'] = $services;

		$testimonialsDB = new TestimonialsModel();
		$servicesDb = new ServicesModel();

		$searchservices = $servicesDb->select('service_id, service_title, service_slug')->where(['service_status' => 1])->orderBy('service_title', 'asc')->findAll();
		$radomize_array = $searchservices;
		shuffle($radomize_array);
		$random_services = array_slice($radomize_array, 0, 5);
		$testimonials = $testimonialsDB->getAllTestimonialsFront();

		$this->data['searchservices'] = $searchservices;
		$this->data['random_services'] = $random_services;
		$this->data['services'] = $services;
		$this->data['clients'] = $clients;
		$this->data['blogs'] = $blogs;
		$this->data['testimonials'] = $testimonials;

		// echo '<pre>';
		// print_r($this->data);
		// echo '</pre>';
		// return;
		// $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';
		// $this->data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		$this->data['pageJS'] = '<script src="/public/custom/assets/js/homepage.js"></script>';

		return view('Frontend/pages/homepage', $this->data);
	}
	public function initiatives()
	{
		$pagedata = [
			'pagename' => 'INITIATIVES'
		];
		$this->data['pagedata'] = $pagedata;
		$postMeta = new MetaTags();
		$postMeta->title = 'Initiatives';
		$this->data['meta'] = $postMeta;
		// $testimonialsDB = new TestimonialsModel();
		// $this->data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();

		// return print_r($this->data);

		// $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $this->data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $this->data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/pages/initiatives', $this->data);
	}
	public function contact_us()
	{
		$pagedata = [
			'pagename' => 'Contact Us'
		];
		$postMeta = new MetaTags();
		$postMeta->title = 'Contact Us';
		$this->data['meta'] = $postMeta;
		$this->data['pagedata'] = $pagedata;
		$session = session();
		if ($this->request->getMethod() == 'post') {
			if (!empty($this->request->getPost('user_name')) && !empty($this->request->getPost('user_email')) && !empty($this->request->getPost('user_mobile')) && !empty($this->request->getPost('user_subject')) && !empty($this->request->getPost('user_message'))) {
				$contactDB = new ContactsModel();
				$this->dataToInsert = [
					'user_name' => filter_var($this->request->getPost('user_name'), FILTER_SANITIZE_STRING),
					'user_email' => filter_var($this->request->getPost('user_email'), FILTER_SANITIZE_STRING),
					'user_mobile' => filter_var($this->request->getPost('user_mobile'), FILTER_SANITIZE_NUMBER_INT),
					'user_subject' => filter_var($this->request->getPost('user_subject'), FILTER_SANITIZE_STRING),
					'user_message' => filter_var($this->request->getPost('user_message'), FILTER_SANITIZE_STRING),
				];

				$query = $contactDB->insert($this->dataToInsert);

				if ($query) {
					$respose = array(
						'status' => 'success',
						'class' => 'success',
						'message' => 'Query has been submitted successfully, we will get back to you soon.',
					);
					$session->setFlashdata('responseMessage', $respose);
				} else {
					$respose = array(
						'status' => 'failed',
						'class' => 'danger',
						'message' => 'There has been some error, please try again after some time.',
					);
					$session->setFlashdata('responseMessage', $respose);
				}
			} else {
				$respose = array(
					'status' => 'failed',
					'class' => 'danger',
					'message' => 'Please fill all the fields.',
				);
				$session->setFlashdata('responseMessage', $respose);
			}
			$this->data['statusMessage'] = $session->getFlashdata('responseMessage');
		}

		return view('Frontend/pages/contact_us', $this->data);
	}
	public function terms_of_use()
	{
		$pagedata = [
			'pagename' => 'Terms and Conditions'
		];
		$postMeta = new MetaTags();
		$postMeta->title = 'Terms And Conditions';
		$this->data['meta'] = $postMeta;
		$this->data['pagedata'] = $pagedata;
		// $testimonialsDB = new TestimonialsModel();
		// $this->data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();

		// return print_r($this->data);

		// $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $this->data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $this->data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/pages/terms_of_use', $this->data);
	}
	public function aboutus()
	{
		$pagedata = [
			'pagename' => 'ABOUT US'
		];
		$postMeta = new MetaTags();
		$teamsDb = new TeamModel();
		$postMeta->title = 'About Us';
		$this->data['meta'] = $postMeta;
		$this->data['pagedata'] = $pagedata;
		$this->data['team'] = $teamsDb->where('member_status', 1)->findAll();

		// $testimonialsDB = new TestimonialsModel();
		// $this->data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();

		// return print_r($this->data);

		// $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $this->data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $this->data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/pages/about_us', $this->data);
	}
	public function privacy_policy()
	{
		$pagedata = [
			'pagename' => 'Privacy Policy'
		];
		$postMeta = new MetaTags();
		$postMeta->title = 'Privacy Policy';
		$this->data['meta'] = $postMeta;
		$this->data['pagedata'] = $pagedata;
		// $testimonialsDB = new TestimonialsModel();
		// $this->data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();

		// return print_r($this->data);

		// $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $this->data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $this->data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/pages/privacy_policy', $this->data);
	}
	public function partner_with_us()
	{
		$pagedata = [
			'pagename' => 'Partner With Us<br><small><small><small><small>Let’s work together</small></small></small></small>'
		];
		$postMeta = new MetaTags();
		$postMeta->title = 'Partner With Us';
		$this->data['meta'] = $postMeta;
		$this->data['pagedata'] = $pagedata;
		$session = session();
		if ($this->request->getMethod() == 'post') {

			// print_r($this->request->getVar());
			// return;
			if (!empty($this->request->getPost('name')) && !empty($this->request->getPost('email')) && !empty($this->request->getPost('mobile')) && !empty($this->request->getPost('organization')) && !empty($this->request->getPost('message')) && !empty($this->request->getPost('expertise'))) {
				$partnerModel = new PartnerwithusModel();
				// $this->dataToInsert = [
				// 	'user_name' => filter_var($this->request->getPost('n'), FILTER_SANITIZE_STRING),
				// 	'user_email' => filter_var($this->request->getPost('user_email'), FILTER_SANITIZE_STRING),
				// 	'user_mobile' => filter_var($this->request->getPost('user_mobile'), FILTER_SANITIZE_NUMBER_INT),
				// 	'user_subject' => filter_var($this->request->getPost('user_subject'), FILTER_SANITIZE_STRING),
				// 	'user_message' => filter_var($this->request->getPost('user_message'), FILTER_SANITIZE_STRING),
				// ];
				$thisData = $this->request->getVar();
				foreach ($thisData as $key => $value) {
					if($key == 'mobile') {
						$thisData[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
					} else if($key == 'expertise') {
						$thisData[$key] = json_encode($value);
					} else {
						$thisData[$key] = filter_var($value, FILTER_SANITIZE_STRING);
					}
				}
				// print_r($thisData);
				// return;

				$query = $partnerModel->insert($thisData);

				if ($query) {
					$respose = array(
						'status' => 'success',
						'class' => 'success',
						'message' => 'Query has been submitted successfully, we will get back to you soon.',
					);
					$session->setFlashdata('responseMessage', $respose);
				} else {
					$respose = array(
						'status' => 'failed',
						'class' => 'danger',
						'message' => 'There has been some error, please try again after some time.',
					);
					$session->setFlashdata('responseMessage', $respose);
				}
			} else {
				$respose = array(
					'status' => 'failed',
					'class' => 'danger',
					'message' => 'Please fill all the fields.',
				);
				$session->setFlashdata('responseMessage', $respose);
			}
			$this->data['statusMessage'] = $session->getFlashdata('responseMessage');
		}

		return view('Frontend/pages/partner_with_us', $this->data);
	}
}
