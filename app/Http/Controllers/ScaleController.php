<?php

namespace App\Http\Controllers;

use App\Http\Repository\HomeRepository;
use App\Http\Repository\ScaleRepository;
use Illuminate\Http\Request;

class ScaleController extends Controller
{
    protected $scale,$home;
    public function __construct(ScaleRepository $scale,HomeRepository $home)
    {
        $this->scale = $scale;
        $this->home = $home;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示数据库中所有的量表
     */
    public function show($id)
    {
        return view('scale.'.$id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 将量表删除到回收站
     */
    public function softDelete($id)
    {
        $this->scale->deleteScale($id);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 咨询师分配量表 处理的逻辑
     */
    public function allot(Request $request)
    {
        $arr = $request->all();
        $this->scale->allot($arr);
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 将分配的记录删除到回收站
     */
    public function fDelete($id)
    {
        $this->scale->deleteRecord($id);
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 从回收站中删除
     */
    public function tDelete($id)
    {
        $this->scale->delete($id);
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 从回收站中将记录还原
     */
    public function backRecord($id)
    {
        $this->scale->backRecord($id);
        return back();
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 查看量表的信息
     */
    public function showDetail($id)
    {
        $scale = $this->scale->details($id);
        $scales = $this->scale->getAll($id);
        if($scale->title == '汉密尔顿抑郁量表')
        {
            return view('tests.depressed',compact('scales'));
        }

        if($scale->title == '倍克-拉范森躁狂量表')
        {
            return view('tests.depressed',compact('scales'));
        }

        if($scale->title == '汉密尔顿焦虑量表')
        {
            return view('tests.anxious',compact('scales'));
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * 提交填写的量表 处理的逻辑
     */
    public function scaleDeal(Request $request,$id)
    {
        $status = $this->scale->dealData($request->all(),$id);
        if(!$status) {
            $scales = $this->home->showScale(0);
            $DoneScales = $this->home->showScale(1);
            flash('量表提交成功,可在首页中查看结果','success')->important();
            return view('/home',compact('scales','DoneScales'));
        }
        return back();
    }

}
