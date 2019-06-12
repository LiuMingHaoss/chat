<?php

namespace App\Http\Controllers\Test;

use const http\Client\Curl\Versions\CURL;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\Client;
class TestController extends Controller
{

    public function mongo(){
        $client = new Client("mongodb://localhost:27017");
        $collection = $client->demo->beers;
            //添加
//        $result = $collection->insertOne( [ 'name' => 'liuminghao', 'age' => 18 ] );
//
//        echo "Inserted with Object ID '{$result->getInsertedId()}'";


        //查询
        $res = $collection->find( );

        foreach ($res as $entry) {
            echo $entry['_id'], ': ', $entry['name'],',age:',$entry['age'] ,"\n";echo "<hr>";
        }


        //更新
        $newdata = array('$set' => array("age" => "100"));

        $rs=$collection->updateOne(array('name'=>'liuminghao'),$newdata);
        var_dump($rs);
    }


}
