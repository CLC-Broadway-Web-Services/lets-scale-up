<?php

namespace App\Models\Admin;

use CodeIgniter\Model;
use App\Models\Globals\FunctionsModel;
use App\Models\Admin\ServicerequiredocsModel;

use App\Models\Admin\ServiceBenefitsModel;
use App\Models\Admin\ServiceCategoryModel;
use App\Models\Admin\ServicecatfaqsModel;
use App\Models\Admin\ServicepackagesModel;
use App\Models\Admin\ServicefaqsModel;
use App\Models\Admin\ServiceformModel;

class ServicesModel extends Model
{
	protected $table = 'services';
	protected $primaryKey = 'service_id';
	protected $returnType     = 'array';
	protected $allowedFields = [
		'service_cat',
		'service_cat_parent',
		'service_title',
		'service_slug',
		'service_summary',
		'service_overview',
		'service_overview_subtitle',
		'service_benefit_subtitle',
		'service_documents_subtitle',
		'service_faq_subtitle',
		'service_icon',
		'service_status',
		'service_home_view',
	];
	protected $createdField  = 'service_created_at';
	protected $updatedField  = 'service_updated_at';

	public function allServicesinAdmin()
	{
		return $this->findAll();
	}
	public function getServiceByID($serviceid)
	{
		$data = $this->where(['service_id' => $serviceid])->first();
		return $data;
	}
	public function getServiceBySlugFull($serviceslug)
	{
		$docs = new ServicerequiredocsModel();
		$faqs = new ServicefaqsModel();
		$packages = new ServicepackagesModel();
		$service =  $this->where(['service_slug' => $serviceslug])->first();
		$service['docs'] = $docs->getAllDocsBYServiceID($service['service_id']);
		$service['faqs'] = $faqs->getAllFaqsBYServiceID($service['service_id']);
		$service['packages'] = $packages->getAllPackagesBYServiceID($service['service_id']);
		return $service;
	}
	public function addEditService($service)
	{
		$session = session();
		helper('form');
		$serviceid = intval($service['service_id']);
		$functions = new FunctionsModel();
		$data = [
			'service_cat' => esc($service['service_cat']),
			'service_cat_parent' => esc($service['service_cat_parent']),
			'service_title' => esc($service['service_title']),
			'service_summary' => esc($service['service_summary']),
			'service_overview' => esc($service['service_overview']),
			'service_overview_subtitle' => esc($service['service_overview_subtitle']),
			'service_benefit_subtitle' => esc($service['service_benefit_subtitle']),
			'service_documents_subtitle' => esc($service['service_documents_subtitle']),
			'service_faq_subtitle' => esc($service['service_faq_subtitle']),
			'service_icon' => esc($service['service_icon']),
			'service_status' => intval($service['service_status']),
			'service_home_view' => intval($service['service_home_view']),
		];
		if ($serviceid == 0) {
			$slug = $functions->slugify($service['service_title']);
			$correctSlug = $functions->checkSlugDuplicacy($slug, 'services', 'service_slug');
			$data['service_slug'] = esc($correctSlug);
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
			$query = $this->set($data)->where(['service_id' => $serviceid])->update();
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
	public function changeStatus($service_id)
	{
		$service = $this->where(['service_id' => $service_id])->first();
		if ($service != null) {
			if ($service['service_status'] == 1) {
				$query = $this->set(['service_status' => 0])->where(['service_id' => $service_id])->update();
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
				$query = $this->set(['service_status' => 1])->where(['service_id' => $service_id])->update();
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
	public function changeHomeStatus($service_id)
	{
		$service = $this->where(['service_id' => $service_id])->first();
		if ($service != null) {
			if ($service['service_home_view'] == 1) {
				$query = $this->set(['service_home_view' => 0])->where(['service_id' => $service_id])->update();
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
				$query = $this->set(['service_home_view' => 1])->where(['service_id' => $service_id])->update();
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
	public function checkSlugDuplicacy($slug)
	{
		$data = $this->where(['service_slug' => $slug])->countAll();

		if ($data > 0) {
			$slug2 = $slug . '-' . $data;
			return $slug2;
		} else {
			return $slug;
		}
	}
	public function getAllServicesNameAndIDOnly() {
		return $this->select('service_id, service_title')->findAll();
	}
	// DOCUMENTS BLOCKS	
	public function allDocumentsWIthServiceName()
	{
		$documentsDB = new ServicerequiredocsModel();
		$documentsList = $this->distinct()->select($documentsDB->table . '.*,' . $this->allowedFields[0])
			->join($documentsDB->table, $documentsDB->table . '.service_id=' . $this->table . '.service_id')
			->findAll();
		return $documentsList;
	}
    public function getSingleServiceBySlug($slug)
    {
		$documentsDB = new ServicerequiredocsModel();
		$faqsDB = new ServicefaqsModel();
		$packageDB = new ServicepackagesModel();		
		$benefitDB = new ServiceBenefitsModel();

        $service = $this->where(['service_slug' => $slug])->first();
        $packages = $packageDB->where(['service_id' => $service['service_id'], 'package_status' => 1])->findAll();
        $docs = $documentsDB->where(['service_id' => $service['service_id'], 'document_status' => 1])->findAll();
        $faqs = $faqsDB->where(['service_id' => $service['service_id'], 'faq_status' => 1])->findAll();
        $benefits = $benefitDB->where(['service_id' => $service['service_id'], 'status' => 1])->findAll();

        $service['packages'] = $packages;
        $service['docs'] = $docs;
        $service['faqs'] = $faqs;
        $service['benefits'] = $benefits;

        return $service;
    }
}
// packages - packages have custom forms fields in JSON format