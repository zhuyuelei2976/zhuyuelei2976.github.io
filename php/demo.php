<?php
include_once "function.php";
$data=include_once "data.php";
$data=json_encode($data);//json_encode() 对变量进行json格式编码
//P($data);
echo $data;