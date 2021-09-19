<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PressRelease as AdminPressRelease;

class PressRelease extends BaseController
{
	public function index($release_id = 0)
	{
		$release_md = new AdminPressRelease();
		$this->data['releases'] = $release_md->getAllPressReleases();

		if ($release_id == 0) {
			$releaseData = [
				'id' => 0,
				'name' => '',
				'image' => '',
				'url' => '',
				'status' => 1,
			];
		} else {
			$release = $release_md->find($release_id);
			$releaseData = [
				'id' => $release['id'],
				'name' => $release['name'],
				'image' => $release['image'],
				'url' => $release['url'],
				'status' => $release['status'],
			];
		}
		$this->data['releaseData'] = $releaseData;

		// add edit category request
		if ($this->request->getMethod() == 'post') {
			$thisData = [
				'id' => $release_id,
				'name' => $this->request->getPost('name'),
				'url' => $this->request->getPost('url'),
				'status' => $this->request->getPost('status'),
			];
			if ($this->request->getFile('image')) {
				$img = $this->request->getFile('image');
				$imagePath = $this->uploadImages($img);
				if ($imagePath) {
					$thisData['image'] = $imagePath;
				}
			}

			$query = $release_md->addEditRelease($thisData);
			if ($query['status'] == 'success') {
				if ($release_id == 0) {
					return redirect()->route('admin_press_release_index');
				} else {
					return redirect()->route('admin_press_release_edit', [$release_id]);
				}
			} else {
				$this->data['errorMessage'] = $query['message'];
				return redirect()->route('admin_press_release_index');
			}
		}
		// $this->data['pageCSS'] = '';
		// $this->data['pageJS'] = '';

		return view('Administrator/Dashboard/others/pressrelease', $this->data);
	}
	public function delete($id) {
		$release_md = new AdminPressRelease();
		$deleting = $release_md->delete($id);
		return redirect()->route('admin_press_release_index');	
	}
    private function uploadImages($file)
    {
		$img = $file;
		if ($img->isValid() && !$img->hasMoved()) {
			$newName = $img->getRandomName();
			$imageLocation = 'pressRelease/' . date('dMY');
			$img->move($imageLocation,$newName);
			return '/'.$imageLocation.'/'.$newName;
		}
		return false;
    }
}
