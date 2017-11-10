<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 18:11
 */

//（1）过滤文件后缀名
//（2）上传图片改名
//（3）要把图片上传到指定文件夹

    if(isset($_POST['sub'])) {
        $sfile = $_FILES['sfile'];
        $name=$sfile['name'];
        $arr=explode('.',$name);
        $len=count($arr)-1;
        //（1）过滤文件后缀名
        $flag=true;
        $newArr=array('txt','exe');//白名单
        for($i=0;$i<count($newArr);$i++){
            if($newArr[$i]==$arr[$len]){
                $flag=false;
            }
        }
        //（2）上传图片改名
        //（3）要把图片上传到指定文件夹
        if($flag){
            $imgName=time();
            $img=$imgName.'.'.$arr[$len];
            $baseUrl=getcwd();
            $bb=move_uploaded_file($sfile['tmp_name'],$baseUrl.'\upload\\'.$img);
            if($bb){
                echo 'success';
            }else{
                echo 'fail';
            }
        }else{
            echo "<script>alert('上传文件非法')</script>";
        }
    }

?>
<meta charset="UTF-8">
<form action="11.本地上传文件.php" method="post" enctype="multipart/form-data">
    上传文件:
    <input type="file" name="sfile">
    <input type="submit" name="sub" value="上传">
</form>