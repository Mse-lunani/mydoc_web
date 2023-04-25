<?php
include_once 'operations.php';
if(isset($_GET['id'])){
    if(is_numeric($_GET['id'])){
        $sql = "select * from queue where id = '$_GET[id]'";
        $row = select_rows($sql);
        if(!empty($row)){
             $id = $row[0]['id'];
            build_sql_edit("queue",array("status"=>"done"),$id);
            build_sql_insert("orders",array("uid"=>$row[0]['uid']));
        }
    }
}
header("location:../consultation.php?suc");