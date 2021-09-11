<?php

namespace App\Models\Admin;

use App\Models\Globals\FunctionsModel;
use CodeIgniter\Model;

class XInitiavitesCategoryModel extends Model
{
	// protected $DBGroup              = 'default';
	protected $table                = 'initiavitescategories';
	protected $primaryKey           = 'id';
	// protected $useAutoIncrement     = true;
	// protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'slug',
		'status'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	public function getCategoryNamebyID($id) {
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
		$functions = new FunctionsModel();
		$data = [
			'name' => $category['name'],
		];
		if ($id == 0) {
			$slug = $functions->slugify($category['name']);
			$correctSlug = $this->checkSlugDuplicacy($slug);
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
	public function checkSlugDuplicacy($slug)
	{
		$data = $this->where(['slug' => $slug])->countAll();

		if ($data > 0) {
			$slug2 = $slug . '-' . $data;
			return $slug2;
		} else {
			return $slug;
		}
	}
	public function deleteCategory($id)
	{
		return $this->delete($id);
	}
}
