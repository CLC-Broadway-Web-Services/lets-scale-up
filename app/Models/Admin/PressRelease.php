<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PressRelease extends Model
{
	protected $table                = 'press_releases';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'image',
		'url',
		'status',
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function getAllPressReleases($status = 0)
	{
		if ($status) {
			return $this->where('status', 1)->findAll();
		}
		return $this->findAll();
	}

	// public function getAllPressReleases($status = 0)
	// {
	// 	if ($status) {
	// 		if (!cache('releases')) {
	// 			return $this->cacheSettings($status);
	// 		} else {
	// 			return cache()->get('releases');
	// 		}
	// 	} else {
	// 		if (!cache('releasesAdmin')) {
	// 			return $this->cacheSettings();
	// 		} else {
	// 			return cache()->get('releasesAdmin');
	// 		}
	// 	}
	// }
	// public function cacheSettings($status = 0)
	// {
	// 	if ($status) {
	// 		$releases = $this->where('status', 1)->findAll();
	// 		cache()->save('releases', $releases, 3600);
	// 	} else {
	// 		$releases = $this->findAll();
	// 		cache()->save('releasesAdmin', $releases, 3600);
	// 	}
	// 	return $releases;
	// }

	public function addEditRelease($post)
	{
		$session = session();
		helper('form');
		$id = intval($post['id']);
		$data = [
			'name' => $post['name'],
			'url' => $post['url'],
			'status' => intval($post['status']),
		];

		if (!empty($post['image'])) {
			$data['image'] = $post['image'];
		}
		if ($id == 0) {
			$query = $this->insert($data);
			if ($query) {
				$respose = array(
					'status' => 'success',
				);
				$session->setFlashdata($respose);
				return $respose;
			} else {
				$respose = array(
					'status' => 'failed',
					'message' => $this->error(),
				);
				$session->setFlashdata($respose);
				return $respose;
			}
		} else {
			$query = $this->set($data)->where(['id' => $id])->update();
			if ($query) {
				$respose = array(
					'status' => 'success',
				);
				$session->setFlashdata($respose);
				return $respose;
			} else {
				$respose = array(
					'status' => 'failed',
					'message' => $this->error(),
				);
				$session->setFlashdata($respose);
				return $respose;
			}
		}
	}
}
