<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
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
        //$users = User::with('roles.perms')->get();
        //$roles = Role::get();
        //return view('settings/membermanage',compact('users','roles'));
        return view('settings/membermanage');
    }
}
