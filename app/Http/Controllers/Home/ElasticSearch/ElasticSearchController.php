<?php

namespace App\Http\Controllers\Home\ElasticSearch;

use App\Common\Elasticsearch;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\DeclareDeclare;

class ElasticSearchController extends Controller
{
    public $index = 'xiongmao';
    public $type = 't_users';


    /** 新添加一个文档
     * @Notes:
     * @Interface index
     * @author: Tdong
     * @Time: 2020/7/14   3:22 下午
     */
    public function index()
    {
        $ecSearch = Elasticsearch::create();
        $data = [
            'index'=> 'xiongmao',
            'type'=> 't_users',
            'id'=> '2',
            'body'=> ['name'=>'金刚侠大战蜘蛛精','age'=>'90'],

        ];
        $result = $ecSearch->index($data);
        dd($result);
    }

    /**  获取一个文档
     * @Notes:
     * @Interface getOne
     * @author: Tdong
     * @Time: 2020/7/14   3:12 下午
     */
    public function getOne()
    {
        $params = [
            'index'=> $this->index,
            'type'=> $this->type,
            'id'=>1,
        ];
        $ecSearch = Elasticsearch::create();
        $result = $ecSearch->get($params);
        dd($result);
    }

    /**  搜索一个文档  全文搜索
     * @Notes:
     * @Interface
     * @author: Tdong
     * @Time: 2020/7/14   3:23 下午
     */
    public function findByAll()
    {
        $params = [
            'index'=> $this->index,
            'type'=> $this->type,
            'body'=> [
               'query'=>[
                   'match'=>['age'=>'100']
               ]
            ]
        ];
        $ecSearch = Elasticsearch::create();
        $result = $ecSearch->search($params);
        dd($result);
    }

    /**  删除一个文档   仅删除一条数据
     * @Notes:
     * @Interface delete
     * @author: Tdong
     * @Time: 2020/7/14   3:30 下午
     */
    public function delete()
    {
        $params = [
            'index'=> $this->index,
            'type'=> $this->type,
            'id'=> 1
        ];
        $ecSearch = Elasticsearch::create();
        $result = $ecSearch->delete($params);
        dd($result);
    }

    /**  删除整个数据库
     * @Notes:
     * @Interface deleteDatabase
     * @author: Tdong
     * @Time: 2020/7/14   3:40 下午
     */
    public function deleteDatabase()
    {
        $params = [
            'index'=> $this->index
        ];
        $ecSearch = Elasticsearch::create();
        $result = $ecSearch->indices()->delete($params);
        dd($result);
    }

    /** 创建索引
     * @Notes:
     * @Interface create
     * @author: Tdong
     * @Time: 2020/7/14   3:44 下午
     */
    public function create()
    {
        $params = [
            'index' => $this->index,
            'body' => [
                'settings' => [               // 自定义设置配置
                    'number_of_shards' => 2,  // 数据分片数
                    'number_of_replicas' => 0 // 数据备份数
                ]
            ]
        ];
        $ecSearch = Elasticsearch::create();
        $result = $ecSearch->indices()->create($params);
        dd($result);
    }

    public function demo()
    {
        $params = [
            'index'=>$this->index,
            'type'=>$this->type,
            'body'=> [
                'query'=>[
                    'match'=>['age'=>'90']
                ],
                ''
            ],

        ];
        $ecSearch = Elasticsearch::create();
        $result = $ecSearch->search($params);
        dd($result);
    }
}
