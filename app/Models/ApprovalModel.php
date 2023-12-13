<?php

namespace App\Models;

use CodeIgniter\Model;

class ApprovalModel extends Model
{
    protected $table = 'approval';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'status',
        'req_by',
        'id_user',
        'id_alumni',
    ];
}
