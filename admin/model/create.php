<?php
include_once 'read.php';

$arr = array();
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
    case 'register':
        create_user($arr);
        break;
    case 'fundraiser':
        create_fundraiser($arr);
        break;
    case 'login':
        get_user_login();
        break;
    case 'falsy':
        login_fallback(decrypt($_GET['email']));
        break;
    case 'inquiry':
        post_inquiry($arr);
        break;
    case 'reset':
        post_password_reset($arr);
        break;
}




function create_id($table, $id='id')
{
    $random_str = rand_str();

    $get_id     = get_ids($table, $id, $random_str);

    while ($get_id == true) {
        $random_str = rand_str();
        $get_id     = get_ids($table, $id, $random_str);
    }
    return $random_str;
}


function delete_file($image, $table, $type = 'img')
{
    $path = $_SERVER["DOCUMENT_ROOT"]."/fundraiser/backoffice/uploads/";

    $id = $_SESSION['edit'];
    $sql = "select $image from $table where id = '$id'";
    $row = select_rows($sql)[0];

    return unlink($path . $row[$image]);
}