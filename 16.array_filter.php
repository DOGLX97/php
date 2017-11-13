<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 13:32
 */
    $arr=array(1,2,-5,-9);
    $arr1=array_filter($arr,function ($val){
        if($val<0){
            return true;
        }else{
            return false;
        }
    });
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";
    /*$arr1=array_filter($arr,"func");
    function func($val){
//        var_dump($val);
        if($val<0){
            return true;
        }else{
            return false;
        }
    }
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";

    $arr2=array(
        'id'=>1,
        'name'=>'laoshan',
    );
    foreach($arr2 as $key=>$val){
        $key=$val;
        echo $key."<br/>";
    }*/

?>