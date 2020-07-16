<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class trade implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $this->cancelOrder($this->data);
    }

    
    
    public function cancelOrder($data)
    {
        if($data->data['status'] == 1){
            Order::where(['id'=>$data->data['id']])->update(['status'=>2]);
            Log::info(['修改的是'=>$data->data['id'],'时间'=>date('Y-m-d H:i:s')]);
        }
    }
}
