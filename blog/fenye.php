<table border="1" width="500" align="center">
    <tr>
        <th>ID</th>
        <th>NAME</th>
    </tr>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14
 * Time: 15:03
 */
//链接数据库
    include "conn.php";
//    插入120条数据，插入一次就可以
//    for($i=0;$i<120;$i++){
//        $fname='fname'.$i;
//        $fcontent='fcontent'.$i;
//        $sql="insert into fenye(fid,fname,fcontent) values(null,'$fname','$fcontent')";
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
    $sql="select * from fenye limit ".($page-1)*$pagenum.",$pagenum";
    $query=mysqli_query($link,$sql);
    while($arr=mysqli_fetch_array($query)){
?>
    <tr>
        <td><?php echo $arr['fid'];?></td>
        <td><?php echo $arr['fname'];?></td>
    </tr>
<?php
    }
?>
    <tr>
        <td colspan="2">
            <?php
                $sql="select count(*) from fenye";
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
        </td>
    </tr>
</table>
