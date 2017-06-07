<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    //量表管理
    public function gaugemanage()
    {
        $scales = DB::select('select * from scale_manage');
        return view('tests/gaugemanage',['scales' => $scales]);
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
