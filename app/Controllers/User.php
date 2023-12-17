<?php

namespace App\Controllers;

use App\Models\AlumniModel;
use App\Models\ApprovalModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->alumniModel = new AlumniModel();
        $this->approvModel = new ApprovalModel();
        $this->status = $this->alumniModel->findStatus();
        $this->alumni = $this->alumniModel->findAlumni();
    }

    public function index()
    {
        $data = [
            "currentRoute" => 'List of Alumni',
            "breadcrumb" => 'Alumni',
            "alumniData" => $this->alumniModel->getAlumni(),
            "status" => $this->status,
            "alumni" => $this->alumni,
        ];
        return view('user/alumni', $data);
    }

    public function profile()
    {
        $data = [
            "currentRoute" => 'Profile',
            "breadcrumb" => 'Profile',
        ];
        return view('user/profile', $data);
    }

    public function form()
    {
        $data = [
            "currentRoute" => 'Biodata',
            "breadcrumb" => 'Form',
            "status" => $this->status,
            "alumni" => $this->alumni,
        ];
        return view('user/form', $data);
    }

    public function save()
    {
        $this->alumniModel->save([
            'nama' => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'telepon' => $this->request->getPost('telepon'),
            'nim' => $this->request->getPost('nim'),
            'prodi' => $this->request->getPost('prodi'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            'angkatan' => $this->request->getPost('angkatan'),
            'perkerjaan' => $this->request->getPost('perkerjaan'),
            'posisi_pekerjaan' => $this->request->getPost('posisi_pekerjaan'),
            'user_id' => user_id(),
            'status' => 'Need Approve',
            'pendidikan' => $this->request->getPost('pendidikan'),
            'prestasi' => $this->request->getPost('prestasi'),
            'pencapaian_karir' => $this->request->getPost('pencapaian_karir'),
            'ipk' => $this->request->getPost('ipk'),
        ]);

        $idAlumni = $this->alumniModel->insertID();

        $this->approvModel->save([
            'id_user' => user_id(),
            'status' => 'Need Approve',
            'req_by' => user()->email,
            'id_alumni' => $idAlumni,
        ]);

        return redirect()->to('/');
    }
}
