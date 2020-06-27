<?php

namespace App\Http\Controllers\Home\Pay;

use App\Common\Pay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('pay.index');
    }

    public function WxPay()
    {
        $pay = new Pay();
        $pay->notify_url = 'http://share.xiongmaotaoxue.com/mobile/homework/index/wx-notify';
        $pay->redirect_url = 'http://share.xiongmaotaoxue.com/mobile/homework/index/index?user_id=30874&grade_id=2';
        $result =  $pay->unifiedOrder(30874,1,0.01);

        
       return json_encode(['code'=>200,'data'=>$result,'msg'=>'ok']);
    }
}
