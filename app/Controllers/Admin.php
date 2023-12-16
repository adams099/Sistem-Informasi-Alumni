<?php

namespace App\Controllers;

use App\Models\AlumniModel;
use App\Models\ApprovalModel;
use App\Models\GroupModel;
use App\Models\UserModel;
use App\Models\GroupUserModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->approvModel = new ApprovalModel();
        $this->groupsModel = new GroupModel();
        $this->groupsUserModel = new GroupUserModel();
        $this->alumniModel = new AlumniModel();
    }

    public function users()
    {
        $data = [
            "currentRoute" => 'List of User',
            "breadcrumb" => 'Users',
            'userData' => $this->userModel->getUsers(),
            'group' => $this->groupsModel->getRole(),
        ];
        return view('admin/users', $data);
    }

    public function update()
    {
        $userId = $this->request->getPost('user_id');
        $id = $userId;
        $data =  [
            'group_id' => $this->request->getPost('auth_group'),
        ];

        $this->groupsUserModel->update($id, $data);
        $this->userModel->update($id, ['status_message' => 'updated']);
        $this->alumniModel->where('user_id', $userId)->delete();


        return redirect()->to('/admin/users');
    }

    public function approval()
    {
        $data = [
            "currentRoute" => 'Approval',
            "breadcrumb" => 'Approval',
            "approval" => $this->approvModel->getAllApprov(),
        ];
        return view('admin/approval', $data);
    }
}
