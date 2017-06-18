<?php

namespace App\Http\Controllers;

use App\Http\Repository\OrderRepository;
use App\Model\Order;

class OrderController extends Controller
{
    protected $order;
    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 审核用户的预约
     */
    public function orderDeal($id)
    {
        if(!$this->order->changeStatus($id,1)) {
            flash('审核失败,请重新审核','danger')->important();
        }
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 删除用户的预约到回收站
     */
    public function orderDelete($id)
    {
        if(!$this->order->changeRemove($id,1)) {
            flash('删除失败','danger')->important();
        }
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 撤销咨询师的审核
     */
    public function orderBack($id)
    {
        if(!$this->order->changeStatus($id,0)) {
            flash('撤销审核失败,请重新撤销','danger')->important();
        }
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 从回收站中还原
     */
    public function restore($id)
    {
        if(!$this->order->changeRemove($id,0)) {
            flash('还原失败','danger')->important();
        }
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 从回收站中删除
     */
    public function tDelete($id)
    {
        if(!$this->order->tDelete($id)) {
            flash('删除失败，请重试','danger')->important();
        }
        return back();
    }
}
