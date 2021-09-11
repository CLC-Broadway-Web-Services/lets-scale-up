<?php

namespace App\Models\Client;

use CodeIgniter\Model;

class ClientModel extends Model
{
	protected $table                = 'clients';
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
		'category',
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


	public function getClientByID($id)
	{
		return $this->find($id);
	}
	public function getAllClientsHomepage()
	{
		$catDB = new ClientCategoryModel();
		$clients = $this->select('id, name, slug, summary, image, category')->where('status', 1)->orderBy('id', 'RANDOM')->findAll(3);

		foreach ($clients as $key => $client) {
			$clients[$key]['category_name'] = $catDB->getCategoryNamebyID($clients[$key]['category'])['name'];
		}

		return $clients;
	}
	public function getAllClientsFrontend()
	{
		$catDB = new ClientCategoryModel();
		$clients = $this->select('id, name, slug, summary, image, category')->where('status', 1)->paginate(9);

		for ($index = 0; $index < count($clients); $index++) {
			$clients[$index]['category_name'] = $catDB->getCategoryNamebyID($clients[$index]['category'])['name'];
		}
		$data = [
			'clients' => $clients,
			'pager' => $this->pager,
		];
		return $data;
	}
	public function getSingleClient($slug = null)
	{
		// $functions = new FunctionsModel();
		// return $functions->getSingleEntityWithCategoryBySlug('clients', 'category', 'category', 'name', $slug, 'slug');

		if ($slug != null) {
			$catDB = new ClientCategoryModel();
			$client = $this->where('slug', $slug)->first();

			if ($client) {
				$client['nextProject'] = $this->select('slug')->where('id >', $client['id'])->first();
				$client['previousProject'] = $this->select('slug')->where('id <', $client['id'])->first();
				$client['category_name'] = $catDB->getCategoryNamebyID($client['category'])['name'];
				return $client;
			}
			return false;
		}
		return false;
	}
	public function addEditClient($client)
	{
		$session = session();
		helper('form');
		$id = intval($client['id']);
		$data = [
			'name' => $client['name'],
			'summary' => $client['summary'],
			// 'image' => $client['image'],
			'description' => $client['description'],
			'category' => intval($client['category']),
			'tags' => $client['tags'],
			'status' => intval($client['status']),
			'home_view' => intval($client['home_view']),
		];

		if (!empty($client['image'])) {
			$data['image'] = $client['image'];
		}
		if ($id == 0) {
			$slug = slugify($client['name']);
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
		$client = $this->where(['id' => $id])->first();
		if ($client != null) {
			if ($client['status'] == 1) {
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
				'message' => 'No faq found for this request.',
			);
			return $respose;
		}
	}
	public function changeHomeStatus($id)
	{
		$client = $this->where(['id' => $id])->first();
		if ($client != null) {
			if ($client['home_view'] == 1) {
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
				'message' => 'No service found for this request.',
			);
			return $respose;
		}
	}
}
