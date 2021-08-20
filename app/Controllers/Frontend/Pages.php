<?php

namespace App\Controllers\Frontend;

use App\Models\Admin\ContactsModel;
use App\Models\Admin\ServicesModel;
use CodeIgniter\Controller;

use App\Models\Admin\TestimonialsModel;

class Pages extends Controller
{
	public function index()
	{
		// $servicesDB = new FrontservicesModel();
		// $services = $servicesDB->getAllHomepageServices();
		// return print_r($services);
		// $data['services'] = $services;

		$testimonialsDB = new TestimonialsModel();
		$servicesDb = new ServicesModel();
		$data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();
		$searchservices = $servicesDb->select('service_id, service_title, service_slug')->where(['service_status' => 1])->orderBy('service_title', 'asc')->findAll();
		$radom_services = $servicesDb->select('service_id, service_title, service_slug')->where(['service_status' => 1])->orderBy('service_title', 'RAND')->findAll(5);
		$data['searchservices'] = $searchservices;
		$data['radom_services'] = $radom_services;

		// return print_r($data);
		// $data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';
		// $data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		$data['pageJS'] = '<script src="/public/custom/assets/js/homepage.js"></script>';

		return view('Frontend/pages/homepage', $data);
	}
	public function initiatives()
	{
		$data = array();
		$pagedata = [
			'pagename' => 'INITIATIVES'
		];
		$data['pagedata'] = $pagedata;
		// $testimonialsDB = new TestimonialsModel();
		// $data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();

		// return print_r($data);

		// $data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/pages/initiatives', $data);
	}
	public function contact_us()
	{
		$data = array();
		$pagedata = [
			'pagename' => 'Contact Us'
		];
		$data['pagedata'] = $pagedata;
		$session = session();
		if ($this->request->getMethod() == 'post') {
			if (!empty($this->request->getPost('user_name')) && !empty($this->request->getPost('user_email')) && !empty($this->request->getPost('user_mobile')) && !empty($this->request->getPost('user_subject')) && !empty($this->request->getPost('user_message'))) {
				$contactDB = new ContactsModel();
				$dataToInsert = [
					'user_name' => filter_var($this->request->getPost('user_name'), FILTER_SANITIZE_STRING),
					'user_email' => filter_var($this->request->getPost('user_email'), FILTER_SANITIZE_STRING),
					'user_mobile' => filter_var($this->request->getPost('user_mobile'), FILTER_SANITIZE_NUMBER_INT),
					'user_subject' => filter_var($this->request->getPost('user_subject'), FILTER_SANITIZE_STRING),
					'user_message' => filter_var($this->request->getPost('user_message'), FILTER_SANITIZE_STRING),
				];

				$query = $contactDB->insert($dataToInsert);

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
			$data['statusMessage'] = $session->getFlashdata('responseMessage');
		}

		return view('Frontend/pages/contact_us', $data);
	}
	public function terms_of_use()
	{
		$data = array();
		$pagedata = [
			'pagename' => 'INITIATIVES'
		];
		$data['pagedata'] = $pagedata;
		// $testimonialsDB = new TestimonialsModel();
		// $data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();

		// return print_r($data);

		// $data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/pages/terms_of_use', $data);
	}
	public function aboutus()
	{
		$data = array();
		$pagedata = [
			'pagename' => 'ABOUT US'
		];
		$data['pagedata'] = $pagedata;
		// $testimonialsDB = new TestimonialsModel();
		// $data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();

		// return print_r($data);

		// $data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/pages/about_us', $data);
	}
	public function privacy_policy()
	{
		$data = array();
		$pagedata = [
			'pagename' => 'INITIATIVES'
		];
		$data['pagedata'] = $pagedata;
		// $testimonialsDB = new TestimonialsModel();
		// $data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();

		// return print_r($data);

		// $data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/pages/privacy_policy', $data);
	}
}
