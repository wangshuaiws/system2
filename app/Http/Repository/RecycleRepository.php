<?php

namespace App\Http\Repository;

use App\Model\Order;
use App\Model\Scale;
use App\Model\Application;
use Illuminate\Support\Facades\DB;

class RecycleRepository
{
    /**
     * @return mixed
     * 返回当前用户被移除的量表记录
     */
    public function returnScales()
    {
        return Scale::where(['is_remove' => 1,'name' => user()->name])->get();
    }

    /**
     * @return mixed
     * 返回被删除到回收站的量表
     */
    public function returnScale()
    {
        return DB::select('select * from scale_manage where is_remove = 1');
    }

    /**
     * @return mixed
     * 返回被删除到回收站的用户申请
     */
    public function returnApplies()
    {
        return Application::where(['is_remove' => 1])->get();
    }

    /**
     * @return mixed
     * 返回被删除的用户的预约
     */
    public function returnOrders()
    {
        return Order::where(['is_remove' => 1,'order_name' => user()->name])->get();
    }

    /**
     * @param $id
     * @return $this
     * 从回收站中删除量表
     */
    public function tDelete($id)
    {
        $delete = DB::delete('delete from scale_manage where id = ?',[$id]);
        if($delete) {
            return flash('彻底删除该量表','danger')->important();
        }
        return flash('删除量表失败','danger')->important();
    }

    /**
     * @param $id
     * @return $this
     * 从回收站中还原量表
     */
    public function back($id)
    {
        $update = DB::update('update scale_manage set is_remove = 0 where id = ?', [$id]);
        if($update) {
            return flash('还原成功','success')->important();
        }
        return flash('还原失败','danger')->important();

    }

}