<?php

include_once 'operations.php';
foreach($_POST as $key=>$v){
    $_POST[$key] = security($key);
}
build_sql_insert("queue",$_POST);
header("location:../queue.php?suc");

?>