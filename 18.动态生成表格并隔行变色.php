<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 14:03
 */
    table(2,4);
    function table($rows,$cols){
        echo "<table align='center' width='800' border='1'>";
        echo "<caption><h3>title</h3></caption>";
        $color="";
        for($i=1;$i<=$rows;$i++){
            if($i%2==0){
                $color='red';
            }else{
                $color='green';
            }
            echo "<tr style='background:".$color."'>";
            for($j=1;$j<=$cols;$j++){
                echo "<td>".$j."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    table(5,6);

//  func_get_args  返回参数数组
    function demo(){
        $args=func_get_args();
        $sum=0;
        for($i=0;$i<count($args);$i++){
            $sum+=$args[$i];
        }
        return $sum;
    }
    echo demo(1,2,3,4,5,6,7,8,9);
?>