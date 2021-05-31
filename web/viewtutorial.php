<?php
require_once 'DBconnect.php';

$response = array();
$stmt = $conn->prepare("SELECT tut_id,tut_name,tut_url,tut_description FROM tutorials;");
$stmt->execute();

$stmt->bind_result($tut_id, $tut_name, $tut_url,$tut_text);
$view = array();
while($stmt->fetch()){
    $temp = array();
    $temp['tut_id'] = $tut_id;
    $temp['tut_name'] = $tut_name;
    $temp['tut_text'] = $tut_text;
    $temp['tut_link'] = $tut_url;
    array_push($view, $temp);
}
echo json_encode($view);
