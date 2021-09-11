<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\OrderModel;
use App\Models\Admin\ServicepackagesModel;
use App\Models\Admin\ServiceQuery;
use App\Models\Admin\ServicesModel;
use App\Models\Globals\UserDocumentModel;
use App\Models\Globals\UserDocumentQueryModel;

class AccountController extends BaseController
{
	private $session;
	private $user_md;
	private $order_md;
	private $doc_query_md;
	private $doc_md;
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
		helper('file');
		helper('number');
		helper('form');
	}
	public function overview()
	{
		$orderData['content'] = 'You have no open orders right now.';
		$orderData['counts'] = 0;

		$docQueryData['content'] = 'There are no Queries in uploaded document.';
		$docQueryData['counts'] = 0;

		$docPendingData['content'] = 'There are no Documents pending in your Order.';
		$docPendingData['counts'] = 0;

		$docUploadData['content'] = 'There are no uploaded documents.';
		$docUploadData['counts'] = 0;
		// MODELS (getting numbers only)
		/// orders
		/// queries in subscribed plan (chat / inbox system for)
		/// queries in uplloaded documents (chat / inbox system for)
		/// pending documents
		/// all uplloaded documents
		// return print_r($this->session->get('user.id'));

		// each order have a chatroom

		// max 5 last subscriptions only or no subsctiption message
		$orderData = [];
		$userid = $this->data['user']['id'];
		$openOrders = $this->order_md->where(['user_id' => $userid, 'status' => 0])->countAll();
		if ($openOrders > 0) {
			$orderData['content'] = 'You have ' . $openOrders . ' open orders, please complete it. ';
			$orderData['counts'] = $openOrders;
		}
		$docQuery = $this->doc_query_md->where(['user_id' => $userid, 'status' => 0, 'is_user' => 0])->countAll();
		if ($docQuery > 0) {
			$docQueryData['content'] = 'There are ' . $docQuery . ' Queries in uploaded documents. ';
			$docQueryData['counts'] = $docQuery;
		}
		$pendingDocQuery = $this->doc_query_md->where(['user_id' => $userid, 'status' => 0, 'is_user' => 0, 'query_type' => 'pending'])->countAll();
		if ($pendingDocQuery > 0) {
			$docPendingData['content'] = 'There are ' . $pendingDocQuery . ' Documents pending in your Order. ';
			$docPendingData['counts'] = $pendingDocQuery;
		}

		$uploadDocQuery = $this->doc_md->where(['user_id' => $userid])->countAll();
		if ($uploadDocQuery > 0) {
			$docUploadData['content'] = 'There are ' . $uploadDocQuery . ' uploaded documents. ';
			$docUploadData['counts'] = $uploadDocQuery;
		}

		$mySubscriptions = array();

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
				'url' => route_to('account_doc_query') . '?type=unread'
			],
			[
				'icon' => 'files-alt',
				'title' => 'Pending Documents',
				'content' => $docPendingData['content'],
				'counts' => $docPendingData['counts'],
				'url' => route_to('account_doc_query') . '?type=pending'
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
		//
		return view('Frontend/account/orders');
	}
	public function documents()
	{
		//
		return view('Frontend/account/documents');
	}
	public function legalForms()
	{
		//
		return view('Frontend/account/legalForms');
	}
	public function personalInfo()
	{
		// personal info
		return view('Frontend/account/personalInfo');
	}
	public function passwordChange()
	{
		// password change
		return view('Frontend/account/passwordChange');
	}
	public function paymentHistory()
	{
		// payment history
		return view('Frontend/account/paymentHistory');
	}
	public function feedback()
	{
		// feedback on current subscribed services
		return view('Frontend/account/feedback');
	}
}
