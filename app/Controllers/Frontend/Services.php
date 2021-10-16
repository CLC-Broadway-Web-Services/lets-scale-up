<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Entities\MetaTags;
use App\Models\Admin\OrderModel;
use App\Models\Admin\ServiceQuery;
use App\Models\Admin\Settings;
use App\Models\Globals\FrontservicesModel;
use App\Models\Globals\ServiceExtraQueryModel;
use DateTime;
use Razorpay\Api\Api;

class Services extends BaseController
{
    private $serviceDB;
    private $session;

    public function __construct()
    {
        $this->session = session();
        $this->data['user'] = $this->session->get('user');
        $this->serviceDB = new FrontservicesModel();
        helper('file');
        helper('form');
    }
    public function singleService($slug = null)
    {
        if ($slug == null) {
            return redirect()->to(base_url());
        }

        if ($this->request->getMethod() == 'post') {
            if ($this->request->getVar('service_getstarted_form')) {
                return print_r($this->request->getVar());
                // save data to database alongwith service id
            }
            if ($this->request->getVar('form_name') == 'another_request') {
                // return print_r($this->request->getVar());
                $dataToSave = $this->request->getVar();
                unset($dataToSave['form_name']);
                unset($dataToSave['send']);
                $serviceExtraDb = new ServiceExtraQueryModel();
                $query = $serviceExtraDb->save($dataToSave);
                $respose = array(
                    'status' => true,
                    'class' => 'success',
                    'message' => 'Your message recieved succesfully, we will contact you within 72 hours.',
                );
                session()->setFlashdata('service_anything_else_response', $respose);
                // $this->data['statusMessage'] = session()->getFlashdata('service_anything_else_response');
                redirect()->route('service_detail', [$slug]);
            }
        }

        $service = $this->serviceDB->getSingleServiceBySlug($slug);
        $postMeta = new MetaTags();
        $postMeta->title = $service['service_title'];
        $postMeta->description = $service['service_summary'];
        // $postMeta->keywords = $service['post_tags'];
        // $postMeta->author = $service['post_title'];
        // $postMeta->owner = $service['post_title'];
        $postMeta->type = 'service';
        $this->data['meta'] = $postMeta;
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

        $this->data['pageJS'] = '<script src="/public/custom/assets/js/frontSingleService.js"></script>';

        return view('Frontend/pages/singleServicePackages', $this->data);
    }
    public function serviceSelectedPackage($service_slug = null, $package_id)
    {
        $user_id = 0;
        if ($this->data['user']) {
            $user_id = $this->data['user']['id'];
        }
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
        // return print_r($forms);

        if ($this->request->getMethod() == 'post') {

            $date = new DateTime();
            $dateTime = $date->format('Y-m-d H:i:s');
            $unique_code = strtotime($dateTime);
            $postVars = $this->request->getPost();
            $keys = array_keys($postVars);
            $keysToFind = [];
            $userDetailsKeys = [];

            foreach ($keys as $key => $value) {
                $search = '__';
                if (preg_match("/{$search}/i", $value)) {
                    $expStr = explode("__", $value);
                    $numb = intval($expStr[0]);
                    $keysToFind[$numb][] = $expStr[1];
                } else {
                    $userDetailsKeys[] = $value;
                }
            }

            $formData = [];
            $index = 0;

            foreach ($keysToFind as $key => $valuex) {
                $index++;
                $formKey = array_search($key, array_column($forms, 'form_id'));
                $form_id = $forms[$formKey]['form_id'];
                $service_id = $forms[$formKey]['service_id'];
                $form_heading = $forms[$formKey]['form_heading'];
                $form_fields = $forms[$formKey]['form_fields'];
                $form_is_multiple = $forms[$formKey]['form_is_multiple'];
                $total_fields = count($form_fields);
                $total_values = count($valuex);
                $repeating_values = 1;
                if ($total_fields < $total_values) {
                    $repeated = intval($total_values / $total_fields);
                    $repeating_values = $repeated;
                }

                $formData[$index]['user_id'] = $user_id;
                $formData[$index]['package_id'] = $package_id;
                $formData[$index]['unique_code'] = $unique_code;
                $formData[$index]['form_index'] = $index;
                $formData[$index]['form_id'] = $form_id;
                $formData[$index]['service_id'] = $service_id;
                $formData[$index]['form_heading'] = $form_heading;
                $formData[$index]['form_is_multiple'] = $form_is_multiple;
                $formData[$index]['total_fields'] = $total_fields;
                $formData[$index]['total_values'] = $total_values;
                $formData[$index]['repeating_values'] = $repeating_values;

                $index2 = 0;
                $arrayChunk = array_chunk($valuex, $total_fields);
                // print_r($arrayChunk);
                foreach ($arrayChunk as $keyChunk => $valueChunk) {
                    foreach ($valueChunk as $inputName) {
                        $index2++;
                        $postVariable = $form_id . '__' . $inputName;
                        $sortedKey = $inputName;
                        if (preg_match('/.*_.*/', $inputName)) {
                            $explodeX = explode("_", $inputName);
                            $sortedKey = $explodeX[0];
                        }
                        $inputDataKey = array_search($sortedKey, array_column($form_fields, 'field_name'));
                        $newData = [
                            'required' => $form_fields[$inputDataKey]->required,
                            'type' => $form_fields[$inputDataKey]->input_type,
                            'name' => $form_fields[$inputDataKey]->label,
                            'value' => $this->request->getPost($postVariable)
                        ];
                        // print_r($newData);
                        $formData[$index]['form_fields'][$keyChunk][] = $newData;
                    }
                }
            }

            // print_r($keyValueHereForCheck);
            // print_r($postVariableForCheck);
            // print_r($keysToFind);

            foreach ($formData as $index => $form) {
                $formData[$index]['form_fields'] = json_encode($form['form_fields']);
            }
            $formQuery = new ServiceQuery();
            foreach ($formData as $form) {
                $formQuery->save($form);
            }
            // create order

            $settingMd = new Settings();
            $razorCred = $settingMd->getRazorpayApi();
            // echo '<pre>';
            // print_r($settingMd->getRazorpayApi());
            // echo '</pre>';
            // return;
            $api = new Api($razorCred['api'], $razorCred['secret']);
            $onlineOrder  = $api->order->create([
                'receipt' => $unique_code,
                'amount'  => $package['package_price'] * 100,
                'currency' => 'INR'
            ]);
            $orderData = [
                'user_id' => $user_id,
                'service_id' => $service['service_id'],
                'package_id' => $package_id,
                'unique_id' => $unique_code,
                'base_price' => $package['package_basic_price'],
                'govt_fee' => $package['package_gov_fee'],
                'shipping' => $package['package_shipping'],
                'discount' => $package['package_discount'],
                'gst' => $package['package_gst'],
                'total_amount' => $package['package_price'],
                'online_order_id' => $onlineOrder['id']
            ];
            $order_md = new OrderModel();
            $orderId = $order_md->insertId($order_md->save($orderData));

            return redirect()->route('checkout_order', [$orderId]);

            // print_r($formData);
            // return;
        }
        // return print_r($this->data);

        $this->data['pageJS'] = '<script src="/public/dashboard/assets/js/libs/jquery.validate.min.js"></script>
        <script src="/public/custom/assets/js/frontSingleService.js"></script>';

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
