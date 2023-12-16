<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupUserModel extends Model
{
    protected $table = 'auth_groups_users';
    protected $primaryKey = 'user_id';

    protected $allowedFields = [
        'group_id',
    ];
}
