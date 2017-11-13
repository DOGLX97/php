<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13
 * Time: 14:25
 */
//     留言板例子
//     功能：1.添加留言，删除留言，修改留言，留言列表（单页显示限定，分页）
//           2.留言详情页（title content time hits）
//           3.搜索功能
//     数据库设计：blog(bid,title,content,time,hits)

//     链接数据库（创建数据库->数据表->列名(类型)）
//     数据库类型 int char varchar text date timestamp blob(存大于4KB的二进制文件)

//  链接数据库
    @$link=mysqli_connect("localhost","root","") or die("数据库链接错误");
//  选择数据库
    @mysqli_select_db($link,'liuyan') or die("选择数据库错误");
//  设置传输编码
    mysqli_set_charset($link,'UTF8');
?>