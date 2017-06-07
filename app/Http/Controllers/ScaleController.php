<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScaleController extends Controller
{
    public function show($id)
    {
        return view('scale.'.$id);
    }
}
