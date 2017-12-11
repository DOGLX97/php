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
<meta charset="UTF-8">
<link rel="stylesheet" href="assets/bootstrap.min.css">
<div class="container">
    <h2>内容</h2>
    <h3><?php echo $arr['title']?></h3>
    <span>时间:<?php echo $arr['time']?></span>
    <span>访问量:<?php echo $arr['hits']?></span>
    <hr>
    <p><?php echo $arr['content']?></p>
    <hr>
    <div class="row" class="pl">
        <div class="col-md-7">
            <ul class="list-group">
                <li class="list-group-item">评论5</li>
                <li class="list-group-item">评论4</li>
                <li class="list-group-item">评论3</li>
                <li class="list-group-item">评论2</li>
                <li class="list-group-item">评论1</li>
            </ul>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">评论面板</div>
                <div class="panel-body">
                <form>
                    <textarea name="plcon" id="" cols="30" rows="5"></textarea>
                    <input type="submit" name="sub" value="添加评论" />
                </form>
                </div>
            </div>
        </div> 
    </div>
</div>

<style>
body{
    background:#e77166;
}
h2{
    background:#323134;
    text-align:center;
    color:#fff;
}
.container .pl{
    color:#000;
}
</style>
