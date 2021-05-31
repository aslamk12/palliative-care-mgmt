<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('group'))) {
    $group = $_POST['group'];


    $stmt = $conn->prepare("SELECT bd_id,bd_name,bd_group,bd_mobile,bd_place FROM blooddonor where bd_group=?");
    $stmt->bind_param("s",$group);
    $stmt->execute();
    $stmt->bind_result($bd_id,$bd_name, $bd_group, $bd_mobile,$bd_place);
    $cat_products = array();
    while ($stmt->fetch()) {
        $temp = array();
        $temp['bd_id'] = $bd_id;
        $temp['bd_name'] = $bd_name;
        $temp['bd_contact'] = $bd_mobile;
        $temp['bd_place'] = $bd_place;
        $temp['bd_group'] = $bd_group;
       
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
