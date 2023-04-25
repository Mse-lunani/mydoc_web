<?php
include_once 'operations.php';

$_SESSION['from'] = $_GET['from'];
//CORE

function get_pwd_reset($selector, $currentTimeStamp)
{
    $sql = "SELECT * FROM pwd_reset WHERE pwdResetSelector = '$selector' AND pwdResetExpires >= '$currentTimeStamp'";
    return select_rows($sql)[0];
}

//FUNDRAISER FRONT-END

function get_images($id)
{
    $sql = "SELECT * FROM other_images WHERE activity_id = '$id'";
    return select_rows($sql)[0];
}

function get_all_fundraisers_front_end($limit = '')
{
    $sql = "SELECT * FROM fundraisers WHERE status = 'active' AND activation = 'activated'";
    $limit != '' ? $sql .= " LIMIT $limit" : '';
    return select_rows($sql);
}

function get_my_donations($email){
    $sql = "SELECT donations.*, fundraisers.cause_name,  fundraisers.poster FROM donations JOIN fundraisers ON donations.fundraiser_id = fundraisers.id WHERE donations.status = 'active'";
    $sql .= " AND donations.email = '$email' ";
    return select_rows($sql);
}

function get_reached_amount($id){
    $sql = "SELECT sum(amount) FROM donations WHERE fundraiser_id = '$id' AND payment_status = 'paid' AND status = 'active'";
    return select_rows($sql)[0];
}



//VENDOR

function get_vendor_email($id)
{
    $sql = "SELECT email FROM user WHERE id = '$id'";
    return select_rows($sql)[0];
}

function get_vendor_details_by_fundraiser_id($id)
{
    $sql = "SELECT * FROM user WHERE id='$id' AND status = 'active'";
    return select_rows($sql)[0];
}

// SEARCH

function get_search_results($keyword)
{
    $sql = "SELECT * FROM fundraisers WHERE status = 'active' AND activation = 'activated' AND (cause_name LIKE '%$keyword%' OR description LIKE '%$keyword%')";
    $sql .= " LIMIT 18";
    return select_rows($sql);
}



//FUNDRAISER VENDOR

function get_all_fundraisers($id = '')
{
    $sql = "SELECT * FROM fundraisers WHERE status ='active' ";
    $id != '' ? $sql .= " AND vendor_id = '$id'" : '';
    return select_rows($sql);
}

function get_fundraiser_by_id($id)
{
    $sql = "SELECT * FROM fundraisers WHERE id = '$id' AND status = 'active'";
    return select_rows($sql)[0];
}

function get_all_donations($fid='',$user_id=''){
    $sql = "SELECT donations.*, fundraisers.cause_name, fundraisers.vendor_id FROM donations JOIN fundraisers ON donations.fundraiser_id = fundraisers.id WHERE donations.status = 'active' ";
    $fid != '' ? $sql .= "  AND donations.fundraiser_id = '$fid' " : " ";
    $user_id != '' ? $sql .= "  AND fundraisers.vendor_id = '$user_id' " : " ";
    return select_rows($sql);
}

function get_donation_by_id($id){
    $sql = "SELECT donations.*, fundraisers.cause_name FROM donations JOIN fundraisers ON donations.fundraiser_id = fundraisers.id WHERE donations.status = 'active' ";
    $sql .= " AND donations.id = '$id'";
    return select_rows($sql)[0];
}


// FUNDRAISER ADMIN 
function get_all_users($user_type = '')
{
    $sql = "SELECT * FROM user WHERE status = 'active'";
    $user_type != '' ? $sql .= " AND user_type = '$user_type'" : '';
    return select_rows($sql);
}

function get_total_donations()
{
    $sql = "SELECT sum(amount) FROM donations WHERE status = 'active'";
    return select_rows($sql)[0];
}

function get_my_total_donations($id){
    $sql = "SELECT donations.amount FROM donations JOIN fundraisers ON donations.fundraiser_id = fundraisers.id WHERE fundraisers.vendor_id = '$id' AND fundraisers.status = 'active'";
    return select_rows($sql);
}

function get_message($id){
    $sql = "SELECT * FROM inquiry WHERE id = '$id'";
    return select_rows($sql)[0];
}

function get_all_messages(){
    $sql = "SELECT * FROM inquiry";
    return select_rows($sql);
}

// USERS AND USER DETAILS

function get_user_by_attribute($column, $value)
{
    $sql = "SELECT * FROM user WHERE $column='$value'";
    return select_rows($sql)[0];
}

function get_specific_user($table, $attr, $attr1, $col = 'password', $col1 = 'email')
{
    $sql = "SELECT * FROM $table WHERE $col='$attr' AND $col1='$attr1'";
    return select_rows($sql);
}


function get_profile($col_val, $col = 'id')
{
    $sql = "SELECT * FROM user WHERE $col='$col_val' AND status = 'active'";
    $row = select_rows($sql);
    return $row[0];
}

function get_profiles($col_val, $col = 'email')
{
    $sql = "SELECT * FROM user WHERE $col='$col_val' AND status = 'active'";
    $row = select_rows($sql);
    return $row[0];
}

function get_users_by_id($type, $id)
{
    $sql = "SELECT * FROM user WHERE user_type = '$type' AND id = '$id'";
    return select_rows($sql);
}

function get_availability_by_phone($phoneNumber)
{
    $sql = "SELECT phoneNumber FROM user WHERE phoneNumber='$phoneNumber'";
    return select_rows($sql);
}

function get_availability_by_id($idNumber)
{
    $sql = "SELECT idNumber FROM user WHERE idNumber='$idNumber'";
    return select_rows($sql);
}

function get_contact($property_id)
{
    $sql = "SELECT * FROM user JOIN property WHERE property.propertyBy = user.id AND  property.id ='$property_id'";
    return select_rows($sql);
}






// ERRORS

function check_error($col, $col_val)
{
    $sql = "SELECT $col FROM user WHERE $col='$col_val'";
    return select_rows($sql);
}



//EVENTS
function get_events($date = '')
{
    $today = date('Y-m-d');
    $sql = "SELECT * FROM event WHERE status = 'active'";
    $date != '' ? $sql .= " AND event_date = '$date'" : '';
    $sql .= " and event_date >= '$today' ORDER BY date_created DESC";
    return select_rows($sql);
}



function get_ids($table, $id, $random_str)
{
    $sql = "SELECT * FROM `$table`";
    $row = select_rows($sql);

    foreach ($row as $item) {
        if ($item[$id] == $random_str) {
            $id_exists = true;
            break;
        } else {
            $id_exists = false;
        }
    }
    return $id_exists;
}

//LOGIN AND SESSIONS

function get_user_login()
{
    $email = security('email');
    $password = md5(security('password'));
    $logins = get_specific_user('doctors', $password, $email);

   

    if (!empty($logins)) {
        foreach ($logins as $log) {
            $_SESSION['doctor'] = $log['id'];
            $_SESSION['data']  = $log;
        }
        header('Location:../index.php');
    } else {
        header('Location:../login.php?unsuc');
    }
}

