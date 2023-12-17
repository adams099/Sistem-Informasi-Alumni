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
            "status" => [['description' => 'Need Approve'], ['description' => 'Approved'], ['description' => 'Rejected']]
        ];
        return view('admin/approval', $data);
    }

    public function approvalUpdate()
    {
        $apprv_id = $this->request->getPost('apprv_id');
        $user_id = $this->request->getPost('user_id');
        $status = $this->request->getPost('approval');

        $data =  [
            'status' => $status,
            'approved_by' => user()->email,
        ];

        $this->approvModel->update($apprv_id, $data);
        $this->alumniModel->where('user_id', $user_id)->update(null, ['status' => $status]);

        return redirect()->to('/admin/approval');
    }

    public function deleteAlumni()
    {
        $userId = $this->request->getVar('user_id');
        $this->alumniModel->where('user_id', $userId)->delete();

        return redirect()->to('/alumni');
    }
}
