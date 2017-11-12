<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/12
 * Time: 17:41
 */
    $user=array(
        'id'=>1,
        'name'=>"zhangsan",
        'age'=>18,
        'school'=>'nongda'
    );//关联数组
//    each() 返回值是数组
//    while($arr=each($user)){
//        echo $arr[0]."=>".$arr[1]."<br/>";//0是key，1是value
//    }
//    next()
//    $a=each($user);
//    $b=next($user);
//    print_r($b);//18

//    prev()
//    $a=each($user);
//    next($user);
//    $b=prev($user);
//    print_r($b);//zhangsan

//    end()
//    $a=end($user);
//    print_r($a);//nongda

//    reset()
    $a=each($user);
    next($user);
    next($user);
    $b=reset($user);
    print_r($b);//1
    echo "<br/>";

//    list()
    $str='192.168.0.1';
    list($a,$b,$c,$d)=explode('.',$str);
    echo $a." ".$b." ".$c." ".$d;
?>