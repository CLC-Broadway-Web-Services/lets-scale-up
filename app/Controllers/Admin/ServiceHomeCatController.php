<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ServiceHomeCatModel;
use App\Models\Admin\ServicesModel;

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
	public function index()
	{
		// return print_r($this->dbModel->getAllForMenu());
		$this->data['services'] = $this->dbModel->orderBy('id', 'desc')->findAll();
		return view('Administrator/Dashboard/others/personalizedServices', $this->data);
	}
	public function addEditService($service_id = 0)
	{
		$thisData = array();

		$icons = file_get_contents('./public/custom/assets/js/bootstrap-icons.json');
		$iconsDecoded = json_decode($icons);
		$iconsArray = array($iconsDecoded);

		if ($service_id == 0) {
			$thisData = [
				'id' => 0,
				'title' => '',
				'slug' => '',
				'sub_title' => '',
				'icon' => '',
				'color' => '',
				'image' => '',
				'video' => '',
				'sub_content' => '',
				'services' => '',
				'status' => 0,
			];
		} else {
			$thisData = $this->dbModel->find($service_id);
		}
		$thisData['services'] = json_decode($thisData['services']);
		$this->data['thisData'] = $thisData;
		$serviceDb = new ServicesModel();
		$this->data['services'] = $serviceDb->where('service_status', 1)->findAll();
		$this->data['icons'] = $iconsArray[0];

		// add edit post request
		if ($this->request->getMethod() == 'post') {
			$thisData = $this->request->getVar();
			$thisData['services'] = json_encode($this->request->getVar('services'));

			if ($this->request->getFile('image')) {
				$img = $this->request->getFile('image');
				$imagePath = $this->uploadImage($img);
				if ($imagePath) {
					$thisData['image'] = $imagePath;
				}
			}
			if ($service_id == 0) {
				unset($thisData['id']);
			} else {
				$thisData['id'] = $service_id;
			}
			$query = $this->dbModel->save($thisData);
			if ($query) {
				return redirect()->to('/administrator/personalized');
			} else {
				if ($service_id == 0) {
					$this->data['errorMessage'] = 'Unable to save, there is an issue';
					return redirect()->to('/administrator/personalized/add');
				} else {
					$this->data['errorMessage'] = 'Unable to save, there is an issue';
					return redirect()->to('/administrator/personalized/edit/' . $service_id);
				}
			}

			// if ($service_id == 0) {
			// 	$query = $this->client_md->save($thisData);
			// 	if ($query['status'] == 'success') {
			// 		return redirect()->to('/administrator/personalized');
			// 	} else {
			// 		$this->data['errorMessage'] = $query['message'];
			// 		return redirect()->to('/administrator/personalized/add');
			// 	}
			// } else {
			// 	$query = $this->client_md->addEditClient($thisData);
			// 	if ($query['status'] == 'success') {
			// 		return redirect()->to('/administrator/personalized');
			// 	} else {
			// 		$this->data['errorMessage'] = $query['message'];
			// 		return redirect()->to('/administrator/personalized/edit/' . $service_id);
			// 	}
			// }
		}

		// return print_r($thisData);
		$this->data['pageCSS'] = '<link rel="stylesheet" href="/public/dashboard/assets/css/editors/tinymce.css?ver=2.2.0">
        <link href="/public/assets/css/bootstrap-icons.css" rel="stylesheet" type="text/css" />';

		$this->data['pageJS'] = '<script src="/public/dashboard/assets/js/libs/editors/tinymce.js?ver=2.2.0"></script>
        <script src="/public/dashboard/assets/js/editors.js?ver=2.2.0"></script>';

		return view('Administrator/Dashboard/others/addEditPersonalizedService', $this->data);
	}
	private function uploadImage($file)
	{
		$img = $file;
		if ($img->isValid() && !$img->hasMoved()) {
			$newName = $img->getRandomName();
			$imageLocation = 'personalized_service/' . date('dMY');
			$img->move($imageLocation, $newName);
			return '/' . $imageLocation . '/' . $newName;
		}
		return false;
	}
	public function serviceStatusChange($service_id)
	{
		$query = $this->dbModel->changeStatus($service_id);
		if ($query['status'] == 'success') {
		} else {
			$message = array(
				'serviceStatusMessage' => $query['message']
			);
			session()->setFlashdata($message);
		}
		return redirect()->route('personalized_service_index');
	}
}
