<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarningsController extends Controller
{
    //查看预警
    public function warnsee()
    {
        return view('warnings/warnsee');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    //预警设置
    public function warnsetting()
    {
        return view('warnings/warnsetting');
    }
}
