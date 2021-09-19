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
use Konekt\PdfInvoice\InvoicePrinter;

class AccountController extends BaseController
{
	private $session;
	private $user_md;
	private $order_md;
	private $doc_query_md;
	private $doc_md;
	private $subscription_md;
	private $service_md;
	private $package_md;
	private $queries_md;
	public function __construct()
	{
		$this->session = session();
		$this->data['user'] = $this->session->get('user');
		$this->order_md = new OrderModel();
		$this->doc_query_md = new UserDocumentQueryModel();
		$this->doc_md = new UserDocumentModel();
		$this->service_md = new ServicesModel();
		$this->package_md = new ServicepackagesModel();
		$this->queries_md = new ServiceQuery();
		$this->subscription_md = new UserSubscriptionModel();
		helper('file');
		helper('number');
		helper('form');
	}
	public function overview()
	{
		$orderData = [];
		$docQueryData = [];
		$docPendingData = [];
		$docUploadData = [];

		$orderData['content'] = 'You have no open orders right now.';
		$orderData['counts'] = 0;

		$docQueryData['content'] = 'There are no Queries in uploaded document.';
		$docQueryData['counts'] = 0;

		$docPendingData['content'] = 'There are no Documents pending in your Order.';
		$docPendingData['counts'] = 0;

		$docUploadData['content'] = 'There are no uploaded documents.';
		$docUploadData['counts'] = 0;

		// each order have a chatroom

		// max 5 last subscriptions only or no subsctiption message
		$userid = $this->data['user']['id'];
		$openOrders = $this->order_md->where(['user_id' => $userid, 'status' => 0, 'status_name !=' => 'success'])->countAllResults();
		if ($openOrders > 0) {
			$ordersWord = 'Orders';
			if($openOrders == 1) {
				$ordersWord = 'Order';
			}
			$orderData['content'] = 'You have ' . $openOrders . ' open '.$ordersWord.', please complete it. ';
			$orderData['counts'] = $openOrders;
		}
		$docQuery = $this->doc_query_md->where(['user_id' => $userid, 'status' => 0, 'is_user' => 0])->countAllResults();
		if ($docQuery > 0) {
			$queryWord = 'Queries';
			if($docQuery == 1) {
				$queryWord = 'Query';
			}
			$docQueryData['content'] = 'There are ' . $docQuery . $queryWord .' in uploaded documents. ';
			$docQueryData['counts'] = $docQuery;
		}
		$pendingDocQuery = $this->doc_query_md->where(['user_id' => $userid, 'status' => 0, 'is_user' => 0, 'query_type' => 'pending'])->countAllResults();
		if ($pendingDocQuery > 0) {
			$queryWord = 'Documents';
			if($pendingDocQuery == 1) {
				$queryWord = 'Document';
			}
			$docPendingData['content'] = 'There are ' . $pendingDocQuery . $queryWord .' pending in your Order. ';
			$docPendingData['counts'] = $pendingDocQuery;
		}

		$uploadDocQuery = $this->doc_md->where(['user_id' => $userid])->countAllResults();
		if ($uploadDocQuery > 0) {
			$queryWord = 'documents';
			if($uploadDocQuery == 1) {
				$queryWord = 'documents';
			}
			$docUploadData['content'] = 'There are ' . $uploadDocQuery . ' uploaded '.$queryWord.'. ';
			$docUploadData['counts'] = $uploadDocQuery;
		}

		$activeSubscriptions = $this->subscription_md->where(['user_id' => $userid, 'status' => 1])->countAllResults();
		$this->data['activeSubscriptions'] = $activeSubscriptions;

		$overviewData = array(
			[
				'icon' => 'file-text',
				'title' => 'Open Order',
				'content' => $orderData['content'],
				'counts' => $orderData['counts'],
				'url' => route_to('account_orders')
			],
			[
				'icon' => 'chat-quote',
				'title' => 'Queries in Uploaded Document.',
				'content' => $docQueryData['content'],
				'counts' => $docQueryData['counts'],
				'url' => route_to('account_doc_queries') . '?type=unread'
			],
			[
				'icon' => 'files-alt',
				'title' => 'Pending Documents',
				'content' => $docPendingData['content'],
				'counts' => $docPendingData['counts'],
				'url' => route_to('account_doc_queries') . '?type=pending'
			],
			[
				'icon' => 'file-post',
				'title' => 'Your Documents',
				'content' => $docUploadData['content'],
				'counts' => $docUploadData['counts'],
				'url' => route_to('account_documents')
			],
		);

		$this->data['overview'] = $overviewData;

		return view('Frontend/account/overview', $this->data);
	}
	public function orders()
	{
		$userid = $this->data['user']['id'];
		// $orders = $this->order_md->where(['user_id' => $userid])->findAll();
		// if ($orders) {
		// 	foreach ($orders as $key => $order) {
		// 		$service_id = $order['service_id'];
		// 		$service = $this->service_md->select('service_title')->find($service_id);
		// 		$orders[$key]['service_title'] = $service['service_title'];
		// 	}
		// }
		$this->order_md->select('orders.*, services.service_title');
		$this->order_md->join('services', 'services.service_id = orders.service_id');
		$this->order_md->where(['orders.user_id' => $userid]);
		$orders = $this->order_md->findAll();

		$this->data['orders'] = $orders;

		// echo '<pre>';
		// print_r($this->data);
		// echo '</pre>';
		// return;
		//
		return view('Frontend/account/orders', $this->data);
	}
	public function order_invoice($order_id = null)
	{
		// if (!$order_id) {
		// 	return redirect()->route('account_orders');
		// }
		$userid = $this->data['user']['id'];
		$orders = $this->order_md->find($order_id);
		if (!count($orders)) {
			return redirect()->route('account_orders');
		}
		$order = $orders[0];
		
		echo '<pre>';
		print_r($order);
		echo '</pre>';
		return;
		$invoice = new InvoicePrinter('A4', "Rs. ", 'en');
		$invoice->setLogo("public/assets/images/logo.jpg");   //logo image path
		$invoice->setColor("#007fff");      // pdf color scheme
		$invoice->setType("Sale Invoice");    // Invoice Type
		$invoice->setReference($order['unique_id']);   // Reference
		$invoice->setDate(date('M dS ,Y', strtotime($order['created_at'])));   //Billing Date
		$invoice->setTime(date('h:i:s A', strtotime($order['updated_at'])));   //Billing Time
		// $invoice->setDue(date('M dS ,Y', strtotime('+3 months')));    // Due Date
		$invoice->setFrom(array("Seller Name", "Sample Company Name", "128 AA Juanita Ave", "Glendora , CA 91740"));
		$invoice->setTo(array("Purchaser Name", "Sample Company Name", "128 AA Juanita Ave", "Glendora , CA 91740"));

		$invoice->addItem("AMD Athlon X2DC-7450", "2.4GHz/1GB/160GB/SMP-DVD/VB", 6, 0, 580, 0, 3480);

		$invoice->addTotal("Total", 9460);
		$invoice->addTotal("VAT 21%", 1986.6);
		$invoice->addTotal("Total due", 11446.6, true);

		$invoice->addBadge("Payment Paid");

		$invoice->addTitle("Important Notice");

		$invoice->addParagraph("No item will be replaced or refunded if you don't have the invoice with you.");

		$invoice->setFooternote("My Company Name Here");

		$invoice->render('example1.pdf', 'D');
	}
	public function documents()
	{
		$userid = $this->data['user']['id'];
		// $documents = $this->doc_md->where(['user_id' => $userid])->findAll();

		$this->doc_md->select('*');
		$this->doc_md->join('usersubscriptions', 'usersubscriptions.id = userdocuments.subscription_id');
		$this->doc_md->where(['userdocuments.user_id' => $userid]);
		$query = $this->doc_md->findAll();

		// $this->data['documents'] = $documents;
		echo '<pre>';
		print_r($query);
		echo '</pre>';
		return;
		//
		return view('Frontend/account/documents', $this->data);
	}
	public function documentQuery($doc_id)
	{
		if (!$doc_id) {
			return redirect()->route('account_documents');
		}
		$userid = $this->data['user']['id'];
		$documents = $this->doc_md->where(['user_id' => $userid])->findAll();
		//
		return view('Frontend/account/documents', $this->data);
	}
	public function legalForms()
	{
		//
		return view('Frontend/account/legalForms', $this->data);
	}
	public function personalInfo()
	{
		// personal info
		return view('Frontend/account/personalInfo', $this->data);
	}
	public function passwordChange()
	{
		// password change
		return view('Frontend/account/passwordChange', $this->data);
	}
	public function paymentHistory()
	{
		// payment history
		return view('Frontend/account/paymentHistory', $this->data);
	}
	public function feedback()
	{
		// feedback on current subscribed services
		return view('Frontend/account/feedback', $this->data);
	}
}
