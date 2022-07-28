<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    //
    public function index(){
        //取資料
        $lists=DB::table('texts')->get();
        // dd($lists);
        return view('page',compact('lists'));
    }

}
