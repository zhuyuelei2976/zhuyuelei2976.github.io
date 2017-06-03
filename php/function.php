<?php
function P($data){
    print_r($data);
}
define("IS_POST", $_SERVER['REQUEST_METHOD']=="POST"?TRUE:FALSE);
?>