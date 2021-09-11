<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Settings as AdminSettings;
use App\Models\Globals\UserModel;

class Settings extends BaseController
{
	protected $settings_md;
	protected $user_md;
	public function __construct()
	{
		$this->settings_md = new AdminSettings();
		$this->data['admin'] =  session()->get('admin');
		$this->user_md = new UserModel();
	}
	public function index()
	{
		$responseData = false;
		$this->settings_md->cacheSettings();
		$settings =  $this->settings_md->getSettings();
		$this->data['settings'] = $settings;
		$this->data['activeTab'] = false;
		$this->data['tabName'] = '';
		if (isset($_GET, $_GET['tab'])) {
			$this->data['activeTab'] = true;
			$this->data['tabName'] = $_GET['tab'];
		}
		if ($this->request->getMethod() == 'post') {
			// echo '<pre>';
			// print_r($this->request->getVar());
			// echo '</pre>';
			// return;
			$backResponse = [
				'success' => 0,
				'message' => '',
				'error' => 0,
				'key' => [],
			];


			// $keys = [];

			foreach ($this->request->getVar() as $key => $value) {
				// $keys[] = $key;
				$userId = $this->data['admin']['adm_id'];
				if ($value !== $settings[$key] && $value !== '') {
					$query = $this->settings_md->where(['set_key' => $key])->set(['set_value' => $value, 'update_by' => $userId])->update();
					// $query[] = ['site_key' => $key, 'site_value' => $value];
					if ($query) {
						$backResponse['success'] = 1;
						$backResponse['message'] = 'Succesfully updated records.';
						$backResponse['error'] = 0;
						$backResponse['key']['updated'][] = $key;
					} else {
						$backResponse['message'] = 'Query error.';
						$backResponse['error'] = 1;
						$backResponse['key']['QueryError'][] = $key;
					}
				} else {
					$backResponse['error'] = 2;
					$backResponse['key']['NotChanged'][] = $key;
				}
			}
			$this->data['backResponse'] = $backResponse;
			// echo '<pre>';
			// print_r($backResponse);
			// echo '</pre>';
			return redirect()->route('site_settings');
			// return json_encode(['success' => $successSave, 'query', $failedQuery]);
		}
		// $settingsKeys = [];
		// foreach ($settings as $value) {
		// 	$settingsKeys[] = $value['set_key'];
		// }
		// if(isset($this->data['backResponse'])) {
		// 	$responseData = true;
		// 	$responseData = $this->data['backResponse'];

		// 	$keysData = $responseData['key'];

		// 	foreach ($keysData['NotChanged'] as $value) {
		// 		if($settingsKeys == $value) {
		// 		}
		// 	}

		// } else {
		// 	$responseData = true;
		// 	$responseData = $this->data['backResponse'];
		// }
		// echo '<pre>';
		// print_r($this->settings);
		// echo '</pre>';
		// return;
		// $settings
		// $admin
		$this->data['pageJS'] = '<script src="/public/custom/assets/js/settings.js"></script>';
		return view('Administrator/Dashboard/settings', $this->data);
	}
}
