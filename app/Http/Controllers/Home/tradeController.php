<?php

namespace App\Http\Controllers\Home;

use App\Jobs\trade;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class tradeController extends Controller
{

    //
    public function trade()
    {

         Order::insert(['order_sn'=>time(),'price'=>10,'status'=>1,'add_time'=>time()]);
         $res= DB::getPdo()->lastInsertId();
         $row =Order::where(['id'=>$res])->first()->toArray();
         $job = new trade($row);
         $job->dispatch($job)->delay(now()->addMinutes(3))->onQueue('order');
        return '生成订单了！'.$row['id'];
    }
}
