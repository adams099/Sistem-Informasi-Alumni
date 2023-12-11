<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            "currentRoute" => 'List of Alumni',
            "breadcrumb" => 'Alumni',
        ];
        return view('user/alumni', $data);
    }
}
