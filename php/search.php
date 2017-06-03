<?php
include_once "function.php";
$data=include_once "data.php";
$data2=include_once "data2.php";
//P($_GET["val"]);
if (isset($_GET["val"])){
    $val=$_GET["val"];
    foreach ($data as $k=>$v){
        $pd=false;
        if ($v["title"]==$val) {
            echo "<ul class="."shop-model>"."<li class="."title>".$v["title"]."</li>".
            "<li class="."message>".$v["message"]."</li>".
            "<li class="."price>".$v["price"]."</li>".
            "<li class="."man>".$v["man"]."</li>".
            "<li class="."tel>".$v["tel"]."</li>".
            "</ul>";
            $pd=true;
        }
        if($pd!=true){
            $result="没有该信息";
            echo "$result";
            break;
        }
    }
// echo "$result";
}
