<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AdminModel;
use App\Models\Admin\ServiceBenefitsModel;
use App\Models\Admin\ServiceCategoryModel;
use App\Models\Admin\ServicecatfaqsModel;
use App\Models\Admin\ServicesModel;
use App\Models\Admin\ServicerequiredocsModel;
use App\Models\Admin\ServicefaqsModel;
use App\Models\Admin\ServicepackagesModel;

class Services extends BaseController
{
    private $serviceDB;
    private $documentsDB;
    private $benefitsDB;
    private $faqsDB;
    private $faqsCatDB;
    private $packageDB;
    private $serviceCatDB;
    private $adminDB;
    private $admin;
    private $session;

    public function __construct()
    {
        $this->session = session();
        $this->data['admin'] = session()->get('admin');
        // $this->data['user_name'] = $this->session->get('firstName') . ' ' . $this->session->get('lastname');
        // $this->data['user_id'] = $this->session->get('uid');
        // $this->data['host_image'] = $this->session->get('photoURL');
        // $this->data['time'] = new Time;
        $this->serviceDB = new ServicesModel();
        $this->documentsDB = new ServicerequiredocsModel();
        $this->benefitsDB = new ServiceBenefitsModel();
        $this->faqsDB = new ServicefaqsModel();
        $this->faqsCatDB = new ServicecatfaqsModel();
        $this->packageDB = new ServicepackagesModel();
        $this->serviceCatDB = new ServiceCategoryModel();
        $this->adminDB = new AdminModel();
        helper('file');
        helper('number');
        helper('form');
    }
    public function index()
    {
        $this->data['services'] = $this->serviceDB->allServicesinAdmin();
        $this->data['sessionData'] = session()->getFlashData('serviceStatusMessage');
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';

        $this->data['pageCSS'] = '<link href="/public/assets/css/bootstrap-icons.css" rel="stylesheet" type="text/css" />';
        return view('Administrator/Dashboard/services/services', $this->data);
    }
    public function addEditService($serviceid = 0)
    {
        $icons = file_get_contents('./public/custom/assets/js/bootstrap-icons.json');
        $iconsDecoded = json_decode($icons);
        $iconsArray = array($iconsDecoded);
        // return print_r($bsiconsArray[0]);

        helper('form', 'file');

        if ($serviceid == 0) {
            $serviceData = [
                'service_id' => 0,
                'service_cat' => 0,
                'service_cat_parent' => 0,
                'service_title' => '',
                'service_slug' => '',
                'service_summary' => '',
                'service_overview' => '',
                'service_overview_subtitle' => '',
                'service_benefit_subtitle' => '',
                'service_documents_subtitle' => '',
                'service_faq_subtitle' => '',
                'service_icon' => '',
                'service_status' => 1,
                'service_home_view' => 0,
            ];
            $this->data['serviceData'] = $serviceData;
        } else {
            $service = $this->serviceDB->getServiceByID($serviceid);
            $serviceData = [
                'service_id' => $service['service_id'],
                'service_cat' => $service['service_cat'],
                'service_cat_parent' => $service['service_cat_parent'],
                'service_title' => $service['service_title'],
                'service_slug' => $service['service_slug'],
                'service_summary' => $service['service_summary'],
                'service_overview' => $service['service_overview'],
                'service_overview_subtitle' => $service['service_overview_subtitle'],
                'service_benefit_subtitle' => $service['service_benefit_subtitle'],
                'service_documents_subtitle' => $service['service_documents_subtitle'],
                'service_faq_subtitle' => $service['service_faq_subtitle'],
                'service_icon' => $service['service_icon'],
                'service_status' => intval($service['service_status']),
                'service_home_view' => intval($service['service_home_view']),
            ];
            $this->data['serviceData'] = $serviceData;
            $this->data['serviceCategory'] = $this->serviceCatDB->getCategoryByID($service['service_cat']);
        }

        if ($this->request->getMethod() == 'post') {
            $thisData = [
                'service_id' => $serviceid,
                'service_cat' => intval($this->request->getPost('service_cat')),
                'service_cat_parent' => intval($this->request->getPost('service_cat_parent')),
                'service_title' => $this->request->getPost('service_title'),
                'service_summary' => $this->request->getPost('service_summary'),
                'service_overview' => $this->request->getPost('service_overview'),
                'service_overview_subtitle' => $this->request->getPost('service_overview_subtitle'),
                'service_benefit_subtitle' => $this->request->getPost('service_benefit_subtitle'),
                'service_documents_subtitle' => $this->request->getPost('service_documents_subtitle'),
                'service_faq_subtitle' => $this->request->getPost('service_faq_subtitle'),
                'service_icon' => $this->request->getPost('service_icon'),
                'service_status' => $this->request->getPost('service_status', FILTER_SANITIZE_NUMBER_FLOAT),
                'service_home_view' => $this->request->getPost('service_home_view', FILTER_SANITIZE_NUMBER_FLOAT),
            ];

            // return print_r($_POST);
            if ($serviceid == 0) {
                $query = $this->serviceDB->addEditService($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/services');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/add');
                }
            } else {
                $query = $this->serviceDB->addEditService($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/services');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/edit/' . $serviceid);
                }
            }
            // return print_r($query);
        }
        // return print_r($this->data);

        $this->data['categories'] = $this->serviceCatDB->getAllParentCategoriesAdmin();
        $this->data['childCategories'] = $this->serviceCatDB->getAllChildCategoriesAdmin();
        $this->data['icons'] = $iconsArray[0];

        $this->data['pageJS'] = '<script src="/public/dashboard/assets/js/libs/editors/tinymce.js?ver=2.2.0"></script>
        <script src="/public/dashboard/assets/js/editors.js?ver=2.2.0"></script>
        <script src="/public/custom/assets/js/adminAddEditService.js"></script>';
        // /public/assets/css/bootstrap-icons.css
        // $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/dashboard/assets/css/editors/tinymce.css?ver=2.2.0">
        // <link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />';
        $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/dashboard/assets/css/editors/tinymce.css?ver=2.2.0">
        <link href="/public/assets/css/bootstrap-icons.css" rel="stylesheet" type="text/css" />';

        return view('Administrator/Dashboard/services/addeditservice', $this->data);
    }
    public function serviceStatusChange($service_id)
    {

        $query = $this->serviceDB->changeStatus($service_id);
        if ($query['status'] == 'success') {
            return redirect()->to('/administrator/services');
        } else {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
            return redirect()->to('/administrator/services');
        }
    }
    public function serviceHomeStatusChange($service_id)
    {

        $query = $this->serviceDB->changeHomeStatus($service_id);
        if ($query['status'] == 'success') {
            return redirect()->to('/administrator/services');
        } else {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
            return redirect()->to('/administrator/services');
        }
    }
    // benefits blocks
    public function serviceBenefits()
    {
        $this->data['serviceBenefits'] = $this->benefitsDB->allBenefitsWIthServiceName();
        // print_r($this->data['serviceDocuments']);
        // die();
        $this->data['sessionData'] = session()->getFlashData('serviceStatusMessage');
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';

        // $this->data['pageCSS'] = '<link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />';
        return view('Administrator/Dashboard/services/serviceBenefits', $this->data);
    }
    public function addEditServiceBenefit($benefitid = 0)
    {
        helper('form', 'file');

        // add edit post request
        if ($this->request->getMethod() == 'post') {
            // print_r($_POST);
            // die();
            $thisData = [
                'id' => $benefitid,
                'service_id' => $this->request->getPost('service_id', FILTER_SANITIZE_NUMBER_INT),
                'icon' => $this->request->getPost('icon'),
                'title' => $this->request->getPost('title'),
                'summary' => $this->request->getPost('summary'),
                'status' => $this->request->getPost('status', FILTER_SANITIZE_NUMBER_INT),
            ];

            if ($benefitid == 0) {
                $query = $this->benefitsDB->addEditBenefit($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/benefits');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/benefits/add');
                }
            } else {
                $query = $this->benefitsDB->addEditBenefit($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/benefits');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/benefits/edit/' . $benefitid);
                }
            }
            // return print_r($query);
        }


        $icons = file_get_contents('./public/custom/assets/js/bootstrap-icons.json');
        $iconsDecoded = json_decode($icons);
        $iconsArray = array($iconsDecoded);
        $this->data['icons'] = $iconsArray[0];

        $this->data['allServices'] = $this->serviceDB->getAllServicesNameAndIDOnly();

        if ($benefitid == 0) {
            $benefitData = [
                'id' => 0,
                'service_id' => 0,
                'icon' => '',
                'title' => '',
                'summary' => '',
                'status' => 1,
            ];
            $this->data['benefitData'] = $benefitData;
        } else {
            $benefit = $this->benefitsDB->getBenefitByID($benefitid);
            $benefitData = [
                'id' => $benefit['id'],
                'service_id' => $benefit['service_id'],
                'icon' => $benefit['icon'],
                'title' => $benefit['title'],
                'summary' => $benefit['summary'],
                'status' => intval($benefit['status']),
            ];
            $this->data['benefitData'] = $benefitData;
        }



        // $this->data['pageJS'] = '<script src="/public/dashboard/assets/js/libs/editors/tinymce.js?ver=2.2.0"></script>
        // <script src="/public/dashboard/assets/js/editors.js?ver=2.2.0"></script>
        // <script src="/public/custom/assets/js/adminAddEditService.js"></script>';

        // $this->data['pageCSS'] = '<link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />';
        // $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/dashboard/assets/css/editors/tinymce.css?ver=2.2.0">
        // <link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />';


        $this->data['pageCSS'] = '<link href="/public/assets/css/bootstrap-icons.css" rel="stylesheet" type="text/css" />';

        return view('Administrator/Dashboard/services/addEditServiceBenefit', $this->data);
    }
    public function serviceBenefitsStatusChange($benefitid)
    {

        $query = $this->benefitsDB->statusChange($benefitid);
        if ($query['status'] == 'success') {
            return redirect()->to('/administrator/service/benefits');
        } else {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
            return redirect()->to('/administrator/service/benefits');
        }
    }
    // documents blocks
    public function serviceDocuments()
    {
        $this->data['serviceDocuments'] = $this->documentsDB->allDocumentsWIthServiceName();
        // print_r($this->data['serviceDocuments']);
        // die();
        $this->data['sessionData'] = session()->getFlashData('serviceStatusMessage');
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';

        // $this->data['pageCSS'] = '<link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />';
        return view('Administrator/Dashboard/services/serviceDocuments', $this->data);
    }
    public function addEditServiceDocument($documentid = 0)
    {
        helper('form');

        $this->data['allServices'] = $this->serviceDB->getAllServicesNameAndIDOnly();

        if ($documentid == 0) {
            $documentData = [
                'document_id' => 0,
                'service_id' => 0,
                'document_title' => '',
                'document_summary' => '',
                'document_status' => 1,
            ];
            $this->data['documentData'] = $documentData;
        } else {
            $document = $this->documentsDB->getDocumentByID($documentid);
            $documentData = [
                'document_id' => $document['document_id'],
                'service_id' => $document['service_id'],
                'document_title' => $document['document_title'],
                'document_summary' => $document['document_summary'],
                'document_status' => intval($document['document_status']),
            ];
            $this->data['documentData'] = $documentData;
        }

        // add edit post request
        if ($this->request->getMethod() == 'post') {
            // print_r($_POST);
            // die();
            $thisData = [
                'document_id' => $documentid,
                'service_id' => $this->request->getPost('service_id', FILTER_SANITIZE_NUMBER_INT),
                'document_title' => $this->request->getPost('document_title'),
                'document_summary' => $this->request->getPost('document_summary'),
                'document_status' => $this->request->getPost('document_status', FILTER_SANITIZE_NUMBER_INT),
            ];

            if ($documentid == 0) {
                $query = $this->documentsDB->addEditDocument($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/documents');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/documents/add');
                }
            } else {
                $query = $this->documentsDB->addEditDocument($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/documents');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/documents/edit/' . $documentid);
                }
            }
            // return print_r($query);
        }
        // $this->data['pageJS'] = '<script src="/public/dashboard/assets/js/libs/editors/tinymce.js?ver=2.2.0"></script>
        // <script src="/public/dashboard/assets/js/editors.js?ver=2.2.0"></script>
        // <script src="/public/custom/assets/js/adminAddEditService.js"></script>';

        // $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/dashboard/assets/css/editors/tinymce.css?ver=2.2.0">
        // <link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />';

        return view('Administrator/Dashboard/services/addEditServiceDocument', $this->data);
    }
    public function serviceDocumentStatusChange($documentid)
    {

        $query = $this->documentsDB->statusChange($documentid);
        if ($query['status'] == 'success') {
            return redirect()->to('/administrator/service/documents');
        } else {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
            return redirect()->to('/administrator/service/documents');
        }
    }
    // faqs
    public function serviceFaqs()
    {
        $this->data['serviceFaqs'] = $this->faqsDB->allFaqsWIthServiceName();
        // print_r($this->data['serviceDocuments']);
        // die();
        $this->data['sessionData'] = session()->getFlashData('serviceStatusMessage');
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';

        // $this->data['pageCSS'] = '<link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />';
        return view('Administrator/Dashboard/services/serviceFaqs', $this->data);
    }
    public function addEditServiceFaq($faqid = 0)
    {
        $this->data['allServices'] = $this->serviceDB->getAllServicesNameAndIDOnly();

        // $bulkData = array(
        //     [
        //         'faq_title' => 'VALUE',
        //         'faq_content' => 'VALUE'
        //     ]
        // );

        // foreach ($bulkData as $key => $data) {
        //     $data['faq_id'] = 0;
        //     $data['service_id'] = 3;
        //     $data['faq_status'] = 1;
        //     $this->faqsDB->addEditFaq($data);
        // }

        if ($faqid == 0) {
            $faqData = [
                'faq_id' => 0,
                'service_id' => 0,
                'faq_title' => '',
                'faq_content' => '',
                'faq_status' => 1,
            ];
            $this->data['faqData'] = $faqData;
        } else {
            $faq = $this->faqsDB->getFaqByID($faqid);
            $faqData = [
                'faq_id' => $faq['faq_id'],
                'service_id' => $faq['service_id'],
                'faq_title' => $faq['faq_title'],
                'faq_content' => $faq['faq_content'],
                'faq_status' => intval($faq['faq_status']),
            ];
            $this->data['faqData'] = $faqData;
        }

        // add edit post request
        if ($this->request->getMethod() == 'post') {
            $thisData = [
                'faq_id' => $faqid,
                'service_id' => $this->request->getPost('service_id', FILTER_SANITIZE_NUMBER_INT),
                'faq_title' => $this->request->getPost('faq_title'),
                'faq_content' => $this->request->getPost('faq_content'),
                'faq_status' => $this->request->getPost('faq_status', FILTER_SANITIZE_NUMBER_INT),
            ];

            if ($faqid == 0) {
                $query = $this->faqsDB->addEditFaq($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/faqs');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/faqs/add');
                }
            } else {
                $query = $this->faqsDB->addEditFaq($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/faqs');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/faqs/edit/' . $faqid);
                }
            }
        }

        return view('Administrator/Dashboard/services/addEditServiceFaq', $this->data);
    }
    public function serviceFaqStatusChange($faqid)
    {
        $query = $this->faqsDB->statusChange($faqid);
        if ($query['status'] != 'success') {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
        }
        return redirect()->to('/administrator/service/faqs');
    }
    // packages
    public function servicePackages()
    {
        $this->data['servicePackages'] = $this->packageDB->allPackagesWIthServiceName();
        $this->data['sessionData'] = session()->getFlashData('serviceStatusMessage');
        return view('Administrator/Dashboard/services/servicePackages', $this->data);
    }
    public function addEditServicePackage($packageid = 0)
    {
        helper('form', 'file');
        $this->data['allServices'] = $this->serviceDB->getAllServicesNameAndIDOnly();

        if ($packageid == 0) {
            $packageData = [
                'package_id' => 0,
                'service_id' => 0,
                'package_name' => '',

                'package_basic_price' => floatval('0.00'),
                'package_gov_fee' => floatval('0.00'),
                'package_shipping' => floatval('0.00'),
                'package_discount' => floatval('0.00'),
                'package_gst' => floatval('0.00'),

                'package_price' => floatval('0.00'),
                'package_details' => '',
                'package_details_count' => 1,
                'package_status' => 1,
                'package_isSpecial' => 0,
            ];
            $this->data['packageData'] = $packageData;
        } else {
            $package = $this->packageDB->getPackageByID($packageid);
            $packageData = [
                'package_id' => $package['package_id'],
                'service_id' => $package['service_id'],
                'package_name' => $package['package_name'],

                'package_basic_price' => $package['package_basic_price'],
                'package_gov_fee' => $package['package_gov_fee'],
                'package_shipping' => $package['package_shipping'],
                'package_discount' => $package['package_discount'],
                'package_gst' => $package['package_gst'],

                'package_price' => $package['package_price'],
                'package_details' => json_decode($package['package_details']),
                'package_details_count' => intval($package['package_details_count']),
                'package_status' => intval($package['package_status']),
                'package_isSpecial' => intval($package['package_isSpecial']),
            ];
            $this->data['packageData'] = $packageData;
        }

        // add edit post request
        if ($this->request->getMethod() == 'post') {
            // echo json_encode($this->request->getVar('package_details'));
            // return print_r($_POST);
            $thisData = [
                'package_id' => $packageid,
                'service_id' => $this->request->getVar('service_id', FILTER_SANITIZE_NUMBER_INT),
                'package_name' => $this->request->getVar('package_name'),

                'package_basic_price' => floatval($this->request->getVar('package_basic_price')),
                'package_gov_fee' => floatval($this->request->getVar('package_gov_fee')),
                'package_shipping' => floatval($this->request->getVar('package_shipping')),
                'package_discount' => floatval($this->request->getVar('package_discount')),
                'package_gst' => floatval($this->request->getVar('package_gst')),

                'package_price' => floatval($this->request->getVar('package_price')),
                'package_details' => json_encode($this->request->getVar('package_details')),
                'package_details_count' => $this->request->getVar('package_details_count'),
                'package_status' => $this->request->getVar('package_status', FILTER_SANITIZE_NUMBER_INT),
                'package_isSpecial' => $this->request->getVar('package_isSpecial'),
            ];

            // return print_r($thisData);
            // die();

            if ($packageid == 0) {
                $query = $this->packageDB->addEditPackage($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/packages');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    // return redirect()->to('/administrator/service/packages/add');
                }
            } else {
                $query = $this->packageDB->addEditPackage($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/packages');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    // return redirect()->to('/administrator/service/packages/edit/' . $packageid);
                }
            }
        }

        // echo '<pre>';
        // print_r($this->data);
        // echo '</pre>';
        // return;

        $this->data['pageJS'] = '<script src="/public/custom/assets/js/adminAddPackages.js"></script>';

        // $this->data['pageCSS'] = '<link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />';

        return view('Administrator/Dashboard/services/addEditServicePackage', $this->data);
    }
    public function servicePackageStatusChange($packageid)
    {
        $query = $this->packageDB->statusChange($packageid);
        if ($query['status'] != 'success') {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
        }
        return redirect()->to('/administrator/service/packages');
    }
    public function queries()
    {
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';

        return view('Administrator/Dashboard/dashboard', $this->data);
    }
    public function testimonials()
    {
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';

        return view('Administrator/Dashboard/dashboard', $this->data);
    }
    public function categories($id = 0)
    {
        $this->data['categories'] = $this->serviceCatDB->getAllCategoriesAdmin();
        $this->data['parentCategories'] = $this->serviceCatDB->getAllParentCategoriesAdmin();

        // return print_r($this->data['categories']);

        if ($id == 0) {
            $catData = [
                'id' => 0,
                'name' => '',
                'title' => '',
                'subtitle' => '',
                'description' => '',
                'slug' => '',
                'parent' => 0
            ];
            $this->data['catData'] = $catData;
        } else {
            $category = $this->serviceCatDB->getCategoryByID($id);
            $catData = [
                'id' => $category['id'],
                'name' => $category['name'],
                'title' => $category['title'],
                'subtitle' => $category['subtitle'],
                'description' => $category['description'],
                'slug' => $category['slug'],
                'parent' => $category['parent'],
            ];
            $this->data['catData'] = $catData;
        }

        // add edit category request
        if ($this->request->getMethod() == 'post') {
            $thisData = [
                'id' => $id,
                'name' => $this->request->getPost('name'),
                'title' => $this->request->getPost('title'),
                'subtitle' => $this->request->getPost('subtitle'),
                'description' => $this->request->getPost('description'),
                'parent' => $this->request->getPost('parent'),
            ];

            if ($id == 0) {
                $query = $this->serviceCatDB->addEditCategory($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/categories');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/categories');
                }
            } else {
                $query = $this->serviceCatDB->addEditCategory($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/categories');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/categories/' . $id);
                }
            }
        }
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';

        return view('Administrator/Dashboard/services/servicecategories', $this->data);
    }
    public function categoriesDelete($cat_id)
    {
        $deleting = $this->serviceCatDB->deleteCategory($cat_id);

        if ($deleting) {
            $this->data['successMessage'] = 'Category deleted.';
        } else {
            $this->data['errorMessage'] = 'Please remove all blogs from this category or change category from those blogs, before deleting this category';
        }
        return redirect()->to('/administrator/service/categories');
    }
    // category faqs
    public function serviceCatFaqs()
    {
        $this->data['serviceCatFaqs'] = $this->faqsCatDB->allFaqsWIthServiceName();
        // print_r($this->data['serviceDocuments']);
        // die();
        $this->data['sessionData'] = session()->getFlashData('serviceStatusMessage');
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';

        // $this->data['pageCSS'] = '<link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />';
        return view('Administrator/Dashboard/services/serviceCatFaqs', $this->data);
    }
    public function addEditServiceCatFaq($faqid = 0)
    {
        // $this->data['allServices'] = $this->serviceDB->getAllServicesNameAndIDOnly();
        $this->data['parentCategories'] = $this->serviceCatDB->getAllParentCategoriesAdmin();

        // $bulkData = array(
        //     [
        //         "faq_title" => "Which steps should be taken to register a business in India?",
        //         "faq_content" => "To register a business in India, the promoters or owners are required to finalize their business activities and capital requirements first. Based on aspects such as the association of partnership, fund requirements, types of activities, etc. the appropriate business strucutre is chosen."
        //     ]
        // );

        // foreach ($bulkData as $key => $data) {
        //     $data['faq_id'] = 0;
        //     $data['faq_cat_id'] = 3;
        //     $data['faq_status'] = 1;
        //     $this->faqsCatDB->addEditFaq($data);
        // }

        if ($faqid == 0) {
            $faqData = [
                'faq_id' => 0,
                'faq_cat_id' => 0,
                'faq_title' => '',
                'faq_content' => '',
                'faq_status' => 1,
            ];
            $this->data['faqData'] = $faqData;
        } else {
            $faq = $this->faqsCatDB->getFaqByID($faqid);
            $faqData = [
                'faq_id' => $faq['faq_id'],
                'faq_cat_id' => $faq['faq_cat_id'],
                'faq_title' => $faq['faq_title'],
                'faq_content' => $faq['faq_content'],
                'faq_status' => intval($faq['faq_status']),
            ];
            $this->data['faqData'] = $faqData;
        }

        // add edit post request
        if ($this->request->getMethod() == 'post') {
            $thisData = [
                'faq_id' => $faqid,
                'faq_cat_id' => $this->request->getPost('faq_cat_id', FILTER_SANITIZE_NUMBER_INT),
                'faq_title' => $this->request->getPost('faq_title'),
                'faq_content' => $this->request->getPost('faq_content'),
                'faq_status' => $this->request->getPost('faq_status', FILTER_SANITIZE_NUMBER_INT),
            ];

            if ($faqid == 0) {
                $query = $this->faqsCatDB->addEditFaq($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/categories/faqs');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/categories/faqs/add');
                }
            } else {
                $query = $this->faqsCatDB->addEditFaq($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/service/categories/faqs');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/service/categories/faqs/edit/' . $faqid);
                }
            }
        }

        return view('Administrator/Dashboard/services/addEditServiceCatFaq', $this->data);
    }
    public function serviceCatFaqStatusChange($faqid)
    {
        $query = $this->faqsCatDB->statusChange($faqid);
        if ($query['status'] != 'success') {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
        }
        return redirect()->to('/administrator/service/categories/faqs');
    }
}
