<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function gaugemanage()
    {
        return view('tests/gaugemanage');
    }
    //量表分配
    public function gaugeallot()
    {
        return view('tests/gaugeallot');
    }
    //测试结果录入
    public function gaugeinput()
    {
        return view('tests/gaugeinput');
    }
    //查看测试结果
    public function gaugecheck()
    {
            return view('tests/gaugecheck');
    }
}
