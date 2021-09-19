<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Admin\ChatNotificationModel;
use App\Models\Admin\OrderModel;
use App\Models\Admin\ServicepackagesModel;
use App\Models\Admin\ServiceQuery;
use App\Models\Admin\ServicesModel;
use App\Models\Globals\UserDocumentModel;
use App\Models\Globals\UserDocumentQueryModel;
use App\Models\Globals\UserSubscriptionModel;
use App\Models\Globals\UserSubscriptionQueryModel;
use CodeIgniter\I18n\Time;

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
	private $chat_messages;
	private $subscription_query_md;
	public function __construct()
	{
		$this->session = session();
		$this->data['user'] = $this->session->get('user');
		$this->data['time'] = new Time;
		$this->order_md = new OrderModel();
		$this->doc_query_md = new UserDocumentQueryModel();
		$this->doc_md = new UserDocumentModel();
		$this->service_md = new ServicesModel();
		$this->package_md = new ServicepackagesModel();
		$this->form_submit_md = new ServiceQuery();
		$this->subscription_md = new UserSubscriptionModel();
		$this->subscription_query_md = new UserSubscriptionQueryModel();
		$this->chat_messages = new ChatNotificationModel();
		helper('file');
		helper('number');
		helper('form');
	}
	public function index()
	{
		$userid = $this->data['user']['id'];
		
		$this->subscription_md->select('usersubscriptions.*, services.service_title');
		$this->subscription_md->join('services', 'services.service_id = usersubscriptions.service_id');
		$this->subscription_md->where(['usersubscriptions.user_id' => $userid]);
		$allSubscriptions = $this->subscription_md->findAll();

		// echo '<pre>';
		// print_r($allSubscriptions);
		// echo '</pre>';
		// return;


		// $allSubscriptions = $this->subscription_md->where(['user_id' => $userid])->findAll();
		$this->data['allSubscriptions'] = $allSubscriptions;

		return view('Frontend/account/subscriptions', $this->data);
	}
	public function subscription($uniqueId = null)
	{
		$subscription = $this->subscription_md->where(['unique_id' => $uniqueId])->first();
		$documents = $this->doc_md->where('subscription_id', $subscription['id'])->findAll();
		$submitted_details = $this->form_submit_md->where('unique_code', $subscription['unique_id'])->findAll();
		$messages = $this->chat_messages->where('inbox_id', $subscription['inbox_id'])->orderBy('id', 'ASC')->findAll();

		foreach ($messages as $key => $chat) {
			if($chat['is_notification'] && $chat['table_name'] && $chat['entity_id'] > 0) {
				if($chat['table_name'] == 'documents') {
					$entity_data = $this->doc_query_md->find($chat['entity_id']);
					$messages[$key]['entity_data'] = $entity_data;
				}
			}
		}

		$this->data['subscription'] = $subscription;
		$this->data['documents'] = $documents;
		$this->data['submitted_details'] = $submitted_details;
		$this->data['messages'] = $messages;


		// echo '<pre>';
		// print_r($this->data);
		// echo '</pre>';
		// return;
		return view('Frontend/account/single_subscription', $this->data);
	}
}
