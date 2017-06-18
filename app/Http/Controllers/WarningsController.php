<?php

namespace App\Http\Controllers;

use App\Http\Repository\HomeRepository;
use App\Http\Repository\TestsRepository;

class WarningsController extends Controller
{
    protected $home,$tests;
    public function __construct(HomeRepository $home,TestsRepository $tests)
    {
        $this->home = $home;
        $this->tests = $tests;
    }
    //查看预警
    public function warnsee()
    {

        $scales = $this->home->showScale(1);
        return view('warnings/warnsee',compact('scales'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    //预警设置
    public function warnsetting()
    {
        $scales = $this->tests->gaugeManage();
        return view('warnings/warnsetting',compact('scales'));
    }
}
