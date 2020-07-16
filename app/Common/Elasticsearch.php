<?php


namespace App\Common;


use Elasticsearch\ClientBuilder;

class Elasticsearch
{
    public function __construct()
    {

    }


    public static function create()
    {
        $client =  ClientBuilder::create()->build();

        return $client;
    }
}
