<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 15:56
 */
    include "conn.php";
    if(isset($_GET['bid'])){
        $bid=$_GET['bid'];
        $sql="delete from blog where bid='$bid'";
        $query=mysqli_query($link,$sql);
        if($query){
            echo "<script>location='index.php'</script>";
        }else{
            echo "<script>alert(\"删除失败\")</script>";
        }
    }
?>