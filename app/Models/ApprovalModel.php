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
        'approved_by',
    ];

    public function getAllApprov($keyword = null)
    {
        $this->select('approval.id, user_id, nama, approved_by, req_by, approval.created_at, approval.updated_at, approval.status');
        $this->join('alumni', 'alumni.id = approval.id_alumni');

        if ($keyword) {
            $this->like('nama', $keyword)
                ->orLike('approved_by', $keyword)
                ->orLike('approval.status', $keyword);
        }

        $query = $this->paginate(5, 'approval');

        return $query;
    }

    public function countNeedApprove()
    {
        $builder = $this;
        $builder->where('status', 'Need Approve');
        $query = $builder->countAllResults();

        return $query;
    }
}
