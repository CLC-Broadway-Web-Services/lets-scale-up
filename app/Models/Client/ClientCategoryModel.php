<?php

namespace App\Models\Client;

use CodeIgniter\Model;

class ClientCategoryModel extends Model
{
	protected $table                = 'clientcategories';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'slug'
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



	public function getCategoryNamebyID($id)
	{
		return $this->select('name')->find($id);
	}
	public function getAllCategoriesAdmin()
	{
		return $this->orderBy('id', 'desc')->findAll();
	}
	public function getCategoryByID($id)
	{
		return $this->find($id);
	}
	public function addEditCategory($category)
	{
		$session = session();
		helper('form');
		$id = intval($category['id']);
		$data = [
			'name' => $category['name'],
		];
		if ($id == 0) {
			$slug = slugify($category['name']);
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


	public function deleteCategory($id)
	{
		return $this->delete($id);
	}
}
