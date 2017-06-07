<?php

namespace App\Http\Repository;

use App\Http\Requests\RoleRequest;
use App\Model\Role;
use Illuminate\Http\Request;

class RoleRepository
{
    public function create(RoleRequest $request,$attribute)
    {
        $role = Role::create($attribute);
        if($request->get('perm')){
            $role->attachPermissions($request->perm);
        }
        return $role;
    }

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

    public function deleteById($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }

    public function getAll()
    {
        return Role::get();
    }

    public function getWith($condition)
    {
        return Role::with($condition)->get();
    }
}