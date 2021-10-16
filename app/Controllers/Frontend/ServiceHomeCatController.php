<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\ServiceHomeCatModel;

class ServiceHomeCatController extends BaseController
{
	protected $dbModel;
	protected $data;
	public function __construct()
	{
		$this->data = array();
		$this->data['admin'] = session()->get('admin');
		$this->dbModel = new ServiceHomeCatModel();
		helper('form', 'file');
	}
	public function index($slug)
	{
		$service = $this->dbModel->getServiceBySlug($slug);
		if($service['success']) {
			$this->data['service'] = $service['data'];
			// print_r();
			// personalized_services
			return view('Frontend/personalized_services/index', $this->data);
		}
		return redirect()->route('home_page');
	}
}
