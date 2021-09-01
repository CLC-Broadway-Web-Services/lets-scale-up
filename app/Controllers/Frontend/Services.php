<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Globals\FrontservicesModel;

class Services extends BaseController
{
    private $data;
    private $serviceDB;
    private $session;

    public function __construct()
    {
        $this->data = array();
        $this->session = session();
        $this->data['user'] = session()->get('user');
        $this->serviceDB = new FrontservicesModel();
        helper('file');
        helper('number');
        helper('form');
    }
    public function singleService($slug = null)
    {
        helper('number');
        if ($slug == null) {
            return redirect()->to(base_url());
        }

        $service = $this->serviceDB->getSingleServiceBySlug($slug);
        // return print_r($service);

        $this->data['service'] = $service;

        $this->data['pageJS'] = '<script src="/public/custom/assets/js/frontSingleService.js"></script>';

        return view('Frontend/pages/singleService', $this->data);
    }

    public function singleServicePackages($slug = null)
    {
        helper('number');
        if ($slug == null) {
            return redirect()->to(base_url());
        }
        $service = $this->serviceDB->getSingleServiceBySlug($slug);
        // return print_r($service);

        $this->data['service'] = $service;
        // return print_r($data);

        $this->data['pageJS'] = '<script src="/public/custom/assets/js/frontSingleService.js"></script>';

        return view('Frontend/pages/singleServicePackages', $this->data);
    }
    public function serviceSelectedPackage($service_slug = null, $package_id)
    {
        if ($service_slug == null) {
            return redirect()->to(base_url());
        }
        $service = $this->serviceDB->getSingleServiceOnlyBySlug($service_slug);
        $package = $this->serviceDB->getPackagebyID($package_id);
        $forms = $this->serviceDB->getFormsByServiceID($service['service_id']);
        // return print_r($service);
        $this->data['service'] = $service;
        $this->data['package'] = $package;
        $this->data['forms'] = $forms;
        // return print_r($data);

        $this->data['pageJS'] = '<script src="/public/custom/assets/js/frontSingleService.js"></script>';

        return view('Frontend/pages/selectedPackage', $this->data);
    }

    public function categoryPage($slug)
    {
        // echo 'this is single category page';
        // find the category by slug, if that was not found go to the alll category OR 404 page
        $categoryData = null;
        $categoryData = $this->serviceDB->getParentCategoryWithServices($slug);

        $this->data['category'] = $categoryData;

        // return print_r($categoryData);

        return view('Frontend/pages/category', $this->data);
    }
}
