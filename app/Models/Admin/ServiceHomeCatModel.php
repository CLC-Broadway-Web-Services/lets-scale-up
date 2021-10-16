<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ServiceHomeCatModel extends Model
{
	protected $table                = 'personalized_services';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'title',
		'slug',
		'sub_title',
		'icon',
		'color',
		'image',
		'video',
		'sub_content',
		'services',
		'status'
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

	public function getAllForMenu()
	{
		$services = $this->Where('status', 1)->orderBy('title', 'asc')->findAll();
		$mainServiceDb = new ServicesModel();
		foreach ($services as $key => $service) {
			$mainServicesArray = json_decode($service['services']);
			$mainServices = $mainServiceDb->select('service_title, service_icon')->whereIn('service_id', $mainServicesArray)->findAll();
			$services[$key]['services'] = $mainServices;
		}
		return $services;
	}
	public function getServiceBySlug($slug)
	{
		$service = $this->Where('slug', $slug)->first();
		$response = ['success' => false, 'data' => false];
		if ($service) {
			$mainServiceDb = new ServicesModel();
			$mainServicesArray = json_decode($service['services']);
			$mainServices = $mainServiceDb->select('service_id, service_title, service_icon, service_slug, service_summary')->whereIn('service_id', $mainServicesArray)->findAll();
			$service['services'] = $mainServices;
			$response['success'] = true;
			$response['data'] = $service;
		}
		return $response;
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
				'message' => 'No service found for this request.',
			);
			return $respose;
		}
	}
}
