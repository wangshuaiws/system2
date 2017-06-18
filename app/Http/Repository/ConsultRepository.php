<?php

namespace App\Http\Repository;

use App\Model\Information;
use App\Model\Order;
use App\Model\Role;
use App\User;
class ConsultRepository
{
    /**
     * @param $status
     * @return mixed
     */
    //查询咨询师是否审核当前用户的预约
    public function status_query($status)
    {
        $users = user();
        return order::where(['status'=> $status,'user_name'=>$users->name])->get();
    }

    /**
     * @param $arr
     * @return $this
     */
    //处理用户预约的逻辑
    public function order($arr)
    {
        if($arr) {
            $users = user();
            $order = User::where('id',$arr['nameList'])->first();
            $date = Order::where(['date' => $arr['dateSelect'],'order_name' => $order->name])->first();
            if($date) {
                return flash('预约失败,预约已存在','danger')->important();
                //return back();
            }
            if($arr['dateSelect'])
            {
                order::create([
                    'user_name' => $users->name,
                    'order_name' => $order->name,
                    'status' => 0,
                    'date' => $arr['dateSelect']
                ]);
                return flash('预约成功','success')->important();
            }
        }
    }

    /**
     * @return mixed
     * 显示所有的咨询师
     */
    public function listRole()
    {
        return Role::find(2)->user->pluck('name','id');
    }

    public function information()
    {
        return Information::where(['is_remove' => 0,'name' => user()->name])->get();
    }

    public function delete($id)
    {
        Information::where('id',$id)->delete();
        return flash('删除成功','success')->important();
    }

    public function add($request)
    {
        if(!$request->name) {
            return flash('请填写咨询方式','danger')->important();
        }
        if(!$request->place) {
            return flash('请填写咨询地点','danger')->important();
        }
        if(!$request->type) {
            return flash('请填写问题类型','danger')->important();
        }
        Information::create([
            'name' => user()->name,
           'ways' => $request->name,
           'places' => $request->place,
           'type' => $request->type,
            'is_remove' => 0
        ]);
        return flash('添加信息成功','success')->important();
    }
}