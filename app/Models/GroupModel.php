<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $table = 'auth_groups';

    public function getRole()
    {
        $builder = $this;
        return $builder->get()->getResult();
    }
}
