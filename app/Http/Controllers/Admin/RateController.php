<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index(){
        $datas = Rate::paginate(env("paginate_num"));
        return view('admin.rate.index',compact('datas'));
    }
}
