<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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
        Log::info('User failed to login.', ['id' => 30968]);
        dd('下测试得到');
    }
}
