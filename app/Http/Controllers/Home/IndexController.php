<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index()
    {
         if (!function_exists('getallheaders')) {

             function getallheaders() {
                 $headers = array();
                 foreach ($_SERVER as $name => $value) {
                     if (substr($name, 0, 5) == 'HTTP_') {
                         $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                     }
                 }
                 return $headers;
             }

         }
         $res = getallheaders();
        return   json_encode(['data'=>$res]);
//         dd($res);
//        return view('home.index');
    }

    public function notice()
    {
        return view('home.notice');
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

    public function token()
    {

    }
}
