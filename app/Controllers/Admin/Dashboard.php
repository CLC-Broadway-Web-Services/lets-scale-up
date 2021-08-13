<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = array();

        $admin = session()->get('admin');
        $data['admin'] =  $admin;
        // $data['pageCSS'] = '';
        // $data['pageJS'] = '';
        // print_r(route_to('admin_index').'/service');
        // echo route_to('admin_index');
        // echo '<br>';
        // echo uri_string();
        // echo '<br>';
        // print_r('/'.uri_string());
        // echo strstr(uri_string(), 'administrator') ? 'active' : 'notactive';
        // echo preg_match("/{route_to('admin_index')}/i", uri_string()) ? 'active' : 'notactive';
        // return;

        return view('Administrator/Dashboard/dashboard', $data);
    }
}
