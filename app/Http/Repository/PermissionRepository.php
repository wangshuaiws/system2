<?php

namespace App\Http\Repository;

use App\Model\Permission;

class PermissionRepository
{
    /**
     * @param $attribute
     * @return static
     * 创建新的权限
     */
    public function create($attribute)
    {
        return Permission::create($attribute);
    }

    /**
     * @return mixed
     * 返回所有的权限
     */
    public function getAll()
    {
        return Permission::get();
    }

}