<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //

    public function index()
    {
        dd(12342);
    }

    public function test()
    {
        dd('测试分支');
    }

    public function develop()
    {
        dd('测试develop了1234');
    }
}
