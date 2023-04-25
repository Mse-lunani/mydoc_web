<?php
include_once 'operations.php';
foreach($_POST as $key=>$val){
    $_POST[$key] = security($key);
}
$_POST['token'] = bin2hex(random_bytes(6));
$password =rand(1000,9000);
$_POST['password'] = md5($password);
$_POST['doc_id'] = $_SESSION['doctor'];
build_sql_insert("users",$_POST);
$message = "<p>
Welcome to myDaktari
here are your credentials<br>
password: ".$password." 
</p>";
email($_POST['email'], "Account created successfully", "MyDaktari", $message);
header("location:../register_patient.php?suc");