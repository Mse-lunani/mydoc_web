<?php 
include_once 'operations.php';
$conn = connect();
$date = date("Y-m-d H:i:s");
$sql = "select * from orders";
$row = select_rows($sql);
$uid = security("uid");
foreach($_POST['name'] as $key=>$val){
    $arr['name'] = mysqli_real_escape_string($conn,$_POST['name'][$key]);
    $arr['uid'] = security("uid");
    $arr['oid'] = sizeof($row)+1;
    $arr['price'] = mysqli_real_escape_string($conn,$_POST['price'][$key]);
    $arr['notes'] = mysqli_real_escape_string($conn,$_POST['notes'][$key]);
    build_sql_insert("tests",$arr);
}
build_sql_insert("orders",array("uid"=>$uid));

$sql = "select * from queue where uid = '$uid' order by id desc";
$row = select_rows($sql);
if(!empty($row)){
    $id = $row[0]['id'];
    build_sql_edit("queue",array("status"=>"done"),$id);
}

header("location:../consultation.php?suc");
?>