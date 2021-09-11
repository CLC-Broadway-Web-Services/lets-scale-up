<?php

namespace App\Models\Globals;

use App\Models\Admin\ServiceBenefitsModel;
use App\Models\Admin\ServiceCategoryModel;
use App\Models\Admin\ServicecatfaqsModel;
use App\Models\Admin\ServicepackagesModel;
use App\Models\Admin\ServicerequiredocsModel;
use App\Models\Admin\ServicefaqsModel;
use App\Models\Admin\ServiceformModel;
use App\Models\Admin\ServicesModel;

class FrontservicesModel extends ServicesModel
{
    private $serviceDB;
    private $documentsDB;
    private $benefitsDB;
    private $faqsDB;
    private $faqsCatDB;
    private $packageDB;
    private $serviceCatDB;
    private $formsDB;

    public function __construct()
    {
        $this->serviceDB = new ServicesModel();
        $this->documentsDB = new ServicerequiredocsModel();
        $this->benefitsDB = new ServiceBenefitsModel();
        $this->faqsDB = new ServicefaqsModel();
        $this->packageDB = new ServicepackagesModel();

        $this->serviceCatDB = new ServiceCategoryModel();
        $this->faqsCatDB = new ServicecatfaqsModel();

        $this->formsDB = new ServiceformModel();
    }

    public function getAllHomepageServices()
    {
        $services = $this->serviceDB->select('service_id, service_title, service_slug, service_summary, service_icon')->where(['service_status' => 1, 'service_home_view' => 1])->findAll();
        $i = 0;
        for ($i; $i < count($services); $i++) {
            $price = $this->packageDB->select('package_price')->where(['service_id' => $services[$i]['service_id']])->orderBy('package_price', 'asc')->first();
            $services[$i]['service_price'] = $price['package_price'];
        }
        return $services;
    }
    public function getSingleServiceBySlug($slug)
    {
        $service = $this->serviceDB->where(['service_slug' => $slug])->first();
        $benefits = $this->benefitsDB->where(['service_id' => $service['service_id'], 'status' => 1])->findAll();
        $docs = $this->documentsDB->where(['service_id' => $service['service_id'], 'document_status' => 1])->findAll();
        $packages = $this->packageDB->where(['service_id' => $service['service_id'], 'package_status' => 1])->findAll();
        $faqs = $this->faqsDB->where(['service_id' => $service['service_id'], 'faq_status' => 1])->findAll();

        if (count($packages)) {
            foreach ($packages as $key => $package) {
                $packages[$key]['package_details'] = json_decode($package['package_details']);
            }
        }

        $service['benefits'] = $benefits;
        $service['docs'] = $docs;
        $service['packages'] = $packages;
        $service['faqs'] = $faqs;

        return $service;
    }
    public function getSingleServiceOnlyBySlug($slug)
    {
        $service = $this->serviceDB->where(['service_slug' => $slug])->first();
        return $service;
    }
    public function getPackagebyID($package_id)
    {
        $package = $this->packageDB->find($package_id);
        return $package;
    }
    public function getFormsByServiceID($service_id)
    {
        $forms = $this->formsDB->where(['service_id' => $service_id, 'form_status' => 1])->findAll();

        if (count($forms) > 0) {
            foreach ($forms as $key => $form) {
                $forms[$key]['form_fields'] = json_decode($form['form_fields']);
            }
        }
        return $forms;
    }

    public function getParentCategoryWithServices($slug)
    {
        $category = $this->serviceCatDB->where('slug', $slug)->first();
        $category['child'] = $this->serviceCatDB->where('parent', $category['id'])->findAll();
        $services = $this->serviceDB->select('service_id, service_cat, service_title,service_slug,service_summary')->where(['service_cat_parent' => $category['id'], 'service_status' => 1])->findAll();
        foreach ($category['child'] as $key => $child) {
            $category['child'][$key]['services'] = [];
            foreach ($services as $key => $service) {
                if ($service['service_cat'] == $child['id']) {
                    $category['child'][$key]['services'][] = $service;
                }
            }
        }
        $category['faqs'] = $this->faqsCatDB->where('faq_cat_id', $category['id'])->findAll();
        return $category;
    }
}
