<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14
 * Time: 14:45
 */
    include "conn.php";
    if(isset($_COOKIE['uid'])){
        setcookie('uid','',time()-1);
        setcookie('uname','',time()-1);
        echo "<script>location='index.php'</script>";
    }
?>