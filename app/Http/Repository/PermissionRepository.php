<?php

namespace App\Http\Repository;

use App\Model\Permission;

class PermissionRepository
{
    public function create($attribute)
    {
        return Permission::create($attribute);
    }

    public function getAll()
    {
        return Permission::get();
    }

}