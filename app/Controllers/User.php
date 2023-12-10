<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            "currentRoute" => 'dashboard',
        ];
        if (in_groups('user')) {
            return view('user/index', $data);
        } else {
            return view('admin/index', $data);
        }
    }

    public function alumni()
    {
        $data = [
            "currentRoute" => 'List of Alumni',
        ];
        return view('user/alumni', $data);
    }
}
