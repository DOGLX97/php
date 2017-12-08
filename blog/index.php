<h1>welcome to my blog</h1>
<span>
    <?php
        if($_COOKIE['uid']){
            echo $_COOKIE['uname']." 已登录 ";
            echo "<a href='ulogin.php'>注销登录</a>";
        }else{
            echo "<a href='login.php'>登录</a>";
        }
    ?>
</span>
<span><a href="reg.php">注册</a></span>
<br/>

<?php
    if($_COOKIE['uid']){
        echo "<a href='add.php'>添加文章</a>";
    }else{
        echo "<a href='login.php'>添加文章(请先登录)</a>";
    }
?>
<br/>
<form action="index.php" method="post">
    <input type="text" name="search">
    <input type="submit" name="sub" value="搜索">
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 15:23
 */
    include "conn.php";
    if(isset($_POST['search'])){
        $search=$_POST['search'];
        $w="title like '%$search%'";
    }else{
        $w=1;
    }

    $sql="select * from blog where $w order by bid desc";
    $query=mysqli_query($link,$sql);
    while($arr=mysqli_fetch_array($query)) {
?>
<h3><a href="all.php?bid=<?php echo $arr['bid'];?>"><?php echo $arr['title'];?></a> <a href="edit.php?bid=<?php echo $arr['bid'];?>">修改</a>|<a href="del.php?bid=<?php echo $arr['bid'];?>">删除</a></h3>
<li><?php echo $arr['time'];?></li>
<p><?php echo iconv_substr($arr['content'],0,6)."..."?></p>
<hr/>
<?php
    }
?>
<style>
body{
    background:#e77166;
    color:#fff;
}
h1{
    background:#323134;
    text-align:center;
    padding:10px;
}
a:hover,a:link,a:active,a:visited{
    color:#fff;
}
</style>