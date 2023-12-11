<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            "currentRoute" => 'dashboard',
        ];
        return view('admin/index', $data);
    }

    public function users()
    {
        $data = [
            "currentRoute" => 'List of User',
            "breadcrumb" => 'Users',
            'userData' => $this->userModel->getUsers(),
        ];
        return view('admin/users', $data);
    }
}
