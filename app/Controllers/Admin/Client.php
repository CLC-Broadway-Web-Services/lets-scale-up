<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Client\ClientCategoryModel;
use App\Models\Client\ClientModel;

class Client extends BaseController
{
	protected $client_md;
	protected $client_cat_md;
	public function __construct()
	{
		$this->data['admin'] = session()->get('admin');
		$this->client_md = new ClientModel();
		$this->client_cat_md = new ClientCategoryModel();
        helper('form', 'file');
	}
    public function index()
    {
        $clients = $this->client_md->select('id, name, category, tags, status, home_view, created_at, updated_at')->orderBy('id', 'desc')->findAll();

        for ($index = 0; $index < count($clients); $index++) {
            
            $category = $this->client_cat_md->find($clients[$index]['category']);
            $clients[$index]['category_name'] = $category['name'];
        }
        $this->data['clients'] = $clients;

        $this->data['sessionData'] = session()->getFlashData('serviceStatusMessage');

        return view('Administrator/Dashboard/clients/clients', $this->data);
    }
    public function categories($id = 0)
    {
        $this->data['categories'] = $this->client_cat_md->getAllCategoriesAdmin();

        if ($id == 0) {
            $catData = [
                'id' => 0,
                'name' => '',
                'slug' => '',
            ];
            $this->data['catData'] = $catData;
        } else {
            $category = $this->client_cat_md->getCategoryByID($id);
            $catData = [
                'id' => $category['id'],
                'name' => $category['name'],
                'slug' => $category['slug'],
            ];
            $this->data['catData'] = $catData;
        }

        // add edit category request
        if ($this->request->getMethod() == 'post') {
            $thisData = [
                'id' => $id,
                'name' => $this->request->getPost('name'),
            ];

            if ($id == 0) {
                $query = $this->client_cat_md->addEditCategory($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/client/categories');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/client/categories');
                }
            } else {
                $query = $this->client_cat_md->addEditCategory($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/client/categories');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/client/categories/' . $id);
                }
            }
        }
        // $this->data['pageCSS'] = '';
        // $this->data['pageJS'] = '';

        return view('Administrator/Dashboard/clients/categories', $this->data);
    }
    public function categoriesDelete($id)
    {
        $clients = $this->client_md->where(['category' => $id])->findAll();

        if ($clients != null) {
            $this->data['errorMessage'] = 'Please remove all Clients from this category or change category from those Clients, before deleting this category';
        } else {
            $deleting = $this->client_cat_md->deleteCategory($id);
        }
        return redirect()->to('/administrator/client/categories');
    }
    public function addEditClient($id = 0)
    {
        
        helper('form', 'file');

        
        

        if ($id == 0) {
            $clientData = [
                'id' => 0,
                'name' => '',
                'summary' => '',
                'image' => '',
                'description' => '',
                'category' => '',
                'tags' => '',
                'status' => '',
                'home_view' => 0,
            ];
            $this->data['clientData'] = $clientData;
        } else {
            $client = $this->client_md->getClientByID($id);
            $clientData = [
                'id' => $client['id'],
                'name' => $client['name'],
                'summary' => $client['summary'],
                'image' => $client['image'],
                'description' => $client['description'],
                'category' => intval($client['category']),
                'tags' => $client['tags'],
                'status' => intval($client['status']),
                'home_view' => intval($client['home_view']),
            ];
            $this->data['clientData'] = $clientData;
        }

        // add edit post request
        if ($this->request->getMethod() == 'post') {
            $thisData = [
                'id' => $id,
                'name' => $this->request->getPost('name', FILTER_SANITIZE_STRING),
                'summary' => $this->request->getPost('summary', FILTER_SANITIZE_STRING),
                'description' => esc($this->request->getPost('description')),
                'category' => $this->request->getPost('category', FILTER_SANITIZE_NUMBER_INT),
                'tags' => $this->request->getPost('tags', FILTER_SANITIZE_STRING),
                'status' => $this->request->getPost('status', FILTER_SANITIZE_NUMBER_INT),
                'home_view' => $this->request->getPost('home_view', FILTER_SANITIZE_NUMBER_INT),
            ];

            if ($this->request->getFile('image')) {
                $img = $this->request->getFile('image');
                $imagePath = $this->uploadClientImages($img);
                if ($imagePath) {
                    $thisData['image'] = $imagePath;
                }
            }

            if ($id == 0) {
                $query = $this->client_md->addEditClient($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/clients');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/client/add');
                }
            } else {
                $query = $this->client_md->addEditClient($thisData);
                if ($query['status'] == 'success') {
                    return redirect()->to('/administrator/clients');
                } else {
                    $this->data['errorMessage'] = $query['message'];
                    return redirect()->to('/administrator/client/edit/' . $id);
                }
            }
        }

        // return print_r($clientData);

        $this->data['categories'] = $this->client_cat_md->getAllCategoriesAdmin();
        $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/dashboard/assets/css/editors/tinymce.css?ver=2.2.0">
        <link rel="stylesheet" href="/public/custom/assets/css/tagsInput.css">';

        $this->data['pageJS'] = '<script src="/public/dashboard/assets/js/libs/editors/tinymce.js?ver=2.2.0"></script>
        <script src="/public/dashboard/assets/js/editors.js?ver=2.2.0"></script>
        <script src="/public/custom/assets/js/tagsInput.js"></script>
        <script src="/public/custom/assets/js/adminAddEditClient.js"></script>';

        return view('Administrator/Dashboard/clients/addedit', $this->data);
    }
    public function statusChange($service_id)
    {
        
        $query = $this->client_md->changeStatus($service_id);
        if ($query['status'] == 'success') {
            return redirect()->to('/administrator/clients');
        } else {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
            return redirect()->to('/administrator/clients');
        }
    }
    public function homeStatusChange($service_id)
    {
        
        $query = $this->client_md->changeHomeStatus($service_id);
        if ($query['status'] == 'success') {
            return redirect()->to('/administrator/clients');
        } else {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
            return redirect()->to('/administrator/clients');
        }
    }
    private function uploadClientImages($file)
    {
        $img = $file;
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $imageLocation = 'clientImages/' . date('dMY');
            $img->move($imageLocation, $newName);
            return '/' . $imageLocation . '/' . $newName;
        }
        return false;
    }
}
