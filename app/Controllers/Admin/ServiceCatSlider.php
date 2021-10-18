<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ServiceCategoryModel;
use App\Models\Admin\ServiceCategorySlider;

class ServiceCatSlider extends BaseController
{
	protected $dbModel;
	protected $data;

	public function __construct()
	{
		$this->data = array();
		$this->dbModel = new ServiceCategorySlider();
	}
	public function index()
	{
		$this->data['slides'] = $this->dbModel->orderBy('id', 'desc')->findAll();
		foreach ($this->data['slides'] as $key => $slide) {
			$catMd = new ServiceCategoryModel();
			$category = $catMd->select('name')->find($slide['category_id']);
			$this->data['slides'][$key]['category'] = $category['name'];
		}
		// print_r($this->data);
		// return;
		return view('Administrator/Dashboard/services/sliders', $this->data);
	}
	public function addEdit($id = 0)
	{
		if ($id == 0) {
			$slider = [
				'id' => 0,
				'category_id' => 0,
				'image' => '',
				'title' => '',
				'content' => '',
				'status' => 0
			];
		} else {
			$slider = $this->dbModel->find($id);
		}
		$catMd = new ServiceCategoryModel();
		$categories =  $catMd->select('id, name, parent')->where(['parent' => 0])->orderBy('id', 'asc')->findAll();
		$this->data['slider'] = $slider;
		$this->data['categories'] = $categories;
		

		if ($this->request->getMethod() == 'post') {

			// return print_r($this->request->getVar());

			$thisData = $this->request->getVar();

			if ($this->request->getFile('image')) {
				$img = $this->request->getFile('image');
				$imagePath = $this->uploadImage($img);
				if ($imagePath) {
					$thisData['image'] = $imagePath;
				}
			}

			if ($id != 0) {
				$thisData['id'] = $id;
			}
			$query = $this->dbModel->save($thisData);
			if ($query) {
				if ($id == 0) {
					return redirect()->route('admin_service_slider_index');
				} else {
					return redirect()->route('admin_service_slider_edit', [$id]);
				}
			} else {
				$this->data['errorMessage'] = 'Unable to complete request';
				return redirect()->route('admin_service_slider_index');
			}
		}

		return view('Administrator/Dashboard/services/addEditSlider', $this->data);
	}
	public function statusChange($id)
	{
		$this->dbModel->statusChange($id);
		return redirect()->route('admin_service_slider_index');
	}
	public function delete($id)
	{
		$delete = $this->dbModel->delete($id);
		// just redirect for now only
		return redirect()->route('admin_service_slider_index');
		// if ($delete) {
		// 	return true;
		// } else {
		// 	return false;
		// }
	}
    private function uploadImage($file)
    {
		$img = $file;
		if ($img->isValid() && !$img->hasMoved()) {
			$newName = $img->getRandomName();
			$imageLocation = 'blogImages/' . date('dMY');
			$img->move($imageLocation,$newName);
			return '/'.$imageLocation.'/'.$newName;
		}
		return false;
    }
}
