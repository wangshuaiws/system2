<?php

namespace App\Http\Repository;

use App\Model\Order;
use App\Notifications\DealOrderNotification;
use App\User;

class OrderRepository
{
    /**
     * @param $id
     * @param $status
     * @return $this|bool
     * 改变用户的预约状态
     */
    public function changeStatus($id,$status)
    {
        $orders = Order::findOrFail($id);
        $orders->status = $status;
        if($status) {
            $user = User::where('name',$orders->user_name)->first();
            $user->notify(new DealOrderNotification());
        }
        if($orders->save()) {
            return flash('操作成功','success')->important();
        }
        return false;
    }

    /**
     * @param $id
     * @param $status
     * @return $this|bool
     * 改变用户的预约是否被删除
     */
    public function changeRemove($id,$status)
    {
        $orders = Order::findOrFail($id);
        $orders->is_remove = $status;
        if($orders->save()) {
            return flash('操作成功','success')->important();
        }
        return false;
    }

    /**
     * @param $id
     * @return $this|bool
     * 从回收站中将预约删除
     */
    public function tDelete($id)
    {
        if(Order::find($id)->delete()) {
            return flash('已将预约彻底删除','danger')->important();
        }
        return false;
    }

}