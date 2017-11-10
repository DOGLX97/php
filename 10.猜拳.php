<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10
 * Time: 17:49
 */
    if(isset($_POST['sub'])){
        $val=$_POST['cq'];
        $rNum=rand(0,2);
        echo $val;
        echo $rNum;
        if($val==$rNum){
            echo "平局";
        }else if(($val-$rNum)==1||($val-$rNum)==-2){
            echo "you win!";
        }else{
            echo "you lose";
        }
    }
?>
<meta charset="utf-8">
<form action="10.猜拳.php" method="post" >
    请出拳：
    <select name="cq" id="sel" onclick=change(this)>
        <option value=0>拳头</option>
        <option value=1>布</option>
        <option value=2>剪刀</option>
    </select>
    <img src="img/cq.jpg" alt="加载失败" id="image">
    <input type="submit" name="sub">
</form>
<script>
    function change(obj) {
//        console.log(obj.value);
        var val=obj.value;
        var oImg=document.getElementById('image');
        switch(val){
            case '0':
                oImg.src="img/qt.jpg";
                break;
            case '1':
                oImg.src="img/b.jpg";
                break;
            case '2':
                oImg.src="img/jz.jpg";
                break;
            default:
                oImg.src="img/cq.jpg";
        }
    }
</script>
