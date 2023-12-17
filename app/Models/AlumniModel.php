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

    public function getAlumni()
    {
        $builder = $this;
        $builder->select('users.id, email, telepon, nama, tanggal_lahir, nim, tahun_lulus, prodi, ipk, angkatan, pendidikan, prestasi, perkerjaan, posisi_pekerjaan, pencapaian_karir');
        $builder->join('users', 'alumni.user_id = users.id');
        $query = $builder->get()->getResult();

        return $query;
    }

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

    public function isRejected()
    {
        $data = ['status' => 'Rejected', 'user_id' => user_id()];
        $result = $this->where($data)->get()->getRow();

        return ($result !== null);
    }

    public function countAlumniApproved()
    {
        $builder = $this;
        $builder->where('status', 'Approved');
        $query = $builder->countAllResults();

        return $query;
    }
    public function countCumlaude()
    {
        $whereArr = [
            'status' => 'Approved',
            'ipk >=' => 3.5,
        ];

        $builder = $this;
        $builder->where($whereArr);
        $query = $builder->countAllResults();

        return $query;
    }
}
