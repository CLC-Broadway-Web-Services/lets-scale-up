<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\OrderModel;
use App\Models\Admin\ServicepackagesModel;
use App\Models\Admin\ServiceQuery;
use App\Models\Admin\ServicesModel;

class PaymentController extends BaseController
{
	private $session;
	private $order_md;
	private $service_md;
	private $package_md;
	private $queries_md;
	public function __construct()
	{
		$this->session = session();
		$this->data['user'] = $this->session->get('user');
		$this->order_md = new OrderModel();
		$this->service_md = new ServicesModel();
		$this->package_md = new ServicepackagesModel();
		$this->queries_md = new ServiceQuery();
		helper('file');
		helper('number');
		helper('form');
	}
	public function checkout($order_id)
	{
		$userid = $this->data['user']['id'];
		$order = $this->order_md->where('user_id', $userid)->find($order_id);
		if(!$order) {
			return redirect()->route('home_page');
		}
		$service = $this->service_md->select('service_id, service_title')->find($order['service_id']);
		$package = $this->package_md->find($order['package_id']);
		// $formsData = $this->queries_md->where(['unique_code' => $order['unique_id']])->findAll();

		$this->data['order'] = $order;
		$this->data['service'] = $service;
		$this->data['package'] = $package;
		// $this->data['formsData'] = $formsData;

		echo '<pre>';
		print_r($this->data);
		echo '</pre>';
		return;
	}
}
