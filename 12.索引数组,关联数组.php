<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/12
 * Time: 17:07
 */
    //索引数组

//    $arr=array(1,2,3,4);
    $arr=array(1,'limyoona',18,'korea');
//    $arr[]=1;
//    $arr[]='limyoona';
//    $arr[]=18;
//    $arr[]='korea';
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    //关联数组
    $arr1=array('id'=>1,'name'=>'limyoona','age'=>18);
//    $arr1['id']=1;
//    $arr1['name']="limyoona";
//    $arr1["age"]=18;
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";

    $arr2=array(
        'id'=>1,
        'name'=>'limyoona',
        'age'=>18,
        'gender'=>'male',
    );
//  遍历关联数组用foreach函数
    foreach($arr2 as $key=>$value){
        echo "\$arr2[$key]"."=>".$value."<br/>";
    }
//    初始化一个索引数组
    for($i=0;$i<5;$i++){
        $user[$i]=$i;
    }
    var_dump($user);
    //array(5) { [0]=> int(0) [1]=> int(1) [2]=> int(2) [3]=> int(3) [4]=> int(4) }
    echo "<br/>";
    print_r($user);
    //Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 )
?>