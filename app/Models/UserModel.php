<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'status_message',
        'user_image',
    ];

    public function getUsers($keyword = null)
    {
        $builder = $this;
        $builder->select('users.id, group_id as role, auth_groups.name, email, username, created_at, updated_at, user_image');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id');

        if ($keyword) {
            $builder->like('auth_groups.name', $keyword)
                ->orLike('email', $keyword)
                ->orLike('username', $keyword);
        }

        $query = $builder->paginate(5, 'user');

        return $query;
    }

    public function countRoleAdmin()
    {
        $builder = $this;
        $builder->join('auth_groups_users as group', 'group.user_id = users.id');
        $builder->where('group.group_id', 1);
        $query = $builder->countAllResults();

        return $query;
    }

    public function countRoleUser()
    {
        $builder = $this;
        $builder->join('auth_groups_users as group', 'group.user_id = users.id');
        $builder->where('group.group_id', 2);
        $query = $builder->countAllResults();

        return $query;
    }
}
