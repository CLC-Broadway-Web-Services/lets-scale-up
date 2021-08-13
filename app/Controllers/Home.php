<?php

namespace App\Controllers;
use App\Models\Globals\FrontservicesModel;

class Home extends BaseController
{
	public function index()
	{
		$servicesDB = new FrontservicesModel();
		$services = $servicesDB->getAllHomepageServices();
		// return print_r($services);
		$data['services'] = $services;

		$data['pageJSbefore'] = '<script src="/public/assets/js/typed.js"></script>';
		return view('Frontend/pages/homepage', $data);
	}

	//--------------------------------------------------------------------

}
