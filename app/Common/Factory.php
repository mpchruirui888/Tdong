<?php
namespace App\Common;


use Illuminate\Support\Facades\Redis;

class Factory
{

    /**
     * 生产Redis
     */
    public static function createRedis()
    {
        $redis = new Redis();
        return $redis::connection();
    }

}
