<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\OrderModel;
use App\Models\Admin\ServicepackagesModel;
use App\Models\Admin\ServiceQuery;
use App\Models\Admin\ServicesModel;
use App\Models\Globals\UserDocumentModel;
use App\Models\Globals\UserDocumentQueryModel;
use App\Models\Globals\UserSubscriptionModel;
use App\Models\Globals\UserSubscriptionQueryModel;

class SubscriptionsController extends BaseController
{
	private $session;
	private $user_md;
	private $order_md;
	private $doc_query_md;
	private $doc_md;
	private $service_md;
	private $package_md;
	private $form_submit_md;
	private $subscription_md;
	private $subscription_query_md;
	public function __construct()
	{
		$this->session = session();
		$this->data['user'] = $this->session->get('user');
		$this->order_md = new OrderModel();
		$this->doc_query_md = new UserDocumentQueryModel();
		$this->doc_md = new UserDocumentModel();
		$this->service_md = new ServicesModel();
		$this->package_md = new ServicepackagesModel();
		$this->form_submit_md = new ServiceQuery();
		$this->subscription_md = new UserSubscriptionModel();
		$this->subscription_query_md = new UserSubscriptionQueryModel();
		helper('file');
		helper('number');
		helper('form');
	}
	public function index()
	{
	}
	public function subscription($id = null)
	{
	}
}
