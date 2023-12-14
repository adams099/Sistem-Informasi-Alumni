<?php

namespace App\Controllers;

use App\Models\AlumniModel;


class Auth extends BaseController
{
    public function __construct()
    {
        $this->alumniModel = new AlumniModel();
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
            return view('user/index', $data);
        } else {
            return view('admin/index', $data);
        }
    }
}
