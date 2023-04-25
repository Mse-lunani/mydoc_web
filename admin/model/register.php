<?php
include_once 'create.php';
foreach($_POST as $key=>$val){
    $_POST[$key] = security($key);
    if($key == "password"){
        $_POST[$key] = md5($_POST[$key]);
    }
}
$_POST['token'] = bin2hex(random_bytes('9'));
if(build_sql_insert("doctors",$_POST)){
    $sql = "select * from doctors order by id desc";
    $row = select_rows($sql)[0];
    $_SESSION['doctor'] = $row['id'];
    $_SESSION['data'] = $row;
    header("location:../index.php");
}
else{
    header("location:../register.php?unsuc");
}