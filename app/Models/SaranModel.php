<?php

namespace App\Models;

use CodeIgniter\Model;

class SaranModel extends Model
{
    protected $table = 'saran';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'judul',
        'saran',
        'from',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function getFeedback($keyword = null)
    {

        $builder = $this;
        $builder->select('*');

        if ($keyword) {
            $builder->like('from', $keyword);
        }

        if (!in_groups('admin')) {
            $builder->where('user_id', user_id());
        }

        $query = $builder->paginate(6, 'feedback');

        return $query;
    }
}
