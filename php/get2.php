<?php
header('Content-type:text/html;charset=utf-8');
$host='localhost';
$name='root';
$pass='';
$dbname='mylink';
$link=mysqli_connect($host,$name,$pass,$dbname);
$user=strtolower($_POST['user']);
$pass=$_POST['pass'];
//$user=123456;
//$pass=123154;
$sql="SELECT COUNT(*) FROM user WHERE username='{$user}' AND password='{$pass}'";
$res=mysqli_query($link,$sql);
$row=mysqli_fetch_array($res);
if((int)$row[0]>0){
    $str='{"err":1,"msg":"登陆成功"}';
    echo $str;
    die();
}else {
    echo '{"err":"1","msg":"用户名或密码有误"}';
}