<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 13:45
 */
//  特定批处理数组值
    $lamp=array(
        'os'=>'windows',
        'wb'=>'apache',
        'db'=>'mysql',
        'language'=>'php'
    );
    $arr=array_map("func",$lamp);
    function func($val){
//        var_dump($val);
        return "lao".$val."shan";
    }
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    echo "<br/>";

//  $lamp $lp两个数组值是否相同
    $lp=array(
        'os'=>'windows',
        'wb'=>'apache',
        'db'=>'mysql',
        'language'=>'js'
    );
    $arrnew=array_map("func2",$lamp,$lp);
    function func2($val1,$val2){
        if($val1==$val2){
            return 'same';
        }else{
            return 'diff';
        }
    }
    echo "<pre>";
    print_r($arrnew);
    echo "</pre>";

    echo "<br/>";

    $arr1=array(1,22,10,-5);
    arsort($arr1);
//    sort($arr1);
//    asort($arr1);
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";

    echo "<br/>";

//  交换数组中的键和值
    $arr2=array('a'=>1,'b'=>2);
    $arr3=array_flip($arr2);
    echo "<pre>";
    print_r($arr3);
    echo "</pre>";
?>