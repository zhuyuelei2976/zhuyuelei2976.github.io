<?php
include_once "function.php";
$old_data=include_once "data.php";
//P($old_data);
//P($_POST);
if (IS_POST){
    $post=$_POST;
    array_push($old_data,$post);
    $post=var_export($old_data,true);
    file_put_contents("data.php","<?php \n return \n {$post} \n ?>");//file_put_contents()函数把一个字符串写入文件中
    echo "成功写入模拟数据库";
}