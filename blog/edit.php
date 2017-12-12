<?php
    if(!$_COOKIE['uid']){
        header('location:login.php');
    }
    include "conn.php";
    if(isset($_GET['bid'])){
        $bid=$_GET['bid'];
        $sql="select * from blog where bid='$bid'";
        $query=mysqli_query($link,$sql);
        $arr=mysqli_fetch_array($query);
//        echo "<pre>";
//        print_r($arr);
//        echo "</pre>";
    }
    if(isset($_POST['sub'])){
        $hid=$_POST['hid'];
        $title=$_POST['title'];
        $con=$_POST['con'];
        $sql="update blog set title='$title',content='$con',time=now() where bid='$hid'";
//        echo $sql;
        $query=mysqli_query($link,$sql);
        if($query){
            header("location:index.php");
        }
    }
?>
<meta charset="utf-8">
<link rel="stylesheet" href="css/common.css">
<form action="edit.php" method="post">
    <input type="hidden" name="hid" value="<?php echo $arr['bid'];?>">
    标题: <input type="text" name="title" value="<?php echo $arr['title'];?>"><br/>
    <br>
    内容: <textarea name="con" cols="20" rows="10"><?php echo $arr['content'];?></textarea> <br>
    <br>
    <input type="submit" name="sub" value="修改文章">
</form>
