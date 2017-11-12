<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/12
 * Time: 17:28
 */

//二维数组
    $user=array(
        array(1,"laoshan",18,"male"),
        array(2,"laoxie",18,"male"),
        array(3,"laowu",18,"male"),
    );
    echo "<pre>";
    print_r($user);
    echo "</pre>";

    unset($user[1][1]);//删除数组元素

    echo "<pre>";
    print_r($user);
    echo "</pre>";

//    三维数组
    $info=array(
        "$user"=>array(
            array(1,"laoshan",18,"male"),
            array(2,"laoxie",20,"male"),
            array(3,"laowu",22,"male"),
        ),
        "$score"=>array(
            array(1,90,90,90),
            array(2,80,80,80),
            array(3,90,90,90),
        )
    );
    foreach($info as $key=>$value){
        echo "<table border='1',width='800'>";
            echo "<caption><h3>".$key."</h3></caption>";
            foreach($value as $val){
                echo "<tr>";
                foreach($val as $v){
                    echo "<td>".$v."</td>";
                }
                echo "</tr>";
            }
        echo "</table>";
    }
?>