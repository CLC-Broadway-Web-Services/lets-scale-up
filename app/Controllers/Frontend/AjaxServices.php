<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Globals\NewsletterModel;
use App\Models\Globals\UserModel;
use App\Models\TempServiceQuery;

class AjaxServices extends BaseController
{
	public function newsletterSubscription()
	{
		$postData = $this->request->getVar();
		// return json_encode($postData);
		$name = $postData['username'];
		$email = $postData['useremail'];

		$subscriptionData = [
			'subscription_id' => 1,
			'user_name' => $name,
			'user_email' => $email
		];
		$returnResponse = [
			'status' => true,
			'class' => 'success',
			'message' => 'You have subscribed successfully.'
		];

		$subscriptionDb = new NewsletterModel();

		$oldSubscription = $subscriptionDb->where(['user_email' => $email, 'subscription_id' => 1])->first();

		$userTable = new UserModel();
		$user = $userTable->where(['email' => $email])->first();
		if ($user) {
			if (session()->get('isUserLoggedin')) {
				$userId = session()->get('user.id');
				if ($userId == $user->id) {
					$subscriptionData['user_id'] = $user->id;
					$subscriptionData['user_name'] = $user->name;
					if ($oldSubscription) {
						if ($oldSubscription['status'] == 0) {
							// change status here
							$query = $subscriptionDb->set(['status' => 1])->update($oldSubscription['id']);
							$returnResponse['message'] = 'You Re-Subscribed our newsletter successfully.';
							if (!$query) {
								$returnResponse['status'] = false;
								$returnResponse['class'] = 'danger';
								$returnResponse['message'] = 'There is some error on your newsletter subscription, please try again later.';
							}
						} else {
							$returnResponse['class'] = 'info';
							$returnResponse['message'] = 'You already have subscription on this newsletter.';
						}
					} else {
						$query = $subscriptionDb->save($subscriptionData);
						if (!$query) {
							$returnResponse['status'] = false;
							$returnResponse['class'] = 'danger';
							$returnResponse['message'] = 'There is some error on your newsletter subscription, please try again later.';
						}
					}
				} else {
					$returnResponse['status'] = false;
					$returnResponse['class'] = 'danger';
					$returnResponse['message'] = 'You are not allowed to subscribe to another email except yours.';
				}
			} else {
				$returnResponse['status'] = false;
				$returnResponse['class'] = 'danger';
				$returnResponse['message'] = 'Please login into your account to subscribe.';
			}
			// print_r($returnResponse);
			// return;
			return json_encode($returnResponse);
		}

		if ($oldSubscription) {
			if ($oldSubscription['status'] == 0) {
				// change status here
				$query = $subscriptionDb->set(['status' => 1])->update($oldSubscription['id']);
				$returnResponse['message'] = 'You Re-Subscribed our newsletter successfully.';
				if (!$query) {
					$returnResponse['status'] = false;
					$returnResponse['class'] = 'danger';
					$returnResponse['message'] = 'There is some error on your newsletter subscription, please try again later.';
				}
			} else {
				$returnResponse['class'] = 'info';
				$returnResponse['message'] = 'You already have subscription on this newsletter.';
			}
		} else {
			$query = $subscriptionDb->save($subscriptionData);
			if (!$query) {
				$returnResponse['status'] = false;
				$returnResponse['class'] = 'danger';
				$returnResponse['message'] = 'There is some error on your newsletter subscription, please try again later.';
			}
		}
		// print_r($returnResponse);
		// return;
		return json_encode($returnResponse);
	}
	public function serviceQuery()
	{
		if ($this->request->getVar('service_getstarted_form')) {
			// return json_encode($_POST);
			$query_md = new TempServiceQuery();
			$dataToSave = [
				'email' => $this->request->getVar('email'),
				'first_name' => $this->request->getVar('first_name'),
				'last_namme' => $this->request->getVar('last_namme'),
				'phone' => $this->request->getVar('phone'),
				'service_id' => $this->request->getVar('service_id'),
				'service_name' => $this->request->getVar('service_name'),
			];
			$saveQuery = $query_md->save($dataToSave);

			// send email here


			$name = $this->request->getVar('first_name') . ' ' . $this->request->getVar('last_namme');
			$userEmail = $this->request->getVar('email');
			$phone = $this->request->getVar('phone');
			$service_name = $this->request->getVar('service_name');

			$userMessage = 'Thank you ' . $name . "<br>" . 'We will be back to you soon!' . "<br><br>" . 'Team' . "<br>" . 'Lets Scale Up.';
			$userMessageText = 'Thank you ' . $name . "\n\n" . 'We will be back to you soon!' . "\n\n" . "\n\n" . 'Team' . "\n\n" . 'Lets Scale Up.';

			$this->sendEmail($userEmail, 'Thank you', $userMessage, $userMessageText);


			$subject = 'Service Enquiry';
			$message = 'Name: ' . $name . "<br>" . 'Email: ' . $userEmail . "<br>" . 'Phone: ' . $phone . "<br>" . 'Service: ' . $service_name;
			$messageText = 'Name: ' . $name . "\n\n" . 'Email: ' . $userEmail . "\n\n" . 'Phone: ' . $phone . "\n\n" . 'Service: ' . $service_name;
			$this->sendEmail(GMAIL, $subject, $message, $messageText);

			if ($saveQuery) {
				return json_encode(true);
			}
			return json_encode(false);
		}
		return json_encode(false);
	}

	function sendEmail($to, $subject, $message, $textMessage = '')
	{
		$email = \Config\Services::email();

		$config['protocol'] = 'mail';
		$config['charset']  = 'iso-8859-1';
		$config['mailType'] = 'html';

		$email->initialize($config);

		$email->setFrom(NO_REPLY_EMAIL, APP_NAME);
		$email->setTo($to);
		$email->setSubject($subject);
		$email->setMessage($message);
		if ($textMessage) {
			$email->setAltMessage($textMessage);
		}

		$email->send();
		$email->clear(true);
		return true;
	}
}
