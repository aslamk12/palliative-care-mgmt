<?php
require_once 'DBconnect.php';

$response = array();
$stmt = $conn->prepare("SELECT eid,e_name,image FROM equipments;");
$stmt->execute();

$stmt->bind_result($eid, $e_name, $image);
$view = array();
while($stmt->fetch()){
    $temp = array();
    $temp['eid'] = $eid;
    $temp['e_name'] = $e_name;
    $temp['image'] = "http://192.168.42.232/santhwanam/facility/".$image;
    array_push($view, $temp);
}
echo json_encode($view);
