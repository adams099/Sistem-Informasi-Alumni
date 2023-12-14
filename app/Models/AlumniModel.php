<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table = 'alumni';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'telepon',
        'nim', 'prodi',
        'tahun_lulus',
        'angkatan',
        'perkerjaan',
        'posisi_pekerjaan',
        'user_id',
        'status',
        'pendidikan',
        'prestasi',
        'pencapaian_karir',
        'ipk',
    ];

    public function findAlumni()
    {
        $useridStatus = ['user_id' => user_id()];
        $result = $this->where($useridStatus)->get()->getRow();


        return ($result !== null);
    }

    public function findStatus()
    {
        $useridStatus = ['status' => 'Approved'];
        $result = $this->where($useridStatus)->get()->getRow();


        return ($result !== null);
    }
}
