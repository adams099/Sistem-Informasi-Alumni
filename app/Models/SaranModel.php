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
}
