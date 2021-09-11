<?php

namespace App\Models\Admin;

use App\Models\Globals\FunctionsModel;
use CodeIgniter\Model;

class XInitiavitesModel extends Model
{
	// protected $DBGroup              = 'default';
	protected $table                = 'initiatives';
	protected $primaryKey           = 'id';
	// protected $useAutoIncrement     = true;
	// protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'image',
		'slug',
		'summary',
		'description',
		'category',
		'tags',
		'status',
		'home_status'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	public function getInitiaviteByID($initiative_id)
	{
		return $this->find($initiative_id);
	}
	public function getAllInitiavitesFrontend()
	{
		$catDB = new XInitiavitesCategoryModel();
		$initiavites = $this->where('status', 1)->paginate(9);

		for ($index = 0; $index < count($initiavites); $index++) {
			$initiavites[$index]['category_name'] = $catDB->getCategoryNamebyID($initiavites[$index]['category'])['name'];
		}
		$data = [
			'initiavites' => $initiavites,
			'pager' => $this->pager,
		];
		return $data;
	}
	public function getSingleInitiavite($slug = null)
	{
		if ($slug != null) {
			$catDB = new XInitiavitesCategoryModel();
			$initiavite = $this->where('slug', $slug)->first();
			$initiavite['category_name'] = $catDB->find($initiavite['category'])['name'];
			return $initiavite;
		}
		return false;
	}
	public function addEditInitiavite($initiavite)
	{
		$session = session();
		helper('form');
		$initiavite_id = intval($initiavite['id']);
		$functions = new FunctionsModel();
		$data = [
			'name' => $initiavite['name'],
			'summary' => $initiavite['summary'],
			// 'image' => $initiavite['image'],
			'summary' => $initiavite['summary'],
			'description' => $initiavite['description'],
			'category' => intval($initiavite['category']),
			'tags' => $initiavite['tags'],
			'status' => intval($initiavite['status']),
			'home_status' => intval($initiavite['home_status']),
		];

		if (!empty($initiavite['image'])) {
			$data['image'] = $initiavite['image'];
		}
		if ($initiavite_id == 0) {
			$slug = $functions->slugify($initiavite['name']);
			$correctSlug = $functions->checkSlugDuplicacy($slug, 'initiavites', 'slug');
			$data['slug'] = esc($correctSlug);
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
			$query = $this->set($data)->where(['initiavite_id' => $initiavite_id])->update();
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
	public function changeStatus($initiavite_id, $status)
	{
		// $initiavite = $this->find($initiavite_id);
		// if ($initiavite != null) {
		// if ($initiavite['status'] == 1) {
		if ($status == 1) {
			// $query = $this->set(['status' => 0])->where(['initiavite_id' => $initiavite_id])->update();
			$query = $this->update($initiavite_id, ['status' => 0]);
			if ($query) {
				$respose = array(
					'status' => 'success',
				);
				return $respose;
			} else {
				$respose = array(
					'status' => 'failed',
					'message' => $this->error(),
				);
				return $respose;
			}
		} else {
			// $query = $this->set(['status' => 1])->where(['initiavite_id' => $initiavite_id])->update();
			$query = $this->update($initiavite_id, ['status' => 1]);
			if ($query) {
				$respose = array(
					'status' => 'success',
				);
				return $respose;
			} else {
				$respose = array(
					'status' => 'failed',
					'message' => 'Failed to change status, please contact support.',
				);
				return $respose;
			}
		}
		// } else {
		// 	$respose = array(
		// 		'status' => 'failed',
		// 		'message' => 'No faq found for this request.',
		// 	);
		// 	return $respose;
		// }
	}
	public function changeHomeStatus($initiavite_id, $status)
	{
		// $initiavite = $this->where(['initiavite_id' => $initiavite_id])->first();
		// if ($initiavite != null) {
		// if ($initiavite['home_status'] == 1) {
		if ($status == 1) {
			$query = $this->set(['home_status' => 0])->where(['initiavite_id' => $initiavite_id])->update();
			if ($query) {
				$respose = array(
					'status' => 'success',
				);
				return $respose;
			} else {
				$respose = array(
					'status' => 'failed',
					'message' => $this->error(),
				);
				return $respose;
			}
		} else {
			$query = $this->set(['home_status' => 1])->where(['initiavite_id' => $initiavite_id])->update();
			if ($query) {
				$respose = array(
					'status' => 'success',
				);
				return $respose;
			} else {
				$respose = array(
					'status' => 'failed',
					'message' => $this->error(),
				);
				return $respose;
			}
		}
		// } else {
		// 	$respose = array(
		// 		'status' => 'failed',
		// 		'message' => 'No service found for this request.',
		// 	);
		// 	return $respose;
		// }
	}
}
