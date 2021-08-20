<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\InitiavitesCategoryModel;
use App\Models\Admin\InitiavitesModel;

class Initiatives extends BaseController
{
    public function index()
    {
        $initiativeDB = new InitiavitesModel();
        $data = array();

        $admin = session()->get('admin');
        $data['admin'] =  $admin;
        $initiatives = $initiativeDB->orderBy('id', 'desc')->findAll();

        for ($index = 0; $index < count($initiatives); $index++) {
            $catDB = new InitiavitesCategoryModel();
            $category = $catDB->find($initiatives[$index]['category']);
            $initiatives[$index]['category_name'] = $category['name'];
        }
        $data['initiatives'] = $initiatives;

        $data['sessionData'] = session()->getFlashData('serviceStatusMessage');
        // $data['pageCSS'] = '';
        // $data['pageJS'] = '';
        // return print_r($data);

        return view('Administrator/Dashboard/initiatives/initiatives', $data);
    }
    public function categories($id = 0)
    {
        $data = array();

        $catDb = new InitiavitesCategoryModel();
        $data['categories'] = $catDb->getAllCategoriesAdmin();

        if ($id == 0) {
            $catData = [
                'id' => 0,
                'name' => '',
                'slug' => '',
            ];
            $data['catData'] = $catData;
        } else {
            $category = $catDb->getCategoryByID($id);
            $catData = [
                'id' => $category['id'],
                'name' => $category['name'],
                'slug' => $category['slug'],
            ];
            $data['catData'] = $catData;
        }

        // add edit category request
        if ($this->request->getMethod() == 'post') {
            $thisData = [
                'id' => $id,
                'name' => $this->request->getPost('name'),
            ];

            if ($id == 0) {
                $query = $catDb->addEditCategory($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/initiatives/categories');
                } else {
                    $data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/initiatives/categories');
                }
            } else {
                $query = $catDb->addEditCategory($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/initiatives/categories');
                } else {
                    $data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/initiatives/categories/' . $id);
                }
            }
        }
        // $data['pageCSS'] = '';
        // $data['pageJS'] = '';

        return view('Administrator/Dashboard/initiatives/initiativecategories', $data);
    }
    public function categoriesDelete($id)
    {
        $initiativeDB = new InitiavitesModel();
        $catDb = new InitiavitesCategoryModel();
        $initiatives = $initiativeDB->where(['category' => $id])->findAll();

        if ($initiatives != null) {
            $data['errorMessage'] = 'Please remove all initiatives from this category or change category from those initiatives, before deleting this category';
        } else {
            $deleting = $catDb->deleteCategory($id);
        }
        return redirect()->to('/administrator/initiatives/categories');
    }
    public function addEditInitiative($initiative_id = 0)
    {
        $data = array();
        helper('form', 'file');

        $initiativeDB = new InitiavitesModel();
        $catDb = new InitiavitesCategoryModel();

        if ($initiative_id == 0) {
            $initiativeData = [
                'id' => 0,
                'name' => '',
                'summary' => '',
                'image' => '',
                'description' => '',
                'category' => '',
                'tags' => '',
                'status' => 0,
                'home_status' => 0,
            ];
            $data['initiativeData'] = $initiativeData;
        } else {
            $initiative = $initiativeDB->getProjectByID($initiative_id);
            $initiativeData = [
                'id' => $initiative['id'],
                'name' => $initiative['name'],
                'summary' => $initiative['summary'],
                'image' => $initiative['image'],
                'description' => $initiative['description'],
                'category' => intval($initiative['category']),
                'tags' => $initiative['tags'],
                'status' => intval($initiative['status']),
                'home_status' => intval($initiative['home_status']),
            ];
            $data['initiativeData'] = $initiativeData;
        }

        // add edit post request
        if ($this->request->getMethod() == 'post') {
            $thisData = [
                'id' => $initiative_id,
                'name' => $this->request->getPost('name', FILTER_SANITIZE_STRING),
                'summary' => $this->request->getPost('summary', FILTER_SANITIZE_STRING),
                'description' => esc($this->request->getPost('description')),
                'category' => $this->request->getPost('category', FILTER_SANITIZE_NUMBER_INT),
                'tags' => $this->request->getPost('tags', FILTER_SANITIZE_STRING),
                'status' => $this->request->getPost('status', FILTER_SANITIZE_NUMBER_INT),
                'home_status' => $this->request->getPost('home_status', FILTER_SANITIZE_NUMBER_INT),
            ];

            if ($this->request->getFile('image')) {
                $img = $this->request->getFile('image');
                $imagePath = $this->uploadInitiativeImages($img);
                if ($imagePath) {
                    $thisData['image'] = $imagePath;
                }
            }

            if ($initiative_id == 0) {
                $query = $initiativeDB->addEditInitiative($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/initiatives');
                } else {
                    $data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/initiatives/add');
                }
            } else {
                $query = $initiativeDB->addEditInitiative($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/initiatives');
                } else {
                    $data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/initiatives/edit/' . $initiative_id);
                }
            }
        }

        // return print_r($initiativeData);

        $data['categories'] = $catDb->getAllCategoriesAdmin();
        $data['pageCSS'] = '<link rel="stylesheet" href="/public/dashboard/assets/css/editors/tinymce.css?ver=2.2.0">
        <link rel="stylesheet" href="/public/custom/assets/css/tagsInput.css">';

        $data['pageJS'] = '<script src="/public/dashboard/assets/js/libs/editors/tinymce.js?ver=2.2.0"></script>
        <script src="/public/dashboard/assets/js/editors.js?ver=2.2.0"></script>
        <script src="/public/custom/assets/js/tagsInput.js"></script>
        <script src="/public/custom/assets/js/adminAddEditInitiatives.js"></script>';

        return view('Administrator/Dashboard/initiatives/addeditinitiative', $data);
    }
    public function statusChange($initiative_id)
    {
        $initiativeDB = new InitiavitesModel();
        $query = $initiativeDB->changeStatus($initiative_id, 0);
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
    public function homeStatusChange($initiative_id)
    {
        $initiativeDB = new InitiavitesModel();
        $query = $initiativeDB->changeHomeStatus($initiative_id, 0);
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
