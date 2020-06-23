<?php

namespace App\Http\Controllers\Home;

use App\Models\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SqlController extends Controller
{
    //
    /**
     *   SQL注入风险  laravel处理
     */
    public function testSql()
    {
         $id = 1;
         $res =    Goods::whereRaw("id = ?", [$id])->first()->toArray();
         dd($res);
    }
}
