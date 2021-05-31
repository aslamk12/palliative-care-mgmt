<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('pid'))) {
    $pid = $_POST['pid'];
    $status='confirmed';

    $stmt = $conn->prepare("SELECT tid,tr_assdate,e_name,image FROM transport inner join equipments on transport.equipment=equipments.eid where transport.patient=? and transport.tr_status=?");
    $stmt->bind_param("ss",$pid,$status);
    $stmt->execute();
    $stmt->bind_result($tr_id,$date, $e_name, $image);
    $cat_products = array();
    while ($stmt->fetch()) {
        $temp = array();
        $temp['tr_id'] = $tr_id;
        $temp['e_name'] = $e_name;
        $temp['date'] = $date;
        $temp['image'] = "http://192.168.42.232/santhwanam/facility/".$image;
       
        array_push($cat_products, $temp);
    }
    
    echo json_encode($cat_products);
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
