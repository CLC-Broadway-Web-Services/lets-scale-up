<?php

namespace App\Models\Admin;

use App\Models\Globals\FunctionsModel;
use CodeIgniter\Model;

class ServiceCategoryModel extends Model
{
	// protected $DBGroup              = 'default';
	protected $table                = 'service_categories';
	protected $primaryKey           = 'id';
	// protected $useAutoIncrement     = true;
	// protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'title',
		'subtitle',
		'description',
		'slug',
		'parent' // parent category ID
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	public function getAllCategoriesAdmin()
	{
		$categories = $this->select('id, name, parent')->orderBy('id', 'asc')->findAll();
		foreach ($categories as $key => $cat) {
			if ($cat['parent'] !== '0') {
				$parentId = $cat['parent'];
				$catKey = array_search($parentId, array_column($categories, 'id'));
				$categories[$key]['parent_name'] = $categories[$catKey]['name'];
			}
		}
		return $categories;
	}
	public function getAllParentCategoriesAdmin()
	{
		return $this->select('id, name, parent')->where(['parent' => 0])->orderBy('id', 'desc')->findAll();
	}
	public function getAllChildCategoriesAdmin()
	{
		return $this->select('id, name, parent')->where(['parent !=' => 0])->orderBy('id', 'desc')->findAll();
	}
	public function getCategoryNamebyID($id)
	{
		return $this->select('name')->find($id);
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
		$slugify = new FunctionsModel();
		$data = [
			'name' => $category['name'],
			'title' => $category['title'],
			'subtitle' => $category['subtitle'],
			'description' => $category['description'],
			'parent' => $category['parent'],
		];
		if ($id == 0) {
			$slug = $slugify->slugify($category['name']);
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
		$count = $this->where(['parent' => $id])->countAll();
		if (!$count) {
			return $this->delete($id);
		} else {
			return false;
		}
	}

	public function getAllCategoryMenus()
	{
		$serviceDB = new ServicesModel();
		$data = $this->select('id, name, title, slug, parent')->where(['parent' => 0])->findAll();
		foreach ($data as $key => $value) {
			$id = $value['id'];
			$childs = $this->select('id, name, title, slug, parent')->where(['parent' => $id])->findAll();

			foreach ($childs as $key2 => $menu) {
				$catId = $menu['id'];
				$childs[$key2]['services'] = $serviceDB->select('service_id, service_title, service_slug')->where(['service_status' => 1, 'service_cat' => $catId])->findAll();
			}
			$data[$key]['childs'] = $childs;
		}
		return $data;
	}
}
