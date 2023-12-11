<?php

namespace App\Controllers;

class Auth extends BaseController
{
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
        $data = [
            "currentRoute" => 'dashboard',
            "breadcrumb" => 'Dashboard',
        ];
        if (in_groups('user')) {
            return view('user/index', $data);
        } else {
            return view('admin/index', $data);
        }
    }
}
