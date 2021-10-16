<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\TeamModel;

class Team extends BaseController
{
    public function index()
    {
        $data = array();

        $admin = session()->get('admin');
        $data['admin'] =  $admin;
        $teamDb = new TeamModel();
        $teams = $teamDb->orderBy('member_id')->findAll();
        $data['teams'] =  $teams;
        // print_r($teams);
        // $data['pageCSS'] = '';
        // $data['pageJS'] = '';

        return view('Administrator/Dashboard/Team/teams', $data);
    }
    public function addEditMember($member_id = 0)
    {
        $data = array();

        $admin = session()->get('admin');
        $data['admin'] =  $admin;
        $teamDb = new TeamModel();

        if ($member_id == 0) {
            $memberData = [
                'member_id' => 0,
                'member_name' => '',
                'member_image' => '',
                'member_email' => '',
                'member_mobile' => '',
                'member_position' => '',
                'member_facebook' => '',
                'member_linkedin' => '',
                'member_twitter' => '',
                'member_about' => '',
                'member_status' => '',
            ];
            $data['memberData'] = $memberData;
        } else {
            $memberData = $teamDb->find($member_id);
            $data['memberData'] = $memberData;
        }


        // add edit category request
        if ($this->request->getMethod() == 'post') {
            $vars = $this->request->getVar();
            // return print_r($vars);
            if ($this->request->getFile('member_image')) {
                $img = $this->request->getFile('member_image');
                $imagePath = $this->uploadTeamProfileImage($img);
                if ($imagePath) {
                    $vars['member_image'] = $imagePath;
                }
            } else {
                unset($vars['member_image']);
            }

            $query = $teamDb->addEditMember($vars, $member_id);
            if ($query['status'] == 'success') {
                return redirect()->route('admin_team_index');
            } else {
                $data['errorMessage'] = $query['message'];
                if ($member_id == 0) {
                    return redirect()->route('admin_team_index');
                } else {
                    return redirect()->route('admin_team_edit', [$member_id]);
                }
            }
        }
        // $data['pageCSS'] = '';
        // $data['pageJS'] = '';

        return view('Administrator/Dashboard/Team/addeditteam', $data);
    }
    private function uploadTeamProfileImage($file)
    {
        $img = $file;
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $imageLocation = 'team_members/' . date('dMY');
            $img->move($imageLocation, $newName);
            return '/' . $imageLocation . '/' . $newName;
        }
        return false;
    }
    public function memberStatusChange($memberId)
    {
        $teamDb = new TeamModel();
        $query = $teamDb->statusChange($memberId);
        if ($query['status'] != 'success') {
            $message = array(
                'serviceStatusMessage' => $query['message']
            );
            session()->setFlashdata($message);
        }
        // return redirect()->to('/administrator/blogs');
        return redirect()->route('admin_team_index');
    }
}
