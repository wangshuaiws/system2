<?php

namespace App\Http\Controllers;

use App\Http\Repository\HomeRepository;


class HomeController extends Controller
{
    protected $home;
    /**
     * Create a new controller instance.
     * auth中间件 除了middle之外
     * @return void
     */
    public function __construct(HomeRepository $home)
    {
        $this->middleware('auth')->except(['middle','check']);
        $this->home = $home;
    }

    public function check()
    {
        $name = $_POST['name'];
        if($this->home->check($name)) {
            echo 111;
        } else {
            echo 222;
    }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //显示主页所需的数据
    public function index()
    {
        if($this->home->givePermission()) {
            $orders = $this->home->showOrder(0);
            $DoneOrder = $this->home->showOrder(1);
            $scales = $this->home->showScale(0);
            $DoneScales = $this->home->showScale(1);
            $applies = $this->home->showApply(0);
            $DoneApplies = $this->home->showApply(1);
        }
        return view('home',compact('orders','DoneOrder','scales','DoneScales','applies','DoneApplies'));
    }

    public function middle()
    {
        return view('middle');
    }

    //显示当前用户的信息
    public function profile()
    {
        $user = user();
        $role = $this->home->getUserRoles();
        return view('profile',compact('user','role'));
    }

    //用户申请成为咨询师
    public function apply()
    {
        $this->home->create();
        return back();
    }

    //管理员处理申请
    public function deal_apply($id)
    {
       $this->home->checkUser($id);
        return back();
    }

    //撤销审核
    public function back_deal($id)
    {
        $this->home->backCheck($id);
        return back();
    }

    //删除用户申请 到回收站
    public function delete_apply($id)
    {
        $this->home->deleteApply($id);
        return back();
    }

    //从回收站中还原

    public function back_apply($id)
    {
        $this->home->backApply($id);
        return back();
    }

    public function tDelete($id)
    {
        $this->home->tDelete($id);
        return back();
    }

}
