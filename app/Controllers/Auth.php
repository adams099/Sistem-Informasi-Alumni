<?php

namespace App\Controllers;

use App\Models\AlumniModel;
use App\Models\ApprovalModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->alumniModel = new AlumniModel();
        $this->userModel = new UserModel();
        $this->approvModel = new ApprovalModel();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function auth()
    {
        $alumni = $this->alumniModel->findAlumni();
        $status = $this->alumniModel->findStatus();

        $data = [
            "currentRoute" => 'dashboard',
            "breadcrumb" => 'Dashboard',
            "status" => $status,
            "alumni" => $alumni,
            "countAdmin" => $this->userModel->countRoleAdmin(),
        ];

        if (in_groups('user')) {
            $datas = [
                "currentRoute" => 'Biodata',
                "breadcrumb" => 'Form',
                "status" => $status,
                "alumni" => $alumni,
            ];

            if (!$alumni || !$status) {
                return view('user/form', $datas);
            }
            $data += [
                "countAlumni" => $this->alumniModel->countAlumniApproved(),
                "countCumlaude" => $this->alumniModel->countCumlaude(),
            ];
            return view('user/index', $data);
        } else {
            $data += [
                "countAdmin" => $this->userModel->countRoleAdmin(),
                "countUser" => $this->userModel->countRoleUser(),
                "countNeedApprove" => $this->approvModel->countNeedApprove(),
                "countAlumni" => $this->alumniModel->countAlumniApproved(),
            ];
            return view('admin/index', $data);
        }
    }
}
