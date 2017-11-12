<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/12
 * Time: 17:59
 */
//随机生成五组彩票号码
    $arr_all=array();
    for($i=1;$i<=5;$i++){
        echo "第".$i."注:";
        $arr_all[$i]=array();
        for($j=0;$j<7;$j++){
            $random=mt_rand(0,30);
            if(in_array($random,$arr_all[$i])){
                $j--;
                continue;
            }else{
                $arr_all[$i][$j]=$random;
                if($j<6){
                    echo $arr_all[$i][$j].",";
                }else{
                    echo $arr_all[$i][$j];
                }
            }
        }
        echo "<br/>";
    }
?>