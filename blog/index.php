<a href="add.php">添加文章</a>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 15:23
 */
    include "conn.php";
    $sql="select * from blog order by bid desc";
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