<?php

namespace App\Http\Controllers;

use App\Http\Repository\TestsRepository;

class TestsController extends Controller
{
    protected $tests;
    public function __construct(TestsRepository $tests)
    {
       $this->tests = $tests;
    }

    //量表管理
    public function gaugemanage()
    {
        $scales = $this->tests->gaugeManage();
        return view('tests/gaugemanage',compact('scales'));
    }
    //量表分配
    public function gaugeallot()
    {
        $roles = $this->tests->roleAll();
        $scales = $this->tests->scales();
        $users = $this->tests->users();
        $exist_scales =  $this->tests->gaugeManage();
        return view('tests/gaugeallot',compact('roles','users','scales','exist_scales'));
    }
    //测试结果录入
    public function gaugeinput()
    {
        return view('tests/gaugeinput');
    }
    //为显示测试结果 传入的数据
    public function gaugecheck($id)
    {
        $scales = $this->tests->scaleFirst($id);
        if($scales->title == '汉密尔顿抑郁量表')
        {
            $ab = json_decode($scales->number,true);
            $a = $ab['0']; $b = $ab['1'];
            $c = $ab['2']; $d = $ab['3'];
            $e = $ab['4']; $f = $ab['5'];
            $g = $ab['6'];
            $scales = $this->tests->scaleGet($id);
            //向结果页面传递数据
            return view('tests/gaugecheck',compact('scales','a','b','c','d','e','f','g'));
        }

        if($scales->title == '汉密尔顿焦虑量表')
        {
            $ab = json_decode($scales->number,true);
            $a = $ab['0'];
            $b = $ab['1'];
            $scales = $this->tests->scaleGet($id);
            //向结果页面传递数据
            return view('tests/gaugecheck',compact('scales','a','b'));
        }
    }

    public function showTest()
    {
        $DoneScales = $this->tests->showScale(1);
        return view('tests/gaugeshow',compact('DoneScales'));
    }
}
