<meta charset="UTF-8">
<link rel="stylesheet" href="assets/bootstrap.min.css">
<style>
body{
    background:#e77166;
    color:#fff;
}
ul{
    margin:0;
    padding:0;
    list-style: none;
}
h1{
    background:#323134;
    text-align:center;
    padding:10px;
}
a:hover,a:link,a:active,a:visited{
    color:#fff;
}
p{
    margin:0;
    padding:0;
}
.fenye{
    text-align:center;
    margin:20px;
}
.search{
    color:#323134;
}
</style>
<div class="container">
<h1>welcome to my blog</h1>
<div class="row">
    <div class="col-xs-8">
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
    </div>
    <!-- <div class="col-xs-6 col-xs-offset-6">
        <form action="index.php" method="post">
            <input type="text" name="search">
            <input type="submit" name="sub" value="搜索" class="search">
        </form>
    </div> -->
</div>
<ul>

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14
 * Time: 15:03
 */
//链接数据库
    include "conn.php";
  // 插入120条数据，插入一次就可以
//    for($i=0;$i<100;$i++){
//        $title='title'.$i;
//        $content='content'.$i;
//        $sql="insert into blog(bid,title,content) values(null,'$title','$content')";
//        $query=mysqli_query($link,$sql);
//    }
//    if($query){
//        echo "success";
//    }else{
//        echo "fail";
//    }
//  定义变量
//  当前页$page=$_GET['p'],
//  每页第一条的索引值($page-1)*$pagenum
    $page=$_GET['p']<1 ? 1 : $_GET['p'];
    $pagenum=10;//每页显示多少条
    $showpage=5;//展示页数
    $pageoffset=($showpage-1)/2;//偏移量
    $sql="select * from blog limit ".($page-1)*$pagenum.",$pagenum";
    $query=mysqli_query($link,$sql);
    while($arr=mysqli_fetch_array($query)){
?>
    <li>
    <h3><a href="all.php?bid=<?php echo $arr['bid'];?>"><?php echo $arr['title'];?></a> <a href="edit.php?bid=<?php echo $arr['bid'];?>">修改</a>|<a href="del.php?bid=<?php echo $arr['bid'];?>">删除</a></h3>
    <div><?php echo $arr['time'];?></div>
    <p><?php echo iconv_substr($arr['content'],0,6)."..."?></p>
    <hr/>
    </li>
<?php
    }
?>
    <li colspan="2" class="fenye">
        <?php
            $sql="select count(*) from blog";
            $query=mysqli_query($link,$sql);
            $arr=mysqli_fetch_array($query);
            $all=$arr[0];//总条数
            $all_page=ceil($all/$pagenum);//总页数
            $str="";
            $spage=$page-1;//上一页
            $xpage=$page+1;//下一页
            $str.="<a href='".$_SERVER['PHPFILE']."?p=1'>首页</a> ";
            if($page>1){
                $str.="<a href='".$_SERVER['PHPFILE']."?p=$spage'>上一页</a> ";
            }else{
                $str.="<a href='javascript:void(0)' disabled = 'true' style='opacity: 0.2'>上一页</a> ";
            }
            $start=1;
            $end=$all_page;
            if($all_page>$showpage){
                if($page>$pageoffset+1){
                    $str.="...";
                }
                if($page>$pageoffset){
                    $start=$page-$pageoffset;
                    $end=$all_page>$page+$pageoffset? $page+$pageoffset :$all_page;
                }else{
                    $start=1;
                    $end=$all_page>$showpage? $showpage :$all_page;
                }
                if($pageoffset+$page>$all_page){
                    $start=$start-($page+$pageoffset-$all_page);
                    $end=$all_page;
                }
            }
            for($i=$start;$i<=$end;$i++){
                $str.="<a href='".$_SERVER['PHPFILE']."?p=$i'>$i</a>";
            }
            if($all_page>$showpage&&$all_page>$pageoffset+$page){
                $str.="...";
            }
            if($page<$all_page){
                $str.="<a href='".$_SERVER['PHPFILE']."?p=$xpage'>下一页</a> ";
            }else{
                $str.="<a href='javascript:void(0)' disabled = 'true' style='opacity: 0.2'>下一页</a> ";
            }
            $str.="<a href='".$_SERVER['PHPFILE']."?p=$all_page'>尾页</a> ";
            echo $str;
        ?>
    </li>
</ul>
</div>
