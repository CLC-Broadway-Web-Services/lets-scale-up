<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Initiative\InitiativeModel;

class Initiatives extends BaseController
{
	protected $initiative_md;
	public function __construct()
	{
		$this->data['admin'] = session()->get('admin');
		$this->initiative_md = new InitiativeModel();
        helper('form', 'file');
	}
    public function index()
    {
        $initiatives = $this->initiative_md->getAllInitiativesAdmin();

        $this->data['initiatives'] = $initiatives;

        $this->data['sessionData'] = session()->getFlashData('serviceStatusMessage');
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';
        // return print_r($this->data);

        return view('Administrator/Dashboard/initiatives/initiatives', $this->data);
    }
    public function addEditInitiative($id = 0)
    {
        if ($id == 0) {
            $initiativeData = [
                'id' => 0,
                'name' => '',
                'summary' => '',
                'image' => '',
                'description' => '',
                'tags' => '',
                'status' => '',
                'home_view' => 0,
            ];
            $this->data['initiativeData'] = $initiativeData;
        } else {
            $initiative = $this->initiative_md->getInitiativeByID($id);
            $initiativeData = [
                'id' => $initiative['id'],
                'name' => $initiative['name'],
                'summary' => $initiative['summary'],
                'image' => $initiative['image'],
                'description' => $initiative['description'],
                'tags' => $initiative['tags'],
                'status' => intval($initiative['status']),
                'home_view' => intval($initiative['home_view']),
            ];
            $this->data['initiativeData'] = $initiativeData;
        }

        // add edit post request
        if ($this->request->getMethod() == 'post') {
            $thisData = [
                'id' => $id,
                'name' => $this->request->getPost('name', FILTER_SANITIZE_STRING),
                'summary' => $this->request->getPost('summary', FILTER_SANITIZE_STRING),
                'description' => esc($this->request->getPost('description')),
                'tags' => $this->request->getPost('tags', FILTER_SANITIZE_STRING),
                'status' => $this->request->getPost('status', FILTER_SANITIZE_NUMBER_INT),
                'home_view' => $this->request->getPost('home_view', FILTER_SANITIZE_NUMBER_INT),
            ];

            if ($this->request->getFile('image')) {
                $img = $this->request->getFile('image');
                $imagePath = $this->uploadInitiativeImages($img);
                if ($imagePath) {
                    $thisData['image'] = $imagePath;
                }
            }

            if ($id == 0) {
                $query = $this->initiative_md->addEditInitiative($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/initiatives');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/initiative/add');
                }
            } else {
                $query = $this->initiative_md->addEditInitiative($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/initiatives');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/initiative/edit/' . $id);
                }
            }
        }

        // return print_r($initiativeData);

        $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/dashboard/assets/css/editors/tinymce.css?ver=2.2.0">
        <link rel="stylesheet" href="/public/custom/assets/css/tagsInput.css">';

        $this->data['pageJS'] = '<script src="/public/dashboard/assets/js/libs/editors/tinymce.js?ver=2.2.0"></script>
        <script src="/public/dashboard/assets/js/editors.js?ver=2.2.0"></script>
        <script src="/public/custom/assets/js/tagsInput.js"></script>
        <script src="/public/custom/assets/js/adminAddEditInitiative.js"></script>';

        return view('Administrator/Dashboard/initiatives/addedit', $this->data);
    }
    public function statusChange($service_id)
    {
        
        $query = $this->initiative_md->changeStatus($service_id);
        if ($query['status'] == 'success') {
            return redirect()->to('/administrator/initiatives');
        } else {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
            return redirect()->to('/administrator/initiatives');
        }
    }
    public function homeStatusChange($service_id)
    {
        
        $query = $this->initiative_md->changeHomeStatus($service_id);
        if ($query['status'] == 'success') {
            return redirect()->to('/administrator/initiatives');
        } else {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
            return redirect()->to('/administrator/initiatives');
        }
    }
    private function uploadInitiativeImages($file)
    {
        $img = $file;
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $imageLocation = 'initiativeImages/' . date('dMY');
            $img->move($imageLocation, $newName);
            return '/' . $imageLocation . '/' . $newName;
        }
        return false;
    }
}
