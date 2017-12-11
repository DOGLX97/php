<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 15:14
 */
    include "conn.php";
    if(isset($_POST['sub'])){
        $title=$_POST['title'];
        $con=$_POST['con'];
//      拼sql语句
        $sql="insert into blog(bid,title,content,time) values(null,'$title','$con',now())";
//        echo $sql;
//      发送sql语句到数据库
        $query=mysqli_query($link,$sql);
        if($query){
            echo "<script>location='index.php'</script>";
        }else{
            echo "<script>alert('发送失败')</script>";
            echo "<script>location='add.php'</script>";
        }
    }
?>
<meta charset="utf-8">
<link rel="stylesheet" href="css/common.css">
<form action="add.php" method="post">
    标题: <input type="text" name="title"> <br/>
    <br>
    内容: <textarea name="con" cols="20" rows="10"></textarea> <br>
    <br>
    <input type="submit" name="sub" value="添加文章">
</form>
