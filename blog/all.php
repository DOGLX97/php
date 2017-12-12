<?php
    if(!$_COOKIE['uid']){
        header("location:login.php");   
    }else{
        $uid=$_COOKIE['uid'];
    }
?>
<meta charset="UTF-8">
<link rel="stylesheet" href="assets/bootstrap.min.css">
<?php
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
        <h4>评论区</h4>
        <ul class="list-group">
            <?php
                $sql="select * from user,blog,pl where `user`.uid=pl.plname and blog.bid=pl.blogid and pl.blogid=".$bid;
                $query=mysqli_query($link,$sql);
                while($arr=mysqli_fetch_array($query)){
            ?>
                <li class="list-group-item">
                    <?php echo $arr[plcon];?>
                    <span class="pl-info"> 
                        <?php echo $arr[uname]?>
                        <?php echo $arr[pltime]?>
                    </span>
                </li>
            <?php
            }
            ?>
        </ul>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">评论面板</div>
                <div class="panel-body">
                <form action="all.php?bid=<?php echo $bid?>" method="post">
                    <textarea name="plcon" id="" cols="30" rows="5"></textarea>
                    <input type="submit" name="sub" value="添加评论" />
                </form>
                </div>
            </div>
        </div> 
    </div>
</div>
<?php
    if(isset($_POST['sub'])){
        $plcon=$_POST['plcon'];
        $bid=$_GET['bid'];
        $sql="insert into pl(plid,plname,plcon,pltime,blogid) values(null,'$uid','$plcon',now(),'$bid')";
        $query=mysqli_query($link,$sql);
    }
?>
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
.pl-info{
    float:right;
}
</style>
