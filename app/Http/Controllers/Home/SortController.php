<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SortController extends Controller
{
    //
    /**
     * 冒泡排序
     */
    public function quick()
    {

        $array = [28,5,10,50,45,60];
        $count= count($array);
        for($i = 0 ;$i<$count;$i++){
            for($j=0; $j<$count-$i-1;$j++){
                if($array[$j]>$array[$j+1]){
                    $point = $array[$j];
                    $array[$j] =  $array[$j+1];
                    $array[$j+1] = $point;
                }
            }
        }
        dd($array);
    }
}
