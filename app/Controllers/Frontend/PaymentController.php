<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\InboxModel;
use App\Models\Admin\OrderModel;
use App\Models\Admin\ServicepackagesModel;
use App\Models\Admin\ServiceQuery;
use App\Models\Admin\ServicesModel;
use App\Models\Globals\UserSubscriptionModel;

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
		if (!$order) {
			return redirect()->route('home_page');
		}
		$service = $this->service_md->select('service_id, service_title')->find($order['service_id']);
		$package = $this->package_md->find($order['package_id']);
		// $formsData = $this->queries_md->where(['unique_code' => $order['unique_id']])->findAll();

		$this->data['order'] = $order;
		$this->data['service'] = $service;
		$this->data['package'] = $package;
		// $this->data['formsData'] = $formsData;

		if ($this->request->getMethod() == 'post') {
			// echo '<pre>';
			// print_r($this->request->getVar('razorpay_payment_id'));
			// echo '</pre>';
			// return;
			$returnData = [
				'status' => false,
				'reason' => 'Request not completed yet, please contact Lets Scale Up regarding your issue, and show this order id = ' . $order['online_order_id']
			];
			if ($this->request->getVar('razorpay_payment_id')) {
				$data = [
					'online_transaction_id' => $this->request->getVar('razorpay_payment_id'),
					'status' => 2,
					'status_name' => 'success'
				];
				$orderSet = $this->order_md->update($order_id, $data);
				// after updating start an subscription along with creating new inbox.
				$subscription_md = new UserSubscriptionModel();
				$inbox_md = new InboxModel();
				$inboxData = [
					'order_id' => $order['id'],
					'user_id' => $order['user_id'],
					'inbox_type' => 'service_md',
					'entity_id' => $order['service_id'],
				];
				$lastInboxId = $inbox_md->getInsertID($inbox_md->save($inboxData));
				$subsData = [
					'status' => 1,
					'service_id' => $order['service_id'],
					'user_id' => $order['user_id'],
					'inbox_id' => $lastInboxId
				];
				$subscription_md->save($subsData);
				if ($orderSet) {
					$returnData['status'] = true;
				} else {
					$returnData['reason'] = 'Payment done, but there is some issue into the server, please contact Lets Scale Up regarding your issue, and show this order id = ' . $order['online_order_id'];
				}
				session()->setFlashdata('invoiceError', $returnData);
				return redirect()->route('order_invoice', [$order_id]);
			}
			$this->data['errorData'] = $returnData;
		}

		// echo '<pre>';
		// print_r($this->data);
		// echo '</pre>';
		// return;

		$this->data['pageJS'] = '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';
		return view('Frontend/payment/checkout', $this->data);
	}
}
