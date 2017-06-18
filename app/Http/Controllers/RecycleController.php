<?php

namespace App\Http\Controllers;

use App\Http\Repository\RecycleRepository;

class RecycleController extends Controller
{
    protected $recycles;
    public function __construct(RecycleRepository $recycles)
    {
        $this->recycles = $recycles;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示回收站界面 传入所需的数据
     */
    public function recycleShow()
    {
        $scales  = $this->recycles->returnScales();
        $applies = $this->recycles->returnApplies();
        $scale   = $this->recycles->returnScale();
        $orders  = $this->recycles->returnOrders();
        return view('recycle/recyclebin',compact('scales','applies','scale','orders'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 从回收站中删除量表
     */
    public function tDelete($id)
    {
        $this->recycles->tDelete($id);
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 从回收站中将量表还原
     */
    public function back($id)
    {
        $this->recycles->back($id);
        return back();
    }

}
