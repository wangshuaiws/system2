<?php

namespace App\Http\Repository;

use App\Http\Requests\RoleRequest;
use App\Model\Role;
use Illuminate\Http\Request;

class RoleRepository
{
    /**
     * @param RoleRequest $request
     * @param $attribute
     * @return static
     * 创建新的角色 赋予相应的权限
     */
    public function create(RoleRequest $request,$attribute)
    {
        $role = Role::create($attribute);
        if($request->get('perm')){
            $role->attachPermissions($request->perm);
        }
        return $role;
    }

    /**
     * @param RoleRequest $request
     * @param $id
     * 更新用户的角色 更新权限
     */
    public function updateById(RoleRequest $request,$id)
    {
        $role = Role::findOrFail($id);
        if($role->name !=='admin'){
            $role->name = $request->get('name');
        }
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        $role->savePermissions($request->perm);
    }

    /**
     * @param $id
     * 删除角色
     */
    public function deleteById($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }

    /**
     * @return mixed
     * 得到所有的角色
     */
    public function getAll()
    {
        return Role::get();
    }

    /**
     * @param $condition
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * 通过权限 获取角色
     */
    public function getWith($condition)
    {
        return Role::with($condition)->get();
    }
}