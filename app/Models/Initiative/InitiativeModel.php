<?php

namespace App\Models\Initiative;

use CodeIgniter\Model;

class InitiativeModel extends Model
{
	protected $table                = 'initiatives';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields = [
		'name',
		'slug',
		'summary',
		'image',
		'description',
		'tags',
		'status',
		'home_view',
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
	public function getInitiativeByID($id)
	{
		return $this->find($id);
	}
	public function getAllInitiativesAdmin()
	{
		return $this->orderBy('id', 'desc')->findAll();
	}
	public function getAllInitiativesFrontend()
	{
		$initiatives = $this->select('id, name, slug, summary, image')->where('status', 1)->paginate(9);

		$data = [
			'initiatives' => $initiatives,
			'pager' => $this->pager,
		];
		return $data;
	}
	public function getSingleInitiative($slug = null)
	{
		if ($slug != null) {
			return $this->where('slug', $slug)->first();
		}
		return false;
	}
	public function addEditInitiative($initiative)
	{
		$session = session();
		helper('form');
		$id = intval($initiative['id']);
		$data = [
			'name' => $initiative['name'],
			'summary' => $initiative['summary'],
			'description' => $initiative['description'],
			'tags' => $initiative['tags'],
			'status' => intval($initiative['status']),
			'home_view' => intval($initiative['home_view']),
		];

		if (!empty($initiative['image'])) {
			$data['image'] = $initiative['image'];
		}
		if ($id == 0) {
			$slug = slugify($initiative['name']);
			$correctSlug = checkSlugDuplicacy($slug, $this->table, 'slug');
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
	public function changeStatus($id)
	{
		$initiative = $this->where(['id' => $id])->first();
		if ($initiative != null) {
			if ($initiative['status'] == 1) {
				$query = $this->set(['status' => 0])->where(['id' => $id])->update();
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
				$query = $this->set(['status' => 1])->where(['id' => $id])->update();
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
		} else {
			$respose = array(
				'status' => 'failed',
				'message' => 'Not found for this request.',
			);
			return $respose;
		}
	}
	public function changeHomeStatus($id)
	{
		$initiative = $this->where(['id' => $id])->first();
		if ($initiative != null) {
			if ($initiative['home_view'] == 1) {
				$query = $this->set(['home_view' => 0])->where(['id' => $id])->update();
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
				$query = $this->set(['home_view' => 1])->where(['id' => $id])->update();
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
		} else {
			$respose = array(
				'status' => 'failed',
				'message' => 'Not found for this request.',
			);
			return $respose;
		}
	}
	public function getMenuItems()
	{
		if (!cache('initiativeMenu')) {
			$data = $this->select('id, name, slug')->where('home_view', 1)->findAll();
			return $this->cacheData('initiativeMenu', $data);
		}
		return cache()->get('initiativeMenu');
	}
	public function cacheData($cacheKey, $data)
	{
		cache()->save($cacheKey, $data, 3600);
		return $data;
	}
}
