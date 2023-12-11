<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;

    public function getUsers()
    {
        $users = $this;
        $users->select('group_id as role, email, username, created_at, updated_at, user_image');
        $users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $query = $users->get()->getResult();

        return $query;
    }
}
