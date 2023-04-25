<?php 
include_once 'operations.php';
if(!isset($_SESSION['chat'])){
    $_SESSION['chat'] = array();
}

$m = get_response($_POST['message']);
if($m){
    $_SESSION['chat'][] = array("ask"=>$_POST['message'],"response"=>$m); 
}

function get_response($message){
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.openai.com/v1/completions',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"model": "text-ada-001", "prompt": "'.$message.'", "temperature": 0, "max_tokens": 500}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer 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'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response = json_decode($response);

if($response->choices){
    $res = $response->choices[0];
    return $res->text;
}else{
    return false;
}

}

header("location:../");

?>