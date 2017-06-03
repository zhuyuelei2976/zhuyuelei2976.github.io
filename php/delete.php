<?php
include_once "function.php";
$data=include_once "data.php";
//echo $_POST['mid'];
if (isset($_POST['mid'])){
    $id=$_POST['mid'];
    unset($data[$id]);
    $datas=var_export($data,true);
    file_put_contents("data.php","<?php \n return \n {$datas} \n ?>");//file_put_contents()函数把一个字符串写入文件中
    echo "成功删除数据";
}