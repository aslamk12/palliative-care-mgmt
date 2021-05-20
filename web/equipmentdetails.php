<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('eid'))) {
    $eid = $_POST['eid'];

    $stmt = $conn->prepare("SELECT e_name,image,e_stock,description FROM equipments where eid=?");
    $stmt->bind_param("s",$eid);
    $stmt->execute();
    $stmt->bind_result( $e_name, $image, $stock,$description);
    $equipment_details = array();
    while ($stmt->fetch()) {
        $temp = array();
        $temp['e_name'] = $e_name;
        $temp['image'] = "http://192.168.42.232/santhwanam/facility/" . $image;
        $temp['stock'] = $stock;
        $temp['descp'] = $description;


        array_push($equipment_details, $temp);
    }

    echo json_encode($equipment_details);
}
else
{
    echo json_encode("Error");
}


function isTheseParametersAvailable($params)
{
    foreach($params as $param)
    {
        if (!isset($_POST[$param]))
        {
            return false;
        }
    }

    return true;
}
