<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\ProjectsModel;
use App\Models\Client\ClientModel;

class Clients extends BaseController
{
	protected $clients_md;
	public function __construct()
	{
		$this->clients_md = new ClientModel();
	}
	public function index()
	{
		$clients = $this->clients_md->getAllClientsFrontend();
		$this->data['clients'] = $clients['clients'];
		$this->data['pager'] = $clients['pager'];

		return view('Frontend/clients/index', $this->data);
	}
	public function single($slug = '')
	{
		if ($slug == null) {
			return redirect()->to(route_to('clients_page'));
		}
		$client = $this->clients_md->getSingleClient($slug);
		if(!$client) {
			return redirect()->to(route_to('clients_page'));
		}
		$this->data['client'] = $client;

		// echo '<pre>';
		// print_r($this->data);
		// echo '</pre>';

		// return;

		// $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $this->data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $this->data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/clients/single', $this->data);
	}
}
