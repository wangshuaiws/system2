<?php

namespace App\Http\Controllers;

use App\Http\Repository\ConsultRepository;
use App\Model\Information;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    protected $status;
    public function __construct(ConsultRepository $status)
    {
        $this->status = $status;
    }
    //参数设置
    public function appointsetting()
    {
        $information = $this->status->information();
        return view('consult/appointsetting',compact('information'));
    }
    //预约管理
    public function appointmanage()
    {
        return view('consult/appointmanage');
    }
    //个案辅导
    public function appointcoach()
    {
        return view('consult/appointcoach');
    }
    //我的预约页面
    public function appointmy()
    {
        $noorder = $this->status->status_query(0);
        $yesorder = $this->status->status_query(1);
        $role_manage = $this->status->listRole();
        return view('consult/appointmy',compact('role_manage','noorder','yesorder'));
    }
    //我的预约 功能实现
    public function order(Request $request)
    {
        $arr = $request->all();
        $this->status->order($arr);
        return back();
    }

    public function delete($id)
    {
        $this->status->delete($id);
        return back();
    }

    public function add(Request $request)
    {
        $this->status->add($request);
        return back();
    }
}
