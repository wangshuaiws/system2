<?php

namespace App\Http\Repository;

use App\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function updateById(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->permission = 1;
        $user->save();
        if($roleArray = $request->role){
            $user->roles()->sync($roleArray);
        }else{
            $user->roles()->detach();
        }

        if($user->is_admin())
        {
            $admin = Role::where('name','admin')->first();
            $user->attachRole($admin);
        }
    }

    public function getAll()
    {
        return User::get();
    }

    public function getWith($condition)
    {
        return User::with($condition)->get();
    }

}