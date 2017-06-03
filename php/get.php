<?php
header('Content-type:text/html;charset=utf-8');
$host='localhost';
$name='root';
$pass='';
$dbname='mylink';
/*$link=mysqli_connect($host,$name,$pass);//创建连接;
if($link){
    echo "连接成功";
}else{
    echo "连接失败";
}
$sql="CREATE DATABASE mylink";//创建数据库
if(mysqli_query($link,$sql)){
    echo "创库成功";
}else{
    echo "创库失败";
};
$linkmy=mysqli_select_db($link,"myink");*/
$link=mysqli_connect($host,$name,$pass,$dbname);
$table="create table user(
id int(6) unsigned auto_increment primary key,
username varchar(30) not null,
password varchar(30) not null
)";
// if(mysqli_query($link,$table)){
//     return "创建数据表成功";
// }else{
// //    echo "创建数据表失败".mysqli_error($link);
// }
$user=strtolower($_GET['user']);
$pass=$_GET['pass'];
$sql="SELECT COUNT(*) FROM user WHERE username='{$user}'";
$res=mysqli_query($link,$sql);
$row=mysqli_fetch_row($res);
if((int)$row[0]>0){
    $str='{"err":1,"msg":"have use"}';
    echo $str;
    var_dump(json_encode($str));
    die();
}else {
    $sql = "INSERT INTO user(id,username,password) VALUE (0,'{$user}','{$pass}')";
    if (mysqli_query($link,$sql)) {
        $str='{"err":0,"msg":"success"}';
        echo $str;
        var_dump($str);
    }
}