<?php

namespace App\Controllers;

class Admin extends BaseController
{
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
        ];
        return view('admin/users', $data);
    }
}
