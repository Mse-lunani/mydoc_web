<?php
include_once '../path.php';
include_once 'read.php';

$arr = array();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
    case 'user':
        delete_main($arr,'user','backoffice/view_users'); 
        break;
    case 'inquiry':
        delete_main($arr,'inquiry','backoffice/view_inquiries');
        break;
    case 'fundraiser':
        delete_main($arr,'fundraisers','backoffice/view_fundraisers');
        break;

        
    case 'fundraiser2':
        delete_main($arr,'fundraisers','raise/view_fundraisers');
        break;
  
}



function delete_main($arr,$table,$redirect){
    if(!delete($table, $_GET['id'])){
        header("Location:../".$redirect."?delete_unsuc");
        exit();
    }
    header("Location:../".$redirect."?delete_suc");
   
}