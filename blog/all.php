<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 16:05
 */
    include "conn.php";
    if(isset($_GET['bid'])){
        $bid=$_GET['bid'];
//        当前访问量+1
        $sql="update blog set hits=hits+1 where bid='$bid'";
        $query=mysqli_query($link,$sql);
        if($query){
//             显示当前页面
            $sql="select * from blog where bid='$bid'";
            $query=mysqli_query($link,$sql);
            $arr=mysqli_fetch_array($query);
        }
    }
?>
<h2>内容</h2>
<h3><?php echo $arr['title']?></h3>
<span>时间:<?php echo $arr['time']?></span>
<span>访问量:<?php echo $arr['hits']?></span>
<hr>
<p><?php echo $arr['content']?></p>
<style>
body{
    background:#e77166;
    color:#fff;
}
h2{
    background:#323134;
    text-align:center;
}
</style>
