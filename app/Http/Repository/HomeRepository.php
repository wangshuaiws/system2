<?php

namespace App\Http\Repository;

use App\Model\Order;
use App\Model\Application;
use App\Model\Role;
use App\User;

class HomeRepository
{
    /**
     * @return bool
     * 当用户访问首页时，检查用户是否有角色 如果没有 赋予用户角色
     */
    public function givePermission()
    {
        $roles = user()->role()->first();
        if(!$roles){
            if(user()->permission == 0)
            {
                $role = Role::where('name','user')->first();
                user()->attachRole($role);
                return true;
            }else {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $id
     * @return mixed
     * 返回未被删除的预约
     */
    public function showOrder($id)
    {
        return Order::where(['status' => $id,'is_remove' => 0,'order_name' => user()->name])->get();
    }

    /**
     * @param $id
     * @return mixed
     * 返回未被删除的量表
     */
    public function showScale($id)
    {
        return user()->scale()->where(['completed' => $id,'is_remove' => 0])->get();
    }

    /**
     * @param $id
     * @return mixed
     * 返回未被删除的申请
     */
    public function showApply($id)
    {
        return Application::where(['status' => $id,'is_remove' => 0])->get();
    }

    /**
     * @return mixed
     * 返回当前用户的角色
     */
    public function getUserRoles()
    {
        return user()->role()->first();
    }

    /**
     * @return $this
     * 申请成为咨询师处理的逻辑
     */
    public function create()
    {
        $user = user();
        $apply = Application::where('user_id',$user->id)->first();
        if(!$apply){
            Application::create(
                [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'sex' => $user->sex,
                    'status' => '0'
                ]);
            return flash('申请成功','success')->important();
        }
        return flash('已提交申请，不能重复申请','danger')->important();
    }

    /**
     * @return $this
     * 管理员审核用户申请的逻辑
     */

    public function checkUser($id)
    {
        $deal = Application::where('user_id',$id)->first();
        $deal->status = 1;
        $deal->save();

        $user = User::findOrFail($id);
        $user->permission = 1;
        $user->save();
        $role_manage = Role::where('name','counselor')->first();
        $user->attachRole($role_manage);
        $users = Role::where('name','user')->first();
        $user->roles()->detach($users);
        return flash('审核成功','success')->important();
    }

    /**
     * @param $id
     * @return $this
     * 撤销审核 将角色从咨询师降到普通用户
     */
    public function backCheck($id)
    {
        $deal = Application::where('user_id',$id)->first();
        $deal->status = 0;
        $deal->save();

        $user = User::findOrFail($id);
        $user->permission = 0;
        $user->save();
        $users = Role::where('name','user')->first();
        $user->attachRole($users);
        $role_manage = Role::where('name','counselor')->first();
        $user->roles()->detach($role_manage);
        return flash('撤销审核成功,该用户已不是咨询师','success')->important();
    }

    /**
     * @param $id
     * @return $this
     * 将用户的申请删除到回收站
     */
    public function deleteApply($id)
    {
        $apply = Application::findOrFail($id);
        $apply->is_remove = 1;
        $apply->save();
        return flash('成功删除到回收站','success')->important();
    }

    /**
     * @param $id
     * @return $this
     * 从回收站中将用户的申请还原
     */
    public function backApply($id)
    {
        $apply = Application::findOrFail($id);
        $apply->is_remove = 0;
        $apply->save();
        return flash('还原成功','success')->important();
    }

    /**
     * @param $id
     * @return $this
     * 从回收站中删除用户的申请
     */
    public function tDelete($id)
    {
        Application::find($id)->delete();
        return flash('已彻底删除','danger')->important();
    }
}