<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14
 * Time: 14:36
 */
    include "conn.php";
    if(isset($_POST['sub'])){
        $uname=$_POST['uname'];
        $pass=$_POST['pass'];
        $sql="select * from user where uname='$uname' and pass='$pass'";
        $query=mysqli_query($link,$sql);
        $result=mysqli_fetch_array($query);
        if($result){
            setcookie('uid',$result['uid'],time()+180);
            setcookie('uname',$result['uname'],time()+180);
            echo "<script>location='index.php'</script>";
        }else{
            echo "<script>location='login.php'</script>";
        }
    }
?>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/common.css">
<style>
a{
    color:#000;
    text-decoration:none;
}
</style>
<form action="login.php" method="post">
    用户名: <input type="text" name="uname" > <br>
    <br>
    密 码: <input type="password" name="pass"> <br>
    <br>
    <input type="submit" name="sub" value="登录">
    <button><a href="reg.php">注册</a></button>
</form>

