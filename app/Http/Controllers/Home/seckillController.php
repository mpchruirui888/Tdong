<?php

namespace App\Http\Controllers\Home;

use App\Common\Factory;
use App\Models\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class seckillController extends Controller
{
    /**
     *  秒杀测试
     *  不使用redis进行测试 看是否会发生超卖
     */
    public function seckillDemo()
    {
         $goods =    Goods::where(['id'=>1])->first()->toArray();
         if($goods['score'] >0){
              Log::info('秒杀测试——不使用redis',['msg'=>'当前库存：'.$goods['score']]);
              Goods::where('id',1)->decrement('score');
         }
    }

    /**
     * 使用redis   乐观锁 实现秒杀避免超卖
     */
    public function sckill()
    {
        $redis = Factory::createRedis();
        //监控key
        $redis->watch('sale');
        $sale = $redis->get('sale');
        //版本标识
        $num = 10;
        if($sale>=$num){
            exit(Log::info('活动结束',['msg'=>'']));
        }
        //回滚，取消执行，事务块中
        $redis->multi();   //标记事务块开始
        $redis->incr('sale');
        sleep(1);
        $result = $redis->exec();
        if($result){
            Log::info('秒杀测试使用redis',['msg'=>'当前用户id为'.time()]);
            Goods::where('id',1)->decrement('score');
            echo "更新库成功！";
        }
    }
}
