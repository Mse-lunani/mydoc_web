<?php
include_once 'create.php';
    
use Dompdf\Dompdf;

$arr    = array();
$array  = array();

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
    case 'change_password':
        update_password2($arr); 
        break;
    case 'reset':
        update_reset($arr);
        break;
    case 'home_logout':
        logout();
        break;
    case 'profile':
        update_profile($arr);
        break;
}


function update_password2($arr){
    $password           = md5(security('password'));
    $new_password       = security('new_password');
    $confirm_password   = security('confirm_password');
    
    $id = $_SESSION['id'];

    if($new_password !== $confirm_password) {
        header("location:../user_profile?passerror"); 
        exit();
    }

    $sql = "select * from user where id = '$id' and password = '$password'";
    $row = select_rows($sql);
    
    if(empty($row)) {
        header("location:../user_profile?unsuc"); 
        exit();
    }

    $arr['password'] = md5($new_password);

    build_sql_edit("user", $arr, $id);
    header("location:../user_profile?suc"); 
    
}



function update_profile($arr){
    $profile_image = uploadz('profile_image');
    if (!empty($profile_image)) {
        isset($_SESSION['edit']) ? delete_file('profile_image', 'user') : '';
        $arr['profile_image'] = $profile_image;
    }
    foreach ($_POST as $key => $value) {
            $arr[$key] = security($key);
    }
    
    if (!build_sql_edit('user', $arr, $_SESSION['id'])) {
        header('Location:' . vendor_url . 'profile?error');
    } 
    
    header('Location:' . vendor_url . 'profile?suc');
}

function update_reset($arr)
{
    $selector           = security("selector");
    $validator          = security("validator");
    $arr['password']    = md5(security("password"));
    $currentTimeStamp   = date("U");
    $failed_redirect    = base_url . "change-password.php?newpass=re-submit&selector=" . $selector . "&validator=" . $validator;

    $pwd_reset = get_pwd_reset($selector, $currentTimeStamp);
    
    if (empty($pwd_reset)) {
        header("Location:" . $failed_redirect);
        exit();
    }

    $tokenBinary    = hex2bin($validator);
    $tokenCheck     = password_verify($tokenBinary, $pwd_reset['pwdResetToken']);

    if ($tokenCheck === false) {
        header("Location:" . $failed_redirect);
        exit();
    }

    $tokenEmail = $pwd_reset['pwdResetEmail'];

    $user = get_user_by_attribute('email', $tokenEmail);
    
    if (empty($user)) {
        header("Location:" . $failed_redirect);
        exit();
    }

    if (!build_sql_edit('user', $arr, $tokenEmail, 'email')) {
        header("Location:" . $failed_redirect);
        exit();
    }

    if (!insert_delete_edit("delete from pwd_reset where pwdResetEmail = '$tokenEmail'")) {
        header("Location:" . $failed_redirect);
        exit();
    }
    
    header("Location:" . base_url . "login?newpass&${user[user_type]}");

}



function change_password($arr){
    $password           = md5(security('password'));
    $new_password       = security('new_password');
    $confirm_password   = security('confirm_password');
    
    $id = $_SESSION['id'];

    if($new_password !== $confirm_password) {
        header("location:" . vendor_url . "change_password.php?pass"); 
        exit();
    }

    $sql = "select * from user where id = '$id' and password = '$password'";
    $row = select_rows($sql);
    
    if(empty($row)) {
        header("location:" . vendor_url . "change_password.php?unsuc"); 
        exit();
    }

    $arr['password'] = md5($new_password);

    build_sql_edit("user", $arr, $id);

    header("location:" . vendor_url . "change_password.php?suc");
}
