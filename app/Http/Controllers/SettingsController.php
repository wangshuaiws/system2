<?php

namespace App\Http\Controllers;

use App\Http\Repository\RoleRepository;
use App\Http\Repository\UserRepository;

class SettingsController extends Controller
{
    public function __construct(RoleRepository $role,UserRepository $user)
    {
        $this->role = $role;
        $this->user = $user;
    }
    public function system()
    {
        return view('settings/system');
    }
    //数据备份
    public function data()
    {
        return view('settings/data');
    }
    //角色管理
    public function rolemanage()
    {
        return view('settings/rolemanage');
    }
    //成员管理
    public function membermanage()
    {
        $users = $this->user->getWith('roles.perms');
        $roles = $this->role->getAll();
        return view('settings/membermanage',compact('users','roles'));
    }
}
